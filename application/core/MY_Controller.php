<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Core/Global Controller 
| -------------------------------------------------------------------
|
|  This is a general controller 
|
*/
class  MY_Controller  extends  CI_Controller  {
	var $page_view; //String : set page for current user
	var $page_dashboard_sidenav;
	var $perms = array();  //Array : Stores the permissions for the user
	var $userID;   //Integer : Stores the ID of the current user
	var $userFullname; 
	var $userName; 
	var $userRoles = array(); //Array : Stores the roles of the current user
	

    function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		// $this->load->helper('menu_helper');
		// $this->load->helper('link_helper');
		$this->load->model('users_model');
		$this->load->library('session');

		// $this->session->userdata('user')
		
		if($this->is_user_login())
		{

			$this->load->helper('menu_helper');
			$this->userID = $this->users_model->getuserID();
			$this->userName = $this->users_model->getuserName();
			$this->userFullname = $this->users_model->getuserFullname();
  			$this->userRoles = $this->users_model->getUserRoles();
  			
  			
			$this->sidenav["Dashboard"] = array(
	  							"controller"	=>"dashboard",
	  							"icon"			=>"home",
	  							"link"			=>"dashboard",);

  			if(array_search("admin", $this->userRoles)){

  				$this->sidenav["Account"] = array(
	  							"controller"	=>"account",
	  							"icon"			=>"user",
	  							"link"			=>"account",);
  				$this->sidenav["Post"] = array(
	  							"controller"	=>"post",
	  							"icon"			=>"icon-blog",
	  							"link"			=>"post",);
  				$this->sidenav["Project"] = array(
	  							"controller"	=>"project",
	  							"icon"			=>"icon-clipboard3",
	  							"link"			=>"project",);
  			}
  			if(array_search("contributor", $this->userRoles)|| array_search("editor", $this->userRoles)){
  				$this->sidenav["Post"] = array(
	  							"controller"	=>"post",
	  							"icon"			=>"icon-blog",
	  							"link"			=>"post",);
  			}
  			if($this->userRoles == "manager"){
  				$this->sidenav["Project"] = array(
	  							"controller"	=>"project",
	  							"icon"			=>"icon-clipboard3",
	  							"link"			=>"project",);
  			}
  			
  			
  			$this->page_dashboard_sidenav = side_navigation($this->sidenav,$this->uri->segment(1));
			$this->page_view = "dashboard";
			
		}
		else{
			$this->page_view = "authentication";
			
		}

	}
	public function is_user_login() {
	    return ($this->session->userdata('user')) ? true : false;
	     
	}
	

}

?>