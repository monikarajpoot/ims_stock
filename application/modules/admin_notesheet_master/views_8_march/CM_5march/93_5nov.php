<?php
$contents  = '' ;
$contents .= '<tr><td align="right" colspan="3"><u>स्पीड-पोस्ट द्वारा</u></td></tr>';
$contents .= '<tr><td align="center" colspan="3"><h2><u>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल</u></h2></b></td>';
$contents .= '</tr>';
$contents .= '<tr>';
$contents .= '<td colspan="2"> क्रमांक ';
$contents .= $panji_krmank.'/21-क (आप),</span';
$contents .= '</td><td align="right"><span id="Label1">भोपाल, दिनांक '.date("d-m-Y").' </td>';
$contents .= '</tr><tr><td align="left" valign="top" width="55px"> प्रति,</td><td>&nbsp; &nbsp;<br />';
$contents .= '<span>जिला दंडाधिकारी,</span><br />';
get_distic_dd('disct' );
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location'].'</span>';
}else{
    $contents .= get_distic_dd('disct' );
}
$contents .= ' (म.प्र.),<br />';
$contents .= '</td><td>&nbsp;</td></tr><tr><td align="left" valign="top">';
$contents .= 'विषय:-</td><td colspan="2" style="text-align: justify"> '.$file_subject.' </td></tr>';
$contents .= '<tr><td align="left" valign="top">';
$contents .= 'सन्दर्भ :-</td><td colspan="2" style="text-align: justify"> आपका पत्र क्रमांक '.$file_uo_or_letter_no .' दिनांक  '.$file_uo_or_letter_date.'</td></tr>';
$contents .= '<tr><td align="center" colspan="3" valign="top">';
$contents .= '---0---';
$contents .= '</td></tr>';
$contents .= '<tr><td colspan="3"><p>उपरोक्त विषयक संदर्भित पत्र के संबंध में लेख किया जाता है कि जिला दंडाधिकारी कार्यालय से विभाग को जो अपील प्रस्ताव भेजा गया है, उसके साथ साक्षियों  के कथन की नकलें संलग्न कर नहीं भेजी गई है,जिनके अभाव में अपील मत दिया जाना संभव नहीं है अत: तत्काल सम्बन्धित प्रकरणों  सम्बन्धित साक्षियों के कथन की नकलें विधि विभाग को भेजनें का कष्ट करें| तत्पश्चात  ही उपरोक्त प्रकरण  में अपील अभिमत दिया जाना संभव होगा| साथ ही लेख किया जाता है कि प्रकरण में हुए विलंब का उत्तरदायित्व आपके कार्यालय का होगा </p></td></tr>';

$contents .= '<tr><td colspan="3">&nbsp;</td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div style="width:70%; text-align:center;">( ';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	 $contents .= '<select name="avar_secetroy"><option>हरि मोहन बाथम</option><option>रजनी पंचौली</option></select>';
	
}
$contents .= ' )</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div style="width:70%; text-align:center;">';
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
$contents .= '</div></td></tr>';
$contents .= '<tr><td colspan="3" align="right"><div style="width:70%; text-align:center;">मध्यप्रदेश शासन विधि और विधायी कार्य विभाग भोपाल</div></td></tr>';
?>



