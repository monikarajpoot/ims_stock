<link href="<?php echo base_url(); ?>themes/e_file_style.css" rel="stylesheet" type="text/css" />	

 <?php $year = $this->input->get('year') != '' ? $this->input->get('year') : date('Y'); ?>
 <!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		   <?php echo $title; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><?php echo $title; ?></li>
		</ol>
	</section>

    <!-- Main content -->
    <section class="content">
        <div class="row">          
           <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border no-print">
					  <h3 class="box-title"><?php echo $sub_title; ?></h3>
					  <div class="box-tools pull-right">
						<!--<a href="<?php echo base_url(); ?>efile/<?php// echo $draft_data['draft_file_id']; ?>" class="btn btn-flat btn-danger" ><i class="fa fa-compress"></i> Back</a>-->
						<button class="btn btn-flat btn-danger" onclick="goBack()"><i class="fa fa-compress"></i> Back</button>
					  </div>
					</div><!-- /.box-header -->
					<div class="box-body no-padding">
						<div class="mailbox-read-info no-print">
							<?php $emp_id = $draft_data['draft_sender_id']; 
							$file_details = getFiledata($draft_data['draft_file_id']);
							?>
							<h3><?php echo $draft_data['draft_subject']; ?></h3>
							<h5><i class="fa fa-user"></i> <?php if($emp_id != null) { echo getemployeeName($emp_id, true).' - '. get_employee_role($emp_id); ?> <i class="fa fa-send"></i> <?php echo getemployeeName($draft_data['draft_reciever_id'], true);?> - <?php echo get_employee_role($draft_data['draft_reciever_id']); } ?> <span class="mailbox-read-time pull-right"><i data-toggle="tooltip" title="ड्राफ्ट बनाई दिनांक"><?php echo get_datetime_formate($draft_data['draft_create_date']); ?></i> - <i data-toggle="tooltip" title="ड्राफ्ट पूर्ण  या कर्यवाही दिनांक"><?php echo get_datetime_formate($draft_data['draft_update_date']); ?></i></span></h5>
						</div><!-- /.mailbox-read-info -->
						<div class="mailbox-controls with-border text-center no-print">
							<div class="btn-group">
							</div><!-- /.btn-group -->
							<button class="btn btn-default btn-sm no-print" data-toggle="tooltip"  onclick="printDiv('forPrint')" title="Print"><i class="fa fa-print"></i></button>
						</div><!-- /.mailbox-controls -->
						<?php $type = $draft_data['draft_type']; 
						$panji_number = get_panji_no($file_details[0]['file_id'],$file_details[0]['file_mark_section_id'],$file_details[0]['file_created_date']);
						$subject = $file_d = $style = '';
							if($type == 'n' || $type == 'odn'){ 
							$style = 'padding:2% 5%; background-color:#CCFFCC;';
							$subject = $draft_data['draft_subject'];
							if($draft_data['notesheet_id'] == null){
								$subject = '<p style="padding-left:15%;" id="Divheader"><b><em class="no-print">विषय:- </em>'.$draft_data['draft_subject'].'</b></p><p style="text-align: center;">------</p>';
								if($draft_data['draft_id'] != '616'){ // only for ps printing cS file 
									$file_d = '<p style="text-align: center;"><b>पंजी क्रमांक  '.$panji_number.', <em style="margin-left:10%;"></em> भोपाल, दिनांक '.get_date_formate($file_details[0]['file_mark_section_date']).'</b></p><p style="text-align: center;">------</p>';
								}
							}
						}else{
							$style = 'padding:2% 5%; background-color:#eee;';					
							}		
						?>
						<div class="mailbox-read-message no-padding" id="forPrint">						   
							<div  style="<?php echo $style; ?>; ">
								 <table width="100%"><thead class="onlyprint">
								<?php if($subject != ''){ ?><tr><th style="padding:8% 0% 5% 15% !important;"><?php echo $subject; ?></th></tr><?php } ?>
									</thead>
								<tbody><tr><td>
									<div class="no-print">
									 <?php echo $draft_data['notesheet_id'] == null ? $subject : '' ; ?>
									</div>						
										<?php echo '<div class="no-print">'.$subject.'</div>';
										echo $file_d;
										if($type == 'n' || $type == 'odn'){
										$all_drafts = get_draft_log_data($draft_data['draft_id']);	
										foreach($all_drafts as $drafts){
											//$span = (get_employee_role($drafts->draft_log_creater, true) > 9 && $type == 'n') ? '<span class="no-print" title="'.getemployeeName($drafts->draft_log_creater, true).'"><img src="'.base_url().'themes/admin/dist/img/avatar5.png" class="user-image" height="35px" alt="User Image"></span>' : '' ;
											$span_name = (get_employee_role($drafts->draft_log_creater, true) > 9 && $type == 'n') ? getemployeeName($drafts->draft_log_creater, true) : '' ; 
											echo '<div class="row" style="margin:1px; background-color:#CCFFCC;">';
											echo '<div class="col-md-2 no-print"></div>';
											echo '<div class="col-md-8 notesheet_margin">';
											echo filter_string($drafts->draft_content); 
											//if(get_employee_role($drafts->draft_log_creater, true) < 9 && $type == 'n'){
											if($type == 'n' || $type == 'odn'){	
												$verify_status =  verify_digital_sinature($drafts->draft_log_id,md5($drafts->draft_content));
                                                $class_no = '';
                                                $role_show_fdf_hi = $role_show_fdf = get_employee_role($drafts->draft_log_creater);
                                                if($verify_status){
                                                    $class_no = "class='no-print'";
                                                    $role_show_fdf = get_employee_role($drafts->draft_log_creater,false,true);
                                                }
												if($type == 'odn'){
															echo '<div class="pull-right">'.$verify_status.'<br/></div>';
												} else {
													echo '<div class="pull-right">'.$verify_status.'
													<b '.$class_no.'>('.getemployeeName($drafts->draft_log_creater, true, false).')<br/></b>
													<b><u><span class="no-print">'.$role_show_fdf_hi.'</span><span class="onlyprint">'.$role_show_fdf.'</span></u></b></div><div class="clearfix"></div>';
													if($draft_data['draft_id'] != '616'){ // only for ps printing cS file
														if($drafts->draft_log_creater != $drafts->draft_log_sendto){
														echo '<div class="pull-left">';
														if(check_so_on_leave($drafts->draft_log_creater,$drafts->draft_log_sendto) != null){
															echo '<b><u>अनुभाग अधिकारी अवकाश पर </u></b>';
														} 
														echo '<b><u><br/>'.get_employee_role($drafts->draft_log_sendto).'(';
														echo  get_employee_role($drafts->draft_log_sendto, true) == 3 ? 'विधि' : getSectionName($file_details[0]['file_mark_section_id']);
														echo ')</u></b></div>';
													}
												}
												}												
												if($verify_status!=''){
													echo '<script> $(".singed_verify").addClass("displayblock"); $(".singed_verify").text("('.DIGITALLY_SINGED_NOTE.')");</script>';
												}
											}
											echo '</div>';
											echo '<div class="col-md-1"></div>';
											echo '</div>';
											echo '<hr class="no-print"/>';
											
										}
									} else{
										$draft_data = get_draft($draft_data['draft_id']);	
										echo filter_string($draft_data['draft_content_text']);
										$cor_draft_log = get_draft_log_data($draft_data['draft_id'], true, '','');
										$verify_status = verify_digital_sinature($cor_draft_log[0]->draft_log_id,md5($cor_draft_log[0]->draft_content));
										echo '<div class="pull-right">&nbsp;'.$verify_status.'</div>';
										//if($verify_status!=''){
											//echo '<script> $(".singed_verify").addClass("displayblock"); $(".singed_verify").text("('.DIGITALLY_SINGED_NOTE.')");</script>';
											//echo '<p style="position:fix; bottom:1px; font-size:8px;">नोट:- '.DIGITALLY_SINGED_NOTE.'</p>';
										//}
								
									}
								?>
								 </td></tr></tbody>
								<tfoot><tr><td></td></tr></tfoot>
								</table>
							</div>
							
							<!--<footer class="onlyprint">नोट:- यह पेज डिजिटली हस्ताक्षर हुआ है अतः यह इ-फाइल के द्वारा ही वेलिड है|</footer>-->
						</div><!-- /.mailbox-read-message -->
					</div><!-- /.box-body -->
					<div class="box-footer">
					  
					</div><!-- /.box-footer -->
					<div class="box-footer">
						<button class="btn btn-warning" onclick="printDiv('forPrint')"><i class="fa fa-print"></i> Print</button>
					</div><!-- /.box-footer -->
				</div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
		<div class="row no-print">
            <div class="col-md-12">
				<div class="box box-danger collapsed-box">
					<div class="box-header with-border"  data-widget="collapse" style="cursor:pointer">
					  <h3 class="box-title"><?php echo $this->lang->line('lbl_draft_log'); ?></h3>
					  <div class="box-tools pull-right">
						<button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
					  </div>
					</div><!-- /.box-header -->
					<div class="box-body">
						<?php if(isset($draft_data_log) && $draft_data_log != '') { ?>
							<table class="dataTable table table-hover">
								<thead>
								<tr><th><?php echo $this->lang->line('serial_number'); ?> </th>
								<th><?php echo $this->lang->line('title_sent_to'); ?></th>
								<th><?php echo $this->lang->line('title_sent_from'); ?></th>
								<th><?php echo $this->lang->line('title_when_create'); ?></th><th>
								</th></tr>
								</thead>
								<tbody>
								<?php $i = 1; foreach($draft_data_log as $key=> $data){ ?>
									<tr>
									<td><?php echo $i;  ?></td>
									<td><?php echo getemployeeName($data->draft_log_creater, true) .' - '.get_employee_role($data->draft_log_creater); ?></td>
									<td><?php if($data->draft_log_sendto != null) { echo getemployeeName($data->draft_log_sendto, true) .' - '.get_employee_role($data->draft_log_sendto); }?></td>
									<td><?php echo $data->draft_log_create_date; ?></td>
									<td><a href="<?php echo base_url().'/draft/draft/draft_compare/'.$data->draft_log_id.'/'.$draft_data['draft_id']; ?>" ><i class="fa fa-eye"></i> <?php echo $this->lang->line('lbl_draft_compare'); ?></a></td>
									</tr>
								<?php $i++; } ?>
								</tbody>
							</table>
							<br/>
							
						 <?php } else {
							echo 'No data found';
						}?>
					</div>
					<?php if($draft_data['draft_parent_id'] != null) { ?>
					<div class="box-footer">
						<p class="bg-info" >यह ड्राफ्ट  <a href="<?php echo base_url(); ?>draft/draft/draft_viewer/<?php echo $draft_data['draft_parent_id']; ?>">[<i class="fa fa-eye"></i> ड्राफ्ट ]</a> से पुनः खोला गया| </p>
					</div>
					<?php } ?>
				</div>
			</div>
		</div> 
		<div class="row no-print">
            <div class="col-md-12">
				<div class="box box-warning collapsed-box">
					<div class="box-header with-border"  data-widget="collapse" style="cursor:pointer">
					  <h3 class="box-title"><?php echo $this->lang->line('lbl_draft_timeline'); ?></h3>
					  <div class="box-tools pull-right">
						<button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
					  </div>
					</div><!-- /.box-header -->
					<div class="box-body" style="display: none;">
						<ul class="timeline">
							<?php if(isset($draft_data_log) && $draft_data_log != '') { ?>
								<?php $i = 1; foreach($draft_data_log as $key=> $data){ ?>
									<!-- timeline time label -->
									<li class="time-label">
										<span class="bg-green">
											<?php echo get_datetime_formate($data->draft_log_create_date); ?>
										</span>
									</li>
									<!-- /.timeline-label -->

									<!-- timeline item -->
									<li>
										<!-- timeline icon -->
										<i class="fa fa-comments bg-yellow"></i>
										<div class="timeline-item">
											<span class="time"><i class="fa fa-clock-o"></i> <?php echo get_timeago($data->draft_log_create_date); ?></span>

											<h3 class="timeline-header"><a href="#"><?php echo getemployeeName($data->draft_log_creater, true) .' - '.get_employee_role($data->draft_log_creater); ?></a> <?php echo $this->lang->line('created_by'); ?></h3>

											<div class="timeline-body">
												<?php echo $data->draft_content; ?>
											</div>
										</div>
									</li>
									<?php $i++; } ?>
									<li>
									  <i class="fa fa-clock-o bg-gray"></i>
									</li>
							 <?php } else {
								echo 'No data found';
							}?>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </section><!-- /.content -->
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- 
	Include the WYSIWYG javascript files
-->
<script type="text/javascript" src="<?php echo base_url()?>themes/ckeditor/ckeditor.js"></script>
<!-- 
	Attach the editor on the textareas
-->
<script type="text/javascript">
	CKEDITOR.replace('compose-textarea');
</script>
<script src="<?php echo base_url(); ?>themes/e_file_style.js" type="text/javascript"></script>