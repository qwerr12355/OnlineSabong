<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['openevents']=$this->EventModel->GetOpenEvent();
    if($_SESSION['UserTypeID']==4){
      $this->load->view('player/template/header_template_view');
      $this->load->view('player/player_dashboard_view',$data);
      $this->load->view('player/template/footer_template_view');
		}else{
			header("Location:".site_url()."/Welcome");
		}

  }
  public function Event($id)
  {
    $data['EventID']=$id;
    $data['eventinfo']=$this->EventModel->GetEventByID($id);
    if($_SESSION['UserTypeID']==4){
      $this->load->view('player/template/header_template_view.php');
      $this->load->view('player/join_event_view',$data);
      $this->load->view('player/template/footer_template_view.php');
    }else{
      header("Location:".site_url()."/Welcome");
    }
  }
  public function Add()
  {
    $userdata = array(
			'Username' => $this->input->post('Username'),
			'Password' => $this->input->post('Password'),
			'UserTypeID'=> 4
		);


    $result['error']='';
    if($this->input->post('Firstname')==""||$this->input->post('Lastname')==""||$this->input->post('GcashNumber')==""||$this->input->post('GcashName')==""||$this->input->post('Username')==""||$this->input->post('Password')==""){
      $result['error']='Please input all the required information.';
    }else{
      if($this->input->post('Password')==$this->input->post('Cpass')){
        $IsUsernameExisted=$this->UserModel->CheckUsernameExistince($this->input->post('Username'),0);
        if($IsUsernameExisted){
          $result['error']="Username already existed";
        }else{
        	$lastid=$this->UserModel->AddUser($userdata);
          $playerdata = array(
            'Firstname' => $this->input->post('Firstname'),
            'Lastname' => $this->input->post('Lastname'),
            'Gcashnumber' => $this->input->post('GcashNumber'),
            'GcashName' => $this->input->post('GcashName'),
            'FacebookLink	' => $this->input->post('FacebookLink'),
            'UserID	' =>  $lastid
          );
          $addPlayer=$this->PlayerModel->AddNewPlayer($playerdata);
          if($addPlayer){
            $playerUserRecruitData = array('UserID' => $_SESSION['UserID'],'PlayerID'=>$addPlayer );
            $addPlayerUserRecruit=$this->PlayerUserRecruit->Add($playerUserRecruitData);
            if(!$addPlayerUserRecruit){
              $result['error']="Player Info Error";
            }
          }
        }
      }else{
        $result['error']='Password and Confirm Password did not match!';

      }
    }

    echo json_encode($result);
  }
  public function GetAllPlayer()
  {
    $players=$this->PlayerModel->getAllPlayer();
    echo json_encode($players);
  }
  public function UpdatePlayer()
  {
    $where = array('PlayerID' => $this->input->post('PlayerID') );
    $data = array(
			'Firstname' => $this->input->post('Firstname'),
			'Lastname' => $this->input->post('Lastname'),
			'Gcashnumber' => $this->input->post('Gcashnumber'),
			'GcashName' => $this->input->post('GcashName'),
      'FacebookLink' => $this->input->post('FacebookLink')
		);

    $response['success']=false;
    $response['error']="";

    if($this->input->post('Firstname')==""||$this->input->post('Lastname')==""||$this->input->post('Gcashnumber')==""||$this->input->post('GcashName')==""||$this->input->post('Username')==""){
      $response['error']="Please enter all required Information";
    }else{
      $IsUsernameExisted=$this->UserModel->CheckUsernameExistince($this->input->post('Username'),$this->input->post('UserID'));
      if($IsUsernameExisted){
        $response['error']="Username already existed";
      }else{
        $userwhere = array('UserID' => $this->input->post('UserID'));
        $userdata = array('Username' => $this->input->post('Username'));
        $updatePlayer=$this->PlayerModel->updatePlayer($where,$data);
        if($updatePlayer||$this->UserModel->UpdateUser($userwhere,$userdata)){
          $response['success']=true;
        }
      }
    }

    echo json_encode($response);
  }
  public function GetInfoByID()
  {
    $playerdata=$this->PlayerModel->getInfoByID($this->input->post('PlayerID'));
    echo json_encode($playerdata);
  }
  public function GetInfoUserID()
  {
    $playerdata=$this->PlayerModel->getInfoByUserID($this->input->post('UserID'));
    echo json_encode($playerdata);
  }
  public function GetPlayerConsole()
  {
    $query=$this->CockfightModel->GetLastCockfight($this->input->post('EventID'));
    $response['success']=false;
    $response['meronwinningprice']=0;
    $response['walawinningprice']=0;

    $response['totalwalabet']=0;
    $response['totalmeronbet']=0;
    $pinfo=$this->PlayerModel->getInfoByID($_SESSION['PlayerID']);
    $response['PlayerWallet']=$pinfo->WalletBalance;

    if($query){

      $response['GetLastCockfight']=$query;
      $response['success']=true;
      $response['playertotalbet']=0;
      $response['GetLastCockfight']=$query;
      $meronbet=$this->PlayerBetModel->GetCockFightTotalMeronBet($query->CockfightID);

      $specificplayerbet=$this->PlayerBetModel->GetSpecificPlayerBet($_SESSION['PlayerID'],$query->CockfightID);
      if($specificplayerbet){
        $response['CurrentPlayerBet']=$specificplayerbet;
      }
      if($meronbet){
        $response['totalmeronbet']=$meronbet->total;
      }
      $playertotalbet=$this->PlayerBetModel->GetSpecificPlayerBetTotal($_SESSION['PlayerID'],$query->CockfightID);
      if($playertotalbet){
        $response['playertotalbet']=$playertotalbet->total;

      }
      $walabet=$this->PlayerBetModel->GetCockFightTotalWalaBet($query->CockfightID);
      if($walabet){
        $response['totalwalabet']=$walabet->total;
      }
      if($meronbet&&$walabet){
        if($meronbet->total!=0&&$walabet->total!=0){
          $walaprice=((($meronbet->total/$walabet->total)*100)+100);
          $meronprice=((($walabet->total/$meronbet->total)*100)+100);
          $meronprice=$meronprice-($meronprice*.06);
          $walaprice=$walaprice-($walaprice*.06);
          $response['meronwinningprice']=$meronprice;
          $response['walawinningprice']=$walaprice;
          $response['meronodds']=$walabet->total/$meronbet->total;
          $response['walaodds']=$meronbet->total/$walabet->total;
          $response['totalwalabet']=$walabet->total*1;
          $response['totalmeronbet']=$meronbet->total*1;

        }
      }

    }
    echo json_encode($response);
  }
  public function GetCockFightTotal()
  {
    $meronbet=$this->PlayerBetModel->GetCockFightTotalMeronBet($this->input->post('CockFightID'));
    $response['totalmeronbet']=0;
    $response['meronwinningprice']=0;
    $response['walawinningprice']=0;
    if($meronbet){
      $response['totalmeronbet']=$meronbet;
    }
    $walabet=$this->PlayerBetModel->GetCockFightTotalWalaBet($this->input->post('CockFightID'));
    $response['totalwalabet']=0;
    if($walabet){
      $response['totalwalabet']=$walabet;
    }
    if($meronbet->total!=0&&$walabet->total!=0){
        $walaprice=((($meronbet->total/$walabet->total)*100)+100);
        $meronprice=((($walabet->total/$meronbet->total)*100)+100);
        $meronprice=$meronprice-($meronprice*.06);
        $walaprice=$walaprice-($walaprice*.06);
        $response['meronwinningprice']=$meronprice;
        $response['walawinningprice']=$walaprice;

        $response['totalwalabet']=$walabet->total*1;
        $response['totalmeronbet']=$meronbet->total*1;

    }
    echo json_encode($response);
  }
  public function BetMeron()
  {
    $response['error']="";
    if($this->input->post('BetAmount')==""||$this->input->post('BetAmount')<=0 ||$this->input->post('CockFightID')==""){
      $response['error']="Please check your amount!";
    }else{
      $pinfo=$this->PlayerModel->getInfoByID($_SESSION['PlayerID']);
      if($this->input->post('BetAmount')>$pinfo->WalletBalance){
        $response['error']="Wallet balance is not enough. Please cash in to your operator/agent!";
      }else{
        $data = array(
          'BetAmount' => $this->input->post('BetAmount'),
          'Choice' => "Meron",
          'CockFightID'=> $this->input->post('CockFightID'),
          'PlayerID'=>$_SESSION['PlayerID']
        );
        if($this->PlayerBetModel->Add($data)){
          $pwallet=$pinfo->WalletBalance;
          $pbetamount=$this->input->post('BetAmount');
          $pwallet=$pwallet-$pbetamount;
          $pwalletinsertwhere = array('PlayerID' => $_SESSION['PlayerID'] );
          $pwalletinsertdata = array('WalletBalance' => $pwallet );
          $this->PlayerModel->updatePlayer($pwalletinsertwhere,$pwalletinsertdata);
        }
        $response['success']=true;
      }

    }
    echo json_encode($response);
  }
  public function BetWala()
  {
    $response['error']="";
    if($this->input->post('BetAmount')==""||$this->input->post('BetAmount')<=0 ||$this->input->post('CockFightID')==""){
      $response['error']="Please check your amount!";
    }else{
      $pinfo=$this->PlayerModel->getInfoByID($_SESSION['PlayerID']);
      if($this->input->post('BetAmount')>$pinfo->WalletBalance){
        $response['error']="Wallet balance is not enough. Please cash in to your operator/agent!";
      }else{
        $data = array(
          'BetAmount' => $this->input->post('BetAmount'),
          'Choice' => "Wala",
          'CockFightID'=> $this->input->post('CockFightID'),
          'PlayerID'=>$_SESSION['PlayerID']
        );
        if($this->PlayerBetModel->Add($data)){
          $pwallet=$pinfo->WalletBalance;
          $pbetamount=$this->input->post('BetAmount');
          $pwallet=$pwallet-$pbetamount;
          $pwalletinsertwhere = array('PlayerID' => $_SESSION['PlayerID'] );
          $pwalletinsertdata = array('WalletBalance' => $pwallet );
          $this->PlayerModel->updatePlayer($pwalletinsertwhere,$pwalletinsertdata);
        }
        $response['success']=true;
      }

    }
    echo json_encode($response);
  }
}
