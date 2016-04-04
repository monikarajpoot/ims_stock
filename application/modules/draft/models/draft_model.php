<?php

class Draft_model extends CI_Model {

 	function __construct() {
        parent::__construct();
    }
	
	public function get_details($panji, $section, $year)
	{
		$tbl = FILES_SECTION;
        $this->db->select('file_id');
		$this->db->from($tbl);      
		// for searching disptached files
		if($panji != null && isset($panji) && $section != null){
			$where = array(
				'section_id ' => $section,
				'section_number ' => $panji,
				'YEAR(file_created_date) ' => $year,
            );
            $this->db->where($where);
        }
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->row_array();
		
	}
	
	public function get_draft($type)
	{
		$emp_id = $this->session->userdata("emp_id");
        $this->db->select('*');
		$this->db->from(DRAFT);      
		if($type != null ){
			if($type == 'inbox'){
				$where = array(
					'draft_reciever_id' => $emp_id,
					'draft_is_finalize' => '0',
					'draft_status' => '3',
				);
			}
			if($type == 'send'){
				$where = array(
					'draft_sender_id ' => $emp_id,
					'draft_is_finalize' => '0',
					'draft_status' => '3',
				);
			}
			if($type == 'working'){
				$where = array(
					'draft_creater_emp_id' => $emp_id,
					'draft_status' => '2',
				);
			}
			if($type == 'finished'){
				$where = array(
					'draft_creater_emp_id' => $emp_id,
					'draft_is_finalize' => '1',
					'draft_status' => '3',
				);
			}
			
           $this->db->where($where); 
           $this->db->order_by('draft_create_date', 'DESC'); 
        }
        $query = $this->db->get();
		//echo $this->db->last_query();
        return  $query->result();
	}
	
	public function get_single_draft($id)
	{
        $this->db->select('*');
		$this->db->from(DRAFT);      
	    $this->db->where('draft_id',$id); 
	    $this->db->order_by('draft_create_date', 'DESC'); 
        $query = $this->db->get();
		//echo $this->db->last_query();
        return  $query->row_array();
	}
	
	public function get_single_draft_log($id)
	{
        $this->db->select('*');
		$this->db->from(DRAFT_LOG);      
		$this->db->where('draft_log_id',$id); 
        $query = $this->db->get();
		//echo $this->db->last_query();
        return  $query->row_array();
	}
	
	/*public function get_compare_record($id, $draft_id = null)
	{
        $this->db->select('*');
		$this->db->from(DRAFT_LOG);      
	    $this->db->where('draft_log_draft_id',$draft_id); 
		$this->db->limit('2'); 
		$this->db->order_by('draft_log_id','DESC'); 
        $query = $this->db->get();
		//echo $this->db->last_query();
        return  $query->result();
	}*/
	public function get_compare_record($id, $draft_id = null)
	{
        $this->db->select('*');
		$this->db->from(DRAFT_LOG);      
	    $this->db->where('draft_log_draft_id',$draft_id); 
		$this->db->limit('2'); 
		$this->db->order_by('draft_log_id','DESC'); 
        $query = $this->db->get();
		//echo $this->db->last_query();
        return  $query->result();
	}
	
	public function get_related_draft($id)
	{
        $this->db->select('*');
		$this->db->from(DRAFT_LOG);      
	    $this->db->where('draft_log_draft_id',$id); 
	    $this->db->order_by('draft_log_create_date', 'DESC'); 
        $query = $this->db->get();
		//echo $this->db->last_query();
        return  $query->result();
	}
	
	public function get_draft_employees($id)
	{
		$tbl1 = DRAFT_LOG;
		$tbl2 = EMPLOYEES;
        $this->db->select('DISTINCT(draft_log_creater)');
        $this->db->join($tbl2, "$tbl1.draft_log_creater = $tbl2.emp_id");
		$this->db->from(DRAFT_LOG);      
	    $this->db->where('draft_log_draft_id',$id); 
	    $this->db->where('designation_id BETWEEN 2 and 8'); 
	    $this->db->order_by('designation_id', 'DESC'); 
        $query = $this->db->get();
		//echo $this->db->last_query();
        return  $query->result();
	}
	
	
}

