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
   
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('login');
    }
    
    public function do_login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        if($user=$this->auth->login_guest($username,$password)){
            echo $user->get_user_name().'<br/>';
            echo $user->getPassword();
        }
    }
}

?>
