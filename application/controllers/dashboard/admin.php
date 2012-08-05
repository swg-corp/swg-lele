<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author satriaprayoga
 */
class Admin extends Lele_Controller{
   
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->_view('dashboard/login');
    }
}

