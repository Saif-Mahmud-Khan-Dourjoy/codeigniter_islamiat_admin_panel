<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

public function __construct() {
             parent::__construct();
              if(!$this->session->userdata('email')){
                return redirect('welcome');
             }
             // $this->load->model('menuemodel');
              $this->load->model('templatemodel');
    }

       public function index(){
   	    $data=array();
   	    $datas['temp']= $this->templatemodel ->show_temp();
   	    $data['main_content']=$this->load->view('set_menu',$datas,true);
		    $this->load->view('dashboard',$data);
	}
   public function add_menu(){

               $data=array();
                $sdata=array();
                $error="";
              
                $config = array(
                'upload_path' => "uploads/menu_icon/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'file_name' =>$_FILES['icon']['name'], 
              );

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                 if ( ! $this->upload->do_upload('icon')){
                       $error=$this->upload->display_errors();
                       

                }else{
                    $sdata=$this->upload->data();
                    $file=$config['upload_path'].$sdata['file_name'];
                    $data['icon']=$file;
                }

             $name=$this->input->post('name');
             $data['name']=$name;

             $con_parent=$this->input->post('parent');

             if(empty($con_parent)){
                
                $parent_menu=$this->input->post('parent_menu');
                $ext_link=$this->input->post('ext_link');

                  if(!empty($ext_link)){
                    
                    $ext_link_data=$this->input->post('ext_link_data');
                    $data['ext_link_data']=$ext_link_data;
                    $data['parent_id']=$parent_menu;

                     $this->db->insert('menu', $data);
                     $id=$this->db->insert_id();
                     if($id){
                      $this->session->set_flashdata('submit', '<div class="text-success">Successfully Submitted</div>');
                      return redirect('menu/index');
                     }
                     
                  }else{
                    $template=$this->input->post('template');
                    $data['parent_id']=$parent_menu;
                    $data['template']=$template;

                    $this->db->insert('menu', $data);
                     $id=$this->db->insert_id();
                     if ($id) {
                      $this->session->set_flashdata('submit', '<div class="text-success">Successfully Submitted</div>');
                      return redirect('menu/index');
                     }

                   

                  }

             }else{
              
             $this->db->insert('menu', $data);
             $result=$this->db->insert_id();
             if($result){
              $this->session->set_flashdata('submit', '<div class="text-success">Successfully Submitted</div>');
                      return redirect('menu/index');
             }
             
             }    
   }


}