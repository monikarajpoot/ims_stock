<?php
$contents  = '' ;
$contents  .= '<tr><td colspan="3"> क्र.';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="head" type="text" />';
$contents .= '/'.date("y").'/'.$panji_krmank.'/21-क(आप),';
$contents .= '<div style="float: right"> भोपाल, दि. '.date("d-m-Y").'</div></td></tr>' ;
$contents  .= '<tr><td valign="top" class="style2"> प्रतिलिपि:- </td><td colspan="2" style="text-align: justify"><br><br>' ;
$contents  .= '1.' ;
if($is_genrate == true){
    $contents .= '<span>'.$post_data['advocate_type'].' कार्यालय,</span>';
}else{
    $contents .= '<select name="advocate_type">';
    foreach($advocate_type as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location'].'</span>';
}else{
    $contents .= '<select name="court_location">';
    foreach($court_location as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents  .= '  की ओर अग्रेषित संबंधित प्रकरण का अभिलेख, स्थाई अधिवक्ता, नई दिल्ली   की ओर शीघ्र भेजने की व्यवस्था करें ।<br><br>' ;
$contents  .= '2. ' ;
if($is_genrate == true){
    $contents .= $post_data['reg'];
}else{
    $contents .= '<select name="reg">';
    $contents .= '<option>रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, जबलपुर </option>';
    $contents .= '<option>अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, ग्वालियर</option>';
    $contents .= '<option>अतिरिक्त रजिस्ट्रार (न्यायिक) मध्यप्रदेश उच्च न्यायालय, इंदौर</option>';
    $contents .= '</select>';
}
$contents  .= ' (म0प्र0) &nbsp; की ओर अग्रिम कार्यवाही एवं सूचनार्थ प्रेषित।<br><br>' ;
$contents  .= '3.  ' ;
if($is_genrate == true){
$contents .= $post_data['third_option'];
}else
{
	$contents .=  '<input type="text" name="third_option" />';
}

$contents .= ' (म0प्र0) को इस निर्देश के साथ प्रेषित कि उपरोक्त प्रकरण में तत्काल प्रभारी  अधिकारी की नियुक्ति करें व प्रभारी अधिकारी को निर्देशित करें कि वे स्थायी अधिवक्ता' ;
$contents  .= 'से नई दिल्ली के पते पर सम्पर्क कर विशेष अनुमति याचिका प्रस्तुत करें और प्रकरण से  संबंधित निर्णय की प्रमाणित प्रतिलिपि, केस डायरी, साक्ष्य में ग्राह्य दस्तावेजों' ;
$contents  .= 'की प्रतिलिपियां, परीक्षित साक्षियों के कथन एवं अन्य सुसंगत दस्तावेज । प्रकरण में पैरवी करने वाले स्थायी अधिवक्ता को उपलब्ध कराया जाना सुनिश्चित करें और की गई कार्यवाही से इस विभाग को सूचित करें ।<br><br>' ;
$contents  .= ' 4. जिला दण्डाधिकारी, ';
 if($is_genrate == true){
$contents .= $post_data['DropDownList6'];
}else
{
       $contents  .= '  <select name="DropDownList6" id="DropDownList6">
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
      $contents  .= ' (म0प्र0) की ओर इस निर्देश के साथ प्रेषित कि उपरोक्तानुसार अपील प्रस्तुत कराया जाना सुनिश्चित करें तथा कि गई कार्यवाही की सूचना इस विभाग को भेजें । <br><br>';

$contents  .= '5. पुलिस अधीक्षक, ';
if($is_genrate == true){
$contents .= $post_data['DropDownList6'];
}else
{
       $contents  .= '  <select name="DropDownList6" id="DropDownList6">
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
$contents  .= '(म0प्र0) की ओर इस निर्देश के साथ प्रेषित कि उपरोक्तानुसार अपील प्रस्तुत कराया  जाना सुनिश्चित करें तथा कि गई कार्यवाही की सूचना इस विभाग को भेजें ।<br><br>' ;
$contents  .= '6. विधि विभाग, उप कार्यालय, एम.पी. भवन, नई दिल्ली-110001 की ओर सूचनार्थ एवं आवश्यक  कार्यवाही हेतु अग्रेषित ।</td></tr>' ;
$contents  .= '<tr><td align="right" colspan="3" style="text-align: center"><div style="float: right; text-align: center"><br><br>' ;
$contents  .= '(';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['adname'].'</span>';
}else{
	 $contents .= '<input name="adname" type="text" id="TextBox5" value="आर. पी. शरण" />';
}
$contents  .= ')<br>अतिरिक्त सचिव<br>  मध्यप्रदेश शासन विधि और विधायी कार्य विधायी कार्य विभाग भोपाल</div></td></tr>' ;
?>