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
               
     <?php if($dataval[0]['pay_cate_gpf'] == 1){  ?>
                            <div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_gpf/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_gpf');?></a><br/>
    </div>    
<?php }if($dataval[0]['pay_cate_dpf'] == 1){  ?>
<div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_dpf/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_gpf_adv');?></a><br/>
    </div> 

     


     <?php }if($dataval[0]['pay_cate_gias'] == 1){  ?>

        <div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_gias/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_gis');?></a><br/>


    </div>


       <?php }if($dataval[0]['pay_cate_defined_contribution'] == 1){  ?>


        <div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_defined_contribution/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_define');?></a><br/>
    </div>
<?php }if($dataval[0]['pay_cate_house_loan'] == 1){  ?>
   <div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_house_loan/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_home_loan');?></a><br/>
    </div>

      <?php }if($dataval[0]['pay_cate_car_loan'] == 1){  ?>

<div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_car_loan/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_car_loan');?></a><br/>
    </div>

<?php }if($dataval[0]['pay_cate_house_rent'] == 1){  ?>

<div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_house_rent/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_house_rent');?></a><br/>
    </div>

    <?php }if($dataval[0]['pay_cate_fuel_charge'] == 1){  ?>

    <div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_fuel_charge/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_fule_charge');?></a><br/>
    </div>
<?php } ?>
 <div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_festival_adv/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>" class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_festival_adv');?></a><br/>


    </div>

 <div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_grain_adv/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_grain_adv');?></a><br/>


    </div>//
     <div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_professional_tax/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_professional_tax');?></a><br/>

    
    </div>


     <div class="col-xs-2">
    <a   href="<?php echo base_url(); ?>payroll/paydd/pay_income_tax/<?php echo $this->uri->segment(3) ;?>/<?php echo $this->uri->segment(4); ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('pay_income_tax');?></a><br/>

    
    </div>
     </div>
             </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->

<!-- Modal approve -->

<script type="text/javascript">
$('select').on('change', function() {
  alert( this.value ); // or $(this).val()
  $("#1").attr("href", "<?php echo base_url(); ?>payroll/empcate/1/"+this.value);
  $("#2").attr("href", "<?php echo base_url(); ?>payroll/empcate/2/"+this.value);
  $("#3").attr("href", "<?php echo base_url(); ?>payroll/empcate/3/"+this.value);
  $("#4").attr("href", "<?php echo base_url(); ?>payroll/empcate/4/"+this.value);
});

</script>