<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MX_Controller
{
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['current']= 'index';
        // $this->load->model('mdl_user');
        $data['description']='description';
        $data['keyword']='Keywords';
        $data['title']='Home';
        
       // $data['results']=  $this->mdl_post->get();
       $data['view_file']='home';//view file
       $data['module']='home';//module
        $this->load->module('template');
        $this->template->one_col($data);
    }
    function not_allow(){
         $data['description']='Access Denied';
        $data['keyword']='Access Denied';
        $data['title']='Access Denied';
       $data['view_file']='not_allow';//view file
       $data['module']='home';//module
        $this->load->module('template');
        $this->template->one_col($data);
    }
    function help()
    {
        $data['current']=  $this->uri->segment(2);
        $data['description']='Guide and Help';
        $data['keyword']='Guide and Help';
        $data['title']='Guide and Help';
       $data['view_file']='help';//view file
       $data['module']='home';//module
        $this->load->module('template');
        $this->template->one_col($data);
    }
    function test()
    {
        echo 'Test is running....';
    }
    // Call other module
    function call()
    {
        $this->load->module('about');
        $this->about->test();
        //other way
        echo Modules::run('about/test');
        
    }
    //call other module with variable
    function call_name()
    {
        $name='Kinny';
        $this->load->module('about');
        $this->about->hello($name);
    }
    function call_temp()
    {
        $this->load->model('mdl_post');
        $data['results']=  $this->mdl_post->get();
       $data['view_file']='post';//view file
       $data['module']='home';//module
       
       
     
      //  echo Modules::run('template/one_col',$data);
      //  echo Modules::run('template/two_col',$data);
        //echo Modules::run('template/admin_col',$data);
        
        
        //other way
         $this->load->module('template');
        $this->template->one_col($data);
        
    }
}

