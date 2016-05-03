  <!-- Main Footer -->
<footer class="main-footer no-print">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
         FTMS
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015-2016 <a href="#">LAW DEPARTMENT</a></strong> All rights reserved.
      </footer>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo ADMIN_THEME_PATH; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo ADMIN_THEME_PATH; ?>dist/js/app.min.js" type="text/javascript"></script>
	<!--Text Slider-->
	<script src="<?php echo ADMIN_THEME_PATH; ?>bootstrap/js/text_slider.js" type="text/javascript"></script>	
	<!--End Text Slider-->
	
<?php if ($this->uri->segment(1) == 'leave' || $this->uri->segment(2) == 'addleave' || $this->uri->segment(2) == 'add_leave') { ?>
<!--- Leave Javascript -->
<script src="<?php echo base_url(); ?>themes/leave.js" type="text/javascript"></script>	
<!-- END Leave Javascript-->
<?php } ?>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
	
    <script src="<?php echo ADMIN_THEME_PATH; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo ADMIN_THEME_PATH; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
     <!--<script type="text/javascript" src="<?php //echo ADMIN_THEME_PATH; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>-->
    <script type="text/javascript" src="<?php echo ADMIN_THEME_PATH; ?>common_js/jquery-blink.js" type="text/javascript"></script>

    <script src="<?php echo ADMIN_THEME_PATH; ?>bootstrap/js/multiselect_checkbox.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/datatables/dataTables.tableTools.js" type="text/javascript"></script>
    <script type="text/javascript">
        //auto focus search filed
		$(document).ready(function () {
			$(".input-sm").focus();
		});	
		
        $(document).ready(function () {
            var myVar = setInterval(function(){ myTimer() }, 1000);

                function myTimer() {
                    var d = new Date();
                    var t = d.toLocaleTimeString();
                    document.getElementById("counter").innerHTML = t;
                }
        }); 
        $(document).ready(function () {
            $('#leave_tbl, #dataTable').dataTable();
            $('.dataTable').dataTable();
            $('.blink').blink();
            $('.blink_fast').blink({
                delay: 300
            });
        });
      $(function () {
        //$("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });

       $(function () {
        $("#admin_users_list").dataTable();
        $(document).ready(function () {
            $('#leave_employee').dataTable({
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "<?php echo ADMIN_THEME_PATH; ?>plugins/datatables/swf/copy_csv_xls_pdf.swf",
                }
            });
            
        });

        $('#admin_users_list').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });

     // $(function () {
     //iCheck for checkbox and radio inputs
     //   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
     //     checkboxClass: 'icheckbox_minimal-blue',
     //     radioClass: 'iradio_minimal-blue'
     //   });
     // });


        $(document).ready(function() {
            var HTTP_PATH='<?php echo base_url(); ?>';
            //add the country dialing code in input field at registration
            $("#emp_role").change(function() {
                var conf = confirm('<?php echo $this->lang->line("emp_role_confirm_message"); ?>');
                if(conf==false){
                  if($("#selected_emp_role").val()!=''){
                    var old_role= $("#selected_emp_role").val();
                    window.location.reload(true)
                  }
                  return false;
                }

                var role_id = $(this).val();
                if(role_id=='3'){
                    $(".supervisor").hide();
                }else{
                    $(".supervisor").show();
					}
                if(role_id!=''){
                  $("#selected_emp_role").val(role_id);
                }
                $.ajax({
                    type: "POST",
                    url: HTTP_PATH + "admin_users/get_supervisore_emp",
                    datatype: "json",
                    async: false,
                    data: {rold_id: role_id},
                    success: function(data) {
                        var r_data = JSON.parse(data);
                        //alert(r_data);
                        var otpt = '<option value="">Select Supervisore</option>';
                         $.each(r_data, function( index, value ) {
                          // console.log(value);
                            otpt+= '<option value="'+value.emp_id+'">'+value.emp_full_name+' ('+value.emprole_name_en+'-'+value.emprole_name_hi+' )</option>';
                        });
                        $("#supervisor_emp_id").html(otpt);
                    }
                });
            });

            /*Table*/
            $("#section_id").change(function() {
                var conf = confirm('<?php echo $this->lang->line("emp_role_confirm_message"); ?>');
                if(conf==false){
                  if($("#selected_emp_role").val()!=''){
                    var old_role= $("#selected_emp_role").val();
                    window.location.reload(true)
                  }
                  return false;
                }
                var section_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: HTTP_PATH + "admin_notesheet_master/get_notification_master_menu",
                    datatype: "json",
                    async: false,
                    data: {section_id: section_id},
                    success: function(data) {
                        var r_data = JSON.parse(data);
                        //alert(r_data);
                        var otpt = '<option value="">Select notesheet menu</option>';
                         $.each(r_data, function( index, value ) {
                          // console.log(value);
                            otpt+= '<option value="'+value.notesheet_menu_id+'">'+value.notesheet_menu_title_hi+' ('+value.notesheet_menu_title_en+' )</option>';
                        });
                        $("#notesheet_type").html(otpt);
                    }
                });
            });

            $("#supervisor_emp_id").change(function() {
                var conf = confirm('<?php echo $this->lang->line("emp_supervisor_confirm_message"); ?>');
                if(conf==false){
                  if($("#selected_supervisor_id").val()!=''){
                    var old_role= $("#selected_supervisor_id").val();
                    window.location.reload(true)
                  }
                  return false;
                }
            });
			/*Get unit_id for CR */
			$("#mark_to_officer").change(function() {
                var emp_id = $(this).val();
				if(emp_id==''){
					$("#mark_unitid").val(51);
					return false;
				}
                $.ajax({
                    type: "POST",
                    url: HTTP_PATH + "manage_file/files/get_oficer_unitid",
                    datatype: "json",
                    async: false,
                    data: {emp_id: emp_id},
                    success: function(data) {
                        var r_data = JSON.parse(data);
                        //alert(r_data);
						$("#mark_unitid").val(r_data.unit_id);
                        /* var otpt = '<option value="">Select notesheet menu</option>';
                         $.each(r_data, function( index, value ) {
                          // console.log(value);
                            otpt+= '<option value="'+value.notesheet_menu_id+'">'+value.notesheet_menu_title_hi+' ('+value.notesheet_menu_title_en+' )</option>';
                        });
                        $("#notesheet_type").html(otpt); */
                    }
                });
            });
        });
    function confir_post_data(){
        var confval=confirm('<?php echo $this->lang->line("emp_submit_confirm"); ?>');
        if(confval==false){
            //window.location.reload(true)
            return false;
            }
    }
	
	function checkUOnumber(str){
	//alert(str);	
	$("#error-uonumner").text("");
	$.ajax({
	url: "<?php echo base_url(); ?>manage_file/files/checkuo_number", 
    type: 'post',
    data: {uonumner:str},
    success: function(data) {
		  console.log(data);
		  if(data == 1){
			  $("#error-uonumner").text("यह यू.ओ. क्र. पहले से उपस्थित है कृपया जांच  लेवें.");
		  }
      }
		});
  }
  
  </script>
     <link href=" http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
		<?php //echo $this->uri->segment(2); ?>
<?php if($this->uri->segment(1)=='payroll' || $this->uri->segment(1)=='admin'|| $this->uri->segment(1)=='dashboard' || $this->uri->segment(1)=='advocate' || $this->uri->segment(1)=='data_entry' ||$this->uri->segment(1)=='leave'|| $this->uri->segment(2)=='add_employee' || $this->uri->segment(2)=='edit_employee' || $this->uri->segment(2)=='manage_user' || $this->uri->segment(2)=='notesheets' || $this->uri->segment(1)=='add_file' || $this->uri->segment(2)=='add_file' || $this->uri->segment(2)=='dealing' || $this->uri->segment(2)=='file_search' || $this->uri->segment(2)=='edit_file' || $this->uri->segment(2)=='allot' || $this->uri->segment(2)=='save_dealing'|| $this->uri->segment(2)=='rti_file' || $this->uri->segment(1)=='show_file' || $this->uri->segment(1)=='view_file' || $this->uri->segment(1)=='activity_report' || $this->uri->segment(1)=='add_scan_files' || $this->uri->segment(1)=='manage_scan_files' || end($this->uri->segments)=='file' || $this->uri->segment(1)=='admin_notesheet_master'){ ?>
      <link href="<?php echo ADMIN_THEME_PATH; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
      <script src="<?php echo ADMIN_THEME_PATH; ?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
	  <script src="<?php echo base_url(); ?>themes/section_feilds.js" type="text/javascript"></script>
      <script type="text/javascript">
      $(function () {
        //Date DOB
		$('.date1').datepicker();
        $('#emp_detail_dob').datepicker();
        $('#file_uo_date').datepicker();
        $('#sec_mark_date').datepicker();
        $('#receive_date').datepicker();
        $('#judgement_data').datepicker();
		$('#registry_date').datepicker();
		$('#hearing_date').datepicker();
          // for file search
    		$('#frm_dt').datepicker();
    		$('#movement_frm_dt').datepicker();
    		$('#movement_to_dt').datepicker();
  		  $('.ps_moniter_date').datepicker();
      });
    </script>  
  <?php } ?>
    
  <script type="text/javascript">
      $(document).ready(function() {
        $('#example1').dataTable({
            
            // Disable sorting on the first column
            "aoColumnDefs" : [ {
                'bSortable' : false,
                'aTargets' : [ 0 ]
            } ]
        });
		
		var get_tbl = location.href.split('#');
		var seacr = get_tbl[1];
        $('#view_table').dataTable({
            // Disable sorting on the first column
			"aaSorting": [],
            "oSearch": {
				"sSearch": seacr
			}			
		}); 
		
		$('#view_table_dispatch').dataTable({        
            "order": [[ 7, "desc" ]]           
		});
    });
    
    //for print
     function print_content() {
          window.print();
    }
	function goBack() {
          window.history.back();
      }
      $('#submit_btn').on('click', function () {
          $ret = confirm('कृपया सुनिश्चित करे की आप यह फाइल दर्ज करना चाहते हैं |');
          if($ret == true){
              var $btn = $(this).button('loading');
              return true
          }else{
              return false
          }
      })

	  $('#scan_add_data').on('submit', function () {
              var $btn = $('#submit_btn_scan').button('loading');
      })

      function confirm_receive() {
          return confirm('कृपया सुनिश्चित करे की आप यह फाइल/पत्र दर्ज करना चाहते हैं!');
      }
      function confirm_send() {
          return  confirm('कृपया सुनिश्चित करे की आप यह फाइल/पत्र प्रेषित करना चाहते हैं!');
      }
      function confirm_return() {
          return  confirm('कृपया सुनिश्चित करे की आप यह फाइल/पत्र वापस करना चाहते हैं!');
      }
      function confirm_reject() {
          return  confirm('कृपया सुनिश्चित करे की आप यह फाइल/पत्र अस्वीकार करना चाहते हैं!!');
      }
	  function confirm_generate_scan() {
          return  confirm('कृपया सुनिश्चित करे की आप का कार्य इस फाइल में  पूर्ण हो चुका है |');
      }
         //tree
    $(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});

    //notesheet href
   /* $(function () {
        $("#section_id_notesheet").change(function () {
           var section_id = $("#section_id_notesheet").val();
           $('notesheet_url').val("href");
        });
    });*/
    
    // dynamic add noteshhet
    $(function () {
       var $template = $(".template");

       var hash = 2;
       $(".btn-add-panel").on("click", function () {
           var $newPanel = $template.clone();
           $newPanel.find(".collapse").removeClass("in");
           $newPanel.find(".accordion-toggle").attr("href",  "#" + (++hash))
                    .text("Dynamic panel #" + hash);
           $newPanel.find(".panel-collapse").attr("id", hash).addClass("collapse").removeClass("in");
           $("#accordion").append($newPanel.fadeIn());
       });
    });
  </script>
  
  <script>
     $(document).ready(function(){
		$("#designation_div").hide();
		$("#section_div").hide();
		var HTTP_PATH='<?php echo base_url(); ?>';
        <?php if ($this->session->flashdata('notesheet_message')) { ?>
                alert('<?php echo $this->session->flashdata("notesheet_message"); ?>');
        <?php } ?>
		
		$("#permission_type").change(function() 
		{
			
			if($(this).val()=='section_wise'){
				$("#designation_div").hide(); /*Hide designation div*/
				$("#section_div").show(); /*show section div*/
				$("#permission_section_id").prop('required',true);
				$("#designation_id").prop('required',false);
				$(".emp_name_div").show();
				$("#section_emp_id").html('');
				$("#ajax_section_div").hide();
				$("#section_emp_id2").html('');
				$("#ajax_section_div2").hide();
				$("#section_emp_id").attr('title','section_wise');
			}else if($(this).val()=='designation_wise'){
				$("#section_div").hide(); /*Hide designation div*/
				$("#designation_div").show(); /*show section div*/
				$("#permission_section_id").prop('required',false);
				$("#designation_id").prop('required',true);
				$(".emp_name_div").show();
				$("#section_emp_id").html('');
				$("#ajax_section_div").hide();
				$("#section_emp_id2").html('');
				$("#ajax_section_div2").hide();
				$("#section_emp_id").attr('title','designation_wise');
			}else{
				$("#designation_div").hide(); /*Hide designation div*/
				$("#section_div").hide(); /*Hide designation div*/
				$("#permission_section_id").prop('required',false);
				$("#designation_id").prop('required',false);
				$(".emp_name_div").hide();
				$("#section_emp_id").html('');
				$("#ajax_section_div").hide();
				$("#section_emp_id2").html('');
				$("#ajax_section_div2").hide();
				$("#section_emp_id").attr('title','');
			}
		});
		/*Employee list section wise*/
		$("#permission_section_id").change(function() 
		{
			$("#section_div").show();
			var role_id = $(this).val();
			$.ajax({
				type: "POST",
				url: HTTP_PATH + "pa_permission/ajax_get_section_employee",
				datatype: "json",
				async: false,
				data: {section_id: role_id},
				success: function(data) {
					var r_data = JSON.parse(data);
					$("#ajax_section_div").show();
					$("#ajax_section_div2").show();
					var otpt = '<option value="">Select employee</option>';
					 $.each(r_data[0], function( index, value ) {
					  // console.log(value);
						otpt+= '<option value="'+value.emp_id+'">'+value.emp_full_name+' ('+value.emp_full_name_hi+')</option>';
					});
					$("#section_emp_id").html(otpt);
					$("#section_emp_id2").html(otpt);
				}
			});
		});
		
		$("#section_file_type").change(function() 
		{
			
			if($(this).val() == 'अभ्यावेदन'){
				$("#pre_application").show();
				
			}else{
				$("#pre_application").hide();
			}
			
		});
		
		/*Employee List designation wise*/
		$("#designation_id").change(function() 
		{
			$("#section_div").hide();
			$("#section_emp_id").html('');
			$("#section_emp_id2").html('');
			var role_id = $(this).val();
			request_type='';
			request_type=$('#section_emp_id').attr('title');
			$.ajax({
				type: "POST",
				url: HTTP_PATH + "pa_permission/ajax_get_designation_employee",
				datatype: "json",
				async: false,
				data: {section_id: role_id,requesttype:request_type},
				success: function(data) {
					var r_data = JSON.parse(data);
					$("#ajax_section_div").show();
					$("#ajax_section_div2").show();
					var otpt = '<option value="">Select employee</option>';
					 $.each(r_data[0], function( index, value ) {
					  // console.log(value);
						otpt+= '<option value="'+value.emp_id+'">'+value.emp_full_name+' ('+value.emp_full_name_hi+')</option>';
					});
					$("#section_emp_id").html(otpt);
					$("#section_emp_id2").html(otpt);
				}
			});
		});
		
		$("#section_emp_id").change(function() 
		{
			$("#section_emp_id2").html('');
			role_id = $('#permission_section_id :selected').val();
			empid1= $(this).val();
			request_type='';
			request_type=$('#section_emp_id').attr('title');
			if(request_type=='designation_wise'){
				var method='ajax_get_designation_employee';
				var rqfor='by_designation';
			}else if(request_type=='section_wise'){
				var method='ajax_get_section_employee';
				var rqfor='by_section';
			}
			$.ajax({
				type: "POST",
				url: HTTP_PATH + "pa_permission/"+method,
				datatype: "json",
				async: false,
				data: {section_id: role_id,requesttype:request_type,rqfor:rqfor},
				success: function(data) {
					var r_data = JSON.parse(data);
					//alert(r_data);
					var otpt = '<option value="">Select employee</option>';
					 $.each(r_data[0], function( index, value ) {
					  // console.log(value);
						otpt+= '<option value="'+value.emp_id+'">'+value.emp_full_name+' ('+value.emp_full_name_hi+')</option>';
					});
					$("#section_emp_id2").html(otpt);
				}
			});
			$("#section_emp_id2 option[value='"+empid1+"']").remove();
		});
		
		/*Show Head Section wise 19-09-2015*/
		$("#mark_to_section").change(function() 
		{
			$("#file_head").html('');
			//role_id = $('#mark_to_section :selected').val();
			section_id= $(this).val();
			if(section_id == '2' || section_id == '14'){
				$('.mark_csu').val('62');
			} else{
				$('.mark_csu').val('');
			}
			$.ajax({
				type: "POST",
				url: HTTP_PATH + "manage_file/ajax_get_section_head",
				datatype: "json",
				async: false,
				data: {section_id: section_id},
				success: function(data) {
					var r_data = JSON.parse(data);
					//alert(r_data);
					var otpt = '<option value="">Select head</option>';
					 $.each(r_data, function( index, value ) {
					  // console.log(value);
						otpt+= '<option value="'+value.head_code+'">'+value.head_code+' ('+value.head_title+')</option>';
					});
					$("#file_head").html(otpt);
				}
			});

            $.ajax({
                type: "POST",
                url: HTTP_PATH + "manage_file/ajax_get_section_file_type",
                datatype: "json",
                async: false,
                data: {section_id: section_id},
                success: function(data) {
                    //alert(data);
                    var f_data = JSON.parse(data);
                    //alert(r_data);
                    var otpt = '<option value="">Select file type</option>';
                    $.each(f_data, function( index, value ) {
                        // console.log(value);
                        otpt+= '<option value="'+value+'">'+value+' ('+value+')</option>';
                    });
                    $("#show_for_procescution").show();
                    $("#section_file_type").html(otpt);
                }
            });


			if(section_id==15){ /*For Procecustin/Abhiyojan*/
				$(".casetype").prop('disabled',true);
				//$('.casetype :selected[0]').val("");
				$("select.casetype").prop('selectedIndex', 0);
				$(".casetype").hide();
				$(".add_more").hide();
				$(".show_for_procescution").show();
				$(".hide_for_procescution").hide();
				$("#procecution_label").show();
				$("#nyayic_sec_2label").hide();
				$("#lib_sec_1label").hide();
			}else if(section_id==12) /*b-ii*/{
				$(".show_for_procescution").show();
				$("#procecution_label").hide();
				$("#nyayic_sec_2label").show();
				$("#nyayic_sec_1label").hide();
				$(".petition_file_cls").hide();
				$(".hide_for_procescution").hide();
				$("#lib_sec_1label").hide();
				$(".heads_cls").show();
			}
			else if(section_id==11) /*b-i*/{
				$(".show_for_procescution").show();
				$("#procecution_label").hide();
				$("#nyayic_sec_2label").hide();
				$("#nyayic_sec_1label").show();
				$(".petition_file_cls").hide();
				$(".hide_for_procescution").hide();
				$("#lib_sec_1label").hide();
				$(".heads_cls").show();
			}else if(section_id==13) /*Budget*/{
				$(".show_for_procescution").hide();
				$("#procecution_label").hide();
				$("#nyayic_sec_2label").hide();
				$("#nyayic_sec_1label").hide();
				$(".petition_file_cls").hide();
				$(".hide_for_procescution").hide();
				$("#lib_sec_1label").hide();
				$(".heads_cls").show();
			}else if(section_id==19) /*Library*/{
				$(".show_for_procescution").show();
				$("#procecution_label").hide();
				$("#nyayic_sec_2label").hide();
				$("#lib_sec_1label").show();
				$("#nyayic_sec_1label").hide();
				$(".petition_file_cls").hide();
				$(".hide_for_procescution").hide();
				$(".heads_cls").hide();
			}else if(section_id==17) /*OPinion*/{
				$('.hide_for_procescution,show_for_procescution').hide();
			
			}else{ 
				$(".casetype").prop('disabled',false);
				$(".casetype").show();
				$(".add_more").show();
				$(".hide_for_procescution").show();
				$(".show_for_procescution").hide();
				$("#lib_sec_1label").hide();
			}
			
			
			
		});
		/*End 19-09-2015*/
		
    });
	function confirm_delete() {
          var rs = confirm('कृपया पुष्टि करें, आप इसे हटाना चाहते हैं ?');
		  if(rs==true){return true;}
		  else{return false;}
	}
	
	$(function () {
		$('#view_table_info, #view_table_paginate, #view_table_length, #view_table_filter').addClass('no-print');

	});
	
	/*Table Row sum Code added 31 10 2015*/
	function calculateFormula($row, formula){				
		formula = formula.replace(/(\{[a-z0-9_\-]+\})/gi, function(m){
			return $('.' + m.replace(/\{|\}/g, ''), $row).text();
		});				
		var answer = eval(formula); 
		return (isNaN(answer))? 0 : answer;
	}
	/*End 31 10 2015*/
</script>
  <script>
      $(function () {
      /*    $('.load_btn').on('click', function () {

              var $btn = $(this).button('loading')
              // business logic...
          })*/
          $('.check_field12').change(function(){
              //alert($this.attr(checked,true));
              if($('.check_field12').is(':checked')){
                  $("#btn_sub1").prop("disabled", false);
                  $("#btn_sub2").prop("disabled", false);
              }else{
                  $("#btn_sub1").prop("disabled", true);
                  $("#btn_sub2").prop("disabled", true);
              }
              //document.getElementById("note_field").style.color = "#398439";

          });

  
		  /*//send button hide and show on click digital sign
			$(".send_btn").prop("disabled", true);
		    $(document).on('change', '.get_sign_data', function() {			
			   if($('.get_sign_data').is(':checked')){
				   $(".send_btn").prop("disabled", false);
			   } else{
				   $(".send_btn").prop("disabled", true);
			   }
			}); */
   
      });

      $(document).ready(function(){

         var HTTP_PATH='<?php echo base_url(); ?>';
         $("#filter_section_emp_wise").change(function () {
            //$("#section_div").hide();
             //$("#section_emp_id").html('');
             //$("#section_emp_id2").html('');
             var search_filter = $(this).val();
			 if(search_filter==''){
				return false;
			 }
             request_type='';
             //request_type=$('#section_emp_id').attr('title');
               $.ajax({
                 type: "POST",
                 url: HTTP_PATH + "view_file/file_search/ajax_get_section_employee",
                 datatype: "json",
                 async: false,
                 data: {search_filter: search_filter},
                 success: function(data) {
                   var r_data = JSON.parse(data);
                   var otpt = '<option value="">Select employee/Section</option>';
                     if(search_filter=='emp'){
                        $.each(r_data[0], function( index, value ) {
                           // console.log(value);
                          otpt+= '<option value="'+value.emp_id+'">'+value.emp_full_name+' ('+value.emp_full_name_hi+')</option>';
                        });
                     }else{
                        $.each(r_data[0], function( index, value ) {
                           // console.log(value);
                          otpt+= '<option value="'+value.section_id+'">'+value.section_name_en+' ('+value.section_name_hi+')</option>';
                        });
                     }
                   $("#section_emp_list").html(otpt);
                   ///$("#section_emp_id2").html(otpt);
                 }
            });
        });
		
		/*Sign Data*/
			$(".get_sign_data").click(function () {
				//var final_data_content = CKEDITOR.instances.compose_textarea.getData();
				//var draft_file_id=$("#draft_file_id").val();				
				var da_name = '';
				da_name  = $('.Da_name_r').val();
				var fid = '<?php echo $this->uri->segment(2) ?>';				
				<?php if(emp_session_id() == 2) { ?>
					var sender_name = $('select[name=emp_id] option:selected').text();
				<?php }	else {  ?>						
					if($('#modal-delete').hasClass('in')){

						var sender_name = $('select[name=emp_id] option:selected').text();
						fid = $("#modal-delete .lower_efileid").val();
					}else if($('#modal-send_upper').hasClass('in')){
						var sender_name = $('select[name=emp_id2] option:selected').text();
						fid = $("#modal-send_upper .lower_efileid").val();
					}else if($('#modal-return_da_file').hasClass('in')){						

						var sender_name = $('select[name=Da_name] option:selected').text();
						fid = $("#modal-return_da_file .lower_efileid").val();
					} else{
						alert('Sender name required');

					}
					
				<?php } ?>				
					var eid = '<?php echo emp_session_id(); ?>';
				var final_data_content='';
				//alert(fid+'-'+eid+'--'+sender_name);
				$.ajax({
					 type: "POST",
					 url: HTTP_PATH + "draft/get_final_content_with_html",
					 datatype: "json",
					 async: false,
					 data: {fileid:fid,empid:eid,sender_name:sender_name,},
					 success: function(data) {
					   //var r_data = JSON.parse(data);					   
					   //alert(data);
					   $(".sign_data_content").html(data);
					 }
				});
			});
			$(".get_sign_data").click(function () {
				//alert('Bijendra');
				if ($('input[name="get_sign_data"]').is(':checked')) {
					//alert('abmit');
					$('.btn-primary').removeAttr('onclick','');
					var final_data_content="";
					var bs64_d_final_data_content="";
					final_data_content= $("#expand_data").text();
					bs64_d_final_data_content= $("#text_base64decode").val();
					var fid = $("#modal-id2").val();
					var draftlogid = $("#draft_log_id").attr("name");
					//var eid = "<?php echo emp_session_id()?>";
					//var location_url = "http://10.115.254.213:8080/data_signing/signDataJNLP?other="+bs64_d_final_data_content+"&draft_id="+draftlogid+"&file_id="+eid+"&emp_name=bijendra&data="+final_data_content;
					var eid = "<?php echo emp_session_id().',1'?>"; /*1 : Live*/
					var site_status = "<?php echo SITE_STATUS; ?>";
					var location_url = "http://10.115.254.213:8080/data_signing/signDataJNLP?url="+site_status+"&other="+bs64_d_final_data_content+"&draft_id="+draftlogid+"&file_id="+fid+"&emp_id="+eid+"&emp_name=bijendra&data="+final_data_content;
					location.href= location_url;
					/*$.ajax({
						 type: "POST",
						 url: HTTP_PATH + "draft/update_final_content_with_html",
						 datatype: "json",
						 async: false,
						 data: {final_content:final_data_content,fid:fid,draftlogid:draftlogid,eid:eid},
						 success: function(data) {
						   //var r_data = JSON.parse(data);
						   //alert(data);
						 }
					});*/
				}else{ $(".sign_data_content").html('');
						$('.btn-primary').attr('onclick','return confirm_send()');

				}
			});


			$(document).on('change', '.emp_id,.Da_name_r,.emp_id2', function() {
				 $(".sign_data_content").html('');
				 $(".get_sign_data").prop( "checked", false );	
			});




			var myVar = setInterval(function(){if ($('input[name="get_sign_data"]').is(':checked')) {single_check_digitally_sign_or_not(1);}}, 3000);
			function single_check_digitally_sign_or_not(isval){
				if(isval==1){
					$("#btn-delete").removeAttr('onclick','');
					var HTTP_PATH='<?php echo base_url(); ?>';
					var draft_log_id = $("#draft_log_id").attr("name");
					$.ajax({
							type: "POST",
							url: HTTP_PATH + "manage_file/efile_updates/single_file_digitally_sign_or_not",
							datatype: "json",
							async: true,
							data:{draft_log_id:draft_log_id},
							success: function(data) {
									if(data>0){
											jQuery(function(){
												if($('#modal-send_upper').hasClass('in')){
													//alert('alert');
													jQuery('#modal-send_upper .autoclick').click();
												}else if($('#modal-return_da_file').hasClass('in')){
													jQuery('#modal-return_da_file .autoclick').click();
												}else if($('#modal-delete').hasClass('in')){
													jQuery('#modal-delete .autoclick').click();
												}
											});
										
										  //$('.sendfile_upperofficer').submit();
										  //$('.sendfile_upperofficer').reset();
									}
							}
					});
				}
			}
			/*Table Row sum Code added 31 10 2015*/
			$(function(){
				$('.stripeTable12 .stripeRow').each(function(i){
				$t = $(this);
				$('#total_price', $t).text(calculateFormula($t, '{qtr-1}+{qtr-2}'));
				});
			});
      });
  </script>
  <script>
    function printContents(data){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(data).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
	
	//date picker 
<?php if($this->uri->segment(1)=='data_entry' || $this->uri->segment(1)=='payroll' ||$this->uri->segment(1)=='leave'|| $this->uri->segment(2)=='add_employee' || $this->uri->segment(2)=='edit_employee' || $this->uri->segment(2)=='manage_user' || $this->uri->segment(2)=='notesheets' || $this->uri->segment(1)=='add_file' || $this->uri->segment(2)=='add_file' || $this->uri->segment(2)=='dealing' || $this->uri->segment(2)=='file_search' || $this->uri->segment(2)=='edit_file' || $this->uri->segment(2)=='allot' || $this->uri->segment(2)=='save_dealing'|| $this->uri->segment(2)=='rti_file' || $this->uri->segment(1)=='show_file' || $this->uri->segment(1)=='view_file' || $this->uri->segment(1)=='reports' || $this->uri->segment(1)=='activity_report' || $this->uri->segment(1)=='return_file'){ ?>
	
	 $(document).ready(function() {
    $('#centr_table').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
	$(function () {       
        $('.date_picker').datepicker();
	 });
<?php } ?>
function open_file(scan_id,file_path)
 {
     $('#modal-scan_file').modal('show');
	 var HTTP_PATH='<?php echo base_url(); ?>';
	 $("#show_scan_file").html('<object data="'+HTTP_PATH+'/'+file_path+'" type="application/pdf" width="100%" height="600px"><p>It appears you dont have a PDF plugin for this browser.No biggie... you can <a href="'+HTTP_PATH+'/'+file_path+'">click here to download the PDF file.</a></p></object>');
     $("#open_new_tab").html('<a class="btn btn-primary" target="_blank" href="'+HTTP_PATH+'/'+file_path+'">Open PDF in new tab</a>');

	 }
</script>

<!---- open pdf file ---->
<div class="modal fade" id="modal-scan_file" data-backdrop="static">
    <div class="modal-dialog">
        <!-- <form action="<?php echo base_url() ;?>manage_file/return_file" method="post" >-->
        <form action="<?php echo base_url() ;?>manage_file/return_file_da" method="post" >
            <div class="modal-content">
                <div class="modal-header">
					<button type="button" class=" btn btn-danger" data-dismiss="modal" aria-hidden="true">बंद करें</button>

                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive">
                        <div class="box-body">
                            <div class="row" align="center" style="height:250px;">
                                <div class="col-xs-12">
                                    <div id="show_scan_file"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">बंद करें</button>
                    <div class="pull-right" id="open_new_tab"></div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--- End PDF File --->

<script src="<?php echo base_url(); ?>themes/section_feilds.js" type="text/javascript"></script>
<script>
$(document).find('br').each(function(){
    if($(this).attr('type') === '_moz'){
        $(this).remove();
    }
});
</script>
  </body>
</html>