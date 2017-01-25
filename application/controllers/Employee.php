<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."libraries/Admin_controller.php");

class Employee extends Admin_Controller 
{
	
    function __construct()
    {
        parent::__construct();  

        if(!is_logged_in())
            redirect('login');
        
        $this->load->model('employee_model');
       
    }  
    
    public function index()
    { 
        $this->layout->add_javascripts(array('listing'));  

        $this->load->library('listing');         
        
        $this->simple_search_fields = array(                                                
                                    'e.emp_name'       => 'Name',
                                    'e.emp_code'       => 'Employee Code',
                                    'e.current_status' => 'Status',
                                    'e.designation'    => 'Designation',
                                    'e.phone1'         => 'Phone',
                                    'e.agency'         => 'Agency',
                                    'e.nationality'    => 'Nationality',
                                    'o.name'           => 'Organization',
        );
         
        $this->_narrow_search_conditions = array("start_date");
        
        $str = '<a href="'.site_url('employee/add/{id}').'" class="table-action"><i class="fa fa-edit edit"></i></a>
                <a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action" onclick="delete_record(\'employee/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>
                ';
 
        $this->listing->initialize(array('listing_action' => $str));

        $listing = $this->listing->get_listings('employee_model', 'listing');

        if($this->input->is_ajax_request())
            $this->_ajax_output(array('listing' => $listing), TRUE);
        
        $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
        $this->data['simple_search_fields'] = $this->simple_search_fields;
        $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
        $this->data['per_page'] = $this->listing->_get_per_page();
        $this->data['per_page_options'] = array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
        
        $this->data['search_bar'] = $this->load->view('listing/search_bar', $this->data, TRUE);        
        
        $this->data['listing'] = $listing;
        
        $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);
        
        $this->layout->view("frontend/employee/index");
        
    }
    
    public function add( $edit_id = ''){

        try
        {
            if($this->input->post('edit_id'))            
                $edit_id = $this->input->post('edit_id');

            $this->form_validation->set_rules($this->get_validation_rules($edit_id));

            $this->form_validation->set_error_delimiters('', '');
                
            if ($this->form_validation->run())
            {

                $emp_data = array(                        
                        'org_id'        => $this->input->post('org_id'),
                        'emp_code'      => $this->input->post('emp_code'),
                        'emp_name'      => $this->input->post('emp_name'),
                        'date_arrival'  => $this->input->post('date_arrival'),
                        'date_exit_leave'=> $this->input->post('date_exit_leave'),
                        'date_exit_final'=> $this->input->post('date_exit_final'),
                        'date_exit_absc'=> $this->input->post('date_exit_absc'),
                        'current_status'=> $this->input->post('current_status'),
                        'phone1'        => $this->input->post('phone1'),
                        'phone2'        => $this->input->post('phone2'),
                        'agency'        => $this->input->post('agency'),
                        'designation'   => $this->input->post('designation'),                   
                        'visa_designation'=> $this->input->post('visa_designation'),
                        'dob'           => $this->input->post('dob'),
                        'age'           => $this->input->post('age'),
                        'joining_date'  => $this->input->post('joining_date'),
                        'no_of_months_completed'=> $this->input->post('no_of_months_completed'),
                        'nationality'   => $this->input->post('nationality')
                );

                $detail_data = array(
                        'pp_number' => $this->input->post('pp_number'),
                        'pp_validity' => $this->input->post('pp_validity'),
                        'vp_number' => $this->input->post('vp_number'),
                        'rp_number' => $this->input->post('rp_number'),
                        'rp_validity' => $this->input->post('rp_validity'),
                        'ot_rate' => $this->input->post('ot_rate'),
                        'sot_rate' => $this->input->post('sot_rate'),
                        'food_allowance' => $this->input->post('food_allowance'),
                        'food_allowance_deduction' => $this->input->post('food_allowance_deduction'),
                        'accomodation_allowance' => $this->input->post('accomodation_allowance'),
                        'transport_allowance' => $this->input->post('transport_allowance'),
                        'telephone_allowance' => $this->input->post('telephone_allowance'),
                        'special_allowance' => $this->input->post('special_allowance'),
                        'salary_advance' => $this->input->post('salary_advance'),
                        'advancce_deduction' => $this->input->post('advancce_deduction'),
                        'emp_qid' => $this->input->post('emp_qid'),
                        'emp_visa_id' => $this->input->post('emp_visa_id'),
                        'emp_bank_short_name' => $this->input->post('emp_bank_short_name'),
                        'emp_account' => $this->input->post('emp_account'),
                        'salary_frequency' => $this->input->post('salary_frequency'),
                        'no_working_days' => $this->input->post('no_working_days'),
                        'net_salary' => $this->input->post('net_salary'),
                        'basic_salary' => $this->input->post('basic_salary'),
                        'extra_hours' => $this->input->post('extra_hours'),
                        'extra_income' => $this->input->post('extra_income'),
                        'deductions' => $this->input->post('deductions'),
                        'payment_type' => $this->input->post('payment_type')
                );

                $comments_data = array(
                        'comments'    => $this->input->post('comments'),
                        'future_data1'=>$this->input->post('future_data1'),
                        'future_data2'=>$this->input->post('future_data2'),
                        'future_data3'=>$this->input->post('future_data3'),
                        'future_data4'=>$this->input->post('future_data4'),
                        'future_data5'=>$this->input->post('future_data5')
                );               

                if($edit_id)
                {
                    $emp_data['updated_date'] = date('Y-m-d H:i:s'); 
                    $emp_data['updated_id']   = get_current_user_id();    

                    //Employee data
                    $this->employee_model->update(array("id" => $edit_id),$emp_data);

                    //employee detail data
                    $this->employee_model->update(array("emp_id" => $edit_id),$detail_data,'employee_details');

                    //Employee comments data
                    $this->employee_model->update(array("emp_id" => $edit_id),$comments_data,'employee_note');

                    $msg = 'Employee updated successfully';
                }
                else
                {    
                    $emp_data['created_date'] = date('Y-m-d H:i:s'); 
                    $emp_data['updated_date'] = date('Y-m-d H:i:s');
                    $emp_data['created_id']   = get_current_user_id();  

                    //insert employee data
                    $insert_id = $this->employee_model->insert($emp_data);

                    //insert employee detail data
                    $detail_data['emp_id'] = $insert_id;
                    $this->employee_model->insert($detail_data,'employee_details');

                    //insert employee comments data
                    $comments_data['emp_id'] = $insert_id;
                    $this->employee_model->insert($comments_data,'employee_note');

                    $msg = 'Employee added successfully';
                }

                $this->session->set_flashdata('success_msg',$msg,TRUE);

                redirect('employee');
            }    
            else
            {
            
                $edit_data = array('emp_id'=> '','org_id'=> '','emp_code'=> '','emp_name'=> '','date_arrival'=> '','date_exit_leave'=> '',  'date_exit_final'=> '','date_exit_absc'=> '','current_status'=> '','phone1'=> '','phone2'=> '','agency'=> '',  'designation'=> '',
                                  'visa_designation'=> '','dob'=> '','age'=> '','joining_date'=> '','no_of_months_completed'=> '','nationality'=> '','pp_number' => '','pp_validity' => '','vp_number' => '','rp_number' => '','rp_validity' => '','ot_rate' => '','sot_rate' => '',
                                  'food_allowance' => '','food_allowance_deduction' => '','accomodation_allowance' => '','transport_allowance' => '','telephone_allowance' => '','special_allowance' => '','salary_advance' => '',  'advancce_deduction' => '','emp_qid' => '',
                                  'emp_visa_id' => '','emp_bank_short_name' => '','emp_account' => '','salary_frequency' => '','no_working_days' => '','net_salary' => '','basic_salary' => '','extra_hours' => '','extra_income' => '','deductions' => '','payment_type' => '',
                                  'comments'=>'','future_data1'=>'','future_data2'=>'','future_data3'=>'','future_data4'=>'','future_data5'=>'');               

            }

        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $this->data['message']  = $e->getMessage();
                
        }

        if($edit_id)
            $edit_data = $this->employee_model->get_employee_details($edit_id);

        $this->data['editdata']  = $edit_data;

        $this->data['org_list'] = $this->employee_model->get_where(array(),"id,name","organization")->result_array();

        $this->layout->view('frontend/employee/add');

    }

    function get_validation_rules($edit_id)
    {
     
        $rules = array();
         
        $rules[] = array('field' => 'org_id', 'label' => 'Organization', 'rules' => 'trim|required');
        $rules[] = array('field' => 'emp_code', 'label' => 'Employee Code', 'rules' => 'trim|required|callback_check_empcode['.$edit_id.']');
        $rules[] = array('field' => 'emp_name', 'label' => 'Employee Name', 'rules' => 'trim|required');
        $rules[] = array('field' => 'date_arrival', 'label' => 'Date of Arrival', 'rules' => 'trim|required');
        $rules[] = array('field' => 'date_exit_leave', 'label' => 'Date of Exit -leave ', 'rules' => 'trim');
        $rules[] = array('field' => 'date_exit_final', 'label' => 'Date of Exit -Final', 'rules' => 'trim');
        $rules[] = array('field' => 'date_exit_absc', 'label' => 'Date of Exit -Absc', 'rules' => 'trim');
        $rules[] = array('field' => 'current_status', 'label' => 'Current Status', 'rules' => 'trim|required');
        $rules[] = array('field' => 'phone1', 'label' => 'Phone1', 'rules' => 'trim|required');
        $rules[] = array('field' => 'phone2', 'label' => 'Phone2', 'rules' => 'trim');
        $rules[] = array('field' => 'agency', 'label' => 'Agency', 'rules' => 'trim');   
        $rules[] = array('field' => 'designation', 'label' => 'Designation', 'rules' => 'trim|required');
        $rules[] = array('field' => 'visa_designation', 'label' => 'Visa Designation', 'rules' => 'trim');
        $rules[] = array('field' => 'dob', 'label' => 'Date of Birth', 'rules' => 'trim|required');
        $rules[] = array('field' => 'age', 'label' => 'age', 'rules' => 'trim');
        $rules[] = array('field' => 'joining_date', 'label' => 'Date of Joining', 'rules' => 'trim|required');
        $rules[] = array('field' => 'no_of_months_completed', 'label' => 'Completed Months', 'rules' => 'trim');
        $rules[] = array('field' => 'nationality', 'label' => 'Nationality', 'rules' => 'trim|required');

        $rules[] = array('field' => 'pp_number', 'label' => 'PP Number', 'rules' => 'trim');
        $rules[] = array('field' => 'pp_validity', 'label' => 'pp validity', 'rules' => 'trim');
        $rules[] = array('field' => 'vp_number', 'label' => 'vp number', 'rules' => 'trim');
        $rules[] = array('field' => 'rp_number', 'label' => 'rp number', 'rules' => 'trim');
        $rules[] = array('field' => 'rp_validity', 'label' => 'rp validity', 'rules' => 'trim');
        $rules[] = array('field' => 'ot_rate', 'label' => 'OT Rate', 'rules' => 'trim');
        $rules[] = array('field' => 'sot_rate', 'label' => 'SOT Rate', 'rules' => 'trim');
        $rules[] = array('field' => 'food_allowance', 'label' => 'food allowance', 'rules' => 'trim');
        $rules[] = array('field' => 'food_allowance_deduction', 'label' => 'food allowance deduction', 'rules' => 'trim');
        $rules[] = array('field' => 'accomodation_allowance', 'label' => 'accomodation allowance', 'rules' => 'trim');
        $rules[] = array('field' => 'transport_allowance', 'label' => 'transport allowance', 'rules' => 'trim');
        $rules[] = array('field' => 'telephone_allowance', 'label' => 'telephone allowance', 'rules' => 'trim');
        $rules[] = array('field' => 'special_allowance', 'label' => 'special allowance', 'rules' => 'trim');
        $rules[] = array('field' => 'salary_advance', 'label' => 'salary advance', 'rules' => 'trim');
        $rules[] = array('field' => 'advancce_deduction', 'label' => 'advancce deduction', 'rules' => 'trim');
        $rules[] = array('field' => 'emp_qid', 'label' => 'emp qid', 'rules' => 'trim');
        $rules[] = array('field' => 'emp_visa_id', 'label' => 'emp visa id', 'rules' => 'trim');
        $rules[] = array('field' => 'emp_bank_short_name', 'label' => 'Employee Bank Short Name', 'rules' => 'trim');
        $rules[] = array('field' => 'emp_account', 'label' => 'Employee Account', 'rules' => 'trim');
        $rules[] = array('field' => 'salary_frequency', 'label' => 'salary frequency', 'rules' => 'trim');
        $rules[] = array('field' => 'no_working_days', 'label' => 'Working Days', 'rules' => 'trim');
        $rules[] = array('field' => 'net_salary', 'label' => 'Net Salary', 'rules' => 'trim|required');
        $rules[] = array('field' => 'basic_salary', 'label' => 'Basic Salary', 'rules' => 'trim|required');
        $rules[] = array('field' => 'extra_hours', 'label' => 'extra hours', 'rules' => 'trim');
        $rules[] = array('field' => 'extra_income', 'label' => 'extra income', 'rules' => 'trim');
        $rules[] = array('field' => 'deductions', 'label' => 'deductions', 'rules' => 'trim');
        $rules[] = array('field' => 'payment_type', 'label' => 'Payment Type', 'rules' => 'trim|required');

        $rules[] = array('field' => 'comments', 'label' => 'comments', 'rules' => 'trim');
        $rules[] = array('field' => 'future_data1', 'label' => 'future data1', 'rules' => 'trim');
        $rules[] = array('field' => 'future_data2', 'label' => 'future data3', 'rules' => 'trim');
        $rules[] = array('field' => 'future_data3', 'label' => 'future data3', 'rules' => 'trim');
        $rules[] = array('field' => 'future_data4', 'label' => 'future data4', 'rules' => 'trim');
        $rules[] = array('field' => 'future_data5', 'label' => 'future data5', 'rules' => 'trim');

        return $rules;
     
    }

    function check_empcode($code,$emp_id)
    {
        $where = array();
     
        if($emp_id)
            $where['id !='] = $emp_id;

        $where['emp_code'] = $code;

        $result = $this->employee_model->get_where( $where)->num_rows();
     
        if ($result) {
            $this->form_validation->set_message('check_empcode', 'This Employee Code already exists');
            return FALSE;
        }
        return TRUE;
    }

    function delete($del_id)
    {
        $access_data = $this->employee_model->get_where(array("id"=>$del_id),'emp_code')->row_array();
       
        $output=array();

        if(count($access_data) > 0){

            $this->employee_model->delete(array("id"=>$del_id));
            $this->employee_model->delete(array("emp_id"=>$del_id),'employee_details');
            $this->employee_model->delete(array("emp_id"=>$del_id),'employee_note');

            $this->employee_model->delete(array("emp_code"=>$access_data['emp_code']),'timesheet');

            $output['message'] ="Record deleted successfuly.";
            $output['status']  = "success";
        }
        else
        {
           $output['message'] ="This record not matched by Employee.";
           $output['status']  = "error";
        }
        
        $this->_ajax_output($output, TRUE);
            
    }
    
}
?>
