<?php

class Users extends MY_Controller {

	public function __construct()
	{
        parent::__construct();	 
        $this->load->model('Users_Model');       	
	}
	
	public function index()
	{
        if ($_SESSION['user_type'] == 3)
            redirect();
            
	    if (isset($_POST['user_type']))
            $this->master->listUser = $this->Users_Model->getListUser($_POST['user_type']);
        elseif ($_SESSION['user_type'] == 2)
            $this->master->listUser = $this->Users_Model->getListUser(3);
        else
            $this->master->listUser = $this->Users_Model->getListUser();
            
        $this->master->listUserType = $this->db->get('users_type')->result();
        	   
        $this->master->content = $this->load->view('user_view', $this->master, TRUE);
		$this->load->view('layout', $this->master);
	}
	 
    public function login()
    {
        echo "The login page";
    }
 
    public function profile()
    {
        echo "The restricted profile page<br />";
        echo "Your user id: " . $_SESSION['user_id'];
    }
 
    public function logout()
    {
        session_destroy();
        redirect(site_url());
    }
    
    public function register()
    {
        if (isset($_POST))
        {
            $this->Users_Model->add_user($_POST);
            redirect(site_url()."/users");
        }
        else
            redirect(site_url()."/users");
    }
    
    public function delete()
    {
        if ($_SESSION['user_type'] == 3)
            redirect(site_url());
        else
        {
            $userid = $this->uri->segment(3);
            
            $this->Users_Model->deleteUser($userid);
            redirect(site_url()."/users");
        }    
    }
}
