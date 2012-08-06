<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Extractor
 *
 * @author satriaprayoga
 */
class Extractor {
    
    private $ci;
    
    public function __construct() {
        $this->ci=&get_instance();
    }
    
    public function extract_img($str){
        $img_result=array();
        preg_match_all('/<img[^>]+>/i', $str, $img_result);
        echo $str;
    }
    
    public function extract_iframe($str){
        echo $str;
    }
}

