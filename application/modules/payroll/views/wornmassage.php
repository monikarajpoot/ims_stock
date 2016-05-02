
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php// echo $title; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php// echo $title; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <!-- Your Page Content Here -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                        <h3 class="box-title"> <?php  $in = 0;
                         foreach ($pay_regi as $key => $pay) {
                        	$in = $in +1 ;
                         if($in == 1){  // echo$pay->emp_unique_id." =". $pay->emp_full_name_hi;  
                         } } ?></th></h3>                 
                    </div>
                   
                    <div class="box-body">

आप <b><?php echo $pay->emp_full_name_hi;?></b> की सैलरी <b><?php echo $_GET['pay_month']?></b> महीने की भर चुके है यदि आपको इनकी महीने <b><?php echo $_GET['pay_month']?></b>  सैलरी मे कुछ परिवर्तन करना है तो निचे दिए गये परिहरति बटन पर क्लिक करे अन्यथा बेक बटन पर क्लिक करे
					</div> <div class="box-body">

						<a class="btn btn-primary" href="<?php echo base_url();?>payroll/pay_modification/?emp_unique_codeemp_unique_code=<?php echo $_GET['emp_unique_codeemp_unique_code']?>&pay_month=<?php echo $_GET['pay_month']?>" class="button"> परिहरति </a>
						<button class="btn  btn-warning" title="Back" onclick="goBack()">पिछले पेज में वापस जायें</button>

									</div>
				</div>		
			</div>
		</div>	
	</div>	
</section>