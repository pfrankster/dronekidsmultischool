<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Sms.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Sms
 * @description     : Manage school Sms setting.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Sms extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
         $this->load->model('Sms_Model', 'sms', true);
    }

    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "School SMS Setting Listing" user interface                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {
        
        check_permission(VIEW);
        
        $this->data['sms_settings'] = $this->sms->get_sms_setting_list();
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('sms') . ' ' . $this->lang->line('setting') . ' | ' . SMS);
        $this->layout->view('sms/index', $this->data);            
       
    }

    
    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Sms Setting" user interface                 
    *                    and store "Sms Setting" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);
        
        if ($_POST) {
            $this->_prepare_sms_setting_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_sms_setting_data();

                $insert_id = $this->sms->insert('sms_settings', $data);
                if ($insert_id) {
                    success($this->lang->line('insert_success'));
                    redirect('administrator/sms/index');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('administrator/sms/add');
                }
            } else {
                $this->data = $_POST;
            }
        }

        $this->data['sms_settings'] = $this->sms->get_sms_setting_list();
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('sms') . ' ' . $this->lang->line('setting') . ' | ' . SMS);
        $this->layout->view('sms/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "SMS Setting" user interface                 
    *                    with populated "SMS Setting" value 
    *                    and update "SMS Setting" database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {   
        
        check_permission(EDIT);
       
        if ($_POST) {
            $this->_prepare_sms_setting_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_sms_setting_data();
                $updated = $this->sms->update('sms_settings', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    success($this->lang->line('update_success'));
                    redirect('administrator/sms/index');                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('administrator/sms/edit/' . $this->input->post('id'));
                }
            } else {
                 $this->data['sms_setting'] = $this->sms->get_single('sms_settings', array('id' => $this->input->post('id')));
            }
        } else {
            if ($id) {
                $this->data['sms_setting'] = $this->sms->get_single('sms_settings', array('id' => $id));
 
                if (!$this->data['sms_setting']) {
                     redirect('administrator/sms/index');
                }
            }
        }

        $this->data['sms_settings'] = $this->sms->get_sms_setting_list();
        $this->data['school_id'] = $this->data['sms_setting']->school_id;
        
        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('sms') . ' ' . $this->lang->line('setting') . ' | ' . SMS);
        $this->layout->view('sms/index', $this->data);
    }

    
        
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific sms setting data                 
    *                       
    * @param           : $assignment_id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($setting_id = null) {

        check_permission(VIEW);

        if(!is_numeric($setting_id)){
             error($this->lang->line('unexpected_error'));
             redirect('administrator/sms/index');
        }
        
        $this->data['sms_settings'] = $this->sms->get_sms_setting_list();
        $this->data['sms_setting'] = $this->sms->get_single_sms_setting($setting_id);
           
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('sms') . ' ' . $this->lang->line('setting') . ' | ' . SMS);
        $this->layout->view('sms/index', $this->data);
    }

    
    /*****************Function _prepare_sms_setting_validation**********************************
    * @type            : Function
    * @function name   : _prepare_sms_setting_validation
    * @description     : Process "Academic School" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_sms_setting_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
      
        $this->form_validation->set_rules('school_id', $this->lang->line('school'), 'trim|required');
        $this->form_validation->set_rules('clickatell_username', $this->lang->line('username'), 'trim');
        $this->form_validation->set_rules('clickatell_password', $this->lang->line('password'), 'trim');
        $this->form_validation->set_rules('clickatell_api_key', $this->lang->line('api_key'), 'trim');
        $this->form_validation->set_rules('clickatell_from_number', $this->lang->line('from_number'), 'trim');
        $this->form_validation->set_rules('clickatell_mo_no', $this->lang->line('mo_no'), 'trim');
        $this->form_validation->set_rules('clickatell_status', $this->lang->line('is_active'), 'trim');
        
        $this->form_validation->set_rules('twilio_account_sid', $this->lang->line('account_sid'), 'trim');
        $this->form_validation->set_rules('twilio_auth_token', $this->lang->line('auth_token'), 'trim');
        $this->form_validation->set_rules('twilio_from_number', $this->lang->line('from_number'), 'trim');
        $this->form_validation->set_rules('twilio_status', $this->lang->line('is_active'), 'trim');
        
        $this->form_validation->set_rules('bulk_username', $this->lang->line('username'), 'trim');
        $this->form_validation->set_rules('bulk_password', $this->lang->line('password'), 'trim');
        $this->form_validation->set_rules('bulk_status', $this->lang->line('is_active'), 'trim');        
        
        $this->form_validation->set_rules('msg91_auth_key', $this->lang->line('auth_key'), 'trim');
        $this->form_validation->set_rules('msg91_sender_id', $this->lang->line('sender_id'), 'trim');
        $this->form_validation->set_rules('msg91_status', $this->lang->line('is_active'), 'trim');        
        
        $this->form_validation->set_rules('plivo_auth_id', $this->lang->line('auth_id'), 'trim');
        $this->form_validation->set_rules('plivo_auth_token', $this->lang->line('auth_token'), 'trim');
        $this->form_validation->set_rules('plivo_from_number', $this->lang->line('from_number'), 'trim');
        $this->form_validation->set_rules('plivo_status', $this->lang->line('is_active'), 'trim');
    }

    
    /*****************Function _get_posted_sms_setting_data**********************************
     * @type            : Function
     * @function name   : _get_posted_sms_setting_data
     * @description     : Prepare "School SMS setting" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */
    private function _get_posted_sms_setting_data() {

        $items = array();
       
        $items[] = 'clickatell_username';
        $items[] = 'clickatell_password';
        $items[] = 'clickatell_api_key';
        $items[] = 'clickatell_from_number';
        $items[] = 'clickatell_mo_no';
        $items[] = 'clickatell_status'; 

        $items[] = 'twilio_account_sid';
        $items[] = 'twilio_auth_token';
        $items[] = 'twilio_from_number';
        $items[] = 'twilio_status'; 

        $items[] = 'bulk_username';
        $items[] = 'bulk_password';
        $items[] = 'bulk_status'; 

        $items[] = 'msg91_auth_key';
        $items[] = 'msg91_sender_id';
        $items[] = 'msg91_status';       

        $items[] = 'plivo_auth_id';
        $items[] = 'plivo_auth_token';
        $items[] = 'plivo_from_number';
        $items[] = 'plivo_status';      

        $items[] = 'school_id';
        
        $data = elements($items, $_POST);     
       
        
        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }       

        return $data;
    }
    
     
    /*****************Function delete**********************************
   * @type            : Function
   * @function name   : delete
   * @description     : delete "School SMS Settings" from database                  
   *                       
   * @param           : $id integer value
   * @return          : null 
   * ********************************************************** */
    public function delete($id = null) {
        
        
        check_permission(DELETE);
        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('administrator/sms');              
        }
        if ($this->sms->delete('sms_settings', array('id' => $id))) {            
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('administrator/sms');
    }

}