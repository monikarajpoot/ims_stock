  <link href="<?php echo base_url(); ?>themes/e_file_style.css" rel="stylesheet" type="text/css" />
 <?php $emp_role_lvl = get_emp_role_levele(); ?> 
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
		<?php $draft_ids = null;
		$show_r	 = base_url().'view_file/document_path/index/'.$file_data['file_id'];
		if($file_data['final_draft_id'] != '' || $file_data['final_draft_id'] != 0){
			$draft_ids = explode(',',$file_data['final_draft_id']);
		} ?>
  <?php
  $role_id_s = empdetails($file_data['file_sender_emp_id']); // sender emp role
  ?>
        <!-- Main content -->
<section class="content">
    <div class="row">
		<div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div style="float:left"><h3 class="box-title"><?php echo $title;  //emp_session_id()?></h3></div>
                    <div style="float:right">
					   <?php if($this->session->userdata("emp_id") == emp_session_id() && $emp_role_lvl['emprole_level'] <= 6){ ?>
						<a href="<?php echo base_url();?>e-files/efile_sign"><button class="btn btn-sm btn-success" style="height:35px;font-size:14px;"><span class="blink_fast">फ़ाइल पर हस्ताक्षर जोड़ें   </span></button></a>
					   <?php } ?>
                        <button class="btn btn-sm btn-warning" onclick="goBack()"><?php echo $this->lang->line('Back_button_label'); ?></button>
                    </div>
                </div><!-- /.box-header -->
				<!--<div class="box-body">
					<?php /*if (isset($file_data)) { */?>
						<p>
							पंजी क्रमांक :- <b><?php /* echo get_panji_no($file_data['file_id'],$file_data['file_mark_section_id'],$file_data['file_created_date']);  */?></b><br/>
							File Date :-  <?php /*echo $file_data['file_uo_or_letter_date'] */?><br/>
							File Subject :-  <?php /*echo $file_data['file_subject'] */?>
							</p>
					<?php /*} */?>
				</div>-->
			</div>
		</div>
	</div>
<?php if (isset($file_data)) { ?>

    <div class="box box-primary"> <!--for hide div on load use : - class="collapsed-box"-->
        <div class="box-header with-border" data-widget="collapse" style="cursor:pointer">
            <i class="fa fa-plus"></i>
            <a><h3 class="box-title">नस्ती को अगले लेवल  पर भेजे  |<!--भेजने के लिये यहा क्लिक करे | --><b> पंजी क्रमांक  : <?php $rrt = all_getfilesec_id_byfileid($file_data['file_id']); ?></b>
            <?php    foreach($rrt as $rrt1){
                    $sechi = explode('(',getSection($rrt1['section_id']));
                    echo " ".$rrt1['section_number'] ." - <span style='font-size: 14px'>".$sechi['0']."</span> , ";
                } ?></h3>
				<span style="float:right"> File id : <?php echo $file_data['file_id']; ?></span></a>
            <!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php $views = show_view_as_lvl(); $this->load->view("$views"); ?>

        </div><!-- /.box-body -->
    </div>
<?php } ?>


<div class="row" id="eFileTemplate">
        <div class="col-md-4">
			<div class="box box-primary">
            <div class="box-header  with-border">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title"><?php echo $this->lang->line('efile_correspoandance'); ?></h3>
                </div><!-- /.box-header -->
            <div class="box-body panel-group" id="accordion" style="overflow-y:auto;">
                    	<?php  if($draft_ids != null || $draft_ids != 0){
							echo '<div class="" style="position:relative; background:#ffccdd;">';
							echo ' <ul class="todo-list ui-sortable">';
							$i = 1; foreach($draft_ids as $draft_id){
								$draft_data = get_draft($draft_id);
								if(!empty($draft_data) && $draft_data['draft_type'] != 'n'){
										//$draft_deatils = $draft_data; 
									$cor_draft_log = get_draft_log_data($draft_data['draft_id'], true, '','');
								 ?>								

								  <div class="panel panel-<?php echo $draft_data['draft_type'] == 'odn' ? 'warning' : 'default'; ?>">
									<div class="panel-heading">
									  <h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $draft_data['draft_id']; ?>">

										<?php echo $i.')'.draft_type($draft_data['draft_type']); ?>										

										</a>
										
										 <div class="pull-right" style="clear:both">
											<?php if(!empty($draft_data) && ($file_data['file_hardcopy_status'] == 'received' || $file_data['file_hardcopy_status'] == 'working' ) && $file_data['file_received_emp_id'] == $this->session->userdata("emp_id") ){
											if($draft_data['draft_reciever_id'] == $this->session->userdata("emp_id") && single_file_digitally_sign_or_not($cor_draft_log[0]->draft_log_id,true) == 0 ) { ?>
												<?php if($draft_data['notesheet_id'] != null){ ?>
													<a href="<?php echo base_url().'admin_notesheet_master/view_file_notesheet/'; ?><?php echo $draft_data['notesheet_id'] . '/' . $file_data['file_from_section_id'] . '/' . $file_data['file_id']; ?>"   class="bg-warning"><i class="fa fa-edit"> Edit</i></a>
												<?php } else { ?>
													<a href="<?php echo base_url().'draft/create_fileto_draft/'.$file_data['file_id'].'/'.$draft_data['draft_type'].'/'.$draft_data['draft_id']; ?>#edit" ><i class="fa fa-edit"> Edit</i></a>
												<?php } if($file_data['file_return'] == '0' &&  $draft_data['draft_creater_emp_id'] == $this->session->userdata("emp_id")){ ?>
													<a href="<?php echo base_url().'draft/delete_draft/'.$draft_data['draft_id'].'/'.$file_data['file_id']; ?>" onclick="return confirm('क्या आप आर्डर डिलीट करना चाहते है');" class="bg-danger" title="डिलीट करे"><i class="fa fa-remove"></i> Delete</a>
												<?php } ?>
											<?php }
											}									?>
											<a href="<?php echo base_url(); ?>draft/draft_viewer/<?php echo $draft_data['draft_id']; ?>/1" ><i class="fa  fa-arrows-alt"></i> Full </a>
										</div>

									  </h4>
									</div>
									<div id="collapse_<?php echo $draft_data['draft_id']; ?>" class="panel-collapse collapse <?php echo $i == 1 ? 'in' : ''; ?>">
									  <div class="panel-body" style='height: 450px;overflow-y: auto'>
									  <?php echo $draft_data['draft_content_text']; br();
											$verify_status = verify_digital_sinature($cor_draft_log[0]->draft_log_id,md5($cor_draft_log[0]->draft_content));
											echo '<div class="pull-right">&nbsp;'.$verify_status.'</div>';
											if($verify_status!=''){
												echo '<p style="position:fix; bottom:1px; font-size:8px;"> नोट:- '.DIGITALLY_SINGED_NOTE.'</p>';
											}
										?>
									  </div>
									</div>
								  </div>


									<?php

								$i++; } 

							}
							echo '</ul>';
						echo '</div>';						






					} else {
						echo 'No list found!';
					} ?>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
				<?php if($file_data['file_return'] != '2' && ($file_data['file_hardcopy_status'] == 'received' || $file_data['file_hardcopy_status'] == 'working' ) && $file_data['file_received_emp_id'] == $this->session->userdata("emp_id") && ($emp_role_lvl['emprole_level'] < 7 || $emp_role_lvl['emprole_level']==13  )) {  ?>
					<?php if($emp_role_lvl['emprole_level']==13 ){ ?>
						<a href="<?php echo $show_r; ?>"  class="btn margin btn-sm btn-twitter" data-toggle="tooltip" data-original-title="Add doccument"><i class="fa fa-plus"></i> <?php echo $this->lang->line('btn_add_efile_corespodance'); ?></a>
						<a href="<?php echo $show_r; ?>?temp=y&type=o"  class="btn margin btn-sm btn-twitter" data-toggle="tooltip" data-original-title="Add doccument"><i class="fa fa-plus"></i> <?php echo $this->lang->line('btn_add_efile_corespodance_template'); ?></a>
					<?php } $is_odn= get_draft($draft_ids,'odn'); 
						if(empty($is_odn)){  ?>
							<a href="<?php echo $show_r; ?>?temp=y&type=odn" class="btn btn-success" data-toggle="tooltip" data-original-title="Add doccument"><i class="fa fa-plus"></i> बाह्य विभाग नोटशीट</a>
					<?php }  
					}?>				
			   </div>
            </div>
        </div><!-- /.col -->
		<div class="col-md-4">
<div class="box box-success">
                <div class="box-header with-border">
				 <i class="ion ion-clipboard"></i>
                  <h3 class="box-title"><?php echo $this->lang->line('efile_notesheet'); ?></h3>
                </div><!-- /.box-header -->
            <div class="box-body" style="overflow-y:auto;">
					<?php if($draft_ids != null || $draft_ids != 0){
						$draft_data = get_draft($draft_ids,'n',false,true);
						//$draft_data = get_draft($draft_ids,'n');
							if(!empty($draft_data)){
								foreach($draft_data as $ky=>$notesheet){
									$subject = $file_d = $style = '';
									$type = $notesheet->draft_type;
									$panji_number = get_panji_no($file_data['file_id'],$file_data['file_mark_section_id'],$file_data['file_created_date']);
									if($type == 'n'){
										$style = 'padding:2% 0%; background-color:#CCFFCC;';
										if( $notesheet->notesheet_id == null){
											$subject = '<p style="padding-left:15%;"><b>विषय:- '.$notesheet->draft_subject.'</b></p><p style="text-align: center;">------</p>';
											$file_d = '<p style="text-align: center;"><b>पंजी क्रमांक  '.$panji_number.', <em style="margin-left:10%;"></em> भोपाल, दिनांक '.get_date_formate($file_data['file_mark_section_date']).'</b></p><p style="text-align: center;">------</p>';
										}
									} else{
										$style = 'padding:2% 13%; background-color:#eee;';
									}
						 ?>
					  <div class="mailbox-read-message no-padding" id="for-print">
											<div  style="<?php echo $style; ?>; "  >
												<?php echo $subject;
													echo $file_d ;
													$all_drafts = get_draft_log_data($notesheet->draft_id, true, '5','');													
													$all_drafts = array_reverse($all_drafts);
                                                    $draft_log_count = count($all_drafts);
                                                    $draft_log_end = end($all_drafts);
													foreach($all_drafts as $drafts){
														$span = (get_employee_role($drafts->draft_log_creater, true) > 9 && $type == 'n') ? '<img class="direct-chat-img" src="'.base_url().'themes/admin/dist/img/avatar5.png" class="user-image" alt="message user image" title="'.getemployeeName($drafts->draft_log_creater, true).'">' : '' ;
														$span_name = (get_employee_role($drafts->draft_log_creater, true) > 9 && $type == 'n') ? getemployeeName($drafts->draft_log_creater, true) : '' ; ?>
												<div class="direct-chat-msg">
												<?php if($draft_log_count == 1) {?>
													<div class="direct-chat-info clearfix">
															<span class="direct-chat-name pull-left">
															<?php  if($drafts->draft_log_creater == $this->session->userdata("emp_id") && ($file_data['file_hardcopy_status'] == 'received' || $file_data['file_hardcopy_status'] == 'working' ) && $file_data['file_received_emp_id'] == $this->session->userdata("emp_id")  && $emp_role_lvl['emprole_level' ]== 13){ ?>
																	<a href="<?php echo base_url().'draft/delete_draft_log/'.$drafts->draft_log_id .'/'.$file_data['file_id']; ?>" onclick="return confirm('क्या आप नोटशीट डिलीट करना चाहते है');"  class="btn btn-xs btn-danger" title="डिलीट करे"><i class="fa fa-remove"></i></a>
															<?php } ?>
															</span>                                    
													</div>
                                                            <?php } else if($draft_log_end->draft_log_id == $drafts->draft_log_id){ ?>
                                                        <div class="direct-chat-info clearfix">
															<span class="direct-chat-name pull-left">
															<?php  if($drafts->draft_log_creater == $this->session->userdata("emp_id") && ($file_data['file_hardcopy_status'] == 'received' || $file_data['file_hardcopy_status'] == 'working' ) && $file_data['file_received_emp_id'] == $this->session->userdata("emp_id")  && $emp_role_lvl['emprole_level' ]== 13){ ?>
                                                                <a href="<?php echo base_url().'draft/draft_log_hide/'.$drafts->draft_log_id .'/'.$drafts->draft_log_creater; ?>" onclick="return confirm('क्या आप इस टीप डिलीट करना चाहते है');"  class="btn btn-xs btn-danger" title="इस टीप को डिलीट करे"><i class="fa fa-remove"></i></a>
                                                            <?php } ?>
															</span>
                                                        </div>
                                                            <?php } ?>
													<?php //echo $span ; ?>
													<div class="logExpand direct-chat-text" data-toggle="modal" data-target="#expandModel" data-log_id="<?php echo $drafts->draft_log_id ;?>" style="height:120px;overflow-y:auto;background:none;cursor:zoom-in;margin: 5px 0 0 25px;">
													<?php echo filter_string($drafts->draft_content);
														//if(get_employee_role($drafts->draft_log_creater, true) < 9 && $type == 'n'){
														if($type == 'n'){
														 $verify_status =  verify_digital_sinature($drafts->draft_log_id,md5($drafts->draft_content));
															$class_no = '';
                                                $role_show_fdf = get_employee_role($drafts->draft_log_creater);
                                                if($verify_status){
                                                    $class_no = "class='hide'";
                                                    $role_show_fdf = get_employee_role($drafts->draft_log_creater,false,true);
                                                }
															
															echo '<div class="pull-right" style="text-align: center;">&nbsp;'.$verify_status.'
															<b  '.$class_no.'>('.getemployeeName($drafts->draft_log_creater, true, false).')<br/></b>
															<b>'.$role_show_fdf.'</b></div><div class="clearfix"></div>';
															
															if($drafts->draft_log_creater != $drafts->draft_log_sendto){
																echo '<div class="pull-left">';
																if(check_so_on_leave($drafts->draft_log_creater,$drafts->draft_log_sendto) != null){
																	echo '<b><u>अनुभाग अधिकारी अवकाश पर </u></b>';
																}
																echo '<b><u><br/>'.get_employee_role($drafts->draft_log_sendto).'(';
																echo  get_employee_role($drafts->draft_log_sendto, true) == 3 ? 'विधि' : getSectionName($file_data['file_mark_section_id']);
																echo ')</u></b></div>';
															}												
															
														} ?>
													</div>
											   </div>
												<?php
													   $last_logid = $drafts->draft_log_id; // use for return files
													}	?>
											</div>
									</div><!-- /.mailbox-read-message -->
						<?php } } else {
							echo 'No Notesheet found!';
						}
					} else {
						echo 'No data found!';
					}
						?>
                </div><!-- /.box-body -->
				<div class="box-footer">
					<?php  
						$object_array_draft = end($draft_data);  
						$draft_data = (array) $object_array_draft;	
						if(!empty($draft_data)) {
						$verify_logid = verify_logid_sinature($last_logid); // only use for return files
						if( ($file_data['file_hardcopy_status'] == 'received' || $file_data['file_hardcopy_status'] == 'working' ) && $file_data['file_received_emp_id'] == emp_session_id()){
							if($draft_data['draft_status'] == 2 && $draft_data['draft_reciever_id'] == emp_session_id()) { ?>
								<a href="<?php echo base_url().'draft/create_fileto_draft/'.$file_data['file_id'].'/'.$draft_data['draft_type'].'/'.$draft_data['draft_id']; ?>" class="btn btn-primary"><?php echo $this->lang->line('btn_full_edit'); ?></a>
							<?php } if($draft_data['draft_status'] == 3 && $draft_data['draft_reciever_id'] == emp_session_id() && $draft_data['draft_sender_id'] == emp_session_id()) { ?>
                        <a href="<?php echo base_url().'draft/create_fileto_draft/'.$file_data['file_id'].'/'.$draft_data['draft_type'].'/'.$draft_data['draft_id']; ?>" class="btn btn-primary"><?php  echo @$verify_logid != '' ? '<span data-original-title="आपका लिखा हुआ कथन Digital sign हो चुका है | अत: पुनः नया कथन जोड़े |" data-toggle="tooltip">पुनः '.$this->lang->line('btn_add_efile_notesheet').'<span>' : $this->lang->line('btn_re_edit'); ?></a>
							<?php } if($draft_data['draft_status'] == 2 && $draft_data['draft_reciever_id'] == emp_session_id() && $draft_data['notesheet_id'] != '' && $emp_role_lvl['emprole_level'] == 13) {?>
								<a href="<?php echo base_url().'admin_notesheet_master/view_file_notesheet/'; ?><?php echo $draft_data['notesheet_id'] . '/' . $file_data['file_from_section_id'] . '/' . $file_data['file_id']; ?>?ed=y"   class="btn btn-primary"><i class="fa fa-edit"><?php echo $this->lang->line('btn_notesheet_edit'); ?></i></a>
                    <?php } ?>
                        <?php  if($draft_data['draft_status'] == 3 && $draft_data['draft_is_finalize'] == 0 && $draft_data['draft_reciever_id'] == emp_session_id() && $draft_data['draft_sender_id'] != emp_session_id()) {  ?>
                            <div class="col-xs-4">
                                <div class="input-group"><a href="<?php echo base_url().'draft/create_fileto_draft/'.$file_data['file_id'].'/'.$draft_data['draft_type'].'/'.$draft_data['draft_id']; ?>" class="btn btn-primary"><?php echo $this->lang->line('btn_add_efile_notesheet'); ?></a></div>
                            </div>
                        <?php if($draft_data['draft_reciever_id'] == emp_session_id() && $file_data['file_received_emp_id'] == emp_session_id()) {?>
                            <div class="col-xs-8">
								<?php if($emp_role_lvl['emprole_level'] <= 6){ ?>
									<div class="input-group">
										<select class="form-control" id="auto_add_draft_value">
											<option <?php echo @$role_id_s[0]['role_id'] > $this->session->userdata("user_role") ? "selected" : false ; ?>>अनुमोदनार्थ |</option>											
											<option <?php echo $this->session->userdata("user_role") == '3' ? "selected" : false ; ?>>अनुमोदित |</option>
											<option <?php echo $this->session->userdata("user_role") == '7' ? "selected" : false ; ?>>अनुमोदनार्थ एवं आदेशार्थ |</option>
											<option <?php echo $this->session->userdata("user_role") == '5' ? "selected" : false ; ?>>यथा प्रस्तावित|</option>
											<option>आदेश की प्रतियां प्रेषित की जावे |</option>
											<option>आदेश की प्रतियां हस्ताक्षार्थ प्रेषित है |</option>
											<option>नस्ती पर ई-हस्ताक्षर अंकित नहीं है |</option>
											<option <?php echo $this->session->userdata("user_role") == '4' ? "selected" : false ; ?>>य. प्र. अनुमोदित |</option>
											<option>नस्ती पुनः मतार्थ प्रस्तुत है |</option>
											<option>हस्ताक्षर किये गए |</option>
											<option>कार्यवाही करें |</option>
											<option <?php echo @$role_id_s[0]['role_id'] < $this->session->userdata("user_role") && $this->session->userdata("user_role") == '8' ? "selected" : false ; ?>>देखा गया |</option>
										</select>
									<span class="input-group-btn">
										<button type="button" value="" data-loading-text="Submiting..." onclick="addautodraft('<?php echo $draft_data['draft_id']; ?>')" class="btn btn-primary" id="auto_add_draft">Auto add</button>
									</span>
									</div>
								<?php } ?>
                            </div>
                        <?php } ?>
                        <?php } ?>
                <?php  }  ?>
						
					<?php }

					if(check_notesheet_exists($file_data['file_id']) == NULL){
						if(($file_data['file_return'] == '0' || $file_data['file_return'] == '1') && $file_data['file_received_emp_id'] == $this->session->userdata("emp_id") && ($file_data['file_hardcopy_status'] == 'received' || $file_data['file_hardcopy_status'] == 'working' ) && $emp_role_lvl['emprole_level']==13){
							echo '<a href="'. base_url().'draft/create_fileto_draft/'.$file_data['file_id'].'/n" class="btn btn-success" data-toggle="tooltip" data-original-title="Add doccument"><i class="fa fa-plus"></i> '.$this->lang->line('btn_add_efile_notesheet').'</a>';
							echo '<a href="'.$show_r.'?temp=y&type=n"  class="btn margin btn-sm btn-success" data-toggle="tooltip" data-original-title="Add doccument"><i class="fa fa-plus"></i> '.$this->lang->line('btn_add_efile_notesheet_template').'</a>';
						}
					 }else{
						//echo '<a href="'. base_url().'draft/create_fileto_draft/'.$file_data['file_id'].'/n" class="btn btn-success" data-toggle="tooltip" data-original-title="Add doccument"><i class="fa fa-plus"></i> '.$this->lang->line('btn_add_efile_notesheet').'</a>';
						if(($file_data['file_return'] == '0' || $file_data['file_return'] == '1') && $file_data['file_received_emp_id'] == $this->session->userdata("emp_id") && ($file_data['file_hardcopy_status'] == 'received' || $file_data['file_hardcopy_status'] == 'working' ) && $emp_role_lvl['emprole_level']==13){
							echo '<a href="'.$show_r.'?temp=y&type=n"  class="btn margin btn-sm btn-success" data-toggle="tooltip" data-original-title="Add doccument"><i class="fa fa-plus"></i> '.$this->lang->line('btn_add_efile_notesheet_template').'</a>';
						}	
					?>	
						<a href="<?php echo base_url(); ?>draft/draft_viewer/<?php echo $draft_data['draft_id']; ?>/1" class="btn btn-flat btn-success margin"><i class="fa  fa-arrows-alt"></i> <?php echo $this->lang->line('btn_full_details'); ?></a>
					<?php } ?>
				</div>
            </div><!-- /. box -->
        </div><!-- /.col -->
		<div class="col-md-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $this->lang->line('efile'); ?></h3>
                </div><!-- /.box-header -->
            <div class="box-body" style="">
                <div class="col-md-12">
                    <?php 	if( !empty($file_data['scan_id'])){ ?>
						<div class="form-group">
							<label for="section no"><?php echo $this->lang->line("all_scaned_file"); ?> :- </label>
						</div>
						<?php } ?>
                    <?php 	if(!empty($file_data['scan_id'])){ ?>
                        <div class="form-group">
                            <ul>
                                <?php if(isset($file_data['scan_id']) && !empty($file_data['scan_id'])){
                                    $scan_ids = unserialize($file_data['scan_id']);
                                    //pre($scan_ids);
                                    $scan_id_values = get_scan_files($scan_ids);
                                    foreach($scan_id_values as $scanid){

                                        if(!empty($scanid)){
                                            $scan_file_details = scan_file_details($scanid);
                                            $file_path = $scan_file_details['scan_file_path'];
                                            ?>
                                            <li class="my_scan_file_2" style="text-align:left; "><a onclick="open_file_in_viewer( <?php echo $scanid ;?>,'<?php echo $file_path; ?>')" style="cursor:pointer"><?php echo get_scan_file_name($scanid); ?></a><br/><button type="button" onclick="open_model2_addbookmark(<?php echo $scanid; ?>)" class="btn btn-box-tool add_bookmark"><i class="fa fa-plus"></i> Add bookmark</button></li>
                                         <?php if(!empty($scan_file_details['scan_bookmark_page'])){
												$bookmark = unserialize($scan_file_details['scan_bookmark_page']);
                                                foreach($bookmark as $key1 => $bookmark3){?>
                                                    <a class="btn-sm" style="cursor : pointer" onclick="open_file( <?php echo $scanid ;?>,'<?php echo $file_path.'#page='.$key1; ?>')"><?php echo "Page no. ".$key1." - ".$bookmark3;?></a><br/>
                                                <?php  } }?>
                                        <?php }
                                    }
                                } ?>
                            </ul>
                        </div>
                        <div id="pdfRenderer"></div>
                        <div class="form-group" id="scan_file_div">
                            <?php   $last_scan_id = end($scan_id_values);
                            $scan_file_details = scan_file_details($last_scan_id);
                            $scan_file = isset($scan_file_details['scan_file_path']) ? $scan_file_details['scan_file_path']:'';
                            if(!empty($scan_file) && isset( $scan_file)){ ?>
									<object id="pdf_viewer" data="<?php echo base_url(). $scan_file; ?>" type="application/pdf" width="100%" height="450px">
									<p>It appears you don't have a PDF plugin for this browser.
										No biggie... you can <a href="<?php echo base_url(). $scan_file; ?>">click here to download the PDF file.</a></p>
									</object>
								 <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if(empty($file_data['scan_id'])) { ?>
                        <!--<object data="<?php /*echo base_url(); */?>uploads/scan/viwer_example.pdf" type="application/pdf" width="100%" height="450px">
                            <p>It appears you don't have a PDF plugin for this browser.
                                No biggie... you can <a href="<?php /*echo base_url()*/?>/uploads/Leave Management Application.pdf">click here to
                                    download the PDF file.</a></p>
                        </object>-->
                        No Scan file attached..!
                    <?php  } ?>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <?php 	if( !empty($file_data['scan_id'])){ ?>
                    <a href="<?php echo base_url(). $scan_file; ?>" id="full_veiwbtn" target="_blank" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i>  <?php echo $this->lang->line('btn_full_view'); ?></a>
                <?php } ?>
            </div><!-- /.box-footer -->
        </div><!-- /. box -->
    </div><!-- /.col -->
</div><!-- /.row -->

</section><!-- /.content -->
<div id="expandModel" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Full view</h4>
		  </div>
		  <div class="modal-body">
			<div id="expand_data"></div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	</div>
</div>

<div id="modal-send_mark" class="modal fade" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Scan id : <span id="scan_id"></span></h4>
            </div>
            <form method="post" id="bookmark_scan">
                <div class="modal-body">
				<div class="btn-sm text-danger" style="float:right">* This will remove all previous bookmarks</div>
                    <div class="box-body no-padding">
                        <input type="text" name="add_bookmark" class="form-control" placeholder="Add important page no. of selected pdf file. eg : pageno.=pagetitle," required>
                        example : 1=noteshee,2=order,3=otherpage (pageno.=pagetitle)
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="return confirm('Are you sure to add new bookmark on this attached file')" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>themes/pdfobject.js"></script>
<script type="text/javascript">
	function open_file_in_viewer(scan_id ,file_path){
		var HTTP_PATH='<?php echo base_url(); ?>';
		var pdf = new PDFObject({
		  url: HTTP_PATH+file_path ,
		  id: "pdfRendered",
            height:"400px",
		  width:"100%",
		  pdfOpenParams: {
			view: "FitH"
		  }
		}).embed("pdfRenderer");
		$("#pdf_viewer").hide();
		$("#full_veiwbtn").attr("href", HTTP_PATH+file_path);
	}

	 function open_model2_addbookmark(scanid_id){
        var scanid_id = scanid_id;
        $('#bookmark_scan').attr('action','<?php echo base_url()?>scan_files/manage_sacn_bookmark/'+scanid_id);
        $("#scan_id").html(scanid_id);
        $('#modal-send_mark').modal('show');
    }

	//show content in model
	$(function () {
		$(".logExpand").click(function () {
			//alert('w');
			var log_id = $(this).data("log_id");
			//alert(log_id);
			var HTTP_PATH='<?php echo base_url(); ?>';
			$.ajax({
				type: "POST",
				url: HTTP_PATH + "draft/ajax_get_log_data/"+log_id,
				datatype: "json",
				async: false,
				data: {log_id: log_id},
				success: function(data) {
					var r_data = JSON.parse(data);
					//alert(r_data.draft_content);
				    var  otpt = '<b>लेख:- '+r_data.draft_content+'</b>';
					//otpt += '<b>लेखकर्ता:- '+value.draft_log_creater+'</b>';
					$("#expand_data").html(otpt);
				}
			});
		});

    });
            function addautodraft(draft_id) {
				$('#auto_add_draft').button('loading');
                var draft_id = draft_id;
				var draft_content_text = '<p>'+$("#auto_add_draft_value").val()+'</p>';
                var file_id = '<?php echo $file_data['file_id']; ?>';
                var draft_subject = "<?php echo mysql_real_escape_string($file_data['file_subject']); ?>";
                var draft_type = 'n';
                var btnadddraft = 'save_draft';
                var HTTP_PATH = '<?php echo base_url(); ?>';
                $.ajax({
                    type: "POST",
                    url: HTTP_PATH + "draft/save_draft_file/"+draft_id,
                    datatype: "json",
                    async: false,
                    data: {
                        file_id: file_id,
                        draft_content_text: draft_content_text,
                        draft_subject: draft_subject,
                        draft_type: draft_type,
                        btnadddraft: btnadddraft
                    },
                    success: function (data) {
                       location.reload();
                    }
                });
            }
</script>

