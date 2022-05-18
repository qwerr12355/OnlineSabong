<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cockfight extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
  public function Add()
  {
    $data = array(
      'FightNumber' => $this->input->post('FightNumber'),
      'EventID' => $this->input->post('EventID')
    );
    $lastid=$this->CockfightModel->Add($data);
    if($lastid){
      $response['CockFightID']=$lastid;
      $response['success']=true;
      echo json_encode($response);
    }
  }
  public function UpdateStatus()
  {
    $where = array('CockfightID' => $this->input->post('CockFightID') );
    $data = array(
      'Status' => "Closed"
    );
    $response['success']=$this->CockfightModel->Update($where,$data);
    echo json_encode($response);
  }

  public function UpdateWinner()
  {
    $where = array('CockfightID' => $this->input->post('CockFightID') );
    $data = array(
      'Winner' => $this->input->post('Winner')
    );
    $response['success']=$this->CockfightModel->Update($where,$data);
    echo json_encode($response);
  }

  public function GetLastCockfight()
  {
    $query=$this->CockfightModel->GetLastCockfight($this->input->post('EventID'));
    $response['FightNumber']="";
    if($query){
      $response['GetLastCockfight']=$query;
      $response['FightNumber']="dsafasd";

    }
    echo json_encode($response);
  }
}
