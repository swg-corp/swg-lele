<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of api
 *
 * @author satriaprayoga
 */
class Api extends Lele_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('album_model');
        $this->load->model('image_model');
    }

    public function upload($album_id) {
        $config = array();
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048'; // 2MB
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = FALSE;
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('Filedata')) {
           echo $this->upload->display_errors();
        } else {
            $upload_info = $this->upload->data();
            $now = date('Y-m-d H:i:s');
            $image_data = array(
                'album_id' => $album_id,
                'name' => $upload_info['file_name'],
                'caption' => '',
                'raw_name' => $upload_info['raw_name'],
                'ext' => $upload_info['file_ext'],
                'size' => $upload_info['file_size'],
                'full_path' => $upload_info['full_path'],
                'upload_date' => $now,
            );
            $image_id = $this->image_model->create($image_data);
            echo $image_id;
        }
    }

}
