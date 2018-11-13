<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class School_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function get_schools(){
        $this->db->select('SH.*, ST.name AS state_name, CT.name AS city_name');
        $this->db->from('schools AS SH');
        $this->db->join('state AS ST', 'ST.id = SH.state_id', 'left');
        $this->db->join('city AS CT', 'CT.id = SH.city_id', 'left');
        return $this->db->get()->result();
    }
        
    function duplicate_check($school_name, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('school_name', $school_name);
        return $this->db->get('schools')->num_rows();            
    }
}
