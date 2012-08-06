<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author satriaprayoga
 */
class Article extends Lele_Controller{
    
    private $rules=array(
        array(
            'field'=>'title',
            'label'=>'Title',
            'rules'=>'required'
        )
    );
    
    public function __construct() {
        parent::__construct();
        $this->load->library('extractor');
        
    }
    
    public function index(){
         $this->data->articles=$this->doctrine->em->getRepository('models\Artikel')->findAll();
         if(empty($this->data->articles)){
             $this->data->message='no articles found';
         }
         $this->_view('admin/article',$this->data);
    }
    
    public function add(){
        $this->set_css('wysiwyg', base_url('assets/css/bootstrap-wysihtml5.css'));
        $this->set_js('wysihtml5', base_url('assets/js/wysihtml5-0.3.0.js'));
        $this->set_js('bootstrap-wysihtml5', base_url('assets/js/bootstrap-wysihtml5.js'));
        $this->set_js_cust('$'.'("#txt").wysihtml5();');
        $this->data->title='';
        $this->data->content='';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->rules);
        if($this->form_validation->run()){
            $title=$this->input->post('title');
            $content=$this->input->post('content');
            $article=new models\Artikel();
            $article->setArtikel_name($title);
            $article->setArtikel_content($content);
            $article->setArtikel_release(new DateTime('now'));
            $this->doctrine->em->persist($article);
            $this->doctrine->em->flush();
            redirect(site_url('admin/article'));
        }
        $this->_view('admin/article_form',$this->data);
    }
    
    public function delete($id){
        
    }
    
    public function update($id){
        
    }
    
}
