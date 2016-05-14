<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @ Function Name      : pr
 * @ Function Params    : $data {mixed}, $kill {boolean}
 * @ Function Purpose   : formatted display of value of varaible
 * @ Function Returns   : foramtted string
 */
 
function get_draft($id, $type = null, $not = false, $all = false){
    if($id != '' ) {
        $ci = &get_instance();
		if(is_array($id))
		{
	$id1 = $id;
			}else{
			$id1 = explode(',', $id);
			}
        
		
        $ci->db->select('*');
        $ci->db->from(DRAFT);
        if ($type != null) {
            $ci->db->where_in('draft_id', $id1);
            if ($not == true) {
                $ci->db->where('draft_type !=', $type);
            } else {
                $ci->db->where('draft_type', $type);
            }
        } else {
            $ci->db->where_in('draft_id', $id1);
        }
        $ci->db->order_by('draft_create_date', 'ASC');
        $query = $ci->db->get();
      //  echo $ci->db->last_query();
        if ($all == true) {
            return $query->result();
        } else {
            return $query->row_array();
        }
    }
}

function get_draft_log($id){
	$ci = & get_instance();
	$ci->db->select('*');
	$ci->db->from(DRAFT_LOG);      
	$ci->db->where('draft_log_id',$id); 
	$query = $ci->db->get();
	//echo $ci->db->last_query();
	return  $query->row_array();
}

function get_draft_log_data($id, $last = false, $limit = null, $group_by = null){
	$ci = & get_instance();
	$ci->db->select('*');
	$ci->db->from(DRAFT_LOG);      
	$ci->db->where('draft_log_draft_id',$id); 
	//$ci->db->where('draft_final',1); 
	$ci->db->where('draft_log_dispaly_status !=','1');
	if($group_by != null){
		$ci->db->group_by($group_by); 
	}
	if($last == false){
		$ci->db->order_by('draft_log_id','ASC'); 
	} else{
		$ci->db->order_by('draft_log_id','DESC'); 
	}
	
	if($limit != null){
		$ci->db->limit($limit); 
	} 
	$query = $ci->db->get();
	//echo $ci->db->last_query();
	return  $query->result();
}

function get_last_log_id($id, $emp_id, $draft_final = 0){
	$ci = & get_instance();
	$ci->db->select('draft_log_id,draft_log_creater,draft_log_create_date,draft_log_draft_id,draft_log_file_id,draft_log_section_id,draft_log_sendto,draft_content,draft_final');
	$ci->db->from(DRAFT_LOG);      
	$ci->db->where('draft_log_draft_id',$id);
    if($draft_final != 0 && $draft_final == 1){
        $ci->db->where('draft_final',$draft_final);
    }else{
        $ci->db->where('draft_final',0);
    }
	$ci->db->where('draft_log_dispaly_status !=','1'); // add on 14 march
	$ci->db->where('draft_log_creater',$emp_id);
	$ci->db->order_by('draft_log_create_date','DESC'); 
	$query = $ci->db->get();
	//echo $ci->db->last_query();
	$result = $query->row_array();	
	if(!empty($result)){
		return $result['draft_log_id'];
	} else{
		return null;
	}
	
}

function get_draft_employees($id){
	$ci = & get_instance();
	$tbl1 = DRAFT_LOG;
	$tbl2 = EMPLOYEES;
	$ci->db->select('DISTINCT(draft_log_creater)');
	$ci->db->join($tbl2, "$tbl1.draft_log_creater = $tbl2.emp_id");
	$ci->db->from(DRAFT_LOG);      
	$ci->db->where('draft_log_draft_id',$id); 
	$ci->db->where('designation_id BETWEEN 2 and 8'); 
	$ci->db->order_by('designation_id', 'DESC'); 
	$query = $ci->db->get();
	//echo $ci->db->last_query();
	return  $query->result();
}

function draft_type($type = ''){
	$draft_type = array(
		'n' => 'नोटशीट(Notesheet)',
		'o' => 'आर्डर(Order)',
		'r' => 'स्मरण(Reminder)',
		'e' => 'ई-मेल(Email)',
		'odn' => 'बाह्य विभाग नोटशीट',
		'ot' => 'अन्य(Other)',
	);
	if($type != ''){
		if(array_key_exists($type, $draft_type)){
			return $draft_type[$type];
		}
	} else {
		return $draft_type;
	}
	
}


function update_efile($file_id, $receiver_id, $draft_id = null, $sender_id = null){
	
	$ci = & get_instance();
	$ci->db->select('final_draft_id');
	$ci->db->from(FILES);      
	$ci->db->where('file_id',$file_id); 
	$query = $ci->db->get();
	//echo $ci->db->last_query();
	$result =  $query->row_array();
	if($result['final_draft_id'] != null || $result['final_draft_id'] != 0){
		$draftids = $result['final_draft_id'];
		$draft_ids = explode(',', $draftids);
		foreach($draft_ids as $draftid){
			$final_data = array(
				'draft_sender_id' => $sender_id != null ? $sender_id : $ci->session->userdata("emp_id"),
				'draft_reciever_id' => $receiver_id,	
				'draft_status' => 3,	 //draft completed			
				'draft_is_finalize' => 0,  //0 for draft working in process
			);
			$draft_data = get_draft($draftid);
			$log_id = get_last_log_id($draft_data['draft_id'],$draft_data['draft_reciever_id']);
			$final_log_data = array(
				'draft_log_sendto' => $receiver_id,				
				'draft_final' => 1,  //0 for draft working in process
				'draft_content' => $draft_data ['draft_content_text'],
			);
			updateData(DRAFT, $final_data, array('draft_id' =>$draftid ));
			updateData(DRAFT_LOG, $final_log_data, array('draft_log_id' =>$log_id ));
		}
		$data_log = array(
			'file_id'       => $file_id,
			'file_head_id'  => 0,
			'section_id'    => 0,
			'to_emp_id'     => $receiver_id,
			'from_emp_id'   => $sender_id != null ? $sender_id : $ci->session->userdata("emp_id"),
			'flog_remark' => "",
			'flog_other_remark' => 'फाइल पर ड्राफ्ट जोड़ा गया',
			'flog_ip_address'   => gethostbyname(gethostbyaddr($_SERVER['REMOTE_ADDR'])),
			'flog_browser_id'   => $_SERVER['HTTP_USER_AGENT'],
			'notesheet_file_path'     => base_url().'efile/'.$file_id,
			'notesheet_id' =>  0,
			'notesheet_contents' => $draft_data ['draft_content_text'],
		);
  
		$response = insertData($data_log, FILES_LOG);
	}
}

//update fuile tabke draft ids
function update_filedata($file_id, $draft_id){
	$file_data =  getFiledata($file_id);
	$filesin_draft = explode(',',$file_data[0]['final_draft_id']);
	if(in_array($draft_id, $filesin_draft)){
		$ids = $file_data[0]['final_draft_id'];
	} else{
		$ids = $file_data[0]['final_draft_id'] != '' ? $file_data[0]['final_draft_id'].','.$draft_id : $draft_id ;
	}
	$res = updateData(FILES, array('final_draft_id' => $ids), array('file_id' => $file_id));
	return $res;
}
function escape_str($str, $like = TRUE)
{
	$str=trim($str);
	$ci = & get_instance();
    if (is_array($str))
    {
        foreach ($str as $key => $val)
        {
            $str[$key] = $ci->escape_str($val, $like);
        }

        return $str;
    }

    if (function_exists('mysqli_real_escape_string') AND is_object($ci->conn_id))
    {
        $str = mysqli_real_escape_string($ci->conn_id, $str);
    }
    else
    {
        $str = addslashes($str);
    }

    // escape LIKE condition wildcards
    if ($like === TRUE)
    {
        $str = str_replace(array('%', '_'), array('\\%', '\\_'), $str);
    }

    return $str;
}

function filter_string($str){
	$str = html_entity_decode($str);
	$str = stripslashes($str);
	$str = stripslashes($str);
	$str = str_replace("\\r","\r",str_replace("\\n","\n",$str));
	//$str =  str_replace("\\r\\n", "\r\n",mysql_real_escape_string(trim($str)));
	return $str;
}
function check_notesheet_exists($file_id){
	$file_data =  getFiledata($file_id);
	$filesin_draft = explode(',',$file_data[0]['final_draft_id']);
	$result = get_draft($filesin_draft, 'n');	
	if($result != null){
		return $result['draft_id'];
	} else{
		return null;
	}
}

function getSectionName($sectionid = null,$iseng = false) {
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->where('section_id', $sectionid);
    $CI->db->from(SECTIONS);
    $query = $CI->db->get();
    $row = $query->row();
    // echo $CI->db->last_query();
    if($iseng == true){
       return  $row->section_name_en;
    }else if (!empty($row) && $row != '') {
        return $row->section_name_hi;
    } else {
        return null;
    }
}

function check_so_on_leave($creater, $sento){
	$creater_role = get_employee_role($creater, true);
	$sento_role = get_employee_role($sento, true);
	if($creater_role > 8 && $sento_role < 8){
		return true;
	} else{
		return null;
	}
	
}

function generate_PDF($contents, $file_name, $pdfAbspath, $redirect = null ){
	$CI = & get_instance();
	error_reporting(0);
	$html = filter_string($contents);
   // pr($html);   
	// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
	$pAbspath = $pdfAbspath."/$file_name.pdf";	
	$pdfFilePath = FCPATH.$pAbspath;	
	//pr($pdfFilePath);
	if (file_exists($pdfFilePath) == FALSE)
	{
		if(!is_dir($pdfAbspath)) //create the folder if it's not already exists
        {
            mkdir($pdfAbspath,0777,TRUE);
        }
		require_once(APPPATH.'/third_party/tcpdf/tcpdf.php');
		ini_set('memory_limit','32M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
		$CI->load->library('pdf');
		
		ob_clean();
		
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$fontname = TCPDF_FONTS::addTTFfont(APPPATH.'/third_party/tcpdf/fonts/mangal.ttf', 'TrueTypeUnicode', '', 32);
	
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('विधि और विधायी कार्य विभाग , भोपाल');
		$pdf->SetTitle('विधि और विधायी कार्य विभाग , भोपाल');
		$pdf->SetSubject('विधि और विधायी कार्य विभाग , भोपाल');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		//$pdf->SetMargins(10, 10, 10);
		//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// set font
		$pdf->SetFont($fontname, '', 10, '', 'false');

		// add a page
		$pdf->AddPage();			

		// set color for text
		$pdf->SetTextColor(0, 63, 127);

		// write the text
		$pdf->writeHTML($html, true, false, true, false, '');

		//Close and output PDF document
		$pdf->Output($pdfFilePath, 'F');
	
		if($redirect != null) {
			redirect(base_url().$redirect);
		}else{
			return true;
		}
	} else {
		return false;
	}
}
function is_notehseet_finalized($fileid,$empid,$draftid,$task,$isnotesheet = false){
	$ci = & get_instance();
	$ci->db->select('draft_creater_emp_id,draft_sender_id,draft_reciever_id,draft_is_finalize,draft_status');
	$ci->db->from(DRAFT);
    if($isnotesheet == true){
        $ci->db->where(array('draft_type'=>'n'));
    }
	if($task=='loggedin_usr_draf_creator'){
		$ci->db->where(array('draft_file_id'=>$fileid,'draft_creater_emp_id'=>$empid)); 	
	}else if($task=='file_creator_id'){
		$ci->db->where(array('draft_file_id'=>$fileid)); 	
	}else if($task=='loggedin_usr_draf_added'){
		$ci->db->where(array('draft_file_id'=>$fileid,'draft_sender_id'=>$empid)); 	
	}
	$query = $ci->db->get();	
	return  $query->row_array();	
}
function get_final_draft($empid,$fileid){
	$ci = & get_instance();
	$ci->db->select('draft_id,draft_is_finalize,draft_status');
	$ci->db->from(DRAFT);	
	$ci->db->where(array('draft_file_id'=>$fileid,'draft_sender_id'=>$empid,'draft_reciever_id'=>$empid,'draft_status'=>3)); 		
	$query = $ci->db->get();	
	$draft_detail = $query->row_array();
	/*Get draft detail from draft log table*/
	$ci->db->select('draft_log_id,draft_content,draft_log_creater,draft_log_sendto');
	$ci->db->from(DRAFT_LOG);	
	$ci->db->where(array('draft_log_draft_id'=>$draft_detail['draft_id'],'draft_log_sendto'=>$empid)); 		
	$ci->db->order_by('draft_log_id','desc');
	$log_query = $ci->db->get();	
	$draft_detail_log = $log_query->row_array();
	if(is_array($draft_detail_log) && $draft_detail_log['draft_log_id']!=''){		
		$draft_detail= array_merge($draft_detail_log, $draft_detail);		
	}	
	/*Get draft detail from draft log table*/
	return $draft_detail;	
}

function get_final_draft_content($empid,$fileid){
	$ci = & get_instance();
	$ci->db->select('draft_id');
	$ci->db->from(DRAFT);	
	$ci->db->where(array('draft_file_id'=>$fileid,'draft_sender_id'=>$empid,'draft_reciever_id'=>$empid,'draft_status'=>3)); 		
	$query = $ci->db->get();	
	$draft_detail = $query->row_array();
	/*Get draft detail from draft log table*/
	$ci->db->select('draft_log_id,draft_content,draft_log_creater,draft_log_sendto');
	$ci->db->from(DRAFT_LOG);	
	$ci->db->where(array('draft_log_draft_id'=>$draft_detail['draft_id'],'draft_log_sendto'=>$empid)); 		
	$ci->db->order_by('draft_log_id','desc');
	$log_query = $ci->db->get();	
	$draft_detail_log = $log_query->row_array();
	$draft_detail= $draft_detail_log;		
	/*Get draft detail from draft log table*/
	return $draft_detail_log;	
}
function verify_digital_sinature($log_id,$draft_content = null){
	//echo '<br/>d log id- '.$log_id;
	$log_data = get_draft_log($log_id);
	$ci = & get_instance();
	$ci->db->select('*');
	$ci->db->from('ft_digital_signature');	
	if($draft_content != null){
			$ci->db->where('ds_local_data', $draft_content);
		}
	$ci->db->where('ds_draft_log_id', $log_id);
	$query = $ci->db->get();
	if($query->num_rows() > 0){
		$result = $query->row_array();
		//pre($result);
		$signData = urlencode($result['ds_signed_data']);
		$publicKey = urlencode($result['ds_public_key']);
		$digitalSignature = urlencode($result['ds_signature']);
		$url = "http://10.115.254.213:8080/data_signing/verifySignData?signData=$signData&publicKey=$publicKey&digitalSignature=$digitalSignature";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
		// This is what solved the issue (Accepting gzip encoding)
		curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");     
		$response = curl_exec($ch);
		curl_close($ch);
		//pre($response);
		$show_data = '<b>'.$result['ds_emp_name'].'</b> <br/> <span style="font-size:12px;">'.get_datetime_formate($result['ds_create_datetime']).'</span>';
		$show_data_title = ''.$result['ds_emp_name'].' on '.get_datetime_formate($result['ds_create_datetime']);
		if($response == '"success"'){
			//$return  = '<img src="'.base_url().'images/verify_sign.png" height="25px" width="30px" title="Signed by: '.$show_data.'"> <div style="font-size:10px">Digitally Signed By</div>' ;
			$return  = '<img src="'.base_url().'images/verify_sign.png" height="25px" width="30px" title="Signed by: '.$show_data_title.'"> <div style="font-size:12px; margin:0px; text-align: center">Digitally Signed By <br/><span style="font-size:14px">'.$show_data.'</span></div>' ;
		} else { 
			$return  = '<img src="'.base_url().'images/cross_signed.jpg" height="25px" width="30px" title="Error: Data wrong or tempered">' ;
		}
		return $return;
	} else {
		return false;
	}
}
function verify_logid_sinature($log_id){
    $ci = & get_instance();
    $ci->db->select('*');
    $ci->db->from('ft_digital_signature');
    $ci->db->where('ds_draft_log_id', $log_id);
    $query = $ci->db->get();
    $result = $query->row_array();
    if($query->num_rows() > 0){
        return $result['ds_id'];
    } else {
        return false;
    }

}
function update_signture_ds_local_data($draft_logid,$creatorid){
	$ci = & get_instance();
    $ci->db->select('draft_content');
    $ci->db->from('ft_draft_log');
    $ci->db->where(array('draft_log_id' =>$draft_logid,'draft_log_creater'=>$creatorid));
    $query = $ci->db->get();
    $result = $query->row_array();
	$signing_content=$result['ds_id'];
	$content_data = array('ds_local_data' => base64_encode($signing_content));
	updateData('ft_digital_signature', $content_data, array('ds_draft_log_id' =>$draftid,'ds_emp_id'=>$creatorid));
}

function update_file_draft($logged_empid,$draft_mark_empid,$draft_log_id){
	$final_log_data = array(
				'draft_log_sendto' => $draft_mark_empid,				
				'draft_final' => 1,  //0 for draft working in process
				'draft_log_creater' => $logged_empid,
			);
	updateData('ft_draft_log', $final_log_data, array('draft_log_id' =>$draft_log_id ));
}


/*Code added 12 03 2016*/
function get_generat_order_in_file($emplogin_id,$file_id,$order_type){
	$ci = & get_instance();
    $ci->db->select('draft_id,order_generat_officer_id,draft_file_id');
    $ci->db->from('ft_file_draft');
    $ci->db->where(array('draft_file_id'=>$file_id,'order_generat_officer_id'=>$emplogin_id,'draft_type'=>$order_type));
    $query = $ci->db->get();
    $result = $query->result_array();
    if($query->num_rows() > 0){
        return $result;
    } else {
        return false;
    }
}
function decode_signed_data($ds_signed_data){
		$myvar = urldecode(base64_decode($ds_signed_data));
		$string = preg_replace('/%u([0-9A-F]+)/', '&#x$1;', $myvar);
		return html_entity_decode($string, ENT_COMPAT, 'UTF-8');
}

function single_file_digitally_sign_or_not($draft_log_id,$is_return=false){	
		$draft_sign_list = get_list_with_in('ft_digital_signature',null,'ds_draft_log_id',$draft_log_id);
		//pre($draft_sign_list);
		if($is_return==true){
			return count($draft_sign_list);
		}else{
			echo count($draft_sign_list);
		}
		//echo json_encode($post_data_array_b);	
	}
// for genrate pdf	
function genrate_unicode_pdf($contents, $file_name, $pdfAbspath, $mode = 'F'){
	include_once APPPATH.'/third_party/mpdf60/mpdf.php';
	$pdfpath = $pdfAbspath.'/'.$file_name.'.pdf';
	ini_set("memory_limit","128M");
	$mpdf = new mPDF(); 
	$mpdf->WriteHTML($contents);
	if($mode == 'F'){
		$return = $mpdf->Output($pdfpath, $mode);
	}else if($mode == 'D'){
		$return =  $mpdf->Output($file_name, $mode);
	} else {
		$return =  'Please select mode!!!!';
	}	
	return $return;
	exit;
}
/*End 12 03 2016*/

function get_draft_from_file($file_id = ''){
	$ci = & get_instance();
    $query = $ci->db->get_where(FILES ,array('file_id'=>$file_id));
	return $query->row_array();
	
}