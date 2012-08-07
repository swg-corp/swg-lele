<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menteri
 *
 * @author satriaprayoga
 */
class Menteri extends Lele_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->is_logged_in() == FALSE || ($this->get_loggin_role() != 'admin')) {
            redirect(site_url('authentication'));
        } else {
            $this->load->model('menteri_model');
            $this->load->model('user_model');
        }
    }

    public function index() {
        $uri = $this->uri->segment(3);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $item = 10;
        $menteri = $this->menteri_model->page($item, $offset);
        $total_menteri = count($this->menteri_model->find_all());
        
        $data = array();
        $menteries=array();
        foreach ($menteri as $key=>$m) {
            $menteries[]=array(
                'name'=>$m['name'],
                'email'=>$this->user_model->find_by_id($m['user_id'])->email,
                'last_login'=>$this->user_model->find_by_id($m['user_id'])->last_logged_in
            );
        }
        $data['menteries'] = $menteries;
        $this->load->library('pagination');
        
        $config = array();
        $config['base_url'] = site_url('menteri/index');
        $config['total_rows'] = $total_menteri;
        $config['per_page'] = $item;
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
        $config['use_page_numbers'] = TRUE;
        
        $this->pagination->initialize($config);
        $this->load->view('menteri/index',$data);
    }

    public function add() {
        
    }

}

