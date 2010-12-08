<?php

class Users_Model extends MY_Model {
    
	function __construct()
	{
		parent::__construct();	
	}
	
    public function login($data)
    {
        $query = $this->db->get_where('users', array('username' => $data['username']));
        
        if ($query->num_rows() > 0 ) {
            $result = $query->row();
            if ($result->password == md5($data['password'])) {
                
                $_SESSION['user_id'] = $result->user_id;
                $_SESSION['user_name'] = $result->username;
                $_SESSION['user_type'] = $result->user_type;
                
                echo json_encode(array('response' => 'success', 'username' => $result->username));
                exit;
            } else {
                echo json_encode(array('response' => 'error', 'message' => 'Password chưa chính xác.'));
            }
        } else {
            echo json_encode(array('response' => 'error', 'message' => 'Username không tồn tại.'));    
        }
        
        exit;
    }
    
    function add_user($data)
    {
        $user = array('username' => $this->db->escape_str($data['user_name']),
                      'password' => md5($data['user_password']),
                      'email' => $data['user_email'],
                      'user_type' => $data['user_type'],
                      'created_on' => date('Y-m-d H:i:s'));
                      
        $this->db->insert('users', $user);
    }
	
    function check_username($data)
    {
        $query = $this->db->get_where('users', array('username' => $data['username']));
        
        if ($query->num_rows() > 0)
        {
            echo json_encode(false);
            exit;
        }  
        else
        {
            echo json_encode(true);
            exit;
        } 
    }
    
    function getListUser($user_type = null)
    {
        $query = $this->db->select()->from('users');
        
        if ($user_type && $user_type != 0)
            $query = $this->db->where('users.user_type', $user_type);
        $query = $this->db->join('users_type', 'users_type.user_type = users.user_type');
        $query = $this->db->order_by('user_id', 'ESC')->get();
        
        foreach ($query->result() as $r) {
            if ($r->user_type == 1)
                $r->user_title = '<span class="red">'.$r->user_title.'</span>';
            elseif ($r->user_type == 2)
                $r->user_title = '<span class="green">'.$r->user_title.'</span>';
            else
                $r->user_title = $r->user_title;
        }
        
        return $query->result();
    }
}
