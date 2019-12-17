<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Account extends MY_Controller {
	function __construct(){
		parent::__construct();
	}

	
	public function index(){
	
		$this->load->library('session');


		
		if($this->session->userdata('user')){
			
			$data  = [
					'page_title' => "Account Management",
					"script" => "account"
					];

			$data["form_account"]["form_attribute"] = array(
	              'class'  => '',
	              'id' => 'account_form',
	              'role' => 'form',
	              'method' => 'POST',
	          );
	        $data["form_account"]["submit_button_attribute"] = array(
	                  'class'         =>"btn btn-primary",
	                  'id' => 'submit_input',
	                  'type'          => 'submit',
	                  'name'            => 'submit_input',
	                  'content' => 'Submit',
	          );

			$data["form_account"]["username"] = array(
			        'type' 			=>"text" ,
			        'id'			=>"account_user", 
			        'class'			=>"form-control", 
			        'placeholder'	=>"Username" ,
			        'name'			=>"account_user", 
			        'value'         => '',
			        'required' => '',
			);
			$data["form_account"]["password"] = array(
			        'type' 			=>"password" ,
			        'id'			=>"account_password", 
			        'class'			=>"form-control", 
			        'placeholder'	=>"Password" ,
			        'name'			=>"account_password", 
			        'value'         => '',
			        'required' => '',
			);
			$data["form_account"]["confirm-password"] = array(
			        'type' 			=>"password" ,
			        'id'			=>"account_confirm_password", 
			        'class'			=>"form-control", 
			        'placeholder'	=>"Confirm Password" ,
			        'name'			=>"account_confirm_password", 
			        'value'         => '',
			        'required' => '',
			);
			$data["form_account"]["fullname"] = array(
			        'type' 			=>"text" ,
			        'id'			=>"account_name", 
			        'class'			=>"form-control", 
			        'placeholder'	=>"Full Name" ,
			        'name'			=>"account_name", 
			        'value'         => '',
			        'required' => '',
			);

			$data["form_account"]["role_options"] = array(
	          
	          '1'        => 'Contributor',
	          '2'        => 'Editor',
	          '3'        => 'Admin',
	          );

	        $data["form_account"]["role_options_js"] = array(
	                  'class'       => 'form-control',
	                  'id'       => 'account_role',
	        );

	        $data["form_account"]["account_ID"] = array(
			        'type' 			=>"hidden" ,
			        'id'			=>"account_ID", 
			        'name'			=>"account_ID", 
			        'value'         => 'account_ID',
			);
			$data["form_account"]["operation"] = array(
			        'type' 			=>"hidden" ,
			        'id'			=>"operation", 
			        'name'			=>"operation", 
			        'value'         => 'account_submit',
			);

			
			$this->load->view('account',$data);
		}
		else{
			$this->load->view('authentication');
		}
		
	}


	

	
	function fetch_data(){
		$this->load->model('datatables_account');
		$fetch_data = $this->datatables_account->fetch_data();

		$data = array();
		foreach ($fetch_data as $row){
			$sub_array  = array();

			$permission = json_decode($row->roles);
			$roles_array = array("Visitor" => 0, "Contributor" => 1, "Editor" => 2, "Admin" => 3);
			
			$sub_array[]  = $row->id;
			$sub_array[]  = $row->name;
			$sub_array[]  = $row->username;
			$sub_array[]  = array_search($permission->roles, $roles_array); 
		
			$sub_array[]  = '
			<div class="btn-group" role="group" aria-label="Basic example">
			  <button type="button" class="btn btn-info btn-sm view"    id="'.$row->id.'">View</button>
			  <button type="button" class="btn btn-primary btn-sm edit"    id="'.$row->id.'">Edit</button>
			  <button type="button" class="btn btn-danger btn-sm delete"    id="'.$row->id.'">Delete</button>
			</div>
			';
		
		

			$data[] = $sub_array;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"		=> 	$this->datatables_account->get_all_data(),
			"recordsFiltered"	=>	$this->datatables_account->get_filtered_data(),
			"data"				=>	$data
		);
		echo json_encode($output);

	}
	
	function insert(){
		$data = array();
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

		echo json_encode($data);
	}
	function fetch_single(){
		$this->load->model('account_model');
		$id = $this->input->post('account_ID');
		$user_data = $this->account_model->user_data($id);
		extract($user_data);
	
		$permission = json_decode($roles);
		
		$data = array();
		$data["account_ID"] = $id;
		$data["account_password"] = $password;
		// $data["account_confirm_password"] = $password;
		$data["account_user"] = $username;
		$data["account_fullname"] = $name;
		$data["account_role"] = $permission->roles;
		echo json_encode($data);
		
	

		
	}

}


?>