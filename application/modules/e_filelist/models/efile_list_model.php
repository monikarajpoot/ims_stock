<?php
class Efile_list_model extends CI_Model {
    function __construct() {
        parent::__construct();		
		
    }
    public function geteFiles($section_id,$moveup_down,$section_id_search='',$pgmode)
    {
		$sub_type = '';
		if($this->input->get('sstype') != '') {
			$sub_type = $this->input->get('sstype');
        }
		$login_emp_id = emp_session_id();		
		$emp_role_lvl= get_emp_role_levele();      
		//echo $emp_role_lvl['emprole_level'];
		$cr_emp_str = get_emp_by_role(9,$section_id = null);
		$cr_emp_ids_array =  explode(',',$cr_emp_str);
		$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".$login_emp_id);
        $rr =  $query->row_array();
		$rt =  explode(',',$rr['u_empid']);
        //pre($rt);
        $tbl_files = FILES;
		$tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
		$draft=DRAFT;
        $this->db->select(FILES .'.*,'.$draft.'.*,dept_name_hi,district_name_hi');
		$this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');		
        $this->db->join($draft, "$tbl_files.file_id= $draft.draft_file_id and draft_type='n' ",'left');		
		if(!empty($section_id_search)){
			$this->db->where_in('file_mark_section_id', $section_id_search);
		}else if(isset($section_id) && $section_id != null) {
            $this->db->where_in('file_mark_section_id', $section_id);
        }else if($pgmode=='inbox'){ /*INBOX*/
			if($emp_role_lvl['emprole_level']==6 ){ /*For SO, incharge*/					
					$this->db->where('final_draft_id IS NOT NULL', null, false);							
			}else if($emp_role_lvl['emprole_level']==13){ //For DA	
					//echo 'dd';
					$this->db->or_where('file_hardcopy_status','working');
					$this->db->where('final_draft_id IS NULL', null, false);							
			}else if($emp_role_lvl['emprole_level']==7){ //For लेखा अधिकारी	
					if(isset($_GET['section_id']) && $_GET['section_id']!=''){
						if(ctype_digit($_GET['section_id'])){
							$e_section_id=$_GET['section_id'];
						}else{ $e_section_id=0;} 
						$this->db->where_in('file_mark_section_id', $e_section_id);
					}
					$this->db->where('final_draft_id IS NOT NULL', null, false);
			}else if($emp_role_lvl['emprole_level']==5){ //For अवर सचिव	
					if(isset($_GET['section_id']) && $_GET['section_id']!=''){
						if(ctype_digit($_GET['section_id'])){
							$e_section_id=$_GET['section_id'];
						}else{ $e_section_id=0;} 
						$this->db->where_in('file_mark_section_id', $e_section_id);
					}
					$this->db->where('final_draft_id IS NOT NULL', null, false);
			}else if($emp_role_lvl['emprole_level']==4){ //For उप सचिव	
					if(isset($_GET['section_id']) && $_GET['section_id']!=''){
						if(ctype_digit($_GET['section_id'])){
							$e_section_id=$_GET['section_id'];
						}else{ $e_section_id=0;} 
						$this->db->where_in('file_mark_section_id', $e_section_id);
					}
					$this->db->where('final_draft_id IS NOT NULL', null, false);
			}else if($emp_role_lvl['emprole_level']==3){ //For अतिरिक्त सचिव	
					if(isset($_GET['section_id']) && $_GET['section_id']!=''){
						if(ctype_digit($_GET['section_id'])){
							$e_section_id=$_GET['section_id'];
						}else{ $e_section_id=0;} 
						$this->db->where_in('file_mark_section_id', $e_section_id);
					}
					$this->db->where('final_draft_id IS NOT NULL', null, false);
			}else if($emp_role_lvl['emprole_level']==2){ //For सचिव	
					if(isset($_GET['section_id']) && $_GET['section_id']!=''){
						if(ctype_digit($_GET['section_id'])){
							$e_section_id=$_GET['section_id'];
						}else{ $e_section_id=0;} 
						$this->db->where_in('file_mark_section_id', $e_section_id);
					}
					//echo 'welcome';
					$this->db->where('final_draft_id IS NOT NULL', null, false);
			}else if($emp_role_lvl['emprole_level']==1){ //For प्रमुख  सचिव	
					if(isset($_GET['section_id']) && $_GET['section_id']!=''){
						if(ctype_digit($_GET['section_id'])){
							$e_section_id=$_GET['section_id'];
						}else{ $e_section_id=0;} 
						$this->db->where_in('file_mark_section_id', $e_section_id);
					}
					$this->db->where('final_draft_id IS NOT NULL', null, false);
			}else{
					$this->db->where('file_hardcopy_status','received');
					
			}			 			
			$this->db->where('file_received_emp_id',$login_emp_id);				
		}else if($pgmode=='sent'){ /*SEND*/
			 $this->db->where('file_hardcopy_status','not');			 
			 $this->db->where('file_sender_emp_id',$login_emp_id);
		}else if($pgmode=='return'){ /*Return files*/
				if($emp_role_lvl['emprole_level']==13){					
					$this->db->where('final_draft_id IS NOT NULL', null, false);	
				}if($emp_role_lvl['emprole_level']==6 ){ /*For SO, incharge*/					
					$this->db->where('final_draft_id IS NOT NULL', null, false);							
				}if($emp_role_lvl['emprole_level']==7){ /*For LEKHA ADHIKARI*/					
					$this->db->where('final_draft_id IS NOT NULL', null, false);							
					$this->db->where('file_status !=','p');							
				}
				if($emp_role_lvl['emprole_level']>=1 && $emp_role_lvl['emprole_level']<=5){ /*For Secratory, incharge*/		
					$this->db->where('final_draft_id IS NOT NULL', null, false);							
					$this->db->where('file_status !=','p');							
				}				
				$this->db->where('file_received_emp_id',$login_emp_id);	
		}else{ /*Working*/				
             if($emp_role_lvl['emprole_level']==6){
				$this->db->where('file_hardcopy_status','received');
				$this->db->where('final_draft_id IS NOT NULL', null, false);
			 }else{				
				$this->db->where('final_draft_id IS NOT NULL', null, false);
			 }
			$this->db->where('draft_reciever_id',$login_emp_id);	
			$this->db->where('draft_sender_id',$login_emp_id);	
			$this->db->where('final_draft_id IS NOT NULL', null, false);	
			$this->db->where('file_received_emp_id',$login_emp_id);
			$where_draft_status = "(draft_status = 2 OR draft_status = 3)";
			$this->db->where($where_draft_status);				
        }
        $this->db->where('file_hardcopy_status !=','close');
		if($sub_type != ''){
			$this->db->where('section_file_categoty',$sub_type);
		}
		//$where="file_status=='e' || file_status=='e,p' || file_status=='p,e'";
		//$this->db->or_where(array('file_status !='=>'p'));
		//$this->db->or_where(array('file_status !='=>''));
		$this->db->group_by('file_id');
		$this->db->order_by('file_update_date','desc');
		$query = $this->db->get($tbl_files);
		//echo $this->db->last_query();
		return $query->result();
    }
	public function geteFiles_working(){
		$login_emp_id = emp_session_id();		
		$emp_role_lvl= get_emp_role_levele();      
		//echo $emp_role_lvl['emprole_level'];
		$cr_emp_str = get_emp_by_role(9,$section_id = null);
		$cr_emp_ids_array =  explode(',',$cr_emp_str);
		$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".$login_emp_id);
        $rr =  $query->row_array();
		$rt =  explode(',',$rr['u_empid']);
        //pre($rt);
        $tbl_files = FILES;
		$tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
		$draft=DRAFT;
        $this->db->select(FILES .'.*,'.$draft.'.*,dept_name_hi,district_name_hi');
		$this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');		
        $this->db->join($draft, "$tbl_files.file_id= $draft.draft_file_id and draft_type='n' ",'left');					
		if($emp_role_lvl['emprole_level']==6){
			$this->db->where('file_hardcopy_status','received');
			$this->db->where('final_draft_id IS NOT NULL', null, false);
		 }else{				
			$this->db->where('final_draft_id IS NOT NULL', null, false);
		 }
		$this->db->where('draft_reciever_id',$login_emp_id);	
		$this->db->where('draft_sender_id',$login_emp_id);	
		$this->db->where('final_draft_id IS NOT NULL', null, false);	
		$this->db->where('file_received_emp_id',$login_emp_id);
		$where_draft_status = "(draft_status = 2 OR draft_status = 3)";
		$this->db->where($where_draft_status);				        
        $this->db->where('file_hardcopy_status !=','close');		
		$this->db->group_by('file_id');
		$this->db->order_by('file_update_date','desc');
		$query = $this->db->get($tbl_files);
		//echo $this->db->last_query();
		return $query->result();	 
	 }		 
	
	public function getesingleFiles($section_id=null,$file_id)
    {
		$login_emp_id = emp_session_id();
		$emp_role_lvl= get_emp_role_levele();        
		$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".$login_emp_id);
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
		$login_emp_id = emp_session_id();
        $CI = & get_instance();		
        $subQuery = ("SELECT distinct (draft_file_id) FROM `ft_file_draft` WHERE `draft_id` in (SELECT DISTINCT(draft_log_draft_id) FROM `ft_draft_log` where draft_log_creater= ".$login_emp_id . ")");
        $CI->db->select('*')->from(FILES)->where("file_id IN ($subQuery) and file_hardcopy_status!='close' and final_draft_id!='' ", NULL, FALSE);
		$CI->db->order_by("file_update_date", 'desc');
        $query = $CI->db->get();
        return    $query->result();

    }
	public function get_not_recieved_files($file_selected_file_ids){
		$tbl_files = "ft_files";
		$query =   $this->db->query("select group_concat(file_id SEPARATOR ',') as not_recived_file_id from $tbl_files where file_id in (".$file_selected_file_ids.") and file_hardcopy_status!='received' and file_hardcopy_status!='working'");
        $rr =  $query->row_array();
		//echo $this->db->last_query();		
		return $rr['not_recived_file_id'];		
	}
}

