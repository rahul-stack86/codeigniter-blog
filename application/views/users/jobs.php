<?php $this->view('users/navbar'); ?>
<div class="container-fluid main-container">
	<?php $this->view('users/sidebar'); ?>
	<div class="col-md-10 content">
		<div class="panel panel-default">
			<div class="panel-heading">
				All Job List
			</div>
			<div class="panel-body"> 

				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<td width="10%">id</td>
							<td width="40%">title</td>
							<td width="30%">Username</td>
							<td width="20%">Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($job_result as $row) { ?>
							<tr>
								<td><?php echo $start+1; ?></td>
								<td><?php echo $row->title; ?></td>
								<td><?php echo $row->username; ?></td>
								<td><?php 
									if($userdata['id'] == $row->userid){
										echo '<a href="'.site_url('users/inbox/index/'.$row->id).'" class="btn btn-primary">Inbox</a>';
									} else {
										echo '<a href="'.site_url('users/contact/index/'.$row->id.'/'.$row->userid).'" class="btn btn-info">Contact</a>';
									} 
									?></td>
							</tr>
							<?php $start++; } ?>
						</tbody>
					</table>

					<?php echo $pages; ?>
				</div>
			</div>
		</div>
	</div>