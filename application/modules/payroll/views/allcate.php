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
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title"><?php //echo $title_tab_header;     ?></h3>
                </div>
                <div class="box-body">
                    <?php $this->load->view('payroll_header') ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
            
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $title_tab; ?></h3>                 
                    </div>
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('bulk_action'); ?> </label>
                            </div>
                          
                          
                        </div>
                    </div>
                    <div class="box-body">
					    <div class="box-header with-border">
                        <h3 class="box-title">कृपया  ड्रॉप डाउन मे  कोई भी माह का चयन करें</h3>                 
                    </div>
					
                           <div class="form-group col-xs-2">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('emp_pay_month'); ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_month" name="pay_month" onchage="changemonth()" class="form-control">
                                <option value=""><?php echo $this->lang->line('emp_pay_month'); ?></option>
                                <?php for ($m=1; $m<=12; $m++) {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
     
     ?>
                                    <option value="<?php echo $month ?>" <?php echo  $currentmonth == $month  ? 'selected' : ''; ?> ><?php echo $month ?></option>
                                <?php } ?>
                            </select> 

                <?php echo form_error('category_title_hin');?>
              </div>
                <div class="col-xs-12">    	<?php foreach($pay_salary  as $sal_Cate){?>
               <div class="col-xs-2">
    <a target="_blank" id="<?php echo $sal_Cate->pay_cate_id; ?>" href="<?php echo base_url(); ?>payroll/empcate/<?php echo $sal_Cate->pay_cate_id; ?>/<?php  echo  $currentmonth ?>"  class="btn btn-block btn-info" ><?php echo $sal_Cate->pay_cate_name; ?></a><br/>
    </div>
    <?php }?>
            </div><!-- /.box --></div>
        </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->

<!-- Modal approve -->

<script type="text/javascript">
$('select').on('change', function() {
 // alert( this.value ); // or $(this).val()
  $("#1").attr("href", "<?php echo base_url(); ?>payroll/empcate/1/"+this.value);
  $("#2").attr("href", "<?php echo base_url(); ?>payroll/empcate/2/"+this.value);
  $("#3").attr("href", "<?php echo base_url(); ?>payroll/empcate/3/"+this.value);
  $("#4").attr("href", "<?php echo base_url(); ?>payroll/empcate/4/"+this.value);
  $("#5").attr("href", "<?php echo base_url(); ?>payroll/empcate/5/"+this.value);
  $("#6").attr("href", "<?php echo base_url(); ?>payroll/empcate/6/"+this.value);
  $("#7").attr("href", "<?php echo base_url(); ?>payroll/empcate/7/"+this.value);
  $("#8").attr("href", "<?php echo base_url(); ?>payroll/empcate/8/"+this.value);
    $("#9").attr("href", "<?php echo base_url(); ?>payroll/empcate/9/"+this.value);
});

</script>