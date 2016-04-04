<?php if($is_genrate == true){ 
   
} else {
	?>
	<div class="box" style="margin-left:200px; margin-top:20px">
	<div class="form-group"><?php
   echo  get_distic_ddl_list('district','class="form-control" onchange="get_advocate_incity(this.value );"',''); ;
   ?>
   <div id="tahsil_div"></div></div><?php
} ?>
