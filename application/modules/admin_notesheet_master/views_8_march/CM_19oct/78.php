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
$contents .= ' मध्यप्रदेश उच्च न्यायालय ';
 if($is_genrate == true){
$contents .= $post_data['DropDownList113'];
}else
{
       $contents  .= '  <select name="DropDownList113" id="DropDownList113">
		<option value="खण्डपीठ  इंदौर">खण्डपीठ  इंदौर</option><option value="खण्डपीठ  ग्वालियर">खण्डपीठ  ग्वालियर</option><option value="जबलपुर"> जबलपुर</option></select>';
}
$contents .= '  (म.प्र.) ।</p></td></tr>';
$contents  .= '<tr><td><p style="margin:0 10% ; text-indent:0;">2. जिला दण्डाधिकारी, ';
 if($is_genrate == true){
$contents .= $post_data['DropDownList11'];
}else
{
       $contents  .= '  <select name="DropDownList11" id="DropDownList7">
		<option value="आगर">आगर</option>
		<option value="अलीराजपुर">अलीराजपुर</option>
		<option value="अनुपपुर">अनुपपुर</option>
		<option value="अशोकनगर">अशोकनगर</option>
		<option value="बालाघाट">बालाघाट</option>
		<option value="बडवानी">बडवानी</option>
		<option value="बैतूल">बैतूल</option>
		<option value="भिण्ड">भिण्ड</option>
		<option value="भोपाल">भोपाल</option>
		<option value="बुरहानपुर">बुरहानपुर</option>
		<option value="छत्तरपुर">छत्तरपुर</option>
		<option value="छिंदवाडा">छिंदवाडा</option>
		<option value="दतिया">दतिया</option>
		<option value="दमोह">दमोह</option>
		<option value="देवास">देवास</option>
		<option value="धार">धार</option>
		<option value="डिंडोरी">डिंडोरी</option>
		<option value="गुना">गुना</option>
		<option value="ग्वालियर">ग्वालियर</option>
		<option value="हरदा">हरदा</option>
		<option value="होशंगाबाद">होशंगाबाद</option>
		<option value="इंदौर">इंदौर</option>
		<option value="जबलपुर">जबलपुर</option>
		<option value="झाबुआ">झाबुआ</option>
		<option value="कटनी">कटनी</option>
		<option value="खंडवा">खंडवा</option>
		<option value="खरगौन">खरगौन</option>
		<option value="मंडला">मंडला</option>
		<option value="मंदसौर">मंदसौर</option>
		<option value="मुरैना">मुरैना</option>
		<option value="नरसिंहपुर">नरसिंहपुर</option>
		<option value="नीमच">नीमच</option>
		<option value="पन्ना">पन्ना</option>
		<option value="रायसेन">रायसेन</option>
		<option value="राजगढ़ (ब्यावरा)">राजगढ़ (ब्यावरा)</option>
		<option value="रतलाम">रतलाम</option>
		<option value="रीवा">रीवा</option>
		<option value="सागर">सागर</option>
		<option value="सतना">सतना</option>
		<option value="सीहोर">सीहोर</option>
		<option value="सिवानी">सिवानी</option>
		<option value="शहडोल">शहडोल</option>
		<option value="शाजापुर">शाजापुर</option>
		<option value="श्योपुर">श्योपुर</option>
		<option value="शिवपुरी">शिवपुरी</option>
		<option value="सीधी">सीधी</option>
		<option value="सिंगरौली">सिंगरौली</option>
		<option value="टीकमगढ़">टीकमगढ़</option>
		<option value="उज्जैन">उज्जैन</option>
		<option value="उमरिया">उमरिया</option>
		<option value="विदिशा">विदिशा</option>

	</select>';
}
$contents  .= ' (म.प्र.)को इस निर्देश के साथ प्रेषित की जाती है कि उपरोक्त प्रकरण में तत्काल प्रभारी अधिकारी की नियुक्ति करें व प्रभारी अधिकारी को निर्देशित करें कि वे ';
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
 $contents .=  ' के पूर्व यदि अपील प्रस्तुत नहीं की जाती है तो विलम्ब का दिन-प्रतिदिन का कारण दर्शित करते हुए विलम्ब माफी के आवेदन पत्र जो शपथपत्र से समर्थित हो सहित, अपील प्रस्तुत करें और प्रकरण से संबंधित केस डायरी, साक्ष्य में ग्राह्य दस्तावेजों की प्रतिलिपियां, परीक्षित साक्षियों के कथन एवं अन्य सुसंगत दस्तावेज । प्रकरण में पैरवी करने वाले अतिरिक्त महाधिवक्ता  को उपलब्ध कराया जाना सुनिश्चित करें और की गयी कार्यवाही से इस विभाग को सूचित करें <span style="font-size:26px" ><u>साथ ही भविष्य में भेजे जाने वाले अपील प्रस्ताव के साथ निर्णय एवं मत की दो प्रमाणित प्रतिलिपिया संलग्न कर आवश्यक रूप से इस विभाग को भेजा जाना सुनिश्चित करें|</u></span></p></td></tr>';

 $contents  .= '<tr><td><p style="margin:0 10% ; text-indent:0;"> 3. पुलिस अधीक्षक,';
if($is_genrate == true){
$contents .= $post_data['DropDownList22'];
}else
{
       $contents  .= '  <select name="DropDownList22" id="DropDownList22">
		<option value="आगर">आगर</option>
		<option value="अलीराजपुर">अलीराजपुर</option>
		<option value="अनुपपुर">अनुपपुर</option>
		<option value="अशोकनगर">अशोकनगर</option>
		<option value="बालाघाट">बालाघाट</option>
		<option value="बडवानी">बडवानी</option>
		<option value="बैतूल">बैतूल</option>
		<option value="भिण्ड">भिण्ड</option>
		<option value="भोपाल">भोपाल</option>
		<option value="बुरहानपुर">बुरहानपुर</option>
		<option value="छत्तरपुर">छत्तरपुर</option>
		<option value="छिंदवाडा">छिंदवाडा</option>
		<option value="दतिया">दतिया</option>
		<option value="दमोह">दमोह</option>
		<option value="देवास">देवास</option>
		<option value="धार">धार</option>
		<option value="डिंडोरी">डिंडोरी</option>
		<option value="गुना">गुना</option>
		<option value="ग्वालियर">ग्वालियर</option>
		<option value="हरदा">हरदा</option>
		<option value="होशंगाबाद">होशंगाबाद</option>
		<option value="इंदौर">इंदौर</option>
		<option value="जबलपुर">जबलपुर</option>
		<option value="झाबुआ">झाबुआ</option>
		<option value="कटनी">कटनी</option>
		<option value="खंडवा">खंडवा</option>
		<option value="खरगौन">खरगौन</option>
		<option value="मंडला">मंडला</option>
		<option value="मंदसौर">मंदसौर</option>
		<option value="मुरैना">मुरैना</option>
		<option value="नरसिंहपुर">नरसिंहपुर</option>
		<option value="नीमच">नीमच</option>
		<option value="पन्ना">पन्ना</option>
		<option value="रायसेन">रायसेन</option>
		<option value="राजगढ़ (ब्यावरा)">राजगढ़ (ब्यावरा)</option>
		<option value="रतलाम">रतलाम</option>
		<option value="रीवा">रीवा</option>
		<option value="सागर">सागर</option>
		<option value="सतना">सतना</option>
		<option value="सीहोर">सीहोर</option>
		<option value="सिवानी">सिवानी</option>
		<option value="शहडोल">शहडोल</option>
		<option value="शाजापुर">शाजापुर</option>
		<option value="श्योपुर">श्योपुर</option>
		<option value="शिवपुरी">शिवपुरी</option>
		<option value="सीधी">सीधी</option>
		<option value="सिंगरौली">सिंगरौली</option>
		<option value="टीकमगढ़">टीकमगढ़</option>
		<option value="उज्जैन">उज्जैन</option>
		<option value="उमरिया">उमरिया</option>
		<option value="विदिशा">विदिशा</option>

	</select>';
}
 $contents  .= '(म0प्र0) को इस निर्देश के साथ प्रेषित की जिला मजिस्ट्रेट से संपर्क कर अपील प्रस्तुत कराया जाना सुनिश्चित करें तथा की गयी कार्यवाही की सूचना इस विभाग को भेजें ।</p></td></tr>';

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
	
$contents  .= '<tr><td align="right"><div style="width:70%; text-align:center;">( ';
if($is_genrate == true){
$contents .= $post_data['avar_secetroy'];
}else
{
	$contents .=  '<input type="text"  name="avar_secetroy"   />';
}
$contents  .= ')</div></td></tr>';
$contents  .= '<tr><td align="right"><div style="width:70%; text-align:center;">';
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
$contents .= '<tr><td align="right"><div style="width:70%; text-align:center;">मध्यप्रदेश शासन विधि और विधायी कार्य विधायी कार्य विभाग भोपाल</div></td></tr>';	