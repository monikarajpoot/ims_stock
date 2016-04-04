<?php
//pre($file_details);
$contents = '';
if($this->input->post()){
    $cmn_style='style="display:none"';
    $date1=get_date_formate($this->input->post('date1'),'d/m/Y');
    $date2=$this->input->post('date2');
    $file_uo_date=$this->input->post('file_uo_date');
    $panji_no=$this->input->post('num');
    $panji_uno=$this->input->post('uo_no');
    $so_yachika=$this->input->post('so_yachika');
    $as_yachika=$this->input->post('ac_yachika');
    $cae_no=$this->input->post('cae_no');
}else
{   $cmn_style='';      $so_yachika='';
    $as_yachika='';     $panji_no='';
    $panji_uno='';      $date1='';
    $file_uo_date='';   $date2='';
    $cae_no='';
}
$contents .= '<tr colspan="1"><td><div style="margin-top:20px;"><b style="margin-left:50px;">अवमानना प्रकरण क्रमांक '.$file_details[0]['case_no'];
if($is_genrate == true){ 
    $contents .=  ' '.$post_data['agenst_name'];
} else {
    $contents .= ' <input type="text" class="" name="agenst_name" value="'.$agenst_name.'" />';
}
$contents .= ' विरुद्ध ';
if($is_genrate == true){ 
    $contents .=  $post_data['agenst'];
} else {
    $contents .= ' <input type="text" class="" name="agenst" value="'.$agenst.'" />';
}
$contents .= ' में पक्ष समर्थन हेतु|</td></tr>';
$contents .= ' </b></div></td><tr/>';
$contents .= '<tr><td align="center">-00--</td></tr>';
$contents .= '<tr><td>पंजी क्रमांक
 <input '.$cmn_style.' type="text" name="num" value="'.$file_number.'"> <b>'.$panji_no.'/21-(या0),  	<div style="float: right">दिनांक
        <b>'.$date1.'</b> <input '.$cmn_style.' type="text" class="date1" name="date1" placeholder="dd/mm/yyyy" name="generate_date" value="'.$file_mark_section_date.'"/></div></td></tr>
        <tr><td align="center"> '.$file_details[0]['dept_name_hi'].' का </td></tr><tr><td><p><div style="float:left">यू.ओ. क्रमांक :
         <b>'.$panji_uno.'</b><input '.$cmn_style.' type="text" name="uo_no" value="'.$file_details[0]['file_uo_or_letter_no'].'"></div>
                <div style="float:right">
			   दिनांक   <b>'.$file_uo_date.'</b><input '.$cmn_style.' type="text" class="date1" name="file_uo_date" placeholder="dd/mm/yyyy" value="'.date('d/m/Y',strtotime($file_details[0]['file_uo_or_letter_date'])).'" /></div>
			   </p><br><br></td></tr><tr><td>  <p>  कृपया प्रशासकीय विभाग टीप
			   <b>'.$date2.'</b> <input '.$cmn_style.' type="text" class="date2" name="date2" placeholder="dd/mm/yyyy" name="generate_date" value="'.date('d/m/Y',strtotime($file_details[0]['file_uo_or_letter_date'])).'"/> का अवलोकन करें।	<br></p></td></tr>
			   <tr><td>  <p>प्रशासकीय विभाग ने अवमानना प्रकरण क्रमांक <input '.$cmn_style.' type="text" name="cae_no" value="'.$file_details[0]['case_no'].'">  '.$cae_no.'       में प्रभारी अधिकारी की नियुक्ति कर  प्रतिरक्षण आदेश जारी करने हेतु नस्ती विभाग को भेजी है।</p></td></tr>
			 <tr><td>  <p>अवमानना पैनल में नियुक्त अधिवक्ताओं की सूची पताका ’’अ’’ पर संलग्न है।</p></td></tr>
			 <tr><td>   <p>अतः प्रकरण में पैरवी करने हेतु '; 
			if($is_genrate == true){
				$contents .= ' '.$post_data['court_type'];
				$contents .= ' '.$post_data['court_location'];
			} else {
				$contents .= ' <select name="court_type" class="court_type">';
				foreach($court_type as $row){
					$contents .= '<option value="'.$row.'">'.$row.'</option>';
				}
				$contents .= '</select>';
				$contents .= ' <select name="court_location" class="court_location">';
				foreach($court_location as $row){
					$contents .= '<option value="'.$row.'">'.$row.'</option>';
				}
				$contents .= '</select>';
			}
			$contents .= ' के लिये नियुक्त अधिवक्ताओं की सूची में से ';
			if($is_genrate == true){ 
				$contents .=  @$post_data['name'];
			} else {
				$contents .= '<input type="text" class="" name="name" required></div>';
			}
			$contents .= '  अधिवक्ता का नाम प्रस्तावित है | अनुमोदन के पश्चात् नियुक्ति आदेश जारी किया जाना उचित होगा। </p></td></tr></td> </tr>';
			$contents .= ' <tr><td> <p>आदेशार्थ | </p></td></tr>';
               
       if($this->uri->segment(6) == 'p'){
	   $contents .= '<tr><td>&nbsp;</td></tr>';
		$contents .= '<tr><td><u>अनुभाग अधिकारी (याचिका)</u></td></tr>';

		$contents .= '<tr><td>&nbsp;</td></tr>';
		$contents .= '<tr><td><u>अवर सचिव (याचिका)</u></td></tr>';

		$contents .= '<tr><td>&nbsp;</td></tr>';
		$contents .= '<tr><td><u>अति सचिव (याचिका)</u></td></tr>';
	   }
       $contents .= ' <tr><td></td></tr><tr><td></td></tr>';
?>
