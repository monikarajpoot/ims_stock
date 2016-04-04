<?php
$contents  = '' ;
$contents .= '<tr><td align="right" colspan="3"><u>स्पीड-पोस्ट द्वारा</u></td></tr>';
$contents .= '<tr><td align="center" colspan="3"><h2><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></h2></b></td>';
$contents .= '</tr>';
$contents .= '<tr>';
$contents .= '<td colspan="2"> क्रमांक 6/';
if($is_genrate == true){
$contents .= $post_data['head'];
}else
{
	$contents .=  '<input type="text" name="head"  />';
}

$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क (आप),</span';
$contents .= '</td><td align="right"><span id="Label1">भोपाल, दिनांक '.date("d-m-Y").' </td>';
$contents .= '</tr><tr><td align="left" valign="top" width="55px"> प्रति,</td><td>&nbsp; &nbsp;<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['advocate_type'].',</span>';
}else{
    $contents .= '<select name="advocate_type">';
    foreach($advocate_type as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
    $contents .= '<br/>__ कार्यालय,';
}
$contents .= '<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['advocate_type'].' कार्यालय,<br /></span>';
}
$contents .= 'मध्यप्रदेश उच्च न्यायालय,<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location'].'</span>';
}else{
    $contents .= '<select name="court_location">';
    foreach($court_location as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' (म.प्र.),<br />';
$contents .= '</td><td>&nbsp;</td></tr><tr><td align="left" valign="top">';
$contents .= 'विषय:-</td><td colspan="2" valign="top"><div id="dv1">';
$contents .= 'माननीय न्यायालय, ';
if($is_genrate == true){
    $contents .= $post_data['dt4'];
}else{
	 $contents .= get_Court('dt4');
}
$case_no1 = explode('/',$case_no);
$contents .= '<span id="Label5"> न्यायाधीश,</span>&nbsp;जिला '.$district_name_hi.' ';
$contents .= '<span id="l2">(म.प्र.)</span>&nbsp;के  '.$case_no1[0].' ';
$contents .= '  प्रकरण क्रमांक '.$case_no1[1].' '.$case_no1[2].' '.$case_parties1[2].' '.$case_parties1[1].' '.$case_parties1[0].'  के मामले में अभियुक्तगण को';
$contents .= ' भा.दं.वि. की धारा ';
if($is_genrate == true){
    $contents .= $post_data['dhara'];
}else{
	 $contents .= get_Court('dhara');
}
$contents .= ' में पारित दोषमुक्ति निर्णय दिनांक '.$file_judgment_date1.'  ';
$contents .= 'के विरूद्ध अपील प्रस्तुत किये जाने बावत् । &nbsp;</div>&nbsp;';
$contents .= '</td></tr><tr><td  valign="top">';
$contents .= '<div style="height: 1px"></div>';
$contents .= 'सन्दर्भ:-</td><td colspan="2" style="text-align: justify">कार्यालय  शासकीय अभिभाषक '.$district_name_hi.' , जिला '.$district_name_hi.'  (म.प्र.)  के पत्र/फाइल क्रमांक /' .$file_uo_or_letter_no.'/ कार्या०/शास०/अभि०, दिनांक ';
if($is_genrate == true){
$contents .= $post_data['date11'];
}else
{
	$contents .=  '<input type="text" class="date1" name="date11" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
} 
$contents .= '</td></tr>';
$contents .= '<tr><td align="center" colspan="3" valign="top">';
$contents .= '---0---';
$contents .= '</td></tr>';
$contents .= '<tr><td colspan="3"><p>राज्य शासन द्वारा उपरोक्त विषयांतर्गत एवं संदर्भित प्रकरण में पारित आदेश दिनांक ';
if($is_genrate == true){
	$contents .= $post_data['text1'];
}else{ 
$contents .= '<input name="text1" type="text" class="date1" />';
}
$contents .= ' के विरुद्ध ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['against'].'</span>';
}else{
    $contents .= '<select name="against"><option>पुनरीक्षण</option><option>रिवीजन</option><option>रिट याचिका   </option><option>निगरानी  याचिका   </option></select>';
}
$contents .= 'याचिका प्रस्तुत करने का निर्णय लिया गया है |</p></td></tr>';
$contents .= '<tr><td colspan="3"><p>अतः आज राज्य शासन द्वारा लिये गये निर्णय के अनुसार दण्ड प्रक्रिया संहिता की धारा 397,401,482 के अंतर्गत म0 प्र0 उच्च न्यायालय के समक्ष ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['against'].'</span>';
}else{
    $contents .= '<select name="against"><option>पुनरीक्षण</option><option>रिवीजन</option><option>रिट याचिका   </option><option>निगरानी  याचिका   </option></select>';
}
 $contents .= '  प्रस्तुत करने की समुचित कार्यवाही करें | तथा कार्यवाही की सूचना शीघ्र विधि विभाग को प्रेषित करें |</p></td></tr>';

$contents .= '<tr><td colspan="3">संलग्न दस्तावेज :- </td></tr>';
$contents .= '<tr><td colspan="3">';
$contents .= '<span>1-निर्णय की सत्य प्रतिलिपि,<br />2-लोक अभियोजक का मत,<br />3-साक्षियों के कथन,<br /></span></td></tr>';

$contents .= '<tr><td colspan="3" align="right"><div style="margin-right:15%;">मध्यप्रदेश के राज्यपाल के नाम से आदेशानुसार , </div></td></tr>';
$contents .= '<tr><td align="right" height="80"></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div class="officer-center">( ';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	 $contents .= get_officer_for_sign('avar_secetroy' ,$uber_sect , getEmployeeSection());
	
}

$contents .= ' )</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div class="officer-center ">';

if($is_genrate == true){	
    $contents .=  get_officer_for_sign_dign("design",$uber_sect,$this->input->post('avar_secetroy'));
}
else {
	 $contents .= '-------';
	}
	
$contents .= '</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div style=""  class="officer-center ">मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div></td></tr>';
$contents .= '<td>&nbsp;</td><td>&nbsp;</td></tr>';
?>