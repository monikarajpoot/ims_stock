<?php 
$contents  = '' ;
$contents .= '<tr><td><div style="margin-top:12px;"><span style="margin-left:10%; font-weight:bold">';
if($is_genrate == true){
$contents .= ' '.$post_data['which_jail_1'];
}else
{
	$contents .=  ' <select name="which_jail_1" ><option>केन्द्रीय जेल</option><option>जिला जेल</option><option>उप जेल </option></select>';
}
if($is_genrate == true){
$contents .= ' '.$post_data['jail'];
}else
{
	$contents .=  '<input type="text" name="jail" />';
}
$contents .= '  के ';
if($is_genrate == true){
$contents .= $post_data['bandi'];
}else
{
	$contents .=  '<select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
$contents .= ' क्र ';
if($is_genrate == true){
$contents .= ' '.$post_data['bandi_no'];
}else
{
	$contents .=  ' <input type="text" name="bandi_no" />';
}
if($is_genrate == true){
$contents .= ' '.$post_data['bandi'];
}else
{
	$contents .=  ' <select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
if($is_genrate == true){
$contents .= ' '.$post_data['bandi_name'];
}else
{
	$contents .=  '<input type="text" name="bandi_name" />';
}
$contents .=  ' को मध्यप्रदेश जेल नियमावली के नियम'; 
if($is_genrate == true){
$contents .= ' '.$post_data['law1'];
}else
{
	$contents .=  '<input type="text" name="law1" />';
}
$contents .=  ' के अंतर्गत समयपूर्व ';
if($is_genrate == true){
$contents .= ' '.$post_data['mukti'];
}else
{
	$contents .=  ' <select name="mukti"  ><option>मुक्ति </option><option>क्षमा</option><option>दया</option></select>';
}

$contents .= ' याचिका प्रकरण।</span></div>	</td></tr>';
$contents .= '<tr><td align="center">------0-------</td></tr>';
$contents .= '<tr><td><u><div style="text-align:justify; margin-left:10%;">पंजी क्र0 '.$file_number.'/'.date("Y").'/21-क(अभि. ), दिनांक ';
if($is_genrate == true){
$contents .= ' '.$post_data['date1'];
}else
{
	$contents .=  '<input type="text" class="date1" name="date1" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
}
$contents .= ' जेल विभाग का यू.ओ.क्र . '.@$file_uo_or_letter_no .'/जेल  दिनांक '.@$file_uo_or_letter_date;
$contents .= '</div></u></td></tr>';

$contents .= '<tr><td><p>कृपया प्रशासकीय विभाग ( जेल विभाग ) से प्राप्त नस्ती का अवलोकन करने का कष्ट करें । </p></td></tr>';

$contents .= '<tr><td><p>';
if($is_genrate == true){
$contents .= ' '.$post_data['bandi'];
}else
{
	$contents .=  '<select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
$contents .=  ' क्रं ';
if($is_genrate == true){
$contents .= ' '.$post_data['bandi_no_2'];
}else
{
	$contents .=  ' <input type="text" name="bandi_no_2" />';
} 
if($is_genrate == true){
$contents .= ' '.$post_data['bandi'];
}else
{
	$contents .=  ' <select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
 if($is_genrate == true){
$contents .= ' '.$post_data['bandi_1'];
}else
{
	$contents .=  ' <input type="text" name="bandi_1" />';
}
if($is_genrate == true){
$contents .= ' '.$post_data['which_jail_1'];
}else
{
	$contents .=  ' <select name="which_jail_1" ><option>केन्द्रीय जेल</option><option>जिला जेल</option><option>उप जेल </option></select>';
}
if($is_genrate == true){
$contents .= ' '.$post_data['jail_2'];
}else
{
	$contents .=  '<input type="text" name="jail_2" />';
} 
	$contents .=  ' का म0प्र0 जेल नियमावली के नियम ';
	if($is_genrate == true){
$contents .= ' '.$post_data['law2'];
}else
{
	$contents .=  ' <input type="text" name="law2" />';
}
$contents .=  ' के अंतर्गत चिकित्सीय आधार पर समयपूर्व ';
if($is_genrate == true){
$contents .= ' '.$post_data['before_time'];
}else
{
	$contents .=  '<select name="before_time" ><option>मुक्ति प्रकरण</option><option>क्षमा</option><option>दया </option></select>';
}

$contents .=  ' प्रकरण प्रशासकीय विभाग द्वारा अभिमत हेतु इस विभाग को अंकित किया गया है। </p></td></tr>';
$contents .= '<tr><td><p>जेल अधीक्षक,  ';
if($is_genrate == true){
$contents .= ' '.$post_data['which_jail_1'];
}else
{
	$contents .=  ' <select name="which_jail_1" ><option>केन्द्रीय जेल</option><option>जिला जेल</option><option>उप जेल </option></select>';
}

if($is_genrate == true){
$contents .= ' '.$post_data['jail'];
}else
{
	$contents .=  '<input type="text" name="jail" />';
} 
$contents .=  ' द्वारा ';
if($is_genrate == true){
$contents .= ' '.$post_data['bandi'];
}else
{
	$contents .=  ' <select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
$contents .=  ' को मुक्त करने की अनुशंसा ';
if($is_genrate == true){
$contents .= ' '.$post_data['anushansha'];
}else
{
	$contents .=  '<select name="anushansha"  ><option>की है </option><option>नही की है</option></select>';
}
$contents .=  '।  पुलिस अधीक्षक  ';
if($is_genrate == true){
$contents .= ' '.$post_data['police_officer'];
}else
{
	$contents .=  ' <input type="text" name="police_officer" />';
} 
 $contents .=  ' द्वारा ';
 if($is_genrate == true){
$contents .= ' '.$post_data['bandi'];
}else
{
	$contents .=  '<select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
$contents .=  ' को मुक्त करने की अनुशंसा ';
if($is_genrate == true){
$contents .= ' '.$post_data['anushansha'];
}else
{
	$contents .=  ' <select name="anushansha"  ><option>की है </option><option>नही की है</option></select>';
}
$contents .=  'जिला दंडाधिकारी द्वारा ';

if($is_genrate == true){
	$contents .= ' '.$post_data['officer'];
}else
{
	$contents .=  '<input type="text" name="officer" />';
}
 if($is_genrate == true){
$contents .= ' '.$post_data['bandi_11'];
}else
{
	$contents .=  '<select name="bandi_11"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
$contents .=  ' को मुक्त करने की अनुशंसा ';
if($is_genrate == true){
$contents .= ' '.$post_data['anushansha_1'];
}else
{
	$contents .=  ' <select name="anushansha_1"  ><option>की है </option><option>नही की है</option></select>';
}
$contents .=  '</p></td></tr>';

$contents .= '<tr><td><p>अधीक्षक ';
if($is_genrate == true){
$contents .= ' '.$post_data['which_jail_1'];
}else
{
	$contents .=  '<select name="which_jail_1" ><option>केन्द्रीय जेल</option><option>जिला जेल</option><option>उप जेल </option></select>';
}
if($is_genrate == true){
$contents .= ' '.$post_data['jail_3'];
}else
{
	$contents .=  '<input type="text" name="jail_3" />';
} 
$contents .=  ' से प्राप्त ';
if($is_genrate == true){
$contents .= ' '.$post_data['bandi'];
}else
{
	$contents .=  '<select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
$contents .=  ' के नामीनल रोज से प्राप्त जानकारी के अनुसार ';
if($is_genrate == true){
$contents .= ' '.$post_data['bandi'];
}else
{
	$contents .=  '<select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
$contents .=  ' द्वारा दिनांक '; 

if($is_genrate == true){
$contents .= ' '.$post_data['date2'];
}else
{
	$contents .=  '<input type="text" class="date1" name="date2" value="'.date('d-m-Y').'" placeholder="dd/mm/yyyy" />';
}
$contents .=  ' तक की स्थिती में भुगती गई सजा का विवरण निम्नानुसार है:- </p></td></tr>';


$contents .= '<tr><td align="center">
		<table id="bandi_notesheet" class="bandi_notesheet gridtable" border="1px" style="font-size:13px;">
		<thead><tr><td> विवरण </td>
		<td>वर्ष</td>
		<td>माह</td>
		<td>दिन</td>
	
		</tr></thead>';
		
if($is_genrate == true){
	
	$total_row = count($post_data['bibran']);
	for($i = 0; $i < $total_row; $i++){
		if(isset($post_data['bibran'][$i]) && $post_data['bibran'][$i] != ''){
			$contents .= '<tr><td>'.$post_data['bibran'][$i].'</td><td>'.$post_data['year'][$i].'</td><td>'.$post_data['month'][$i].'</td><td>'.$post_data['days'][$i].'</td>';
			
		}
	}
	
}
else{
	  $contents .= '<tbody><tr><td><input type="text" name="bibran[]"></td>
	  <td><input type="text"  name="year[]" ></td>
	  <td><input type="text" name="month[]"></td>
	  <td><input type="text" name="days[]"></td>
	  </tr></tbody>';
	
}
if($is_genrate == false){
	$contents .= '<tfoot><tr><td colspan="4" style="text-align: left;">';
	$contents .= '<input type="button" id="addrow" value="Add Row" />';
	$contents .= '<input type="hidden" value="" name="total_row" class="total_row"></td></tr></tfoot>';
}

$contents .= '</table></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';


$contents .= '<tr><td><p>अत: उपरोक्तानुसार ';
if($is_genrate == true){
$contents .= ' '.$post_data['bandi'];
}else
{
	$contents .=  '<select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
$contents .=  ' क्रं';
if($is_genrate == true){
$contents .= ' '.$post_data['bandi_no_2'];
}else
{
	$contents .=  '<input type="text" name="bandi_no_2" />';
}  
if($is_genrate == true){
$contents .= ' '.$post_data['bandi'];
}else
{
	$contents .=  '<select name="bandi"  ><option>बंदी </option><option>बंदिनी</option></select>';
}
if($is_genrate == true){
$contents .= ' '.$post_data['bandi_1'];
}else
{
	$contents .=  '<input type="text" name="bandi_1" />';
}
if($is_genrate == true){
$contents .= ' '.$post_data['which_jail_1'];
}else
{
	$contents .=  '<select name="which_jail_1" ><option>केन्द्रीय जेल</option><option>जिला जेल</option><option>उप जेल </option></select>';
}

if($is_genrate == true){
$contents .= ' '.$post_data['jail_4'];
}else
{
	$contents .=  '<input type="text" name="jail_4" />';
} 
	$contents .=  ' का जेल नियमावली के नियम ';
	if($is_genrate == true){
$contents .= ' '.$post_data['law2'];
}else
{
	$contents .=  '<input type="text" name="law2" />';
}
$contents .=  ' के अंतर्गत चिकित्सीय आधार पर समयपूर्व ';
if($is_genrate == true){
$contents .= ' '.$post_data['before_time'];
}else
{
	$contents .=  '<select name="before_time" ><option>मुक्ति प्रकरण</option><option>क्षमा</option><option>दया </option></select>';
}
$contents .=  ' याचिका प्रकरण अभिमत हेतु  प्रस्तुत है।</td></tr>';




$contents .= '<tr><td>&nbsp;</td></tr>';

$contents .= '<tr><td><u>अनु0 अधि0  (अभि0)</u></td></tr>';

$contents .= '<tr><td>&nbsp;</td></tr>';

$contents .= '<tr><td><u>अपर सचिव  (अभि0)</u></td></tr>';

$contents .= '<tr><td>&nbsp;</td></tr>';


//print content
//echo $contents;
?>   

