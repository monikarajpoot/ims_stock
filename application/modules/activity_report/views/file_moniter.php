<link href="<?php echo ADMIN_THEME_PATH; ?>plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $title; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php echo $title; $checkUserrole = checkUserrole(); ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
    <div class="row" id="divname">
        <div class="col-xs-12">
            <div class="box" style="overflow: auto">
                <div class="box-header no-print">
                    <div class="row"><div class="col-md-12">
						<div style="float:left"><h3 class="box-title"><?php echo $title_tab;?></h3></div>
						<div style="float:right">
							<!--<button class="btn btn-block btn-info"><?php echo $this->lang->line('view_file_mark');?></button>-->
							<!--<a class="btn btn-info"><?php echo $this->lang->line('view_file_mark');?></a>-->
							<div style="float:left;font-size:11px;padding-right: 160px;">
								<p> <i>Note:</i>
								<span style="background-color:#F3E212;"> 3 दिवस से अधिक </span> 
								<span style="background-color:#FFE7BA;">7 दिवस से अधिक </b></span>
								<span style="background-color:#FFA4A4;">10 दिन से अधिक</b></span></p>
							</div>
							<button class="btn btn-warning" onclick="goBack()"><?php echo $this->lang->line('Back_button_label'); ?></button>
							<button onclick="printContents('divname')" class="btn btn-primary no-print">Print</button>
						</div>
                    </div></div>
                    <div class="row"><div class="col-md-12">
						<div class="bg-info no-print text-center"><b><?php echo $this->input->get('s_date')!= '' ? 'दिनांक '.get_date_formate($this->input->get('e_date')).' से '.get_date_formate($this->input->get('s_date')).' तक का कार्य' : ''; ?></b></div>
					</div></div>
				</div><!-- /.box-header -->
                <?php // echo $this->session->flashdata('message'); ?>
                <?php if($this->session->flashdata('message') || $this->session->flashdata('error')) {
                    $msg = $this->session->flashdata('message') ? 'success' : 'danger';
                    ?>
                    <div class="alert alert-<?php echo $msg; ?> alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>
                            <?php  echo $this->session->flashdata('message');
                            echo $this->session->flashdata('error'); ?>
                        </strong>
                        <br/>
                    </div>
                <?php } ?>
                <table id="view_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('sno'); ?></th>
                        <th><?php echo $this->lang->line('view_file_subject'); ?></th>
                        <th><?php echo $this->lang->line('uo/letter_no'); ?></th>
                        <th><?php echo $this->lang->line('view_file_uo_letter_date'); ?></th>
                        <th><?php echo $this->lang->line('section_no1'); ?></th>
                        <th><?php echo $this->lang->line('view_file_mark_section_id'); ?></th>
                        <?php if(@$_GET['secid']==21){ ?>
                        <th>Moniter Date</th>
                        <?php } ?>
                        <th><?php echo $this->lang->line('date'); ?></th>
                        <th><?php echo $this->lang->line('filestatus'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($get_files as $key => $files) { 
					$diff=date_diff(date_create($files->file_update_date),date_create(date("Y-m-d")));
					$diff=date_diff(date_create($files->file_update_date),date_create(date("Y-m-d")));
                             $checkdate = $diff->format("%a") ;?>
                        <?php
							//echo $files->file_hardcopy_status.'->'.$files->file_return;
                            if($checkUserrole == 3 &&  $files->ps_moniter_date == '' ){}
                            else if($checkUserrole == 3 && match_date_from_current($files->ps_moniter_date) == 1 && $files->file_hardcopy_status!='close' && $files->file_return!=2)
                                { $bgcolor= "background-color:rgb(236, 202, 202);color:#000 !important;"; }
                            else if($checkUserrole == 3 && match_date_from_current($files->ps_moniter_date) == 2 && $files->file_hardcopy_status!='close' && $files->file_return!=2)
                                { $bgcolor="background-color:#f48a44;color:#000;color:#000 !important;"; }
                            else if($checkUserrole == 3 && match_date_from_current($files->ps_moniter_date) == 3 && $files->file_hardcopy_status!='close' && $files->file_return!=2 )
                                { $bgcolor="background-color:#70DB70;color:#000 !important;";}?>
                        <tr <?php
                                if($checkdate >= '3' && $checkdate <= '7' && $files->file_hardcopy_status!='close' && $files->file_return!=2) { echo "style='cursor:pointer;background-color:#FBFBDE' data-toggle='tooltip' data-original-title='३ दिन से अधिक विलंब'";
                                } else if($checkdate >= '7' && $checkdate < '10' && $files->file_hardcopy_status!='close' && $files->file_return!=2) { echo "style='cursor:pointer;background-color:#FFE7BA' data-toggle='tooltip' data-original-title='७ दिन से अधिक विलंब'";
                                } else if($checkdate >= '10' && $files->file_hardcopy_status!='close' && $files->file_return!=2) { echo "style='cursor:pointer; background-color:#FFA4A4' data-toggle='tooltip' data-original-title='१० दिन से अधिक विलंब'";}
                                ?>
						onClick="showcomp(<?php echo $files->file_id; ; ?>)" data-toggle="tooltip" data-original-title="Click to view in detail" style="cursor:pointer;<?php echo isset($bgcolor)?$bgcolor:''; ?>">
                        <td><?php echo $i;?> <span style="display:none">(<?php echo $this->lang->line('file_no'); ?> : <?php echo $files->file_id;?>)</span></td>
                        <td><?php echo $files->file_subject;?>
								<br><?php if(isset($files->scan_id) && $files->scan_id != ''){ show_scan_file($files->scan_id);}?>
								<br><?php if(isset($files->file_status) && $files->file_status != ''){ show_file_status($files->file_status);}?>
						</td>
                        <td><?php echo $files->file_uo_or_letter_no; ?> (<?php echo getFileType($files->file_type) ;?>)</td>
                        <td><?php echo date_format(date_create($files->file_uo_or_letter_date), 'd/m/y'); ?></td>
                        <td><?php echo @getfilesec_id_byfileid($files->file_id,$files->file_mark_section_id,$files->file_type) ? getfilesec_id_byfileid($files->file_id,$files->file_mark_section_id,$files->file_type) : 'N/A'; ?></td>
                        <td><?php echo getSection($files->file_mark_section_id); ?></td>
                        <?php if(@$_GET['secid']==21){ ?>
                        <td><b class="blink_fast"><?php echo date_format(date_create($files->ps_moniter_date), 'd/m/y'); ?></b></td>
                        <?php } ?>
                        <td><?php echo date_format(date_create($files->file_update_date), 'd/m/y'); ?>
                            (<?php if($files->file_hardcopy_status == 'not'){ echo $this->lang->line('mark_date');} else{ echo $this->lang->line('received_date');} ?>)
                        </td>
                            <td>
								<div <?php
                                if($checkdate >= '3' && $checkdate <= '7' && $files->file_hardcopy_status!='close' && $files->file_return!=2) { echo "style='background-color:#FBFBDE' data-toggle='tooltip' data-original-title='३ दिन से अधिक विलंब'";
                                } else if($checkdate >= '7' && $checkdate < '10' && $files->file_hardcopy_status!='close' && $files->file_return!=2) { echo "class='blink_me' style='background-color:#FFE7BA' data-toggle='tooltip' data-original-title='७ दिन से अधिक विलंब'";
                                } else if($checkdate >= '10' && $files->file_hardcopy_status!='close' && $files->file_return!=2) { echo "class='blink_me' style='background-color:#FFA4A4' data-toggle='tooltip' data-original-title='१० दिन से अधिक विलंब'";}
                                ?>>
								<?php
                                $filereceiver = get_user_details($files->file_received_emp_id);
                                if ($filereceiver)
                                {
									if($files->file_hardcopy_status == 'not') {
												echo file_not_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
											} else if($files->file_hardcopy_status == 'close') {
												echo file_closed_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi, $file_details[0]['file_type']);
											} else  if($files->file_hardcopy_status == 'received') {
												echo file_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
											} else if($files->file_hardcopy_status == 'working'){
												echo file_working_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
											}
								} ?>								
								</div>								
								<?php if($files->file_hardcopy_status!='close' && $files->file_return!=2 && ($files->file_hardcopy_status == 'received' || $files->file_hardcopy_status == 'working')){ 
											 $file_log_remark= get_file_remak('single_file_log',$files->file_id,$files->file_received_emp_id);											 
											if($file_log_remark['flog_other_remark']!=''){
											 echo $remark='<p class="text-green"><b style="color:#367fa9">रिमार्क : </b>'.$file_log_remark['flog_other_remark'].'</p>';											
											}
										}?> 
								</td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Page Script -->
<script>
    function showcomp(comp1)
    {
        window.location='<?php echo base_url();?>view_file/viewdetails/'+comp1;
    }
</script>
