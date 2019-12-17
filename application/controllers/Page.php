<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Page extends MY_Controller {
	function __construct(){
		parent::__construct();
	}

	
	public function index(){
	
		$this->load->library('session');


		
		if($this->session->userdata('user')){
			
			$data  = [
					'page_title' => "Page Management",
					"script" => "page"
					];
			
			$data["form_page"]["form_attribute"] = array(
	              'class'  	=> '',
	              'id' 		=> 'page_form',
	              'role' 	=> 'form',
	              'method' 	=> 'POST',
	          );
	        $data["form_page"]["submit_button_attribute"] = array(
	                  'class'   =>"btn btn-primary",
	                  'id' 		=> 'submit_input',
	                  'type'    => 'submit',
	                  'name'    => 'submit_input',
	                  'content' => 'Submit',
	          );

			$data["form_page"]["title"] = array(
			        'type' 			=>"text" ,
			        'id'			=>"page_title", 
			        'class'			=>"form-control", 
			        'placeholder'	=>"Title" ,
			        'name'			=>"page_title", 
			        'value'         => '',
			        'required' 		=> '',
			);
			$data["form_page"]["body"] = array(
			        'type' 			=>"text" ,
			        'id'			=>"page_content", 
			        'class'			=>"form-control", 
			        'placeholder'	=>"Body Content" ,
			        'name'			=>"page_content", 
			        'value'         => '',
			        'required' 		=> '',
			);
			$data["form_page"]["status_options"] = array(
	          
	          '1'        => 'Activate',
	          '0'        => 'Deactived',
	          );

	        $data["form_page"]["status_options_js"] = array(
	                  'class'       => 'form-control',
	                  'id'       => 'page_status',
	        );

			$data["form_page"]["page_ID"] = array(
			        'type' 			=>"hidden" ,
			        'id'			=>"page_ID", 
			        'name'			=>"page_ID", 
			        'value'         => 'page_ID',
			);
			$data["form_page"]["operation"] = array(
			        'type' 			=>"hidden" ,
			        'id'			=>"operation", 
			        'name'			=>"operation", 
			        'value'         => 'page_submit',
			);
			$this->load->view('page',$data);
		}
		else{
			$this->load->view('authentication');
		}
		
	}

	function fetch_data(){
		$this->load->library('session');
		$user = $this->session->userdata('user');
		extract($user);
		$json = $roles;
   		// $user_id       = $id;
		$user_roles    = $roles;
		$permission = json_decode($user_roles);


		$this->load->model('datatables_page');

		$fetch_data = $this->datatables_page->fetch_data($permission->roles);

		$status_array = array("Deactivate" => 0, "Activate" => 1);
		$data = array();

		foreach ($fetch_data as $row){

			$edit_btn = "";
			if ($permission->roles == 1){
				
				if($row->status == 0){
				$edit_btn = '<button type="button" class="btn btn-primary edit" id="'.$row->id.'"><span class="icon-database-edit2" ></span></button>';
				}
				else{ $edit_btn = ""; }
			}
			else{
				$edit_btn = '<button type="button" class="btn btn-primary edit" id="'.$row->id.'"><span class="icon-database-edit2" ></span></button>';
			}

			$sub_array  = array();
			$sub_array[]  = '
			<div class="card " id="rm_card">
			  <div class="card-header text-white" style="background-color:#495057">
			  	'.$row->title.'('.array_search($row->status, $status_array).') 
			  	<div class="btn-group btn-group-sm float-right" role="group" aria-label="">
				  <button type="button" class="btn btn-info view"><span class="icon-eye" ></span></button>
				  '.$edit_btn.'
				  
				  
				</div>
			   <br>
				 <b>Author:</b> '.$row->name.'
			  </div>
			  <div class="card-body">
			    
			   	'.$row->body.'
			  </div>
			  <div class="card-footer text-muted" style="background-color:#6c757d">
			    
			  </div>
			</div>
			';
			// <button type="button" class="btn btn-danger delete" id="'.$row->id.'"><span class="icon-cross2" ></span></button>
		
		

			$data[] = $sub_array;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"		=> 	$this->datatables_page->get_all_data(),
			"recordsFiltered"	=>	$this->datatables_page->get_filtered_data(),
			"data"				=>	$data
		);
		echo json_encode($output);

	}
	function insert(){
		$data = array();
		if($operation = $this->input->post('operation')){
			
			$this->load->model('page_model');

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
				if($this->page_model->page_add($post_data)){
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
				
				if($this->page_model->page_update($page_ID,$post_data)){
					$data['success'] = "Page successfully updated.";
				}
				else{
					$data['error'] = "Page update failed.";
				}
			}
			//IF PAGE IS DELETE
			if($operation == "page_delete"){
				$id = $this->input->post('page_ID');
				if($this->page_model->page_delete($id)){
					$data['success'] = "Page successfully deleted.";
				}
				else{
					$data['error'] = "Page failed to delete.";
				}
				
				
			}
		}

		echo json_encode($data);
	}
	function fetch_single(){
		$this->load->model('page_model');
		$id = $this->input->post('page_ID');
		$page_data = $this->page_model->page_data($id);
		extract($page_data);

		$data = array();
		$data["page_ID"] = $id;
		$data["page_title"] = $title;
		$data["page_content"] = $body;
		$data["page_status"] = $status;

		echo json_encode($data);
		
	

		
	}

}


?>