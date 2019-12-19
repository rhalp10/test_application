<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller 
{
    public function __construct()  {
        parent::__construct();
        $this->load->model('projects_model');
    }   
    public function index($status = false) {
        $conditions = false;
        if($status != false)
            $conditions['Status'] = $status;
		$data['projects'] = $this->projects_model->getProjects($conditions);
        $this->load->view("header");
		$this->load->view("projects", $data); 
        $this->load->view("footer");
    }
    public function viewProjectData($survey_id) {
        $data = $this->projects_model->getProjectData($survey_id);
		$this->load->view("header");
        $this->load->view("project_header", $data);
        $this->load->view("project_data", $data);
        $this->load->view("footer");
    }
    public function editProject($survey_id = false, $order_row_id = false) {
        $data = $this->projects_model->getProjectEdit($survey_id); 
        if($survey_id == false){
            $data['LOI'] = '';
            $data['Points_completed'] = '';
            $data['filter_arr'] = '';
            $data['redirect_page'] = '';
        } 		
        $data['survey_id'] = $survey_id;
        if($survey_id != false and !isset($data['id']))
            $this->session->set_flashdata('error_msg', 'Project not found');
				
        $this->load->view("header");
        $this->load->view("project_header", $data);
		$this->load->view("project_edit", $data);
        $this->load->view("footer");
        
    }
    public function saveProject() {
        $all_fields = array('ID', 'order_no', 'prefix', 'Name', 'Status', 'Points_completed', 'Points_so', 'Points_qf', 'Code_completed', 'Code_so', 'Code_qf', 'is_public', 'auto_invite_new_users', 'Lottery_id', 'Lottery2_id', 'LOI', 'redirect_url', 'redirect_url_et', 'redirect_url_ru', 'redirect_url_lv', 'redirect_url_lt', 'our_pm', 'cust_pm', 'customer_ref', 'use_preset_codes', 'precodeadd', 'n', 'ir', 'tg', 'revenue', 'non_mobile', 'non_tablet', 'allow_invite_friend', 'quotas', 'customer', 'end_date', 'start_date', 'price_setup', 'cpi', 'partner', 'url_variable', 'add_user_data', 'import_user_data', 'method', 'wrong_page', 'rfq_no', 'intro_text', 'addr_invoice', 'comments', 'delivery_type', 'project_won_date', 'users_include', 'users_exclude','order_row_id', 'company_id', 'pm_id', 'redirect_page', 'non_opportunity');
        $save_data = array();
        foreach($all_fields as $field) {
            if($this->input->post($field) == null)
                $save_data[$field] = '';
            else
                $save_data[$field] = $this->input->post($field);
        }
        if($save_data['id'] == '') {
            $save_data['id'] = NULL;
        }
        // check that Name is not empty
        if($save_data['Name'] == '') {
            echo 'Must write a Name for the survey';
            return false;
        }     
        // if Codes are empty then set automatically
        $this->load->helper('string');
        if($save_data['Code_completed'] == '')
            $save_data['Code_completed'] = random_string('alnum', 16);
        if($save_data['Code_so'] == '')
            $save_data['Code_so'] = random_string('alnum', 16);
        if($save_data['Code_qf'] == '')
            $save_data['Code_qf'] = random_string('alnum', 16);
        // check that Codes are unique
        if($save_data['Code_completed'] == $save_data['Code_so'] or $save_data['Code_completed'] == $save_data['Code_qf'] or $save_data['Code_qf'] == $save_data['Code_so'])
        {
            echo 'Codes for completed, quota-full and screened-out must be unique';
            return false;
        }
        $save_id = $this->projects_model->saveProject($save_data, $content_data);
        if($save_id == false) 
        {
            echo 'Could not save the project';
            return false;            
        }
        $this->session->set_flashdata('msg', 'Saved successfully');
        redirect(base_url() . 'Projects/editProject/' . $save_id);
        
    }
    public function deleteProject($survey_id, $is_confirmed = false) {
        // only available for manager
        if(!$this->hasRole('manager')){
            echo 'No access to this function';
            return false;
        }
		if(!$is_confirmed) {
			echo '<h3>Are you sure that you want to delete project with ID: ' . $survey_id . ' in ' . $this->portal_country;
			echo '<br><br><a href="' . base_url() . 'Projects/deleteProject/' . $survey_id . '/1">Yes DELETE</a> ';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="' . base_url() . 'project/' . $survey_id . '">No</a>';
		}
		else {
			$this->projects_model->deleteProject($survey_id);
			$this->session->set_flashdata('msg', 'Deleted project: ' . $survey_id);
            redirect(base_url() . 'Projects/dashboard');
		}
	}
}
