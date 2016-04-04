$( "#medical_type" ).change(function() {
	//alert($(this).val());
	 if($(this).val() == 'दस्ताबेज' )
	 {
		 $(".certificate_attach").show();
	 }else
	 {
		 $(".certificate_attach").hide();
	 }
	 
});

function get_designation(emp_id){
	var HTTP_PATH = $("#base_url").val();
	
	alert(HTTP_PATH);
	 $.ajax({
                    type: "POST",
                    url: HTTP_PATH + "establishment/Forms/get_employee_designation/",
                    datatype: "json",
                    async: false,
                    data: {emp_id: emp_id},
                    success: function(data) {
						alert(data);
						$("#designation").val(data);
					
                    }
          });
}

		

		
		
 
