<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo  "कर्मचारी डी.ए   "  ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php echo "कर्मचारी  पेन  & आधार कार्ड  "  ; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<!--     <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title"><?php echo "कर्मचारी डी.ए   "  ;    ?></h3>
                </div>
                <div class="box-body">
                    <?php //$this->load->view('payroll_header') ?>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
            
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo "कर्मचारी डी.ए  "  ; ?></h3>                 
                    </div>
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('bulk_action'); ?> </label>
                            </div>
                          
                          
                        </div>
                    </div>

                    <div class="box-body">
 <div class="col-xs-6">

               <form action="<?php echo base_url();?>payroll/update_da" method="post" >
                 
              <div class="form-group">
                <label for="email"><?php echo $this->lang->line('pay_head'); ?></label>
                <select  name="pay_head" id="pay_head" onchange="selectbuget()" class="form-control">
                                <option value=""><?php echo $this->lang->line('pay_head'); ?></option>
                               <?php  foreach($cate as $empkeys  ){?>             
                                    <option value="<?php echo $empkeys->pay_cate_id ?>"  ><?php echo $empkeys->pay_cate_name ?></option>
                                <?php } ?>
                            </select>
              </div>
              <div class="form-group">
                <label for="email"><?php echo "डी.ए "  ?>:</label>
                  <b id="buget"><input value="" name="DA" class="form-control"> </b>
              </div>


            

              <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



              </div>

             
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
    <!-- Main row -->
</section><!-- /.content -->

<!-- Modal approve -->
<script type="text/javascript">

function selectbuget()
{
$val =$("#pay_head").val();


$.get("<?php echo base_url();?>payroll/showda/"+$val,function(a){

$("#buget").html(a);});

}
</script>