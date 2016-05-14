<?php
function get_officer_for_sign($name , $designation = null, $language = null ,$us_id = null, $attr = null)
{
	$CI = & get_instance();
	//$CI->db->select('emp_full_name_hi');
	$CI->db->where('emp_status',1);
	if(is_array($designation)){
		//$designation = implode(',',$designation);
		$CI->db->where_in('designation_id', $designation);
	}else {
		$CI->db->where('designation_id',$designation);
	}
	$CI->db->where('emp_is_retired',0);
	$CI->db->order_by('designation_id','desc');
	$query = $CI->db->get(EMPLOYEES);
	//echo $CI->db->last_query();
	$results = $query->result();
	$dropdown = '<select name="'.$name.'" class="'.$name.'" id="'.$name.'"  '.$attr.' >'."\n";
	$selected = '';
	$dropdown .= '<option value = "" > --Select-- </option>';
	//pre($results );
	foreach($results as $result){
		$selected = '';
		if($us_id == $result->emp_id){
			$selected = 'selected = "selected" ';
		}
		
        $dropdown .= '<option  '.$selected.' value="'.$result->emp_id.'">';
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

function get_officer_information($emp_id , $language = null)
{
	$CI = & get_instance();
	//$CI->db->select('emp_full_name_hi');
	$CI->db->where('emp_status',1);
	$CI->db->where('emp_id',$emp_id);
	
	$query = $CI->db->get(EMPLOYEES);
	$results = $query->row();
	if(!empty($language)){ 
			return $results->emp_full_name ;
			
		}else{
			return $results->emp_full_name_hi ;
			
		}
}



function get_officer_dign($officer_id )
{
	$CI = & get_instance();
	//$CI->db->select('emp_full_name_hi');
	$CI->db->where('emp_status',1);
	$CI->db->where('emp_id',$officer_id);
	
	$query = $CI->db->get(EMPLOYEES);
	$results = $query->row();
	//echo $results->designation_id ; die;
	return get_officer_designation($results->designation_id);

    /*** and return the completed dropdown ***/
  
}

function get_officer_emp_id($field_name , $designation = null,$officer_name )
{
	$CI = & get_instance();
	//$CI->db->select('emp_full_name_hi');
	$CI->db->where('emp_status',1);
	$CI->db->where('designation_id',$designation);
	
	$query = $CI->db->get(EMPLOYEES);
	$results = $query->result();
	foreach($results as $result){
	
			if( $officer_name == $result->emp_full_name_hi  ){
					return get_officer_for_note_emp_id($result->emp_full_name_hi );
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

function get_officer_for_note_emp_id($name ){
	$CI = & get_instance();
	$CI->db->where('role_id',$designation_id);
	$query = $CI->db->get(EMPLOYEE_MASTER_NUMBER_POST);
	return $results = $query->row();
	return $results->endm_designation_hin; 
}