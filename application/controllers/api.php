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

    public function upload_json() {
        $config = array();
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048'; // 2MB
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = FALSE;
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            echo stripslashes(json_encode($this->upload->display_errors()));
           // echo $this->upload->display_errors();
        } else {
            $upload_info = $this->upload->data();
            $now = date('Y-m-d H:i:s');
            $image_data = array(
                'album_id' => $this->album_model->find_by_title()->id,
                'name' => $upload_info['file_name'],
                'caption' => '',
                'raw_name' => $upload_info['raw_name'],
                'ext' => $upload_info['file_ext'],
                'size' => $upload_info['file_size'],
                'full_path' => $upload_info['full_path'],
                'upload_date' => $now,
            );
            $img_id=$this->image_model->create($image_data);
            $this->_resize($img_id);
            $filelink = base_url() . 'uploads/' . $upload_info['file_name'];
            $array = array("filelink" => $filelink);
            echo stripslashes(json_encode($array));
        }
    }
    
     protected function _resize($image_id) {
        $image = $this->image_model->find_by_id($image_id);
        if (isset($image)) {
            $this->load->library('image_lib');
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'uploads/' . $image->name;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 100;
            $config['height'] = 100;
            $config['thumb_marker'] = '_thumb';
            // TODO Handle cropping
            $this->image_lib->initialize($config);
            $this->image_lib->resize();

            $success = $this->image_lib->resize();
            $this->image_lib->clear();
        }
        if ($success == TRUE) {
            $ext=array('.jpg','.png','.gif','.jpeg');
            $name=$image->name;
            $var=  str_replace($ext, '_thumb', $name);
            $this->image_model->update($image_id,array('thumb'=>$var.$image->ext));
            echo $var . $image->ext;
        } else {
            echo 'failure';
        }
    }

}
