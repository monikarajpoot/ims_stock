<?php $userrole = checkUserrole();
$efile = show_efile_section(getEmployeeSection());?>
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
                <a href="#">भूमिका:- <?php echo getemployeeRole($this->session->userdata('user_role')); ?></a>
            </div>
        </div>

        <?php if($is_emp_first_login==1){ ?>
        <ul class="sidebar-menu">
            <li class="header bg-aqua">Navigation  <span id="counter"></span></li>
                <li <?php if ($this->uri->segment(1) == 'dashboard') { echo 'class="active"'; } ?>>
               <a href="<?php echo base_url(); ?>" data-original-title="Dashboard" data-toggle="tooltip"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>

            <?php if($userrole<=8){?>
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
            <li <?php if ($this->uri->segment(2) == 'create_form' && $this->uri->segment(1) == 'establishment') { echo 'class="active"'; } ?>>
                <a href="<?php echo base_url('establishment');?>/create_form/" title="Eshtablishment create file"><i class="fa fa-users"></i> <span>फाइल/ पत्र जोड़े</span></a>
            </li>
			<li class="treeview <?php if (($this->uri->segment(2) == 'view_file_es' || $this->uri->segment(2) == 'view_file_es' ) && $this->uri->segment(1) == 'establishment') { echo 'active'; } ?>">
              <a href="#">
                <i class="fa fa-file-o"></i>
                <span><?php echo "फाइल/ पत्र देखे ";?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu menu-open" style="display: block;">
                <li <?php  echo $this->uri->segment(2) == 'view_file_es' && $this->uri->segment(3) == '' ? 'class="active"' : '' ;  ?>>
                    <a href="<?php echo base_url('establishment'); ?>/view_file_es"><i class="fa fa-file-text-o"></i>सभी फाइले/आवेदन देखे</a>
                </li>
                  <li <?php  echo $this->uri->segment(2) == 'view_file_es' && $this->uri->segment(4) == 'cr' ? 'class="active"' : '' ;  ?>>
					<a href="<?php echo base_url('establishment');?>/view_file_es/index/cr"><i class="fa fa-file-text-o"></i>आवक से आयी फाइलें / पत्र </a>
				</li>
                <li <?php  echo $this->uri->segment(3) == 'marked_da_file' ? 'class="active"' : '' ;  ?>>
					<a href="<?php echo base_url('establishment'); ?>/est_files/marked_da_file?type=p" data-original-title="फाइल का स्थापना शाखा में  आवागमन " data-toggle="tooltip" ><i class="fa fa-file-text-o"></i>स्थापना शाखा में बनाई फाइलें / पत्र </a>
				</li>
                <li <?php  echo $this->uri->segment(4) == 'return' ? 'class="active"' : '' ;  ?>>
					<a href="<?php echo base_url('establishment'); ?>/view_file_es/index/return"><i class="fa fa-file-text-o"></i> अधिकारी द्वारा आई फाइलें / पत्र </a>
				</li>
                <li <?php  echo $this->uri->segment(2) == 'complaints' ? 'class="active"' : '' ;  ?>>
					<a href="<?php echo base_url('establishment'); ?>/complaints"><i class="fa fa-file-text-o"></i>किये हुए आवेदन</a>
				</li>
              </ul>
            </li>

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
                        <li><a href="<?php echo base_url(); ?>e-files/working"><i class="fa fa-folder-o"></i> कार्यरत ई-फाइलें  (WIP) <span class="label label-primary pull-right" id="total_eworking"><?php if(isset($count_efiles) && !empty($count_efiles)){echo $count_efiles[0];}else{ echo 0;}?></span></a></li>
                        <li><a href="<?php echo base_url(); ?>e-files/inbox"><i class="fa fa-folder-o"></i> अंकित ई-फ़ाइलें (Inbox)  <span class="label label-primary pull-right" id="total_einbox"><?php if(isset($count_efiles) && !empty($count_efiles)){echo $count_efiles[1];}else{ echo 0;}?></span></a></li>
                        <li><a href="<?php echo base_url(); ?>e-files/sent"><i class="fa fa-folder-o"></i> भेजी गई ई-फ़ाइलें (Sent)  <span class="label label-primary pull-right" id="total_esent"><?php  if(isset($count_efiles) && !empty($count_efiles)){echo $count_efiles[2];}else{ echo 0;}?></span></a></li>
                    </ul>
                </li>
                
                <li <?php if ($this->uri->segment(1) == 'draft') { echo 'class="active"'; } ?>>
                    <a href="<?php echo base_url(); ?>draft" data-original-title="Draft" data-toggle="tooltip"><i class="fa fa-file-word-o"></i> <span>ड्राफ्ट</span></a>
                </li>
            <?php }else{ ?>
                <li class="header bg-aqua">E-File Electronic</li>
                <li class="treeview" title="Not Active">
                    <a href="#">
                        <i class="fa fa-facebook-square"></i> <span>E-File</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu menu-open" style="display: block;">
                        <li><a href="javascript:void(0)"><i class="fa fa-folder-o"></i> कार्यरत ई-फाइलें  (WIP) </a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-folder-o"></i> अंकित ई-फ़ाइलें (Inbox)</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-folder-o"></i> भेजी गई ई-फ़ाइलें (Sent)</a></li>
                    </ul>
                </li>
            
                <li title="Not Active">
                    <a href="javascript:void(0)" data-original-title="Draft" data-toggle="tooltip"><i class="fa fa-file-word-o"></i> <span>ड्राफ्ट</span></a>
                </li>
            <?php } ?>
        <?php } ?>
            <!-----efile side menu end---->

			<?php if(check_est_so()) { ?>
                <li class="header bg-aqua">Salary</li>
                <li class="treeview" title="Not Active">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i> <span>वेतन रजिस्टर</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu menu-open" style="display: block;">
					<li><a href="<?php echo base_url(); ?>payroll/advance"><i class="fa fa-folder-o"></i> <?php echo $this->lang->line('advance_master'); ?> </a></li>
                        <li><a href="<?php echo base_url(); ?>payroll/register"><i class="fa fa-folder-o"></i> वेतन रजिस्टर </a></li>
                        <li><a href="<?php echo base_url(); ?>payroll/employee_list"><i class="fa fa-folder-o"></i> <?php echo $this->lang->line('view_all_employee'); ?> </a></li>
                        <li><a href="<?php echo base_url(); ?>payroll/all_details"><i class="fa fa-folder-o"></i> कर्मचारी वितरण सामग्री </a></li>
                    </ul>
                </li>
			<li <?php if ($this->uri->segment(2) == 'category' && $this->uri->segment(1) == 'establishment') { echo 'class="active"'; } ?>>
                <a href="<?php echo base_url('establishment');?>/category/" title="Eshtablishment category"><i class="fa fa-users"></i> <span>शाखा में कार्य के प्रकार</span></a>
            </li>
			<li <?php if ($this->uri->segment(2) == 'work_allote' && $this->uri->segment(1) == 'establishment') { echo 'class="active"'; } ?>>
                <a href="<?php echo base_url('establishment');?>/work_allote/" title="Eshtablishment allote work"><i class="fa fa-users"></i> <span>सहायक को कार्य आवंटित करें</span></a>
            </li>
			<?php } ?>
			<li <?php if ($this->uri->segment(2) == 'files' && $this->uri->segment(1) == 'moniter') { echo 'class="active"'; } ?>>
                <a href="<?php echo base_url();?>moniter/files"><i class="fa  fa-building-o"></i> <span>फाइल मॉनिटर</span></a>
			</li>
           <li <?php if ($this->uri->segment(2) == 'file_search') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>view_file/file_search"><i class="fa fa-search"></i> <span>फाइल खोजें</span></a>
			</li>
            <li <?php if ($this->uri->segment(1) == 'send_file_return') { echo 'class="active"'; } ?>>
                <a href="<?php echo base_url();?>send_file_return"><i class="fa fa-share"></i> <span>फाइल वापस ले</span></a>
			</li>
			<li <?php if ($this->uri->segment(2) == 'add_complaints') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url('establishment');?>/add_complaints"><i class="fa fa-share"></i> <span>आवेदन</span></a>
			</li>
			<li <?php if ($this->uri->segment(1) == 'reports') { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url();?>reports""><i class="fa fa-desktop"></i> <span>रिपोर्टिंग</span></a>
			</li>
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
				<li <?php if ($this->uri->segment(1) == 'today') { echo 'class="active"'; } ?> title="<?php echo $this->lang->line('da_SOfile_title_1').$permission_alloted_empdetail['empname'].'('.$so[1].')'.$this->lang->line('da_SOfile_title_2') ; ?>"><a href="<?php echo base_url();?>today/files/	"><i class="fa  fa-building-o"></i> <span><?php echo $so[1]; ?> फाइलें</span></a></li>
			<?php }} ?>
            <!--
            <li class=""><a href=""><i class="fa fa-plus"></i> <span><?php  // echo $this->lang->line('add_files');?></span> <span class="fa fa-fw fa-arrow-circle-left blink_fast text-yellow"></span></a></li>
            <li class=""><a href="" title="Display All Files"><i class="fa fa-file-text"></i> <span>जोड़ी गई फाइलें</span></a></li>
            <li class=""><a href=""><i class="fa fa-file-text"></i> <span><?php // echo $this->lang->line('view_file_manue');?></span></a></li>
            <li class=""><a href=""><i class="fa fa-search"></i> <span>File Search</span></a></li>
            <li class=""><a href=""><i class="fa fa-building-o"></i> <span>File Monitor</span></a></li>
            <!---->
            </ul><!-- /.sidebar-menu -->
<?php } ?>

    </section>
    <!-- /.sidebar -->
</aside>