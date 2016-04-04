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
          <?php //pr($this->session->flashdata); 
               echo $this->session->flashdata('message');
          ?>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div style="float:left"><h3 class="box-title"><?php echo $title_tab;?></h3></div>
                  <div style="float:right">
                    <a href="<?php echo base_url();?>advocate/add">
                      <button class="btn btn-block btn-info"><?php echo $this->lang->line('add_button'); ?> </button>
                    </a>
                  </div>
                  <div style="float:right;margin-right: 10px;">
                        <a href="javascript:history.go(-1)">
                            <button class="btn btn-block btn-warning"><?php echo $this->lang->line('Back_button_label'); ?></button>
                        </a>
                    </div>
                </div><!-- /.box-header -->
                
                  <table id="leave_employee" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>नाम</th>
						<th>पद</th>
                        <th style="width: 150px;">पदस्थ</th>
                        <th>पता</th>
                        <th>पदस्त दिनांक</th>
                        <th>पद की  नवीनीकरण दिनांक </th>
                        <th>पदस्ता का प्रकार </th>
						<th style="width:90px">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; //pre($get_users);
                        foreach ($get_users as $key => $users) { ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php if($users['scm_name']!=''){ echo $users['scm_name_hi'].' ('.$users['scm_name'].')'; }else{ echo $users['scm_name_hi'];}?></td>
                            <td><span class="badge bg-light-blue"><?php echo $users['scm_post_hi']?></span></td>
							<td><?php if(array_key_exists($users['scm_court_name_hi'] ,court_name_array())){ echo court_name_array($users['scm_court_name_hi']); } '<br/>'.$users['scm_pincode_hi']?></td>
                            <td><?php echo $users['scm_address_hi']?><br/>
								<?php if($users['state_id']!='' && $users['state_id']!=0){ echo '<b>State :</b>'.getState($users['state_id']); }else { echo '<b>State :N/A';}?><br/>
								<?php if($users['city_id']!='' && $users['city_id']!=0){ echo '<b>City :</b>'.getDistrict_name($users['city_id']);}else { echo '<b>City :</b>N/A'; }?><br/>
							</td>
                            <td><?php if($users['posting_date']!='1970-01-01' && $users['posting_date']!='01-01-1970'&& $users['posting_date']!='0000-00-00' ){ echo date('d-m-Y',strtotime($users['posting_date']));}else{ echo 'N/A';}?></td>
                            <td><?php if($users['post_renew_date']!='1970-01-01' && $users['post_renew_date']!='01-01-1970'&& $users['post_renew_date']!='0000-00-00' ){  echo date('d-m-Y',strtotime($users['post_renew_date']));}else { echo 'N/A';}?></td>
							 <td><?php if(array_key_exists($users['advocate_post_type'] ,advocate_posttype_array())){ echo advocate_posttype_array($users['advocate_post_type']); } ?></td>
                            <td>
                              <div class="btn-group">
								<?php //if($_GET['bij']=='yes'){ pre($this->session->all_userdata());} ?>
                                <?php if($this->session->userdata('admin_logged_in')==1 || $this->session->userdata('emp_id')=='66'){ ?>
								<a href="<?php echo base_url('advocate');?>/edit_advocate/<?php echo $users['scm_id'];?>" class="btn  btn-twitter">Edit</a>
                                <!--<a href="<?php echo base_url();?>dealing_assistant/viewProfile/<?php echo $users['scm_id'];?>" class="btn  btn-twitter">View</a>-->
								<?php } ?>
							  </div>
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
        <script type="text/javascript">
          function is_delete(){
            var res = confirm('<?php echo $this->lang->line("delete_confirm_message"); ?>');
            if(res===false){
              return false;
            }
          }
        </script>
        <style type="text/css">
        #leave_employee_filter{
          clear: both;
        }
        </style>
    