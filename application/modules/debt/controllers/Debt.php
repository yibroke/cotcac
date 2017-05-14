<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Debt extends MX_Controller {

    function __construct() {
        parent::__construct();
    }
    function add_debt()
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
        $data['view_file'] = 'add_debt'; //view file
        $data['module'] = 'debt'; //module
        $this->load->module('template');
        $this->template->dashboard($data);
    }
    function list_debt()
    {
         $data['current']=  $this->uri->segment(1);
         $data['query']=  $this->get('id');
        $data['view_file'] = 'list_debt'; //view file
        $data['module'] = 'debt'; //module
        $this->load->module('template');
        $this->template->dashboard($data);
    }
     function get_data_from_post() {
        $data['price'] = $this->input->post('price', TRUE);
        
        $data['name']=$this->input->post('name', TRUE);// category
        $data['owner']=$this->input->post('owner', TRUE);// category
        $data['pay_day']=$this->input->post('pay_day', TRUE);// category
        $data['note'] = $this->input->post('note', TRUE);
        $data['date']=date('Y-m-d H:i:s');
        return $data;
    }
    function get_data_from_db($update_id){
         $query = $this->get_where($update_id);
         $data['price'] =$query->row()->price;
        $data['owner'] = $query->row()->owner;
        $data['name'] = $query->row()->name;
        $data['pay_day'] = $query->row()->pay_day;
        $data['note'] = $query->row()->note;
        if(!isset($data)){
            $data='';
        }
        return $data;
    }
    function insert_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('owner', 'Owner', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('pay_day', 'Pay day', 'required');
        $update_id = $this->input->post('id', TRUE);
        if ($this->form_validation->run($this) == TRUE) {
            $data = $this->get_data_from_post();
               if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
            } else {
              $this->_insert($data);
            }
            redirect('debt/list_debt');
        } else {
            echo validation_errors();
        }
    }


    function get($order_by) {
        $this->load->model('mdl_debt');
        $query = $this->mdl_debt->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_debt');
        $query = $this->mdl_debt->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_debt');
        $query = $this->mdl_debt->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_debt');
        $query = $this->mdl_debt->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_debt');
        $this->mdl_debt->_insert($data);
    }

    function _update($id, $data) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_debt');
        $this->mdl_debt->_update($id, $data);
    }

    function _delete($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_debt');
        return  $this->mdl_debt->_delete($id);
        
    }

    function count_where($column, $value) {
        $this->load->model('mdl_debt');
        $count = $this->mdl_debt->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_debt');
        $max_id = $this->mdl_debt->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_debt');
        $query = $this->mdl_debt->_custom_query($mysql_query);
        return $query;
    }

}
