<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author satriaprayoga
 */
class Bootstrap extends CI_Parser {

    private $ci;
    private $name;
    private $path;
    private $base;
    private $css_folder = 'css';
    private $js_folder = 'js';
    private $img_folder = 'img';
    private $default = 'basic';
    private $css_src = array();
    private $js_src = array();
    private $delimiter = array();
    private $metadata = array('title' => 'title', 'metadata' => '');
    private $partial = array();
    private $prepdata = array();

    public function __construct() {
        $this->ci = &get_instance();
        $this->path = $this->ci->config->item('template_base');
        $this->base = $this->path . $this->default . '/';
    }

    public function use_asset() {
        $this->path = $this->base = $this->ci->config->item('asset_base');
        return this;
    }

    public function get_css_metadata() {
        $output = '';
        foreach ($this->css_src as $key => $value) {
            $output.=$this->value;
        }
        return $output;
    }

    public function get_js_metadata() {
        $output = '';
        foreach ($this->js_src as $key => $value) {
            $output.=$this->value;
        }
        return $output;
    }

    public function get_title() {
        return $this->metadata['title'];
    }

    public function set_template($name = 'basic') {
        $this->base = $this->path . $name . '/';
        $this->name = $name;
        return $this;
    }

    public function set_css($file = '') {
        $start_tag = '<link href="';
        $start_tag.=base_url() . $this->base . $this->css_folder . '/';
        $end_tag = '" rel="stylesheet">';

        $this->_delimiter($start_tag, $end_tag);
        $this->_set_asset($file, 'css', $this->css_src);
        return $this;
    }

    public function set_js($file = '') {
        $start_tag = '<script type="text/javascript" src="';
        $start_tag.=base_url() . $this->base . $this->js_folder . '/';
        $end_tag = '/></script>';

        $this->_delimiter($start_tag, $end_tag);
        $this->_set_asset($file, 'js', $this->js_src);
        return $this;
    }

    private function _cek_file() {
        if (!file_exists($this->base)) {
            show_error('File template dengan nama "<b>' . $this->name . '</b>" tidak dapat ditemukan');
        }
    }

    private function _set_asset($file, $extension, $script) {
        $result = array();
        if (is_array($file)) {
            foreach ($file as $key => $value) {
                $result[] = $this->delimiter['start'] . $value . '.'
                        . $extension . $this->delimiter['end'];
            }
        } else {
            $result[] = $this->delimiter['start'] . $file . '.' . $extension . $this->delimiter['end'];
        }
        $script = array_merge($script, $result);
    }

    private function _delimiter($start = '', $end = '') {
        $this->delimiter['start'] = $start;
        $this->delimiter['end'] = $end;
    }

}
