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
    }

    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Preenroll List" user interface  
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function index() {

        check_permission(VIEW);
        
        $this->data['preenrolls'] = $this->preenroll->get_preenroll_list();
        $this->data['payment_types'] = $this->preenroll->get_list('paymant_types', array(), '', '', '', 'id', 'ASC');
        $this->data['status_types'] = $this->preenroll->get_list('pe_status', array(), '', '', '', 'id', 'ASC');

        $condition = array();
        $condition['status'] = 1;
        $this->data['schools'] = $this->preenroll->get_list('schools', $condition, '','', '', 'id', 'ASC');
        
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

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_preenroll_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_preenroll_data();

                $insert_id = $this->preenroll->insert('pre_enrollments', $data);

                if ($insert_id) {
                    // $this->__insert_enrollment($insert_id);
                    success($this->lang->line('insert_success'));
                    redirect('preenroll/index/'.$this->input->post('id'));
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('preenroll/add/'.$this->input->post('id'));
                }
            } else {

                $this->data['post'] = $_POST;
            }
        }

        $this->data['preenrolls'] = $this->preenroll->get_preenroll_list();
        $this->data['payment_types'] = $this->preenroll->get_list('paymant_types', array(), '', '', '', 'id', 'ASC');
        $this->data['status_types'] = $this->preenroll->get_list('pe_status', array(), '', '', '', 'id', 'ASC');

        $condition = array();
        $condition['status'] = 1;
        $this->data['schools'] = $this->preenroll->get_list('schools', $condition, '','', '', 'id', 'ASC');
 
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('preenroll') . ' | ' . SMS);
        $this->layout->view('preenroll/index', $this->data);
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

        check_permission(EDIT);
        
        if ($_POST) {
            $this->_prepare_preenroll_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_preenroll_data();
                $updated = $this->preenroll->update('pre_enrollments', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    success($this->lang->line('update_success'));
                    redirect('preenroll/index');
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('preenroll/edit/' . $this->input->post('id'));
                }
            } else {
                
                $this->data['preenroll'] = $this->preenroll->get_single_preenroll($this->input->post('id'));
            }
        }

        if ($id) {
            $this->data['preenroll'] = $this->preenroll->get_single_preenroll($id);

            if (!$this->data['preenroll']) {
                redirect('preenroll/index');
            }
        }
        
        $this->data['preenrolls'] = $this->preenroll->get_preenroll_list();
        $this->data['payment_types'] = $this->preenroll->get_list('paymant_types', array(), '', '', '', 'id', 'ASC');
        $this->data['status_types'] = $this->preenroll->get_list('pe_status', array(), '', '', '', 'id', 'ASC');

        $condition = array();
        $condition['status'] = 1;
        $this->data['schools'] = $this->preenroll->get_list('schools', $condition, '','', '', 'id', 'ASC');
        
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' ' . $this->lang->line('preenroll') . ' | ' . SMS);
        $this->layout->view('preenroll/index', $this->data);
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

        check_permission(VIEW);

        if(!is_numeric($preenroll_id)){
             error($this->lang->line('unexpected_error'));
              redirect('preenroll/index');
        }
        
        $this->data['preenroll'] = $this->preenroll->get_single_preenroll($preenroll_id);        
    
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('preenroll') . ' | ' . SMS);
        $this->layout->view('preenroll/index', $this->data);
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
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('guardian_name', $this->lang->line('guardian_name'), 'trim|required');
        $this->form_validation->set_rules('guardian_cpf', $this->lang->line('guardian_cpf'), 'trim|required');
        $this->form_validation->set_rules('guardian_phone', $this->lang->line('guardian_phone'), 'trim|required');
        $this->form_validation->set_rules('guardian_relation', $this->lang->line('guardian_relation'), 'trim|required');
        $this->form_validation->set_rules('address', $this->lang->line('address'), 'trim|required');
        $this->form_validation->set_rules('state_id', $this->lang->line('state'), 'trim|required');
        $this->form_validation->set_rules('city_id', $this->lang->line('city'), 'trim|required');
        // $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required|valid_email|callback_email');
        $this->form_validation->set_rules('student_name', $this->lang->line('student_name'), 'trim|required');
        $this->form_validation->set_rules('student_gender', $this->lang->line('student_gender'), 'trim|required');
        // $this->form_validation->set_rules('school_id', $this->lang->line('school'), 'trim|required');
        // $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');
        // $this->form_validation->set_rules('section_id', $this->lang->line('section'), 'trim|required');
        $this->form_validation->set_rules('payment_type_id', $this->lang->line('payment_type'), 'trim|required');
        $this->form_validation->set_rules('status_id', $this->lang->line('status'), 'trim|required');

        
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
       
    /*****************Function _get_posted_preenroll_data**********************************
    * @type            : Function
    * @function name   : _get_posted_preenroll_data
    * @description     : Prepare "Preenroll" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_preenroll_data() {

        $items = array();

        $items[] = 'guardian_name';
        $items[] = 'guardian_cpf';
        $items[] = 'guardian_phone';
        $items[] = 'guardian_relation';
        $items[] = 'address';
        $items[] = 'state_id';
        $items[] = 'city_id';
        $items[] = 'email';
        $items[] = 'student_name';
        $items[] = 'student_gender';
        $items[] = 'section_id';
        $items[] = 'payment_type_id';
        $items[] = 'status_id';

        $data = elements($items, $_POST);

        // $data['state_id'] = $_POST['state'];
        // $data['city_id'] = $_POST['city'];
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

        

        return $data;
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

        check_permission(DELETE);
        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
              redirect('preenroll/index');
        }
        $preenroll = $this->preenroll->get_single_preenroll($id);        
        // $preenroll = $this->preenroll->get_single('pre_enrollments', array('id' => $id));
        if (!empty($preenroll)) {
            // $preenroll->
            // delete preenroll data
            $this->preenroll->delete('pre_enrollments', array('id' => $id));

            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        
        redirect('preenroll/index/');
    }

    /*****************Function approval**********************************
    * @type            : Function
    * @function name   : approval
    * @description     : approval "Preenroll" data from database                  
    *                     related with the pre-enrollment
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function approval($id = null) {

        check_permission(EDIT);
        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
              redirect('preenroll/index');
        }
        
        $preenroll = $this->preenroll->get_single('pre_enrollments', array('id' => $id));
        if (!empty($preenroll)) {
            $data = array();
            $data['status_id'] = 2;
            // $this->db->where('id',$id);
            $updated = $this->db->update('pre_enrollments', $data, array('id' => $id));
            if($updated){
                success($this->lang->line('approval_success'));
            }else{
                error($this->lang->line('approval_failed'));
            } 
        } else {
            error($this->lang->line('approval_failed'));
        }
        
        redirect('preenroll/index/');
    }

}
