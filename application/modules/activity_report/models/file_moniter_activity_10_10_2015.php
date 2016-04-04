<?php

class File_moniter_activity extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getFiles($section_id = null ,$status = null ,$empid = null)
    {
        $tbl_files = FILES;
        $this->db->select('*');
        $this->db->where_in('file_mark_section_id',$section_id);


        if($status == 'receive'){
            $where1 = "(file_hardcopy_status ='working' or file_hardcopy_status ='received')";
        }else{
            $where1 = "file_hardcopy_status ='not'";
        }
        if($empid == null) {
            if ($status != null && $status != '2') {
                $this->db->where($where1);
                $this->db->where('file_return !=', '2');
            } else if ($status == '2') {
                $this->db->where('file_return', $status);
            }
        }else
        {
            $where = "file_mark_section_id ='$section_id' AND file_received_emp_id='$empid'";
            $this->db->where($where);
            if($status != null) {
                $this->db->where($where1);
            }
        }
        $this->db->order_by('file_id','desc');
        $query = $this->db->get($tbl_files);
        //  echo  $this->db->last_query();
        return $query->result();
    }

}

