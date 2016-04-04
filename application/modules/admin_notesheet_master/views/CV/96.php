<style>
p{
	line-height:24px;
}
</style>
<?php 
$contents  = '<table style="font-size:17px;  width:80%; margin:0% auto;">' ;
$contents .= '<tr><td align="right"><b><u>स्पीड पोस्ट द्वारा</b></u></td></tr>';
$contents .= '<tr><td align="center">फा0क्र0 4(ए)/';
if($is_genrate == true){ 
    $contents .=  $post_data['number'];
} else {
    $contents .= '<input type="text" class="" name="number"  value=""/>';
}
$contents .= '/'.$file_number.'/'.date("Y").'/21-क(सि)</td></tr>';
$contents .= '<tr><td align="center"><u><h3>'.$dept_name.'</h3></u></td></tr>';
$contents .= '<tr><td align="left">प्रेषकः-</td></tr>';
$contents .= '<tr><td align="left"><span style="margin-left:8%">'.$as_name.'</span></td></tr>';
$contents .= '<tr><td align="left"><span style="margin-left:8%">अतिरिक्त सचिव विधि,</span></td></tr>';
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
$contents .= '<tr><td><div style="float:left; width:45px;">विषय:- </div><p style="text-indent: 0;">';
if($is_genrate == true){ 
    $contents .=  $post_data['subject'];
} else {
    $contents .= '<textarea name="subject" rows="" columns="">'.$file_subject.'</textarea>';
}
$contents .= '</p></td></tr>';
$contents .= '<tr><td><div style="float:left; width:45px;">सन्दर्भ:- </div><p style="text-indent: 0;">प्रशासकीय विभाग ';
if(isset($file_department)){
$splitdept = explode(' ',$file_department);
if(in_array('विभाग' , $splitdept)){
	$contents .= $file_department;
}else{
	$contents .= $file_department.' विभाग' ;
}
}
$contents .= ' के यू0ओ0क्र0 '.$file_uo_or_letter_no.' , दिनांक  '.get_date_formate($file_uo_or_letter_date,'d/m/Y').'</p></td></tr>';
$contents .= '<tr><td align="center">--------------</td></tr>';
$contents .= '<tr><td align="left">महोदय,</td></tr>';
$contents .= '<tr><td align="left"><p>इस विभाग द्वारा पूर्व में जारी आदेश क्रमांक 4(ए)/';
if($is_genrate == true){ 
    $contents .=  $post_data['number'];
} else {
    $contents .= '<input type="text" class="" name="number"  value=""/></div>';
}
$contents .= '/'.$file_number.'/'.date("Y").'/21-क(सि)';
$contents .= ' दिनांक '.get_date_formate($today,'d/m/Y').'   को निरस्त करते हुए, उपरोक्त विषयांतर्गत प्रकरण में म.प्र. शासन की ओर से माननीय उच्चतम न्यायालय, नई दिल्ली मे  पैरवी करें| </p></td></tr>';
$contents .= '<tr><td align="left">संलग्न:-वकालतनामा </td></tr>';
$contents .= '<tr><td align="right"><div style="width:60%; text-align:center;">भवदीय,</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:60%; text-align:center;">('.$as_name.')</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:60%; text-align:center;">अतिरिक्त सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:60%; text-align:center;">'.$dept_name.'</div></td></tr>';
$contents .= '<tr><td></td></tr>';
$contents .= '<tr><td><tr><td><u>प्रतिलिपि:</u></td></tr>';
$contents .= '<tr><td><p>1- सचिव, म.प्र. शासन, ';
if(isset($file_department)){
$splitdept = explode(' ',$file_department);
if(in_array('विभाग' , $splitdept)){
	$contents .= $file_department;
}else{
	$contents .= $file_department.' विभाग' ;
}
}

$contents .='  भोपाल की ओर उनके    यू.ओ.क्र  '.$file_uo_or_letter_no.' दिनांक '.get_date_formate($file_judgment_date,'d/m/Y').' के संदर्भ में उनकी विभागीय नस्ती के साथ भेजकर अनुरोध है कि प्रकरण में प्रभारी अधिकारी को निर्देश दे कि वे तत्काल';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= ' '.$row->scm_name_hi.'</span>,';
    }
} else {
    $contents .= ' <select name="member_id">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}
 $contents .= ' अधिवक्ता नई दिल्ली से संपर्क कर आवश्यक कार्यवाही करें |  </td></tr>';
$contents .= '</table>';
?>   

