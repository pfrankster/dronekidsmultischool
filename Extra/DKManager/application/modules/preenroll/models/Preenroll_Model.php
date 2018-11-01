<?php // pe added fix?>
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Preenroll_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    
    public function get_preenroll_list(){
        
        $this->db->select('PE.*, SH.id AS school_id, SH.school_name AS school_name, CL.name AS class_name, SC.name AS section_name, PY.name AS payment_type, PS.name AS status');
        $this->db->from('pre_enrollments AS PE');
        $this->db->join('sections AS SC', 'SC.id = PE.section_id', 'left');
        $this->db->join('paymant_types AS PY', 'PY.id = PE.payment_type_id', 'left');
        $this->db->join('pe_status AS PS', 'PS.id = PE.status_id', 'left');
        $this->db->join('schools AS SH', 'SH.id = SC.school_id', 'left');
        $this->db->join('classes AS CL', 'CL.id = SC.class_id', 'left');
        
        // if($this->session->userdata('role_id') != SUPER_ADMIN){
        //     $this->db->where('SH.school_id', $this->session->userdata('school_id'));
        // }
       
        return $this->db->get()->result();
    }
    
    public function get_single_preenroll($id){
      
        $this->db->select('PE.*, SH.id AS school_id,SH.school_name AS school_name, CL.name AS class_name, SC.name AS section_name, PY.name AS payment_type, PS.name AS status');
        $this->db->from('pre_enrollments AS PE');
        $this->db->join('sections AS SC', 'SC.id = PE.section_id', 'left');
        $this->db->join('paymant_types AS PY', 'PY.id = PE.payment_type_id', 'left');
        $this->db->join('pe_status AS PS', 'PS.id = PE.status_id', 'left');
        $this->db->join('schools AS SH', 'SH.id = SC.school_id', 'left');
        $this->db->join('classes AS CL', 'CL.id = SC.class_id', 'left');
        $this->db->where('PE.id', $id);
        
        return $this->db->get()->row();
    }
    
    // function duplicate_check($email, $id = null) {

    //     if ($id) {
    //         $this->db->where_not_in('id', $id);
    //     }
    //     $this->db->where('email', $email);
    //     return $this->db->get('users')->num_rows();
    // }

    function get_payment_types() {
        $this->db->select('PY.*');
        $this->db->from('paymant_types AS PY');
        return $this->db->get()->result();
    }
    function get_status_types() {
        $this->db->select('PE.*');
        $this->db->from('pe_status AS PE');
        return $this->db->get()->result();
    }
}
