<?php if($this->uri->segment(3) != 'generate_notesheet' && $this->uri->segment(2)!='view_file_notesheet'){ ?>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="<?php echo EDITOR_URL ?>ckeditor.js"></script>
	<script src="<?php echo EDITOR_URL ?>theme/adapters/jquery.js"></script>
	<link href="<?php echo EDITOR_URL ?>sample/css/sample.css" rel="stylesheet">
	<style>
		#editable
		{
			padding: 10px;
			float: left;
		}
	</style>
	<script>
		CKEDITOR.disableAutoInline = true;
		$( document ).ready( function() {
			$( '#editor1' ).ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
			$( '#editable' ).ckeditor(); // Use CKEDITOR.inline().
		} );
		function setValue() {
			$( '#editor1' ).val( $( 'input#val' ).val() );
		}
	</script>
	<?php } ?>
<script>
    function validateForm() {
        var a = document.forms["notesheetForm"]["num"].value;
        if (a === '') {
            alert("कृपया सभी फ़ील्ड्स को भरे|");
            return false;
        }
    }
    function formValidate() {
        var fields = ["name, phone", "compname", "mail", "compphone", "adres", "zip"]

        var i, l = fields.length;
        var fieldname;
        for (i = 0; i < l; i++) {
          fieldname = fields[i];
          if (document.forms["register"][fieldname].value === "") {
            alert(fieldname + " can not be empty");
            return false;
          }
        }
        return true;
    }
    function goBack() {
        window.history.back();
    }
    
    
</script>
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>themes/procetion.js"></script>
<link href="<?php echo ADMIN_THEME_PATH; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        //Date DOB
        $('.date1').datepicker();
        $('#file_uo_date').datepicker();
		$('#date2').datepicker();
        $('#date3').datepicker();
        $('#date4').datepicker();
	
		/*$('.advocate_type').on('change', function() {
			$(".court_type").children('option').hide();
			$(".court_location").children('option').hide();
			if(this.val() === 'महाधिवक्ता'){
				$(".court_type").append('<option value="मध्यप्रदेश उच्च न्यायालय">मध्यप्रदेश उच्च न्यायालय</option>');
				$(".court_location").append('<option value="जबलपुर">जबलपुर</option>');
			}else {
				$(".court_type").children('option').show();
				$(".court_location").children('option').show();
				$(".court_type").children('<option value="मध्यप्रदेश उच्च न्यायालय">मध्यप्रदेश उच्च न्यायालय</option>').hide();
				$(".court_location").children('<option value="जबलपुर">जबलपुर</option>').hide();
			}

		});  */
		
		//petition auto select all 10
		$(document).ready(function () {
			$(".writ_lists").change(function() {
				var writ = $(".writ_lists").val();
				$(".writ_lists").val(writ);
				//alert(writ);
			})		
		});	
		$(document).ready(function () {
		

			$("#show_hide").click(function() {
				//alert("show content");
				$("#show_content").text('');
				//$("#hide_btn").hide();
				
				$(".slp_div").hide();
				$("#show_hide").hide();
				$("#hide_show").show();
			})	
			$("#hide_show").click(function() {
				//alert("hide content");
				$("#show_content").html("<u>एस. एल. पी. का प्रस्ताव इस कार्यालय को दिनांक   <input type='text' name='date_2'  class='date1'>  को प्राप्त हुआ था |  एस. एल. पी.  की अवधि दिनांक <input type='text' name='date_3'  class='date1'>को समाप्त हो गई हैं | इसलिये विलम्ब  को स्पष्ट करने का उत्तरदायित्व त्रुटिकर्ता का रहेगा | त्रुटिकर्ता धारा 5 लिमिटेशन एक्ट का शपथ-पत्र में दिन-प्रतिदिन के विलंब को स्पष्ट करते हए माननीय सर्वोच्च न्यायालय में  आवेदन पत्र प्रस्तुत करेगा, विलंव का दायित्व विधि विभाग का नहीं रहेगा| </u>");

				$("#show_content").text();
				//$("#hide_btn").show();
				$("#show_hide").show();
				$("#hide_show").hide();
			})				
		});	
		//civil auto select all 98
		$(document).ready(function () {
			$(".title_loc").change(function() {
				var writ = $(".title_loc").val();
				$(".title_loc").val(writ);
				//alert(writ);
			})		
		});	
		
		//b-2 auto select all 141
		$(document).ready(function () {
			$(".distic_1").blur(function() {
				var dist = $(".distic_1").val();
				$(".distic_1").val(dist);
				//alert(writ);
			})		
		});	
		
		//b-2 on key up
		$(document).ready(function () {
			$(".notriname").blur(function() {
				var notriname = $(".notriname").val();
				$(".notriname").val(notriname);
				//alert(writ);
			})		
		});
		
		//b-2 on key up
		$(document).ready(function () {
			$(".tahsil").blur(function() {
				var tahsil = $(".tahsil").val();
				$(".tahsil").val(tahsil);
				//alert(writ);
			})		
		});
		
		/* hide on testing date
		//b-2 on key up
		$(document).ready(function () {
			$(".notri_todate").blur(function() {
				var notri_todate = $(".notri_todate").val();
				$(".notri_todate").val(notri_todate);
				//var notri_fromdate = $(".notri_fromdate").val();
				//alert(writ);
			})		
		});		
		
		//b-2 on key up
		$(document).ready(function () {
			$(".notri_fromdate").blur(function() {
				var notri_fromdate = $(".notri_fromdate").val();
				$(".notri_fromdate").val(notri_fromdate);
				//alert(writ);
			})		
		});	
		*/
		
		//b-1 on key up
		$(document).ready(function () {
			$(".ad_name").blur(function() {
				var ad_name = $(".ad_name").val();
				$(".ad_name").val(ad_name);
				//alert(writ);
			})		
		});	
		
		//b-1 on key up
		$(document).ready(function () {
			$(".ad_designation").blur(function() {
				var ad_designation = $(".ad_designation").val();
				$(".ad_designation").val(ad_designation);
				//alert(writ);
			})		
		});	
		
		
		//add apend table 
		$(document).ready(function () {
			var counter = 0;

			$("#addrow").on("click", function () {
				
				counter = $('#pitition_tbl tr').length - 2;

				var newRow = $("<tr>");
				var cols = "";
	  
				cols += '<td><input type="text" class="date1" name="anukrmank[]' + counter + '"></td>';
				cols += '<td><input type="text"  name="name_pk[]' + counter + '" value=""></td>';
				cols += '<td><input type="text" name="want_price[]' + counter + '"></td>';
			    cols += '<td><input type="text" name="order_price[]' + counter + '"></td>';
				
				cols += '<td><input type="button" class="ibtnDel"  value="Delete"></td>';
				newRow.append(cols);
				if (counter == 50) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
				$("table.petition").append(newRow);
				counter++;
				$('.total_row').val(counter);
			});

			$("table.petition").on("click", ".ibtnDel", function (event) {
				$(this).closest("tr").remove();
				
				counter -= 1
				$('#addrow').attr('disabled', false).prop('value', "Add Row");
				$('.total_row').val(counter);
			});

			
		});

/******** crimanal notesheet ***/
			
			var counter_cri = 0;
			var su = 2;
			$("#addrow").on("click", function () {
				
				counter_cri = $('#fee_notesheet tr').length - 2;

				var newRow = $("<tr>");
				var cols = "";
	  
				cols += '<td><input type="text" value="'+su+'"  name="sr_no[]' + counter_cri + '"></td></td>';
				cols += '<td><input type="text" class="date1"  name="date[]' + counter_cri + '" value=""></td>';
				cols += ' <td><input type="text" name="prakran_no[]' + counter_cri + '"></td>';
				cols += ' <td><input type="text" name="price[]' + counter_cri + '"></td>';
			    cols += '<td><input type="text" name="order_price[]' + counter_cri + '"></td>';
				
				
				
				cols += '<td><input type="button" class="ibtnDel"  value="Delete"></td>';
				newRow.append(cols);
				if (counter_cri == 50) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
				$("table.fee_notesheet").append(newRow);
				counter_cri++;
				su++;
				$('.total_row').val(counter_cri);
			});
	
			$("table.fee_notesheet").on("click", ".ibtnDel", function (event) {
				$(this).closest("tr").remove();
				
				counter_cri -= 1
				$('#addrow').attr('disabled', false).prop('value', "Add Row");
				$('.total_row').val(counter_cri);
			});
		});

		

		
		
   
</script>