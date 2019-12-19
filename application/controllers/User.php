<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends MY_Controller {

	function __construct(){
		parent::__construct();
		
	}
	public function index(){
		
		$this->load->view($this->page_view);
		
	}
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
	public function main(){
		$this->load->view('main');
	}
	public function dashboard(){
		$this->callDashboard();
		
	}
	public function account(){
		$this->callDashboard();
	}
	public function profile(){
		$this->callDashboard();
	}
	public function post(){
		$this->callDashboard();
	}
	public function project(){
		$this->callDashboard();
	}

	public function callDashboard(){
		if($this->is_user_login())
		{
			$this->load->view($this->page_view);
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
	
}

?>