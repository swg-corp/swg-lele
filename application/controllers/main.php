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
        $this->template->set_css(array('bootstrap','bootstrap-responsive'));
    }
}

