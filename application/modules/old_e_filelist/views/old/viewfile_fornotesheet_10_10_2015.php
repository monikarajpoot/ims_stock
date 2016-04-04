<!-- Content Header (Page header) -->
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box" id="divname">
                <div class="box-header">
                    <div style="float:left"><h3 class="box-title"><?php echo $title_tab;?></h3></div>
                    <div style="float:right">
                        <!--<button class="btn btn-block btn-info"><?php echo $this->lang->line('view_file_mark');?></button>-->
						<button onclick="printContents('divname')" class="btn btn-primary no-print">Print</button>
                        <button class="btn btn-warning" onclick="goBack()" data-toggle="tooltip" data-original-title="Back"><?php echo $this->lang->line('Back_button_label'); ?></button>
                    </div>
                </div><!-- /.box-header -->
				<div class="box-body">
                <?php // echo $this->session->flashdata('message'); ?>
                <?php if($this->session->flashdata('message') || $this->session->flashdata('error')) {
                    $msg = $this->session->flashdata('message') ? 'success' : 'danger';
                    ?>
                    <div class="alert alert-<?php echo $msg; ?> alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php  echo $this->session->flashdata('message');
                            echo $this->session->flashdata('error'); ?>
                        <br/>
                    </div>
                <?php }
                ?>
                <table id="view_table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('sno'); ?></th>
                        <th><?php echo $this->lang->line('view_file_subject'); ?></th>
                        <th><?php echo $this->lang->line('uo/letter_no'); ?></th>
                        <th><?php echo $this->lang->line('view_file_uo_letter_date'); ?></th>
                        <th><?php echo $this->lang->line('section_no1'); ?></th>
                        <th><?php echo $this->lang->line('view_file_mark_section_id'); ?></th>
                        <th>विभागj</th>
                        <th><?php echo $this->lang->line('date'); ?></th>
                        <th><?php echo $this->lang->line('filestatus'); ?></th>
                        <th><?php echo $this->lang->line('actions'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1; foreach ($get_files as $key => $files) {
                        if($this->uri->segment(2) == 'file_doc' || $this->uri->segment(4) == 'return'){ $show_r =  base_url()."view_file/document_path/index/".$files->file_id ; $target=""; }
                        else { $show_r =  base_url()."admin_notesheet_master/view_file_notesheet/".$notesheet_id."/".$section_id."/".$files->file_id ; $target="target='_blank'"; }?>
                        <tr>
                            <td><?php echo $i;?> (<?php echo $this->lang->line('file_no'); ?> : <?php echo $files->file_id;?>)</td>
                            <td><?php echo $files->file_subject;?></td>
                            <td><?php echo $files->file_uo_or_letter_no; ?> (<?php echo getFileType($files->file_type) ;?>)</td>
                            <td><?php echo date_format(date_create($files->file_uo_or_letter_date), 'd/m/y'); ?></td>
                            <td><?php echo getfilesec_id_byfileid($files->file_id,$files->file_mark_section_id,$files->file_type);?></td>
                            <td><?php echo getSection($files->file_mark_section_id); ?></td>
                            <td><?php 
							$file_from = file_from_type();
                        $high_bench =  highcourt_bench();
							echo   $files->file_Offer_by == 'c' || $files->file_Offer_by == 'jvn' ? $file_from[$files->file_Offer_by] ." , ". $files->district_name_hi : false ;
							echo    $files->file_Offer_by == 'm' || $files->file_Offer_by == 'u' ? $file_from[$files->file_Offer_by] ." , ". $high_bench[$files->court_bench_id] : false ;
							echo    $files->file_Offer_by == 'sc' ? $file_from[$files->file_Offer_by] ." , Delhi , दिल्ली" : false ;
							echo    $files->file_Offer_by == 'v' || $files->dept_name_hi ? $file_from[$files->file_Offer_by] ." , ". $files->dept_name_hi ." ".$files->file_department_name : $files->file_department_name;
								
							?>
                            </td>
                            <td><?php echo date_format(date_create($files->file_update_date), 'd/m/y'); ?>
                                (<?php if($files->file_hardcopy_status == 'not'){ echo $this->lang->line('mark_date');} else { echo $this->lang->line('received_date');} ?>)
                            </td>
                            <td><?php
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
											
                                    /*if($files->file_hardcopy_status == 'not') {
                                        echo "<span style='color:#dd4b39' >Not Received by <b>".ucfirst($filereceiver[0]->emp_full_name)."</b><br/>(".$filereceiver[0]->emprole_name_hi.")</span>";
                                    } else if($files->file_hardcopy_status == 'received') {
                                        echo "<span style='color:#00a65a' >Received by <b>".ucfirst($filereceiver[0]->emp_full_name)."</b><br/>(".$filereceiver[0]->emprole_name_hi.")</span>";
                                    } else if($files->file_hardcopy_status == 'working') {
                                        echo "<span style='color:#f39c12' >Working by <b>".ucfirst($filereceiver[0]->emp_full_name)."</b><br/>(".$filereceiver[0]->emprole_name_hi.")</span>";
                                    } */
								} ?></td>
                            <td>
                                <?php $senderemp = empdetails($files->file_received_emp_id);
								if(emp_session_id() == '63'){ echo   $this->uri->segment(3)=='1' ? '<a href="'.$show_r.'"  '.$target.' class="btn btn-block btn-sm btn-twitter" data-toggle="tooltip" data-original-title="Add doccument">दस्तावेज सलग्न करें</a>' : false;
                               	}else{ echo   $files->file_hardcopy_status != 'not' && emp_session_id() == $files->file_received_emp_id  ? '<a href="'.$show_r.'"  '.$target.' class="btn btn-block btn-sm btn-twitter" data-toggle="tooltip" data-original-title="Add doccument">दस्तावेज सलग्न करें</a>' : false; }                               
                                echo   $files->file_hardcopy_status != 'not' && emp_session_id() == $files->file_received_emp_id && $files->file_return != '1'  ? '<a href="'.base_url().'manage_file/dealing_manage_files/return_file_so/'.$files->file_id.'" onclick="return confirm_send()" class="btn btn-block btn-sm btn-success" data-toggle="tooltip" data-original-title="Send to SO">एस. ओ. को भेंजे</a>' : false;
                                echo   $files->file_hardcopy_status != 'not' && emp_session_id() == $files->file_received_emp_id && $files->file_return == '1' ? '<a href="'.base_url().'manage_file/dealing_manage_files/return_file_so/'.$files->file_id.'/2" onclick="return confirm_send()" class="btn btn-block btn-sm btn-success" data-toggle="tooltip" data-original-title="Send to SO">एस. ओ. को भेंजे</a>' : false;
                                echo   $files->file_hardcopy_status == 'not' && emp_session_id() == $files->file_received_emp_id && $files->file_return == '1' ? '<a onclick="return confirm_receive()" href="'.base_url().'view_file/dealing_file/receivebyAD/'.$files->file_id.'" class="btn btn-block btn-sm btn-twitter"><span class="blink_fast" data-toggle="tooltip" data-original-title="Receive">'.$this->lang->line('receive_file').'</span></a>' : false;
								echo   ($files->file_hardcopy_status == 'working' || $files->file_hardcopy_status == 'received' ) && emp_session_id() == $files->file_received_emp_id   ? '<a onclick="return confirm_send()" href="'.base_url().'manage_file/dispatch_file_byso/'.$files->file_id.'" class="btn btn-block btn-sm btn-instagram rty1" value="'.$files->file_id.'" data-toggle="tooltip" data-original-title="Send to Dispatch">जावक शाखा में भेजें</a> ' : false;
                            //    echo   $files->file_hardcopy_status == 'received' && emp_session_id() == $files->file_received_emp_id && $files->file_return == '1' ? '<a href="" onclick="return confirm_send()"  class="btn btn-twitter rty1" data-toggle="tooltip" data-original-title="Dispatch File">Dispatch File To SO</a>' : false;
                                ?>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->