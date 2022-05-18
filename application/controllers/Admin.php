<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{

	}
  public function OperatorList()
  {
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/operator_list_view.php');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
  }
	public function SubOperatorList()
  {
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/sub-operator_list_view.php');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
  }
	public function SubAgentList()
  {
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/sub-agent_list_view.php');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
  }
	public function UpdateUser()
	{
		$result['success']=false;
		$where = array('UserID' => $this->input->post('UserID') );
		$userinfodata = array(
			'Firstname' => $this->input->post('Firstname'),
			'Lastname' => $this->input->post('Lastname'),
			'GcashNumber' => $this->input->post('GcashNumber'),
			'GcashName' => $this->input->post('GcashName'),
			'FBLink' => $this->input->post('FacebookLink'),
		);
		$userdata = array('Username' => $this->input->post('Username') );
		$updateuser=$this->UserModel->UpdateUser($where,$userdata);
		$updateuserinfo=$this->UserInfoModel->Update($where,$userinfodata);
		if($updateuser||$updateuserinfo){
			$result['success']=true;
			echo json_encode($result);
		}
	}
	public function AddNewOperator()
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
						'UserTypeID'=> 2
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
	public function AddNewSubOperator()
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
						'UserTypeID'=> 3
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
						'CommissionPercentage'=>3
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
	public function AddNewMasterAgent()
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
						'UserTypeID'=> 4
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
						'CommissionPercentage'=>4
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
	public function AddNewSubAgent()
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
						'UserTypeID'=> 5
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
						'CommissionPercentage'=>0
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
	public function DepositWallet()
	{
		$debitquery=$this->UserWalletTransactionModel->GetUserTotalDebit($this->input->post('UserID'));
		$creditquery=$this->UserWalletTransactionModel->GetUserTotalCredit($this->input->post('UserID'));
		$debit=0;
		$credit=0;
		if($debitquery){
			$debit=$debitquery->total;
		}
		if($creditquery){
			$credit=$creditquery->total;
		}
		$lastbalance=$debit-$credit;


		$result['success']=false;
		if($_SESSION['Password']==$this->input->post('Password')){
			if(ctype_digit($this->input->post('Amount')) && (float) $this->input->post('Amount') > 0){
				$newbalance=$lastbalance+$this->input->post('Amount');
				$data = array(
					'Amount' => $this->input->post('Amount'),
					'LastBalance' => $lastbalance,
					'NewBalance' => $newbalance,
					'Amount' => $this->input->post('Amount'),
					'UserID' => $this->input->post('UserID'),
					'ProcessedBy' => $_SESSION['UserID'],
					'Details' => $this->input->post('Details'),
					'Description' => "Admin deposit",
					'Type' => "Debit"
				);

				$result['lastbalance']=$lastbalance;
				$result['newbalance']=$newbalance;
				if($this->UserWalletTransactionModel->Add($data)){
					$result['success']=true;
					$userdata = array('WalletBalance' => $newbalance );
					$whereuser = array('UserID' => $this->input->post('UserID') );
					$this->UserModel->UpdateUser($whereuser,$userdata);
				}
			}else{
				$result['error']="Please enter a valid amount!";
			}
		}else{
			$result['error']="Password was incorrect!";
		}
		echo json_encode($result);
	}
	public function WithdrawWallet()
	{
		$debitquery=$this->UserWalletTransactionModel->GetUserTotalDebit($this->input->post('UserID'));
		$creditquery=$this->UserWalletTransactionModel->GetUserTotalCredit($this->input->post('UserID'));
		$debit=0;
		$credit=0;
		if($debitquery){
			$debit=$debitquery->total;
		}
		if($creditquery){
			$credit=$creditquery->total;
		}
		$lastbalance=$debit-$credit;

		$result['success']=false;

		if($_SESSION['Password']==$this->input->post('Password')){
			if($this->input->post('Amount')<=0){
				$result['error']="Balance must be greater than zero!";
			}else{
				if(ctype_digit($this->input->post('Amount')) && (float) $this->input->post('Amount') > 0){
					$newbalance=$lastbalance-$this->input->post('Amount');
					$data = array(
						'Amount' => $this->input->post('Amount'),
						'LastBalance' => $lastbalance,
						'NewBalance' => $newbalance,
						'Amount' => $this->input->post('Amount'),
						'UserID' => $this->input->post('UserID'),
						'ProcessedBy' => $_SESSION['UserID'],
						'Details' => $this->input->post('Details'),
						'Description' => "Admin deposit",
						'Type' => "Credit"
					);

					$result['lastbalance']=$lastbalance;
					$result['newbalance']=$newbalance;
					if($this->input->post('Amount')<=$lastbalance){
						if($this->UserWalletTransactionModel->Add($data)){
							$result['success']=true;
							$userdata = array('WalletBalance' => $newbalance );
							$whereuser = array('UserID' => $this->input->post('UserID') );
							$this->UserModel->UpdateUser($whereuser,$userdata);
						}
					}else{
						$result['error']="Balance is not enough!";
					}
				}else{
					$result['error']="Please enter a valid amount!";
				}

			}
		}else{
			$result['error']="Password was incorrect!";
		}
		echo json_encode($result);
	}
	public function GetAllOperator()
	{
		$result['success']=false;
		$where = array('UserTypeID' => 2 );
		$query=$this->UserModel->GetUsersByUserType($where);
		if($query){
			$result['user']=$query;
			echo json_encode($query);
		}
	}
	public function GetUserByUserTypeID()
	{
		$result['success']=false;
		$where = array('UserTypeID' => $this->input->post('UserTypeID'));
		$query=$this->UserModel->GetUsersByUserType($where);
		if($query){
			$result['user']=$query;
			echo json_encode($query);
		}
	}
	public function GetAllSubOperator()
	{
		$result['success']=false;
		$where = array('UserTypeID' => 3 );
		$query=$this->UserModel->GetUsersByUserType($where);
		if($query){
			$result['user']=$query;
			echo json_encode($query);
		}
	}
	public function GetAllMasterAgent()
	{
		$result['success']=false;
		$where = array('UserTypeID' => 4 );
		$query=$this->UserModel->GetUsersByUserType($where);
		if($query){
			$result['user']=$query;
			echo json_encode($query);
		}
	}
	public function GetAllSubAgent()
	{
		$result['success']=false;
		$where = array('UserTypeID' => 5 );
		$query=$this->UserModel->GetUsersByUserType($where);
		if($query){
			$result['user']=$query;
			echo json_encode($query);
		}
	}
	public function GetAllPlayer()
	{
		$result['success']=false;
		$where = array('UserTypeID' => 6 );
		$query=$this->UserModel->GetUsersByUserType($where);
		if($query){
			$result['user']=$query;
			echo json_encode($query);
		}
	}
	public function OperatorInfo($id)
	{
		$info['suboperator']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 3,'RecruiterID' => $id));
		$info['masteragent']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 4,'RecruiterID' => $id));
		$info['subagent']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 5,'RecruiterID' => $id));
		$info['player']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 6,'RecruiterID' => $id));
		$info["info"]=$this->UserInfoModel->GetUserInfoByUserID($id);
		$info["walletlogs"]=$this->UserWalletTransactionModel->GetWalletLogs($id);
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php',$info);
			$this->load->view('admin/operator_more_info_view.php');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
	}
	public function SubOperatorInfo($id)
	{
		$info['masteragent']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 4,'RecruiterID' => $id));
		$info['subagent']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 5,'RecruiterID' => $id));
		$info['player']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 6,'RecruiterID' => $id));
		$info["info"]=$this->UserInfoModel->GetUserInfoByUserID($id);
		$info["walletlogs"]=$this->UserWalletTransactionModel->GetWalletLogs($id);

		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php',$info);
			$this->load->view('admin/sub-operator_info_view.php');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
	}
	public function MasterAgentInfo($id)
	{
		$info['subagent']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 5,'RecruiterID' => $id));
		$info['player']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 6,'RecruiterID' => $id));
		$info["info"]=$this->UserInfoModel->GetUserInfoByUserID($id);
		$info["walletlogs"]=$this->UserWalletTransactionModel->GetWalletLogs($id);

		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php',$info);
			$this->load->view('admin/master_agent_info_view.php');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
	}
	public function SubAgentInfo($id)
	{
		$info['player']=$this->UserModel->GetUsersByUserType($where = array('UserTypeID' => 6,'RecruiterID' => $id));
		$info["info"]=$this->UserInfoModel->GetUserInfoByUserID($id);
		$info["walletlogs"]=$this->UserWalletTransactionModel->GetWalletLogs($id);

		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php',$info);
			$this->load->view('admin/sub-agent_info_view.php');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
	}
	public function PlayerList()
	{
		$this->load->view('admin/template/header_template_view.php');
		$this->load->view('admin/player_list_view.php');
		$this->load->view('admin/template/footer_template_view.php');
	}
	public function PlayerInfo($id)
	{
		$info["info"]=$this->UserInfoModel->GetUserInfoByUserID($id);
		$info["walletlogs"]=$this->UserWalletTransactionModel->GetWalletLogs($id);
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php',$info);
			$this->load->view('admin/player_info_view.php');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
	}
	public function MasterAgentList()
	{
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/master_agent_list_view.php');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
	}
	public function Dashboard()
	{
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/admin_dashboard_view');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");

		}

	}
	public function Events()
	{
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/event_list_view');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");

		}

	}
	public function EventInfo($eventid)
	{
		$data['eventinfo']=$this->EventModel->GetEventByID($eventid);
		$data["walletlogs"]=$this->UserWalletTransactionModel->GetWalletLogs($id);
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/event_info_view',$data);
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");

		}

	}
	public function EventControls($id)
	{
		$data['EventID']=$id;
		$data['eventinfo']=$this->EventModel->GetEventByID($id);
		if($_SESSION['UserTypeID']==1){
			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/event_controls_view',$data);
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
	}
	public function WalletDeposit()
	{
		if($_SESSION['UserTypeID']==1){

			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/wallet_deposit_view');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
	}
	public function WalletWithdrawal()
	{
		if($_SESSION['UserTypeID']==1){

			$this->load->view('admin/template/header_template_view.php');
			$this->load->view('admin/wallet_withdrawal_view');
			$this->load->view('admin/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
	}
}
