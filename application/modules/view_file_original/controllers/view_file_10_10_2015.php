<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class View_file	 extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->language('view_file','hindi');
        $this->load->model('view_file_model','view_file');
        $this->load->model('notesheet_model');
        authorize();
    }
    public function index($id=null)
    {
        $section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        if ($id == 'return') {
            $data['title_tab'] = $this->lang->line('return_file_show');
        } else if ($id == '1') {
            $data['title_tab'] = $this->lang->line('dealing_file_show');
        } else {
            $data['title_tab'] = $this->lang->line('received_files');
        }
        $data['module_name'] = "view_file";
        if(in_array('8',$section_explode)) // 8 is dispatch section id.
        {
            $data['get_files'] = $this->view_file->dispatch_getFiles($id);
            $data['view_file'] = "view_file/dispatch_file_list";

        }else {
            $moveup_down = $id;
            $data['get_files'] = $this->view_file->getFiles($section_explode, $moveup_down);
            $data['view_file'] = "view_file/index";
        }
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }

    // show file list of cr RP
    public function crviewfile($showtype='')
    {
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        //  $section_id = getEmployeeSection();
        $user_id =  emp_session_id();
        if($showtype == 'ALL')
        {   $data['title_tab'] = $this->lang->line('title');
			if(@$_GET['name']=='bij'){
				@$data['get_files'] = @$this->view_file->allfile_bycr_tetmp(210,211);
			}else{
				$data['get_files'] = $this->view_file->allfile_bycr($user_id);
			}
        }else {
            $data['title_tab'] = $this->lang->line('return_file_show');
            $data['get_files'] = $this->view_file->getFiles_bycr($user_id);
        }
        $data[''] =
        $data['module_name'] = "view_file";
        $data['view_file'] = "view_file/files_cr";
        //   $data['view_left_sidebar'] =  'manage_file/left_sidebar_cr';
        $this->template->index($data);
    }

    public function viewDetails($file_id = null)
    {
        if($file_id != null) {
            $data = array();
            $data['title'] = $this->lang->line('view_file_manue');
            $data['title_tab'] = $this->lang->line('view_file_details');
            $data['file_details'] = $this->view_file->getFileDetails($file_id);
            $file_log = $this->view_file->getFiles_log($file_id);
            $data['file_log'] = $file_log;
            $file_movement = $this->view_file->getFiles_movement($file_id);
            $data['file_movement'] = $file_movement;
            // pre($data['file_log']);
            $data['module_name'] = "view_file";
            $data['view_left_sidebar'] = 'manage_file/left_sidebar_cr';
            //	$data['view_left_sidebar'] =  'admin/left_sidebar';
            $data['view_file'] = "view_file";
            $this->template->index($data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // Send file to DA , RP
    public function senttoda_action($file_id)
    {
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = $this->lang->line('view_file_details');
        $data['file_details']= getFiledata($file_id);
        $data['dealing_name']= $this->view_file->get_DAname(getEmployeeSection(),null);
		if(count($data['dealing_name'])<=0){
			$data['dealing_name']= $this->view_file->get_DAname($data['file_details'][0]['file_mark_section_id'],$data['file_details'][0]['file_received_emp_id']);
		}
        //  pre($data['dealing_name']);
        $data['module_name'] = "view_file";
        // $data['view_left_sidebar'] =  'manage_file/left_sidebar_so';
        //	$data['view_left_sidebar'] =  'admin/left_sidebar';
        $data['view_file'] = "action_so";
        $this->template->index($data);
    }
    //show file list RP
    public function Dispaly_list($id=null)
    {
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        $section_ids1 = $this->input->get('section_id') ;
       // pr($section_ids1);
        if(isset($section_ids1)){
            $section_ids2 = $section_ids1 ;
        } else { $section_ids2 = null ; }
        if($id != null) {
            $data['page1'] = $id;
            $data['title_tab'] = $this->lang->line('return_files');
            $data['get_files'] = getFiledata_inlist_desc(null,$section_ids2);
        }else {
            $data['title_tab'] = $this->lang->line('received_files');
            $data['get_files'] = getFiledata_inlist_asc(null,$section_ids2);
        }
        $data['module_name'] = "view_file";
        $data['view_file'] = "view_file/view_file_list";
        $data['view_left_sidebar'] =  'admin/left_sidebar';
        $this->template->index($data);
    }
    //rp
    public function return_fileofficer($file_id = null)
    {

        $role1 = empdetails(emp_session_id());
       // $query = $this->db->query("SELECT `emp_id`,`emp_full_name` FROM `ft_employee` WHERE `emp_id` in (SELECT DISTINCT `fmove_previous_user_id` FROM `ft_file_movements` WHERE `fmove_file_id`=".$file_id." and fmove_id < (SELECT `fmove_id` FROM `ft_file_movements` WHERE `fmove_file_id`=".$file_id." and `fmove_previous_user_id`=".emp_session_id()." LIMIT 1)) and `emp_id` != ".emp_session_id()." and role_id !='9' order by emp_id asc");
        $query = $this->db->query("SELECT ft_employee.emp_full_name_hi, ft_employee.emp_id ,ft_employee.role_id , ft_emprole_master.emprole_name_hi , ft_sections_master.section_name_hi, ft_sections_master.section_id FROM ft_employee inner join ft_emprole_master on ft_emprole_master.role_id = ft_employee.role_id left join ft_sections_master on ft_sections_master.section_id = ft_employee.emp_section_id  WHERE (ft_employee.role_id < '9' AND ft_employee.role_id > '".$role1[0]['role_id']."'  AND ft_employee.role_id not in ('9','1','2')) or ft_employee.role_id ='37'  order by ft_employee.role_id asc");
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
        $role1 = empdetails(emp_session_id());
        $filedetails =  getFileDetails($file_id);
        $query = $this->db->query("SELECT ft_employee.emp_full_name, ft_employee.emp_id , ft_emprole_master.emprole_name_hi FROM ft_employee inner join ft_emprole_master on ft_emprole_master.role_id =  ft_employee.role_id  WHERE ft_employee.role_id < ".$role1[0]['role_id']." AND ft_employee.role_id != '1' order by ft_employee.role_id desc");
        $res_array1 =  $query->result_array();
        echo json_encode($res_array1);
        exit();
    }
    
    public function  view_notesheet($id = ''){
        if($id != ''){
            $contains = $this->notesheet_model->view_notesheets($id);
            if($contains != false){
                $data['contains'] = $contains;
                $this->load->view('view_notesheet',$data);
            } else {
                $this->show_404();
            }
        }else {
            return false;
        }
    }
    
    public function show_404() {
        $this->load->view('404');
    }
	
	/*18/09/2015 show assign task*/
	public function assign_other_employees_files($id=null)
    {
        $section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        if ($id == 'return') {
            $data['title_tab'] = $this->lang->line('return_file_show');
        } else if ($id == '1') {
            $data['title_tab'] = $this->lang->line('dealing_file_show');
        } else {
            $data['title_tab'] = $this->lang->line('received_files');
        }
        $data['module_name'] = "view_file";
        if(in_array('8',$section_explode)) // 8 is dispatch section id.
        {
			$data['get_files'] = $this->view_file->dispatch_getFiles($id);
            $data['view_file'] = "view_file/dispatch_file_list";

        }else {
            $moveup_down = $id;
			//section_explode
			//$section_explode.'-'.$moveup_down;
			//echo $section_explode;
			$data['get_files'] = $this->view_file->getFiles_2($section_explode, $moveup_down);
			//pre($data['get_files']);
            $data['view_file'] = "view_file/index";
        }
		//pr($data['get_files']);
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }
	/*End show assign task*/

}