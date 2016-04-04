<?php
function get_officer_for_sign($name , $designation = null ,$emp_section_id =null, $language = null)
{
	$CI = & get_instance();
	//$CI->db->select('emp_full_name_hi');
	$CI->db->where('emp_status',1);
	$CI->db->where('designation_id',$designation);
	$CI->db->where('emp_is_retired',0);
	$query = $CI->db->get(EMPLOYEES);
	$results = $query->result();
	$dropdown = '<select name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	$selected = '';
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
			
		if (strpos( $result->emp_section_id ,$emp_section_id) !== false) {
			$selected = 'selected';
		}
        $dropdown .= '<option  '.$selected.'>';
		if(!empty($language)){ 
			$dropdown .= $result->emp_full_name ;
			
		}else{
			$dropdown .= $result->emp_full_name_hi ;
			
		}
		 $dropdown .= '</option>'."\n";
	}
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
}
function get_officer_for_sign_dign($ddl_name , $designation = null,$officer_name )
{
	$CI = & get_instance();
	//$CI->db->select('emp_full_name_hi');
	$CI->db->where('emp_status',1);
	$CI->db->where('designation_id',$designation);
	
	$query = $CI->db->get(EMPLOYEES);
	$results = $query->result();
	foreach($results as $result){
	
			if( $officer_name == $result->emp_full_name_hi  ){
					return get_officer_designation($result->designation_id);
			}
		
	}
    /*** and return the completed dropdown ***/
  
}
function get_officer_designation($designation_id = null ){
	$CI = & get_instance();
	$CI->db->where('role_id',$designation_id);
	$query = $CI->db->get(EMPLOYEE_MASTER_NUMBER_POST);
	$results = $query->row();
	return $results->endm_designation_hin; 
}
