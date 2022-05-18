<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlayerWalletTransaction extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
  public function AddTransaction()
  {
    $response['error']="";
    if($this->input->post("Amount")==""||$this->input->post('PlayerID')==""||$this->input->post('TransactionType')==""){
        $response['error']="Please input all of the required fields";
    }else{
      if($this->input->post('Password')==$_SESSION['Password']){
        $transactiondata = array(
          'Amount' => $this->input->post('Amount'),
          'PlayerID' =>$this->input->post('PlayerID'),
          'TransactionType' => $this->input->post('TransactionType')
        );
        $playerinfo=$this->PlayerModel->getInfoByID($this->input->post('PlayerID'));
        $walletamount=$playerinfo->WalletBalance+$this->input->post('Amount');
        $response['success']=false;

        if($this->PlayerWalletTransactionModel->Add($transactiondata)){
          $where = array('PlayerID' => $this->input->post('PlayerID') );
          $playerdata = array('WalletBalance' => $walletamount );
          $this->PlayerModel->updatePlayer($where,$playerdata);
          $response['success']=true;
        }
      }else{
        $response['error']="Invalid Password.";
      }
    }

    echo json_encode($response);
  }
}
