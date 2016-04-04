<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>FTMS </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo ADMIN_THEME_PATH; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <!--<link href="<?php //echo ADMIN_THEME_PATH; ?>extra/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

<!--<link type="text/css" rel="stylesheet" href="<?php //echo base_url(); ?>themes/admin/plugins/iCheck/all.css">-->
    <link href="<?php echo base_url(); ?>themes/style.css" rel="stylesheet" type="text/css" />	
  <!--Data Table CSS-->
     <!-- DATA TABLES -->
    <link href="<?php echo ADMIN_THEME_PATH; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ADMIN_THEME_PATH; ?>plugins/datatables/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="<?php echo ADMIN_THEME_PATH; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!--Text Slider-->
	<link href="<?php echo ADMIN_THEME_PATH; ?>bootstrap/css/text_slider.css" rel="stylesheet" type="text/css" />
    <!--End Text Slider-->
	
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="<?php echo ADMIN_THEME_PATH; ?>dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <?php 
  authorize();
  $emp_details = get_list(EMPLOYEES,null,array('emp_id'=>$this->session->userdata("emp_id"))); 
  if(!empty($emp_details) && isset($emp_details)) {
    $is_emp_first_login = $emp_details[0]['emp_first_login'];
  }
	$userrole = checkUserrole(); 
    ?>
 <body class="skin-blue sidebar-mini <?php if($userrole==3){?>sidebar-collapse<?php } ?>">
    <div class="wrapper">
      <!-- Main Header -->
      <header class="main-header">
        <!-- Logo -->
		<?php 
		if($userrole == 1){
			?>
			  <a href="<?php echo base_url(); ?>admin/dashboard" class="logo">
			<?php 
		}else{
		?>
        <a href="<?php echo base_url()?>dashboard" class="logo">
		<?php } ?>
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">DSH</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo $this->session->userdata('emp_unique_id'); ?></b></span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <?php if(!empty(get_user_supervisor())){ ?>
                <li class="dropdown messages-menu">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="Lists of Supervisor">
                  <i class="fa fa-user"></i>
                  <span class="label label-success" ><?php echo count(get_user_supervisor()); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Supervisor list</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <?php foreach(get_user_supervisor() as $row) { ?>
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                                    <?php  if(!empty($row->emp_image)){ ?>
                                        <img alt="User Image" class="img-circle" src="<?php echo USR_IMG_PATH.$row->emp_image ?>">
                                    <?php } else{ ?>
                                        <img alt="User Image" class="img-circle" src="<?php echo ADMIN_THEME_PATH; ?>dist/img/avatar5.png">
                                    <?php } ?>
                                  
                          </div>
                          <h4>
                                  <?php echo $row->emp_full_name;  ?>
                                  <small><i class="fa  fa-times-circle-o"></i> <?php echo $row->emp_unique_id;  ?></small>
                          </h4>
                                <p><?php echo getemployeeRole($row->role_id);   ?></p>
                        </a>
                      </li><!-- end message -->
                            <?php } ?>
                        </ul>
                  
                  </li>
                  <li class="footer"><a href="#">...</a></li>
                </ul>
              </li>
            <?php } ?>
              <?php if(!empty(getEmployeeSection())){ 
                  $emp_sections = explode(',',getEmployeeSection());
                  ?>
              <li class="dropdown messages-menu">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="Lists of Sections Alloted">
                          <i class="fa fa-tree"></i>
                          <span class="label label-success" ><?php echo count($emp_sections); ?></span>
                      </a>
                      <ul class="dropdown-menu">
                            <li class="header">Allotted sections lists</li>
                            <li>
                              <ul class="menu">
                                <?php
                                    foreach ($emp_sections as $row) {
                                    $section_details = getSection($row);
									//pr($section_details);
                                    ?>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-institution  text-red"></i> 
                                            <span data-original-title="<?php echo $section_details?>" data-toggle="tooltip" title="">
                                              <?php echo $section_details?>
                                            </span>
                                        </a>
                                    </li>
                                <?php } ?>
                              </ul>
                            </li>
                            <li class="footer"><a href="#">...</a></li>
                      </ul>
                  </li>
            <?php } ?>
              <!-- Messages: style can be found in dropdown.less-->
             
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                   <?php  if(!empty($this->session->userdata('emp_image'))){ ?>
			<img src="<?php echo USR_IMG_PATH.$this->session->userdata('emp_image') ?>"  class="user-image" alt="User Image"  >
                       <?php } else{ ?>
                  <img src="<?php echo ADMIN_THEME_PATH; ?>dist/img/avatar5.png" class="user-image" alt="User Image"/>
                    <?php } ?>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $this->session->userdata('emp_full_name');?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <?php if(!empty($this->session->userdata('emp_image'))){ ?>
                   <img src="<?php echo USR_IMG_PATH.$this->session->userdata('emp_image') ?>"  class="img-circle" alt="User Image" >
                    <?php }else{ ?>
                    <img src="<?php echo ADMIN_THEME_PATH; ?>dist/img/avatar5.png" class="img-circle" alt="User Image" />
                    <?php } ?>
                    <p>
                      <?php echo $this->session->userdata('emp_full_name');?> 
                       <small>First login:- <?php 
							$log_data = get_user_log();
							echo get_datetime_formate($log_data['log_create_date']);
                        ?>
                      
                      </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <?php if($is_emp_first_login==1){ ?>
                    <div class="pull-left">
                       <a href="<?php echo site_url(); ?>admin/profile" class="btn btn-default btn-flat">Profile</a>
                     </div>
                    <?php } ?>
                    <div class="pull-right">
                      <a href="<?php echo base_url()?>logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>