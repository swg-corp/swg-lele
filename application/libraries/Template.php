<?php

if (!defined('BASEPATH'))
    exit('No direct script allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 *
 * @author satriaprayoga
 */
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
    private $script = array();
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

    public function get_metadata() {
        $output = '';
        foreach ($this->script as $key => $value) {
            $output.=$this->value;
        }
        return $output;
    }

    public function get_title() {
        return $this->metadata['title'];
    }

    public function set_template($name = 'default') {
        $this->base = $this->path . $name . '/';
        $this->name = $name;
        return $this;
    }

    public function set_title($title = 'title') {
        $this->metadata['title'] = $title;
        return $this;
    }

    public function set_css($folder = '', $file = '') {
        if (func_num_args() < 2) {
            $folder = '';
            $file = func_get_arg(0);
        } else {
            $folder = $folder . '/';
        }
        $start_tag = '<link href="';
        $start_tag.=base_url() . $this->base . $this->css_folder . '/' . $folder;
        $end_tag = '" rel="stylesheet">';

        $this->_delimiter($start_tag, $end_tag);
        $this->_set_asset($file, 'css');
        return $this;
    }

    public function set_js($folder = '', $file = '') {
        if (func_num_args() < 2) {
            $folder = '';
            $file = func_get_arg(0);
        } else {
            $folder = $folder . '/';
        }
        $start_tag = '<script type="text/javascript" src="';
        $start_tag.=base_url() . $this->base . $this->js_folder . '/' . $folder;
        $end_tag = '/></script>';

        $this->_delimiter($start_tag, $end_tag);
        $this->_set_asset($file, 'js');
        return $this;
    }

    public function set_partial($location = '', $view = '', $data = '') {
        if ($location != '' && $data != '') {
            $this->partial[$location] = array($location . '_data' => $this->ci->load->view($view, $data, TRUE));
        }
        return $this;
    }

    public function render($view, $data) {
        $this->_cek_file();
        $this->prepdata['body']=$this->ci->load->view($view,$data,TRUE);
        
        $this->ci->load->_ci_view_path = $this->base;
        
        foreach ($this->partial as $key => $value) {
            $this->prepdata[$key] = parent::parse($key,$val,TRUE);
        }
        $this->metadata['metadata'] = $this->get_metadata();
        
        parent::parse('header',$this->metadata,FALSE);
        parent::parse('page', $this->prepdata, FALSE);
        parent::parse('footer', $data, FALSE);
    }

    private function _cek_file() {
        if (!file_exists($this->base)) {
            show_error('File template dengan nama "<b>' . $this->name . '</b>" tidak dapat ditemukan');
        }
    }

    private function _set_asset($file, $extension) {
        $result = array();
        if (is_array($file)) {
            foreach ($file as $key => $value) {
                $result[] = $this->delimiter['start'] . $value . '.'
                        . $extension . $this->delimiter['end'];
            }
        } else {
            $result[] = $this->delimiter['start'] . $file . '.' . $extension . $this->delimiter['end'];
        }
        $this->script = array_merge($this->script, $result);
    }

    private function _delimiter($start = '', $end = '') {
        $this->delimiter['start'] = $start;
        $this->delimiter['end'] = $end;
    }

}
