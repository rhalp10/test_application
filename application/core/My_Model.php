<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model 
{
  
    function __construct() {   
        parent::__construct();
        $this->load->database();
       

    }	

    protected function getSingleValue($table, $where, $col_name) { // Returns a single column value from a single row
        $row = $this->getSingleRow($table, $where);
        if($row != false)
        {
            if( isset($row[$col_name]))
                return $row[$col_name];
        }
        return false;
    }
    protected function getSingleRow($table, $where) { // Returns a single row
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit(1);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
	protected function getAllRows($table, $where = false, $order_by = false, $order = "ASC", $limit = false) {
        $this->db->select('*');
        $this->db->from($table);
        if($where != false)
            $this->db->where($where);
        if($order_by != false)
            $this->db->order_by($order_by, $order);
        if($limit != false)
            $this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    protected function getSumValue($table, $where, $col_name) {
        $this->db->select_sum($col_name);
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->$col_name;
        }
        return false;
    }
    protected function getMinValue($table, $where, $col_name) {
        $this->db->select_min($col_name);
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->$col_name;
        }
        return false;
    }
    protected function getMaxValue($table, $where, $col_name) {
        $this->db->select_max($col_name);
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->$col_name;
        }
        return false;
    }
    protected function getCountValue($table, $where) {
        $this->db->select('COUNT(*) as n', false);
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->n;
        }
        return false;
    }
    protected function updateRows($table, $where, $data) {
        $this->db->where($where);
        $this->db->update($table, $data);
    } 
    protected function deleteFromDB($table, $where) {
        $this->db->delete($table, $where); 
    }
	public function getDistinctCategory($table, $field_name, $sort = true) {
        $this->db->select('t.' . $field_name . ' as cat');
        $this->db->from($table . ' t');
		if( $sort != false)
			$this->db->order_by('cat');
        $this->db->distinct();
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return false;
    }


    //     if(count($oldcols) != count($newcols))
    //         return false;
    //     $rowcount = 0;
    //     $newarray = array();
    //     foreach($oldarray as $row)
    //     {
    //         $colcount = 0;
    //         foreach($oldcols as $ocol)
    //         {
    //             $newarray[$rowcount][$newcols[$colcount]] = $row[$ocol];
    //             $colcount++;
    //         }
    //         $rowcount++;
    //     }
    //     return $newarray;
    // }
}
