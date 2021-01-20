<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Templatemodel extends CI_Model {

  public function __construct() {
             parent::__construct();
             
             $this->load->database();
    }

    public function add_temp(){
      $name=$this->input->post('temp');
 


  
 
// if (!is_dir('application/views/'.$name.'.php')) {
//     mkdir('application/views/' .$name.'.php', 0777, TRUE);

// }

       // fopen('application/views/' .$name.'.php', "w");
 
  


      $serial=$this->input->post('serial');
    $content=$this->input->post('arr');
    for($i=0;$i<4;$i++){
  if(empty($serial[$i])){
     unset($serial[$i]);
  }

}
    $combined=array_combine($serial,$content);
    

    // print_r($combined);
    // echo "<br>";
    $key= array_keys($combined);

    // print_r($key);
    // echo "<br>";

    $len=count($key);
    // / // echo $key[0];
    // /exit();
    $new=array();
    for($i=0;$i<$len;$i++){
      // if($key[$i]==1){

      //   array_push($new,$combined[$i+1]);
        
      // }
      // if($key[$i]==2){

      //   array_push($new,$combined[$i+1]);
        
      // }
      // if($key[$i]==3){

      //   array_push($new,$combined[$i+1]);
        
      // }
      // if($key[$i]==4){

      //   array_push($new,$combined[$i+1]);
        
      // }
      array_push($new,$combined[$i+1]);
    }

    $com=json_encode($new);
      $data=array(
      'temp_name'      => $name, 
      'contents'  => $com,
      
            
      );
    $this->db->insert('template',$data);
        $result=$this->db->insert_id();
        return $result;
    }
    public function show_temp(){
       $this->db->select("*");
           $this->db->from("template");
          $qu=$this->db->get();
          return $qu->result();
    }

     public function edit_temp($id){
       $this->db->select("*");
           $this->db->from("template");
           $this->db->where('id', $id);
          $qu=$this->db->get();
          return $qu->result();
    }

    public function update_temp(){
      $id=$this->input->post('id');
      $name=$this->input->post('temp');
   $serial=$this->input->post('serial');
    $content=$this->input->post('arr');
    for($i=0;$i<4;$i++){
  if(empty($serial[$i])){
     unset($serial[$i]);
  }

}
 
    $combined=array_combine($serial,$content);
    

    
    $key= array_keys($combined);

   

    $len=count($key);
   
    $new=array();
    for($i=0;$i<$len;$i++){
     
      array_push($new,$combined[$i+1]);
    }

    $com=json_encode($new);
      $data=array(
      'temp_name'      => $name, 
      'contents'  => $com,
      
            
      );
       $this->db->where('id', $id);
    $this->db->update('template',$data);
    if($this->db->affected_rows()>0){
      return 1;
    }else{
      return 0;
    }
        // $result=$this->db->insert_id();
        // return $result;
    }

//     public function delete_temp($id){
//     $this->db-> where('id', $id);
//     $this->db-> delete('template');
// }
}