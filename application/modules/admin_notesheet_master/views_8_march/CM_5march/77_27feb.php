<?php
$contents  = '' ;
$contents  .= '<tr><td><div style="float:left"> क्र. '.@$file_number .'</div><div style="float:right">';
$contents  .= ' भोपाल दिनांक ';
if($is_genrate == true){
$contents .= $post_data['date1'];
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
}
$contents .=  ' </div></td></tr>';
$contents  .= '<tr><td>&nbsp; प्रतिलिपि:-</td></tr>';
$contents  .= '<tr><td><p style="margin:0 10% ; text-indent:0;">1.';
if($is_genrate == true){
$contents .= $post_data['DropDownList1'];
}else
{
	$contents  .= '<select name="DropDownList1" id="DropDownList1">
	<option value="महाधिवक्ता कार्यालय , जबलपुर">महाधिवक्ता कार्यालय , जबलपुर</option><option value="अतिरिक्त महाधिवक्ता कार्यालय , ग्वालियर">अतिरिक्त महाधिवक्ता कार्यालय , ग्वालियर</option>
	<option value="अतिरिक्त महाधिवक्ता कार्यालय , इंदौर">अतिरिक्त महाधिवक्ता कार्यालय , इंदौर</option></select>';
}
  	
  $contents  .= '   (म0प्र0) की ओर अग्रेषित संबंधित प्रकरण का अभिलेख, स्थाई अधिवक्ता, नई दिल्ली  की&nbsp; ओर शीघ्र भेजने की व्यवस्था करें  । </p></td></tr>';
  $contents  .= '<tr><td>&nbsp;</td></tr>';
 $contents  .= '<tr><td><p style="margin:0 10% ; text-indent:0;"> 2.';
 if($is_genrate == true){
$contents .= $post_data['DropDownList2'];
}else
{
   $contents  .= '   <select name="DropDownList2"  id="DropDownList2"><option value="रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, जबलपुर">रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, जबलपुर</option><option value="अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, ग्वालियर">अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, ग्वालियर</option><option value="अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, इंदौर">अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, इंदौर</option></select>';
}
     $contents  .= '  (म0प्र0) की ओर अग्रिम कार्यवाही एवं सूचनार्थ प्रेषित। </p></td></tr>';
	 $contents  .= '<tr><td>&nbsp;</td></tr>';
$contents  .= '<tr><td><p style="margin:0 10% ; text-indent:0;"> 3. '.$file_department .' मंत्रालय, भोपाल म0 प्र0 के यू0ओ0  क्रमांक  '.$file_uo_or_letter_no.' दिनांक '.date('d-m-Y',strtotime($file_uo_or_letter_date)) . '  (म0प्र0) को इस निर्देश के साथ प्रेषित कि उपरोक्त प्रकरण में तत्काल प्रभारी अधिकारी की नियुक्ति करें व प्रभारी अधिकारी को निर्देशित करें कि वे स्थायी अधिवक्ता से नई दिल्ली के पते पर सम्पर्क कर विशेष अनुमति याचिका प्रस्तुत करें और प्रकरण से संबंधित निर्णय की प्रमाणित प्रतिलिपि, केस डायरी, साक्ष्य में ग्राह्य दस्तावेजों की प्रतिलिपियां, परीक्षित साक्षियों के कथन एवं अन्य सुसंगत दस्तावेज । प्रकरण में
                    पैरवी करने वाले स्थायी अधिवक्ता को उपलब्ध कराया जाना सुनिश्चित करें और की गई कार्यवाही से इस विभाग को सूचित करें । </p></td></tr>';
$contents  .= '<tr><td>&nbsp;</td></tr>';
$contents  .= ' <tr><td><p style="margin:0 10% ; text-indent:0;">  4. पुलिस अधीक्षक, '.$district_name_hi.'( म0प्र0) की ओर इस निर्देश के साथ प्रेषित कि उपरोक्तानुसार अपील प्रस्तुत कराया  जाना सुनिश्चित करें तथा कि गई कार्यवाही की सूचना इस विभाग को भेजें ।</p></td></tr>';
$contents  .= '<tr><td>&nbsp;</td></tr>';
$contents  .= ' <tr><td><p style="margin:0 10% ; text-indent:0;"> 5. विधि विभाग, उप कार्यालय, एम.पी. भवन, नई दिल्ली-110001 की ओर सूचनार्थ एवं आवश्यक कार्यवाही हेतु अग्रेषित ।</p></td></tr>';
        
              
$contents  .= '<tr><td>&nbsp;</td></tr>';

$contents  .= '<tr><td>&nbsp;</td></tr>';
$contents  .= '<tr><td align="right"><div style="width:60%; text-align:center;">( ';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	 $contents .= '<select name="avar_secetroy">';
	$contents .=  '<option>रजनी पंचोली</option><option>एच. एम. बाथम</option></select>';
}
$contents  .= ')</div></td></tr>';
$contents  .= '<tr><td align="right"><div style="width:60%; text-align:center;">';
	if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else {
    $contents .= '<select name="dsin">';
    foreach ($dsig as $row) {
        $contents .= '<option value="' . $row . '">' . $row . '</option>';
    }
    $contents .= '</select>';
}
$contents  .= '</div></td></tr>';
	$contents  .= '<tr><td align="right" ><div style="width:60%; text-align:center;">'.@$dept_name.', भोपाल</div></td></tr>';