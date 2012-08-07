<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author satriaprayoga
 */
class User_model extends Lele_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name = 'user';
    }
  
    public function find_by_email_password($email, $password) {
        $query = $this->db->get_where($this->table_name,array('email' => $email, 'password' => sha1($password)));
        $valid_user = ($query->num_rows() > 0);
        $user_id=-1;
        if ($valid_user === TRUE) {
            $user_id=$query->row()->id;
           
        }
        return $user_id;
    }

    public function update_last_login($id) {
        $now = date('Y-m-d H:i:s');
        $this->db->update($this->table_name, array('last_logged_in' => $now), array('id' => $id));
        return $id;
    }
    
    public function change_password($id,$password){
        $this->update(array('password'=>$password), $id);
        return $id;
    }

}