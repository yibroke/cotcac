<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_spend extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "spend";
        return $table;
    }

    function spend_by($m)
    {
         $this->db->select('spend.*,spend_type.id as type_id, spend_type.name as type_name');
        $this->db->from('spend');
        $this->db->join('spend_type','spend_type.id=spend.type');
        $this->db->where($m, 'MONTH(spend.date)' , FALSE);
        $this->db->where(2016, 'YEAR(spend.date)' , FALSE);
        $this->db->order_by('spend.id');
        $query = $this->db->get();
        return $query;
        
    }

    function get($order_by,$m,$y) {
        $this->db->select('spend.*,spend_type.id as type_id, spend_type.name as type_name');
        $this->db->from('spend');
        $this->db->join('spend_type','spend_type.id=spend.type');
        $this->db->where($m, 'MONTH(spend.date)' , FALSE);
        $this->db->where($y, 'YEAR(spend.date)' , FALSE);
        //change the order by
        if ($order_by == '' || $order_by == 'id') {
            $this->db->order_by('spend.id', 'DESC');
        
        } else {
             $this->db->where('spend_type.id',$order_by);
            $this->db->order_by('spend.id', 'DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $table = $this->get_table();
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }

    function get_where($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_where_custom($col, $value) {
        $table = $this->get_table();
        $this->db->where($col, $value);
        $query = $this->db->get($table);
        return $query;
    }

    function _insert($data) {
        $table = $this->get_table();
        $this->db->insert($table, $data);
    }

    function _update($id, $data) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function _delete($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->delete($table);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function count_where($column, $value) {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function count_all() {
        $table = $this->get_table();
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_max() {
        $table = $this->get_table();
        $this->db->select_max('id');
        $query = $this->db->get($table);
        $row = $query->row();
        $id = $row->id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }

}
