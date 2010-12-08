<?php

class Category_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct();	
	}
	
	public function add_category($data)
    {
        $category = array( 'title' => $data['title'],
                           'code' => $data['code'],
                           'info' => $data['info'],
                           'created_on' => time(),
                           'user_id' => $_SESSION['user_id'] );

        $this->db->insert('category',$category);  
    }
    
    public function check_categoryCode($data) {
        $query = $this->db->get_where('category', array('code' => $data['category_code']));
        if ($query->num_rows() > 0)
            echo json_encode(false);
        else
            echo json_encode(true);
            
        exit;
    }

    
    public function get_list_category($user_id = null, $start = 0, $limit = 10) {
        
        $query  = "SELECT SQL_CALC_FOUND_ROWS * FROM (category)";
        if ($user_id)
            $query .= " WHERE user_id = {$user_id}";
        $query .= " ORDER BY category_id DESC LIMIT $start, $limit";
        
        $result = $this->db->query($query)->result();
        $result['total'] = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total; 
                   
        return $result;
    }
    
}
