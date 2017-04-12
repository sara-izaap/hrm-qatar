<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."libraries/Admin_controller.php");

class Organization extends Admin_Controller 
{
	
    function __construct()
    {
        parent::__construct();  

        if(!is_logged_in())
            redirect('login');
        
        $this->load->model('org_model');
       
    }  
    
    public function index()
    { 
        $this->layout->add_javascripts(array('listing'));  

        $this->load->library('listing');         
        
        $this->simple_search_fields = array(                                                
                                    'c.name'       => 'Name',
                                    't.name'       => 'Organization Type',
                                    'c.short_name' => 'Short Name',
                                    'c.web_url'    => 'Web Address',
                                    'c.email'      => 'Email'                                            
        );

         
        $this->_narrow_search_conditions = array("start_date");
        
        $str = '<a href="'.site_url('organization/add/{id}').'" class="table-action"><i class="fa fa-edit edit"></i></a>';
        if(get_user_role() == '1')    
            $str .= '<a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action" onclick="delete_record(\'organization/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';
 
        $this->listing->initialize(array('listing_action' => $str));

        $listing = $this->listing->get_listings('org_model', 'listing');

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
        
        $this->layout->view("frontend/organization/index");
        
    }
    
    public function add( $edit_id =''){

        try
        {
            if($this->input->post('edit_id'))            
                $edit_id = $this->input->post('edit_id');

            $this->form_validation->set_rules('name','Organization Name','trim|required');
            $this->form_validation->set_rules('org_type','Type','trim|required');
            $this->form_validation->set_rules('short_name','Short Name','trim|required');
            $this->form_validation->set_rules('registration_no','Registration Number','trim');
            $this->form_validation->set_rules('web_url','Web Url','trim|required');
            $this->form_validation->set_rules('employee_count','Employess','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required');
            $this->form_validation->set_rules('phone','Phone','trim|required');
            $this->form_validation->set_rules('fax','Fax','trim');
            $this->form_validation->set_rules('fax','Fax','trim');
            $this->form_validation->set_rules('address','Address','trim|required');
            $this->form_validation->set_rules('note','Note','trim');

            $this->form_validation->set_error_delimiters('', '');
                
            if ($this->form_validation->run())
            {
                $ins_data = array();
                $ins_data['org_type']       = $this->input->post('org_type');
                $ins_data['name']           = $this->input->post('name');
                $ins_data['short_name']     = $this->input->post('short_name');
                $ins_data['registration_no']= $this->input->post('registration_no');
                $ins_data['web_url']        = $this->input->post('web_url');
                $ins_data['employee_count'] = $this->input->post('employee_count');
                $ins_data['email']          = $this->input->post('email');
                $ins_data['phone']          = $this->input->post('phone');
                $ins_data['fax']            = $this->input->post('fax');
                $ins_data['address']        = $this->input->post('address');
                $ins_data['note']           = $this->input->post('note');  

                if($edit_id)
                {
                    $ins_data['updated_date'] = date('Y-m-d H:i:s'); 
                    $ins_data['updated_id']   = get_current_user_id();    
                    $this->org_model->update(array("id" => $edit_id),$ins_data);

                    $msg = 'Organization updated successfully';
                }
                else
                {    
                    $ins_data['created_date'] = date('Y-m-d H:i:s'); 
                    $ins_data['updated_date'] = date('Y-m-d H:i:s');
                    $ins_data['created_id']   = get_current_user_id();  

                    $this->org_model->insert($ins_data);

                    $msg = 'Organization added successfully';
                }

                $this->session->set_flashdata('success_msg',$msg,TRUE);

                redirect('organization');
            }    
            else
            {
            
                $edit_data = array();
                $edit_data['id']             = '';
                $edit_data['org_type']       = '';
                $edit_data['name']           = '';
                $edit_data['registration_no']= '';
                $edit_data['short_name']     = '';
                $edit_data['web_url']        = '';
                $edit_data['employee_count'] = '';
                $edit_data['email']          = '';
                $edit_data['phone']          = '';
                $edit_data['fax']            = '';
                $edit_data['address']        = '';
                $edit_data['note']           = '';                

            }

        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $this->data['message']  = $e->getMessage();
                
        }

        if($edit_id)
            $edit_data =$this->org_model->get_where(array("id" => $edit_id))->row_array();

        $this->data['editdata']  = $edit_data;

        $this->data['org_types'] = $this->org_model->get_where(array(),"*","org_type")->result_array();

        $this->layout->view('frontend/organization/add');

    }

    function delete($del_id)
    {
        $access_data = $this->org_model->get_where(array("id"=>$del_id),'id')->row_array();
       
        $output=array();

        if(count($access_data) > 0){

            $this->org_model->delete(array("id"=>$del_id));

            $emp_data = $this->org_model->get_where(array("org_id"=>$access_data['id']),'id,emp_code','employee')->result_array();

            foreach($emp_data as $emp){

                $this->org_model->delete(array("id"=>$emp['id']),'employee');
                $this->org_model->delete(array("emp_id"=>$emp['id']),'employee_details');
                $this->org_model->delete(array("emp_id"=>$emp['id']),'employee_note');

                $this->org_model->delete(array("emp_code"=>$emp['emp_code']),'timesheet');
            }

            $output['message'] ="Record deleted successfuly.";
            $output['status']  = "success";
        }
        else
        {
           $output['message'] ="This record not matched by Organization.";
           $output['status']  = "error";
        }
        
        $this->_ajax_output($output, TRUE);
            
    }
    
}
?>
