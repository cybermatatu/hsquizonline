<?php

class Quiz extends MY_Controller {

	public function __construct()
	{
		parent::__construct();	
        $this->load->model('Quiz_Model');
	}
    	
    public function index()
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
    
	public function create_quiz()
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
    

    public function view()
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
            } else { 
                // kiểm tra xem user này đã làm quiz này chưa
                $already = $this->Quiz_Model->check_already($_SESSION['user_id'], $quiz_id);
                
                if ($this->master->quiz['setting']->st_limit == 1 && $already)
                {
                    $this->master->quiz_answer = $this->load->view('quiz_already_view', $this->master, TRUE);
                }
                else
                {
                    if ($already)
                    {
                        // get result_id already
                        $this->master->result_id = $this->Quiz_Model->get_result($_SESSION['user_id'], $quiz_id); 
                         
                        // get report_id already
                        $_SESSION['report_id'] = $this->Quiz_Model->get_report_id($_SESSION['user_id'], $quiz_id);  
                    }
                    else
                    {
                        // ini all answer = 0
                        $this->master->result_id = $this->Quiz_Model->set_result($_SESSION['user_id'], $quiz_id);  
                        
                        // ini report
                        $_SESSION['report_id'] = $this->Quiz_Model->set_report($this->master->quiz);  
                    }
                    
                    $_SESSION['quiz_start'] =  1;
                    $_SESSION['time_start'] = time();

                    $this->master->quiz_answer = $this->load->view('quiz_answer_show', $this->master, TRUE);
                }
                
                    
            }      
        }
        
        /*------------------------------------------------------------------------------------------
        // USER KẾT THÚC BÀI QUIZ
        ------------------------------------------------------------------------------------------*/    
        elseif (isset($_POST['done']))
        {
            if (isset($_SESSION['quiz_start']))
            {
                unset($_SESSION['quiz_start']);
                
                //update tất cả câu trả lời lần cuối.
                $this->Quiz_Model->update_result($_POST, FALSE);
                
                //chấm điểm
                $this->master->score = $this->Quiz_Model->check_answer($_POST);
                
                //check setting auto score
                if ($this->master->quiz['setting']->st_score_show == 1)
                {
                    $this->master->quiz_answer = $this->load->view('quiz_score_view', $this->master, TRUE);
                }
                else
                {
                    $this->master->quiz_answer = $this->load->view('quiz_thank_view', $this->master, TRUE);
                }
                    
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
    
    public function delete()
    {

        $quiz_id = $this->uri->segment(3);
        $this->Quiz_Model->remove_quiz($quiz_id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function report()
    {
        $quiz_id = $this->uri->segment(3);
        $this->master->report = $this->Quiz_Model->get_report($quiz_id);
        
        $this->master->content = $this->load->view('quiz_report_view', $this->master, TRUE);
        $this->load->view('layout', $this->master);
    }
    
    public function browse()
    {
        $this->master->business = $this->Quiz_Model->get_quiz_list_by_category_id(1);
        $this->master->education = $this->Quiz_Model->get_quiz_list_by_category_id(3);
        $this->master->funny = $this->Quiz_Model->get_quiz_list_by_category_id(4);
        
        $this->master->content = $this->load->view('quiz_browse_view', $this->master, TRUE);
        $this->load->view('layout', $this->master);
    }
    
    public function edit()
    {
        $quiz_id = $this->uri->segment(3);
        
        $this->master->quiz = $this->Quiz_Model->get_quiz($quiz_id);
        
        
    }
    
    
}
