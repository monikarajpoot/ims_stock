<li class="active"><a href="<?php echo base_url();?>dealing_assistant" title="Dealing Assistant List"><i class="fa fa-users"></i> <span><?php echo $this->lang->line('dealing_assistant_manue');?></span></a></li>
<li class="active"><a href="<?php echo base_url();?>view_file" title="Display Files"><i class="fa fa-file-text"></i> <span><?php echo $this->lang->line('view_file_manue');?></span></a></li>
<li class="active"><a href="<?php echo base_url();?>view_file/index/1" title="File from Dealing Assistant"><i class="fa fa-file-text"></i> <span>File from Dealing Assistant</span></a></li>
<?php
$section_id = getEmployeeSection();
$section_explode =  explode(',',$section_id);
 if(!in_array('8',$section_explode)) // 8 is dispatch section id.
{ ?>
<li class="active"><a href="<?php echo base_url();?>view_file/index/return" title="Returns Files"><i class="fa fa-share"></i> <span><?php echo $this->lang->line('return_files');?></span></a></li>
<?php } ?>
