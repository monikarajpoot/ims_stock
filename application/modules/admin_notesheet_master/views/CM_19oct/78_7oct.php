<?php
$contents  = '' ;
$contents  .= '<tr><td> क्रमांक  '.@$file_number .'</td></tr>';
$contents  .= '<tr><td> प्रतिलिपि:-</td></tr>';
$contents  .= '<tr><td><p style="margin:0 10% ; text-indent:0;">1.';
if($is_genrate == true){
$contents .= $post_data['DropDownList1'];
}else
{
      $contents .=' <select name="DropDownList1" id="DropDownList1">
		<option value="रजिस्ट्रार (न्यायिक)">रजिस्ट्रार (न्यायिक)</option>
		<option value="अतिरिक्त रजिस्ट्रार (न्यायिक)">अतिरिक्त रजिस्ट्रार (न्यायिक)</option></select>';
 }
$contents .= ' मध्यप्रदेश उच्च न्यायालय (म.प्र.) ।</p></td></tr>';
$contents  .= '<tr><td>&nbsp;</td></tr>';
$contents  .= '<tr><td><p style="margin:0 10% ; text-indent:0;">2. जिला दण्डाधिकारी, (म.प्र.)को
इस निर्देश के साथ प्रेषित की जाती है कि उपरोक्त प्रकरण में तत्काल प्रभारी अधिकारी की नियुक्ति करें व प्रभारी अधिकारी को निर्देशित करें कि वे ';
if($is_genrate == true){
$contents .= $post_data['DropDownList2'];
}else
{
  $contents .= '<select name="DropDownList2" id="DropDownList2"><option value="महाधिवक्ता कार्यालय जबलपुर">महाधिवक्ता कार्यालय जबलपुर</option><option value="अतिरिक्त महाधिवक्ता कार्यालय इंदौर">अतिरिक्त महाधिवक्ता कार्यालय इंदौर</option><option value="अतिरिक्त महाधिवक्ता कार्यालय ग्वालियर">अतिरिक्त महाधिवक्ता कार्यालय ग्वालियर</option></select>';
}
  $contents .= ' से संपर्क कर अपील दिनांक ';
  if($is_genrate == true){
$contents .= $post_data['date1'];
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
}
	$contents .=  ' के पूर्व प्रस्तुत कराया जाना सुनिश्चित करें और उपरोक्त दिनांक '; 
	if($is_genrate == true){
$contents .= $post_data['date2'];
}else
{
	$contents .=  '<input type="text" class="date1" name="date2" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
} 
 $contents .=  ' के पूर्व यदि अपील प्रस्तुत नहीं की जाती है तो विलम्ब का दिन-प्रतिदिन का कारण दर्शित करते हुए विलम्ब माफी के आवेदन पत्र जो शपथपत्र से समर्थित हो सहित, अपील प्रस्तुत करें और प्रकरण से संबंधित केस डायरी, साक्ष्य में ग्राह्य दस्तावेजों की प्रतिलिपियां, परीक्षित साक्षियों के कथन एवं अन्य सुसंगत दस्तावेज । प्रकरण में पैरवी करने वाले अतिरिक्त महाधिवक्ता  को उपलब्ध कराया जाना सुनिश्चित करें और की गयी कार्यवाही से इस विभाग को सूचित करें<u><b>साथ ही भविष्य में भेजे जाने वाले अपील प्रस्ताव के साथ निर्णय एवं मत की दो प्रमाणित प्रतिलिपिया संलग्न कर आवश्यक रूप से इस विभाग को भेजा जाना सुनिश्चित करें|</b></u></span></p></td></tr>';
 $contents  .= '<tr><td>&nbsp;</td></tr>';
 $contents  .= '<tr><td><p style="margin:0 10% ; text-indent:0;"> 3. पुलिस अधीक्षक,(म0प्र0) को इस निर्देश के साथ प्रेषित की जिला मजिस्ट्रेट से संपर्क कर अपील प्रस्तुत कराया जाना सुनिश्चित करें तथा की गयी कार्यवाही की सूचना इस विभाग को भेजें ।</p></td></tr>';
 $contents  .= '<tr><td>&nbsp;</td></tr>';
$contents  .= '<tr><td><p style="margin:0 10% ; text-indent:0;"> 4. आयुक्त ';
if($is_genrate == true){
$contents .= $post_data['TextBox1'];
}else
{
	$contents .= '<input name="TextBox1" type="text" id="TextBox1">';
}
   $contents  .= ' संभाग ';
  if($is_genrate == true){
$contents .= $post_data['TextBox2'];
}else
{ 
  	$contents .= ' <input name="TextBox2" type="text" id="TextBox2"> ';
}
	$contents .= ' को सूचनार्थ प्रेषित की संबंधित जिला मजिस्ट्रेट द्वारा आदेश का पालन किया जाना सुनिश्चित करें ।</p></td></tr>';
     $contents .= '<tr><td>&nbsp;</td></tr>';
	 $contents .= '<tr><td>&nbsp;</td></tr>';
	 $contents .= '<tr><td>&nbsp;</td></tr>';
	 $contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right">मध्यप्रदेश शासन विधि और विधायी कार्य विधायी कार्य विभाग भोपाल</td></tr>';	