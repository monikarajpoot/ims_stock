<!-- Content Header (Page header) -->
<?php   $section= empdetails(emp_session_id());
$section_id = $section[0]['emp_section_id'];
$file_from = file_from_type();
$high_bench =  highcourt_bench();

$Employee_lists_estab =  get_establishment_employees('so')  ;
foreach($Employee_lists_estab as $esta_emp){
	$establiment_empids[] = $esta_emp['emp_id'];
}?>
<section class="content-header">
    <h1>
        <?php echo $title; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php echo $title; ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->

    <div class="row" id="divname">
        <div class="col-xs-12">
            <div class="box box-primary">
               <div class="box-header no-print">
					<div class="row">
						<div class="col-sm-4 col-md-2">
							<h3 class="box-title"><?php echo $title_tab; ?></h3>
						</div>
						<div class="col-sm-4 col-md-4">
							<a class="btn btn-bitbucket" href="<?php echo base_url();?>view_file/file_search?task=reopen">फाइल को पुनः खोलें </a></div>
						<div class="col-sm-6 col-md-6">
							<div class="pull-right">
							<button onclick="printContents('divname')" class="btn btn-primary no-print">Print</button>
							<button class="btn btn-warning" title="Back" onclick="goBack()" style="float:right"><?php echo $this->lang->line('Back_button_label'); ?></button>
							</div>
						</div>
					</div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12"> 
					<?php if($this->input->get('task') == 'reopen') { ?>
					<div class="callout callout-info">
						<h4>फाइल पुनः खोलने के लिए खोजे</h4>
						<p>जो फाइल बंद हो गयी है और आपको पुनः खोलना है उसे  यहाँ खोजे </p>
					 </div>
					<?php } ?>
                        <form method="post" action="" class="no-print">
                            <div class="col-xs-3">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-primary">खोज का प्रकार</button>
                                    </div>
                                    <select class="form-control" name="search_type" id="search_type">
                                        <option value="" >खोजनें का प्रकार चयन करें</option>
                                        <?php foreach(file_searchtypes()  as $key => $value) { 
										?>
                                            <option value="<?php echo $key; ?>" <?php echo @$this->input->post('search_type') == $key ? "selected" : false?>><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php echo form_error('search_type');?>
                            </div>

							<div class="col-xs-2" id="dis4" <?php echo @$this->input->post('search_type') == '1' ? "style='display: block'" : "style='display: none'"?>>
								<select name="sections" id="search_section_wise" class="form-control">
									<option value="">सेक्शन का चयन करें</option>
									<?php $empssection = empdetails(emp_session_id());
									foreach(explode(",",$empssection[0]['emp_section_id'])  as $empsec){ ?>
										<option value="<?php echo $empsec ?>" <?php echo @$this->input->post('sections') == $empsec ? "selected" : false?>><?php echo getSection($empsec) ; ?></option>
									<?php  }?>
										<option value="1" <?php echo @$this->input->post('sections') == '1' ? "selected" : false?>><?php echo getSection('1') ; ?></option>
										<option value="8" <?php echo @$this->input->post('sections') == '8' ? "selected" : false?>><?php echo getSection('8') ; ?></option>
								
								</select>
								<?php echo form_error('sections');?>
							</div>
							<?php $cr_section_ids= get_cr_emp_id(1);?>
							<?php if(in_array(emp_session_id(),$cr_section_ids['id_array'])){?>
							<div class="col-xs-2" id="dis4_1" <?php echo @$this->input->post('search_type') == '1' ? "style='display: block'" : "style='display: none'"?>>
								<?php $other_section=get_list_orderwise(SECTIONS,array('col'=>'section_name_en','order'=>'asc'),array('section_id !='=>1,'section_id !='=>26),null); ?>
								<select name="mark_sections" id="search_mark_sections" class="form-control">
									<option value="">अन्य सेक्शन का चयन करें</option>
									<?php foreach($other_section  as $empsec){ ?>
										<option value="<?php echo $empsec['section_id'] ?>" <?php echo @$this->input->post('mark_sections') == $empsec['section_id'] ? "selected" : false?>><?php echo getSection($empsec['section_id']) ; ?></option>
									<?php  }?>
								</select>
								<?php echo form_error('mark_sections');?>
							</div>
							<?php } ?>
							<div class="col-xs-3" id="dis1" <?php echo @$this->input->post('search_type') != '5' && $this->input->post('search_type') != '9' && $this->input->post('search_type') != '10' && $this->input->post('search_type') != '7' && $this->input->post('search_type') != '4'  && $this->input->post('search_type') != '11' ? "style='display: block'" : "style='display: none'"?>>
                                <input type="text"  name="search_value" id="search_value" value="<?php echo @$this->input->post('search_value') ? $this->input->post('search_value') : ''  ?>" autocomplete="off" placeholder="Put Value"  class="form-control">
                                <?php echo form_error('search_value');?>
                            </div>
                            <div id="dis2" <?php echo @$this->input->post('search_type') == '4' ? "style='display: block'" : "style='display: none'"?>>
                                <div class="col-xs-3">
                                    <input type="text" placeholder="From Date" name="frm_dt" id="frm_dt" autocomplete="off"  class="form-control">
                                    <?php echo form_error('frm_dt');?>
                                </div>
                                <!--<div class="col-xs-3">
                                <input type="text" placeholder="To Date" name="to_dt" id="to_dt" autocomplete="off"  class="form-control">
                            <?php echo form_error('to_dt');?>
                            </div>-->
                            </div>
                            <div class="col-xs-4" id="dis3" <?php echo @$this->input->post('search_type') == '5' ? "style='display: block'" : "style='display: none'"?>>
                                <select name="months" id="search_month_wise" class="form-control">
                                    <?php foreach (months() as $key => $val) {
                                        if(date("m") >= $key) { ?>
                                            <option value="<?php echo $key ?>" <?php if ($key == date("m")) { echo "selected"; } ?>><?php echo $val." / ".date("Y") ; ?></option>
                                        <?php } } ?>
                                </select>
                                <?php echo form_error('file_type');?>
                            </div>

                            <!-- for case no.-->
                            <div class="show_case"  <?php echo @$this->input->post('search_type') == '7' ? "style='display: block'" : "style='display: none'"?>>
                                <div class="col-xs-2">
                                    <select name="case_type"  id="search_case_type" class="form-control">
                                        <option value="">प्रकरण चयन करें</option>
                                        <?php foreach(case_name() as $case){ ?>
                                            <option value="<?php echo $case ?>"><?php echo $case ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('case_type');?>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" name="case_no" id="search_case_no" placeholder="Number" value="" class="form-control">
                                    <?php echo form_error('case_no');?>
                                </div>
                                <div class="col-xs-2">
                                    <select Name='case_year' class="form-control"><?php
                                        for ($x=date("Y"); $x>2000; $x--)
                                        { echo'<option value="'.$x.'">'.$x.'</option>';  } ?>
                                    </select>
                                    <?php echo form_error('case_year');?>
                                </div>
                            </div>
                            <!-- End case no.-->

                            <div class="show_movement_dt" <?php echo @$this->input->post('search_type') == '9' ? "style='display: block'" : "style='display: none'"?>>
                                <div class="col-xs-3">
                                    <input type="text" placeholder="From Date" name="movement_frm_dt" id="movement_frm_dt" autocomplete="off"  class="form-control">
                                    <?php echo form_error('movement_frm_dt');?>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" placeholder="To Date" name="movement_to_dt" id="movement_to_dt" autocomplete="off"  class="form-control">
                                    <?php echo form_error('movement_to_dt');?>
                                </div>
                            </div>

                            <!--Search datewise with filter-->
                            <div  class="show_search_dt_filter no-print" <?php echo @$this->input->post('search_type') == '10' ? "style='display: block'" : "style='display: none'"?>>
                                <div class="col-xs-2">
                                    <select id="filter_section_emp_wise"  name="filter_section_emp_wise" class="form-control rmv_required">
                                        <option value="">चयन करें</option>
                                            <option value="emp" <?php if(@$filter_section_emp_wise=='emp'){ echo 'selected';} ?>>Employees</option>
                                            <option value="sec" <?php if(@$filter_section_emp_wise=='sec'){ echo 'selected';} ?>>Sections</option>
                                    </select>
                                    <?php echo form_error('filter_section_emp_wise  ');?>
                                </div>
                                <div class="col-xs-2">
                                    <select id="section_emp_list" name="empid_secid" class="form-control rmv_required" >
                                        <option value="">चयन करें</option>
                                    </select>
                                    <?php echo form_error('empid_secid');?>
                                    
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" placeholder="From Date"  name="search_frm_dt" id="search_frm_dt" autocomplete="off" value="<?php echo $frm_date; ?>"  class="form-control ps_moniter_date rmv_required">
                                    <?php echo form_error('search_frm_dt');?>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" placeholder="To Date"  name="search_to_dt" id="search_to_dt" autocomplete="off"  value="<?php echo $to_date; ?>" class="form-control ps_moniter_date rmv_required">
                                    <?php echo form_error('search_to_dt');?>
                                </div>

                            </div>
							<!--statrt dispatch file type-->
							<div class="col-xs-2 dispatch_block" <?php echo $this->input->post('search_type') == '11' ? "style='display: block'" : "style='display: none'"?>>
								<input type="text" placeholder="Date"  name="date_distpach" id="date_distpach" autocomplete="off"  value="" class="form-control ps_moniter_date">
								<?php echo form_error('date_distpach');?>
							</div>
							<div class="col-xs-2 dispatch_block" <?php echo $this->input->post('search_type') == '11' ? "style='display: block'" : "style='display: none'"?>>
								<select name="sections_all" id="" class="form-control">
									<option value="">सेक्शन का चयन करें</option>
									<?php $empssection = empdetails(emp_session_id());
									foreach(explode(",",$empssection[0]['emp_section_id'])  as $empsec){ ?>
										<option value="<?php echo $empsec ?>" <?php echo @$this->input->post('sections_all') == $empsec ? "selected" : false?>><?php echo getSection($empsec) ; ?></option>
									<?php  }?>
								</select>
							</div>
							
							<div class="col-xs-2 dispatch_block" <?php echo $this->input->post('search_type') == '11' ? "style='display: block'" : "style='display: none'"?>>
								<select name="dispatch_type" class="form-control">
									<!--<option value="all">All</option>-->
									<option value="not_received">Not Received</option>
									<option value="received">Received</option>
									<option value="close">Close</option>
								</select>
								<?php echo form_error('dispatch_type');?>
							</div>
							<!--end dispatch file type-->
                            <!--Search datewise with filter-->
                            <input type="hidden" name="temp_section_emp_name" id="temp_section_emp_name"/>
                            <div class="col-xs-1">
                                <button type="submit" class="btn btn-success">खोजें</button>
                            </div>
                            <div class="col-xs-2" style="float:right">
                                <a href="<?php echo base_url()?>view_file/file_search" class="btn btn-block btn-danger btn-sm">पेज को फिर से लोड करें</button></a>
                            </div>
                            <div class="col-xs-12">
                                <br/>
                                <div style="clear:both">Note : All fields are required *</div>
                                <p>&nbsp;</p>
                            </div>

                        </form>
                    </div>

                    <?php
                    if(isset($get_files)){ 
                        if(!empty($get_files)) { ?>
                            <div class="col-md-12" style="overflow: auto">
                                <?php if(count(@$get_files)>0){ ?>
                                    <?php if(isset($filter_section_emp_wise) && $filter_section_emp_wise=='emp'){ 
                                            $reportname='';
                                        }else if(isset($filter_section_emp_wise) && $filter_section_emp_wise=='sec'){ 
                                            $reportname=''; 
                                        }else {
                                            $reportname='';
                                        } 
                                    ?>
                                    <div style="float:right;font-size: 18px;width:100%;background-color: #E2DCDC;">
                                        <div style="float:left;width:80%;text-align:center">
                                            <b><?php echo $search_by_temp_section_emp_name.' '.$reportname; ?> </b> Files <?php if($filter_search_frm_date!='' && $filter_search_to_date!=''){ ?> from <b><?php echo $filter_search_frm_date; ?></b> to <b><?php echo $filter_search_to_date; ?></b><?php } ?>
											<b><?php echo $this->input->post('date_distpach')!='' ? $this->input->post('date_distpach') : '' ;?></b>
									   </div> 
                                        <div style="float:left;float:right">Total Number of Files: <b><?php if(empty($get_files[0])){ echo '0';}else{ echo count($get_files); }?></b></div>
                                    </div>
                                <?php } ?>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="no-print"><?php echo $this->lang->line('sno'); ?></th>
										<th class="no-print"><?php echo $this->lang->line('section_no1'); ?> जावक</th>
                                        <th><?php echo $this->lang->line('view_file_subject'); ?></th>
                                        <th><?php echo $this->lang->line('section_no1'); ?> शाखा</th>
                                        <th class="no-print"><?php echo $this->lang->line('view_mark_section'); ?></th>
                                        <th><?php echo $this->lang->line('uo/letter_no'); ?></th>
                                        <th><?php echo $this->lang->line('view_file_uo_letter_date'); ?></th>
									   <?php if($data_search_type == '11') { ?>
										<th>किस विभाग को</th>
									    <th>जावक का पंजी नंबर</th>
									    <th>हस्ताक्षर</th>
									  <?php }  else { ?>
									   	<th>किस विभाग से</th>
										<th> विभाग में प्राप्ति दिनांक<?php //echo $this->lang->line('date'); ?></th>
                                        <th> निराकरण दिनांक<?php //echo $this->lang->line('date'); ?></th>
									   <?php } ?>
                                        <th class="no-print"><?php echo $this->lang->line('filestatus'); ?></th>
										<?php if(isset($_GET['task']) && $_GET['task']=='reopen'){?>
										<th class="no-print"> कार्यवाही करें</th>
										<?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                    $i=1; foreach ($get_files as $key => $files) { 
									
                                        if(is_array($files)){
                                           foreach ($files as $key1 => $file) {  ?>
                                            <tr <?php if(!isset($_GET['task']) && $_GET['task']!='reopen'){?> onClick="showcomp(<?php echo $file->file_id; ; ?>)" <?php } ?> style="cursor:pointer"; data-toggle="tooltip" data-original-title="View file">
												<td class="no-print"><?php echo $i;?> <br> 
												 <?php if(isset($section_id) && ($section_id == 1)){?>(<b>File ID : </b> <?php echo $file->file_id; ?>) <br/> <?php } ?> 
												 
												 <?php
												if(isset($files->file_id)){
												 $section_number_array= get_cr_section_nuber($files->file_id); 
												 $section_number_array= get_cr_section_nuber($files->file_id); ?> <?php if(isset($section_number_array['section_number']) && $section_number_array['section_number']!='') {?><br/> CR-<?php echo $section_number_array['section_number'];?><?php } 
												} ?>
												 </td>
                							     <td class="no-print"><b><?php if(isset($file->file_id) ){ 
                    							 echo getfilesec_id_byfileid($file->file_id,'8',$file->file_type) ? getfilesec_id_byfileid($file->file_id,'8',$file->file_type) : 'N/a' ; }
                    							 else { echo 'N/a'; }?><b></td>
                                                <td><?php echo $file->file_subject;?><br><?php show_scan_file($files->scan_id)?></td>
                                                <td>
													<?php echo getfilesec_id_byfileid($file->file_id,$file->file_mark_section_id,$file->file_type); ?>
													<?php echo '<br/><span title="Central Receipt Number">CR-'.getfilesec_id_byfileid($file->file_id,'1',$file->file_type).'</span>';?>
												</td>
                    							<td class="no-print"><?php echo getSection($file->file_mark_section_id); ?></td>								
                                                <td><?php echo $file->file_uo_or_letter_no; ?> (<?php echo getFileType($file->file_type) ;?>)</td>                           
                                                 <td><?php if(isset($file->file_uo_or_letter_date) && $files->file_uo_or_letter_date != '0000-00-00'){ echo date_format(date_create($files->file_uo_or_letter_date), 'd/m/y'); } ?></td>
                        					    <?php if($data_search_type == '11') { ?>
													<td><?php 
												if(isset($file->dispatch_lists) && ($file->dispatch_lists != '' && $file->dispatch_lists != 'null')) {
														$dispatch_lists = json_decode($file->dispatch_lists);
														echo '<table>';
														foreach($dispatch_lists as $row){
																echo '<tr><td>'.$row.'</td>';									
															}
														echo '</table>';
													} else {
														$file_from = file_from_type();
														$high_bench =  highcourt_bench();
														if(isset($file->file_Offer_by) && isset($file_from)) {
															echo   $filetosent = @$file->file_Offer_by == 'c' || @$file->file_Offer_by == 'jvn' ? @$file_from[$file->file_Offer_by] ." , ". @$file->district_name_hi." <br/>" : false ;
														}
														if(isset($file->file_Offer_by)  && isset($file_from)  || isset($high_bench)) {
															//pre($high_bench[$file->court_bench_id]);
															echo  $filetosent = @$file->file_Offer_by == 'm' || @$file->file_Offer_by == 'u' ? @$file_from[$file->file_Offer_by] ." , ". $high_bench[$file->court_bench_id] : false ;
															echo   $filetosent = @$file->file_Offer_by == 'v' || @$file->dept_name_hi ?  @$file->dept_name_hi ." ".(isset($file->file_department_name)?$file->file_department_name:'') : (isset($file->file_department_name)?$file->file_department_name:'');
														}
													}?></td>
													<td></td>
													<td></td>
												  <?php }  else { ?>
													 <td>
                            						<?php 
                            							//print_r($establiment_empids );
														//echo $file->createfile_empid;
                            							if( in_array($file->createfile_empid ,$establiment_empids ) && empty($file->file_Offer_by)){
															echo "विधि एवं विधायी कार्य विभाग";
														}else{									
                            						  
                            							echo   $file->file_Offer_by == 'c' || $file->file_Offer_by == 'jvn' ? $file_from[$file->file_Offer_by] ." , ". $file->district_name_hi : false ;
                            							echo    $file->file_Offer_by == 'm' || $file->file_Offer_by == 'u' ? (isset($file_from[$file->file_Offer_by])?$file_from[$file->file_Offer_by]:'') ." , ". (isset($high_bench[$file->court_bench_id])?$high_bench[$file->court_bench_id]:'') : false ;
                            							echo    $file->file_Offer_by == 'sc' ? $file_from[$file->file_Offer_by] ." , Delhi , दिल्ली" : false ;
                            							echo    $file->file_Offer_by == 'v' || $file->dept_name_hi ?  $file->dept_name_hi ." ".$file->file_department_name : $file->file_department_name;
														}
													?>
													</td>
													<td><?php //echo date_format(date_create($file->file_update_date), 'd/m/y'); ?>
														<?php echo date_format(date_create($file->file_created_date), 'd/m/y'); ?>
													   <!--(<?php if($file->file_hardcopy_status == 'not'){ echo $this->lang->line('mark_date');} else { echo $this->lang->line('received_date');} ?>)-->
												   </td>
													<td>	
														<?php $dispetch_date_array=array(); $dispetch_date_array= get_file_dispos_date(null,$file->file_id); 
															if(isset($dispetch_date_array) && !empty($dispetch_date_array)){
																echo get_date_formate($dispetch_date_array['dispatch_date'],'d/m/y'); 
															}else{ echo 'N/A';}
														?>
													</td>
												   <?php } ?>
											  
												<td align="" class="no-print"><?php							
                                                    $filereceiver = get_user_details($file->file_received_emp_id);
                                                    if ($filereceiver)
                                                    {
                                                        if($file->file_hardcopy_status == 'not') {									
                                                           echo file_not_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
                                                        } else if($file->file_hardcopy_status == 'close') {										
                                                           echo file_closed_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi, $file->file_type);
                                                        } else  if($file->file_hardcopy_status == 'received') {										
                                                            echo file_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
                                                        } else if($file->file_hardcopy_status == 'working'){										
                                                            echo file_working_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
                                                        }
                                                       } 
													?>
												</td>
												<td>
													<?php if(isset($_GET['task']) && $_GET['task']=='reopen'){?>
														<?php if($files[0]->file_hardcopy_status=='close'){ ?>
														<a class="btn bg-olive margin" onclick="confirm_reopen(<?php echo $files[0]->file_id; ?>);">पुनः खोलें </a>
														<?php }else {?>
														<button class="btn bg-olive margin" type="button" onClick="showcomp(<?php echo $files[0]->file_id; ?>)">View File</button>
														<?php } ?>
													<?php } ?>
													<a href="<?php echo base_url(); ?>efile/<?php echo $files[0]->file_id; ?>"  class="btn btn-block btn-sm btn-warning" data-toggle="tooltip" data-original-title="E-file">ई- फाइल</a>
												</td>
							</tr>
                                          <?php }
                                        } else {?>
                            <tr <?php if(isset($_GET['task']) && $_GET['task']=='reopen'){}else{?> onClick="showcomp(<?php echo $files->file_id; ?>)" <?php } ?> style="cursor:pointer"; data-toggle="tooltip" data-original-title="View Files">
                            <td class="no-print"><?php echo $i;?> <?php if($section_id == 1){?>(<b>File ID : </b> <?php echo $files->file_id; ?>) <br/> <?php } ?>  <span class="no-print" style="display:none;"> (<?php echo $this->lang->line('file_no'); ?> : <?php echo $files->file_id;?>)  <?php $section_number_array= get_cr_section_nuber($files->file_id); ?> </span>  <?php $section_number_array= get_cr_section_nuber($files->file_id); ?>  <?php if(isset($section_number_array['section_number']) && $section_number_array['section_number']!='') {?><br/> CR-<?php echo $section_number_array['section_number'];?><?php } ?></td>
                            <td class="no-print"><b><?php echo @getfilesec_id_byfileid($files->file_id,'8',$files->file_type) ? getfilesec_id_byfileid($files->file_id,'8',$files->file_type) : 'N/a' ;?><b></td>
							<td><?php echo $files->file_subject;?>
								<br><?php show_scan_file($files->scan_id)?>
							</td>
                            <td><?php echo getfilesec_id_byfileid($files->file_id,$files->file_mark_section_id,$files->file_type); ?></td>
							<td class="no-print"><?php echo getSection($files->file_mark_section_id); ?></td>
                            <td><?php echo $files->file_uo_or_letter_no; ?> (<?php echo getFileType($files->file_type) ;?>)</td>
                            <td><?php if(isset($files->file_uo_or_letter_date) && $files->file_uo_or_letter_date != '0000-00-00'){ echo date_format(date_create($files->file_uo_or_letter_date), 'd/m/y'); } ?></td>
                              <?php if($data_search_type == '11') { ?>
							<td><?php  
									if(isset($files->dispatch_lists) && ($files->dispatch_lists != '' && $files->dispatch_lists != 'null')) {
										$dispatch_lists = json_decode($files->dispatch_lists);
										echo '<table>';
										foreach($dispatch_lists as $row){
												echo '<tr><td>'.$row.'</td>';									
											}
										echo '</table>';
									} else {
										$file_from = file_from_type();
										$high_bench =  highcourt_bench();
										if(isset($files->file_Offer_by) && isset($file_from)) {
											echo   $filetosent = @$files->file_Offer_by == 'c' || @$files->file_Offer_by == 'jvn' ? @$file_from[$files->file_Offer_by] ." , ". @$files->district_name_hi." <br/>" : false ;
										}
										if(isset($files->file_Offer_by)  && isset($file_from)  || isset($high_bench)) {
											//pre($high_bench[$files->court_bench_id]);
											echo  $filetosent = @$files->file_Offer_by == 'm' || @$files->file_Offer_by == 'u' ? @$file_from[$files->file_Offer_by] ." , ". $high_bench[$files->court_bench_id] : false ;
											echo   $filetosent = @$files->file_Offer_by == 'v' || @$files->dept_name_hi ?  @$files->dept_name_hi ." ".(isset($files->file_department_name)?$files->file_department_name:'') : (isset($files->file_department_name)?$files->file_department_name:'');
										}
									}?>
								</td>
							<td></td>
							<td></td>
							  <?php }  else { ?>
                            <td><?php 
								//print_r($establiment_empids );
								//echo $file->createfile_empid;
								if( in_array($files->createfile_empid ,$establiment_empids ) && empty($file->file_Offer_by)){
										echo "विधि एवं विधायी कार्य विभाग";
								}else{	
								$file_from = file_from_type();
								$high_bench =  highcourt_bench();
								echo   $files->file_Offer_by == 'c' || $files->file_Offer_by == 'jvn' ? (isset($file_from[$files->file_Offer_by])?$file_from[$files->file_Offer_by]:'') ." , ". $files->district_name_hi : false ;
								echo   $files->file_Offer_by == 'm' || $files->file_Offer_by == 'u' ? (isset($file_from[$files->file_Offer_by])?$file_from[$files->file_Offer_by]:'') ." , ". (isset($high_bench[$files->court_bench_id])?$high_bench[$files->court_bench_id]:'') : false ;
								echo   $files->file_Offer_by == 'sc' ? (isset($file_from[$files->file_Offer_by])?$file_from[$files->file_Offer_by]:'') ." , Delhi , दिल्ली" : false ;
								echo   $files->file_Offer_by == 'v' || $files->dept_name_hi ? $file_from[$files->file_Offer_by] ." , ". $files->dept_name_hi ." ".$files->file_department_name : $files->file_department_name;
								}
								?>
							</td>
                            <td><?php //echo date_format(date_create($files->file_update_date), 'd/m/y'); ?>
                                <?php echo date_format(date_create($files->file_created_date), 'd/m/y'); ?>
                               <!--(<?php if($files->file_hardcopy_status == 'not'){ echo $this->lang->line('mark_date');} else { echo $this->lang->line('received_date');} ?>)-->
                            </td>
                            <td><?php $dispetch_date_array= get_file_dispos_date(null,$files->file_id); 
                                 if( isset($dispetch_date_array['dispatch_date'])&& $dispetch_date_array['dispatch_date']!=''){
                                    echo get_date_formate($dispetch_date_array['dispatch_date'],'d/m/y');
                                 }else{
                                    echo 'N/A';
                                 }
								?>
							</td>
							<?php } ?>
                            <td align="" class="no-print"><?php
                                $filereceiver = get_user_details($files->file_received_emp_id);
                                if ($filereceiver)
                                {
									if($files->file_hardcopy_status == 'not') {
										echo file_not_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
									} else if($files->file_hardcopy_status == 'close') {
										echo file_closed_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi, $files->file_type);
									} else  if($files->file_hardcopy_status == 'received') {
										echo file_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
									} else if($files->file_hardcopy_status == 'working'){
										echo file_working_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
									}
                                    
								} 
								?>
							</td>
							<td>
								 <?php if(isset($_GET['task']) && $_GET['task']=='reopen'){?>
									<?php if($files->file_hardcopy_status=='close'){?>
										<a class="btn bg-olive margin" onclick="confirm_reopen(<?php echo $files->file_id; ?>);">पुनः खोलें  </a>
									<?php }else {?>
										<button class="btn bg-olive margin" type="button" onClick="showcomp(<?php echo $files->file_id; ?>)">View File</button>
									<?php } ?>
								<?php } ?>
							</td>
                            <a href="<?php echo base_url(); ?>efile/<?php echo $files->file_id; ?>"  class="btn btn-block btn-sm btn-warning" data-toggle="tooltip" data-original-title="E-file">ई- फाइल</a>
                        </tr>
                        <?php } $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else{
                            echo "<div align='center' class='text-danger'><b>No Data available Plz Try Again..</b></div>";
                        }} ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
    $('#search_type').change(function(){
        $typeval  = $("#search_type") .val();
		$('.rmv_required').prop('required', false);
        if($typeval == '4'){
            $("#dis1,#dis3,#dis4,#dis4_1").hide();
            $("#dis2").show();
            $(".show_case,.show_search_dt_filter, .dispatch_block").hide();
            $(".show_movement_dt").hide();
        }else if($typeval == '5'){
            $("#dis3").show();
            $("#dis2,#dis1,#dis4,#dis4_1").hide();
            $(".show_case,.show_search_dt_filter, .dispatch_block").hide();
            $(".show_movement_dt").hide();
        }else if($typeval == '1'){
            $("#dis4,#dis4_1,#dis1").show();
            $("#dis2,#dis3").hide();
            $(".show_case,.show_search_dt_filter, .dispatch_block").hide();
            $(".show_movement_dt").hide();
        }else if($typeval == '7'){
            $(".show_case").show();
            $("#dis4,#dis4_1,#dis1").hide();
            $("#dis2,#dis3").hide();
            $(".show_movement_dt,.show_search_dt_filter, .dispatch_block").hide();
        }else if($typeval == '9'){
            $(".show_movement_dt").show();
            $(".show_case,.show_search_dt_filter, .dispatch_block").hide();
            $("#dis4,#dis4_1,#dis1").hide();
            $("#dis2,#dis3").hide();
        }else if($typeval == '10'){
            $(".show_search_dt_filter").show();
            $(".show_movement_dt, .dispatch_block").hide();
            $(".show_case").hide();
            $("#dis4,#dis4_1,#dis1").hide();
            $("#dis2,#dis3").hide();
			$('.rmv_required').prop('required', true);
        }else if($typeval == '11'){
            $(".show_movement_dt,.show_search_dt_filter, .show_case").hide();
            $("#dis4,#dis4_1,#dis1").hide();
            $("#dis2,#dis3").hide();
		    $(".dispatch_block").show();
        } else{
            $("#dis1").show();
            $("#dis2,#dis3,#dis4,#dis4_1").hide();
            $(".show_case,.show_search_dt_filter, .dispatch_block").hide();
            $(".show_movement_dt").hide();
        }
    });

     $('#section_emp_list').change(function(){
        $("#temp_section_emp_name").val($("#section_emp_list option:selected").text());
     });
     $('#search_section_wise').change(function(){
        $("#temp_section_emp_name").val($("#search_section_wise option:selected").text());
     });
     $('#search_type').change(function(){
        if($(this).val()==9){
            $("#temp_section_emp_name").val($("#search_type option:selected").text());
        }else if($(this).val()==2){
            var search_type = $("#search_type option:selected").text();
            var search_case_type_no=search_type
            $("#temp_section_emp_name").val(search_case_type_no);
        }else if($(this).val()==5){
            var search_type = $("#search_type option:selected").text();
            var search_monthwise = $("#search_month_wise option:selected").text();
            var search_case_type_no=search_type+'-'+search_monthwise
            $("#temp_section_emp_name").val(search_case_type_no);
        }if($(this).val()==6){
            $("#temp_section_emp_name").val('System ID');
        }
     });
     $('#search_case_type').change(function(){
        var caseno = $("#search_case_no").val();
        var casetype = $("#search_case_type option:selected").text();
        var search_case_type_no=casetype+'-'+caseno
        $("#temp_section_emp_name").val(search_case_type_no);
     });

    function showcomp(comp1)
    {
        window.location='<?php echo base_url();?>view_file/viewdetails/'+comp1;
    }

    $(function(){
        checkBorder();
        $("table tr th").change(function(){
           checkBorder(); 
        });
    });
	function checkBorder(){
         $("table tr").each(function(){
            if ($(this).find("input").val() == ""){
               $(this).attr("class", "border");   
            }
        });   
	}
	function confirm_reopen(fileid) {
		var res = confirm('कृपया सुनिश्चित करे की आप यह फाइल/पत्र दुबारा खोलना चाहते हैं!!');
		if(res==true){
			$.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>' + "manage_file/ajax_file_reopen",
                datatype: "json",
                async: false,
                data: {fileid: fileid},
                success: function(data) {
                    var f_data = JSON.parse(data);
					if(f_data==0){
						location.reload();
					}else{
						
						alert('File can not reopen Please try again!');
					}
                }
            });
			//window.location='<?php echo base_url();?>view_file/ABC/'+fileid;
		}else{
			alert('wrongway');
			//window.location='<?php echo base_url();?>view_file/file_search';
		}
	}
</script>
<style type="text/css">
th.border
{
    border:solid 1px red;
}
</style>
<?php //pre(get_cr_emp_id(1)); ?>