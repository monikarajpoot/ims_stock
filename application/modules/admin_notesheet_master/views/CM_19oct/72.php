<?php
$contents  = '' ;
$contents  .= '<tr><td colspan="3"> क्र.';
$contents  .= '<tr><td colspan="2"> क्रमांक 6/ <div style="float:right">भोपाल, दिनांक '.date("d-m-Y").'</div> </td></tr>';
$contents  .= '<tr><td valign="top">प्रतिलिपि:- </td>';
$contents  .= '<td colspan="2"><br /><br />1.';
if($is_genrate == true){
	$contents .= $post_data['DropDownList1'];
}else
{
	$contents  .= '<select name="DropDownList1"><option value="रजिस्ट्रार (न्यायिक)">रजिस्ट्रार (न्यायिक)</option><option value="अतिरिक्त रजिस्ट्रार (न्यायिक)">अतिरिक्त रजिस्ट्रार (न्यायिक)</option></select>';
}

$contents  .= ' मध्यप्रदेश उच्च न्यायालय&nbsp;<span id="Label4"></span>&nbsp;(म.प्र.)  । <br /> <br />';
$contents  .= '    2. जिला दण्डाधिकारी,&nbsp;<span id="Label1"></span>&nbsp;(म.प्र.)&nbsp;को  इस निर्देश के साथ प्रेषित की जाती है कि उपरोक्त प्रकरण में तत्काल प्रभारी अधिकारी     की नियुक्ति करें व प्रभारी अधिकारी को निर्देशित करें कि वे&nbsp;';
if($is_genrate == true){
	$contents .= $post_data['DropDownList2'];
}else
{
	$contents  .= '<select name="DropDownList2" id="DropDownList2"><option value="महाधिवक्ता कार्यालय जबलपुर">महाधिवक्ता कार्यालय जबलपुर</option><option value="अतिरिक्त महाधिवक्ता कार्यालय इंदौर">अतिरिक्त महाधिवक्ता कार्यालय इंदौर</option><option value="अतिरिक्त महाधिवक्ता कार्यालय ग्वालियर">अतिरिक्त महाधिवक्ता कार्यालय ग्वालियर</option></select> ';
}

$contents  .= '&nbsp;से संपर्क    कर विलम्ब का दिन-प्रतिदिन का कारण दर्शित करते हुए विलम्ब माफी के आवेदन पत्र जो शपथपत्र से समर्थित हो सहित, अपील प्रस्तुत करें और प्रकरण से संबंधित केस डायरी, साक्ष्य में ग्राह्य दस्तावेजों की प्रतिलिपियां, परीक्षित साक्षियों के कथन एवं अन्य सुसंगत दस्तावेज । प्रकरण में पैरवी करने वाले अतिरिक्त महाधिवक्ता को उपलब्ध कराया जाना सुनिश्चित करें और की गयी कार्यवाही से इस विभाग को सूचित करें।<br /><br />';
$contents  .= '  3. पुलिस अधीक्षक, <span id="Label2"></span>';
$contents  .= ' &nbsp;(म0प्र0) को इस निर्देश के साथ प्रेषित की जिला मजिस्ट्रेट से संपर्क कर अपील प्रस्तुत कराया जाना सुनिश्चित करें तथा की गयी कार्यवाही की सूचना इस विभाग को भेजें ।<br /><br /> 4. आयुक्त&nbsp; ';
if($is_genrate == true){
	$contents .= $post_data['TextBox1'];
}else
{
$contents  .= ' <input name="TextBox1" type="text" id="TextBox1" />';	
}

$contents  .= '&nbsp;संभाग&nbsp';
if($is_genrate == true){
	$contents .= $post_data['TextBox2'];
}else
{
$contents  .= ' <input name="TextBox2" type="text" id="TextBox2" />';	
}

$contents  .= '&nbsp;को सूचनार्थ प्रेषित की संबंधित जिला मजिस्ट्रेट द्वारा आदेश का पालन किया जाना सुनिश्चित करें ।<br /><br /><br /></td></tr><tr><td align="right" colspan="3" style="text-align: center">';
$contents  .= '<div style="float:right"><span id="Label9"></span><br /><span id="Label10"></span><br /> मध्यप्रदेश शासन विधि और विधायी कार्य विधायी कार्य विभाग भोपाल</div></td> </tr>';
?>

                
                
        
                  
                
               
                