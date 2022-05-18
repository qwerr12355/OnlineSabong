<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
			if(isset($_SESSION['UserTypeID'])){
				if($_SESSION['UserTypeID']==1){
					header("Location:".site_url()."/Admin/OperatorList");
				}else if(	$_SESSION['UserTypeID']==2){
					header("Location:".site_url()."/Operator/Dashboard");
				}else if($_SESSION['UserTypeID']==3){
					header("Location:".site_url()."/SubOperator/Dashboard");
				}else if($_SESSION['UserTypeID']==4){
					header("Location:".site_url()."/MasterAgent/Dashboard");
				}else if($_SESSION['UserTypeID']==5){
					header("Location:".site_url()."/SubAgent/Dashboard");
				}
			}else{
				$this->load->view('login_view');
			}
	}
}
