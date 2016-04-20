<?php 

class Payroll_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    public function getpayroll() {
       // $this->db->select('*');
        $query = $this->db->query('SELECT pay_id,pay_month,pay_total,emp_unique_id,emp_full_name_hi,emp_mobile_number,emp_email,pay_total,emp_house_no,emp_adhar_card_no FROM `ft_pay_register` join ft_employee on ft_pay_register.pay_emp_unique_id = ft_employee.emp_unique_id group by pay_emp_unique_id ORDER BY `ft_pay_register`.`pay_month` ');
     
        return $query->result();
    }
      function getEmployeeLeave() {
        $employee_leave = ft_pay_register;
        $employee = EMPLOYEES;
        $this->db->select($employee . '.emp_id,emp_unique_id,emp_mobile_number,emp_full_name,emp_email,emp_mobile_number,emp_full_name_hi,role_id');
        $this->db->from($employee);
        $this->db->where('role_id !=', 1);
        $this->db->join($employee_leave, $employee_leave . '.pay_emp_id=' . $employee . '.emp_unique_id');
        $this->db->order_by("designation_id", "ASC");
		$this->db->order_by("emp_full_name_hi", "ASC");
		$query = $this->db->get();
        //$this->db->last_query();
        return $rows = $query->result();
    }
    function salary_cate()
    {
    	$query = $this->db->get("ft_pay_salary_category");
        //$this->db->last_query();
        return $rows = $query->result();
    }

    public function getcate($emp_id)
  {
      $this->db->select('*');
      $this->db->from('ft_employee');
  //  $this->db->join('ft_employee', 'ft_employee.emp_unique_id = ft_pay_register.pay_emp_unique_id');
     $this->db->join('ft_pay_salary_category', 'ft_employee.emp_pay_cate_id = ft_pay_salary_category.pay_cate_id');
    $this->db->where("emp_unique_id",$emp_id);
    $query = $this->db->get();
//echo $this->db->last_query();
    
        return $rows = $query->result();
  }
  public  function getpay($emp_id)
	{
		  $this->db->select('*');
		  $this->db->from('ft_pay_register');
    $this->db->join('ft_employee', 'ft_employee.emp_unique_id = ft_pay_register.pay_emp_unique_id');
    // $this->db->join('ft_pay_salary_category', 'ft_employee.emp_pay_cate_id = ft_pay_salary_category.pay_cate_id');
 		$this->db->where("pay_emp_unique_id",$emp_id);
		$query = $this->db->get();
//ho $this->db->last_query();
	   return $rows = $query->result();
	}

  public  function getpaymonth($emp_id,$pay_month)
  {
    $currentyear = date("Y");
      $this->db->select('*');
      $this->db->from('ft_pay_register');
    $this->db->join('ft_employee', 'ft_employee.emp_unique_id = ft_pay_register.pay_emp_unique_id');
    $this->db->where("pay_emp_unique_id",$emp_id);
    $this->db->where("pay_month",$pay_month);
    $this->db->where("pay_year",$currentyear);
    $query = $this->db->get();
//echo $this->db->last_query();
   return $rows = $query->result();
  }





  public function emp_bank($emp_id)
	{
		$this->db->select('*');
		  $this->db->from('ft_emp_service_record');

         $this->db->join('ft_employee', 'ft_employee.emp_unique_id = ft_emp_service_record.emp_uid');
         $this->db->join('ft_employee_details', 'ft_employee_details.uid = ft_emp_service_record.emp_uid');
		$this->db->where("emp_uid",$emp_id);
		$query = $this->db->get();
//echo $this->db->last_query();
		
        return $rows = $query->result();
	}

  public function getemp($emp_id)
	{
		$this->db->select('*');
		  $this->db->from('ft_employee');

      // $this->db->join('ft_employee', 'ft_employee.emp_unique_id = ft_emp_service_record.emp_uid');
		$this->db->where("emp_unique_id",$emp_id);
		$query = $this->db->get();
//echo $this->db->last_query();
		
        return $rows = $query->result();
	}
  public function getpayroll_emp()
	{
		$this->db->select('*');
		  $this->db->from('ft_pay_emmp_bank');

    $this->db->join('ft_employee', 'ft_employee.emp_unique_id = ft_pay_emmp_bank.pay_emp_unique_id');
		$this->db->where("pay_emp_unique_id",$emp_id);
		$query = $this->db->get();
//echo $this->db->last_query();
		
        return $rows = $query->result();
	}

  public function salary_mastar()
    {

          $this->db->select('*');
          $this->db->from('ft_pay_salary_category');
          $query = $this->db->get();
//echo $this->db->last_query();
        
        return $rows = $query->result();
    }
   public function salary_emp($cate_id)
    {
        $this->db->select('pay_emp_unique_id,emp_full_name_hi,pay_basic,pay_grp,pay_ca,pay_da,pay_hra,pay_sa,pay_madical,pay_special,pay_sp,pay_total_sum,pay_dpf,pay_dpf_adv,pay_gpf,pay_gpf_adv,pay_defined_contribution,pay_gias,pay_house_loan,pay_house_rent,pay_car_loan,pay_fuel_charge,pay_grain_adv,pay_festival_adv,pay_professional_tax,pay_income_tax,pay_other_adv,pay_total_cut,pay_total');
          $this->db->from('ft_employee');

        // $this->db->join('ft_employee', 'ft_employee.emp_pay_cate_id = ft_pay_salary_category.pay_cate_id');
         $this->db->join('ft_pay_register', 'ft_employee.emp_unique_id =  ft_pay_register.pay_emp_unique_id');
        $this->db->where("emp_pay_cate_id",$cate_id);
        $query = $this->db->get();
//echo $this->db->last_query();
        
        return $rows = $query->result();
    }
   public function cate_salary($cate_id)
    {
          $this->db->select('*');
          $this->db->from('ft_pay_salary_category');
           $this->db->where("pay_cate_id",$cate_id);
          $query = $this->db->get();
            
        
        return $rows = $query->result();


    }
	public function emp_uid($emp_id)
	{
		     $this->db->select('*');
          $this->db->from('ft_employee');
		$this->db->like('emp_unique_id', $emp_id); 
		 $query = $this->db->get();
            
        
        return $rows = $query->result();
	}
	public function advance()
	{
		     $this->db->select('*');
          $this->db->from('ft_pay_advance_master');
		
		 $query = $this->db->get();
            
        
        return $rows = $query->result();
	}
  public function getempdetails($id = "")
  {
      $this->db->select('*');
          $this->db->from('ft_employee');
      if($id != ""){
       $this->db->where("emp_unique_id",$id);
      }
     $query = $this->db->get();
            
        
        return $rows = $query->result();

  }

public function house_type($id = "")
  {
      $this->db->select('*');
          $this->db->from('pay_house_rent_master');
      if($id != ""){
       $this->db->where("ph_id",$id);
      }
     $query = $this->db->get();
            
        
        return $rows = $query->result();

  }

  function pay_slip()
  {

    $this->db->select('*');
          $this->db->from('ft_pay_register');
      $this->db->where("pay_year",$_POST['pay_year']);
       $this->db->where("pay_emp_unique_id",$_POST['uid']);
     $this->db->where("pay_month",$_POST['pay_month']);
     $query = $this->db->get();
            
        
        return $rows = $query->result();


  }
  function add_deatils()
  {

    
    $id =$_POST['emp_unique_id'];

    $data = array(
               'emp_house_no' => $_POST['emp_house_no'],
               'emp_house_type' =>  $_POST['emp_house_type'],
               'emp_pen_no' =>$_POST['emp_pen_no'],
               'emp_adhar_card_no' => $_POST['emp_adhar_card_no'],
            );

$this->db->where('emp_unique_id', $id);
$this->db->update('ft_employee', $data); 
  }

}
?>