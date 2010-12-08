<?php

class Users extends MY_Controller {

	function __construct()
	{
        parent::__construct();	 
        $this->load->model('Users_Model');       	
	}
	
	function index()
	{
	    if (isset($_POST['user_type']))
            $this->master->listUser = $this->Users_Model->getListUser($_POST['user_type']);
        else
            $this->master->listUser = $this->Users_Model->getListUser();
            
        $this->master->listUserType = $this->db->get('users_type')->result();
        	   
        $this->master->content = $this->load->view('user_view', $this->master, TRUE);
		$this->load->view('layout', $this->master);
	}
	 
    function login()
    {
        echo "The login page";
    }
 
    function profile()
    {
        echo "The restricted profile page<br />";
        echo "Your user id: " . $_SESSION['user_id'];
    }
 
    function logout()
    {
        session_destroy();
        redirect(site_url());
    }
    
    function register()
    {
        if (isset($_POST))
        {
            $this->Users_Model->add_user($_POST);
            redirect(site_url()."/users");
        }
        else
            redirect(site_url()."/users");
    }
}
