<?php
class Datatable_model extends MY_Model {
	var $dt_table = '';
	var $dt_select_column = array();
	var $dt_order_column  = array();
	var $dt_like  = array();
	var $dt_join= array();

	function __construct(){
		parent::__construct();
		
	}
	/*
	| -------------------------------------------------------------------
	|  JSON DATATABLE 
	| -------------------------------------------------------------------
	|
	|  
	|
	*/
	function json_data($ctrlr_methd = ''){
		
		if($ctrlr_methd == "account"){
		
			$this->dt_table = "users";
			$this->dt_select_column = array("id","username","password","name","roles");
			$this->dt_order_column = array(null,"username","password","name",null);
			$this->dt_like = array("username");

			$fetch_data = $this->fetch_datatable();

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
		}
		if($ctrlr_methd == "post"){
	
			$this->dt_table = "pages";
			$this->dt_select_column = 'pages.*,users.name';
			$this->dt_order_column = array(null,"title","body","status","created_date");
			$this->dt_like = array("title","body","status","users.name");
			$this->dt_join = array(
								'users' 	=> 'users.id = pages.user_id',
							 );

			$user = $this->session->userdata('user');
			extract($user);
			$json = $roles;
	   		
			$user_roles    = $roles;
			$permission = json_decode($user_roles);

			$fetch_data = $this->fetch_datatable();

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
		}
		//OUTPUT AS JSON
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"		=> 	$this->get_all_data(),
			"recordsFiltered"	=>	$this->get_filtered_data(),
			"data"				=>	$data
		);
		return json_encode($output);
	}
	/*
	| -------------------------------------------------------------------
	*/

	function make_query(){
		

		

	
		$this->db->select($this->dt_select_column);
		$this->db->from($this->dt_table);

		if(is_array($this->dt_join)){
			foreach($this->dt_join as $table => $on_match){
			$this->db->join($table,$on_match);
			}
		}
		if(isset($_POST["search"]["value"])){
			$a = 1;
			foreach($this->dt_like as $search){
				if($a == 1){
					$this->db->like($search,$_POST["search"]["value"]);
				}
				else{
					$this->db->or_like($search,$_POST["search"]["value"]);
				}
				$a++;
			}
			
			
		}
		if(isset($_POST["order"])){
			$this->db->order_by($this->dt_order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
		}
		else{
			$this->db->order_by("id","DESC");

		}

	}
	function fetch_datatable(){
		$this->make_query();
		if(isset($_POST["length"])){
			if($_POST["length"] != 1){
				$this->db->limit($_POST["length"],$_POST["start"]);
			}
		}
		$query = $this->db->get();
		return $query->result();
	}
	function get_filtered_data(){
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_all_data(){
		$this->db->select("*");
		$this->db->from($this->dt_table);
		return $this->db->count_all_results();

	}

	

	



}
?>