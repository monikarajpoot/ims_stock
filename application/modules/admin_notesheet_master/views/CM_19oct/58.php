<?php
$contents  = '' ;
$contents .= '<tr><td align="center" colspan="3"><b><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></b></td>';
$contents .= '</tr>';
$contents .= '<tr>';
$contents .= '<td colspan="2"> क्रमांक 6/';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="file no" type="text" />';
$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क (आप),</span';
$contents .= '</td><td align="right"><span id="Label1">भोपाल, दिनांक '.date("d-m-Y").' </td>';
$contents .= '</tr><tr><td align="left" valign="top" width="55px"> प्रति,</td><td>&nbsp; &nbsp;<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['advocate_type'].',</span>';
}else{
    $contents .= '<select name="advocate_type">';
    foreach($advocate_type as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
    $contents .= '<br/>__ कार्यालय,';
}
$contents .= '<br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['advocate_type'].' कार्यालय,<br /></span>';
}
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
$contents .= ' (म.प्र.),<br />';
$contents .= '</td><td>&nbsp;</td></tr><tr><td align="left" valign="top">';
$contents .= 'विषय:-</td><td colspan="2" style="text-align: justify">';
$contents .= 'न्यायालय ';
if($is_genrate == true){
    $contents .= $post_data['dt4'];
}else{
	 $contents .= get_Court('dt4');
	
   
}
//$contents .= @$this->input->post('text1') && $is_genrate == true ? $this->input->post('text1') : '<input name="text1" type="text"/>';
$contents .= ' न्यायाधीश,</span>&nbsp;जिला '.$district_name_hi.' ';
$contents .= '(म.प्र.) के&nbsp;विशेष प्रकरण क्रमांक  '.$case_no.'  '.$case_parties1[2].' '.$case_parties1[1].' '.$case_parties1[0].' के मामले में अभियुक्तगण को ';
$contents .= 'भा.दं.वि. की धारा ' ;
$contents .= @$this->input->post('text2') && $is_genrate == true ? $this->input->post('text2') : '<input name="text2" type="text"/>';
$contents .= '&nbsp;के संबंध में पारित दोषमुक्ति के निर्णय दिनांक '.$file_judgment_date1.'    के विरूद्ध अपील प्रस्तुत किये जाने बावत् । &nbsp;';
$contents .= '</td></tr><tr><td align="left" valign="top">';
$contents .= 'संदर्भ:-</td><td colspan="2">कार्यालय कलेक्टर एवं जिला दण्डाधिकारी, जिला '.$district_name_hi.' (म.प्र.) के ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' दिनांक '.$file_uo_or_letter_date1 .'.';
$contents .= '</td></tr><tr><td align="center" colspan="3" valign="top">';
$contents .= '---0---';
$contents .= '</td></tr><tr>';
$contents .= '<td align="left" valign="top" colspan="3" style="text-align: justify">';
$contents .= '<p>राज्य शासन द्वारा उपरोक्त विषयांतर्गत एवं संदर्भित प्रकरण में दोषमुक्ति के निर्णय के विरूद्ध उक्त अभियुक्तगण ';
$contents .= @$this->input->post('text3') && $is_genrate == true ? $this->input->post('text3') : '<input name="text3" type="text"/>';
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
$contents .= ' के समक्ष अपील प्रस्तुत करने का निर्णय लिया गया है । अपील प्रस्तुत करने की परिसीमा अवधि दिनांक ';
$contents .= @$this->input->post('text4') && $is_genrate == true ? $this->input->post('text4') : '<input name="text4" type="text" id="date2"/>';
$contents .= ' तक थी, अपील प्रस्ताव दिनांक  '.$file_mark_section_date.'';
$contents .= '&nbsp;को परिसीमा अवधि के बाह्य विधि विभाग में प्राप्त हुआ है ।</p> <p style="margin-bottom: 1px">';
$contents .= 'अत: आप राज्य शासन द्वारा लिये गये निर्णय के अनुसार दं.प्र.सं. की धारा 378 के अंतर्गत मध्यप्रदेश उच्च न्यायालय ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location2'].'</span>';
}else {
    $contents .= '__';
}
$contents .= ' के समक्ष';
$contents .= ' दिन-प्रतिदिन के विलम्ब का पर्याप्त कारण दर्शित करते हुए विलम्ब माफी हेतु आवेदन पत्र जो प्रभारी अधिकारी के शपथपत्र से समर्थित विभाग को प्रेषित करें । अपील प्रस्ताव इस कार्यालय को अवधि बाह्य प्राप्त हुआ है । विलम्ब इस कार्यालय की ओर से नहीं हुआ है ।   <b><u>अत: विलम्ब के लिये यह कार्यलय उत्तरदायी नहीं है । माननीय उच्च न्यायालय में धारा-5 लिमिटेशन एक्ट का आवेदन मय शपथ-पत्र के प्रस्तुत किया जाएगा, जिसमें दिन-प्रतिदिन के विलम्ब को स्पष्ट किया जाएगा । </u></b>';
$contents .= '</p><br/><span><b>(अतिरिक्त सचिव विधि द्वारा अनुमोदित)</b></span><br /><span><b><u>संलग्न दस्तावेज :</u></b></span><br/>';
$contents .= '<span>1-निर्णय की सत्य प्रतिलिपि,<br />2-लोक अभियोजक का मत,<br />3-साक्षियों के कथन,<br /></span></td></tr>';
$contents .= '<tr><td align="right" colspan="3" valign="top"><p style="float: right"> <b>मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</b></p><br /></td></tr>';
$contents .= '<tr><td colspan="3"><div style="float:right; text-align:center"><b>(';
$contents .= @$this->input->post('adname') && $is_genrate == true ? $this->input->post('adname') : '<input name="adname" type="text" id="TextBox5" />';
$contents .= ') <br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else {
    $contents .= '<select name="dsin">';
    foreach ($dsig as $row) {
        $contents .= '<option value="' . $row . '">' . $row . '</option>';
    }
    $contents .= '</select>';
}
$contents .= 'मध्यप्रदेश शासन विधि और विधायी कार्य विभाग भोपाल</b><br /></div><br/><br/></td></tr>';
?>



