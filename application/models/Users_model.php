<?php
// Users_model extends Core_Model
// include('MY_Model.php'); 
	class Users_model extends MY_Model {
		function __construct(){
			parent::__construct();
			
		}
		public function login($login_user, $login_password){
			$query = $this->db->get_where('users', array('username'=>$login_user, 'password'=>$login_password));
			return $query->row_array();
		}



	}
?>