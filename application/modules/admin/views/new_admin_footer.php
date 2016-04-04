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
<script type="text/javascript" src="<?php echo ADMIN_THEME_PATH; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ADMIN_THEME_PATH; ?>common_js/jquery-blink.js" type="text/javascript"></script>

<script src="<?php echo ADMIN_THEME_PATH; ?>bootstrap/js/multiselect_checkbox.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/datatables/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript">

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

    $(function () {
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    });


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
</script>
<?php if($this->uri->segment(1)=='data_entry' ||$this->uri->segment(1)=='leave'|| $this->uri->segment(2)=='add_employee' || $this->uri->segment(2)=='edit_employee' || $this->uri->segment(2)=='manage_user' || $this->uri->segment(2)=='notesheets' || $this->uri->segment(1)=='add_file' || $this->uri->segment(2)=='add_file' || $this->uri->segment(2)=='dealing' || $this->uri->segment(2)=='file_search' || $this->uri->segment(2)=='edit_file' || $this->uri->segment(2)=='allot' || $this->uri->segment(2)=='save_dealing' || $this->uri->segment(2)=='file' || $this->uri->segment(2)=='Dispaly_list'){ ?>
    <link href="<?php echo ADMIN_THEME_PATH; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo ADMIN_THEME_PATH; ?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            //Date DOB
            $('#emp_detail_dob').datepicker();
            $('#file_uo_date').datepicker();
            $('#sec_mark_date').datepicker();
            $('#receive_date').datepicker();
            $('#judgement_data').datepicker();
            // for file search
            $('#frm_dt').datepicker();
            $('#movement_frm_dt').datepicker();
            $('#movement_to_dt').datepicker();
            $('.ps_moniter_date').datepicker();
        });
    </script>
<?php } ?>

<?php
if($this->input->get('file_ps')){
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#view_table').DataTable( {
                "order": [[ 2, "desc" ]]
            } );
        } );
    </script>
<?php
}else {
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#view_table').dataTable({
                // Disable sorting on the first column
                "aoColumnDefs" : [ {
                    'bSortable' : false
                } ]
            });
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
        $('#view_table').dataTable({
            // Disable sorting on the first column
            "aoColumnDefs" : [ {
                'bSortable' : false
            } ]
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
    $(document).ready(function()
    {
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

            if(section_id==15){ /*For Procecustin/Abhiyojan*/
                $(".casetype").prop('disabled',true);
                //$('.casetype :selected[0]').val("");
                $("select.casetype").prop('selectedIndex', 0);
                $(".casetype").hide();
                $(".add_more").hide();
                $(".show_for_procescution").show();
                $(".hide_for_procescution").hide();
            }else if(section_id==17) /*OPinion*/{
                $('.hide_for_procescution,show_for_procescution').hide();
            }else{
                $(".casetype").prop('disabled',false);
                $(".casetype").show();
                $(".add_more").show();
                $(".hide_for_procescution").show();
                $(".show_for_procescution").hide();
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
</script>
</body>
</html>