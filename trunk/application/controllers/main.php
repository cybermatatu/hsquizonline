<?php

class Main extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$this->master->content = $this->load->view('home_view', $this->master, TRUE);
		$this->load->view('layout', $this->master);
	}
    
    function help()
    {
        $this->master->content = $this->load->view('help_view', $this->master, TRUE);
		$this->load->view('layout', $this->master);
    }
}
