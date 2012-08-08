<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article_model
 *
 * @author satriaprayoga
 */
class Article_model extends Lele_Model{
    
    public function __construct() {
        parent::__construct();
        $this->table_name='article';
    }
    
    public function find_by_date($date) {
        if(empty($date)){
            $date=  date("M-d-Y");
        }
        return $this->query_object_list(array('create_data<='=>$date));
    }
    
    public function  find_by_status($status='draft'){
        return $this->query_object_list(array('status'=>$status));
    }
}