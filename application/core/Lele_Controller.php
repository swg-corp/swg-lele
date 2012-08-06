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
    }
    
    protected function _view($view='',$data=array()){
        $this->load->view('dashboard/template/header',$data);
        $this->load->view($view,$data);
        $this->load->view('dashboard/template/footer',$data);
    }
}
