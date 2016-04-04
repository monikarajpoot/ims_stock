<?php 
$contents  = '' ;
$contents .= '<tr><td align="left"> <div style="margin-top:20px;"><span style="margin-left:10%;">';

$contents .= ' रिट याचिका क्र0  ';
if($is_genrate == true){ 
    $contents .=  $post_data['writ_no'];
} else {
    $contents .= ' <input type="text" class="" name="writ_no"  />';
}
if($is_genrate == true){ 
    $contents .=  $post_data['writ_name'];
} else {
    $contents .= ' <input type="text" placeholder="नाम" name="writ_name"  />';
}
$contents .= ' विरूद्ध म0प्र0 शासन एवं अन्य ';

$contents .= ' के संबंध में|</span></div></td></tr>';
$contents .= '<tr><td align="center">--00--</td></tr>';
$contents .= '<tr><td><div style="float:left;">पंजी क्रमांक : '.$panji_krmank.'/'.date("Y").'/21-क(या0)</div><div style="float:right;">, दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date1'],'d/m/Y');
} else {
    $contents .= '<input type="text" class="date1" name="date1" placeholder="dd/mm/yyyy" value="'.$file_mark_section_date.'"/></div>';
}
$contents .=  '</td></tr>';
$contents .= '<tr><td align="center">'.$file_department .' </td></tr>';
$contents .= '<tr><td align="left"><span style="margin-left:8%"></span>कृपया प्रशासकीय विभाग की नस्ती पर अंकित टीप का अवलोकन करें।   </td></tr>';
$contents .= '<tr><td align="left"><p><span style="margin-left:8%"></span>प्रशासकीय विभाग ने विषयांकित प्रकरण  में अनावेदक म.प्र. शासन की ओर से प्रतिरक्षण आदेश जारी करने हेतु नस्ती विधि विभाग को प्रेषित की है। </p></td></tr>';
$contents .= '<tr><td align="left"><p><span style="margin-left:8%"></span>प्रशासकीय विभाग की नस्ती में याचिका की प्रति नही है। विधि विभाग द्वारा म.प्र. शासन की ओर से ही पक्ष समर्थन आदेश जारी किये जाते है। याचिका की प्रति न होने से यह स्पष्ट नही होता कि म.प्र. शासन  इसमें पक्षकार है अथवा नही।</p></td></tr>';
$contents .= '<tr><td align="left"><p><span style="margin-left:8%"></span>अत: प्रशासकीय विभाग की नस्ती लौटाते हुए नस्ती पर याचिका की प्रति अथवा अधिवक्ता पत्र उपलब्ध करायें तभी प्रतिरक्षण आदेश जारी किया जाना संभव होगा। </p></td></tr>';
$contents .= '<tr><td align="left"><p><span style="margin-left:8%"></span>साथ ही यह भी लिखा जाना उचित होगा कि भविष्य में ऐसी नस्ती पर सम्पूर्ण जानकारी उपलब्ध कराकर ही नस्ती भेजी जावे।</p></td></tr>';
if($this->uri->segment(6) == 'p'){

$contents .= '<tr><td><u>अनुभाग अधिकारी (याचिका)</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अवर सचिव (याचिका)</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अति. सचिव (याचिका)</u></td></tr>';
}
$contents .= ' <tr><td></td></tr><tr><td></td></tr>';


?>