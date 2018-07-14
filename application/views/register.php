
<div class="container">	
	<div class="row">
		<div class="col-md-offset-3 col-md-6" style="padding-top: 50px;">
			<h3>Sign Up</h3>
			<hr>
			<?php 
			if(validation_errors() != FALSE) {  
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . validation_errors() . '</div>';
			}  
			?>
			<?php echo $this->session->flashdata('user_added_sucessfully'); ?>

			<form action="<?php echo site_url('register')?>" method="post">
				<div class="form-group">
					<label for="txtName">Name:</label>
					<input type="text" required="" class="form-control" id="txtName" name="txtName" value="<?php echo set_value('txtName') ?>">
				</div>
				<div class="form-group">
					<label for="txtUsername">Username:</label>
					<input type="text" required="" class="form-control" id="txtUsername" name="txtUsername" value="<?php echo set_value('txtUsername') ?>">
				</div>
				<div class="form-group">
					<label for="txtPassword">Password:</label>
					<input type="password" required="" class="form-control" id="txtPassword" name="txtPassword">
				</div>
				<div class="form-group">
					<label for="confTxtPassword">Confirm Password:</label>
					<input type="password" required="" class="form-control" id="confTxtPassword" name="confTxtPassword">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				<div class="clearfix"></div>
				<br>
				<p>Already Register? Please <a href="<?php echo site_url('login')  ?>">Login</a>.</p>
			</form>	
		</div>
	</div>
</div>