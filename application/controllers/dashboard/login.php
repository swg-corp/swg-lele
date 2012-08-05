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
class Login extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('dashboard/login');
    }
    
    public function login(){
        $username=  htmlspecialchars($this->input->post('username'));
        $password= hash('sha256', htmlspecialchars($this->input->post('password')));
        if($this->auth->login($username,$password)){
            redirect('admin');
        }else{
            redirect('login');
        }
    }
}
