<?php 

class Payroll_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    public function getpayroll() {
        $this->db->select('*');
        $query = $this->db->get('ft_pay_register');
    //  echo  $this->db->last_query();
        return $query->row();
    }
     public function getEmployeeLeave() {
        $employee_leave = ft_pay_register;
        $employee = EMPLOYEES;
        $this->db->select($employee . '.emp_id,emp_unique_id,emp_full_name,emp_email,emp_mobile_number,emp_full_name_hi,role_id');
        $this->db->from($employee);
        $this->db->where('role_id !=', 1);
        $this->db->join($employee_leave, $employee_leave . '.pay_emp_id=' . $employee . '.emp_unique_id');
        $this->db->order_by("designation_id", "ASC");
		$this->db->order_by("emp_full_name_hi", "ASC");
		$query = $this->db->get();
        //$this->db->last_query();
        return $rows = $query->result();
    }
    function salary_cate()
    {

    	$query = $this->db->get("ft_pay_salary_category");
        //$this->db->last_query();
        return $rows = $query->result();
    }
}

?>