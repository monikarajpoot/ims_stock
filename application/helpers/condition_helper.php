<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @ Function Name      : pr
 * @ Function Params    : $data {mixed}, $kill {boolean}
 * @ Function Purpose   : formatted display of value of varaible
 * @ Function Returns   : foramtted string
 */

function check_user_section()
{
	$CI = & get_instance();
	$emp_id = $CI->session->userdata('emp_id');
	$emp_details = empdetails($emp_id);
	
	$section_ids = explode(',',$emp_details[0]['emp_section_id']);
	
	if(in_array(17,$section_ids))
	{
		
		return FALSE;
	}else
	{
		
		return TRUE;
	}
}

function get_distic_dd($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	$CI->db->order_by('district_name_hi','asc');
	$query = $CI->db->get(DISTICT_MASTER);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
			
		
        $dropdown .= '<option  >'.$result->district_name_hi.'</option>'."\n";
		}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}

function get_section_dd($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	$CI->db->order_by('emprole_name_hi','asc');
	$query = $CI->db->get(EMPLOYEEE_ROLE);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" id="'.$name.'">'."\n";
	
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
			
		
        $dropdown .= '<option  >'.$result->emprole_name_hi.'</option>'."\n";
		}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}


function get_employee_dd($name , $cone='' , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	
	$CI->db->where('emp_is_retired',0);
	$CI->db->where('emp_status',1);
	$CI->db->where('emp_is_parmanent',1);
	
	$CI->db->order_by('emp_full_name_hi','asc');
	$query = $CI->db->get(EMPLOYEES);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" id="'.$name.'">'."\n";
	
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
			if( $result !=''){ 
		
				$dropdown .= '<option  >'.$result->emp_full_name_hi.'</option>'."\n";
			}
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}

function match_date_from_current($ps_moniter_date = '')
{
    //if(strtotime(date("Y-m-d")) == strtotime($ps_moniter_date)){
    $diffdays = IntervalDays(date("Y-m-d"),$ps_moniter_date);
    return $diffdays;
    //return  $diffdays ;

	die;
    if($diffdays<=3){
        return 1;
    }else if($diffdays>3 && $diffdays<=6){
        return  2 ;
    }else if($diffdays>=9){
        return  3 ;
    }
}

function get_ps_monitor_date()
{
	
	$CI = & get_instance();
	$CI->db->select('ps_moniter_date');
	$CI->db->where('ps_moniter_date >=', date('Y-m-d'));
	$query = $CI->db->get(FILES);
	$results = $query->num_rows();
	return $results ;
}
function get_Court($name , $attr = '',$selected = '')
{
	$results =  array( 'न्यायिक मजिस्ट्रेट, प्रथम श्रेणी ',
					'न्यायिक मजिस्ट्रेट, द्वतीय श्रेणी ',
					'न्यायिक मजिस्ट्रेट, तृतीय श्रेणी ',
					'न्यायिक मजिस्ट्रेट, चतुर्थ श्रेणी ',
					'न्यायिक मजिस्ट्रेट, पंचम श्रेणी ',
					'न्यायिक मजिस्ट्रेट, षष्ठम श्रेणी ',
					'न्यायिक मजिस्ट्रेट, सप्तम श्रेणी ',
					'न्यायिक मजिस्ट्रेट, अष्ठम श्रेणी ',
					'न्यायिक मजिस्ट्रेट, नवम श्रेणी ',
					'अतिरिक्त मुख्य न्यायिक मजिस्ट्रेट',
					'प्रथम अपर सत्र  ',
					'अपर सत्र  ',
					'विशेष ',
					'विशेष न्यायाधीश  एवं अतिरिक्त सत्र विशेष ',
					'अनु0 जाति / अनु0 जनजाति (अत्याचार निवारण अधिनियम) ',
		 );
	$CI = & get_instance();
	//$CI->db->order_by('district_name_hi','asc');
	//$query = $CI->db->get(DISTICT_MASTER);
	//$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" id="'.$name.'">'."\n";
	
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
        $dropdown .= '<option  >'.$result.'</option>'."\n";
		}
	  $dropdown .= '</select>'."\n";
    /*** and return the completed dropdown ***/
    return $dropdown;
}

function IntervalDays($CheckIn,$CheckOut){
	if($CheckIn!='' && $CheckOut!=''){
		$CheckInX = explode("-", $CheckIn);
		$CheckOutX =  explode("-", $CheckOut);
		$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
		$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
		$interval =($date2 - $date1)/(3600*24);
		// returns numberofdays
		return  $interval ;
	}
}
function get_district_dd($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	
	//$CI->db->where('emp_section_id',15);
	$CI->db->order_by('district_name_hi','asc');
	$query = $CI->db->get(DISTRICT);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" id="'.$name.'">'."\n";
	
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
			if( $result !=''){ 
		
				$dropdown .= '<option  >'.$result->district_name_hi.'</option>'."\n";
			}
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}

function fields_show_hide($section_ids , $fields_name  ){
	$CI = & get_instance();
	if((($section_ids == 12 )  || ($section_ids == 11) || ($section_ids == 15) || ($section_ids == 13)||($section_ids == 28) ||($section_ids == 18) ||($section_ids == 20)||($section_ids == 16)||($section_ids == 7)||($section_ids == 19)||($section_ids == 23)||($section_ids == 25)||($section_ids == 22)||($section_ids == 19)) && ($fields_name == 'party_petition') ){
		return "style='display:none'";
	}
	
	if( (($section_ids == 12) || ($section_ids == 11)|| ($section_ids == 13)  ||($section_ids == 28) ||($section_ids == 18) ||($section_ids == 20)||($section_ids == 16)||($section_ids == 7)||($section_ids == 19)||($section_ids == 22) ||($section_ids == 23)||($section_ids == 25) ||($section_ids == 19)) && ($fields_name == 'courts_name_location') ){
		return "style='display:none'";
	}
	
	if( (($section_ids == 28) ||($section_ids == 18) ||($section_ids == 20)||($section_ids == 16) ||($section_ids == 11)||($section_ids == 12)  ||($section_ids == 7) ||($section_ids == 13)||($section_ids == 19) ||($section_ids == 22) ||($section_ids == 23)||($section_ids == 25)) && ($fields_name == 'section_file_type') ){
		return "style='display:block'";
	}
	
	if((($section_ids == 11) ||($section_ids == 12) ||($section_ids == 28) ||($section_ids == 18) ||($section_ids == 20)||($section_ids == 16)||($section_ids == 15) ||($section_ids == 19) )&& ($fields_name == 'judgement_data') ){
		return "style='display:none'";
	}
	if(in_array($section_ids , array(11,12,13,15,28,18,20,16,19)) &&  $fields_name == 'court_type'){
		return "style='display:none'";
	}

	
	if(($section_ids == 15 )&& ($fields_name == 'procecution_label') ){
		return "style='display:block'";
	}
	
	if(($section_ids == 12 )&& ($fields_name == 'nyayic_sec_2label') ){
		return "style='display:block'";
	}
	
	if( ($section_ids == 11)  && ($fields_name == 'nyayic_sec_1label') ){
		return "style='display:block'";
	}
	
	if(($section_ids == 15) && ($CI->input->post('section_file_type') == 'प्रकरण वापसी' ) ){
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_name') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:block'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_no') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:block'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'police_station_name') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:block'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'courts_name_location') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:block'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'applicant_name') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:block'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'loksevak') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:none'";
		}
		
		
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no_no') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:block'";
		}
	}
	
	if(($section_ids == 15) && ($CI->input->post('section_file_type') == 'दया याचिका' ) ){
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_name') && $CI->input->post('section_file_type') == 'दया याचिका'){
			return "style='display:block'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_no') && $CI->input->post('section_file_type') == 'दया याचिका'){
			return "style='display:block'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'police_station_name') && $CI->input->post('section_file_type') == 'दया याचिका'){
			return "style='display:block'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'party_petition') && $CI->input->post('section_file_type') == 'दया याचिका'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'applicant_name') && $CI->input->post('section_file_type') == 'दया याचिका'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'दया याचिका'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no_lo') && $CI->input->post('section_file_type') == 'प्रकरण वापसी'){
			return "style='display:none'";
		}
		
	}
	if(($section_ids == 15) && ($CI->input->post('section_file_type') == 'समंस' ) ){
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_name') && $CI->input->post('section_file_type') == 'समंस'){
			return "style='display:block'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_no') && $CI->input->post('section_file_type') == 'समंस'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'police_station_name') && $CI->input->post('section_file_type') == 'समंस'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'courts_name_location') && $CI->input->post('section_file_type') == 'समंस'){
			return "style='display:block'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'applicant_name') && $CI->input->post('section_file_type') == 'समंस'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'समंस'){
			return "style='display:none'";
		}
	}
	
	if(($section_ids == 15) && ($CI->input->post('section_file_type') == 'अभियोजन स्वीकृति' ) ){
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_name') && $CI->input->post('section_file_type') == 'अभियोजन स्वीकृति'){
			return "style='display:block'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_no') && $CI->input->post('section_file_type') == 'अभियोजन स्वीकृति'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'police_station_name') && $CI->input->post('section_file_type') == 'अभियोजन स्वीकृति'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'courts_name_location') && $CI->input->post('section_file_type') == 'अभियोजन स्वीकृति'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'applicant_name') && $CI->input->post('section_file_type') == 'अभियोजन स्वीकृति'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'अभियोजन स्वीकृति'){
			return "style='display:block'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'अभियोजन स्वीकृति'){
			return "style='display:block'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'loksevak') && $CI->input->post('section_file_type') == 'अभियोजन स्वीकृति'){
			return "style='display:none'";
		}
		
	}
	if(($section_ids == 15) && ($CI->input->post('section_file_type') == 'विधानसभा' ) ){
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_name') && $CI->input->post('section_file_type') == 'विधानसभा'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_no') && $CI->input->post('section_file_type') == 'विधानसभा'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'police_station_name') && $CI->input->post('section_file_type') == 'विधानसभा'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'courts_name_location') && $CI->input->post('section_file_type') == 'विधानसभा'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'applicant_name') && $CI->input->post('section_file_type') == 'विधानसभा'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'विधानसभा'){
			return "style='display:none'";
		}
	}
	
	if(($section_ids == 15) && ($CI->input->post('section_file_type') == 'अभ्यावेदन' ) ){
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_name') && $CI->input->post('section_file_type') == 'अभ्यावेदन'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_no') && $CI->input->post('section_file_type') == 'अभ्यावेदन'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'police_station_name') && $CI->input->post('section_file_type') == 'अभ्यावेदन'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'courts_name_location') && $CI->input->post('section_file_type') == 'अभ्यावेदन'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'applicant_name') && $CI->input->post('section_file_type') == 'अभ्यावेदन'){
			return "style='display:block'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'अभ्यावेदन'){
			return "style='display:none'";
		}
	}
	
	if(($section_ids == 15) && ($CI->input->post('section_file_type') == 'सुचना का अधिकार' ) ){
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_name') && $CI->input->post('section_file_type') == 'सुचना का अधिकार'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_no') && $CI->input->post('section_file_type') == 'सुचना का अधिकार'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'police_station_name') && $CI->input->post('section_file_type') == 'सुचना का अधिकार'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'courts_name_location') && $CI->input->post('section_file_type') == 'सुचना का अधिकार'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'applicant_name') && $CI->input->post('section_file_type') == 'सुचना का अधिकार'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'सुचना का अधिकार'){
			return "style='display:none'";
		}
		
	}
	if(($section_ids == 15) && ($CI->input->post('section_file_type') == 'Writ' ) ){
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_name') && $CI->input->post('section_file_type') == 'Writ'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'crimanal_no') && $CI->input->post('section_file_type') == 'Writ'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'police_station_name') && $CI->input->post('section_file_type') == 'Writ'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'courts_name_location') && $CI->input->post('section_file_type') == 'Writ'){
			return "style='display:none'";
		}
		
		if( ($section_ids == 15)  && ($fields_name == 'applicant_name') && $CI->input->post('section_file_type') == 'Writ'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'lokayukt_office_no') && $CI->input->post('section_file_type') == 'Writ'){
			return "style='display:none'";
		}
		if( ($section_ids == 15)  && ($fields_name == 'courts_name_location') && $CI->input->post('section_file_type') == 'Writ'){
			return "style='display:block'";
		}
	}
	
	else{
		return "style='display:block'";
	}
}


function get_division_dd($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	
	//$CI->db->where('emp_section_id',15);
	$CI->db->order_by('division_name_hi','asc');
	$query = $CI->db->get(DIVISION_MASTER);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
			if( $result !=''){ 
		
				$dropdown .= '<option  >'.$result->division_name_hi.'</option>'."\n";
			}
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}

function get_district_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	
	//$CI->db->where('emp_section_id',15);
	$CI->db->order_by('district_name_hi','asc');
	$query = $CI->db->get(DISTRICT);
	$results = $query->result();
	//print_r($results);
	
	$dropdown = '<select '.$attr.' name="'.$name.'" id="'.$name.'">'."\n";
	$selected = $selected;
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
			$select = $selected==$result->district_id ? ' selected' : null;
				$dropdown .= '<option  value = "'.$result->district_id.'"'.$select.'>'.$result->district_name_hi.'</option>'."\n";
		
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}

function get_state_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	$CI->db->order_by('state_name_hi','asc');
	$query = $CI->db->get(STATES);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" id="'.$name.'">'."\n";
	$selected = $selected;
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
				$select = $selected==$result->state_id ? ' selected' : null;
		
				$dropdown .= '<option  value="'.$result->state_id.'" '.$select.'>'.$result->state_name_hi.'</option>'."\n";
		
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}

function get_division_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	
	//$CI->db->where('emp_section_id',15);
	$CI->db->order_by('division_name_hi','asc');
	$query = $CI->db->get(DIVISION_MASTER);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	$selected = $selected;
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
				$select = $selected==$result->division_id ? ' selected' : null;
		
				$dropdown .= '<option value="'.$result->division_id.'" '.$selected.'>'.$result->division_name_hi.'</option>'."\n";
			
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}

function advocate_posttype_array($key = ''){
	$advocate_post = array(
							'gp'=>'जी.पी.' ,
							'agp'=>'ए.जी.पी.' ,
							'sc'=>'स्थायी अधिवक्ता' ,
							'nty'=>'नोटरी' ,
							'pc'=>'पैनल अधिवक्ता ' ,
							'pra'=>'प्राइवेट अधिवक्ता ' ,
							'loa'=>'लोकायुक्त अधिवक्ता' ,
							'eow'=>'EOW अधिवक्ता ' ,
							'ma'=>'माध्यस्थम  अधिवक्ता ' ,
							);
					if($key != ''){
						if(array_key_exists($key ,$advocate_post )){
							return $advocate_post[$key];
						}
					} else{
						return $advocate_post; 
					}
}

function get_advocate_posttype_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	$advocate_post = advocate_posttype_array();
	//$CI->db->where('emp_section_id',15);
	
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	$selected = $selected;
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($advocate_post as $key=>$result){
				$select = $selected==$key ? ' selected' : null;
		
				$dropdown .= '<option value="'.$key.'" '.$select .'>'.$result.'</option>'."\n";
			
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}
function get_provision_pirod_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	$provision_pirod = array(
							'1'=>'1 साल' ,
							'2'=>'2 साल' ,
							'5'=>' 5 साल' ,
							'62'=>' 62 साल' ,
							
							);
	//$CI->db->where('emp_section_id',15);
	
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	$selected = $selected;
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($provision_pirod as $key=>$result){
				$select = $selected==$key ? ' selected' : null;
		
				$dropdown .= '<option value="'.$key.'" '.$select.'>'.$result.'</option>'."\n";
			
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}
function court_name_array($key = '')
{
	$court_name = array(
				'sc'=>'उच्चतम न्यायालय (Supreme Court)' ,
				'hc'=>'उच्च न्यायालय (High Court)' ,
				'dc'=>' जिला अदालत (District Court)' ,
				);
				if($key != ''){
					if(array_key_exists($key ,$court_name)){
						return $court_name[$key];
					}
				} else{
					return $court_name;
				}
	
	
}
function get_court_name_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	$court_name = court_name_array();
	//$CI->db->where('emp_section_id',15);
	
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	$selected = $selected;
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($court_name as $key=>$result){
				$select = $selected==$key ? ' selected' : null;
		
				$dropdown .= '<option value="'.$key.'" '.$select.'>'.$result.'</option>'."\n";
			
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}

function adv_aplicant_type_array($key = '')
{
	$adv_aplicant_type = array(
							'Apply' => 'Apply(नया आवेदन)',
							'Renewal'=> 'Renewal(नवीकरण)',
							'Confirm'=> 'Confirm(आवेदन स्वीकार हो चुका है)',
						);
					if($key != ''){
						if(array_key_exists($key ,$adv_aplicant_type )){
							return $adv_aplicant_type[$key];
						}
					} else{
						return $adv_aplicant_type; 
					}
}

function get_adv_aplicant_type_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	$adv_aplicant_type = adv_aplicant_type_array();
	//$CI->db->where('emp_section_id',15);
	
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	$selected = $selected;
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($adv_aplicant_type as $key=>$result){
				$select = $selected==$key ? ' selected' : null;
		
				$dropdown .= '<option value="'.$key.'" '.$select.'>'.$result.'</option>'."\n";
			
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}


function get_taluka_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	
	//$CI->db->where('emp_section_id',15);
	$CI->db->order_by('taluka_name_hi','asc');
	$query = $CI->db->get(TALUKA_MASTER);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	$selected = $selected;
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
				$select = $selected==$result->taluka_id ? ' selected' : null;
		
				$dropdown .= '<option value="'.$result->taluka_id.'" '.$select.'>'.$result->taluka_name_hi.'('.$result->taluka_name_en.')'.'</option>'."\n";
			
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}

function get_tahsil_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	if(!empty($selected)){ 
	 $CI->db->where('DistrictId',$selected );
	}
	
	
	$CI->db->order_by('SubDistrictName','asc');
	$query = $CI->db->get(TAHSIL_MASTER);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	$selected = $selected;
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
				$select = $selected==$result->SubDistrictId ? ' selected' : null;
		
				$dropdown .= '<option value="'.$result->SubDistrictId.'"'.$select.'>'.$result->SubDistrictName.'</option>'."\n";
			
	}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}


function get_distic_ddl_list($name , $attr = '',$selected = '')
{
	
	$CI = & get_instance();
	$CI->db->order_by('district_name_hi','asc');
	$query = $CI->db->get(DISTICT_MASTER);
	$results = $query->result();
	//print_r($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $result){
			
		
        $dropdown .= '<option  value="'.$result->district_id.'">'.$result->district_name_hi.'</option>'."\n";
		}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
	
}



function get_advocate_ddl_list($name , $attr = '',$condition)
{
	
	$CI = & get_instance();
	$tbl_advocate = ADVOCATE_MASTER;
	$tbl4 = ADVOCATE_SERVICE_RECORD;
	//$this->db->select('.*,dept_name_hi,district_name_hi');
	$CI->db->join($tbl4, "$tbl4.asr_scm_id = $tbl_advocate.scm_id", 'left');
	$CI->db->where($tbl_advocate.'.status','1');
	if(!empty($selected)){
	$CI->db->where($condition);
	}
	$query = $CI->db->get($tbl_advocate);
    // echo $CI->db->last_query();
    $results = $query->result();
	
	//pr($results);
	$dropdown = '<select '.$attr.' name="'.$name.'" class="'.$name.'" id="'.$name.'">'."\n";
	
	$dropdown .= "<option value=''> --Select-- </option>";
	foreach($results as $key=>$result){
		
		
        $dropdown .= '<option  value="'.$result->scm_id.'">'.$result->scm_name_hi.'</option>'."\n";
		}
	
	  $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
   return $dropdown;
	
}

function section_category_array(){
	 $array_category = array(
					'ce'  => 'Court Establishment',
					'nce' => 'New Court Establishment',
					'jpc' => 'Judicial Panel Cases'	,
					'smo' => 'Service matter of officer & employee of highcourt & sub ordinate court',
					'sce' => 'Special court establishment under various act',
					'ffc' => 'Fourteenth Finance Commission',
					'tfc' => 'Thirteenth Finance Commission',
					'ecp' => 'E-Court Projects',
					'djo' => 'Deputation of Judicial Office',
					'wpjo' => 'Writ petition of judicial officer and employee',
					'o' => 'Other Miscellaneous Work'
					);
					//print_r($array_category);
	return $array_category;				
}
