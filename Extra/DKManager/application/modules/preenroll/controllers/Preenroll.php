<?php
// pe added fix
defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Preenroll.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Preenroll
 * @description     : Manage preenroll information.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Preenroll extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();      
        
        $this->load->model('Preenroll_Model', 'preenroll', true);
        // check running session
        if(!$this->academic_year_id){
            error($this->lang->line('academic_year_setting'));
            redirect('setting');
        }         
    }

    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Preenroll List" user interface                 
    *                    with class wise listing    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function index() {

        check_permission(VIEW);
        
        $this->data['preenrolls'] = $this->preenroll->get_preenroll_list();
        //$this->data['roles'] = $this->preenroll->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        
        // $condition = array();
        // $condition['status'] = 1;        
        // if($this->session->userdata('role_id') != SUPER_ADMIN){            
        //     $condition['school_id'] = $this->session->userdata('school_id');
        //     $this->data['classes'] = $this->preenroll->get_list('classes', $condition, '','', '', 'id', 'ASC');
        //     $this->data['guardians'] = $this->preenroll->get_list('guardians', $condition, '','', '', 'id', 'ASC');
        // }
        // $this->data['class_list'] = $this->preenroll->get_list('classes', $condition, '','', '', 'id', 'ASC');
        
        // $this->data['schools'] = $this->schools;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_preenroll') . ' | ' . SMS);
        $this->layout->view('preenroll/index', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Preenroll" user interface                 
    *                    and process to store "Preenroll" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        // check_permission(ADD);

        // if ($_POST) {
        //     $this->_prepare_preenroll_validation();
        //     if ($this->form_validation->run() === TRUE) {
        //         $data = $this->_get_posted_preenroll_data();

        //         $insert_id = $this->preenroll->insert('students', $data);

        //         if ($insert_id) {
        //             $this->__insert_enrollment($insert_id);
        //             success($this->lang->line('insert_success'));
        //             redirect('preenroll/index/'.$this->input->post('class_id'));
        //         } else {
        //             error($this->lang->line('insert_failed'));
        //             redirect('preenroll/add/'.$this->input->post('class_id'));
        //         }
        //     } else {

        //         $this->data['post'] = $_POST;
        //     }
        // }
        
        // $class_id = $this->uri->segment(4);
        // if(!$class_id){
        //   $class_id = $this->input->post('class_id');
        // }

        // $this->data['class_id'] = $class_id;
        // $this->data['students'] = $this->preenroll->get_preenroll_list($class_id);
        // $this->data['roles'] = $this->preenroll->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        
         
        // $condition = array();
        // $condition['status'] = 1;        
        // if($this->session->userdata('role_id') != SUPER_ADMIN){            
        //     $condition['school_id'] = $this->session->userdata('school_id');
        //     $this->data['classes'] = $this->preenroll->get_list('classes', $condition, '','', '', 'id', 'ASC');
        //     $this->data['guardians'] = $this->preenroll->get_list('guardians', $condition, '','', '', 'id', 'ASC');
        // }
        // $this->data['class_list'] = $this->preenroll->get_list('classes', $condition, '','', '', 'id', 'ASC');
        
        // $this->data['schools'] = $this->schools;
        // $this->data['add'] = TRUE;
        // $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('preenroll') . ' | ' . SMS);
        // $this->layout->view('preenroll/index', $this->data);
    }

        
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Preenroll" user interface                 
    *                    with populate "Preenroll" value 
    *                    and process to update "Preenroll" into database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {

        // check_permission(EDIT);

        // if(!is_numeric($id)){
        //     error($this->lang->line('unexpected_error'));
        //     redirect('preenroll/index');     
        // }
        
        // if ($_POST) {
        //     $this->_prepare_preenroll_validation();
        //     if ($this->form_validation->run() === TRUE) {
        //         $data = $this->_get_posted_preenroll_data();
        //         $updated = $this->preenroll->update('students', $data, array('id' => $this->input->post('id')));

        //         if ($updated) {
        //             $this->__update_enrollment();
        //             success($this->lang->line('update_success'));
        //             redirect('preenroll/index/'.$this->input->post('class_id'));
        //         } else {
        //             error($this->lang->line('update_failed'));
        //             redirect('preenroll/edit/' . $this->input->post('id'));
        //         }
        //     } else {
        //         $this->data['preenroll'] = $this->preenroll->get_single_preenroll($this->input->post('id'));
        //     }
        // }

        // if ($id) {
        //     $this->data['preenroll'] = $this->preenroll->get_single_preenroll($id);

        //     if (!$this->data['preenroll']) {
        //         redirect('preenroll/index');
        //     }
        // }
        
        // $class_id = $this->data['preenroll']->class_id;
        // if(!$class_id){
        //   $class_id = $this->input->post('class_id');
        // } 

        // $this->data['class_id'] = $class_id;
        // $this->data['students'] = $this->preenroll->get_preenroll_list($class_id);
        // $this->data['roles'] = $this->preenroll->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        
          
        // $condition = array();
        // $condition['status'] = 1;        
        // if($this->session->userdata('role_id') != SUPER_ADMIN){            
        //     $condition['school_id'] = $this->session->userdata('school_id');
        //     $this->data['classes'] = $this->preenroll->get_list('classes', $condition, '','', '', 'id', 'ASC');
        //     $this->data['guardians'] = $this->preenroll->get_list('guardians', $condition, '','', '', 'id', 'ASC');
        // }
        // $this->data['class_list'] = $this->preenroll->get_list('classes', $condition, '','', '', 'id', 'ASC');
        // $this->data['school_id'] = $this->data['preenroll']->school_id;
        
        // $this->data['schools'] = $this->schools;
        // $this->data['edit'] = TRUE;
        // $this->layout->title($this->lang->line('edit') . ' ' . $this->lang->line('preenroll') . ' | ' . SMS);
        // $this->layout->view('preenroll/index', $this->data);
    }

        
    
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific Preenroll data                 
    *                       
    * @param           : $preenroll_id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($preenroll_id = null) {

        // check_permission(VIEW);

        // if(!is_numeric($preenroll_id)){
        //      error($this->lang->line('unexpected_error'));
        //       redirect('preenroll/index');
        // }
        
        // $this->data['preenroll'] = $this->preenroll->get_single_preenroll($preenroll_id);        
        // $class_id = $this->data['preenroll']->class_id;
        
        // $this->data['students'] = $this->preenroll->get_preenroll_list($class_id);
        // $this->data['roles'] = $this->preenroll->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        
        // $condition = array();
        // $condition['status'] = 1;        
        // if($this->session->userdata('role_id') != SUPER_ADMIN){            
        //     $condition['school_id'] = $this->session->userdata('school_id');
        //     $this->data['classes'] = $this->preenroll->get_list('classes', $condition, '','', '', 'id', 'ASC');
        //     $this->data['guardians'] = $this->preenroll->get_list('guardians', $condition, '','', '', 'id', 'ASC');
        // }
        // $this->data['class_list'] = $this->preenroll->get_list('classes', $condition, '','', '', 'id', 'ASC');
        
        // $this->data['class_id'] = $class_id;  
        
        // $this->data['schools'] = $this->schools;
        // $this->data['detail'] = TRUE;
        // $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('preenroll') . ' | ' . SMS);
        // $this->layout->view('preenroll/index', $this->data);
    }
    
        
    /*****************Function _prepare_preenroll_validation**********************************
    * @type            : Function
    * @function name   : _prepare_preenroll_validation
    * @description     : Process "Preenroll" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_preenroll_validation() {
        // $this->load->library('form_validation');
        // $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        // if (!$this->input->post('id')) {
        //     $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required|valid_email|callback_email');
        //     $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required');
        //     $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');
        //     $this->form_validation->set_rules('roll_no', $this->lang->line('roll_no'), 'trim|required');          
        // }

        // $this->form_validation->set_rules('school_id', $this->lang->line('school'), 'trim|required');
        // $this->form_validation->set_rules('section_id', $this->lang->line('section'), 'trim|required');

        // $this->form_validation->set_rules('guardian_id', $this->lang->line('guardian'), 'trim|required');
        // $this->form_validation->set_rules('relation_with', $this->lang->line('relation'), 'trim|required');
        // $this->form_validation->set_rules('registration_no', $this->lang->line('registration_no'), 'trim');
        // $this->form_validation->set_rules('group', $this->lang->line('group'), 'trim');
        // $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required');
        // $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'trim|required');
        // $this->form_validation->set_rules('dob', $this->lang->line('birth_date'), 'trim|required');
        // $this->form_validation->set_rules('gender', $this->lang->line('gender'), 'trim|required');
        // $this->form_validation->set_rules('blood_group', $this->lang->line('blood_group'), 'trim');
        // $this->form_validation->set_rules('present_address', $this->lang->line('present') . ' ' . $this->lang->line('address'), 'trim');
        // $this->form_validation->set_rules('permanent_address', $this->lang->line('permanent') . ' ' . $this->lang->line('address'), 'trim');
        // $this->form_validation->set_rules('religion', $this->lang->line('religion'), 'trim');
        // $this->form_validation->set_rules('other_info', $this->lang->line('other_info'), 'trim');
        // $this->form_validation->set_rules('photo', $this->lang->line('photo'), 'trim|callback_photo');
    }
                        
    /*****************Function email**********************************
    * @type            : Function
    * @function name   : email
    * @description     : Unique check for "Preenroll Email" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function email() {
        // if ($this->input->post('id') == '') {
        //     $email = $this->preenroll->duplicate_check($this->input->post('email'));
        //     if ($email) {
        //         $this->form_validation->set_message('email', $this->lang->line('already_exist'));
        //         return FALSE;
        //     } else {
        //         return TRUE;
        //     }
        // } else if ($this->input->post('id') != '') {
        //     $email = $this->preenroll->duplicate_check($this->input->post('email'), $this->input->post('id'));
        //     if ($email) {
        //         $this->form_validation->set_message('email', $this->lang->line('already_exist'));
        //         return FALSE;
        //     } else {
        //         return TRUE;
        //     }
        // } else {
        //     return TRUE;
        // }
    }
                
    /*****************Function photo**********************************
    * @type            : Function
    * @function name   : photo
    * @description     : validate preenroll profile photo                 
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */
    public function photo() {
        // if ($_FILES['photo']['name']) {
        //     $name = $_FILES['photo']['name'];
        //     $arr = explode('.', $name);
        //     $ext = end($arr);
        //     if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
        //         return TRUE;
        //     } else {
        //         $this->form_validation->set_message('photo', $this->lang->line('select_valid_file_format'));
        //         return FALSE;
        //     }
        // }
    }

       
    /*****************Function _get_posted_preenroll_data**********************************
    * @type            : Function
    * @function name   : _get_posted_preenroll_data
    * @description     : Prepare "Preenroll" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_preenroll_data() {

        // $items = array();

        // $items[] = 'school_id';
        // $items[] = 'guardian_id';
        // $items[] = 'relation_with';
        // $items[] = 'registration_no';
        // $items[] = 'group';
        // $items[] = 'name';
        // $items[] = 'phone';
        // $items[] = 'gender';
        // $items[] = 'blood_group';
        // $items[] = 'present_address';
        // $items[] = 'permanent_address';
        // $items[] = 'religion';
        // $items[] = 'discount';
        // $items[] = 'other_info';

        // $data = elements($items, $_POST);

        // $data['dob'] = date('Y-m-d', strtotime($this->input->post('dob')));

        // if ($this->input->post('id')) {
        //     $data['modified_at'] = date('Y-m-d H:i:s');
        //     $data['modified_by'] = logged_in_user_id();
        // } else {
        //     $data['created_at'] = date('Y-m-d H:i:s');
        //     $data['created_by'] = logged_in_user_id();
        //     $data['status'] = 1;
        //     // create user 
        //     $data['user_id'] = $this->preenroll->create_user();
        // }

        // if ($_FILES['photo']['name']) {
        //     $data['photo'] = $this->_upload_photo();
        // }

        // return $data;
    }

           
    /*****************Function _upload_photo**********************************
    * @type            : Function
    * @function name   : _upload_photo
    * @description     : process to upload preenroll profile photo in the server                  
    *                     and return photo file name  
    * @param           : null
    * @return          : $return_photo string value 
    * ********************************************************** */
    private function _upload_photo() {

        // $prev_photo = $this->input->post('prev_photo');
        // $photo = $_FILES['photo']['name'];
        // $photo_type = $_FILES['photo']['type'];
        // $return_photo = '';
        // if ($photo != "") {
        //     if ($photo_type == 'image/jpeg' || $photo_type == 'image/pjpeg' ||
        //             $photo_type == 'image/jpg' || $photo_type == 'image/png' ||
        //             $photo_type == 'image/x-png' || $photo_type == 'image/gif') {

        //         $destination = 'assets/uploads/preenroll-photo/';

        //         $file_type = explode(".", $photo);
        //         $extension = strtolower($file_type[count($file_type) - 1]);
        //         $photo_path = 'photo-' . time() . '-sms.' . $extension;

        //         move_uploaded_file($_FILES['photo']['tmp_name'], $destination . $photo_path);

        //         // need to unlink previous photo
        //         if ($prev_photo != "") {
        //             if (file_exists($destination . $prev_photo)) {
        //                 @unlink($destination . $prev_photo);
        //             }
        //         }

        //         $return_photo = $photo_path;
        //     }
        // } else {
        //     $return_photo = $prev_photo;
        // }

        // return $return_photo;
    }

        
    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Preenroll" data from database                  
    *                     also delete all relational data
    *                     and unlink preenroll photo from server   
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {

        // check_permission(DELETE);
        
        // if(!is_numeric($id)){
        //      error($this->lang->line('unexpected_error'));
        //       redirect('preenroll/index');
        // }
        
        // $preenroll = $this->preenroll->get_single('students', array('id' => $id));
        // if (!empty($preenroll)) {

        //     // delete preenroll data
        //     $this->preenroll->delete('students', array('id' => $id));

        //     // delete preenroll login data
        //     $this->preenroll->delete('users', array('id' => $preenroll->user_id));

        //     // delete preenroll enrollments
        //     $this->preenroll->delete('enrollments', array('preenroll_id' => $preenroll->id));

        //     // delete preenroll hostel_members
        //     $this->preenroll->delete('hostel_members', array('user_id' => $preenroll->user_id));

        //     // delete preenroll transport_members
        //     $this->preenroll->delete('transport_members', array('user_id' => $preenroll->user_id));

        //     // delete preenroll library_members
        //     $this->preenroll->delete('library_members', array('user_id' => $preenroll->user_id));

        //     // delete preenroll resume and photo
        //     $destination = 'assets/uploads/';
        //     if (file_exists($destination . '/preenroll-photo/' . $preenroll->photo)) {
        //         @unlink($destination . '/preenroll-photo/' . $preenroll->photo);
        //     }

        //     success($this->lang->line('delete_success'));
        // } else {
        //     error($this->lang->line('delete_failed'));
        // }
        
        // redirect('preenroll/index/');
    }

        
    /*****************Function __insert_enrollment**********************************
    * @type            : Function
    * @function name   : __insert_enrollment
    * @description     : save preenroll info to enrollment while create a new preenroll                  
    * @param           : $insert_id integer value
    * @return          : null 
    * ********************************************************** */
    private function __insert_enrollment($insert_id) {
        // $data = array();
        // $data['student_id'] = $insert_id;
        // $data['school_id'] = $this->input->post('school_id');
        // $data['class_id'] = $this->input->post('class_id');
        // $data['section_id'] = $this->input->post('section_id');
        // $data['academic_year_id'] = $this->academic_year_id;
        // $data['roll_no'] = $this->input->post('roll_no');
        // $data['created_at'] = date('Y-m-d H:i:s');
        // $data['created_by'] = logged_in_user_id();
        // $data['status'] = 1;
        // $this->db->insert('enrollments', $data);
    }

    /*****************Function __update_enrollment**********************************
    * @type            : Function
    * @function name   : __update_enrollment
    * @description     : update preenroll info to enrollment while update a preenroll                  
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function __update_enrollment() {

        // $academic_year_id = $this->academic_year_id;

        // $data = array();
        // $data['school_id'] = $this->input->post('school_id');
        // $data['section_id'] = $this->input->post('section_id');
        // $data['roll_no'] = $this->input->post('roll_no');
        // $data['modified_at'] = date('Y-m-d H:i:s');
        // $data['modified_by'] = logged_in_user_id();

        // $this->db->where('student_id', $this->input->post('id'));
        // $this->db->where('academic_year_id', $academic_year_id);
        // $this->db->update('enrollments', $data, array());
    }

}
