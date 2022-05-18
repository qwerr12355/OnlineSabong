<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function AddUser($data)
  {
    $query=$this->db->insert('users', $data);
    if($this->db->affected_rows()>0){
      return $this->db->insert_id();
    }else{
      return false;
    }
  }
  public function authentication($where)
  {
    $this->db->select("*");
    $this->db->from("users");
    $this->db->join("userinfo","userinfo.UserID=users.UserID");
    $this->db->where($where);
    $query=$this->db->get();
    if($query->num_rows()>0){
      return $query->row();
    }else{
      return false;
    }
  }
  public function GetUsersByUserType($where)
  {
    $this->db->select("*");
    $this->db->from("users");
    $this->db->join("userinfo","userinfo.UserID=users.UserID");
    $this->db->join("userrecruiter","userrecruiter.UserID=userinfo.UserID");
    $this->db->where($where);
    $query=$this->db->get();
    if($query->num_rows()>0){
      return $query->result_array();
    }else{
      return false;
    }
  }
  public function GetUserRecruits($where)
  {
    $this->db->select("*");
    $this->db->from("users");
    $this->db->join("userinfo","userinfo.UserID=users.UserID");
    $this->db->join("userrecruiter","userrecruiter.UserID=userinfo.UserID");
    $this->db->where($where);
    $query=$this->db->get();
    if($query->num_rows()>0){
      return $query->result_array();
    }else{
      return false;
    }
  }
  public function getOldPassword($where)
  {
    $this->db->where($where);
    $query=$this->db->get('users');
    if($query->num_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  public function UpdateUser($where,$data)
  {
    $this->db->where($where);
    $this->db->update('users', $data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  public function CheckUsernameExistince($username,$userid)
  {
    $where = array('Username' => $username ,'UserID!='=>$userid);
    $this->db->where($where);
    $query=$this->db->get('users');
    if($query->num_rows()>0){
      return true;
    }else{
      return false;
    }
  }
}
