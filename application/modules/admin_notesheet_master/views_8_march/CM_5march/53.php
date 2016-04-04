<?php
$contents  = '' ;
$contents .= '<tr><td colspan="4" ><div align="right" style="font-weight:bold; text-decoration: underline;">स्पीड पोस्ट द्वारा</div></td></tr>';
$contents .= '<tr><td align="center"  colspan="4" ><h4><u><b>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल<b/></u><h4/></td><tr/>';
$contents .= '<tr><td  colspan="3" >क्रं. 5/'.$panji_krmank.'/21-क(आप), </td>';
$contents .= '<td  ><div style="float:right">भोपाल, दिनांक ';
 if($is_genrate == true){
$contents .= $post_data['date_despetch'];
}else
{
  $contents .= '<input type="text" name="date_despetch" class="date1" >';
}  
$contents .= '</div></td><tr/>';
$contents .= '<tr><td width="55px"  colspan="4">प्रेषक:-  </td><tr/>';
$contents .= '<tr><td colspan="4"><span style="margin-left:10%"></span>आर. पी. शरण, </td><tr/>';
$contents .= '<tr><td colspan="4"><span style="margin-left:10%"></span>सचिव, </td><tr/>';
$contents .= '<tr><td colspan="4"><span style="margin-left:10%"></span>मध्यप्रदेश शासन	</td><tr/><tr><td colspan="4"><span style="margin-left:10%"></span>विधि और विधायी कार्य विभाग</td></tr>';
$contents .= '<tr><td colspan="4">प्रति, </td><tr/><td  colspan="4"><span style="margin-left:10%"></span>';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= $row->scm_name_hi;
        $contents .= ',<br /><span style="margin-left:10%"></span>';
        $contents .= $row->scm_post_hi.', '.$row->scm_court_name_hi.',<br/><span style="margin-left:10%"></span>';
        $contents .= $row->scm_address_hi.'<br/><span style="margin-left:10%"></span>';
        $contents .= $row->scm_pincode_hi;
    }
} else {
    $contents .= '<select name="member_id">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
    $contents .= '<br/>__';
}
$contents .= '</td><tr/><td colspan=""></td>';
$contents .= '</td><tr/><td colspan=""></td>';
$contents .= '<tr><td valign="top" colspan="4"><div style="float:left; width:10.5%;">विषय:- </div><p style=" text-indent:0;">माननीय उच्च न्यायलय, खण्डपीठ  ';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['court_location'].'</span>';
}else{
    $contents .= '<select name="court_location">';
    foreach($court_location as $row){
        $contents .= '<option value="'.$row.'">'.$row.'</option>';
    }
    $contents .= '</select> ';
}

$contents .= ' के '.$file_subject.' में पारित आदेश दिनांक ';
if($is_genrate == true){
	$contents .= $post_data['date_1'];
}else
{
$contents  .= "<input type='text' name='date_1' class='date1'> ";	
}
$contents .= '   के विरुद्ध माननीय उच्चतम न्यायालय में विशेष अनुमति याचिका प्रस्तुत किये जाने बाबत |</p></td><tr/>';
$contents .= '<tr><td colspan="4"><div style="float:left; width:10%;">संदर्भ:-</div><p style=" text-indent:0;">कार्यालय महाधिवक्ता, म०प्र० उच्च नयायालय, सिटी सेंटर,';
if($is_genrate == true){
	$contents .= $post_data['distic_1'];
}else
{
$contents  .= get_distic_dd('distic_1');	
}

$contents .= ' म०प्र०  के पत्र क्रमांक ' ;


$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' /'.$file_uo_or_letter_no.'  दिनांक '.$file_uo_or_letter_date1. ' .</p> </td><tr/>';
$contents .= '<tr> <td>महोदय,</td><td></td><td></td><td></td><tr/>';
$contents .= '<tr> <td colspan="4"><p>&nbsp;माननीय उच्च न्यायालय के आदेश की प्रमाणित प्रति तथा शासकीय अधिवक्ता के अभिमत की प्रति संलग्न कर अनुरोध है कि उक्त आदेश के विरूद्ध माननीय उच्चतम न्यायालय में विशेष अनुमति याचिका प्रस्तुत करें तथा विशेष अनुमति याचिका प्रस्तुत किये जाने की कार्यवाही की सूचना शीघ्र इस विभाग को भेजें । मामले के प्रभारी अधिकारी द्वारा आपसे संपर्क नहीं किया जाता है तो तत्काल इस विभाग को सूचित करें ।विलंब की दशा में संबंधित कार्यालय एवं उसके उत्तरदायी अधिकारी का विलंब माफी हेतु शपथ-पत्र प्राप्त कर विलंब माफी के आवेदन-पत्र सहित एस.एल.पी. प्रस्तुती की कार्यवाही अविलंब करें तथा इस विभाग को सूचना दी जावें |';
$contents .= '<input class="no-print" type="button" name="show_hide" id="show_hide"  value="hide ">';
$contents .= '<input class="no-print" style="display:none" type="button" name="hide_show" id="hide_show"  value="show">';
if($is_genrate == true &&  $_POST['date_2'] != '' ){
$contents .= '<u> एस. एल. पी. का प्रस्ताव इस कार्यालय को दिनांक ';
if($is_genrate == true){
$contents .= $post_data['date_2'];
}
 $contents .= ' को प्राप्त हुआ था |  एस. एल. पी.  की अवधि दिनांक ';
if($is_genrate == true){
	$contents .= $post_data['date_3'];
}
 $contents .= ' को समाप्त हो गई हैं | इसलिये विलम्ब  को स्पष्ट करने का उत्तरदायित्व त्रुटिकर्ता का रहेगा | त्रुटिकर्ता धारा 5 लिमिटेशन एक्ट का शपथ-पत्र में दिन-प्रतिदिन के विलंब को स्पष्ट करते हए माननीय सर्वोच्च न्यायालय में  आवेदन पत्र प्रस्तुत करेगा, विलंव का दायित्व विधि विभाग का नहीं रहेगा| </u>';

}
else{
	 $contents .="<div class='slp_div'><u>एस. एल. पी. का प्रस्ताव इस कार्यालय को दिनांक   <input type='text' name='date_2' class='date1' >  को प्राप्त हुआ था |  एस. एल. पी.  की अवधि दिनांक <input type='text' name='date_3'  class='date1'>को समाप्त हो गई हैं | इसलिये विलम्ब  को स्पष्ट करने का उत्तरदायित्व त्रुटिकर्ता का रहेगा | त्रुटिकर्ता धारा 5 लिमिटेशन एक्ट का शपथ-पत्र में दिन-प्रतिदिन के विलंब को स्पष्ट करते हए माननीय सर्वोच्च न्यायालय में  आवेदन पत्र प्रस्तुत करेगा, विलंव का दायित्व विधि विभाग का नहीं रहेगा| </u></div>";
}

$contents .= ' <span id="show_content"> </span></p></td><tr/>';
$contents .= '<tr><td colspan="4"><div style="float:left; width:65px; ">संलग्न:- </div><p style="text-indent:0">वकालतनामा एवं न्यायालय के आदेश की प्रमाणित प्रति एवं प्राप्त अभिलेख । </p></td><tr/>';
$contents .= '<tr><td></td><td colspan="3"><br/><br/><br/><div style="float:right; text-align:center" >(';
if($is_genrate == true ){
$contents .= $post_data['secetroy'];
}else
{
	 $contents .= '<select name="secetroy">';
	$contents .=  '<option>जे० के० वैद्य </option><option>आर० पी०शरण</option></select>';
}
$contents .= ') <br />';
	


if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else {
    $contents .= '<select name="dsin">';
    foreach ($dsig as $row) {
        $contents .= '<option value="' . $row . '">' . $row . '</option>';
    }
    $contents .= '</select>';
}
$contents .= '<br/> मध्यप्रदेश शासन विधि और विधायी कार्य विभाग, भोपाल</div></td><tr/>';

?>
<script>

</script>