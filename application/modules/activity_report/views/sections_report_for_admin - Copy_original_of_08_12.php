<link href="<?php echo ADMIN_THEME_PATH; ?>plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<!-- Main content -->
<!--<section class="content">-->
    <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
            <div style="overflow: auto">
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
                        <?php $grand_total = $dispached_files = 0; $i=1; foreach($get_section as $sec){
                            if($sec['section_id'] != '26' && $sec['section_id'] != '1' && $sec['section_id'] != '8'){
                                $sce_id = $sec['section_id'];
								if($sce_id==8){
									
									$section = get_list(SECTIONS,null,array('section_id' =>$sce_id ));
									//$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$sce_id."' and `file_return`='2' and (file_hardcopy_status = 'received' or file_hardcopy_status = 'working')");
									//$res1 =  $query->row_array();
									//SELECT count(*) FROM ft_files where file_return=2 and file_hardcopy_status !='close'
									$res1['counts'] = 0;
									$query = $this->db->query("select count(*) as counts FROM ft_files where file_hardcopy_status !='close' and `file_return` = 2 ");
									$res2 =  $query->row_array();
									//echo " cou ".$res2['counts'];
									$query = $this->db->query("SELECT count(*) as counts FROM `ft_file_dispatch`");
									$res3 =  $query->row_array();
									
								}else{
								$section = get_list(SECTIONS,null,array('section_id' =>$sce_id ));
								$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$sce_id."' and `file_return` !='2' and (file_hardcopy_status = 'received' or file_hardcopy_status = 'working')");
								$res1 =  $query->row_array();
								$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$sce_id."' and `file_return` !='2' and (file_hardcopy_status = 'not')");
								$res2 =  $query->row_array();
								$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$sce_id."' and `file_return` ='2'");
								$res3 =  $query->row_array();
								}
								$total = $res1['counts'] + $res2['counts'] + $res3['counts'];
								if ($total > 0) { 
									$cls = "aqua"; 
								}else{
									$cls = "red"; 
								}
								$grand_total = 	$grand_total + $total;							 
								$dispached_files = 	$dispached_files + $res3['counts'];
								?>
								<a href="activity_report/fetch_data/<?php echo $sec['section_id'] ; ?>">
									<div class="col-md-4 col-sm-6 col-xs-12" data-original-title="<?php echo $sec['section_name_en'] ; ?>" data-toggle="tooltip">
										<div class="info-box bg-<?php echo $cls; ?>">
										<span class="info-box-icon"><i class="fa fa-files-o"></i></span>
										<div class="info-box-content">
										  <span class="info-box-text"><?php echo $sec['section_name_hi'] ; ?></span>
										  <span class="info-box-number"><b><?php echo $total ; ?> File(s)</b></span>
										  <div class="progress">
											<div style="width: <?php echo ($res3['counts'] * 100)/$total; ?>%" class="progress-bar"></div>
										  </div>
										  <span class="progress-description">
											<?php echo $res3['counts']  ; ?> File(s) Dispatched 
										  </span>
										</div><!-- /.info-box-content -->
									  </div>
								  </div>
								</a>
                               <!-- <button type="button" onclick="return open_div(<?php echo $sec['section_id'] ; ?>)" value="<?php echo $sec['section_id'] ; ?>" class="<?php echo $cls ; ?> comment_button"><?php echo $sec['section_name_hi']." (".$sec['section_name_en'].")" ; ?></button>
                                <a href="activity_report/fetch_data/<?php echo $sec['section_id'] ; ?>"  class="<?php echo $cls ; ?> comment_button"><?php echo $sec['section_name_hi']." (".$sec['section_name_en'].")" ; ?></a>-->
                            <?php $i++; } 
						}?>
                    
              
				<!--<div class="box-footer">
					<div class="col-md-4 col-sm-6 col-xs-12">
					  <div class="info-box">
						<span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
						<div class="info-box-content">
						  <span class="info-box-text">Total files</span>
						  <span class="info-box-number"><?php echo $grand_total; ?></span>
						</div>
					  </div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
					  <div class="info-box">
						<span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>
						<div class="info-box-content">
						  <span class="info-box-text">Total Dispatched files</span>
						  <span class="info-box-number"><?php echo $dispached_files; ?></span>
						</div>
					  </div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
					  <div class="info-box">
						<span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span>
						<div class="info-box-content">
						  <span class="info-box-text">Total pending files</span>
						  <span class="info-box-number"><?php echo $grand_total-$dispached_files; ?></span>
						</div>
					  </div>
					</div>
				</div>-->
           
        </div><!-- /.box -->
        <div id="display" align="left"></div>
  
    
    <!-- Main row -->
<!--/section>-->
<!-- /.content -->
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script type="text/javascript">
        function open_div(file) {
            var test = file;
            var HTTP_PATH = '<?php echo base_url(); ?>';
            var dataString = 'content=' + test;
            $.ajax({
                type: "POST",
                url: HTTP_PATH + "activity_report/fetch_data/" + test,
                data: dataString,
                cache: false,
                success: function (html) {
                    $("#display").html(html);
                }
            });
            return false;
        }
</script>