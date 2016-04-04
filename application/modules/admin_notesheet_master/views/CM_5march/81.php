<?php
$contents  = '' ;
$contents .= '<tr><td colspan="2" align="right"><u>स्पीड पोस्ट द्वारा</u></td></tr>';
$contents .= '<tr>';
$contents .= '<td colspan="2"><div align="center"><b><h4><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></h4></b></div><br />क्रमांक  ';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="head" type="text" />';
$contents .= '/21-क(आप),';
$contents .= '<div style="float: right">भोपाल , दिनांक '.date("d-m-Y").'</div></td></tr>';

$contents .= '<tr><td>प्रति,</td></tr>';
$contents .= '<tr><td><span style="margin-left:65px">महाधिवक्ता </span></td></tr>';
$contents .= '<tr><td><span style="margin-left:65px">महाधिवक्ता कार्यालय, जबलपुर (म0प्र0)</span></td></tr>';

$contents .= '<tr><td colspan="2"><div style="float:left; width:65px">विषय:-</div><p style="text-indent: 0;" >'.$file_subject.'</p></td></tr>';
$contents .= '<tr><td colspan="2"><div style="float:left; width:65px">संदर्भ:-</div><p style="text-indent: 0;" >महाधिवक्ता कार्यालय, जबलपुर का अर्ध शासकीय पत्र क्र0 '.$file_uo_or_letter_no.' दिनांक '.$file_uo_or_letter_date1.' के संबंध में | </p></td></tr>';
$contents .= '<tr><td align="center" colspan="2"> --------0--------- </td></tr>';
$contents .= '<tr><td colspan="2" ><p> &nbsp;&nbsp;उपरोक्त विषयक एवं संदर्भित प्रकरण के संबंध में लेख है कि '.$file_subject.' विधि विभाग में आना नही पाया जाता है |</p></td></tr>';
$contents .= '<br /><br /></td></tr>';


$contents .= '<tr><td colspan="2" align="center"><br /><div style="float: right">(';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	 $contents .= '<select name="avar_secetroy">';
	$contents .=  '<option>रजनी पंचोली</option><option>एच. एम. बाथम</option></select>';
}$contents  .= ')<br>';




	if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else {
    $contents .= '<select name="dsin">';
    foreach ($dsig as $row) {
       if($row == 'अवर सचिव'){
			 $contents .= '<option value="' . $row . '" selected>' . $row . '</option>';
		}else
		{
        $contents .= '<option value="' . $row . '">' . $row . '</option>';
		}
	}
    $contents .= '</select>';
}
 $contents .= '<br /> मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div><br /><br /><br /><br />';
$contents .= '</td></tr>';
?>

