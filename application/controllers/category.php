<?php

class Category extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Category_Model');
	}
	
    function index()
    {
        $start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        
        // nếu là student
        if ($_SESSION['user_id'] == 3)
            redirect();
            
        // nếu là teacher
        if ($_SESSION['user_id'] == 2)
            $this->master->list = $this->Category_Model->get_list_category($_SESSION['user_id'], $start);
            
        // nếu là Administrator
        if ($_SESSION['user_id'] == 1)
            $this->master->list = $this->Category_Model->get_list_category(null, $start);
            
        // config phân trang    
            $this->load->library('pagination');
            $config['base_url'] = site_url().'/category/index/';
            $config['total_rows'] = @$this->master->list['total'];
            $this->pagination->initialize($config); 
            $this->master->page = $this->pagination->create_links();

        $this->master->content = $this->load->view('category_view', $this->master, TRUE);
		$this->load->view('layout', $this->master);
    }
    
	function create_category()
	{
	    // nếu là student
        if ($_SESSION['user_id'] == 3)
            redirect();
        // nếu là teacher và administrator
        else
        {
            if ($_POST){
                $this->master->list = $this->Category_Model->add_category($_POST);
                redirect(site_url().'/category');
            }
            else
                $this->master->content = $this->load->view('category_create_view', $this->master, TRUE);
	    }
	    
		$this->load->view('layout', $this->master);
	}
    
    function view()
    {            
        $category_id = $this->uri->segment(3);
        $this->master->category = $this->Category_Model->get_category($category_id);
        $this->master->quiz_list = $this->Category_Model->get_quiz_list($category_id);
        
        $this->master->content = $this->load->view('category_show_view', $this->master, TRUE);
        $this->load->view('layout', $this->master);
    }
}
