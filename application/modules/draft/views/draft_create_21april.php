<link href="<?php echo base_url(); ?>themes/e_file_style.css" rel="stylesheet" type="text/css" />
<?php //pr($file_data); ?>
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
<?php
$url = $subject =  $log_id = null;
$content = 'अनुमोदनार्थ';
if(isset($draft_id) && $draft_id != ''  ){
    $draft_data = get_draft($draft_id);
    $url = '/'.$draft_data['draft_id'];
    if($draft_data['draft_sender_id'] == $draft_data['draft_reciever_id'] && ($draft_data['draft_status'] == 2 || $draft_data['draft_status'] == 3)){
        $content = $draft_data['draft_content_text'];
        $log_id = get_last_log_id($draft_data['draft_id'],$draft_data['draft_reciever_id']);
    } else if($draft_data['draft_type'] != 'n'){
        $content = $draft_data['draft_content_text'];
    }
    $subject = $draft_data['draft_subject'];
}  else{
    $subject = isset($file_data[0]['file_subject']) ? $file_data[0]['file_subject'] : '';
}

?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $sub_title; ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url();?>efile/<?php echo $file_data[0]['file_id'];?>" class="btn btn-danger"><i class="fa fa-file-o"></i> Back</a>
                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <form method="post" name="save_draft" action="<?php echo base_url(); ?>draft/draft/save_draft_file<?php echo $url; ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>विषय</label>
                            <textarea  name="draft_subject" id="draft_subject" class="form-control" style="height:75px" required><?php echo  $subject; ?></textarea>
                            <?php echo form_error('draft_subject'); ?>
                        </div>
                        <div class="form-group">
                            <?php if(isset($draft_data)){
                                $all_drafts = get_draft_log_data($draft_data['draft_id']);
                                if(!empty($all_drafts)){
                                    if($draft_data['draft_type'] == 'n'){
                                        $style = 'padding:2% 13%; background-color:#CCFFCC;';
                                    }else {
                                        $style = 'padding:2% 5%; background-color:#eee;';
                                    }
                                    ?>
                                    <label>ई-<?php echo draft_type($draft_type); ?>  हस्त लेख</label>
                                    <div class="mailbox-read-message no-padding" id="for-print" style="overflow-Y:scroll; max-height:300px;">
                                        <div  style="<?php echo $style; ?>; "  >
                                            <?php
                                            if($draft_data['draft_type'] == 'n'){
												//$all_drafts = get_draft_log_data($draft_data['draft_id'], false, '','draft_log_creater');
                                                $all_drafts = get_draft_log_data($draft_data['draft_id']);
												foreach($all_drafts as $drafts){
                                                    echo filter_string($drafts->draft_content);
                                                    //if(get_employee_role($drafts->draft_log_creater, true) < 9){
                                                    echo '<div class="pull-right">'.verify_digital_sinature($drafts->draft_log_id).'<br/>
													<b>'.getemployeeName($drafts->draft_log_creater, true).'</b><br/>
													(<b><u>'.get_employee_role($drafts->draft_log_creater).'</u></b>)</div><div class="clearfix"></div>';
                                                    if($drafts->draft_log_creater != $drafts->draft_log_sendto){
                                                       echo '<div class="pull-left">';
														if(check_so_on_leave($drafts->draft_log_creater,$drafts->draft_log_sendto) != null){
															echo '<b><u>अनुभाग अधिकारी अवकाश पर </u></b>';
														} 
														echo '<b><u><br/>'.get_employee_role($drafts->draft_log_sendto).'(';
														echo  get_employee_role($drafts->draft_log_sendto, true) == 3 ? 'विधि' : getSectionName($file_data[0]['file_mark_section_id']);
														echo ')</u></b></div>';
                                                    }
                                                    //}
                                                    echo '<hr class="no-print"/>';
                                                }
                                            } else {
                                                $draft_data = get_draft($draft_data['draft_id']);
                                                echo filter_string($draft_data['draft_content_text']);
                                            }

                                            ?>
                                        </div>
                                    </div><!-- /.mailbox-read-message -->
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="form-group text_editor" id="text_editor">
                            <label>ई-<?php echo draft_type($draft_type); ?><?php echo $this->lang->line("hand_sheet"); ?></label>
                            <textarea id="compose_textarea" name="draft_content_text" class="form-control" style="height: 500px" required><?php echo $content ; ?></textarea>
                            <input type="hidden" value="" name="final_content" id="final_content"/>
                            <?php echo form_error('draft_content_text'); ?>
                        </div>

                    </div><!-- /.box-body -->
                    <div class="box-footer text_editor">
                        <div class="pull-right">
                            <input type="hidden" name="file_id" value ="<?php echo isset($file_data[0]['file_id']) ? $file_data[0]['file_id'] : ''; ?>" >
                            <input type="hidden" name="log_id" value ="<?php echo $log_id; ?>" >
                            <input type="hidden" name="draft_type" value ="<?php echo isset($draft_type) ? $draft_type : ''; ?>" >
                            <!--<button type="submit" name="btnadddraft" value="add_draft" onClick="return confirm('कृपया सुनिश्चित कर ले की आप ड्राफ्ट पुनः एडिट के किये सहेज रहे है');" class="btn btn-primary"><i class="fa fa-pencil"></i><?php// echo $this->lang->line("btn_save_draft_to_file"); ?></button>-->
                            
							<button type="submit" name="btnadddraft" value="save_draft" onClick="return confirm('कृपया सुनिश्चित कर ले यह  ड्राफ्ट फाइल पर जोड़ रहे है');" class="btn btn-primary"><i class="fa fa-pencil"></i> <?php echo $this->lang->line("btn_add_draft_to_file"); ?></button>
                        </div>
                        <a href="<?php echo base_url();?>efile/<?php echo $file_data[0]['file_id'];?>" class="btn btn-danger"><i class="fa fa-file"></i> <?php echo $this->lang->line("btn_goto_efile"); ?></a>
                        <a href="javascript:void(0);" id="voice_input"  class="btn btn-warning"><i class="fa  fa-microphone"></i>  <?php echo $this->lang->line("btn_hindi_english"); ?></a>
                    </div><!-- /.box-footer -->
                </form>
            </div><!-- /. box -->
            <div class="box box-primary" id="typewithtext">
                <div class="box-header">
                    <h4 class="box-title"><i class="fa fa-fw fa-edit"></i> हिंदी और इंग्लिश में बोले </h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?php $this->load->view('voice_input_draft');?>
                        </div>
                        <div class="col-md-6">
                            <b>Scan file</b>
                            <?php 	if( !empty($file_data[0]['scan_id'])){ ?>
                                <div class="form-group">
                                    <label for="section no"><?php echo $this->lang->line("all_scaned_file"); ?> :- </label>
                                </div>
                            <?php } ?>
                            <?php 	if(!empty($file_data[0]['scan_id'])){ ?>
                                <div class="form-group">
                                    <ul>
                                        <?php if(isset($file_data[0]['scan_id']) && !empty($file_data[0]['scan_id'])){
                                            $scan_ids = unserialize($file_data[0]['scan_id']);
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
                                        <object id="pdf_viewer" data="<?php echo base_url(). $scan_file; ?>" type="application/pdf" width="100%" height="250px">
                                            <p>It appears you don't have a PDF plugin for this browser.
                                                No biggie... you can <a href="<?php echo base_url(). $scan_file; ?>">click here to download the PDF file.</a></p>
                                        </object>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php if(empty($file_data[0]['scan_id'])) { ?>
                                <p>No Scan file attached..!</p>
                            <?php  } ?>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
							 <?php 	if( !empty($file_data['scan_id'])){ ?>
								<a href="<?php echo base_url(). $scan_file; ?>" id="full_veiwbtn" target="_blank" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i>  <?php echo $this->lang->line('btn_full_view'); ?></a>
							<?php } ?>
						</div>
					</div>
                </div>
                <div class="box-footer">
                    <button type="button" id="btn_close" class="btn btn-primary"><i class="fa fa-times"></i> केवल बंद करें</button>
                    <button type="button" id="btn_close_paste" class="btn btn-primary"><i class="fa fa-times"></i> बंद करें और डाटा पेस्ट करे</button>
                    <button type="button" id="btn_clear" class="btn btn-danger" ><i class="fa fa-times"></i>  डाटा क्लियर करे</button>
                </div>
            </div>
        </div><!-- /.col -->
        <!--Load Model for Voice Input tool-->
    </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- 
	Include the WYSIWYG javascript files

  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#compose-textarea' });</script>-->
<script type="text/javascript" src="<?php echo base_url()?>themes/ckeditor/ckeditor.js"></script>
<!-- 
	Attach the editor on the textareas
-->
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

    function open_model(){
        $('#modal-delete').modal('show');
    }

    //for ck editor
    CKEDITOR.replace('compose_textarea',
        {
            // uiColor: '#00c0ef',
            height : 600,
            // toolbar : 'MyToolbar'
        }
    );

    $(document).ready(function(){
		$("#for-print").animate({ scrollTop: $('#for-print').prop("scrollHeight")}, 1000);
        $("#edit").show();
        $("#typewithtext").hide();
        $('#voice_input').click(function(){
            $(".text_editor").hide();
            $("#typewithtext").show();
        });
        $('#btn_close').click(function(){
            $(".text_editor").show();
            $("#typewithtext").hide();
        });
        $('#btn_close_paste').click(function(){
            $(".text_editor").show();
            $("#typewithtext").hide();
			var final_old = CKEDITOR.instances.compose_textarea.getData();
            var final_new = $("#final_span").val();
            var final_data = final_old+' '+final_new;
            CKEDITOR.instances['compose_textarea'].setData(final_data);
			$("#final_span").val('');
        }); 
		$('#btn_clear').click(function(){ 
			var ret =  confirm('सुनिश्चित कर ले आप बोला हुआ डाटा डिलीट करना चाहते है'); 
			if(ret == true){
				$("#final_span").val('');
			} else{
				return false;
			}
        });
    });
    check_browser();
    function check_browser(){
        var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
        // Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
        var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
        var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
        // At least Safari 3+: "[object HTMLElementConstructor]"
        var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
        var isIE = /*@cc_on!@*/false || !!document.documentMode;   // At least IE6

        var output = 'Detecting browsers by ducktyping:<hr>';
        if(isChrome==true){
            $("#voice_input").show();
        }else{
            $("#voice_input").hide();
        }
    }
</script>