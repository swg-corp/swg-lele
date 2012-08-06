<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author satriaprayoga
 */
class Home extends Lele_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
       $this->_view('admin/home',$this->data);
    }
}
