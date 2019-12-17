<?php
class Account_model extends MY_Model {
	function __construct(){
		parent::__construct();
		
	}
	public function if_user_exist($username){
		$query = $this->db->get_where('users', array(
		            'username' => $username
		        ));

		$count = $query->num_rows();
		return $count;
	}
	public function user_add($array){
		$this->db->insert('users', $array);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function user_update($id,$array){
		$this->db->set($array);
		$this->db->where('id', $id);
		$this->db->update('users');
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function user_delete($id){
		$this->db->where('user_id', $id);
		$this->db->delete('pages');

		$this->db->where('id', $id);
		$this->db->delete('users');

		return ($this->db->affected_rows() != 1) ? false : true;
	}


	public function user_data($id){
		$query = $this->db->get_where('users', array(
		            'id' => $id
		        ));
		return $query->row_array();
	}

	

	



}
?>