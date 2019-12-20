<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends MY_Controller {

	function __construct(){
		parent::__construct();
		
	}
	public function index(){
		
		$this->load->view($this->page_view);
		
	}

	public function main(){
		$this->load->view('main');
	}
	public function dashboard(){
		$this->callDashboard();
		
	}
	/*
	| -------------------------------------------------------------------
	|  ACCOUNT MANAGEMENT
	| -------------------------------------------------------------------
	|
	|  
	|
	*/
	public function account(){
		$this->callDashboard();
	}
	public function account_update(){
		$this->callDashboard();

	}
	public function account_view(){
		$this->callDashboard();

	}
	public function account_delete(){
		$this->callDashboard();

	}
	/*
	| -------------------------------------------------------------------
	|  USER PROFILE 
	| -------------------------------------------------------------------
	|
	|  
	|
	*/
	public function profile(){
		$this->callDashboard();
	}

	/*
	| -------------------------------------------------------------------
	*/	
	/*
	| -------------------------------------------------------------------
	|  POST MANAGEMENT
	| -------------------------------------------------------------------
	|
	|  
	|
	*/
	public function post($id = ''){
		$this->callDashboard();
	}
	public function post_update($id = ''){
		$this->callDashboard();

	}
	public function post_view($id = ''){
		$this->callDashboard();

	}
	public function post_delete($id = ''){
		$this->callDashboard();

	}
	/*
	| -------------------------------------------------------------------
	*/	

	/*
	| -------------------------------------------------------------------
	|  PROJECT MANAGEMENT
	| -------------------------------------------------------------------
	|
	|  
	|
	*/
	public function project(){
		if(array_search("manage1r", $this->userRoles)){
			$this->callDashboard();
		}
		else{
			$this->callDashboard(false);

		}

		
	}
	public function project_update(){

	}
	public function project_view(){

	}
	public function project_delete(){

	}
	/*
	| -------------------------------------------------------------------
	*/


	/*
	| -------------------------------------------------------------------
	|  SESSION
	| -------------------------------------------------------------------
	|
	|  
	|
	*/

	public function authentication(){
		$output = array();
		
		$this->load->library('session');

		$all_fields = array('login_user','login_password');
		$credential_data = array();
        foreach($all_fields as $field) {
            if($this->input->post($field) == null)
                $credential_data[$field] = '';
            else
                $credential_data[$field] = $this->input->post($field);
        }

		$data = $this->users_model->verify_login($credential_data);

		if($data["success"]){
			$this->session->set_userdata('user', $data["success"]);
			$array_msg = array(
				'alert_class'	=>'alert alert-success',
				'alert_msg'		=>'Success Login');
			$this->session->set_flashdata($array_msg);
			redirect('dashboard');
			
		}
		else{

			$array_msg = array(
				'alert_class'	=>'alert alert-danger',
				'alert_msg'		=>$data["error"]);
			$this->session->set_flashdata($array_msg);
			redirect('/');
		} 

		echo json_encode($output,true);
	}
	public function callDashboard($has_access_inpage = true){


		if($this->is_user_login())
		{
			if($has_access_inpage == false){

				$data["restrict"] = "true";
				$this->load->view($this->page_view,$data);
			}
			else{
				$this->load->view($this->page_view);
			}
			
			
		}
		else{
			
			$array_msg = array(
				'alert_class'	=>'alert alert-danger',
				'alert_msg'		=>'Login required to proceed.');
			$this->session->set_flashdata($array_msg);

			redirect('/');
		}
	}
	
	public function logout(){
		$this->load->library('session');
		$this->session->unset_userdata('user');
		$array_msg = array(
				'alert_class'	=>'alert alert-success',
				'alert_msg'		=>'Logout success.');
		$this->session->set_flashdata($array_msg);
		redirect('/');
	}
	/*
	| -------------------------------------------------------------------
	*/	
}

?>