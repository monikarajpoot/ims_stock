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
                    	<?php foreach($pay_salary  as $sal_Cate){?>
               <div class="col-xs-3">
    <a target="_blank" href="<?php echo base_url(); ?>payroll/empcate/<?php echo $sal_Cate->pay_cate_id; ?>"  class="btn btn-block btn-info" ><?php echo $this->lang->line('view_on_excel'); ?> <?php echo $sal_Cate->pay_cate_name; ?></a><br/>
    </div>
    <?php }?>
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->

<!-- Modal approve -->
