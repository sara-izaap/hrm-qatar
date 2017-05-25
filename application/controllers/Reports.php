<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."libraries/Admin_controller.php");

class Reports extends Admin_Controller 
{
	
  function __construct()
  {
    parent::__construct();  
    if(!is_logged_in())
      redirect('login');
    $this->load->model('reports_model');
  }
  public function index()
  {
    redirect('reports/salary_report');
  }
  public function salary_report()
  {
  	$this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array('e.emp_name' => 'Name','e.emp_code' => 'Employee Code');
    $this->_narrow_search_conditions = array("organization","year","month");
    $str = '<a href="'.site_url('reports/view_salary/{id}').'" target="_blank" data-original-title="Edit" data-toggle="tooltip" data-placement="top" class="table-action" onclick="edit_timesheet(\'form\',\'{id}\');"><i class="fa fa-eye"></i> View</a>';
    // $this->listing->initialize(array('listing_action' => $str));
    $listing = $this->listing->get_listings('reports_model', 'listing');
    if($this->input->is_ajax_request())
    {
      $this->_ajax_output(array('listing' => $listing), TRUE);
    }
    $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
    $this->data['simple_search_fields'] = $this->simple_search_fields;
    $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
    $this->data['per_page'] = $this->listing->_get_per_page();
    $this->data['per_page_options']=array_combine($this->listing->_get_per_page_options(),$this->listing->_get_per_page_options());
    $this->data['search_bar'] = $this->load->view('frontend/reports/search_bar', $this->data, TRUE);
    $this->data['listing'] = $listing;
    $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);
  	$this->layout->view('frontend/reports/salary_report');
  }

  public function view_salary($emp_id='',$month='',$year='')
  {
    // $month = "03";
    $total_working_days = get_working_days($year,$month);
    $total_hours_in_month = $total_working_days * 8;
    $emp_code = get_employee_details($emp_id)['emp_code'];
    $total_hours = $this->reports_model->get_total_working_hours($emp_code,$month);
    $not = $this->reports_model->get_normal_ot($emp_id,$month);
    $fot = $this->reports_model->get_friday_ot($emp_id,$month);
    $total_working_hours = $total_hours - ($not + $fot);
    $basic_salary = get_employee_details($emp_id)['basic_salary'];
    $food_allowance = get_employee_details($emp_id)['food_allowance'];
    $hourly_rate = number_format(($basic_salary / $total_working_days) / 8,2);
    $salary = $total_working_hours * $hourly_rate;
    $this->data['not'] = $not;
    $this->data['fot'] = $fot;
    $this->data['worked_hours'] = $total_working_hours;
    $this->data['hourly_rate'] = $hourly_rate;
    $this->data['employee'] = get_employee_details($emp_id);
    $this->load->view('frontend/reports/view_salary',$this->data);
  }
 }
?>
