<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Page_view extends MY_Controller {
	function __construct(){
		parent::__construct();
	}

	
	public function index($id=''){
		$this->load->model('page_model');
		
		
		if($this->page_model->page_data($id)){
			$page_data = $this->page_model->page_data($id);
			
		
			$data["page_data"] = $page_data;
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
			
		
			$this->load->view('templates/head',$data);
			$this->load->view('templates/header',$data);
			$this->load->view('page_view',$data);
			$this->load->view('templates/script',$data);
		}
		else{
			show_404();
		}
	}
	public function fetch_data(){
			//EXTRA CSS
			$data  = [
				'link_css' => array(
							link_file(base_url(),"css","assets/plugins/datatables/datatables.min.css")),
				'link_script' => array(
							link_file(base_url(),"script","assets/plugins/datatables/datatables.min.js"),
							),
				];
  
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
			$data["script"] = "page_fetch";
			
		
			$this->load->view('templates/head',$data);
			$this->load->view('templates/header',$data);
			$this->load->view('page_fetch',$data);
			$this->load->view('templates/script',$data);
	}
	public function post_data(){
		$this->load->model('datatables_page');

		$fetch_data = $this->datatables_page->fetch_data();
		$data = array();

	
		foreach ($fetch_data as $row){

		
		
			$sub_array  = array();
			$sub_array[]  = '
			<div class="card " id="rm_card">
			  <div class="card-header text-white" style="background-color:#495057">
			  	<a href="post/'.$row->id.'"  style="color:white;">'.$row->title.'</a>
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
	
}
	?>