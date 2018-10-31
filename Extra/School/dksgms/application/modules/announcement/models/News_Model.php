<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_news_list(){
        
        $this->db->select('N.*, S.school_name');
        $this->db->from('news AS N');
        $this->db->join('schools AS S', 'S.id = N.school_id', 'left');
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $this->db->where('N.school_id', $this->session->userdata('school_id'));
        }
        return $this->db->get()->result();
        
    }
        
     function duplicate_check($school_id, $title, $date, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('school_id', $school_id);
        $this->db->where('title', $title);
        $this->db->where('date', date('Y-m-d', strtotime($date)));
        return $this->db->get('news')->num_rows();            
    }

}
