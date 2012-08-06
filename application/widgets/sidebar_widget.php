<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sidebar_widget
 *
 * @author satriaprayoga
 */
class sidebar_widget extends Widget{
    
    public function display($args) {
      
        $this->load->view('widgets/sidebar', $args);
    }
}
