<?php

class Report_Model extends MY_Model {
    
	function __construct()
	{
		parent::__construct();	
	}
	
    public function get_report_by_student($user_id = null, $start = 0, $limit = 10)
    {
        $query  = "SELECT SQL_CALC_FOUND_ROWS reports.*, quiz.quiz_title, users.username FROM (reports)";
        $query .= "JOIN users ON reports.user_id = users.user_id ";
        $query .= "JOIN quiz ON reports.quiz_id = quiz.quiz_id ";
        $query .= "WHERE reports.user_id = $user_id AND ";

        $rp1    = $query . "reports.rp_status = 1 ORDER BY reports.rp_id DESC LIMIT $start, $limit";
        $rp2    = $query . "reports.rp_status = 0 ORDER BY reports.rp_id DESC LIMIT $start, $limit";
        
        $result['done'] = $this->db->query($rp1)->result();
        $result['total'] = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;
        $result['process'] = $this->db->query($rp2)->result();
        $result['total'] += $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;
        
        return $result;
    }
    
    public function get_report_by_teacher($user_id, $start = 0, $limit = 10)
    {
        $query  = "SELECT SQL_CALC_FOUND_ROWS reports.*, quiz.quiz_title, users.username FROM (reports)";
        $query .= "JOIN users ON reports.user_id = users.user_id ";
        $query .= "JOIN quiz ON reports.quiz_id = quiz.quiz_id ";
        $query .= "WHERE quiz.user_id = $user_id AND ";

        $rp1    = $query . "reports.rp_status = 1 ORDER BY reports.rp_id DESC LIMIT $start, $limit";
        $rp2    = $query . "reports.rp_status = 0 ORDER BY reports.rp_id DESC LIMIT $start, $limit";
        
        $result['done'] = $this->db->query($rp1)->result();
        $result['total'] = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;
        $result['process'] = $this->db->query($rp2)->result();
        $result['total'] += $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;
        
        return $result;
    }
    
    public function get_all_report($start = 0, $limit = 10)
    {
        $query  = "SELECT SQL_CALC_FOUND_ROWS reports.*, quiz.quiz_title, users.username FROM (reports)";
        $query .= "JOIN users ON reports.user_id = users.user_id ";
        $query .= "JOIN quiz ON reports.quiz_id = quiz.quiz_id";
        $rp1    = $query . " WHERE reports.rp_status = 1 ORDER BY reports.rp_id DESC LIMIT $start, $limit";
        $rp2    = $query . " WHERE reports.rp_status = 0 ORDER BY reports.rp_id DESC LIMIT $start, $limit";
        
        $result['done'] = $this->db->query($rp1)->result();
        $result['total'] = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;
        $result['process'] = $this->db->query($rp2)->result();
        $result['total'] += $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;
        
        //echo $result['total'];
        return $result;
    }
}
