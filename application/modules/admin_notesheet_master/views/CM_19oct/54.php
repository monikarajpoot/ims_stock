<?php
$contents  = '' ;
$contents .= '<tr><td align="center" colspan="2"><h4><u><b>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</b></u></h4></td></tr>';
$contents .= '<tr><td class="style5" colspan="2"> क्रमांक 12/'.date("y").'/'.$panji_krmank.'/21-क (आप),<div style="float: right">भोपाल, दिनांक '.date("d-m-Y").'';
$contents .= '</div></td></tr><tr><td class="style7" valign="top"> प्रति,</td><td>&nbsp; &nbsp;<br /> शासकीय अधिवक्ता,<br /> कार्यालय महाधिवक्ता,<br /> मध्यप्रदेश न्यायालय,<br />';
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
$contents .= '<tr><td class="style7" valign="top" width="55px ">';
$contents .= 'विषय:-</td><td valign="top">'.$file_subject.' <br /></td></tr><tr><td valign="top">';
$contents .= 'संदर्भ:-</td><td valign="top">आपका ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' , दिनांक '.$file_uo_or_letter_date.'.';
$contents .= '<br /></td></tr><tr><td align="center" class="style1" colspan="2" valign="top">';
$contents .= '---000---';
$contents .= '</td></tr><tr>';
$contents .= '<td align="left" class="style1" valign="top" colspan="2" style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$contents .= 'कृपया उपरोक्त संदर्भित पत्र का अवलोकन करें ।<br /><br />';
$contents .= 'क्र '.$case_no.' '.$case_parties1[2].' '.$case_parties1[1].' '.$case_parties1[0];
$contents .= ' के प्रकरण में ';
$contents .= @$this->input->post('test1') && $is_genrate == true ? $this->input->post('test1') : '<input name="test1" type="text"/>';
$contents .= ' की प्रति इस विभाग की ओर प्रस्तुत करें, तत्पश्चात् प्रकरण में अग्रिम कार्यवाही  की जावेगी । विलंब का दायित्व इस विभाग का नहीं रहेगा ।<br />';
$contents .= '</td></tr><tr><td colspan="2" align=center>';
$contents .= '<br /><br /><br /> <div style="float:right">(';
$contents .= @$this->input->post('adname') && $is_genrate == true ? $this->input->post('adname') : '<input name="adname" type="text" id="TextBox5" />';
$contents .= ') <br /><br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else{
    $contents .= '<select name="dsin">';
    foreach($dsig as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '<br /><br /> मध्यप्रदेश शासन विधि ओैर विधायी कार्य विभाग भोपाल</div></td></tr>';
?>
