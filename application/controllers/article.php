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
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('title','Title','trim|required|max_length[100]|xss_clean');
        $this->form_validation->set_rules('status','Status','trim|required');
        $now = date('Y-m-d H:i:s');
        if($this->form_validation->run()==FALSE){
            $this->load->view('article/create');
        }else{
            $data=array(
                'title'=>$this->input->post('title'),
                'content'=>$this->input->post('content'),
                'status'=>$this->input->post('status'),
                'publish_date'=>(strcmp($this->input->post('status'), 'publish'))?$now:NULL
            );
            $this->article_model->create($data);
            $this->session->set_flashdata('flash_message', "Successfully created album.");
            redirect(site_url('article'));
            
        }
    }

}

