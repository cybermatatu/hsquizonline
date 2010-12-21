<?php

class Main extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Quiz_Model');
        $this->load->model('Report_Model');
	}
	
	function index()
	{
        if (isset($_SESSION['user_id']))
        {
            if ($_SESSION['user_type'] == 1)
            {               
                $this->master->quiz =  $this->Quiz_Model->get_quiz_list_by_user_id(null, 0, 5);
                $this->master->report =  $this->Report_Model->get_all_report(0, 3); 
            }	
            elseif ($_SESSION['user_type'] == 2)
            {                
                $this->master->quiz =  $this->Quiz_Model->get_quiz_list_by_user_id($_SESSION['user_id'], 0, 5);
                $this->master->report =  $this->Report_Model->get_report_by_teacher($_SESSION['user_id'], 0, 3);
            }   
            else
            {
                $this->master->quiz =  $this->Quiz_Model->get_quiz_list_by_user_id(null, 0, 5);
                $this->master->report =  $this->Report_Model->get_report_by_student($_SESSION['user_id'], 0, 3);
            }
        }
        
		$this->master->content = $this->load->view('home_view', $this->master, TRUE);
		$this->load->view('layout', $this->master);
	}
    
    function help()
    {
        $this->master->content = $this->load->view('help_view', $this->master, TRUE);
		$this->load->view('layout', $this->master);
    }
}
