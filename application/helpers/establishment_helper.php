<?php

function es_file_marktype(){
    $mark_types = array(
        '3' => 'स्थापना (Establishment)',
        '1' => 'अनुभाग (Section)',
        '2' => 'व्यक्तिगत (Personal)',
    );
    return $mark_types;
}

function get_establishment_employees($withso = true){
	if($withso){
		return get_list(EMPLOYEES, 'emp_full_name_hi', "FIND_IN_SET('7',`emp_section_id`) AND role_id IN(8,17,18,22,23,24,37) AND emp_status ='1' AND emp_is_retired = '0'", 'ASC');
	} else {
		return get_list(EMPLOYEES, 'emp_full_name_hi', "FIND_IN_SET('7',`emp_section_id`) AND role_id IN(17,18,22,23,24,37) AND emp_status ='1' AND emp_is_retired = '0'", 'ASC');
	}
}

function check_est_so(){
	if((checkUserrole() == 8 || checkUserrole() == 37) && in_array('7', explode(',',getEmployeeSection()))){
		return true;
	} else{
		return false;
	}
}

function check_est_emplyee(){
	if(in_array(checkUserrole(), array(8,17,18,22,23,24,37)) && in_array('7', explode(',',getEmployeeSection()))){
		return true;
	} else{
		return false;
	}
}



function complaint_type($id = '', $every = '1', $onlyparent = false){
	if($onlyparent){
		$onlyparent = 'AND parent_category_id IS NULL';
	}else{
		$onlyparent = '';
	}
    if($id == ''){
        return get_list(EST_CATEGORY_MASTER, 'master_category_id', "is_every_emp_create = '$every' $onlyparent ");
    } else {		
        $complaint_type = get_list(EST_CATEGORY_MASTER, 'master_category_id', array('master_category_id' => $id));
        if(count($complaint_type) > 0){
            return $complaint_type[0];
        } else {
            return 'N/A';
        }
    }
}

function get_parent_category($id){
    $category = get_list(EST_CATEGORY_MASTER, 'master_category_id', array('master_category_id' => $id));
    $parent_category_id = $category[0]['parent_category_id'];
    if($parent_category_id != ''){
        $rid = $parent_category_id;
    } else{
        $rid = $id;
    }
    return $rid;
}

function complaint_withparent_type($id = '', $every = '1'){
	if($id == ''){
		$complaint_type = get_list(EST_CATEGORY_MASTER, 'master_category_id', array('is_every_emp_create' => $every));
	} else {
		$complaint_type = get_list(EST_CATEGORY_MASTER, 'master_category_id', array('is_every_emp_create' => $every, 'master_category_id' => $id));
	}
	return $complaint_type;
}

function get_child_categories($prtid){
	return  get_list(EST_CATEGORY_MASTER, 'master_category_id', array('parent_category_id' => $prtid));
	 
}

function get_category_allote_emp($cat_id){
	$ci = & get_instance();
	$tbl_work_allote = EST_WORK_ALLOTE;
	$ci->db->select('est_word_alloted_emp_id');	
	$where = "FIND_IN_SET('" . $cat_id . "', est_word_alloted_work_id)";
    $ci->db->where($where);
	$ci->db->from($tbl_work_allote);
	$ci->db->order_by('est_word_alloted_id', 'ASC');
	$query = $ci->db->get();
	//echo $ci->db->last_query();	
	if($query->num_rows() != '')
	{          
		$row = $query->row_array();
		return $row['est_word_alloted_emp_id'];
	}
	else{
		return FALSE;
	}
}

//return or true false or all ids
function is_every_empcreate($id){
    $cancreate = get_list(EST_CATEGORY_MASTER, 'master_category_id', array('master_category_id' => $id));
    $is_every_emp_create = $cancreate[0]['is_every_emp_create'];
    if($is_every_emp_create == 1){
        $can = true;
    } else{
        $can = false;
    }
    return $can;
}

function get_complaint_status($status){
	if($status == 1){
		return '<label class="label label-success">Finished</label>';
	} else {
		return '<label class="label label-warning">Pending</label>';
	}

}

function information_type($type = ''){
	$information_type = array(
		1 => 'लिखित',
		2 => 'मौखित',
		3 => 'अन्य',
	);
	if($type == ''){
		return $information_type;
	} else {
		if (array_key_exists($type, $information_type)) {
			return $information_type[$type];
		} else {
			return 'Non';
		}
	}
}


function get_employee_name_dd($name , $attr = '',$selected = '')
{

    $CI = & get_instance();

    //$CI->db->where('emp_section_id',15);
    $CI->db->order_by('emp_full_name_hi','asc');
    $query = $CI->db->get(EMPLOYEES);
    $results = $query->result();
    //print_r($results);
    $dropdown = '<select '.$attr.' name="'.$name.'" id="'.$name.'">'."\n";

    $dropdown .= "<option value=''> --Select-- </option>";
    foreach($results as $result){
        if( $result !=''){

            $dropdown .= '<option  value='.$result->emp_id.'>'.$result->emp_full_name_hi.'</option>'."\n";
        }
    }

    $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;

}

function upper_officers_list($task=null,$param=null){
    $CI = & get_instance();
    $CI->db->where('role_id <',8);
    $CI->db->where('role_id !=',1);
    $CI->db->where('emp_status',1);
    $CI->db->where('emp_is_retired',0);
    //$CI->db->where_in(array('role_id'=>implode(',',$role_ids_array)));
    $CI->db->from(EMPLOYEES);
    $query = $CI->db->get();
    $emp_officer_list= $query->result_array();
    return $emp_officer_list;
}

//section no pluse one
function plusone_fileno_es($sectionid){
    $CI = & get_instance();
    $CI->db->select_max('section_number');
    $CI->db->where('section_id',$sectionid);
    $query = $CI->db->get(FILES_SECTION, 1);
    $result = $query->row_array();
    $CI->db->last_query();
    return $result['section_number'] + 1;
}

function es_file_billtype(){
    $billtype = array(
        '1' => 'स्वयं का बिल(Personal Bill)',
        '2' => 'विभाग बिल  (Department Bill)',
       
    );
    return $billtype;
}

function es_file_billcategory(){
    $billcategory = array(
        '1' => 'बिजली बिल(Electricity Bill)',
        '2' => 'पेट्रोल बिल  (Petrol Bill)',
        '3' => 'रिपेरिंग बिल  (Repairing Bill)',
		'4' => 'हॉउस रेंट बिल  (House rent Bill)',
		'5' => 'स्टेशनरी बिल  (Stationary  Bill)',
		
    );
    return $billcategory;
}

function est_file_types(){
	return array('f' => 'File , नस्ती',
	'l' => 'Letter , पत्र',
	'or' => 'Order , आदेश',
	'ah' => 'Ahran , आहरण',
	'bh' => 'Bhugtan , भुगतान',
	'o' => 'Other , अन्य',
	);
}

function get_establishment_employees_with_des($withso = true){
		$CI = & get_instance();
	if($withso){		
		$tbl1 = EMPLOYEES;
		$tbl2 = EMPLOYEE_DETAILS;
		$tbl3 = EMPLOYEEE_ROLE;
		$CI->db->select(EMPLOYEES .'.*,emp_detail_gender,emprole_name_hi');
		$CI->db->join($tbl2, "$tbl2.emp_id = $tbl1.emp_id", 'left');
		$CI->db->join($tbl3, "$tbl3.role_id = $tbl1.designation_id", 'left');

		$where = "FIND_IN_SET('7',`emp_section_id`) AND ft_employee.role_id IN(8,17,18,22,23,24,37) AND emp_status ='1' AND emp_is_retired = '0'";
		$CI->db->where($where);
		$query = $CI->db->get($tbl1);
		//echo $CI->db->last_query();
		return $query->result();
	} else {
	$tbl1 = EMPLOYEES;
		$tbl1 = EMPLOYEES;
		$tbl2 = EMPLOYEE_DETAILS;
		$tbl3 = EMPLOYEEE_ROLE;
		$CI->db->select(EMPLOYEES .'.*,emp_detail_gender,emprole_name_hi');
		$CI->db->join($tbl2, "$tbl2.emp_id = $tbl1.emp_id", 'left');
		$CI->db->join($tbl3, "$tbl3.role_id = $tbl1.designation_id", 'left');

		$where = "FIND_IN_SET('7',`emp_section_id`) AND ft_employee.role_id IN(8,17,18,22,23,24,37) AND emp_status ='1' AND emp_is_retired = '0'";
		$CI->db->where($where);
		$query = $CI->db->get($tbl1);
		//echo $CI->db->last_query();
		return $query->result();
	}
}
//////////////code add by monika 
function getbillno($cate,$m,$y)
{	$CI = & get_instance();
	$CI->db->where('pbill_month',$m);
	$CI->db->where('pbill_year',$y);
    $CI->db->where('pbill_cate_id',$cate);
    $query = $CI->db->get("ft_pay_bill_cate");
$pbilno = $query->result();
return $pbilno[0]->pbill_computer_no;
}

function inputcheckvaul($var)
{
   if(isset($_POST[$var]))
   {
    $var = $_POST[$var];
   }else{
     $var =0;
   }
   //echo  $var."<br/>";
   return $var;

}
function gethead($id)
{	$CI = & get_instance();
 $CI->db->select('pay_cate_name');
    $CI->db->where('pay_cate_id',$id);
    $query = $CI->db->get("ft_pay_salary_category");
$pbilno = $query->result();
return $pbilno;
}