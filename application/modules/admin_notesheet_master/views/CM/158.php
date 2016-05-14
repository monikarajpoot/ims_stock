<?php
$contents  = '' ;
$contents .= '<tr><td align="right" colspan="3"><b><u>स्पीड पोस्ट</u></b>';
$contents .= '<tr><td align="center" colspan="3"><b><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></b>';
$contents .= '</td></tr><tr><td colspan="3"><table width="100%"><tr><td>क्र 6/';
if($is_genrate == true){
    $contents .= $post_data['head'];
}else{
	$contents .= '<input name="head" placeholder="head" type="text" />';
}

$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क (आप),';
$contents .= '</td><td align="right">भोपाल, दिनांक ';
if($is_genrate == true){
 if($post_data['date1']!= '' ){ $contents .= $post_data['date1']; }else { $contents .= '&nbsp;&nbsp;&nbsp;&nbsp;' ;}
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" placeholder="dd/mm/yyyy" />';
}
$contents .= '</td></tr></table></td></tr>';
$contents .= '<tr><td valign="top" width="55px" class="top_class"> प्रति, </td><td colspan="2"></td></tr>';
$contents .= '<tr><td></td><td colspan="2">कार्यालय कलेक्टर एवं </td></tr>';
$contents .= '<tr><td></td><td colspan="2">जिला दण्डाधिकारी,</td></tr>'; 
$contents .= '<tr><td></td><td colspan="2">जिला ';
if($is_genrate == true){
	$contents .= $post_data['distic_3'];
}else
{
$contents  .= get_distic_dd('distic_3');	
}
$contents .= ', म0प्र0 </td></tr>';
$contents .= '<tr><td valign="top" class="top_class"> ';
$contents .= 'विषय:-</td><td colspan="2" valign="top">';
$contents .= 'विशेष प्रकरण क्रमांक ';
if($is_genrate == true){
	$contents .= '<b>'.$post_data['prakran'].'</b>';
}else{
	 $contents .= '<input type="text" name="prakran" value="'.$case_no.'">';
}
$contents .= ' म0प्र0 शासन विरूद्ध ';
if($is_genrate == true){
	$contents .= '<b>'.$post_data['virudhname'].'</b>';
}else{
	 $contents .= '<input type="text" name="virudhname" >';
}
 $contents .= '</td></tr>';
$contents .= '<tr><td  valign="top" class="top_class"> संदर्भ:- </td><td colspan="2">आपका पत्र क्रमांक ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' दिनांक '.date('d-m-Y',strtotime($file_uo_or_letter_date));
$contents .= '</td></tr><tr><td align="center" colspan="3">';
$contents .= '---000---';
$contents .= '</td></tr><tr><td></td><td colspan="2">';
$contents .= '<p class="text-justify shift-left">उपरोक्त विषयक संदर्भित पत्र के संबंध में लेख है कि अपील दायर करने में हुये विलंब के संबंध में दायित्व निर्धारण तथा विलंब के कारण के परीक्षण हेतु, अपील दायर करने में हुये विलंब के संबंध में अपने अभिमत समेत दायित्व के निर्धारण एवं विलंब के कारण को दर्षित करते हुये सुसंगत दस्तावेज एवं विवरण विधि विभाग में गठित समीक्षा सेल को उपलब्ध कराया जाना सुनिष्चित करें। </p></td></tr><tr>';
$contents .= '<td align="right" colspan="3"><b> मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</b>&nbsp;&nbsp;</td></tr><tr>';
if(($this->uri->segment(6) != 'p' && $is_genrate == false) ||  ($this->uri->segment(7) != 'p' && $is_genrate == true)){
	$contents .= '<tr><td align="right" colspan="3"><div class="officer-center">(Digitally Signed)</div></td></tr>';
} else {
	$contents .= '<tr><td colspan="3">&nbsp;</td></tr>';
}
$contents .= '<tr><td colspan="3" align="right"><div  contenteditable="false" class="officer-center">( ';
if($is_genrate == true){
$contents .=  get_officer_information($this->input->post('avar_secetroy')); 

}else
{
     $contents .= get_officer_for_sign('avar_secetroy' ,$uber_sect ,'', $us_id);
    
}

$contents .= ' )</div></td></tr>';
$contents .= '<tr><td colspan="3"  align="right"><div  contenteditable="false" class="officer-center ">';

if($is_genrate == true){    
    $contents .=   get_officer_dign($this->input->post('avar_secetroy'));
}
else {
     $contents .= '-------';
    }
	
$contents .= '</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div style=""  class="law_dept"  >मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div></td></tr>';
$contents .= '<td>&nbsp;</td><td>&nbsp;</td></tr>';
?>
