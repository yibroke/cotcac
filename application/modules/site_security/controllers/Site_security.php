<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Site_security extends MX_Controller {

    function __construct() {
        parent::__construct();
    }
    function make_sure_is_user()
    {
        $user_role=$this->session->userdata('user_role');
        if($user_role=='user' || $user_role=='admin')
        {
           echo '';
        }else{
             redirect('home/not_allow');
        }
    }
    function make_sure_is_admin(){

       
         $user_role=$this->session->userdata('user_role');
        
        if($user_role!='admin')
        {
            redirect('home/not_allow');
        }
    }
    function not_same_user()
    {
        
        $user_role=$this->session->userdata('user_role');
        if($user_role=='admin')
        {
           echo '';
        }else{
             redirect('home/not_allow');
        }
    }

}
