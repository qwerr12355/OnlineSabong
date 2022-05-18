<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->model('UserModel');
  }
  public function AddUser($data)
  {
    $data = array(
      'Username' => $this->input->post('Username'),
      'Password' => $this->input->post('Password'),
    );
    return $query;
  }
  public function GetUserWallet()
  {

  }
  public function ChangePassword()
  {
    $where = array('UserID' => $this->input->post('UserID'));
    $data = array(
      'Password' => $this->input->post('Password')
    );
    $datas['error']="";
    if($this->input->post('Password')==""||$this->input->post('CPass')==""||$this->input->post('OldPass')==""){
      $datas['error']="Please fill out all fields";
    }else{
      if($this->input->post('Password')==$this->input->post('CPass')){

        $datas["OldPasswordIncorrect"]=false;

        $whereoldpass = array('Password' => $this->input->post('OldPass'), 'UserID'=>$this->input->post('UserID') );
        if($this->UserModel->getOldPassword($whereoldpass)==false){
          $datas["OldPasswordIncorrect"]=true;
        }
        if($datas["OldPasswordIncorrect"]){
          $datas['error']="Old Password is not correct.";
        }else{
          $updatequery=$this->UserModel->UpdateUser($where,$data);
          if($updatequery){
            $datas["success"]=true;
          }
        }
      }else{
        $datas['error']="New password and confirm password dont match.";
      }
    }
    echo json_encode($datas);
  }
  public function Authenticate()
  {
    $where = array(
      'Username' => $this->input->post('Username'),
      'Password' => $this->input->post('Password')
    );
    $result['error']="";
    $users=$this->UserModel->authentication($where);
    if($users){
      if($users->Username==$this->input->post('Username')&&$users->Password==$this->input->post('Password')){
          $sessiondata = array(
            'UserID' => $users->UserID,
            'UserTypeID' => $users->UserTypeID,
            'Username' => $users->Username,
            'Password' => $users->Password,
            'DateCreated' => $users->DateCreated,
            'Firstname' => $users->Firstname,
            'Lastname' => $users->Lastname,
            'GcashNumber' => $users->GcashName,
            'GcashName' => $users->GcashName,
            'FBLink' => $users->FBLink
          );
          $this->session->set_userdata($sessiondata);
      }else{
        $result['error']="Invalid username and password. Check capslock.";
      }
    }else{
      $result['error']="Invalid Username and password.";
    }
    echo json_encode($result);
  }
  public function Logout()
  {
    $this->session->sess_destroy();
    header("Location:".site_url()."/Welcome");
  }

}
