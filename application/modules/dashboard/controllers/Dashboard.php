<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    function __construct() {
        parent::__construct();
        echo Modules::run('site_security/make_sure_is_user');
    }
    function index()
    {
        echo Modules::run('user/my_account');
    }

   

}
