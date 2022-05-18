<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
  public function GetAllAgents()
  {
    $result=$this->AgentModel->GetAllAgents();
    echo json_encode($result);
  }
  public function AddAgent()
  {
    $response['error']="";
    if($this->input->post('Firstname')==""||$this->input->post('Lastname')==""||$this->input->post('GcashNumber')==""||$this->input->post('GcashName')=="")
    {
      $response['error']="Please fill out all the required fields";
    }else{
      if($this->input->post('Password')==$this->input->post('CPass')){
        $IsUsernameExisted=$this->UserModel->CheckUsernameExistince($this->input->post('Username'),0);
        if($IsUsernameExisted){
          $response['error']="Username already existed";
        }else{
          $userdata = array(
            'Username' => $this->input->post('Username'),
            'Password' => $this->input->post('Password'),
            'UserTypeID' => 3
          );
          $lastuserid=$this->UserModel->AddUser($userdata);

          $agentdata = array(
            'Firstname' => $this->input->post('Firstname'),
            'Lastname' => $this->input->post('Lastname'),
            'Gcashnumber' => $this->input->post('GcashNumber'),
            'GcashName' => $this->input->post('GcashName'),
            'FacebookLink' => $this->input->post('FacebookLink'),
            'UserID' => $lastuserid
          );
          if($this->AgentModel->AddAgent($agentdata)){
            $response["success"]=true;

          }
        }
      }else{
        $response["error"]="Password and confirm password don't match.";

      }

    }
    echo json_encode($response);
  }
  public function UpdateAgent()
  {
    $response['error']="";
    if($this->input->post('Firstname')==""||$this->input->post('Lastname')==""||$this->input->post('GcashNumber')==""||$this->input->post('GcashName')==""||$this->input->post('Username')==""){
      $response['error']="Please fill out all fields.";
    }else{
      $IsUsernameExisted=$this->UserModel->CheckUsernameExistince($this->input->post('Username'),$this->input->post('UserID'));
      if($IsUsernameExisted){
        $response['error']="Username already existed";
      }else{
        $where = array('AgentID' => $this->input->post('AgentID') );
        $data = array(
          'Firstname' => $this->input->post('Firstname'),
          'Lastname' => $this->input->post('Lastname'),
          'Gcashnumber' => $this->input->post('GcashNumber'),
          'GcashName' => $this->input->post('GcashName'),
          'FacebookLink' => $this->input->post('FacebookLink')
        );
        $userwhere = array('UserID' => $this->input->post('UserID'));
        $userdata = array('Username' => $this->input->post('Username'));
        if($this->AgentModel->UpdateAgent($where,$data)||$this->UserModel->UpdateUser($userwhere,$userdata)){
          $response['success']=true;
        }
      }

    }
    echo json_encode($response);
  }
  public function Players()
  {
    if($_SESSION['UserTypeID']==3){
			$this->load->view('agent/template/header_template_view.php');
			$this->load->view('agent/player_view.php');
			$this->load->view('agent/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
  }
  public function Dashboard()
  {
    if($_SESSION['UserTypeID']==3){
			$this->load->view('agent/template/header_template_view.php');
			$this->load->view('agent/dashboard_view.php');
			$this->load->view('agent/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
  }
  public function PlayerInfo($playerid,$userid)
  {
    $info['pwallettransaction']=$this->PlayerWalletTransactionModel->getPlayerTransaction($playerid);
    $info["info"]=$this->PlayerModel->getInfoByID($playerid);
		$info["accountinfo"]=$this->UserModel->getUser($userid);
		if($_SESSION['UserTypeID']==3){
			$this->load->view('agent/template/header_template_view.php',$info);
			$this->load->view('agent/player_info_view.php');
			$this->load->view('agent/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
  }
  public function GcashToWallet()
  {
    if($_SESSION['UserTypeID']==3){
			$this->load->view('agent/template/header_template_view.php');
			$this->load->view('agent/gcash_to_wallet_view.php');
			$this->load->view('agent/template/footer_template_view.php');
		}else{
			header("Location:".site_url()."/Welcome");
		}
  }
  public function GetMyPlayers()
  {
    $data=$this->PlayerModel->getPlayerByUserRecruit($_SESSION['UserID']);
    echo json_encode($data);
  }
}
