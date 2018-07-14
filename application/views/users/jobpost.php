<?php $this->view('users/navbar'); ?>
<div class="container-fluid main-container">
	<?php $this->view('users/sidebar'); ?>
	<div class="col-md-10 content">
		<div class="panel panel-default">
			<div class="panel-heading">
				Post a Job
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-offset-2 col-sm-6">                   
				<?php 
				if(validation_errors() != FALSE) {  
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . validation_errors() . '</div>';
				}  
				?>
				<?php echo $this->session->flashdata('job_added_sucessfully'); ?>
					</div>
				</div>
			
			<div class="clearfix"></div>

				<form action="<?php echo site_url('users/jobpost')?>" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-2" for="txtTitle">Title:</label> 
						<div class="col-sm-6">
							<input type="text" required="" class="form-control" id="txtTitle" name="txtTitle" value="<?php echo set_value('txtTitle') ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="txtDescription">Description:</label>
						<div class="col-sm-6">
							<textarea required="" class="form-control" id="txtDescription" name="txtDescription"><?php echo set_value('txtDescription') ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
	                <label for="txtSubmissionTime" class="col-sm-2 control-label">DateTime Picking</label>
	                <div class="col-sm-6">
		                <div class="input-group date form_datetime col-sm-12" data-date="<?php echo date('Y-m-d')?>T<?php echo date('h:m:s') ?>Z" data-date-format="dd-mm-yyyy HH:ii(p)" data-link-field="txtSubmissionTime">
		                    <input class="form-control" size="16" type="text" value="" readonly required="">
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
		                </div>
		            </div>
					<input type="hidden" id="txtSubmissionTime" name="txtSubmissionTime" /><br/>
	            </div>


					<!-- <div class="form-group">
						<label class="control-label col-sm-2" for="txtSubmissionTime">Submission Time:</label>
						<div class="col-sm-6">
							<input type="text" required="" class="form-control" id="txtSubmissionTime" name="txtSubmissionTime" value="<?php echo set_value('txtSubmissionTime') ?>">
						</div>
					</div> -->
					<div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary">Submit</button>
					    </div>
					  </div>
					
					<div class="clearfix"></div>
				</form>	
			</div>
		</div>
	</div>
</div>

