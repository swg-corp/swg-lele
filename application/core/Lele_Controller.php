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
    }
    
    protected function _view($view='',$data=array()){
        $this->load->view($view,$data);
    }
}
