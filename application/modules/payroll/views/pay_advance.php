  <ul class="nav nav-tabs">
    <?php foreach ($adv as $key => $value) {
      # code...
   ?>
  <li><a data-toggle="tab" href="#<?php echo $value->adv_id ?>"><?php echo $value->adv_name_hi ?></a></li>  
  <?php }?>
  </ul>
<div class="tab-content">
  <?php foreach ($adv as $key => $value) {
      # code...
 $emiamount = $value->adv_amount / $value->adv_no_installment ;
   $inamount = ($value->adv_amount / $value->adv_no_installment  * $value->adv_intrest)/100 ;
   ?>  <div id="<?php echo $value->adv_id ?>" class="tab-pane fade in "><h3><?php echo $value->adv_name_hi ?></h3>

<div class="form-group">
  <div class='input-group date' id='datetimepicker1'>
       <label for="file_type"></label> <?php echo $this->lang->line("starting_month"); ?> <span class="text-danger">*</span></label>
                 
                    <input type='text' name="starting_month_<?php echo $value->adv_id ?>" id="starting_month_<?php echo $value->adv_id ?>" placeholder="<?php echo $this->lang->line('starting_month'); ?>"  class="form-control date1" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
        
     
            </div>
             <div class="form-group">
                <label for="file_type"></label> <?php echo $this->lang->line("intrest_amount"); ?>  <span class="text-danger">*</span></label>
                          <input type="text" name="intrest_amount_<?php echo $value->adv_id ?>" id="intrest_amount_<?php echo $value->adv_id ?>" placeholder="<?php echo $this->lang->line('intrest_amount'); ?>"  value="<?php  echo $inamount?>" class="form-control">
     
            </div>
            <div class="form-group">
                <label for="file_type"></label>  <?php echo $this->lang->line("advance_amount"); ?><span class="text-danger">*</span></label>
                          <input type="text" name="advance_amount_<?php echo $value->adv_id ?>" id="advance_amount_<?php echo $value->adv_id ?>" placeholder="<?php echo $this->lang->line('advance_amount'); ?>"  value="<?php echo $value->adv_amount; ?>" class="form-control">
     
            </div>
               <div class="form-group">
                <label for="file_type"></label> <?php echo $this->lang->line("advance_inetrest"); ?> <span class="text-danger">*</span></label>
                          <input type="text" name="advance_inetrest_<?php echo $value->adv_id ?>" id="advance_inetrest_<?php echo $value->adv_id ?>" placeholder="<?php echo $this->lang->line('advance_inetrest'); ?>"  value="<?php echo $value->adv_intrest; ?>" class="form-control">
     
            </div>
             <div class="form-group">
                <label for="file_type"></label><?php echo $this->lang->line("instalment_amount"); ?> <span class="text-danger">*</span></label>
                          <input type="text" name="instalment_amount_<?php echo $value->adv_id ?>" id="instalment_amount_<?php echo $value->adv_id ?>" placeholder="<?php echo $this->lang->line('instalment_amount'); ?>"  value="<?php echo $emiamount; ?>" class="form-control">
     
            </div>
               <div class="form-group">
                <label for="file_type"></label> <?php echo $this->lang->line("advnce_instsallment_number"); ?>  <span class="text-danger">*</span></label>
                          <input type="text" name="pay_income_tax_<?php echo $value->adv_id ?>" id="pay_income_tax_<?php echo $value->adv_id ?>" placeholder="<?php echo $this->lang->line('advnce_instsallment_number'); ?>"  value="<?php echo $value->adv_no_installment; ?>" class="form-control">
     
            </div>
             <div class="form-group">
                <label for="file_type"></label> <?php echo $this->lang->line("advnce_current_instsallment_number"); ?> <span class="text-danger">*</span></label>
                          <input type="text" name="advnce_current_instsallment_number_<?php echo $value->adv_id ?>" id="advnce_current_instsallment_number_<?php echo $value->adv_id ?>" placeholder="<?php echo $this->lang->line('advnce_current_instsallment_number'); ?>"  value="" class="form-control">
     
            </div>
             <div class="form-group">
                <label for="file_type"></label> <?php echo $this->lang->line("advnce_rmaining_instsallment_number"); ?> <span class="text-danger">*</span></label>
                          <input type="text" name="advnce_rmaining_instsallment_numbers_<?php echo $value->adv_id ?>" id="advnce_rmaining_instsallment_number_<?php echo $value->adv_id ?>" placeholder="<?php echo $this->lang->line('advnce_rmaining_instsallment_number'); ?>"  value="" class="form-control">
     
            </div>
             <div class="form-group">
                <label for="file_type"></label> <?php echo $this->lang->line("advnce_remaing_amount"); ?>  <span class="text-danger">*</span></label>
                          <input type="text" name="advnce_remaing_amount_<?php echo $value->adv_id ?>" id="advnce_remaing_amount_<?php echo $value->adv_id ?>" placeholder="<?php echo $this->lang->line('advnce_remaing_amount'); ?>"  value="" class="form-control">
     
            </div>
            
 </div>
<?php } ?>