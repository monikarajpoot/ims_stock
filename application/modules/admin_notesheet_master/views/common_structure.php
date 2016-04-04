<?php
//pre($file_details);
$emp_allot_seet = empdetails_alloted_work();
$uber_sect = 7 ;
$secetry = 4 ;
$add_secetroy = 5 ;
$toal_seet_work = array(1,2,3,4,'sc');
//file details
$today = date('d-m-Y');
$file_id = $file_details[0]['file_id'];
//$file_number = $file_details[0]['file_number'];
$file_uo_or_letter_no = $file_details[0]['file_uo_or_letter_no'];
$file_uo_or_letter_date = $file_details[0]['file_uo_or_letter_date'];
$file_uo_or_letter_date1 = date("d-m-Y", strtotime($file_uo_or_letter_date));
$file_subject = $file_details[0]['file_subject'];
$file_type = $file_details[0]['file_type'];
$case_no = $file_details[0]['case_no'];
$case_no1 = explode("/",$case_no);
$file_judgment_date = $file_details[0]['file_judgment_date'];
$file_judgment_date1 = $file_judgment_date != '0000-00-00' ? date("d-m-Y", strtotime($file_judgment_date)) : false;
$file_mark_section_date = $file_details[0]['file_mark_section_date'] != '0000-00-00' ? date("d-m-Y", strtotime($file_details[0]['file_mark_section_date'])) : false;
$days_delay =  day_difference_dates($file_judgment_date, date('Y-m-d'));
$file_department = ($file_details[0]['dept_name_hi'] != '') ? $file_details[0]['dept_name_hi'] : '';
$district_name_hi = ($file_details[0]['district_name_hi'] != '') ? $file_details[0]['district_name_hi'] : '';
$agenst =  array_pop(explode('-', $file_details[0]['case_parties']));
$agenst_name =  array_pop(explode('-', $file_details[0]['case_parties'],-2));
$file_mark_section_id = $file_details[0]['file_mark_section_id'];
$file_type = $file_details[0]['file_type'];

$file_number = getfilesec_id_byfileid($file_id, $file_mark_section_id, $file_type);
//notesheet details
$notesheet_id = $notesheet_details[0]->notesheet_id;
$section_id = $notesheet_details[0]->section_id;
$notesheet_title = $notesheet_details[0]->notesheet_title;
$doc_type = $notesheet_details[0]->doc_type;
$section_name = getSection($section_id, true);
$case_parties = $file_details[0]['case_parties'];
$case_parties1 = explode("-",$case_parties);

$panji_krmank = getfilesec_id_byfileid($file_id,$file_mark_section_id,$file_type);
//get  secretary law
$details_sl = get_section_employee($section_id, 4);
foreach ($details_sl as $row) {
    $sl_name = $row->emp_full_name_hi;
    $sl_name_en = $row->emp_full_name;
	$s_id = $row->emp_id;
}
//get aditional secretary
$details_as = get_section_employee($section_id, 5);
foreach ($details_as as $row) {
    $as_name = $row->emp_full_name_hi;
    $as_name_en = $row->emp_full_name;
	$as_id = $row->emp_id;
}
//get section oficer
$details_so = get_section_employee($section_id, 8);
foreach ($details_so as $row) {
    $so_name = $row->emp_full_name_hi;
	$so_id = $row->emp_id;
}
//get under secretary oficer
$details_us = get_section_employee($section_id, 7);
foreach ($details_us as $row) {
    $us_name = $row->emp_full_name_hi;
	$us_id = $row->emp_id;
}
//get account officer oficer
$details_ao = get_section_employee(13, 11);
foreach ($details_ao as $row) {
    $ao_name = $row->emp_full_name_hi;
	$ao_id = $row->emp_id;
}


$dept_name = 'मध्यप्रदेश शासन, विधि और विधायी कार्य विभाग';

//criminal work variable
$vakalatnam = 'IN THE MATTER OF VAKALATNAMA';
$case_nm = case_name();



//criminal work variable end
//standing counsil menber name and address
$standing_counsil_memebers = get_advocates_name(array('advocate_type' => 'sc'));

$standing_counsil_memebers_hc = get_advocates_name(array('advocate_type' => 'hc'));

$state_list  = get_state_list();

$advocate_type = array(
    //'',
	'मान0  उच्चतम  न्यायालय',
	'अतिरिक्त महाधिवक्ता',
    'महाधिवक्ता',
	'रजिस्ट्रार',
    'डिप्टी रजिस्ट्रार',
	''
);
$court_type = array(
    //'',
	'मान0  उच्च न्यायालय',
    'मान0 उच्च न्यायालय खण्डपीठ',
	'मान0  उच्चतम  न्यायालय',
);
$court_location = array(
    //'',
	'जबलपुर, मध्यप्रदेश',
	'इंदौर, मध्यप्रदेश',
    'ग्वालियर, मध्यप्रदेश',
	'नई दिल्ली '
);
$court_location2 = array(
    'जबलपुर',
    'खंडपीठ इंदौर',
    'खंडपीठ ग्वालियर',
);
$sufix_list =  array(
    //'',
    'st',
    'nd',
    'rd',
    'th',
);
$title_list_hi =  array(
    //'',
    'श्री',
    'श्रीमति',
    'सुश्री',
    'श्रीमान',
);

$title_list =  array(
    //'',
    'Shri',
    'Miss',
    'Mrs.',
    'Mr.',
);
$sambhag = array(
    'चम्बल',
    'ग्वालियर',
    'उज्जैन',
    'इंदौर',
    'नर्मदापुरम',
    'जबलपुर',
    'रीवा',
    'शहडोल',
    'भोपाल',
    'सागर',
);
$dsig = array(
    'अतिरिक्त सचिव',
    'अवर सचिव',
    'सचिव',
);
$writ_lists =  array(
    'रिट याचिका',
    'रिट अपील',
    'रिव्यु याचिका',
    'अवमानना याचिका',
    'प्रतिरक्षण',
    'विविध याचिका',
    'विशेष अनुमति याचिका',
);
$case_hindi = array(
    'विशेष सत्र',
    'आपराधिक',
    'सत्र',
    'दांडिक',
);

$dosh_mukti = array(
    'दोषमुक्ति',
    'सजावृद्धि',
);
/*$istype = $style = '';
if($is_genrate == true && isset($post_data['isnotesheet']) && $post_data['isnotesheet'] == 'yes'){
	$width = 'width:80%; margin:0 auto;';
	$istype = '?type=n';
	$style = 'background-color:#CCFFCC;';
} else if($is_genrate == true){
	$width = 'width:100%; margin:0 auto;';
} else {
	$width = 'width:100%; margin:0 auto;';
}

$structure_prefix = '<html><body><table  style="margin:0% auto;" cellspacing="1" cellpadding="0">';
$structure_postfix = '</table></body></html>';

if ($is_genrate == false) {
    $controller = 'generate_notesheet';
} else {
   $controller = 'save_notesheet';
   //$controller = 'complete_draft';
}
$url = base_url().'admin_notesheet_master/notesheet_generate/'.$controller.'/'.$notesheet_id.'/'.$section_id.'/'.$file_id.$istype;
*/
$type = '';


if ($is_genrate == false) {
    $controller = 'generate_notesheet';
    $type = "?type=".$doc_type;
} else {
    $controller = 'save_notesheet';
    $type = "?type=".$doc_type;
}
$doc_type = $this->input->get('type') != '' ? $this->input->get('type') : $doc_type ;

if($this->uri->segment(6)){
	$file_status = '/'.$this->uri->segment(6);
}else{
	$file_status = '' ;
}
$url = base_url().'admin_notesheet_master/notesheet_generate/'.$controller.'/'.$notesheet_id.'/'.$section_id.'/'.$file_id.$file_status.$type;
//$url = base_url().'admin_notesheet_master/notesheet_generate/'.$controller.'/'.$notesheet_id.'/'.$section_id.'/'.$file_id.$type;



//if($is_genrate == true && isset($post_data['isnotesheet']) && $post_data['isnotesheet'] == 'yes'){
if($doc_type == 'n'){
    $style = 'width:100%; background-color:#CCFFCC; margin:0 auto;';
    $width = 'width:70%; margin:0 auto;';
    //$type_style = 'background-color:#CCFFCC;';
} else if($doc_type != 'n'){
    $style = 'width:100%; background-color:#eee; margin:0 auto;';
    $width = 'width:100%; margin:0 auto;';
    //$type_style = 'background-color:#eee;';
}

$structure_prefix = '<html><body><table style="margin:0% auto;" cellspacing="1" cellpadding="0">';
$structure_postfix = '</table></body></html>';
?>
<link href="<?php echo base_url(); ?>themes/e_file_style.css" rel="stylesheet" type="text/css" />
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
            <!-- Various colors -->
            <div class="box box-primary">
                <div class="box-header no-print">
                    <h3 class="box-title">प्रोफार्मा</h3>
					<div class="box-tools pull-right">
						 <!--<button type="button" onclick="return window.close();" >बंद करे</button>-->
						<button class="btn btn-warning" onclick="goBack()" data-toggle="tooltip" data-original-title="Back"><?php echo $this->lang->line('Back_button_label'); ?></button>
					</div>
				</div>
                <form method="post" name="notesheetForm" action="<?php echo $url; ?>" >
					<input type="hidden" value="<?php echo  $file_sts; ?>" name="file_sts" id="file_sts" >
					<?PHP if($this->input->post('add_secetroy')){?>
                   <input type="hidden" name="officer_id" id="officer_id" value="<?php echo $this->input->post('add_secetroy') ?>" >
                    <?php } ?>
                     <?PHP if($this->input->post('avar_secetroy')){?>
                   <input type="hidden" name="officer_id" id="officer_id" value="<?php echo $this->input->post('avar_secetroy') ?>" >
                    <?php } ?>
					 <?PHP if($this->input->post('secetroy')){?>
                   <input type="hidden" name="officer_id" id="officer_id" value="<?php echo $this->input->post('secetroy') ?>" >
                    <?php } ?>
						<div class="box-body" id="forPrint" style="<?php echo $style; ?>">
                        <div  <?php echo  $is_genrate == true ? ' contenteditable="true"' : ''; ?>  style="<?php echo $width; ?>" class="show_content" >
                            <?php require($section_name . '/' . $notesheet_id . '.php');
                            $final_contents = $structure_prefix.$contents.$structure_postfix;
                            ?>
							<?php if(($section_id != 14) && ( $this->uri->segment(4) != 152)){ ?>
                            <input type="hidden" value="<?php echo $this->encrypt->encode($final_contents) ; ?>" name="contents">
							<?php } ?>
							
                            <?php if($is_genrate == true){
                                echo $final_contents;
                            } else {
                                echo $final_contents;
                            }
                            ?>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer" >
                        <?php if($is_genrate == true){  ?>
                            <div class="sticky sticky_class no-print">
                                <label><input type="checkbox" name="isupdate" value="yes" title="संसोधित करना">संशोधित करना</label>
								<?php if(($section_id == 14) || ( $this->uri->segment(4) == 152)){ ?>
							   <button type="button" onclick="save_notesheet();"  class="btn btn-primary margin" value="" name="savepdf">Save and Continue</button> 
								<?php }else { ?>
                                 <button type="submit" onclick="return confirm('Ready for generate..');"  class="btn btn-primary margin" value="" name="savepdf">Save and Continue</button> 
                               <?php } ?>
                                <button type="button" onclick="goBack()" class="no-print btn btn-warning margin">Back or Edit</button>
                                <button type="button" onclick="printDiv('forPrint')" class="no-print btn bg-maroon margin">Print Content</button>
                            </div>
                        <?php  } else { ?>
                            <div class="sticky sticky_class no-print">
                                <!--<label><input type="checkbox" name="isnotesheet" value="yes" title="नोटशीट निकालना">नोटशीट निकालना</label><br/>-->
                                <button type="submit" onclick="return confirm('Ready for generate..');"  class="btn btn-success " value="Generate" name="generate">Generate</button>
                            </div>
                        <?php  } ?>
                    </div>
                </form>
            </div>	<!-- /.box -->
        </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->
<?php $this->load->view('footer_js.php'); ?>
<script src="<?php echo base_url(); ?>themes/e_file_style.js" type="text/javascript"></script>
<script>
function save_notesheet(){

	var conf = confirm('कपया सुनिश्चित करें कि आप इसे सुरक्षित करना चाहते है | ') ;
	
	if(conf == false ){
		return false;
	}
	var content1 = $('.show_content').html().trim();;
	
	//alert(content1)	;
	var d_type = "<?php echo $this->input->get('type') ?>"; 
	var file_id = "<?php echo $this->uri->segment(6) ?>"; 
	var section_id ="<?php echo $this->uri->segment(5) ?>"; 
	var notesheet_id = "<?php echo $this->uri->segment(4) ?>";  
	var file_sts = $("#file_sts").val();  
	var head_id = $("#head").val();  
	var officer_id = $("#officer_id").val(); 
	var HTTP_PATH='<?php echo base_url(); ?>';
            $.ajax({
                url: HTTP_PATH + "admin_notesheet_master/notesheet_generate/save_notesheet/",
                type: 'POST',
                data: {
                file_sts:file_sts, content1: content1,file_id:file_id,section_id:section_id,notesheet_id:notesheet_id,head_id:head_id,d_type:d_type,officer_id:officer_id
                },       
                success: function(data) {
					//alert(data);

					if(file_sts == 'p'){

					window.location="<?php echo base_url(); ?>attached/file_doc/1";
					}else{
						window.location="<?php echo base_url(); ?>efile/"+file_id;
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					//alert("some error"+textStatus);
  }
			});
}
</script>

