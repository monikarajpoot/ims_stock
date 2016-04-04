<?php   $high_bench =  highcourt_bench();?>
<!-- Content Header (Page header) -->
<style>
.fix-body{
	overflow: auto;
	height: 300px;
}
@page  
{ 
    overflow: auto;
	height: auto;
} 
</style>
<section class="content-header">
    <h1>
        <?php echo $title; ?>
        <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('dashboard'); ?></a></li>
        <li><a href="<?php echo base_url('admin');?>/sections"><?php echo $this->lang->line('title'); ?></a></li>
        <li class="active"><?php echo $title_tab; ?></li>
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
    <div style="float:left"><h3 class="box-title"><?php echo $title_tab;?></h3>
    </div>
    <div style="float:right">
        <?php
        $moveemp = get_move_empid_file($file_details[0]['file_id'],null,$file_details[0]['file_mark_section_id']);
        foreach($moveemp as $moveemp1){  $moveemp2[] = $moveemp1['fmove_current_user_id'];  }
        if($file_details[0]['final_draft_id'] != '' && $this->session->userdata('user_role') != '9' && $this->session->userdata('user_role') != '39' && (in_array(emp_session_id(),$moveemp2) || $this->session->userdata('user_role') == '3')){
        $notesheet = get_draft($file_details[0]['final_draft_id'], 'n');
        $order = get_draft($file_details[0]['final_draft_id'], 'o');
        if($order){ ?>
        <a href="<?php echo base_url(); ?>draft/draft/draft_viewer/<?php echo $order['draft_id']; ?>/1"  class="btn btn-sm bg-olive no-print">आदेश</a>
        <?php }if($notesheet) {?>
        <a href="<?php echo base_url(); ?>draft/draft/draft_viewer/<?php echo $notesheet['draft_id']; ?>/1"  class="btn btn-sm bg-olive no-print">नोटशीट</a>
        <?php }} ?>
        <button onclick="printContents('divname')" class="btn btn-primary btn-sm no-print">Print</button>
        <button class="btn btn-sm btn-warning" onclick="goBack()"><?php echo $this->lang->line('Back_button_label'); ?></button>
    </div>
</div><!-- /.box-header -->
<div class="box-body">


<?php
if($file_details[0]['file_return'] == 2 && $file_details[0]['file_hardcopy_status'] == 'close'){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header" align="center">
                <?php
                    $dispatch_data = get_list(FILES_DISPATCH,'dispatch_id',array('file_id'=>$file_details[0]['file_id']));
                    if(!empty($dispatch_data) && $dispatch_data[0]['issection_despose'] == 0){ ?>
                <h4 class="box-title text-red"><?php echo "यह फाइल जावक द्वारा बंद कर दी गई है जिसका पंजी क्रं  :<b> "  . getfilesec_id_byfileid($file_details[0]['file_id'],8)."</b> है |"; ?></h4>
              <?php } else if(!empty($dispatch_data) && $dispatch_data[0]['issection_despose'] == 1){ ?>
                        <h4 class="box-title text-red">यह फाइल शाखा के द्वारा बंद कर दी गई है |</h4>
                    <div align="center"><b>रिमार्क : </b><?php echo $dispatch_data[0]['remark']; ?></div>
                    <?php }else if(!empty($dispatch_data) && $dispatch_data[0]['issection_despose'] == 2){ ?>
                        <h4 class="box-title text-red">यह फाइल अन्य फाइल में एकीकृत होने के करण बंद कर दी गई है |</h4>
                    <?php }?> </div>
        </div>
    </div>
</div>
<?php } else if ($file_details[0]['file_return'] == 2){ ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header" align="center">
                        <h4 class="box-title text-orange">यह फाइल जावक शाखा को अंकित  कर दी गई है |</h4>
            </div>
        </div>
    </div>
    </div>
<?php } ?>
<div class="row">
<div class="col-md-6"  style="/*margin-top: 15px;*/">
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        <div class="box-header" align="center">
            <h4 class="box-title"><b><?php echo   $file_details[0]['file_type'] == 'app' ? 'आवेदन' : 'नस्ती/पत्र'; ?> की जानकारी</b>
        <span <?php if($file_details[0]['file_hardcopy_status'] == 'close') {?> class="text-red" <?php }else{ ?>class="text-green" <?php } ?>>[<?php echo get_panji_no($file_details[0]['file_id'],$file_details[0]['file_mark_section_id'],$file_details[0]['file_created_date']); ?>]</span>
            </h4><br/>
            <?php if($file_details[0]['file_return'] == '2'){ ?>
                <span class="box-title text-red"><?php echo @$file_details[0]['file_return'] == '2' && @$file_details[0]['status'] != 'close'  ? "" : false ; ?></span>
            <?php } ?>
        </div>
        <?php if($file_details[0]['file_linked_id'] != '' &&  $file_details[0]['file_linked_id'] != 0) { ?>
            <div class="col-xs-12">
                <label for="exampleInputEmail1">सम्बन्धित नस्ती  : </label>
                <?php $file_links = explode(',',$file_details[0]['file_linked_id']);
                foreach($file_links as $file_l){ ?>
            <!-- <a href="<?php /*echo base_url();*/?>view_file/viewdetails/<?php /*echo $file_l ;*/?>"><button type="button" class="btn bg-light-blue btn-xs"><span class="fa fa-fw fa-link"></span> <?php /*echo "View File ". $file_l */?></button></a>-->
            <a href="<?php echo base_url(); ?>view_file/viewdetails/<?php  echo $file_l ; ?>"><button type="button" class="btn bg-light-blue bt-block btn-xs"><span class="fa fa-fw fa-link"></span> <?php
                    $rrt = all_getfilesec_id_byfileid($file_l);
                    foreach($rrt as $rrt1){
                        $sechi = explode('(',getSection($rrt1['section_id']));
                        echo " ".$rrt1['section_number'] ." - <span>".$sechi['0']."</span> , ";
                    }
                    ?></button></a>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="box-body fix-body">
		<?php if(!empty($file_details[0]['file_uo_or_letter_no'])){?>
            <div class="form-group">
                <label for="exampleInputEmail1"><?php
                    echo   $file_details[0]['file_type'] == 'f' ? $this->lang->line('view_file_uo_number') : false;
                    echo   $file_details[0]['file_type'] == 'l' ?  $this->lang->line('label_letterno_number') : false;
                    echo   $file_details[0]['file_type'] == 'a' ? $this->lang->line('label_letterno_number') : false;
                    echo   $file_details[0]['file_type'] == 'r' ? $this->lang->line('label_registry_number') : false;
                    echo   $file_details[0]['file_type'] == 'n' ? $this->lang->line('label_notice_number') : false;
                    echo   $file_details[0]['file_type'] == 'o' ? $this->lang->line('label_letterno_number') : false; 
					echo   $file_details[0]['file_type'] == 'ma' ? 'Miscellaneous' : false; 
					echo   $file_details[0]['file_type'] == 's' ? 'समंस' : false; 
					echo   $file_details[0]['file_type'] == 'od' ? 'अध्यादेश' : false; 
					echo   $file_details[0]['file_type'] == 'pr' ? 'प्रस्ताव' : false; 
					echo   $file_details[0]['file_type'] == 'av' ? 'अभ्यावेदन' : false; 
					echo   $file_details[0]['file_type'] == 'gf' ? 'गिरफ्तारी' : false; 
					echo   $file_details[0]['file_type'] == 'vr' ? 'वारंट' : false; 
					echo   $file_details[0]['file_type'] == 'w' ? 'Writ' : false; 
					echo   $file_details[0]['file_type'] == 'bl' ? 'विधेयक' : false; 
					echo   $file_details[0]['file_type'] == 'app' ? 'आवेदन' : false;
					echo   $file_details[0]['file_type'] == 'fa' ? 'First Appeal' : false;
					
					?> : </label>
                <?php echo (@$file_details[0]['file_uo_or_letter_no'] ? $file_details[0]['file_uo_or_letter_no'] : '' ); ?>
            </div>
		<?php } ?>
		<?php if(!empty($file_details[0]['file_uo_or_letter_date']) && ( $file_details[0]['file_uo_or_letter_date']!= '0000-00-00') ){?>
            <div class="form-group">
                <label for="exampleInputPassword1"><?php
                    echo   $file_details[0]['file_type'] == 'f' ? $this->lang->line('view_file_uo_date') : false;
                    echo   $file_details[0]['file_type'] == 'l' ?  $this->lang->line('label_letterno_date') : false;
                    echo   $file_details[0]['file_type'] == 'a' ? $this->lang->line('label_letterno_date') : false;
                    echo   $file_details[0]['file_type'] == 'r' ? $this->lang->line('label_registry_date') : false;
                    echo   $file_details[0]['file_type'] == 'n' ? $this->lang->line('label_notice_date') : false;
                    echo   $file_details[0]['file_type'] == 'o' ? $this->lang->line('label_letterno_date') : false;
					echo   $file_details[0]['file_type'] == 'ma' ? 'Miscellaneous' : false; 
					echo   $file_details[0]['file_type'] == 's' ? 'समंस' : false; 
					echo   $file_details[0]['file_type'] == 'od' ? 'अध्यादेश' : false; 
					echo   $file_details[0]['file_type'] == 'pr' ? 'प्रस्ताव' : false; 
					echo   $file_details[0]['file_type'] == 'av' ? 'अभ्यावेदन' : false; 
					echo   $file_details[0]['file_type'] == 'gf' ? 'गिरफ्तारी' : false; 
					echo   $file_details[0]['file_type'] == 'vr' ? 'वारंट' : false; 
					echo   $file_details[0]['file_type'] == 'w' ? 'Writ' : false; 
					echo   $file_details[0]['file_type'] == 'bl' ? 'विधेयक' : false; 
					echo   $file_details[0]['file_type'] == 'fa' ? 'First Appeal' : false;
                    echo   $file_details[0]['file_type'] == 'app' ? 'आवेदन' : false;
					?> : </label>
                <?php  echo (@$file_details[0]['file_uo_or_letter_date'] ? date_format(date_create($file_details[0]['file_uo_or_letter_date']), 'd/m/Y') : '' ); ?>
            </div>
			<?php } ?>
			<?php if(!empty( $file_details[0]['applicant_name'] ) )  { ?>
                <div class="form-group">
                    <label for="exampleInputFile">आवेदक का नाम / संस्था फर्म : </label>
                    <?php echo (@$file_details[0]['applicant_name'] ? $file_details[0]['applicant_name'] : '' ); ?>
                </div>
            <?php } ?>
			<?php if(!empty( $file_details[0]['rti_applicant_contactno'] ) )  { ?>
                <div class="form-group">
                    <label for="exampleInputFile">आवेदक / संस्था फर्म का संपर्क न. : </label>
                    <?php echo (@$file_details[0]['rti_applicant_contactno'] ? $file_details[0]['rti_applicant_contactno'] : '' ); ?>
                </div>
            <?php } ?>
			<?php if(!empty( $file_details[0]['pay_serial_no_rti'] ) )  { ?>
                <div class="form-group">
                    <label for="exampleInputFile">सीरियल नम्बर :</label>
                    <?php echo (@$file_details[0]['pay_serial_no_rti'] ? $file_details[0]['pay_serial_no_rti'] : '' ); ?>
                </div>
            <?php } ?>
			<?php if(!empty( $file_details[0]['hearing_date_rti'] ) )  { ?>
                <div class="form-group">
                    <label for="exampleInputFile">सुनवाई दिनांक:</label>
                    <?php echo (@$file_details[0]['hearing_date_rti'] ? date( 'd/m/Y',strtotime($file_details[0]['hearing_date_rti']) ) : '' ); ?>
                </div>
            <?php } ?>
			
<?php if($file_details[0]['scan_id'] != '' &&  $file_details[0]['scan_id'] != null) { ?>
    <div class="form-group">
        <label for="exampleInputEmail1">स्कैन फाइल  : </label>
        <?php if(!empty($file_details[0]['scan_id'])){ ?>
            <div class="form-group">
                <ul>
                    <?php if(isset($file_details[0]['scan_id']) && !empty($file_details[0]['scan_id'])){
                        $scan_ids = unserialize($file_details[0]['scan_id']);
                        //pre($scan_ids);
						$scan_id_values = get_scan_files($scan_ids);
                        foreach($scan_id_values as $scanid){

                            if(!empty($scanid)){
                                $scan_file_details = scan_file_details($scanid);
                                $file_path = $scan_file_details['scan_file_path']; ?>
                                <li class="my_scan_file_2" style="text-align:left; "><a onclick="open_file( <?php echo $scanid ;?>,'<?php echo $file_path; ?>')" style="cursor:pointer"><?php echo get_scan_file_name($scanid); ?></a></li>
                                <?php if(!empty($scan_file_details['scan_bookmark_page'])){
                                    $bookmark = unserialize($scan_file_details['scan_bookmark_page']);
                                    foreach($bookmark as $key1 => $bookmark3){?>
                                        <a class="btn-sm" style="cursor : pointer" onclick="open_file( <?php echo $scanid ;?>,'<?php echo $file_path.'#page='.$key1; ?>')"><?php echo "Page no. ".$key1." - ".$bookmark3;?></a>,
                                    <?php  } }?>
                            <?php }
                        }
                    } ?>
                </ul>
            </div>
        <?php	}?>
    </div>
<?php } ?>

			<?php if(!empty($file_details[0]['file_subject'])){?>
            <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('view_file_subject'); ?> : </label>
                <?php echo (@$file_details[0]['file_subject'] ? $file_details[0]['file_subject'] : '' ); ?>
            </div>
			<?php } ?>
            <div class="form-group">
                <label for="exampleInputFile"><?php echo $this->lang->line('view_file_type'); ?> : </label>
                <?php // echo (@$file_details[0]['file_type'] ? $file_details[0]['file_type'] : '' );
                if(isset($file_details[0]['file_type'])) {
                    echo  getFileType($file_details[0]['file_type']); } ?>
            </div>
			<?php if($file_details[0]['file_Offer_by'] != 0) { ?>
            <div class="form-group">
                <label for="exampleInputFile">प्रस्ताव भेजने वाला विभाग  : </label>
                <?php // echo (@$file_details[0]['file_type'] ? $file_details[0]['file_type'] : '' );
                if(isset($file_details[0]['file_Offer_by'])) {
                    $file_from = file_from_type();
                    $high_bench =  highcourt_bench();
                    echo    $file_details[0]['file_Offer_by'] == 'c' ? $file_from[$file_details[0]['file_Offer_by']] ." , ". $file_details[0]['district_name_hi'] : false;
                  //  echo    $file_details[0]['file_Offer_by'] == 'm' ? $file_from[$file_details[0]['file_Offer_by']] ." , ". $high_bench[$file_details[0]['court_bench_id']] : false;
echo   $file_details[0]['file_Offer_by'] == 'm' || $file_details[0]['file_Offer_by'] == 'u' ? (isset($file_from[$file_details[0]['file_Offer_by']])?$file_from[$file_details[0]['file_Offer_by']]:'') ." , ". (isset($high_bench[$file_details[0]['court_bench_id']])?$high_bench[$file_details[0]['court_bench_id']]:'') : false ;                  
				  echo    $file_details[0]['file_Offer_by'] == 'u' ? $file_from[$file_details[0]['file_Offer_by']] ." , ". $high_bench[$file_details[0]['court_bench_id']] : false;
                    echo    $file_details[0]['file_Offer_by'] == 'au' ? $file_from[$file_details[0]['file_Offer_by']] ." , ". $file_details[0]['state_name_en'] : false;
                    echo    $file_details[0]['file_Offer_by'] == 'v' ? $file_from[$file_details[0]['file_Offer_by']] ." , ". $file_details[0]['dept_name_hi'] : false;
                    echo    $file_details[0]['file_Offer_by'] == 'o' ? $file_from[$file_details[0]['file_Offer_by']] ." , ". $file_details[0]['file_department_name'] : false;
                } ?>
            </div>
			<?php } ?>
			<?php if(!empty($file_details[0]['old_registared_no']) )  { ?>
                <div class="form-group">
                    <label for="exampleInputFile">पुराना रजिस्टर नंबर : </label>
                    <?php echo (@$file_details[0]['old_registared_no'] ? $file_details[0]['old_registared_no'] : '' ); ?>
                </div>
			<?php } ?>
			<?php if($file_details[0]['file_department_id'] != '0' && $file_details[0]['file_department_id'] != null)  { ?>
                <div class="form-group">
                    <label for="exampleInputFile">विभाग : </label>
                    <?php echo (@$file_details[0]['file_department_id'] ? $file_details[0]['dept_name_hi'] : '' ); ?>
                </div>
            <?php } else if($file_details[0]['file_district_id'] != '0' && $file_details[0]['file_district_id'] != null) {?>
                <div class="form-group">
                    <label for="exampleInputFile">जिला : </label>
                    <?php echo (@$file_details[0]['district_name_hi'] ? $file_details[0]['district_name_hi'] : '' ); ?>
                </div>
            <?php } else if($file_details[0]['state_id'] != '0' && $file_details[0]['state_id'] != null) {?>
                <div class="form-group">
                    <label for="exampleInputFile">राज्य : </label>
                    <?php echo (@$file_details[0]['state_id'] ? $file_details[0]['state_name_en'] : '' ); ?>
                </div>
            <?php } else if($file_details[0]['court_bench_id'] != '0' && $file_details[0]['court_bench_id'] != null) {?>
                <div class="form-group">
                    <label for="exampleInputFile">महाधिवक्ता : </label>
                    <?php echo (@$file_details[0]['court_bench_id'] ? $high_bench[$file_details[0]['court_bench_id']] : '' ); ?>
                </div>
            <?php } else if($file_details[0]['file_department_name'] != '0' && $file_details[0]['file_department_name'] != null) {?>
                <div class="form-group">
                    <label for="exampleInputFile">विभाग जहां से प्राप्त हुई : </label>
                    <?php echo (@$file_details[0]['file_department_name'] ? $file_details[0]['file_department_name'] : '' ); ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="exampleInputFile"><?php echo $this->lang->line('file_received_by'); ?> : </label>
                <?php echo get_employee_gender($file_details[0]['emp_id'] ).' '.(@$file_details[0]['emp_full_name_hi'] ? $file_details[0]['emp_full_name_hi'] : '' ); ?>
            </div>
            <div class="form-group">
                <label for="view_file_mark_section_id"><?php echo $this->lang->line('view_file_mark_section_id'); ?> : </label>
                <?php echo (@$file_details[0]['section_name_hi'] ? $file_details[0]['section_name_hi'] : '' ); ?>,<?php echo (@$file_details[0]['section_name_en'] ? $file_details[0]['section_name_en'] : '' ); ?>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $this->lang->line('view_file_mark_section_date'); ?> : </label>
                <?php echo (@$file_details[0]['file_mark_section_date'] ? date_format(date_create($file_details[0]['file_mark_section_date']), 'd/m/Y') : '' ); ?>
            </div>

            <!--new start-->
            <?php if($file_details[0]['case_parties'] != '' &&  $file_details[0]['case_parties'] != null) { ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">पक्षकार/प्रतिवादी : </label>
                    <?php echo (@$file_details[0]['case_parties'] ? preg_replace('/[-]+/', ' ', trim($file_details[0]['case_parties'])) : '' ); ?>
                </div>
            <?php } ?>
			
            <?php

			if( $file_details[0]['case_no']!=='//2015' && $file_details[0]['case_no'] != '' &&  $file_details[0]['case_no'] != null) { ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">प्रकरण क्र.  : </label>
                    <?php echo (@$file_details[0]['case_no'] ? trim($file_details[0]['case_no']) : '' ); ?>
                </div>
            <?php } ?>


            <?php if($file_details[0]['courts_name_location'] != '' &&  $file_details[0]['courts_name_location'] != null) { ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">न्यायालय जिसके आदेश के विरुद्ध अपील / याचिका की गयी  : </label>
                    <?php echo (@$file_details[0]['courts_name_location'] ? trim($file_details[0]['courts_name_location']) : '' ); ?>
                </div>
            <?php } ?>

            <?php if($file_details[0]['file_judgment_date'] != '' &&  $file_details[0]['file_judgment_date'] != null &&  $file_details[0]['file_judgment_date'] !=  '0000-00-00') { ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">निर्णय /आदेश दिनांक  : </label>
                    <?php echo (@$file_details[0]['file_judgment_date'] ? date_format(date_create($file_details[0]['file_judgment_date']),'d/m/Y') : '' ); ?>
                </div>
            <?php } ?>
			<?php if($file_details[0]['file_description'] != '' &&  $file_details[0]['file_description'] != null ) { ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">विवरण  : </label>
                    <?php echo (@$file_details[0]['file_description'] ? $file_details[0]['file_description'] : '' ); ?>
                </div>
            <?php } ?>
            <!--new end-->

            <!--   <div class="form-group">
                                <label for="exampleInputFile"><?php echo $this->lang->line('view_file_level_id'); ?> : </label>
                                <?php echo (@$file_details[0]['file_level_id'] ? $file_details[0]['file_level_id'] : '' ); ?>
                            </div>-->

            <div class="form-group">
                <label for="exampleInputFile"><?php echo $this->lang->line('view_file_progress_status'); ?> : </label>
                <?php
                $filereceiver = get_user_details($file_details[0]['file_received_emp_id']);
                if ($filereceiver)
                {
                    if($file_details[0]['file_hardcopy_status'] == 'not') {
                        echo file_not_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
                    } else if($file_details[0]['file_hardcopy_status'] == 'close') {
                        echo file_closed_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi, $file_details[0]['file_type']);
                    } else  if($file_details[0]['file_hardcopy_status'] == 'received') {
                        echo file_receive_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
                    } else if($file_details[0]['file_hardcopy_status'] == 'working'){
                        echo file_working_message($filereceiver[0]->emp_full_name_hi,$filereceiver[0]->emprole_name_hi);
                    }
                } 
if($file_details[0]['multi_user_receiver_id'] !=null){
                    $multi_rece = explode(',',$file_details[0]['multi_user_receiver_id']);
                    if($file_details[0]['multi_user_receiver_id'] != null && $file_details[0]['multi_user_receiver_id'] != '' && in_array($file_details[0]['file_received_emp_id'],$multi_rece)){                                               echo " तथा ";

                        foreach($multi_rece as $multi){
                            if($multi != $file_details[0]['file_received_emp_id']) {
                                $multi_nm = getemployeeName($multi, $ishindi = true);
                                echo $multi_nm;
                                echo " , ";
                            }
                        }
                        echo " को अंकित की गई है |";
                    }
                }				?>
            </div>


            <?php if($file_details[0]['file_upload'] != null && $file_details[0]['file_upload'] != ''){ ?>
                <div class="form-group">
                    <label for="exampleInputFile">सलग्न दस्तावेज : </label>
                    <?php echo (@$file_details[0]['file_upload'] ? ' <a  data-toggle="tooltip" data-original-title="View Documents" href="'.base_url().'uploads/documents_file/'.$file_details[0]['file_upload'].'" target="_blank"><i class="fa fa-fw fa-download"></i> click here</a>' : '' ); ?>
                </div>
            <?php } ?>
        </div>
    </div><!-- /.box -->
</div>
<div class="col-md-6"  style="/*margin-top: 15px;*/">
    <div class="box box-primary">
        <div class="box-header" align="center">
            <h4 class="box-title"><b><?php echo   $file_details[0]['file_type'] == 'app' ? 'आवेदन' : 'नस्ती/पत्र'; ?> का आवागमन</b></h4>
        </div>
        <!-- form start -->
        <div class="box-body"  style="overflow: auto;height: 300px;">
            <div class="form-group">
                <table width="100%">
                    <tr align="center"><td><b>दिनांक</b></td>
                        <td><b>अधिकारी से</b></td>
                        <td><b>अधिकारी तक</b></td>
                        <td width="75px"><b>आवागमन</b></td>
                    </tr>
                    <?php foreach($file_movement as $row1){
                        if($row1['fmove_current_user_id'] != $row1['fmove_previous_user_id'] || $row1['file_return']==2){
                            $empnmto1 = get_user_details($row1['fmove_current_user_id']);
                            $empnmfrom1 = get_user_details($row1['fmove_previous_user_id'])
                            ?>
                            <tr align="center"><td><?php  echo date_format(date_create($row1['fmove_created_datetime']), 'd/m/Y g:ia'); ?></td>
                                <td><?php if(isset($empnmfrom1[0]->emp_full_name_hi)) { echo emp_gender($empnmfrom1[0]->emp_id)." ". $empnmfrom1[0]->emp_full_name_hi."<br/>(".$empnmfrom1[0]->emprole_name_hi.")"; } ?></td>
                                <td><?php if (isset($empnmto1[0]->emp_full_name_hi)) { echo  emp_gender($empnmto1[0]->emp_id)." ". $empnmto1[0]->emp_full_name_hi."<br/>(".$empnmto1[0]->emprole_name_hi.")"; } ?></td>
                                <td>
                                    <?php echo $row1['file_return'] == '0' ? 'ऊपर <i class="fa fa-fw fa-level-up"></i>' : false ; ?>
                                    <?php echo $row1['file_return'] == '1' ? 'नीचें <i class="fa fa-fw fa-level-down"></i>' : false ; ?>
                                    <?php echo $row1['file_return'] == '3' ? 'रिजेक्ट <i class="fa fa-fw fa-bolt"></i>' : false ; ?>
									<?php if($row1['file_return'] == '2') {
                                        echo $row1['file_return'] == '2' && $file_details[0]['file_hardcopy_status'] == 'close' ? 'बंद <i class="fa fa-fw fa-external-link"></i>' : 'जावक शाखा <i class="fa fa-fw fa-external-link"></i>' ;
                                    }
                                    ?>                               

							   </td>
                            </tr>
                        <?php }} ?>
                </table>

            </div>
        </div><!-- /.box-body -->

    </div><!-- /.box -->
</div>
</div>
<!-- general form elements -->
<hr class="clearfix"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header" align="center">
                <h4 class="box-title"><b><?php echo   $file_details[0]['file_type'] == 'app' ? 'आवेदन' : 'नस्ती/पत्र'; ?> की सम्पूर्ण जानकारी</b></h4>
            </div>
            <!-- form start -->
            <div class="box-body  fix-body"  >
                <div class="form-group">
                    <table width="100%">
                        <tr>
                            <td><b>दिनांक</b></td>
                            <td><b>कोई टिप</b></td>
                            <td><b>कौन लाया</b></td>
                            <td><b>क्या हुआ</b></td>
                            <td><b>दस्तावेज</b></td>
                        </tr>
                        <?php $sublogin=array(); foreach($file_log as $row){
                            // if($row['to_emp_id'] != $row['from_emp_id']){
                            $empnmto = get_user_details($row['to_emp_id']);
                            $empnmfrom = get_user_details($row['from_emp_id']);
                            if(isset($row['sublogin']) && $row['sublogin']!=''){
                                $sublogin = get_user_details($row['sublogin']);
                            }
							//echo 'FTMS';
                            ?>
                            <tr>
                                <td><?php  echo date_format(date_create($row['flog_created_date']), 'd/m/Y g:ia'); ?></td>
                                <td><?php echo @$row['flog_other_remark'] ? $row['flog_other_remark'] : '-' ; ?>

                                    <?php if($row['sublogin'] != 0 && $row['sublogin'] !=$row['to_emp_id'] && $row['sublogin'] !=$row['from_emp_id'] ){
                                        echo 'Worked by '. $sublogin[0]->emp_full_name_hi.'( '. $sublogin[0]->emprole_name_hi .') on behalf of Officer';
                                    } ?></td>
                                <td><?php echo @$row['hardcopy_carry_empname'] ? $row['hardcopy_carry_empname'] : '-' ; ?></td>
                                <td><?php
                                    if($row['to_emp_id'] == $row['from_emp_id']){
                                        if (isset($empnmto[0]->emp_full_name_hi)) {
                                            if(isset($row['fvlm_id']) && $row['fvlm_id'] == 1){
                                                echo " Dispose by ";
                                                echo  file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                            }else if(isset($row['fvlm_id']) && $row['fvlm_id'] == 4){
                                                echo " File Merged by ";
                                                echo  file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                            }else {
                                                echo " File is in progress by ";
                                                echo  file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
												physical_electronic_file_status_receive( $row['file_status_log']);
                                            } }

                                    } else {
                                        if(isset($row['fvlm_id']) && $row['fvlm_id'] == 2){
                                            if (isset($empnmfrom[0]->emp_full_name_hi)) {
                                                echo "File from ";
                                                echo file_status_withname($empnmfrom[0]->emp_id,$empnmfrom[0]->emp_full_name_hi,$empnmfrom[0]->emprole_name_hi);
                                            }
                                            if (isset($empnmto[0]->emp_full_name_hi)) {
                                                echo " Recalled by ";
                                                echo file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                            }

                                        }elseif(isset($row['fvlm_id']) && $row['fvlm_id'] == 3){
                                            if (isset($empnmto[0]->emp_full_name_hi)) {
                                                echo "File from ";
                                                echo file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                            }
                                            if (isset($empnmfrom[0]->emp_full_name_hi)) {
                                                echo " Rejected by";
                                                echo file_status_withname($empnmfrom[0]->emp_id,$empnmfrom[0]->emp_full_name_hi,$empnmfrom[0]->emprole_name_hi);
                                            }
                                        }else{
                                        if (isset($empnmfrom[0]->emp_full_name_hi)) {
                                            echo file_status_withname($empnmfrom[0]->emp_id,$empnmfrom[0]->emp_full_name_hi,$empnmfrom[0]->emprole_name_hi);
                                            echo " marked file to ";
                                        }
                                        if (isset($empnmto[0]->emp_full_name_hi)) {
                                            echo file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                        }
                                    }
										physical_electronic_file_status_send($row['file_status_log']);
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
									if($this->session->userdata('user_role') != '9' && $this->session->userdata('user_role') != '39'){
									if($row['notesheet_file_path'] != '') { ?>
                                        <?php /* <a href="<?php echo base_url().'/uploads/notesheets/'.getSection($row['section_id'], true).'/'.$row['notesheet_file_path'];  ?>" target="_blank"><i class="fa fa-file-pdf-o text-red"></i> <i class="fa fa-cloud-download text-green"></i></a>*/ ?>
                                        <a href="<?php echo base_url().'view_file/view_file/view_notesheet/'.$row['flog_id'];  ?>" target="_blank"><i class="fa fa-file-pdf-o text-red"></i> </a>
										 <!--<a title="Edit Notesheet" style="margin-left:5px" href="<?php //echo base_url().'admin_notesheet_master/view_file_notesheet/'.$row['notesheet_id'].'/'.$row['section_id'].'/'.$row['file_id'];  ?>" target="_blank"><img height="30" width="30" src="<?php //echo base_url();?>images/edit.png" style="height:15px !important; width:15px !important"> </a>-->
                                    <?php }} ?>
                                    <?php if($row['document_path'] != '') {
                                        $path_t = explode(',',$row['document_path']);
                                        foreach($path_t as $path_r){
                                            //    echo $path_r;
                                            ?>
                                            <a title="Attached PDF" style="margin-left:5px" href="<?php echo base_url().''.$path_r;  ?>" target="_blank"><button class="btn btn-sm" type="button"> <i class="fa fa-file-pdf-o text-red"></i> </button></a>
                                        <?php }} ?>
                                    <?php if(isset($row['file_headerpath']) && $row['file_headerpath'] != '') {
                                        $file_meargeid =  unserialize($row['file_headerpath']);
                                        foreach($file_meargeid as $file_mearge){ ?>
                                            <a href="<?php echo base_url();?>view_file/viewdetails/<?php echo $file_mearge ;?>"><button type="button" class="btn bg-light-blue btn-xs" title="<?php echo "fileid ". $file_mearge ?>"><?php echo "पंजी क्रं ". getfilesec_id_byfileid($file_mearge,$row['section_id']) ?></button></a>
                                        <?php  } } ?>
                                </td>
                            </tr>

                            <?php //}
                        } ?>
                    </table>

                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col-12 -->
</div><!-- /.row -->

<?php  $mearge_file = explode(',',$file_details[0]['file_linked_id']);
if($file_details[0]['file_linked_id'] != null){
    $mearge_file_reverse =  array_reverse($mearge_file);
    foreach($mearge_file_reverse as $mearge_file1){
        $file_meargelog = $this->view_file->getFiles_log($mearge_file1);

        ?>
        <hr class="clearfix"/>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header" align="center">
                        <h4 class="box-title">एकीकृत <?php echo   $file_details[0]['file_type'] == 'app' ? 'आवेदन' : 'नस्ती/पत्र'; ?> पंजी क्रं :<b> <?php
                                $rrt = all_getfilesec_id_byfileid($mearge_file1);
                                foreach($rrt as $rrt1){
                                    $sechi = explode('(',getSection($rrt1['section_id']));
                                    echo " ".$rrt1['section_number'] ." - <span>".$sechi['0']."</span> , ";
                                }
                                ?></b></h4>
                        <span class="pull-right">File id : <?php echo $mearge_file1 ?></span>

                    </div>
                    <!-- form start -->
                    <div class="box-body fix-body">
                        <div class="form-group">
                            <table width="100%">
                                <tr>
                                    <td><b>दिनांक</b></td>
                                    <td><b>कोई टिप</b></td>
                                    <td><b>कौन लाया</b></td>
                                    <td><b>क्या हुआ</b></td>
                                    <td><b>दस्तावेज</b></td>
                                </tr>
                                <?php
                                  $sublogin=array();
                                  foreach($file_meargelog as $row){
                                    // if($row['to_emp_id'] != $row['from_emp_id']){
                                    $empnmto = get_user_details($row['to_emp_id']);
                                    $empnmfrom = get_user_details($row['from_emp_id']);
                                      if(isset($row['sublogin']) && $row['sublogin']!=''){
                                          $sublogin = get_user_details($row['sublogin']);
                                      }
                                    ?>
                                    <tr>
                                        <td><?php  echo date_format(date_create($row['flog_created_date']), 'd/m/Y g:ia'); ?></td>
                                        <td><?php echo @$row['flog_other_remark'] ? $row['flog_other_remark'] : '-' ; ?>

                                            <?php if($row['sublogin'] != 0 && $row['sublogin'] !=$row['to_emp_id'] && $row['sublogin'] !=$row['from_emp_id'] ){
                                                echo 'Worked by '. $sublogin[0]->emp_full_name_hi.'( '. $sublogin[0]->emprole_name_hi .') on behalf of Officer';
                                            } ?>

											<?php if(isset($row['file_headerpath']) && $row['file_headerpath'] != '') {
                                        $file_meargeid =  unserialize($row['file_headerpath']);
                                        foreach($file_meargeid as $file_mearge){ ?>
                                            <?php echo "<b>जिसका  पंजी क्रं ". getfilesec_id_byfileid($file_mearge,$row['section_id'])." हैं |</b>"; ?>
                                        <?php  } } ?>
										</td>
                                        <td><?php echo @$row['hardcopy_carry_empname'] ? $row['hardcopy_carry_empname'] : '-' ; ?></td>
                                        <td><?php
                                            if($row['to_emp_id'] == $row['from_emp_id']){
                                                if (isset($empnmto[0]->emp_full_name_hi)) {
                                                    if(isset($row['fvlm_id']) && $row['fvlm_id'] == 1){
                                                        echo " Dispose by ";
                                                        echo  file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                                    }else if(isset($row['fvlm_id']) && $row['fvlm_id'] == 4){
                                                        echo " File Merged by ";
                                                        echo  file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                                    }else {
                                                        echo " File is in progress by ";
                                                        echo  file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);

														physical_electronic_file_status_receive( $empnmto[0]->file_status_log);
                                                    } }
                                            } else {
                                                if(isset($row['fvlm_id']) && $row['fvlm_id'] == 2){
                                                    if (isset($empnmfrom[0]->emp_full_name_hi)) {
                                                        echo "File from ";
                                                        echo file_status_withname($empnmfrom[0]->emp_id,$empnmfrom[0]->emp_full_name_hi,$empnmfrom[0]->emprole_name_hi);
                                                    }
                                                    if (isset($empnmto[0]->emp_full_name_hi)) {
                                                        echo " Recalled by ";
                                                        echo file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                                    }

                                                }elseif(isset($row['fvlm_id']) && $row['fvlm_id'] == 3){
                                                    if (isset($empnmto[0]->emp_full_name_hi)) {
                                                        echo "File from ";
                                                        echo file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                                    }
                                                    if (isset($empnmfrom[0]->emp_full_name_hi)) {
                                                        echo " Rejected by";
                                                        echo file_status_withname($empnmfrom[0]->emp_id,$empnmfrom[0]->emp_full_name_hi,$empnmfrom[0]->emprole_name_hi);
                                                    }
                                                }else{
                                                    if (isset($empnmfrom[0]->emp_full_name_hi)) {
                                                        echo file_status_withname($empnmfrom[0]->emp_id,$empnmfrom[0]->emp_full_name_hi,$empnmfrom[0]->emprole_name_hi);
                                                        echo " marked file to ";
                                                    }
                                                    if (isset($empnmto[0]->emp_full_name_hi)) {
                                                        echo file_status_withname($empnmto[0]->emp_id,$empnmto[0]->emp_full_name_hi,$empnmto[0]->emprole_name_hi);
                                                    }}
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if($row['notesheet_file_path'] != '') { 											
												?>
											
                                                <?php /* <a href="<?php echo base_url().'/uploads/notesheets/'.getSection($row['section_id'], true).'/'.$row['notesheet_file_path'];  ?>" target="_blank"><i class="fa fa-file-pdf-o text-red"></i> <i class="fa fa-cloud-download text-green"></i></a>*/ ?>
                                                <a href="<?php echo base_url().'/view_file/view_file/view_notesheet/'.$row['flog_id'];  ?>" target="_blank"><i class="fa fa-file-pdf-o text-red"></i> </a>
                                                <!--<a title="Edit Notesheet" style="margin-left:5px" href="<?php //echo base_url().'admin_notesheet_master/view_file_notesheet/'.$row['notesheet_id'].'/'.$row['section_id'].'/'.$row['file_id'];  ?>" target="_blank"><img height="30" width="30" src="<?php //echo base_url();?>images/edit.png" style="height:15px !important; width:15px !important"> </a>-->
                                            <?php } ?>
                                            <?php if($row['document_path'] != '') {
                                                $path_t = explode(',',$row['document_path']);
                                                foreach($path_t as $path_r){
                                                    //    echo $path_r;
                                                    ?>
                                                    <a title="Attached PDF" style="margin-left:5px" href="<?php echo base_url().'/'.$path_r;  ?>" target="_blank"> <button type="button" class="btn btn-sm"> <i class="fa fa-file-pdf-o text-red"></i> </button> </a>
                                                <?php }} ?>

                                        </td>
                                    </tr>

                                    <?php //}
                                } ?>
                            </table>

                        </div>
                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div><!-- /.col-12 -->
        </div><!-- /.row -->
    <?php }} ?>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col-12 -->
</div><!-- /.row -->
<!-- Main row -->
</section><!-- /.content -->
<style type="text/css">
    #leave_employee_filter{
        clear: both;
    }
</style>
