<?php

if (!defined('BASEPATH'))
    exit('no direct script allow');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author satriaprayoga
 */
class Dashboard extends Lele_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->is_logged_in() == FALSE) {
            redirect(site_url('authentication'));
        } else {
            $this->load->model('menteri_model');
            $this->load->model('user_model');
        }
    }

    public function index() {
        $id = $this->session->userdata('user_id');
        $menteri = $this->menteri_model->find_by_user_id($id);
        $data['menteri'] = $menteri;
        $this->load->view('dashboard/index', $data);
    }

    public function user_setting() {
        $id = $this->session->userdata('user_id');
        $menteri = $this->menteri_model->find_by_user_id($id);
        $data['menteri'] = $menteri;
        $data['email']=$this->session->userdata('email');
        $data['role']=$this->session->userdata('role');
        $this->load->view('dashboard/user_setting', $data);
    }

}
