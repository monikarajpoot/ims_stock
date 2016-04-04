<?php
$contents  = '' ;
$contents .= '<tr><td colspan="2" align="right"><u>स्पीड पोस्ट द्वारा</u></td></tr>';
$contents .= '<tr>';
$contents .= '<td colspan="2"><div align="center"><b><h4><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></h4></b></div><br />क्रमांक  ';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="head" type="text" />';
$contents .= '/21-क(आप),';
$contents .= '<div style="float: right">भोपाल , दिनांक '.date("d-m-Y").'</div></td></tr>';

$contents .= '<tr><td valign="top">प्रति,</td><td><br />';

$contents .= '</td></tr>';
$contents .= '<tr><td>विषय:-</td><td>'.$file_subject.'</td></tr>';
$contents .= '<tr><td>संदर्भ:-</td><td>महाधिवक्ता कार्यालय, जबलपुर का अर्द्ध शासकीय पत्र क्र0 '.$file_uo_or_letter_no.' दिनांक '.$file_uo_or_letter_date1.' के संबंध में | </td></tr>';
$contents .= '<tr><td align="center" colspan="2"> --------0--------- </td></tr>';
$contents .= '<tr><td colspan="2" ><p> &nbsp;&nbsp;उपरोक्त विषयक एवं संदर्भित प्रकरण के संबंध में लेख है कि '.$file_subject.' विधि विभाग में आना नही पाया जाता है |</p></td></tr>';
$contents .= '<br /><br /></td></tr>';

$contents .= '<tr><td align="left" colspan="2"> संलग्न :-  महाधिवक्ता कार्यालय जबलपुर से प्राप्त अर्द्ध शासकीय पत्र की छायाप्रति |</td></tr>';
$contents .= '<tr><td colspan="2" align="center"><br /><div style="float: right">(अमिताभ मिश्र) <br /> अतिरिक्त सचिव <br /> मध्यप्रदेश शासन विधि और विधायी कार्य विभाग भोपाल</div><br /><br /><br /><br />';
$contents .= '</td></tr>';
?>

