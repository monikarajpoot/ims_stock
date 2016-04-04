<?php $view_role = viewDashboardRole($this->session->userdata('user_role')); 
$role_id = checkUserrole();
$CI = & get_instance();
$todays = date('Y-m-d');
$_3days = date('Y-m-d', strtotime($todays.' - 3 days'));
$_7days = date('Y-m-d', strtotime($todays.' - 7 days'));
$_10days = date('Y-m-d', strtotime($todays.' - 10 days'));
$userid= emp_session_id();
//pre($data);
?>

<section class="content-header">
    <h1>
        <?php echo $this->lang->line('title') ?>

    </h1>
    <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
</section>

<!-- Main content -->
<section class="content">
<?php if($role_id == 1 || $role_id == 3 || $role_id == 4 || $role_id == 5 ) { ?>
<div class="no-print">
	<a target="_blank" href="http://10.139.229.25/ftms/officer/auto_login?uid=<?php echo $userid ?>&islogin=y">
		<div class="col-md-3 col-sm-6 col-xs-12" data-original-title="शासकीय कर्मचारीओ की छुट्टिया अनुमोदन करें" data-toggle="tooltip">
			<div class="info-box bg-blue">
				<span class="info-box-icon"><i class="fa fa-group"></i></span>
				<div class="info-box-content">
				  <span class="info-box-text">Leave</span>
				  <span class="info-box-number">Leave Approval</b></span>
				  <div class="progress">
					<div style="width: <?php  if(isset($res3['counts'] )){ echo($res3['counts'] * 100)/$total; }else { echo "0"; }?>%" class="progress-bar"></div>
				  </div>
				  <span class="progress-description"></span>
				</div><!-- /.info-box-content -->
			</div>
		</div>
	</a>
	<a href="<?php echo base_url(); ?>camra">
		<div class="col-md-3 col-sm-6 col-xs-12" data-original-title="कैमरा स्क्रीन देखें" data-toggle="tooltip">
			<div class="info-box bg-green">
				<span class="info-box-icon"><i class="fa fa-camera"></i></span>
				<div class="info-box-content">
				  <span class="info-box-text">Camera</span>
				  <span class="info-box-number">View Camera Screens</b></span>
				  <div class="progress">
					<div style="width: <?php if(isset($res3['counts'])){ echo ($res3['counts'] * 100)/$total; } else{ echo "0" ;}?>%" class="progress-bar"></div>
				  </div>
				  <span class="progress-description"></span>
				</div><!-- /.info-box-content -->
		  </div>
		</div>
	</a>
	<a href="<?php echo base_url(); ?>biomartrics">
		<div class="col-md-3 col-sm-6 col-xs-12" data-original-title="बायोमेट्रिक देखें" data-toggle="tooltip">
			<div class="info-box bg-yellow">
				<span class="info-box-icon"><i class="fa fa-eye"></i></span>
				<div class="info-box-content">
				  <span class="info-box-text">Bio Metric System</span>
				  <span class="info-box-number">View Bio metric system</b></span>
				  <div class="progress">
					<div style="width: <?php if(isset($res3['counts'])){ echo ($res3['counts'] * 100)/$total; } else{ echo "0" ;} ?>%" class="progress-bar"></div>
				  </div>
				  <span class="progress-description"></span>
				</div><!-- /.info-box-content -->
		  </div>
		</div>
	</a>
	<a href="<?php echo base_url(); ?>show/reports">
		<div class="col-md-3 col-sm-6 col-xs-12" data-original-title="सभी प्रकार की रिपोर्ट देखें" data-toggle="tooltip">
			<div class="info-box bg-red">
				<span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
				<div class="info-box-content">
				  <span class="info-box-text">Reports</span>
				  <span class="info-box-number">View All Reports</b></span>
				  <div class="progress">
					<div style="width: <?php if(isset($res3['counts'])){ echo ($res3['counts'] * 100)/$total; } else{ echo "0" ;} ?>%" class="progress-bar"></div>
				  </div>
				  <span class="progress-description"></span>
				</div><!-- /.info-box-content -->
		  </div>
		</div>
	</a>
	<div style="clear:both"></div>
	<a href="<?php echo base_url(); ?>view_file/Dispaly_list">
		<div class="col-md-3 col-sm-6 col-xs-12" data-original-title="स्वयं को अंकित फाइलें देखें" data-toggle="tooltip">
			<div class="info-box bg-yellow">
				<span class="info-box-icon"><i class="fa fa-eye"></i></span>
				<div class="info-box-content">
				  <span class="info-box-text">SECTION FILES</span>
				  <span class="info-box-number">View OWN MARKED FILES</b></span>
				  <div class="progress">
					<div style="width: <?php if(isset($res3['counts'])){ echo ($res3['counts'] * 100)/$total; } else{ echo "0" ;} ?>%" class="progress-bar"></div>
				  </div>
				  <span class="progress-description"></span>
				</div><!-- /.info-box-content -->
		  </div>
		</div>
	</a>
	<a href="<?php echo base_url();?>show/establishment">
		<div class="col-md-3 col-sm-6 col-xs-12" data-original-title="<?php echo isset($sec['section_name_en'])?$sec['section_name_en']:'' ; ?>" data-toggle="tooltip">
			<div class="info-box bg-red">
				<span class="info-box-icon"><i class="fa fa-mortar-board"></i></span>
				<div class="info-box-content">
				  <span class="info-box-text">Establishment</span>
				  <span class="info-box-number">View Department Establishment</b></span>
				  <div class="progress">
					<div style="width: <?php if(isset($res3['counts'])){ echo ($res3['counts'] * 100)/$total; } else{ echo "0" ;} ?>%" class="progress-bar"></div>
				  </div>
				  <span class="progress-description"></span>
				</div><!-- /.info-box-content -->
		  </div>
		</div>
	</a>
	<a href="<?php echo base_url(); ?>view_file/file_search">
		<div class="col-md-3 col-sm-6 col-xs-12" data-original-title="<?php echo isset($sec['section_name_en'])?$sec['section_name_en']:'' ; ?>" data-toggle="tooltip">
			<div class="info-box bg-green">
				<span class="info-box-icon"><i class="fa fa-search-plus"></i></span>
				<div class="info-box-content">
				  <span class="info-box-text">Search</span>
				  <span class="info-box-number">File Search in All Sections</b></span>
				  <div class="progress">
					<div style="width: <?php if(isset($res3['counts'])){ echo ($res3['counts'] * 100)/$total; } else{ echo "0" ;} ?>%" class="progress-bar"></div>
				  </div>
				  <span class="progress-description"></span>
				</div><!-- /.info-box-content -->
		  </div>
		</div>
	</a>
	
	<a href="<?php echo base_url(); ?>moniter/files">
		<div class="col-md-3 col-sm-6 col-xs-12" data-original-title="<?php echo isset($sec['section_name_en'])?$sec['section_name_en']:'' ; ?>" data-toggle="tooltip">
			<div class="info-box bg-blue">
				<span class="info-box-icon"><i class="fa fa-file-movie-o"></i></span>
				<div class="info-box-content">
				  <span class="info-box-text">Moniter</span>
				  <span class="info-box-number">File Moniter</b></span>
				  <div class="progress">
					<div style="width: <?php  if(isset($res3['counts'])){ echo ($res3['counts'] * 100)/$total; } else{ echo "0" ;} ?>%" class="progress-bar"></div>
				  </div>
				  <span class="progress-description"></span>
				</div><!-- /.info-box-content -->
		  </div>
		</div>
	</a>
	<div style="clear:both"></div>
	</div>
    <?php echo modules::run('activity_report/index_for_admin',null); ?>
<?php }  else { 
	if($role_id == 8) {?>   
<div class="no-print">	
        <div class="row">           
            <div class="col-lg-4 col-xs-6">                
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo isset($total_file) ? $total_file : ''; ?></h3>
                        <p><?php echo $this->lang->line('dashboard_number_file'); ?> in section</p>
                    </div>
                        
                     <?php if(getEmployeeSection()==8 && isset($emp_section)){ ?>
                        <a href="<?php echo base_url().'reports/moniter?secid='.$emp_section; ?>&s=not&lvl=list_all_dipatch_section_files" class="small-box-footer">
                            Click to view file list <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    <?php }else{?> 
                        <a href="<?php echo base_url().'view_file'; ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">                
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo isset($pending_file) ? $pending_file : '' ?></h3>
                        <p><?php echo $this->lang->line('dashboard_pending_file'); ?> in section</p>
                    </div>
                    <?php if(getEmployeeSection()==8 && isset($emp_section)){ ?>
                        <a href="<?php echo base_url().'reports/moniter?secid='.$emp_section; ?>&s=not&lvl=section_dis" class="small-box-footer">
                            Click to view file list <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    <?php }else{?> 
                    <a href="<?php echo base_url().'activity_report/fetch_data/'.getEmployeeSection(); ?>" class="small-box-footer">
                        Click to view file list <i class="fa fa-arrow-circle-right"></i>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">               
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo isset($dispetch_file) ? $dispetch_file : '' ?></h3>
                        <p><?php echo $this->lang->line('dashboard_dispatch_file'); ?> in section</p>
                    </div>
                   <?php if(getEmployeeSection()==8 && isset($emp_section)){ ?>
                        <a href="<?php echo base_url().'reports/moniter?secid='.$emp_section; ?>&s=2&lvl=dis_sec_cloase_file" class="small-box-footer">
                           Click to view file list <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    <?php } else { ?>
                       <a href="<?php echo base_url().'activity_report/fetch_data/'.getEmployeeSection(); ?>" class="small-box-footer">
                            Click to view file list <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
			<!--
			<div class="col-lg-4 col-xs-6">               
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?php ///$count_total_worked_files= total_work_by_officer_emp('count_total_file_works',$userid,$emp_section); echo $count_total_worked_files['total_file_works']; ?></h3>
                        <p>Total number of file worked by you</p>
                    </div>
                   
					<a href="<?php //echo base_url().'reports/moniter?empid='.$userid; ?>&s=not&lvl=view_ofcr_deald_files"" class="small-box-footer">
						Click to view file list <i class="fa fa-arrow-circle-right"></i>
					</a>
			   
                </div>
            </div>
			-->
        </div>
	</div>
        <!-- =========================================================== -->
<?php }} ?>

<?php if(!isset($start_date)){$start_date=date('Y-m-d');}if(!isset($end_date)){$end_date=date('Y-m-d');} ?>
<div class="row">		
	<div class="col-md-12" >
	
<div class="box box-primary" id="divname1">
	<div class="box-header">
		<h3 class="box-title"><?php echo get_date_formate($start_date,'d.m.Y'); ?> से <?php echo get_date_formate($end_date,'d.m.Y'); ?>  तक  जिन फाइलों पर आपने कार्य किया</h3>
		<div class="box-tools pull-right">
			<button onclick="printContents('divname1')" class="btn btn-primary no-print">प्रिंट</button>
			<button class="btn btn-warning no-print" onclick="goBack()">बेक</button>
		</div>
	</div><!-- /.box-header -->		
	<div class="box-body">
			
				<form method="post" action="<?php echo base_url('dashboard')?>/common_dashboard/dashboard_report"  enctype="multipart/form-data">			
				
				<table class="table table-condensed text-center">
					<?php 
						$query_log = $CI->db->query("SELECT count(distinct(file_id)) as received FROM ft_file_logs where to_emp_id = '$userid' and (date(`flog_created_date`) >= '$start_date' and date(`flog_created_date`) <= '$end_date' )");
						$received = $query_log->row_array();
						$query_log = $CI->db->query("SELECT count(distinct(file_id)) as worked FROM ft_file_logs where from_emp_id = '$userid' and (date(`flog_created_date`) >= '$start_date' and date(`flog_created_date`) <= '$end_date' )");
						$worked = $query_log->row_array();
					?>
					<tr>
						<td><label>दिनांक से खोजे</label></td>
						<td><input type="text" class="form-control date1" name= "start_date" value="<?php echo get_date_formate($start_date,'d-m-Y'); ?>" placeholder="select date"/> <?php echo form_error('start_date') ; ?>
						से 
						<input type="text" class="form-control date1" name= "end_date" value="<?php echo get_date_formate($end_date,'d-m-Y'); ?>" placeholder="select date"/> <?php echo form_error('end_date') ; ?>
						</td>
						<td><button type="submit" class="btn btn-primary" >खोजे</button></td>
						
					</tr>
					<tr>
						<th>जो फाइल आपने प्राप्त की</th>
						<th>जिन फाइलों पर आपने कार्य कर दिया</th>
						<th>कुल किया गया कार्य</th>
					</tr>
					<tr>
						<td class="total_files_received" style="cursor:pointer" onclick='showpage("<?php echo base_url('activity_report'); ?>/file_moniter/files_log?a=received&emp=<?php echo $userid; ?>&s_date=<?php echo $today; ?>")'>
							<span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="<?php   echo $received['received']; ?> Files">
							<?php   echo $received['received']; ?>
							</span> 
						</td>
						<td class="total_files_received" style="cursor:pointer" onclick='showpage("<?php echo base_url('activity_report'); ?>/file_moniter/files_log?a=worked&emp=<?php echo $userid; ?>&s_date=<?php echo $today; ?>")'>
							<span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="<?php   echo $worked['worked']; ?> Files">
							<?php   echo $worked['worked']; ?>
							</span> 
						</td>
						<td class="total_files_received" style="cursor:pointer" onclick='showpage("<?php echo base_url('activity_report'); ?>/file_moniter/files_log?a=all&emp=<?php echo $userid; ?>&s_date=<?php echo $today; ?>")'>
							<span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="<?php   echo $received['received'] + $worked['worked']; ?> Files">
							<?php   echo $received['received'] + $worked['worked']; ?>
							</span> 
						</td>
					</tr>
				</table>
				</form>
			</div>
		</div>
	</div>

	
			<div class="col-md-12" >	
				<!--File Mergion and Re-open-->
				<?php $login_usr_section = explode(',',getEmployeeSection()); ?>
				<?php if(!in_array(1, $login_usr_section) || checkUserrole()!=9){ ?>
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">फाइल का पुनर्जीवन, बदलाव एवं एकीकरण</h3>
					</div>
					<div class="row">							
							<?php if(isset($_GET['bij']) && $_GET['bij']=='yes'){ ?>
							<div class="col-sm-4 col-md-2">
								<a class="btn btn-facebook" onclick="show_merge_file_dive();" href="#">फाइल  का  एकीकरण </a>						
							</div>
							<?php } ?>
							<div class="col-sm-4 col-md-2">
								<a class="btn btn-bitbucket" href="<?php echo base_url();?>view_file/file_search?task=reopen">फाइल को पुनः खोलें </a>						
							</div>
							<div class="col-sm-4 col-md-4">
								<a class="btn btn-foursquare" href="<?php echo base_url();?>view_file/file_search?task=fileedit">फाइल का पुनः बदलाव करें </a>
							</div>
							<div style="clear:both"></div>
							<br/>
							<?php
							$hide="";							
							if(isset($_GET['fmerge_type']) && $_GET['fmerge_type']!='' && $_GET['fnumber']!='')
							{
								$res= check_file_exist_or_not();
								$hide="";
							}else{
								$hide="display:none";
							} 
							?>
							
							<div style="<?php echo $hide; ?>" id="merge_dive">
								<form action="" method="get">
									<div class="col-xs-3">
										<div class="form-group">
											<label for="exampleInputFile">अनुभाग का नाम<span class="text-danger">*</span></label>
											<select id="secid" required="" name="secid" class="form-control">
												<option value="">Select Type</option>
												<?php $empssection = empdetails(emp_session_id());
												foreach(explode(",",$empssection[0]['emp_section_id'])  as $empsec){ ?>
													<option value="<?php echo $empsec ?>" <?php echo @$this->input->get('secid') == $empsec ? "selected" : false?>><?php echo getSection($empsec) ; ?></option>
												<?php  }?>
												
											</select>
										</div>
									</div>
									<div class="col-xs-3">
										<div class="form-group">
											<label for="exampleInputFile">फाइल एकीकरण का प्रकार<span class="text-danger">*</span></label>
											<select id="file_merging_type" required="" name="fmerge_type" class="form-control">
												<option value="">चयन करें</option>
												<option value="sno" <?php echo @$this->input->get('fmerge_type') == 'sno' ? "selected" : false?>>अनुभाग पंजी क्रमांक (Section number)</option>
												<option value="fid" <?php echo @$this->input->get('fmerge_type') == 'fid' ? "selected" : false?>>फाइल ई.डी (File Id)</option>
												<option value="crno" <?php echo @$this->input->get('fmerge_type') == 'crno' ? "selected" : false?>>आवक नंबर (CR Number)</option>
											</select>
										</div>
									</div>
									<div class="col-xs-3">
										<div class="form-group">
											<label for="exampleInputFile">क्रमांक/नंबर<span class="text-danger">*</span></label>
											<input type="text" required class="form-control" value="<?php echo @$this->input->get('fnumber');?>" name="fnumber" id="mergeno">
										</div>
									</div>
									<div class="col-xs-3">
										<div class="form-group">
											<label for="exampleInputFile">कार्यवाही</label>
											<button class="btn btn-primary form-control" type="submit">खोजे</button>
										</div>
									</div>
								</form>
							</div>
							<div style="clear:both"></div>
							<br/>
							<?php //pre($res);
							if(isset($res) && count($res)>0){  $hid2='display:block';}else{$hid2='display:none';} ?>
							<form action="<?php echo base_url();?>common_dashboard/merge_file" method="post"> 
								<div id="show_result" style="<?php echo $hid2; ?>">
									<div class="col-xs-3">
										<div class="form-group">
											<label for="exampleInputFile">विषय:<span class="text-danger">*</span></label>
											<span><?php echo $res[0]['file_subject'];  ?></span>
											<br/>
											<label for="exampleInputFile">फाइल यू.ओ नंबर:<span class="text-danger">*</span></label>
											<span><?php echo $res[0]['file_uo_or_letter_no'];  ?></span>
											<input type="text" name="file_id" value="<?php echo $res[0]['file_id'];  ?>"/>
											<input type="text" name="fmerge_type" value="<?php echo $this->input->get('fmerge_type');  ?>"/>
											<input type="text" name="sectionid" value="<?php echo $this->input->get('secid');  ?>"/>
										</div>
									</div>
									<div class="col-xs-3">
										<div class="form-group">
											<?php if(isset($_GET['fmerge_type']) && $_GET['fmerge_type']=='sno')
											{ $mergewith='शाखा पंजी क्रमांक के साथ एकीकरण';}
											else if(isset($_GET['fmerge_type']) && $_GET['fmerge_type']=='fid')
											{ $mergewith='फाइल ई.डी क्रमांक के साथ एकीकरण';}
											else if(isset($_GET['fmerge_type']) && $_GET['fmerge_type']=='crno')
											{ $mergewith='आवक क्रमांक के साथ एकीकरण';}
											else {$mergewith='क्रमांक के साथ एकीकरण';} ?>
											<label for="exampleInputFile"><?php echo $mergewith; ?><span class="text-danger">*</span></label>
											<input type="text" class="form-control" value="" name="epa_permission_from" id="mergenowith">
											<span style="font-size:8pt">अधिक नंबर होने पर कोमा(,) के साथ नंबर डालें.</span>
										</div>
									</div>
									<div class="col-xs-3">
										<div class="form-group">
											<label for="exampleInputFile">कार्यवाही</label>
											<button class="btn btn-primary form-control" type="submit">एकीकरण करें</button>
										</div>
									</div>
								</div>
							</form>
					</div>
				</div>
				<?php } ?>
				<div class="col-md-12" >	
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">एप्लीकेशन के बारे में कोई  सुझाव  देने के लिए</h3>
					</div>
					<div class="box-body">
						<a class="btn btn-bitbucket" href="<?php echo base_url();?>suggestions">सुझाव  </a>						
					</div>
				</div>
			</div>
				</div>
				
		</div><!-- /.row -->


 </section><!-- /.content -->
<script>
    function showpage(comp1)
    {
        window.location=comp1;
    }
	function show_merge_file_dive(){
		$("#merge_dive").show()
	}
</script>




