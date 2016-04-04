<?php
$contents  = '' ;
$contents .= '<tr><td align="center" colspan="3"><h4><b><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></b></h4><br/>  <br/> </td></tr>';
$contents .= '<tr><td colspan="2"> क्रमांक 12/';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="file no" type="text" />';
$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क (आप),</td>';
$contents .= '<td align="right">भोपाल, दिनांक '.date("d-m-Y").'</td></tr>';
$contents .= '<tr><td align="left" valign="top" width="55px">प्रति,</td><td>&nbsp; &nbsp;<br /> ';
if($is_genrate == true){
    $contents .= $post_data['advocate_type'].',';
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
$contents .= '<div style="height:2px"></div>विषय:-</td><td colspan="2">उच्च न्यायालय, म.प्र. ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location2'].'</span>';
}else{
    $contents .= '<select name="court_location2">';
    foreach($court_location2 as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' के CR क्रमांक '.$case_no.' में हुये निर्णय/आदेश, दिनांक '.$file_judgment_date1.'   के विरूद्ध योग्यता प्रमाण-पत्र प्राप्त करने के संबंध में ।';
$contents .= '</td></tr><tr><td align="center" colspan="3" valign="top">';
$contents .= '----0----</td></tr><tr>';
$contents .= '<td align="left" colspan="3" valign="top">';
$contents .= '<p>संदर्भ हेतु कृपया अपने&nbsp;<span id="Label9">पत्र क्रमांक '.$file_uo_or_letter_no.'     दिनांक  '.$file_uo_or_letter_date1.'   का अवलोकन करने का कष्ट करें । राज्य शासन ने विषयांकित में अब कोई अग्रिम कार्यवाही नहीं करने का निश्चय करते हुये नस्तीबद्ध किया है ।</p>';
$contents .= '</td></tr><tr><td align="right" colspan="3">';
$contents .= '<b>मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</b></td></tr>';
$contents .= '<tr><td align="center" colspan="3" valign="top" style="text-align: center"><br />';
$contents .= '<div style="float:right"><b>(';
$contents .= @$this->input->post('adname') && $is_genrate == true ? $this->input->post('adname') : '<input name="adname" type="text" id="TextBox5" />';
$contents .= ') <br /><br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else{
    $contents .= '<select name="dsin">';
    foreach($dsig as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '<br /><br />मध्यप्रदेश शासन विधि और विधायी कार्य विभाग भोपाल</b></div><br /></td>';
$contents .= '</tr>';
       



