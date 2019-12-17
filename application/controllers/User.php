<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends MY_Controller {

	function __construct(){
		parent::__construct();
		
	}

	public function index(){
		
		$this->load->library('session');

		
		if($this->session->userdata('user')){
			

			
			$data  = [
				'page_title' => "Dashboard",
				];
			$this->load->view('dashboard',$data);
		}
		else{

			$data["form_login"]["form-attribute"] = array(
	              'class'  => 'form-signin',
	              'id' => 'login_form',
	              'role' => 'form',
	              'method' => 'POST',
	          );
	        
			$data["form_login"]["username"] = array(
			        'type' 			=>"text" ,
			        'id'			=>"login_user", 
			        'class'			=>"form-control", 
			        'placeholder'	=>"Username" ,
			        'name'			=>"login_user", 
			        'value'         => '',
			        'required' => '',
			);
			$data["form_login"]["password"] = array(
			        'type' 			=>"password" ,
			        'id'			=>"login_password", 
			        'class'			=>"form-control", 
			        'placeholder'	=>"Password" ,
			        'name'			=>"login_password", 
			        'value'         => '',
			        'required' => '',
			);
			$data["form_login"]["operation"] = array(
			        'type' 			=>"hidden" ,
			        'id'			=>"login_operation", 
			        'name'			=>"operation", 
			        'value'         => 'submit_login',
			);
			$data["form_login"]["submit"]  = array(
                  'class'         =>"btn btn-primary btn-block",
                  'type'          => 'submit',
                  'style'          => 'background-color: #1d8f1d',
                  'name'            => 'submit_login',
                  'content' => 'Sign in',
          );
			$data["script"] = "authentication";
			
		
			$data["all_pages"] = $this->users_model->all_pages();
			$this->load->view('templates/head',$data);
			$this->load->view('templates/header',$data);
			$this->load->view('authentication',$data);
			$this->load->view('templates/script',$data);
		}
		
	}
	//LOGIN AUTHENTICATION
	public function authentication(){
		$output = array();
		
		$this->load->library('session');

		$login_user = $this->input->post('login_user');
		$login_password = $this->input->post('login_password');

		$data = $this->users_model->login($login_user, $login_password);

		if($data){
			$this->session->set_userdata('user', $data);
			$output["success"] = "Success Login";
			
		}
		else{
			
			$output["error"] = "Invalid login. User not found";
			$this->session->set_flashdata('item', 'value');
		} 

		echo json_encode($output,true);
	}

	public function dashboard(){
		
		$this->load->library('session');

		
		if($this->session->userdata('user')){
			$data["page_title"]  = "Dashboard";
			$data["script"] = "dashboard";
			$this->load->view('dashboard',$data);
		}
		else{
			redirect('/');
		}
		
	}





	

	public function logout(){
		
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}

}
