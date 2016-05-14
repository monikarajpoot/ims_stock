
<?php
$userrole = checkUserrole();
$usersection = $this->session->userdata('emp_section_id');
?>

<div class="box">
	<div id="print-box">
	<div class="box-header">
		<h4 class="box-title">विधि विभाग, अनुभाग प्रदर्शन दिनांक <?php echo date('d.m.Y h:i:s A');?> तक</h4>
		<div class="box-tools pull-right no-print">
			<!--<button class="btn btn-block btn-info"><?php echo $this->lang->line('view_file_mark');?></button>-->
			<!--<a class="btn btn-info"><?php echo $this->lang->line('view_file_mark');?></a>-->
			<button class="btn btn-warning" onclick="goBack()"><?php echo $this->lang->line('Back_button_label'); ?></button>
			<button onclick="printContents('print-box')" class="btn btn-primary no-print">प्रिंट</button>
		</div>
	</div><!-- /.box-header -->
	<div class="box-body">	
		<div class="row">
			<?php
			// pre fixws
			$total_f = $grand_total = $dispach_files  = $dispached_files = 0; $i=1; 
			$height_worked = array();


			$query = "SELECT count(file_id) AS counts,
				  SUM(IF((`issection_despose` = 0), 1,0)) AS not_section_dispose,
				  SUM(IF((`issection_despose` = 1), 1,0)) AS section_dispose
				  FROM ft_file_dispatch";
			$query = $this->db->query($query);
			$result = $query->row_array();
			//Count total no of files
				$grand_total = $result['counts'];
			//for dispatched out department
				$dispached_files_out = $result['not_section_dispose'];
			//for dispatched in department
				$dispached_files_dept = $result['section_dispose'];
				$dispached_files = $dispached_files_out + $dispached_files_dept ;
				
			foreach($get_section as $sec){
				if(!in_array($sec['section_id'], array('26','1','25','20','28','23','21','8','27'))){
					$sce_id = $sec['section_id']; $from_section = '' ;
					//$section = get_list(SECTIONS,null,array('section_id' =>$sce_id ));
					
					if($sce_id == '20'){  // for translation
						$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$sce_id."' and `file_from_section_id`='16' and `file_return` !='2' and (file_hardcopy_status = 'received' or file_hardcopy_status = 'working')");
						$res1 =  $query->row_array();
						$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$sce_id."' and `file_from_section_id`='16' and `file_return` !='2' and (file_hardcopy_status = 'not')");
						$res2 =  $query->row_array();
						$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='16' and `file_from_section_id`='20' and `file_return` ='2'");
						$res3 =  $query->row_array();
						$from_section = ' in Drafting section';
					} else if($sce_id == '28'){ //for vetting english
						$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$sce_id."' and `file_from_section_id`='18' and `file_return` !='2' and (file_hardcopy_status = 'received' or file_hardcopy_status = 'working')");
						$res1 =  $query->row_array();
						$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$sce_id."' and `file_from_section_id`='18' and `file_return` !='2' and (file_hardcopy_status = 'not')");
						$res2 =  $query->row_array();
						$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='18' and `file_from_section_id`='28' and `file_return` ='2'");
						$res3 =  $query->row_array();
						$from_section = ' in vetting english section';
					} else { // for others
						
						$query = "SELECT count(file_id) AS counts,
							SUM(IF((file_hardcopy_status = 'received' or file_hardcopy_status = 'working') && file_return !='2', 1,0)) AS working,
						    SUM(IF((file_hardcopy_status = 'not') && file_return !='2', 1,0)) AS not_recive,
						    SUM(IF((file_return = '2'), 1,0)) AS close
						    FROM ft_files
						    where `file_mark_section_id`='".$sce_id."' ";
							$query = $this->db->query($query);
							$result = $query->row_array();
					}
					
					$total = $result['counts'];

					if ($total > 0) {
						$cls = "aqua"; 
					}else{
						$cls = "red"; 
					}
					$total_f = $total_f + $total;
					$dispach_files = $dispach_files + $result['close'];
				?>
			
				<?php $percent_work = $total != 0 ? (int)(($result['close'] * 100)/$total) : 0;
				 $height_worked[$sec['section_id']] = $percent_work ; ?>
					<div class="col-md-4 col-sm-6 col-xs-12 sections-box" data-original-title="<?php echo $sec['section_name_en'] ; ?>" data-toggle="tooltip">
						<a href="<?php echo base_url(); ?>activity_report/fetch_data/<?php echo $sec['section_id'] ; ?>" class="">
						<div class="info-box bg-<?php echo $cls; ?>">
						<span class="info-box-icon"><?php echo $percent_work != '0' ?  (int)$percent_work : '-'; ?>%</span>
						<div class="info-box-content">
						  <span class="info-box-text"><?php echo $sec['section_name_hi'] ; ?></span>
						  <span class="info-box-number"><b><?php echo $total ; ?> File(s) Received <?php echo $from_section; ?></b></span>
						  <div class="progress">
							<div style="width: <?php echo $percent_work; ?>%" class="progress-bar"></div>
						  </div>
						  <span class="progress-description">
							<?php echo $result['close']  ; ?> File(s) Dispatched <?php echo $from_section; ?>
						  </span>
						</div><!-- /.info-box-content -->
					  </div>
					  </a>
				  </div>
				
				<?php $i++; } 
				}
				//echo $total_f;
				?>
		
			<?php 
				if($userrole == 1 || $userrole == 3 ) {
					$final_total = $grand_total;
					$final_dispatch = $dispached_files;
					$heading = "विभाग में अभी तक आई फाइलें";
				} else{
					$final_total = $total_f;
					$final_dispatch = $dispach_files;
					$heading = "आपके अनुभाग में अभी तक आई फाइलें";
				}
			?>
		</div><!-- row -->
		<hr class="clearfix no-print "/>
		<div class="row">
				<br/>	
				<?php if($userrole == 1 || $userrole == 3  ) { 
						$qry_emp = $this->db->query("select group_concat(emp_id) as cr_emp from ft_employee where `role_id` = '9'");
						$result = $qry_emp->row_array();
						$emps = $result['cr_emp'];				
					//use for central receipt section 
						$query = $this->db->query("select count(*) as counts FROM ft_files where file_received_emp_id in(".$emps.") and (file_return = '1' or file_return = '3')");
						$return =  $query->row_array();					
						$percent_work = 100 - ($return['counts'] * 100)/$final_total; ?>
						
						<div class="col-md-6 col-sm-6 col-xs-12 sections-box happy" data-original-title="Central receipt" data-toggle="tooltip">
							<a href="<?php echo base_url(); ?>activity_report/fetch_data_cr">
							<div class="info-box bg-green">
							<span class="info-box-icon"><?php echo (int)$percent_work; ?>%</span>
							<div class="info-box-content">
							  <span class="info-box-text"><?php echo getSection('1'); ?></span>
							  <span class="info-box-number"><b><?php echo $final_total ; ?> File(s) received, <?php echo $final_total-$return['counts'];?>  File(s) distributed</b></span>
							  <div class="progress">
								<div style="width: <?php echo $percent_work; ?>%" class="progress-bar"></div>
							  </div>
							  <span class="progress-description">
								<?php echo $return['counts']  ; ?> File(s) return from section
							  </span>
							</div><!-- /.info-box-content -->
						  </div>
						  </a>
					  </div>
				<?php  } if($userrole == 1 || $userrole == 3 || ($userrole == 37 && $usersection = '8') ) { 
					 //use for dispatch section
							$res_dis1['counts'] = 0;
							$query = $this->db->query("select count(*) as counts FROM ft_files where file_hardcopy_status !='close' and `file_return` = '2' ");
							$res_dis2 =  $query->row_array();
							$query = $this->db->query("SELECT count(*) as counts FROM `ft_file_dispatch`");
							$res_dis3 =  $query->row_array();
							$total_dis = $res_dis1['counts'] + $res_dis2['counts'] + $res_dis3['counts'];
							$percent_work_dis =  ($res_dis3['counts'] * 100)/$total_dis;
						?>
					  <div class="col-md-6 col-sm-6 col-xs-12 sections-box happy" data-original-title="Dispatch" data-toggle="tooltip">
							<a href="<?php echo base_url(); ?>activity_report/fetch_data/8">
							<div class="info-box bg-red">
							<span class="info-box-icon no-print"><?php echo (int)$percent_work_dis; ?>%</span>
							<div class="info-box-content">
							  <span class="info-box-text"><?php echo getSection('8'); ?></span>
							  <span class="info-box-number"><b><?php echo $total_dis ; ?> File(s)received</b></span>
							  <div class="progress">
								<div style="width: <?php echo $percent_work_dis; ?>%" class="progress-bar"></div>
							  </div>
							  <span class="progress-description">
								<?php echo $res_dis3['counts']  ; ?> File(s) Dispatched 
							  </span>
							</div><!-- /.info-box-content -->
						  </div>
						  </a>
					  </div>
					<?php } ?>
			
			<hr class="clearfix no-print "/>
			<div class="row">
			<br/>
			<div class="col-xs-12">				
				<?php if($userrole < 7 || $userrole == 11 ) {
					$maxInd = -1;
					foreach($height_worked as $section => $percent) {
						if($percent > $maxInd) {
							$maxInd = $percent;
							$maxRes = array();
						}
						if($percent == $maxInd) {
							$maxRes[] = getSection($section);
						}
					}
					$maxSetions =  implode(', ',$maxRes);
					//$height_section = array_search(max($height_worked), $height_worked);   ?>
				<div class="">
					<div class="col-md-6 col-sm-6 col-xs-12 sections-box happy badhai">
					<h4 class="text-center"><?php echo (int)(max($height_worked)); ?>% के साथ  प्रथम स्थान - <b><?php echo $maxSetions; ?> शाखा</b></h4>
					  <div class="info-box">						
						<div class="info-box-content">
						  <h3 class="text-center">बहुत बहुत बधाई!!! <h3><br/><br/>
						</div><!-- /.info-box-content -->
					  </div><!-- /.info-box -->
					</div>
					<?php
					 $quwery = "SELECT file_received_emp_id , 
					count(file_id) AS fileno, 
					SUM(IF(file_hardcopy_status = 'received' || file_hardcopy_status = 'working', 1,0)) AS received,
					SUM(IF(file_hardcopy_status = 'not', 1,0)) AS notreceive 
					FROM ft_files 
					
					GROUP by `file_received_emp_id` 
					ORDER BY notreceive DESC limit 0,3";
					$qry = $this->db->query($quwery);
					if($qry->num_rows() > 0) {
						$result = $qry->result();
						//pre($result);
					} else {
						echo 'No users found';
					}
					?>
					<?php if($userrole == 1) { ?>
					<div class="col-md-6 col-sm-6 col-xs-12 happy">
					<h4 class="text-center"><b>आज की सबसे ज्यादा लंबित फाइलें</b></h4>
					  <div class="info-box">						
						<div class="">
						<table width="100%">
							<tr><th>नाम</th><th>प्राप्त की</th><th>प्राप्त नहीं की</th><th>कुल</th><tr>
						<?php foreach($result as $data){ ?>	
							<tr>
								<td><?php echo getemployeeName($data->file_received_emp_id, true).' '.get_employee_role($data->file_received_emp_id); ?></td>
								<td><a data-toggle="tooltip" data-original-title="Click Here For Display Files" href="<?php echo base_url(); ?>reports/moniter?secid=<?php echo getEmployeeSection($data->file_received_emp_id) ; ?>&s=received&emp=<?php echo $data->file_received_emp_id; ?>" >
								<?php echo $data->received; ?>
								</a></td>
								<td><a data-toggle="tooltip" data-original-title="Click Here For Display Files" href="<?php echo base_url(); ?>reports/moniter?secid=<?php echo getEmployeeSection($data->file_received_emp_id) ; ?>&s=not&emp=<?php echo $data->file_received_emp_id; ?>" >
								<?php echo $data->notreceive; ?>
								</a></td>
								<td><a data-toggle="tooltip" data-original-title="Click Here For Display Files" href="<?php echo base_url(); ?>reports/moniter?secid=<?php echo getEmployeeSection($data->file_received_emp_id) ; ?>&emp=<?php echo $data->file_received_emp_id; ?>" >
								<?php echo $data->received + $data->notreceive; ?>
								</a></td>
							<tr>
						<?php } ?>
						</table>
						</div><!-- /.info-box-content -->
					  </div><!-- /.info-box -->
					</div>
					<?php } ?>
				</div>
				<?php } ?>
				</div>
			</div><!-- row -->
		</div><!-- /.body -->
	
	<div class="box-footer no-print">
		<h3><?php echo $heading; ?></h3>
		<div class="col-md-4 col-sm-6 col-xs-12">
		  <div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
			<div class="info-box-content">
			  <span class="info-box-text">Total files</span>
			  <span class="info-box-number"><?php echo $final_total; ?></span>
			</div><!-- /.info-box-content -->
		  </div><!-- /.info-box -->
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
		  <div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>
			<div class="info-box-content">
			  <span class="info-box-text">Total Dispatched files</span>
			  <span class="info-box-number"><?php echo  $final_dispatch; ?></span>
			</div><!-- /.info-box-content -->
		  </div><!-- /.info-box -->
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
		  <div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span>
			<div class="info-box-content">
			  <span class="info-box-text">Total working files</span>
			  <span class="info-box-number"><?php $working_files = $final_total - $final_dispatch; echo   $working_files < 0 ? 0 :  $working_files; ?></span>
			</div><!-- /.info-box-content -->
		  </div><!-- /.info-box -->
		</div>
	</div>
</div><!-- /.print-box -->	
</div><!-- /.box -->
<div class="box box-warning no-print" id="pending_file">		
	<div class="box-body">	
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12 no-print" data-original-title="अपनी रिपोर्ट देखे" data-toggle="tooltip">
				<a href="<?php echo base_url(); ?>individual_reports">
					<div class="info-box bg-yellow">
						<span class="info-box-icon"><i class="fa fa-file"></i></span>
						<div class="info-box-content">
						  <span class="info-box-text">Individual report</span>
						  <span class="info-box-number">Individual report</b></span>
					
						</div><!-- /.info-box-content -->
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<?php 
		$todays = date('Y-m-d');
		$_7days = date('Y-m-d', strtotime($todays.' - 7 days'));
		$_10days = date('Y-m-d', strtotime($todays.' - 10 days'));
		$emp_section = $this->session->userdata('emp_section_id');
		
		$uequertt = "SELECT COUNT(file_id) AS fileno,
		SUM(IF(file_hardcopy_status = 'not' && DATE(file_update_date) <= '$_7days' , 1,0)) AS notreceive_7days, 
		SUM(IF((file_hardcopy_status = 'received' || file_hardcopy_status = 'working') && DATE(file_update_date) <= '$_7days',1,0)) AS received_7days,
		SUM(IF(file_hardcopy_status = 'not' && DATE(file_update_date) <= '$_10days' , 1,0)) AS notreceive_10days, 
		SUM(IF((file_hardcopy_status = 'received' || file_hardcopy_status = 'working') && DATE(file_update_date) <= '$_10days',1,0)) AS received_10days
		FROM ft_files 
		WHERE file_mark_section_id in($emp_section)";	
		$qry = $this->db->query($uequertt);
		$result = $qry->row_array();
				
	
	?>
<div class="box box-danger no-print">	
	<div class="box-header">
		<h4 class="box-title">लंबित फाइलें </h4>
		<div class="box-tools pull-right">
			<button class="btn btn-warning" onclick="goBack()"><?php echo $this->lang->line('Back_button_label'); ?></button>
		</div>
	</div><!-- /.box-header -->
	<div class="box-body">	
		<div class="row">
			<a href="<?php echo base_url(); ?>activity_report/file_moniter/pending_report/rec/<?php echo $_7days; ?>">
				<div class="col-md-3 col-sm-6 col-xs-12">
				  <div class="info-box bg-yellow">
					<span class="info-box-icon"><i class="fa fa-files-o"></i></span>
					<div class="info-box-content">
					  <span class="info-box-text">Work in progress</span>
					  <span class="info-box-number"><?php echo $result['received_7days']; ?> Files</span>
					  <div class="progress">
						<div style="width: 100%" class="progress-bar"></div>
					  </div>
					  <span class="progress-description">
						More than 7 days
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
				</div>		
			</a>
			
			<a href="<?php echo base_url(); ?>activity_report/file_moniter/pending_report/not/<?php echo $_7days; ?>">
				<div class="col-md-3 col-sm-6 col-xs-12">
				  <div class="info-box bg-yellow">
					<span class="info-box-icon"><i class="fa fa-files-o"></i></span>
					<div class="info-box-content">
					  <span class="info-box-text">Not Receive</span>
					  <span class="info-box-number"><?php echo $result['notreceive_7days']; ?> Files</span>
					  <div class="progress">
						<div style="width: 100%" class="progress-bar"></div>
					  </div>
					  <span class="progress-description">
						More than 7 days 
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
				</div>		
			</a>
			
			<a href="<?php echo base_url(); ?>activity_report/file_moniter/pending_report/rec/<?php echo $_10days; ?>">
				<div class="col-md-3 col-sm-6 col-xs-12">
				  <div class="info-box bg-red">
					<span class="info-box-icon"><i class="fa fa-files-o"></i></span>
					<div class="info-box-content">
					  <span class="info-box-text">Work in progress</span>
					  <span class="info-box-number"><?php echo $result['received_10days']; ?> Files</span>
					  <div class="progress">
						<div style="width: 100%" class="progress-bar"></div>
					  </div>
					  <span class="progress-description">
						More than 10 days  
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
				</div>		
			</a>
			
			<a href="<?php echo base_url(); ?>activity_report/file_moniter/pending_report/not/<?php echo $_10days; ?>">
				<div class="col-md-3 col-sm-6 col-xs-12">
				  <div class="info-box bg-red">
					<span class="info-box-icon"><i class="fa fa-files-o"></i></span>
					<div class="info-box-content">
					  <span class="info-box-text">Not Receive</span>
					  <span class="info-box-number"><?php echo $result['notreceive_10days']; ?> Files</span>
					  <div class="progress">
						<div style="width: 100%" class="progress-bar"></div>
					  </div>
					  <span class="progress-description">
						More than 10 days 
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
				</div>		
			</a>
		</div>
	</div><!-- /.body -->
</div><!-- /.box -->
	
</div><!-- /.box -->