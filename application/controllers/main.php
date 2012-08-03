<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of main
 *
 * @author satriaprayoga
 */
class Main extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->template->set_template('basic');
        $this->data->message='message';
    }
    
    public function index(){
       $this->template->set_title('Test Title')
               ->set_css('bootstrap')
               ->render('main',$this->data);
       
    }
}

