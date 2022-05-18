<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CockfightModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function Add($data)
  {
    $this->db->insert('cockfight',$data);
    if($this->db->affected_rows()>0){
      return $this->db->insert_id();
    }else{

    }
  }
  public function Update($where,$data)
  {
    $this->db->where($where);
    $this->db->update('cockfight',$data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  public function GetLastCockfight($id)
  {
    $query = $this->db->query("SELECT * FROM cockfight WHERE EventID='$id' ORDER BY CockFightID DESC LIMIT 1");
    $result = $query->row();
    if($result){
      return $result;
    }else{
      return false;
    }
  }
}
