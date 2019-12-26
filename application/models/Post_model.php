<?php
class Post_model extends MY_Model {

	function __construct(){
		parent::__construct();
		
	}
	public function post_add($array){
		$this->db->insert('pages', $array);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function post_update($id,$array){
		$this->db->set($array);
		$this->db->where('id', $id);
		$this->db->update('pages');
		return ($this->db->affected_rows() != 1) ? false : true;
		
	}
	public function post_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('pages');

		return ($this->db->affected_rows() != 1) ? false : true;
	}


	public function post_data($id){
		$this->db->select('pages.*,users.name');
		$this->db->from("pages");
		$this->db->join("users",'users.id = pages.user_id');
		$this->db->where('pages.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

}
?>