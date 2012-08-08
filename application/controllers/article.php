<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author satriaprayoga
 */
class Article extends Lele_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->is_logged_in() == FALSE || ($this->get_loggin_role() != 'admin')) {
            redirect(site_url('authentication'));
        }else{
             $this->load->model('article_model');
        }
       
    }

    public function index() {
        $data = array();
        $data['articles'] = $this->article_model->find_all();
        $this->load->view('article/index', $data);
    }

    public function create() {
        $data = array();
        $article_data['title'] = $this->input->post('title');
      
        $article_data['content'] = $this->input->post('content');
        $this->article_model->create($article_data);
        $this->load->view('article/create', $data);
    }

}

