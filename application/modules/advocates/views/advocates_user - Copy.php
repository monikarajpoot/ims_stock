<?php //print_r($adv_details); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $title; ?>
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('admin'); ?>/sections">Employees</a></li>
        <li class="active"><?php echo $page_title; ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div style="float:left"><h3 class="box-title"><?php echo $page_title; ?></h3></div>
                    <?php if ($is_page_edit == 0) { ?>
                        <div style="float:right">
                            <a href="<?php echo base_url('admin'); ?>/add_employee">
                                <button class="btn btn-block btn-info"><?php echo $this->lang->line('add_button'); ?></button>
                            </a>
                        </div>
                    <?php } ?>
                    <div style="float:right;margin-right: 10px;">
                        <a href="javascript:history.go(-1)">
                            <button class="btn btn-block btn-warning"><?php echo $this->lang->line('Back_button_label'); ?></button>
                        </a>
                    </div>

                </div><!-- /.box-header -->
				
                <?php echo $this->session->flashdata('message'); //pre($this->input->post()); pre($emp_detail); pre($emp_more_detail); ?>
               <?php  if($this->uri->segment(2) == 'edit_advocate'){
				   ?>
				   <form role="form" method="post" action="<?php echo base_url() ?>advocate/edit_advocate<?php if (isset($id)) {
                    echo '/' . $id;
                } ?>">
				   <?php 
				   
			   }else{
				  ?>
					<form role="form" method="post" action="<?php echo base_url() ?>advocates/manage_advocate<?php if (isset($id)) {
                    echo '/' . $id;
                } ?>">
				<?php 				  
			   }?>
			   
                    <div class="col-md-6">
                        <div class="box box-primary" style="margin-top: 15px;">
                            <div class="box-body">
								<div class="form-group">
									<label><?php echo $this->lang->line('advocate_applicant_type_label'); ?><span class="text-danger">*</span> :</label>
									
									<?php  $selected  = '' ;
									if(isset($adv_details['advocate_aplicant_type'])){
										 $selected  = $adv_details['advocate_aplicant_type'] ;
									} else if($this->input->post('advocate_aplicant_type')){
										 $selected  = $this->input->post('advocate_aplicant_type') ;
									} ?>
									<?php echo get_adv_aplicant_type_ddl_list('advocate_aplicant_type', 'class="form-control"',$selected ); ?>
									 <?php echo form_error('advocate_aplicant_type'); ?>
								</div>
								
								<div class="form-group">
									<label><?php echo $this->lang->line('advocate_post_id_label'); ?><span class="text-danger">*</span> :</label>
									
									<?php  $selected  = '' ;
									if(isset($adv_details['advocate_post_type'])){
										 $selected  = $adv_details['advocate_post_type'] ;
									} else if($this->input->post('advocate_post_type')){
										 $selected  = $this->input->post('advocate_post_type') ;
									} ?>
									<?php echo get_advocate_posttype_ddl_list('advocate_post_type', 'class="form-control"',$selected ); ?>
									<?php echo form_error('advocate_post_type'); ?>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('emp_full_name_label_hi'); ?> <span class="text-danger">*</span> :</label>
									<input type="text" class="form-control" name="scm_name_hi" value="<?php echo isset($adv_details['scm_name_hi'])? $adv_details['scm_name_hi']:$this->input->post('scm_name_hi')?>" >
									 <?php echo form_error('scm_name_hi'); ?>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('emp_full_name_label_en'); ?><span class="text-danger">*</span> :</label>
									<input type="text" class="form-control" name="scm_name_en"  value="<?php echo isset($adv_details['scm_name'])? $adv_details['scm_name']:$this->input->post('scm_name_en')?>">
									 <?php echo form_error('scm_name_en'); ?>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_father_name_label'); ?>:</label>
									<input type="text" class="form-control" name="father_name" value="<?php echo isset($adv_details['father_name'])? $adv_details['father_name']:$this->input->post('father_name')?>">
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_emailid_label'); ?>:</label>
									<input type="email" class="form-control" name="email_id" value="<?php echo isset($adv_details['email_id'])? $adv_details['email_id']:$this->input->post('email_id')?>">
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_contactno_label'); ?>:</label>
									<input type="text" class="form-control" maxlength="12" name="contact_no" value="<?php echo isset($adv_details['contact_no'])? $adv_details['contact_no']:$this->input->post('contact_no')?>">
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_address_label'); ?><span class="text-danger">*</span> :</label>
								<textarea class="form-control" rows="3" name="scm_address_hi"><?php echo isset($adv_details['scm_address'])? $adv_details['scm_address_hi']:$this->input->post('scm_address_hi')?></textarea>
									
									<?php echo form_error('scm_address'); ?>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_address_en_label'); ?> :</label>
									<textarea class="form-control" rows="3" name="scm_address_en"><?php echo isset($adv_details['scm_address'])? $adv_details['scm_address']:$this->input->post('scm_address_en')?></textarea>
									
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_address_pincode_label'); ?>:</label>
									<input type="number" class="form-control" name="scm_pincode" maxlength="6" value="<?php echo isset($adv_details['scm_pincode'])? $adv_details['scm_pincode']:$this->input->post('scm_pincode')?>">
								</div>
								
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_stamp_no_label'); ?>:</label>
									<input type="number" class="form-control" name="stamp_no" value="<?php echo isset($adv_details['stamp_no'])? $adv_details['stamp_no']:$this->input->post('stamp_no')?>">
									
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_stamp_date_label'); ?> :</label>
									<input type="text" class="form-control date1" name="stamp_date" value="<?php echo isset($adv_details['stamp_date'])? date('d-m-Y',strtotime($adv_details['stamp_date'])):$this->input->post('stamp_date')?>">
									
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_order_no_label'); ?>:</label>
									<input type="text" class="form-control " name="adv_order_no" value="<?php echo isset($adv_details['order_no'])? $adv_details['order_no']:$this->input->post('adv_order_no')?>">
									
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_order_date_label'); ?>:</label>
									<input type="text" class="form-control date1" name="adv_order_date" value="<?php echo isset($adv_details['order_date'])? date('d-m-Y',strtotime($adv_details['order_date']) ):$this->input->post('adv_order_date')?>">
									
								</div>
							</div>
                        </div><!-- /.box -->
                    </div>
					
					<div class="col-md-6">
                        <div class="box box-primary" style="margin-top: 15px;">
                            <div class="box-body">
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_court_type_label'); ?>:</label>
									<?php   $selected  = '' ;
									if(isset($adv_details['scm_court_name_hi'])){
										 $selected  = $adv_details['scm_court_name_hi'] ;
									}else if($this->input->post('scm_court_name_hi')){
										 $selected  = $this->input->post('scm_court_name_hi') ;
									} 									echo get_court_name_ddl_list('scm_court_name_hi' , 'class="form-control"',$selected); ?>
								
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_designation_label'); ?><span class="text-danger">*</span> :</label>
									<input type="text" class="form-control" name="advocate_designation" value="<?php echo isset($adv_details['advocate_designation'])? $adv_details['advocate_designation']:$this->input->post('advocate_designation')?>" >
									<?php echo form_error('advocate_designation'); ?>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_state_label_1'); ?>:</label>
									<?php  $selected  = '' ;
									if(isset($adv_details['state_id'])){
										 $selected  = $adv_details['state_id'] ;
									}else if($this->input->post('state_id')){
										 $selected  = $this->input->post('state_id') ;
									} ?>
									<?php echo get_state_ddl_list('state_id', ' class="form-control"',$selected);  ?>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_tahsil_label'); ?>:</label>
									<?php  $selected  = '' ;
									if(isset($adv_details['city_id'])){
										 $selected  = $adv_details['city_id'] ;
									}else if($this->input->post('city_id')){
										 $selected  = $this->input->post('city_id') ;
									} ?>
									<?php echo get_district_ddl_list('city_id' , 'class="form-control"',$selected ) ?>
								</div>
								<div class="form-group">
									<label><span id="appintment_date" ><?php echo $this->lang->line('adv_appointment_date_label'); ?></span>
									<span id="appintment_date_first" style="display:none"  ><?php echo $this->lang->line('adv_first_appointment_date_label'); ?></span> :</label>
									<input type="text" class="form-control date1" name="adv_appointment_posting_date" value="<?php echo isset($adv_details['posting_date'])? date('d-m-Y' ,strtotime($adv_details['posting_date'])):$this->input->post('adv_appointment_posting_date')?>">
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_provision_period_label'); ?></label>
									
									<?php  $selected  = '' ;
									if(isset($adv_details['provision_pirod'])){
										 $selected  = $adv_details['provision_pirod'] ;
									} else if($this->input->post('provision_pirod')){
										 $selected  = $this->input->post('provision_pirod') ;
									}
									echo get_provision_pirod_ddl_list('provision_pirod' , 'class="form-control" ',$selected ) ;
									?>
									
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_renewal date_label'); ?>:</label>
									<input type="text" class="form-control date1" name="post_renew_date" value="<?php echo isset($adv_details['post_renew_date'])? date('d-m-Y',strtotime($adv_details['post_renew_date'])):$this->input->post('post_renew_date')?>">
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_application_for_renewal_date_label'); ?>:</label>
									<input type="text" class="form-control date1"  name="application_for_renewal_date" value="<?php echo isset($adv_details['application_for_renewal_date'])? date('d-m-Y',strtotime($adv_details['application_for_renewal_date'])):$this->input->post('application_for_renewal_date')?>">
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_invoice_date_label'); ?>:</label>
									<input type="text" class="form-control date1" name="adv_invoice_date" value="<?php echo isset($adv_details['adv_invoice_date'])? date('d-m-Y',strtotime($adv_details['adv_invoice_date'])):$this->input->post('adv_invoice_date')?>">
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_once_registration_number_council_label'); ?> <span class="text-danger">*</span> :</label>
									<input type="text" class="form-control" name="once_registration_number_council" value="<?php echo isset($adv_details['once_registration_number_council'])? $adv_details['once_registration_number_council']:$this->input->post('once_registration_number_council')?>">
									<?php echo form_error('once_registration_number_council'); ?>
								</div>
								<div class="form-group" id="private_lawyer" style="display:none">
									<label for="private_lawyer_fee"><?php echo $this->lang->line('adv_private_lawyer_fee'); ?>:</label>
									<input type="text" class="form-control" name="package_amount" value="<?php echo isset($adv_details['package_amount'])? $adv_details['package_amount']:$this->input->post('package_amount')?>">
								</div>
								<div class="form-group" id="lokabhiyojak_power" style="display:none">
									<label><?php echo $this->lang->line('adv_lokabhiyojak_power_label'); ?>:</label>
									<textarea class="form-control" rows="3" name="lokabhiyojak_work"><?php echo isset($adv_details['lokabhiyojak_work'])? $adv_details['lokabhiyojak_work']:$this->input->post('lokabhiyojak_work')?></textarea>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line('adv_remarke_label'); ?>:</label>
									<textarea class="form-control" rows="3" name="adv_remarke" ><?php echo isset($adv_details['adv_remarke'])? $adv_details['adv_remarke']:$this->input->post('adv_remarke')?></textarea>
								</div>
								<div class="box-footer">
									<button type="submit" onclick="return confir_post_data();" class="btn btn-primary">जमा करें</button>
								</div>
							</div>
                        </div><!-- /.box -->
                    </div>
                    </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
<!-- Main row -->
</section><!-- /.content -->

<?php $this->load->view('advocates_js'); ?>