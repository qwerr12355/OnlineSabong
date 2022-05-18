<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function getAllEvent()
  {
    $query=$this->db->get('events');
    if($query->num_rows()>0){
      return $query->result_array();
    }else{
      return false;
    }
  }
  public function Update($where,$data)
  {
    $this->db->where($where);
    $this->db->update('events', $data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  public function Add($data)
  {
    $this->db->insert('events',$data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  public function GetEventByID($id)
  {
    $where = array('EventID' => $id);
    $this->db->where($where);
    $query=$this->db->get('events');
    if($query->num_rows()>0){
      return $query->row();
    }else{
      return false;
    }
  }
  public function GetOpenEvent()
  {
    $where = array('Status' => 'Open' );
    $this->db->where($where);
    $query=$this->db->get('events');
    if($query->num_rows()>0){
      return $query->result();
    }else{
      return false;
    }
  }
}
