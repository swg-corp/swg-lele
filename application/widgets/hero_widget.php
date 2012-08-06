<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hero_widget
 *
 * @author satriaprayoga
 */
class hero_widget extends Widget {

    public function display($args) {
        $data = array('title' => $args['title'],
            'text' => $args['text']);

        $this->load->view('widgets/hero', $data);
    }

}

