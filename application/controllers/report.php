<?php

class Report extends MY_Controller {

	public function __construct()
	{
        parent::__construct();	 
        $this->load->model('Report_Model');       	
	}
	
	public function index()
	{
        $user_type = $_SESSION['user_type'];
        $user_id   = $_SESSION['user_id'];
        
        $start     = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        
        switch ($user_type)
        {
            case 1: $this->master->report = $this->Report_Model->get_all_report($start); break;
            case 2: $this->master->report = $this->Report_Model->get_report_by_teacher($user_id, $start); break;
            case 3: $this->master->report = $this->Report_Model->get_report_by_student($user_id, $start); break;
        }
        
        // config phân trang    
            $this->load->library('pagination');
            $config['base_url'] = site_url().'/report/index/';
            $config['total_rows'] = @$this->master->report['total'];
            $this->pagination->initialize($config); 
            $this->master->page = $this->pagination->create_links();
        
        
        $this->master->content = $this->load->view('report_view', $this->master, TRUE);
		$this->load->view('layout', $this->master);
	}
  
}
