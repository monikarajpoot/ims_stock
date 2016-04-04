  <li class="active"><a href="<?php echo base_url('admin');?>/employees"><i class="fa fa-users"></i> <span>Employees</span></a></li> 
  <li class="treeview">
     <a href="#"><i class='fa fa-link'></i> <span>Masters</span> <i class="fa fa-angle-left pull-right"></i></a>
         <ul class="treeview-menu">
			<li><a href="<?php echo base_url('admin');?>/department"><?php echo $this->lang->line('department_manue');?></a></li>
			<li><a href="<?php echo base_url('admin');?>/district"><?php echo $this->lang->line('district_manue');?></a></li>
			<li><a href="<?php echo base_url('admin');?>/employeerole"><?php echo $this->lang->line('employee_role_manue');?></a></li>
			<li><a href="#"><?php echo $this->lang->line('file_movement_manue');?></a></li>
			<li><a href="<?php echo base_url('admin');?>/sections"><?php echo $this->lang->line('sections_role_manue');?></a></li>
			<li><a href="<?php echo base_url('admin');?>/unit"><?php echo $this->lang->line('unit_level_manue');?></a></li>

         </ul>
    </li>