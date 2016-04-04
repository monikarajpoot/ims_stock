<?php
$contents  = '' ;
$contents .= '<tr><td colspan="2" align="right"><u>स्पीड पोस्ट द्वारा</u></td></tr>';
$contents .= '<tr>';
$contents .= '<td colspan="2"> <br/><br/> क्रं.';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="head" type="text" />';
$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क(आप),';
$contents .= '<div style="float: right">   भोपाल , दिनांक '.date("d-m-Y").'</div></td></tr>';
$contents .= '<tr><td valign="top" class="style2"> प्रेषक:-</td>';
$contents .= '<td><br>आर. पी. शरण,<br>सचिव<br>मध्यप्रदेश शासन<br> विधि और विधायी कार्य विभाग<br></td></tr>';
$contents .= '<tr><td valign="top" class="style2"> प्रति,</td><td><br>';
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
$contents .= '<br></td></tr>';
$contents .= '<tr><td class="style2">विषय:-</td>';
$contents .= '<td>'.$file_subject.'</td></tr>';
$contents .= '<tr><td class="style2">संदर्भ:-</td><td> आपका ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.', नई दिल्ली, दिनांक '.$file_uo_or_letter_date1.'</td></tr>';
$contents .= '<tr><td class="style2">&nbsp;</td>';
$contents .= '<td><br> उपरोक्त प्रकरण में मध्यप्रदेश राज्य की ओर से प्रतिरक्षण करें और की गई कार्यवाही से विभाग को सूचित करें । <br><br></td></tr>';
$contents .= '<tr><td align="left" colspan="2"><b><u>संलग्न दस्तावेज:-</u></b><br>1-वकालतनामा</td></tr>';
$contents .= '<tr><td colspan="2" align="center"><br><div style="float: right"><b>(आर. पी. शरण)<br> अतिरिक्त सचिव<br> मध्यप्रदेश शासन विधि और विधायी कार्य विभाग भोपाल</b></div><br></td></tr>';
?>
