<?php 
$contents  = '' ;
$contents .= '<tr><td align="center"><u><h3>'.$dept_name.'</h3></u></td></tr>';
$contents .= '<tr><td align="left">&nbsp;</td></tr>';
$contents .= '<tr><td><div style="float:left"> क्रमांक '.$file_number.'/'.date("Y").'/21-मत </div><div style="float:right"> भोपाल, दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date1'],'d/m/Y');
} else {
    $contents .= ' <input type="text" class="date1" name="date1" placeholder="dd/mm/yyyy" value="'.$today.'"/>';
}
 $contents .= '</div></td></tr>';
$contents .= '<tr><td align="left">&nbsp;</td></tr>';
$contents .= '<tr><td align="left">प्रति,</td></tr>';
$contents .= '<tr><td align="left"><span style="margin-left:5%">प्रमुख सचिव </span></td></tr>';
$contents .= '<tr><td align="left"> <span style="margin-left:5%">म0प्र0 शासन </span></td></tr>';
$contents .= '<tr><td align="left"><span style="margin-left:5%"> '.@$department_name.' </span></td></tr>';
$contents .= '<tr><td align="left"><span style="margin-left:5%"> भोपाल </span></td></tr>';
$contents .= '<tr><td align="left"> विषय :-  '.$file_subject.'</td></tr>';
$contents .= '<tr><td align="center">-----------</td></tr>';
$contents .= '<tr><td align="left">संदर्भ:-  आवेदन पत्र दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date2'],'d/m/Y');
} else {
    $contents .= ' <input type="text" class="date1" name="date2" placeholder="dd/mm/yyyy" value="'.$today.'"/>';
}
$contents .= '</td></tr>';
$contents .= '<tr><td align="left">&nbsp;</td></tr>';

$contents .= '<tr><td><p>उपरोक्त विषयक संदर्भित आवेदन पत्र मूलत: आपकी ओर आवश्यक कार्यवाही हेतु संलग्न प्रेषित है। </p></td></tr>';
$contents .= '<tr><td align="left">( प्रमुख सचिव,विधि द्वारा अनुमोदित  )</td></tr>';

 $contents .= '<tr><td align="right"><div style="width:35%; text-align:center;">( '.$us_name.' )</div></td></tr>';
 $contents .= '<tr><td align="right"><div style="width:35%; text-align:center;">अवर सचिव</div></td></tr>';

$contents .= '<tr><td align="right"><div style="width:35%; text-align:center;">'.$dept_name.' </div></td></tr>';
$contents .= '<tr><td align="left">&nbsp;</td></tr>';
$contents .= '<tr><td><div style="float:left"> पृ.क्रमांक '.$file_number.'/'.date("Y").'/21-मत </div><div style="float:right"> भोपाल, दिनांक ';
if($is_genrate == true){ 
    $contents .=  get_date_formate($post_data['date3'],'d/m/Y');
} else {
    $contents .= ' <input type="text" class="date3" name="date1" placeholder="dd/mm/yyyy" value="'.$today.'"/>';
}
 $contents .= '</div></td></tr>';
 
 $contents .= '<tr><td align="left">प्रतिलिपि </td></tr>';
 if($is_genrate == true){ 
    $contents .=  $post_data['notesheet_content'];
} else {
 $contents .= '<tr><td><p><textarea name="notesheet_content"  rows="10" cols="150" id="letter_content"></textarea></p></td></tr>';
}
  $contents .= '<tr><td align="right"><div style="width:35%; text-align:center;">( '.$us_name.' )</td></tr>';
 $contents .= '<tr><td align="right"><div style="width:35%; text-align:center;">अवर सचिव</div></td></tr>';

$contents .= '<tr><td align="right"><div style="width:35%; text-align:center;">'.$dept_name.' </div></td></tr>';
//print content
//echo $contents;
?>   

