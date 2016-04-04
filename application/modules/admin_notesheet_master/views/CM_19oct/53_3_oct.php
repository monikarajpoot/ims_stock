<?php
$contents  = '' ;

$contents .= '<tr><td colspan="4" align="center"><h4><u><b>मध्यप्रदेश शासन, विधि एवं विधायी कार्य विभाग, भोपाल<b/></u><h4/></td><tr/>';
$contents .= '<tr><td colspan="4">क्रं.';
$contents .= @$this->input->post('head') ? $this->input->post('head') : '<input name="head" placeholder="head" type="text" />';
$contents .= '/2015/'.$panji_krmank.'/21-क(आप),';
$contents .= '<div style="float:right">भोपाल, दिनांक '.date("d-m-Y").'</div></td><tr/>';
$contents .= '<tr><td width="55px">प्रेषक:-  </td><td></td><td></td><td></td><tr/>';
$contents .= '<tr><td></td><td colspan="2">अमिताभ मिश्र,<br/>';
$contents .= 'अतिरिक्त सचिव,';
$contents .= '<br/> मध्यप्रदेश शासन	<br/> विधि और विधायी कार्य विभाग</td><td></td><tr/>';
$contents .= '<tr><td>प्रति,  </td><td></td><td></td><td></td><tr/><tr><td></td><td>';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= $row->scm_name_hi;
        $contents .= ',<br />';
        $contents .= $row->scm_post_hi.', '.$row->scm_court_name_hi.',<br/>';
        $contents .= $row->scm_address_hi.'<br/>';
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
$contents .= '</td><td></td><td></td><tr/>';
$contents .= '<tr><td valign="top">विषय:-</td><td colspan="3" style="text-align:justify">'.$file_subject.'</td><tr/>';
$contents .= '<tr><td>संदर्भ:-</td><td colspan="3">'.$file_department.' के ';
$contents .= $file_type == 'l' ? 'पत्र क्रमांक': false;
$contents .= $file_type == 'f' ? 'यू.ओ. क्रमांक': false;
$contents .= ' /'.$file_uo_or_letter_no.'  दिनांक '.$file_uo_or_letter_date1. ' . </td><tr/>';
$contents .= '<tr> <td>महोदय,</td><td></td><td></td><td></td><tr/>';
$contents .= '<tr> <td colspan="4"><p>&nbsp; माननीय उच्च न्यायालय के आदेश की प्रमाणित प्रति तथा शासकीय अधिवक्ता के अभिमत की प्रति संलग्न कर अनुरोध है कि उक्त आदेश के विरूद्ध माननीय उच्चतम न्यायालय में विशेष अनुमति याचिका प्रस्तुत करें तथा विशेष अनुमति याचिका प्रस्तुत किये जाने की कार्यवाही की सूचना शीघ्र इस विभाग को भेजें । मामले के प्रभारी अधिकारी द्वारा आपसे संपर्क नहीं किया जाता है तो तत्काल इस विभाग को सूचित करें ।विलंब की दशा में संबंधित कार्यालय एवं उसके उत्तरदायी अधिकारी का विलंब माफी हेतु शपथ-पत्र प्राप्त कर विलंब माफी के आवेदन-पत्र सहित एस.एल.पी. प्रस्तुती की कार्यवाही अविलंब करें तथा इस विभाग को सूचना दी जावें | <span id="show_content"></span><input type="button" id="hide_btn" value="विलंब" onclick="showDiv()" /></p></td><tr/>';
$contents .= '<tr><td>संलग्न:-</td><td colspan="3">वकालतनामा एवं न्यायालय के आदेश की प्रमाणित प्रति एवं प्राप्त अभिलेख । </td><tr/>';
$contents .= '<tr><td></td><td colspan="3"><br/><br/><br/><div style="float:right; text-align:center" >(';
$contents .= @$this->input->post('adname') && $is_genrate == true ? $this->input->post('adname') : '<input name="adname" type="text" id="TextBox5" />';
$contents .= ') <br /><br />';
if($is_genrate == true){
    $contents .= '<span>'.$post_data['dsin'].'</span>';
}else {
    $contents .= '<select name="dsin">';
    foreach ($dsig as $row) {
        $contents .= '<option value="' . $row . '">' . $row . '</option>';
    }
    $contents .= '</select>';
}
$contents .= '<br/> मध्यप्रदेश शासन विधि और विधायी कार्य विभाग भोपाल</div></td><tr/>';

?>
<script>
function showDiv() {
  document.getElementById('show_content').innerHTML = "विलम्ब का दायित्व त्रुटिकर्ता अधिकारी का रहेगा, वह माननीय सर्वोच्च न्यायालय में धारा 5 लिमिटेशन एक्ट का आवेदन मय शपथ-पत्र के प्रस्तुत करते हुए, दिन प्रतिदिन के विलम्ब को स्पष्ट करेगा, विलम्ब का दायित्व विधि विभाग का नहीं रहेगा ।";
  document.getElementById('hide_btn').style.display = "none";
}
</script>