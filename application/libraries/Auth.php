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
    
    
    public function login($username,$password){
        $repo=$this->ci->doctrine->em->getRepository('models\user');
        $user=$repo->findOneBy(array('username'=>$username,'password'=>$password));
        if(isset($user)){
            $this->ci->session->set_userdata(array(
                "uname"=>$user->getUsername(),
                "role"=>$user->getRole()
            ));
            return TRUE;
        }else{
            return FALSE;
        }
        /*
        $repo=$this->ci->doctrine->em->getRepository('models'.'\\'.$table);
     
        return $repo->findOneBy(array('user_name'=>$username,'password'=>$password));
       */
    }
    
    public function logout(){
        $this->ci->session->set_userdata(array(
            'uname'=>'',
            'role'=>''
        ));
        $this->ci->session->sess_destroy();
    }
    
    public function is_login($username){
        return $this->ci->session->userdata('uname')===$username;
    }
    
}

