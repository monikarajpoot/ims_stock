<?php //pre($payslip);?>
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
<?php foreach ($payslip as $key => $pay) {
  //pre($pay_bill);
	# code...?>

  <tr height="27">
    <td colspan="27" height="27" width="1344"><div align="center"><strong>Govt of M.P Law and Legislative Affairs Department, Vindhyachal Bhawan, Bhopal</strong><br />
    </div></td>
  </tr>
  <tr height="28">
    <td colspan="27" height="28"><div align="center"><strong>Salary Slip for the  month of <?php echo $pay->pay_month ." of ". $pay->pay_year  ;?> </strong></div></td>
  </tr>
    <tr height="60" style="
    font-size: 18px;
    font-weight: bold;
    text-align: center;
"> <td height="60" colspan="8">Name of employee :<?php echo $pay->emp_full_name?> </td>
    <td height="60" colspan="8">Post of employee :<?php echo getemployeeRole($pay->designation_id);?> </td>
    <td colspan="12">Unique code of employee :<?php echo $_POST['uid'];?> </td>
  </tr>
  <tr height="60">
    <td height="60" width="64"><strong>Gross Amonut</strong></td>
    <td width="64"><strong>Net Amount</strong></td>
    <td width="64"><strong>Computer Bill</strong></td>
    <td width="64"><strong>Office bill</strong></td>
    <td width="64"><strong>Voucher No.</strong></td>
    <td width="64"><strong>Voucher  Date</strong></td>
    <td width="64"><strong>SGS/ DPF Number.</strong></td>
    <td width="64"><strong>Pan Number.</strong></td>
    <td width="64"><strong>Aadhaar card Number</strong></td>
    <td width="64"><strong>Govt Quarter Number.</strong></td>
    <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
  <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
     <td width="64">&nbsp;</td>
       <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
     <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="64">&nbsp;</td>
  
  </tr>
  <tr height="30" style="font-size: 23px; font-weight: bold;padding: 8px;">
    <td height="20"><?php echo  @$pay_bill[0]->pbill_gross_amount  ; ?></td>
    <td><?php echo  @$pay_bill[0]->pbill_net_amont  ; ?></td>
    <td><?php echo @$pay_bill[0]->pbill_computer_no; ?></td>
    <td><?php echo @$pay_bill[0]->pbill_office_no; ?> </td>
    <td><?php echo @$pay_bill[0]->pbill_vocher_no; ?></td>
    <td> <?php echo @$pay_bill[0]->pbill_vocher_date;?></td>
    <td>------</td>
    <td><?php echo $pay->emp_pen_no?></td>
    <td><?php echo $pay->emp_adhar_card_no?></td>
    <td><?php echo $pay->emp_house_no?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
       <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
     <td>&nbsp;</td>
    <td>&nbsp;</td>    <td>&nbsp;</td>
     <td>&nbsp;</td>
    <td>&nbsp;</td>
 <td>&nbsp;</td>
  </tr>
  <tr height="20">
    <td colspan="10" height="20"><div align="center"><strong>Detail of pay</strong></div></td>
    <td colspan="14"><div align="center"><strong>Deduction Amount</strong></div></td>
 
  </tr>
  <tr height="60">
        
							<th width='25%'><?php echo $this->lang->line('basic_pay'); ?></th>
                           
                                    <th width='25%'><?php echo $this->lang->line('pay_special'); ?></th>
                                  
                                   <th width="15%"><?php echo $this->lang->line('pay_da'); ?></th>
                                 
                                    <th width='5%'><?php echo $this->lang->line('pay_others')  ?></th>
                                      
                                    <th width='25%'><?php echo $this->lang->line('pay_sa')  ?></th>
                                   
                                    <th width="10%"><?php echo $this->lang->line('pay_ma'); ?></th>
                                 
                                     <th width='5%'><?php echo $this->lang->line('pay_sp')  ?></th>
                                       
                                    <th width='25%'><?php echo $this->lang->line('pay_ca')  ?></th>
                                     
                                    <th width="10%"><?php echo $this->lang->line('pay_gradepay'); ?></th>
                                    
							<th width='25%'><?php echo $this->lang->line('pay_sum'); ?></th>
						
                                    <th width='25%'><?php echo $this->lang->line('pay_gpf'); ?></th>
                                   
                                   <th width="15%"><?php echo $this->lang->line('pay_gpf_adv'); ?></th>
                               
                                    <th width='5%'><?php echo $this->lang->line('pay_dpf')  ?></th>
                                    
                                    <th width='25%'><?php echo $this->lang->line('pay_dpf_adv')  ?></th>
                                    
                                    <th width="10%"><?php echo $this->lang->line('pay_gis'); ?></th>
                                
                                    <th width='25%'><?php echo $this->lang->line('pay_define'); ?></th>
                                 
                                      
							<th width='25%'><?php echo $this->lang->line('pay_home_loan'); ?></th>

                                        
                                <th width='25%'><?php echo $this->lang->line('pay_house_rent'); ?></th>
                            
                                
                                    <th width='25%'><?php echo $this->lang->line('pay_grain_adv'); ?></th>
                                


                                    <th width='25%'><?php echo $this->lang->line('pay_car_loan'); ?></th>
                                   

                                   <th width="15%"><?php echo $this->lang->line('pay_fule_charge'); ?></th>

                                  

                                    <th width='5%'><?php echo $this->lang->line('pay_professional_tax')  ?></th>

                                   
                                <th width="10%"><?php echo $this->lang->line('pay_income_tax'); ?></th>

                                  
							<th width='25%'><?php echo $this->lang->line('pay_festival_adv'); ?></th>

                                  

                                    <th width='25%'><?php echo $this->lang->line('pay_other_adv'); ?></th>

                                    
                                    <th width="15%"><?php echo $this->lang->line('pay_total_cut'); ?></th>
                                  
  </tr>


                                 <tr height="30" style="font-size: 23px; font-weight: bold;padding: 8px;">
                                  
                                                           
                            <th width='25%'><?php echo $pay->pay_basic;  ?></th>
                                    <th width="10%"><?php echo  $pay->pay_grp;  ?></th>
                                    <th width='25%'><?php echo $pay->pay_special;   ?></th>
                                   <th width="15%"><?php  echo  $pay->pay_da;  ?></th>
                                    <th width='5%'><?php echo $pay->pay_others ?></th>
                                    <th width='25%'><?php echo $pay->pay_sa;  ?></th>
                                    <th width="10%"><?php echo $pay->pay_madical; ?></th>

                                     <th width='5%'><?php echo $pay->pay_sp; ?></th>
                                    <th width='25%'><?php echo $pay->pay_ca ?></th>
                                  
                                
                            <th width='25%'><?php echo $pay->pay_total_sum; ?></th>
                    
                                    <th width='25%'><?php echo $pay->pay_gpf; ?></th>
                                   <th width="15%"><?php echo  $pay->pay_gpf_adv; ?> </th>
                                    <th width='5%'><?php echo   $pay->pay_dpf ?></th>

                                    <th width='25%'><?php echo   $pay->pay_dpf_adv ?></th>
                                    <th width="10%"><?php echo   $pay->pay_gias ?></th>
                                    <th width='25%'><?php echo $pay->pay_defined_contribution ?></th>
                                 
                            <th width='25%'><?php echo $pay->pay_house_loan ?></th>



                                    <th width='25%'><?php echo $pay->pay_car_loan ?></th>

                                <th width='25%'><?php echo $pay->pay_house_rent ?></th>

                                
                                     <th width='25%'><?php echo $pay->pay_grain_adv ?></th>
                                

                                   <th width="15%"><?php echo $pay->pay_fuel_charge; ?></th>

                            <th width='25%'><?php echo $pay->pay_festival_adv; ?></th>

                                    <th width='5%'><?php echo $pay->pay_professional_tax; ?></th>

                                <th width="10%"><?php echo $pay->pay_income_tax ?></th>


                                    <th width='25%'><?php echo $pay->pay_other_adv ?></th>

                                 
                                   <th width="15%"><?php echo $pay->pay_total_cut; ?></th>
                               
                                </tr>
	<?php }?> 
</table>
  <input  type="button" onclick="window.print();" style="background-color: #052B02;border: solid 1px #36730F;margin: 10px auto;
    color: #ffffff;
    padding: 10px;" name="Submit" class="no-print"  value="print" /> <input style="background-color: #052B02;border: solid 1px #36730F;margin: 10px auto;
    color: #ffffff;
    padding: 10px;" class="no-print"  type="button" onclick="window.history.back();" name="Submit" value="Go Back" >

  <style type="text/css" media="print">
  
  @page { size: landscape; }

  @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}

</style>