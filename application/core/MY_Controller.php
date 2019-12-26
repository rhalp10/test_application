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
	var $page_view; 				//String : set page for current user
	var $page_dashboard_sidenav;
	var $userID;   					//Integer : Stores the ID of the current user
	var $userFullname; 
	var $userName; 
	var $userRoles = array(); 		//Array : Stores the roles of the current user
	

    function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('users_model');
		$this->load->library('session');

		
		if($this->is_user_login())
		{
			$this->load->library('pagination');
			$this->load->library('table');
			$this->load->helper('menu_helper');
			$this->userID = $this->users_model->getuserID();
			$this->userName = $this->users_model->getuserName();
			$this->userFullname = $this->users_model->getuserFullname();
  			$this->userRoles = $this->users_model->getUserRoles();
  	

			/*
			| -------------------------------------------------------------------------
			| DASHBOARD SIDEBAR LINK BASE ON ROLES
			| -------------------------------------------------------------------------
			*/
			$this->sidenav["Dashboard"] = array(
	  							"controller"	=>"dashboard",
	  							"icon"			=>"home",
	  							"link"			=>"dashboard",);

  			if(array_search("admin", $this->userRoles)){

  				$this->sidenav["Account"] = array(
	  							"controller"	=>"account",
	  							"icon"			=>"user",
	  							"link"			=>"account",);
  			}

  			if(array_search("contributor", $this->userRoles)|| array_search("editor", $this->userRoles)){
  				$this->sidenav["Post"] = array(
	  							"controller"	=>"post",
	  							"icon"			=>"icon-blog",
	  							"link"			=>"post",);
  			}

  			if(array_search("manager", $this->userRoles)){
  				$this->sidenav["Project"] = array(
	  							"controller"	=>"project",
	  							"icon"			=>"icon-clipboard3",
	  							"link"			=>"project",);
  			}

  			
  			$this->page_dashboard_sidenav = side_navigation($this->sidenav,$this->uri->segment(1),base_url());
  			/*
			| -------------------------------------------------------------------
			*/
			$this->page_view = "dashboard";
			
		}
		else{
			$this->page_view = "authentication";
			
		}

	}
	public function is_user_login() {
	    return ($this->session->userdata('user')) ? true : false;
	     
	}

	public function pagination($function,$total_rows,$per_page){
		$config['base_url'] = base_url().'/'.$function."/page/";
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
	
		$config['first_link'] = false;
		$config['last_link'] = false;
        $config['full_tag_open'] = '<nav class="float-right" aria-label="Page navigation "><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item ">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
	public function create_table($function = '',$header = array(),$data = array(), $attributes = array()){
		$extra = "";

		if (is_string($attributes))
		{
			$extra = '';
		}
		else
		{
			foreach($attributes as $key => $row){
					$extra .= ' '.$key.'="'.$row.'" ';
			}
		}
		$template = array(
        'table_open'            => '
         <a type="button" class="btn btn-sm btn-primary add" href="'.base_url().$function.'/add">
                  Add 
        </a>
        <br><br>
        <table  class="table table-striped table-bordered table-sm" '.$extra.'>',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
		);
		$this->table->set_template($template);
        $this->table->set_heading($header);
      
       return $this->table->generate($data);

	}
	

}

?>