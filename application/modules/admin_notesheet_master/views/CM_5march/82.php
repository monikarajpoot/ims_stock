<style>
/*
table {
line-height:30px !important;	
font-size:16px !important;}
table p{
line-height:30px !important;	
font-size:16px !important;}*/
table p span{
line-height:30px !important;	
font-size:20px !important;
font-weight: 900;}
</style>
<?php
$contents  = '' ;
$contents  .= '<tr><td colspan="2"> क्रमांक 6/  -क(आप),<div style="float:right">भोपाल, दिनांक '.date("d-m-Y").'</div> </td></tr>';
$contents  .= '<tr><td> प्रतिलिपि:-</td></tr>';
$contents  .= '<tr><td><div style="float:left; margin-left:60px">1 - </div><p style="margin:0 10% ; text-indent:0;">';


if($is_genrate == true){
    $contents .=$post_data['advocate'];
}else {
    $contents .= '<select name="advocate">';
    foreach ($advocate_type as $advocate) {
       if($row == 'अवर सचिव'){
			 $contents .= '<option >' .$advocate . '</option>';
		}else
		{
        $contents .= '<option>' .$advocate. '</option>';
		}
	}
    $contents .= '</select>';
}
$contents .= ' महाधिवक्ता कार्यालय मध्यप्रदेश उच्च न्यायालय ';
 if($is_genrate == true){
$contents .= $post_data['DropDownList113'];
}else
{
       $contents  .= '  <select name="DropDownList113" id="DropDownList113">
		<option value="खण्डपीठ  इंदौर">खण्डपीठ  इंदौर</option><option value="खण्डपीठ  ग्वालियर">खण्डपीठ  ग्वालियर</option><option value="जबलपुर"> जबलपुर</option></select>';
}
$contents .= '( म0प्र0) </p></td></tr>';
$contents .= '<tr><td></td></tr>';
$contents .= '<tr><td><div style="float:left; margin-left:60px">2 - </div><p style="margin:0 10% ; text-indent:0;"> ';
 if($is_genrate == true){
$contents .= $post_data['DropDownList2'];
}else
{
   $contents  .= '   <select name="DropDownList2"  id="DropDownList2"><option value="रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, जबलपुर">रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, जबलपुर</option><option value="अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, ग्वालियर">अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, ग्वालियर</option><option value="अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, इंदौर">अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, इंदौर</option></select>';
}
 $contents .=' (म0प्र0) | </td></tr>';
 $contents .= '<tr><td></td></tr>';
$contents  .= '<tr><td><div style="float:left; margin-left:60px">3 - </div><p style="margin:0 10% ; text-indent:0;">महानिरीक्षक (प0) विशेष पुलिस स्थापना, लोकायुक्त कार्यालय, भोपाल (म.प्र.) के पत्र क्रमांक '.@$file_uo_or_letter_no .' अप०क्र०';
if($is_genrate == true){
$contents .= $post_data['crime_no'];
}else
{
	$contents .=  '<input type="text" name="crime_no"  />';
}
$contents  .= ' दिनांक '.@$file_uo_or_letter_date .' के संदर्भ में इस निर्देश के साथ प्रेषित की जाती है कि उपरोक्त प्रकरण में तत्काल प्रभारी अधिकारी की नियुक्ति करें व प्रभारी अधिकारी को निर्देशित करें कि  वे विशेष लोक अभियोजक से सम्पर्क कर अपील प्रस्तुत करें, और प्रकरण से संबंधित केस डायरी, साक्ष्य में ग्राह्य दस्तावेजों की प्रतिलिपियां, परीक्षित साक्षियों के कथन एवं अन्य सुसंगत दस्तावेज । प्रकरण में पैरवी करने वाले अतिरिक्त महाधिवक्ता को उपलब्ध कराया जाना सुनिश्चित करें और की गई कार्यवाही से इस विभाग को सूचित करें ।  <span>साथ ही भविष्य में भेजे जाने वाले अपील प्रस्ताव के साथ निर्णय की दो प्रमाणित प्रतिलिपिया संलग्न कर आवश्यक रूप से इस विभाग को भेजा जाना सुनिश्चित करें|</span></td></tr>';
$contents .= '<tr><td><div style="float:left; margin-left:60px"> 4 - </div><p style="margin:0 10% ; text-indent:0;">
जिला दण्डाधिकारी, ';
if($is_genrate == true){
	$contents .= $post_data['distic_1'];
}else
{
$contents  .= get_distic_dd('distic_1');	
}
$contents .= ' ( म0प्र0) की ओर सूचनार्थ प्रेषित</td></tr>';


 $contents  .= '<tr><td><div style="float:left; margin-left:60px">5 -</div><p style="margin:0 10% ; text-indent:0;">पुलिस अधीक्षक, विशेष पुलिस स्थापना लोकायुक्त कार्यालय ';
if($is_genrate == true){
	$contents .= $post_data['distic_1'];
}else
{
$contents  .= get_distic_dd('distic_1');	
}
 $contents  .= '(म0प्र0)  पत्र क्रमांक '.@$file_uo_or_letter_no.' दिनांक '.@$file_uo_or_letter_date .'  के सन्दर्भ  में इस निर्देश के साथ प्रेषित की उपरोक्तानुसार अपील प्रस्तुत कराया जाना सुनिश्चित करें तथा कि गई कार्यवाही की सूचना इस विभाग को भेजें ।</p></td></tr>';

     $contents .= '<tr><td>&nbsp;</td></tr>';
	
$contents  .= '<tr><td align="right"><div style="width:70%; text-align:center;">( ';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	 $contents .= '<select name="avar_secetroy">';
	$contents .=  '<option>रजनी पंचोली</option><option>एच. एम. बाथम</option></select>';
}
$contents  .= ')</div></td></tr>';
$contents  .= '<tr><td align="right"><div style="width:70%; text-align:center;">';
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
$contents  .= '</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:75%; text-align:center;">मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div></td></tr>';	