<?php
$contents  = '' ;
$contents .= '<tr><td align="center" colspan="2"><h4><u><b>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</b></u></h4></td></tr>';
$contents .= '<tr><td class="style5" colspan="2"><table width="100%"><tr><td align="left">क्रमांक 12/'.date("y").'/'.$panji_krmank.'/21-क (आप), </td><td align="right">भोपाल, दिनांक '.date("d-m-Y").'';
$contents .= '</td></tr></table></td></tr><tr><td class="style7 top_class" > प्रति,</td><td>&nbsp; &nbsp;<br /> शासकीय अधिवक्ता,<br /> कार्यालय महाधिवक्ता,<br /> मध्यप्रदेश न्यायालय,<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location'].'</span>';
}else{
    $contents .= '<select name="court_location" class="court_location">';
foreach($court_location2 as $row){
    $contents .= '<option value="'.$row.'">'.$row.'</option>';
}
    $contents .= '</select>';
}
$contents .= ' (म. प्र.),</td></tr>';
$contents .= '<tr><td class="style7 top_class"  width="55px ">';
$contents .= 'विषय:-</td><td colspan="2"> ';

$contents .= 'एम0 सी0आर0सी0  प्रकरण क्रमांक '.$case_no1[1].'/'.$case_no1[2].' से सम्बंधित न्यायालय ';
if($is_genrate == true){
    $contents .= $post_data['dt4'];
}else{
	 $contents .= get_Court('dt4');
}
$case_no1 = explode('/',$case_no);
$contents .= ' न्यायाधीश, जिला ';
if($is_genrate == true){
$contents .= $post_data['DropDownList22'];
}else
{
       $contents  .= get_distic_dd('DropDownList22');
}
if(!empty($district_name_hi)){
	$contents  .= $district_name_hi;
}
$contents .= '(म.प्र.) के  आपराधिक प्रकरण क्रमांक  ';
$contents .= $case_no1[1].'/'.$case_no1[2].' '.$case_parties1[2].' '.$case_parties1[1];
if($is_genrate == true){
    $contents .= $post_data['against'];
}else{
    $contents .= '<input type="text" name="against" />';
}
$contents .= ' में पारित निर्णय दिनांक ';
if($is_genrate == true){
    $contents .= $post_data['apeel_date'];
}else{
    $contents .= '<input type="text" name="apeel_date" value="'.$file_judgment_date1.'" class="date1"/>';
}

$contents .= ' की प्रति ,';

if($is_genrate == true){
	$contents .= $post_data['ddl_option'];
}else
{
	$contents  .= '<select name="ddl_option" ><option>साक्ष्यो के कथन की नकले </option><option>शासकीय अधिवक्ता का मत </option><option>साक्ष्यो के कथन की नकले व शासकीय अधिवक्ता का मत</option>
	<option>दा० प्र० क्र० _____&#47; ____ के निर्णय की प्रति  </option></select> ';
}
$contents .= ' व अन्य दस्तावेज भेजने बाबत |</td></tr>';
$contents .= '<tr><td align="left"  class="top_class">';
$contents .= 'संदर्भ:-</td><td valign="top">आपका ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' , दिनांक '.date('d-m-Y',strtotime($file_uo_or_letter_date)) ;
$contents .= '<br /></td></tr><tr><td align="center" class="style1 top_class" colspan="2" valign="top">';
$contents .= '---000---';
$contents .= '</td></tr><tr>';
$contents .= '<tr><td></td><td class="style1" colspan="2">कृपया उपरोक्त संदर्भित पत्र का अवलोकन करें ।<br /><br />';
$contents .= '</td></tr>';
$contents .= '<tr><td></td><td align="left" class="style1" valign="top" colspan="2"><p>';
$contents .= 'एम0 सी0आर0सी0  प्रकरण क्रमांक '.$case_no1[1].'/'.$case_no1[2].' से सम्बंधित न्यायालय ';
if($is_genrate == true){
    $contents .= $post_data['dt4'];
}else{
	 $contents .= '-------';
}
$case_no1 = explode('/',$case_no);
$contents .= ' न्यायाधीश, जिला ';
if($is_genrate == true){
$contents .= $post_data['DropDownList22'];
}else
{
       $contents  .= '-------';
}
if(!empty($district_name_hi)){
	$contents  .= $district_name_hi;
}
$contents .= '(म.प्र.) के  आपराधिक प्रकरण क्रमांक  ';
$contents .= $case_no1[1].'/'.$case_no1[2].' '.$case_parties1[2].' '.$case_parties1[1];
if($is_genrate == true){
    $contents .= $post_data['against'];
}else{
    $contents .= '-----------';
}
$contents .= ' में पारित निर्णय दिनांक ';
if($is_genrate == true){
    $contents .= $post_data['apeel_date'];
}else{
    $contents .= '----------';
}

$contents .= ' की प्रति ,';

if($is_genrate == true){
	$contents .= $post_data['ddl_option'];
}else
{
	$contents  .= '-------- ';
}

$contents .= ' व अन्य दस्तावेजों की प्रति इस विभाग की ओर प्रस्तुत करें, तत्पश्चात् प्रकरण में अग्रिम कार्यवाही  की जावेगी । विलंब का दायित्व इस विभाग का नहीं रहेगा ।<br />';
$contents .= '<tr><td align="right" height="60"></td></tr>';
$contents .= '<tr><td colspan="3">&nbsp;</td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div  contenteditable="false" class="officer-center">( ';
if($is_genrate == true){
$contents .=  get_officer_information($this->input->post('avar_secetroy')); 

}else
{
     $contents .= get_officer_for_sign('avar_secetroy' ,$uber_sect ,'', $us_id);
    
}

$contents .= ' )</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div  contenteditable="false" class="officer-center">';

if($is_genrate == true){    
    $contents .=   get_officer_dign($this->input->post('avar_secetroy'));
}
else {
     $contents .= '-------';
    }
$contents .= '</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div  class="law_dept" style="">मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div></td></tr>';

$contents  .= '<tr><td colspan="2"><table width="100%"><tr><td align="left">पृ0 क्रमांक 12/'.date("y").'/'.$panji_krmank.'/21-क (आप), </td><td align="right">भोपाल, दिनांक '.date("d-m-Y").'</td></tr></table></td></tr>  ';
$contents  .= '<tr><td width="100"> प्रतिलिपि:-</td><td ></td></tr>  ';
$contents  .= '<tr><td></td><td><p text-justify>  पुलिस अधीक्षक, जिला';
if($is_genrate == true){
$contents .= $post_data['DropDownList22'];
}else
{
       $contents  .= '----------';
}
 $contents  .= '(म0प्र0) की ओर सूचनार्थ  एवं आवश्यक कार्यवाही हेतु प्रेषित हैं ।</p></td></tr>';
 $contents .= '<tr><td align="right" height="60"></td></tr>';
 $contents .= '<tr><td colspan="2" align="right"><div contenteditable="false" class="officer-center">( ';
if($is_genrate == true){
$contents .=  get_officer_information($this->input->post('avar_secetroy')); 

}else
{
     $contents .= get_officer_for_sign('avar_secetroy' ,$uber_sect ,'', $us_id);
    
}

$contents .= ' )</div></td></tr>';
$contents .= '<tr><td colspan="2" align="right"><div contenteditable="false" class="officer-center ">';

if($is_genrate == true){    
    $contents .=   get_officer_dign($this->input->post('avar_secetroy'));
}
else {
     $contents .= '-------';
    }
	
$contents .= '</div></td></tr>';
$contents .= '<tr><td></td><td align="right"  align="right"><div class="law_dept">मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div></td></tr>';	
?>
