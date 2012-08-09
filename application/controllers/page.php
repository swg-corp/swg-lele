<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page
 *
 * @author satriaprayoga
 */
class Page extends Lele_Controller{
    
    public function __construct() {
        parent::__construct();
        if($this->is_logged_in()){
            $this->load->model('page_model');
        }else{
            redirect(site_url('authentication'));
        }
    }
    
    public function index(){
        $data=array();
        $data['pages']=$this->page_model->find_all();
        $this->load->view('page/index',$data);
    }
    
    public function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title','Title','trim|required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('page/add');
        }else{
            $page_data=array();
            $page_data['title']=$this->input->post('title');
            $page_data['image_header']=$this->input->post(htmlspecialchars('image_header'));
            $page_data['content']=$this->input->post(htmlspecialchars('content'));
            $page_data['status']=$this->input->post('status');
            $id=$this->page_model->create($page_data);
            redirect(site_url('page/view/'.$id));
        }
    }
    
    public function view($id){
        $data=array();
        $data['page']=$this->page_model->find_by_id($id);
        $this->load->view('page/view',$data);
    }
}
