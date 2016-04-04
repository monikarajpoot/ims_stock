<?php 
$contents  = '' ;
$contents .= '<tr><td align="center"><u><h3>'.$dept_name.'</h3></u></td></tr>';
$contents .= '<tr><td align="center"><u><h4>//आदेश//</h4></u></td></tr>';
$contents .= '<tr><td><div style="float:left">क्रमांक  3(ए)/';
if($is_genrate == true){ 
	$contents .=  ''.$post_data['number'];
} else {
	$contents .= ' <input type="text" class="" name="number">';
}
$contents .=  '/'.date("Y").'/'.$file_number.'/21-क(सि.),  </div><div style="float:right">भोपाल, दिनांक  ';
if($is_genrate == true){
$contents .= get_date_formate($post_data['date1'],'d/m/Y').'</div></td></tr>';
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}
$contents .=  '</div></td></tr>';
$contents .= ' <tr><td align="left">राज्य शासन,  ';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= ' '.$row->scm_name_hi.', '.$row->scm_post_hi.', '.$row->scm_court_name_hi;
    }
} else {
    $contents .= ' <select name="member_id">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ', नई दिल्ली के राज्य उपभोक्ता फोरम  ';
if($is_genrate == true){
	$contents .= ''.$post_data['title_loc'];
} else {
	$contents .= ' <select name="title_loc" class="title_loc">';
	$contents .= '<option value="नई दिल्ली">नई दिल्ली</option>';
	$contents .= '<option value="भोपाल">भोपाल</option>';
	$contents .= '</select>';
}
$contents .= ' के समक्ष प्रकरण क्रमांक '.$case_no;
if($is_genrate == true){
$contents .= ' '.$post_data['agenst'] ;
}else{
$contents .= ' <input type="text" name="agenst" value="'.$agenst.'"/> ';
}
$contents .= ' विरूद्ध ';
if($is_genrate == true){
$contents .= ' '.$post_data['agenst_name'] ;
}else{
$contents .= '<input type="text" name="agenst_name" value="'.$agenst_name.'"/> ';
}
$contents .= ' में पारित निर्णय दिनांक  '.get_date_formate($file_judgment_date,'d/m/Y').' के विरुध्द ' ;
if($is_genrate == true){ 
	$contents .=  ''.$post_data['where'];
} else {
	$contents .= ' <input type="text" class="" name="where">';
}
$contents .= ', नई दिल्ली में अपील दायर कर शासन की ओर से पैरवी करने हेतु एतद् द्वारा नियुक्त करता है।';
$contents .= '</td></tr>';
$contents .= '<tr><td><p> इस सम्बंध में फीस का भुगतान विधि विभाग द्वारा जारी आदेश दिनांक ';
if($is_genrate == true){
	$contents .= get_date_formate($post_data['date2'],'d/m/Y').'';
}else{
	$contents .=  '<input type="text" class="date1" name="date2" value="'.$file_judgment_date.'" placeholder="dd/mm/yyyy" />';
}
$contents .= ' में वर्णित शर्तो के अधीन प्रशासकीय विभाग द्वारा किया जायेगा |</p></td></tr>';
$contents .= '<tr><td align="right">मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;"><b>('.$as_name.')</b></div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अतिरिक्त सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';
$contents .= '<tr><td><div style="float:left">क्रमांक  3(ए)/';
if($is_genrate == true){ 
	$contents .=  ''.$post_data['number'].'';
} else {
	$contents .= ' <input type="text" class="" name="number">';
}
$contents .=  '/'.date("Y").'/'.$file_number.'/21-क(सि.),  </div><div style="float:right">भोपाल, दिनांक  ';
if($is_genrate == true){
$contents .= get_date_formate($post_data['date1'],'d/m/Y').'</div></td></tr>';
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}
$contents .=  '</div></td></tr>';
$contents .= '<tr><td>प्रतिलिपि:-</td></tr>';
$contents .=  '<tr><td>1- <p>सचिव, म0प्र0 शासन,‍ ';
$contents .=  ' <b>'.$file_department.'</b>';
$contents .=  ', मंत्रालय भोपाल की ओर उनके यू0ओ0क्र0 <b>'.$file_uo_or_letter_no.'</b>, दिनांक  ';
$contents .=  ' '.get_date_formate($file_uo_or_letter_date,'d/m/Y');
$contents .=  ' के संदर्भ में उनकी नस्ती सहित सूचनार्थ एवं आवश्यक कार्यवाही हेतु अग्रेषित। ';
$contents .= '<tr><td>2- <p>';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id4']) as $row){
        $contents .= ' <b>'.$row->scm_name_hi.', '.$row->scm_post_hi.', '.$row->scm_court_name_hi.', '.$row->scm_address_hi.', '.$row->scm_pincode_hi.'</b>';
    }
} else {
    $contents .= ' <select name="member_id4">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' की ओर वकालतनामा संलग्न कर आवश्यक कार्यवाही हेतु अग्रेषित।</p></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;"><b>('.$as_name.')</b></div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अतिरिक्त सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';
?>


