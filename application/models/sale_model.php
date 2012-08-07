<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sale_model
 *
 * @author satriaprayoga
 */
class Sale_model extends Lele_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name = 'sale';
    }

    public function find_by_menteri($menteri_id) {
        return $this->query(array('menteri_id' => $menteri_id));
    }

    public function find_by_month($month) {
        return $this->query(array('month' => $month));
    }

    public function find_by_menteri_and_month($menteri_id, $month) {
        return $this->query(array('month' => $month, 'menteri_id' => $menteri_id));
    }

    public function update_sale($point, $id) {
        $sale = $this->find_by_id($id);
        if ($sale->id>0) {
            $point = $point + $sale->point;
            $month = $sale->month;
            // $this->db->where('id',$id);
            //  $this->db->where('mont',$month);
            $this->db->update($this->table_name, array('point' => $point), array('id' => $id, 'month' => $month));
        }
    }

}
