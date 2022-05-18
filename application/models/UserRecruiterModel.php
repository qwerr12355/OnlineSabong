<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserRecruiterModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function Add($data)
  {
    $this->db->insert('userrecruiter', $data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
}
