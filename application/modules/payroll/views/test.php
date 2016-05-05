 <script src="http://localhost/ims_stock/themes/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>

 <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>

 <script type="text/javascript" src="https://vitalets.github.io/x-editable/assets/x-editable/bootstrap-editable/js/bootstrap-editable.js"></script>

 <script type="text/javascript" src="https://vitalets.github.io/x-editable/assets/mockjax/jquery.mockjax.js"></script>


<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css"/>

   <link rel="stylesheet" type="text/css" href="https://vitalets.github.io/x-editable/assets/x-editable/bootstrap-editable/css/bootstrap-editable.css"/>
 
<p>X-editable: submit via PUT method</p>
<div style="margin: 150px">
    <a href="#" id="username">awesome</a>
</div>
<script type="text/javascript">

$('#username').editable({
    type: 'text',
    url: '/post',    
    pk: 1,    
    title: 'Enter username',
    ajaxOptions: {
        type: 'put'
    }        
});

//ajax emulation
$.mockjax({
    url: '/post',
    responseTime: 200,
    response: function(settings) {
        console.log(settings);
    }
}); 

</script>