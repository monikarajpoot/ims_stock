<?php $userrole = checkUserrole();
$efile = show_efile_section(getEmployeeSection());?>
<?php
$section_exp = explode(',',getEmployeeSection());
//echo $section_exp;
if(in_array('7',$section_exp) && $userrole != 1 && $userrole >= 8 && $userrole != 11 && $userrole != 13 && $userrole != 25 ) {
    $this->load->view('left_sidebar_es');
} else{ ?>

<!-- Left side column. contains the logo and sidebar -->
<?php
$emp_details= get_list(EMPLOYEES,null,array('emp_id'=>$this->session->userdata("emp_id")));
$is_emp_first_login = $emp_details[0]['emp_first_login'];
?>
<aside class="main-sidebar hidden-print">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if (!empty($this->session->userdata('emp_image'))) { ?>
                    <img src="<?php echo USR_IMG_PATH ?><?php echo $this->session->userdata('emp_image') ?>" class="img-circle" alt="User Image" />
                <?php
                } else {
                    ?>
                    <img src="<?php echo ADMIN_THEME_PATH; ?>dist/img/avatar5.png" class="img-circle" alt="User Image" />
                <?php } ?>
            </div>
            <div class="pull-left info">
                <p><?php echo ucfirst($this->session->userdata('emp_full_name')); ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i><?php echo $this->session->userdata('emp_unique_id'); ?> </a>
                <a href="#"><?php echo getemployeeRole($this->session->userdata('user_designation')); ?></a><br/>
                <a href="#">भुमिका:- <?php echo getemployeeRole($this->session->userdata('user_role')); ?></a>
            </div>
        </div>
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <?php
            if ($userrole == 1) {
                ?>
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            <?php } else {
                ?>
                <!-- <div class="input-group-btn shift-left">
                     <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                     <ul class="dropdown-menu  myddl">
                         <li><a href="#">Action</a></li>
                         <li><a href="#">Another action</a></li>
                         <li><a href="#">Something else here</a></li>
                         <li class="divider"></li>
                         <li><a href="#">Separated link</a></li>
                     </ul>
                 </div>
                 <input type="text" class="form-control search_txt"> -->
            <?php } ?>
        </form>
        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <?php if($is_emp_first_login==1){ ?>
        <ul class="sidebar-menu">
            <li class="header bg-aqua">मेनू  <span id="counter"></span></li>
            <!-- Optionally, you can add icons to the links -->
            <?php if($userrole == '38') { ?>
                <li <?php if ($this->uri->segment(1) == 'data_entry') { echo 'class="active"'; } ?>><a href="<?php echo base_url(); ?>data_entry"><i class="fa fa-plus"></i> <span>Add File Data</span></a></li>
                <li <?php if ($this->uri->segment(2) == 'display_file_data') { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>data_entry/display_file_data"><i class="fa  fa-building-o"></i> <span>Display File List</span></a></li>
            <?php } ?>
            <?php //if (in_array($userrole, array(1,3,4,5)) ){ ?>
                <li <?php if ($this->uri->segment(1) == 'dashboard') { echo 'class="active"'; } ?>>
               <a href="<?php echo base_url(); ?>dashboard" data-original-title="Dashboard" data-toggle="tooltip"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
            <?php //} ?>
          
            <?php if (in_array($userrole, array(1,3,4,5)) ){?>
				<?php if($userrole == '3') { ?>
				 <li class="active"><a href="<?php echo base_url('admin');?>/employees"><i class="fa fa-users"></i> <span>कर्मचारी</span></a></li> 
			 <?php } ?>
			<li class="header bg-aqua">Common Navigation</li>
                <li <?php if ($this->uri->segment(1) == 'user_activity' OR $this->uri->segment(1) == 'activity_details') { echo 'class="active"'; } ?>>
                    <a href="<?php echo base_url(); ?>user_activity" data-original-title="User Activity" data-toggle="tooltip"><i class='fa fa-link'></i> <span>  <?php echo $this->lang->line('user_activity_menu'); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                </li>
                <li <?php if ($this->uri->segment(2) == 'department_structure') { echo 'class="active"'; } ?>>
                    <a href="<?php echo base_url('admin');?>/department_structure" data-original-title="Department Structure" data-toggle="tooltip"><i class="fa fa-tree"></i> <span><?php echo $this->lang->line('department_structure'); ?></span></a>
                </li>
            <?php } ?>
			<?php $upper_officer=array('3','4','5','6','7');?>
			<?php if(in_array($this->session->userdata('user_role'),$upper_officer)){ ?>
			<li <?php if ($this->uri->segment(1) == 'pa' OR $this->uri->segment(1) == 'pa') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url();?>pa/list" title="Show Personal Assistant List"><i class="fa fa-file-text"></i>
					<span>
						<?php echo $this->lang->line('permission_allote_to_pay');?>
					</span>
				</a>
			</li>
			<?php } ?>
            <?php if($userrole==8 || $userrole==37 || $userrole==14 || $userrole==5 || $userrole==4 || $userrole==11){?>
                <li>
                    <a href="<?php echo base_url();?>permission/allot" title="संबंधित सहायक को अनुमति प्रदान करें"><i class="fa fa-file-text"></i>
					<span>
						<?php echo $this->lang->line('label_endm_allot_permission_to_da');?>
					</span>
                    </a>
                </li>
            <?php } ?>
            <?php //$this->load->view('sidebars/sidebar_' . $userrole); ?>
            <li class="header bg-aqua">Files Navigation</li>
            <?php $this->load->view('sidebars/ftms_sidebar'); ?>
	    <!-----efile side menu start---->
        <?php $emp_role_levele = get_emp_role_levele();  if($emp_role_levele['emprole_level'] != 14){?>
            <?php  if($efile == 'efile'){ ?>
                <li class="header bg-aqua">E-File Electronic</li>
                <li class="treeview <?php if ($this->uri->segment(1) == 'draft') { echo 'class="active"'; } ?>">
                    <a href="#">
                        <i class="fa fa-facebook-square"></i> <span>E-File</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu menu-open" style="display: block;">
                        <?php $count_efiles = json_decode(modules::run('e_filelist/ajax_count_inbox', true),true);?>
                        <li><a href="<?php echo base_url(); ?>e-files/inbox"><i class="fa fa-folder-o"></i> अंकित ई-फ़ाइलें (Inbox)  <span class="label label-primary pull-right" id="total_einbox"><?php if(isset($count_efiles) && !empty($count_efiles)){echo $count_efiles[1];}else{ echo 0;}?></span></a></li>
                        <li><a href="<?php echo base_url(); ?>e-files/working"><i class="fa fa-folder-o"></i> कार्यरत ई-फाइलें  (WIP) <span class="label label-primary pull-right" id="total_eworking"><?php if(isset($count_efiles) && !empty($count_efiles)){echo $count_efiles[0];}else{ echo 0;}?></span></a></li>
                        <li><a href="<?php echo base_url(); ?>e-files/sent"><i class="fa fa-folder-o"></i> भेजी गई ई-फ़ाइलें (Sent)  <span class="label label-primary pull-right" id="total_esent"><?php  if(isset($count_efiles) && !empty($count_efiles)){echo $count_efiles[2];}else{ echo 0;}?></span></a></li>
                    </ul>
                </li>
                <li <?php if ($this->uri->segment(1) == 'draft') { echo 'class="active"'; } ?>>
                    <a href="<?php echo base_url(); ?>draft" data-original-title="Draft" data-toggle="tooltip"><i class="fa fa-file-word-o"></i> <span>ड्राफ्ट</span></a>
                </li>
				<?php if($emp_role_levele['emprole_level'] == 6 || $emp_role_levele['emprole_level'] <= 5 ){ ?>
				<li title="Not Active">
                    <a href="<?php echo base_url(); ?>e-files/efile_sign" data-original-title="Draft" data-toggle="tooltip"><i class="fa fa-file-word-o"></i> <span>फ़ाइल पर हस्ताक्षर जोड़ें  </span><span class="label label-primary pull-right" id="total_eworking"><?php if(isset($count_efiles) && !empty($count_efiles)){echo $count_efiles[0];}else{ echo 0;}?></span></a>
                </li>
				<?php } ?>
            <?php }else{ ?>
                <li class="header bg-aqua">E-File Electronic</li>
                <li class="treeview" title="Not Active">
                    <a href="#">
                        <i class="fa fa-facebook-square"></i> <span>E-File</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu menu-open" style="display: block;">
                        <li><a href="javascript:void(0)"><i class="fa fa-folder-o"></i> अंकित ई-फ़ाइलें (Inbox)</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-folder-o"></i> कार्यरत ई-फाइलें  (WIP) </a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-folder-o"></i> भेजी गई ई-फ़ाइलें (Sent)</a></li>
                    </ul>
                </li>
                <li title="Not Active">
                    <a href="javascript:void(0)" data-original-title="Draft" data-toggle="tooltip"><i class="fa fa-file-word-o"></i> <span>ड्राफ्ट</span></a>
                </li>
            <?php } ?>
        <?php } ?>
            <!-----efile side menu end---->

			 <li class="header bg-aqua">Reporting</li>
            <li <?php if ($this->uri->segment(2) == 'file_search') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>view_file/file_search"><i class="fa fa-search"></i> <span>फाइल खोजें</span></a>
			</li>
			<?php if($userrole != '9' && $userrole != '1' && $userrole != '2'&& $userrole != '12'&& $userrole != '25'&& $userrole != '13') {?>
                <li <?php if ($this->uri->segment(2) == 'files') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url();?>moniter/files"><i class="fa  fa-building-o"></i> <span>फाइल मॉनिटर</span></a></li>    
	 <?php }?>
            <?php if (in_array($userrole, array(1,2,3,4,5)) ){ ?>
                <li <?php if ($this->uri->segment(1) == 'reports') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url();?>reports"><i class="fa fa-desktop"></i> <span>रिपोर्टिंग</span></a></li>
            <?php }else{ ?>
				<li <?php if ($this->uri->segment(1) == 'reports') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url();?>reports""><i class="fa fa-desktop"></i> <span>रिपोर्टिंग</span></a></li>
			<?php }?>
            <?php
			$emp_ses_id = emp_session_id();
            $empssection = empdetails($emp_ses_id);
            //pre($empssection);
            if($empssection[0]['role_id']==3) { ?>
                <li <?php if ($this->uri->segment(2) == 'files') { echo 'class="active"'; } ?>>
                    <a href="<?php echo base_url(); ?>ps_file_monitor"><i class="fa fa-fw fa-eye"></i> <span>पी .एस. मॉनिटर फ़ाइलें</span></a>
                </li>
            <?php } else if($userrole==3){ ?>
                <li <?php if ($this->uri->segment(2) == 'files') { echo 'class="active"'; } ?>>
                    <a href="<?php echo base_url(); ?>ps_file_monitor"><i class="fa fa-fw fa-eye"></i> <span>पी .एस. मॉनिटर फ़ाइलें</span></a>
                </li>
            <?php }else{
                if(show_view_as_lvl()!='404'){
                    $is_file_alloted= check_ps_monitor_file_is_alloted('count',$this->session->userdata("emp_id"));
                    if($is_file_alloted>0 && $empssection[0]['role_id']!=9){?>
                        <li <?php if ($this->uri->segment(2) == 'files') { echo 'class="active"'; } ?>>
                            <a href="<?php echo base_url(); ?>ps_file_monitor?empid=<?php echo $this->session->userdata("emp_id"); ?>"><i class="fa fa-fw fa-eye"></i> <span>पी .एस. मॉनिटर फ़ाइलें</span></a>
                        </li>
                    <?php 			}
                }
            }
            ?>
			
			<!--Extra Permission menu-->
			<?php 	$logged_emp_permission = check_pa_is_any_permission(null,null); 
					//($logged_emp_is_permission);
					$logged_emp_is_permission= get_list_with_column(EMPLOYEE_PERMISSION_ALLOTED,'emp_id_assign_by,emp_id_assign_to,epa_section_id,epa_designation_id',null,array('emp_id_assign_to'=>$this->session->userdata("emp_id"),'epa_module_name'=>'files'));
					if(count($logged_emp_is_permission)>0){
						if($logged_emp_is_permission['epa_section_id']!='' || $logged_emp_is_permission['epa_section_id']!=0){
							$permission_empid= $logged_emp_is_permission['emp_id_assign_by'];
							$sql="SELECT emp.emp_id,concat(emp.emp_full_name,' - ',emp.emp_full_name_hi) as empname, 
								concat(rolemaster.emprole_name_en,' - ',rolemaster.emprole_name_hi) as rolename, 
								concat(section.section_name_en,' - ',section.section_name_hi) as section_name 
								FROM `ft_employee` as emp inner join ft_emprole_master as rolemaster 
								on rolemaster.role_id=emp.designation_id 
								inner join ft_sections_master as section on section.section_id=emp.emp_section_id 
								WHERE emp.emp_id=$permission_empid and emp.emp_status=1 and emp.emp_is_retired=0";
								$permission_alloted_empdetail=get_row($sql);
						}else if($logged_emp_is_permission['epa_designation_id']!='' || $logged_emp_is_permission['epa_designation_id']!=0){
							//$get_permission_allot_section_desig=get_list_with_column(EMPLOYEEE_ROLE,'emprole_name_hi,emprole_name_en',null,array('epa_designation_id'=>$logged_emp_is_permission['epa_designation_id']));
							
						}
						$so= explode('-',$permission_alloted_empdetail['rolename']);
						if($so[1]==2){
							$so[1]='प्रभारी';
						}
						///pre($so);
						$log_message= ' दिनांक  '.date('Y-m-d').' को '.$this->session->userdata('emp_full_name').'(emp id-'.$this->session->userdata('emp_id').')'.' , '.$permission_alloted_empdetail['empname'].'('.$so[1].')'.'का  कार्य कर रहें थें';
						$today_permision_array=array('today_permission_given_empid'=>$logged_emp_is_permission['emp_id_assign_by'],
												'today_permission_given_secid'=>$logged_emp_is_permission['epa_section_id'],
												'today_permission_given_desigid'=>$logged_emp_is_permission['epa_designation_id'],
												'message'=>$log_message,
						);
						$this->session->set_userdata(array('today_permission_assign'=>$today_permision_array));
					}else{
						$this->session->unset_userdata('today_permission_assign');
					}
					//pre($permission_alloted_empdetail);
				if(count($logged_emp_is_permission)>0){ ?>
                  <?php  if($userrole != '25' && $userrole != '12' && $userrole != '13') {?>
				<li class="header bg-aqua">Other Files Work</li>
				<li <?php if ($this->uri->segment(1) == 'today') { echo 'class="active"'; } ?> title="<?php echo $this->lang->line('da_SOfile_title_1').$permission_alloted_empdetail['empname'].'('.$so[1].')'.$this->lang->line('da_SOfile_title_2') ; ?>"><a href="<?php echo base_url();?>today/files/"><i class="fa  fa-building-o"></i> <span><?php echo $so[1]; ?> फाइलें</span></a></li>
			<?php }} ?>
			<li class="header bg-aqua">Miscellaneous</li>

			<li <?php if ($this->uri->segment(2) == 'add_complaints') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url('establishment');?>/add_complaints"><i class="fa fa-share"></i> <span>आवेदन</span></a>
			</li>
			<!--End Extra Permission menu-->

			<?php if (isset($userrole) && $userrole == '8'){
			?>
			<li <?php if ($this->uri->segment(1) == 'dealing_assistant') { echo 'class="active"'; } ?>>
			<a href="<?php echo base_url();?>dealing_assistant" title="Dealing Assistant List"><i class="fa fa-users"></i> <span><?php echo $this->lang->line('dealing_assistant_manue');?></span></a></li>
			<?php } ?>
			<!-- End show all Dealing Assistant List show only so -->
			<li <?php if ($this->uri->segment(1) == 'send_file_return') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url();?>send_file_return"><i class="fa fa-share"></i> <span>फाइल वापस ले</span></a>
			</li>
			<?php if(show_view_as_lvl()!='404'){?>
			<li <?php if ($this->uri->segment(1) == 'dashboard') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url();?>dashboard"><i class="fa fa-file-text"></i> <span>फाइल  का  एकीकरण </span></a>
			</li>
			<li <?php if (isset($_GET['task']) && $_GET['task'] == 'reopen') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url();?>view_file/file_search?task=reopen"><i class="fa fa-file-text"></i> <span>फाइल को पुनः खोलें </span></a>
			</li>
			<?php } ?>
			<li <?php if ($this->uri->segment(1) == 'suggestions' ) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url();?>suggestions"><i class="fa fa-file-text"></i> <span>सुझाव </span></a>
			</li>

			<!--End Extra Permission menu-->


        </ul><!-- /.sidebar-menu -->
<?php } ?>
    </section>
    <!-- /.sidebar -->
</aside><?php } ?>
<script>
var HTTP_PATH='<?php echo base_url(); ?>';
function count_efile() {
	$.ajax({
		url: HTTP_PATH + "e_filelist/ajax_count_inbox",
		datatype: "json",
		async: true,
		data: {section_id: ''},
		success: function(data){
			var r_data = JSON.parse(data);
			$("#total_eworking").text(r_data[0]);
			$("#total_einbox").text(r_data[1]);
			$("#total_esent").text(r_data[2]);
			//alert(r_data);
		}
	});
}
function check_sign_data_response() {
	$.ajax({
		url: HTTP_PATH + "sign.php",
		datatype: "json",
		async: true,
		data: {section_id: ''},
		success: function(data){
			//var res_data = JSON.parse(data);
			//alert(res_data);
			console.log(data);
		}
	});
}
var refreshId = setInterval("count_efile()", 7000);
</script>