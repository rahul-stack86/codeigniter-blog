<div class="container">
<p>&nbsp;</p>
	<div class="panel panel-default">
  <div class="panel-body">
	
	<?php

// for ($i=1; $i<=5; $i++) 	       
// 	{ 	 
// 		for ($k=5; $k>$i; $k--)	 
// 		{	  
// 			//print one space throgh html ;
// 			echo "&nbsp;";	  
// 		}
// 		for($j=1;$j<=$i;$j++)	  
// 		{	  	
// 			echo "* ";	  
// 		}	  	
// 		echo "<br/>";	
// 	} 


	$n = 7;

	for($i = 0; $i < $n; $i++){

		// printing html spaces

		for ($s=$n; $s > $i; $s--) { 
			echo '&nbsp;';
		}

		// printing star

		for ($k=0; $k <= $i; $k++) { 
			echo '* ';
		}

		echo '<br>';
	}

	/*for($i = ($n-1); $i > 0; $i--){

		// printing html spaces

		for ($s=$n; $s > $i; $s--) { 
			echo '&nbsp;';
		}

		// printing star

		for ($k=0; $k < $i; $k++) { 
			echo ' * ';
		}

		echo '<br>';
	}*/

	
	?>

  </div>
</div>



	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<td width="5%">id</td>
				<td width="30%">title</td>
				<td width="50%">body</td>
				<td width="15%">created at</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($article_result as $row) { ?>
			<tr>
				<td><?php echo $start+1; ?></td>
				<td><?php echo $row->title; ?></td>
				<td><?php echo $row->body; ?></td>
				<td><?php echo nice_date($row->created_at, 'd-M-y'); ?></td>
			</tr>
			<?php $start++; } ?>
		</tbody>
	</table>

	<?php echo $pages; ?>

</div>