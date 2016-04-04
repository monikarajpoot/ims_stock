<style>
p{
	line-height:24px;
}
</style>
<?php 
$contents  = '<table style="font-size:17px;  width:80%; margin:0% auto;">' ;
$contents .= '<tr><td align="center"> फा0क्र0 4(ए),';
if($is_genrate == true){
	$contents .= $post_data['number'];
}else{
	$contents .=  '<input type="text" class="" name="number" required>';
}
$contents .= '/'.date("Y").'/'.$file_number.'/21-क(सि.),  </td></tr> ';
$contents .= '<tr><td align="center"><u><h3>'.$dept_name.'</h3></u></td></tr>';
$contents .= '<tr><td><div style="float:left">फा0क्र0 4(ए),';
if($is_genrate == true){
	$contents .= $post_data['number'];
}else{
	$contents .=  '<input type="text" class="" name="number" required>';
}
$contents .= '/'.date("Y").'/'.$file_number.'/21-क(सि.), </div><div style="float:right">भोपाल, दिनांक  ';
if($is_genrate == true){
	$contents .= get_date_formate($post_data['date1'],'d/m/Y').'</div></td></tr>';
}else{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}
$contents .=  '</div></td></tr>';
$contents .= '<tr><td><p> राज्य शासन, ';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= ' '.$row->scm_name_hi;
    }
} else {
    $contents .= ' <select name="member_id">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' अधिवक्ता, भोपाल को माध्यस्थम अधिकरण भोपाल के समक्ष प्रस्तुत प्रकरण क्रमांक '.$case_no;
if($is_genrate == true){ 
    $contents .=  ' '.$post_data['agenst_name'];
} else {
    $contents .= ' <input type="text" class="" name="agenst_name" value="'.$agenst_name.'" />';
}
$contents .= ' विरूद्ध म.प्र. शासन एवं अन्य मे, शासन की ओर से पैरवी करने हेतु नियुक्त करता है। ';
$contents .= ' <tr><td> <p>उन्हें म.प्र. सिविल कोर्ट नियम 1961 के नियम 523 के अनुसार फीस देय होगी, जिसकी अधिकतम सीमा रूपये-5000/-(रूपये पांच हजार) केवल होगी, परन्तु यदि प्रकरण का निराकरण समय के पूर्व प्रारंभिक स्टेज पर हो जाता है, तो यह फीस अधिकतम सीमा रूपये-1000/-(रूपये एक हजार) केवल होगी। </p></td></tr>';
$contents .= '<tr><td align="right">मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार</td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;"><b>('.$us_name.')</b></div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अवर सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';
$contents .= '<tr><td align="center"><div style="float:left;">  फा0क्र0 4(ए),';
if($is_genrate == true){
	$contents .= $post_data['number'];
}else{
	$contents .=  '<input type="text" class="" name="number" required>';
}
$contents .= '/'.date("Y").'/'.$file_number.'/21-क(सि.), </div><div style="float:right;">भोपाल, दिनांक ';
if($is_genrate == true){
	$contents .= get_date_formate($post_data['date4'],'d/m/Y').'</div> </td> </tr>';
}else{
	$contents .= '<input type="text" class="date1" name="date4" placeholder="dd/mm/yyyy"  value="'.$today.'"/></div></td></tr>';
}

$contents .= '<tr><td><u>प्रतिलिपि:</u></td></tr>';
$contents .= '<tr><td>1- न्यायालय माध्यस्थम अधिकरण, विंध्यांचल भवन भोपाल की ओर सूचनार्थ अग्रेषित।  ।<br/>
 2- सचिव, म.प्र. शासन, '.$file_department.', की ओर उनके जावक क्रमांक '.$file_uo_or_letter_no.', दिनांक  '.get_date_formate($file_uo_or_letter_date,'d/m/Y').' के संदर्भ में उनकी नस्ती सहित सूचनार्थ एवं आवश्यक कार्यवाही हेतु अग्रेषित। <br/> ';
$contents .= '3- ';
if($is_genrate == true){ 
    $contents .=  ' '.$post_data['name'];
} else {
    $contents .= ' <input type="text" class="" name="name" value="" />';
}
$contents .= ' म.प्र. की ओर सूचनार्थ एवं आवश्यक कार्यवाही हेतु अग्रेषित। <br/>';

$contents .= '4-  ';
if($is_genrate == true){ 
    $contents .=  ' '.$post_data['name1'];
} else {
    $contents .= ' <input type="text" class="" name="name1" value="" />';
}
$contents .= ' की ओर सूचनार्थ एवं आवश्यक कार्यवाही हेतु अग्रेषित।</td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;"><b>('.$us_name.')</b></div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अवर सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';
$contents .= '</table>';
?>


