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
  public function getempgpf($id = "")
  {
      $this->db->select('*');
          $this->db->from('ft_emp_service_record');
      if($id != ""){
       $this->db->where("emp_uid",$id);
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
               'emp_gpf_dpf_code' => $_POST['gpf_dpf_code'],

            );

$this->db->where('emp_unique_id', $id);
$this->db->update('ft_employee', $data); 
  }
function pay_bill()
{
		  if($_POST['pay_type'] == 0) 
			{
			  $query = $this->db->query("SELECT sum(pay_total_sum) as payts,sum(pay_total) pay_total FROM `ft_pay_register` where  pay_month ='".$_POST['pay_month']."' AND pay_salary_cate_id =".$_POST['pay_head']);
		  $rowid = $query->result();
			  foreach ($rowid as $key => $value) {
				   		$pts =$value->payts;
				$pt =$value->pay_total;
				$head = $_POST['pay_head'];
				$buget = $_POST['buget'];
				$common=0;
			  }
			}else{
			 $query = $this->db->query("SELECT pay_total_sum as payts,pay_total pay_total FROM `ft_pay_register` where  pay_month ='".$_POST['pay_month']."' AND pay_emp_unique_id =".$_POST['emp_uinq']);
		  $rowid = $query->result();
		  foreach ($rowid as $key => $value) {
				   		$pts =$value->payts;
				$pt =$value->pay_total;
				$common=1;
				$head = 0;
				$buget =0;
			  }
			}

	   $data = array('pbill_month' => $_POST['pay_month'] ,
					'pbill_cate_id' =>  $head ,
					'pbill_bugetno' =>  $buget,
					'pbill_emp_code' =>inputcheckvaul('emp_uinq'),
					'pbill_computer_date' =>  date("Y-m-d",strtotime($_POST['computer_bill_date'])) ,
					'pbill_type' => $_POST['pay_type'] ,
					'pbill_year' => date("Y") ,
					'pbill_gross_amount' => $pts ,
					'pbill_net_amont' => $pt ,
					'pbill_computer_no' => $_POST['computer_bill_number'] ,
				  'pbill_office_no' => $_POST['office_bill_number'] ,
				   'pbill_vocher_no' => $_POST['vocher_bill_number'] ,
				  'pbill_vocher_date' => date("Y-m-d", strtotime($_POST['vocher_bill_date'])) ,
				   );
	  if(count($rowid) != 0){
      

                $this->db->insert("ft_pay_bill_cate" ,$data);
                return "yes";
         
    }else{

       return "no";
    }


}
function pay_bill_all()
{
$this->db->select('*');
        $this->db->from('ft_pay_bill_cate');
         $this->db->where("pbill_month",$_POST['pay_month'] );
        $this->db->where("pbill_year",date("Y") );
        $this->db->where("pbill_cate_id",inputcheckvaul('pay_head'));
         $query = $this->db->get();
         $rows = $query->result();
       $pcount = count($rows);


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
{

  $year = date("Y") ;
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
		'pay_arriyas_year' =>  $_POST['arriyas_year'],
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
function add_allsallary()
{
  

 $query = $this->db->query('SELECT * FROM `ft_pay_emp_salary`  ');
  $rowid = $query->result();
  //where  pay_emp_unique_id = 51010886
 // pre($rowid);


  
      foreach ($rowid  as $key => $pay) {

  $query12 = $this->db->query('SELECT * FROM `ft_pay_salary_master` where salary_da_apply_month = "'.$_POST['pay_month'].'"  and  salary_cate_id ="'.$pay->pay_salary_cate_id.'" and salary_da_apply_year="'.$_POST['pay_year'].'"');
  $rowid12 = $query12->result();

if(count($rowid12) != 0){
  foreach ($rowid12 as $key => $value1) {
    # code...
      $nn = $pay->pay_basic + $pay->pay_grp;
      $da = ($nn *  $value1->salary_da)/100;

       $ts =$pay->pay_basic + $pay->pay_grp + $da + $pay->pay_special + $pay->pay_hra +
       $pay->pay_sa + $pay->pay_madical +$pay->pay_others + $pay->pay_special+ $pay->pay_ca +  $pay->pay_sp;

       $tc =  $pay->pay_dpf + $pay->pay_dpf_adv + $pay->pay_gpf + $pay->pay_gpf_adv + $pay->pay_gias + $pay->pay_defined_contribution + $pay->pay_fuel_charge + $pay->pay_income_tax+
       $pay->pay_professional_tax + $pay->pay_fuel_charge +$pay->pay_grain_adv  +$pay->pay_festival_adv + $pay->pay_house_rent + $pay->pay_other_adv + $pay->pay_house_loan + $pay->pay_car_loan ; 

         $tt = $ts - $tc;
  }

}else{
    $da =  $pay->pay_da ;
    $ts =$pay->pay_basic + $pay->pay_grp + $da + $pay->pay_special + $pay->pay_hra +
       $pay->pay_sa + $pay->pay_madical +$pay->pay_others + $pay->pay_special+ $pay->pay_ca +  $pay->pay_sp;

       $tc =  $pay->pay_dpf + $pay->pay_dpf_adv + $pay->pay_gpf + $pay->pay_gpf_adv + $pay->pay_gias + $pay->pay_defined_contribution + $pay->pay_fuel_charge + $pay->pay_income_tax+
       $pay->pay_professional_tax + $pay->pay_fuel_charge +$pay->pay_grain_adv  +$pay->pay_festival_adv + $pay->pay_house_rent + $pay->pay_other_adv + $pay->pay_house_loan + $pay->pay_car_loan ; 

         $tt = $ts - $tc;

}

           $currentmonth = $_POST['pay_month']; 
              $datapay = array(
                'pay_salary_cate_id' => $pay->pay_salary_cate_id,
                'pay_month' => $currentmonth ,
                'pay_year' =>  $_POST['pay_year'] ,
                'pay_emp_unique_id' => $pay->pay_emp_unique_id ,
                'pay_basic' => $pay->pay_basic ,
              'pay_grp' => $pay->pay_grp ,
              'pay_da' => $da,
              'pay_special' =>$pay->pay_special ,
              'pay_hra' =>$pay->pay_hra ,
              'pay_sa' => $pay->pay_sa ,
              'pay_madical' => $pay->pay_madical ,
              'pay_ca' =>  $pay->pay_ca,
              'pay_sp' =>  $pay->pay_sp,
              'pay_others' =>  $pay->pay_others ,
               'pay_ca' => $pay->pay_ca,
              'pay_sp' => $pay->pay_sp ,
               'pay_total_sum' =>  $ts,
               'pay_dpf' =>  $pay->pay_dpf ,
                'pay_dpf_adv' =>  $pay->pay_dpf_adv,
               'pay_gpf' =>  $pay->pay_gpf ,
               'pay_gpf_adv' =>  $pay->pay_gpf_adv,
              'pay_gias' => $pay->pay_gias ,
              'pay_defined_contribution' => $pay->pay_defined_contribution ,
              'pay_fuel_charge' => $pay->pay_fuel_charge ,
              'pay_professional_tax' => $pay->pay_professional_tax ,
              'pay_income_tax' => $pay->pay_income_tax ,
               'pay_grain_adv' => $pay->pay_grain_adv ,
              'pay_festival_adv' => $pay->pay_festival_adv ,
               'pay_other_adv' => $pay->pay_other_adv,
              'pay_house_loan' => $pay->pay_house_loan,
              'pay_car_loan' => $pay->pay_car_loan,
              'pay_house_rent' => $pay->pay_house_rent,
              'pay_total_cut' => $tc,
               'pay_total' => $tt,
                'created_by' => $this->session->userdata('user_id'),
               );
			 // pre($datapay);
		//  die();
			   
    $this->db->insert("ft_pay_register", $datapay);
     
    }
  }


  function checkmonthda()
  {$year = date("Y");
        $currentmonth = date("F");

       $query = $this->db->query('SELECT * FROM `ft_pay_emp_salary` join ft_pay_salary_master on ft_pay_salary_master.salary_cate_id = ft_pay_emp_salary.pay_salary_cate_id where ft_pay_salary_master.salary_da_apply_month = "'.$currentmonth.'" and ft_pay_salary_master.salary_da_apply_year = "'.$year.'" ');
         $rowid = $query->result();
  
        
  
      foreach ($rowid  as $key => $pay) {
          # code...
            $nn = $pay->pay_basic + $pay->pay_grp;
            $da = ($nn *  $pay->salary_da)/100;

             $ts =$pay->pay_basic + $pay->pay_grp + $da + $pay->pay_special + $pay->pay_hra +
             $pay->pay_sa + $pay->pay_madical +$pay->pay_others + $pay->pay_special+ $pay->pay_ca +  $pay->pay_sp;

             $tc =  $pay->pay_dpf + $pay->pay_dpf_adv + $pay->pay_gpf + $pay->pay_gpf_adv + $pay->pay_gias + $pay->pay_defined_contribution + $pay->pay_fuel_charge + $pay->pay_income_tax+
             $pay->pay_professional_tax + $pay->pay_fuel_charge +$pay->pay_grain_adv  +$pay->pay_festival_adv + $pay->pay_house_rent + $pay->pay_other_adv + $pay->pay_house_loan + $pay->pay_car_loan ; 

               $tt = $ts - $tc;
   
              $datapay = array(
                'pay_salary_cate_id' => $pay->pay_salary_cate_id,
                'pay_emp_unique_id' => $pay->pay_emp_unique_id ,
                'pay_basic' => $pay->pay_basic ,
              'pay_grp' => $pay->pay_grp ,
              'pay_da' =>  $pay->pay_da ,
              'pay_special' =>$pay->pay_special ,
              'pay_hra' =>$pay->pay_hra ,
              'pay_sa' => $pay->pay_sa ,
              'pay_madical' => $pay->pay_madical ,
              'pay_ca' =>  $pay->pay_ca,
              'pay_sp' =>  $pay->pay_sp,
              'pay_others' =>  $pay->pay_others ,
               'pay_ca' => $pay->pay_ca,
              'pay_sp' => $pay->pay_sp ,
               'pay_total_sum' =>  $pay->pay_total_sum,
               'pay_dpf' =>  $pay->pay_dpf ,
                'pay_dpf_adv' =>  $pay->pay_dpf_adv,
               'pay_gpf' =>  $pay->pay_gpf ,
               'pay_gpf_adv' =>  $pay->pay_gpf_adv,
              'pay_gias' => $pay->pay_gias ,
              'pay_defined_contribution' => $pay->pay_defined_contribution ,
              'pay_fuel_charge' => $pay->pay_fuel_charge ,
              'pay_professional_tax' => $pay->pay_professional_tax ,
              'pay_income_tax' => $pay->pay_income_tax ,
               'pay_grain_adv' => $pay->pay_grain_adv ,
              'pay_festival_adv' => $pay->pay_festival_adv ,
               'pay_other_adv' => $pay->pay_other_adv,
              'pay_house_loan' => $pay->pay_house_loan,
              'pay_car_loan' => $pay->pay_car_loan,
              'pay_house_rent' => $pay->pay_house_rent,
              'pay_total_cut' => $pay->pay_total_cut,
               'pay_total' => $pay->pay_total_cut,
                'created_by' => $pay->created_by,
               );
   
         
     $this->db->insert("ft_pay_log_emp_salary", $datapay);

      $datanew = array(
              
               
              'pay_da' => ceil($da),
             'pay_total_sum' =>  ceil($ts),
              'pay_total_cut' => ceil($tc),
               'pay_total' => ceil($tt),
                'updated_by' =>  $this->session->userdata('user_id'),
                'updated_at'=> date("Y-m-d h:i:s"),
               'no_updated'=> $pay->no_updated +1,
               'pay_remark' => "DA Chnages"

               );
      pre($datanew);
 $this->db->where("pay_id", $pay->pay_id);
      $this->db->update("ft_pay_emp_salary", $datanew);

     
    }
}
 function edit_salary($id)
  {

  $query = $this->db->query('SELECT * FROM `ft_pay_register` where  pay_id ='.$id);
  $rowid = $query->result();
  return $rowid ;
  }

    function month_salary_cate($id,$maonth)
  {

  $query = $this->db->query("SELECT * FROM `ft_pay_register` where  pay_month ='".$maonth."' and pay_year =".$id);
  $rowid = $query->result();
  return $rowid ;
  }
  function edit_slary_emp()
  {
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
          if(isset($_POST['pay_dpf'])){

        $pay_dpf = $_POST['pay_dpf'];

      }else{
    $pay_dpf = 0;

      }

if(isset($_POST['pay_gpf'])){

        $pay_gpf = $_POST['pay_gpf'];

      }else{
    $pay_gpf = 0;

      }
       if(isset($_POST['pay_dpf_adv'])){

        $pay_dpf_adv = $_POST['pay_dpf_adv'];

      }else{
    $pay_dpf_adv = 0;

      }
if(isset($_POST['pay_gpf_adv'])){

        $pay_gpf_adv = $_POST['pay_gpf_adv'];

      }else{
    $pay_gpf_adv = 0;

      }


if(isset($_POST['pay_gias'])){

        $pay_gias = $_POST['pay_gias'];

      }else{
    $pay_gias = 0;

      }

if(isset($_POST['pay_define'])){

        $pay_define = $_POST['pay_define'];

      }else{
    $pay_define = 0;

      }

if(isset($_POST['pay_fuel_charge'])){

        $pay_fuel_charge = $_POST['pay_fuel_charge'];

      }else{
    $pay_fuel_charge = 0;

      }
if(isset($_POST['pay_professional_tax'])){

        $pay_professional_tax = $_POST['pay_professional_tax'];

      }else{
    $pay_professional_tax = 0;

      }

if(isset($_POST['pay_income_tax'])){

        $pay_income_tax = $_POST['pay_income_tax'];

      }else{
    $pay_income_tax = 0;

      }


if(isset($_POST['pay_other_adv'])){

        $pay_other_adv = $_POST['pay_other_adv'];

      }else{
    $pay_other_adv = 0;

      }

if(isset($_POST['pay_house_rent'])){

        $pay_house_rent = $_POST['pay_house_rent'];

      }else{
    $pay_house_rent = 0;

      }


 


        $datapay = array(
                'pay_salary_cate_id' => $_POST['pay_salary_cate_id'],
               'pay_basic' => $_POST['pay_basic'] ,
              'pay_grp' =>$pay_gradepay,
              'pay_da' => $pay_da,
              'pay_special' =>$pay_special ,
              'pay_hra' =>$pay_hra,
              'pay_sa' => $pay_sa,
              'pay_madical' =>$pay_madical,
              'pay_ca' =>  $pay_ca,
              'pay_sp' =>  $pay_sp,
              'pay_others' => $pay_others ,
               'pay_ca' => $pay_ca ,
              'pay_sp' => $pay_sp ,
               'pay_total_sum' =>  $_POST['pay_total_sum'],
               'pay_dpf' =>  $pay_dpf ,
                'pay_dpf_adv' => $pay_dpf_adv,
               'pay_gpf' =>  $pay_gpf ,
               'pay_gpf' => $pay_gpf_adv,
              'pay_gias' => $pay_gias ,
              'pay_defined_contribution' => $pay_define ,
              'pay_fuel_charge' => $pay_fuel_charge ,
              'pay_professional_tax' => $pay_professional_tax ,
              'pay_income_tax' =>$pay_income_tax ,
             //  'pay_grain_adv' => $_POST['pay_grain_adv'] ,
             // 'pay_festival_adv' =>$_POST['pay_festival_adv'] ,
               'pay_other_adv' => $pay_other_adv,
    //  'pay_house_loan' => $_POST['pay_house_loan'],
   //   'pay_car_loan' => $_POST['pay_car_loan'],
      'pay_house_rent' => $pay_house_rent,
      'pay_total_cut' => $_POST['pay_total_cut'],
       'pay_total' => $_POST['pay_total'],
        'updated_by' => $this->session->userdata('user_id'),
        'updated_at' =>date("Y-m-d H:i:s"),
        'no_updated'=>$_POST['no_updated']
               );
   $this->db->where("pay_id",$_POST['pay_id']);
      $this->db->update("ft_pay_register", $datapay);

   //   echo $this->db->last_query();

  }
  function edit_slary_emp1()
  {

 
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
          if(isset($_POST['pay_dpf'])){

        $pay_dpf = $_POST['pay_dpf'];

      }else{
    $pay_dpf = 0;

      }

if(isset($_POST['pay_gpf'])){

        $pay_gpf = $_POST['pay_gpf'];

      }else{
    $pay_gpf = 0;

      }
       if(isset($_POST['pay_dpf_adv'])){

        $pay_dpf_adv = $_POST['pay_dpf_adv'];

      }else{
    $pay_dpf_adv = 0;

      }
if(isset($_POST['pay_gpf_adv'])){

        $pay_gpf_adv = $_POST['pay_gpf_adv'];

      }else{
    $pay_gpf_adv = 0;

      }


if(isset($_POST['pay_gias'])){

        $pay_gias = $_POST['pay_gias'];

      }else{
    $pay_gias = 0;

      }

if(isset($_POST['pay_define'])){

        $pay_define = $_POST['pay_define'];

      }else{
    $pay_define = 0;

      }

if(isset($_POST['pay_fuel_charge'])){

        $pay_fuel_charge = $_POST['pay_fuel_charge'];

      }else{
    $pay_fuel_charge = 0;

      }
if(isset($_POST['pay_professional_tax'])){

        $pay_professional_tax = $_POST['pay_professional_tax'];

      }else{
    $pay_professional_tax = 0;

      }

if(isset($_POST['pay_income_tax'])){

        $pay_income_tax = $_POST['pay_income_tax'];

      }else{
    $pay_income_tax = 0;

      }


if(isset($_POST['pay_other_adv'])){

        $pay_other_adv = $_POST['pay_other_adv'];

      }else{
    $pay_other_adv = 0;

      }

if(isset($_POST['pay_house_rent'])){

        $pay_house_rent = $_POST['pay_house_rent'];

      }else{
    $pay_house_rent = 0;

      }


$query1 = $this->db->query("SELECT * FROM `ft_pay_salary_master` where  salary_cate_id =".inputcheckvaul('pay_salary_cate_id'));
  $rowid = $query1->result();
     

      $ts = $_POST['pay_basic'] + inputcheckvaul('pay_grp') + $pay_da + $pay_special + $pay_hra +
       $pay_sa + $pay_madical + $pay_others + $pay_special+ $pay_ca +  $pay_sp;

       $tc =  $pay_dpf + $pay_dpf_adv + $pay_gpf + $pay_gpf_adv + $pay_gias + $pay_define + $pay_fuel_charge + $pay_income_tax+
       $pay_professional_tax + $pay_fuel_charge +inputcheckvaul('pay_grain_adv')  +inputcheckvaul('pay_festival_adv') + $pay_house_rent +
         $pay_other_adv + inputcheckvaul('pay_house_loan') +inputcheckvaul('pay_car_loan') ; 

         $tt = $ts - $tc;

         $dab = (inputcheckvaul('pay_basic') + $pay_gradepay );
        
         $da  = ($dab *  $rowid[0]->salary_da)/100;
      //   echo $_POST['pay_id']."test";
        // die();

        $datapay = array(
                'pay_salary_cate_id' =>inputcheckvaul('pay_salary_cate_id'),
                'pay_remark'=> inputcheckvaul('remark'),
               'pay_basic' => inputcheckvaul('pay_basic'),
              'pay_grp' =>inputcheckvaul('pay_grp'),
              'pay_da' => ceil($da),
              'pay_special' =>$pay_special ,
              'pay_hra' =>$pay_hra,
              'pay_sa' => $pay_sa,
              'pay_madical' =>$pay_madical,
              'pay_special' =>  $pay_special,
              'pay_others' => $pay_others ,
               'pay_ca' => $pay_ca ,
              'pay_sp' => $pay_sp ,
               'pay_total_sum' =>  $ts,
               'pay_dpf' =>  $pay_dpf ,
                'pay_dpf_adv' => $pay_dpf_adv,
               'pay_gpf' =>  $pay_gpf ,
               'pay_gpf' => $pay_gpf_adv,
              'pay_gias' => $pay_gias ,
              'pay_defined_contribution' => $pay_define ,
              'pay_fuel_charge' => $pay_fuel_charge ,
              'pay_professional_tax' => $pay_professional_tax ,
              'pay_income_tax' =>$pay_income_tax ,
               'pay_grain_adv' => inputcheckvaul('pay_grain_adv'),
              'pay_festival_adv' =>inputcheckvaul('pay_festival_adv') ,
               'pay_other_adv' => $pay_other_adv,
      'pay_house_loan' => inputcheckvaul('pay_house_loan') ,
     'pay_car_loan' =>inputcheckvaul('pay_car_loan') ,
      'pay_house_rent' => $pay_house_rent,
      'pay_total_cut' => $tc,
       'pay_total' => $tt,
        'updated_by' => $this->session->userdata('user_id'),
        'updated_at' =>date("Y-m-d H:i:s"),
        'no_updated'=>$_POST['no_updated']
               );
   $this->db->where("pay_id",$_POST['pay_id']);
      $this->db->update("ft_pay_register", $datapay);

    //  echo $this->db->last_query();

  }
function edithead($id,$tablename)
{


  $query = $this->db->query('SELECT * FROM `'.$tablename.'` where '.$id);
  $rowid = $query->result();
  return $rowid ;
}
function edit_head()
{
 
    $data =array('pay_cate_name'=> inputcheckvaul('pay_cate_name'), 
      'pay_cate_basic'=> inputcheckvaul('pay_cate_basic'), 
      'pay_cate_da'=>  inputcheckvaul('pay_cate_da'), 
      'pay_cate_special'=> inputcheckvaul('pay_cate_da'), 
      'pay_cate_sa'=> inputcheckvaul('pay_cate_sa'),
      'pay_cate_madical'=> inputcheckvaul('pay_cate_madical'),
      'pay_cate_grp'=> inputcheckvaul('pay_cate_grp'),
      'pay_cate_ca'=> inputcheckvaul('pay_cate_ca'),
      'pay_cate_hra'=> inputcheckvaul('pay_cate_hra'),
      'pay_cate_other_add'=> inputcheckvaul('pay_cate_other_add'),
      'pay_cate_special'=> inputcheckvaul('pay_cate_special'),
      'pay_cate_sp'=> inputcheckvaul('pay_cate_sp'),
      'pay_cate_dpf'=> inputcheckvaul('pay_cate_dpf'),
      'pay_cate_dpf_adv'=> inputcheckvaul('pay_cate_dpf_adv'),
      'pay_cate_gpf'=> inputcheckvaul('pay_cate_gpf'),
      'pay_cate_gpf_adv'=> inputcheckvaul('pay_cate_gpf_adv'),
      'pay_cate_defined_contribution'=> inputcheckvaul('pay_cate_defined_contribution'),
      'pay_cate_gias'=> inputcheckvaul('pay_cate_gias'),
      'pay_cate_house_loan'=> inputcheckvaul('pay_cate_house_loan'),
      'pay_cate_car_loan'=> inputcheckvaul('pay_cate_car_loan'),
      'pay_cate_house_rent'=> inputcheckvaul('pay_cate_house_rent'),
      'pay_cate_fuel_charge'=> inputcheckvaul('pay_cate_fuel_charge'),
      'pay_cate_garain_adv'=> inputcheckvaul('pay_cate_garain_adv'),
      'pay_cate_festival_adv'=> inputcheckvaul('pay_cate_festival_adv'),
      'pay_cate_professional_tax'=> inputcheckvaul('pay_cate_professional_tax'),
      'pay_cate_income_tax'=> inputcheckvaul('pay_cate_income_tax'),
       'pay_cate_other_adv'=> inputcheckvaul('pay_cate_other_adv'), 

              );
//print_r($data);die();
   $this->db->where("pay_cate_id",$_POST['pay_cate_id']);
      $this->db->update("ft_pay_salary_category", $data);
}

function salary_fixstion()
{


  $query = $this->db->query('SELECT * FROM `ft_pay_fixation` ');
  $rowid = $query->result();
  return $rowid ;
}
function add_fixstion()
{

  $data =array('pf_cate_id'=>$_POST['pf_cate_id'] ,
   'pf_name'=>$_POST['pf_name'] ,
    'pf_discription'=>$_POST['pf_discription'], 
    'pf_type'=>$_POST['pf_type'],
     'pf_parcentage_val'=>$_POST['pf_parcentage_val'],
     'pf_range'=>$_POST['pf_range'],
     'created_by'=>$this->session->userdata('user_id') );
  
  $this->db->insert("ft_pay_fixation", $data);
      return true ;

}
     
function edit_fixstion()
{

  $data =array('pf_cate_id'=>$_POST['pf_cate_id'] ,
   'pf_name'=>$_POST['pf_name'] ,
    'pf_discription'=>$_POST['pf_discription'], 
    'pf_type'=>$_POST['pf_type'],
     'pf_parcentage_val'=>$_POST['pf_parcentage_val'],
     'pf_range'=>$_POST['pf_range'],
     'created_by'=>$this->session->userdata('user_id') );
   
    $this->db->where("pf_id",$_POST['pf_id']);
      $this->db->update("ft_pay_fixation", $data);
 
      return true ;

}
  function salarymster($cate)
  {
     $query = $this->db->query('SELECT salary_da FROM `ft_pay_salary_master` where salary_cate_id ='.$cate);

  $rowid = $query->result();
  return $rowid ;
  }
   function allsalarymster()
  {
     $query = $this->db->query('SELECT * FROM `ft_pay_emp_salary` ');
  $rowid = $query->result();

  return $rowid ;
  }
  function edit_salarymaster($file)
  {

    $query = $this->db->query('SELECT * FROM `ft_pay_emp_salary` where pay_id ='.$_POST["pay_id"]);
    $rowid = $query->result();

    foreach ($rowid as $key => $value) {
      # code...

      $dataold =array('pay_id' => $_POST['pay_id'],
        'pay_salary_cate_id'=> $value->pay_salary_cate_id,
          'pay_emp_unique_id'=> $value->pay_emp_unique_id,
          'pay_basic'=> $value->pay_basic,
            'pay_grp'=> $value->pay_grp,
          'pay_ca'=> $value->pay_ca,
          'pay_da'=> $value->pay_da,
           'pay_hra'=> $value->pay_hra,
           'pay_sa'=> $value->pay_sa,
           'pay_madical'=> $value->pay_madical,
           'pay_special'=> $value->pay_special,
           'pay_sp'=> $value->pay_sp,
            'pay_total_sum'=> $value->pay_total_sum,
            'pay_dpf'=> $value->pay_dpf,
            'pay_dpf_adv'=> $value->pay_dpf_adv,
            'pay_gpf'=> $value->pay_gpf,
            'pay_gpf_adv'=> $value->pay_gpf_adv,
            'pay_gias'=> $value->pay_gias,
            'pay_house_loan'=> $value->pay_house_loan,
            'pay_car_loan'=> $value->pay_car_loan,
            'pay_fuel_charge'=> $value->pay_fuel_charge,
            'pay_grain_adv'=> $value->pay_grain_adv,
            'pay_festival_adv'=> $value->pay_festival_adv,
            'pay_professional_tax'=> $value->pay_professional_tax,
            'pay_income_tax'=> $value->pay_income_tax,
            'pay_other_adv'=> $value->pay_other_adv,
            'pay_total_cut'=> $value->pay_total_cut,
            'pay_total'=> $value->pay_total,
            'pay_remark'=> $value->pay_remark,
            'created_at'=> date("Y-m-d H:i:s"),
            'created_by'=> $this->session->userdata('user_id') ,
            'updated_by'=> $value->updated_by,
            'updated_at'=> $value->updated_at,
           'no_updated'=> $value->no_updated,
       );
       
         $this->db->insert("ft_pay_log_emp_salary", $dataold);


   $query1 = $this->db->query('SELECT * FROM `ft_pay_fixation` where pf_id ='.$_POST["pf_icr"]);
    $rowid1 = $query1->result();

     $query22 = $this->db->query('SELECT * FROM `ft_pay_salary_master` where salary_cate_id ='.$value->pay_salary_cate_id);
    $rowid12 = $query22->result();

  foreach ($rowid1 as $key => $value1) {
    # code...
    if($value1->pf_type == 0)
        {
          $basic = ($value->pay_basic + $value->pay_grp );
          $par_val = "0.0".$value1->pf_parcentage_val;

         $newbasic = ( $par_val * $basic) + $value->pay_basic ;
         $da = ceil(($basic * $rowid12[0]->salary_da) / 100) ;
         $nbasic = ceil($newbasic / 10) * 10;
        $total_sum =  $nbasic  + $value->pay_grp + $value->pay_ca+ $da+ $value->pay_hra+ $value->pay_sa+ $value->pay_madical+ $value->pay_special+ $value->pay_others+ $value->pay_sp;
        $total = $total_sum - $value->pay_total_cut;
        }else{
		if($value->pay_basic>= 58930)
			{
			 $basic =$value->pay_basic + 1280;
			}elseif($value->pay_basic >= 67210){
			$basic =$value->pay_basic + 1380;
			}elseif($value->pay_basic >= 70290){
			 $basic =$value->pay_basics + 1540;
			}
			
			$nbasic = ceil($basic / 10) * 10;
			 $da = ceil(($basic * $rowid12[0]->salary_da) / 100) ;
			  $data_salary =$nbasic."|".$da."|".$data['pay_fixation'][0]->pf_name;
			 $total_sum =  $nbasic  + $value->pay_grp + $value->pay_ca+ $da+ $value->pay_hra+ $value->pay_sa+ $value->pay_madical+ $value->pay_special+ $value->pay_others+ $value->pay_sp;
        $total = $total_sum - $value->pay_total_cut;
		}

        $datanew =array(
        
          'pay_basic'=> $nbasic ,
          'pay_da'=> $da,
           'pay_total_sum'=> $value->pay_total_sum,
            'pay_total'=> $value->pay_total,
            'pay_remark'=> $_POST['description'],
            'file_name'=> $file,
            'updated_by'=>  $this->session->userdata('user_id'),

            'updated_at'=> date("Y-m-d H:i:s"),
           'no_updated'=> $value->no_updated + 1,
       );
         $this->db->where("pay_id",$_POST['pay_id']);
      $this->db->update("ft_pay_emp_salary", $datanew);
  } 

  $datafixs =array(
        
          'pef_cate_id'=> $value->pay_salary_cate_id,
          'pef_emp_unique_id'=> $value->pay_emp_unique_id,
           'pef_remark'=> $_POST['description'],
            'pef_order_no'=> $_POST['order_no'],
            'pef_order_date'=> date("Y-m-d",strtotime($_POST['order_date'])),
            'pef_order_applicable_month'=> $_POST['pay_month'],
            'pef_order_applicable_date'=>date("Y-m-d",strtotime($_POST["order_date1"])),
           'created_by'=>  $this->session->userdata('user_id'),
       );
        $this->db->insert("ft_pay_emp_fixation", $datafixs);
    
    }

  }
  function autoincremrnt()
  {
    $currentmonth = date("F");

      $query = $this->db->query('SELECT * ,`ft_pay_emp_salary`.pay_id  pid FROM `ft_pay_emp_salary` join ft_employee on `ft_pay_emp_salary`.`pay_emp_unique_id` = ft_employee.emp_unique_id   join ft_pay_salary_master on ft_pay_salary_master.salary_cate_id = ft_pay_emp_salary.pay_salary_cate_id  join ft_pay_increment_month on `ft_pay_emp_salary`.`pay_emp_unique_id` = `ft_pay_increment_month`.`pay_emp_unique_id` where pay_month = "'.$currentmonth.'" ');    $rowid = $query->result();

 //echo $this->db->last_query();

     foreach ($rowid as $key => $value) {
      # code...
      if( $value->pay_incr_year != date("Y") )
      {
        $dataold =array('pay_id' => $value->pay_id,
        'pay_salary_cate_id'=> $value->pay_salary_cate_id,
          'pay_emp_unique_id'=> $value->pay_emp_unique_id,
          'pay_basic'=> $value->pay_basic,
          'pay_grp'=> $value->pay_grp,
          'pay_incr_year'=> $value->pay_incr_year,
          'pay_ca'=> $value->pay_ca,
          'pay_da'=> $value->pay_da,
           'pay_hra'=> $value->pay_hra,
           'pay_sa'=> $value->pay_sa,
           'pay_madical'=> $value->pay_madical,
           'pay_special'=> $value->pay_special,
           'pay_sp'=> $value->pay_sp,
            'pay_total_sum'=> $value->pay_total_sum,
            'pay_dpf'=> $value->pay_dpf,
            'pay_dpf_adv'=> $value->pay_dpf_adv,
            'pay_gpf'=> $value->pay_gpf,
            'pay_gpf_adv'=> $value->pay_gpf_adv,
            'pay_gias'=> $value->pay_gias,
            'pay_house_loan'=> $value->pay_house_loan,
            'pay_car_loan'=> $value->pay_car_loan,
            'pay_fuel_charge'=> $value->pay_fuel_charge,
            'pay_grain_adv'=> $value->pay_grain_adv,
            'pay_festival_adv'=> $value->pay_festival_adv,
            'pay_professional_tax'=> $value->pay_professional_tax,
            'pay_income_tax'=> $value->pay_income_tax,
            'pay_other_adv'=> $value->pay_other_adv,
            'pay_total_cut'=> $value->pay_total_cut,
            'pay_total'=> $value->pay_total,
            'pay_remark'=> $value->pay_remark,
            'created_at'=> date("Y-m-d H:i:s"),
            'created_by'=> $this->session->userdata('user_id') ,
            'updated_by'=> $value->updated_by,
            'updated_at'=> $value->updated_at,
           'no_updated'=> $value->no_updated,
       );
       
         $this->db->insert("ft_pay_log_emp_salary", $dataold);


  
         if($value->pay_incr_type != 1)
         {
              $basic = ($value->pay_basic + $value->pay_grp );
              $par_val = "0.0".$value->pay_incr_amount ;
              $newbasic = ( $par_val * $basic) + $value->pay_basic ;
              $da = ceil(($basic * $value->salary_da) / 100) ;
               $nbasic = ceil($newbasic / 10) * 10;
               $total_sum =  $newbasic  + $value->pay_grp + $value->pay_ca+ $da+ $value->pay_hra+ $value->pay_sa+ $value->pay_madical+ $value->pay_special+ $value->pay_others+ $value->pay_sp;
               $total = $total_sum - $value->pay_total_cut;
       }else{


         $basic = $value->pay_basic +  $value->pay_incr_amount;
          
          $nbasic = ceil($basic / 10) * 10;
            $da = ceil(($basic * $value->salary_da) / 100) ;
          
          $total_sum =  $basic  + $value->pay_grp + $value->pay_ca+ $da+ $value->pay_hra+ $value->pay_sa+ $value->pay_madical+ $value->pay_special+ $value->pay_others+ $value->pay_sp;
           $total = $total_sum - $value->pay_total_cut;


       }

        $datanew =array(
          'pay_basic'=> $basic ,
          'pay_da'=> $da,
           'pay_total_sum'=> $total_sum,
            'pay_incr_year'=> date("Y"),
            'pay_total'=> $total,
            'pay_remark'=> "Yearly incrment",
            'updated_by'=>  $this->session->userdata('user_id'),
            'updated_at'=> date("Y-m-d H:i:s"),
           'no_updated'=> $value->no_updated + 1,
       );
      $this->db->where("pay_id",$value->pid);
     $this->db->update("ft_pay_emp_salary", $datanew);
   } }
     return $rowid ;
  } 

   

  function salary_mastaremp()
  {
  			     $query = $this->db->query('SELECT pay_emp_unique_id FROM `ft_pay_register` where pay_arriyas =1  GROUP by pay_emp_unique_id ');
  $rowid = $query->result();
  return $rowid ;
  }
  function getcate_al($id)
  {
  			     $query = $this->db->query('SELECT pay_cate_budget_no FROM `ft_pay_salary_category` where pay_cate_id ='.$id);
  $rowid = $query->result();
  return $rowid ;
  }
  function showda()
  {
 $query = $this->db->query('SELECT * FROM `ft_pay_salary_master` ');
  $rowid = $query->result();
  return $rowid ;

  }
  function getcate_pp($id)
  {
             $query = $this->db->query('SELECT salary_da,salary_id,no_updated FROM `ft_pay_salary_master` where salary_cate_id ='.$id);
  $rowid = $query->result();
  return $rowid ;
  }
  function update_da()
  { 

         $query = $this->db->query('SELECT * FROM `ft_pay_salary_master` where salary_id ='.$_POST['id']);
  $rowid = $query->result();

foreach ($rowid as $key => $value12) {
  # code...

     $datafixs =array(
        'salary_cate_id'=>$value12->salary_cate_id,
          'salary_da'=> $value12->salary_da,
         'created_by'=>  $value12->created_by, 
         'salary_id'=>  $value12->salary_id, 
         'salary_da_apply_month'=> $value12->salary_da_apply_month,
          'salary_da_apply_year'=> $value12->salary_da_apply_year,
       );
        $this->db->insert("ft_pay_log_salary_master", $datafixs);

         $data =array(
    
          'salary_da'=> $_POST['da'],
          'salary_da_apply_month'=> $_POST['pay_month'],
          'salary_da_apply_year'=> $_POST['pay_year'],
           'updated_by'=>$this->session->userdata('user_id'),
           'updated_at'=>date("y-m-d h:i:s"),
          'no_updated'=>$_POST["no_updated"],
         );
         $this->db->where("salary_id",$_POST['id']);
        $this->db->update("ft_pay_salary_master", $data);

 
    }
 
  
}

function showallpayslip()
{
   $this->db->select('*');
          $this->db->from('ft_pay_register');
           $this->db->join('ft_employee', 'ft_employee.emp_unique_id =  ft_pay_register.pay_emp_unique_id');
      $this->db->where("pay_year",$_POST['pay_year']);
       $this->db->where("pay_salary_cate_id",4);
     $this->db->where("pay_month",$_POST['pay_month']);
     $query = $this->db->get();
            
    // echo $this->db->last_query();
        
        return $rows = $query->result();


}function emp_cate()
{//SELECT * FROM `ft_pay_increment_month` join ft_employee on ft_employee.emp_unique_id = ft_pay_increment_month.`pay_emp_unique_id`

$this->db->select('*');
          $this->db->from('ft_pay_increment_month');
           $this->db->join('ft_employee', 'ft_employee.emp_unique_id =  ft_pay_increment_month.pay_emp_unique_id');
      // $this->db->where("pay_salary_cate_id",1);
     $query = $this->db->get();
            
        
     echo $this->db->last_query();

        return $rows = $query->result();

}
function add_increment_month()
{


 $data =array(
    'pay_incr_type'=> $_POST['pay_incr_type'],
    'pay_incr_amount'=> $_POST['pay_incr_amount'],
          'pay_month'=> $_POST['pay_month'],
           'updated_by'=>$this->session->userdata('user_id'),
           'updated_at'=> date("Y-m-d h:i:s"),
           
          'no_update'=>$_POST["no_update"],
         );
         $this->db->where("pay_id",$_POST['pay_id']);
        $this->db->update("ft_pay_increment_month", $data);



}function pay_salary_emp($id)
{


  $this->db->select('*');
          $this->db->from('ft_pay_emp_salary');
           $this->db->join('ft_employee', 'ft_employee.emp_unique_id =  ft_pay_emp_salary.pay_emp_unique_id');
      $this->db->where("pay_year",$_POST['pay_year']);
       $this->db->where("pay_emp_unique_id",$id);
     $this->db->where("pay_month",$_POST['pay_month']);
     $query = $this->db->get();
            
    // echo $this->db->last_query();
        
        return $rows = $query->result();
}
function getpaymonthmaster($empid)
{
    $date1 = $_GET['pay_year'].'-'.$_GET['pay_month'].'-01';
    $date2 = $_GET['pay_year_end'].'-'.$_GET['pay_month_end'].'-01';

    $output = [];
    $time   = strtotime($date1);
    $last   = date('F|Y', strtotime($date2));

    //die();
    $this->db->select('*');
              $this->db->from('ft_pay_emp_salary');
       $this->db->where("pay_emp_unique_id",$empid);
       $query = $this->db->get();
                
        // echo $this->db->last_query();
         $rows = $query->result();


    do {
        $month = date('F|Y', $time);
        $total = date('t', $time);

        $output[] = [
            'month' => $month,
            'total' => $total,
        ];

        $time = strtotime('+1 month', $time);
    } while ($month != $last);
    //print_r($output[1]);
   // echo count($output); //die();
      # code...
   for ($x = 0; $x <= count($output) ;$x++) {

    $nn = explode("|", $output[$x]['month']);
   // echo $nn[0]."monika ";
  //  echo "<br/>";

           $this->db->select('*');
              $this->db->from('ft_pay_register');
            $this->db->where("pay_month",$nn[0]);
            $this->db->where("pay_year",$nn[1]);   
          $this->db->where("pay_emp_unique_id",$empid);
           $query23 = $this->db->get();
                     
        // echo $this->db->last_query();
         $rows22 = $query23->result();

    if(count($rows22) == 0)  {     
    foreach ($rows as $key => $pay) {


         //  $currentmonth = $_POST['pay_month']; 
              $datapay = array(
                'pay_salary_cate_id' => $pay->pay_salary_cate_id,
                'pay_month' => $nn[0],
                'pay_year' =>  $nn[1] ,
                'pay_emp_unique_id' => $pay->pay_emp_unique_id ,
                'pay_basic' => $pay->pay_basic ,
              'pay_grp' => $pay->pay_grp ,
              'pay_da' => $pay->pay_da,
              'pay_special' =>$pay->pay_special ,
              'pay_hra' =>$pay->pay_hra ,
              'pay_sa' => $pay->pay_sa ,
              'pay_madical' => $pay->pay_madical ,
              'pay_ca' =>  $pay->pay_ca,
              'pay_sp' =>  $pay->pay_sp,
              'pay_others' =>  $pay->pay_others ,
               'pay_ca' => $pay->pay_ca,
              'pay_sp' => $pay->pay_sp ,
               'pay_total_sum' =>  $pay->pay_total_sum,
               'pay_dpf' =>  $pay->pay_dpf ,
                'pay_dpf_adv' =>  $pay->pay_dpf_adv,
               'pay_gpf' =>  $pay->pay_gpf ,
               'pay_gpf_adv' =>  $pay->pay_gpf_adv,
              'pay_gias' => $pay->pay_gias ,
              'pay_defined_contribution' => $pay->pay_defined_contribution ,
              'pay_fuel_charge' => $pay->pay_fuel_charge ,
              'pay_professional_tax' => $pay->pay_professional_tax ,
              'pay_income_tax' => $pay->pay_income_tax ,
               'pay_grain_adv' => $pay->pay_grain_adv ,
              'pay_festival_adv' => $pay->pay_festival_adv ,
               'pay_other_adv' => $pay->pay_other_adv,
              'pay_house_loan' => $pay->pay_house_loan,
              'pay_car_loan' => $pay->pay_car_loan,
              'pay_house_rent' => $pay->pay_house_rent,
              'pay_total_cut' => $pay->pay_total_cut,
               'pay_total' => $pay->pay_total_cut,
               'pay_back_date' => 1,
                'created_by' => $this->session->userdata('user_id'),
               );

   
         
   $this->db->insert("ft_pay_register", $datapay);
     
    }
  }

}
$this->db->select('*');
          $this->db->from('ft_pay_register');
           $this->db->join('ft_employee', 'ft_employee.emp_unique_id =  ft_pay_register.pay_emp_unique_id');
   $this->db->where("pay_emp_unique_id",$empid);
    $this->db->where("pay_back_date",1);
   $query11 = $this->db->get();
            
    // echo $this->db->last_query();
     $rows11 = $query11->result();

  return $rows11;


}function incrment_month()
{
$data =array(
    'pay_basic'=> $_POST['pay_basic'],
         'no_updated'=>$_POST["no_update"],
         );
         $this->db->where("pay_id",$_POST['pay_id']);
        $this->db->update("ft_pay_emp_salary", $data);


}
}

?>