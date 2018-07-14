<?php $this->view('users/navbar'); ?>
<div class="container-fluid main-container">
	<?php $this->view('users/sidebar'); ?>
	<div class="col-md-10 content">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $job_row->title; ?>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">   
					<div class="col-sm-8">
						
					       
					<?php 
					if(validation_errors() != FALSE) {  
						echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . validation_errors() . '</div>';
					}  
					?>
					<?php echo $this->session->flashdata('message_sent_sucessfully'); ?>
					</div>   
					</div>
				</div>
			
			 
				<div class="row">
					<div class="col-sm-12">
						<form action="<?php echo site_url('users/contact/index/'.$jobid.'/'.$uid); ?>" method="post">
							<div class="col-sm-8">
								<textarea name="txtaMessage" required="" id="" cols="20" rows="2" class="form-control"></textarea>
							</div>
							<div class="col-sm-4">
								<button type="submit" class="btn btn-primary">Send</button>
							</div>
						</form>
					</div>

					<p>&nbsp;</p>

					<div class="col-sm-12">
						<?php 

					if($check_chat){

						echo '<div class="col-sm-6">
						<h4>Chat Messages</h4>
								<ul class="list-group">';

						foreach ($chat_messages as $value) {
							echo '
							<li class="list-group-item">
								<b>'.$value->name.':</b> '.$value->message.' <span class="pull-right">'.date('d-m-Y h:i a', strtotime($value->created_at)).'</span>
							 </li>';
						}

						echo '</div></ul>';
						
					} 

					?>
					</div>
					
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>

