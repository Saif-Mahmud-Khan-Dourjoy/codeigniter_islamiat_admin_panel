<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contentmodel extends CI_Model {

  public function __construct() {
             parent::__construct();
             
             $this->load->database();
    }

    public function show_temp_cont(){
       $this->db->select("*");
           $this->db->from("template");
          $qu=$this->db->get();
          return $qu->result();
    }

     public function contents($id){
       $this->db->select("*");
           $this->db->from("template");
           $this->db->where('id', $id);
          $qu=$this->db->get();
          return $qu->result();
    }
      public function show_all(){
       $this->db->select("*");
           $this->db->from("content");
          $qu=$this->db->get();
          return $qu->result();
    }
     public function show_single($id){
       $this->db->select("*");
           $this->db->from("content");
           $this->db->where("temp_id",$id);
          $qu=$this->db->get();
          return $qu->result();
    }

         public function edits_content($id){
       $this->db->select("*");
           $this->db->from("content");
           $this->db->where('id', $id);
          $qu=$this->db->get();
          return $qu->result();
    }
    public function ed_con($id){
       $this->db->select("*");
           $this->db->from("template");
           $this->db->where('id', $id);
          $qu=$this->db->get();
          return $qu->result();
    }

      public function sw_sng($name){
       $this->db->select("*");
           $this->db->from("content");
           $this->db->where("temp_name",$name);
           $this->db->order_by('id',"desc");
          $qu=$this->db->get();
          return $qu->result();
    }

      public function single_view($id){
       $this->db->select("*");
           $this->db->from("content");
           $this->db->where("id",$id);
          $qu=$this->db->get();
          return $qu->result();
    }


}
