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
        //echo "<script>alert(1);</script>";
                
        $data['quiz_title'] = $this->db->escape_str($data['quiz_title']);
        $data['quiz_info']  = $this->db->escape_str($data['quiz_info']);
    
        $user_id            = $_SESSION['user_id'];
        
        $quiz = array( 'category_id' => $data['category_id'],
                       'quiz_title' => $data['quiz_title'],
                       'quiz_info' => $data['quiz_info'],
                       'user_id' => $user_id,
                       'created_on' => date('Y-m-d H:i:s'),
                       'question_total' => $data['total'] );  
        
        // INSERT QUIZ VÀ LUU LAI QUIZ ID VUA INSERT              
        $this->db->insert('quiz', $quiz);    
        $quiz_id = $this->db->insert_id();   
        
        $quiz_st = array('quiz_id'          => $quiz_id,
                        'st_status'         => $data['st_status'],
                        'st_password'       => $data['st_pass'],  
                        'st_time'           => $data['st_time'],
                        'st_limit'          => $data['st_limit'],
                        'st_question_sort'  => $data['st_question_sort'],
                        'st_question_show'  => $data['st_question_show'],
                        'st_score_show'     => $data['st_score_show']);
                        
        // nếu có ngày giời bắt đầu, kết thúc thì mới insert vào                   
        if ($data['st_status'] == '2')
        {
            $date = array('st_date_start' => date('Y-m-d H:i:s',strtotime(@$data['st_day_start'] . @$data['st_time_start'])),
                          'st_date_end' => date('Y-m-d H:i:s',strtotime(@$data['st_day_end'] . @$data['st_time_end'])),);
            
            $quiz_st = array_merge($quiz_st, $date);
        }
        
        //var_dump($quiz_st);  exit();
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
                                 
                if ($data['question_type'][$q_num] != 4)
                    if (in_array($a_num+1, $data['answer_'.$order.'_check']))
                        @$answer = array_merge($answer, array('a_correct' => 1));  
                
                // INSERT ANSWER   
                $this->db->insert('answer', $answer);               
            } 
        } 
    }


/*------------------------------------------------------------------------------------------
// GET QUIZ BY QUIZ_ID
------------------------------------------------------------------------------------------*/
    public function get_quiz($quiz_id = 0)
    {
        $quiz['info'] = $this->db->select('quiz.*,users.username')->where('quiz_id', $quiz_id);
        $quiz['info'] = $this->db->join('users', 'users.user_id = quiz.user_id')->get('quiz')->row();
        
        if (!$quiz['info']) redirect();
        
        $quiz['setting'] = $this->db->get_where('quiz_setting', array('quiz_id' => $quiz_id))->row();
        $question = $this->db->select('question_id, q_text, q_order, q_type')->where('quiz_id', $quiz_id)->get('question')->result();
       
        foreach ($question as $q_key => $q) {
            $quiz['question'][$q_key] = $q;
            $answer = $this->db->select('answer_id, a_text, a_order, a_correct')->where('question_id', $q->question_id)->get('answer')->result();
            foreach ($answer as $a_key => $a ) {
                $quiz['answer'][$q_key][$a_key] = $a;
            }
        }
        return $quiz;
    }


/*------------------------------------------------------------------------------------------
// GET QUIZ LIST BY USRE_ID
------------------------------------------------------------------------------------------*/
    public function get_quiz_list_by_user_id($user_id = null, $start = 0, $limit = 10)
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
    public function get_quiz_list_by_category_id($category_id, $start = 0, $limit = 4)
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
    public function remove_quiz($quiz_id)
    {
        $this->db->delete('quiz', array('quiz_id' => $quiz_id));
    }
    
    
/*------------------------------------------------------------------------------------------
// CHECK QUIZED ALREADY
------------------------------------------------------------------------------------------*/  
    public function check_already($user_id, $quiz_id)
    {
        $query = $this->db->get_where('reports', array('user_id' => $user_id, 'quiz_id' => $quiz_id));
        
        if ($query->num_rows() > 0)
            return true;
        else
            return false;
    }
/*------------------------------------------------------------------------------------------
// Ini USER RESULT
------------------------------------------------------------------------------------------*/    
    public function set_result($user_id, $quiz_id)
    {
        $question = $this->db->select('question_id, q_type')->where('quiz_id', $quiz_id)->get('question')->result();
        
        foreach ($question as $q) {
            $answer = $this->db->select('answer_id')->where('question_id', $q->question_id)->get('answer')->result();
            
            foreach ($answer as $a) {
                $result = array('user_id' => $user_id,
                                'quiz_id' => $quiz_id,
                                'question_id' => $q->question_id,
                                'answer_id' => $a->answer_id);
                                
                $this->db->insert('result', $result);
                $result_id[] = $this->db->insert_id();
            }
        }
        
        return $result_id;
    }
    
/*------------------------------------------------------------------------------------------
// get USER RESULT ALREADY
------------------------------------------------------------------------------------------*/    
    public function get_result($user_id, $quiz_id)
    {
        $query = $this->db->select('rs_id')->from('result')->where(array('user_id' => $user_id, 'quiz_id' => $quiz_id))->get()->result();
        
        foreach ($query as $q) {
            $result_id[] = $q->rs_id;    
        }
        
        return $result_id;
    }
    
/*------------------------------------------------------------------------------------------
// UPDATE RESULT BY RESULT_ID
------------------------------------------------------------------------------------------*/    
    public function update_result($data, $ajax = true)
    {
        for ($i=1; $i <= $data['q_total']; $i++) {
            
            foreach($data['result_'.$i] as $a_key => $a) {
                $this->db->update('result', array('rs_result' => @$data['answer_'.$i][$a_key]), array('rs_id' => $data['result_'.$i][$a_key]));
            }
        }
        
        if ($ajax) exit();

    }

/*------------------------------------------------------------------------------------------
// CHECK CORRECT ANSWER
------------------------------------------------------------------------------------------*/  
    public function check_answer($data)
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
        $question = $this->db->select('question_id, q_type')->where('quiz_id', $data['id'])->get('question')->result();
       
        foreach ($question as $q_key => $q) {
            $kt = true;            
            
            //Check Questiontype[4 = tự luận]
            if ($q->q_type != 4)
            {

                if (@$data['answer_'.($q_key+1)])
                {
                    $answer = $this->db->select('a_order, a_correct')->where('question_id', $q->question_id)->get('answer')->result();
                    foreach ($answer as $a_key => $a ) {
                        
                        if ($a->a_correct == 1)
                        {
                            if (!in_array($a_key, $data['answer_'.($q_key+1)]))
                            {
                                $kt = false;
                                break;
                            }
                        }
                        else
                        {
                            if (in_array($a_key, $data['answer_'.($q_key+1)]))
                            {
                                $kt = false;
                                break;
                            }                      
                        }
                        
                    }
                    if ($kt)
                        $score['correct']++;             
                }
            }
        }
        
        $q_total = $q_key + 1;       
        
        $score['score'] = round(10 / $q_total * $score['correct']);
        
        if ($quiz['setting']->st_score_show == 1)
        {
            //Update report
            $this->update_report($_SESSION['report_id'], $time, $score['correct'], ($q_total - $score['correct']), $score['score']);
        }
        else
        {
            //Update report
            $this->update_report($_SESSION['report_id'], $time, $score['correct'], ($q_total - $score['correct']), $score['score'], 0);
        }
                        
        
        $score['correct'] = '<span style="color: #C00">' . $score['correct'] . '</span> / ' . ($q_key+1);

    return $score;
    }
    
    
/*------------------------------------------------------------------------------------------
// KHỞI TẠO KẾT QUẢ REPORT KHI NGƯỜI DÙNG BẮT ĐẦU LÀM QUIZ, ĐỂ TRÁNH TÌNH TRẠNG THOÁT NỮA CHỪNG
------------------------------------------------------------------------------------------*/
    public function set_report($quiz)
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
    public function update_report($rp_id, $time, $correct, $wrong, $score, $status = 1)
    {
        $data = array('time'      => $time,
                      'correct'   => $correct,
                      'wrong'     => $wrong,
                      'score'     => $score,
                      'rp_status' => $status);
                      
        $this->db->update('reports', $data, array('rp_id' => $rp_id));
    }
	
/*------------------------------------------------------------------------------------------
// LÁY KẾT QUẢ BÀI QUIZ
------------------------------------------------------------------------------------------*/

    public function get_report($quiz_id, $start = 0, $limit = 10)
    {
                 $this->db->select()->where('quiz_id', $quiz_id);
                 $this->db->join('users', 'reports.user_id = users.user_id');
        $query = $this->db->order_by('reports.rp_id', 'DESC')->limit($limit, $start)->get('reports')->result();
        
        foreach ($query as $k => $q) {
            $diem[$k] = (int)$q->score;
        }
        $query['diem'] = @$diem;
        
        return $query;
    }
    
    public function get_report_id($user_id, $quiz_id)
    {
        $query = $this->db->select('rp_id')->from('reports')->where(array('user_id' => $user_id, 'quiz_id' => $quiz_id));
        $query = $this->db->order_by('rp_id', 'DESC')->limit(1)->get()->row();
        
        return $query->rp_id;
    }
    
/*------------------------------------------------------------------------------------------
// LẤY DANH SÁCH MÔN HỌC
------------------------------------------------------------------------------------------*/

    public function get_list_category($user_id = null)
    {
        $query  = "SELECT category_id, code, title FROM (category)";
        if ($user_id)
            $query .= " WHERE user_id = {$user_id}";
        
        $result = $this->db->query($query)->result();
                   
        return $result;
    }
    
/*------------------------------------------------------------------------------------------
// SEARCH
------------------------------------------------------------------------------------------*/

    public function search($data)
    {
        $query = $this->db->select('quiz.*, users.username')->from('quiz');
        if ($data['type'] == 'title')
            $query = $this->db->like('quiz_'.$data['type'], $data['text']);
        else
            $query = $this->db->where('quiz_'.$data['type'], $data['text']);
        $query = $this->db->join('users', 'quiz.user_id = users.user_id')->get();
        
        echo json_encode(array('data' => $query->result()));
        exit();
    }

}

