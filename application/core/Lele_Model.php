<?php

if (!defined('BASEPATH'))
    exit('no direct script allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lele_Model
 *
 * @author satriaprayoga
 */
class Lele_Model extends CI_Model {

    protected $table_name;

    public function __construct() {
        parent::__construct();
    }

    public function find_all() {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function page($limit = 10, $offset = 0) {
        $data = array();
        $this->db->limit($limit, $offset);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function find_by_id($id) {
        $q = $this->db->get_where($this->table_name, array('id' => $id));
        return $q->row();
    }
    
   
    
    public function query($args=array()){
        $q=$this->db->get_where($this->table_name,$args);
        return $q->row();
    }
    
    public function query_object_list($args){
        $q=$this->db->get_where($this->table_name,$args);
        return $q->result();
    }

    public function create($data = array()) {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data = array()) {
        $this->db->update($this->table_name, $data, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete($this->table_name, array('id' => $id));
    }

    public function get_table_name() {
        return $this->table_name;
    }

}