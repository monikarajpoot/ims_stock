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
   <form action="<?php echo base_url(); ?>payroll/showdetails" method="<?php echo base_url(); ?>payroll/showdetails" >
        <div class="box-body">
     
                    <div class="col-md-6">
                        <!-- general form elements -->
   
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('emp_unique_code'); ?><span class="text-danger">*</span></label>
                <input type="text" name="emp_unique_codeemp_unique_code" id="emp_unique_code" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="" class="form-control">
                
              </div>
               
               <div class="col-xs-6" id="dis1" >
                                  <div class="form-group">
                <label for="exampleInputEmail1"><?php echo "वेतन महीने से " ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_month" name="pay_month" class="form-control">
                                <option value=""><?php echo "वेतन महीने से " ?></option>
                                <?php for ($m=1; $m<=12; $m++) {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
     
     ?>
                                    <option value="<?php echo $month ?>" <?php echo  $currentmonth == $month  ? 'selected' : ''; ?> ><?php echo $month ?></option>
                                <?php } ?>
                            </select> 
 <select name="pay_year" name="pay_year" class="form-control">
                                <option value=""><?php echo " वेतन साल से"; ?></option>
                                <?php for ($my=2011; $my<=date("Y"); $my++) {
   
     ?>
                                    <option value="<?php echo $my ?>"  ><?php echo $my ?></option>
                                <?php } ?>
                            </select> 

                <?php echo form_error('category_title_hin');?>
              </div>  </div>
              <div id="dis2" >
                                <div class="col-xs-6">
                                       <div class="form-group">
                <label for="exampleInputEmail1"><?php echo "वेतन महीने तक "; ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_month_end" name="pay_month" class="form-control">
                                <option value=""><?php echo "वेतन महीने तक " ?></option>
                                <?php for ($m=1; $m<=12; $m++) {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
     
     ?>
                                    <option value="<?php echo $month ?>" <?php echo  $currentmonth == $month  ? 'selected' : ''; ?> ><?php echo $month ?></option>
                                <?php } ?>
                            </select> 
               <select name="pay_year_end" name="pay_year_end" class="form-control">
                                <option value=""><?php echo " वेतन साल  तक "; ?></option>
                                <?php for ($my=2011; $my<=date("Y"); $my++) {
   
     ?>
                                    <option value="<?php echo $my ?>"  ><?php echo $my ?></option>
                                <?php } ?>
                            </select> 

                <?php echo form_error('category_title_hin');?>
              </div>

              <div id="div1"></div>
                    </div><!-- col 6 -->
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
