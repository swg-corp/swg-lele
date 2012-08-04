<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author satriaprayoga
 */
class Bootstrap {

    private $_template = 'default';
    private $_ci;
    private $_widget_folder = '';
    private $_partials = array();
    private $_parser = FALSE;
    private $_cache_ttl = 0;

    public function __construct($config = array()) {
        $this->_ci = &get_instance();
        if (!empty($config)) {
            $this->_init_config($config);
        }
    }

    private function _init_config($config = array()) {
        foreach ($config as $key => $val) {
            $this->{'_' . $key} = $val;
        }

        if ($this->_widget_folder == '') {
            $this->_widget_folder = APPPATH . 'widgets/';
        }

        if ($this->_parser && !class_exists('CI_Parser')) {
            $this->_ci->load->library('parser');
        }
    }

    public function __set($name, $value) {
        $this->partial($name)->set($value);
    }

    public function __get($name) {
        return $this->partial($name);
    }

    public function exists($index) {
        return array_key_exists($index, $this->_partials);
    }

    public function set_template($template = 'default') {
        $this->_template = $template;
    }

    public function publish($template = FALSE, $data = array()) {
        if (is_array($template) || is_object($template)) {
            $data = $template;
        } else if ($template) {
            $this->_template = $template;
        }

        if (!$this->_template) {
            show_error('There was no template file selected for the current template');
        }

        if (is_array($data) || is_object($data)) {
            foreach ($data as $name => $content) {
                $this->partial($name)->set($content);
            }
        }

        unset($data);

        if ($this->_parser) {
            $this->_ci->parser->parse($this->_template, $this->_partials);
        } else {
            $this->_ci->load->view($this->_template, $this->_partials);
        }
    }
    
    public function partial($name, $default = FALSE) {
        if ($this->exists($name)) {
            $partial = $this->_partials[$name];
        } else {
            // create new partial
            $partial = new Partial($name);
            if ($this->_cache_ttl) {
                $partial->cache($this->_cache_ttl);
            }

            // detect local triggers
            if (method_exists($this, 'trigger_' . $name)) {
                $partial->bind($this, 'trigger_' . $name);
            }

            $this->_partials[$name] = $partial;
        }

        if (!$partial->content() && $default) {
            $partial->set($default);
        }

        return $partial;
    }
    
    public function widget($name, $data = array()) {
        $class = str_replace('.php', '', trim($name, '/'));

        // determine path and widget class name
        $path = $this->_widget_folder;
        if (($last_slash = strrpos($class, '/')) !== FALSE) {
            $path += substr($class, 0, $last_slash);
            $class = substr($class, $last_slash + 1);
        }

        // new widget
        if (!class_exists($class)) {
            // try both lowercase and capitalized versions
            foreach (array(ucfirst($class), strtolower($class)) as $class) {
                if (file_exists($path . $class . '.php')) {
                    include_once ($path . $class . '.php');

                    // found the file, stop looking
                    break;
                }
            }
        }

        if (!class_exists($class)) {
            show_error("Widget '" . $class . "' was not found.");
        }

        return new $class($class, $data);
    }
    
    public function cache($ttl = 60, $identifier = '') {
        foreach ($this->_partials as $partial) {
            $partial->cache($ttl, $identifier);
        }

        $this->_cache_ttl = $ttl;
    }
    
    public function trigger_stylesheet($url, $media = FALSE) {
        // array support
        if (is_array($url)) {
            $return = '';
            foreach ($url as $u) {
                $return .= $this->trigger_stylesheet($u, $media);
            }
            return $return;
        }

        if (!stristr($url, 'http://') && !stristr($url, 'https://') && substr($url, 0, 2) != '//') {
            $url = $this->_ci->config->item('base_url') . $url;
        }

        if ($media) {
            return '<link rel="stylesheet" href="' . htmlspecialchars(strip_tags($url)) . '" media="' . $media . '" />' . "\n\t";
        } else {
            return '<link rel="stylesheet" href="' . htmlspecialchars(strip_tags($url)) . '" />' . "\n\t";
        }
    }
    
    public function trigger_javascript($url) {
        // array support
        if (is_array($url)) {
            $return = '';
            foreach ($url as $u) {
                $return .= $this->trigger_javascript($u);
            }
            return $return;
        }

        if (!stristr($url, 'http://') && !stristr($url, 'https://') && substr($url, 0, 2) != '//') {
            $url = $this->_ci->config->item('base_url') . $url;
        }

        return '<script src="' . htmlspecialchars(strip_tags($url)) . '"></script>' . "\n\t";
    }
    
    public function trigger_meta($name, $value, $type = 'meta') {
        $name = htmlspecialchars(strip_tags($name));
        $value = htmlspecialchars(strip_tags($value));

        if ($name == 'keywords' and !strpos($value, ',')) {
            $content = preg_replace('/[\s]+/', ', ', trim($value));
        }

        switch ($type) {
            case 'meta' :
                $content = '<meta name="' . $name . '" content="' . $value . '" />' . "\n\t";
                break;
            case 'link' :
                $content = '<link rel="' . $name . '" href="' . $value . '" />' . "\n\t";
                break;
        }

        return $content;
    }
    
    public function trigger_title($title) {
        return htmlspecialchars(strip_tags($title));
    }
    
    public function trigger_description($description) {
        return htmlspecialchars(strip_tags($description));
    }
    

}

class Partial {

    protected $_ci, $_content, $_name, $_cache_ttl = 0, $_cached = false, $_identifier, $_trigger;
    protected $_args = array();

    public function __construct($name, $args = array()) {
        $this->_ci = &get_instance();
        $this->_args = $args;
        $this->_name = $name;
    }

    function __get($name) {
        return $this->_ci->$name;
    }

    function __call($name, $args) {
        switch ($name) {
            case 'default' :
                return call_user_func_array(array($this, 'set_default'), $args);
                break;
            case 'add' :
                return call_user_func_array(array($this, 'append'), $args);
                break;
        }
    }

    public function __toString() {
        return (string) $this->content();
    }

    public function content() {
        if ($this->_cache_ttl && !$this->_cached) {
            $this->cache->save($this->cache_id(), $this->_content, $this->_cache_ttl);
        }

        return $this->_content;
    }

    public function set() {
        if (!$this->_cached) {
            $this->_content = (string) $this->trigger(func_get_args());
        }

        return $this;
    }

    public function append() {
        if (!$this->_cached) {
            $this->_content .= (string) $this->trigger(func_get_args());
        }

        return $this;
    }

    public function prepend() {
        if (!$this->_cached) {
            $this->_content = (string) $this->trigger(func_get_args()) . $this->_content;
        }

        return $this;
    }

    public function set_default($default) {
        if (!$this->_cached) {
            if (!$this->_content) {
                $this->_content = $default;
            }
        }

        return $this;
    }

    public function view($view, $data = array(), $overwrite = false) {
        if (!$this->_cached) {

            // better object to array
            if (is_object($data)) {
                $array = array();
                foreach ($data as $k => $v) {
                    $array[$k] = $v;
                }
                $data = $array;
            }

            $content = $this->_ci->load->view($view, $data, true);

            if ($overwrite) {
                $this->set($content);
            } else {
                $this->append($content);
            }
        }
        return $this;
    }

    public function parse($view, $data = array(), $overwrite = false) {
        if (!$this->_cached) {
            if (!class_exists('CI_Parser')) {
                $this->_ci->load->library('parser');
            }

            // better object to array
            if (is_object($data)) {
                $array = array();
                foreach ($data as $k => $v) {
                    $array[$k] = $v;
                }
                $data = $array;
            }

            $content = $this->_ci->parser->parse($view, $data, true);

            if ($overwrite) {
                $this->set($content);
            } else {
                $this->append($content);
            }
        }

        return $this;
    }

    public function widget($name, $data = array(), $overwrite = false) {
        if (!$this->_cached) {
            $widget = $this->template->widget($name, $data);

            if ($overwrite) {
                $this->set($widget->content());
            } else {
                $this->append($widget->content());
            }
        }
        return $this;
    }

    public function cache($ttl = 60, $identifier = '') {
        if (!class_exists('CI_Cache')) {
            $this->_ci->load->driver('cache', array('adapter' => 'file'));
        }

        $this->_cache_ttl = $ttl;
        $this->_identifier = $identifier;

        if ($cached = $this->_ci->cache->get($this->cache_id())) {
            $this->_cached = true;
            $this->_content = $cached;
        }
        return $this;
    }

    private function cache_id() {
        if ($this->_identifier) {
            return $this->_name . '_' . $this->_identifier . '_' . md5(get_class($this) . implode('', $this->_args));
        } else {
            return $this->_name . '_' . md5(get_class($this) . implode('', $this->_args));
        }
    }

    public function trigger($args) {
        if (!$this->_trigger) {
            return implode('', $args);
        } else {
            return call_user_func_array($this->_trigger, $args);
        }
    }

    public function bind() {
        if ($count = func_num_args()) {
            if ($count >= 2) {
                $args = func_get_args();
                $obj = array_shift($args);
                $func = array_pop($args);

                foreach ($args as $trigger) {
                    $obj = $obj->$trigger;
                }

                $this->_trigger = array($obj, $func);
            } else {
                $this->_trigger = reset(func_get_args());
            }
        } else {
            $this->_trigger = FALSE;
        }
    }

}

class Widget extends Partial {

    public function content() {
        if (!$this->_cached) {
            if (method_exists($this, 'display')) {
                // capture output
                ob_start();
                $this->display($this->_args);
                $buffer = ob_get_clean();

                // if no content is produced but there was direct ouput we set 
                // that output as content
                if (!$this->_content && $buffer) {
                    $this->set($buffer);
                }
            }
        }

        return parent::content();
    }

}