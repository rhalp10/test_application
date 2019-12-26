<?php

	class Users_model extends MY_Model {
		function __construct(){
			parent::__construct();
			
		}
		public function verify_login($credential_data){

			$check_username = $this->getSingleRow('users', array('username'=>$credential_data["login_user"]));
			if($check_username){

				$query = $this->db->get_where('users', array('username'=>$credential_data["login_user"], 'password'=>$credential_data["login_password"]));
				
				if($query->row_array()){
					$data['success'] =  $query->row_array();
				}
				else{
					$data['error'] = "Invalid login. Password Incorrect";
				}
				
			}
			else{
				$data['error'] = "Invalid login. User not found";
			}
        	return $data; 
		}
		public function getuserID() {
			$user = $this->session->userdata('user');
			extract($user);
			return $id;
		}
		
		public function getuserName() {
			$user = $this->session->userdata('user');
			extract($user);
			return $username;
		}
		public function getuserFullname() {
			$user = $this->session->userdata('user');
			extract($user);
			return $name;
		}
		public function getUserRoles() {
	     	$user = $this->session->userdata('user');
			extract($user);
			
			$permission = json_decode($roles);

			$roles = explode(',',$permission->roles);
			$roles_array = array("visitor" => 0, "contributor" => 1, "editor" => 2, "admin" => 3);
			foreach($roles as $search){
				$user_roles[$search] = array_search($search, $roles_array);
			}
			   
	        return $user_roles;
	    }
	 



	}
?>