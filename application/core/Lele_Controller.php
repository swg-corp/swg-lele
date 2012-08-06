<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lele_Controller
 *
 * @author satriaprayoga
 */
class Lele_Controller extends CI_Controller{
   
    function __construct() {
        parent::__construct();
        $this->load->library('doctrine');
        $this->data->css=array();
        $this->data->js=array();
        $this->set_css('bootstrap', base_url('assets/css/bootstrap.min.css'));
        $this->set_css('bootstrap-responsive',base_url('assets/css/bootstrap-responsive.min.css'));
        $this->set_css('font-awesome',base_url('assets/css/font-awesome.css'));
        $this->set_css('admin',base_url('assets/css/admin.css'));
        $this->set_js('jquery', base_url('assets/js/jquery-1.7.2.min.js'));
        $this->set_js('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js');
        $this->set_js('bootstrap-js', base_url('assets/js/bootstrap.min.js'));
    }
    
    protected function _view($view='',$data=array()){
        $this->load->view('dashboard/template/header',$data);
        $this->load->view($view,$data);
        $this->load->view('dashboard/template/footer',$data);
    }
    
    protected function set_css($css_name,$css_uri){
        $this->data->css[$css_name]=$css_uri;
    }
    
    protected function set_js($js_name,$js_uri){
        $this->data->js[$js_name]=$js_uri;
    }
    
    protected function set_js_cust($script=''){
        $this->data->script=$script;
    }
}
