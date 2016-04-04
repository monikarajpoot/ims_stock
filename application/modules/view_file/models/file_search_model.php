<?php

class File_search_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function file_search_sectionno($searchtype = null, $value1 = null , $value2 = null) {
		
        $tbl1 = FILES;
        $tbl3 = EMPLOYEES;
        $tbl6 = FILES_SECTION;
		$tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES . '.*,'.EMPLOYEES.'.emp_full_name,'.FILES_SECTION.'.section_number,dept_name_hi,district_name_hi');
        $this->db->from($tbl6);
		$this->db->join($tbl1, "$tbl6.file_id = $tbl1.file_id",'INNER JOIN');
        $this->db->join($tbl3, "$tbl3.emp_id = $tbl1.file_received_emp_id", 'INNER JOIN');
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl1.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl1.file_district_id",'left');
        if($searchtype != null && isset($searchtype) && $searchtype == 1){
          //  $this->db->where("$tbl1.file_mark_section_id",$value1);
			$mark_section_id = $this->input->post('mark_sections');
            $this->db->where("$tbl6.section_id", $value1);
            $this->db->where("$tbl6.section_number", $value2);

        }
        $this->db->order_by("$tbl1.file_id", 'desc');
        $query = $this->db->get();
      // echo $this->db->last_query().br();
        return $query->result(); 
    }
	
	function file_search_sectionno_cr($searchtype = null, $value1 = null , $value2 = null) {
		$cr_section_ids= get_cr_emp_id(1);
        $tbl1 = FILES;
        $tbl3 = EMPLOYEES;
        $tbl6 = FILES_SECTION;
		$tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES . '.*,'.EMPLOYEES.'.emp_full_name,'.FILES_SECTION.'.section_number,dept_name_hi,district_name_hi');
        $this->db->from($tbl6);
		$this->db->join($tbl1, "$tbl6.file_id = $tbl1.file_id",'INNER JOIN');
        $this->db->join($tbl3, "$tbl3.emp_id = $tbl1.file_received_emp_id", 'INNER JOIN');
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl1.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl1.file_district_id",'left');
        if($searchtype != null && isset($searchtype) && $searchtype == 1){
          //  $this->db->where("$tbl1.file_mark_section_id",$value1);
			$mark_section_id = $this->input->post('mark_sections');
            $this->db->where("$tbl6.section_id", $value1);
            $this->db->where("$tbl6.section_number", $value2);
			if(checkUserrole()!=25 && checkUserrole()!=12 && in_array(emp_session_id(),$cr_section_ids['id_array'])){
				//$this->db->where("$tbl6.filemarked_section_id", $mark_section_id);
                $this->db->where("$tbl1.file_mark_section_id", $mark_section_id);
			}
            /*if($value1==1){
			$where = "(ft_files.file_sender_emp_id='210' or ft_files.file_sender_emp_id='210' or ft_files.file_sender_emp_id='211' or ft_files.file_sender_emp_id='213')"; 
			$this->db->where($where);
			}*/
        }
        $this->db->order_by("$tbl1.file_id", 'desc');
        $query = $this->db->get();
      // echo $this->db->last_query().br();
        return $query->result(); 
    }
	
	function file_search_lists($searchtype = null, $value1 = null , $value2 = null, $bul = '', $floor = '') {
        $tbl1 = FILES;
        $tbl3 = EMPLOYEES;
        $tbl6 = FILES_SECTION;
		$tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES . '.*,'.EMPLOYEES.'.emp_full_name,'.FILES_SECTION.'.section_number,dept_name_hi,district_name_hi');
        $this->db->from($tbl1);
        $this->db->join($tbl3, "$tbl3.emp_id = $tbl1.file_received_emp_id", 'left');
        $this->db->join($tbl6, "$tbl6.file_id = $tbl1.file_id");
		$this->db->join($tbl4, "$tbl4.dept_id = $tbl1.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl1.file_district_id",'left');
        if($searchtype != null && isset($searchtype) && $searchtype == 1){
           // $this->db->where("$tbl1.file_mark_section_id",$value1);
            $this->db->where("$tbl6.section_id", $value1);
            $this->db->where("$tbl6.section_number", $value2);
        }
		if($bul != ''){
			$this->db->where("$tbl4.building_name", $bul);
		}
		if($floor != ''){
			$this->db->where("$tbl4.building_floor", $floor);
		}
        $this->db->order_by("$tbl1.file_department_id", 'ASC');
        // $this->db->order_by("$tbl4.dept_name_hi", 'ASC');
        $query = $this->db->get();
        // echo $this->db->last_query().br();
		if($query->num_rows() > 0){
			return $query->result();
		} else {
			return false;
		}
        
    }

    function file_search($searchtype = null, $value1 = null , $value2 = null) {
        $value123 = explode(',',$value1);
		$emp_section = getEmployeeSection();
		$tbl1 = FILES;
        $tbl3 = EMPLOYEES;
		$tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $this->db->select(FILES . '.*,emp_full_name,dept_name_hi,district_name_hi');
		$this->db->from($tbl1);
        $this->db->join($tbl3, "$tbl3.emp_id = $tbl1.file_received_emp_id", 'left');
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl1.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl1.file_district_id",'left');
       
		if($searchtype != null && isset($searchtype) && $searchtype == 2){
            $this->db->like("$tbl1.case_parties", $value1);
        }
        if($searchtype != null && isset($searchtype) && $searchtype == 3){
            $this->db->like("$tbl1.file_uo_or_letter_no", $value1);
        }
        if($searchtype != null && isset($searchtype) && $searchtype == 4){
            $this->db->where("$tbl1.file_uo_or_letter_date", get_date_formate($value1,'Y-m-d'));
        }
        if($searchtype != null && isset($searchtype) && $searchtype == 6){
            $this->db->where_in("$tbl1.file_id", $value123);
        }
        if($searchtype != null && isset($searchtype) && $searchtype == 5){
            $this->db->where('MONTH(file_created_date)', $value1);
            $this->db->where('YEAR(file_created_date)', date("Y") );
        }
        if($searchtype != null && isset($searchtype) && $searchtype == 8){
            $this->db->like("$tbl1.file_subject", $value1);
        }
        if($searchtype != null && isset($searchtype) && $searchtype == 9){
            $where = array(
                'date(file_update_date) >= ' => date('Y-m-d', strtotime($value1)),
                'date(file_update_date) <= ' => date('Y-m-d', strtotime($value2))
            );
            $this-> db ->where($where);
        }
        if($searchtype != null && isset($searchtype) && $searchtype == 10){
            $where = array(
                'date(file_update_date) >= ' => date('Y-m-d', strtotime($value1)),
                'date(file_update_date) <= ' => date('Y-m-d', strtotime($value2))
            );
            $this->db->where($where);
        }
		// for searching disptached files
		if($searchtype != null && isset($searchtype) && $searchtype == 11){
            if($value2 == 'close'){
				$final_value  = 'close';
			} else if($value2 == 'not_received'){
				$final_value  = 'not';
			} else if($value2 == 'received'){
				$final_value  = 'received';
			}
			$where = array(
				'date(`file_update_date`)' => date('Y-m-d', strtotime($value1)),
				'file_mark_section_id ' => $this->input->post('sections_all'),
				'file_hardcopy_status ' => $final_value,
				'file_return ' => '2',
            );
            $this->db->where($where);
        }
        if($searchtype != null && isset($searchtype) && $searchtype == 12){
            $this->db->where('MONTH(ps_moniter_date)', $value1);
            $this->db->where('YEAR(ps_moniter_date)', $value2);
        }

        if($searchtype != null && isset($searchtype) && $searchtype == 'psmrk'){
            $this->db->where("$tbl1.ps_mark_file !=", '');
            $this->db->where("$tbl1.ps_mark_file", $value1);
        }

      //  $this->db->order_by("$tbl1.file_id", 'desc');
        $query = $this->db->get();
     //echo  $this->db->last_query();
        return $query->result();
    }
//search foe case no
    function file_search_caseno($searchtype = null, $value1 = null , $value2 = null) {
        $tbl1 = FILES;
        $tbl3 = EMPLOYEES;
        $tbl6 = FILES_OTHER_FEILDS;
        $this->db->select(FILES . '.*,'.EMPLOYEES.'.emp_full_name,'.FILES_OTHER_FEILDS.'.case_no');
        $this->db->from($tbl1);
        $this->db->join($tbl3, "$tbl3.emp_id = $tbl1.file_received_emp_id", 'left');
        $this->db->join($tbl6, "$tbl6.f_file_id = $tbl1.file_id");
        if($searchtype != null && isset($searchtype) && $searchtype == 7){
            $where = "FIND_IN_SET('" . $value1 . "', case_no)";
            $this->db->where($where);
        }
        $this->db->order_by("$tbl1.file_id", 'desc');
        $query = $this->db->get();
       // echo $this->db->last_query();
        return $query->result();
    }
    function file_search_emp_section_wise($searchtype = null, $filter_section_emp_wise = null,$empid_secid = null, $srch_frm_dt = null, $srch_to_dt = null) {
        $tbl1 = FILES;
        $tbl3 = EMPLOYEES;
        $tbl6 = FILES_OTHER_FEILDS;
        $tbl4 = DEPARTMENTS;
        $tbl5 = DISTRICT;
        $tbl7 = SECTIONS;
        $this->db->select(FILES . '.*,'.EMPLOYEES.'.emp_full_name,'.FILES_OTHER_FEILDS.'.case_no,dept_name_hi,district_name_hi');
        $this->db->from($tbl1);
        $this->db->join($tbl3, "$tbl3.emp_id = $tbl1.file_received_emp_id", 'left');
        $this->db->join($tbl6, "$tbl6.f_file_id = $tbl1.file_id");
        $this->db->join($tbl4, "$tbl4.dept_id = $tbl1.file_department_id", 'left');
        $this->db->join($tbl5, "$tbl5.district_id = $tbl1.file_district_id",'left');
        $this->db->join($tbl7, "$tbl7.section_id = $tbl1.file_mark_section_id");
        if($filter_section_emp_wise=='emp'){
            $where = "(file_received_emp_id=$empid_secid || file_sender_emp_id=$empid_secid) && date(file_update_date)>='".date('Y-m-d',strtotime($srch_frm_dt))."' and date(file_update_date) <='".date('Y-m-d', strtotime($srch_to_dt))."'";
        }else{
            $where = "(file_mark_section_id=$empid_secid) && date(file_update_date)>='".date('Y-m-d',strtotime($srch_frm_dt))."' and date(file_update_date) <='".date('Y-m-d', strtotime($srch_to_dt))."'";
        }
        $this->db->where($where);
        $this->db->order_by("$tbl1.file_id", 'desc');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

	 function auto_search_file($searchtype = null, $value1 = null , $value2 = null) {
		 
        $query2 = $this->db->query("SELECT file_subject,case_parties,case_no,file_id from ft_files left join ft_files_other_feilds on ft_files.file_id = ft_files_other_feilds.f_file_id where ft_files.file_id =".$value1);
        $res_array1 =  $query2->result_array();

        // $case_parties_array =   explode('-',$res_array1[0]['case_parties']);
        $case_no_array =   explode('/',$res_array1[0]['case_no']);

        $tbl1 = FILES;
        $tbl3 = EMPLOYEES;
        $tbl6 = FILES_OTHER_FEILDS;
        $this->db->select(FILES . '.*,'.EMPLOYEES.'.emp_full_name,'.FILES_OTHER_FEILDS.'.case_no');
        $this->db->from($tbl1);
        $this->db->join($tbl3, "$tbl3.emp_id = $tbl1.file_received_emp_id", 'left');
        $this->db->join($tbl6, "$tbl6.f_file_id = $tbl1.file_id");
        $this->db->where("$tbl1.file_subject", $res_array1[0]['file_subject']);
     //   if($case_parties_array[0] != null || $case_parties_array[0] != ''){
     //       $this->db->or_where("$tbl1.case_parties", $res_array1[0]['case_parties']);
     //   }
        if($case_no_array[0] != null || $case_no_array[0] != '') {
            $where = "FIND_IN_SET('" . $res_array1[0]['case_no'] . "', $tbl6.case_no)";
            $this->db->or_where($where);
        }
      //  $where = "(file_received_emp_id = ".emp_session_id()." or file_hardcopy_status = 'close')";
       // $this->db->where($where);
        $this->db->order_by("$tbl1.file_id", 'desc');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
	
}

