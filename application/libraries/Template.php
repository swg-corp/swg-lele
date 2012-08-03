<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template extends CI_Parser {

    private $ci;
    private $name;
    private $path;
    private $base;
    private $default = 'default';
    private $css_folder = 'css';
    private $js_folder = 'js';
    private $delimiter = array();
    private $metadata = array('title' => 'title', 'metadata' => '');
    private $css = array();
    private $js = array();
    private $partial = array();
    private $prepdata = array();

    public function __construct() {
        $this->ci = & get_instance();
        $this->path = $this->ci->config->item('template_base');
        $this->base = $this->path . $this->default . '/';
    }

    public function get_js() {
        $output = '';
        foreach ($this->js as $key => $value) {
            $output.=$value;
        }
        return $output;
    }

    public function get_css() {
        $output = '';
        foreach ($this->css as $key => $value) {
            $output.=$value;
        }
        return $output;
    }

    public function get_title() {
        return $this->metadata['title'];
    }

    public function set_title($title) {
        $this->metadata['title'] = $title;
        return $this;
    }

    public function set_template($name = 'default') {
        $this->base = $this->path . $name . '/';
        $this->name = $name;
        return $this;
    }

    public function set_css($folder = '', $file='') {
        if (func_num_args() < 2) {
            $folder = '';
            $file = func_get_arg(0);
        } else {
            $folder = $folder . '/';
        }
        $pre='<link href"';
        $pre.=base_url().$this->base.$this->css_folder.'/'.$folder;
        $end='" rel="stylesheet" >';
        
        $this->_delimiter($pre, $end);
        $this->_set_css_asset($file);
        return $this;
    }

    public function set_js($folder = '', $file = '') {
        if (func_num_args() < 2) {
            $folder = '';
            $file = func_get_arg(0);
        } else {
            $folder = $folder . '/';
        }
        $pre = '<script type="text/javascript" src="';
        $pre.=base_url() . $this->base . $this->js_folder . '/' . $folder;
        $end = '"></script>';

        $this->_delimiter($pre, $end);
        $this->_set_js_asset($file);
        return $this;
    }

    public function set_partial($location = '', $view = '', $data = '') {
        if ($location != '' && $data != '') {
            $this->partial[$location] = array($location . '_data' => $this->ci->load->view($view, $data, TRUE));
        }
        return $this;
    }

    public function render($view, $data, $state = FALSE) {
        $this->_check_file();
        $this->prepdata['body'] = $this->ci->load->view($view, $data, TRUE);

        $this->ci->load->ci_view_path = $this->base;
        foreach ($this->partial as $key => $value) {
            $this->prepdata[$key] = parent::parse($key, $value, TRUE);
        }
        $this->metadata['metadata'] = $this->get_css();
       
        parent::parse('header', $this->metadata, FALSE);
        parent::parse('page', $this->prepdata, FALSE);
        parent::parse('footer', $data, FALSE);
    }

    private function _check_file() {
        if (!file_exists($this->base)) {
            show_error('template not found');
        }
    }

    private function _set_js_asset($file) {
        $result = array();
        if (is_array($file)) {
            foreach ($file as $key => $value) {
                $result[] = $this->delimiter['start'] . $value . '.js' . $this->delimiter['end'];
            }
        } else {
            $result[] = $this->delimiter['start'] . $file . '.js' . $this->delimiter['end'];
        }
        $this->js = array_merge($this->js, $result);
    }

    private function _set_css_asset($file) {
        $result = array();
        if (is_array($file)) {
            foreach ($file as $key => $value) {
                $result[] = $this->delimiter['start'] . $value . '.css' . $this->delimiter['end'];
            }
        } else {
            $result[] = $this->delimiter['start'] . $file . '.css' . $this->delimiter['end'];
        }
        $this->css = array_merge($this->css, $result);
    }

    private function _delimiter($start = '', $end = '') {
        $this->delimiter['start'] = $start;
        $this->delimiter['end'] = $end;
    }

}
