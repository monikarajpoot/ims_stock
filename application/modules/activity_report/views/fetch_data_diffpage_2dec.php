<?php
//pre($this->uri->segments);
$officer_ids=get_officer_emp_ids();
if(end($this->uri->segments)==21){
	//echo 'welcome';
    $qry="select count(file_id) as total_recieved_file FROM ft_files where `file_return` !='2' and (ps_moniter_date!='' && ps_moniter_date!='0000-00-00')  and file_hardcopy_status = 'received'";
    $qry0="select count(file_id) as total_recieved_file FROM ft_files where `file_return` !='2' and (ps_moniter_date!='' && ps_moniter_date!='0000-00-00')  and file_hardcopy_status = 'working'";
    $qry1="select count(file_id) as total_not_recived_file FROM ft_files where `file_return` !='2' and (ps_moniter_date!='' && ps_moniter_date!='0000-00-00')  and (file_hardcopy_status = 'not')";
    $qry2="select count(file_id) as total_dispatch_file FROM ft_files where (ps_moniter_date!='' && ps_moniter_date!='0000-00-00') and `file_return` ='2'";
}else{
	$qry="select count(file_id) as total_recieved_file FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and `file_return` !='2' and file_hardcopy_status = 'received'";
    $qry1="select count(file_id) as total_not_recived_file  FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and `file_return` !='2' and (file_hardcopy_status = 'not')";
    $qry0="select count(file_id) as total_working_file FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and `file_return` !='2' and file_hardcopy_status = 'working'";
	$qry2="select count(file_id) as total_dispatch_file FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and `file_return` ='2'";
}

$query = $this->db->query($qry);
$res1 =  $query->row_array();
$query0 = $this->db->query($qry0);
$res0 =  $query0->row_array();
/*Total recievd file without dispatch*/
$query = $this->db->query("select count(file_id) as total_not_recived_file FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and `file_return` !='2' and (file_hardcopy_status = 'not')");
$res2 =  $query->row_array();
//pre($res2);
/*Totoal file sent to Dispetch section*/
$query = $this->db->query("select count(file_id) as total_numb_of_dispetch FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and file_hardcopy_status!='close' and file_return='2'");
$res3 =  $query->row_array();
/*Total Dispose*/
//$query5 = $this->db->query("select count(file_id) as total_numb_of_dispose FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."' and file_hardcopy_status = 'close' and `file_return` ='2'");
//$res4 =  $query5->row_array();
$total_dispatch_section_file_despose_despose=get_total_close_file($get_section[0]['section_id'],0,'count_total_dispetch_section_dispose');
/*Total section despost*/
$total_section_despose = get_total_close_file($get_section[0]['section_id'],1,'count_total_section_despose');

/*Total section recievd file*/
$query6 = $this->db->query("select count(file_id) as total_sections_file FROM ft_files where `file_mark_section_id`='".$get_section[0]['section_id']."'");
$res6 =  $query6->row_array();
//pre($res6);

/*Get File Not Received in section*/
 $file_not_received_section = get_officer_emp_based_file_list($get_section[0]['section_id'],null,$officer_ids,'count_section_base_files');
 /*End*/

 /*Get File not recieved at officer level*/
 $file_not_received_officer_level = get_officer_emp_based_file_list($get_section[0]['section_id'],null,$officer_ids,'count_officer_base_files');
 /*End*/
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
								<th>Total Files received from 22/09/2015 till date</th>
                                <!--<th title="Total Number of files received">Files received but work not started</th>-->
                                <th title="Total Number of files not received">File pending for receive in section</th>
                                <th title="Total Number of files not received">File pending for receive at officer level</th>
								<th title="Total Number of working files">Files in Progress</th>
                                <th title="Total Dispatch to Dispatch section">Section dispose</th>
								<th title="Total number of dispose">Status to Dispatch Section <br/>(Pending + Close)</th>

                            </tr>
                            <tr>
                                <td id="sno">1.</td>
                                <td id="section_name"><?php echo $get_section[0]['section_name_hi']." (".$get_section[0]['section_name_en'].")" ?></td>
                                <td id="total_files_received" style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>')">
									<span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="<?php echo $res6['total_sections_file']; ?> Files">
									<?php echo $res6['total_sections_file']; ?>
									</span> <br/>Total Files
									<br/>(A)
                                </td>
								<!--<td id="file_work_not_started"  style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id']?>&s=received')"> <span class="badge bg-red" ><b><?php echo $res1['total_recieved_file']; ?></b> </span><br/>Total Files <br/>(B)</td>-->
                                <td id="file_recieved_in_section"  style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=not&lvl=section')"><span  class="badge bg-yellow"><b><?php echo $file_not_received_section['total_not_recived_file_in_section']; ?></b></span><br/>Total Files <br/>(C)</td>
                                <td id="file_recieved_in_officer"  style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=not&lvl=officer')"><span  class="badge bg-yellow"><b><?php echo $file_not_received_officer_level['total_not_recived_file_officers']; ?></b></span><br/>Total Files <br/>(D)</td>
								<td id="file_in_progress" style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=working')"><span  class="badge bg-green"><b><?php if(isset($res0['total_working_file']) && isset( $res1['total_recieved_file']) ){  echo $res0['total_working_file'] + $res1['total_recieved_file'];  }else { echo 0 ; }?></b></span><br/>Total Files <br/>(E)</td>
                                <td id="file_section_dispose"  style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=2&a=dispetch&lvl=section_dispose')"><span class="label label-info"><b><?php echo $total_section_despose;?><?php //echo $res3['total_numb_of_dispetch']; ?></b></span><br/>Total Files <br/>(F)</td>
								<td id="file_dispetch_section" ><span class="label label-info"><b><?php echo $res3['total_numb_of_dispetch'] + $total_dispatch_section_file_despose_despose; ?></b></span>&nbsp;Total Files <br/>(G)
									<br/><table style="margin-top:10px;">
											<tr>
												<td><b>Pending</b></td>
												<td><b>Close</b></td>
											</tr>
											<tr>
												<td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=2&a=dispetch')"><span class="badge bg-red"><?php echo $res3['total_numb_of_dispetch']; ?></span></td>
												<td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=2&a=dispetch&lvl=sent_dipatch_section')"><span class="badge bg-green"><?php echo $total_dispatch_section_file_despose_despose; ?></span></td>
											</tr>
									</table>
								</td>

                            </tr>
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-condensed stripeTable12">
                        <tr>
                            <th>#</th>
                            <th>File in Progress</th>
                            <th>Received</th>
                            <th>Not Received</th>
                            <th>Total File (C+D+E)<br/><span class="badge bg-red"><?php echo $res1['total_recieved_file'] +  $file_not_received_section['total_not_recived_file_in_section'] + $file_not_received_officer_level['total_not_recived_file_officers'] + $res0['total_working_file'] ; ?></span></th>
                        </tr>
                        <?php
                        if(end($this->uri->segments)==21){
                            $qry = $this->db->query("SELECT file_received_emp_id , count(file_id) AS fileno, SUM(IF(file_hardcopy_status = 'received' || file_hardcopy_status = 'working', 1,0)) AS received, SUM(IF(file_hardcopy_status = 'not', 1,0)) AS notreceive FROM ft_files WHERE (ps_moniter_date!='' && ps_moniter_date!='0000-00-00') GROUP by `file_received_emp_id` ORDER BY fileno DESC");
                        }else{
							//$qry = $this->db->query("SELECT file_received_emp_id , count(file_id) AS fileno, SUM(IF(file_hardcopy_status = 'received' || file_hardcopy_status = 'working', 1,0)) AS received, SUM(IF(file_hardcopy_status = 'not', 1,0)) AS notreceive FROM ft_files WHERE `file_mark_section_id`='".$get_section[0]['section_id']."' GROUP by `file_received_emp_id` ORDER BY fileno DESC");
							$sql_qry="SELECT emp.designation_id,files.file_received_emp_id , count(files.file_id) AS fileno, SUM(IF(files.file_hardcopy_status = 'received' || files.file_hardcopy_status = 'working', 1,0)) AS received, SUM(IF(files.file_hardcopy_status = 'not', 1,0)) AS notreceive FROM ft_files as files inner join ft_employee as emp on emp.emp_id=files.file_received_emp_id WHERE files.file_mark_section_id='".$get_section[0]['section_id']."' GROUP by files.file_received_emp_id ORDER BY emp.designation_id DESC";
							$qry = $this->db->query($sql_qry);
                            
                        }

                        /*Get employee id*/
                        $sql_qry_emp="SELECT group_concat(emp_id) AS section_emp_ids FROM `ft_employee` where emp_status ='1' and emp_is_retired = '0' and designation_id !='28' and emp_section_id='".$get_section[0]['section_id']."'";
                        $qry_2 = $this->db->query($sql_qry_emp);
                        $empids_array= $qry_2->row_array();
                        $section_emp_ids = explode(',',$empids_array['section_emp_ids']);
						$recievd_emp_id = array();
                        foreach ($qry->result() as $empid) {
                            $recievd_emp_id[]=$empid->file_received_emp_id;
                        }
                        $user_ids_not_in_list = array_diff($section_emp_ids,$recievd_emp_id);
                        $section_all_empIds= array_merge($recievd_emp_id,$user_ids_not_in_list);
                        /*End*/
                        if($qry->num_rows() != 0) {
                            $i = '1';
                            $record1 = $qry->result() ;
                                //foreach($qry->result() as $record1){
                                for ($j=0; $j<count($section_all_empIds) ; $j++) { 
                                    ///# code...
                                //}
                                    $emp = get_user_details($section_all_empIds[$j]);
                                    $emp1 = $emp[0];
    								if($emp1->emp_section_id!=8){
    								?>
                                    <tr class="stripeRow" <?php if(isset($record1[$j]->designation_id) && $record1[$j]->designation_id<=7){ ?> style="background-color:#CECECE"<?php } ?>>
                                        <td><?php echo $i ;?>. </td>
                                        <td><?php  echo getemployeeName($section_all_empIds[$j],true)." (".$emp1->emprole_name_hi.")" ;?></td>
                                        <td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=received&emp=<?php echo $section_all_empIds[$j]; ?>')" class="qtr-1"><?php if(isset($record1[$j]->received)){ echo $record1[$j]->received;}else{ echo 0;} ?></td>
                                        <td style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&s=not&emp=<?php echo $section_all_empIds[$j]; ?>')" class="qtr-2"><?php if(isset($record1[$j]->notreceive)){ echo $record1[$j]->notreceive;}else{ echo 0;}  ?></td>
                                        <td  id="total_price" style="cursor:pointer" onclick="showpage('<?php echo base_url(); ?>reports/moniter?secid=<?php echo $get_section[0]['section_id'] ?>&emp=<?php echo $section_all_empIds[$j]; ?>')">
    										<span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="<?php echo isset( $record1[$j]->fileno)? $record1[$j]->fileno:''; ?> File">
    											<?php //echo $record1->fileno; ?>
    										</span>
    									</td>
                                    </tr>
                                    <?php $i++; }
                                }
                            } else{ ?>
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
