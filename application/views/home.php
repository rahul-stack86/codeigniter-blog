<div class="container">
	
	<P style="padding:50px;"><a class="btn btn-primary" href="<?php echo base_url(); ?>blogs/page">All Blogs</a> || <a href="<?php echo base_url(); ?>login" class="btn btn-primary">Login</a></P>


	<div class="panel panel-info">
		<div class="panel-heading">Stored Procedure</div>
		<div class="panel-body">
			<?php foreach ($user_result as $value) {
				echo $value->name.'<br>';
			} ?>
		</div>
		<div class="panel-footer">Calling all the users in the "users" table</div>
	</div>

	<hr>	

	<?php foreach ($article_result as $row) { ?>
		<div class="panel panel-primary">
			<div class="panel-heading"><?php echo $row->title; ?></div>
			<div class="panel-body"><?php echo $row->body; ?></div>
			<div class="panel-footer"><?php echo nice_date($row->created_at, 'd-M-Y h:i a')  ?></div>
		</div>
		<?php } ?>
	</div>