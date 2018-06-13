<style type="text/css">
.form-login {
	background-color: #EDEDED;
	padding-top: 10px;
	padding-bottom: 20px;
	padding-left: 20px;
	padding-right: 20px;
	border-radius: 15px;
	border-color:#d2d2d2;
	border-width: 5px;
	box-shadow:0 1px 0 #cfcfcf;
}

h4 { 
	border:0 solid #fff; 
	border-bottom-width:1px;
	padding-bottom:10px;
	text-align: center;
}

.form-control {
	border-radius: 10px;
}

.wrapper {
	text-align: center;
}

</style>

<div class="container">	
	<div class="row">
		<div class="col-md-offset-3 col-md-6" style="padding-top: 50px;">
			<?php 
			if(validation_errors() != FALSE) {  
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . validation_errors() . '</div>';
			}  
			?>
			<?php echo  $this->session->flashdata('error_user_not_found');?>

			<?php echo $this->session->flashdata('error_logged_out_sucessfully'); ?>

			<form action="<?php echo site_url('login')?>" method="post">
				<div class="form-login">
					<h4>Welcome back.</h4>
					<input type="email" class="form-control  input-sm chat-input" name="txtEmail" id="txtEmail" value="<?php echo set_value('txtEmail') ?>" placeholder="Email Id">
					<br>
					<input type="password" class="form-control  input-sm chat-input" name="txtPassword" id="txtPassword" placeholder="Password">
					<br>
					<div class="wrapper">
						<span class="group-btn">     
							<button type="submit" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>
						</span>
					</div>

				</div>
			</form>	
		</div>
	</div>
</div>