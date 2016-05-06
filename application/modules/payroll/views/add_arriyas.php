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

                          <form action="<?php echo base_url();?>payroll/add_arreyas_emp" method="post">
      

      <?php if($dataval[0]['pay_cate_grp'] == 1){  ?>
      
       <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_gradepay");?></label> <span class="text-danger">*</span></label>
                  <input type="text" name="pay_gradepay" id="pay_gradepay" placeholder="<?php echo $this->lang->line('pay_gradepay'); ?>"  value="0" class="form-control">
                 <input type="hidden" name="pay_salary_cate_id" id="pay_salary_cate_id"  value="<?php echo $emp_details[0]->emp_pay_cate_id;  ?>" class="form-control">
                 <input type="hidden" name="emp_unique_id" id="emp_unique_id" value="<?php echo $emp_details[0]->emp_unique_id;  ?>" class="form-control">
               <input type="hidden" name="arriyas_start_month" id="arriyas_start_month"  value="<?php echo $_POST['pay_month'];  ?>" class="form-control">
                 <input type="hidden" name="arriyas_end_month" id="arriyas_end_month"  value="<?php echo $_POST['pay_month_end']; ?>" class="form-control">
                <input type="hidden" name="arriyas_year" id="arriyas_end_month"  value="<?php echo $_POST['pay_year']."-".$_POST['pay_year_end']; ?>" class="form-control">
               
            </div>
   <?php }if($dataval[0]['pay_cate_special'] == 1){ ?>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_special");?></label> <span class="text-danger">*</span></label>
              
               <input type="text" name="pay_special" id="pay_special" placeholder="<?php echo $this->lang->line('pay_special'); ?>"  value="0" class="form-control">
            </div>
            <?php }if($dataval[0]['pay_cate_da'] == 1){ ?>
         <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_da");?></label> <span class="text-danger">*</span></label>


               <input type="text" name="pay_da"  id="pay_da" placeholder="<?php echo $this->lang->line('pay_da'); ?>"  value="0" class="form-control">
               
            </div>
   
      <?php } if($dataval[0]['pay_cate_hra'] == 1){ ?>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_hra");?></label> <span class="text-danger">*</span></label>
      
                        <input type="text" name="pay_hra" id="pay_hra" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="0" class="form-control">
            </div>
      <?php } if($dataval[0]['pay_cate_sa'] == 1){  ?>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_sa");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_sa" id="pay_sa" placeholder="<?php echo $this->lang->line('pay_sa'); ?>"  value="0" class="form-control">
            </div>
    <?php } if($dataval[0]['pay_cate_madical'] == 1){ ?>

            <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_ma");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_madical" id="pay_madical" placeholder=""  value="0" class="form-control">
            </div> 

             <?php } if($dataval[0]['pay_cate_ca'] == 1){ ?>
        <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_ca");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_ca" id="pay_ca" placeholder="<?php echo $this->lang->line("pay_ca");?>"  value="0" class="form-control">
            </div>
      <?php } if($dataval[0]['pay_cate_sp'] == 1){  ?>
        <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_sp");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_sp" id="pay_sp" placeholder="<?php echo $this->lang->line("pay_sp");?>"  value="0" class="form-control">
            </div>
      <?php } ?>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_others");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_others" id="pay_others" placeholder="<?php echo $this->lang->line("pay_others");?>"  value="0" class="form-control">
            </div>

   <div class="box-footer">
          <button class="btn btn-primary" type="submit" name="savenotice" id="savenotice"  value="1"><?php echo $this->lang->line('submit_botton'); ?></button>
        </div>
    </from>
    </div>
</div>
  </div>
    </div>
  </section>