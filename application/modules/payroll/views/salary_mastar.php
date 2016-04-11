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
                <form action="<?php echo base_url(); ?>leave/leave_approve/bulkAction" method="post" >
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $title_tab; ?></h3>                 
                    </div>
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('bulk_action'); ?> </label>
                            </div>
                          
                          <div class="col-xs-12 ">
                             <a href="<?php echo base_url();?>payroll/addcate/" >
                                                <button type="button" class="btn  btn-primary"><?php echo $this->lang->line('add_new'); ?></button></a>
                            </div> 
                        </div>
                    </div>
                    <div class="box-body">
                        <?php echo $this->session->flashdata('message'); ?>
                        <table id="leave_tbl" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width='5%'><?php echo $this->lang->line('salary_head_name')  ?></th>
                                    <th width="5%"><?php echo $this->lang->line('pay'); ?></th>
                                    <th width='5%'><?php echo $this->lang->line('pay_da'); ?></th>
                                      <th width='5%'><?php echo $this->lang->line('pay_gradepay'); ?></th>
                                    <th width='5%'><?php echo $this->lang->line('pay_hra'); ?></th>
                                    <th width='5%'><?php echo $this->lang->line('pay_special'); ?></th>
                                    <th width='5%'><?php echo $this->lang->line('pay_sa'); ?></th>
                                     <th width='5%'><?php echo $this->lang->line('pay_sp'); ?></th>
                                      <th width='5%'><?php echo $this->lang->line('pay_ca'); ?></th>
                                    <th width='5%'><?php echo $this->lang->line('pay_ma'); ?></th>
                                    <th width='5%'><?php echo $this->lang->line('pay_gpf'); ?></th>
                                    <th width='5%'><?php echo $this->lang->line('pay_gpf_adv'); ?></th>
                                    <th width='10%'><?php echo $this->lang->line('pay_dpf'); ?></th>
                                    <th width='10%'><?php echo $this->lang->line('pay_dpf_adv'); ?></th>
                                    <th width='10%'><?php echo $this->lang->line('pay_gis'); ?></th>
                               

                                   <th width="15%"><?php echo $this->lang->line('view'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  $i = 1;
                              // pre($pay_salary);
                                foreach ($pay_salary as $key => $salary) { ?>
									<tr>
                                    <th width='5%5%'><?php echo $salary->pay_cate_name  ?></th>
                                    <th width="5%"><?php if($salary->pay_cate_basic == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                     <th width='5%'><?php if($salary->pay_cate_da == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                         <th width='5%'><?php if($salary->pay_cate_grp == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                    <th width='5%'><?php if($salary->pay_cate_hra == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                    <th width='5%'><?php if($salary->pay_cate_special == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                    <th width='5%'><?php if($salary->pay_cate_sa == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                     <th width='5%'><?php if($salary->pay_cate_sp == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                      <th width='5%'><?php if($salary->pay_cate_ca == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                    <th width='5%'><?php if($salary->pay_cate_madical == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                    <th width='5%'><?php if($salary->pay_cate_gpf == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                    <th width='5%'><?php if($salary->pay_cate_gpf_adv == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                    <th width='10%'><?php if($salary->pay_cate_dpf == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                    <th width='10%'><?php if($salary->pay_cate_dpf_adv == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                    <th width='10%'><?php if($salary->pay_cate_gias == 1){?>  <button type="button" class="btn btn-success" name="btndeny" data-empid="">Yes</button> <?php  }else{ ?><button type="button" class="btn btn-danger" name="btndeny" data-empid="">NO</button><?php } ?></th>
                                   
                                    <th width='10%'> <a href="<?php echo base_url();?>payroll/getcate/<?php echo $salary->pay_cate_id ?>" >
                                              <button type="button" class="btn btn-primary" name="btndeny" ><?php echo $this->lang->line('view') ?></button>
                                               <a/></th>
                                   
                                    
                                    

                                    </tr>

                                <?php  $i++; } ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </form>
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
                <h4 class="modal-title" id="myModalLabel">अवकाश अस्वीकृत  करें</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>leave/leave_approve/deny" accept-charset="UTF-8" role="form" class="form-signin" method="post" id="aer">
                    <div class="modal-body">
					<h3>बचे हुए अवकाश</h3>
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
