<style>
table {
line-height:30px !important;	
font-size:16px !important;}

table p span{
line-height:30px !important;	
font-size:20px !important;
font-weight: 900;}
</style>
<?php
$contents  = '' ;

$contents  .= '<tr><td colspan="2"> क्रमांक 6/  -क(आप),<div style="float:right">भोपाल, दिनांक '.date("d-m-Y").'</div> </td></tr>';
$contents  .= '<tr><td valign="top">प्रतिलिपि:- </td>';
$contents  .= '<td colspan="2"><br /><br />1.';
if($is_genrate == true){
	$contents .= $post_data['DropDownList1'];
}else
{
	$contents  .= '<select name="DropDownList1"><option value="रजिस्ट्रार (न्यायिक)">रजिस्ट्रार (न्यायिक)</option><option value="अतिरिक्त रजिस्ट्रार (न्यायिक)">अतिरिक्त रजिस्ट्रार (न्यायिक)</option></select>';
}

$contents  .= ' मध्यप्रदेश उच्च न्यायालय&nbsp;<span id="Label4"></span>&nbsp;(म.प्र.)  । <br /> <br />';
$contents  .= '    2. जिला दण्डाधिकारी,&nbsp;<span id="Label1"></span>';
if($is_genrate == true){
	$contents .= $post_data['distic_1'];
}else
{
$contents  .= get_distic_dd('distic_1');	
}
$contents  .= '&nbsp;(म.प्र.)&nbsp;को  इस निर्देश के साथ प्रेषित की जाती है कि उपरोक्त प्रकरण में तत्काल प्रभारी अधिकारी     की नियुक्ति करें व प्रभारी अधिकारी को निर्देशित करें कि वे&nbsp;';
if($is_genrate == true){
	$contents .= $post_data['DropDownList2'];
}else
{
	$contents  .= '<select name="DropDownList2" id="DropDownList2"><option value="महाधिवक्ता कार्यालय जबलपुर">महाधिवक्ता कार्यालय जबलपुर</option><option value="अतिरिक्त महाधिवक्ता कार्यालय इंदौर">अतिरिक्त महाधिवक्ता कार्यालय इंदौर</option><option value="अतिरिक्त महाधिवक्ता कार्यालय ग्वालियर">अतिरिक्त महाधिवक्ता कार्यालय ग्वालियर</option></select> ';
}

$contents  .= '&nbsp;से संपर्क    कर विलम्ब का दिन-प्रतिदिन का कारण दर्शित करते हुए विलम्ब माफी के आवेदन पत्र जो शपथपत्र से समर्थित हो सहित, अपील प्रस्तुत करें और प्रकरण से संबंधित केस डायरी, साक्ष्य में ग्राह्य दस्तावेजों की प्रतिलिपियां, परीक्षित साक्षियों के कथन एवं अन्य सुसंगत दस्तावेज प्रकरण में पैरवी करने वाले अतिरिक्त महाधिवक्ता को उपलब्ध कराया जाना सुनिश्चित करें और की गयी कार्यवाही से इस विभाग को सूचित करें।<span style="font-size:20px; font-weight: 900;" ><u> साथ ही भविष्य में भेजे जाने वाले अपील प्रस्ताव के साथ निर्णय एवं मत की दो प्रमाणित प्रतिलिपिया संलग्न कर आवश्यक रूप से इस विभाग को भेजा जाना सुनिश्चित करें|</u></span><br /><br />';
$contents  .= '  3. पुलिस अधीक्षक,  <span id="Label2"></span>';
if($is_genrate == true){
	$contents .= $post_data['distic_2'];
}else
{
$contents  .= get_distic_dd('distic_2');	
}
$contents  .= ' &nbsp;(म0प्र0) को इस निर्देश के साथ प्रेषित की जिला मजिस्ट्रेट से संपर्क कर अपील प्रस्तुत कराया जाना सुनिश्चित करें तथा की गयी कार्यवाही की सूचना इस विभाग को भेजें ।<br /><br /> 4. आयुक्त&nbsp; ';
if($is_genrate == true){
	$contents .= $post_data['division'];
}else
{
$contents  .= get_division_dd('division'  );	
}

$contents  .= '&nbsp;संभाग&nbsp';
if($is_genrate == true){
	$contents .= $post_data['distic_3'];
}else
{
$contents  .= get_distic_dd('distic_3');	
}

$contents  .= '&nbsp;को सूचनार्थ प्रेषित की संबंधित जिला मजिस्ट्रेट द्वारा आदेश का पालन किया जाना सुनिश्चित करें ।<br /><br /><br /></td></tr>';

$contents  .= '<tr><td align="right"  colspan="2" ><div style="width:70%; text-align:center;">( ';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	 $contents .= '<select name="avar_secetroy">';
	$contents .=  '<option>रजनी पंचोली</option><option>एच. एम. बाथम</option></select>';
}
$contents  .= ')</div></td></tr>';
$contents  .= '<tr><td align="right"  colspan="2" ><div style="width:130%; text-align:center;">';
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
$contents  .= '<br /><br/>  मध्यप्रदेश शासन विधि और विधायी कार्य विभाग भोपाल</b></div></td></tr>';
?>

                
                
        
                  
                
               
                