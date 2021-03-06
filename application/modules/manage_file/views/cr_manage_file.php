<style>
    input[type=checkbox] + label {
        color: #dd4b39;
    }
    input[type=checkbox]:checked + label {
        color: #398439;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $title; ?>
        <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php echo $this->lang->line('active_page'); ?></li>
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
        <div style="float:left"><h3 class="box-title"><?php echo $title_tab;?></h3></div>
        <button class="btn btn-warning" title="Back" onclick="goBack()" style="float:right"><?php echo $this->lang->line('Back_button_label'); ?>
    </div>
    <?php
    if($is_page_edit){ ?>
        <div style="float:right">
            <a href="<?php echo base_url();?>/cr_manage_file">
                <button class="btn btn-block btn-info"><?php echo $this->lang->line('add_new'); ?></button>
            </a>
        </div>
    <?php } ?>

</div><!-- /.box-header -->
<?php if($this->session->flashdata('message') || $this->session->flashdata('error')) {
    $msg = $this->session->flashdata('message') ? 'success' : 'danger';
    ?>
    <div class="alert alert-<?php echo $msg; ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>
            <?php  echo $this->session->flashdata('message');
            echo $this->session->flashdata('error'); ?>
        </strong><br>
    </div>
<?php }?>
<div class="col-md-12">
<!-- general form elements -->
<!-- /.box-header -->
<!-- form start -->

<form role="form" method="post" action="<?php echo base_url()?>dashboard/add_file<?php if(isset($id)){ echo '/'.$id;} ?>"  enctype="multipart/form-data">
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-body">

		  <div class="form-group">
                <label for="file_type"><?php echo $this->lang->line('label_type'); ?></label> <span class="text-danger">*</span></label>
                <select class="form-control" name="file_type" id="file_type">
                    <?php foreach(file_types() as $key => $value){
                        echo '<option value="'.$key.'" >'.$value.'</option>';
                    } ?>
                </select>
                <?php echo form_error('file_type');?>
            </div>
			
			<!--Dropdown-->
            <div class="form-group" id="other_file_div">
                <label for="file_type"><?php echo $this->lang->line('other_label'); ?></label> <span class="text-danger">*</span></label>
                <select class="form-control" name="other_file_type" id="other_file_type">
                    <?php /*file_other_type: Define by common helper file*/
                    foreach(file_other_type() as $key => $value){
                        if($key!='3'){
    						if(isset($postdata['other_file_type'])){
                                if(@$postdata['other_file_type']==$key){ $slct='selected';}else{ $slct='';}
                                 echo '<option value="'.$key.'" '.$slct.' >'.$value.'</option>';
                            } else{
    						      echo '<option value="'.$key.'"  >'.$value.'</option>';
    				        } 
                        }    
                    }?>
                </select>
                <?php echo form_error('other_file_type');?>
            </div>
            <!--End Dropdown-->
			
			<div class="form-group" id="registry_number_r" <?php if($this->input->post('file_type')== 'r'){ }else { echo 'style="display:none"'; } ?>  >
                <label for="file_registry_number"><?php echo $this->lang->line('label_registry_number') ?></label>
                <input type="text" name="registry_number"  value="<?php echo isset($registry_number) ? $registry_number : ''; ?>" placeholder="<?php echo $this->lang->line('label_registry_number'); ?>" class="form-control">
               
            </div>

            <div class="form-group" id="registry_date_r"  <?php if($this->input->post('file_type')== 'r'){}else { echo 'style="display:none"'; } ?>   >
                <label for="file_registry_date" ><?php echo $this->lang->line('label_registry_date') ; ?>
                </label></label>
                <input type="text" name="registry_date" id="registry_date"  value="<?php if ($this->input->post('registry_date')){ echo $this->input->post('registry_date');}  ?>" placeholder="<?php echo $this->lang->line('label_registry_date'); ?>" class="form-control date1">
                
            </div>
			
			
			
			<div class="form-group" id="">
                <label for="file_uo_number" id="dispaly_num"><?php  if ($abc == 'l' or $abc == 'a') { echo $this->lang->line('label_letterno_number') ;} else if ($abc == 'r') { echo $this->lang->line('label_letterno_number') ;}else if ($abc == 'o') { echo "कोई पहचाना दर्ज कीजीये (Name)";}else if ($abc == 'n') { echo $this->lang->line('label_notice_number');} else {  echo  $this->lang->line('label_uo_number');}?></label> <span class="text-danger">*</span></label>
                <input type="text" name="file_uo_number"  onchange="checkUOnumber(this.value)" value="<?php echo isset($val_file_uo_number) ? $val_file_uo_number : ''; ?>" placeholder="<?php echo $this->lang->line('placeholder_dispatch_number'); ?>" class="form-control">
                <?php echo form_error('file_uo_number');?>
				<span id="error-uonumner" style="color:#D04545;" ></span>
            </div>

            <div class="form-group">
                <label for="file_uo_date" id="dispaly_date"><?php if ($abc == 'l' or $abc == 'a' or $abc == 'o') { echo $this->lang->line('label_letterno_date') ;} else if ($abc == 'r') { echo $this->lang->line('label_letterno_date') ;}else if ($abc == 'n') { echo $this->lang->line('label_notice_date') ;} else {  echo  $this->lang->line('label_uo_date');}?>
                </label> <span class="text-danger">*</span></label>
                <input type="text" name="file_uo_date" id="file_uo_date" value="<?php if ($this->input->post('file_uo_date')){ echo $this->input->post('file_uo_date');}  ?>" placeholder="<?php echo $this->lang->line('placeholder_dispatch_date'); ?>" class="form-control">
                <?php echo form_error('file_uo_date');?>
            </div>
			<div class="form-group">
			 <label for="file_mark_section_id"  id="file_mark_section_id"><?php echo $this->lang->line('label_mark_section'); ?> <span class="text-danger">*</span></label>
                <?php $mark_to_officer = get_officers_list(); //pre($mark_to_officer);?>
                <?php $fdis='block'; if(isset($postdata['other_file_type'])){ if(@$postdata['other_file_type']=='1' || @$postdata['other_file_type']==''){ $dis='show'; $fdis='hide'; ?>
                    <select class="form-control marktosc" name="file_mark_section_id" id="mark_to_section" style="display:<?php echo $fdis;?>">
                        <option value="" id="select_t_s"><?php echo $this->lang->line('option_select_section'); ?></option>
                        <?php foreach($section_list as $row){ 
							if( ($row['section_id'] == 21 ) || ($row['section_id'] == 26 ) ){}else{  ?>						
                            <option value="<?php echo $row['section_id']; ?>" class="sections" <?php  if($this->input->post('file_mark_section_id')==$row['section_id']){ echo 'selected';} ?>><?php echo $row['section_name_en'].", ".$row['section_name_hi']; ?></option>
                        <?php } ?>
						<?php } ?>
						<?php } ?>
                    </select>
                <?php } else{  ?>
                    <?php //if($postdata['other_file_type']!='2'){ ?>
                    <select class="form-control marktosc" name="file_mark_section_id" id="mark_to_section" style="display:<?php echo $fdis;?>">
                        <option value="" id="select_t_s"><?php echo $this->lang->line('option_select_section'); ?></option>
                        <?php $i = 1; foreach($section_list as $row){
								if( ($row['section_id'] == 21 ) || ($row['section_id'] == 26 ) ){}else{  ?>
                            <option value="<?php echo $row['section_id']; ?>" class="sections" <?php  if($this->input->post('file_mark_section_id')==$row['section_id']){ echo 'selected';} ?>><?php echo $i." - ".$row['section_name_hi'].'('.$row['section_name_en'].')'; ?></option>
                        <?php } ?>
						<?php $i++; } ?>
                    </select>
                    <?php //} ?>
                <?php } ?>
                <?php echo form_error('file_mark_section_id');?>
                <?php if(isset($postdata['other_file_type'])){  if(@$postdata['other_file_type']=='2' || @$postdata['other_file_type']=='3'){ $dis='none'; ?>
                    <select class="form-control marktoof" name="file_mark_officer_id" id="mark_to_officer" style="display:<php echo $dis='none'; ?>">
                        <option value="" id="select_t_o"><?php echo $this->lang->line('select_other_mark_to_officer'); ?></option>
                        <?php foreach($mark_to_officer as $offrow){ ?>
                            <option value="<?php echo $offrow['emp_id']; ?>"  class="officers" <?php if($this->input->post('file_mark_officer_id')==$offrow['emp_id']){ echo 'selected';} ?>><?php echo getemployeeName($offrow['emp_id'], true).", ".getemployeeRole($offrow['role_id'])//if($offrow['emp_section_id']==''); ?></option>
                        <?php } ?>
                    </select>
                <?php } }else { ?>
                    <?php //if($postdata['other_file_type']!='1'){ ?>
                    <select class="form-control marktoof" name="file_mark_officer_id" id="mark_to_officer" style="display:none">
                        <option value="" id="select_t_o"><?php echo $this->lang->line('select_other_mark_to_officer'); ?></option>
                        <?php foreach($mark_to_officer as $offrow){ ?>
                            <option value="<?php echo $offrow['emp_id']; ?>" class="officers" <?php if($this->input->post('file_mark_section_id')==$offrow['emp_id']){ echo 'selected';} ?>><?php echo getemployeeName($offrow['emp_id'], true).", ".getemployeeRole($offrow['role_id'])//if($offrow['emp_section_id']==''); ?></option>
                        <?php } ?>
                    </select>
                    <?php //} ?>
                <?php } ?>
                <?php echo form_error('file_mark_officer_id');?>
                <input type="hidden" name="mark_unitid" id="mark_unitid" value="51">
			</div>
			<div class="form-group show_for_procescution"  <?php if($this->input->post('file_mark_section_id')){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'section_file_type' ) ; echo $display; }else { echo 'style="display:none"'; } ?> >
					<label for="prosecution file type" id="procecution_label"  <?php if($this->input->post('file_mark_section_id') == 15){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'procecution_label') ; echo $display;  } else { echo 'style="display:none"'; }?>  ><?php echo $this->lang->line('file_ka_prakar'); ?> </label>
					<label for="BII file type" id="nyayic_sec_2label"  <?php if($this->input->post('file_mark_section_id') == 12){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'nyayic_sec_2label') ; echo $display; } else { echo 'style="display:none"'; } ?> ><?php echo $this->lang->line('file_ka_prakar_b2'); ?> </label>
					<label for="BII file type" id="nyayic_sec_1label"  <?php if($this->input->post('file_mark_section_id') == 11){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'nyayic_sec_1label') ; echo $display; }else { echo 'style="display:none"'; } ?> ><?php echo $this->lang->line('file_ka_prakar_b1'); ?> </label>
					<label for="lib file type" id="lib_sec_1label"  <?php if($this->input->post('file_mark_section_id') == 19){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'lib_sec_1label') ; echo $display; }else { echo 'style="display:none"'; } ?> ><?php echo $this->lang->line('file_ka_prakar_lib'); ?> </label>
						<select class="form-control" name="section_file_type" id="section_file_type">
						<option value="">शाखा में फ़ाइल का प्रकार</option>
						
							<?php 
							if($this->input->post('file_mark_section_id') == 11){
								$presecution_file_type= get_BI_file_type(); /*function define in common helper. Database filed name : section_file_type in ft_files */
							}
							if($this->input->post('file_mark_section_id') == 12){
								$presecution_file_type= get_BII_file_type(); /*function define in common helper. Database filed name : section_file_type in ft_files */
							}
							if($this->input->post('file_mark_section_id') == 15){
								$presecution_file_type= get_prosecution_file_type(); /*function define in common helper. Database filed name : section_file_type in ft_files */
							}
							if($this->input->post('file_mark_section_id') == 19){
								$presecution_file_type = get_lib_file_type(); /*function define in common helper. Database filed name : section_file_type in ft_files */
							}
							if(isset($presecution_file_type)){
							foreach($presecution_file_type as $pftype){ ?>
								<option value="<?php echo $pftype; ?>" <?php if($pftype == $this->input->post('section_file_type')){ echo "selected='selected'"; } ?>  ><?php echo $pftype; ?></option>
					<?php } ?>
					<?php } ?>
					</select>
					<?php // echo form_error('judgement_data');?>
			</div>
            

            <div class="form-group">
                <label for="file_subject"><?php echo $this->lang->line('label_subject'); ?></label> <span class="text-danger">*</span></label>
                <textarea class="form-control"  name="file_subject" placeholder="Put subject here"><?php echo isset($val_file_subject) ? $val_file_subject : ''; ?></textarea>
                <?php echo form_error('file_subject');?>
            </div>

            <!-- hide show according section RP-->
                <div class="petition_file_cls hide_cls" id="party_petition_against" <?php $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'party_petition') ; echo $display; ?> >

                <div class="form-group">
                    <label for="file_subject"><?php echo $this->lang->line('Party_name_petition/respondent'); ?> </label>
                    <div class="row">
                        <div class="col-xs-5"><input type="text" placeholder="Petition" name="party_petition" value="<?php echo (@$this->input->post('party_petition')) ? @$this->input->post('party_petition') : '' ; ?>" class="form-control">
                            <?php // echo form_error('party_petition');?></div>
                        <span class="col-xs-2"><label for="file_subject">विरुद्ध</label></span>
                        <div class="col-xs-5"><input type="text" name="Party_name_respondent" placeholder="Respondent" value="<?php echo (@$this->input->post('Party_name_respondent')) ? @$this->input->post('Party_name_respondent') : 'मध्यप्रदेश शासन' ; ?>" class="form-control">
                            <?php // echo form_error('Party_name_respondent');?></div>
                    </div>
                </div>

                <div class="form-group field_wrapper1">
                    <label for="file_subject"><?php echo $this->lang->line('case_no'); ?></label>
                    <div class="pull-right add_more">
                        <a href="javascript:void(0);" class="add_button" data-toggle="tooltip" data-original-title="Add more Case no."><button type="button"><span class="fa fa-plus-square"></span></button></a>
                        <a href="javascript:void(0);" class="remove_button" data-toggle="tooltip" data-original-title="Remove more Case no."><button type="button"><span class="fa fa-minus-square"></span></button></a>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <select name="files_other_feilds[case_type][]" class="form-control casetype">
                                <option value="">Select type</option>
                                <?php foreach(case_name() as $case){ ?>
                                    <option value="<?php echo $case ?>"><?php echo $case ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <input type="text" name="files_other_feilds[case_no][]" placeholder="Number" value="" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <select Name='files_other_feilds[case_year][]' class="form-control">
                                <option value="">Year</option><?php
                                for ($x=date("Y"); $x>1990; $x--)
                                { echo'<option value="'.$x.'">'.$x.'</option>';  } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- hide show according section end RP-->
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-body">

            <!---prastav Start--->

            <div class="form-group">
                <label for="offer_by"><?php echo $this->lang->line('offer_by'); ?> <span class="text-danger">*</span> </label>
                <select class="form-control" name="file_offer_by" id="file_offer_by">
                    <option value=""><?php echo $this->lang->line('option_select_from'); ?></option>
                    <?php foreach(file_from_type() as $key => $value){ ?>
                        <option value="<?php echo $key ?>" <?php if ($this->input->post('file_offer_by') == $key) { echo "selected";} ?>><?php echo $value ?></option>
                    <?php   } ?>
                </select>
                <?php echo form_error('file_offer_by');?>
            </div>
            <div class="form-group"  id="High_court_show" <?php if($this->input->post('file_offer_by') == 'm' || $this->input->post('file_offer_by') == 'u') { echo "style='display: block'"; } else { echo "style='display: none'";} ?>>
                <label for="High_court_bench"><?php echo $this->lang->line('High_court_bench'); ?> <span class="text-danger">*</span></label>
                <select class="form-control" name="court_bench" id="court_bench">
                    <option value=""><?php echo $this->lang->line('option_select_from'); ?></option>
                    <?php $i = 1; foreach(highcourt_bench() as $key => $value){ ?>
                        echo '<option value="<?php echo $key ?>" <?php if ($this->input->post('court_bench') == $key) { echo "selected";} ?>><?php echo $i.' - '.$value ?></option>
                    <?php $i++; } ?>
                </select>
                <?php echo form_error('court_bench');?>
            </div>

            <div class="form-group" id="dept_id_show" <?php if($this->input->post('file_offer_by') == 'v') { echo "style='display: block'"; } else { echo "style='display: none'";} ?>>
                <label for="file_department_id"><?php echo $this->lang->line('label_dept_name'); ?> <span class="text-danger">*</span></label>
                <select class="form-control" name="file_department_id" id="file_department_id">
                    <option value=""><?php echo $this->lang->line('option_select_dept'); ?></option>
                    <?php foreach($departments_list as $row){ ?>
                        <option value="<?php echo $row['dept_id']; ?>" <?php  if($this->input->post('file_department_id')==$row['dept_id']){ echo 'selected';} ?>><?php echo @$row['department_default_no']==1000 ? '' :  $row['dept_name_hi']." - ".$row['department_default_no']; ?></option>
                    <?php } ?>
                    <option value="400"><?php echo $this->lang->line('option_other'); ?></option>
                </select>
                <?php echo form_error('file_department_id');?>
            </div>


<div class="form-group" id="dist_id_show" <?php if($this->input->post('file_offer_by') == 'c' || $this->input->post('file_offer_by') == 'jvn' || $this->input->post('file_offer_by') == 'v' || $this->input->post('file_offer_by') == 'm' || $this->input->post('file_offer_by') == 'o') { echo "style='display: block'"; } else { echo "style='display: none'";} ?>>
                <label for="district_id"><?php echo $this->lang->line('label_district_name'); ?> <span class="text-danger">*</span></label>
                <select class="form-control" name="district_id" id="district_id">
                    <option value=""><?php echo $this->lang->line('option_select_district'); ?></option>
                    <?php $i = 1; foreach($district_list as $row){ ?>
                        <option value="<?php echo $row['district_id']; ?>" <?php  if($this->input->post('district_id')==$row['district_id']){ echo 'selected';} ?>><?php echo $row['district_name_hi'].'('.$row['district_name_en'].') - '.$i; ?></option>
                    <?php $i++; } ?>
                    <option value="400"><?php echo $this->lang->line('option_other'); ?></option>
                </select>
                <?php echo form_error('district_id');?>
</div> <!-- dont take no. of district before name of district this will store by district_name ex - "$row['district_name_hi'] - $i" -->

            <div class="form-group" id="state_id_show" <?php if($this->input->post('file_offer_by') == 'au') { echo "style='display: block'"; } else { echo "style='display: none'";} ?>>
                <label for="district_id"><?php echo $this->lang->line('label_state_name'); ?> <span class="text-danger">*</span></label>
                <select class="form-control" name="state_id" id="state_id">
                    <option value="">Select</option>
                    <?php $i = 1; foreach($state_list as $row){ ?>
                        <option value="<?php echo $row['state_id']; ?>" <?php  if($this->input->post('state_id')==$row['state_id']){ echo 'selected';} ?>><?php echo $i." - ".$row['state_name_hi'].'('.$row['state_name_en'].')'; ?></option>
                    <?php $i++; } ?>
                </select>
                <?php echo form_error('state_id');?>
            </div>

            <div class="form-group" id="suprem_court_show" <?php if($this->input->post('file_offer_by') == 'sc') { echo "style='display: block'"; } else { echo "style='display: none'";} ?>>
                <label for="suprem_court_show"><?php echo $this->lang->line('label_suprem_court'); ?> <span class="text-danger">*</span></label>
                <input type="text" name="suprem_court" id="suprem_court" value="<?php echo @$this->input->post('suprem_court') ? @$this->input->post('suprem_court') : 'Delhi , दिल्ली';  ?>"  class="form-control" disabled>
            </div>
			
			<div class="form-group delhi_advocate" style="display:none">
				<?php 
					$counselling_list = get_standing_counseller_name(null,null);
					//pre($counselling_list);
					foreach($counselling_list as $cname){
						$advocates[]=$cname['scm_name_hi']." (".$cname['scm_court_name'].' '.$cname['scm_post_hi'].")";
					}
				?>
				<label for="file_subject"><?php echo $this->lang->line('delhi_advocate_name'); ?></label>
				<select class="form-control" name="gov_adocate_delhi" id="gov_adocate_delhi">
					<option value=""><?php echo $this->lang->line('delhi_advocate_name'); ?></option>
					<?php foreach($counselling_list as $row){ ?>
						<option value="<?php echo $row['scm_name_hi']; ?>" <?php  if($this->input->post('adivakta_name')==$row['scm_name_hi']){ echo 'selected';} ?>><?php echo $row['scm_name_hi']." (".$row['scm_court_name'].' '.$row['scm_post_hi'].")"; ?></option>
					<?php } ?>
				</select>
				<?php echo form_error('file_head');?>
			</div>

            <div class="form-group" id="dept_name_show1" >
                <label for="file_department_name" id="other_label"><?php echo $this->lang->line('more_detail'); ?></label>
                <input type="text" name="file_department_name" id="file_department_name" value="<?php echo @$this->input->post('file_department_name') ? $this->input->post('file_department_name') : false ?>" placeholder="<?php echo $this->lang->line('more_detail'); ?>" class="form-control">
                <?php echo form_error('file_department_name');?>
                <p class="form-helper other_hide" id="otherdept1" style="display:none" ><?php echo $this->lang->line('helper_dept_name'); ?></p>
            </div>

<input type="hidden" name="distict_name" id="distict_name"/> <!-- this is come from distric id select text-->

            <!---prastav end--->
				<!-- created by sulbha shrivastava ---->
			<div class="form-group" id="other_crimanal_name" <?php if($this->input->post('file_mark_section_id')== 15){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'crimanal_name') ; echo $display; }else { echo 'style="display:none"'; } ?>  >
                <label for="file_type"><?php echo $this->lang->line('label_crimanal_name'); ?></label> </label>
                <input type ="text" class="form-control" name="crimanal_name" id="crimanal_name" value="<?php if ($this->input->post('crimanal_name')){ echo $this->input->post('crimanal_name');}  ?>" >
            </div>
			<div class="form-group" id="other_crimanal_no" <?php if($this->input->post('file_mark_section_id')== 15 ){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'crimanal_no') ; echo $display;  }else{ ?> style="display:none" <?php } ?> >
                <label for="file_type"><?php echo $this->lang->line('label_crimanal_no'); ?></label> </label>
                <input type ="text" class="form-control" name="crimanal_no" id="crimanal_no" value="<?php if ($this->input->post('crimanal_no')){ echo $this->input->post('crimanal_no');}  ?>">
            </div>
			<div class="form-group" id="other_lokayukt_office_no" <?php if($this->input->post('file_mark_section_id')== 15 ){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'lokayukt_office_no') ; echo $display;  }else{ ?> style="display:none" <?php } ?> >
                <label for="file_type" id="lokayukt_office_no" <?php if($this->input->post('file_mark_section_id')== 15 ){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'lokayukt_office_no_no') ; echo $display;  }else{ ?> style="display:none" <?php } ?> ><?php echo $this->lang->line('label_lokayukt_office_no'); ?></label>
				 <label for="file_type" id="loksevak" <?php if($this->input->post('file_mark_section_id')== 15 ){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'loksevak') ; echo $display;  }else{ ?> style="display:none" <?php } ?> ><?php echo $this->lang->line('label_loksevak'); ?></label> </label>
                <input type ="text" class="form-control" name="lokayukt_office_no" id="lokayukt_office_no" value="<?php if ($this->input->post('lokayukt_office_no')){ echo $this->input->post('lokayukt_office_no');}  ?>">
            </div>
			<div class="form-group" id="other_loksevak" style="display:none">
                <label for="file_type"><?php echo $this->lang->line('label_loksevak'); ?></label> </label>
                <input type ="text" class="form-control" name="loksevak" id="loksevak" value="<?php if ($this->input->post('loksevak')){ echo $this->input->post('loksevak');}  ?>">
            </div>
			<div class="form-group" id="other_police_station_name" <?php if($this->input->post('file_mark_section_id')== 15 ){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'police_station_name') ; echo $display;  }else{ ?> style="display:none" <?php } ?>  >
                <label for="file_type"><span id="police_station" <?php if( $this->input->post('section_file_type')=='प्रकरण वापसी'  ){ } else { echo ' style="display:none;" ';}   ?>  ><?php echo $this->lang->line('label_police_station_name'); ?></span><span id="jail_where" <?php if( $this->input->post('section_file_type')=='दया याचिका'  ){ } else { echo ' style="display:none;" ';}   ?> ><?php echo $this->lang->line('label_jail'); ?></span></label> </label>
                <input type ="text" class="form-control" name="police_station_name" id="police_station_name" value="<?php if ($this->input->post('police_station_name')){ echo $this->input->post('police_station_name');}  ?>">
            </div>
			<div class="form-group" id="other_applicant_name" <?php if($this->input->post('file_mark_section_id')== 15 ){ $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'applicant_name') ; echo $display;  }else{ ?> style="display:none" <?php } ?>  >
                <label for="file_type"><?php echo $this->lang->line('label_applicant_name'); ?></label> </label>
                <input type ="text" class="form-control" name="applicant_name" id="applicant_name" value="<?php if ($this->input->post('applicant_name')){ echo $this->input->post('applicant_name');}  ?>">
            </div>
			<!-- END by sulbha shrivastava ---->
            <div class="form-group">

                <!--Show Petition Fields-->
                <div class="petition_file_cls heads_cls hide_cls">
					<?php if($this->input->post('file_mark_section_id') != 19) { ?>
                    <div class="form-group">
                        <label for="file_subject"><?php echo $this->lang->line('file_head'); ?></label>
                        <select class="form-control" name="file_head" id="file_head">
                            <option value=""><?php echo $this->lang->line('option_select_from'); ?></option>
                            <?php foreach($head_notesheet as $row){ ?>
                                <option value="<?php echo $row['head_id']; ?>" <?php  if($this->input->post('file_head')==$row['head_id']){ echo 'selected';} ?>><?php echo $row['head_code']." - ".$row['head_title']; ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('file_head');?>
                    </div>
					<?php } ?>
                    <div class="form-group hide_for_procescution"  <?php $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'court_type') ; echo $display; ?>>
                        <label for="file_subject"><?php echo $this->lang->line('appeal_petition'); ?> </label>
                        <input type="text" name="courts_name_location" placeholder="Court name" value="<?php echo (@$this->input->post('courts_name_location')) ? @$this->input->post('courts_name_location') : '' ; ?>" class="form-control">
                        <?php // echo form_error('courts_name_location');?>
                    </div>

                    <!--<div class="form-group">
                        <label for="file_subject"><?php//echo $this->lang->line('Party_name_petition'); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="party_petition" value="<?php// echo (@$this->input->post('party_petition')) ? @$this->input->post('party_petition') : '' ; ?>" class="form-control">
                        <?php// echo form_error('party_petition');?>
                    </div>

                    <div class="form-group">
                        <label for="file_subject"><?php// echo $this->lang->line('Party_name_respondent'); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="Party_name_respondent" value="<?php// echo (@$this->input->post('Party_name_respondent')) ? @$this->input->post('Party_name_respondent') : 'मध्य प्रदेश शासन' ; ?>" class="form-control">
                        <?php// echo form_error('Party_name_respondent');?>
                    </div>-->


                       <div class="form-group hide_for_procescution"  <?php $display = fields_show_hide ($this->input->post('file_mark_section_id')  , 'judgement_data') ; echo $display; ?>   >
                        <label for="judgement_data"><?php echo $this->lang->line('judgement_data'); ?> </label>
                        <input type="text" name="judgement_data" id="judgement_data" placeholder="DD-MM-YYYY" value="<?php echo (@$this->input->post('judgement_data')) ? @$this->input->post('judgement_data') : '' ; ?>" class="form-control">
                        <?php // echo form_error('judgement_data');?>
                    </div>


                    <!--<div class="form-group">
                        <label for="file_subject">Case Name <span class="text-danger">*</span></label>
                        <input type="text" name="case_name" value="<?php /*echo (@$this->input->post('case_name')) ? @$this->input->post('case_name') : '' ; */?>" class="form-control">
                        </div>-->

        <!-- <div class="form-group">
                        <label for="from_id"><?php /* echo $this->lang->line('label_from'); */?> <span class="text-danger">*</span></label>
                        <select class="form-control" name="from_id">
                            <option value=""><?php /* echo $this->lang->line('option_select_from'); */?></option>
                            <?php /* foreach(file_from_types() as  $value){
                        echo '<option value="'.$value.'">'.$value.'</option>';
        } */?>
                        </select>
                        <?php /*echo form_error('from_id');*/?>
                    </div>-->
					
                </div>
                <!--End Show Petition Fields-->

            </div>
			
			<!--<div class="form-group">
                <label for="from_id">File Upload (if any)</label>
                <input type="file" name="file_upload"/>
            </div>-->
			 <div class="form-group"    >
                        <label for="old_registared_no"><?php echo $this->lang->line('old_registared_no_label'); ?> </label>
                        <input type="number" name="old_registared_no" id="old_registared_no"  value="<?php echo (@$this->input->post('old_registared_no')) ? @$this->input->post('old_registared_no') : '' ; ?>" class="form-control">
                       
                    </div>

<div class="form-group" id="marktocsu">
                <label for="file_uo_number">Mark File To Scan Unit</label>
                <select  class="form-control mark_csu" name="mark_csu">
                    <option value="" <?php  if($this->input->post('mark_csu')== ''){ echo 'selected';} ?>>अंकित किये हुए अनुभाग को भेजे</option>
                    <option value="62" <?php  if($this->input->post('mark_csu')== '62'){ echo 'selected';} ?>>सेंट्रल स्कैन यूनिट को भेजे</option>
                </select>
            </div>

            <div class="form-group text-center">
                <input type="checkbox" name="check_field" id="check_field">
                <label><?php echo $this->lang->line('check_field'); ?></label><?php echo form_error('check_field');?>
            </div>
			
            <div class="box-footer text-center">
                <button class="btn btn-primary margin" id="submit_btn" disabled onclick="return confirm_generate()" type="submit"><?php echo $this->lang->line('button_submit'); ?></button>
                <button class="btn btn-danger margin" type="reset"><?php echo $this->lang->line('reset_btn'); ?></button>
            </div>
			
            <span class="text-danger"><?php echo $this->lang->line('m_note');?></span>
        </div>
    </div>
</div>
</div><!-- /.box-body -->
</form>
</div><!-- /.box -->
</div>
</section><!-- /.content -->
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var tem_file_to = '<?php  echo isset($postdata["other_file_type"])?$postdata["other_file_type"] :'';?>';
        if(tem_file_to=='2' || tem_file_to=='3'){
            $(".marktosc").hide();
        }
    });
    $(function() {
        $('#file_department_id').change(function(){
            if($('#file_department_id').val() != 'other'){
                $("#dept_name_show").hide();
            } else  {
                $("#dept_name_show").show();
            }  })
    })

    $(function() {
        $('#file_type').change(function(){
            if($('#file_type').val() == 'f'){
                $('#dispaly_num').html("<?php echo $this->lang->line('label_uo_number'); ?>");
                $('#dispaly_date').html("<?php echo $this->lang->line('label_uo_date'); ?>");

            } else if($('#file_type').val() == 'l') {
                $('#dispaly_num').html("<?php echo $this->lang->line('label_letterno_number'); ?>");
                $('#dispaly_date').html("<?php echo $this->lang->line('label_letterno_date'); ?>");

            }else if($('#file_type').val() == 'a') {
                $('#dispaly_num').html("<?php echo $this->lang->line('label_letterno_number'); ?>");
                $('#dispaly_date').html("<?php echo $this->lang->line('label_letterno_date'); ?>");

            }else if($('#file_type').val() == 'r') {
                $('#dispaly_num').html("<?php echo $this->lang->line('label_letterno_number'); ?>");
                $('#dispaly_date').html("<?php echo $this->lang->line('label_letterno_date'); ?>");

            }else if($('#file_type').val() == 'n') {
                $('#dispaly_num').html("<?php echo $this->lang->line('label_notice_number'); ?>");
                $('#dispaly_date').html("<?php echo $this->lang->line('label_notice_date'); ?>");

             }else if($('#file_type').val() == 's') {
                $('#dispaly_num').html("<?php echo 'फ़ाइल क्रमांक'; ?>");
                $('#dispaly_date').html("<?php echo 'फ़ाइल दिनांक'; ?>");

            }
			else if($('#file_type').val() == 'w') {
                $('#dispaly_num').html("<?php echo 'Write petion No.'; ?>");
                $('#dispaly_date').html("<?php echo 'Write petition Date'; ?>");

            } else {
                $('#dispaly_num').html("कोई पहचान दर्ज कीजीये (Name)");
                $('#dispaly_date').html("<?php echo $this->lang->line('label_letterno_date'); ?>");

            }
        })

        $('#other_file_type').change(function(){
            var file_for=$(this).val();
            if(file_for==1){
                $('#file_mark_section_id').html("<?php echo $this->lang->line('label_mark_section'); ?>");
                $('#select_t_s').text("<?php echo $this->lang->line('option_select_section'); ?>");
                $("#mark_to_section,#marktocsu").show();
                $("#mark_to_officer").hide();
                $(".petition_file_cls").show();
                //$("#mark_section_id_slct option[class='officers']").remove();
            } else if(file_for==2) {
                $('#file_mark_section_id').html("<?php echo $this->lang->line('other_mark_to_officer'); ?>");
                $('#select_t_s').text("<?php echo $this->lang->line('select_other_mark_to_officer'); ?>");
                $("#mark_to_section").hide();
                $("#mark_to_officer").show();
                $(".hide_cls").hide();
                $("#marktocsu").hide();
                $(".marktosc").val('');
            }else if(file_for==3) {
                $('#file_mark_section_id').html("<?php echo $this->lang->line('other_mark_to_officer'); ?>");
                $('#select_t_s').text("<?php echo $this->lang->line('select_other_mark_to_officer'); ?>");
                $("#mark_to_section").hide();
                $("#mark_to_officer").show();
                $(".hide_cls").hide();
            }
        })
    })
    $('#check_field').change(function(){
        //alert($this.attr(checked,true));
        if($('#check_field').is(':checked')){
            $("#submit_btn").prop("disabled", false);
        }else{
            $("#submit_btn").prop("disabled", true);
        }
        //document.getElementById("note_field").style.color = "#398439";

    });
    //file offer by rp
    $('#file_offer_by').change(function(){
        if($('#file_offer_by').val() == 'c' || $('#file_offer_by').val() == 'jvn'){
            $("#dist_id_show").show();
            $("#High_court_show, #dept_name_show , #suprem_court_show ,#dept_id_show,#state_id_show").hide();
			$(".delhi_advocate").hide();
            chenge_otherdepname();
        } else if($('#file_offer_by').val() == 'm' || $('#file_offer_by').val() == 'u'){
            $("#dept_id_show , #dept_name_show , #suprem_court_show,#state_id_show").hide();
            $("#High_court_show,#dist_id_show").show();
			$(".delhi_advocate").hide();
            chenge_otherdepname();
        } else if($('#file_offer_by').val() == 'au'){
            $("#dist_id_show , #dept_id_show , #dept_name_show , #suprem_court_show,#High_court_show").hide();
            $("#state_id_show").show();
			$(".delhi_advocate").hide();
        }else if($('#file_offer_by').val() == 'v'){
            $("#dept_name_show , #High_court_show , #suprem_court_show ,#state_id_show").hide();
            $("#dept_id_show,#dist_id_show").show();
			$(".delhi_advocate").hide();
            chenge_otherdepname();
        }else if($('#file_offer_by').val() == 'sc'){
            $("#dist_id_show , #dept_name_show , #High_court_show ,#dept_id_show,#state_id_show").hide();
            $("#suprem_court_show, .delhi_advocate").show();
            chenge_otherdepname();
        } else  {
            $("#dept_id_show,#High_court_show , #suprem_court_show,#state_id_show").hide();
			$(".delhi_advocate").hide();
            $("#dept_name_show,#dist_id_show").show();
            $("#other_label").text('<?php echo $this->lang->line('label_dept_name');?>');
            $("#file_department_name").attr('placeholder','<?php echo $this->lang->line('label_dept_name');?>');
        }
    });

    $('#district_id').change(function(){
        var distict_id = $('#district_id option:selected').text();
        var distictnm = distict_id.split(' ')[0];
       $('#distict_name').val(distictnm);
    });

    $('#court_bench').change(function(){
        var court_bench = $('#court_bench option:selected').val();
        if(court_bench == 1){
            $('#district_id').val('214');
        }else if(court_bench == 2){
            $('#district_id').val('211');
        }else if(court_bench == 3){
            $('#district_id').val('204');
        }else{
            $('#district_id').val('');
        }
    });

    function chenge_otherdepname(){
        $("#other_label").text('<?php echo $this->lang->line('more_detail');?>');
        $("#file_department_name").attr('placeholder','<?php echo $this->lang->line('more_detail');?>');
    }

    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var removebtn = $('.remove_button'); //Remove button selector
        var wrapper = $('.field_wrapper1'); //Input field wrapper
        var incr = 1;
        var x = 1; //Initial field counter is 1

        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter
                var fieldHTML = '<div class="row" id="TextBoxDiv' + x + '"><div class="col-xs-4 casetype"><select name="files_other_feilds[case_type]['+incr+']" class="form-control"><option value="">Select type</option><?php foreach(case_name() as $case){ ?><option value="<?php echo $case ?>"><?php echo $case ?></option><?php } ?></select></div><div class="col-xs-4"><input type="text" name="files_other_feilds[case_no]['+incr+']" placeholder="Number" value="" class="form-control"></div><div class="col-xs-3"><select Name="files_other_feilds[case_year]['+incr+']" class="form-control"><?php for ($x=date("Y"); $x>2000; $x--) { echo'<option value="'.$x.'">'.$x.'</option>';  } ?></select></div><div class="col-xs-1"></div>  </div>'; //New input field html
                $(wrapper).append(fieldHTML); // Add field html
                incr++
            }
        });

        $(removebtn).click(function () {
            if(x > 1 && incr >  1) {
                $("#TextBoxDiv" + x).remove();
                x--;
                incr--;
            }
        });
    });
</script>
