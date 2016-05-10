
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php //echo $title; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php //echo $title; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h1 ><?php echo $emp_details[0]->emp_full_name;    ?></h1>
                </div>
                <div class="box-body">
                    <?php //$this->load->view('payroll_header') ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

               <div class="box-body">
               	  <form action="<?php echo base_url();?>payroll/add_slary_emp" method="post">
               	  
		

<table border="1" style="background-color:FFFFCC;border-collapse:collapse;border:1px solid FFCC00;color:000000;width:100%" cellpadding="3" cellspacing="3">

                                <tr>
                                    
                                    <th width='5%'><?php echo $this->lang->line('sno')  ?></th>
                                    <th width='25%'><?php echo $this->lang->line('emp_unique_code')  ?></th>
                                    <th width="10%"><?php echo $this->lang->line('emp_name'); ?></th>
                                    <th width="10%"><?php echo $this->lang->line('emp_pay_year'); ?></th>
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
                                    <th width='25%'><?php echo $pay->pay_emp_unique_id;  ?></th>
                                    <th width="10%"><?php echo $pay->emp_full_name_hi; ?></th>
                                    <th width="10%"><?php echo $pay->pay_year; ?></th>
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
      <div class="box-footer">
          <button class="btn btn-primary" type="submit" name="savenotice" id="savenotice"  value="1"><?php echo $this->lang->line('submit_botton'); ?></button>
        </div>
  
                                  </div>   
                                   </th>

                                </tr>
                              </form>
                              <?php } ?>

</table>
             

             </div> </div><!-- /.box --></div>
        </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->

<!-- Modal approve -->
<script type="text/javascript">
function totalvalue()
{
pay_basic = $("#pay_basic").val();

pay_others = $("#pay_others").val();
 
 
 <?php if($dataval[0]['pay_cate_grp'] == 1){ ?>
  
 pay_grp = $("#pay_gradepay").val();
 <?php }else{ ?>
     var  pay_grp = 0
     <?php } ?>

<?php if($dataval[0]['pay_cate_madical'] == 1){ ?>
  
 pay_ma = $("#pay_madical").val();
 <?php }else{ ?>
     var  pay_ma = 0
     <?php } ?>


     <?php if($dataval[0]['pay_cate_sp'] == 1){ ?>
  
pay_sp = $("#pay_sp").val();
 <?php }else{ ?>
     var  pay_sp = 0
     <?php } ?>
      <?php if($dataval[0]['pay_cate_sa'] == 1){ ?>
  pay_sa = $("#pay_sa").val();
 <?php }else{ ?>
     var  pay_sa = 0
     <?php } ?>



        <?php if($dataval[0]['pay_cate_ca'] == 1){ ?>
  pay_ca = $("#pay_ca").val();
 <?php }else{ ?>
     var  pay_ca = 0
     <?php } ?>
          <?php if($dataval[0]['pay_cate_da'] == 1){ ?>
  pay_da = $("#pay_da").val();
 <?php }else{ ?>
     var  pay_da = 0
     <?php } ?>
     <?php if($dataval[0]['pay_cate_hra'] == 1){ ?>
  pay_hra = $("#pay_hra").val();
 <?php }else{ ?>
     var  pay_hra = 0
     <?php } ?>

 
 
    pay_special = $("#pay_special").val();
 // alert(pay_sp);
    pay_didi = $("#pay_total_cut").val();
  var result = parseInt(pay_basic) + parseInt(pay_grp) + 
   parseInt(pay_others) + parseInt(pay_sp)+ 
   parseInt(pay_ca) + parseInt(pay_ma) +  
   parseInt(pay_da) + parseInt(pay_sp)+ parseInt(pay_ma) + parseInt(pay_sa) + parseInt(pay_hra)  
  + parseInt(pay_special)   ;
 //alert(result);

total = parseInt(result) -  parseInt(pay_didi);
   $("#pay_total_sum").val(result);

    $("#pay_total").val(total);
}
function efitfrom(id)
{

  $(".username1"+id).show();
  $(".username"+id).hide();
}
</script>