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

    function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('menu_helper');
		$this->load->helper('link_helper');
		$this->load->model('users_model');
		
	}
	

}

?>