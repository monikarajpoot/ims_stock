<?php
class Efile_list_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function geteFiles($section_id,$moveup_down,$section_id_search='',$pgmode)
    {
		//echo 'b-'.$moveup_down;
		$emp_role_lvl= get_emp_role_levele();        
		$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".emp_session_id());
        $rr =  $query->row_array();
		$rt =  explode(',',$rr['u_empid']);
        //pre($rt);
        $tbl_files = FILES;
		$tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES .'.*,dept_name_hi,district_name_hi');
		$this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');
		
		if(!empty($section_id_search)){
			$this->db->where_in('file_mark_section_id', $section_id_search);
		}
		else if(isset($section_id) && $section_id != null) {
            $this->db->where_in('file_mark_section_id', $section_id);
        }else if($pgmode=='inbox'){
			//$this->db->where('file_hardcopy_status','received');
		   //	$this->db->where('file_sender_emp_id',emp_session_id());
			$this->db->where(array('final_draft_id !='=>''));
			$this->db->where('file_received_emp_id',emp_session_id());
		}else if($pgmode=='sent'){
			//pre($rt);
			 //$this->db->where_not_in('file_sender_emp_id',$rt);
			 //$this->db->where('file_hardcopy_status','sent');
			 $this->db->where('file_sender_emp_id',emp_session_id());
		}else{
			$this->db->where_not_in('file_sender_emp_id',$rt);
            //$this->db->where('file_return','0');
             if($emp_role_lvl['emprole_level']==6){
				$this->db->where('file_hardcopy_status','received');
			 }else{
				$this->db->where('file_hardcopy_status','working');
			 }
			$this->db->where('file_received_emp_id',emp_session_id());
        }
        $this->db->where('file_hardcopy_status !=','close');
		
		$this->db->order_by('file_id','desc');
		$query = $this->db->get($tbl_files);
		return $query->result();
    }
	public function getesingleFiles($section_id=null,$file_id)
    {
		//echo 'b-'.$moveup_down;
		$emp_role_lvl= get_emp_role_levele();        
		$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".emp_session_id());
        $rr =  $query->row_array();
		$rt =  explode(',',$rr['u_empid']);
        //pre($rt);
        $tbl_files = FILES;
		$tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES .'.*,dept_name_hi,district_name_hi');
		$this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');
		$this->db->where(array('file_id'=>$file_id,'file_hardcopy_status !='=>'close'));
		$query = $this->db->get($tbl_files);
		return $query->result();
    }
    public function sent_efile(){
        $CI = & get_instance();
        //   $subQuery = ("SELECT DISTINCT `fmove_file_id` FROM `ft_file_movements` WHERE `fmove_current_user_id`=".emp_session_id());
        // $subQuery = ("SELECT DISTINCT `file_id` FROM `ft_file_logs` WHERE `to_emp_id`=".emp_session_id());
	     $subQuery = ("SELECT DISTINCT `file_id` FROM `ft_file_logs` WHERE (from_emp_id = ".emp_session_id() . ")" );
        //$CI->db->select('*')->from(FILES)->where("file_id IN ($subQuery)", NULL, FALSE);
		/*if(isset($_GET['sort']) && $_GET['sort']!=''){
			if(isset($_GET['sort'])&& $_GET['sort']=='rj'){
				$CI->db->select('*')->from(FILES)->where("file_id IN ($subQuery)", NULL, FALSE)->where("file_hardcopy_status",'not');
			}else if(isset($_GET['sort'])&& $_GET['sort']=='rj_cr'){
				$CI->db->select('*')->from(FILES)->where("file_id IN ($subQuery)", NULL, FALSE)->where("file_hardcopy_status",'not')->where("file_received_emp_id IN (210,211,204,177)", NULL, FALSE);
			}else if(isset($_GET['sort'])&& $_GET['sort']=='rc'){
				$CI->db->select('*')->from(FILES)->where("file_id IN ($subQuery)", NULL, FALSE)->where("file_hardcopy_status",'received')->or_where("file_hardcopy_status",'working');
			}
		}else{*/
			$CI->db->select('*')->from(FILES)->where("file_id IN ($subQuery) and final_draft_id!='' ", NULL, FALSE);
		//}
        $CI->db->order_by("file_id", 'desc');
        $query = $CI->db->get();
        return    $query->result();

    }
}

