<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of album
 *
 * @author satriaprayoga
 */
class Album extends Lele_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->is_logged_in() == FALSE || ($this->get_loggin_role() != 'admin')) {
            redirect(site_url('authentication'));
        } else {
            $this->load->model('album_model');
            $this->load->model('image_model');
        }
    }

    public function index() {
        $uri = $this->uri->segment(3);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $per_page = 10;
        $album_data = $this->album_model->paginate($per_page, $offset);
        $total = count($this->album_model->find_all());
        for ($i = 0; $i < count($album_data); $i++) {
            $album_data[$i]['images'] = $this->image_model->find_last($per_page, $album_data[$i]['id']);
        }
        $this->load->library('pagination');
        $data = array();
        $data['albums'] = $album_data;
        $config = array();
        $config['base_url'] = site_url('album/index');
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = '&larr; First';
        $config['last_link'] = 'Last &rarr;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 4;

        $this->pagination->initialize($config);

        $this->load->view('album/index', $data);
    }

    public function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('title', 'Album Name', 'trim|required|max_length[45]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('album/create');
        } else {
            $now = date('Y-m-d H:i:s');
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('desc'),
                'create_date' => $now
            );
            $new_id = $this->album_model->create($data);
            $this->session->set_flashdata('flash_message', "Successfully created album.");
            redirect(site_url('album/images/' . $new_id));
        }
    }

    public function images($album_id) {
        $data = array();
        $data['album'] = $this->album_model->find_by_id($album_id);
        $data['user_id']=$this->get_logged_id();
        $data['images']=$this->image_model->find_by_album_id($album_id);
        $this->load->view('album/images', $data);
    }

    public function resize($image_id) {
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

