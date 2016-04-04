<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Activity_report	 extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->language('view_file','hindi');
		$this->load->model('file_moniter_activity','activit_model');
        authorize();
    }
    public function index($id=null)
    {
        /*$section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'Report';
        $data['get_section'] = get_list(SECTIONS,null,null);
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/sections_report";
        $this->template->index($data);
		*/
		$start_date = $end_date = date('Y-m-d');
		if($this->input->post('start_date') != ''){
			$start_date = $this->input->post('start_date');
		}
		if($this->input->post('end_date') != ''){
			$end_date = $this->input->post('end_date');
		}
		
		$userrole = checkUserrole();
		$section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
		//pre($section_explode);
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'Report';
		$data['get_section'] = get_list_with_in(SECTIONS,null,'section_id',$section_explode);
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $data['start_date'] = "activity_report";
        $data['start_date'] = get_date_formate($start_date, 'Y-m-d');
        $data['end_date'] = get_date_formate($end_date, 'Y-m-d');
		$data['datewise_report'] = false;
		if($userrole < '9' || in_array($userrole, array('11','15','14','37'))){ 
			$data['view_file'] = "activity_report/sections_report";
		} else {
			redirect('individual_reports');
		}
        $this->template->index($data);
    } 
	
	public function datewise_report()
    {
		
        $start_date = $end_date = date('Y-m-d');
		if($this->input->post('start_date') != ''){
			$start_date = $this->input->post('start_date');
		}
		if($this->input->post('end_date') != ''){
			$end_date = $this->input->post('end_date');
		}
		
		$userrole = checkUserrole();
		$section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
		//pre($section_explode);
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'Report';
		
		//$data['get_section'] = get_list_with_in(SECTIONS,null,'section_id',$section_explode);
        $data['start_date'] = get_date_formate($start_date, 'Y-m-d');
        $data['end_date'] = get_date_formate($end_date, 'Y-m-d');
        $data['datewise_report'] = true;
		$data['view_file'] = "activity_report/sections_report";

        $this->template->index($data);
		
    }
	
	public function employee_report()
    {
		
        $start_date = $end_date = date('Y-m-d');
		if($this->input->post('start_date') != ''){
			$start_date = $this->input->post('start_date');
		}
		if($this->input->post('end_date') != ''){
			$end_date = $this->input->post('end_date');
		}
		
		$userrole = checkUserrole();
		$section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
		//pre($section_explode);
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'Report';
		
		//$data['get_section'] = get_list_with_in(SECTIONS,null,'section_id',$section_explode);
        $data['start_date'] = get_date_formate($start_date, 'Y-m-d');
        $data['end_date'] = get_date_formate($end_date, 'Y-m-d');
        $data['datewise_report'] = true;
		$data['view_file'] = "activity_report/employee_report";

        $this->template->index($data);
		
    }

    //rp
    public function return_fileofficer($file_id = null)
    {
        $query = $this->db->query("SELECT `emp_id`,`emp_full_name` FROM `ft_employee` WHERE `emp_id` in (SELECT DISTINCT `fmove_previous_user_id` FROM `ft_file_movements` WHERE `fmove_file_id`=".$file_id." and fmove_id < (SELECT `fmove_id` FROM `ft_file_movements` WHERE `fmove_file_id`=".$file_id." and `fmove_previous_user_id`=".$this->session->userdata('emp_id')." LIMIT 1)) and `emp_id` != ".$this->session->userdata('emp_id')." order by emp_id asc");
        $res_array =  $query->result_array();
        echo json_encode($res_array);
        exit();
    }
    public function section_da_name()
    {
        $res_1 = $this->view_file->get_DAname(getEmployeeSection());
        echo json_encode($res_1);
        exit();
    }
    public function upper_role_officer($file_id = null)
    {
        $role1 = empdetails($this->session->userdata('emp_id'));
        $filedetails =  getFileDetails($file_id);
        $query = $this->db->query("SELECT ft_employee.emp_full_name, ft_employee.emp_id , ft_emprole_master.emprole_name_hi FROM ft_employee inner join ft_emprole_master on ft_emprole_master.role_id =  ft_employee.role_id  WHERE FIND_IN_SET($filedetails->file_mark_section_id, emp_section_id) AND ft_employee.role_id < ".$role1[0]['role_id']." AND ft_employee.role_id != '1' order by ft_employee.role_id desc");
        $res_array1 =  $query->result_array();
        echo json_encode($res_array1);
        exit();
    }

    public function fetch_data($section_id = null)
    {
        // if we want to load on same page by jquery
       //$data['sce_id'] = $section_id;
       //$this->load->view('activity_report/fetch_data',$data);

    // different page
        $data = array();
        $data['title'] = 'Report';
        $data['title_tab'] = 'Report';
        $data['get_section'] = get_list(SECTIONS,null,array('section_id' => $section_id));
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/fetch_data_diffpage";
        $this->template->index($data);

    }
	
	public function fetch_data_cr()
    {
		$start_date = $end_date = date('Y-m-d');
		if($this->input->post('start_date') != ''){
			$start_date = $this->input->post('start_date');
		}
		if($this->input->post('end_date') != ''){
			$end_date = $this->input->post('end_date');
		}
        $data = array();
        $data['title'] = 'Report';
        $data['title_tab'] = 'Report';
        $data['get_section'] = get_list(SECTIONS, null, array('section_id' => '1'));
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/fetch_data_cr";
        $data['start_date'] = get_date_formate($start_date, 'Y-m-d');
        $data['end_date'] = get_date_formate($end_date, 'Y-m-d');
		
        $this->template->index($data);

    }
	
	public function index_for_admin($id=null)
    {
        $section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
		//pre($section_explode);
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'Report';
		$data['get_section'] = get_list_with_in(SECTIONS,null,'section_id',$section_explode);
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/sections_report";
        $this->load->view('activity_report/sections_report_for_admin',$data);
    }
	
	public function index_datewise_report($id=null)
    {
		$section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
		//pre($section_explode);
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'Report';
		$data['get_section'] = get_list_with_in(SECTIONS,null,'section_id',$section_explode);
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/sections_report";
        $this->load->view('activity_report/datewise_report',$data);
    }
	
	
	public function employee_officer_report($task){
		$data = array();
        $data['title'] = 'Report';
        $data['title_tab'] = 'Officer Level Report';
        
        $data['view_left_sidebar'] = 'admin/left_sidebar';
		if($task=='officer'){
			$condition=" emp.role_id=7 and emp.emp_status=1 and emp.emp_is_retired=0 ";
			$data['employees_list'] =$this->activit_model->get_employee_role_sectionwise($task,$condition) ;
			
			$condition1=" emp.role_id=6 and emp.emp_status=1 and emp.emp_is_retired=0 ";
			$data['deputy_secratory_list'] =$this->activit_model->get_employee_role_sectionwise($task,$condition1) ;
			
			$condition2=" emp.role_id=5 and emp.emp_status=1 and emp.emp_is_retired=0 ";
			$data['additional_secratory_list'] =$this->activit_model->get_employee_role_sectionwise($task,$condition2) ;
			
			$condition3=" emp.role_id=4 and emp.emp_status=1 and emp.emp_is_retired=0 ";
			$data['secratory_list'] =$this->activit_model->get_employee_role_sectionwise($task,$condition3) ;
			
			$condition4=" emp.role_id=3 and emp.emp_status=1 and emp.emp_is_retired=0 ";
			$data['pricipal_secratory_list'] =$this->activit_model->get_employee_role_sectionwise($task,$condition4) ;
		}
		$data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/officer_emp_report";
        $this->template->index($data);
		
		}
	
	public function file_report() /*Show all section level report*/
    {
        $data = array();
        $data['title'] = 'Report';
        $data['title_tab'] = 'Report';
        $data['get_section'] = get_list_with_in(SECTIONS,'section_name_en','section_id not',array(1,26,8,25));
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/file_report_all_section";
        $this->template->index($data);

    }
	//used for individual_reports 
	public function individual_reports(){
		$emp_id = $this->input->post('user_type') != '' ? $this->input->post('user_type') : '';
		$data = array();		
        $data['title'] = 'Report';
        $data['title_tab'] = 'Individual report worked by you on files';
		$data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/individual_reports";
		if($emp_id == ''){
			$data['userid']  = emp_session_id();
			$data['userid_sec']  = getEmployeeSection();
		} else {
			$data['userid']  = $emp_id;
			$data['userid_sec']  = getEmployeeSection($emp_id);
		}
		
		$data['today'] = date('Y-m-d');
        $this->template->index($data);
	}
	
	
}