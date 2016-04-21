<?php //pre($payslip);?>
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
<?php foreach ($payslip as $key => $pay) {
	# code...?>

  <tr height="27">
    <td colspan="23" height="27" width="1344"><div align="center"><strong>Govt Of M.P Law and Legislative Affairs Department Vindhchal    Bhawan Bhopal</strong><br />
    </div></td>
  </tr>
  <tr height="28">
    <td colspan="23" height="28"><div align="center"><strong>Salary Slip for the    month Of <?php echo $pay->pay_month ." of ". $pay->pay_year  ;?></strong></div></td>
  </tr>
  <tr height="60">
    <td height="60" width="64"><strong>Gross Amonut</strong></td>
    <td width="64"><strong>Net    Amount</strong></td>
    <td width="64"><strong>Computer Bill</strong></td>
    <td width="64"><strong>Office    bill</strong></td>
    <td width="64"><strong>Vocher    No.</strong></td>
    <td width="64"><strong>Vocher    Date</strong></td>
    <td width="64"><strong>SGS/ DPF No.</strong></td>
    <td width="64"><strong>Pan    No.</strong></td>
    <td width="64"><strong>Adhar    card no</strong></td>
    <td width="64"><strong>Govt    Quter no.</strong></td>
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
    <td height="20"><?php echo $pay->pay_total_sum?></td>
    <td><?php echo $pay->pay_total?></td>
    <td> ---- </td>
    <td>----</td>
    <td>---- </td>
    <td>----- </td>
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
    <td>&nbsp;</td>
 
  </tr>
  <tr height="20">
    <td colspan="8" height="20"><div align="center"><strong>Detail of pay</strong></div></td>
    <td colspan="14"><div align="center"><strong>Deduction Amount</strong></div></td>
 
  </tr>
  <tr height="60">
                <?php if($dataval[0]['pay_cate_basic'] == 1){  ?>
							<th width='25%'><?php echo $this->lang->line('basic_pay'); ?></th>
                              <?php }if($dataval[0]['pay_cate_special'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_special'); ?></th>
                                    <?php }if($dataval[0]['pay_cate_da'] == 1){  ?>
                                   <th width="15%"><?php echo $this->lang->line('pay_da'); ?></th>
                                   <?php }if($dataval[0]['pay_cate_other_add'] == 1){  ?>
                                    <th width='5%'><?php echo $this->lang->line('pay_others')  ?></th>
                                              <?php }if($dataval[0]['pay_cate_sa'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_sa')  ?></th>
                                     <?php }if($dataval[0]['pay_cate_madical'] == 1){  ?>
                                    <th width="10%"><?php echo $this->lang->line('pay_ma'); ?></th>
                                  <?php }if($dataval[0]['pay_cate_sp'] == 1){  ?>
                                     <th width='5%'><?php echo $this->lang->line('pay_sp')  ?></th>
                                           <?php }if($dataval[0]['pay_cate_ca'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_ca')  ?></th>
                                       <?php }if($dataval[0]['pay_cate_grp'] == 1){  ?>
                                    <th width="10%"><?php echo $this->lang->line('pay_gradepay'); ?></th>
                                    <?php } ?>
							<th width='25%'><?php echo $this->lang->line('pay_sum'); ?></th>
							<?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_gpf'); ?></th>
                                    <?php }if($dataval[0]['pay_cate_gpf_adv'] == 1){  ?>
                                   <th width="15%"><?php echo $this->lang->line('pay_gpf_adv'); ?></th>
                                   <?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
                                    <th width='5%'><?php echo $this->lang->line('pay_dpf')  ?></th>
                                     <?php }if($dataval[0]['pay_cate_dpf_adv'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_dpf_adv')  ?></th>
                                     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>
                                    <th width="10%"><?php echo $this->lang->line('pay_gis'); ?></th>
                                    <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_define'); ?></th>
                                 
                                        <?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
							<th width='25%'><?php echo $this->lang->line('pay_home_loan'); ?></th>

                                        <?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>
                                <th width='25%'><?php echo $this->lang->line('pay_house_rent'); ?></th>
                             <?php }if($dataval[0]['pay_cate_garain_adv'] == 1){  ?>
                                
                                    <th width='25%'><?php echo $this->lang->line('pay_grain_adv'); ?></th>
                                
                                 <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>


                                    <th width='25%'><?php echo $this->lang->line('pay_car_loan'); ?></th>
                                     <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

                                   <th width="15%"><?php echo $this->lang->line('pay_fule_charge'); ?></th>

                                      <?php }if($dataval[0]['pay_cate_professional_tax'] == 1){  ?>

                                    <th width='5%'><?php echo $this->lang->line('pay_professional_tax')  ?></th>

                                      <?php }if($dataval[0]['pay_cate_income_tax'] == 1){  ?>

                                <th width="10%"><?php echo $this->lang->line('pay_income_tax'); ?></th>

                                  <?php }if($dataval[0]['pay_cate_festival_adv'] == 1){  ?>

							<th width='25%'><?php echo $this->lang->line('pay_festival_adv'); ?></th>

                                  <?php }if($dataval[0]['pay_cate_other_adv'] == 1){  ?>

                                    <th width='25%'><?php echo $this->lang->line('pay_other_adv'); ?></th>

                                    <?php } ?> 
                                    <th width="15%"><?php echo $this->lang->line('pay_total_cut'); ?></th>
                                  
  </tr>


                                 <tr height="30" style="font-size: 23px; font-weight: bold;padding: 8px;">
                                  
                                                                      <?php if($dataval[0]['pay_cate_basic'] == 1){  ?>
                            <th width='25%'><?php echo $pay->pay_basic;  ?></th>
                                 <?php }if($dataval[0]['pay_cate_grp'] == 1){  ?>
                                    <th width="10%"><?php echo  $pay->pay_grp;  ?></th>
                              <?php }if($dataval[0]['pay_cate_special'] == 1){  ?>
                                    <th width='25%'><?php echo $pay->pay_special;   ?></th>
                                    <?php }if($dataval[0]['pay_cate_da'] == 1){  ?>
                                   <th width="15%"><?php  echo  $pay->pay_da;  ?></th>
                                   <?php }if($dataval[0]['pay_cate_other_add'] == 1){  ?>
                                    <th width='5%'><?php echo $pay->pay_others ?></th>
                                              <?php }if($dataval[0]['pay_cate_sa'] == 1){  ?>
                                    <th width='25%'><?php echo $pay->pay_sa;  ?></th>
                                     <?php }if($dataval[0]['pay_cate_madical'] == 1){  ?>
                                    <th width="10%"><?php echo $pay->pay_madical; ?></th>

                                     <?php }if($dataval[0]['pay_cate_sp'] == 1){  ?>
                                     <th width='5%'><?php echo $pay->pay_sp; ?></th>

                                           <?php }if($dataval[0]['pay_cate_ca'] == 1){  ?>
                                    <th width='25%'><?php echo $pay->pay_ca ?></th>
                                  
                                    <?php } ?>
                            <th width='25%'><?php echo $pay->pay_total_sum; ?></th>
                             <?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                                    <th width='25%'><?php echo $pay->pay_gpf; ?></th>
                                    <?php }if($dataval[0]['pay_cate_gpf_adv'] == 1){  ?>
                                   <th width="15%"><?php echo  $pay->pay_gpf_adv; ?> </th>
                                   <?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
                                    <th width='5%'><?php echo   $pay->pay_dpf ?></th>

                                     <?php }if($dataval[0]['pay_cate_dpf_adv'] == 1){  ?>
                                    <th width='25%'><?php echo   $pay->pay_dpf_adv ?></th>
                                     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>
                                    <th width="10%"><?php echo   $pay->pay_gias ?></th>
                                    <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>
                                    <th width='25%'><?php echo $pay->pay_defined_contribution ?></th>
                                 
                                        <?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
                            <th width='25%'><?php echo $pay->pay_house_loan ?></th>

                            <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>


                                    <th width='25%'><?php echo $pay->pay_car_loan ?></th>

                                        <?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>
                                <th width='25%'><?php echo $pay->pay_house_rent ?></th>

                             <?php }if($dataval[0]['pay_cate_garain_adv'] == 1){  ?>
                                
                                     <th width='25%'><?php echo $pay->pay_grain_adv ?></th>
                                
                                
                                     <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

                                   <th width="15%"><?php echo $pay->pay_fuel_charge; ?></th>

                                         <?php }if($dataval[0]['pay_cate_festival_adv'] == 1){  ?>

                            <th width='25%'><?php echo $pay->pay_festival_adv; ?></th>


                                      <?php }if($dataval[0]['pay_cate_professional_tax'] == 1){  ?>

                                    <th width='5%'><?php echo $pay->pay_professional_tax; ?></th>

                                      <?php }if($dataval[0]['pay_cate_income_tax'] == 1){  ?>

                                <th width="10%"><?php echo $pay->pay_income_tax ?></th>

                            
                                  <?php }if($dataval[0]['pay_cate_other_adv'] == 1){  ?>

                                    <th width='25%'><?php echo $pay->pay_other_adv ?></th>

                                    <?php } ?>
                                   <th width="15%"><?php echo $pay->pay_total_cut; ?></th>
                               
                                </tr>
	<?php }?> 
</table>
  <input  type="button" onclick="window.print();" name="Submit" value="print" /> <input  type="button" onclick="window.history.back();" name="Submit" value="Go Back" >