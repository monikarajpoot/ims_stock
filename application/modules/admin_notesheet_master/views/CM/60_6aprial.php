<?php 
$contents = '';
$contents .= '<tr><td colspan="2" align="left">हेड क्रं. 6/';
if($is_genrate == true){
    $contents .= $post_data['head'];
}else{
	$contents .= '<input name="head" placeholder="head" type="text" />';
}
$contents .= '/'.date("Y");
$contents .= '</td></tr>';
$contents .= '<tr><td colspan="2">';
if($is_genrate == true){
    $contents .= $post_data['dropdown1'];
}else{
    $contents .= '<select name="dropdown1">';
    $contents .= '<option>विशेष पुलिस स्थापना लोकायुक्त</option>';
    $contents .= '<option>आर्थिक अपराध अन्वेंषण ब्यूरो</option>';
    $contents .= '</select>';
}
$contents .= ' '.$district_name_hi;
$contents .= ' के ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' दिनांक '.$file_uo_or_letter_date1.' द्वारा अपील प्रस्ताव प्राप्त जिला दण्डाधिकारी '.$district_name_hi.' ';
$contents .= ' । विधि विभाग&nbsp;<br /><br />में प्रस्ताव दिनांक ';
if($is_genrate == true){
    $contents .= $post_data['dt1'];
}else{
    $contents .= '<input type="text" name="dt1" class="date1"/>';
}
$contents .= ' को प्राप्त हुआ । </td></tr> <tr><td colspan="2">अपील प्रस्ताव के संबंध में नस्ती के परीक्षण के लिए जानकारी निम्नानुसार है :-<br /></td></tr>';
$contents .= '<tr><td colspan="2"> 1. न्यायालय का पूर्ण नाम जिसके विरूद्ध अपील प्रस्तुत की जानी है ।';
if($is_genrate == true){
    $contents .= $post_data['dt2'];
}else{
    $contents .= '<input type="text" name="dt2"/></div><br/>';
}
$contents .= '<br /></td></tr> <tr><td colspan="2"><br />2. म0प्र0 शासन विरूद्ध '.$case_parties1[0].'</span>&nbsp;के मामले में अपील प्रस्तावित की गई है ।</div><br />';
$contents .= '</td></tr> <tr><td colspan="2"> 3. ';
if($is_genrate == true){
    $contents .= $post_data['case_hindi'];
}else{
    $contents .= '<select name="case_hindi">';
    foreach($case_hindi as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '  प्रकरण क्रं '.$case_no1[1].'/'.$case_no1[2].'</div><br />';
$contents .= '</td></tr> <tr><td colspan="2"> 4. ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
    $contents .= '	<select name="dosh_mukti">';
    foreach($dosh_mukti as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' के निर्णय की दिनांक  '.$file_judgment_date1.'</div><br />';
$contents .= '</td></tr> <tr><td colspan="2"> 5. ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
    $contents .= '__';
}
$contents .= ' का निर्णय भा.दं.भि. की धारा ';
if($is_genrate == true){
    $contents .= $post_data['dt3'];
}else{
    $contents .= '<input type="text" name="dt3" class="date1"/>';
}
$contents .= ' के अंतर्गत पारित किया गया है |</div><br />';
$contents .= '</td></tr> <tr><td colspan="2"> 6. ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
    $contents .= '__';
}
$contents .= ' निर्णय की प्रमाणित प्रतिलिपि संलग्न है, जो ध्वज-ए है </td></tr> <tr><td colspan="2">';
$contents .= ' 7. साक्षियों के कथनों की प्रतिलिपि संलग्न  ';
if($is_genrate == true){
    $contents .= $post_data['dropdown2'];
}else{
    $contents .= '<select name="dropdown2">';
    $contents .= '<option>है </option>';
    $contents .= '<option>नहीं है </option>';
    $contents .= '</select>';
}
$contents .= ' |</td></tr> <tr><td colspan="2">';
$contents .= ' 8. ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
    $contents .= '__';
}
$contents .= ' निर्णय के विरूद्ध लोक अभियोजक का अभिमत संलग्न  ';
if($is_genrate == true){
    $contents .= $post_data['dropdown3'];
}else{
    $contents .= '<select name="dropdown3">';
    $contents .= '<option>है </option>';
    $contents .= '<option>नहीं है </option>';
    $contents .= '</select>';
}
$contents .= ' । </td></tr> <tr><td colspan="2">';
$contents .= '9. ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
    $contents .= '__';
}
$contents .= ' निर्णय के विरूद्ध  ';
if($is_genrate == true){
    $contents .= $post_data['dropdown4'];
}else{
    $contents .= '<select name="dropdown4">';
    $contents .= '<option>अपील </option>';
    $contents .= '<option>रिवीजन</option>';
    $contents .= '</select>';
}
$contents .= '  प्रस्तुत किये जाने की दिनांक ';
if($is_genrate == true){
    $contents .= $post_data['dt4'];
}else{
    $contents .= '<input type="text" name="dt4" class="date1"/>';
}
$contents .= ' </td></tr> <tr><td colspan="2"> ';
$contents .= ' 10. प्रकरण अवधि बाह्य प्राप्त  ';
if($is_genrate == true){
    $contents .= $post_data['dropdown5'];
}else{
    $contents .= '<select name="dropdown5">';
    $contents .= '<option>हुआ है </option>';
    $contents .= '<option>नहीं हुआ है </option>';
    $contents .= '</select>';
} if($this->uri->segment(6) == 'p' || $this->uri->segment(7) == 'p'  ){
$contents .= ' । </td></tr> <tr><td colspan="2"> <u>अनुभाग अधिकारी (आप.) </u><br /><br /> <u>अपर सचिव (आप.) </u><br /></td></tr>';
}