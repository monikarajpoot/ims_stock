<?php 
$contents  = '' ;
$contents .= '<tr><td align="left"> <div style="margin-top:20px;"><span style="margin-left:10%;">';
if($is_genrate == true){ 
    $contents .=  $post_data['subject'];
} else {
    $contents .= '<textarea name="subject" cols="30" rows="3">'.$file_subject.'</textarea></div>';
}
$contents .= ' </span></div></td></tr>';
$contents .= '<tr><td align="center">--00--</td></tr>';
$contents .= '<tr><td align="center" height="80"></td></tr>';

$contents .= '<tr><td align="left"><span style="margin-left:8%"></span> प्रतिरक्षण आदेश जारी किया गया  हैं आदेश की प्रति  नस्ती पर आपकी ओर प्रेषित हैं | </td></tr>';   
$contents .= '<tr><td align="right"><div class="officer-center" contenteditable="false">( ';
if($is_genrate == true){
$contents .=  get_officer_information($this->input->post('add_secetroy')); 

}else
{
	 $contents .= get_officer_for_sign('add_secetroy' ,$add_secetroy ,'', $as_id);
	
}

$contents .= ' )</div></td></tr>';
$contents .= '<tr><td align="right"><div class="officer-center" contenteditable="false"> ';
if($is_genrate == true){	
    $contents .=  get_officer_for_sign_dign("design",$add_secetroy,$this->input->post('add_secetroy'));
}
else {
	 $contents .= '-------';
	}
?>