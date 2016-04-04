
<?php 
$contents  = '' ;
$contents .= '<tr><td><div style="float:left">पंजी क्र0 '.$file_number.'/'.date("Y").'/21-क(अभि )</div></td></tr>';
$contents .= '<tr><td align="center">------0-------</td></tr>';
$contents .= '<tr><td><p>कृपया प्राप्त समंसों का अवलोकन हो । </p></td></tr>';

$contents .= '<tr><td align="center">
		<table id="procetion" class="procetion" border="1px" style="font-size:13px;">
		<thead><tr><td>क्रमांक </td>
		<td>स्थान</td>
		<td>पेशी</td>
		<td>आरोपी</td>
		<td>वि. प्र.क्र.</td>
		<td>कर्मचारी का नाम</td>
		</tr></thead>';
		
if($is_genrate == true){
	
	$total_row = count($post_data['anukrmank']);
	for($i = 0; $i < $total_row; $i++){
		if(isset($post_data['anukrmank'][$i]) && $post_data['anukrmank'][$i] != ''){
			$contents .= '<tr><td>'.$post_data['anukrmank'][$i].'</td><td>'.$post_data['place'][$i].'</td><td>'.$post_data['case'][$i].'</td><td>'.$post_data['crimnal'][$i].'</td><td>'.$post_data['vp_no'][$i].'</td><td>'.$post_data['employee_name'][$i].'</td>';
			
		}
	}
	
}
else{
	  $contents .= '<tbody><tr><td><input type="text" name="anukrmank[]"></td>
	  <td><input type="text"  name="place[]" ></td>
	  <td><input type="text" name="case[]"></td>
	  <td><input type="text" name="crimnal[]"></td>
	  <td><input type="text" name="vp_no[]"></td>
	  <td><input type="text" name="employee_name[]"></td>
	  </tr></tbody>';
	
}
if($is_genrate == false){
	$contents .= '<tfoot><tr><td colspan="7" style="text-align: left;">';
	$contents .= '<input type="button" id="addrow" value="Add Row" />';
	$contents .= '<input type="hidden" value="" name="total_row" class="total_row"></td></tr></tfoot>';
}

$contents .= '</table></td></tr>';


$contents .= '<tr><td><p>उपरोक्त विषयक प्राप्त समंसों के पालन में उक्त  दिनांक को माननीय न्यायालय में साक्ष्य  पर उपस्थित होने के लिए कर्मचारी उपलब्ध  कराने हेतु स्थापना शाखा से अनुरोध किया जाना उचित होगा ।</p></td></tr>';

$contents .= '<tr><td><p>आदेशार्थ</td></tr>';




$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td></td></tr>';
$contents .= '<tr><td><u>अनु0 अधि0</u></td></tr>';

$contents .= '<tr><td>'.$so_name.'</div></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अवर सचिव</u></td></tr>';
$contents .= '<tr><td>'.$as_name.'</td></tr>';


//print content
//echo $contents;
?>   

