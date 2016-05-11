<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo "Icrement Month of employee"; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php echo "Icrement Month of employee"; ?></li>
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
                    <?php// $this->load->view('payroll_header') ?>
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
                        <h3 class="box-title"><?php echo "Icrement Month of employee"; ?></h3>                 
                    </div>
                    <div class="box-header with-border">
                        <div class="row">
                                  <div class="col-xs-12 ">
                             <a href="<?php echo base_url();?>payroll/add_adv/" >
                                                <button type="button" class="btn  btn-primary"><?php echo $this->lang->line('add_new'); ?></button></a>
                           
                            </div>
                          
                          
                        </div>
                    </div>
                    <div class="box-body">
                      <?php// pre($pay_salary);?>
       
                        <table id="leave_tbl" class="table table-bordered table-striped">
                            <thead>
                                <tr>  <th width='5%'><?php echo $this->lang->line('sno'); ?></th>
                                    <th width='5%'><?php echo "Employee name"  ?></th> 
                  <th width='5%'><?php echo "Icrement Month" ?></th>
                                   
                                    <th width='5%'><?php echo "Action"?></th>
                 
                                   
                               

                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php  $i = 1;
                         //  pre($payall);
                                foreach ($payall as $key => $salary) { ?>
                  <tr>
                                    <th width='5%5%'><?php echo $i; ?></th>
                                    <th width="5%">  <?php echo  $salary->emp_full_name_hi ?></th>
                                    <th width="5%">  <?php  echo $salary->pay_month?></th>
                             
                                   
                                       <th width="5%"> 
 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $salary->pay_id; ?>">edit</button>

                                       </th>
                                  

                                    </tr>

                                <?php  $i++; } ?>
                            </tbody>
                        </table>
   
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->

<!-- Modal approve -->
<!-- Modal -->

<?php     foreach ($payall as $key => $salary) { ?>


<div id="myModal<?php echo $salary->pay_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Icrement Month of <?php echo $salary->emp_full_name; ?> </h4>
      </div>
      <div class="modal-body">
           <form action="<?php echo base_url();?>payroll/add_increment_month" method="post" >
         <div class="form-group">
                <label for="exampleInputEmail1"><?php echo  "Icrement Month of employee" ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_month" name="pay_month" class="form-control">
                                <option value=""><?php echo $this->lang->line('emp_pay_month'); ?></option>
                                <?php for ($m=1; $m<=12; $m++) {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
     
     ?>
                                    <option value="<?php echo $month ?>" <?php echo  $currentmonth == $month  ? 'selected' : ''; ?> ><?php echo $month ?></option>
                                <?php } ?>
                            </select> 

              
              </div>
   <div class="form-group">
               <label for="exampleInputEmail1"><?php echo  "Icrement Type" ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                  <select name="pay_incr_type" name="pay_incr_type" class="form-control">
                              
                               <option value="<?php echo 1 ?>" <?php echo  $salary->pay_incr_type == 1 ? 'selected' : ''; ?> >Fixed Amount</option>
                                    <option value="<?php echo 0 ?>" <?php echo  $salary->pay_incr_type == 0 ? 'selected' : ''; ?>  >Percentage Amount</option>
                             
                            </select> 

              
              </div>
   <div class="form-group">
                   <label for="exampleInputEmail1"><?php echo  "Icrement Amount " ?><span class="text-danger">*</span></label>
               <?php $currentmonth = date('F'); ?>
                   <input type="text" name="pay_incr_amount" id=""  value="<?php echo $salary->pay_incr_amount; ?>" class="form-control">
               

              
              </div>
                   <input type="hidden" name="pay_id" id=""  value="<?php echo $salary->pay_id; ?>" class="form-control">
               
                     <input type="hidden" name="no_update" id=""  value="<?php echo $salary->no_update + 1; ?>" class="form-control">
               
      </div>
   
      <div class="modal-footer">
        
          <button class="btn btn-primary" type="submit" name="savenotice" id="savenotice" onclick="showdetails()" value="1"><?php echo $this->lang->line('submit_botton'); ?></button>
       
        
      </div>
    </form>
    </div>

  </div>
</div>
<?php } ?>