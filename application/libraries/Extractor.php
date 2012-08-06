<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Ekstrak tag <img> dan <iframe> dari html string, buat disave 
 * sebagai url di Artikel_property
 *
 * @author satriaprayoga
 */
class Extractor {

    private $ci;

    public function __construct() {
        $this->ci = &get_instance();
    }

    public function extract_img($str) {
        $img_result = array();
        preg_match_all('/<img[^>]+>/i', $str, $img_result);
        $img = array();
        foreach ($img_result as $img_tag => $value) {
            foreach ($value as $key => $val) {
                $img[$key] = $val;
            }
        }

        return $img;
    }

    public function extract_iframe($str) {
        echo $str;
    }

}

