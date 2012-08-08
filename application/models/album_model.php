<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of album_model
 *
 * @author satriaprayoga
 */
class Album_model extends Lele_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name = 'album';
    }

    public function paginate($limit = 10, $offset = 0) {
        $data = array();

        $this->db->select('album.*, COUNT(image.id) as total_images')
                ->from($this->table_name)
                ->join('image', 'image.album_id = album.id', 'left')
                ->group_by('album.id')
                ->limit($limit, $offset)
                ->order_by('create_date', 'desc');
        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

}
