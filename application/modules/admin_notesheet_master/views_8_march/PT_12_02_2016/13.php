
<?php 
$contents  = '' ;
$contents .= '<tr><td align="right"><b><u>स्पीड पोस्ट द्वारा</b></u></td></tr>';
$contents .= '<tr><td align="center"> फा0क्र0 5/';
if($is_genrate == true){
	$contents .= $post_data['number'];
}else{
	$contents .=  '<input type="text" class="" name="number" required>';
}
$contents .= '/'.date("Y").'/'.$file_number.'/21-क(या0),  </td></tr> ';
$contents .= '<tr><td align="center"><u><h3>'.$dept_name.'</h3></u></td></tr>';
$contents .= '<tr><td align="left">प्रेषकः-</td></tr>';
$contents .= '<tr><td align="left"><span style="margin-left:8%">'.$as_name.'</span></td></tr>';
$contents .=  '<tr><td><span style="margin-left:8%">अतिरिक्त सचिव, विधि</span></td></tr>';
$contents .= '<tr><td align="left">प्रति,</td></tr>';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= '<tr><td align="left"><span style="margin-left:8%">'.$row->scm_name_hi.'</span>,</td></tr>';
        $contents .= '<tr><td align="left"><span style="margin-left:8%">'.$row->scm_post_hi.', '.$row->scm_court_name_hi.'</span>,</td></tr>';
        $contents .= '<tr><td align="left"><span style="margin-left:8%">'.$row->scm_address_hi.',</span></td></tr>';
		$contents .= '<tr><td align="left"><span style="margin-left:8%">'.$row->scm_pincode_hi.'</span></td></tr>';
    }
} else {
    $contents .= '<tr><td align="left"><select name="member_id">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select></td></tr>';
}
$contents .= '<tr><td align="right"> भोपाल, दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date1'],'d/m/Y').'</td></tr>';
} else {
    $contents .= ' <input type="text" class="date1" name="date1" placeholder="dd/mm/yyyy" value="'.$today.'"/></td></tr>';
} 
$contents .= '<tr><td align="left">विषय:- <span style="margin-left:4%"> ';
if($is_genrate == true){
	$contents .= ' '.$post_data['court_type'];
	$contents .= ' '.$post_data['court_location'];
} else {
	$contents .= ' <select name="court_type" class="court_type">';
	foreach($court_type as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select>';
	$contents .= ' <select name="court_location" class="court_location">';
	foreach($court_location as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select>';
}
if($is_genrate == true){ 
    $contents .=  ' '.$post_data['agenst_name'];
} else {
    $contents .= ' <input type="text" class="" name="agenst_name" value="'.$agenst_name.'" />';
}
$contents .= ' विरुद्ध ';
if($is_genrate == true){ 
    $contents .=  $post_data['agenst'];
} else {
    $contents .= ' <input type="text" class="" name="agenst" value="'.$agenst.'" />';
}
$contents .= ' में पारित आदेश दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date2'],'d/m/Y');
} else {
    $contents .= '<input type="text" class="date1" name="date2" placeholder="dd/mm/yyyy" value="'.get_date_formate($file_judgment_date,'d/m/Y').'" />';
}      
$contents .= ' के विरूद्ध एस एल पी प्रस्तुत किये जाने के संबंध में |</span></td></tr>';
$contents .= '<tr><td align="center">--------------</td></tr>';
$contents .= '<tr><td align="left">महोदय,</td></tr>';
$contents .= '<tr><td align="left"><p>उपरोक्त विषयांकित प्रकरण में  ';
if($is_genrate == true){
	$contents .= ' '.$post_data['court_type'];
	$contents .= ' '.$post_data['court_location'];
} else {
	$contents .= '<select name="court_type" class="court_type">';
	foreach($court_type as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select>';
	$contents .= ' <select name="court_location" class="court_location">';
	foreach($court_location as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select>';
}
 $contents .= ' द्वारा  पारित आदेश / निर्णय दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date3'],'d/m/Y');
} else {
    $contents .= ' <input type="text" class="date1" name="date3" placeholder="dd/mm/yyyy" value="'.get_date_formate($file_judgment_date,'d/m/Y').'"/>';
}
$contents .= ' के विरूद्ध मान0 उच्चतम न्यायालय के समक्ष विशेष अनुमति याचिका प्रस्तुत करें।</p> </td></tr>';
$contents .= '<tr><td align="left"><p>प्रशासकीय विभाग द्वारा प्रस्ताव ';
if($is_genrate == true){ 
    $contents .=  $post_data['days'];
} else {
    $contents .= '<input type="text" class="" name="days" value="'.$days_delay.'" />';
}
$contents .= ' दिवस विलंब से प्रेषित किया गया हैं |</p> </td></tr>';
$contents .= '<tr><td align="left"><p>हस्ताक्षरयुक्त वकालतनामा संलग्न कर भेजा जा रहा है।</p></td></tr>';
$contents .= '<tr><td align="right">मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">('.$as_name.')</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अतिरिक्त सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';
$contents .= '<tr><td align="left"><div style="float:left;">पृ0 क्रमांक 5/';
if($is_genrate == true){
	$contents .= $post_data['number'];
}else{
	$contents .=  '<input type="text" class="" name="number"  required>';
}
$contents .= '/'.date("Y").'/'.$file_number.'/21-क(या0)</div><div style="float:right;">भोपाल, दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date4'],'d/m/Y');
} else {
    $contents .= '<input type="text" class="date1" name="date4" placeholder="dd/mm/yyyy" value="'.$today.'"/></div>';
}
$contents .=  '</td></tr>';
$contents .= '<tr><td align="left">प्रतिलिपि:-</td></tr>';
$contents .= '<tr><td align="left"><p>1. ';
 if($is_genrate == true){
	$contents .= ' '.$post_data['advocate_type'];
	$contents .= ' '.$post_data['court_type'];
	$contents .= ' '.$post_data['court_location'];
} else {
	$contents .= ' <select name="advocate_type" class="advocate_type">';
	foreach($advocate_type as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select>';
	$contents .= ' <select name="court_type" class="court_type">';
	foreach($court_type as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select>';
	$contents .= ' <select name="court_location" class="court_location">';
	foreach($court_location as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select> ';
} 
 $contents .= ' की ओर इस विभाग के परिपत्र दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date5'],'d/m/Y');
} else {
    $contents .= '<input type="text" class="date1" name="date5" placeholder="dd/mm/yyyy" value="'.get_date_formate($file_uo_or_letter_date,'d/m/Y').'"/>';
}
$contents .= ' की छायाप्रति संलग्न प्रेषित कर लेख है कि भविष्य में एस एल पी /रिट अपील दायर किये जाने वाले प्रकरणो  में शासकीय अधिवक्ता द्वारा स्पष्ट अभिमत एवं आधार के साथ  अभिमत दिये जाने के सम्बन्ध में निर्देशित किये जाने हेतु अग्रेषित|</p></td></tr>';
$contents .=  '<tr><td><p>2-  सचिव, म0प्र0 शासन,‍ ';
$contents .=  ' '.$file_department;
$contents .=  ', मंत्रालय भोपाल की ओर उनके यू0ओ0क्र0 '.$file_uo_or_letter_no.', दिनांक  ';
$contents .=  ' '.get_date_formate($file_uo_or_letter_date,'d/m/Y');
$contents .= ' के संदर्भ में उनकी विभागीय नस्ती के साथ भेजकर निवेदन हैं कि प्रकरण के प्रभारी अधिकारी को निर्देश दें कि वह तत्काल उपरोक्त अधिवक्ता से नई दिल्ली में संपर्क कर आवश्यक कार्यवाही करवाये| साथ ही देरी के तथ्य को स्पष्ट करने का उत्तरदायित्व प्रशासकीय विभाग का होगा |</p></td></tr>';

$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">('.$as_name.')</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अतिरिक्त सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';

//print content
//echo $contents;
?>   

