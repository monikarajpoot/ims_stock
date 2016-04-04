<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <!-- <small>Optional description</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('admin');?>/department_posts"><?php echo $this->lang->line('department_posts_label');?></a></li>
            <li class="active"><?php echo $this->lang->line('Manage_post_label'); ?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div style="float:left"><h3 class="box-title"><?php echo $title_tab;?></h3></div>
                    <div style="float:right">
                       <a href="<?php echo base_url('admin');?>/add_notesheet">
                        <button class="btn btn-block btn-info"><?php echo $this->lang->line('add_button'); ?></button>
                      </a>
                    </div>
                    <div style="float:right;margin-right: 10px;">
                      <a href="javascript:history.go(-1)">
                        <button class="btn btn-block btn-warning"><?php echo $this->lang->line('Back_button_label'); ?></button>
                      </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $page_title; ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->session->flashdata('message'); //pre($notesheet_master); ?>
                <form role="form" method="post" action="<?php echo base_url()?>admin_notesheet_master/manage_notesheet<?php if(isset($id)){ echo '/'.$id;} ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1"><?php echo $this->lang->line('notesheet_master_section_label'); ?> <span class="text-danger">*</span></label>
                      <?php $section_list = get_list(SECTIONS, null, null); //pre($notesheet_master);  ?>
                      <select class="form-control" name="section_id" id="section_id">
                          <option value="">Select</option>
                          <?php foreach ($section_list as $empk => $section) { ?>
                              <?php 
                                  if (is_array($section)) { ?>
                                      <option value="<?php echo $section['section_id']; ?>" <?php if (@$notesheet_master['section_id'] == $section['section_id']) 
                                      {
                                          echo 'selected';
                                      } 
                                      else if (@$post_date['section_id'] == $section['section_id']) 
                                      {
                                          echo 'selected';
                                      } ?> ><?php echo $section['section_name_hi']; ?> (<?php echo $section['section_name_en']; ?>) 
                                  <?php } ?>
                          <?php } ?>
                      </select>
                      <?php echo form_error('section_id');?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1"><?php echo $this->lang->line('notesheet_master_type_label'); ?> <span class="text-danger">*</span></label>
                      <?php 
                        //echo $id;
                        if(isset($id) && $id!=''){

                          $notesheet_menu_list = get_list(NOTESHEET_MASTER_MENU, null,array('section_id'=>$notesheet_master['section_id'])); //pre($post_date['notesheet_menu_title_hi']);  
                        }else{
                          $notesheet_menu_list = get_list(NOTESHEET_MASTER_MENU, null, null); //pre($post_date['notesheet_menu_title_hi']);  
                        }

                      ?>
                      <select class="form-control" name="notesheet_type" id="notesheet_type">
                          <option value="">Select Type</option>
                          <?php 
                          foreach ($notesheet_menu_list as $empk => $ntmenu) { ?>
                              <?php 
                                  if (is_array($ntmenu)) { ?>
                                    <option value="<?php echo $ntmenu['notesheet_menu_id']; ?>" 
                                    <?php if(isset($notesheet_master) && (@$notesheet_master['notesheet_type'] == @$ntmenu['notesheet_type'])) {
                                          echo 'selected';
                                      }  else if (@$id != '') {
                                        if (isset($notesheet_master) && (@$notesheet_master['notesheet_type'] == $ntmenu['notesheet_menu_id'])) {
                                          echo 'selected';
                                        }
                                      }else if (@$post_date['notesheet_type'] == $ntmenu['notesheet_menu_id']){
                                          echo 'selected';
                                      } 
                                      ?> 
                                      ><?php echo $ntmenu['notesheet_menu_title_hi']; ?> (<?php echo $ntmenu['notesheet_menu_title_en']; ?>) 
                                  <?php } ?>
                          <?php } ?>
                      </select>
                      <?php echo form_error('notesheet_type');?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1"><?php echo $this->lang->line('notesheet_master_head_label'); ?></label>
                      <?php $nt_header_list = get_list(FILE_NOTESHEET_HEADER_MASTER, null, null); //pre($post_date['notesheet_menu_title_hi']);  ?>
                      <select class="form-control" name="head_id" id="head_id">
                          <option value="0">Select</option>
                          <?php foreach ($nt_header_list as $empk => $header) { ?>
                              <?php
                                  if (is_array($header)) { ?>
                                    <option value="<?php echo $header['head_id']; ?>" 
                                    <?php if (@$notesheet_master['section_id'] == $header['head_id']) {
                                          echo 'selected';
                                    } else if (@$post_date['section_id'] == $header['head_id'])  {
                                          echo 'selected';
                                    } ?> >
                                    <?php echo $header['head_title']; ?> (<?php echo $header['head_code']; ?>) 
                                  <?php } ?>
                          <?php } ?>
                      </select>
                      <?php echo form_error('head_id');?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1"><?php echo $this->lang->line('list_label_notesheet_title'); ?> <span class="text-danger">*</span></label>
                      <input type="text" name="notesheet_title" value="<?php echo (@$notesheet_master['notesheet_title'] ? @$notesheet_master['notesheet_title']:'');?>" class="form-control">
                      <?php echo form_error('notesheet_title');?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"><?php echo $this->lang->line('notesheet_master_label_file'); ?></label>
                      <input type="text" readonly name="file_name" value="<?php echo (@$notesheet_master['notesheet_id'] ? @$notesheet_master['notesheet_id']: $new_notesheet_no);?>" class="form-control">
                      <?php echo form_error('file_name');?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"><?php echo $this->lang->line('notesheet_master_label_file_link'); ?></label>
                      <label id="notesheet_url"><?php echo NOTESHEET_ABS_PATH ; ?><?php echo @$notesheet_master['section_id'] ? getSection(@$notesheet_master['section_id'], true) : '' ; ?>\<?php echo (@$notesheet_master['notesheet_id'] ? @$notesheet_master['notesheet_id']: $new_notesheet_no);?></label>
                      <input type="hidden" readonly name="notesheet_href_url" value="<?php echo NOTESHEET_ABS_PATH ; ?><?php echo @$notesheet_master['section_id'] ? getSection(@$notesheet_master['section_id'], true) : '' ; ?>/<?php echo (@$notesheet_master['notesheet_id'] ? @$notesheet_master['notesheet_id']: $new_notesheet_no);?>" class="form-control"> 
                      <?php echo form_error('notesheet_href_url');?>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button class="btn btn-primary" onclick="return confir_post_data();" type="submit"><?php echo $this->lang->line('submit_botton'); ?></button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
            </div>
          </div><!-- /.row -->
          <!-- Main row -->
        </section><!-- /.content -->
        
       
            