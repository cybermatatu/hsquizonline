<?php

class Quiz_Model extends MY_Model {
    
	public function __construct()
	{
		parent::__construct();	
	}
	
    
/*------------------------------------------------------------------------------------------
// ADD NEW QUIZ INTO DATABASE
------------------------------------------------------------------------------------------*/
    public function add_quiz($data)
    {
                
        $data['quiz_title'] = $this->db->escape_str($data['quiz_title']);
        $data['quiz_info']  = $this->db->escape_str($data['quiz_info']);
        $data['quiz_tag']   = $this->db->escape_str($data['quiz_tag']);
        $user_id            = $_SESSION['user_id'];
        
        $quiz = array( 'category_id' => $data['category_id'],
                       'quiz_title' => $data['quiz_title'],
                       'quiz_info' => $data['quiz_info'],
                       'quiz_tag' => $data['quiz_tag'],
                       'user_id' => $user_id,
                       'created_on' => date('Y-m-d H:i:s'),
                       'question_total' => $data['total'] );  
        
        // INSERT QUIZ VÀ LUU LAI QUIZ ID VUA INSERT              
        $this->db->insert('quiz', $quiz);    
        $quiz_id = $this->db->insert_id();   
        
        $quiz_st = array('quiz_id' => $quiz_id,
                        'st_status' => @$data['st_status'],
                        'st_password' => @$data['st_pass'],  
                        'st_comment' => @$data['st_cm'],  
                        'st_time' => @$data['st_time'],  
                        'st_email' => @$data['st_email'],  
                        'st_question' => @$data['st_question'],  
                        'st_answer' => @$data['st_answer'],  
                        'st_require' => @$data['st_require'],  
                        'st_show_answer' => @$data['st_show_answer'],
                        'st_show_score' => @$data['st_show_score'],
                        'st_msg' => @$data['st_msg']);    
        
        // INSERT QUIZ SETTING
        $this->db->insert('quiz_setting', $quiz_st);
        
        foreach ($data['question_title'] as $q_num => $q) {  
            
            $question = array( 'quiz_id' => $quiz_id,
                               'q_text' => $q,
                               'q_order' => $q_num,
                               'q_type' => $data['question_type'][$q_num] );
            
            // INSERT QUESTION VÀ LUU LAI QUESTION ID VUA INSERT                   
            $this->db->insert('question', $question);       
            $question_id = $this->db->insert_id();  
            $order = $data['question_order'][$q_num];

            foreach ($data['answer_'.$order.'_title'] as $a_num => $a) {
                
                $answer = array( 'question_id' => $question_id,
                                 'a_text' => $a,
                                 'a_order' => $a_num );
                                 
                if (in_array($a_num+1, $data['answer_'.$order.'_check']))
                    $answer = array_merge($answer, array('a_correct' => 1));  
                
                // INSERT ANSWER   
                $this->db->insert('answer', $answer);               
            } 
        } 
    }


/*------------------------------------------------------------------------------------------
// GET QUIZ BY QUIZ_ID
------------------------------------------------------------------------------------------*/
    function get_quiz($quiz_id = 0)
    {
        $quiz['info'] = $this->db->select('*,users.username')->where('quiz_id', $quiz_id);
        $quiz['info'] = $this->db->join('users', 'users.user_id = quiz.user_id')->get('quiz')->row();
        
        if (!$quiz['info']) redirect();
        
        $quiz['setting'] = $this->db->get_where('quiz_setting', array('quiz_id' => $quiz_id))->row();
        $question = $this->db->select('question_id, q_text, q_order, q_type')->where('quiz_id', $quiz_id)->get('question')->result();
       
        foreach ($question as $q_key => $q) {
            $quiz['question'][$q_key] = $q;
            $answer = $this->db->select('a_text, a_order')->where('question_id', $q->question_id)->get('answer')->result();
            foreach ($answer as $a_key => $a ) {
                $quiz['answer'][$q_key][$a_key] = $a;
            }
        }
        return $quiz;
    }


/*------------------------------------------------------------------------------------------
// GET QUIZ LIST BY USRE_ID
------------------------------------------------------------------------------------------*/
    function get_quiz_list_by_user_id($user_id = null, $start = 0, $limit = 10)
    {
        $query  = "SELECT SQL_CALC_FOUND_ROWS quiz.*, category.title, users.username FROM (quiz)";
        $query .= "JOIN users ON quiz.user_id = users.user_id ";
        $query .= "JOIN category ON quiz.category_id = category.category_id";
        if ($user_id)
            $query .= " WHERE quiz.user_id = {$user_id}";
        $query .= " ORDER BY quiz_id DESC LIMIT $start, $limit";
        
        $result = $this->db->query($query)->result();
        $result['total'] = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total; 
                   
        return $result;
    }
    
    
/*------------------------------------------------------------------------------------------
// GET QUIZ LIST BY CATEGORY_ID
------------------------------------------------------------------------------------------*/
    function get_quiz_list_by_category_id($category_id, $start = 0, $limit = 4)
    {
        $query = $this->db->select('*, users.user_id, users.username, quiz_setting.st_password');
        $query = $this->db->where('category_id', $category_id);
        $query = $this->db->order_by('quiz.quiz_id', 'DESC')->limit($limit, $start);
        $query = $this->db->join('users', 'users.user_id = quiz.user_id');
        $query = $this->db->join('quiz_setting', 'quiz.quiz_id = quiz_setting.quiz_id')->get('quiz');
        
        foreach ($query->result() as $r) {
            $r->quiz_title_sub = $this->_substr($r->quiz_title, 20);
        }
        
        return $query->result();
    }


/*------------------------------------------------------------------------------------------
// REMOVE QUIZ BY QUIZ_ID
------------------------------------------------------------------------------------------*/    
    function remove_quiz($quiz_id)
    {
        $this->db->delete('quiz', array('quiz_id' => $quiz_id));
    }


/*------------------------------------------------------------------------------------------
// CHECK CORRECT ANSWER
------------------------------------------------------------------------------------------*/  
    function check_answer($data)
    {
        $time = time() - $_SESSION['time_start'];
        $quiz['setting'] = $this->db->get_where('quiz_setting', array('quiz_id' => $data['id']))->row();
        
        if ($quiz['setting']->st_time > 0)
            if ($time - ($quiz['setting']->st_time*60) > 1)
            {
                $score['error'] = "Bắt quả tang rồi nhé, dám gian lận thời gian nhé, méc thấy giờ!!!";
                return $score;
            }
            
        $score['correct'] = 0;
        $question = $this->db->select('question_id')->where('quiz_id', $data['id'])->get('question')->result();
       
        foreach ($question as $q_key => $q) {
            $kt = true;            
            if (@$data['answer_check_'.($q_key+1)])
            {
                $answer = $this->db->select('a_order, a_correct')->where('question_id', $q->question_id)->get('answer')->result();
                foreach ($answer as $a_key => $a ) {
                    
                    if ($a->a_correct == 1)
                    {
                        if (!in_array($a_key, $data['answer_check_'.($q_key+1)]))
                        {
                            $kt = false;
                            break;
                        }
                    }
                    else
                    {
                        if (in_array($a_key, $data['answer_check_'.($q_key+1)]))
                        {
                            $kt = false;
                            break;
                        }                      
                    }
                    
                    //echo in_array($a_key, $data['answer_check_'.($q_key+1)]).'-'.$a->a_correct.' '.$kt.'<br/>';
                }
                if ($kt)
                    $score['correct']++;             
            }
        }
        // update report                
        $this->update_report($_SESSION['report_id'], $time, $score['correct'], ($q_key+1-$score['correct']), round(($score['correct']/($q_key+1))*100));
        unset($_SESSION['report_id']);
        
        $score['correct'] = '<span style="color: #C00">' . $score['correct'] . '</span> / ' . ($q_key+1);
        
    return $score;
    }
    
    
/*------------------------------------------------------------------------------------------
// KHỞI TẠO KẾT QUẢ REPORT KHI NGƯỜI DÙNG BẮT ĐẦU LÀM QUIZ, ĐỂ TRÁNH TÌNH TRẠNG THOÁT NỮA CHỪNG
------------------------------------------------------------------------------------------*/
    function set_report($quiz)
    {
        $data = array('quiz_id'     => $quiz['info']->quiz_id,
                      'user_id'     => $_SESSION['user_id'],
                      'date'        => date('Y-m-d H:i:s'),
                      'time'        => 0,
                      'total_time'  => $quiz['setting']->st_time,
                      'correct'     => 0,
                      'wrong'       => $quiz['info']->question_total,
                      'score'       => 0);
                      
        $this->db->insert('reports', $data);
        
    return $this->db->insert_id();
    }
    
    
/*------------------------------------------------------------------------------------------
// CẬP NHẬT KẾT QUẢ BÀI QUIZ
------------------------------------------------------------------------------------------*/
    function update_report($rp_id, $time, $correct, $wrong, $score)
    {
        $data = array('time'    => $time,
                      'correct' => $correct,
                      'wrong'   => $wrong,
                      'score'   => $score);
                      
        $this->db->update('reports', $data, array('rp_id' => $rp_id));
    }
	
/*------------------------------------------------------------------------------------------
// CẬP NHẬT KẾT QUẢ BÀI QUIZ
------------------------------------------------------------------------------------------*/

    function get_report($quiz_id, $start = 0, $limit = 10)
    {
                 $this->db->select()->where('quiz_id', $quiz_id);
                 $this->db->join('users', 'reports.user_id = users.user_id');
        $query = $this->db->order_by('reports.rp_id', 'DESC')->limit($limit, $start)->get('reports')->result();
        
        foreach ($query as $k => $q) {
            $diem[$k] = (int)round($q->score/10);
        }
        $query['diem'] = $diem;
        
        return $query;
    }
    
/*------------------------------------------------------------------------------------------
// LẤY DANH SÁCH MÔN HỌC
------------------------------------------------------------------------------------------*/

    function get_list_category($user_id = null)
    {
        $query  = "SELECT category_id, code, title FROM (category)";
        if ($user_id)
            $query .= " WHERE user_id = {$user_id}";
        
        $result = $this->db->query($query)->result();
                   
        return $result;
    }

}

