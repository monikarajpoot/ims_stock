<?php 
$contents  = '' ;
$contents .= '<tr><td align="right"><b><u>स्पीड पोस्ट द्वारा</u></b></td></tr>';
$contents .= '<tr><td align="center"><u><h3>'.$dept_name.'</h3></u></td></tr>';
$contents .= '<tr><td align="center"><div style="float:left;"> फा0क्र0 5/';
if($is_genrate == true){
	$contents .= $post_data['number'];
}else{
	$contents .=  '<input type="text" class="" name="number" required>';
}
$contents .= '/'.date("Y").'/'.$file_number.'/21-(या0),  </div><div style="float:right;">भोपाल, दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date4'],'d/m/Y');
} else {
    $contents .= '<input type="text" class="date1" name="date4" placeholder="dd/mm/yyyy" value="'.$today.'"/></div>';
}
$contents .=  '</td></tr>';
$contents .= '<tr><td align="left">प्रति, </td></tr>';

if($is_genrate == true){
	$contents .= '<tr><td align="left"><span style="margin-left:8%">'.$post_data['advocate_type'].'</span>,</td></tr>';
	$contents .= '<tr><td align="left"><span style="margin-left:8%">'.$post_data['court_type'].'</span>,</td></tr>';
	$contents .= '<tr><td align="left"><span style="margin-left:8%">'.$post_data['court_location'].'</span></td></tr>';
} else {
	$contents .= '<tr><td align="left"><select name="advocate_type" class="advocate_type">';
	foreach($advocate_type as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select></td></tr>';
	$contents .= '<tr><td align="left"><select name="court_type" class="court_type">';
	foreach($court_type as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select></td></tr>';
	$contents .= '<tr><td align="left"><select name="court_location" class="court_location">';
	foreach($court_location as $row){
		$contents .= '<option value="'.$row.'">'.$row.'</option>';
	}
	$contents .= '</select></td></tr>';
}
$contents .= '<tr><td align="left">विषय:-<span style="margin-left:4%">';
if($is_genrate == true){ 
    $contents .=  $post_data['subject'];
} else {
    $contents .= '<textarea name="subject" rows="" columns="">'.$file_subject.'</textarea>';
}
$contents .= '</td></tr>';
$contents .= '<tr><td align="center">--------------</td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="left">महोदय, </td></tr>';
$contents .= '<tr><td align="left"><p>उपरोक्त विषय में उल्लेखित याचिका माननीय सर्वोच्च न्यायालय में प्रस्तुत की गई है। उक्त याचिका में म0प्र0 शासन को पक्षकार बनाया गया है। अत: म0प्र0 शासन की ओर से माननीय उच्चतम न्यायालय में पक्ष-समर्थन करने की कार्यवाही करने का कष्ट करें। </p> </td></tr>';
$contents .= '<tr><td align="left"><p>माननीय उच्चतम न्यायालय में याचिका की प्रस्तुति एवं पक्ष- समर्थन हेतु प्रत्यावर्तन प्रस्तुत करने हेतु माननीय उच्चतम न्यायालय से प्राप्त सूचना- पत्र तथा याचिका की प्रति विभाग द्वारा बनाये गये प्रभारी अधिकारी के द्वारा आपको उपलब्ध कराई जायेगी, प्रकरण में की गई कार्यवाही की सूचना इस विभाग को प्रेषित करें।</p> </td></tr>';
$contents .= '<tr><td align="left"><p>हस्ताक्षरयुक्त वकालतनामा संलग्न कर भेजा जा रहा है।</p></td></tr>';
$contents .= '<tr><td align="right">मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">('.$as_name.')</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अतिरिक्त सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';
$contents .= '<tr><td align="center"><div style="float:left;"> फा0क्र0 5/';
if($is_genrate == true){
	$contents .= $post_data['number'];
}else{
	$contents .=  '<input type="text" class="" name="number" required>';
}
$contents .= '/'.date("Y").'/'.$file_number.'/21-(या0),  </div><div style="float:right;">भोपाल, दिनांक ';if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date4'],'d/m/Y');
} else {
    $contents .= '<input type="text" class="date1" name="date4" placeholder="dd/mm/yyyy" value="'.$today.'"/></div>';
}
$contents .=  '</td></tr>';
$contents .= '<tr><td align="left">प्रतिलिपि:-</td></tr>';
$contents .=  '<tr><td><p>सचिव, म0प्र0 शासन,‍ ';
$contents .=  ' '.$file_department;
$contents .=  ',  भोपाल की ओर उनके यू0ओ0क्र0 '.$file_uo_or_letter_no.', दिनांक  ';
$contents .=  ' '.get_date_formate($file_uo_or_letter_date,'d/m/Y');
$contents .= ' के संदर्भ में उनकी विभागीय नस्ती के साथ भेजकर निवेदन है कि प्रकरण के प्रभारी अधिकारी को निर्देश दें कि वह तत्काल उपरोक्त अधिवक्ता से नई दिल्ली में संपर्क कर आवश्यक कार्यवाही करवाये । स्थायी अधिवक्ता को मध्यप्रदेश शासन, विधि और विधायी कार्य विभाग द्वारा नियुक्ति की शर्तों एवं समय-समय पर किये गये आदेशों का  शुल्क, टाईपिंग, अनुवाद आदि का व्यय विधि विभाग के माध्यम से ही अधिवक्ता द्वारा देयक प्रस्तुत किये जाने पर देय होगा। प्रकरण में की गई कार्यवाही की सूचना इस विभाग को भी देवें। </p> </td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">('.$as_name.')</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अतिरिक्त सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';
?>

