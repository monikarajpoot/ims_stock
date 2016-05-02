<?php 

class Payroll_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getemp_emi($emp_id)
    {

      $currentyear = date("Y");
      $this->db->select('*');
      $this->db->from('ft_pay_emi');
      $this->db->select_max("emi_no_installment");
      $this->db->join('ft_pay_emp_advance', 'ft_pay_emp_advance.pea_emp_unique_id = ft_pay_emi.emi_emp_unique_id');
      $this->db->where("emi_emp_unique_id",$emp_id);
      // $this->db->where("pay_month",$pay_month);
      // $this->db->where("pay_year",$currentyear);
       $query = $this->db->get();
     //echo $this->db->last_query();
   return $rows = $query->result();
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

public  function update_salary($data)
  {
     $this->db->where('pay_id', $data['pay_id']);
$this->db->update('ft_pay_register', $data); 
return true;
    
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
   public function salary_emp($cate_id,$m)
    {
        $this->db->select('*');
          $this->db->from('ft_pay_register');

       //  $this->db->join('ft_pay_bill_cate', 'ft_pay_bill_cate.pbill_cate_id = ft_pay_register.pay_salary_cate_id');
         $this->db->join('ft_employee', 'ft_employee.emp_unique_id = ft_pay_register.pay_emp_unique_id');
        $this->db->where("pay_salary_cate_id",$cate_id);
        $this->db->where("pay_month",$m);
        $query = $this->db->get();
// /echo $this->db->last_query();
        
        return $rows = $query->result();
    }
    
     function pay_diduction($f,$cate_id,$m)
    {

       $this->db->select('pay_emp_unique_id,emp_full_name_hi, pay_month ,'.$f);
          $this->db->from('ft_pay_register');

       //  $this->db->join('ft_pay_bill_cate', 'ft_pay_bill_cate.pbill_cate_id = ft_pay_register.pay_salary_cate_id');
         $this->db->join('ft_employee', 'ft_employee.emp_unique_id = ft_pay_register.pay_emp_unique_id');
        $this->db->where("pay_salary_cate_id",$cate_id);
        $this->db->where("pay_month",$m);
   
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
           $this->db->join('ft_employee', 'ft_employee.emp_unique_id =  ft_pay_register.pay_emp_unique_id');
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
function pay_bill($data)
{

        $this->db->select('*');
        $this->db->from('ft_pay_bill_cate');
         $this->db->where("pbill_month",$_POST['pay_month'] );
        $this->db->where("pbill_year",date("Y") );
        $this->db->where("pbill_cate_id",$_POST['pay_head']);
         $query = $this->db->get();
         $rows = $query->result();
       $pcount = count($rows);
       if($pcount == 0)
        {
          $this->db->insert("ft_pay_bill_cate" ,$data);
          return "yes";
      }else{return "no";}


}
function salary_bill()
{
$this->db->select('*');
        $this->db->from('ft_pay_bill_cate');
         $this->db->where("pbill_month",$_POST['pay_month'] );
        $this->db->where("pbill_year",date("Y") );
        $this->db->where("pbill_cate_id",$_POST['pay_head']);
         $query = $this->db->get();
         $rows = $query->result();
         return $rows;
}

function pay_bill_cate($cate ,$m)
{
        $this->db->select('*');
        $this->db->from('ft_pay_bill_cate');
        $this->db->where("pbill_month",$m );
        $this->db->where("pbill_year",date("Y") );
        $this->db->where("pbill_cate_id",$cate);
        $query = $this->db->get();
        $rows = $query->result();
         //echo $this->db->last_query();
         return $rows;
}

function salary_emp_mofification($emp_id,$emp_month){
//SELECT * FROM `ft_pay_register` Where `pay_emp_unique_id` = "171005898" and `pay_month` in ("March" , "April")
  $currentmoth = date("F");
  $query = $this->db->query('SELECT * FROM `ft_pay_register` JOIN ft_employee on ft_pay_register.pay_emp_unique_id = ft_employee.emp_unique_id where `pay_month` = "April"');
     
        return $query->result();
}

function pay_salary_master(){
//SELECT * FROM `ft_pay_register` Where `pay_emp_unique_id` = "171005898" and `pay_month` in ("March" , "April")
  $currentmoth = date("F");
  $query = $this->db->query('SELECT * FROM  ft_pay_emp_salary');
     
        return $query->result();
}
function add_arriyas()
{$year = date("Y") ;
  $maonth = date("F") ;

  if(isset($_POST['pay_gradepay'])){

    $pay_gradepay = $_POST['pay_gradepay'];

  }else{
$pay_gradepay = 0;

  }
    if(isset($_POST['pay_gradepay'])){

    $pay_gradepay = $_POST['pay_gradepay'];

  }else{
$pay_gradepay = 0;

  }
    if(isset($_POST['pay_ca'])){

    $pay_ca = $_POST['pay_ca'];

  }else{
$pay_ca = 0;

  }
    if(isset($_POST['pay_da'])){

    $pay_da = $_POST['pay_da'];

  }else{
$pay_da = 0;

  }

    if(isset($_POST['pay_hra'])){

    $pay_hra = $_POST['pay_hra'];

  }else{
$pay_hra = 0;

  }


    if(isset($_POST['pay_sa'])){

    $pay_sa = $_POST['pay_sa'];

  }else{
$pay_sa = 0;

  }

      if(isset($_POST['pay_madical'])){

    $pay_madical = $_POST['pay_madical'];

  }else{
$pay_madical = 0;

  }


        if(isset($_POST['pay_special'])){

    $pay_special = $_POST['pay_special'];

  }else{
$pay_special = 0;

  }
  if(isset($_POST['pay_sp'])){

    $pay_sp = $_POST['pay_sp'];

  }else{
$pay_sp = 0;

  }
        if(isset($_POST['pay_others'])){

    $pay_others = $_POST['pay_others'];

  }else{
$pay_others = 0;

  }
  $total = $pay_others  + $pay_gradepay +$pay_ca + $pay_da + $pay_hra + $pay_sa + $pay_sa + $pay_madical + $pay_special + $pay_sp ;
 $data = array(

  'pay_salary_cate_id' => $_POST['pay_salary_cate_id'],
  'pay_emp_unique_id' => $_POST['emp_unique_id'],
  'pay_month' => $maonth,
  'pay_year' =>$year,
  'pay_end_month' => $_POST['arriyas_end_month'],
  'pay_start_month' =>  $_POST['arriyas_start_month'],
  'pay_grp' =>  $pay_gradepay,
  'pay_ca' => $pay_ca,
  'pay_da' => $pay_da,
   'pay_hra' => $pay_hra,
    'pay_sa' =>$pay_sa,
     'pay_madical' => $pay_madical, 
     'pay_special' =>$pay_special ,
 'pay_sp' => $pay_sp,
 'pay_arriyas' =>1,
 'pay_others' => $pay_others,
 'pay_total_sum' => $total,
 'pay_total' => $total
 );
    
$this->db->insert('ft_pay_register', $data); 
return true;
}

}
?>