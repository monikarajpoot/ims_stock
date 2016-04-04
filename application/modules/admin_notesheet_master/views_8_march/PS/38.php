<?php 
$contents  = '' ;
$contents .= '<tr><td> <div style="margin-top:20px;"><span style="margin-left:10%;">'.@$file_subject.'</span></div></td></tr>';
$contents .= '<tr><td align="center">------0-------</td></tr>';
$contents .= '<tr><td><div style="float:left"><u>पंजी क्र0 '.$file_number.'/'.date("Y").'/21-क(अभि )</div><div style="float:right">दिनांक   ';
if($is_genrate == true){
$contents .= $post_data['date1'];
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
}
$contents .= '</u></div></td></tr>';
$contents .= '<tr><td><u> गृह विभाग का यू.ओ.क्र '.@$file_uo_or_letter_no.' दिनांक '.date( 'd-m-Y', strtotime( $file_uo_or_letter_date)).'</u></td></tr>';
$contents .= '<tr><td align="center">------0-------</td></tr>';


$contents .= '<tr><td>1-कृपया प्रशासकीय विभाग की टीप दिनांक ';
 if($is_genrate == true){
$contents .= $post_data['teep_date1'];
}else
{
	$contents .=  '<input type="text" class="date1" name="teep_date1" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
}
$contents .=  ' का अवलोकन हो।</td></tr>';
$contents .= '<tr><td>2-प्रशासकीय विभाग ने निम्नलिखित अपराध प्रकरण के वापसी हेतु इस विभाग का मत चाहा है :-</td></tr>';
$contents .= '<tr><td>पुलिस थाना ';
 if($is_genrate == true){
$contents .= $post_data['police_station'];
}else
{
	$contents .=  '<input type="text"  name="police_station" />';
} 
$contents .=  ' जिला ';



 if($is_genrate == true){
$contents .= $post_data['state_1'];
}else
{
	$contents .=  get_distic_dd('state_1'); 
} 
$contents .=  ' अप0 क्र0 ';

 if($is_genrate == true){
$contents .= $post_data['crime_no'];
}else
{
	$contents .=  '<input type="text"  name="crime_no" />';
} 
$contents .=  ' ( प्रक.  क्र.)  ';

 if($is_genrate == true){
$contents .= $post_data['pr_no'];
}else
{
	$contents .=  '<input type="text"  name="pr_no" />';
} 
$contents .=  ' अभियुक्तगण   ';
 if($is_genrate == true){
$contents .= $post_data['crimnal'];
}else
{
	$contents .=  '<input type="text"  name="crimnal" />';
}
$contents .=  ' के बिरुद्ध धारा   ';
 if($is_genrate == true){
$contents .= $post_data['dhara_1'];
}else
{
	$contents .=  '<input type="text"  name="dhara_1" />';
}
$contents .=  ' के अंतर्गत   ';
 if($is_genrate == true){
$contents .= $post_data['according'];
}else
{
	$contents .=  '<input type="text"  name="according" />';
}
$contents .=  ' न्यायालय में लंबित है।  ';
$contents .=  '</td></tr>';

$contents .= '<tr><td>3.	प्रकरण से संबंधित संक्षिप्त विवरण पत्र व्यवहार एवं केस डायरी नीचे अवलोकनार्थ प्रस्तुत है।</td></tr>';
$contents .= '<tr><td>4.	पुलिस अधीक्षक ,जिला दंडाधिकारी ';
if($is_genrate == true){
$contents .= $post_data['police_inspector'];
}else
{
	$contents .=  '<input type="text"  name="police_inspector" />';
} 
$contents .= ' ने प्रकरण का निराकरण न्यायालय से ';
if($is_genrate == true){
	$contents .= $post_data['option_jana'];
}else
{
	$contents .=  '<select name="option_jana"><option>कराया </option><option>वापस लिया </option></select>';
} 
$contents .=  ' जाना उचित बताया है। 
</td></tr>';
$contents .= '<tr><td><p>प्रकरण परीक्षण एवं मतार्थ पस्तुत है ।</p>
</td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';

$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="left"><div style="width:35%; text-align:center;"></div></td></tr>';
$contents .= '<tr><td>&nbsp; </td></tr>';
$contents .= '<tr><td><u>अनुभाग अधिकारी (अभि0) </u></td></tr>';
$contents .= '<tr><td>&nbsp; </td></tr>';
$contents .= '<tr><td><u>अवर सचिव  (अभि0) </u></td></tr>';
$contents .= '<tr><td>&nbsp; </td></tr>';
$contents .= '<tr><td><u>अतिरिक्त सचिव  (अभि0) </u></td></tr>';

//print content
//echo $contents;
?>   

