<?php
class projects_model extends MY_Model
{
    public function getProjects($conditions) {
        return $this->getAllRows('surveys', $conditions, 'id', 'DESC');
    }
    public function getProjectData($survey_id) {
        $data['projectinfo'] = $this->getSingleRow('surveys', array('id'=>$survey_id));
        $data['project_statuses'] = array('active', 'opened', 'started', 'completed', 'quotafull', 'screened_out', 'cancelled');
        return $data;
    }
    public function getProjectEdit($survey_id = false) {
        if($survey_id != false) {
            $data = $this->getSurveyById($survey_id);
        }
        return $data;
    }
    public function getSurveyById($survey_id) {
        $survey = $this->getSingleRow('surveys', array('ID'=>$survey_id));
        return $survey;
    }
	public function saveProject($data, $content_data = false) {
        $table = 'surveys';
        if($data['id'] == null or $data['id'] == '') {
            $this->db->insert($table, $data);
            $insert_id = $this->db->insert_id();
            $data['id'] = $insert_id;
        }
        else {
            $this->db->where('id', $data['id']);
            $this->db->update($table, $data);
        }
        return $data['id'];
    }
    public function deleteProject($survey_id) {
		$table = 'surveys';
        $where = array('ID'=>$survey_id);        
        $this->deleteFromDB($table, $where);
	}
 }