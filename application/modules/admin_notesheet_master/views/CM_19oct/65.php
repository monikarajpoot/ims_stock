<?php
$contents  = '' ;
$contents .= '<tr><td>';
$contents .= '<div style="margin-top:20px;"><span style="margin-left:10%;">'.$file_subject.'</span></div><br>';
$contents .= 'पंजी क्रमांक '.$panji_krmank.'/21-क(आप.),<div style="float: right">दिनांक '.$file_mark_section_date.'</div></td></tr>';
$contents .= '<tr><td align="center"><br> _ _ _ _ _ _ _ _ _ _ _ _ <br><br><br></td></tr>';
$contents .= '<tr><td> विभाग का ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.'<div style="float: right">  दिनांक '.$file_uo_or_letter_date1.'</div></td></tr>';
$contents .= '<tr><td> हेड क्रं . 12/';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="file no" type="text" />';
$contents .= '/'.date("Y");
$contents .= '</td></tr>';
$contents .= '<tr><td align="center"><br>--------00--------<br></td></tr>';
$contents .= '<tr><td><br><p> कृपया प्रशासकीय विभाग की टीप दिनांक का अवलोकन करने का कष्ट करें ।</p>';
$contents .= '<p>प्रशासकीय विभाग ने माननीय उच्च न्यायालय ';
if($is_genrate == true){
    $contents .= $post_data['court_location2'];
}else{
    $contents .= '<select name="court_location2">';
    foreach($court_location2 as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' के समक्ष लंबित प्रकरण क्रमांक  '.$case_no.' में अनावेदक म.प्र. शासन की ओर से पक्ष-समर्थन करने हेतु अतिरिक्त महाधिवक्ता,';
$contents .= 'को आवश्यक निर्देश देने बाबत् नस्ती इस विभाग को प्रशासकीय स्वीकृति के साथ भेजी है    ।  </p>';
$contents .= '<p>अत: यदि मान्य हो तो प्रशासकीय विभाग के प्रस्तावानुसार पक्ष-समर्थन करने हेतु निर्देश जारी करना प्रस्तावित है । </p></td></tr>';
$contents .= '<tr><td align="left"><br><br>अनुभाग अधिकारी (आप.) <br><br> अपर सचिव (आप.)';
$contents .= '<br><br></td></tr>';
?>


