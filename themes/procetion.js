//add apend table 
		$(document).ready(function () {
			var counter = 0;
			var pros = 2;
			$("#addrow").on("click", function () {
				
				counter = $('#procetion tr').length - 2;
				var newRow = $("<tr>");
				var cols = "";
	  
				cols += '<td><input type="text" name="anukrmank[]' + counter + '" value="' + pros +'"></td>';
				cols += '<td><input type="text"  name="place[]' + counter + '" value=""></td>';
				cols += '<td><input type="text" name="case[]' + counter + '"></td>';
			    cols += '<td><input type="text" name="crimnal[]' + counter + '"></td>';
				cols += '<td><input type="text" name="vp_no[]' + counter + '"></td>';
				cols += '<td><input type="text" name="employee_name[]' + counter + '"></td>';
				
				
				cols += '<td><input type="button" class="ibtnDel"  value="Delete"></td>';
				newRow.append(cols);
				if (counter == 50) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
				$("table.procetion").append(newRow);
				counter++;
				pros++;
				$('.total_row').val(counter);
				
			});

			$("table.procetion").on("click", ".ibtnDel", function (event) {
				$(this).closest("tr").remove();
				
				counter -= 1
				$('#addrow').attr('disabled', false).prop('value', "Add Row");
				$('.total_row').val(counter);
			});

			
			
			var counter_bandi = 0;

			$("#addrow").on("click", function () {
				
				counter_bandi = $('#bandi_notesheet tr').length - 2;

				var newRow = $("<tr>");
				var cols = "";
	  
				cols += '<td><input type="text"  name="bibran[]' + counter_bandi + '"></td></td>';
				cols += '<td><input type="text"  name="year[]' + counter_bandi + '" value=""></td>';
				cols += ' <td><input type="text" name="month[]' + counter_bandi + '"></td>';
			    cols += '<td><input type="text" name="days[]' + counter_bandi + '"></td>';
				
				
				
				cols += '<td><input type="button" class="ibtnDel"  value="Delete"></td>';
				newRow.append(cols);
				if (counter_bandi == 50) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
				$("table.bandi_notesheet").append(newRow);
				counter_bandi++;
				$('.total_row').val(counter_bandi);
			});

			$("table.bandi_notesheet").on("click", ".ibtnDel", function (event) {
				$(this).closest("tr").remove();
				
				counter_bandi -= 1
				$('#addrow').attr('disabled', false).prop('value', "Add Row");
				$('.total_row').val(counter_bandi);
			});
			
			
			
		});

$( "#danme" ).change(function() {
  $("#employee_1").text( $(this).val());
});
$( "#section" ).change(function() {
  $("#employee_section").text( $(this).val());
});

		

		
		
 
