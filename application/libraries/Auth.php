<?php

if (!defined('BASEPATH'))
    exit('No direct script allowed');

/**
 * Auth class buat login
 *
 * @author satriaprayoga
 */
class Auth {

    private $ci;

    public function __construct() {
        $this->ci = &get_instance();
        $this->ci->load->model('user_model');
    }
    
    public function login($email,$password){
        $user_id=$this->ci->user_model->find_by_email_password($email,$password);
        if($user_id>0){
            $user=$this->ci->user_model->find_by_id($user_id);
            $this->_init_session($user);
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function logout(){
        $this->ci->session->set_userdata(array(
            'user_id'=>'',
            'email'=>'',
            'role'=>'',
            'logged_in'=>FALSE
        ));
        $this->ci->session->sess_destroy();
    }
    
    private function _init_session($user){
        $session_data=array(
            'user_id'=>$user->id,
            'email'=>$user->email,
            'role'=>$user->role,
            'logged_in'=>TRUE
        );
        $this->ci->user_model->update_last_login($user->id);
        $this->ci->session->set_userdata($session_data);
    }

    public function is_login() {
        $session_data = $this->ci->session->all_userdata();
        return (isset($session_data['user_id']) && $session_data['user_id'] > 0 && $session_data['logged_in'] == TRUE);
    }

}

