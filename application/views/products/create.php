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
			<?php echo form_open_multipart('products/store'); ?>

				<div class="form-group">
					<label for="name" >Name :</label>
					<input type="text" class="form-control " id="name" name="name" placeholder="Name" value="<?php echo set_value('name') ?>">
					<span class="text-danger"><?php echo form_error('name'); ?></span>
				</div>

				<div class="form-group">
					<label for="email"> description: </label>
					<input type="text" class="form-control " id="description" name="description" placeholder="Description" value="<?php echo set_value('description') ?>">
					<span class="text-danger"><?php echo form_error('description'); ?></span>
				</div>

<!--				<div class="form-group">-->
<!--					<label for="image">Product image : </label>-->
<!--					<input type="file" name="image" class="form-control" id="image" >-->
<!--				</div>-->

				<div class="form-group">
					<button type="submit" class="btn btn-dark float-left my-2 align-center">Create</button>
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>

