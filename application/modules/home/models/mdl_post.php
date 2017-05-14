<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mdl_post extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function get()
    {
        $this->db->select('topic_name');
        $this->db->from('topic');
        $this->db->limit(20);
        $query=  $this->db->get();
        return $query->result();
    }
    

	
}
