<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserWalletTransactionModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function Add($data)
  {
    $this->db->insert('userwallettransaction', $data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  public function GetWalletLogs($id)
  {
    $where = array('userwallettransaction.UserID' => $id );
    $this->db->select("*");
    $this->db->from("userwallettransaction");
    $this->db->join("userinfo","userinfo.UserID=userwallettransaction.ProccessedBy");
    $this->db->where($where);
    $query=$this->db->get();
    if($query->num_rows()>0){
      return $query->result_array();
    }else{
      return false;
    }
  }
  public function GetUserTotalDebit($id)
  {
    $this->db->select("(SELECT SUM(Amount) FROM userwallettransaction WHERE UserID='$id' and Type='Debit') AS total", FALSE);
    $query = $this->db->get('userwallettransaction');
    if($query->num_rows()>0){
      return $query->row();
    }else{
      return false;
    }
  }
  public function GetUserTotalCredit($id)
  {
    $this->db->select("(SELECT SUM(Amount) FROM userwallettransaction WHERE UserID='$id' and Type='Credit') AS total", FALSE);
    $query = $this->db->get('userwallettransaction');
    if($query->num_rows()>0){
      return $query->row();
    }else{
      return false;
    }
  }
}
