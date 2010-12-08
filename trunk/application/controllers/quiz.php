<?php

class Quiz extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
        $this->load->model('Quiz_Model');
	}
    	
    function index()
    {
        $start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;   
        
        if (isset($_SESSION['user_type']))
        {
            // nếu là student
            if ($_SESSION['user_id'] == 3)
                redirect();
                
            // nếu là teacher
            if ($_SESSION['user_id'] == 2)
                $this->master->list = $this->Quiz_Model->get_quiz_list_by_user_id($_SESSION['user_id'], $start);
                
            // nếu là Administrator
            if ($_SESSION['user_id'] == 1)
                $this->master->list = $this->Quiz_Model->get_quiz_list_by_user_id(null, $start);
                
            // config phân trang    
            $this->load->library('pagination');
            $config['base_url'] = site_url().'/quiz/index/';
            $config['total_rows'] = @$this->master->list['total'];
            $this->pagination->initialize($config); 
            $this->master->page = $this->pagination->create_links();  
            
            $this->master->content = $this->load->view('quiz_view', $this->master, TRUE);
        }
        else
        {
            $this->master->content = $this->load->view('user_login_view', $this->master, TRUE);
        }    
        
          
		$this->load->view('layout', $this->master);
    }
    
	function create_quiz()
	{ 
        if (!isset($_SESSION['user_id'])) 
        {
            $this->master->content = $this->load->view('user_login_view', $this->master, TRUE);
        } 
        else 
        {   
            if (@$_POST['create_quiz'])
            {        
                $this->Quiz_Model->add_quiz($_POST); 
                redirect(site_url().'/quiz');
            }
            else
            {
                if ($_SESSION['user_type'] == 1)
                    $this->master->category_list = $this->Quiz_Model->get_list_category();
                else
                    $this->master->category_list = $this->Quiz_Model->get_list_category($_SESSION['user_type']);
                
                $this->master->content = $this->load->view('quiz_create_view', $this->master, TRUE); 
            }  
        }	  

		$this->load->view('layout', $this->master);
	}
    

    function view()
    {   
        $quiz_id = $this->uri->segment(3);
        $this->master->quiz = $this->Quiz_Model->get_quiz($quiz_id); 
        
        $check_st = TRUE;
        
        /*------------------------------------------------------------------------------------------
        // CHECK CÁC SETTING CỦA BÀI QUIZ
        ------------------------------------------------------------------------------------------*/
        // ST_STATUS
        if ($this->master->quiz['setting']->st_status == 0) {
            $check_st = FALSE;
            $this->master->st_error = 'Bài Quiz này đang tạm khóa, vui lòng liên hệ người tạo Quiz.';
        }else {
            // ST_PASSWORD
            if ($this->master->quiz['setting']->st_password != '') {
                $check_st = FALSE;
                
                // CHECK ST_PASSWORD CỦA BÀI QUIZ
                if (isset($_POST['check_st_pass']))
                {
                    if ($_POST['quiz_pass'] == $this->master->quiz['setting']->st_password) 
                        $check_st = TRUE;
                    else
                        $this->master->st_error_msg = 'Sai mật khẩu';
                        //$_SESSION['st_error_msg'] = 'Sai mật khẩu';
                }
                
                $this->master->st_error = $this->load->view('quiz_answer_require_password', $this->master, TRUE);
            }
        }
            
        
        
        
        /*------------------------------------------------------------------------------------------
        // USER NHẤP VÀO NÚT BẮT ĐÂU -> SHOW NỘI DUNG CÂU HỎI
        ------------------------------------------------------------------------------------------*/
        if ( isset($_POST['quiz_start']) ) 
        {
            if (!isset($_SESSION['user_id'])) {
                $this->master->content = $this->load->view('user_login_view', $this->master, TRUE);
                echo $this->load->view('layout', $this->master, TRUE);
                exit();
            }
            if (isset($_SESSION['quiz_start'])) {
                unset($_SESSION['quiz_start']);
                redirect(site_url().'/quiz/view/'.$quiz_id);
            } else { 
                $_SESSION['quiz_start'] =  1;
                $_SESSION['time_start'] = time();
                $_SESSION['report_id'] = $this->Quiz_Model->set_report($this->master->quiz);
                
                $this->master->quiz_answer = $this->load->view('quiz_answer_show', $this->master, TRUE);    
            }      
        }
        
        /*------------------------------------------------------------------------------------------
        // USER KẾT THÚC BÀI QUIZ -> SHOW KẾT QUẢ
        ------------------------------------------------------------------------------------------*/    
        elseif (isset($_POST['done']))
        {
            if (isset($_SESSION['quiz_start']))
            {
                unset($_SESSION['quiz_start']);
                $this->master->score = $this->Quiz_Model->check_answer($_POST);
                $this->master->quiz_answer = $this->load->view('quiz_score_view', $this->master, TRUE);    
            }
            else
                redirect(site_url().'/quiz/view/'.$quiz_id);
        }
        
        /*------------------------------------------------------------------------------------------
        // SHOW THÔNG TIN BÀI QUIZ TRƯỚC KHI BẮT ĐẦU
        ------------------------------------------------------------------------------------------*/
        else 
        {
            if (!$check_st)
                $this->master->quiz_answer = $this->load->view('quiz_answer_require', $this->master, TRUE);
            else
                $this->master->quiz_answer = $this->load->view('quiz_answer_hide', $this->master, TRUE);
        }
        
        $this->master->content = $this->load->view('quiz_show_view', $this->master, TRUE);
        $this->load->view('layout', $this->master);
    }
    
    function delete()
    {

        $quiz_id = $this->uri->segment(3);
        $this->Quiz_Model->remove_quiz($quiz_id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    function report()
    {
        $quiz_id = $this->uri->segment(3);
        $this->master->report = $this->Quiz_Model->get_report($quiz_id);
        
        $this->master->content = $this->load->view('quiz_report_view', $this->master, TRUE);
        $this->load->view('layout', $this->master);
    }
    
    function browse()
    {
        $this->master->business = $this->Quiz_Model->get_quiz_list_by_category_id(1);
        $this->master->education = $this->Quiz_Model->get_quiz_list_by_category_id(3);
        $this->master->funny = $this->Quiz_Model->get_quiz_list_by_category_id(4);
        
        $this->master->content = $this->load->view('quiz_browse_view', $this->master, TRUE);
        $this->load->view('layout', $this->master);
    }
    
    
}
