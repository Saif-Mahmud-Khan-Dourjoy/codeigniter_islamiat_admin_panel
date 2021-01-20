<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

public function __construct() {
             parent::__construct();
             if($this->session->userdata('email')){
                return redirect('dashboard');
             }
             $this->load->model('usermodel');
    }

    public function userlogin(){
    	 $email=$this->input->post('email'); 
         $password=$this->input->post('password');        
         $userinfo=$this->usermodel->user($email,$password);
         if (!empty($userinfo)) {
         	$session_data=array(
               'email'=>$email
         	);

         	$this->session->set_userdata($session_data);

         	return redirect('dashboard');
         	
         }else{

          
                 $this->session->set_flashdata('no_match', 'Credential is not matching');
                 return redirect('welcome');
            
         }


         // echo $email;
         // echo $password;


    }

   
}
