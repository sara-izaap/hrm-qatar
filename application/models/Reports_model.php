<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('App_model.php');

class Reports_model extends App_model {
    
    
    function __construct()
    {
        parent::__construct();

        $this->_table = 'timesheet';
    }
    
    function listing()
    {  
		
      $this->_fields = "a.*,d.name as organization";
      $this->db->from('employee a');        
      $this->db->join("timesheet b","b.emp_code=a.emp_code");
      $this->db->join("organization d","d.id=a.org_id");
     // $this->db->join("projects p","t.project=p.id",'left');
      $this->db->group_by('a.id');              
      foreach ($this->criteria as $key => $value) 
      {
        if( !is_array($value) && strcmp($value, '') === 0 )
            continue;

        switch ($key)
        {
            case 'organization':
                $this->db->where('a.org_id', $value);
            break; 
            case 'year':
                $this->db->where('YEAR(b.date)', $value);
            break;
            case 'month':
                $this->db->where('MONTH(b.date)', $value);
            break;   
            // case 'date_range':
            //     $splitdate  = explode("|",$value);
            //     $this->db->where( 't.date >=', date( 'Y-m-d', strtotime( $splitdate[0] ) )  );
            //     $this->db->where( 't.date <=', date( 'Y-m-d', strtotime( $splitdate[1] ) )  );
            // break;
            // case 'emplist':
            //     if(is_array($value))
            //         $this->db->where_in("t.emp_code",$value);
            //     else
            //         $this->db->where("t.emp_code",$value);
            // break;                 
             
       }
      }        
      return parent::listing();
    }

    public function get_salary($where)
    {
      $this->db->query("select sum(hours) as hours");
    }
}
?>