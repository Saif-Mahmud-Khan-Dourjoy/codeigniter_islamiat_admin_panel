<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

public function __construct() {
             parent::__construct();
              if(!$this->session->userdata('email')){
                return redirect('welcome');
             }
             $this->load->model('templatemodel');
    }
   public function index(){
   	    $data=array();
   	    $data['main_content']=$this->load->view('template','',true);
		$this->load->view('dashboard',$data);
	}
	public function add_temp(){
		
		$data=array();
   	    $data['main_content']=$this->load->view('add_temp','',true);
		$this->load->view('dashboard',$data);
	}

	public function add(){
		$add_temp= $this->templatemodel ->add_temp();
		if(!empty($add_temp)){
           $this->session->set_flashdata('submit', '<div class="text-success">Successfully Submitted</div>');
           return redirect('template/add_temp');
		}else{
             $this->session->set_flashdata('submit', '<div class="text-danger">Successfully not Submitted</div>');
              return redirect('template/add_temp');
		}
	
	}

	public function show_temp(){

		 $data=array();
		 $datas['temp']= $this->templatemodel ->show_temp();
   	    $data['main_content']=$this->load->view('show_temp',$datas,true);
		$this->load->view('dashboard',$data);
		
	}
 

		public function edits_temp($id){

		 $data=array();
		 $datas['temp']= $this->templatemodel ->edit_temp($id);
   	    $data['main_content']=$this->load->view('data_temp',$datas,true);
		$this->load->view('dashboard',$data);

		
	}

	public function update(){
		$add_temp= $this->templatemodel ->update_temp();
		if($add_temp==1){
           $this->session->set_flashdata('submit', '<div class="text-success">Successfully Updated</div>');
           return redirect('show_temp');
		}else{
             $this->session->set_flashdata('submit', '<div class="text-danger">Successfully not Updated</div>');
              return redirect('show_temp');
		}
	
	}

	public function delete_temp($id){


		 $this->db->where('id', $id);
        $this->db->delete('template');
       return redirect('show_temp');
   	  
		
	}
	 public function logout(){
        $this->session->unset_userdata('email');
        return redirect('welcome');
    }




}

	