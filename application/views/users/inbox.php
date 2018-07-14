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
					<?php 

					// print_r($users);

					if(sizeof($users)){

						echo '<div class="col-sm-6">
								<ul class="list-group">';

						foreach ($users as $value) {
							echo '<li class="list-group-item"><a href="'.site_url('users/contact/index/'.$value->jobid.'/'.$value->userid_2).'">'.$value->username.'</a></li>';
						}

						echo '</div></ul>';
						
					} else {
						echo '<p class="text-warning">No Responses yet.</p>';
					}

					?>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>

