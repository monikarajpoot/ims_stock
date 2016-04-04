
<?php 
$contents  = '' ;
$contents .= '<tr><td><div style="float:left">पंजी क्र0 '.$file_number.'/'.date("Y").'/21-क(अभि )</div><div style="float:right">,दिनांक ';
if($is_genrate == true){
$contents .= $post_data['date1'].'</div></td></tr>';
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
}
$contents .= '<tr><td align="center">------0-------</td></tr>';
$contents .= '<tr><td><p>कृपया प्राप्ता समंसों का अवलोकन हो । </p></td></tr>';
$contents .= '<tr><td align="center">टेबल</td></tr>';
$contents .= '<tr><td><p>उपरोक्त विषयक प्राप्तन समंसों के पालन में उक्त  दिनांको को माननीय न्याायालय में साक्ष्यक पर उपस्थित होने के लिए कर्मचारी उपलब्ध  कराने हेतु स्थापना शाखा से अनुरोध किया जाना उचित होगा ।</p></td></tr>';

$contents .= '<tr><td><p>आदेशार्थ</td></tr>';




$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="left"><div style="width:35%; text-align:center;"></div></td></tr>';
$contents .= '<tr><td align="left"><div style="width:35%; text-align:center;">अनु0 अधि0</div></td></tr>';

$contents .= '<tr><td align="left"><div style="width:35%; text-align:center;">'.$as_name.'</div></td></tr>';
$contents .= '<tr><td align="left"><div style="width:35%; text-align:center;">अपर सचिव( ) </div></td></tr>';


//print content
//echo $contents;
?>   

