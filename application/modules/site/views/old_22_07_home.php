<?php $this->load->view('header'); ?>
  <div class="row">
	  <div class="col-md-3">
	  	<div class="panel panel-primary">
		  <div class="panel-heading text-center"><?php echo $this->lang->line('login_panel'); ?></div>
	     	  <div class="panel-body">
		     <?php 		      		      		   
		     //message if error		   
		      if(isset($message_error) && $message_error){
		          echo '<div class="alert alert-danger">';
		          echo '<a class="close" data-dismiss="alert">×</a>';
		          echo $this->lang->line('singin_error_message');
		          echo '</div>';             
		      }	
		      if(isset($status_error) && $status_error){
		          echo '<div class="alert alert-danger">';
		          echo '<a class="close" data-dismiss="alert">×</a>';
		          echo $status_error_message;
		          echo '</div>';             
		      }
		      if(isset($retire_error) && $retire_error){
		          echo '<div class="alert alert-danger">';
		          echo '<a class="close" data-dismiss="alert">×</a>';
		          echo $this->lang->line('retire_error_message');
		          echo '</div>';             
		      }
		      $attributes = array('class' => 'form-signin','id' => 'formSignin');			           
		      echo form_open('login', $attributes);		   
		      //input user name 
		      	$emp_login_id = array(  
			      'name'        => 'emp_login_id',
	              'id'          => 'emploginId',
	              'value'       => '',
	              'maxlength'   => '50',	              
	              'class'       => 'form-control',
	              'placeholder' => $this->lang->line('login_user_id_placeholder'),
	              'value'		=>  isset($emp_login_id_val) ? $emp_login_id_val : '',
		      	);	
		      echo '<div class="form-group">';	
		      echo '<label for="emp_login_id">'.$this->lang->line('home_login_id').'</label>';
		      echo form_input($emp_login_id);
		      echo form_error('emp_login_id');
		      echo '</div>';   
		      //input password
		      	 $emp_password = array(  
			      'name'        => 'emp_password',
	              'id'          => 'empPassword',
	              'value'       => '',
	              'maxlength'   => '50',	              
	              'class'       => 'form-control',
		      	);
		      echo '<div class="form-group">';
		      echo '<label for="emp_password">'.$this->lang->line('home_password').'</label>';	
		      echo form_password($emp_password);
		      echo form_error('emp_password');
		      echo '</div>';  		      	          
		      echo form_submit('submit', $this->lang->line('home_sign_in'), 'class="btn  btn-primary"');
		      echo form_close();
		      echo br();
		      echo anchor('forgote_password', $this->lang->line('home_forgot_password'), 'title="'.$this->lang->line('home_forgot_password').'"');
		      ?>  
		  </div>
		</div>
		 <div class="panel panel-primary">
		  <div class="panel-heading text-center">Notifications</div>
	     	<div class="panel-body">

	     	</div>
	 	 </div>
	  </div><!-- md-3 -->
	  <div class="col-md-9">
	  		<div id="carousel-example-generic" class="carousel slide sliders" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="<?php echo base_url(); ?>themes/site/images/slider/slider1.jpg" alt="slider1">
			      <div class="carousel-caption">
			      	<h3>आपका स्वागत है</h3>
   					 <p>...</p>			       
			      </div>
			    </div>
			    <div class="item">
			      <img src="<?php echo base_url(); ?>themes/site/images/slider/slider2.jpg" alt="slider2">
			      <div class="carousel-caption">
			      	  <h3>विधि विभाग, मध्यप्रदेश, भोपाल</h3>
   					 <p>...</p>					        
			      </div>
			    </div>			  
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
			<br/>
		<div class="panel panel-primary">
		  <div class="panel-heading text-center"><?php echo $this->lang->line('notice_board_panel'); ?></div>
	     	<div class="panel-body">

	     	</div>
	 	 </div>
	  </div><!-- md-9 -->
    </div><!-- row -->
    <br/>
    <div class="row">
	    <div class="col-md-12">
	    	<div class="well well-lg">
	    		<marquee>
	    			हम जल्द ही इस अप्लिकेशन का बीटा वर्ज़न ला रहे है
	    		</marquee>
	    	</div>
	    </div>
	</div>
<?php $this->load->view('footer'); ?>
<script>
// assumes you're using jQuery
$(document).ready(function() {

	<?php if($this->session->flashdata('pass_msg')){ ?>
	alert('<?php echo $this->session->flashdata("pass_msg"); ?>');
	<?php } ?>

});
</script>