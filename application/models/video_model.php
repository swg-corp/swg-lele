<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video_model
 *
 * @author satriaprayoga
 */
class Video_model extends Lele_Model{
    
    public function __construct() {
        parent::__construct();
        $this->table_name='video';
    }
    
    public function find_by_title($title){
        $this->query_object_list(array('$title'=>$title));
    }
}
