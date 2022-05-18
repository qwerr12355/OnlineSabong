<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserInfoModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function Add($data)
  {
    $this->db->insert('userinfo', $data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  public function GetUserInfoByUserID($id)
  {
    $where = array('users.UserID' => $id );
    $this->db->select("*");
    $this->db->from("users");
    $this->db->join("userinfo","userinfo.UserID=users.UserID");
    $this->db->join("userrecruiter","userrecruiter.UserID=userinfo.UserID");
    $this->db->where($where);
    $query=$this->db->get();
    if($query->num_rows()>0){
      return $query->row();
    }else{
      return false;
    }
  }
  public function Update($where,$data)
  {
    $this->db->where($where);
    $this->db->update('userinfo', $data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
}
