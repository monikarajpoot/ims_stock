           <div class="container">
              <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home1"><?php echo $this->lang->line('tab1_emp_detail')?></a></li>  
  <li ><a data-toggle="tab" href="#home"><?php echo $this->lang->line('tab1_pay_detail_incrment')?></a></li>
    <li><a data-toggle="tab" href="#menu1"><?php echo $this->lang->line('tab2_pay_gpf')?></a></li>
    <li><a data-toggle="tab" href="#menu2"><?php echo $this->lang->line('tab3_pay_adv')?></a></li>
    <li><a data-toggle="tab" href="#menu3"><?php echo $this->lang->line('tab4_pay_bankdetails')?></a></li>
  </ul>

  <div class="tab-content">
  <div id="home1" class="tab-pane fade in active">
      <h3><?php echo $this->lang->line('tab1_emp_detail')?></h3>
       <div class="col-md-12">
    <div class="box box-primary">
   <div class="box-body">
    <?php foreach ($emp_details as $key => $pay) {?>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_arrdhar_card");?></label> <span class="text-danger">*</span></label>
               <input type="text" name="emp_adhar_card_no" id="emp_adhar_card_no" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="<?php echo $pay->emp_adhar_card_no;?>" class="form-control">
            </div>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("emp_name");?></label> <span class="text-danger">*</span></label>
			   <input type="text" name="emp_house_no" disabled="disabled"id="emp_house_noemp_house_no" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="<?php echo $pay->emp_full_name_hi;?>" class="form-control">
            </div>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("emp_house_no");?></label> <span class="text-danger">*</span></label>
                 <input type="text" name="emp_house_no" id="emp_house_noemp_house_no" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="<?php echo $pay->emp_house_no;?>" class="form-control">
              
            </div>
			<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("emp_mobile_no");?></label> <span class="text-danger">*</span></label>
			   <input type="text" name="emp_house_no" disabled="disabled"id="emp_house_noemp_house_no" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="<?php echo $pay->emp_mobile_number;?>" class="form-control">
            </div>
    <?php }?>
</div>
</div></div></div>
    <div id="home" class="tab-pane fade in ">
      <h3><?php echo $this->lang->line('tab1_pay_detail_incrment')?></h3>
       <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body">
    <?php  

	if(count($pay_regi) != 0){ foreach ($pay_regi as $key => $pay) {?>
     <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("basic_pay");?></label> <span class="text-danger">*</span></label>
                  <input type="text" name="pay_basic" id="pay_basic" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="<?php echo $pay->pay_basic; ?>" class="form-control">
               
            </div>   <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_gradepay");?></label> <span class="text-danger">*</span></label>
                  <input type="text" name="pay_gradepay" id="pay_gradepay" placeholder="<?php echo $this->lang->line('pay_gradepay'); ?>" value="<?php echo @$pay->pay_grp; ?>" class="form-control">
               
            </div>
         <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_da");?></label> <span class="text-danger">*</span></label>
               <input type="text" name="pay_da" id="pay_da" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="<?php echo $pay->pay_da; ?>" class="form-control">
               
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_special");?></label> <span class="text-danger">*</span></label>
              
               <input type="text" name="pay_special" id="pay_special" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="<?php echo $pay->pay_special; ?>" class="form-control">
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_hra");?></label> <span class="text-danger">*</span></label>
      
                        <input type="text" name="pay_hra" id="pay_hra" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="<?php echo $pay->pay_hra;?>" class="form-control">
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_sa");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_sa" id="pay_sa" placeholder="<?php echo $this->lang->line('pay_sa'); ?>"  value="<?php echo $pay->pay_sa;?>" class="form-control">
            </div>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_ma");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_madical" id="pay_madical" placeholder="<?php echo $this->lang->line('pay_ma'); ?>"  value="<?php echo $pay->pay_madical;?>" class="form-control">
            </div>
				<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_ca");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_ca" id="pay_ca" placeholder="<?php echo $this->lang->line("pay_ca");?>"  value="<?php echo $pay->pay_ca;?>" class="form-control">
            </div>
			
			<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_sp");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_others" id="pay_others" placeholder="<?php echo $this->lang->line("pay_sp");?>"  value="<?php echo $pay->pay_sp;?>" class="form-control">
            </div>
			
			<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_others");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_others" id="pay_others" placeholder="<?php echo $this->lang->line("pay_others");?>"  value="<?php echo $pay->pay_others;?>" class="form-control">
            </div>
			
			<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_sum");?></label> <span class="text-danger">*</span></label>
                <input type="text" name="pay_total_sum" id="pay_total_sum" placeholder="<?php echo $this->lang->line('pay_ma'); ?>"  value="<?php echo $pay->pay_total_sum;?>" class="form-control">
              
            </div>
           
    <?php }}else{?>
	
	<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("basic_pay");?></label> <span class="text-danger">*</span></label>
                  <input type="text" name="pay_basic" id="pay_basic" placeholder="<?php echo $this->lang->line('basic_pay'); ?>"  value="" class="form-control">
               
            </div>
			
			 <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_gradepay");?></label> <span class="text-danger">*</span></label>
                  <input type="text" name="pay_gradepay" id="pay_gradepay" placeholder="<?php echo $this->lang->line('pay_gradepay'); ?>"  value="" class="form-control">
               
            </div>
         <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_da");?></label> <span class="text-danger">*</span></label>
               <input type="text" name="pay_da" id="pay_da" placeholder="<?php echo $this->lang->line('pay_da'); ?>"  value="" class="form-control">
               
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_special");?></label> <span class="text-danger">*</span></label>
              
               <input type="text" name="pay_special" id="pay_special" placeholder="<?php echo $this->lang->line('pay_special'); ?>"  value="" class="form-control">
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_hra");?></label> <span class="text-danger">*</span></label>
      
                        <input type="text" name="pay_hra" id="pay_hra" placeholder="<?php echo $this->lang->line('emp_unique_code'); ?>"  value="" class="form-control">
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_sa");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_sa" id="pay_sa" placeholder="<?php echo $this->lang->line('pay_sa'); ?>"  value="" class="form-control">
            </div><div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_ma");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_madical" id="pay_madical" placeholder=""  value="" class="form-control">
            </div>
				<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_ca");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_ca" id="pay_ca" placeholder="<?php echo $this->lang->line("pay_ca");?>"  value="" class="form-control">
            </div>
			
				<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_sp");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_sp" id="pay_sp" placeholder="<?php echo $this->lang->line("pay_sp");?>"  value="" class="form-control">
            </div>
			
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_others");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_others" id="pay_others" placeholder="<?php echo $this->lang->line("pay_others");?>"  value="" class="form-control">
            </div><div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_sum");?></label> <span class="text-danger">*</span></label>
                <input type="text" name="pay_total_sum" id="pay_total_sum" placeholder=""  value="" class="form-control">
              
            </div>
           
	<?php }?>
</div>
</div>
</div> 
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3><?php echo $this->lang->line('tab2_pay_gpf')?></h3>
        <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body">
    <?php if(count($pay_regi) != 0){ foreach ($pay_regi as $key => $pay) {?>
     <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_gpf");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_gpf" id="pay_gpf" placeholder="<?php echo $this->lang->line('pay_ma'); ?>"  value="<?php echo $pay->pay_gpf;?>" class="form-control">
              
            </div>
         <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_define");?></label> <span class="text-danger">*</span></label>
               
                       <input type="text" name="pay_define" id="pay_define" placeholder="<?php echo $this->lang->line('pay_ma'); ?>"  value="<?php echo $pay->pay_define;?>" class="form-control">
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_gis");?></label> <span class="text-danger">*</span></label>
               
                 <input type="text" name="pay_gias" id="pay_gias" placeholder="<?php echo $this->lang->line('pay_gis'); ?>"  value="<?php echo $pay->pay_gias;?>" class="form-control">
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_home_loan");?></label> <span class="text-danger">*</span></label>
             
                <input type="text" name="pay_house_loan" id="pay_house_loan" placeholder="<?php echo $this->lang->line('pay_gis'); ?>"  value="<?php echo $pay->pay_house_loan;?>" class="form-control">
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_car_loan");?></label> <span class="text-danger">*</span></label>
             
                 <input type="text" name="pay_car_loan" id="pay_car_loanpay_car_loan" placeholder="<?php echo $this->lang->line('pay_gis'); ?>"  value="<?php echo $pay->pay_car_loan;?>" class="form-control">
            </div>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_fule_charge");?></label> <span class="text-danger">*</span></label>
            
               <input type="text" name="pay_fuel_charge" id="pay_fuel_charge" placeholder="<?php echo $this->lang->line('pay_gis'); ?>"  value="<?php echo $pay->pay_fuel_charge;?>" class="form-control">
            </div>
			
			
			   <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_house_rent");?></label> <span class="text-danger">*</span></label>
            
               <input type="text" name="pay_fuel_charge" id="pay_fuel_charge" placeholder="<?php echo $this->lang->line('pay_house_rent'); ?>"  value="<?php echo $pay->pay_house_rent;?>" class="form-control">
            </div>
			<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_professional_tax");?></label> <span class="text-danger">*</span></label>
          
               <input type="text" name="pay_professional_tax" id="pay_professional_taxpay_professional_tax" placeholder="<?php echo $this->lang->line('pay_gis'); ?>"  value="<?php echo $pay->pay_professional_tax;?>" class="form-control">
            </div><div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_income_tax");?></label> <span class="text-danger">*</span></label>
               
                  <input type="text" name="pay_income_tax" id="pay_income_tax" placeholder="<?php echo $this->lang->line('pay_gis'); ?>"  value="<?php echo $pay->pay_income_tax;?>" class="form-control">
            </div>
    <?php } }else{?>
	
	     <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_gpf");?></label> <span class="text-danger">*</span></label>
               
                <input type="text" name="pay_gpf" id="pay_gpf" placeholder="<?php echo $this->lang->line('pay_gpf'); ?>"  value="" class="form-control">
              
            </div>
 
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_gis");?></label> <span class="text-danger">*</span></label>
               
                 <input type="text" name="pay_gias" id="pay_gias" placeholder="<?php echo $this->lang->line('pay_gis'); ?>"  value="" class="form-control">
            </div>
             <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_define");?></label> <span class="text-danger">*</span></label>
               
                       <input type="text" name="pay_define" id="pay_define" placeholder="<?php echo $this->lang->line('pay_ma'); ?>"  value="" class="form-control">
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_fule_charge");?></label> <span class="text-danger">*</span></label>
            
               <input type="text" name="pay_fuel_charge" id="pay_fuel_charge" placeholder="<?php echo $this->lang->line('pay_fule_charge'); ?>"  value="" class="form-control">
            </div>
			
			      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_house_rent");?></label> <span class="text-danger">*</span></label>
            
               <input type="text" name="pay_fuel_charge" id="pay_fuel_charge" placeholder="<?php echo $this->lang->line('pay_house_rent'); ?>"  value="" class="form-control">
            </div>
			
			<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_professional_tax");?></label> <span class="text-danger">*</span></label>
          
               <input type="text" name="pay_professional_tax" id="pay_professional_tax" placeholder="<?php echo $this->lang->line('pay_professional_tax'); ?>"  value="" class="form-control">
            </div><div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_income_tax");?></label> <span class="text-danger">*</span></label>
               
                  <input type="text" name="pay_income_tax" id="pay_income_tax" placeholder="<?php echo $this->lang->line('pay_income_tax'); ?>"  value="" class="form-control">
            </div>
	
	<?php }?>
</div>
</div>
</div>  </div>
    <div id="menu2" class="tab-pane fade">
      <h3><?php echo $this->lang->line('tab3_pay_adv')?></h3>
	          <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_gpf_adv");?></label> <span class="text-danger">*</span></label>
               
                       <input type="text" name="pay_gpf_adv" id="pay_gpf_adv" placeholder="<?php echo $this->lang->line('pay_gpf_adv'); ?>"  value="" class="form-control">
            </div>
<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_home_loan");?></label> <span class="text-danger">*</span></label>
             
                <input type="text" name="pay_house_loan" id="pay_house_loan" placeholder="<?php echo $this->lang->line('pay_house_loan'); ?>"  value="" class="form-control">
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_car_loan");?></label> <span class="text-danger">*</span></label>
             
                 <input type="text" name="pay_car_loan" id="pay_car_loan" placeholder="<?php echo $this->lang->line('pay_car_loan'); ?>"  value="" class="form-control">
            </div>
			<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_grain_adv");?></label> <span class="text-danger">*</span></label>
             
                <input type="text" name="pay_house_loan" id="pay_house_loan" placeholder="<?php echo $this->lang->line('pay_grain_adv'); ?>"  value="" class="form-control">
            </div>
			<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_festival_adv");?></label> <span class="text-danger">*</span></label>
             
                <input type="text" name="pay_house_loan" id="pay_house_loan" placeholder="<?php echo $this->lang->line('pay_festival_adv'); ?>"  value="" class="form-control">
            </div>		<div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("pay_other_adv");?></label> <span class="text-danger">*</span></label>
             
                <input type="text" name="pay_house_loan" id="pay_house_loan" placeholder="<?php echo $this->lang->line('pay_other_adv'); ?>"  value="" class="form-control">
            </div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3><?php echo $this->lang->line('tab4_pay_bankdetails')?></h3>
     <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body">
    <?php foreach ($emp_bank as $key => $pay) {?>
     <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("state");?></label> <span class="text-danger">*</span></label>
               <?php echo $pay->peb_state_id; ?>

            </div>
         <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("districk");?></label> <span class="text-danger">*</span></label>
               <?php echo $pay->peb_district; ?>
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("bank_name");?></label> <span class="text-danger">*</span></label>
               <?php echo $pay->peb_bank_name;?>
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("bank_ifsc");?></label> <span class="text-danger">*</span></label>
               <?php echo $pay->peb_ifsc_code;?>
            </div>
      
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("bank_account_no");?></label> <span class="text-danger">*</span></label>
               <?php echo $pay->peb_bank_account_no;?>
            </div>
      <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("ag_series");?></label> <span class="text-danger">*</span></label>
               <?php echo $pay->peb_ag_series;?>
            </div><div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("gpf_dpf_code");?></label> <span class="text-danger">*</span></label>
               <?php echo $pay->peb_gpf_dpf_nps_code;?>
            </div><div class="form-group">
                <label for="file_type"><?php echo $this->lang->line("contact_no");?></label> <span class="text-danger">*</span></label>
               <?php echo $pay->emp_mobile_number;?>
            </div>
    <?php }?>
</div>
</div>
</div>

      </div>
  </div> </div>