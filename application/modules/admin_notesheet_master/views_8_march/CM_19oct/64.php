<?php
$contents  = '' ;
$contents .= '<tr><td>';
$contents .= '<div style="margin-top:20px;"><span style="margin-left:10%;">'.$file_subject.'</span></div><br>';
$contents .= 'पंजी क्रमांक '.$panji_krmank.'/21-क(आप.),<div style="float: right"> दिनांक '.$file_mark_section_date.'</span></div></td></tr>';
$contents .= '<tr><td align="center"><br>-------00------<br><br></td></tr>';
$contents .= '<tr><td><br><p>कृपया विचाराधीन पत्र का अवलोकन करने का कष्ट करें |</p><p>';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= ' <b>'.$row->scm_name_hi.'</b>';
    }
}else{
$contents .= '<select name="member_id">';
foreach($standing_counsil_memebers as $row){
    $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
}}
$contents .= '</select>';
$contents .= ' स्थायी अधिवक्ता, नई दिल्ली के ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' दिनांक  '.$file_judgment_date1.' </p>';
$contents .= '<p>उच्चतम न्यायालय में म.प्र. शासन  के स्थायी अधिवक्ता,     ';
if($is_genrate == true){
foreach(get_advocates_name('', $post_data['member_id']) as $row){
    $contents .= ' <b>'.$row->scm_name_hi.'</b>';
}}else{
    $contents .= '_';
    }
$contents .= ' , को प्रेषित विचाराधीन';
$contents .= 'पत्र के संदर्भ में वकालतनामा व प्रतिरक्षण के लिए आदेश जारी किया जाना उचित होगा । </p><p> अनुमोदित होने पर वकालतनामा व आदेश की प्रतिलिपि हस्ताक्षर प्रस्तुत है । </p></td></tr>';
$contents .= '<tr><td align="left"><br><br> अनु. अधि. (आप.)';
$contents .= '<br><br>अवर सचिव (आप.)<br><br> अति. सचिव (आप.) </td></tr>';
?>



