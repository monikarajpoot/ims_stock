<?php  $high_bench =  highcourt_bench();
$Employee_lists_estab =  get_establishment_employees('so')  ;
foreach($Employee_lists_estab as $esta_emp){
    $establiment_empids[] = $esta_emp['emp_id'];
    $this->load->helper('text');	
}
$login_emp_level=get_emp_role_levele();
$userrole = checkUserrole();
?>
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
    <div class="row" id="">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header no-print">
                    <h3 class="box-title">Section </h3>
                </div>
				<?php if(isset($_GET['msg']) && $_GET['msg']=='success' ){ ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<strong> ई-फाइलें  सफलता पूर्वक भेंजी गई ! </strong>
				</div>
				<?php } ?>
            </div>
        </div>
    </div>
    <div class="row" id="divname">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <form method="post" action="<?php echo base_url(); ?>e-files/efile_sign" class="no-print">
                        <div class="col-xs-2">
                            <label><b>अनुभाग का नाम</b></label>
                        </div>
                        <div class="col-xs-2">
                            <select name="sections" class="form-control">
                                <?php $empssection = empdetails(emp_session_id());
                                foreach(explode(",",$empssection[0]['emp_section_id'])  as $empsec){ ?>
                                    <option value="<?php echo $empsec ?>" <?php echo @$this->input->post('sections') == $empsec ? "selected" : false?>><?php echo getSection($empsec) ; ?></option>
                                <?php  }?>
                            </select>
                            <?php echo form_error('sections');?>
                        </div>
                        <!--<div class="col-xs-3">
                            <input type="text"  name="search_frm_date" id="search_frm_date" value="<?php //echo @$this->input->post('search_value') ? $this->input->post('search_value') : ''  ?>" autocomplete="off" placeholder="Put Value"  class="form-control">
                            <?php //echo form_error('search_frm_date');?>
                        </div>
                        <div class="col-xs-2">
                            <input type="text"  name="search_to_date" id="search_to_date" value="<?php //echo @$this->input->post('search_value') ? $this->input->post('search_value') : ''  ?>" autocomplete="off" placeholder="Put Value"  class="form-control">
                            <?php //echo form_error('search_to_date');?>
                        </div>-->
                        <div class="col-xs-2">
                            <select name="building_floor" class="form-control">
                                <option value="">फाइल का आवागमन चयन करें</option>
                                <option value="1">उच्च अधिकारी की फाइलें</option>
                                <option value="0">निचले स्तर की फाइलें</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                        <div class="col-xs-1">
                            <a  class="btn btn-primary" href="<?php echo base_url(); ?>e-files/efile_sign">View all</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php //pr($get_files); ?>
        <div class="col-xs-12" >
            <div class="box" style="overflow: auto" >
                <form enctype='application/json' method="post" id="multi_sign_frm" action="<?php echo base_url(); ?>e_filelist/add_multi_signature" class="no-print">
                    <div class="box-header">
                        <div style="float:left"><h3 class="box-title no-print"><?php echo $title_tab;?></h3></div>
                        <div style="float:right">
						<?php if( ($login_emp_level['emprole_level'] == 6 || $login_emp_level['emprole_level'] <= 5) && $userrole!='25' ){ ?>
                            <button disabled id="sign_button"  type="button" class="btn btn-primary no-print">हस्ताक्षर करें </button>
						<?php } ?>
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
                        <table id="view_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no-print"><?php echo $this->lang->line('sno'); ?></th>
                                <th>हस्ताक्षर की  जा रही टीप</th>
                                <th>फाइल  मार्क करें</th>
                                <th>अनुभाग</th>
                                <th>विषय</th>
                                <!--<th>स्थिति</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $j=0; $i=1; foreach ($get_files as $key => $files) {?>
                                <tr class="row-gap" alt="<?php echo $j; ?>" id="rowid<?php echo $j; ?>">
                                    <td class="no-print" title="<?php echo $files->file_id;?>">
                                        <?php echo $i;?>
										<br/>
											CR-<?php echo @getfilesec_id_byfileid($files->file_id,'1') ? getfilesec_id_byfileid($files->file_id,'1') : 'N/A';?>
                                        <br/>
                                        <input type="checkbox" class="slct_file" id="<?php echo $files->file_id; ?>" name="ck_file_id[<?php echo $j;?>]" value="<?php echo $files->file_id; ?>"/>
                                        <?php   $empid= emp_session_id();
                                                $draft_detail= get_final_draft($empid,$files->file_id);
                                        ?>
                                    </td>
                                    <td style="width:350px;" class="no-print" title="<?php echo strip_tags($draft_detail['draft_content']);?>">
                                        <?php echo word_limiter(strip_tags($draft_detail['draft_content'], 20)); ?>
                                        <textarea readonly id="signing_content" name="signing_content[<?php echo $j;?>]" style="visibility:hidden;"> <?php echo urlencode(base64_encode($draft_detail['draft_content'])); //echo encryption('encode',$draft_data['draft_content'])   ?></textarea>
										<input type="hidden" name="draft_log_id[<?php echo $j;?>]" value="<?php echo get_last_log_id($files->draft_id,emp_session_id(),0)?>"/>
                                    </td>
                                    <td style="width:190px">
                                       <?php if(emp_session_id() != 2){ ?>
                                        <input type="radio" required alt="<?php echo $j;?>" id="<?php echo $files->file_id; ?>" name="up_down[<?php echo $j;?>]" value="1" class="file_updown send_file_uper_officer radiobtn<?php echo $files->file_id; ?>" disabled/> उच्च अधिकारी
                                        <br/>
									   <?php } ?>
										<?php if($login_emp_level['emprole_level']=='6'){ $file_send_down='send_file_down_so';}else{ $file_send_down='file_sent_down_by_ofcr'; } ?>	
                                        <input type="radio" required alt="<?php echo $j;?>" id="<?php echo $files->file_id; ?>" name="up_down[<?php echo $j;?>]" value="0" class="file_updown <?php echo $file_send_down; ?> radiobtn<?php echo $files->file_id; ?>" disabled /> निचले अधिकारी
                                        <div id="employeelist_<?php echo $files->file_id; ?>"></div><!--Show Offer Name-->										
										<input type="hidden" value="0" class="total_select_radio_buton_count"  id="total_select_radio_buton_count<?php echo $files->file_id; ?>"/>
										<br/>
										<?php 
											$order_detail = get_generat_order_in_file(emp_session_id(),$files->file_id,'o'); //Check order generated or not
											//echo count($order_detail);
											if(isset($order_detail) && is_array($order_detail)){
												foreach($order_detail as $order_draft_details){
												//pre($order_draft_details);
												//echo $order_draft_details['draft_id'];
										?>	
											<label title="अगर आप नस्ती पर जोड़ें गए आदेश पर हस्ताक्षर करना चाहते हे तो चेकबॉक्स पर क्लिक करें." >
											<input disabled type="checkbox"  class="file_updown chkbox<?php echo $files->file_id; ?>" value="<?php echo $order_draft_details['draft_id'] ?>" name="file_order_id[]"/>
										 	<b> नस्ती पर जोड़ा गया आदेश   </b> <a href="<?php echo base_url();?>draft/draft/draft_viewer/<?php echo $order_draft_details['draft_id'] ?>/1"><i class="fa fa-search"></i></a>
											</label>
										<?php 	}
											} ?>
										<?php 	
										
											$other_dept_notsheet_detail = get_generat_order_in_file(emp_session_id(),$files->file_id,'odn'); //Check order generated or not
											//pre($order_detail); 											
											if(isset($other_dept_notsheet_detail) && is_array($other_dept_notsheet_detail)){
										?>	<br/><br/>
											<span title="अगर आप नस्ती पर जोड़ी  गई  अन्य  विभाग नोटशीट पर हस्ताक्षर करना चाहते हे तो चेकबॉक्स पर क्लिक करें.">
											<input disabled class="chkbox<?php echo $files->file_id; ?>" type="checkbox" value="<?php echo $other_dept_notsheet_detail[0]['draft_id'] ?>" name="file_other_dpt_nt_id[<?php echo $j;?>]"/>
										 	<b> <?php echo draft_type('odn') ?> <a href="<?php echo base_url();?>draft/draft/draft_viewer/<?php echo $other_dept_notsheet_detail[0]['draft_id'] ?>/1"><i class="fa fa-search"></i></a></b>
											</span>
										<?php } ?>
                                    </td>
                                    <td><a href="<?php echo base_url()."view_file/viewdetails/".$files->file_id ;?>" data-toggle="tooltip" data-original-title="View details">
										<?php echo @getfilesec_id_byfileid($files->file_id,$files->file_mark_section_id,$files->file_type) ? getfilesec_id_byfileid($files->file_id,$files->file_mark_section_id,$files->file_type) : 'N/A'; ?><span style='font-size: 12px'><?php echo getSectionName($files->file_mark_section_id) ? ' - '.getSectionName($files->file_mark_section_id) : false ?><span> </a>
										   <br/>
												<?php $rrt = all_getfilesec_id_byfileid($files->file_id);
												foreach($rrt as $rrt1){
													if($rrt1['section_id'] != $files->file_mark_section_id && $rrt1['section_id'] != '1'){
													$sechi = explode('(',getSection($rrt1['section_id']));
													echo "<b>".$rrt1['section_number'] ."</b> - <span style='font-size: 12px'>".$sechi['0']."</span><br/>";
												}} ?>	
												
											<div id="set_new_sect<?php echo $files->file_id; ?>">
												<select name="section_id[<?php echo $j;?>]" id="section_id<?php echo $files->file_id; ?>" class="section_id">
													<option value="<?php echo $files->file_mark_section_id; ?>"><b class="big_font"><?php echo $sec_name = getSection($files->file_mark_section_id,null);?><b></option>
												</select>
											</div>											
                                            <input type="hidden" name="file_status[<?php echo $j;?>]" value="<?php echo $files->file_status; ?>" />
                                            <input type="hidden" name="file_param1[<?php echo $j;?>]" value="<?php echo md5($draft_detail['draft_content']);?>" />
                                            <input type="hidden" name="file_param2[<?php echo $j;?>]" value="<?php echo get_last_log_id($files->draft_id,emp_session_id(),0)?>" /> <!--draft Log id-->
                                            <input type="hidden" name="file_param3[<?php echo $j;?>]" value="<?php echo $login_emp_level['emprole_level'];?>" /><!--emp level-->
                                            <input type="hidden" name="file_param4[<?php echo $j;?>]" value="<?php echo emp_session_id();?>" /><!--emp login id-->
											<input type="hidden" name="file_draft_id[<?php echo $j;?>]" value="<?php echo $files->draft_id; ?>" id="file_draft_id<?php echo $files->file_id; ?>"/>										   
																					   
								   </td>
                                    <td title="<?php echo $file_sub = $files->file_subject; ?>"><?php $file_sub = $files->file_subject;
                                            echo word_limiter($file_sub, 20);
                                        ?>
                                        <br>
                                        <?php show_scan_file($files->scan_id)?>
                                        <br><?php if(isset($files->file_status) && $files->file_status != ''){ show_file_status($files->file_status);}?>
										<br><span class="badge bg-light-blue"> प्रेषक नाम : <?php echo isset($files->file_sender_emp_id)? getemployeeName($files->file_sender_emp_id, 'hindi'):'' ?></span>
                                    </td>                                    
                                </tr>
                                <?php $i++; $j++; } ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </form>
				<input type="hidden" value="0" id="total_slct_count"/>				
				<input type="hidden" value="0" id="total_nu_radio_selected"/>
				<input type="hidden" value="<?php echo $login_emp_level['emprole_level']; ?>" id="emp_login_level"/>
				
            </div><!-- /.box -->
        </div><!-- /.col-12 -->
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->
<?php $this->load->view('view_file/index_script_footer'); ?>
<script>
    $(".slct_file").click(function() {
		var emp_level= "<?php echo $login_emp_level['emprole_level']; ?>";
		var total_select_count=$("#total_slct_count").val();
		if(emp_level==6){
			if(total_select_count >= 10){
				alert('एक बार में १० अधिक फाइलो को डिजिटल हस्ताक्षर नहीं कर सकते |')
				$(".radiobtn"+chkboxid).prop("checked", false);
				return false;
			}
		}else{
			if(total_select_count>=5){
				alert('एक बार में 5 अधिक फाइलो को डिजिटल हस्ताक्षर नहीं कर सकते !')
				$(".radiobtn"+chkboxid).prop("checked", false);
				return false;
			}
		}
		
        var checked = $(this).is(':checked');
        var chkboxid = $(this).attr('id');
		var total_select_radio_count=$("#total_select_radio_buton_count"+chkboxid).val();
        if (checked) {
            $(".radiobtn"+chkboxid).prop("disabled", false);            
			total_select_count=parseInt(total_select_count)+parseInt(1);			
			$('.chkbox'+chkboxid).prop("disabled", false);  
        } else {
			total_select_count=parseInt(total_select_count)-parseInt(1);			
            $(".radiobtn"+chkboxid).prop("disabled", true)
            $("#employeelist_"+chkboxid).html('');
			$("#total_nu_radio_selected").val(total_select_count);
			$(".radiobtn"+chkboxid).prop("checked", false);
			$('.chkbox'+chkboxid).prop("disabled", true); 
        }		
		if(total_select_count==0){			
			$("#sign_button").prop("disabled", true);
		}else{
			$("#sign_button").prop("disabled", false);
		}
		
		$("#total_slct_count").val(total_select_count);
		
    });
    $(".file_updown").click(function () {			
        var rowid = $(this).attr('id');  		
        if($(this).val()=='down'){         
         $("#employeelist_"+rowid).html('Please wait loading');
         }
         if($(this).val()=='up'){         
            $("#employeelist_"+rowid).html('Please wait loading');
         }
		 var count_total = $("#total_nu_radio_selected").val();
		 if(parseInt(count_total)<parseInt($("#total_slct_count").val())){			 
			count_total=parseInt(count_total)+parseInt(1);
		 }
		 //alert(count_total);

		 $("#total_nu_radio_selected").val(count_total);
    });

    $(function () {
        $(".send_file_uper_officer").click(function () {
            var file_id = $(this).val();
            var row_id='';
			var row_file_id='';
            if($(this).attr('id')!=''){
                //rows_id = $(this).attr('id');
                row_file_id = $(this).attr('id');
				row_id = $(this).attr('alt');
            }			
            var HTTP_PATH='<?php echo base_url(); ?>';
            $.ajax({
                type: "POST",
                url: HTTP_PATH + "view_file/upper_role_officer_new/"+file_id,
                datatype: "json",
                async: false,
                data: {file_id: file_id},
                success: function(data) {
                    var r_data = JSON.parse(data);
                    var otpt1 = '<select  class="form-control slct_bx" id="'+row_file_id+'" name="empid['+row_id+']">';
                    $.each(r_data[0], function( index, value ) {
                        if(r_data[1][0].upperofficid == value.emp_id){
                            var selected = 'selected';
                        }else{
                            var selected = null;
                        }

                        if(value.emp_detail_gender=='m'){
                            var fword_en='Shri';
                            var fword_hi='श्री';

                        }else if(value.emp_detail_gender=='f'){
                            var fword_en='Shushri';
                            var fword_hi='सुश्री';
                        }
                        otpt1 += '<option value="'+value.emp_id+'" '+selected+'>'+fword_hi+' '+value.emp_full_name_hi+' ('+value.emprole_name_hi+')</option>';
                    });
                    otpt1 += '</select>';                    
                    $("#employeelist_"+row_file_id).html(otpt1);
                }
            });
        });
		
        //Get user name
        $(".send_file_down_so").click(function () {
			var emp_level= "<?php echo $login_emp_level['emprole_level']; ?>";
            var row_id='';
			var file_creator_id ='';
			var row_file_id='';
            $('#subject_show').html(subject_show);
            if($(this).attr('id')!=''){
                //rows_id = $(this).attr('id');
				row_file_id = $(this).attr('id');
				row_id = $(this).attr('alt');
            }
			row_alt=$(this).attr('alt');
            var file_id = $(this).attr('id');
            var HTTP_PATH='<?php echo base_url(); ?>';
			/*Get DA name who is sent file to so*/
			var slct_sec_id = $("#section_id"+row_file_id).val();
			var file_draft_id = $("#file_draft_id"+row_file_id).val();
			var url = HTTP_PATH+'view_file/get_da_name_whoiscreatefilename';
			/*$.post(url,{ fileid:file_id, sectionid:slct_sec_id,lvlname:emp_level,file_draft_id:file_draft_id,}, function(data){
				result_data = JSON.parse(data);
				file_creator_id = result_data['file_creator_id'];
			});
			*/
			
			$.ajax({
				  type: "POST",
                url: url,
                datatype: "json",
                async: false,
                data: {fileid:file_id, sectionid:slct_sec_id,lvlname:emp_level,file_draft_id:file_draft_id,rowid:row_alt},
                success: function(data) {
						result_data = JSON.parse(data);
						file_creator_id = result_data['file_creator_id'];						
				}
			 });
			/*End Code*/
            $.ajax({
                type: "POST",
                url: HTTP_PATH + "view_file/section_da_name",
                datatype: "json",
                async: false,
                data: {file_id: file_id},
                success: function(data) {
                    var r_data = JSON.parse(data);
                    var otpt = '<select class="form-control Da_name_r slct_bx" id="'+row_file_id+'" name="empid['+row_id+']" required=""><option value=""> चयन करें </option> ';
                    var auto_select='';
					//alert(file_creator_id);
					$.each(r_data, function( index, value ) {
						//alert(file_creator_id+'=='+value.emp_id);
						if(file_creator_id == value.emp_id){
                            var selected = 'selected';
                        }else{
                            var selected = null;
                        }
                        if(value.emp_detail_gender=='m'){
                            var fword_en='Shri';
                            var fword_hi='श्री';

                        }else if(value.emp_detail_gender=='f'){
                            var fword_en='shushri';
                            var fword_hi='सुश्री';
                        }
                        otpt += '<option value="'+value.emp_id+'" '+selected+'>'+fword_hi+' '+value.emp_full_name_hi+'</option>';
                    });
                    otpt += '</select>';                   
                    $("#employeelist_"+row_file_id).html(otpt);
                }
            });
        });
		
		/* this is for eoffice auto select sender emp*/
        $(".file_sent_down_by_ofcr").click(function () {
			var emp_level= "<?php echo $login_emp_level['emprole_level']; ?>";
            var rows_id='';
            var section_html='';
			var row_file_id='';
			var sender_empid = $(this).data('sender_empid');
            $('#subject_show').html(subject_show);
            if($(this).attr('id')!=''){
                //rows_id = $(this).attr('id');
				row_file_id = $(this).attr('id');
				rows_id = $(this).attr('alt');
            }
			row_alt=$(this).attr('alt');
            var file_id = $(this).attr('id');
            var HTTP_PATH='<?php echo base_url(); ?>';
			var old_selct_section=$("#set_new_sect"+row_file_id).html();
			/*Get auto selected downoffier name*/
			var slct_sec_id = $("#section_id"+row_file_id).val();
			var file_draft_id = $("#file_draft_id"+row_file_id).val();
			var url = HTTP_PATH+'view_file/get_da_name_whoiscreatefilename';
			/*$.post(url,{ fileid:file_id, sectionid:slct_sec_id,lvlname:emp_level,file_draft_id:file_draft_id,rowid:row_alt}, function(data){
				result_data = JSON.parse(data);
				sender_empid = result_data['file_creator_id'];
				section_html= result_data['sections'];
				$("#set_new_sect"+file_id).html(section_html);
			});*/
			$.ajax({
				  type: "POST",
                url: url,
                datatype: "json",
                async: false,
                data: {fileid:file_id, sectionid:slct_sec_id,lvlname:emp_level,file_draft_id:file_draft_id,rowid:row_alt},
                success: function(data) {
						result_data = JSON.parse(data);
						sender_empid = result_data['file_creator_id'];
						//alert(sender_empid);
						section_html= result_data['sections'];
						$("#set_new_sect"+file_id).html(section_html);
				}
			 });
			/*End Code*/
            $.ajax({
                type: "POST",
                url: HTTP_PATH + "view_file/return_fileofficer/"+file_id,
                datatype: "json",
                async: false,
                data: {file_id: file_id},
                success: function(data) {
                    //alert('welcome');
                    var r_data = JSON.parse(data);
                    var otpt = '<select class="form-control slct_bx" required id="'+row_file_id+'" name="empid['+rows_id+']"><option value="" >चयन करें </option>';
                    $.each(r_data, function( index, value ) {
                        if(value.role_id == 8 || value.role_id == 37 || value.role_id == 14){
                            var secname = value.section_name;
                        }else{
                            var secname = '';
                        }
                        if(value.emp_id == sender_empid){
                            var selected = 'selected';
                        }else{
                            var selected = null;
                        }
                        if(value.emp_detail_gender=='m'){
                            var fword_en='Shri';
                            var fword_hi='श्री';
                        }else if(value.emp_detail_gender=='f'){
                            var fword_en='shushri';
                            var fword_hi='सुश्री';
                        }
                        otpt += '<option value="'+value.emp_id+'" '+selected+'>'+fword_hi+' '+value.emp_full_name_hi+' ('+value.emprole_name_hi+')  '+secname+'</option>';
                    });
                    otpt += '</select>';
                    $("#employeelist_"+row_file_id).html(otpt);

                    $('#check_sec_count_1').change(function () {
                        var emp_id =  $(this).val();												
                        $.ajax({
                            type: "POST",
                            url: HTTP_PATH + "view_file/check_user_section/",
                            datatype: "json",
                            async: false,
                            data: {emp_id: emp_id},
							
                            success: function(data) {
                                if(data!=0){
                                    var s_data = JSON.parse(data);
                                    var otpt2 = '<select class="section_id" id="section_id'+row_file_id+'" name="section_id['+row_alt+']" required><option value="" >चयन करें </option>';
                                    $.each(s_data, function( index, value ) {
                                        //otpt2 += '<div class="col-md-4 text-center"><label class="radio" ><input type="radio"  required ="required" class="section_id" name="section_id[]" value="'+value.section_id+'">'+value.section_name_hi+' </label></div>';
                                        //otpt2 += '<select class="section_id" id="section_id" name="section_id[]"><option value="'+value.section_id+'">'+value.section_name_hi+'</option></select>';
										otpt2 += '<option value="'+value.emp_id+'">'+value.section_name_hi+'</option>';
                                      });
                                    otpt2 += '</select>';
                                    $("#set_new_sect"+row_file_id).html(otpt2);
                                }
								else{
                                    $("#set_new_sect"+rows_id).html(old_selct_section);
                                }
                            }
                        });
                    });
                }
            });
        });

	});

    $(document).ready(function(){
		$("#sign_button").click(function () {
			
			var total_ckbox_count = $("#total_nu_radio_selected").val();
			var total_radio_count =$("#total_slct_count").val();			
			if(total_ckbox_count=='0' || total_radio_count=='0'){
				alert('कृपया हस्ताक्षर करने से पूर्व फाइल को मार्क करें!');
				return false;
			}else if(total_ckbox_count!=total_radio_count){
				alert('कृपया हस्ताक्षर करने से पूर्व फाइल को मार्क करें!');
				return false;
			}
			var HTTP_PATH='<?php echo base_url(); ?>';
			var url_ref='eoffice_dev';
			var emp_login_lvl=$("#emp_login_level").val();            
			var url = HTTP_PATH+'e_filelist/post_multi_signature'; 
			var site_status = "<?php echo SITE_STATUS; ?>"; 
			/*$.post(url, $("#multi_sign_frm").serialize(), function(data){					
				var site_status = "<?php echo SITE_STATUS; ?>";
				  var location_url = "http://10.115.254.213:8080/data_signing/multiSignData?other="+site_status+"&url="+site_status+"&draft_id="+url_ref+"&file_id="+emp_login_lvl+"&emp_name=bijendra&data="+data; 
				  location.href= location_url;
			});*/			
			$.ajax({
						type: "POST",
						url:url,
						datatype: "json",
						processData: 'false',
						async: true,
						data: $("#multi_sign_frm").serialize(),                            
						success: function(data) {
								var location_url = "http://10.115.254.213:8080/data_signing/multiSignData?other="+site_status+"&url="+site_status+"&draft_id="+url_ref+"&file_id="+emp_login_lvl+"&emp_name=bijendra&data="+data; 
								location.href= location_url;
								
						}
				});
        });		
		 var myVar = setInterval(function(){ if(!$("#sign_button").attr('disabled')){ check_digitally_sign_or_not()} }, 3000);
			function check_digitally_sign_or_not(){	
				var HTTP_PATH='<?php echo base_url(); ?>';
				$.ajax({
						type: "POST",
						url: HTTP_PATH + "manage_file/efile_updates/check_digitally_sign_or_not",
						datatype: "json",
						async: true,
						data: $("#multi_sign_frm").serialize(),                            
						success: function(data) {
								//alert(data);
								if(data>0){ 
									 window.location.href = HTTP_PATH+"e-files/efile_sign?msg=success";
									  $('#multi_sign_frm').reset();
									//location.reload();
									
								}
						}
				});
				
			}
    });	
	function check_dropdown(){
		alert($(this).attr('id'));
	}

</script>