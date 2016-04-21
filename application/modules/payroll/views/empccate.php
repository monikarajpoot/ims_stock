<?php //pre($pay_salary);?>


<?php        $emp_id = $this->uri->segment("3"); ?>
<table border="1" style="background-color:FFFFCC;border-collapse:collapse;border:1px solid FFCC00;color:000000;width:100%" cellpadding="3" cellspacing="3">
<thead>	<tr style="text-align:center">
		<td colspan="32"><h1>मध्यप्रदेश शासन विधि एवं विधायी कार्य विभाग</h1></td>
		
		</tr>
	<?php if($emp_id == 1){ ?>
	<tr style="text-align:center">
		<td colspan="32"><h2>विषय: माह मार्च 2016 का न्यायिक सेवा अधिकारियों का वेतन पत्रक कम्प्यूटर देयक क्रमाक         दिनांक    /4/2016 आफिस देयक क्रमाक     दिनांक  /4/2016</h2></td>
	
		</tr>

	<?php } ?>
		
                                <tr>
                                    
                                    <th width='5%'><?php echo $this->lang->line('sno')  ?></th>
                                    <th width='25%'><?php echo $this->lang->line('emp_unique_code')  ?></th>
                                    <th width="10%"><?php echo $this->lang->line('emp_name'); ?></th>
                                    <th width="10%"><?php echo $this->lang->line('emp_pay_month'); ?></th>
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
                                   <th width="15%"><?php  echo $this->lang->line('pay_amount'); ?></th>
                                </tr>
	</tr>
	
                                    <?php $k =0; foreach ($pay_salary as $key => $pay) { $k++; ?>
                                  <tr>
                                  
                                    <th width='5%'><?php echo $k  ?></th>
                                    <th width='25%'><?php echo $pay->emp_unique_id;  ?></th>
                                    <th width="10%"><?php echo $pay->emp_full_name_hi; ?></th>
                                     <th width="10%"><?php echo date("M",strtotime($pay->pay_month)); ?></th>
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
                                   <th width="15%"><?php echo $pay->pay_total; ?></th>
                                </tr>
	<?php }?>

                                  <tr style="
    background-color: green;
    font-size: 16px;
    font-weight: bold;">
                                  
                                    <th width='5%'></th>
                                    <th width='25%'></th>
                                    <th width="10%"></th>
                                     <th width="10%">Total </th>
                                        <?php if($dataval[0]['pay_cate_basic'] == 1){  ?>
                            <th width='25%'><?php echo sumcolumn("pay_basic" , $emp_id)['val'] ;  ?></th>
                                 <?php }if($dataval[0]['pay_cate_grp'] == 1){  ?>
                                    <th width="10%"><?php echo  @sumcolumn("pay_grp" , $emp_id)['val'];  ?></th>
                              <?php }if($dataval[0]['pay_cate_special'] == 1){  ?>
                                    <th width='25%'><?php echo  @sumcolumn("pay_special" , $emp_id)['val']   ?></th>
                                    <?php }if($dataval[0]['pay_cate_da'] == 1){  ?>
                                   <th width="15%"><?php  echo  @sumcolumn("pay_da" , $emp_id)['val'] ?></th>
                                   <?php }if($dataval[0]['pay_cate_other_add'] == 1){  ?>
                                    <th width='5%'><?php echo  @sumcolumn("pay_others" , $emp_id)['val']; ?></th>
                                              <?php }if($dataval[0]['pay_cate_sa'] == 1){  ?>
                                    <th width='25%'><?php echo sumcolumn("pay_sa" , $emp_id)['val'];  ?></th>
                                     <?php }if($dataval[0]['pay_cate_madical'] == 1){  ?>
                                    <th width="10%"><?php echo sumcolumn("pay_madical" , $emp_id)['val'];  ?></th>

                                     <?php }if($dataval[0]['pay_cate_sp'] == 1){  ?>
                                     <th width='5%'><?php echo @sumcolumn("pay_sp" , $emp_id)['val'];?></th>

                                           <?php }if($dataval[0]['pay_cate_ca'] == 1){  ?>
                                    <th width='25%'><?php echo @sumcolumn("pay_ca" , $emp_id)['val'];?></th>
                                  
                                    <?php } ?>
                            <th width='25%'><?php echo @sumcolumn("pay_total_sum" , $emp_id)['val']; ?></th>
                             <?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                                    <th width='25%'><?php echo  @sumcolumn("pay_gpf" , $emp_id)['val']; ?></th>
                                    <?php }if($dataval[0]['pay_cate_gpf_adv'] == 1){  ?>
                                   <th width="15%"><?php echo  @sumcolumn("pay_gpf_adv" , $emp_id)['val']; ?> </th>
                                   <?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
                                    <th width='5%'><?php echo    sumcolumn("pay_dpf" , $emp_id)['val'] ?></th>

                                     <?php }if($dataval[0]['pay_cate_dpf_adv'] == 1){  ?>
                                    <th width='25%'><?php echo   sumcolumn("pay_dpf_adv" , $emp_id)['val']  ?></th>
                                     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>
                                    <th width="10%"><?php echo   sumcolumn("pay_gias" , $emp_id)['val'] ?></th>
                                    <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>
                                    <th width='25%'><?php echo sumcolumn("pay_defined_contribution" , $emp_id)['val'] ?></th>
                                 
                                        <?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
                            <th width='25%'><?php echo  sumcolumn("pay_house_loan" , $emp_id)['val']?></th>

                            <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>


                                    <th width='25%'><?php echo sumcolumn("pay_car_loan" , $emp_id)['val'] ?></th>

                                        <?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>
                                <th width='25%'><?php echo sumcolumn("pay_house_rent" , $emp_id)['val'] ?></th>

                             <?php }if($dataval[0]['pay_cate_garain_adv'] == 1){  ?>
                                
                                     <th width='25%'><?php echo sumcolumn("pay_grain_adv" , $emp_id)['val'] ?></th>
                                
                                
                                     <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

                                   <th width="15%"><?php echo  sumcolumn("pay_fuel_charge" , $emp_id)['val'] ?></th>

                                         <?php }if($dataval[0]['pay_cate_festival_adv'] == 1){  ?>

                            <th width='25%'><?php echo  sumcolumn("pay_festival_adv" , $emp_id)['val'] ?></th>


                                      <?php }if($dataval[0]['pay_cate_professional_tax'] == 1){  ?>

                                    <th width='5%'><?php echo sumcolumn("pay_professional_tax" , $emp_id)['val'] ?></th>

                                      <?php }if($dataval[0]['pay_cate_income_tax'] == 1){  ?>

                                <th width="10%"><?php echo  sumcolumn("pay_income_tax" , $emp_id)['val'] ?></th>

                            
                                  <?php }if($dataval[0]['pay_cate_other_adv'] == 1){  ?>

                                    <th width='25%'><?php echo sumcolumn("pay_other_adv" , $emp_id)['val'] ?></th>

                                    <?php } ?>
                                   <th width="15%"><?php echo sumcolumn("pay_total_cut" , $emp_id)['val'] ?></th>
                                   <th width="15%"><?php echo sumcolumn("pay_total" , $emp_id)['val']  ?></th>
                                </tr>
</table>

  <input  type="button" onclick="window.print();" name="Submit" value="print" />