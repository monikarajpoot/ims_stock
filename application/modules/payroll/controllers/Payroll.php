<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payroll extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('template');
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
        print_r($_FILES);//die;
        $config = array(
            'upload_path'   => './uploads/payroll/',
            'allowed_types' => 'xlsx',
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
            print_r($content);
            die;
            $data_ary = array(
                'title'     => $upload_data['client_name'],
                'file'      => $upload_data['file_name'],
                'width'     => $upload_data['image_width'],
                'height'    => $upload_data['image_height'],
                'type'      => $upload_data['image_type'],
                'size'      => $upload_data['file_size'],
                'date'      => time(),
            );

            //$this->load->database();
           // $this->db->insert('upload', $data_ary);

            //$data = array('upload_data' => $upload_data);
           // $this->load->view('upload_success', $data);
        }
    }
    public function register()
    {
         $data['title'] = $this->lang->line('pay_title');
          $data['title_tab'] = $this->lang->line('view_all_employee');
$data['details_leave'] = $this->payroll_model->getEmployeeLeave();
          $data['pay_regi'] = $this->payroll_model->getpayroll();
        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll/register";
        $this->template->index($data);
      //    $this->load->view('register',$data);
    }
    public function salary_mastar()
    {
        $data['title'] = $this->lang->line('salary_mastar');
          $data['title_tab'] = $this->lang->line('salary_mastar');
       // $data['details_leave'] = $this->payroll_model->salary_cate();
          $data['pay_salary'] = $this->payroll_model->getpayroll();
        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll/salary_mastar";
        $this->template->index($data);


    }
    public function add_salary()
    {
$data['title'] = $this->lang->line('salary_mastar');
          $data['title_tab'] = $this->lang->line('salary_mastar');
       // $data['details_leave'] = $this->payroll_model->salary_cate();
          $data['pay_salary'] = $this->payroll_model->getpayroll();
        $data['module_name'] = "payroll";
        $data['view_file'] = "payroll/";
        $this->template->index($data);


    }
    public function employee_list() {
        $data['title'] = $this->lang->line('view_all_employee');
        $data['title_tab'] = $this->lang->line('view_all_employee');
        $data['details_leave'] = $this->payroll_model->getEmployeeLeave();

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
