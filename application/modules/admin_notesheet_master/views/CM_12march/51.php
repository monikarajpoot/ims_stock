<?php
$contents  = '' ;
$contents .= '<tr>';
$contents .= '<td align="center" colspan="3">';
$contents .= '<b><h4>IN THE MATTER OF VAKALATNAMA</h4></b><br />';
$contents .= '</td> </tr><tr>';
$contents .= '<td align="left" colspan="3">In the Supreme Court of India</td>';
$contents .= '</tr><tr>';
$contents .= '<td align="left" colspan="3">CRIMINAL / S.L.P. / PETITION OF APPEAL / S.L.P. NO</td>';
$contents .= '</tr><tr>';
$contents .= '<td align="left" colspan="3">';
$contents .= $case_no1[0].' NO. <b><u>'.$case_no1[1].'/'.$case_no1[2].'</u></br>';
$contents .= '</td></tr><tr>';
$contents .= '<td align="left" colspan="3">';
$contents .= 'OF <b><u>'.$agenst_name.'</u></b>';
$contents .= '</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td>';
$contents .= '<td align="right"><b>Petitioner (s)<br />Applicant (s)</b></td></tr>';
$contents .= '<tr><td align="center" colspan="3"><b>VERSUS</b></td></tr>';
$contents .= '<tr><td align="left" colspan="3"><b><u>STATE OF MP</u></b></td></tr>';
$contents .= '<tr><td>&nbsp;</td><td>&nbsp;</td>';
$contents .= '<td align="right">&nbsp;<b>Respondent (s)<br /> Opp. Parties</b></td></tr>';
$contents .= '<tr><td align="left" colspan="3">I, ';
 if($is_genrate == true){
$contents .= $post_data['DropDownList_secretory'];
}else
{
       $contents  .= '  <select name="DropDownList_secretory" id="DropDownList_secretory"><option>R.P. SHARAN</option><option>J.K. Vaidya </option> </select>';
	   
}
 $contents .= ', Secretary, </td></tr>';
$contents .= '<tr><td align="left" colspan="2">Law & Legislative Affairs Department.</td><td align="right">&nbsp;<b>Applicant (s)</b></td></tr>';
$contents .= '<tr><td align="center" colspan="3"><br /><b>APPELLANT (S)</b></td></tr>';
$contents .= '<tr><td align="center" colspan="3">&nbsp; <b>Petitioner (s) / Respondent (s) Opposite Parties, do hereby appoint and retain</b></td></tr>';
$contents .= '<tr><td align="center" colspan="3"><br />';
if($is_genrate == true){
    foreach(get_advocates_name('', $post_data['member_id']) as $row){
        $contents .= ' <b>'.$row->scm_name.'</b>';
    }
} else {
    $contents .= ' <select name="member_id" required="">';
    $contents .= ' <option value="">Select</option>>';
    foreach($standing_counsil_memebers as $row){
        $contents .= '<option value="'.$row->scm_id.'">'.$row->scm_name.'</option>';
    }
    $contents .= '</select>';
}
$contents .= '</select>';
$contents .= '<br/><br/></td></tr>';
$contents .= '<tr><td align="left" colspan="3"><div id="dv" class="style5">';
$contents .= '<p style="text-align: justify;">Advocate of the Supreme Court of India to act and appear for me/us in the Suit / Appeal / Petition / Reference and on / my / our behalf to conduct and prosecute or defend or withdraw the same and all proceeding that may be taken in respect of any application connected with the same or any decree or order passed therein, including proceedings in taxation and applications for revise to file and obtain return of documents and to deposit and receive money on my / our behalf in the above suit / Appeal / Petition / Reference and in application of Review and to represent me / us and to take all necessary steps on my / our behalf in the above matter. I / We agree to ratify all acts done by the aforesaid Advocate in pursuance of this Authority.</p>';
$contents .= '</div></td></tr>';
$contents .= '<tr><td align="left" colspan="3"><br />Dated this the <b>';
//$contents .= date("d M Y", strtotime(date('Y-m-d')));
$contents .= date('jS', strtotime(date('Y-m-d')));
$contents .= ' day of ';
$contents .= date('F, Y', strtotime(date('Y-m-d')));
$contents .= '.</b>';
$contents .= '</td><td align="right">&nbsp;</td></tr>';
$contents .= '<tr><td align="left" colspan="2"><br />Accepted :-<br />Advocate Supreme Court,<br />35, Lawyers Chamber,<br />New Delhi</td>';
$contents .= '<td align="right" style="text-align: center"><br /><br />(';
 if($is_genrate == true){
$contents .= $post_data['DropDownList_secretory_2'];
}else
{
       $contents  .= '  <select name="DropDownList_secretory_2" id="DropDownList_secretory"><option>R.P. SHARAN</option><option>J.K. Vaidya </option> </select>';
	   
}
$contents .= ')<br />Secretary to Govt. of M.P.<br />Plantiff (s) / Defendant (s) / Petitioner<br />Opp. Parties';
$contents .= '</td></tr>';
?>