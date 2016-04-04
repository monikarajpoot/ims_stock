<link href="<?php echo ADMIN_THEME_PATH; ?>plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $title; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php echo $title; ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="overflow: auto">
                <div class="box-header">
                    <div style="float:left"><h3 class="box-title"><?php echo $title_tab;?></h3></div>
                    <div style="float:right">
                        <!--<button class="btn btn-block btn-info"><?php echo $this->lang->line('view_file_mark');?></button>-->
                        <!--<a class="btn btn-info"><?php echo $this->lang->line('view_file_mark');?></a>-->
                        <button class="btn btn-warning" onclick="goBack()"><?php echo $this->lang->line('Back_button_label'); ?></button>
                    </div>
                    <br/>
                </div><!-- /.box-header -->
                <?php // echo $this->session->flashdata('message'); ?>
                <?php if($this->session->flashdata('message') || $this->session->flashdata('error')) {
                    $msg = $this->session->flashdata('message') ? 'success' : 'danger';
                    ?>
                    <div class="alert alert-<?php echo $msg; ?> alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>
                            <?php  echo $this->session->flashdata('message');
                            echo $this->session->flashdata('error'); ?>
                        </strong>
                        <br/>
                    </div>
                <?php } ?>
                <div class="box-body" align="center">
                      <div  style="text-align: justify; width: 90%">
                        <?php $i=1; foreach($get_section as $sec){
                            if($sec['section_id'] != '26' && $sec['section_id'] != '1' && $sec['section_id'] != '8'){
                                if ($i%2 == 1) { $cls = "btn bg-purple btn-flat margin"; }else{ $cls = "btn bg-olive btn-flat margin"; }?>
                               <!-- <button type="button" onclick="return open_div(<?php echo $sec['section_id'] ; ?>)" value="<?php echo $sec['section_id'] ; ?>" class="<?php echo $cls ; ?> comment_button"><?php echo $sec['section_name_hi']." (".$sec['section_name_en'].")" ; ?></button>-->
                                <a href="activity_report/fetch_data/<?php echo $sec['section_id'] ; ?>"  class="<?php echo $cls ; ?> comment_button"><?php echo $sec['section_name_hi']." (".$sec['section_name_en'].")" ; ?></a>
                            <?php $i++; } }?>
                      </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div id="display" align="left"></div>
    </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->
<script src="<?php echo ADMIN_THEME_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script type="text/javascript">
        function open_div(file) {
            var test = file;
            var HTTP_PATH = '<?php echo base_url(); ?>';
            var dataString = 'content=' + test;
            $.ajax({
                type: "POST",
                url: HTTP_PATH + "activity_report/fetch_data/" + test,
                data: dataString,
                cache: false,
                success: function (html) {
                    $("#display").html(html);
                }
            });
            return false;
        }
</script>