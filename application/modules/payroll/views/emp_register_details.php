<style>

table, th, td {
    border: 1px solid #E2DFDF;
    /* padding: 6px 5px 7px 7px; */
}
table, th, td {
    border: 1px solid #E2DFDF;
    /* padding: 6px 5px 7px 7px; */
}</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $title; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php echo $title; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
               
                   
                    <div class="box-body ">
                         <table  cellpadding="0" cellspacing="0"  border="0">
 <?php  $in = 0;  foreach ($pay_regi as $key => $pay) { $in = $in +1 ; if($in == 1){
  ?> <tr>
      <th colspan="26" ><table cellpadding="0" cellspacing="0"  border="0" width="100%" border="1">
          <tr>
            <td >Name :</td>
            <td><?php echo $pay->emp_full_name_hi; ?></td>
            <td >Unique ID</td>
            <td ><?php echo  $pay->emp_unique_id;?></td>
            <td >Year </td>
            <td >2016 - 2017</td>
          </tr>
            </table></th>
    </tr>
<?php }} ?>

                            
                                <tr style="font-size:12px">
                                    
                                   
                                   <th ><?php  echo " एरीयर्स / वेतन "; ?></th>
                                    <th ><?php echo $this->lang->line('emp_pay_month'); ?></th>
                           <?php if($dataval[0]['pay_cate_basic'] == 1){  ?>
                            <th ><?php  echo $this->lang->line('basic_pay');  ?></th>
                                 <?php }if($dataval[0]['pay_cate_grp'] == 1){  ?>
                                    <th ><?php echo  $this->lang->line('pay_gradepay');  ?></th>
                              <?php }if($dataval[0]['pay_cate_special'] == 1){  ?>
                                    <th ><?php echo  $this->lang->line('pay_special');   ?></th>
                                    <?php }if($dataval[0]['pay_cate_da'] == 1){  ?>
                                   <th ><?php  echo  $this->lang->line('pay_da');?></th>
                                   <?php }if($dataval[0]['pay_cate_other_add'] == 1){  ?>
                                    <th ><?php echo $this->lang->line('pay_others'); ?></th>
                                              <?php }if($dataval[0]['pay_cate_sa'] == 1){  ?>
                                    <th ><?php echo $this->lang->line('pay_sa');  ?></th>
                                     <?php }if($dataval[0]['pay_cate_madical'] == 1){  ?>
                                    <th ><?php echo  $this->lang->line('pay_ma'); ?></th>

                                     <?php }if($dataval[0]['pay_cate_sp'] == 1){  ?>
                                     <th ><?php echo $this->lang->line('pay_sp'); ?></th>

                                           <?php }if($dataval[0]['pay_cate_ca'] == 1){  ?>
                                    <th ><?php echo $this->lang->line('pay_ca');?></th>
                                  
                                    <?php } ?>
                            <th ><?php echo $this->lang->line('pay_sum'); ?></th>
                             <?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                                    <th ><?php echo  $this->lang->line('pay_gpf'); ?></th>
                                    <?php }if($dataval[0]['pay_cate_gpf_adv'] == 1){  ?>
                                   <th ><?php  echo $this->lang->line('pay_gpf_adv');  ?> </th>
                                   <?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
                                    <th ><?php  echo $this->lang->line('pay_dpf'); ?></th>

                                     <?php }if($dataval[0]['pay_cate_dpf_adv'] == 1){  ?>
                                    <th ><?php echo $this->lang->line('pay_dpf_adv');   ?></th>
                                     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>
                                    <th ><?php  echo $this->lang->line('pay_gis');?></th>
                                    <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>
                                    <th ><?php echo $this->lang->line('pay_define')."dsf"; ?></th>
                                 
                                        <?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
                            <th ><?php echo $this->lang->line('pay_home_loan');?></th>

                            <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>


                                    <th ><?php echo $this->lang->line('pay_car_loan');?></th>

                                        <?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>
                                <th ><?php echo $this->lang->line('pay_house_rent'); ?></th>

                             <?php }if($dataval[0]['pay_cate_garain_adv'] == 1){  ?>
                                
                                     <th ><?php echo $this->lang->line('pay_grain_adv'); ?></th>
                                
                                
                                     <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

                                   <th ><?php echo $this->lang->line('pay_fule_charge'); ?></th>

                                         <?php }if($dataval[0]['pay_cate_festival_adv'] == 1){  ?>

                            <th ><?php echo $this->lang->line('pay_festival_adv');  ?></th>


                                      <?php }if($dataval[0]['pay_cate_professional_tax'] == 1){  ?>

                                    <th ><?php echo $this->lang->line('pay_professional_tax'); ?></th>

                                      <?php }if($dataval[0]['pay_cate_income_tax'] == 1){  ?>

                                <th ><?php echo  $this->lang->line('pay_income_tax'); ?></th>

                            
                                  <?php }if($dataval[0]['pay_cate_other_adv'] == 1){  ?>

                                    <th ><?php echo  $this->lang->line('pay_other_adv'); ?></th>

                                    <?php } ?>
                                   <th ><?php echo $this->lang->line('pay_total_cut'); ?></th>
                                   <th ><?php echo $this->lang->line('pay_amount');  ?></th>

									<th ><?php echo "कम्यूटर बिल नंबर "  ?></th>
                                
                                             <th ><?php echo   "कम्यूटर बिल दिनांक" ?></th>
                               
                 <th ><?php echo  "कम्यूटर ऑफिस नंबर" ?></th>
                                
                                             <th ><?php echo "वॉचर बिल नंबर " 
											 ?></th>
                               <th ><?php echo "वॉचर बबिल दिनांक"   ?></th>
							   
							   <th ><?php echo "ग्रॉस अमाउंट  "  ?></th>
                                    <th ><?php echo "नेट अमाउंट  "  ?></th>
                                </tr>
                            
                            <tbody>
                            <?php  $k = 0;
                              // pre($pay_regi);
                               
                                foreach ($pay_regi as $key => $pay) { $k++; 
                                   // 
                                    if($k==1){ //echo pre($key);
                                 //   $keyval = getsum('ft_pay_register' , '`pay_emp_unique_id` ='.$pay->emp_unique_id,$key);
                                   
                                     }?>
								    <tr>
                                  
                                    
                                   <th ><?php if($pay->pay_arriyas == 1 ){ echo "एरीयर्स" ;}else{ echo "वेतन" ;} ?></th>
								   
                                     <th ><?php if($pay->pay_arriyas == 1 ){ echo $pay->pay_start_month ." - ".$pay->pay_end_month."<br/>(".$pay->pay_arriyas_year.")";  }else{ echo $pay->pay_month; } ?></th>
                                        <?php if($dataval[0]['pay_cate_basic'] == 1){  ?>
                            <th ><?php echo $pay->pay_basic;  ?></th>
                                 <?php }if($dataval[0]['pay_cate_grp'] == 1){  ?>
                                    <th ><?php echo  $pay->pay_grp;  ?></th>
                              <?php }if($dataval[0]['pay_cate_special'] == 1){  ?>
                                    <th ><?php echo $pay->pay_special;   ?></th>
                                    <?php }if($dataval[0]['pay_cate_da'] == 1){  ?>
                                   <th ><?php  echo  $pay->pay_da;  ?></th>
                                   <?php }if($dataval[0]['pay_cate_other_add'] == 1){  ?>
                                    <th ><?php echo $pay->pay_others ?></th>
                                              <?php }if($dataval[0]['pay_cate_sa'] == 1){  ?>
                                    <th ><?php echo $pay->pay_sa;  ?></th>
                                     <?php }if($dataval[0]['pay_cate_madical'] == 1){  ?>
                                    <th ><?php echo $pay->pay_madical; ?></th>

                                     <?php }if($dataval[0]['pay_cate_sp'] == 1){  ?>
                                     <th ><?php echo $pay->pay_sp; ?></th>

                                           <?php }if($dataval[0]['pay_cate_ca'] == 1){  ?>
                                    <th ><?php echo $pay->pay_ca ?></th>
                                  
                                    <?php } ?>
                            <th ><?php echo $pay->pay_total_sum; ?></th>
                             <?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                                    <th ><?php echo $pay->pay_gpf; ?></th>
                                    <?php }if($dataval[0]['pay_cate_gpf_adv'] == 1){  ?>
                                   <th ><?php echo  $pay->pay_gpf_adv; ?> </th>
                                   <?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
                                    <th ><?php echo   $pay->pay_dpf ?></th>

                                     <?php }if($dataval[0]['pay_cate_dpf_adv'] == 1){  ?>
                                    <th ><?php echo   $pay->pay_dpf_adv ?></th>
                                     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>
                                    <th ><?php echo   $pay->pay_gias ?></th>
                                    <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>
                                    <th ><?php echo $pay->pay_defined_contribution ?></th>
                                 
                                        <?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
                            <th ><?php echo $pay->pay_house_loan ?></th>

                            <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>


                                    <th ><?php echo $pay->pay_car_loan ?></th>

                                        <?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>
                                <th ><?php echo $pay->pay_house_rent ?></th>

                             <?php }if($dataval[0]['pay_cate_garain_adv'] == 1){  ?>
                                
                                     <th ><?php echo $pay->pay_grain_adv ?></th>
                                
                                
                                     <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

                                   <th ><?php echo $pay->pay_fuel_charge; ?></th>

                                         <?php }if($dataval[0]['pay_cate_festival_adv'] == 1){  ?>

                            <th ><?php echo $pay->pay_festival_adv; ?></th>


                                      <?php }if($dataval[0]['pay_cate_professional_tax'] == 1){  ?>

                                    <th ><?php echo $pay->pay_professional_tax; ?></th>

                                      <?php }if($dataval[0]['pay_cate_income_tax'] == 1){  ?>

                                <th ><?php echo $pay->pay_income_tax ?></th>

                            
                                  <?php }if($dataval[0]['pay_cate_other_adv'] == 1){  ?>

                                    <th ><?php echo $pay->pay_other_adv ?></th>

                                    <?php } ?>
                                   <th ><?php echo $pay->pay_other_adv; ?></th>
                                   <th ><?php echo $pay->pay_total; ?></th>
								   <?php $vv =getbillno(); foreach($vv as $bb){
								   if($bb->pbill_type == 0 && $bb->pbill_month == $pay->pay_month && $bb->pbill_cate_id == $pay->pay_salary_cate_id && $bb->pbill_year == $pay->pay_year ){ ?>
                                           <th ><?php echo $bb->pbill_computer_no  ?></th>
                                
                                             <th ><?php echo   $bb->pbill_computer_date ?></th>
                               
                 <th ><?php echo $bb->pbill_office_no ?></th>
                                
                                             <th ><?php echo $bb->pbill_vocher_no ?></th>
                               <th ><?php echo $bb->pbill_vocher_date ?></th>
							   
							       <th ><?php echo $bb->pbill_gross_amount ?></th>
							   
							       <th ><?php echo $bb->pbill_net_amont ?></th>
							   
							   
							   
                                <?php  }elseif($bb->pbill_type == 1 && $bb->pbill_month == $pay->pay_month && $bb->pbill_emp_code == $pay->pay_emp_unique_id && $bb->pbill_year == $pay->pay_year ){?>
								
								
								       <th ><?php echo $bb->pbill_computer_no  ?></th>
                                
                                             <th ><?php echo   $bb->pbill_computer_date ?></th>
                               
                 <th ><?php echo $bb->pbill_office_no ?></th>
                                
                                             <th ><?php echo $bb->pbill_vocher_no ?></th>
                               <th ><?php echo $bb->pbill_vocher_date ?></th>
							   
							       <th ><?php echo $bb->pbill_gross_amount ?></th>
							   
							       <th ><?php echo $bb->pbill_net_amont ?></th>
							   
								
								<?php }} ?>
                                </tr>
<?php  } ?>
                                 <?php// $emp_id == $dataval[0]['pay_cate_id'] ;?>
                                              <tr style="background-color: #18981D; color: #fff;font-size: 14px;font-weight: bold;">
                                  
                              
                                  <th ></th>
                                     <th >Total  </th>
                                        <?php if($dataval[0]['pay_cate_basic'] == 1){  ?>
                            <th ><?php echo sumcolumn_one_emp("pay_basic" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'] ;  ?></th>
                                 <?php }if($dataval[0]['pay_cate_grp'] == 1){  ?>
                                    <th ><?php echo  @sumcolumn_one_emp("pay_grp" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>
                              <?php }if($dataval[0]['pay_cate_special'] == 1){  ?>
                                    <th ><?php echo  @sumcolumn_one_emp("pay_special" ,$dataval[0]['pay_cate_id'], $_GET["uid"])['val'];   ?></th>
                                    <?php }if($dataval[0]['pay_cate_da'] == 1){  ?>
                                   <th ><?php  echo  @sumcolumn_one_emp("pay_da" ,$dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>
                                   <?php }if($dataval[0]['pay_cate_other_add'] == 1){  ?>
                                    <th ><?php echo  @sumcolumn_one_emp("pay_others" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>
                                              <?php }if($dataval[0]['pay_cate_sa'] == 1){  ?>
                                    <th ><?php echo sumcolumn_one_emp("pay_sa" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];   ?></th>
                                     <?php }if($dataval[0]['pay_cate_madical'] == 1){  ?>
                                    <th ><?php echo sumcolumn_one_emp("pay_madical" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];   ?></th>

                                     <?php }if($dataval[0]['pay_cate_sp'] == 1){  ?>
                                     <th ><?php echo @sumcolumn_one_emp("pay_sp" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val']; ?></th>

                                           <?php }if($dataval[0]['pay_cate_ca'] == 1){  ?>
                                    <th ><?php echo @sumcolumn_one_emp("pay_ca" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val']; ?></th>
                                  
                                    <?php } ?>
                            <th ><?php echo @sumcolumn_one_emp("pay_total_sum" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>
                             <?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                                    <th ><?php echo  @sumcolumn_one_emp("pay_gpf" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>
                                    <?php }if($dataval[0]['pay_cate_gpf_adv'] == 1){  ?>
                                   <th ><?php echo  @sumcolumn_one_emp("pay_gpf_adv" ,$dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?> </th>
                                   <?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
                                    <th ><?php echo    sumcolumn_one_emp("pay_dpf" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val']; ?></th>

                                     <?php }if($dataval[0]['pay_cate_dpf_adv'] == 1){  ?>
                                    <th ><?php echo   sumcolumn_one_emp("pay_dpf_adv" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];   ?></th>
                                     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>
                                    <th ><?php echo   sumcolumn_one_emp("pay_gias" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>
                                    <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>
                                    <th ><?php echo sumcolumn_one_emp("pay_defined_contribution" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>
                                 
                                        <?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
                            <th ><?php echo  sumcolumn_one_emp("pay_house_loan" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val']; ?></th>

                            <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>


                                    <th ><?php echo sumcolumn_one_emp("pay_car_loan" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>

                                        <?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>
                                <th ><?php echo sumcolumn_one_emp("pay_house_rent" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>

                             <?php }if($dataval[0]['pay_cate_garain_adv'] == 1){  ?>
                                
                                     <th ><?php echo sumcolumn_one_emp("pay_grain_adv" ,$dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>
                                
                                
                                     <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

                                   <th ><?php echo  sumcolumn_one_emp("pay_fuel_charge" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'];  ?></th>

                                         <?php }if($dataval[0]['pay_cate_festival_adv'] == 1){  ?>

                            <th ><?php echo  sumcolumn_one_emp("pay_festival_adv" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'] ?></th>


                                      <?php }if($dataval[0]['pay_cate_professional_tax'] == 1){  ?>

                                    <th ><?php echo sumcolumn_one_emp("pay_professional_tax" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'] ?></th>

                                      <?php }if($dataval[0]['pay_cate_income_tax'] == 1){  ?>

                                <th ><?php echo  sumcolumn_one_emp("pay_income_tax" ,$dataval[0]['pay_cate_id'], $_GET["uid"])['val'] ?></th>

                            
                                  <?php }if($dataval[0]['pay_cate_other_adv'] == 1){  ?>

                                    <th ><?php echo sumcolumn_one_emp("pay_other_adv" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val'] ?></th>

                                    <?php } ?>
                                   <th ><?php echo sumcolumn_one_emp("pay_total_cut" , $dataval[0]['pay_cate_id'] , $_GET["uid"])['val']?></th>
                                   <th ><?php echo sumcolumn_one_emp("pay_total" , $dataval[0]['pay_cate_id'], $_GET["uid"])['val']  ?></th>
                                             <th ></th>
                                
                                             <th ></th>
                               
                 <th ></th>
                                
                                             <th ></th>
                               <th </th>
							   
							   <th ></th>
                                    <th ></th> 
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->

<!-- Modal approve -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">अवकाश स्वीकृत करें</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>leave/leave_approve/approve" accept-charset="UTF-8" role="form" class="form-signin" method="post" id="aer">
                    <div class="modal-body">
					<h3>बचे हुए अवकाश</h3>
					<div class="user_leave_details"></div>
						<input type="hidden" name="leaveID" id="leaveID" class="leaveID" value="">
                        <label>अवकाश स्वीकृति का कारण</label>
                        <textarea name="approve_reson" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">रद्द</button>
                        <button type="submit" class="btn btn-primary" name="btnapprove">जमा करें</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- Modal deny-->
<div class="modal fade" id="denyModal" tabindex="-1" role="dialog" aria-labelledby="denyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('pay_slip')?></h4>
            </div>
            <div class="modal-body">
                <form action="" >
                    <div class="modal-body">
					<h3><?php ?></h3>
						<div class="user_leave_details"></div>
                        <input type="hidden" name="leaveID" id="leaveID" class="leaveID" value="">
                        <label>अवकाश अस्वीकृति का कारण</label>
                        <textarea name="deny_reson" class="form-control" required=""></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">रद्द</button>
                        <button type="submit" class="btn btn-primary" name="btndeny">जमा करे</button>
                    </div>
                </form>
            </div>      
        </div>
    </div>
</div>
<script type="text/javascript">
    function is_delete() {
        var res = confirm('<?php echo $this->lang->line("delete_confirm_message"); ?>');
        if (res === false) {
            return false;
        }
    }



</script>
