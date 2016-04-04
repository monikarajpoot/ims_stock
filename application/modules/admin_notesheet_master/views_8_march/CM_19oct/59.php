<style>
    table{
        width: 55%;
    }.
	.cls1{
        
    }
</style>
<?php
$contents  = '' ;
$contents .= '<tr><td colspan="2"><div style="margin-top:20px;"><span style="margin-left:10%;">'.$file_subject.'</span></div></td></tr>';
$contents .= '<tr><td align="left"><br />पंजी क्रमांक '.$panji_krmank.'/21-क(आप.),<br /></td><td align="right"><br /> दिनांक '.$file_mark_section_date.'<br /></td></tr>';
$contents .= '<tr><td align="center" colspan="2">&nbsp; &nbsp;---------------------------------------------&nbsp;&nbsp;</td></tr>';
$contents .= '<tr><td colspan="2" align="left">&nbsp;<br />   हेड क्रं. 6/';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="file no" type="text" />';
$contents .= '/'.date("Y");
$contents .= '<br /> म.प्र. उच्च न्यायालय ';
if($is_genrate == true){
    $contents .= $post_data['court_location2'];
}else{
    $contents .= '<select name="court_location2">';
    foreach($court_location2 as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '<br /><div style="text-align:justify">जिला दण्डाधिकारी ';
$contents .= $district_name_hi;
$contents .= ' (म.प्र.)  के ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' '.$file_uo_or_letter_no.' दिनांक  '.$file_judgment_date1.' द्वारा अपील प्रस्तावित ।<br /></div>';
$contents .= '<div>विधि विभाग में प्रस्ताव  दिनांक '.$file_mark_section_date;
$contents .= ' को प्राप्त हुआ ।<br /></div>';
$contents .= '<div> अपील प्रस्ताव के संबंध में नस्ती के परीक्षण के लिए जानकारी निम्नानुसार है :-<br/><br/></div>';
$contents .= '<div style="text-align:justify" class="cls1">1. न्यायालय का पूर्ण नाम जिसके विरूद्ध अपील प्रस्तुत की जानी है । <br/>';
if($is_genrate == true){
    $contents .= $post_data['dt4'];
}else{
	 $contents .= get_Court('dt4');
	
   
}
$contents .= '</div><br/><div class="cls1">2.  म0प्र0 शासन विरूद्ध '.$case_parties1[0].' के मामले में अपील प्रस्तावित की गई है ।</div><br />';
$contents .= '<div class="cls1">3. ';
if($is_genrate == true){
    $contents .= $post_data['case_hindi'];
}else{
    $contents .= '<select name="case_hindi">';
    foreach($case_hindi as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '  प्रकरण क्रं.  '.$case_no1[1].'/'.$case_no1[2].'</div><br />';
$contents .= '<div class="cls1">4. ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
    $contents .= '	<select name="dosh_mukti">';
    foreach($dosh_mukti as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '  के निर्णय की दिनांक ';
if($is_genrate == true){
    $contents .= $post_data['dt1'];
}else{
    $contents .= '<input type="text" name="dt1" class="date1"/>';
}
$contents .= '</div><br />';
$contents .= '<div class="cls1">5. ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
	$contents .= '__';
}
$contents .= ' का निर्णय भा.दं.भि. की धारा ';
if($is_genrate == true){
    $contents .= $post_data['text1'];
}else{
    $contents .= '<input type="text" name="text1"/>';
}
$contents .= '  के अंतर्गत पारित किया गया है ।</div><br />';
$contents .= '<div class="cls1">6.  ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
	$contents .= '__';
}
$contents .= ' निर्णय की प्रमाणित प्रतिलिपि संलग्न है, जो ध्वज-ए है ।</div><br />';
$contents .= '<div class="cls1">7. साक्षियों के कथनों की प्रतिलिपि संलग्न  ';
if($is_genrate == true){
    $contents .= $post_data['dropdown1'];
}else{
    $contents .= '<select name="dropdown1">';
        $contents .= '<option>है </option>';
        $contents .= '<option>नहीं है </option>';    
    $contents .= '</select>';
}
$contents .= ' |</div><br />';
$contents .= '<div class="cls1">8. ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
	$contents .= '__';
}
$contents .= ' निर्णय के विरूद्ध लोक अभियोजक का अभिमत संलग्न  ';
if($is_genrate == true){
    $contents .= $post_data['dropdown2'];
}else{
    $contents .= '<select name="dropdown2">';
        $contents .= '<option>है </option>';
        $contents .= '<option>नहीं है </option>';    
    $contents .= '</select>';
}
$contents .= ' ।</div><br />';
$contents .= '<div class="cls1">9. ';
if($is_genrate == true){
    $contents .= $post_data['dosh_mukti'];
}else{
	$contents .= '__';
}
$contents .= ' निर्णय के विरूद्ध ';
if($is_genrate == true){
    $contents .= $post_data['dropdown3'];
}else{
    $contents .= '<select name="dropdown3">';
        $contents .= '<option>अपील </option>';
        $contents .= '<option>रिवीजन</option>';    
    $contents .= '</select>';
}
$contents .= '  प्रस्तुत किये जाने की दिनांक ';
if($is_genrate == true){
    $contents .= $post_data['dt2'];
}else{
    $contents .= '<input type="text" name="dt2" class="date1"/>';
}
$contents .= '</div><br />';
$contents .= '<div class="cls1">10. प्रकरण अवधि बाह्य प्राप्त  ';
if($is_genrate == true){
    $contents .= $post_data['dropdown3'];
}else{
    $contents .= '<select name="dropdown3">';
        $contents .= '<option>हुआ है </option>';
        $contents .= '<option>नहीं हुआ है </option>';    
    $contents .= '</select>';
}
$contents .= ' । </div><br /><br /> अनुभाग अधिकारी (आप.)<br /><br />अपर सचिव (आप.)<br /></td></tr>';
?>


