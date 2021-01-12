<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="py-5 bg-dark fixed-bottom mt-4" >
	<div class="container">
		<p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
	</div>
	<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url(); ?>/assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--Image upload script-->
<script>
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>

</body>

</html>
