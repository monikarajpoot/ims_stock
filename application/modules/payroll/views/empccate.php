 <script src="<?php echo base_url(); ?>/themes/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<?php        if(count($pay_salary) != 0) { ?>
<table border="1" style="background-color:FFFFCC;border-collapse:collapse;border:1px solid FFCC00;color:000000;width:100%" cellpadding="3" cellspacing="3">
<thead>	<tr style="text-align:center">
		<td colspan="32"><h1>मध्यप्रदेश शासन विधि एवं विधायी कार्य विभाग</h1></td>
		
		</tr>
	<?php $emp_id = $this->uri->segment("3"); if($emp_id == 1){ ?>

  <tr style="text-align:center">
    <td colspan="32"><h2>विषय: माह <?php echo $this->uri->segment("4");?> 2016 का न्यायिक सेवा  अधिकारियों का वेतन पत्रक कम्प्यूटर देयक क्रमांक <?php echo @$pay_bill[0]->pbill_computer_no; ?>        दिनांक   <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date)); ?>  आफिस देयक क्रमांक  <?php echo @$pay_bill[0]->pbill_office_no; ?>    दिनांक  <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date));?></h2></td>
  
    </tr>
    <?php }elseif($emp_id == 4){ ?>


  <tr style="text-align:center">
    <td colspan="32"><h2>विषय: माह <?php echo $this->uri->segment("4");?> 2016 का चतुर्थ श्रेणी कर्मचारियों का वेतन विवरण पत्रक  कम्प्यूटर देयक क्रमांक <?php echo @$pay_bill[0]->pbill_computer_no; ?>        दिनांक   <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date)); ?>  आफिस देयक क्रमांक  <?php echo @$pay_bill[0]->pbill_office_no; ?>    दिनांक  <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date));?></h2></td>
  
    </tr>
        <?php }elseif($emp_id == 2){ ?>


  <tr style="text-align:center">
    <td colspan="32"><h2>विषय: माह <?php echo $this->uri->segment("4");?> 2016 का  परिभाषहित अशंदान  कर्मचारियों का वेतन विवरण पत्रक  कम्प्यूटर देयक क्रमांक <?php echo @$pay_bill[0]->pbill_computer_no; ?>        दिनांक   <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date)); ?>  आफिस देयक क्रमांक  <?php echo @$pay_bill[0]->pbill_office_no; ?>    दिनांक  <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date));?></h2></td>
  
    </tr>

   <?php }elseif($emp_id == 3){ ?>


  <tr style="text-align:center">
    <td colspan="32"><h2>विषय: माह <?php echo $this->uri->segment("4");?> 2016 का प्रथम , दुितीय एवं तृतीय आधि. /  कर्मचारियों का वेतन विवरण पत्रक  कम्प्यूटर देयक क्रमांक <?php echo @$pay_bill[0]->pbill_computer_no; ?>        दिनांक   <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date)); ?>  आफिस देयक क्रमांक  <?php echo @$pay_bill[0]->pbill_office_no; ?>    दिनांक  <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date));?></h2></td>
  
    </tr>

<?php }elseif($emp_id == 7 ){ ?>


  <tr style="text-align:center">
    <td colspan="32"><h2>विषय: 29-2014 न्याय  प्रशासन 3428 चतुर्थ श्रेणी कर्मचारियों का माह <?php echo $this->uri->segment("4");?> 2016 वेतन विवरण पत्रक  कम्प्यूटर देयक क्रमांक <?php echo @$pay_bill[0]->pbill_computer_no; ?>        दिनांक   <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date)); ?>  आफिस देयक क्रमांक  <?php echo @$pay_bill[0]->pbill_office_no; ?>    दिनांक  <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date));?></h2></td>
  
    </tr>

<?php }elseif($emp_id == 6 ){ ?>


  <tr style="text-align:center">
    <td colspan="32"><h2>विषय: श्री दिनेश कुमार कुमरे  का वेतन 29-2014 से आहरण अंशदायी होने के कारन पृथक से बनाया जा रहा है | वेतन माह <?php echo $this->uri->segment("4");?> 2016 वेतन विवरण पत्रक  कम्प्यूटर देयक क्रमांक <?php echo @$pay_bill[0]->pbill_computer_no; ?>        दिनांक   <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date)); ?>  आफिस देयक क्रमांक  <?php echo @$pay_bill[0]->pbill_office_no; ?>    दिनांक  <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date));?></h2></td>
  
    </tr>

<?php }elseif($emp_id == 5 ){ ?>


  <tr style="text-align:center">
    <td colspan="32"><h2>विषय: माँग संख्या 29-2014 न्याय प्रशासन 114-3428 महाधिवक्ता कायार्लय  वेतन देयक तृतीय श्रेणी कर्मचारी का 
   माह <?php echo $this->uri->segment("4");?> 2016 वेतन विवरण पत्रक  कम्प्यूटर देयक क्रमांक <?php echo @$pay_bill[0]->pbill_computer_no; ?>        दिनांक   <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date)); ?>  आफिस देयक क्रमांक  <?php echo @$pay_bill[0]->pbill_office_no; ?>    दिनांक  <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date));?></h2></td>
  
    </tr>

    <?php }elseif($emp_id == 8 ){ ?>
  <tr style="text-align:center">
    <td colspan="32"><h2>विषय: माह <?php echo $this->uri->segment("4");?> 2016 का  परिभाषहित अशंदान  कर्मचारियों का वेतन विवरण पत्रक  कम्प्यूटर देयक क्रमांक <?php echo @$pay_bill[0]->pbill_computer_no; ?>   दिनांक   <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date)); ?>  आफिस देयक क्रमांक  <?php echo @$pay_bill[0]->pbill_office_no; ?>    दिनांक  <?php echo date("d-m-Y",strtotime(@$pay_bill[0]->pbill_vocher_date));?></h2></td>
  
    </tr>

    <?php }?>
    


		
                                <tr>
                                    
                                    <th width='5%'><?php echo $this->lang->line('sno')  ?></th>
                                    <th width='25%'><?php echo $this->lang->line('emp_unique_code')  ?></th>
                                    <th width="10%"><?php echo $this->lang->line('emp_name'); ?></th>
                                    <th width="10%"><?php echo $this->lang->line('emp_pay_month'); ?></th>
                                    <?php if($dataval[0]['pay_cate_basic'] == 1){  ?>
                            <th width='25%'><?php  echo $this->lang->line('basic_pay');  ?></th>
                                 <?php }if($dataval[0]['pay_cate_grp'] == 1){  ?>
                                    <th width="10%"><?php echo  $this->lang->line('pay_gradepay');  ?></th>
                              <?php }if($dataval[0]['pay_cate_special'] == 1){  ?>
                                    <th width='25%'><?php echo  $this->lang->line('pay_special');   ?></th>
                                    <?php }if($dataval[0]['pay_cate_da'] == 1){  ?>
                                   <th width="15%"><?php  echo  $this->lang->line('pay_da');?></th>
                                   <?php }if($dataval[0]['pay_cate_other_add'] == 1){  ?>
                                    <th width='5%'><?php echo $this->lang->line('pay_others'); ?></th>
                                              <?php }if($dataval[0]['pay_cate_sa'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_sa');  ?></th>
                                     <?php }if($dataval[0]['pay_cate_madical'] == 1){  ?>
                                    <th width="10%"><?php echo  $this->lang->line('pay_ma'); ?></th>

                                     <?php }if($dataval[0]['pay_cate_sp'] == 1){  ?>
                                     <th width='5%'><?php echo $this->lang->line('pay_sp'); ?></th>

                                           <?php }if($dataval[0]['pay_cate_ca'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_ca');?></th>
                                  
                                    <?php } ?>
                            <th width='25%'><?php echo $this->lang->line('pay_sum'); ?></th>
                             <?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                                    <th width='25%'><?php echo  $this->lang->line('pay_gpf'); ?></th>
                                    <?php }if($dataval[0]['pay_cate_gpf_adv'] == 1){  ?>
                                   <th width="15%"><?php  echo $this->lang->line('pay_gpf_adv');  ?> </th>
                                   <?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
                                    <th width='5%'><?php  echo $this->lang->line('pay_dpf'); ?></th>

                                     <?php }if($dataval[0]['pay_cate_dpf_adv'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_dpf_adv');   ?></th>
                                     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>
                                    <th width="10%"><?php  echo $this->lang->line('pay_gis');?></th>
                                    <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>
                                    <th width='25%'><?php echo $this->lang->line('pay_define')."dsf"; ?></th>
                                 
                                        <?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
                            <th width='25%'><?php echo $this->lang->line('pay_home_loan');?></th>

                            <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>


                                    <th width='25%'><?php echo $this->lang->line('pay_car_loan');?></th>

                                        <?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>
                                <th width='25%'><?php echo $this->lang->line('pay_house_rent'); ?></th>

                             <?php }if($dataval[0]['pay_cate_garain_adv'] == 1){  ?>
                                
                                     <th width='25%'><?php echo $this->lang->line('pay_grain_adv'); ?></th>
                                
                                
                                     <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

                                   <th width="15%"><?php echo $this->lang->line('pay_fule_charge'); ?></th>

                                         <?php }if($dataval[0]['pay_cate_festival_adv'] == 1){  ?>

                            <th width='25%'><?php echo $this->lang->line('pay_festival_adv');  ?></th>


                                      <?php }if($dataval[0]['pay_cate_professional_tax'] == 1){  ?>

                                    <th width='5%'><?php echo $this->lang->line('pay_professional_tax'); ?></th>

                                      <?php }if($dataval[0]['pay_cate_income_tax'] == 1){  ?>

                                <th width="10%"><?php echo  $this->lang->line('pay_income_tax'); ?></th>

                            
                                  <?php }if($dataval[0]['pay_cate_other_adv'] == 1){  ?>

                                    <th width='25%'><?php echo  $this->lang->line('pay_other_adv'); ?></th>

                                    <?php } ?>
                                   <th width="15%"><?php echo $this->lang->line('pay_total_cut'); ?></th>
                                   <th width="15%"><?php echo $this->lang->line('pay_amount');  ?></th>
                                     <th width="15%"></th>
                                </tr>
	<
	
                                    <?php $k =0; foreach ($pay_salary as $key => $pay) { $k++; 
                                      ?>
   <form action="<?php echo base_url();?>payroll/edit_slary_emp1" onsubmit="onsumitsalary(<?php echo $pay->pay_id; ?>)" id="emp<?php echo $pay->pay_id;  ?>" method="post">
                               
                                      <?php
                                      if($pay->no_updated == 0){?>
                                        <tr id="<?php echo $pay->pay_id; ?>">
                                  <?php }else{ ?>

                                  <tr id="<?php echo $pay->pay_id; ?>" class="printdrak" style="background-color: #FF9800;color: #000;">
                                    <?php } ?>

                                  
                                    <th width='5%'><?php echo $k ;if(!isset($pay_bill[0]->pbill_computer_no)) {?> <a class="no-print" href="#<?php echo $pay->pay_id; ?>" onclick="efitfrom(<?php echo $pay->pay_id?>)"  >edit</a><?php } ?></th>
                                    <th width='25%'><?php echo $pay->emp_unique_id;  ?></th>
                                    <th width="10%"><?php echo $pay->emp_full_name_hi; ?></th>
                                     <th width="10%"><?php echo date("M",strtotime($pay->pay_month)); ?></th>
                                        <?php if($dataval[0]['pay_cate_basic'] == 1){  ?>
                            <th width='25%'>
                               <input type="hidden" name="pay_salary_cate_id" id="pay_id" value="<?php echo $pay->pay_salary_cate_id;  ?>" class="form-control">
        
                                  <input type="hidden" name="pay_id" id="pay_id" value="<?php echo $pay->pay_id;?>" >
                  <input type="hidden" name="pay_month" id="pay_month" value="<?php echo $pay->pay_month;?>" >
               <input type="hidden" name="no_updated" id="no_updated" value="<?php echo $pay->no_updated +1; ?>" >
               
                              <div class="username<?php echo $pay->pay_id; ?>" id="pay_basic"><?php echo $pay->pay_basic;  ?></div>

                      <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                        <input type="numbar" id="pay_basic1" name="pay_basic" value="<?php echo $pay->pay_basic;  ?>" ></div>

                            </th>
                                 <?php }if($dataval[0]['pay_cate_grp'] == 1){  ?>
                                    <th width="10%"> <div class="username<?php echo $pay->pay_id; ?>" id="pay_grp"> <?php echo $pay->pay_grp;  ?></div>
  <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
    <input type="numbar" id="pay_grp1" name="pay_grp"   value="<?php echo $pay->pay_grp;  ?>" ></div>

                                    </th>
                              <?php }if($dataval[0]['pay_cate_special'] == 1){  ?>
                                    <th width='25%'><div class="username<?php echo $pay->pay_id; ?>" id="pay_special">
                                      <?php echo $pay->pay_special;   ?></div>
                                        <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                          <input type="numbar" name="pay_special"  id="pay_special1"value="<?php echo $pay->pay_special;  ?>" ></div>


                                    </th>
                                    <?php }if($dataval[0]['pay_cate_da'] == 1){  ?>
                                   <th width="15%"><?php  echo  $pay->pay_da;  ?></th>

                                   <?php }if($dataval[0]['pay_cate_other_add'] == 1){  ?>
                                    <th width='5%'><div class="username<?php echo $pay->pay_id; ?>" id="pay_special">
                                      <?php echo $pay->pay_others ?></div>
                                  <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" name="pay_others" id="pay_others1" value="<?php echo $pay->pay_others;  ?>" >

                                  </div>
                                                  </th>

                                              <?php }if($dataval[0]['pay_cate_sa'] == 1){  ?>
                                    <th width='25%'>

                                      <div class="username<?php echo $pay->pay_id; ?>" id="pay_special">
                                        <?php echo $pay->pay_sa;  ?></div>
                        <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_sa1" value="<?php echo $pay->pay_sa;  ?>" name="pay_sa"  >

                                  </div>

                                      </th>
                                     <?php }if($dataval[0]['pay_cate_madical'] == 1){  ?>
                                    <th width="10%"><div class="username<?php echo $pay->pay_id; ?>"  id="pay_special">
                                      <?php echo $pay->pay_madical; ?>
</div>
                        <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_madical1" value="<?php echo $pay->pay_madical;  ?>" name="pay_madical" >

                                  </div>
                                    </th>

                                     <?php }if($dataval[0]['pay_cate_sp'] == 1){  ?>
                                     <th width='5%'>
                                    <div class="username<?php echo $pay->pay_id; ?>" id="pay_special">
                                      <?php echo $pay->pay_sp; ?>
                                              </div>
                                      <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_madical1" value="<?php echo $pay->pay_sp;  ?>" name="pay_sp"  >

                                  </div>

                                     </th>

                                           <?php }if($dataval[0]['pay_cate_ca'] == 1){  ?>
                                    <th width='25%'>
                                    <div class="username<?php echo $pay->pay_id; ?>" id="pay_special">
                                      <?php echo $pay->pay_ca ?>
                                          </div>
                                      <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_ca" value="<?php echo $pay->pay_ca;  ?>"  name="pay_ca"  >

                                  </div>

                                    </th>
                                  
                                    <?php } ?>
                            <th width='25%'><?php echo $pay->pay_total_sum; ?></th>
                             <?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                             <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                    <th width='25%'>
                          <div class="username<?php echo $pay->pay_id; ?>" id="pay_special" >
                                      <?php echo $pay->pay_gpf; ?>
                                     </div>
                                      <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_gpf" value="<?php echo $pay->pay_gpf;  ?>"   name="pay_gpf" >

                                  </div>


                                    </th>
                                    <?php }if($dataval[0]['pay_cate_gpf_adv'] == 1){  ?>

                                   <th width="15%">
                                <div class="username<?php echo $pay->pay_id; ?>" id="pay_special" > 

                                    <?php echo  $pay->pay_gpf_adv; ?> </div>
                                   <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_gpf_adv" value="<?php echo $pay->pay_gpf_adv;  ?>" name="pay_gpf_adv"  >

                                  </div>
                                  </th>
                                   <?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
                                   <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                    <th width='5%'><?php echo   $pay->pay_dpf ?>

                                         </div>
                                   <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_dpf_adv" value="<?php echo $pay->pay_dpf;  ?>" name="pay_dpf"  >

                                  </div>

                                    </th>

                                     <?php }if($dataval[0]['pay_cate_dpf_adv'] == 1){  ?>
                                    <th width='25%'>
                                       <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                      <?php echo   $pay->pay_dpf_adv ?>
                                    </div>
                                   <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_dpf_adv" value="<?php echo $pay->pay_dpf_adv;  ?>"  name="pay_dpf_adv" >

                                  </div>
                                    </th>
                                     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>

                                    <th width="10%">
                                      <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                      <?php echo $pay->pay_gias ?> 
                                           </div>
                                   <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_gias" value="<?php echo $pay->pay_gias;  ?>" name="pay_gias"  >

                                  </div>

                                    </th>
                                    <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>
                                    <th width='25%'>
                                  
                                  <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                      <?php echo $pay->pay_defined_contribution ?>
                                            </div>
                                   <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_define" value="<?php echo $pay->pay_defined_contribution;  ?>" name="pay_define"  >

                                  </div>

                                      </th>
                                 
                                        <?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
                            <th width='25%'>
                          <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                              <?php echo $pay->pay_house_loan ?>
                                </div>
                                   <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_house_loan" value="<?php echo $pay->pay_house_loan;  ?>" name="pay_house_loan"  >

                                  </div>

                            </th>

                            <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>


                                    <th width='25%'>
                                    <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                      <?php echo $pay->pay_car_loan ?>
                                    </div>
                                   <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_car_loan" value="<?php echo $pay->pay_car_loan;  ?>"  name="pay_car_loan"  >

                                  </div>


                                    </th>

                                        <?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>
                                <th width='25%'>
                                  <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                  <?php echo $pay->pay_house_rent ?></div>
                                    <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_house_rent" value="<?php echo $pay->pay_house_rent;  ?>"  name="pay_house_rent" >

                                  </div>

                                </th>

                             <?php }if($dataval[0]['pay_cate_garain_adv'] == 1){  ?>
                                
                                     <th width='25%'>
                                        <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 


                                      <?php echo $pay->pay_grain_adv ?>

                                      </div>
                                    <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_grain_adv" value="<?php echo $pay->pay_grain_adv;  ?>"  name="pay_grain_adv" >

                                  </div>
                                     </th>
                                
                                
                                     <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

                                   <th width="15%">

                                      <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                    <?php echo $pay->pay_fuel_charge; ?>
                                    </div>
                                    <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_grain_adv" value="<?php echo $pay->pay_fuel_charge;  ?>" name="pay_fuel_charge"  >

                                  </div>

                                  </th>

                                         <?php }if($dataval[0]['pay_cate_festival_adv'] == 1){  ?>

                            <th width='25%'>
                              <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                              <?php echo $pay->pay_festival_adv; ?>
                                </div>
                                    <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_festival_adv" value="<?php echo $pay->pay_festival_adv;  ?>"  name="pay_festival_adv" >

                                  </div>

                            </th>


                                      <?php }if($dataval[0]['pay_cate_professional_tax'] == 1){  ?>

                                    <th width='5%'>
                                       <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                      <?php echo $pay->pay_professional_tax; ?>
                                      </div>
                                    <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_professional_tax" value="<?php echo $pay->pay_professional_tax;  ?>"  name="pay_professional_tax"  >

                                  </div>

                                    </th>

                                      <?php }if($dataval[0]['pay_cate_income_tax'] == 1){  ?>

                                <th width="10%">
                                   <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                  <?php echo $pay->pay_income_tax ?>
 </div>
                                    <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_income_tax" value="<?php echo $pay->pay_income_tax;  ?>"  name="pay_income_tax" >

                                  </div>
                                </th>

                            
                                  <?php }if($dataval[0]['pay_cate_other_adv'] == 1){  ?>

                                    <th width='25%'>
                                    <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                      <?php echo $pay->pay_other_adv ?>
                                      </div>
                                    <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >
                                    <input type="numbar" id="pay_other_adv" value="<?php echo $pay->pay_other_adv;  ?>"  name="pay_other_advs" >

                                  </div>

                                    </th>

                                    <?php } ?>
                                   <th width="15%"><?php echo $pay->pay_total_cut; ?></th>
                                 
                                     <th width="15%"><?php echo $pay->pay_total; ?>    
                                   </th>
 <th width="15%">                            <div class="username<?php echo $pay->pay_id; ?>" id="pay_special"> 

                                      <?php echo $pay->pay_remark ?>
                                      </div> <div class="username1<?php echo $pay->pay_id; ?>" style="display:none" >

    <input type="test" id="pay_other_adv" value=" "  name="remark" >
<button class="btn btn-primary" type="submit" name="savenotice" id="savenotice"  value="1">
  <?php echo $this->lang->line('submit_botton'); ?></button>
  
                                  </div>   
                                   </th>

                                </tr>
                              </form>
	<?php }  ?>


                                  <tr style="
    background-color: #8BC34A;
    font-size: 16px;
    font-weight: bold;    color: #000;">

                                  
                                    <th width='5%'></th>
                                    <th width='25%'></th>
                                    <th width="10%"></th>
                                     <th width="10%">Total </th>
                                        <?php if($dataval[0]['pay_cate_basic'] == 1){  ?>
                            <th width='25%'><?php echo sumcolumn("pay_basic" ,  $this->uri->segment("3"),$this->uri->segment("4"))['val'] ;  ?></th>
                                 <?php }if($dataval[0]['pay_cate_grp'] == 1){  ?>
                                    <th width="10%"><?php echo  @sumcolumn("pay_grp" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'];  ?></th>
                              <?php }if($dataval[0]['pay_cate_special'] == 1){  ?>
                                    <th width='25%'><?php echo  @sumcolumn("pay_special" ,$this->uri->segment("3"),$this->uri->segment("4"))['val']   ?></th>
                                    <?php }if($dataval[0]['pay_cate_da'] == 1){  ?>
                                   <th width="15%"><?php  echo  @sumcolumn("pay_da" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>
                                   <?php }if($dataval[0]['pay_cate_other_add'] == 1){  ?>
                                    <th width='5%'><?php echo  @sumcolumn("pay_others" ,$this->uri->segment("3"),$this->uri->segment("4"))['val']; ?></th>
                                              <?php }if($dataval[0]['pay_cate_sa'] == 1){  ?>
                                    <th width='25%'><?php echo sumcolumn("pay_sa" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'];  ?></th>
                                     <?php }if($dataval[0]['pay_cate_madical'] == 1){  ?>
                                    <th width="10%"><?php echo sumcolumn("pay_madical" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'];  ?></th>

                                     <?php }if($dataval[0]['pay_cate_sp'] == 1){  ?>
                                     <th width='5%'><?php echo @sumcolumn("pay_sp" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'];?></th>

                                           <?php }if($dataval[0]['pay_cate_ca'] == 1){  ?>
                                    <th width='25%'><?php echo @sumcolumn("pay_ca" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'];?></th>
                                  
                                    <?php } ?>
                            <th width='25%'><?php echo @sumcolumn("pay_total_sum" ,$this->uri->segment("3"),$this->uri->segment("4"))['val']; ?></th>
                             <?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                                    <th width='25%'><?php echo  @sumcolumn("pay_gpf" ,$this->uri->segment("3"),$this->uri->segment("4"))['val']; ?></th>
                                    <?php }if($dataval[0]['pay_cate_gpf_adv'] == 1){  ?>
                                   <th width="15%"><?php echo  @sumcolumn("pay_gpf_adv" ,$this->uri->segment("3"),$this->uri->segment("4"))['val']; ?> </th>
                                   <?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
                                    <th width='5%'><?php echo    sumcolumn("pay_dpf" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>

                                     <?php }if($dataval[0]['pay_cate_dpf_adv'] == 1){  ?>
                                    <th width='25%'><?php echo   sumcolumn("pay_dpf_adv" ,$this->uri->segment("3"),$this->uri->segment("4"))['val']  ?></th>
                                     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>
                                    <th width="10%"><?php echo   sumcolumn("pay_gias" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>
                                    <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>
                                    <th width='25%'><?php echo sumcolumn("pay_defined_contribution" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>
                                 
                                        <?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
                            <th width='25%'><?php echo  sumcolumn("pay_house_loan" ,$this->uri->segment("3"),$this->uri->segment("4"))['val']?></th>

                            <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>


                                    <th width='25%'><?php echo sumcolumn("pay_car_loan" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>

                                        <?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>
                                <th width='25%'><?php echo sumcolumn("pay_house_rent" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>

                             <?php }if($dataval[0]['pay_cate_garain_adv'] == 1){  ?>
                                
                                     <th width='25%'><?php echo sumcolumn("pay_grain_adv" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>
                                
                                
                                     <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

                                   <th width="15%"><?php echo  sumcolumn("pay_fuel_charge" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>

                                         <?php }if($dataval[0]['pay_cate_festival_adv'] == 1){  ?>

                            <th width='25%'><?php echo  sumcolumn("pay_festival_adv" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>


                                      <?php }if($dataval[0]['pay_cate_professional_tax'] == 1){  ?>

                                    <th width='5%'><?php echo sumcolumn("pay_professional_tax" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>

                                      <?php }if($dataval[0]['pay_cate_income_tax'] == 1){  ?>

                                <th width="10%"><?php echo  sumcolumn("pay_income_tax" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>

                            
                                  <?php }if($dataval[0]['pay_cate_other_adv'] == 1){  ?>

                                    <th width='25%'><?php echo sumcolumn("pay_other_adv" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>

                                    <?php } ?>
                                   <th width="15%"><?php echo sumcolumn("pay_total_cut" ,$this->uri->segment("3"),$this->uri->segment("4"))['val'] ?></th>
                                   <th width="15%"><?php echo sumcolumn("pay_total" ,$this->uri->segment("3"),$this->uri->segment("4"))['val']  ?></th>
                              <th width="15%"></th>
                             

                                </tr>
</table>

  <input  type="button" onclick="window.print();" style="background-color: #052B02;border: solid 1px #36730F;margin: 10px auto;
    color: #ffffff;
    padding: 10px;" name="Submit" class="no-print"  value="print" /> <input style="background-color: #052B02;border: solid 1px #36730F;margin: 10px auto;
    color: #ffffff;
    padding: 10px;" class="no-print"  type="button" onclick="window.history.back();" name="Submit" value="Go Back" >

  <?php }else{ ?>
  <div class="error" style="    text-align: center;
    background-color: rgba(244, 67, 54, 0.45);
    font-size: 36px;
    border: 1px solid red;
    width: 100%;">No result Found</div>
  <?php }?>
 <style type="text/css" media="print">
  
  @page { size: landscape; }

  @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
    .printdrak {
      background-color: #000000;
    }


}
input{    width: 54px;}
</style><script type="text/javascript">
function efitfrom(id)
{

  $(".username1"+id).show();
  $(".username"+id).hide();
}
function onsumitsalary(id)
{
   var r = confirm("कृपया सुनिश्चित करें कि डेटा सही है अथवा नहीं");
    if (r == true) {
        document.getElementById("emp"+id).submit();


    } else {
        txt = "You pressed Cancel!";
    }
  //alert(txt);

}

</script>