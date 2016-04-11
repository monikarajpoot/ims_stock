<?php //pre($pay_salary);?>



<table border="1" style="background-color:FFFFCC;border-collapse:collapse;border:1px solid FFCC00;color:000000;width:100%" cellpadding="3" cellspacing="3">
		<tr>
		<td colspan="32"><h1>मध्यप्रदेश शासन विधि एवं विधायी कार्य विभाग</h1></td>
		
		</tr>

	<tr><?php        $emp_id = $this->uri->segment("3"); ?>
	<tr>
		<td colspan="32"><h2>विषय: माह मार्च 2016 का न्यायिक सेवा अधिकारियों का वेतन पत्रक कम्प्यूटर देयक क्रमाक         दिनांक    /4/2016 आफिस देयक क्रमाक     दिनांक  /4/2016</h2></td>
	
		</tr>

	<tr>
		<?php foreach($cate_salary[0] as $key=>$val){ ?><td><?php echo $key; ?></td>
		<?php }?>
		<td>Table Cell</td>
	</tr>
	<tr>
		<?php foreach($pay_salary[0] as $key=>$val){ ?><td><?php echo $val; ?></td>
		<?php }?>
			<td>Table Cell</td>
	</tr>
</table>

