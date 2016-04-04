<?php
$contents  = '' ;
$contents .= '<tr><td colspan="2" align="right"><u>स्पीड पोस्ट द्वारा</u></td></tr>';
$contents .= '<tr>';
$contents .= '<td colspan="2"><div align="center"><b><h4><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></h4></b></div><br />क्रमांक  ';
$contents .= '6/'.$panji_krmank.'/'.date("y").'/ 21-क(आप),';
$contents .= '<div style="float: right">भोपाल , दिनांक '.date("d-m-Y").'</div></td></tr>';

$contents .= '<tr><td>प्रति,</td></tr>';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= '<tr><td align="left" colspan="2" ><span style="margin-left:12%">'.$row->scm_name_hi.'</span>,</td></tr>';
        $contents .= '<tr><td align="left" colspan="2" ><div style="margin-left:12%">'.$row->scm_post_hi.', '.$row->advocate_designation.',</div></td></tr>';
		$contents .= '<tr><td align="left" colspan="2" ><div style="margin-left:12%">'.$row->scm_address_2_hin.',</div></td></tr>';
		$address = explode(',',$row->scm_address_hi);
        $contents .= '<tr><td align="left" colspan="2" ><div style="margin-left:12%">निवास पता - '. $address[0].',</div></td></tr>';
		$contents .= '<tr><td align="left" colspan="2" ><div style="margin-left:12%">'. $address[1].','.$address[2].',</div></td></tr>';
		$contents .= '<tr><td align="left" colspan="2" ><div style="margin-left:12%">'.$row->scm_court_name_hi.' (म०प्र०)</div></td></tr>';
    }
} else {
    $contents .= '<tr><td align="left"><select name="member_id">';
    foreach($standing_counsil_memebers_hc as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select></td></tr>';
}
	

$contents .= '<tr><td  colspan="2" >&nbsp;</td></tr>';
$contents .= '<tr><td valign="top" ><div style="height: 1px"></div>';
$contents .= ' विषय:-</td><td valign="top"><div id="dv1" style="margin-left:20px;">';
$contents .= 'माननीय न्यायालय, ';
if($is_genrate == true){
    $contents .= $post_data['dt4'];
}else{
	 $contents .= get_Court('dt4');
}
$case_no1 = explode('/',$case_no);
$contents .= '<span id="Label5"> न्यायाधीश,</span>&nbsp;जिला '.$district_name_hi.' ';
$contents .= '<span id="l2">(म.प्र.)</span>&nbsp;के  '.$case_no1[0].' ';
$contents .= '  प्रकरण क्रमांक '.$case_no1[1].' '.$case_no1[2].' '.$case_parties1[2].' '.$case_parties1[1].' '.$case_parties1[0].'  के मामले में अभियुक्तगण को';
$contents .= ' भा.दं.वि. की धारा ';
$contents .= @$this->input->post('dhara') && $is_genrate == true ? $this->input->post('dhara') : '<input name="dhara" type="text" />';
$contents .= ' में पारित दोषमुक्ति निर्णय दिनांक '.$file_judgment_date1.'  ';
$contents .= 'के विरूद्ध अपील प्रस्तुत किये जाने बावत् । &nbsp;</div>&nbsp;';
$contents .= '</td></tr><tr><td  valign="top">';

$contents .= '<tr><td colspan="2"><div style="float: left; width: 12%;">संदर्भ:- </div><p style="text-indent: 0;">महानिरिक्षक  (प0)  विशेष पुलिस स्थापना,लोकायुक्त कार्यालय, भोपाल (म0प्र0) के पत्र क्रं. '.$file_uo_or_letter_no.'  अप0क्र0  ';
if($is_genrate == true){
$contents .= $post_data['crime_no'];
}else
{
	$contents .=  '<input type="text" name="crime_no"  />';
}
$contents .= ' भोपाल, दिनांक '.$file_uo_or_letter_date1.' </p></td></tr>';
$contents .= '<tr><td align="center" colspan="2"> --------0--------- </td></tr>';
$contents .= '<tr><td colspan="2" ><p> &nbsp;&nbsp;राज्य शासन द्वारा उपरोक्त विषयांतर्गत एवं संदर्भित प्रकरण में अभियुक्त ';
if($is_genrate == true){
$contents .= $post_data['crimanal_name'];
}else
{
	$contents .=  '<input type="text" name="crimanal_name"  />';
}
$contents .= ' दोषमुक्ति के विरुद्ध मध्यप्रदेश उच्च न्यायालय खंडपीठ ग्वालियर के समक्ष अपील प्रस्तुत करने का निर्णय लिया गया है | अत: आप राज्य शासन द्वारा लिये गये निर्णय के अनुसार दं.प्र.सं. की धारा 378 के अंतर्गत मध्यप्रदेश उच्च न्यायालय खंडपीठ ग्वालियर के समक्ष अपील प्रस्तुत करें कार्यवाही की सुचना शीघ्र विधि विभाग को प्रेषित करें |</p></td></tr>';


$contents .= '<br /><br /></td></tr>';
$contents .= '<tr><td colspan="2" ><b>(सचिव विधि द्वारा अनुमोदित)</b></td></tr>';
$contents .= '<tr><td colspan="2" ><u>संलग्न दस्तावेज :</u></td></tr>';
$contents .= '<tr><td colspan="2" >1-निर्णय की सत्य प्रतिलिपि,<br>2-लोकायुक्त कार्यालय का मत,<br> 3-साक्षीयों के कथनों की मत,</td></tr>';

$contents .= '<tr><td colspan="2" align="right">मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</td></tr>';


$contents .= '<tr><td colspan="2" align="center"><br /><div style="float: right">(';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	 $contents .= '<select name="avar_secetroy">';
	$contents .=  '<option>रजनी पंचोली</option><option>एच. एम. बाथम</option></select>';
}$contents  .= ')<br>';




	if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else {
    $contents .= '<select name="dsin">';
    foreach ($dsig as $row) {
       if($row == 'अवर सचिव'){
			 $contents .= '<option value="' . $row . '" selected>' . $row . '</option>';
		}else
		{
        $contents .= '<option value="' . $row . '">' . $row . '</option>';
		}
	}
    $contents .= '</select>';
}
 $contents .= '<br /> मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div><br /><br /><br /><br />';
$contents .= '</td></tr>';
?>

