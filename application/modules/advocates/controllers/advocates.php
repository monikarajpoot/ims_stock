<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advocates extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->module('template');
        $this->load->model('advocates_model', 'advocate_model');
        $this->load->language('admin_user', 'hindi');
        $this->load->language('advocate', 'hindi');
        authorize();
    }

    public function index() {
		$data = array();
        $data['title'] ='जी.पी. / ए.जी.पी. /स्थायी अधिवक्ता / नोटरी /  पैनल अधिवक्ता  की सूची';
        $data['title_tab'] = 'सूची';
        $data['get_users'] = $this->advocate_model->get_advocate_list();
		//pre($data['get_users']);
        $data['module_name'] = "advocates";
        $data['view_file'] = "advocates/index";
        $this->template->index($data);
    }

    public function manage_advocate($id = null) {
		$data = array();
        $this->load->helper(array('form', 'url'));
        $data['title'] = $this->lang->line('advo_title_label');
        $data['title_tab'] = $this->lang->line('manage_emp_sub_heading');
        if ($id == null) {
            $data['page_title'] = $this->lang->line('emp_add_heading');
            $data['is_page_edit'] = 1;
        } else {
            $data['page_title'] = $this->lang->line('emp_edit_heading');
            $data['is_page_edit'] = 0;
        }
		
		 $this->form_validation->set_rules('advocate_aplicant_type', 'advocate_aplicant_type', 'required');
		 $this->form_validation->set_rules('advocate_post_type', 'advocate_post_type', 'required');
		 // $this->form_validation->set_rules('scm_name_en', 'scm_name_en', 'required');
		  $this->form_validation->set_rules('scm_name_hi', 'scm_name_hi', 'required');
		 // $this->form_validation->set_rules('scm_court_name_hi', 'scm_court_name_hi', 'required');
		 
		
		 // $this->form_validation->set_rules('once_registration_number_council', 'once_registration_number_council', 'required');
		
		
         $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run($this) == TRUE) {
			
			$advocate_master = array(
				'scm_name' => $this->input->post('scm_name_en'),
				'scm_name_hi' => $this->input->post('scm_name_hi'),
				'scm_post' => $this->input->post('advocate_designation'),
				'scm_post_hi' => $this->input->post('advocate_designation'),
				'scm_address' => $this->input->post('scm_address_en'),
				'scm_address_hi' => $this->input->post('scm_address_hi'),
				'scm_court_name_hi' => $this->input->post('scm_court_name_hi'),
				'scm_court_name' => $this->input->post('scm_court_name_hi'),
				'advocate_type' => $this->input->post('scm_court_name_hi'),
				'advocate_post_type' => $this->input->post('advocate_post_type'),
				
				'advocate_designation' => $this->input->post('advocate_designation'),
				'creator_id' =>  emp_session_id(),
				'status' => 1 ,
				'scm_pincode' => $this->input->post('scm_pincode'),
				'scm_pincode_hi' => $this->input->post('scm_pincode'),
				
				
				
			);
			$inserted_id = insertData_with_lastid($advocate_master, ADVOCATE_MASTER);
		
				 $advocate_service_record = array(
				 'asr_scm_id' => $inserted_id,
				 'father_name' => $this->input->post('father_name'),
				 'email_id' => $this->input->post('email_id'),
				 'contact_no' => $this->input->post('contact_no'),
				 'order_no' => $this->input->post('adv_order_no'),
				 'order_date' => date('Y-m-d' , strtotime( $this->input->post('adv_order_date') )),
				 'stamp_no' => $this->input->post('stamp_no'),
				 'once_registration_number_council' => $this->input->post('once_registration_number_council'),
				
				 'stamp_date' => date('Y-m-d' , strtotime( $this->input->post('stamp_date'))),
				 'posting_date' => date('Y-m-d' , strtotime( $this->input->post('adv_appointment_posting_date'))),
				 'post_renew_date' =>  date('Y-m-d' , strtotime(  $this->input->post('post_renew_date'))),
				 'application_for_renewal_date' =>  date('Y-m-d' , strtotime(  $this->input->post('application_for_renewal_date'))),
				 'adv_invoice_date' => date('Y-m-d' ,  strtotime( $this->input->post('adv_invoice_date'))),
				 'state_id' => $this->input->post('state_id'),
				 'division_id' =>  $this->input->post('division_id'),
				 'city_id' =>  $this->input->post('city_id'),
				 'package_amount' =>  $this->input->post('adv_appointment_posting_date'),
				 'provision_pirod' =>  $this->input->post('provision_pirod'),
				 'lokabhiyojak_work' =>  $this->input->post('adv_appointment_posting_date'),
				 'asr_current_status' => 'crnt',
				 'create_date' => date('Y-m-d'),
				 'adv_remarke' =>  $this->input->post('adv_remarke'),
				 'adv_invoice_no' => $this->input->post('adv_invoice_no'),
				'notery_registration_no' => $this->input->post('notery_registration_no'),
			 );
			 insertData($advocate_service_record, ADVOCATE_SERVICE_RECORD);
			// echo $this->input->post('url_path_currnet') ; die;
			$url_path_currnet = $this->input->post('url_path_currnet') ;
			$url_path = explode('/',$url_path_currnet);
			$url_path = $url_path[0].'/'.$url_path[1].'/'.$url_path[2];
			
			if($url_path == 'view_file/document_path/index' ){
					
					echo "<script type=\"text/javascript\"> var redirectWindow = window.open('".base_url().$this->input->post('redirect_url')."', '_blank');  redirectWindow.location; </script>";
					
					echo "<script type=\"text/javascript\"> window.setTimeout(function () { location.href = '".base_url().$this->input->post('url_path_currnet')."'; }, 500); </script>";
					exit;
					
			} else {
					 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable hideauto"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="icon fa fa-check"></i>' . $this->lang->line('success_message') . '</div>');
					 redirect('advocate/list');
			 }
			
		}
		$data['module_name'] = "advocates";
        $data['view_file'] = "advocates/advocates_user";
        $this->template->index($data);
    }

    function check_unique_emp_id($str) {
        $emp_unique_id1 = $this->input->post('emp_unique_id');
        if ($this->uri->segment(3) != '') {
            $cnt = 1;
            $isusers = get_list(EMPLOYEES, NULL, array('emp_unique_id' => $emp_unique_id1, 'emp_id !=' => $this->uri->segment(3)));
        } else {
            $cnt = 0;
            $isusers = get_list(EMPLOYEES, NULL, array('emp_unique_id' => $emp_unique_id1));
        }
        if ($cnt < count($isusers)) {
            $this->form_validation->set_message('check_unique_emp_id', '<b>' . $emp_unique_id1 . '</b> ' . $this->lang->line('emp_unique_id_allready_exit_message'));
            return false;
        }
    }

    function check_unique_emp_loginid($str) {
        $emp_unique_loginid1 = $this->input->post('emp_login_id');
        if ($this->uri->segment(3) != '') {
            $cnt = 1;
            $is_users = get_list(EMPLOYEES, NULL, array('emp_login_id' => $emp_unique_loginid1, 'emp_id !=' => $this->uri->segment(3)));
        } else {
            $cnt = 0;
            $is_users = get_list(EMPLOYEES, NULL, array('emp_login_id' => $emp_unique_loginid1));
        }
        if ($cnt < count($is_users)) {
            $this->form_validation->set_message('check_unique_emp_loginid', '<b>' . $emp_unique_loginid1 . '</b> ' . $this->lang->line('emp_unique_loginid_allready_exit_message'));
            return false;
        }
    }
    
    function check_unique_emp_email($str) {
        $emp_unique_loginid3 = $this->input->post('emp_email');
        if ($this->uri->segment(3) != '') {
            $cnt = 1;
            $is_users = get_list(EMPLOYEES, NULL, array('emp_email' => $emp_unique_loginid3, 'emp_id !=' => $this->uri->segment(3)));
        } else {
            $cnt = 0;
            $is_users = get_list(EMPLOYEES, NULL, array('emp_email' => $emp_unique_loginid3));
        }
        if ($cnt < count($is_users)) {
            $this->form_validation->set_message('check_unique_emp_email', '<b>' . $emp_unique_loginid3 . '</b> ' . $this->lang->line('emp_unique_email_allready_exit_message'));
            return false;
        }
    }

    function alpha_dash_space($str) {
        //return (! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
        if (!preg_match("/^([-a-z._])+$/i", $str)) {
            $this->form_validation->set_message('alpha_dash_space', $this->lang->line('text_allow_with_space_error'));
            return false;
        }
    }

    public function delete_section($id) {
        if (isset($id) && $id != '') {
            $res = delete_data(SECTIONS, array('emp_id' => $id));
            if ($res) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable hideauto"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="icon fa fa-check"></i>' . $this->lang->line('delete_success_message') . '</div>');
            }
            redirect('admin/sections');
        }
    }
	
	public function edit_advocate($id = null) 
	{
		$data = array();
        $this->load->helper(array('form', 'url'));
        $data['title'] = $this->lang->line('advo_title_label');
        $data['title_tab'] = $this->lang->line('manage_emp_sub_heading');
        if ($id == null) {
            $data['page_title'] = $this->lang->line('emp_add_heading');
            $data['is_page_edit'] = 1;
        } else {
            $data['page_title'] = $this->lang->line('emp_edit_heading');
            $data['is_page_edit'] = 0;
        }
		//pre($this->input->post());
		 $this->form_validation->set_rules('scm_name_en', 'scm_name_en', 'required');
		 $this->form_validation->set_rules('scm_name_hi', 'scm_name_hi', 'required');
          $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run($this) == TRUE) {
			
			$advocate_master = array(
				'scm_name' => $this->input->post('scm_name_en'),
				'scm_name_hi' => $this->input->post('scm_name_hi'),
				'scm_post' => $this->input->post('advocate_designation'),
				'scm_post_hi' => $this->input->post('advocate_designation'),
				'scm_address' => $this->input->post('scm_address'),
				'scm_address_hi' => $this->input->post('scm_address'),
				'scm_court_name_hi' => $this->input->post('scm_court_name_hi'),
				'scm_court_name' => $this->input->post('scm_court_name_hi'),
				'advocate_type' => $this->input->post('scm_court_name_hi'),
				'advocate_post_type' => $this->input->post('advocate_post_type'),
				'advocate_designation' => $this->input->post('advocate_designation'),
				'creator_id' =>  emp_session_id(),
				'status' => 1 ,
				'scm_pincode' => $this->input->post('scm_pincode'),
				'scm_pincode_hi' => $this->input->post('scm_pincode'),
				
			);
			
			$condition_1 = array('scm_id' => $id );
			updateData(ADVOCATE_MASTER, $advocate_master, $condition_1) ;
				$advocate_service_record = array(
				
				'father_name' => $this->input->post('father_name'),
				'email_id' => $this->input->post('email_id'),
				'contact_no' => $this->input->post('contact_no'),
				'order_no' => $this->input->post('adv_order_no'),
				'order_date' => date('Y-m-d' , strtotime( $this->input->post('adv_order_date') )),
				'stamp_no' => $this->input->post('stamp_no'),
				'once_registration_number_council' => $this->input->post('once_registration_number_council'),
				'stamp_date' => date('Y-m-d' , strtotime( $this->input->post('stamp_date'))),
				'posting_date' => date('Y-m-d' , strtotime( $this->input->post('adv_appointment_posting_date'))),
				'post_renew_date' =>  date('Y-m-d' , strtotime(  $this->input->post('post_renew_date'))),
				'application_for_renewal_date' =>  date('Y-m-d' , strtotime(  $this->input->post('application_for_renewal_date'))),
				'adv_invoice_date' => date('Y-m-d' ,  strtotime( $this->input->post('adv_invoice_date'))),
				'state_id' => $this->input->post('state_id'),
				'division_id' =>  $this->input->post('division_id'),
				'city_id' =>  $this->input->post('city_id'),
				'package_amount' =>  $this->input->post('adv_appointment_posting_date'),
				'provision_pirod' =>  $this->input->post('provision_pirod'),
				'lokabhiyojak_work' =>  $this->input->post('adv_appointment_posting_date'),
				'asr_current_status' => 'crnt',
				'updated_date' => date('Y-m-d'),
				'adv_remarke' =>  $this->input->post('adv_remarke'),
				'adv_invoice_no' => $this->input->post('adv_invoice_no'),
				'notery_registration_no' => $this->input->post('notery_registration_no'),
			);
			 $condition_2 = array('asr_scm_id' => $id);
			updateData(ADVOCATE_SERVICE_RECORD, $advocate_service_record, $condition_2) ;
			
			
			if ($id) {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable hideauto"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="icon fa fa-check"></i>' . $this->lang->line('update_success_message') . '</div>');
					redirect('advocate/list');
			} else {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable hideauto"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="icon fa fa-check"></i>' . $this->lang->line('success_message') . '</div>');
					redirect('advocate/list');
			}
		}
		$data['id'] = $id;
		$adv_details = $this->advocate_model->getadvocate_details($id );
		$data['adv_details'] = $adv_details[0];
		$data['module_name'] = "advocates";
        $data['view_file'] = "advocates/advocates_user";
        $this->template->index($data);
	}
	
    public function show_404() {
        $this->load->view('404');
    }

    public function get_supervisore_emp() {
        $roleid = $this->input->post('rold_id');
        $data = get_supervisor_list($roleid);
        //pre($data);
        echo json_encode($data);
        exit();
    }
	public function getAdvocateName()
	{
		$name_en = $this->input->post('name_en');
		$this->db->like('scm_name' , $name_en );
		$query = $this->db->get(ADVOCATE_MASTER);
		$advocates = $query->result();
		//$advocates  = get_list(ADVOCATE_MASTER, NULL, array('scm_name' => $name_hi) );
		//print_r($advocates);die;
		if(!empty($advocates)) {
		?>
		<ul id="country-list">
		<?php
		foreach($advocates as $advocate) {
		?>
		<li onClick="selectAdvocate_name_en('<?php echo $advocate->scm_name; ?>',<?php echo $advocate->scm_id; ?>);"><?php echo $advocate->scm_name; ?></li>
		<?php } ?>
		</ul>
		<?php }  
	}
			
	public function getAdvocateName_hin()
	{
		$name_hi = $this->input->post('name_hi');
		$this->db->like('scm_name_hi' , $name_hi );
		$query = $this->db->get(ADVOCATE_MASTER);
		$advocates = $query->result();
		//$advocates  = get_list(ADVOCATE_MASTER, NULL, array('scm_name' => $name_hi) );
		//print_r($advocates);die;
		if(!empty($advocates)) {
		?>
		<ul id="country-list">
		<?php
		foreach($advocates as $advocate) {
		?>
		<li onClick="selectAdvocate_name_hi('<?php echo $advocate->scm_name_hi; ?>',<?php echo $advocate->scm_id; ?>);"><?php echo $advocate->scm_name_hi; ?></li>
		<?php } ?>
		</ul>
		<?php }  
	}
		
	public function getAdvocatedetails(){
		
		$advocate_details = $this->advocate_model->getadvocate_details($this->input->post('scm_id'));
		
		echo json_encode($advocate_details);
        exit();
	}
	
	public function getTahsil_list( ){
		$district_id = $this->input->post('district_id');
		echo get_tahsil_ddl_list('tahsil_id',  'class="form-control" onchange="get_advocate_incity(this.value);"',$district_id );
	}
	public function get_advocate_single( ){
		$tahsil_id = $this->input->post('tahsil_id');
		$condition = array('tahsil_id'=>$tahsil_id);
		echo get_advocate_ddl_list('advocate_name' , 
		'onchange="get_advocate_details(this.value);"', $condition);
	}
	public function get_advocate_single_by_city( ){
		$city_id = $this->input->post('city_id');
		$condition = array('city_id'=>$city_id);
		echo get_advocate_ddl_list('advocate_name' , 'onchange="get_advocate_details(this.value);"', $condition);
	}
	
}
