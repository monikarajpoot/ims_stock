<?php
$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and `file_return` !='2' and (file_hardcopy_status = 'received' or file_hardcopy_status = 'working')");
$res1 =  $query->row_array();
$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and `file_return` !='2' and (file_hardcopy_status = 'not')");
$res2 =  $query->row_array();
$query = $this->db->query("select count(file_id) as counts FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and `file_return` ='2'");
$res3 =  $query->row_array();
?>
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
    <div class="row" id="divname">

        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $get_section[0]['section_name_hi']." (".$get_section[0]['section_name_en'].")" ?></h3>
                    <div class="box-tools pull-right">
                        <button onclick="printContent('divname')" class="btn btn-primary no-print">Print</button>
                        <button class="btn btn-warning no-print" onclick="goBack()"><?php echo $this->lang->line('Back_button_label'); ?></button>
                    </div>
                </div>
                <div></div>
                    <div class="box-body">
                        <hr/>
                        <table class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Section</th>
                                <th>Received</th>
                                <th>Not Received</th>
                                <th>Dispatch</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td><?php echo $get_section[0]['section_name_hi']." (".$get_section[0]['section_name_en'].")" ?></td>
                                <td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id']?>&s=receive')"><?php echo $res1['counts']; ?></td>
                                <td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=not')"><?php echo $res2['counts']; ?></td>
                                <td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=2')"><?php echo $res3['counts']; ?></td>
                                <td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>')"><span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="<?php echo $res1['counts'] + $res2['counts'] + $res3['counts']; ?> File"><?php echo $res1['counts'] + $res2['counts'] + $res3['counts']; ?></span>
                                </td>
                            </tr>
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-condensed">
                        <tr>
                            <th>#</th>
                            <th>File Level</th>
                            <th>Received</th>
                            <th>Not Received</th>
                            <th>Total File</th>
                        </tr>
                        <?php
                        $qry = $this->db->query("SELECT file_received_emp_id , count(file_id) AS fileno, SUM(IF(file_hardcopy_status = 'received' || file_hardcopy_status = 'working', 1,0)) AS received, SUM(IF(file_hardcopy_status = 'not', 1,0)) AS notreceive FROM ft_files WHERE `file_mark_section_id`='".$get_section[0]['section_id']."' GROUP by `file_received_emp_id` ORDER BY fileno DESC");
                        if($qry->num_rows() != 0) {
                            $i = '1';
                            foreach($qry->result() as $record1){
                                $emp = get_user_details($record1->file_received_emp_id);
                                $emp1 = $emp[0];
                                ?>
                                <tr>
                                    <td><?php echo $i ;?>.</td>
                                    <td><?php  echo $emp1->emp_full_name." (".$emp1->emprole_name_hi.")" ;?></td>
                                    <td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=receive&emp=<?php echo $record1->file_received_emp_id; ?>')"><?php echo $record1->received; ?></td>
                                    <td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=not&emp=<?php echo $record1->file_received_emp_id; ?>')"><?php echo $record1->notreceive; ?></td>
                                    <td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&emp=<?php echo $record1->file_received_emp_id; ?>')"><span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="<?php echo $record1->fileno; ?> File"><?php echo $record1->fileno; ?></span></td>
                                </tr>
                                <?php $i++; }} else{ ?>
                            <tr>
                                <td colspan="5" align="center"> No Records Found  </td>
                            </tr>
                        <?php } ?>
                    </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
            </div>
    </div><!-- /.row -->
        <!-- Main row -->
</section><!-- /.content -->
<script>
    function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<script>
    function showpage(comp1)
    {
        window.location=comp1;
    }
</script>
