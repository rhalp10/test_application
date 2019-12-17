<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends MY_Controller {
	function __construct(){
		parent::__construct();
	}

	
	public function index(){
		
		$this->load->library('session');


		
		if($this->session->userdata('user')){
			
				$data  = [
					'page_title' => "Dashboard",
					];
			
					
			
			$this->load->view('dashboard',$data);
		}
		else{
			$this->load->view('authentication');
		}
		
	}



}


?>