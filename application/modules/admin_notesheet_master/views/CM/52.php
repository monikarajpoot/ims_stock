<?php
$contents  = '' ;
$contents .= '<tr><td colspan="2" align="right"><u><b>स्पीड पोस्ट द्वारा</b></u></td></tr>';
$contents .= '<tr><td colspan="2"><div align="center"><b><h4><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></h4></b></div></td></tr><tr><td colspan="2"><table width="100%"><tr><td align="left">क्रं. ';
if($is_genrate == true){
    $contents .= $post_data['head'];
}else{
	$contents .= '<input name="head" placeholder="head" type="text" />';
}

$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क(आप),';
$contents .= '</td><td  align="right">भोपाल , दिनांक '.date("d-m-Y").'</td></tr></table></td></tr>';
$contents .= '<tr><td valign="top"  width="55px">प्रेषक:-</td><td><br />आर. पी. शरण<br />सचिव,<br />मध्यप्रदेश शासन<br />विधि और विधायी कार्य विभाग<br /></td></tr>';
$contents .= '<tr><td valign="top">प्रति,</td><td><br />';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= $row->scm_name_hi;
        $contents .= ',<br />';
        $contents .= $row->scm_post_hi.', '.$row->scm_court_name_hi.',<br/>';
        $contents .= $row->scm_address_hi.',<br/>';
        $contents .= $row->scm_pincode_hi;
    }
} else {
    $contents .= '<select name="member_id">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
    $contents .= '<br/>__';
}
$contents .= '</td></tr>';
$contents .= '<tr><td>विषय:-</td><td>'.$file_subject.'</td></tr>';
$contents .= '<tr><td>संदर्भ:-</td><td>आपका ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' /'.$file_uo_or_letter_no.', न्यू दिल्ली, दिनांक '.$file_uo_or_letter_date1.'</td>';
$contents .= '</tr><tr><td colspan="2"><br/>';
$contents .= '<p> &nbsp;&nbsp;उपरोक्त प्रकरण में मध्यप्रदेश राज्य की ओर से प्रतिरक्षण करें और की गयी कार्यवाही  से इस विभाग को सूचित करें तथा प्रश्नगत मामला किस जिले और किस पुलिस थाने से संबंधित   है, कि जानकारी भी इस विभाग को प्रेषित करें । उक्त जानकारी प्राप्त होने पर प्रभारी  अधिकारी की नियुक्ति के लिए संबंधित पुलिस अधिकारी और जिला दण्डाधिकारी को आदेश पृथक  से जारी किया जायेगा ।</p>';
$contents .= '<br /><br /></td></tr>';
$contents .= '<tr><td align="left" colspan="2"><u>संलग्न दस्तावेज:-</u><br />1-वकालतनामा</td></tr>';
$contents .= '<tr><td colspan="3">&nbsp;</td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div contenteditable="false" class="officer-center">( ';
if($is_genrate == true){
$contents .=  get_officer_information($this->input->post('secetroy')); 

}else
{
     $contents .= get_officer_for_sign('secetroy' ,$secetry ,'', $s_id );
    
}

$contents .= ' )</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div contenteditable="false" class="officer-center">';

if($is_genrate == true){    
    $contents .=   get_officer_dign($this->input->post('secetroy'));
}
else {
     $contents .= '-------';
    }
$contents .= '</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div  class="law_dept" style="">मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div></td></tr>';
?>
