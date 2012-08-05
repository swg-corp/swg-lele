<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('bootstrap');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->_init_style_script();
        $news = array(); // load from model (but using a dummy array here)
        $this->bootstrap->content->view('news', $news);

        // set a partial's content
        $this->bootstrap->copyright = '&copy; Special Company 2011';

        // publish the bootstrap
        $this->bootstrap->publish();
    }
    
    private function _init_style_script(){
         $this->bootstrap->title = 'Welcome!';

        // dynamically add a css stylesheet
        $this->bootstrap->stylesheet->add(base_url('assets/css/bootstrap.min.css'));
        $this->bootstrap->stylesheet->add(base_url('assets/css/bootstrap-responsive.min.css'));
        $this->bootstrap->stylesheet->add(base_url('assets/css/style.css'));
        $this->bootstrap->javascript->add(base_url('assets/js/bootstrap.js'));

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */