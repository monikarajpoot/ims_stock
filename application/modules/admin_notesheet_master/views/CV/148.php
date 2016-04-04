<style>
p{
	line-height:26px;
}
</style>
<?php 
$contents  = '<table style="font-size:17px;  width:80%; margin:0% auto;">' ;
$contents .= '<tr><td align="left"><div style="margin-top:20px;"><span style="margin-left:10%;">';
if($is_genrate == true){ 
    $contents .=  ' '.$post_data['subject'];
} else {
    $contents .= ' <textarea name="subject" style="margin: 0px; height: 40px; width: 80%;">'.$file_subject.'</textarea>';
}
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><div style="float:left">पंजी क्रमांक  '.$file_number.'/21-क(सि.),  </div><div style="float:right">भोपाल, दिनांक  ';
if($is_genrate == true){
$contents .= get_date_formate($post_data['date'],'d/m/Y').'</div></td></tr>';
}else
{
    $contents .=  '<input type="text" class="date1" name="date" value="'.$file_mark_section_date.'" placeholder="dd/mm/yyyy" required>';
}
$contents .=  '</div></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="center"> -------000------- </td></tr>';
$contents .= '<tr><td><p>कृपया ';
if($is_genrate == true){
	$contents .= ' '.$post_data['type_name'];
} else {	
	$contents .= ' <select name="type_name" class="type_name">';
	$contents .= '<option value=""></option>';
	$contents .= '<option value="कार्यालय कलेक्टर">कार्यालय कलेक्टर</option>';
	$contents .= '<option value="महाधिवक्ता">महाधिवक्ता</option>';
	$contents .= '<option value="शासकीय अधिवक्ता">शासकीय अधिवक्ता</option>';
	$contents .= '</select>';
}
if($is_genrate == true){
	$contents .= ' '.$post_data['name_who'];
}else{
    $contents .=  ' <input type="text" class="name_who" name="name_who" value="" placeholder="">';
}	
$contents .= ' से प्राप्त पत्र के साथ संलग्न याचिका की प्रति का अवलोकन कीजिये। </p></td></tr>';
$contents .= '<tr><td><p>उपरोक्त विषयांकित प्रकरण के संबंध में यह है की विधि नियमावली के अधीन प्रस्ताव प्रशासकीय विभाग के माध्यम से प्राप्त होने पर ही कार्यवाही की जाति है?</p></td></tr>';
$contents .= '<tr><td><p>अतः पत्र मूलतः वापस करते हुए यह लेख किया जाना उचित होगा कि प्रकरण सम्बंधित  प्रशासकीय विभाग ';
if($is_genrate == true){
	$contents .= ' '.$post_data['vibhag'];
}else{
    $contents .=  ' <input type="text" class="vibhag" name="vibhag" value="'.$file_department.'" placeholder="">';
}
$contents .= ' के माध्यम से कार्यवाही किये जाने पर ही अग्रिम कार्यवाही किया जाना संभव होगा|</p> </td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अनुभाग अधिकारी (सिविल)</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अवर सचिव (सिविल)</u></td></tr>';
$contents .= '</table>';