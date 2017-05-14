<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends MX_Controller {

    function __construct() {
        parent::__construct();
    }
    function total_spend()
    {
        $this->load->model('mdl_note');
       $data['query']= $this->mdl_note->spend_by($m=12);
       $data['view_file'] = 'total_spend'; //view file
        $data['module'] = 'spend'; //module
        $this->load->module('template');
        $this->template->dashboard($data);
        
    }
    function list_note()
    {
        $soft=  'id';
       $data['current']=  $this->uri->segment(1);
       
        $data['query']=  $this->get($soft);
        $data['view_file'] = 'list_note'; //view file
        $data['module'] = 'note'; //module
        $this->load->module('template');
        $this->template->dashboard($data);
    }
     function get_data_from_post() {
        $data['content'] = $this->input->post('content', TRUE);
        $data['date']=date('Y-m-d H:i:s');
        return $data;
    }
    function get_data_from_db($update_id){
         $query = $this->get_where($update_id);
         $data['content'] =$query->row()->content;
        if(!isset($data)){
            $data='';
        }
        return $data;
    }
    function insert_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $update_id = $this->input->post('id', TRUE);
        if ($this->form_validation->run($this) == TRUE) {
            $data = $this->get_data_from_post();
               if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
            } else {
              $this->_insert($data);
            }
            redirect('note/list_note');
        } else {
            echo validation_errors();
        }
    }
    function add_note()
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
     
       
         $data['update_id']=$update_id;//use this for the hidden fifle
             //get the update id from the post
        $data['view_file'] = 'add_note'; //view file
        $data['module'] = 'note'; //module
        $this->load->module('template');
        $this->template->dashboard($data);
    }

    function get($order_by) {
        $this->load->model('mdl_note');
        $query = $this->mdl_note->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_note');
        $query = $this->mdl_note->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_note');
        $query = $this->mdl_note->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_note');
        $query = $this->mdl_note->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_note');
        $this->mdl_note->_insert($data);
    }

    function _update($id, $data) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_note');
        $this->mdl_note->_update($id, $data);
    }

    function _delete($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_note');
        return  $this->mdl_note->_delete($id);
        
    }

    function count_where($column, $value) {
        $this->load->model('mdl_note');
        $count = $this->mdl_note->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_note');
        $max_id = $this->mdl_note->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_note');
        $query = $this->mdl_note->_custom_query($mysql_query);
        return $query;
    }

}
