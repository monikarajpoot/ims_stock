<?php
$contents  = '' ;
$contents .= '<tr><td align="center" colspan="3"><b><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></b>';
$contents .= '</td></tr><tr><td colspan="3"> क्र 6/';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="file no" type="text" />';
$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क (आप),';
$contents .= '<div style="float: right">भोपाल, दिनांक ';
if($is_genrate == true){
 if($post_data['date1']!= '' ){ $contents .= $post_data['date1']; }else { $contents .= '&nbsp;&nbsp;&nbsp;&nbsp;' ;}
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" placeholder="dd/mm/yyyy" />';
}
$contents .= '</div></td></tr><tr>';
$contents .= '<td valign="top" width="55px"> प्रति,</td><td><br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['advocate_type'].',</span>';
}else{
    $contents .= '<select name="advocate_type">';
    foreach($advocate_type as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
    $contents .= '<br/>__';
}
$contents .= '<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['advocate_type'].' कार्यालय</span>';
}
$contents .= ',<br />';
$contents .= 'मध्यप्रदेश उच्च न्यायालय,<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location'].'</span>';
}else{
    $contents .= '<select name="court_location">';
    foreach($court_location as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ',<br /><br /></td><td>&nbsp;</td></tr>';
$contents .= '<tr><td valign="top"><div style="height: 1px"></div>';
$contents .= 'विषय:-</td><td colspan="2" valign="top"><div id="dv1">';
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
$contents .= '<div style="height: 1px"></div>';
$contents .= 'संदर्भ:-</td><td colspan="2">कार्यालय कलेक्टर एवं जिला दण्डाधिकारी, जिला '. $district_name_hi.' (म.प्र.) ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' दिनांक '.$file_judgment_date1;
$contents .= '</td></tr><tr><td align="center" colspan="3">';
$contents .= '---000---';
$contents .= '</td></tr><tr><td colspan="3">';
$contents .= '<p style="text-align: justify">&nbsp;&nbsp;राज्य शासन द्वारा उपरोक्त विषयांतर्गत एवं संदर्भित प्रकरण में दोषमुक्ति के निर्णय के विरूद्ध उक्त अभियुक्तगण  ';
$contents .= @$this->input->post('text1') && $is_genrate == true ? $this->input->post('text1') : '<input name="text1" type="text"/>';
$contents .= ' के संबंध में मध्यप्रदेश उच्च न्यायालय ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location2'].'</span>';
}else{
    $contents .= '<select name="court_location2">';
    foreach($court_location2 as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' के समक्ष अपील प्रस्तुत करने का निर्णय लिया गया है । अपील प्रस्ताव दिनांक     ';
if($is_genrate == true){
    $contents .= $post_data['apeel_date'];
}else{
    $contents .= '<input type="text" name="apeel_date" class="date1"/>';
}

$contents .= ' को विधि विभाग में प्राप्त हुआ है । अपील प्रस्तुत करने की परिसीमा अवधि दिनांक  ';
$contents .= @$this->input->post('text2') && $is_genrate == true ? $this->input->post('text2') : '<input name="text2" type="text" id="date2"/>';
$contents .= ' तक हैं ।<br />';
$contents .= '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; अत: आप राज्य शासन द्वारा लिये गये निर्णय के अनुसार दं.प्र.सं. की धारा 378 के अंतर्गत मध्यप्रदेश उच्च न्यायालय ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location2'].'</span>';
}else{
    $contents .= '__';
}
$contents .= ' के समक्ष दिनांक&nbsp;';
$contents .= @$this->input->post('text3') && $is_genrate == true ? $this->input->post('text3') : '<input name="text3" type="text" id="date3"/>';
$contents .= ' तक अपील प्रस्तुत करने की समुचित कार्यवाही करें । यदि नियत दिनांक ';
$contents .= @$this->input->post('text4') && $is_genrate == true ? $this->input->post('text4') : '<input name="text4" type="text" id="date4"/>';
$contents .= ' तक अपील प्रस्तुत नहीं की जाती है तो दिन-प्रतिदिन विलम्ब का कारण दर्शित करते हुए विलम्ब माफी हेतु आवेदन पत्र से समर्थित हो, सहित अपील प्रस्तुत की जाये तथा कार्यवाही ';
$contents .= 'की सूचना शीघ्र विधि विभाग को प्रेषित करें ।<br /><br /><b>(अतिरिक्त सचिव विधि द्वारा अनुमोदित)</b><br /><b><u>संलग्न दस्तावेज :</u></b><br /> 1-निर्णय की सत्य प्रतिलिपि,<br />';
$contents .= '2-लोक अभियोजक का मत,<br />3-साक्षियों के कथन,<br /></p></td></tr><tr>';
$contents .= '<td align="right" colspan="3"><b> मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</b>&nbsp;&nbsp;</td></tr><tr>';
$contents .= '<td align="right"  colspan="3" style="text-align: center"><br /><br /><div style="float: right"><b>(';
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
$contents .= '<br />  मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</b></div></td>';
$contents .= '</tr>';
$contents .= '<td>&nbsp;</td><td>&nbsp;</td></tr>';


