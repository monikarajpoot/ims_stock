<?php

class View_file_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function getFiles($section_id,$moveup_down,$section_id_search='')
    {
		$sub_type = '';
        if(!empty($moveup_down)) {
            $query = $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = " . emp_session_id());
            $rr = $query->row_array();
            $rt = explode(',', $rr['u_empid']);
        }
        if(isset($_GET['sn']) && $_GET['sn']=='cr') {
            $cr_empid = get_emp_by_role('9', '1');
            $cr_explod = explode(',', $cr_empid);
        }
		if($this->input->get('sstype') != '') {
			$sub_type = $this->input->get('sstype');
        }
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
        }
		if($moveup_down == '1'){
            $this->db->where_in('file_sender_emp_id',$rt);
		}else if($moveup_down == 'return'){
            $this->db->where_not_in('file_sender_emp_id',$rt);
            $this->db->where('file_return','1');
       }else if($moveup_down == 'reject'){
            $this->db->where_not_in('file_sender_emp_id',$rt);
            $this->db->where('file_return','3');
        }else if(isset($_GET['sn']) && $_GET['sn']=='cr'){
             $this->db->where_in('file_sender_emp_id',$cr_explod);
            $this->db->where('file_return !=','3');
        }else{
         //   $this->db->where('file_hardcopy_status !=','working');
        }
        $this->db->where('file_received_emp_id',emp_session_id());
        $this->db->where('file_hardcopy_status !=','working');
        $this->db->where('file_hardcopy_status !=','close');
		if($sub_type != ''){
			$this->db->where('section_file_categoty',$sub_type);
		}
		$this->db->order_by('file_id','desc');
		$query = $this->db->get($tbl_files);
      //  echo $this->db->last_query();
		return $query->result();
    }

    // RP
    public function getFiles_bycr($user_id)
    {
        $tbl_files = FILES;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES .'.*,dept_name_hi,district_name_hi');
        $this->db->from($tbl_files);
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');
        $rtt = 'file_received_emp_id in (SELECT emp_id FROM ft_employee WHERE role_id=9)';
        $this->db->where($rtt);
        $this->db->where("$tbl_files.file_hardcopy_status !=",'close');
        $this->db->where("$tbl_files.file_return != ",'2');
        $this->db->order_by("$tbl_files.file_id",'desc');
        $query = $this->db->get();
        //   echo $this->db->last_query();
        return $query->result();
    }
    // RP
    /* public function allfile_bycr($user_id)
    {
        $tbl_files = FILES;
        $this->db->select('*');
     //   $this->db->where('createfile_empid',$user_id);
        $this->db->where('file_hardcopy_status !=','close');
        $this->db->order_by('file_id','desc');
        $query = $this->db->get($tbl_files);
        $this->db->last_query();
        return $query->result();
    } */
	
	public function allfile_bycr($user_id, $year = '', $month = '', $section = '', $user = '')
    {
        $tbl_files = FILES;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES .'.*,dept_name_hi,district_name_hi');
        $this->db->from($tbl_files);
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');
        //$this->db->where('createfile_empid',$user_id);
		if($year != ''){
			$this->db->where("YEAR(file_created_date)",$year);
		}
		if($month != ''){
			$this->db->where("MONTH(file_created_date)",$month);
		}
		if($section != ''){
			$this->db->where("file_mark_section_id",$section);
		}
		if($user != ''){
			$this->db->where("createfile_empid",$user);
		}
        $this->db->where('createfile_empid !=','35');
        $this->db->where("$tbl_files.file_hardcopy_status !=",'close');
		$this->db->where("$tbl_files.file_return !=",'2');
        $this->db->order_by("$tbl_files.file_id",'desc');
        $query = $this->db->get();
       //echo $this->db->last_query();
        return $query->result();
    }
	
	public function allfile_bycr_tetmp($user_id1,$user2)
    {	
        $tbl_files = FILES;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES .'.*,dept_name_hi,district_name_hi');
        $this->db->from($tbl_files);
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');
      //  $this->db->where('createfile_empid',$user_id);
		$this->db->where("$tbl_files.file_hardcopy_status !=",'close');
        $this->db->where_in("$tbl_files.createfile_empid",array(210,211)); 
        $this->db->order_by("$tbl_files.file_id",'desc');
        $query = $this->db->get();
       //echo $this->db->last_query();
        return $query->result();
    }

    //for dealing assistant name RP
    public function get_DAname_old($section_id,$subuser=null )
    {	
		if(emp_session_id() == 63){
			$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = 23");
		}else{
			//$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".emp_session_id());
			if($subuser!=''){
				$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".$subuser);
			}else{
				$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".emp_session_id());
			}
		}
        $rr =  $query->row_array();
        $rt =  explode(',',$rr['u_empid']);
        $tbl_files = EMPLOYEES;
        $this->db->select('*');
        $this->db->where_in('emp_id',$rt);
        $query = $this->db->get($tbl_files);
        // echo   $this->db->last_query();
        return $query->result_array();
    }
	
	//for dealing assistant name Bij 17 12 2015 new
	public function get_DAname($section_id,$subuser=null )
    {	
		if(emp_session_id() == 63){
			$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = 23");
		}else{
			//$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".emp_session_id());
			if($subuser!=''){
				$user_level = get_emp_role_levele();				
				$so_incharg_id = get_so_incharge_of_da($subuser,$section_id);				
				if($user_level['emprole_level']==13){
					$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".$so_incharg_id);
				}else{
					$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".$subuser);
				}
			}else{
				$query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".emp_session_id());
			}
		}
        $rr =  $query->row_array();
        $rt =  explode(',',$rr['u_empid']);
        $tbl_files = EMPLOYEES;
        $this->db->select('*');
		$this->db->join('ft_employee_details', $tbl_files.'.emp_id = ft_employee_details.emp_id');
		$this->db->join('ft_emprole_master', $tbl_files.'.designation_id = ft_emprole_master.role_id');
		$this->db->where_in($tbl_files.'.emp_id',$rt);
		$this->db->where_not_in($tbl_files.'.designation_id',28,29,30,34,36,38);
		$this->db->where('emp_status', 1);
		$this->db->where('emp_is_retired', 0);
        $query = $this->db->get($tbl_files);
        // echo   $this->db->last_query();
        return $query->result_array();
    }

    public function getFileDetails($file_id)
    {
        $tbl1 = FILES;
        $tbl2 = SECTIONS;
        $tbl3 = EMPLOYEES;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $tbl6 = REMARK_MASTER;
        $tbl7 = STATE_MASTER;
        $tbl8 = FILES_OTHER_FEILDS;
        $this->db->select(FILES.'.*,section_name_hi,section_name_en,emp_id,emp_full_name,emp_full_name_hi,dept_name_hi,dept_name_en,district_name_hi,district_name_en,remark_title_hi,state_name_en,state_name_hi,state_id,file_upload,case_no,rti_application_fee,hearing_date_rti,pay_serial_no_rti,applicant_name,rti_applicant_contactno,old_registared_no');
        $this->db->from($tbl1);
        $this->db->join($tbl2, "$tbl2.section_id = $tbl1.file_mark_section_id",'left');
        $this->db->join($tbl3, "$tbl3.emp_id = $tbl1.file_received_emp_id",'left');
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl1.file_department_id",'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl1.file_district_id",'left');
        $this->db->join($tbl6, "$tbl6.remark_id = $tbl1.file_progress_status_id",'left');
        $this->db->join($tbl7, "$tbl7.state_id = $tbl1.file_state_id",'left');
        $this->db->join($tbl8, "$tbl8.f_file_id = $tbl1.file_id",'left');
        $this->db->where("$tbl1.file_id", $file_id);
        $query = $this->db->get();
        $this->db->last_query();
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else{
            return FALSE;
        }
    }
    //file log
    public function getFiles_log($file_id = null)
    {
        $this->db->where('file_id',$file_id);
        $this->db->order_by('flog_id','DESC');
        $this->db->from(FILES_LOG);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    //file Movement
    public function getFiles_movement($file_id = null)
    {
        $this->db->where('fmove_file_id',$file_id);
        $this->db->order_by('fmove_id','DESC');
        $this->db->from(FILES_MOVEMENT);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    //only use for dispatch section
    public function dispatch_getFiles($where_show = null)
    {
		$emp_session_id = emp_session_id();
        $query =   $this->db->query("select group_concat(under_emp_id SEPARATOR ',') as u_empid from ft_employee_hirarchi where emp_id = ".emp_session_id());
        $rr =  $query->row_array();
        $rt =  explode(',',$rr['u_empid']);
		$tbl_files_file = FILES;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select("$tbl_files_file.*,dept_name_hi,district_name_hi");
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl_files_file.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files_file.file_district_id",'left');
        //$this->db->where_in('file_mark_section_id','8');
        $this->db->where_in('file_received_emp_id',$emp_session_id);
        if($where_show == '1'){
            $this->db->where_in('file_sender_emp_id',$rt);}
        else {
            $this->db->where_not_in('file_sender_emp_id',$rt);
        }
        $this->db->where($tbl_files_file.'.file_hardcopy_status !=','close');
		if($this->input->get('section_id') != ''){
			$this->db->where($tbl_files_file.'.file_mark_section_id',$this->input->get('section_id'));
		}
		//echo $tbl_files_file;
        $this->db->order_by($tbl_files_file.'.file_id','desc');
        $query = $this->db->get($tbl_files_file);
        // echo  $this->db->last_query();
        return $query->result();
    }
	
	//this is use for only printing purpose as per 07-11 Susmita maams said
	public function dispatch_getFiles_for_print($where_show = null)
    {
        $tbl_files = FILES;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $tbl6 = FILES_DISPATCH;
        $this->db->select(FILES .'.*,dept_name_hi,district_name_hi,district_name_hi,district_name_en,dispatch_date');
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id",'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');
        $this->db->join($tbl6, "$tbl6.file_id = $tbl_files.file_id");
        $this->db->where($tbl_files.'.file_mark_section_id','14');
        $this->db->order_by($tbl_files.'.file_id','desc');
        $query = $this->db->get($tbl_files);
        // echo  $this->db->last_query();
        return $query->result();
    }
	
	
	/*18-09-2015 Get Sub user Files */
	public function getFiles_2($section_id,$moveup_down)
    {
	    $tbl_files = FILES;
        $this->db->select('*');
		if($moveup_down == '1'){
            $this->db->where_in('file_sender_emp_id',$rt);}
        else if($moveup_down == 'return'){
            $this->db->where_not_in('file_sender_emp_id',$rt);
            $this->db->where('file_return','1');
        }
		//echo emp_session_id();
		$this->db->where('file_received_emp_id',emp_session_id());
        $this->db->where('file_hardcopy_status !=','close');
		$this->db->order_by('file_id','desc');
		$query = $this->db->get($tbl_files);
		return $query->result();
    }
	
	public function getFiles_2_testing($section_id,$moveup_down)
    {
	    $tbl_files = FILES;
        $this->db->select('*');
		$empssection = empdetails(emp_session_id());
		$rcempid=$empssection[0]['emp_id'];
		$this->db->where('file_received_emp_id',$rcempid);
        $this->db->where('file_hardcopy_status !=','close');
		$this->db->order_by('file_id','desc');
		$query = $this->db->get($tbl_files);
		if($_GET['test']=='ab'){
			echo $this->db->last_query();
		}
		return $query->result();
    }
	/*18-09-2015 Get Sub user Files */
	
	/* Searching file in cr section for printing created - Rohit*/
	function files_search_cr($section_id = '', $search_date = ''){	
		$tbl_files = FILES;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES .'.*,dept_name_hi,district_name_hi');
        $this->db->from($tbl_files);
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');
        $this->db->where('file_mark_section_id',$section_id);
        $this->db->where("DATE_FORMAT(`file_mark_section_date`, '%d-%m-%Y') = ",$search_date);
        $this->db->where("$tbl_files.file_unit_level",'50');
        $this->db->where("$tbl_files.file_return",'0');
        $this->db->where("$tbl_files.file_hardcopy_status",'not');
        $this->db->order_by("$tbl_files.file_id",'desc');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
        
	}
	
	public function send_getFiles()
    {
        $session1 = emp_session_id();
        $tbl_files = FILES;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES .'.*,dept_name_hi,district_name_hi');
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');
        $this->db->where('file_sender_emp_id',$session1);
        $this->db->where('file_hardcopy_status','not');
        $this->db->order_by('file_id','desc');
        $query = $this->db->get($tbl_files);
       // echo $this->db->last_query();
        return $query->result();
    }
	public function get_employee_alloted_section($section_id = '' )
	{
		//echo "asdsa ".$section_id;
		$query =   $this->db->query( "select group_concat(section_name_hi SEPARATOR ',') as section_name_hi from ft_sections_master where section_id in ( $section_id  )" );
			
        $results =  $query->row_array();
		$data = array();
		foreach($results as $key=>$res ){
			$data[] = $res;
			
		}
		return $data;
	}

	    public function allfile_ofcsu($user_id, $year = '', $month = '', $section = '', $user = '')
    {
        $tbl_files = FILES;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $tbl6 = EMPLOYEES;
        $this->db->select(FILES .'.*,dept_name_hi,district_name_hi');
        $this->db->from($tbl_files);
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl_files.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl_files.file_district_id",'left');
        $this->db->join($tbl6, "$tbl6.emp_id = $tbl_files.file_received_emp_id",'left');
        //$this->db->where('createfile_empid',$user_id);
        if($year != ''){
            $this->db->where("YEAR(file_created_date)",$year);
        }
        if($month != '' && $month != date('m')){ // this will add becoz display all cus file .
            $this->db->where("MONTH(file_created_date)",$month);
        }
        if($section != ''){
            $this->db->where("file_mark_section_id",$section);
        }
        if($user != ''){
            $this->db->where("createfile_empid",$user);
        }
        $this->db->where("$tbl6.role_id",'39');
        $this->db->where("$tbl_files.file_hardcopy_status !=",'close');
        $this->db->where("$tbl_files.file_return !=",'2');
        $this->db->order_by("$tbl_files.file_id",'desc');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
		
}

