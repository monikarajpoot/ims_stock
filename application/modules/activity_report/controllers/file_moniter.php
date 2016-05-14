<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File_moniter	 extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->language('view_file','hindi');
        $this->load->model('file_moniter_activity','file_moniter');
        $this->load->helper('condition');
        authorize();
    }
    public function index()
    {
        $data = array();
        $section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
        $sec_id = $this->input->get('secid') != '' ? $this->input->get('secid') : '';
        $status = $this->input->get('s') != '' ? $this->input->get('s') : '';
        $empid = $this->input->get('emp') != '' ? $this->input->get('emp') : '';
		$s_date = $this->input->get('s_date') != '' ? $this->input->get('s_date') : '';
        $e_date = $this->input->get('e_date') != '' ? $this->input->get('e_date') : '';
        $on = $this->input->get('on') != '' ? $this->input->get('on') : '';
        if(isset($status))
        { $sec = $status ;} else { $sec = null ; }
        if(isset($empid)){
            $empid1 =  $empid;
        } else { $empid1 =  null; }
		if(isset($_GET['emp'])){
			$empname = getemployeeName($_GET['emp'],true,true);			
			$data['title'] = 'आप  '.$empname.'  की फाइलें देख रहे हैं';
		}else{
			$data['title'] = $this->lang->line('view_file_manue');
		}
        $data['title_tab'] = 'File moniter';
        $data['get_files'] = $this->file_moniter->getFiles($sec_id, $sec, $empid1, $s_date, $e_date, $on);
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/file_moniter";
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }
	
	public function files_log(){
		$sec_id = $this->input->get('secid') != '' ? $this->input->get('secid') : '';
        $status = $this->input->get('s') != '' ? $this->input->get('s') : '';
        $empid = $this->input->get('emp') != '' ? $this->input->get('emp') : '';
		$s_date = $this->input->get('s_date') != '' ? $this->input->get('s_date') : '';
        $e_date = $this->input->get('e_date') != '' ? $this->input->get('e_date') : '';
        $action = $this->input->get('a') != '' ? $this->input->get('a') : '';
		$data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'File moniter';
        $data['get_files'] = $this->file_moniter->getFiles_log($empid, $s_date, $e_date, $action, $status);
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/file_moniter";
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
	}
	
	public function files_cr(){
		$sec_id = $this->input->get('secid') != '' ? $this->input->get('secid') : '';
        $type = $this->input->get('t') != '' ? $this->input->get('t') : '';
        $empid = $this->input->get('emp') != '' ? $this->input->get('emp') : '';
		$s_date = $this->input->get('s_date') != '' ? $this->input->get('s_date') : '';
        $e_date = $this->input->get('e_date') != '' ? $this->input->get('e_date') : '';
		$data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'File moniter';
        $data['get_files'] = $this->file_moniter->getFiles_cr($sec_id, $empid, $s_date, $e_date, $type);
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/file_moniter";
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
	}

public function pending_report($task, $date, $date2 = null){
		$emp_section = $this->session->userdata('emp_section_id');
		$data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'Pending files report';
		if($task == 'not'){
			$condition = "(file_hardcopy_status = 'not') ";
		} else{
			$condition = "(file_hardcopy_status = 'received' OR file_hardcopy_status = 'working')";
		}	
			$daterange = " DATE(file_update_date) <= '$date'";
			
		$uequertt = "SELECT * FROM ft_files WHERE $condition
			AND  $daterange
			AND file_mark_section_id in($emp_section)";
			
		$qry = $this->db->query($uequertt);		
        $data['get_files'] = $qry->result();
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/file_moniter";
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
	}

}