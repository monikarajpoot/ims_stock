
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>themes/procetion.js"></script>
<link href="<?php echo ADMIN_THEME_PATH; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
       
		//civil auto select all 98
		$(document).ready(function () {
			$("#district").change(function() {
				var district_id = $(this).val() 
				
				
				var distric_val = $("#district option:selected").text() ;
				 var HTTP_PATH='<?php echo base_url(); ?>';
			   $.ajax({
                type: "POST",
                url: HTTP_PATH + "advocates/getTahsil_list",
                datatype: "json",
                async: false,
                data: {district_id: district_id},
                success: function(data) {
					
                     $("#tahsil_div").html(data);
					 $(".adv_distic").val(distric_val);
					 
                }
            });
			})	
			
			

			
		});	
		
	   function get_advocate(tahsil_id )
	   {
				var tahsil_val = $("#tahsil_id option:selected").text() ;
				var HTTP_PATH='<?php echo base_url(); ?>';
			    $.ajax({
                type: "POST",
                url: HTTP_PATH + "advocates/get_advocate_single",
                datatype: "json",
                async: false,
                data: {tahsil_id: tahsil_id },
                success: function(data) {
					//console.log(data);
                   $("#notery_adv").html(data);
				   $(".adv_tahsil").val(tahsil_val);
				   
                }
				 });
	   }	   
	   function get_advocate_details(scm_id)
	   {
			 // alert(scm_id);
				var HTTP_PATH='<?php echo base_url(); ?>';
			    $.ajax({
                type: "POST",
                url: HTTP_PATH + "advocates/getAdvocatedetails",
                datatype: "json",
                async: false,
                data: {scm_id: scm_id},
                success: function(data) {
					console.log(data);
					var r_data = JSON.parse(data);
					var posting_date = r_data[0]['posting_date'];
					
					var posting_date_sp = posting_date.split("-");
					
					
					var posting_newDate = posting_date_sp[2] + '-' + posting_date_sp[1] + '-' + posting_date_sp[0];
					var posting_renew_date = r_data[0]['post_renew_date'];
					
					var posting_renew_date = posting_renew_date.split("-");
					var posting_renew_dd = posting_renew_date[2] + '-' + posting_renew_date[1] + '-' + posting_renew_date[0];
					var adv_invoice_date = r_data[0]['adv_invoice_date'].split("-");
					var adv_invoice_dd = adv_invoice_date[2] + '-' + adv_invoice_date[1] + '-' + adv_invoice_date[0];
					
					var app_for_renewal_date = r_data[0]['application_for_renewal_date'].split("-");
					var app_for_renewal_date_new = app_for_renewal_date[2] + '-' + app_for_renewal_date[1] + '-' + app_for_renewal_date[0];
					
					$(".adv_name").val(r_data[0]['scm_name_hi']);
			   ;
					$(".adv_posting_date").val(posting_newDate);
				    $(".post_renew_date").val(posting_renew_dd);
					 $(".chalan_date").val(adv_invoice_dd);
					  $(".chalan_no").val(r_data[0]['adv_invoice_no']);
					
				    $(".notry_no").val(r_data[0]['notery_registration_no']);
				   $(".addres").val(r_data[0]['scm_address_hi']);
				    $(".avedan_date").val(app_for_renewal_date_new);
                   
                }
				 });
	   }	 
   function get_advocate_incity(city_id){
	  // alert(city_id);
	   var city_id = $("#city_id option:selected").text() ;
				var HTTP_PATH='<?php echo base_url(); ?>';
			    $.ajax({
                type: "POST",
                url: HTTP_PATH + "advocates/get_advocate_single_by_city",
                datatype: "json",
                async: false,
                data: {city_id: city_id },
                success: function(data) {
					console.log(data);
                   $("#notery_adv").html(data);
				  // $(".adv_tahsil").val(tahsil_val);
				   
                }
				 });
   }
</script>