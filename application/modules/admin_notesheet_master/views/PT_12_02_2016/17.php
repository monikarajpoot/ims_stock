<?php 
$contents  = '' ;
$contents .= '<tr><td align="left"> <div style="margin-top:20px;"><span style="margin-left:10%;"> ';
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
$contents .= ' अधिवक्ता, मान0उच्चतम न्यायालय, नई दिल्ली के फीस देयकों के भुगतान बाबत्। </span></div></td></tr>';
$contents .= '<tr><td align="center">---------</td></tr>';

$contents .= '<tr><td><div style="float:left">  पंजी क्रमांक : '.$file_number.'/21-(या0),  </div><div  style="float:right">दिनांक ';
if($is_genrate == true){
     $contents .= ' '.get_date_formate($post_data['date1'],'d/m/Y');
}
else
{
    $contents .='<input type="text" class="date1" name="date1" placeholder="dd/mm/yyyy" value="'.$file_mark_section_date.'" />';
}
$contents .= '</div></td></tr>';
$contents .= '<tr><td><p>कृपया ';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id1']) as $row){
        $contents .= ' '.$row->scm_name_hi;
    }
} else {
    $contents .= ' <select name="member_id1">';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' अधिवक्ता, मान0उच्चतम न्यायालय, नई दिल्ली से प्राप्त विचाराधीन देयकों का अवलोकन हो।</p></td></tr>';
$contents .= '<tr><td><p>';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id2']) as $row){
        $contents .= ' '.$row->scm_name_hi;
    }
} else {
    $contents .= ' <select name="member_id2">';	
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' अधिवक्ता, ने  ';
if($is_genrate == true){
	if($post_data['member_id3'] == 'स्वयं'){
		$contents .= ' स्वयं';
	} else {
		foreach(get_advocates_name('', $post_data['member_id3']) as $row){
			$contents .= ' '.$row->scm_name_hi;
		}
	}
} else {
    $contents .= ' <select name="member_id3">';
	$contents .= '<option value="स्वयं">स्वयं</option>';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name_hi.'</option>';
    }
    $contents .= '</select>';
}
$contents .= ' के माध्यम से उच्चतम न्यायालय में पैरवी उपरांत फीस के देयक इस विभाग में भुगतान हेतु प्रस्तुत किये है। जिनका विवरण निम्नानुसार है :-';
$contents .= '</p></td></tr>';
$contents .= '<tr><td align="center">
		<table id="pitition_tbl" class="petition" border="1px" style="font-size:13px;">
		<thead><tr><td>अनुक्रमांक दिनांक</td>
		<td>प्रकरण क्रमांक एवं नाम</td>
		<td>चाही गई राशि</td>
		<td>आदेशानुसार दी जाने वाली राशि</td>
		</tr></thead>';
		
if($is_genrate == true){
	$total = array(
		'want_price' => 0,
		'order_price' => 0,
	);
	$total_row = $post_data['total_row'];
	for($i = 0; $i < $total_row; $i++){
		if(isset($post_data['anukrmank'][$i]) && $post_data['anukrmank'][$i] != ''){
			$contents .= '<tr><td>'.get_date_formate($post_data['anukrmank'][$i],'d/m/Y').'</td>
			<td>'.$post_data['name_pk'][$i].'</td><td>'.$post_data['want_price'][$i].'</td>
			<td>'.$post_data['order_price'][$i].'</td>';
			$total['want_price'] = $total['want_price'] + $post_data['want_price'][$i];
			$total['order_price'] = $total['order_price'] + $post_data['order_price'][$i];
		}
	}
	 $contents .= '<tr><td colspan="2">कुल</td><td>'.$total['want_price'].'</td><td>'.$total['order_price'].'</td></tr>';
}
else{
	  $contents .= '<tbody><tr><td><input type="text" class="date1" name="anukrmank[]"></td>
	  <td><input type="text"  name="name_pk[]" value="'.$case_no.'"></td>
	  <td><input type="text" name="want_price[]"></td>
	  <td><input type="text" name="order_price[]"></td></tr></tbody>';
	
}
if($is_genrate == false){
	$contents .= '<tfoot><tr><td colspan="5" style="text-align: left;">';
	$contents .= '<input type="button" id="addrow" value="Add Row" />';
	$contents .= '<input type="hidden" value="" name="total_row" class="total_row"></td></tr></tfoot>';
}

$contents .= '</table></td></tr>';
/*$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अनुभाग अधिकारी (याचिका)</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अवर सचिव (याचिका)</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अति. सचिव (याचिका)</u></td></tr>';*/



?>

