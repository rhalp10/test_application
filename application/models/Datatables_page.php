<?php
class Datatables_page extends MY_Model
{

	var $table = "pages";
	var $select_column = array("user_id","title","body","status","created_date");
	var $order_column = array(null,"title","body","status","created_date");

	function make_query(){
		$this->db->select('pages.*,users.name');
		$this->db->from($this->table);
		$this->db->join("users",'users.id = pages.user_id');
		
		if(isset($_POST["search"]["value"])){
			$this->db->like("title",$_POST["search"]["value"]);
			$this->db->or_like("body",$_POST["search"]["value"]);
			$this->db->or_like("status",$_POST["search"]["value"]);
		}
		if(isset($_POST["order"])){
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
		}
		else{
			$this->db->order_by("id","DESC");

		}

	}
	function fetch_data($permission = ''){
		$this->make_query();
		if($permission){

		}
		else{
			$this->db->having("status",1);
		}
		if($_POST["length"] != 1){
			$this->db->limit($_POST["length"],$_POST["start"]);
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
?>