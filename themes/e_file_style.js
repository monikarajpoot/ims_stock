 function printDiv(divId) {
       var printContents = document.getElementById(divId).innerHTML;
       var originalContents = document.body.innerHTML;
	   var style = '<style>@media print{table{border:none !important;}table th, table td{border:none !important; padding:4px;} p{	text-indent: 50px; text-align: justify; margin-bottom: 6px; line-height: 20px;} .notesheet_margin{ width:80%; margin:0 auto;} }</style>';
       document.body.innerHTML = "<html><head><title></title>" + style + "</head><body>" + printContents + "</body>";
       window.print();
       document.body.innerHTML = originalContents;
   }