<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page_model
 *
 * @author satriaprayoga
 */
class Page_model extends Lele_Model{
    
    public function __construct() {
        parent::__construct();
        $this->table_name='page';
    }
}
