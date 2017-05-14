<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends MX_Controller {

    function __construct() {
        parent::__construct();
        echo Modules::run('site_security/make_sure_is_admin');
    }
    function index(){
          echo Modules::run('question/list_question');
    }
    function user(){
         $data['description']='description';
         $data['current2']=  $this->uri->segment(2);
        $data['keyword']='Keywords';
        $data['title']='Control';
       $data['view_file']='user';//view file
       $data['module']='control';//module
        $this->load->module('template');
        $this->template->admin($data);
    }

  

}
