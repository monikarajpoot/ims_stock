<?php
$contents  = '' ;
$contents .= '<tr><td align="right"  ><u>स्पीड पोस्ट द्वारा</u></td></tr>';
$contents .= '<tr><td align="center"><h4><b><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></b></h4><br/>  <br/> </td></tr>';
$contents .= '<tr><td><div style="float:left"> क्रमांक 12/';
if($is_genrate == true){
	 $contents .= $post_data['head_val_1'];
}
else{
	 $contents .= '<input name="head_val_1" placeholder="file no" type="text" />' ;
}

$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क (आप), </div><div style="float:right;">';
$contents .= 'भोपाल, दिनांक '.date("d-m-Y").'</div></td></tr>';
$contents .= '<tr><td align="left" valign="top">प्रति,</td></tr>';
$contents .= '<tr><td><span style="margin-left:10%"></span>';
if($is_genrate == true){
    $contents .= $post_data['advocate_type'].',';
}else{
    $contents .= '<select name="advocate_type">';
    foreach($advocate_type as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';		
    }
	$contents .= '<option value="शासकीय अधिवक्ता">शासकीय अधिवक्ता</option>';
    $contents .= '</select>';
   
}
$contents .= '</td></tr><tr><td><span style="margin-left:10%"></span>महाधिवक्ता कार्यालय,</td></tr>';
$contents .= '<tr><td><span style="margin-left:10%"></span>मध्यप्रदेश उच्च न्यायालय, </td></tr><tr><td><span style="margin-left:10%">' ;
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location'].'</span>';
}else{
    $contents .= '<select name="court_location">';
    foreach($court_location as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}


$contents .= '</td></tr>';
$contents .= '</td><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="left" valign="top">';
$contents .= '<div style="width:10%; float:left">विषय:- </div> <div style="float:left; width:84%;" ><p style=" margin:0; text-indent:0;">उच्च न्यायालय, म.प्र. ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location2'].'</span>';
}else{
    $contents .= '<select name="court_location2">';
    foreach($court_location2 as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' के CR क्रमांक '.$case_no .'&nbsp';
if($is_genrate == true){
$contents .= $post_data['against_party'];
}else
{
	 $contents .= '<input type="text" name="against_party" >';
	
}
$contents .= ' में हुये निर्णय/आदेश, दिनांक ';
if($is_genrate == true){
$contents .= $post_data['judge_date11'];
}else
{
	$contents .=  '<input type="text" class="date1" name="judge_date11" value="'.$file_judgment_date1.'" placeholder="dd/mm/yyyy" />';
} 
 
$contents .=  '  के संबंध में ।';
$contents .= '</p></div></td></tr><tr><td align="center"  valign="top">';
$contents .= '----0----</td></tr><tr>';
$contents .= '<td align="left"  valign="top">';
$contents .= '<p>संदर्भ हेतु कृपया अपने&nbsp;<span id="Label9">पत्र क्रमांक '.$file_uo_or_letter_no.'     दिनांक  '.$file_uo_or_letter_date1.'   का अवलोकन करने का कष्ट करें । राज्य शासन ने विषयांकित में अब कोई अग्रिम कार्यवाही नहीं करने का निश्चय करते हुये नस्तीबद्ध किया है ।</p>';
$contents .= '</td></tr><tr><td align="right" >';
$contents .= '<b>मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</b></td></tr>';
$contents .= '<tr><td align="center"  valign="top" style="text-align: center"><br />';
$contents .= '<div style="float:right"><b>(';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	 $contents .= '<select name="avar_secetroy">';
	$contents .=  '<option>रजनी पंचोली</option><option>एच. एम. बाथम</option></select>';
}

$contents .= ') <br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else{
    $contents .= '<select name="dsin">';
    foreach($dsig as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '<br />मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</b></div><br /></td>';
$contents .= '</tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';

$contents .= '<tr><td><div style="float:left">पृ0 क्रमांक 12/';
if($is_genrate == true){
	 $contents .= $post_data['head_val_1'];
}
else{
	 $contents .= '--------' ;
}

$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क (आप), </div><div style="float:right;">';
$contents .= 'भोपाल, दिनांक '.date("d-m-Y").'</div></td></tr>';
$contents .= '<tr><td>प्रतिलिपि:- </td></tr>';
$contents .= '<tr><td><div style="margin-left:8%"> जिला दंडाधिकारी  '; 
if($is_genrate == true){
	$contents .= $post_data['distic_1'];
}else
{
$contents  .= get_distic_dd('distic_1');	
}
$contents .= ' की ओर सूचनार्थ अग्रेषित |</div></td></tr>';
$contents .= '</td></tr><tr><td align="right" >';
$contents .= '</td></tr>';
$contents .= '<tr><td align="center"  valign="top" style="text-align: center"><br />';
$contents .= '<div style="float:right"><b>(';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	 $contents .= '----------';
}

$contents .= ') <br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else{
    $contents .= '--------';
}
$contents .= '<br />मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</b></div><br /></td>';
$contents .= '</tr>';