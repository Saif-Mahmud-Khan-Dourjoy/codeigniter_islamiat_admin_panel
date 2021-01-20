<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

public function __construct() {
             parent::__construct();
              if(!$this->session->userdata('email')){
                return redirect('welcome');
             }
             $this->load->model('contentmodel');
    }
    public function show_temp_cont(){
         $data=array();
         $datas['temp']= $this->contentmodel ->show_temp_cont();
        $data['main_content']=$this->load->view('show_temp_cont',$datas,true);
        $this->load->view('dashboard',$data);
    }

    public function add_content($id){
        $datas= $this->contentmodel ->contents($id);
        foreach ($datas as $key => $value) {
            $items=$value->contents;
            $id=$value->id;
            $cont['content']=json_decode($items);
            $cont['id']=$id;
        $data['main_content']=$this->load->view('add_content',$cont,true);
        $this->load->view('dashboard',$data);


        }
  
    }

    public function data_add_content($id){
        $datas= $this->contentmodel ->contents($id);
        foreach ($datas as $key => $value) {
            $items=$value->contents;
            $name=$value->temp_name;
            $id=$value->id;
            $content=json_decode($items);
            $length=count($content);
           
           $data=array();
         
            if( !empty($this->input->post('demotext')) ){

              $data['text']=$this->input->post('text',true);
                
                
            }
            if ( !empty($this->input->post('demoaudio'))) {
                $sdata=array();
                $error="";
                  $_FILES['audio']['raw_name']='Audio_'.$id.'';
                $config = array(
                'upload_path' => "uploads/audio/",
                'allowed_types' => "mp3",
                'overwrite' => TRUE,
                'file_name' =>time().'_'.$_FILES['audio']['raw_name'].$_FILES['audio']['file_ext'],
                // 'max_size' => "204800000", 
                // 'max_height' => "20000",
                // 'max_width' => "1024"
              );
                $this->load->library('upload', $config);
                 $this->upload->initialize($config);
                if( !$this->upload->do_upload('audio')){
                       $error=$this->upload->display_errors();
                }else{
                    $sdata=$this->upload->data();
                    
                    $sdata['raw_name']='Audio_'.$id.'';

                    $file=$config['upload_path'].time().'_'.$sdata['raw_name'].$sdata['file_ext'];
                    // $data['audio']=$config['upload_path'].$sdata['file_name'];
                    $data['audio']=$file;
                }

                
            }if ( !empty($this->input->post('demovideo'))) {
                   $sdata=array();
                   $error="";
                  $_FILES['video']['raw_name']='Video_'.$id.'';
                  $_FILES['video']['file_ext']='.mp4';
                  // print_r( $_FILES['video']);
                  // exit();
                $config1 = array(
                'upload_path' => "uploads/video/",
                'allowed_types' => "mp4",
                'overwrite' => TRUE,
                'file_name' =>time().'_'.$_FILES['video']['raw_name'].$_FILES['video']['file_ext'],
                // 'max_size' => "2048000", 
                // 'max_height' => "20000",
                // 'max_width' => "1024"
              );
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                if( !$this->upload->do_upload('video')){
                       $error=$this->upload->display_errors();
                       
                }else{
                    $sdata=$this->upload->data();
                    $sdata['raw_name']='Video_'.$id.'';
                   

                    $file=$config1['upload_path'].time().'_'.$sdata['raw_name'].$sdata['file_ext'];
                    
                    $data['video']=$file;
                }

                
            }if( !empty($this->input->post('demoimage'))){
                $sdata=array();
                $error="";
                $_FILES['image']['raw_name']='Image_'.$id.'';
                $config2 = array(
                'upload_path' => "uploads/image/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'file_name' =>time().'_'.$_FILES['image']['raw_name'].$_FILES['image']['file_ext'],
                // 'max_size' => "2048000", 
                // 'max_height' => "20000",
                // 'max_width' => "1024"
              );
                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);
                if( !$this->upload->do_upload('image')){
                       $error=$this->upload->display_errors();
                }else{
                    $sdata=$this->upload->data();
                    $sdata['raw_name']='Image_'.$id.'';
                     // $newname=$sdata['raw_name'].$sdata['file_ext'];
                    // rename($sdata['file_name'],$newname);
                    $file=$config2['upload_path'].time().'_'.$sdata['raw_name'].$sdata['file_ext'];
                    
                    $data['image']=$file;
                }

            }
          
             
             $data['temp_name']=$name;
             $data['temp_id']=$id;

             $this->db->insert('content', $data);
             $result=$this->db->insert_id();
             if (!empty($result)) {
                $this->session->set_flashdata('content', '<div class="text-info">Successfully  Added</div>');
                 return redirect('content/show_temp_cont');
             }else{
                 $this->session->set_flashdata('content', '<div class="text-danger">Successfully not Added</div>');
                 return redirect('content/show_temp_cont');
             }



          

    }

}

    public function show_all(){
       $data=array();
     $datas['content']= $this->contentmodel ->show_all();
       $data['main_content']=$this->load->view('show_all',$datas,true);
       $this->load->view('dashboard',$data);
    }


    public function edits_content($id){

      $tem=$this->contentmodel ->edits_content($id);
      foreach ($tem as $key => $con) {
            $temp_id=$con->temp_id;
            $datas= $this->contentmodel ->ed_con($temp_id);
        foreach ($datas as $key => $value) {
            $items=$value->contents;
            // $id=$value->id;
            $cont['con_data']=$this->contentmodel ->edits_content($id);
            $cont['content']=json_decode($items);
            // $cont['id']=$id;
            // print_r($cont);
            // exit();
        $data['main_content']=$this->load->view('edit_content',$cont,true);
        $this->load->view('dashboard',$data);


        }
      }


    
  }

    public function delete_content($id){
     $this->db->where('id', $id);
        $this->db->delete('content');
       return redirect('content/show_all');
      
    
  } 
  public function update_content($id){

    // echo "<h1>To Be Continued...........</h1>";

     $con=$this->contentmodel ->edits_content($id);
     $temp_name=$con[0]->temp_name;
     $temp_id=$con[0]->temp_id;

    $data=array();
         
            if( !empty($this->input->post('demotext')) ){

              $data['text']=$this->input->post('text',true);
                
                
            }
            if ( !empty($this->input->post('demoaudio'))) {

                if(!empty($_FILES['audio']['name'])){



                   $old_audio=$this->input->post('old_audio');


                    
                   unlink($old_audio);



                $sdata=array();
                $error="";
               
                $config = array(
                'upload_path' => "uploads/audio/",
                'allowed_types' => "mp3",
                'overwrite' => TRUE,
                'file_name' =>$_FILES['audio']['name'],
                // 'max_size' => "204800000", 
                // 'max_height' => "20000",
                // 'max_width' => "1024"
              );
                $this->load->library('upload', $config);
                   $this->upload->initialize($config);
                if( !$this->upload->do_upload('audio')){
                       $error=$this->upload->display_errors();
                }else{
                    $sdata=$this->upload->data();

                    $file=$config['upload_path'].$sdata['file_name'];
                    
                    $data['audio']=$file;

                }
              }
              else{

            


                
                $old_audio=$this->input->post('old_audio');


                  $data['audio']=$old_audio;
                }

              

                 }
              if ( !empty($this->input->post('demovideo'))) {
                  
                   if(!empty($_FILES['video']['name'])){


                   $old_video=$this->input->post('old_video');
                    
                   unlink($old_video);

                   $sdata=array();
                $error="";
                
                $config1 = array(
                'upload_path' => "uploads/video/",
                'allowed_types' => "mp4",
                'overwrite' => TRUE,
                'file_name' =>$_FILES['video']['name'],
                // 'max_size' => "2048000", 
                // 'max_height' => "20000",
                // 'max_width' => "1024"
              );
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                if( !$this->upload->do_upload('video')){
                       $error=$this->upload->display_errors();
                       
                }else{
                    $sdata=$this->upload->data();
        

                    $file=$config1['upload_path'].$sdata['file_name'];
                    
                    $data['video']=$file;
                }

                
            }else{
               
                $old_video=$this->input->post('old_video');
                $data['video']=$old_video;

            }

          }

            if( !empty($this->input->post('demoimage'))){
              if(!empty($_FILES['image']['name'])){
                  $old_image=$this->input->post('old_image');
                    
                   unlink($old_image);


                $sdata=array();
                $error="";
               
                $config2 = array(
                'upload_path' => "uploads/image/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'file_name' =>$_FILES['image']['name'],
                // 'max_size' => "2048000", 
                // 'max_height' => "20000",
                // 'max_width' => "1024"
              );
                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);
                if( !$this->upload->do_upload('image')){
                       $error=$this->upload->display_errors();
                }else{
                    $sdata=$this->upload->data();
                
                    $file=$config2['upload_path'].$sdata['file_name'];
                    
                    $data['image']=$file;
                }

            }else{
               

                $old_image=$this->input->post('old_image');
                $data['image']=$old_image;

            }

          }
          
             
             $data['temp_name']=$temp_name;
             $data['temp_id']=$temp_id;
             
               $this->db->where('id', $id);
              $this->db->update('content',$data);

              if($this->db->affected_rows()>0){
                 $this->session->set_flashdata('content_update', '<div class="text-info">Successfully  Updated</div>');
                 return redirect('content/show_all');
              }else{
                 $this->session->set_flashdata('content_update', '<div class="text-info">Successfully  Not Updated</div>');
                 return redirect('content/show_all');
              }


             
    
  }

}
