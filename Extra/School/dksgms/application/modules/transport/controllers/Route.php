<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Route.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Route
 * @description     : Manage transport route.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Route extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
       
        $this->load->model('Route_Model', 'route', true);      
        
    }

        
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Transport Route List" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {

        check_permission(VIEW);

        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id'); 
            $this->data['add_vehicles'] = $this->route->get_vehicle_list($condition['school_id'], '');
        }        
        $this->data['routes'] = $this->route->get_route_list();        
        
       
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_route') . ' | ' . SMS);
        $this->layout->view('route/index', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Transport Route" user interface                 
    *                    and process to store "Transport Route" into database 
    * @param           : null
    * @return          : null 
    * ***********************************************************/
    public function add() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_route_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_route_data();

                $insert_id = $this->route->insert('routes', $data);
                if ($insert_id) {
                    success($this->lang->line('insert_success'));
                    redirect('transport/route/index');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('transport/route/add');
                }
            } else {
                $this->data['post'] = $_POST;
            }
        }

        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['add_vehicles'] = $this->route->get_vehicle_list($condition['school_id'], '');            
        }        
        $this->data['routes'] = $this->route->get_route_list();
        
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('route') . ' | ' . SMS);
        $this->layout->view('route/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Transport Route" user interface                 
    *                    with populate "Transport Route" value 
    *                    and process to update "Transport Route" into database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {

        check_permission(EDIT);

        if(!is_numeric($id)){
           error($this->lang->line('unexpected_error'));
          redirect('transport/route/index');
        }
        
        if ($_POST) {
            $this->_prepare_route_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_route_data();
                $updated = $this->route->update('routes', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    success($this->lang->line('update_success'));
                    redirect('transport/route/index');
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('transport/route/edit/' . $this->input->post('id'));
                }
            } else {
                $this->data['post'] = $_POST;
                $this->data['route'] = $this->route->get_single('routes', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['route'] = $this->route->get_single('routes', array('id' => $id));

            if (!$this->data['route']) {
                redirect('transport/route/index');
            }
        }
        
       
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');        
            $this->data['edit_vehicles'] = $this->route->get_vehicle_list($condition['school_id'], $this->data['route']->id); 
        }        
        $this->data['routes'] = $this->route->get_route_list();
        
        
        $this->data['school_id'] = $this->data['route']->school_id;
        
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' ' . $this->lang->line('route') . ' | ' . SMS);
        $this->layout->view('route/index', $this->data);
    }

        
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific Transport Route data                 
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($id = null) {

        check_permission(VIEW);

        if(!is_numeric($id)){
           error($this->lang->line('unexpected_error'));
          redirect('transport/route/index');
        }
        
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');        
        }        
        $this->data['routes'] = $this->route->get_route_list();
        
        $this->data['route'] = $this->route->get_single('routes', array('id' => $id));
        
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('route') . ' | ' . SMS);
        $this->layout->view('route/index', $this->data);
    }

        
    /*****************Function _prepare_route_validation**********************************
    * @type            : Function
    * @function name   : _prepare_route_validation
    * @description     : Process "Transport Route" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_route_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div route="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('title', $this->lang->line('transport_route'), 'trim|required|callback_title');
        $this->form_validation->set_rules('vehicle_ids', $this->lang->line('assign_vehicle'), 'trim|callback_vehicle_ids');
        $this->form_validation->set_rules('school_id', $this->lang->line('school'), 'trim|required');
        $this->form_validation->set_rules('route_start', $this->lang->line('route_start'), 'trim|required');
        $this->form_validation->set_rules('route_end', $this->lang->line('route_end'), 'trim|required');
        $this->form_validation->set_rules('fare', $this->lang->line('route_fare'), 'trim');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
    }

        
    /*****************Function vehicle_ids**********************************
    * @type            : Function
    * @function name   : vehicle_ids
    * @description     : Validate vehicle for the Transport Route                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function vehicle_ids() {

        if (!$this->input->post('vehicle_ids')) {
            $this->form_validation->set_message('title', $this->lang->line('already_exist'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*****************Function title**********************************
    * @type            : Function
    * @function name   : title
    * @description     : Validate title for the Transport Route                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function title() {
        if ($this->input->post('id') == '') {
            $route = $this->route->duplicate_check($this->input->post('school_id'), $this->input->post('title'));
            if ($route) {
                $this->form_validation->set_message('title', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $route = $this->route->duplicate_check($this->input->post('school_id'), $this->input->post('title'), $this->input->post('id'));
            if ($route) {
                $this->form_validation->set_message('title', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

       
    /*****************Function _get_posted_route_data**********************************
    * @type            : Function
    * @function name   : _get_posted_route_data
    * @description     : Prepare "Transport Route" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_route_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'title';
        $items[] = 'route_start';
        $items[] = 'route_end';
        $items[] = 'fare';
        $items[] = 'note';

        $data = elements($items, $_POST);

        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
            $this->_update_vehicle_status($this->input->post('id'));
        } else {
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
            $this->_update_vehicle_status();
        }

        $data['vehicle_ids'] = $this->input->post('vehicle_ids') ? implode(',', $this->input->post('vehicle_ids')) : '';


        return $data;
    }

           
    /*****************Function __update_vehicle_status**********************************
    * @type            : Function
    * @function name   : __update_vehicle_status
    * @description     : process to update vehicle status while create/update a Transport Route                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */
    private function _update_vehicle_status($id = null) {

        if ($id) {
            $route = $this->route->get_single('routes', array('id' => $id));
            $ids = explode(',', $route->vehicle_ids);
            if (!empty($ids)) {
                foreach ($ids as $key => $value) {
                    $this->route->update('vehicles', array('is_allocated' => 0), array('id' => $value));
                }
            }
        }

        if ($this->input->post('vehicle_ids')) {
            foreach ($this->input->post('vehicle_ids') as $key => $value) {
                $this->route->update('vehicles', array('is_allocated' => 1), array('id' => $value));
            }
        }
    }

        
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Transpoer Route" data from database                  
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {

        check_permission(DELETE);

        if(!is_numeric($id)){
         error($this->lang->line('unexpected_error'));
          redirect('transport/route/index');
        }
        
        // update vehicle status
        $route = $this->route->get_single('routes', array('id' => $id));

        if ($this->route->delete('routes', array('id' => $id))) {

            $ids = explode(',', $route->vehicle_ids);
            if (!empty($ids)) {
                foreach ($ids as $key => $value) {
                    $this->route->update('vehicles', array('is_allocated' => 0), array('id' => $value));
                }
            }
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('transport/route/index');
    }
    
    
            
    /*****************Function get_vehicle_by_school**********************************
     * @type            : Function
     * @function name   : get_vehicle_by_school
     * @description     : Load "Book Listing" by ajax call                
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_vehicle_by_school() {
        
        $school_id  = $this->input->post('school_id');
        $route_id  = $this->input->post('route_id');
         
        $vehicles = $this->route->get_vehicle_list($school_id, $route_id);
        
        $str = ' ';
      
        if (!empty($vehicles)) {
            
            if($route_id){
                $route = $this->route->get_single('routes', array('id' => $route_id));
                $ids = explode(',', $route->vehicle_ids);
                $checked = '';
                foreach ($vehicles as $obj) { 
                    $checked = in_array($obj->id, $ids) ? 'checked="checked"': '';
                    $str .= '<input  class=""  name="vehicle_ids[]" id="vehicle_ids[]"  value="'.$obj->id.'" '.$checked.' type="checkbox" required="required">'.$obj->number.'<br/>';
                }
            }else{
                foreach ($vehicles as $obj) {                
                    $str .= '<input  class=""  name="vehicle_ids[]" id="vehicle_ids[]" value="'. $obj->id.'" type="checkbox" required="required">'.$obj->number.'<br/>';
                }
            }            
        }

        echo $str;
    }

}