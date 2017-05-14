<?php

class User extends MX_Controller {

    function __construct() {
        parent::__construct();
    }
    
    function check_cookie()
    {
         if(!isset($_COOKIE['remember_me'])) {
        echo "";
    } else {
        echo "";
      
        //precess login.
        //check table user for token $cookie.
        $this->load->model('mdl_user');
        $cookie_value=$_COOKIE['remember_me'];
        if($this->mdl_user->check_token_cookie($cookie_value)==TRUE)
        {
           // echo ' token corect';
               $user= $this->mdl_user->get_user_detail_where_token($cookie_value);
               $new_data = array('user_name' => $user->user_name, 'user_id' => $user->user_id, 'user_role' => $user->user_role, 'logged_in' => TRUE);
              $this->session->set_userdata($new_data);
               redirect('/dashboard/', 'refresh'); 
        } 
    }
    }
     function set_cookie($user_id)
    {
        $cookie_name = "remember_me";
        $cookie_value = md5(uniqid());//token unique
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        //insert token remember me to user table.
        $this->load->model('mdl_user');
        $this->mdl_user->update_token_remember_me($cookie_value,$user_id);  
    }
    
    
    function profile(){
       // $user_id= 56;
       $user_id=  $this->uri->segment(3);
          $data['current']=  $this->uri->segment(2);
        $data['description']='description';
        $data['keyword']='Keywords';
        $data['title']='Dashboard';
        $data['query']=  $this->get_where_custom('user_id', $user_id)->row();
       
          $data['view_file']='profile';//view file
         
       $data['module']='user';//module
         $this->load->module('template');
        $this->template->one_col($data);
    }

    function my_account(){
          echo Modules::run('site_security/make_sure_is_user');
        // from session get user ID. From user ID get user detail
        $user_id=  $this->session->userdata('user_id');  
        $this->load->model('mdl_user');
        $data['current']=  $this->uri->segment(2);
        $data['description']='description';
        $data['keyword']='Keywords';
        $data['title']='Dashboard';
        $data['query']=  $this->get_where_custom('user_id', $user_id);
       $data['view_file']='my_account';//view file
       $data['module']='user';//module
       $this->load->module('template');
       $this->template->dashboard($data);
    }

    function index() {
        echo 'user';
    }
    function login()
    {
      if ($this->session->userdata('logged_in') == TRUE) {
         redirect('/dashboard/', 'refresh'); 
       } 
        $data['current']= $this->uri->segment(2);
        $data['description']='description';
        $data['keyword']='Keywords';
        $data['title']='Login';
       $data['view_file']='login_form';//view file
       $data['module']='user';//module
        $this->load->module('template');
        $this->template->one_col($data);
    }
    function login_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_login', 'Email', 'required|callback_check_user');
        $this->form_validation->set_rules('password_login', 'Password', 'required');
        if ($this->form_validation->run($this) == TRUE) {
             //after everything ok get user detail save in session
            $this->load->model('mdl_user');
            $user = $this->mdl_user->get_user_detail($this->input->post('email_login'));
            $new_data = array('user_name' => $user->user_name, 'user_id' => $user->user_id, 'user_role' => $user->user_role, 'logged_in' => TRUE);
            // print_r($new_data);
            $this->session->set_userdata($new_data);
             //set cookie to remember user.
             $this->set_cookie($user->user_id);
          
             redirect('/dashboard/', 'refresh');

        } else {
            echo validation_errors();
        }
    }
     function check_user() {
        $this->load->model('mdl_user');
        if ($this->mdl_user->can_login()) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_user', 'Incorrect Email or password');
            return FALSE;
        }
    }
    function logout() {
        $this->session->sess_destroy();
        redirect('');
    }
  
     function check_email() {
        $this->load->model('mdl_user');
        if ($this->mdl_user->has_email()) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_email', 'The email address doesnt exist in our system');
            return FALSE;
        }
    }
    function update_reset_key(){
        $email=  $this->input->post('email');
         
    }
    function reset_password(){
       
          $data['description']='Reset Password';
        $data['keyword']='Reset Password';
        $data['title']='Reset Password';
         //validate reset code.
         if($this->check_reset_password_code()){
             $data['view_file']='reset_password';//view file
         }else{
            $data['view_file']='not_correct_reset_code';//view file
         }
       
       $data['module']='user';//module
        $this->load->module('template');
        $this->template->short_height($data);
    }
    function check_reset_password_code(){
        //get code from uri
         $code=  $this->uri->segment(3);
         if(strlen($code)<10){
             return FALSE;
             exit();
         }
        //get code from db
        $count=  $this->count_where('reset_password_key', $code);
        if($count==1){
            return TRUE;
        }else{
            return FALSE;
        }
        
        
    }
    function reset_password_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');
        if($this->form_validation->run($this)){
            $this->load->model('mdl_user');
            if($this->mdl_user->update_password()){
                  $array = array(); $array['success'] = true; $array['data'] = 'Reset Password successful';
            }else{
                  $array = array(); $array['success'] = false; $array['data'] = 'Password can not be reset unknown error from database';
            }
        }else{
              $array = array(); $array['success'] = false; $array['data'] = validation_errors();
        }
        echo json_encode($array);
        
    }
    //list user but not admin
    function list_user(){
         echo Modules::run('site_security/make_sure_is_admin');
         $data['query']=  $this->get_where_custom('user_role!=', 'admin');
           $data['description']='description';
         $data['current']=  $this->uri->segment(2);
        $data['keyword']='Keywords';
        $data['title']='Control';
       $data['view_file']='list_user';//view file
       $data['module']='user';//module
        $this->load->module('template');
        $this->template->admin($data);
    }
    function detail(){
         echo Modules::run('site_security/make_sure_is_admin');
         $id=  $this->uri->segment(3);
         $data['query']=  $this->get_where_custom('user_id', $id);
           $data['description']='description';
         $data['current']=  $this->uri->segment(2);
        $data['keyword']='Keywords';
        $data['title']='Control';
       $data['view_file']='detail';//view file
       $data['module']='user';//module
        $this->load->module('template');
        $this->template->admin($data);
    }
    ///////////////////////////////////////// Copy stuff////////////////////////////
    function get($order_by) {
        $this->load->model('mdl_user');
        $query = $this->mdl_user->get($order_by);
        return $query;
    }
    function get_with_limit($limit, $offset, $order_by) {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_user');
        $query = $this->mdl_user->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_user');
        $query = $this->mdl_user->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_user');
        $query = $this->mdl_user->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_user');
        $this->mdl_user->_insert($data);
    }

    function _update($id, $data) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_user');
        $this->mdl_user->_update($id, $data);
    }

    function _delete($id) {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_user');
        $this->mdl_user->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_user');
        $count = $this->mdl_user->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_user');
        $max_id = $this->mdl_user->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_user');
        $query = $this->mdl_user->_custom_query($mysql_query);
        return $query;
    }

}
