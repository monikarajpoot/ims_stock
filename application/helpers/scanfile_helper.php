<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @ Function Name      : pr
 * @ Function Params    : $data {mixed}, $kill {boolean}
 * @ Function Purpose   : formatted display of value of varaible
 * @ Function Returns   : foramtted string
 */
 
 function get_scan_file_deatils($file_id = null)
 {
	$CI = & get_instance();
    $CI->db->where('file_id', $file_id);
    $CI->db->from(FILES);
    $query = $CI->db->get();
    $row = $query->row_array();
	return $row ; // isset($row['scan_id'])?$row['scan_id']:'';
 }
 
  function get_scan_file_name($scan_id = null)
 {
	$CI = & get_instance();
    $CI->db->where('scan_id', $scan_id);
    $CI->db->from(FILE_SCAN);
    $query = $CI->db->get();
    $row = $query->row_array();
	/*if( isset($row['scan_file_path'])){
			$scan_file_path = explode('/',$row['scan_file_path']);
			//print_r($scan_file_path );
			$file_name = end($scan_file_path);
			//$file_name = 'AC_Statment_1321104000002110_(1)_0047f85101380223dd8d0b769af40799.pdf';
			$filename = explode('_',$file_name);
			$f_name = array();
			for($fl=0;$fl < count($filename)-1;$fl++){
				//$f_name[] = $filename[$fl];
				
			}
			echo implode($f_name ,'_');
			//print_r($filename);
			//echo $filename[0].".pdf"
	}*/
	if(isset($row['scan_file_type'])){
		
		$ttu = scan_file_types_details($row['scan_subfile_types']);
		$subtype_var = $ttu['sub_file_type_hi'] ? $ttu['sub_file_type_hi'] : $ttu['sub_file_type'];
		echo $ttu['perent_type_name']." - ".$subtype_var." ";
		
	}
 }

function scan_file_details($scan_id = null)
 {
	$CI = & get_instance();
    $CI->db->where('scan_id', $scan_id);
    $CI->db->from(FILE_SCAN);
    $query = $CI->db->get();
    $row = $query->row_array();
	return  $row; //isset($row['scan_file_path'])?$row['scan_file_path']:'';
			//print_r($filename);
			//echo $filename[0].".pdf"
	
 }
 
 function draft_file_details1($draft_id = null)
 {
	$CI = & get_instance();
    $CI->db->where('draft_id', $draft_id);
    $CI->db->from(DRAFT);
    $query = $CI->db->get();
    $row = $query->row_array();
	return  $row; 	
 }
 
 function scan_file_types_details($type_id = null)
 {
	$CI = & get_instance();
    $CI->db->where('type_id', $type_id);
    $CI->db->from(SCAN_FILE_TYPE);
    $query = $CI->db->get();
    $row = $query->row_array();
	return  $row; 	
 }
 function show_file_status($file_status = null)
 {
	//echo "SDF ".$file_status ;
	 if(isset($file_status) && !empty($file_status)){
	 $f_status = explode(',',$file_status);
		if(is_array($f_status) && isset($f_status)){
			 foreach($f_status as $f_status){
				if($f_status == 'e' || $f_status == 'E'){
					 echo '<span class="btn-success badge "  title="E-File">E</span>';
				 }
				 if($f_status == 'p' || $f_status == 'P'){
					 echo '<span class="badge btn-warning" title="Physical File">P</span>';
				 }
				 else if($f_status == 'p,e'||$f_status == 'P,E'){
					echo '<span class="btn-success badge "  title="E-File">E</span>&nbsp;';					
					 echo '<span class="badge btn-warning" title="Physical File">P</span>';
				 }
			 }
		}
	 }
 }
  function show_scan_file($scan_id = null)
 {
	 if(!empty($scan_id)){
		$scan_ids = unserialize($scan_id);
		$scan_id_values = get_scan_files($scan_ids);
		//pre($scan_ids);
		foreach($scan_id_values as $ids_scan ){ 
		$scan_file_details = scan_file_details($ids_scan);
		if(!empty($ids_scan)){
	
		$scan_file_path = isset($scan_file_details['scan_file_path'])?$scan_file_details['scan_file_path']:'';
		?>
		<a style="cursor:pointer;"  onclick="open_file(<?php echo $ids_scan; ?>,'<?php echo $scan_file_path; ?>')(<?php echo $ids_scan ?>)" ><span class="text-danger"><i class="fa fa-fw fa-file-pdf-o"></i> </span><?php echo get_scan_file_name($ids_scan); ?></a><br>
		<?php 
		}	
		}
	}
 }
 
 function physical_electronic_file_status_send( $file_status_log = null)
 {
	if (!empty($file_status_log) && ($file_status_log == 'p') || ($file_status_log == 'P')) {
		 echo " <br>फ़ाइल्  की <span class='badge bg-yellow'><b>हार्ड कॉपी </b></span>भेजी गई ";
		}
		if (!empty($file_status_log) && ($file_status_log == 'e') ||($file_status_log == 'E')) {
			echo "<br> फ़ाइल्  की <span class='badge bg-green'><b>e-कॉपी</b></span> भेजी गई ";
		}
		 if (!empty($file_status_log) && ($file_status_log == 'p,e')|| ($file_status_log == 'e,p') ) {
			echo "<br> फ़ाइल्  की <span class='badge bg-yellow'><b>हार्ड कॉपी </b></span> एवं <span class='badge bg-green'><b>e-कॉपी</b></span> भेजी गई ";
		}
 }


 function physical_electronic_file_status_receive( $file_status_log = null)
 {
	if (!empty($file_status_log) && ($file_status_log == 'p')|| ($file_status_log == 'P')) {
		echo " <br> फ़ाइल्  की <span class='badge bg-yellow'><b>हार्ड कॉपी </b></span>प्राप्त की गई ";
                             
			}
	if (!empty($file_status_log) && ($file_status_log == 'e')|| ($file_status_log == 'E')) {
		echo "<br> फ़ाइल्  की <span class='badge bg-green'><b>e-कॉपी</b></span> प्राप्त की गई ";
	}
	if (!empty($file_status_log) && ($file_status_log == 'p,e')|| ($file_status_log == 'e,p')) {
		echo "<br> फ़ाइल्  की <span class='badge bg-yellow'><b>हार्ड कॉपी </b></span> एवं  <span class='badge bg-green'><b>e-कॉपी</b></span>प्राप्त की गई";
	}
 }
  function show_efile_section($section_id = null)
 {
 $CI = & get_instance();
     $roleid_1 = empdetails(emp_session_id());
     //$CI->session->userdata("user_role")
     $efile_array = array(2,14);
     $section_array = explode(',',$section_id);
	 if(array_intersect($section_array ,$efile_array) || $roleid_1[0]['role_id'] < 8 || $roleid_1[0]['role_id'] == 11){
		  return "efile";
	 }
	 
 }
	
function get_scan_files($scan_ids = null)
 {
	$CI = & get_instance();
	$scan_id = implode($scan_ids,',');


	if($scan_id){
	$query = $CI->db->query('SELECT max(scan_id) as scan_id FROM `ft_file_scan` where `scan_id` IN ('.$scan_id.') GROUP BY `scan_subfile_types` ');


	$rows = $query->result();

	$scanIDS = array();
	foreach($rows  as $row){

		$scanIDS[] = $row->scan_id;

	}
	return $scanIDS; 

	}

 }