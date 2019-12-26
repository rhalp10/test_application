<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ajax extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');

		
		
	}
	public function index(){
		
		
		
	}
	public function fetch_datatable($method = ''){
		$this->load->model('datatable_model');
		echo $this->datatable_model->json_data($method);

	}
	function insert($method = ''){
		$data = array();
		if($method == "account"){
			if($operation = $this->input->post('operation')){
			
				$this->load->model('account_model');

				//IF USER IS NEW
				if($operation == "account_submit"){
					$account_user 				= $this->input->post('account_user');
					$account_password 			= $this->input->post('account_password');
					$account_name 				= $this->input->post('account_name');
					$account_confirm_password 	= $this->input->post('account_confirm_password');
					$account_roles 				= '{"roles":"'.$this->input->post('account_role').'"}';

					$if_user_exist = $this->account_model->if_user_exist($account_user);

					

			        if ($if_user_exist === 0) {
			        	// if_password_match
			        	if($account_password === $account_confirm_password)
						{
							$post_data = array(
							        'username' 	=> $account_user,
							        'password' 	=> $account_password,
							        'name' 		=> $account_name,
							        'roles' 	=> $account_roles,
							);
							if($this->account_model->user_add($post_data)){
								$data['success'] = "Account success added.";
							}
							else{
								$data['error'] = "Account failed added.";
							}

							

						}
						else
						{
							$data['error'] = "Password not match.";
						}
			            
			        }
			        else{
			        	$data['error'] = "Username is already taken.";
			        }
					

					

				}
				//IF USER IS UPDATE
				if($operation == "account_update"){

					$account_ID 				= $this->input->post('account_ID');
					$account_password 			= $this->input->post('account_password');
					$account_name 				= $this->input->post('account_name');
					$account_confirm_password 	= $this->input->post('account_confirm_password');
					$account_roles 				= '{"roles":"'.$this->input->post('account_role').'"}';

					// if_password_match
			        if($account_password === $account_confirm_password)
					{
						$post_data = array(
							        'password' 	=> $account_password,
							        'name' 		=> $account_name,
							        'roles' 	=> $account_roles,
							);
						
						if($this->account_model->user_update($account_ID,$post_data)){
							$data['success'] = "Account success updated.";
						}
						else{
							$data['error'] = "Account failed updated.";
						}
					}
					else
					{
						$data['error'] = "Password not match.";
					}
				}
				//IF USER IS DELETE
				if($operation == "account_delete"){
					$id = $this->input->post('account_ID');
					if($this->account_model->user_delete($id)){
						$data['success'] = "Account successfully deleted.";
					}
					else{
						$data['error'] = "Account failed to delete.";
					}
					
					
				}
				
			}
		}
		if($method == "post"){
			if($operation = $this->input->post('operation')){
			
			$this->load->model('post_model');

			//IF PAGE IS NEW
			if($operation == "page_submit")
			{
				$this->load->library('session');
				$user = $this->session->userdata('user');
				extract($user);
				$json = $roles;
   				$user_id       = $id;
				$user_roles    = $roles;
				$permission = json_decode($user_roles);

				if ($permission->roles == 1){
					$page_status = "0";
				}
				else{
					$page_status = $this->input->post('page_status');
				}

				$page_title 	= $this->input->post('page_title');
				$page_content 	= $this->input->post('page_content');

				$post_data = array(
				        'user_id'	=> $user_id,
				        'title' 	=> $page_title,
				        'body' 		=> $page_content,
				        'status' 	=> $page_status,
				);
				if($this->post_model->post_add($post_data)){
					$data['success'] = "Page success added.";
				}
				else{
					$data['error'] = "Page failed added.";
				}

			}
			//IF PAGE IS NEW
			if($operation == "page_update")
			{

				$page_ID 		= $this->input->post('page_ID');
				$page_title 	= $this->input->post('page_title');
				$page_content 	= $this->input->post('page_content');
				$page_status 	= $this->input->post('page_status');
				$post_data = array(
						        'id' 		=> $page_ID,
						        'title' 	=> $page_title,
						        'body' 		=> $page_content,
						        'status' 	=> $page_status,
						);
				
				if($this->post_model->post_update($page_ID,$post_data)){
					$data['success'] = "Page successfully updated.";
				}
				else{
					$data['error'] = "Page update failed.";
				}
			}
			//IF PAGE IS DELETE
			if($operation == "page_delete"){
				$id = $this->input->post('page_ID');
				if($this->post_model->post_delete($id)){
					$data['success'] = "Page successfully deleted.";
				}
				else{
					$data['error'] = "Page failed to delete.";
				}
				
				
			}
		}
		}
	

		echo json_encode($data);
	}
	function fetch_single($method = ''){
		$data = array();
		if($method == "account"){
			$this->load->model('account_model');
			$id = $this->input->post('account_ID');
			$account_data = $this->account_model->user_data($id);
			extract($account_data);
		
			$permission = json_decode($roles);
			
			
			$data["account_ID"] = $id;
			$data["account_password"] = $password;
			// $data["account_confirm_password"] = $password;
			$data["account_user"] = $username;
			$data["account_fullname"] = $name;
			$data["account_role"] = $permission->roles;
		}
		if($method == "post"){
			$this->load->model('post_model');
			$id = $this->input->post('page_ID');
			$page_data = $this->post_model->post_data($id);
			extract($page_data);

			
			$data["page_ID"] = $id;
			$data["page_title"] = $title;
			$data["page_content"] = $body;
			$data["page_status"] = $status;
		}
		
		echo json_encode($data);
		
	

		
	}
}