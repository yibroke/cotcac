<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends MX_Controller {

    function __construct() {
        parent::__construct();
    }
    function first()
    {
         $data['current']= 'index';
       $data['view_file']='first';//view file
       $data['module']='test';//module
        $this->load->module('template');
        $this->template->one_col($data);
    }
    function Iframe()
    {
         $data['view_file'] = 'iframe'; //view file
        $data['module'] = 'test'; //module
        $this->load->module('template');
        $this->template->one_col($data);
    }
    function colorpicker(){
         $data['current'] = 1;
        $data['description'] = 'description';
        $data['keyword'] = 'Keywords';
        $data['title'] = 'Dashboard';
        $data['query'] = $this->get('id');
        $data['view_file'] = 'color_picker'; //view file
        $data['module'] = 'test'; //module
        $this->load->module('template');
        $this->template->one_col($data);
    }
    function location()
    {
        $data['query']=  $this->reuse_model_function->_list('vote');
        $data['view_file'] = 'location'; //view file
        $data['module'] = 'test'; //module
        $this->load->module('template');
        $this->template->one_col($data);
    }
    function one_page()
    { 
       $data['view_file'] = 'one_page'; //view file
       $data['module'] = 'test'; //module
       $this->load->module('template');
       $this->template->one_col($data);
    }
    //facebook comment, like
    function facebook(){
        $data['current']= 'index';
        // $this->load->model('mdl_user');
        $data['description']='description';
        $data['keyword']='Keywords';
        $data['title']='Home';
        
       // $data['results']=  $this->mdl_post->get();
       $data['view_file']='facebook';//view file
       $data['module']='test';//module
        $this->load->module('template');
        $this->template->one_col($data);
    }
    function fb_login()
    {
        $user_name=  $this->input->post('user_name');
        $user_id=  $this->input->post('user_id');//use user_id instead of email
        //check facebook id. already exist.
        //if already login like nomal
        //else register.
        //--------------- Step 1 echk facebook id in database -->
          $this->load->library('form_validation');
      
        $this->form_validation->set_rules('user_id', 'Facebook ID', 'required|trim|is_unique[user.user_email]');
       
        //costum is_unique error message
        $this->form_validation->set_message('is_unique', 'The Facebook ID already exist');
        if ($this->form_validation->run($this)) {
          $this->load->model('mdl_user');
       
            if ($this->mdl_user->insert_user_from_fb() == TRUE) {
               //success
                    $new_data = array('user_name' => $user_name, 'user_id' => $user_id, 'user_role' => 'user', 'logged_in' => TRUE);
                // print_r($new_data);
              $this->session->set_userdata($new_data);
               echo 'true';
             
            } else {
               //fail
               echo 'error';
            }
           
        } else {
           //fail
            echo validation_errors();
        }    
    }

    //Your code go here

    function index() {
        $data['current'] = 1;
        $data['description'] = 'description';
        $data['keyword'] = 'Keywords';
        $data['title'] = 'Dashboard';
        $data['query'] = $this->get('id');
        $data['view_file'] = 'list_test'; //view file
        $data['module'] = 'test'; //module
        $this->load->module('template');
        $this->template->one_col($data);
    }

    function insert() {
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
        $data['current'] = 1;
        $data['description'] = 'description';
        $data['keyword'] = 'Keywords';
        $data['title'] = 'Dashboard';
        $data['query'] = $this->get('id');
        $data['view_file'] = 'insert'; //view file
        $data['module'] = 'test'; //module
        $this->load->module('template');
        $this->template->one_col($data);
    }

    function get_data_from_post() {
        $data['name'] = $this->input->post('name', TRUE);
        return $data;
    }

    function get_data_from_db($update_id) {
        $query = $this->get_where($update_id);
        $data['name'] = $query->row()->name;
        return $data;
    }

    function insert_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $update_id = $this->input->post('id', TRUE);
        if ($this->form_validation->run($this) == TRUE) {
            $data = $this->get_data_from_post();
            if (is_numeric($update_id)) {
               
                $this->_update($update_id, $data);
               
            } else {
              $this->_insert($data);
                
            }
            redirect('test');
        } else {
            echo 0;
            echo validation_errors();
        }
    }
    function delete(){
        $id= $this->input->post('id');
        
        if($this->_delete($id))
        {
            echo 'true';
        }
        else 
        {
          echo 'false';
        }
    }

    //database stuff//

    function get($order_by) {
        $this->load->model('mdl_test');
        $query = $this->mdl_test->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_test');
        $query = $this->mdl_test->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_test');
        $query = $this->mdl_test->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_test');
        $query = $this->mdl_test->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_test');
        $this->mdl_test->_insert($data);
    }

    function _update($id, $data) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_test');
        $this->mdl_test->_update($id, $data);
    }

    function _delete($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_test');
        return $this->mdl_test->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_test');
        $count = $this->mdl_test->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_test');
        $max_id = $this->mdl_test->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_test');
        $query = $this->mdl_test->_custom_query($mysql_query);
        return $query;
    }

}
