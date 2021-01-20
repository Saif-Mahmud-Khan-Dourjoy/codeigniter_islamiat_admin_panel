<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct() {
             parent::__construct();
             $this->load->model('templatemodel');
             $this->load->model('contentmodel');
    }
  
   public function show_temp(){

		 $data=array();
		 $data['temp']= $this->templatemodel ->show_temp();
		$this->load->view('temp',$data);
		
	}  

	public function Kazi(){

    // echo $this->uri->segment('3');
    // $temp_id= $this->input->post("id");
    // // echo $temp_id;


    //    $data=array();
    //    $data['content']= $this->contentmodel ->show_single($temp_id); 
    //    // $temp_name=$data['content'][0]->temp_name;
       


    //    if($data['content']){
    //    	// print_r($data);
    //    	$this->load->view("Kazi",$data);
    //    }else{
    //    	$this->session->set_flashdata('no', '<div class="text-danger text-center"><h2>No Data Found</h2></div>');
    //        return redirect('data/show_temp');
       // }
      $temp_name="Kazi";

      $data=array();
       $data['content']= $this->contentmodel ->sw_sng($temp_name); 
       // $temp_name=$data['content'][0]->temp_name;
       


       if($data['content']){
         // print_r($data);
         $this->load->view("Kazi",$data);
       }else{
         $this->session->set_flashdata('no', '<div class="text-danger text-center"><h2>No Data Found</h2></div>');
           return redirect('data/show_temp');
       }




   
	}

    public function single_view($id){


       $data=array();
       $data['content']= $this->contentmodel ->single_view($id);


       if($data['content']){
         // print_r($data);
         $this->load->view("single_view",$data);
       }

       // else{
       //   $this->session->set_flashdata('no', '<div class="text-danger text-center"><h2>No Data Found</h2></div>');
       //     return redirect('data/show_temp');
       // }

    }

     public function parent_menu(){
     
          $this->db->select("*");
          $this->db->from("menu");
          $this->db->where("parent_id",0);
          $qu=$this->db->get();
          $menu['parent']=$qu->result();

          $this->load->view('parent_menu',$menu);
           
          }
     public function sub_menu($id){
          $this->db->select("*");
          $this->db->from("menu");
          $this->db->where("parent_id",$id);
          $qu=$this->db->get();
          $menu['sub']=$qu->result();
          if (!empty($menu['sub'])) {
             $this->load->view('sub_menu',$menu);
          }

          else{
            return redirect('data/parent_menu');
          }
         
           
          }
        public function con($id){
          $this->db->select("*");
          $this->db->from("menu");
          $this->db->where("id",$id);
          $qu=$this->db->get();
          $menu['con']=$qu->result();

         if(!empty($menu['con'][0]->ext_link_data)){
          $menu_content['link']=$menu['con'][0]->ext_link_data;
          $this->load->view('con_menu',$menu_content);
         }
         else{
          $temp_id=$menu['con'][0]->template;
           $this->db->select("*");
           $this->db->from("content");
           $this->db->where("temp_id",$temp_id);
          $qu=$this->db->get();
          $menu_content['content']= $qu->result();
          $this->load->view('con_menu',$menu_content);
         }
        
        }
      
	
}
