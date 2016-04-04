<?php
$contents  = '' ;
$contents .= '<tr><td align="center" colspan="2"><h4><u><b>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</b></u></h4></td></tr>';
$contents .= '<tr><td class="style5" colspan="2"> क्रमांक 12/'.date("y").'/'.$panji_krmank.'/21-क (आप),<div style="float: right">भोपाल, दिनांक '.date("d-m-Y").'';
$contents .= '</div></td></tr><tr><td class="style7 top_class" > प्रति,</td><td>&nbsp; &nbsp;<br /> शासकीय अधिवक्ता,<br /> कार्यालय महाधिवक्ता,<br /> मध्यप्रदेश न्यायालय,<br />';
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
$contents .= 'विषय:-</td><td colspan="2" style="text-align: justify"> ';
$contents .= 'माननीय न्यायालय, ';
if($is_genrate == true){
    $contents .= $post_data['dt4'];
}else{
	 $contents .= get_Court('dt4');
}
$case_no1 = explode('/',$case_no);
$contents .= '<span id="Label5"> न्यायाधीश,</span>&nbsp;जिला '.$district_name_hi.' ';
$contents .= '<span id="l2">(म.प्र.)</span>&nbsp;के  '.$case_no1[0].' ';
$contents .= '  प्रकरण क्रमांक '.$case_no1[1].' '.$case_no1[2].' '.$case_parties1[2].' '.$case_parties1[1];
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

$contents .= ' से सम्बंधित ';

if($is_genrate == true){
	$contents .= $post_data['ddl_option'];
}else
{
	$contents  .= '<select name="ddl_option" ><option>साक्ष्यो के कथन की नकले </option><option>शासकीय अधिवक्ता का मत </option><option>साक्ष्यो के कथन की नकले व शासकीय अधिवक्ता का मत</option>
	<option>दा० प्र० क्र० _____&#47; ____ के निर्णय की प्रति  </option></select> ';
}
$contents .= ' व अन्य दस्तावेज भेजने बाबत |	 </td></tr>';
$contents .= '<tr><td align="left"  class="top_class">';
$contents .= 'संदर्भ:-</td><td valign="top">आपका ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' , दिनांक '.date('d-m-Y',strtotime($file_uo_or_letter_date)) ;
$contents .= '<br /></td></tr><tr><td align="center" class="style1 top_class" colspan="2" valign="top">';
$contents .= '---000---';
$contents .= '</td></tr><tr>';
$contents .= '<tr><td class="style1" colspan="3"><span style="margin-left:9%;" ></span>कृपया उपरोक्त संदर्भित पत्र का अवलोकन करें ।<br /><br />';
$contents .= '</td></tr>';
$contents .= '<tr><td align="left" class="style1" valign="top" colspan="3"><p>&nbsp;&nbsp;&nbsp;';
$contents .= 'क्र '.$case_no.' '.$case_parties1[2].' '.$case_parties1[1].' '.$case_parties1[0];
$contents .= ' के प्रकरण में सम्बंधित न्यायालय द्वारा सत्र प्रकरण क्रमांक ';
$contents .= @$this->input->post('test1') && $is_genrate == true ? $this->input->post('test1') : '<input name="test1" type="text"/>';
$contents .= ' में  पारित निर्णय दिनांक ';
if($is_genrate == true){ 
    $contents .=  '<b>'.$post_data['date_11'].'</b>';
} else {
    $contents .= '<input type="text" id="date2"name="date_11"  />';
}
$contents .= ' की प्रति एवं साक्षियों के कथनों की नकले व अन्य दस्तावेजों';

$contents .= ' की प्रति इस विभाग की ओर प्रस्तुत करें, तत्पश्चात् प्रकरण में अग्रिम कार्यवाही  की जावेगी । विलंब का दायित्व इस विभाग का नहीं रहेगा ।<br />';
$contents .= '</p></td></tr><tr><td colspan="2" align=center>';
$contents .= '<br /><br /><br /> <div style="float:right">(';
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
$contents .= '<br /> मध्यप्रदेश शासन विधि ओैर विधायी कार्य विभाग, भोपाल</div></td></tr>';
?>
<style>
td.top_class {vertical-align: top;}
</style>