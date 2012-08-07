<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author satriaprayoga
 */
class Authentication extends Lele_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['email'] = '';
        $this->load->view('auth/index', $data);
        if ($this->is_logged_in() === TRUE) {
            redirect(site_url('dashboard'));
        }
    }

    public function login() {
        $email = $this->input->post('email');
        $passwd = $this->input->post('password');
        if ($this->auth->login($email, $passwd) === TRUE) {
            $this->session->set_flashdata('flash_message', 'you are logged in!');
            redirect(site_url('dashboard'));
        } else {
            $data = array();
            $data['login_error'] = 'Incorrect login';
            $data['email'] = $this->input->post('email');

            $this->load->view('auth/index', $data);
        }
    }

    public function logout() {
        $this->auth->logout();
        redirect(site_url('authentication'));
    }

}
