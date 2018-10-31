<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehicle_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_vehicle_list(){
        
        $this->db->select('V.*, S.school_name');
        $this->db->from('vehicles AS V');
        $this->db->join('schools AS S', 'S.id = V.school_id', 'left');
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $this->db->where('V.school_id', $this->session->userdata('school_id'));
        }
        return $this->db->get()->result();
        
    }
    
    function duplicate_check($school_id, $number, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('school_id', $school_id);
        $this->db->where('number', $number);
        return $this->db->get('vehicles')->num_rows();            
    }

}
