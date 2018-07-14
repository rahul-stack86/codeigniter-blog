<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- <hr> -->
<!-- <footer class="footer">
	<div class="col-lg-12 text-center">
		Copyright &COPY; 2018 <a href="#">GoWeb</a>
	</div>
</footer> -->
		
<script type="text/javascript" src="<?php echo site_url('public/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('public/js/bootstrap.js'); ?>"></script>

<script type="text/javascript" src="<?php echo site_url('public/js/bootstrap-datetimepicker.min.js'); ?>"></script>


<script type="text/javascript">

	$(document).ready(function(){
		$('.form_datetime').datetimepicker({
	        //language:  'fr',
	        weekStart: 1,
	        todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
	        showMeridian: 1,
	        setDate: new Date(),
	        startDate: new Date()
	    });
	});

</script>

</body>
</html>