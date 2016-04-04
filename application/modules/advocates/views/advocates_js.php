<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
   $('#advocate_post_type').change(function(){
	  
		if($(this).val() == 'gp') {
			
			$("#appintment_date").show();
			$("#appintment_date_first").hide();
		}
		else if($(this).val() == 'agp'){
			$("#appintment_date").show();
			$("#lokabhiyojak_power").show();
			$("#appintment_date_first").hide();
		}
		else if($(this).val() == 'pra'){
			$("#private_lawyer").show();
			
		}
		else
		{
			$("#appintment_date").hide();
			$("#appintment_date_first").show();
			$("#private_lawyer").hide();
		}
		
   });
 </script>