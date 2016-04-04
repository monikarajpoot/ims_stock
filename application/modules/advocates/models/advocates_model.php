<?php

class Advocates_model extends CI_Model {

 	function __construct() {
        parent::__construct();
    }
	
	function get_advocate_list(){
		$tbl_advocate = ADVOCATE_MASTER;
        $tbl4 = ADVOCATE_SERVICE_RECORD;
        //$this->db->select('.*,dept_name_hi,district_name_hi');
        $this->db->join($tbl4, "$tbl4.asr_scm_id = $tbl_advocate.scm_id", 'inner');
		$this->db->where($tbl_advocate.'.status','1');
        $query = $this->db->get($tbl_advocate);
       //  echo $this->db->last_query();
        return $query->result_array();
	}
	
	function getadvocate_details($id ){
		$tbl_advocate = ADVOCATE_MASTER;
        $tbl4 = ADVOCATE_SERVICE_RECORD;
        //$this->db->select('.*,dept_name_hi,district_name_hi');
        $this->db->join($tbl4, "$tbl4.asr_scm_id = $tbl_advocate.scm_id", 'inner');
		$this->db->where($tbl_advocate.'.status','1');
		$this->db->where($tbl_advocate.'.scm_id',$id);
        $query = $this->db->get($tbl_advocate);
       //  echo $this->db->last_query();
        return $query->result_array();
	}
	
	function get_advocate_post_single($id ){
		$tbl_advocate_post = ADVOCATE_POSTING;
		$this->db->where($tbl_advocate_post.'.advocate_posting_id',$id);
        $query = $this->db->get($tbl_advocate_post);
       //  echo $this->db->last_query();
        return $query->result_array();
	}
	function get_advocate_post( ){
		$tbl_advocate_post = ADVOCATE_POSTING;
		//$this->db->where($tbl_advocate_post.'.advocate_posting_id',$id);
        $query = $this->db->get($tbl_advocate_post);
       //  echo $this->db->last_query();
        return $query->result_array();
	}
	
	 
}

