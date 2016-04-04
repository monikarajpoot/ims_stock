<?php
$contents  = '' ;
$contents  .= '<tr><td colspan="3"><table width="100%"><tr><td align="left">क्र.';
if($is_genrate == true){
    $contents .= $post_data['head'];
}else{
	$contents .= '<input name="head" placeholder="head" type="text" />';
}
$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क(आप),';
$contents .= '</td><td  align="right">भोपाल, दि. '.date("d-m-Y").'</td></tr></table></td></tr>' ;
$contents  .= '<tr><td valign="top" class="style2"> प्रतिलिपि:- </td></tr><tr><td></td><td>1.</td><td ><p>' ;
if($is_genrate == true){
	$contents .= $post_data['DropDownList1'];
}else
{
	$contents  .= '<select name="DropDownList1"><option value="रजिस्ट्रार (न्यायिक)">रजिस्ट्रार (न्यायिक)</option><option value="अतिरिक्त रजिस्ट्रार (न्यायिक)">अतिरिक्त रजिस्ट्रार (न्यायिक)</option></select>';
}


$contents  .= 'मध्यप्रदेश उच्च न्यायालय (म.प्र.)  । </p></td></tr><tr><td></td><td>2.</td><td ><p>' ;

$contents  .= ' जिला दण्डाधिकारी, ';
if($is_genrate == true){
	$contents .= $post_data['distic_1'];
}else
{
$contents  .= get_distic_dd('distic_1');	
}
$contents  .= ' (म.प्र.)&nbsp;को  इस निर्देश के साथ प्रेषित की जाती है कि उपरोक्त प्रकरण में तत्काल प्रभारी अधिकारी     की नियुक्ति करें व प्रभारी अधिकारी को निर्देशित करें कि वे ';
if($is_genrate == true){
	$contents .= $post_data['DropDownList2'];
}else
{
	$contents  .= '<select name="DropDownList2" id="DropDownList2"><option value="महाधिवक्ता कार्यालय जबलपुर">महाधिवक्ता कार्यालय जबलपुर</option><option value="अतिरिक्त महाधिवक्ता कार्यालय इंदौर">अतिरिक्त महाधिवक्ता कार्यालय इंदौर</option><option value="अतिरिक्त महाधिवक्ता कार्यालय ग्वालियर">अतिरिक्त महाधिवक्ता कार्यालय ग्वालियर</option></select> ';
}
$contents  .= '&nbsp;से संपर्क    कर विलम्ब का दिन-प्रतिदिन का कारण दर्शित करते हुए विलम्ब माफी के आवेदन पत्र जो शपथपत्र से समर्थित हो सहित, अपील प्रस्तुत करें और प्रकरण से संबंधित केस डायरी, साक्ष्य में ग्राह्य दस्तावेजों की प्रतिलिपियां, परीक्षित साक्षियों के कथन एवं अन्य सुसंगत दस्तावेज प्रकरण में पैरवी करने वाले अतिरिक्त महाधिवक्ता को उपलब्ध कराया जाना सुनिश्चित करें और की गयी कार्यवाही से इस विभाग को सूचित करें।<span class="font-large" ><u> साथ ही भविष्य में भेजे जाने वाले अपील प्रस्ताव के साथ निर्णय एवं मत की दो प्रमाणित प्रतिलिपिया संलग्न कर आवश्यक रूप से इस विभाग को भेजा जाना सुनिश्चित करें|</u></span>';
$contents  .= '</p></td></tr><tr><td></td><td valign="top">3. </td><td ><p>' ;
$contents  .= ' पुलिस अधीक्षक,  ';
if($is_genrate == true){
	$contents .= $post_data['distic_2'];
}else
{
$contents  .= get_distic_dd('distic_2');	
}
$contents  .= ' (म0प्र0) को इस निर्देश के साथ प्रेषित की जिला मजिस्ट्रेट से संपर्क कर अपील प्रस्तुत कराया जाना सुनिश्चित करें तथा की गयी कार्यवाही की सूचना इस विभाग को भेजें । ' ;
$contents  .= '</p></td></tr><tr><td></td><td>4.</td><td ><p>' ;
$contents  .= ' जिला दण्डाधिकारी, '.$district_name_hi.' (म0प्र0) की ओर इस निर्देश के साथ प्रेषित कि उपरोक्तानुसार अपील प्रस्तुत कराया जाना सुनिश्चित करें तथा कि गई कार्यवाही की सूचना इस विभाग को भेजें । </p></td></tr><tr><td></td><td>5.</td><td ><p>';

$contents  .= ' पुलिस अधीक्षक, '.$district_name_hi.' (म0प्र0) की ओर इस निर्देश के साथ प्रेषित कि उपरोक्तानुसार अपील प्रस्तुत कराया  जाना सुनिश्चित करें तथा कि गई कार्यवाही की सूचना इस विभाग को भेजें ।  </p></td></tr><tr><td></td><td>6.</td><td ><p>' ;
$contents  .= ' विधि विभाग, उप कार्यालय, एम.पी. भवन, नई दिल्ली-110001 की ओर सूचनार्थ एवं आवश्यक  कार्यवाही हेतु अग्रेषित । </p></td></tr>' ;$contents .= '<tr><td colspan="3">&nbsp;</td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div contenteditable="false" class="officer-center">( ';
if($is_genrate == true){
$contents .=  get_officer_information($this->input->post('secetroy')); 

}else
{
     $contents .= get_officer_for_sign('secetroy' ,$secetry ,'', $s_id );
    
}

$contents .= ' )</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div contenteditable="false" class="officer-center">';

if($is_genrate == true){    
    $contents .=   get_officer_dign($this->input->post('secetroy'));
}
else {
     $contents .= '-------';
    }
$contents .= '</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div class="officer-center" style="">मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div></td></tr>';
?>
