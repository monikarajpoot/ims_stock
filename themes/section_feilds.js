  $("#mark_to_section").change(function() {
	if( ($(this).val() == 28 ) || ($(this).val() == 18 ) || ($(this).val() == 20 )|| ($(this).val() == 16 ) ||  ($(this).val() == 7 )  || ($(this).val() == 25 )|| ($(this).val() == 22 )|| ($(this).val() == 19 )|| ($(this).val() == 23 )){
		$(".petition_file_cls").css("display","none");
		$(".show_for_drafting_translation").css("display","block");
		$(".hide_for_procescution").css("display","none");
		
	}else{
		$(".petition_file_cls").css("display","block");
		$(".hide_for_procescution").css("display","block");
		$(".show_for_drafting_translation").css("display","none");
		$("#other_lokayukt_office_no").hide();
				$("#other_applicant_name").hide();
				$("#other_crimanal_name").hide();
				$("#other_crimanal_no").hide();
				$("#other_police_station_name").hide();
				$("#police_station").hide();
	}
	  
  });
  
  
  $("#section_file_type").change(function() 
		{
			var mark_to_section  = $("#mark_to_section").val();
			//alert(mark_to_section);
			if(mark_to_section == 15){
			if($(this).val() == 'प्रकरण वापसी'){
				$("#other_lokayukt_office_no").show();
				$("#loksevak").show();
				$("#lokayukt_office_no").hide();
				$("#other_crimanal_name").show();
				$("#other_crimanal_no").show();
				$("#other_police_station_name").show();
				$("#police_station").show();
				$("#jail_where").hide();
				$("#courts").show();
				
			}else if($(this).val() == 'दया याचिका'){
				$("#other_lokayukt_office_no").hide();
				$("#other_crimanal_name").show();
				$("#other_crimanal_no").show();
				$("#other_police_station_name").show();
				$("#police_station").hide();
				$("#jail_where").show();
				$("#courts").show();
				$("#other_applicant_name").hide();
				$("#party_petition_against").hide();
				
			}
			else if($(this).val() == 'समंस'){
				
				$("#party_petition_against").show();
				$("#other_lokayukt_office_no").hide();
				$("#other_crimanal_name").show();
				$("#other_crimanal_no").hide();
				
				$("#other_police_station_name").hide();
				$("#police_station").hide();
				$("#jail_where").hide();
				
				$("#other_applicant_name").hide();
				$("#heads_cls").show();
			}
			else if($(this).val() == 'अभियोजन स्वीकृति'){
				
				$("#other_lokayukt_office_no").show();
				$("#loksevak").hide();
				$("#lokayukt_office_no").show();
				$("#other_crimanal_no").show();
				$("#other_crimanal_name").hide();
				
				$("#other_police_station_name").hide();
				$("#police_station").hide();
				$("#jail_where").hide();
				$(".petition_file_cls").hide();
				$("#other_applicant_name").hide();
				
			}
			else if($(this).val() == 'विधानसभा'){
				
				$("#other_lokayukt_office_no").hide();
				$("#other_crimanal_no").hide();
				$("#other_crimanal_name").hide();
				
				$("#other_police_station_name").hide();
				$("#police_station").hide();
				$("#jail_where").hide();
				$(".petition_file_cls").hide();
				$("#other_applicant_name").hide();
				
			}
			else if($(this).val() == 'Writ'){
				//alert($(this).val());
				$("#other_lokayukt_office_no").hide();
				$("#other_applicant_name").hide();
				$("#lokayukt_office_no").hide();
				$("#other_crimanal_no").hide();
				$("#other_crimanal_name").hide();
				
				$("#other_police_station_name").hide();
				$("#police_station").hide();
				$("#jail_where").hide();
				$(".petition_file_cls").hide();
				
			}
			else if($(this).val() == 'अभ्यावेदन'){
				//alert($(this).val());
				$("#other_lokayukt_office_no").hide();
				$("#other_applicant_name").show();
				$("#lokayukt_office_no").hide();
				$("#other_crimanal_no").hide();
				$("#other_crimanal_name").hide();
				
				$("#other_police_station_name").hide();
				$("#police_station").hide();
				$("#jail_where").hide();
				$(".petition_file_cls").hide();
				
			}
			else if($(this).val() == 'सुचना का अधिकार'){
				//alert($(this).val());
				$("#other_lokayukt_office_no").hide();
				$("#other_applicant_name").hide();
				$("#lokayukt_office_no").hide();
				$("#other_crimanal_no").hide();
				$("#other_crimanal_name").hide();
				
				$("#other_police_station_name").hide();
				$("#police_station").hide();
				$("#jail_where").hide();
				$(".petition_file_cls").hide();
				$("#other_applicant_name").hide();
				
			}
			else{
				$("#other_lokayukt_office_no").hide();
				$("#other_applicant_name").hide();
				$("#other_crimanal_name").hide();
				$("#other_crimanal_no").hide();
				$("#other_police_station_name").hide();
				$("#police_station").hide();
				$(".petition_file_cls").show();
			}
			}
			/*if($(this).val() == 'अभ्यावेदन'){
				$("#pre_application").show();
				
			}else{
				$("#pre_application").hide();
			}*/
			
		});

		
		
		
		$("#file_type").change(function() 
		{
			//alert($(this).val());
			if($(this).val() == 'r'){
				$("#registry_number_r").show();
				$("#registry_date_r").show();
			}
			else{
				$("#registry_number_r").hide();
				$("#registry_date_r").hide();
			}
		});