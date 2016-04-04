<?php
$contents  = '' ;
$contents .= '<tr><td><div style="margin-top:20px;"><span style="margin-left:10%;">'.$file_subject.'</span></div><br/>पंजी क्रमांक '.$panji_krmank.'/21-क(आप.),<div style="float:right"> दिनांक '.$file_mark_section_date.'<br /></div></td></tr>';
$contents .= '<tr><td align="center">----------------------------------------------------------------<br></td></tr>';
$contents .= '<tr><td>विभाग का ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.'<div style="float: right"> दिनांक '.$file_uo_or_letter_date1.'</div><br><br>';
$contents .= 'हेड क्रं.';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="file no" type="text" />';
$contents .= '/'.date("Y");
$contents .= '<br></td></tr>';
$contents .= '<tr><td align="center">----000----</td></tr>';
$contents .= '<tr><td align="left" style="text-align: justify;"><p>&nbsp;&nbsp;&nbsp;&nbsp;कृपया प्रशासकीय विभाग से प्राप्त नस्ती का अवलोकन करने का कष्ट करें । </p><p>&nbsp;&nbsp;&nbsp;&nbsp;प्रशासकीय विभाग ने प्रकरण में प्रभारी अधिकारी की नियुक्ति करे ';
$contents .= 'प्रतिरक्षण जारी करने हेतु नस्ती अंकित की है ।</p><p>&nbsp;&nbsp;&nbsp;प्रशासकीय विभाग ने माननीय उच्च न्यायालय &nbsp;';
if($is_genrate == true){
    $contents .= $post_data['court_location2'];
}else{
    $contents .= '<select name="court_location2">';
    foreach($court_location2 as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '<span id="Label4"></span>&nbsp;के समक्ष लंबित प्रकरण क्रमांक '.$case_no.'  में  अनावेदक म.प्र. शासन की ओर से पक्ष-समर्थन करने हेतु ';
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
    $contents .= $post_data['dt2'];
}else{
    $contents .= '<input type="text" name="dt2"/>';
}
$contents .= ' को आवश्यक निर्देश देने बाबत् नस्ती इस विभाग को प्रशासकीय स्वीकृति के साथ भेजी है ।</p>';
$contents .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;अत: यदि मान्य हो तो प्रशासकीय विभाग के प्रस्तावानुसार पक्ष-समर्थन ';
$contents .= 'करने हेतु निर्देश जारी करना प्रस्तावित है ।<br><p></p><p></p></td></tr>';
$contents .= '<tr><td align="left"><br><br><br> <u>अनुभाग अधिकारी (आप.) </u><br><br><br><u>अति. सचिव </u><br><br></td></tr></tbody></table>';
?>



