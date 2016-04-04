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
       $section_exp = explode(',',getEmployeeSection());
       $section_11 = array('20','18','28','16');
       // $dreafting_sec_id = array('16');
	   $section_id_search = $this->input->get('section_id');
        if(array_intersect($section_exp, $section_11)){
            redirect('view_file_legislative/index/'.$id);
        }
        //else if(array_intersect($section_exp, $dreafting_sec_id)){
        //      redirect('drafting/files/'.$id);
        //redirect('view_file_legislative/view_file_drafting/index/'.$id);
        //  }
		else {
            $section_id = getEmployeeSection();
            $section_explode =  explode(',',$section_id);
            $data = array();
            $data['title'] = $this->lang->line('view_file_manue');
            if ($id == 'return') {
                $data['title_tab'] = $this->lang->line('return_file_show');
            } else if ($id == 'reject') {
                $data['title_tab'] = 'रिजेक्ट की गयी फाइलें';
            }else if ($id == '1') {
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
				if($section_id_search){
					$data['get_files'] = $this->view_file->getFiles($section_explode, $moveup_down,$section_id_search );
				}
				else{
					$data['get_files'] = $this->view_file->getFiles($section_explode, $moveup_down);
				}
               // $data['get_files'] = $this->view_file->getFiles($section_explode, $moveup_down);
                $data['view_file'] = "view_file/index";
            }
            $data['view_left_sidebar'] = 'admin/left_sidebar';
            $this->template->index($data);
        }
    }
	
	//this is use for only printing purpose as per 07-11 Susmita maams said
	public function for_print($id=null)
    {
        $section_exp = explode(',',getEmployeeSection());
        $section_11 = array('20','18','28','16');
      //  $dreafting_sec_id = array('16');
        if(array_intersect($section_exp, $section_11)){
            redirect('view_file_legislative/index/'.$id);
        }
        //else if(array_intersect($section_exp, $dreafting_sec_id)){
        //      redirect('drafting/files/'.$id);
        //redirect('view_file_legislative/view_file_drafting/index/'.$id);
        //  }
		else {
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
                $data['get_files'] = $this->view_file->dispatch_getFiles_for_print($id);
                $data['view_file'] = "view_file/dispatch_file_list_print";

            }else {
                $moveup_down = $id;
                $data['get_files'] = $this->view_file->getFiles($section_explode, $moveup_down);
                $data['view_file'] = "view_file/index";
            }
            $data['view_left_sidebar'] = 'admin/left_sidebar';
            $this->template->index($data);
        }
    }
	

    // show file list of cr RP
   public function crviewfile($showtype='')
    {
		if($this->input->post('files_year') != ''){
			$year = $this->input->post('files_year');
		} else {
			$year = date('Y');
		}
		
		if($this->input->post('files_month') != ''){
			$month = $this->input->post('files_month');
		} else {
			$month =  date('m');
		}
		
		if($this->input->post('files_section') != ''){
			$section = $this->input->post('files_section');
		} else {
			$section = '';
		}
		
		if($this->input->post('files_user') != ''){
			$user = $this->input->post('files_user');
		} else {
			$user = '';
		}
		
		if($this->input->get('type') != '' && $this->input->get('type') == 'all'){
			$year = '';
		}
		
        $data = array();
        $data['title'] = $this->lang->line('view_file_manue');
        //  $section_id = getEmployeeSection();
        $user_id =  emp_session_id();
        if($showtype == 'ALL')
        {   $data['title_tab'] = $this->lang->line('title');
			$data['get_files'] = $this->view_file->allfile_bycr($user_id, $year, $month, $section, $user);
		}elseif($showtype == 'csu')
        {   $data['title_tab'] = 'Add scan PDF on this files.';
			$data['get_files'] = $this->view_file->allfile_ofcsu($user_id, $year, $month, $section, $user);
		}else {
            $data['title_tab'] = $this->lang->line('return_file_show');
            $data['get_files'] = $this->view_file->getFiles_bycr($user_id);
        }

        $data['module_name'] = "view_file";
        if($showtype == 'csu')
        {   $data['view_file'] = "view_file/fileslist_csu_unit";
        }else{
        $data['view_file'] = "view_file/files_cr";
        }
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
		$section_category = '' ;
	    $section_category = $this->input->get('cate') ;
        if(isset($section_ids1)){
            $section_ids2 = $section_ids1 ;
        } else { $section_ids2 = null ; }
        if($id != null) {
            $data['page1'] = $id;
            $data['title_tab'] = $this->lang->line('return_files');
            $data['get_files'] = getFiledata_inlist_desc(null,$section_ids2, $section_category);
        }else {
            $data['title_tab'] = $this->lang->line('received_files');
            $data['get_files'] = getFiledata_inlist_asc(null,$section_ids2 , $section_category);
        }
        $data['module_name'] = "view_file";
        $data['view_file'] = "view_file/view_file_list";
        $data['view_left_sidebar'] =  'admin/left_sidebar';
        $this->template->index($data);
    }
    //rp
   /* public function return_fileofficer($file_id = null)
    {

        $role1 = empdetails(emp_session_id());
       // $query = $this->db->query("SELECT `emp_id`,`emp_full_name` FROM `ft_employee` WHERE `emp_id` in (SELECT DISTINCT `fmove_previous_user_id` FROM `ft_file_movements` WHERE `fmove_file_id`=".$file_id." and fmove_id < (SELECT `fmove_id` FROM `ft_file_movements` WHERE `fmove_file_id`=".$file_id." and `fmove_previous_user_id`=".emp_session_id()." LIMIT 1)) and `emp_id` != ".emp_session_id()." and role_id !='9' order by emp_id asc");
        $query = $this->db->query("SELECT ft_employee.emp_full_name_hi, ft_employee.emp_id ,ft_employee.role_id , ft_emprole_master.emprole_name_hi , ft_sections_master.section_name_hi, ft_sections_master.section_id FROM ft_employee inner join ft_emprole_master on ft_emprole_master.role_id = ft_employee.role_id left join ft_sections_master on ft_sections_master.section_id = ft_employee.emp_section_id  WHERE ((ft_employee.role_id < '12' AND ft_employee.role_id > '".$role1[0]['role_id']."'  AND ft_employee.role_id not in ('1','2','9','10')) or ft_employee.role_id in ('37','14','15')) and ft_employee.emp_status = '1' and ft_employee.emp_is_retired = '0' order by ft_employee.role_id asc");
        $res_array =  $query->result_array();
        echo json_encode($res_array);
        exit();
    } */
	
	//upated by -Rohit on 15/12/2015 return_fileofficer()
	public function return_fileofficer($file_id = null)
    {
		if(checkUserrole()==8){
			$this->section_da_name();
		}else{
			$select = "SELECT ft_employee_details.emp_detail_gender,ft_employee.emp_full_name_hi, ft_employee.emp_id ,ft_employee.role_id , ft_emprole_master.emprole_name_hi , ft_sections_master.section_name_hi, ft_sections_master.section_id ,ft_employee.emp_section_id FROM ft_employee inner join ft_employee_details on ft_employee_details.emp_id = ft_employee.emp_id inner join ft_emprole_master on ft_emprole_master.role_id = ft_employee.role_id left join ft_sections_master on ft_sections_master.section_id = ft_employee.emp_section_id  WHERE ";
			$role1 = empdetails(emp_session_id());
			if($role1[0]['role_id'] == 11){
				$where = "ft_employee.role_id in ('7','8','37','14','15')";
			}else {
				$where = "((ft_employee.role_id < '12' AND ft_employee.role_id > '".$role1[0]['role_id']."'  AND ft_employee.role_id not in ('1','2','9','10')) or ft_employee.role_id in ('37','14','15'))";
			}
			$by = " and (ft_employee.emp_status = '1' and ft_employee.emp_is_retired = '0') order by ft_employee.role_id asc";
			$query = $this->db->query($select.' '.$where.' '.$by);
			$res_array =  $query->result_array();
	
			//emp_section_id
			$section_array = array();
			foreach($res_array as $ky=>$res){
					$section  = $this->view_file->get_employee_alloted_section($res['emp_section_id'] );
					$res_array[$ky]['section_name']=$section[0];
						//print_r($section );
			}
			
			
			//echo $this->db->last_query();
			//die;
			echo json_encode($res_array);
			exit();
		}
    }
	
    public function section_da_name()
    {
		if(checkUserrole()==8){
			$res_1 = $this->view_file->get_DAname(getEmployeeSection());
		}else{			
			$res_1 = $this->view_file->get_DAname(getEmployeeSection(),emp_session_id());
		}
        echo json_encode($res_1);
        exit();
    }

	public function get_da_name_whoiscreatefilename(){
		$fileid= $this->input->post('fileid');
		$lvlname = $this->input->post('lvlname');
		$sectionid = $this->input->post('sectionid');		
		$file_draftId = $this->input->post('file_draft_id');	
		$rowid = $this->input->post('rowid');
		$dropdown='';
		/*if($sectionid=='' || $sectionid==null){
			get_row("SELECT * FROM ( ft_".FILES.") WHERE `file_id` = $fileid");
			$sectionid = $draft_detail['file_mark_section_id'];
		}*/
		if($sectionid=='' || $sectionid==null){
			$filse_section_array = get_row("SELECT file_mark_section_id FROM ( ft_".FILES.") WHERE `file_id` = $fileid");
			$sectionid = $filse_section_array['file_mark_section_id'];			
		}
		$role_id = get_employee_role(emp_session_id(),true);		
		if($lvlname==6){
			$draft_detail = get_list(DRAFT,null,array('draft_id'=>$file_draftId,'draft_file_id'=>$fileid));
			$file_creator_id = $draft_detail[0]['draft_creater_emp_id'];
		}else if($role_id==5){ /*Add SEc*/
			$draft_detail = get_list(EMPLOYEES,null,array('role_id'=>'8',"emp_section_id"=>$sectionid));
			$file_creator_id = $draft_detail[0]['emp_id'];
			$section_ids=$sectionid;
		}else{
			$draft_detail = get_row("SELECT * FROM (ft_file_movements) WHERE `fmove_file_id` = $fileid ORDER BY fmove_id DESC LIMIT 1,1");
			$file_creator_id = $draft_detail['fmove_previous_user_id'];
			$section_ids= getusersection($file_creator_id);
		}
			$dataarray = explode(',',$section_ids);
			$section_array = get_list_with_in(SECTIONS,null,'section_id',$dataarray);
			//pre($section_array);
			$dropdown='<select class="section_id" id="section_id'.$fileid.'" name="section_id['.$rowid.']">';
			//$dropdown.='<option></option>';
			foreach($section_array as $ky=>$val){
				$dropdown.='<option  value="'.$val['section_id'].'">'.$val['section_name_hi'].'('.$val['section_name_en'].') </option>';
			}			
			$dropdown.='</select>';		
		echo json_encode(array('file_creator_id'=>$file_creator_id,'sections'=>$dropdown));
		exit;
		
	}
    public function upper_role_officer($file_id = null)
    {
        $role1 = empdetails(emp_session_id());
        $filedetails =  getFileDetails($file_id);
        $query = $this->db->query("SELECT ft_employee_details.emp_detail_gender,ft_employee.emp_full_name,ft_employee.emp_full_name_hi, ft_employee.emp_id , ft_emprole_master.emprole_name_hi FROM ft_employee inner join ft_employee_details on ft_employee_details.emp_id = ft_employee.emp_id  inner join ft_emprole_master on ft_emprole_master.role_id =  ft_employee.role_id  WHERE ft_employee.role_id < ".$role1[0]['role_id']." AND ft_emprole_master.role_id not in ('8','9','10','1') and ft_employee.emp_status = '1' and ft_employee.emp_is_retired = '0' order by ft_employee.role_id desc");
        $res_array1 =  $query->result_array();
        echo json_encode($res_array1);
        exit();
    }
	
	  // this is new function for fetch upper officer id
	/* public function upper_role_officer_new($file_id = null)
    {
        $role1 = empdetails(emp_session_id());
       // $filedetails =  getFileDetails($file_id);
        $query = $this->db->query("SELECT ft_employee.emp_full_name, ft_employee.emp_id , ft_emprole_master.emprole_name_hi FROM ft_employee inner join ft_emprole_master on ft_emprole_master.role_id =  ft_employee.role_id  WHERE ft_employee.role_id < ".$role1[0]['role_id']." AND ft_employee.role_id != '1' OR ft_employee.role_id = '11' and ft_employee.emp_status = '1' and ft_employee.emp_is_retired = '0' order by ft_employee.role_id desc");
        $res_array1 =  $query->result_array();

        $query1 = $this->db->query("SELECT emp_id as upperofficid FROM `ft_employee_hirarchi` WHERE `under_emp_id` = ".$role1[0]['emp_id']);
        $res_array2 =  $query1->result_array();
        echo json_encode(array($res_array1,$res_array2));
        exit();
    } */
    
   //upated by -Rohit on 15/12/2015 upper_role_officer_new()
	/*public function upper_role_officer_new($file_id = null)
    {
		$select = "SELECT ft_employee_details.emp_detail_gender,ft_employee.emp_full_name,ft_employee.emp_full_name_hi, ft_employee.emp_id , ft_emprole_master.emprole_name_hi FROM ft_employee inner join ft_employee_details on ft_employee_details.emp_id = ft_employee.emp_id inner join ft_emprole_master on ft_emprole_master.role_id =  ft_employee.role_id  WHERE ";
        $role1 = empdetails(emp_session_id());
		if($role1[0]['role_id'] == 11){
			$where = "ft_employee.role_id in ('3','4','5','6')";
		}else {
			$where = "(ft_employee.role_id < ".$role1[0]['role_id']." AND ft_employee.role_id != '1' OR ft_employee.role_id = '11')";
		}
		$by = " and (ft_employee.emp_status = '1' and ft_employee.emp_is_retired = '0') order by ft_employee.role_id desc";
        $query = $this->db->query($select.' '.$where.' '.$by);
        $res_array1 =  $query->result_array();

        $query1 = $this->db->query("SELECT emp_id as upperofficid FROM `ft_employee_hirarchi` WHERE `under_emp_id` = ".$role1[0]['emp_id']);
        $res_array2 =  $query1->result_array();
        echo json_encode(array($res_array1,$res_array2));
        exit();
    }*/
	
	//raginee 4 march
	public function upper_role_officer_new($file_id = null)    {
		$select = "SELECT ft_employee_details.emp_detail_gender,ft_employee.emp_full_name,ft_employee.emp_full_name_hi, ft_employee.emp_id , ft_emprole_master.emprole_name_hi FROM ft_employee inner join ft_employee_details on ft_employee_details.emp_id = ft_employee.emp_id inner join ft_emprole_master on ft_emprole_master.role_id =  ft_employee.role_id  WHERE ";
        $role1 = empdetails(emp_session_id());
		$emp_role_n = $role1[0]['role_id'];
		if($role1[0]['role_id'] == 11){
			$where = "ft_employee.role_id in ('3','4','5','6')";
		}else {
            $role_11 = '';
            if($role1[0]['role_id'] >= 7){
            $role_11 = " OR ft_employee.role_id = '11'";
            }
			if($role1[0]['role_id'] == 8){
            $emp_role_n = '7';
            }
			$where = "(ft_employee.role_id <= ".$emp_role_n." AND ft_employee.role_id != '1' $role_11)";
		}
		$by = " and ft_employee.emp_id != ".$role1[0]['emp_id']." and (ft_employee.emp_status = '1' and ft_employee.emp_is_retired = '0') order by ft_employee.role_id asc";
        $query = $this->db->query($select.' '.$where.' '.$by);
        $res_array1 =  $query->result_array();

        $query1 = $this->db->query("SELECT emp_id as upperofficid FROM `ft_employee_hirarchi` WHERE `under_emp_id` = ".$role1[0]['emp_id']);
        $res_array2 =  $query1->result_array();
        echo json_encode(array($res_array1,$res_array2));
        exit();
    }
	
	public function upper_role_officer_list($file_id = null)
    {
		$select = "SELECT ft_employee_details.emp_detail_gender,ft_employee.emp_full_name,ft_employee.emp_full_name_hi, ft_employee.emp_id , ft_emprole_master.emprole_name_hi FROM ft_employee inner join ft_employee_details on ft_employee_details.emp_id = ft_employee.emp_id inner join ft_emprole_master on ft_emprole_master.role_id =  ft_employee.role_id  WHERE ";
        $role1 = empdetails(emp_session_id());
		$where = "ft_employee.role_id in ('3','4','5','6','7')";
		$by = " and (ft_employee.emp_status = '1' and ft_employee.emp_is_retired = '0') order by ft_employee.role_id desc";
        $query = $this->db->query($select.' '.$where.' '.$by);
        $res_array1 =  $query->result_array();

        $query1 = $this->db->query("SELECT emp_id as upperofficid FROM `ft_employee_hirarchi` WHERE `under_emp_id` = ".$role1[0]['emp_id']);
        $res_array2 =  $query1->result_array();
        echo json_encode(array($res_array1,$res_array2));
        exit();
    }

    public function  view_notesheet($id = ''){
        if($id != ''){
            $contains = $this->notesheet_model->view_notesheets($id);
            if($contains != false){
                $data['contains'] = $contains;
				$data['file_detail'] = $contains;
                $this->load->view('view_notesheet',$data);
            } else {
                $this->show_404();
            }
        }else {
            return false;
        }
    }
	
	public function section_off_nm($file_id = null)
    {
        $filedetails =  getFileDetails($file_id);
    //    $section_section_name = section_section_name();
    //    $markssec = $section_section_name[$filedetails->file_mark_section_id];
   //     $query = $this->db->query("SELECT section_id, section_name_hi, section_name_en FROM ft_sections_master where section_id=".$markssec);
    //   $query = $this->db->query("SELECT section_id, section_name_hi, section_name_en FROM ft_sections_master where section_id not in ('1','8')");
      $query = $this->db->query("SELECT section_id, section_name_hi, section_name_en FROM ft_sections_master where section_id not in ('1','8',26,21) and section_id not in (".getEmployeeSection().")");
     $res_array1 =  $query->result_array();
        echo json_encode($res_array1);
        exit();
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
			if($this->session->userdata("emp_id")==135){
				if($_GET['test']=='ab'){
					$data['get_files'] = $this->view_file->getFiles_2_testing($section_explode, $moveup_down);
				}else{
					$data['get_files'] = $this->view_file->getFiles_2($section_explode, $moveup_down);
				}
			}else{
				$data['get_files'] = $this->view_file->getFiles_2($section_explode, $moveup_down);
			}
			//getFiles_2_testing
			
			if($_GET['test']=='ab'){
			  pre($data['get_files']);
			}
				//pre($data['get_files']);
            $data['view_file'] = "view_file/index";
        }
		//pr($data['get_files']);
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }
	/*End show assign task*/

	/* Searching file in cr section for printing created - Rohit*/
	function search_files_cr(){
		$this->form_validation->set_rules('sections', 'Sections', 'required');
        $this->form_validation->set_rules('search_date', 'Date', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		$user_id =  emp_session_id();
        if ($this->form_validation->run($this) === TRUE) {
			$section_id = trim($this->input->post('sections'));
			$search_date = trim($this->input->post('search_date'));			
			$data['get_files'] = $this->view_file->files_search_cr($section_id, $search_date);
		} else {
			$data['get_files'] = $this->view_file->allfile_bycr($user_id);
		}
		
        $data['title'] = $this->lang->line('view_file_manue');       
		$data['title_tab'] = $this->lang->line('title');
		
        $data['module_name'] = "view_file";
        $data['view_file'] = "view_file/files_cr";
        $this->template->index($data);	
	}
	
	    public function send_file_return($showtype='')
    {
        $data = array();
        $data['title'] = 'अंकित की गई फाइलें';
        //  $section_id = getEmployeeSection();
        $user_id =  emp_session_id();
        $data['title_tab'] = 'यह वह फाइलें है जो आपके द्वारा किसी को अंकित की गई  है , लेकिन उन्होंने  प्राप्त नही किया है |';
        $data['get_files'] = $this->view_file->send_getFiles();
        $data['module_name'] = "view_file";
        $data['view_file'] = "view_file/send_file_return";
        //   $data['view_left_sidebar'] =  'manage_file/left_sidebar_cr';
        $this->template->index($data);
    }
	public function check_user_section()
	{
		$emp_id = $this->input->post('emp_id');
		$empdetails = empdetails($emp_id) ;		
		$emp_section_id = $empdetails[0]['emp_section_id'];	
		$sectionids = explode( ',',$emp_section_id );
		//if(( ( $empdetails[0]['role_id'] == 8 ) && (count($sectionids)>1))||( ( $empdetails[0]['role_id'] == 37 ) && (count($sectionids)>1))){ 
		if(( ( $empdetails[0]['role_id'] == 14 ) && (count($sectionids)>1))||( ( $empdetails[0]['role_id'] == 8 ) && (count($sectionids)>1))||( ( $empdetails[0]['role_id'] == 37 ) && (count($sectionids)>1))){ 
			$section_array=get_list_with_in(SECTIONS, '' ,'section_id',$sectionids);
		//	pr($section_array);
		echo json_encode($section_array);
        
		}else{
			$nul=0;
			echo json_encode($nul);
		}
		exit();
		
	}
	
	public function get_physical_file_from_log()
	{
		$file_id = $this->input->post('file_id');
		$file_status = $this->input->post('file_status');
		$query = $this->db->query("SELECT * from ft_file_logs where `file_status_log` like '%p%' and file_id = ".$file_id ."  order by `flog_id` desc limit 1");
		 $res_array1 =  $query->result_array();

		 //echo $this->db->last_query();
		echo json_encode($res_array1);
		exit();
		
    }
}