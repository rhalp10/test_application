<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Core/Global Model 
| -------------------------------------------------------------------
|
|  This is a general controller 
|
*/
class  MY_Model   extends  CI_Model  {


	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function all_pages(){
			$query =$this->db->get('pages');
			return $query->result_array();
		}
	
	

}