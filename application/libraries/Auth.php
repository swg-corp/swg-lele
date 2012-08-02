<?php if(!defined('BASEPATH'))
    exit('No direct script allowed');


/**
 * Auth class buat login
 *
 * @author satriaprayoga
 */
class Auth {
   
    private $ci;
    
    public function __construct() {
        $this->ci=&get_instance();
    }
    
    public function login_guest($username,$password){
        return $this->_login($username, $password, 'Guest');
    }
    
    public function login_menteri($username,$password){
        return $this->_login($username, $password,'Menteri');
    }
    
    public function is_login($username){
        return $this->ci->session->userdata('username')===$username;
    }
    
    private function _login($username,$password,$table=''){
        $repo=$this->ci->doctrine->em->getRepository('models'.'\\'.$table);
        return $repo->findOneBy(array('user_name'=>$username,'password'=>$password));
       
    }
    
    public function logout(){
        
    }
    
}

