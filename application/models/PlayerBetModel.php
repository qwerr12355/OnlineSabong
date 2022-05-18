<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlayerBetModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function GetCockFightTotalMeronBet($id)
  {
    $this->db->select("(SELECT SUM(BetAmount) FROM playerbet WHERE CockFightID='$id' and Choice='Meron' and Type='Real') AS total", FALSE);
    $query = $this->db->get('playerbet');
    if($query->num_rows()>0){
      return $query->row();
    }else{
      return false;
    }
  }
  public function GetSpecificPlayerBet($playerid,$cockfightid)
  {
    $where = array(
      'PlayerID' => $playerid,
      'CockFightID' => $cockfightid
    );
    $this->db->where($where);
    $query=$this->db->get('playerbet');
    if($query->num_rows()){
      return $query->row();
    }else{
      return false;
    }
  }
  public function GetSpecificPlayerBetTotal($playerid,$cockfightid)
  {
    $this->db->select("(SELECT SUM(BetAmount) FROM playerbet WHERE CockFightID='$cockfightid' and PlayerID='$playerid' and Type='Real') AS total", FALSE);
    $query = $this->db->get('playerbet');
    if($query->num_rows()>0){
      return $query->row();
    }else{
      return false;
    }
  }
  public function GetCockFightTotalWalaBet($id)
  {
    $this->db->select("(SELECT SUM(BetAmount) FROM playerbet WHERE CockFightID='$id' and Choice='Wala' and Type='Real') AS total", FALSE);
    $query = $this->db->get('playerbet');
    if($query->num_rows()>0){
      return $query->row();
    }else{
      return false;
    }
  }
  public function Add($data)
  {
    $this->db->insert('playerbet', $data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
}
