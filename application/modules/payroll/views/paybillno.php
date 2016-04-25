<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
   <?php echo $title; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title; ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
  
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <!-- small box -->
            <div class="box box-warning">
                <div class="box-header">
                  <!--  <h3>यह आपकी पर्सनल जानकारी है अगर इसमे किसी प्रकार की त्रुटी दिखाई दे तो हमें अवश्य सूचित करे|</h3> -->
                </div>
           <div class="container"><h2><?php echo $title;?></h2>
  
<div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">       
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    <div class="box-tools pull-right">
           
            
                        <a href="javascript:history.go(-1)">
                            <button type="button" class="btn  btn-warning"><?php echo $this->lang->line('Back_button_label'); ?></button>
                        </a>
                    </div>
                </div><!-- /.box-header -->
   <form action="<?php echo base_url(); ?>payroll/pay_bill" method="post" >
        <div class="box-body">
     
     <?php
     
     if(count(@$pay_bill) != 0 ){ 
      foreach ($pay_bill as $key => $pbill) {
       # code...
     ?>
                    <div class="col-md-6">
                    <div class="error"  style="
    background-color: rgba(173, 19, 16, 0.18);
    padding: 5px;
    border: 1px solid red;
">  <?php if(isset($error)){echo $error ;}?></div>
   
                         <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('pay_head'); ?><span class="text-danger">*</span></label>
               <?php $currentmonth = $pbill->pbill_month?>
                  <select name="pay_head" name="pay_head" class="form-control">
                                <option value=""><?php echo $this->lang->line('pay_head'); ?></option>
                                <?php foreach ($pay_cate as $key => $pcate) {
                                  # code...
                                
     
     ?>
                                    <option value="<?php echo $pcate->pay_cate_id ?>" <?php echo  $pbill->pbill_cate_id == $pcate->pay_cate_id   ? 'selected' : ''; ?>  ><?php echo $pcate->pay_cate_name ?></option>
                                <?php } ?>
                            </select> 

                <?php echo form_error('category_title_hin');?>
              </div>

                      <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('emp_pay_month'); ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_month" name="pay_month" class="form-control">
                                <option value=""><?php echo $this->lang->line('emp_pay_month'); ?></option>
                                <?php for ($m=1; $m<=12; $m++) {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
     
     ?>
                                    <option value="<?php echo $month ?>" <?php echo  $currentmonth == $month  ? 'selected' : ''; ?> ><?php echo $month ?></option>
                                <?php } ?>
                            </select> 

                <?php echo form_error('category_title_hin');?>
              </div>
                      <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('emp_pay_year'); ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_year" name="pay_year" class="form-control">
                                <option value=""><?php echo $this->lang->line('emp_pay_year'); ?></option>
                                <?php for ($m=2016; $m >= 2001; $m--) {
   
     
     ?>
                                    <option value="<?php echo $m ?>" <?php echo  $pbill->pbill_year == $m   ? 'selected' : ''; ?>   ><?php echo $m ?></option>
                                <?php } ?>
                            </select> 

               
              </div>

     <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('computer_bill_number'); ?><span class="text-danger">*</span></label>
            
                   <input type="text" name="computer_bill_number" id="computer_bill_number" placeholder="<?php echo $this->lang->line('computer_bill_number'); ?>"  value="<?php echo $pbill->pbill_computer_no  ?>" class="form-control">
              
              </div>
  <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('office_bill_number'); ?><span class="text-danger">*</span></label>
            
                   <input type="text" name="office_bill_number" id="office_bill_number" placeholder="<?php echo $this->lang->line('office_bill_number'); ?>"  value="<?php echo $pbill->pbill_office_no  ?>" class="form-control">
              
              </div>
  <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('vocher_bill_number'); ?><span class="text-danger">*</span></label>
            
                   <input type="text" name="vocher_bill_number" id="vocher_bill_number" placeholder="<?php echo $this->lang->line('vocher_bill_number'); ?>"  value="<?php echo $pbill->pbill_vocher_no  ?>"  class="form-control">
              
              </div>

               <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('vocher_bill_date'); ?><span class="text-danger">*</span></label>
            
                   <input type="text" class="date" name="vocher_bill_date" id="vocher_bill_number" placeholder="<?php echo $this->lang->line('vocher_bill_date'); ?>"  value="<?php echo $pbill->pbill_vocher_date ?>"  class="form-control">
              
              </div>
                    </div><!-- col 6 -->
                    <?php } }else{?>

                     <div class="col-md-6">
               
   
                         <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('pay_head'); ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_head" name="pay_head" class="form-control">
                                <option value=""><?php echo $this->lang->line('pay_head'); ?></option>
                                <?php foreach ($pay_cate as $key => $pcate) {
                                  # code...
                                
     
     ?>
                                    <option value="<?php echo $pcate->pay_cate_id ?>"  ><?php echo $pcate->pay_cate_name ?></option>
                                <?php } ?>
                            </select> 

                <?php echo form_error('category_title_hin');?>
              </div>

                      <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('emp_pay_month'); ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_month" name="pay_month" class="form-control">
                                <option value=""><?php echo $this->lang->line('emp_pay_month'); ?></option>
                                <?php for ($m=1; $m<=12; $m++) {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
     
     ?>
                                    <option value="<?php echo $month ?>" <?php echo  $currentmonth == $month  ? 'selected' : ''; ?> ><?php echo $month ?></option>
                                <?php } ?>
                            </select> 

                <?php echo form_error('category_title_hin');?>
              </div>
                      <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('emp_pay_year'); ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_year" name="pay_year" class="form-control">
                                <option value=""><?php echo $this->lang->line('emp_pay_year'); ?></option>
                                <?php for ($m=2016; $m >= 2001; $m--) {
   
     
     ?>
                                    <option value="<?php echo $m ?>"  ><?php echo $m ?></option>
                                <?php } ?>
                            </select> 

               
              </div>

     <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('computer_bill_number'); ?><span class="text-danger">*</span></label>
            
                   <input type="text" name="computer_bill_number" id="computer_bill_number" placeholder="<?php echo $this->lang->line('computer_bill_number'); ?>"  value="" class="form-control">
              
              </div>
  <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('office_bill_number'); ?><span class="text-danger">*</span></label>
            
                   <input type="text" name="office_bill_number" id="office_bill_number" placeholder="<?php echo $this->lang->line('office_bill_number'); ?>"  value="" class="form-control">
              
              </div>
  <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('vocher_bill_number'); ?><span class="text-danger">*</span></label>
            
                   <input type="text" name="vocher_bill_number" id="vocher_bill_number" placeholder="<?php echo $this->lang->line('vocher_bill_number'); ?>"  value="" class="form-control">
              
              </div>

               <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('vocher_bill_date'); ?><span class="text-danger">*</span></label>
            
                   <input type="text"  name="vocher_bill_date" id="vocher_bill_date" placeholder="<?php echo $this->lang->line('vocher_bill_date'); ?>"  value=""  class="form-control date1">
              
              </div>
                    </div>
                    <?php }  ?>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-primary" type="submit" name="savenotice" id="savenotice" onclick="showdetails()" value="1"><?php echo $this->lang->line('submit_botton'); ?></button>
        </div>
        </form>
        
      </div><!-- /.box -->
    </div><!-- col 12-->
    </div><!-- /.row -->
 
    </div>
</section><!-- /.content -->
