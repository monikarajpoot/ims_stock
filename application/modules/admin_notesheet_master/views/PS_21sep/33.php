
<?php 
$contents  = '' ;
$contents .= '<tr><td align="center"><u><h3>'.$dept_name.'</h3></u></td></tr>';
$contents .= '<tr><td><div style="float:left">पंजी क्र0  '.$file_number.'/'.date("Y").'/21-क(अभि),</div><div style="float:right">भोपाल, दिनांक   ';
if($is_genrate == true){
$contents .= $post_data['date1'].'</div></td></tr>';
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
}
$contents .= '</div></td></tr>';
$contents .= '<tr><td align="left">प्रति,</td></tr>';
$contents .= '<tr><td><span style="margin-left:8%">प्रमुख सचिव, </span></td></tr>';
$contents .= '<tr><td><span style="margin-left:8%">म.प्र. शासन,</span></td></tr>';
$contents .= '<tr><td><span style="margin-left:8%">'.@$file_department.',</span></td></tr>';
$contents .= '<tr><td align="left"><span style="margin-left:8%">मंत्रालय, भोपाल</span></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';



$contents .= '<tr><td align="left">विषय:- धारा 197 दंड प्रक्रिया संहिता के तहत अभियोजन स्वीकृति हेतु आवेदन पत्र ';
if($is_genrate == true){
$contents .= $post_data['subject'];
}else{
$contents .= '<input type="text" name="subject">';
}
$contents .= '</td></tr>';
$contents .= '<tr><td align="center">------0-------</td></tr>';
$contents .= '<tr><td><p>उपरोक्त विषयांकित प्रकरण में आवेदक  ';
 if($is_genrate == true){
$contents .= $post_data['aavedak'];
}else{
$contents .= '<input type="text" name="aavedak">';
}
 $contents .= 'अन्य के विरूद्ध धारा 197 दं.प्र.सं. के तहत अभियोजन स्वीकृति बाबत् आवेदन पत्र प्रस्तुत किया है, जो आपकी ओर मूलत: प्रेषित है । </p></td></tr>';

$contents .= '<tr><td><p>उक्त संबंध में लेख है कि प्राप्त आवेदन पत्र पर कार्यवाही आपके विभाग द्वारा की जाना है । अत: सामान्य  प्रशासन विभाग के परिपत्र क्रमांक एफ-15-01/2014/1-10, दिनांक 05.09.2014 के पालन में समय सीमा में कार्यवाही कर इस विभाग को एवं संबंधित को सूचित कराने का कष्ट  करें ।</p></td></tr>';

$contents .= '<tr><td><p>संलग्न:- आवेदक द्वारा प्रेषित पत्र मूलत: ।</p></td></tr>';





$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right"><div style="width:55%; text-align:center;">( ';
 if($is_genrate == true){
$contents .= $post_data['abarsachiv'];
}else{
$contents .=  '<input type="text" name="abarsachiv"  />';
}

$contents .=') </div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:55%; text-align:center;"> अवर सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:55%; text-align:center;">'.$dept_name.'</div></td></tr>';
$contents .= '<tr><td><div style="float:left">पृ. पजी क्रं '.$file_number.'/'.date("Y").'/21-क(अभि),</div><div style="float:right">भोपाल, दिनांक   ';
if($is_genrate == true){
$contents .= $post_data['date1'].'</div></td></tr>';
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
}
$contents .= '</div></td></tr>';
$contents .= '<tr><td> प्रतिलिपि:-</td></tr>';
$contents .= '<tr><td><p>';

 if($is_genrate == true){
$contents .= $post_data['pratilipi'];
}else{
$contents .= '<textarea name="pratilipi" cols="145"></textarea>';
}
$contents .= '</p></td></tr>';

$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td align="right"><div style="width:55%; text-align:center;">( ';
 if($is_genrate == true){
$contents .= $post_data['abarsachiv'];
}else{
$contents .=  '<input type="text" name="abarsachiv"  />';
}
$contents .= ' )</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:55%; text-align:center;"> अवर सचिव</div></td></tr>';
$contents .= '<tr><td align="right"><div style="width:55%; text-align:center;">'.$dept_name.'</div></td></tr>';


//print content
//echo $contents;
?>   
