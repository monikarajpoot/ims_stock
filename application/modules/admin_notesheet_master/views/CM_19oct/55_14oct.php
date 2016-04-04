<?php
$contents  = '' ;
$contents .= '<tr><td align="center" colspan="3" style="font-weight: bold; text-decoration: underline">';
$contents .= 'मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</td></tr><tr><td colspan="3">';
$contents .= 'क्रमांक ';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="head" type="text" />';
$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क(आप),';
$contents .= '<div style="float: right">भोपाल, दिनांक '.date("d-m-Y").'</div></td></tr>';
$contents .= '<tr><td valign="top" colspan="2" width="55px">प्रति,</td>';
$contents .= '<td>&nbsp; &nbsp;<br />जिला दण्डाधिकारी,<br />';
$contents .= $district_name_hi.' (म.प्र.),';
$contents .= '<br /><br /></td></tr> <tr><td valign="top" colspan="2">';
$contents .= 'विषय:-</td><td valign="top" style="text-align: justify">';
$contents .= 'माननीय न्यायिक ';
$contents .= @$this->input->post('nyayalay') && $is_genrate == true ? $this->input->post('nyayalay') : '<input name="adname" type="text" id="TextBox5" />';
$contents .= ' क्र , जिला  '.$district_name_hi.'  (म.प्र.) &nbsp;के  CR प्रकरण क्रमांक '.$case_no.' ';
$contents .= 'म.प्र. शासन विरूद्ध '.$case_parties1[0].' ';
$contents .= 'में पारित आदेश दिनांक  '.$file_judgment_date1.' के संबंध में ।';
$contents .= '<br /></td></tr><tr><td valign="top" colspan="2">';
$contents .= 'संदर्भ:-</td><td valign="top">';
$contents .= 'कार्यालय कलेक्टर एवं जिला दण्डाधिकारी, '.$district_name_hi.' ( म.प्र.) के ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' ' .$file_uo_or_letter_no.' , दिनांक ';
$contents .=  $file_uo_or_letter_date1.' <br /></td>';
$contents .= '</tr><tr> <td align="center" colspan="3" valign="top">';
$contents .= '---000---<br />';
$contents .= '</td></tr><tr>';
$contents .= '<td align="left" valign="top" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$contents .= 'उपर्युक्त विषयांकित एवं संदर्भित पत्र का अवलोकन करें ।<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;आपकी ओर से प्रेषित दोषमुक्ति अपील प्रस्ताव पर विचार किये जाने पश्चात् राज्य शासन  द्वारा आगे कार्यवाही नहीं किये जाने का निर्णय लिया गया है ।';
$contents .= '</td></tr><td align="left" colspan="3" valign="top" style="font-size: 13px">';
$contents .= 'संलग्न दस्तावेज :<br /><span>1-निर्णय की सत्य प्रतिलिपि,</span><br/><span>2-लोक अभियोजक का अपील आधार व मत,</span><br/><span>';
$contents .= '3-साक्षियों के कथन,</span></td></tr>';
$contents .= '<tr><td class="style2" colspan="3" valign="top" align="center"><div style="float: right">';
$contents .= '<span style="font-weight: bold">मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार</span><br /> <br /> <br />';
$contents .= '<b>(';
$contents .= @$this->input->post('adname') && $is_genrate == true ? $this->input->post('adname') : '<input name="adname" type="text" id="TextBox5" />';
$contents .= ')<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else{
    $contents .= '<select name="dsin">';
    foreach($dsig as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '<br /> मध्यप्रदेश शासन विधि ओैर विधायी कार्य विभाग भोपाल</b><br /></div>';
$contents .= '</td></tr><tr><td align="left" colspan="3"><br />';
$contents .= '&nbsp;पृ. क्रं ';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="head" type="text" />';
$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क(आप),';
$contents .= '<div style="float: right">भोपाल, दिनांक '.date("d-m-Y").'</div>';
$contents .= '</td></tr><tr>';
$contents .= '<td align="left" valign="top"><br/><br/>';
$contents .= 'प्रतिलिपि:-</p></td><td align="left" colspan="2" valign="top" style="text-align: justify"><br/><br/>';
$contents .= ' आयुक्त ';
$contents .= $district_name_hi;
$contents .= ' (म.प्र.) सम्भाग ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['sambhag'].'</span>';
}else{
    $contents .= '<select name="sambhag">';
    foreach($sambhag as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '&nbsp;की ओर कार्यालय कलेक्टर एवं जिला दण्डाधिकारी, '.$district_name_hi.'';
$contents .= '&nbsp;म.प्र.&nbsp;के ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' दिनांक '.$file_uo_or_letter_date1.' के संदर्भ में सूचनार्थ प्रेषित ।</p><p>';
$contents .= '&nbsp;</p></td>';
$contents .= '</tr><tr><td align="center" colspan="3" valign="top"><div style="float:right"><b>';
if($is_genrate == true){
    $contents .= '(<span>'.$post_data['adname'].'</span>)';
}else{ $contents .= '__';}
$contents .= '<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else{$contents .= '__';}
$contents .= '<br />';
$contents .= 'मध्यप्रदेश शासन विधि ओैर विधायी कार्य विभाग भोपाल </b>';
$contents .= '</div><br />';
$contents .= '</td></tr>';

