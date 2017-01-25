<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_Controller extends CI_Controller
{
    public $logged_in                  = FALSE;
    public $error_message              =    '';
    public $data                       =    array();
    public $role                       =    0;
    public $init_scripts               = array();
    public $criteria                   = array(); 
    
   
    public $settings   = array();
    public $interests  = array();
    public $options    = array();
    
    public function __construct()
    {
        parent::__construct(); 
        
    //print_r($this->session->userdata('user_data'));die;
        $this->role = get_user_role();			

        //if($this->uri->segment(1,'')
        $this->load->library("form_validation");

        $this->load->library("layout");
        
        $this->data['img_url']=$this->layout->get_img_dir();  

        $this->_init_layout();     

    }

    protected function _init_layout()
    {
        
        $this->layout->initialize($this->config->item('default', 'layout'));

        /*
        if(!is_logged_in())              
            redirect('login');   
                
        elseif(is_logged_in() && get_user_role())                
            redirect('organization');                 
                    
        */         
               
    }

    public function index()
    {
       
    }
    
    public function _ajax_output($data, $json_format = FALSE)
    {
        if(is_array($data) && $json_format)
            echo json_encode($data);
        else 
            echo $data;
        
        exit();
    }
    
  
}

?>
