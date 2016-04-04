<?php
$contents  = '' ;
$contents .= '<tr><td colspan="3">';
$contents .= '<div style="margin-top:20px;"><span style="margin-left:10%;">'.$file_subject.'</span></div></td></tr>';
$contents .= '<tr><td><br/> पंजी क्रमांक '.$panji_krmank.'/21-क(आप.)<br></td>';
$contents .= '<td>&nbsp;</td><td align="right"><br>दिनांक '.$file_mark_section_date.'</span><br></td></tr>';
$contents .= '<tr><td align="center" colspan="3"><br>---------------------------------------<br></td></tr>';
$contents .= '<tr><td colspan="3">';
if($is_genrate == true){
    $contents .= $post_data['advocate_type'];
}else{
    $contents .= '<select name="advocate_type">';
    foreach($advocate_type as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' ';
if($is_genrate == true){
    $contents .= $post_data['court_location'];
}else{
    $contents .= '<select name="court_location">';
    foreach($court_location as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '&nbsp; &nbsp;</td></tr>';

$contents .= '<tr><td>उच्च न्यायालय  ';
if($is_genrate == true){
    $contents .= $post_data['court'];
}else{
    $contents .= '<select name="court" ><option> </option><option>खण्डपीठ</option></select>';
}
$contents .= '&nbsp;';
if($is_genrate == true){
    $contents .= $post_data['state'];
}else{
    $contents .= '<select name="state" ><option> ग्वालियर</option><option>इंदौर</option><option>जबलपुर</option></select>';
}
$contents .= ' का पत्र क्रमांक '.$file_uo_or_letter_no.' दिनांक '.$file_uo_or_letter_date1.'</td></tr>';
$contents .= '<tr><td><br>हेड क्रं. ';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="file no" type="text" />';
$contents .= '/'.date("Y");
$contents .= '<br><br></td>';
$contents .= '<td>&nbsp;</td><td align="right"><br>उच्च न्यायालय ';
if($is_genrate == true){
    $contents .= $post_data['court_location2'];
}else{
    $contents .= '<select name="court_location2">';
    foreach($court_location2 as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '<br><br></td></tr>';
$contents .= '<tr><td align="center" colspan="3"><br> ----000----<br> </td></tr>';
$contents .= '<tr><td align="left" colspan="3"><br><p>कृपया कार्यालय ';
if($is_genrate == true){
    $contents .= $post_data['high_court_list'];
}else{
    $contents .= '<select name="high_court_list" ><option>महाधिवक्ता जबलपुर </option><option>अति0 महाधिवक्ता ग्वालियर  </option><option>अति0 महाधिवक्ता इन्दौर  </option></select>';
}

$contents .= ' से प्राप्त पत्र एवं सह पत्रो सहित अवलोकन हो | ';
$contents .= '<br><p>माननीय उच्च न्यायलय द्वारा पारित ';
if($is_genrate == true){
    $contents .= $post_data['high_court'];
}else{
	 $contents .= '<select name="high_court"><option> निर्णय </option><option> आदेश </option></select>';
}
$contents .= ' दिनांक ';
if($is_genrate == true){
    $contents .= $post_data['date_12'];
}else{
    $contents .= '<input type="text" name="date_12" class="date1"/>';
}
$contents .= ' की ';

$contents .= ' प्रमाणित प्रति भेजकर निर्णय में अग्रिम कार्यवाही ';
if($is_genrate == true){
    $contents .= $post_data['option_yes'];
}else{
	$contents .=  '<select name="option_yes"><option> हाँ </option><option> नहीं </option></select>';
}
$contents .= ' करने का मत व्यक्त किया हैं|</p>';
 $contents .= '<p>';
if($is_genrate == true){
    $contents .= $post_data['high_court'];
}else{
	 $contents .= '<select name="high_court"><option> निर्णय </option><option> आदेश </option></select>';
}
$contents .= ' दिनांक ';
 
if($is_genrate == true){
    $contents .= $post_data['text_123'];
}else{
    $contents .= '<input type="text" name="text_123" value="'.$file_judgment_date1 .'" class="date1"/>';
}
$contents .= ' से यह विशेष प्रमाणित पत्र प्राप्ति हेतु प्रार्थना पत्र देना उचित समझा जाये तो  अवधि अधिनियम के नियम 133 के अनुसार दिनांक  ';
if($is_genrate == true){
    $contents .= $post_data['date_123'];
}else{
    $contents .= '<input type="text" name="date_123" class="date1"/>';
}
$contents .= '&nbsp;तक उपलब्ध ';
 if($is_genrate == true){
    $contents .= $post_data['option_past_pre'];
}else{
	$contents .= '<select name="option_past_pre"><option> है</option><option>थी</option></select>';
}
$contents .= '। प्रकरण में शासन की अपील ';
if($is_genrate == true){
    $contents .= $post_data['option_postpond'];
}else{
    $contents .= '<select name="option_postpond"><option> ख़ारिज</option><option>निरस्त</option><option>स्वीकार</option></select>';
}
$contents .= ' की गई है ।</p> <br></td></tr><tr>';
$contents .= '<td align="center" colspan="3"><br> प्रकरण परीक्षण हेतु प्रस्तुत है ।<br> </td></tr>';
$contents .= '<tr><td align="left" colspan="3"><br><u>अनुभाग अधिकारी (आप.) </u><br> </td></tr>';
$contents .= '<tr><td align="left" colspan="3"><br><u>अवर सचिव (आप.)</u><br><br></td></tr>';
$contents .= '</tbody></table>';
?>



