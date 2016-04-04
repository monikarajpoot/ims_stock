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
    <div class="row" id="divname">
	<div class="col-md-12"> 
     <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
        <form method="post" action="<?php echo base_url(); ?>view_file/dispatch_file_list/search_files" class="no-print">
            <div class="col-xs-1">
                <label><b>पंजी क्र.</b></label>                              
            </div>
			<div class="col-xs-2">
				<select name="sections" class="form-control">
					<option value="">Select</option>
					<?php $empssection = empdetails(emp_session_id());
					foreach(explode(",",$empssection[0]['emp_section_id'])  as $empsec){ ?>
						<option value="<?php echo $empsec ?>" <?php echo @$this->input->post('sections') == $empsec ? "selected" : false?>><?php echo getSection($empsec) ; ?></option>
					<?php  }?>
				</select>
				<?php echo form_error('sections');?>
			</div>                            
            <div class="col-xs-3">
                <input type="text"  name="search_value" id="search_value" value="<?php echo @$this->input->post('search_value') ? $this->input->post('search_value') : ''  ?>" autocomplete="off" placeholder="Put Value"  class="form-control">
                <?php echo form_error('search_value');?>
            </div>                    
            <div class="col-xs-2">
					<select name="building_name" class="form-control">
					<option value="">Select</option>
					<?php foreach(building_name(true) as $key => $value) { ?>
						<option value="<?php echo $key; ?>" <?php echo @$this->input->post('building_name') == $key ? 'selected' : ''  ?>><?php echo $value; ?></option>
					<?php } ?>
					</select>
            </div><div class="col-xs-2">
					<select name="building_floor" class="form-control">
					<option value="">Select</option>
					<?php foreach(building_floor(true) as $key => $value) { ?>
						<option value="<?php echo $key; ?>" <?php echo @$this->input->post('building_floor') == $key ? 'selected' : ''  ?>><?php echo $value; ?></option>
					<?php } ?>
					</select>
            </div> 
            <div class="col-xs-1">
                <button type="submit" class="btn btn-success">Search</button>
            </div>                          
            <div class="col-xs-1">
                <a  class="btn btn-primary" href="<?php echo base_url(); ?>view_file">View all</a>                       
            </div>
        </form>
        </div>
    </div>
    </div>
    <?php //pr($get_files); ?>
        <div class="col-xs-12" >
            <div class="box" style="overflow: auto" >
                <div class="box-header">
                    <div style="float:left"><h3 class="box-title no-print"><?php echo $title_tab;?></h3></div>
                    <div style="float:right">
                        <!--<button class="btn btn-block btn-info"><?php echo $this->lang->line('view_file_mark');?></button>-->
						<button onclick="printContents('divname')" class="btn btn-primary no-print">Print</button>
                        <button class="btn btn-warning no-print" title="Back" onclick="goBack()"><?php echo $this->lang->line('Back_button_label'); ?></button>
                    </div>
                    <br/>
                </div><!-- /.box-header -->
                 <div class="box-body">
                <?php // echo $this->session->flashdata('message'); ?>
                <?php if($this->session->flashdata('message') || $this->session->flashdata('error')) {
                    $msg = $this->session->flashdata('message') ? 'success' : 'danger';
                    ?>
                    <div class="alert alert-<?php echo $msg; ?> alert-dismissable no-print">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>
                            <?php  echo $this->session->flashdata('message');
                            echo $this->session->flashdata('error'); ?>
                        </strong>
                        <br/>
                    </div>
                <?php }
				$empdetails =  empdetails(emp_session_id());?>
                <table id="view_table_dispatch" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="no-print"><?php echo $this->lang->line('sno'); ?></th>
                        <th><?php echo $this->lang->line('section_no1'); ?> जावक</th>
                        <th><?php echo $this->lang->line('view_file_subject'); ?></th>
                        <th><?php echo $this->lang->line('uo/letter_no'); ?></th>
                        <th><?php echo $this->lang->line('view_file_uo_letter_date'); ?></th>
                        <th><?php echo $this->lang->line('view_file_mark_section_id'); ?>  का  <?php echo $this->lang->line('section_no1'); ?></th>
                        <th><?php echo $this->lang->line('date'); ?></th>
						<th>विभाग</th>
						<th>अनुभाग</th>
                        <th class="no-print"><?php echo $this->lang->line('filestatus'); ?></th>
                        <th class="no-print" width="150px"><?php echo $this->lang->line('actions'); ?></th>
						<th>हस्ताक्षर</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($get_files as $key => $files) { 
					//pr($files);					
                        if(is_array($files)){
                            $files = $files[0];
                        }                                       
					$file_open = $files->file_id;
					$dept_name_hi = $dept_officer_nm =  $dept_officer_number = $dept_officer_email = '';
					//pre($files->file_department_id);
					if($files->file_department_id != '' || isset($files->file_department_id) || $files->file_department_id != 0 ) {
						$file_dept = get_list(DEPARTMENTS, NULL, array('dept_id' => $files->file_department_id));
						//pre($file_dept);
						$dept_name_hi = isset($file_dept[0]['dept_name_hi']) ? $file_dept[0]['dept_name_hi'] : '';
						$dept_officer_nm = isset($file_dept[0]['dept_officer_nm']) ? $file_dept[0]['dept_officer_nm'] : '';
						if(isset($file_dept[0]['dept_officer_number'] )){
							$dept_officer_number = $file_dept[0]['dept_officer_number'] != '' || $file_dept[0]['dept_officer_number'] != 0 ? $file_dept[0]['dept_officer_number'] : '9898989898';
						}
						$dept_officer_email = isset($file_dept[0]['dept_officer_email']) ? $file_dept[0]['dept_officer_email'] : '';
						$file_open = $files->file_id.','.$dept_officer_number;

					}
					
					?>
                        <tr class="row-gap">
                            <td class="no-print"><?php echo $i;?> (<?php echo $this->lang->line('file_no'); ?> : <?php echo $files->file_id;?>)</td>
                            <td contenteditable="true"><b class="big_font"><?php echo @getfilesec_id_byfileid($files->file_id,getusersection(emp_session_id()),$files->file_type) ? getfilesec_id_byfileid($files->file_id,getusersection(emp_session_id()),$files->file_type) : 'N/a' ;?><b></td>
                            <td><?php echo $files->file_subject;?>
							<br><?php show_scan_file($files->scan_id)?>
							</td>
                            <td><?php echo $files->file_uo_or_letter_no; ?> (<?php echo getFileType($files->file_type) ;?>)</td>
                            <td><?php echo date_format(date_create($files->file_uo_or_letter_date), 'd/m/y'); ?></td>
                            <td>
							<b class="big_font"><?php echo get_panji_no($files->file_id,$files->file_mark_section_id,$files->file_created_date); ?></b><br/>
							<?php //echo getSection($files->file_mark_section_id); ?>							
							</td>
                            <td><?php echo date_format(date_create($files->file_update_date), 'd/m/y'); ?>
                                (<?php if($files->file_hardcopy_status == 'not'){ echo $this->lang->line('mark_date');} else { echo $this->lang->line('received_date');} ?>)
                            </td>
							<td><b class="big_font"><?php
							        $file_from = file_from_type();
                                    $high_bench =  highcourt_bench();									
									if(isset($files->file_Offer_by) && isset($file_from)) {
										echo   @$files->file_Offer_by == 'c' || @$files->file_Offer_by == 'jvn' ? @$file_from[$files->file_Offer_by] ." , ". @$files->district_name_hi." <br/> Speed post" : false ;
									}
									if(isset($files->file_Offer_by)  && isset($file_from)  || isset($high_bench)) {
										//pre($high_bench[$files->court_bench_id]);
										echo   @$files->file_Offer_by == 'm' || @$files->file_Offer_by == 'u' ? @$file_from[$files->file_Offer_by] ." , ". $high_bench[$files->court_bench_id] : false ;
									}
									if(isset($files->file_Offer_by)  && isset($file_from)) {
										echo   @$files->file_Offer_by == 'v' || @$files->dept_name_hi ?  @$files->dept_name_hi ." ".@$files->file_department_name : @$files->file_department_name;
									}
								?>
                            </b></td> 
							<td><?php echo getSection($files->file_mark_section_id,$isshort = false); ?></td>
                            <td class="no-print"> <?php
                                $filereceiver = get_user_details($files->file_received_emp_id);
                                if ($filereceiver) {
                                    if($files->file_hardcopy_status == 'not') {
										echo file_not_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
                                       // echo "<span style='color:#dd4b39'><b>".$filereceiver[0]->emp_full_name_hi."</b> के द्वारा प्राप्त नहीं की गयी</br>(".$filereceiver[0]->emprole_name_hi.")</span>";
                                    } else if($files->file_hardcopy_status == 'close') {
										echo file_closed_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi, $files->file_type);
                                       // echo "<span style='color:#dd4b39'><b>".$filereceiver[0]->emp_full_name_hi."</b> के द्वारा ".getFileType($files->file_type)."बंद की गयी</br>(".$filereceiver[0]->emprole_name_hi.")</span>";
                                    } else{
										echo file_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
                                       // echo "<span style='color:#00a65a'><b>".$filereceiver[0]->emp_full_name_hi."</b> के द्वारा प्राप्त  की गयी</br>(".$filereceiver[0]->emprole_name_hi.")</span>";
                                    } 
								} ?></td>
                            <td class="no-print">
                                <?php $senderemp = empdetails($files->file_sender_emp_id);								
							 // echo   $files->file_hardcopy_status == 'not' && emp_session_id() == $files->file_received_emp_id ? '<a onclick="return confirm_receive()" href="'.base_url().'manage_file/receive_file_dispatch/'.$files->file_id.'" class="btn btn-twitter"><span class="blink_fast">'.$this->lang->line('receive_file').'</span></a>' : false;
								echo   $files->file_hardcopy_status == 'not' && emp_session_id() == $files->file_received_emp_id && $files->file_return == '2' && $empdetails[0]['role_id'] != '8' && $empdetails[0]['role_id'] != '37' ? '<a onclick="return confirm_receive()" href="'.base_url().'manage_file/receive_by_officer/'.$files->file_id.'" class="btn btn-twitter"><span class="blink_fast" data-toggle="tooltip" data-original-title="Receive">'.$this->lang->line('receive_file').'</span></a>' : false;                              
								echo   $files->file_hardcopy_status == 'not' && emp_session_id() == $files->file_received_emp_id && ($empdetails[0]['role_id'] == '8' || $empdetails[0]['role_id'] == '37')  ? '<button onclick="open_model3('.$files->file_id.')" value="'.$files->file_id.'" class="btn btn-twitter"><span class="blink_fast" data-toggle="tooltip" data-original-title="Receive">'.$this->lang->line('receive_file').'</span></button>' : false;
                                echo   $files->file_hardcopy_status == 'received' && emp_session_id() == $files->file_received_emp_id && $files->file_return == '2' && ($empdetails[0]['role_id'] == '8' or $empdetails[0]['role_id'] == '37') ? '<button onclick="open_model('.$files->file_id.')" class="btn btn-block btn-twitter rty1" value="'.$files->file_id.'" data-toggle="tooltip" data-original-title="Mark Dealing Assistant">सहायक को अंकित करें</button>' : false;
								echo   $files->file_hardcopy_status == 'received' && emp_session_id() == $files->file_received_emp_id && $files->file_return == '2' ? '<button onclick="open_model2('.$file_open.')" data-fileid="'.$files->file_id.'" data-deptname="'.$dept_name_hi.'" data-officername="'.$dept_officer_nm.'" class="btn btn-block btn-twitter rty1" id="sende_data" value="'.$files->file_id.'" data-toggle="tooltip" data-original-title="Close File">बंद करें</button>' : false;
							    ?>
                            </td>
							<td></td>
                        </tr>
						
                        <?php $i++; } ?>
					
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col-12 -->  
</div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(function () {
        //Get user name
        $(".rty1").click(function () {
            var file_id = $(this).val();
            var HTTP_PATH='<?php echo base_url(); ?>';
            $.ajax({
                type: "POST",
                url: HTTP_PATH + "view_file/section_da_name",
                datatype: "json",
                async: false,
                data: {file_id: file_id},
                success: function(data) {
                    var r_data = JSON.parse(data);
                    var otpt = '<select class="form-control" name="emp_id"><option value="">Select DA name</option> ';
                    $.each(r_data, function( index, value ) {
                        otpt += '<option value="'+value.emp_id+'">'+value.emp_full_name+'</option>';
                    });
                    otpt += '</select>';
                    $("#emp_byfile").html(otpt);
                }
            });
        });
    });
    function open_model(file){
        var file1 = file;
        $('#modal-id').val(file1);
        $('#modal-delete').modal('show');
    }
    function open_model2(file, mobile_number){		
        var file2 = file;
        $('#modal-id2').val(file2);       
        $('#mobile_number').val(mobile_number);
        $('#modal-da').modal('show');
    }
	
	$("#sende_data").click(function(){
		var deptname = " विभाग का नाम :- " + $(this).data("deptname");
		var officername = " विभाग के अधिकारी का  नाम :- " + $(this).data("officername");		
		$('#deptname').html(deptname);
        $('#offcer_name').html(officername);
		var name = $(this).closest("tr").find('td:eq(2)').text();
		//var disc = $(this).closest("tr").find('td:eq(3)').text();
		var fileid = $(this).data('fileid'); 	
		alert(name);
	});
	
    function open_model3(file){
        var file3 = file;
        $('#modal-receive_file').modal('show');
        $('#receive_file1').attr('action','<?php echo base_url() ;?>manage_file/receive_file_dispatch/'+file3);
    }
</script>
<div class="modal fade" id="modal-delete" data-backdrop="static">
    <div class="modal-dialog">
        <!-- <form action="<?php echo base_url() ;?>manage_file/return_file" method="post" >-->
        <form action="<?php echo base_url() ;?>manage_file/return_file_da" method="post" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-fw fa-edit"></i> Enter Remark </h4>
                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="hidden" id="modal-id" name="fileids">
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="modal-id" name="rmk1"></textarea>
                                    <br/>
                                    <div id="emp_byfile"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button id="btn-delete" type="submit" onclick="return confirm_send()" class="btn btn-primary"><i class="fa fa-check"></i> Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="modal-da" data-backdrop="static">
    <div class="modal-dialog">
        <form action="<?php echo base_url() ;?>manage_file/dispatch_for_close" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-fw fa-edit"></i> Enter Remark </h4>
                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="hidden" id="modal-id2" name="fileids2">
                                    <label  id="deptname"></label><br/>
                                    <label  id="offcer_name"></label>
									<hr/>
                                    <div class="form-group">
									<label>मूल्य</label>
                                        <input type="number" name="cost_dispatch" class="form-control" placeholder="cost of diapatch">
                                    </div>
                                    <div class="form-group">
									<label>विभाग के अधिकारी का मोबाइल नंबर</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">+91</div>
                                           <input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Department mobile number">
                                        </div>									                                       
                                    </div>
                                    <div class="form-group">
									<label>कोई टीप</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="modal-id" name="rmk2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" id="proof_dispatch" name="proof_dispatch">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button id="btn-delete" type="submit" class="btn btn-primary" onclick="return confirm_send_sms();"><i class="fa fa-check" ></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--receive model-->
<div class="modal fade" id="modal-receive_file" data-backdrop="static">
    <div class="modal-dialog">
        <form method="post" id="receive_file1">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-fw fa-male"></i> फ़ाइल देने वाले का नाम</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File given by</label>
                                        <input type="text" id="carry_fileemp_name" name="carry_fileemp_name" placeholder="Put name here"  class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button id="btn-delete" onclick="return confirm_receive()" type="submit" class="btn btn-primary"><i class="fa fa-check blink"></i> Receive</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--End-->
<style type="text/css">
    #leave_employee_filter{
        clear: both;
    }
	.row-gap{
		border-bottom:1px solid #cccccc !important;
		margin-bottom:10px !important;
	}
	
</style>
<script>
	function  confirm_send_sms(){        
		var no = document.getElementById('mobile_number');
		if(no.value == ''){
			alert('कृपया मोबाइल नंबर जरुर दर्ज करें|');
			no.focus();
			return false;
		} else {
			return confirm('आप फाइल को बंद कर रहे है और सन्देश नं.  '+ no.value +' पर भेज रहे है');
		}
	}
</script>