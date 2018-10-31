<?php // pe added fix?>
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Preenroll_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    
    public function get_preenroll_list(){
        
        
        // if(!$class_id){
        //    $class_id = $this->session->userdata('class_id');
        // }
        $conn = $this->load->database('preenroll', TRUE);
        $conn->select('PE.*, PY.name AS paymentType, PS.name AS status');
        $conn->from('pre_enrollments AS PE');
        $conn->join('paymant_types AS PY', 'PY.id = PE.paymentTypeId', 'left');
        $conn->join('pe_status AS PS', 'PS.id = PE.statusId', 'left');
        
        // $conn->join('dronekid_gms.sections AS S', 'S.id = PE.sectionId');
        //$conn->where('E.academic_year_id', $this->academic_year_id); 
        
        // if($class_id){
        //       $this->db->where('E.class_id', $class_id);
        // }
        // if($school_id){
        //       $this->db->where('S.school_id', $school_id);
        // }
         
        // if($this->session->userdata('role_id') == GUARDIAN){
        //    $this->db->where('S.guardian_id', $this->session->userdata('profile_id'));
        // }
        
        // if($this->session->userdata('role_id') != SUPER_ADMIN){
        //     $this->db->where('S.school_id', $this->session->userdata('school_id'));
        // }
       
        return $conn->get()->result();
    }
    
    // public function get_single_preenroll($id){
        
    //     $this->db->select('S.*, G.name as guardian, E.roll_no, E.class_id, E.section_id, U.email, U.role_id, R.name AS role,  C.name AS class_name, SE.name AS section');
    //     $this->db->from('enrollments AS E');
    //     $this->db->join('students AS S', 'S.id = E.student_id', 'left');
    //     $this->db->join('users AS U', 'U.id = S.user_id', 'left');
    //     $this->db->join('roles AS R', 'R.id = U.role_id', 'left');
    //     $this->db->join('classes AS C', 'C.id = E.class_id', 'left');
    //     $this->db->join('sections AS SE', 'SE.id = E.section_id', 'left');
    //     $this->db->join('guardians AS G', 'G.id = S.guardian_id', 'left');
    //     $this->db->where('E.academic_year_id', $this->academic_year_id);
    //     $this->db->where('S.id', $id);
    //     return $this->db->get()->row();
        
    // }
    
    // function duplicate_check($email, $id = null) {

    //     if ($id) {
    //         $this->db->where_not_in('id', $id);
    //     }
    //     $this->db->where('email', $email);
    //     return $this->db->get('users')->num_rows();
    // }
}
