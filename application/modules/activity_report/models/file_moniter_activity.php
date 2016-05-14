<?php
class File_moniter_activity extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function getFiles($section_id = null ,$status = null ,$empid = null, $s_date = null, $e_date = null, $on = null)
    {			
		$section_id = explode(',', $section_id);		
        $action ='';
		$lvl='';
		if(isset($_GET['a'])){
			$action = $_GET['a'];
		}
		if(isset($_GET['lvl'])){
			$lvl = $_GET['lvl'];
		}
		$file_officer_ids=get_officer_emp_ids();
		if($lvl=='section_dispose'){
			$sql="SELECT * FROM `ft_files` as files inner join ft_file_dispatch as file_dispetch on file_dispetch.file_id= files.file_id and issection_despose=1 WHERE files.file_mark_section_id IN ($section_id) AND (files.file_hardcopy_status = 'close') AND files.file_return = '2'";
			$query9	 = $this->db->query($sql);
			return $section_dispose= $query9->result();
			//pre($section_dispose);
		}else if($lvl=='section_dis'){
			$sql="select * FROM ft_files where `file_return` ='2' and (file_hardcopy_status = 'received' or file_hardcopy_status = 'working' or file_hardcopy_status = 'not')";
			$query9	 = $this->db->query($sql);
			return $section_dispose= $query9->result();
		}else if($lvl=='dis_sec_cloase_file'){
			$sql="select * FROM ft_files where `file_return` ='2' and file_hardcopy_status = 'close'";
			$query9	 = $this->db->query($sql);
			return $section_dispose= $query9->result();
		}else if($lvl=='sent_dipatch_section'){
			$where = "file_mark_section_id IN(".implode(',',$section_id).") ";
			$sql="SELECT * FROM `ft_files` as files inner join ft_file_dispatch as file_dispetch on file_dispetch.file_id= files.file_id and issection_despose=0 and $where AND (files.file_hardcopy_status = 'close') AND files.file_return = '2'";
			$query9	 = $this->db->query($sql);
			
		}else if($lvl=='list_all_dipatch_section_files'){
			$sql="select * FROM ft_files where `file_return` ='2'";
			$query9	 = $this->db->query($sql);
			return $section_dispose= $query9->result();
		}else if($lvl=='view_ofcr_deald_files'){
			$empid = $_GET['empid'];	
			$sectionid=null;
			return total_work_by_officer_emp('list_of_all_files_deals_by_user',$empid,$sectionid);
		}else{
				
				$tbl_files = FILES;
				$this->db->select('*');
				if(@$_GET['secid']==21){
					//$where = "ps_moniter_date !='' && ps_moniter_date!='0000-00-00'";
					$this->db->where('ps_moniter_date !=',"");
					$this->db->where('ps_moniter_date !=',"0000-00-00");
				}else{
					$where = "file_mark_section_id IN(".implode(',',$section_id).") ";
					$this->db->where_in($where);
				}
				if($status == 'received'){
					//$where1 = "(file_hardcopy_status ='received')";
					$where1 = "(file_hardcopy_status ='received' or file_hardcopy_status ='working')";
					$where1 .= "and file_mark_section_id IN(".implode(',',$section_id).") ";
				}else if($status == 'working'){
					//$where1 = "(file_hardcopy_status ='working')";
					$where1 = "(file_hardcopy_status ='received' or file_hardcopy_status ='working')";
					$where1 .= "and file_mark_section_id IN(".implode(',',$section_id).") ";
				}else if($status == '2' && $action=='dispetch'){
					//echo 'add';
					$where1 = "(file_hardcopy_status!='close')";
					//$where1 .= "and file_mark_section_id IN(".implode(',',$section_id).") ";
				}else if($status == '2' && $action=='dispose'){
					$where1 = "(file_hardcopy_status = 'close')";
					//$where1 .= "and file_mark_section_id IN(".implode(',',$section_id).") ";
				}else{
					$where1 = "file_hardcopy_status ='not' ";
					$where1 .= "and file_mark_section_id IN(".implode(',',$section_id).") ";
					if($lvl=='section'){
						$where1.="and file_received_emp_id not in($file_officer_ids)";
					}else if($lvl=='officer'){
						$where1.="and file_received_emp_id in($file_officer_ids)";
					}
					//if()//
				}
				if($empid == null) {
					if ($status != null && $status != '2' && $on == '') {
						$this->db->where($where1);
						$this->db->where('file_return !=', '2');
					}else if($status == '2' && ($action=='dispetch' || $action=='dispose') && $on == ''){
						$this->db->where($where1);
						$this->db->where("file_return", "2");
					}else if ($status == '2' && $on == '') {
						$this->db->where('file_return', $status);
					} else if($on != '' && $status != null ){
						$this->db->where("file_return", $on);	
						$this->db->where("file_hardcopy_status", $status);	
					}
				}else{
				
					if(@$_GET['secid']==21){
						//$this->db->where(array('ps_moniter_date!='=>'','ps_moniter_date!='=>'0000-00-00'));
						$where = "ps_moniter_date !='' && ps_moniter_date!='0000-00-00' AND file_received_emp_id='$empid' && file_hardcopy_status!='close'";
					}else{
                        if(isset($_GET['secid'])){
                            $where = "file_mark_section_id IN(".implode(',',$section_id).") AND file_received_emp_id='$empid' && file_hardcopy_status!='close'";
                        }else{
                            $where = "file_received_emp_id = '$empid' && file_hardcopy_status!='close'";
                        }
					}
					$this->db->where($where);
					if($status != null) {
						$this->db->where($where1);
					}
				}
				if($s_date != null && $e_date != null){
					$this->db->where("(date(file_update_date) > '$e_date' && date(file_update_date) <= '$s_date')");
				}
				if($s_date == null && $e_date != null){
					$this->db->where("date(file_update_date) <= '$e_date'");
				}
				$this->db->order_by('file_update_date','asc');
				$query = $this->db->get($tbl_files);
				$result = $query->result();
				//pre($result);
				 //echo $this->db->last_query();
				return $result;
		}
    }

	public function getFiles_log($empid = null, $s_date = null, $e_date = null, $action = null,  $status = null)
    {
        $tbl_files = FILES;
        $tbl_files_log = FILES_LOG;
		$this->db->select('*');
		$this->db->join($tbl_files_log, "$tbl_files_log.file_id = $tbl_files.file_id");
		
		if($action != '' && $empid != ''){
			if($action == 'marked'){
				$this->db->where($tbl_files_log.".to_emp_id", "$empid");
				$this->db->where("file_hardcopy_status", "not");
			} else if($action == 'worked'){
				$this->db->where($tbl_files_log.".from_emp_id", "$empid");
				//$this->db->where("", "");
			} else if($action == 'received'){
				$this->db->where($tbl_files_log.".to_emp_id", "$empid");
				$this->db->where("file_hardcopy_status", "received");
			} else if($action == 'all'){
				$where = "(to_emp_id = '$empid' OR from_emp_id = '$empid') and (file_hardcopy_status != 'close')";
				$this->db->where($where);
				//$this->db->where("date(`flog_created_date`)", "$date");
			}
		}
		//for dispact reivce and not reicve with date 
						
		if($s_date != null && $e_date != null){
			$this->db->where("(date(flog_created_date) <= '$e_date' && date(flog_created_date) >= '$s_date')");
		}
		if($s_date != null && $e_date == null){
			$this->db->where("date(`flog_created_date`)", "$s_date");
		}
		$this->db->group_by($tbl_files.'.file_id');
		$this->db->order_by($tbl_files.'.file_id','desc');
		$query = $this->db->get($tbl_files);
		$result = $query->result();
		//pre($result);
		//echo  $this->db->last_query();
		return $result;
    }
	
	
	public function getFiles_cr($sec_id = null, $empid = null, $s_date = null, $e_date = null,  $type = null)
    {
        $tbl_files = FILES;
        $tbl_files_log = FILES_LOG;
		$this->db->select('*');
		
		if($type == 'new'){
			$this->db->where("old_registared_no", '0');
		} else if($type == 'old'){
			$this->db->where("old_registared_no !=", '0');
		} else if($type == 'return') {
			$this->db->where("(file_received_emp_id = '$empid' and (file_return = '3' OR file_return = '1'))");
		} else{
			
		}
		if($sec_id != '' ){
			$this->db->where("file_mark_section_id", $sec_id);
		}
		if($empid != ''){
			$this->db->where("createfile_empid", $empid);
		}
		//for dispact reivce and not reicve with date 
					
		if($s_date != null && $e_date != null){
			$this->db->where("(date(file_created_date) >= '$s_date' && date(file_created_date) <= '$e_date')");
		}
		
		$this->db->order_by('file_update_date','asc');
		$query = $this->db->get($tbl_files);
		$result = $query->result();
		//pre($result);
		//echo  $this->db->last_query();
		return $result;
    }
	
    function get_employee_role_sectionwise($task,$condition){
		if($task=='officer'){
			$sql="select emp.emp_id,emp.role_id,emp.designation_id,
				emp_detail.emp_detail_gender,emp.emp_full_name,emp.emp_full_name_hi,
				emp.emp_section_id from ft_employee as emp 
				INNER JOIN ft_employee_details as emp_detail 
				on emp.emp_id=emp_detail.emp_id where $condition";
		}
		$query9	 = $this->db->query($sql);
		$section_dispose= $query9->result_array();
		//pre($section_dispose);
		return $section_dispose;
	}

}

