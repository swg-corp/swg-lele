<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of image_model
 *
 * @author satriaprayoga
 */
class Image_model extends Lele_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name = 'image';
    }

    public function find_by_album_id($album_id) {
        return $this->query_object_list(array('album_id' => $album_id));
    }

    public function find_last($limit, $album_id) {
        $this->db->from($this->table_name)
                ->where(array('album_id' => $album_id))
                ->order_by('upload_date', 'asc')
                ->limit($limit);
        $q = $this->db->get();
        return $q->result();
    }
    
    public function delete_by_album_id($album_id){
        $this->db->delete($this->table_name,array('album_id'=>$album_id));
        return $album_id;
    }

}
