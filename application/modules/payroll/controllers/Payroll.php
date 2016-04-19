<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payroll extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('template');
		$this->load->helper('cookie','payroll');
     //  $this->load->language('leave', 'hindi');
        $this->load->model("payroll_model");
         $this->load->language('payroll', 'hindi');
		     

           //   $this->load->language('leave_approve', 'hindi');
    }

    /**
     * Check if the user is logged in, if he's not, 
     * send him to the login page
     * @return void
     */
    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            redirect('dashboard');
        } else if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        } else {
            $data['title'] = $this->lang->line('home_title');
            $data['notice'] = $this->admin_notice->fetchnoticebyid();
            $this->load->view('home', $data);
        }
    }

    /**
     * encript the datakey 
     * @return mixed
     */
    function __encrip_password($datakey) {
        return md5($datakey);
    }

    /**
     * check the username and the password with the database
     * @return void
     */
    
    public function uploadfile()
    {
      $this->load->view("uploadfrom");
    }
 function do_upload() {
        //print_r($_FILES);//die;
        $config = array(
            'upload_path'   => './uploads/payroll/',
            'allowed_types' => 'csv',
            'max_size'      => '100',
            'max_width'     => '1024',
            'max_height'    => '768',
            'encrypt_name'  => true,
        );

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('uploadfrom', $error);
        } else {
            $upload_data = $this->upload->data();
           // print_r($upload_data['file_name']);

            $filename = $upload_data['file_name'];
            $filepsth = $upload_data['file_path'];
            $content = file_get_contents($filepsth.$filename);
           $content = explode(",",$content);
			$insertvalue = array(
			 'pay_emp_unique_id'=> $content[1],
                'pay_month'      => date("M"),
                'pay_basic'     => $content[3],
                'pay_special'    => $content[4],
                'pay_da'      => $content[5],
                'pay_hra'      => $content[7],
                'pay_sa'      => $content[8],
				'pay_madical' => $content[9],
				'pay_total_sum'=> $content[10],
				'pay_dpf'=> "",
				'pay_dpf_adv'=>"",
				'pay_gpf'=> $content[11],
				'pay_gpf_adv'=> $content[12],
				'pay_defined_contribution'=>"",
				'pay_gias'=>$content[13],
				'pay_house_loan'=>$content[14],
				'pay_house_rent'=>"",
				'pay_car_loan'=>$content[15],
				'pay_fuel_charge'=>$content[16],
				'pay_grain_adv'=>"",
				'pay_festival_adv'=>"",
				'pay_professional_tax'=>$content[17],
				'pay_income_tax'=>$content[18],
				'pay_other_adv'=>$content[19],
				'pay_total_cut'=>$content[20],
				'pay_total'=>$content[21],
			);//pre($insertvalue);
			 $data['pay_regi'] = insertData($insertvalue , "ft_pay_register");
			 print_r($data['pay_regi']);
         //   die;
     
            //$this->load->database();
           // $this->db->insert('upload', $data_ary);

            //$data = array('upload_data' => $upload_data);
           // $this->load->view('upload_success', $data);
        }
    }
	public function edit_salary()
	{
		$emp_id = $this->uri->segment("");
		$data['title'] = $this->lang->line("edit_salary"); 
		
	}
    public function register()
    {

         $data['title'] = $this->lang->line('pay_title');
         $data['title_tab'] = $this->lang->line('view_all_employee');
        // $data['details_leave'] = $this->payroll_model->getEmployeeLeave();
      //  $data['pay_regi'] = $this->payroll_model->getpayroll();
		// echo "fsdfsd";die();
         $data['module_name'] = "payroll";
          $data['view_file'] = "payroll/emp_register";
        // $data['view_file'] = "payroll/register";
         $this->template->index($data);
      //$this->load->view('register',$data);
    }
    public function showrigtser()
    {
      $emp_id = $_GET["uid"];
        $data['title'] = $this->lang->line('pay_title');
         $data['title_tab'] = $this->lang->line('pay_title');
         $data['pay_regi'] = $this->payroll_model->getpay($emp_id);
          $data['emp_details'] = $this->payroll_model->getemp($emp_id);
      foreach ($data['emp_details']as $key => $valueca) {
        $pay_cate_id =$valueca->emp_pay_cate_id;

      }
      $condi =  array("pay_cate_id"=>$pay_cate_id );
       $data['pay_basic'] = getsum('ft_pay_register' , '`pay_emp_unique_id` ='.$emp_id,'pay_basic');
       //print_r($pay_basic);
      $data['dataval'] = get_list("ft_pay_salary_category",'pay_cate_id',$condi);
           $data['module_name'] = "payroll";
          $data['view_file'] = "payroll/emp_register_details";
        // $data['view_file'] = "payroll/register";
          $this->template->index($data);

    }

	public function empslary()
	{
		
		$emp_id = $this->uri->segment("3");
	$data['title'] = $this->lang->line('emp_salary_details');
		$data['pay_regi'] = $this->payroll_model->getpay($emp_id);
		$data['emp_bank'] = $this->payroll_model->emp_bank($emp_id);
		//pre($data['pay_regi']);
		$data['module_name'] = "payroll";
         $data['view_file'] = "payroll/emp_salary";
         $this->template->index($data);
	}
    public function salary_mastar()
    {
        $data['title'] = $this->lang->line('salary_mastar');
        $data['title_tab'] = $this->lang->line('salary_mastar');
    
        $data['pay_salary'] = $this->payroll_model->salary_mastar();
        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll/salary_mastar";
        $this->template->index($data);


    }
     public function addsalary(){
        $data['title'] = $this->lang->line('emp_salary_details');

    //pre($data['pay_regi']);
    $data['module_name'] = "payroll";
         $data['view_file'] = "payroll/emp_salary_details";
         $this->template->index($data);
    }
    public function showdetails()
    {
       $emp_id = $_GET["emp_unique_codeemp_unique_code"];
       $data['pay_regi'] = $this->payroll_model->getpay($emp_id);
        $data['emp_details'] = $this->payroll_model->getemp($emp_id);
      foreach ($data['emp_details']as $key => $valueca) {
        $pay_cate_id =$valueca->emp_pay_cate_id;

      }
      $condi =  array("pay_cate_id"=>$pay_cate_id );
      $data['dataval'] = get_list("ft_pay_salary_category",'pay_cate_id',$condi);
        
    $data['emp_bank'] = $this->payroll_model->emp_bank($emp_id);
     $data['adv'] = $this->payroll_model->advance();
    //  $this->load->view("addsalary" ,$data);
         // pre($data['dataval'] );
         $data['module_name'] = "payroll";
         $data['view_file'] = "payroll/addsalary";
         $this->template->index($data);
    }
      public function addcate()
    {
        $data['title'] = $this->lang->line('salary_mastar');
        $data['title_tab'] = $this->lang->line('salary_mastar');
    
     
        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll/addcate";
        $this->template->index($data);


    }
	public function advance()
	{
	           $data['title'] = $this->lang->line('tab3_pay_adv');
        $data['title_tab'] = $this->lang->line('tab3_pay_adv');
    
      $data['pay_salary'] = $this->payroll_model->advance();
        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll/advance";
        $this->template->index($data);
	}public function add_adv()
	{
	                  $data['title'] = $this->lang->line('tab3_pay_adv');
        $data['title_tab'] = $this->lang->line('tab3_pay_adv');
        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll/add_adv";
        $this->template->index($data);
	}public function post_adv()
	{
	          $data = $this->input->post();
			 $data['pay_regi'] = insertData($data , "ft_pay_advance_master");
			 redirect('payroll/advance');
        $this->template->index($data);
	}
    public function allcate(){

           $data['title'] = $this->lang->line('salary_mastar');
        $data['title_tab'] = $this->lang->line('salary_mastar');
    
      $data['pay_salary'] = $this->payroll_model->salary_mastar();
        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll/allcate";
        $this->template->index($data);
    }
    public function add_cate()
    {
        
        $data = $this->input->post();

        $data['pay_regi'] = insertData($data , "ft_pay_salary_category");
        redirect('payroll/salary_mastar');
    }
    public function add_salary()
    {
		$data['title'] = $this->lang->line('salary_mastar');
        $data['title_tab'] = $this->lang->line('salary_mastar');
     // $data['details_leave'] = $this->payroll_model->salary_cate();
        $data['pay_salary'] = $this->payroll_model->salary_mastar();
        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll/salary_mastar";
        $this->template->index($data);


    }
    public function empcate()
    {
                $emp_id = $this->uri->segment("3");
        $data['pay_salary'] = $this->payroll_model->salary_emp($emp_id);
         $data['cate_salary'] = $this->payroll_model->cate_salary($emp_id);

        $this->load->view("empccate" , $data);

    }
    public function employee_list(){
        $data['title'] = $this->lang->line('view_all_employee');
        $data['title_tab'] = $this->lang->line('view_all_employee');
        $data['details_leave'] = $this->payroll_model->getpayroll();

        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll_employee";
        $this->template->index($data);
    }

    public function show_404() {
        $this->load->view('404');
    }

    public function faq() {
        $data['title'] = 'FAQ'; //$this->lang->line('title_faq');
        $this->load->view('faq', $data);
    }

    public function privacy_policy() {
        $data['title'] = 'Privacy policy'; //$this->lang->line('title_faq');
        $this->load->view('privacy_policy', $data);
    }

    public function departmental_setup() {
        $data['title'] = 'Departmental setup'; //$this->lang->line('title_faq');
        $this->load->view('departmental_setup', $data);
    }


    public function add_emp_salary()
    {
      print_r($_POST);
      if($_POST['emp_unique_code'] != "")
      {
           $data['emp_details'] = $this->payroll_model->getemp($_POST['emp_unique_code']);
            $ifemp = count($data['emp_details']);
            if($ifemp == 1)
            {
              if(isset($_POST['pay_define'])){
               $pay_define =$_POST['pay_define']; 
              }else{
               $pay_define=0;
              }
            if(isset($_POST['pay_madical'])){
               $madical =$_POST['pay_madical'];
              }else{
               $madical=0;
              }
              if(isset($_POST['pay_gradepay'])){
               $pay_gradepay =$_POST['pay_gradepay'];
              }else{
               $pay_gradepay=0;
              }
              if(isset($_POST['pay_special'])){
               $pay_special =$_POST['pay_special'];
              }else{
               $pay_special=0;
              }
              $pay_ca = "";
              if(isset($_POST['pay_ca'])){
               $pay_ca =$_POST['pay_ca'];
              }else{
               $pay_ca =0;
              }

               if(isset($_POST['pay_fuel_charge'])){
               $pay_fuel_charge =$_POST['pay_fuel_charge'];
              }else{
               $pay_fuel_charge=0;
              }
              $month = date("now")
              $datapay = array('pay_month' => $month ,
                'pay_emp_unique_id' => $_POST['emp_unique_code'] ,
                'pay_basic' => $_POST['pay_basic'] ,
              'pay_grp' => $pay_gradepay ,
              'pay_da' => $_POST['pay_da'] ,
              'pay_special' => $pay_special ,
              'pay_hra' => $_POST['pay_hra'] ,
              'pay_sa' => $_POST['pay_sa'] ,
              'pay_madical' => $madical ,
              'pay_ca' => $pay_ca,
              'pay_sp' => $_POST['pay_sp'] ,
              'pay_others' => $_POST['pay_others'] ,
              'pay_total_sum' => $_POST['pay_total_sum'] ,
               'pay_gpf' => $_POST['pay_gpf'] ,
              'pay_gias' => $_POST['pay_gias'] ,
              'pay_defined_contribution' => $pay_define ,
              'pay_fuel_charge' => $pay_fuel_charge ,
              'pay_professional_tax' => $_POST['pay_professional_tax'] ,
              'pay_income_tax' => $_POST['pay_income_tax'] ,
              'pay_ca' => $_POST['pay_ca'] ,
              'pay_sp' => $_POST['pay_sp'] ,
              'pay_others' => $_POST['pay_others'] ,
              'pay_total_sum' => $_POST['pay_total_sum'] ,
               );
              insertData($datapay , "ft_pay_register");

            }
      }
    }
    /**
     * logout all session and redirect to home page
     * @return void
     */
    public function logout() {
        $this->Users_model->destroy_user_login_log();
        $this->session->sess_destroy();
        no_cache();
        redirect("home");
    }



}
