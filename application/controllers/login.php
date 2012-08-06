<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author satriaprayoga
 */
class Login extends CI_Controller {

    private $rules = array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        )
    );

    public function __construct() {
        parent::__construct();
        $this->data->message='';
    }

    public function index() {
        $this->load->view('dashboard/login');
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->rules);
        if ($this->form_validation->run()) {
            $username = htmlspecialchars($this->input->post('username'));
            $password = hash('sha256', htmlspecialchars($this->input->post('password')));
            if ($this->auth->login($username, $password)) {
                if ($this->auth->get_role() == 'admin')
                    redirect(site_url('admin/home'));

                else
                    redirect(site_url(''));
            }else {
                $this->data->message = 'invalid username/password';
                $this->load->view('dashboard/login', $this->data);
            }
        }
    }

}
