<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model {

	public function __construct() {
             parent::__construct();
             
             $this->load->database();
    }

      public function user($email,$password){  
            
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $qu=$this->db->get('user');
        if($qu->num_rows()>0){   
        return $qu->result();
        }
     }

}