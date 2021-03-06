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
                            <form action="<?php echo base_url();?>payroll/add_deatils" method="post" >
                  <?php  foreach($details_leave as $emp  ){?>
              <div class="form-group">
                <label for="email"><?php echo $this->lang->line('emp_unique_id')  ?>:</label>
                <?php echo $emp->emp_unique_id ?>
              </div>
              <div class="form-group">
                <label for="email"><?php echo $this->lang->line('emp_name')  ?>:</label>
                <?php  echo  $emp->emp_full_name_hi ?>
              </div>


              
              <div class="form-group">
                 <label for="email"><?php echo $this->lang->line('emp_house_no')  ?> :</label>
                <label><input type="text" name="emp_house_no"  value="<?php  echo  $emp->emp_house_no ?>"> 
                <input type="hidden" name="emp_unique_id"  value="<?php  echo  $emp->emp_unique_id ?>"> 
                </label>

              </div>

               <div class="form-group">   <label for="email"><?php echo "हाउस टाइप" ?></label>
             
                  <select name="emp_house_type" id="emp_house_type" >
                                <option value=""><?php echo "हाउस टाइप"; ?></option>
                              <?php foreach ($house_type as $key => $value) {
                  # code...
                ?>
     ?>
                                    <option value="<?php echo $value->ph_type ?>"  ><?php echo $value->ph_type ?></option>
                                <?php } ?>>
           </select>
             
              </div>

               <div class="form-group"><label for="email"><?php echo $this->lang->line('pay_arrdhar_card')  ?>:</label>
                <label><input type="text" name="emp_adhar_card_no"  value="<?php echo $emp->emp_adhar_card_no?>"> </label>
              </div>

               <div class="form-group "><label for="email"><?php echo "पेन कार्ड नंबर "  ?>:</label>
                <label><input type="text" name="emp_pen_no" value="<?php $emp->emp_pen_no?>"></label>
              </div>
<?php }?>
             



              </div>

              <button type="submit" class="btn btn-default">Submit</button>
</form>
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->

<!-- Modal approve -->
