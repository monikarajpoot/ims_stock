<style>
p{
	line-height:24px;
}
</style>
<?php 
$contents  = '<table style="font-size:14px;  width:100%; margin:0% auto;">' ;
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
$contents .= '<tr><td align="center"> '.$file_department.'  का  </td></tr>';
$contents .= '<tr><td align="center"><div style="float:left;">यू.ओ. क्रमांक :'.$file_uo_or_letter_no.'</div><div style="float:right;">दिनांक '.get_date_formate($file_uo_or_letter_date,'d/m/Y').'</div>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="center"> -------000------- </td></tr>';
$contents .= '<tr><td><p>कृपया प्रशासकीय विभाग की नस्ती पर अंकित टीप ';
if($is_genrate == true){
	$contents .= get_date_formate($post_data['date1'],'d/m/Y');
}else{
    $contents .=  '<input type="text" class="date1" name="date1" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}
$contents .= ' का अवलोकन करें। </p></td></tr>';
$contents .= '<tr><td><p>प्रशासकीय विभाग ने उपरोक्त विषयक प्रकरण क्रमांक  '.$case_no.' के निर्णय दिनांक ';
if($is_genrate == true){
	$contents .= get_date_formate($post_data['date5'],'d/m/Y');
}else{
    $contents .=  '<input type="text" class="date1" name="date5" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}
$contents .= ' की छाया प्रतिलिपि भेजकर इस विभाग द्वारा ';
if($is_genrate == true){
$contents .= ' '.$post_data['writappel2'];
}else{
$contents .= ' <select name="writappel2"><option>अपील</option><option>रिट</option></select>';
}
$contents .= ' याचिका प्रस्तुत करने हेतु मत चाहा है। निर्णय दिनांक ';
if($is_genrate == true){
	$contents .= get_date_formate($post_data['date2'],'d/m/Y');
}else{
    $contents .=  '<input type="text" class="date1" name="date2" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}
$contents .= ' के अनुसार  ';
/*if($is_genrate == true){
	$contents .= get_date_formate($post_data['date3'],'d/m/Y');
}else{
    $contents .=  '<input type="text" class="date1" name="date3" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}*/
$contents .= ' अवधि दिनांक ';
if($is_genrate == true){
	$contents .= get_date_formate($post_data['date4'],'d/m/Y');
}else{
    $contents .=  '<input type="text" class="date1" name="date4" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}
$contents .= '  तक उपलब्ध ';
if($is_genrate == true){
	$contents .= ''.$post_data['title_loc'];
} else {
	$contents .= ' <select name="title_loc" class="title_loc">';
	$contents .= '<option value="है">है</option>';
	$contents .= '<option value="थी">थी</option>';
	$contents .= '</select>';
}
$contents .= '|</p> </td></tr>';
$contents .= '<tr><td><p>प्रशासकीय विभाग द्वारा प्रेषित नस्ती दिनांक  ';
$contents .= ' को प्राप्त हुई जिसमे अवधि दिनांक  ';
if($is_genrate == true){
	$contents .= get_date_formate($post_data['avadhidate'],'d/m/Y');
}else{
    $contents .=  '<input type="text" class="date1" name="avadhidate" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}
$contents .= ' तक थी जिसमे कुल दिवस   ';
if($is_genrate == true){
	$contents .= $post_data['dayskul'];
}else{
    $contents .=  '<input type="text" class="" name="dayskul" value="" placeholder="" >';
}
$contents .= ' का विलंब हुआ|  प्रशासकीय विभाग से प्राप्त हुई नस्ती में विलंब  के जोखिम का उत्तरदायित्व प्रशासकीय विभाग पर रहेगा| </p> </td></tr>';
//$contents .= '<tr><td><p> अतः रिट अपील/ एस. एल. पी. हेतु परीक्षनार्थ/ आदेशार्थ प्रस्तुत है|</p> </td></tr>';
$contents .= '<tr><td><p> अत: यदि मान्य हो तो प्रशासकीय विभाग के प्रस्तावानुसार ';
if($is_genrate == true){
	$contents .= ' '.$post_data['advocate_type'];
	$contents .= ' '.$post_data['court_location'];
} else {
	$contents .= ' <select name="advocate_type" class="advocate_type">';
	foreach($advocate_type as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select>';
	$contents .= ' <select name="court_location" class="court_location">';
	foreach($court_location as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select>';
} 
$contents .= '  में ';
if($is_genrate == true){
	$contents .= ''.$post_data['title_type'];
} else {
	$contents .= ' <select name="title_type" class="title_type">';
	$contents .= '<option value="रिट याचिका">रिट याचिका</option>';
	$contents .= '<option value="अपील">अपील</option>';
	$contents .= '</select>';
}
$contents .= '  करने के निर्देश जारी करना प्रस्तावित है।</p> </td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
if($this->uri->segment(6) == 'p' || $this->uri->segment(7) == 'p'  ){
$contents .= '<tr><td><u>अनुभाग अधिकारी (सिविल)</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अवर सचिव (सिविल)</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अति. सचिव (सिविल)</u></td></tr>';
}
$contents .= '</table>';