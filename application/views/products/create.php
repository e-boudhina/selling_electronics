<div class="container">&nbsp;
	<div class="card card-default">
		<div class="card-header">
<!--			javascript:window.history.go(-1);
 NOTE: using window.history.go(-1) will fail and throw a js error, if the user some how lands directly on the "1" last page. window.history will be empty in that case.
 Find an alternative like  $this->input->post('refer_from');
 -->
			Create Product<a class="btn btn-secondary float-right mr-1  btn-sm " href="javascript:window.history.go(-1);"> Go Back</a>
		</div>

		<div class="card-body">

<!--			@include('inc.feedback')-->
			<?php echo form_open('products/store'); ?>

				<div class="form-group">
					<label for="name" >Title :</label>
					<input type="text" class="form-control " id="name" name="title" placeholder="Title" value="<?php echo set_value('title') ?>">
					<span class="text-danger"><?php echo form_error('title'); ?></span>

				</div>

				<div class="form-group">
					<label for="email"> Category: </label>
					<input type="text" class="form-control " id="category" name="category" placeholder="category" value="<?php echo set_value('category') ?>">
					<span class="text-danger"><?php echo form_error('category'); ?></span>

				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-dark float-left my-2 align-center">Create Product</button>
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>

