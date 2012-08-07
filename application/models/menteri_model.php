<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menteri_model
 *
 * @author satriaprayoga
 */
class Menteri_model extends Lele_Model{
   
    public function __construct() {
        parent::__construct();
        $this->table_name='menteri';
    }
    
    public function find_by_user_id($user_id){
        return $this->query(array('user_id'=>$user_id));    
    }
    
    public function create($data = array()) {
        $insert_id=parent::create($data);
        $iid=$this->find_by_user_id($insert_id)->id;
        $this->load->model('sale_model');
        $this->sale_model->create(array(
            'menteri_id'=>$iid,
            'point'=>0,
            'month'=>  date('F')
        ));
        return $iid;
    }
   
}
