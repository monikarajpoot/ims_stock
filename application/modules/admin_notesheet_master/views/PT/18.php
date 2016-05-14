<?php 
$contents  = '' ;
$contents .= '<tr><td align="left"><div style="margin-top:20px;"><span style="margin-left:10%;"> ';
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
$contents .= ', नई दिल्ली के फीस  देयकों के भुगतान बाबत्। </span></div></td></tr>';
$contents .= '<tr><td align="center">---------</td></tr>';
$contents .= '<tr><td align="left"><p>  ';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
         $contents .= ' '.$row->scm_name_hi.', '.$row->scm_post_hi.', '.$row->scm_court_name_hi;
    }
} else {
    $contents .= ' ----------';
}
$contents .= ', नई दिल्ली  ने पैरवी उपरांत कुल राशि रू0  ';
if($is_genrate == true){ 
    $contents .=  $post_data['money'];
} else {
    $contents .= '<input type="text" class="" name="money" required> ';
}
$contents .= '  के भुगतान की मांग की गई हैं, आदेशानुशार दी जाने वाली राशि रु0  ';
if($is_genrate == true){ 
    $contents .=  $post_data['money1'];
} else {
    $contents .= '<input type="text" class="" name="money1" required> ';
}
$contents .= ' भुगतान योग्य हैं |</td></tr>';
$contents .= '<tr><td align="left"><p>अतः   ';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
         $contents .= ' '.$row->scm_name_hi.', '.$row->scm_post_hi.', '.$row->scm_court_name_hi;
    }
} else {
    $contents .= '-------------';
}
$contents .= ', नई दिल्ली अधिवक्ता को रु0 '; 
if($is_genrate == true){ 
    $contents .=  $post_data['money3'];
} else {
    $contents .= '<input type="text" class="" name="money3" required> ';
}
$contents .= '(  रु0   ';
if($is_genrate == true){ 
    $contents .=  $post_data['money4'];
} else {
    $contents .= '<input type="text" class="" name="money4" required> ';
}
$contents .= ' ) केवल भुगतान किया जाना प्रस्तावित है।</p></td></tr>';
if($this->uri->segment(6) == 'p' || $this->uri->segment(7) == 'p'  ){
$contents .= '<tr><td><u>अनुभाग अधिकारी (याचिका)</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अवर सचिव (याचिका)</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>वरिष्ठ लेखाधिकारी</u></td></tr>';
$contents .= '<tr><td>&nbsp;</td></tr>';
$contents .= '<tr><td><u>अति. सचिव (याचिका)</u></td></tr>';


}
?>
