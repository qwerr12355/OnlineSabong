<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubAgent extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
  public function Dashboard()
  {
      if($_SESSION['UserTypeID']==5){
  			$this->load->view('sub-agent/template/header_template_view.php');
  			$this->load->view('sub-agent/sub-agent_dashboard_view.php');
  			$this->load->view('sub-agent/template/footer_template_view.php');
  		}else{
  			header("Location:".site_url()."/Welcome");
  		}
  }
  public function Player()
  {
      if($_SESSION['UserTypeID']==5){
  			$this->load->view('sub-agent/template/header_template_view.php');
  			$this->load->view('sub-agent/player_list_view.php');
  			$this->load->view('sub-agent/template/footer_template_view.php');
  		}else{
  			header("Location:".site_url()."/Welcome");
  		}
  }
  public function WalletDeposit()
  {
      if($_SESSION['UserTypeID']==5){
  			$this->load->view('sub-agent/template/header_template_view.php');
  			$this->load->view('sub-agent/wallet_deposit_view.php');
  			$this->load->view('sub-agent/template/footer_template_view.php');
  		}else{
  			header("Location:".site_url()."/Welcome");
  		}
  }
  public function GetPlayerUserRecruits()
	{
		$result['success']=false;
		$where = array(
			'UserTypeID' => 6,
			'RecruiterID' => $_SESSION['UserID']
		);
		$query=$this->UserModel->GetUserRecruits($where);
		if($query){
			$result['user']=$query;
			echo json_encode($query);
		}
	}
  public function AddNewPlayer()
	{
		$response['error']="";
		if($this->input->post('Firstname')==""||$this->input->post('Lastname')==""||$this->input->post('Username')==""){
			$response['error']="Please fill out all required fields!";
		}else{
			if($this->input->post('Password')==$this->input->post('ConfirmPassword')){
				$IsUsernameExisted=$this->UserModel->CheckUsernameExistince($this->input->post('Username'),$this->input->post('UserID'));
	      if($IsUsernameExisted){
	        $response['error']="Username already existed";
	      }else{
					$userdata = array(
						'Username' => $this->input->post('Username'),
						'Password' => $this->input->post('Password'),
						'UserTypeID'=> 6
					);

					$lastid=$this->UserModel->AddUser($userdata);

					$userinfodata = array(
						'Firstname' => $this->input->post('Firstname'),
						'Lastname' => $this->input->post('Lastname'),
						'GcashNumber' => $this->input->post('GcashNumber'),
						'GcashName' => $this->input->post('GcashName'),
						'FBLink' => $this->input->post('FacebookLink'),
						'UserID'=>$lastid
					);
					$userrecruitdata = array(
						'UserID' => $lastid,
						'RecruiterID' => $_SESSION['UserID'],
            'CommissionPercentage'=>2
					);
					$this->UserRecruiterModel->Add($userrecruitdata);
					$insertoperator=$this->UserInfoModel->Add($userinfodata);
					if($insertoperator){
						$response['success']=true;
					}
				}
			}else{
				$response['error']="Password and confirm password didn't match.";
			}
		}
		echo json_encode($response);
	}
  public function PlayerInfo($id)
  {
    $info["info"]=$this->UserInfoModel->GetUserInfoByUserID($id);
    $info["walletlogs"]=$this->UserWalletTransactionModel->GetWalletLogs($id);

    if($_SESSION['UserTypeID']==5&&$info['info']->RecruiterID==$_SESSION['UserID']){
      $this->load->view('sub-agent/template/header_template_view.php',$info);
      $this->load->view('sub-agent/player_info_view.php');
      $this->load->view('sub-agent/template/footer_template_view.php');
    }else{
      header("Location:".site_url()."/Welcome");
    }
  }
  public function DepositWallet()
	{
    $result['success']=false;
		$debitquery=$this->UserWalletTransactionModel->GetUserTotalDebit($this->input->post('UserID'));
		$creditquery=$this->UserWalletTransactionModel->GetUserTotalCredit($this->input->post('UserID'));
		$debit=0;
		$credit=0;
    $currentuserdebitquery=$this->UserWalletTransactionModel->GetUserTotalDebit($_SESSION['UserID']);
    $currentusercreditquery=$this->UserWalletTransactionModel->GetUserTotalCredit($_SESSION['UserID']);
    $currentuserdebit=0;
    $currentusercredit=0;
		if($debitquery){
			$debit=$debitquery->total;
		}
		if($creditquery){
			$credit=$creditquery->total;
		}
		$lastbalance=$debit-$credit;
    if($currentuserdebitquery){
			$currentuserdebit=$currentuserdebitquery->total;
		}
		if($currentusercreditquery){
			$currentusercredit=$currentusercreditquery->total;
		}
		$currentuserlastbalance=$currentuserdebit-$currentusercredit;
    if($currentuserlastbalance<$this->input->post('Amount')){
      $result['error']="You dont have enought wallet to deposit!";
    }else{
      $newbalance=$lastbalance+floatval($this->input->post('Amount'));
  		$depositdata = array(
  			'Amount' => $this->input->post('Amount'),
  			'LastBalance' => $lastbalance,
  			'NewBalance' => $newbalance,
  			'Amount' => $this->input->post('Amount'),
  			'UserID' => $this->input->post('UserID'),
  			'ProccessedBy' => $_SESSION['UserID'],
  			'Details' => $this->input->post('Details'),
  			'Description' => "Operator deposit",
  			'Type' => "Debit"
  		);
      $currentusernewbalance=$currentuserlastbalance-floatval($this->input->post('Amount'));
      $currentuserwalletdeductiondata = array(
  			'Amount' => $this->input->post('Amount'),
  			'LastBalance' => $currentuserlastbalance,
  			'NewBalance' => $currentusernewbalance,
  			'Amount' => $this->input->post('Amount'),
  			'UserID' => $_SESSION['UserID'],
  			'ProccessedBy' => $_SESSION['UserID'],
  			'Details' => $this->input->post('Details'),
  			'Description' => "Wallet deposit",
  			'Type' => "Credit"
  		);
  		$result['lastbalance']=$lastbalance;
  		$result['newbalance']=$newbalance;
  		if($_SESSION['Password']==$this->input->post('Password')){
  			if($this->UserWalletTransactionModel->Add($currentuserwalletdeductiondata)){
					$this->UserWalletTransactionModel->Add($depositdata);
  				$result['success']=true;
  				$userdata = array('WalletBalance' => $newbalance );
  				$whereuser = array('UserID' => $this->input->post('UserID') );
  				$this->UserModel->UpdateUser($whereuser,$userdata);

					$userdata2 = array('WalletBalance' => $currentusernewbalance );
  				$whereuser2 = array('UserID' => $_SESSION['UserID'] );
  				$this->UserModel->UpdateUser($whereuser2,$userdata2);
  			}
  		}else{
  			$result['error']="Password was incorrect!";
  		}
    }
		$result['currentuserlastbalance']=$currentuserlastbalance;
		echo json_encode($result);
	}
}
