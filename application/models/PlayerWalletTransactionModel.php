<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlayerWalletTransactionModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function Add($data)
  {
    $this->db->insert('playerwallettransaction',$data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  public function getPlayerTransaction($id)
  {
    $where = array('PlayerID' => $id );
    $this->db->where($where);
    $query=$this->db->get('playerwallettransaction');
    if($query->num_rows()>0){
      return $query->result();
    }else{
      return false;
    }
  }
}
