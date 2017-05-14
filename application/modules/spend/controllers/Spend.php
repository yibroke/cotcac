<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spend extends MX_Controller {

    function __construct() {
        parent::__construct();
    }
    function total_spend()
    {
        $this->load->model('mdl_spend');
       $data['query']= $this->mdl_spend->spend_by($m=12);
       $data['view_file'] = 'total_spend'; //view file
        $data['module'] = 'spend'; //module
        $this->load->module('template');
        $this->template->dashboard($data);
    }
    function list_spend()
    {
        
           $now = new DateTime('now');
       $month1 = $now->format('m');
         $year1 = $now->format('Y');
        $soft=  $this->uri->segment(5);// can make soft by most expensive stuff.
        $month=  ($this->uri->segment(3))?$this->uri->segment(3) : $month1;
        $year=  ($this->uri->segment(4))?$this->uri->segment(4) : $year1;
       // $year=  $this->uri->segment(4);
       $data['current']=  $this->uri->segment(1);
        $data['query']=  $this->get($soft,$month,$year);
        $data['view_file'] = 'list_spend'; //view file
        $data['module'] = 'spend'; //module
        $this->load->module('template');
        $this->template->dashboard($data);
    }
     function get_data_from_post() {
        $data['price'] = $this->input->post('price', TRUE);
        $data['type']=$this->input->post('type', TRUE);// category
        $data['name']=$this->input->post('name', TRUE);// category
        $data['note'] = $this->input->post('note', TRUE);
        $data['date']=date('Y-m-d H:i:s');
        return $data;
    }
    function get_data_from_db($update_id){
         $query = $this->get_where($update_id);
         $data['price'] =$query->row()->price;
        $data['type'] = $query->row()->type;
        $data['name'] = $query->row()->name;
        $data['note'] = $query->row()->note;
       
        if(!isset($data)){
            $data='';
        }
        return $data;
    }
    function insert_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $update_id = $this->input->post('id', TRUE);
        if ($this->form_validation->run($this) == TRUE) {
            $data = $this->get_data_from_post();
               if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
            } else {
              $this->_insert($data);
            }
            redirect('spend/list_spend');
        } else {
            echo validation_errors();
        }
    }
    function add_spend()
    {
         $update_id = $this->uri->segment(3); //get the update id from the url
          //get the update id from the post
        if (!isset($update_id)) {
            $update_id = $this->input->post('id', TRUE);
        }
        if (is_numeric($update_id)) {
            $data = $this->get_data_from_db($update_id);
            $data['update_id'] = $update_id;
        } else {
            $data = $this->get_data_from_post();
        }
         $this->load->model('spend_type/mdl_spend_type');
         $data['types'] = $this->mdl_spend_type->get('id')->result();
       
         $data['update_id']=$update_id;//use this for the hidden fifle
             //get the update id from the post
        $data['view_file'] = 'add_spend'; //view file
        $data['module'] = 'spend'; //module
        $this->load->module('template');
        $this->template->dashboard($data);
    }

    function get($order_by,$m,$y) {
        $this->load->model('mdl_spend');
        $query = $this->mdl_spend->get($order_by,$m,$y);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_spend');
        $query = $this->mdl_spend->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_spend');
        $query = $this->mdl_spend->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_spend');
        $query = $this->mdl_spend->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_spend');
        $this->mdl_spend->_insert($data);
    }

    function _update($id, $data) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_spend');
        $this->mdl_spend->_update($id, $data);
    }

    function _delete($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_spend');
        return  $this->mdl_spend->_delete($id);
        
    }

    function count_where($column, $value) {
        $this->load->model('mdl_spend');
        $count = $this->mdl_spend->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_spend');
        $max_id = $this->mdl_spend->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_spend');
        $query = $this->mdl_spend->_custom_query($mysql_query);
        return $query;
    }

}
