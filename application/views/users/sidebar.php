<?php $uri_segment = $this->uri->segment(2); //echo $uri_segment;  ?>
<div class="col-md-2 sidebar">
	<ul class="nav nav-pills nav-stacked">
		<li <?php if($uri_segment == 'jobs') echo 'class="active"' ?> ><a href="<?php echo site_url('users/jobs') ?>">All Jobs</a></li>
		<li <?php if($uri_segment == 'jobpost') echo 'class="active"' ?>><a href="<?php echo site_url('users/jobpost') ?>">Post Job</a></li>
		<!-- <li <?php if($uri_segment == 'dashboard') echo 'class="active"' ?>><a href="#">Link</a></li>
		<li <?php if($uri_segment == 'dashboard') echo 'class="active"' ?>><a href="#">Link</a></li>
		<li <?php if($uri_segment == 'dashboard') echo 'class="active"' ?>><a href="#">Link</a></li> -->
	</ul>
</div>