<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comment_model
 *
 * @author satriaprayoga
 */
class Comment_model extends Lele_Model {
 
    public function __construct() {
        parent::__construct();
        $this->table_name='comment';
    }
}
