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
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        )
    );

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $repo = $this->doctrine->getRepository('models/menteri');
        $this->data->menteries = $repo->findAll();
        $this->_view('dashboard/admin/menteri_list', $this->data);
    }

    public function register() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="message">', '</p>');
        $this->form_validation->set_rules($this->rules);
        if ($this->form_validation->run()) {
            $menteri = new models\Menteri();
            $user=new models\User();
            
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $address = $this->input->post('address');

            $menteri->setUserName($username);
            $menteri->setPassword($password);
            $menteri->setEmail($email);
            $menteri->setPhone($phone);
            $menteri->setAddress($address);
            
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setRole('menteri');
            
            $this->doctrine->em->persist($user);
            $this->doctrine->em->persist($menteri);
            
            $this->doctrine->em->flush();
            
            redirect(site_url('dashboard/admin/'));
            
        }

        
        $this->_view('dashboard/admin/register');
    }

}

