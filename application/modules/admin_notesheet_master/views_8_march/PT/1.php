<?php 
$contents  = '' ;
$contents .= '<tr><td align="center"><u><h2>'.$dept_name.'</h2></u></td></tr>';
$contents .= '<tr><td align="center"><u><h3>//आदेश //</h3></u></h3></td></tr>';
$contents .= '<tr><td><div style="float:left">क्रमांक  '.$file_number.'/'.date("Y").'/21-क(या0),  </div><div style="float:right">भोपाल, दिनांक  ';
if($is_genrate == true){
$contents .= get_date_formate($post_data['date1'],'d/m/Y').'</div></td></tr>';
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.$today.'" placeholder="dd/mm/yyyy" required>';
}
$contents .=  '</div></td></tr>';
$contents .= '<tr><td><p> राज्य शासन, ';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= ' '.$row->scm_name_hi;
    }
} else {
    $contents .= ' <select name="member_id">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' अधिवक्ता उच्चतम न्यायालय, नई दिल्ली को मान0 उच्चतम न्यायालय के समक्ष म0प्र0 राज्य की ओर से उनके द्वारा प्रस्तुत संलग्न बिलों में दर्शाये गये प्रकरणों में दिनांक ';
if($is_genrate == true){
	$contents .= ' '.get_date_formate($post_data['date2'],'d/m/Y').' से ';
}else{
	$contents .= ' <input type="text" class="date1" name="date2" placeholder="dd/mm/yyyy" value="'.$today.'"  required> से ';
}
if($is_genrate == true){
	$contents .= ' '.get_date_formate($post_data['date3'],'d/m/Y');
	
}else{
	$contents .= ' <input type="text" class="date1" name="date3" placeholder="dd/mm/yyyy" value="'.$today.'" required> ';
}
 $contents .= ' तक की अवधि में कुल ';
if($is_genrate == true){
$contents .= $post_data['total_pay'];
}else{
$contents .= 	'<input type="text" name="total_pay" required>';
}
$contents .= ' देयकों में अभिभाषकीय पारिश्रमिक के रूपये ';
if($is_genrate == true){
	$contents .= ' '.$post_data['price1'].'  /- (रूपये-  </span>';
}else{
	$contents .= '<input type="text" name="price1" required> /- (रूपये-  ';
}
if($is_genrate == true){
	$contents .= ' '.$post_data['price2'].' ) ';
}else{
	$contents .= ' <input type="text" name="price2">)';

}
$contents .= ' की स्वीकृति एतद् द्वारा प्रदान करता है । </p></td></tr>';
$contents .= '<tr><td>';
$contents .= '<tr><td><p>';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= ' '.$row->scm_name_hi;
    }
} else {
    $contents .= ' <select name="member_id">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' अधिवक्ता, उच्चतम न्यायालय, नई दिल्ली के देयकों का भुगतान मांग- संख्या-29-2014-न्याय प्रशासन-(114) - कानूनी सलाहकार एवं परामर्शदाता--(6251)-- मुफस्सिल स्थापना एवं ग्राम न्यायालय-31- व्यवसायिक सेवाओं हेतु अदायगियां--010- अभिभाषकों को फीस विकलनीय होगा। फीस का भुगतान ई-पेमेन्ट द्वारा करने की कृपा करें। </p></td></tr>';
$contents .= '<tr><td align="left">संलग्न मूलतः देयक</td></tr>';
$contents .= '<tr><td align="right">मध्यप्रदेश के राज्यपाल के नाम से तथा आदेशानुसार,</td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">('.$as_name.')</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अतिरिक्त सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';
$contents .= '<tr><td> <div style="float: left">फा0क्रं  '.$file_number.'/'.date("Y").'/21-क(या0), </div><div style="float: right"> भोपाल, दिनांक  ';
if($is_genrate == true){
	$contents .= $post_data['date4'].'</div> </td> </tr>';
}else{
	$contents .= '<input type="text" class="date1" name="date4" placeholder="dd/mm/yyyy"  value="'.$today.'"/></div></td></tr>';
}

$contents .= '<tr><td><u>प्रतिलिपि:</u></td></tr>';
$contents .= '<tr><td>1- महालेखाकार, म0प्र0 शासन ग्वालियर, म0प्र0 ।<br/> 2- विधि परामर्शी, म0प्र0 शासन, विधि और विधायी कार्य विभाग की ओर देयक की दो अतिरिक्त 	प्रतियों सहित भेजकर निवेदन है कि अधिवक्ता को उक्त धनराशि का भुगतान करने का कष्ट करें।<br/></td></tr><tr><td>3- ';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= ' '.$row->scm_name_hi.', '.$row->scm_post_hi.', '.$row->scm_court_name_hi;
    }
} else {
    $contents .= ' <select name="member_id">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}

$contents .= ', नई दिल्ली की ओर सूचनार्थ अग्रेषित। ';
$contents .= '<tr><td>4- कोषालय अधिकारी, विंध्याचल भवन, भोपाल ।</td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">('.$as_name.')</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">अतिरिक्त सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:50%; text-align:center;">'.$dept_name.'</div></td></tr>';

?>


