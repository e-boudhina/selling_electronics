
<?php if($this->session->flashdata('error')){?>
	<div class="alert alert-danger text-center"><?php echo $this->session->flashdata('error'); ?></div>
<?php };?>

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
					<label for="description"> Description: </label>
					<input type="text" class="form-control " id="description" name="description" placeholder="Description" value="<?php echo set_value('description') ?>">
					<span class="text-danger"><?php echo form_error('description'); ?></span>
				</div>

			<div class="form-group">
					<label for="price"> Price: </label>
					<input type="text" class="form-control " id="price" name="price" placeholder="Price" value="<?php echo set_value('price') ?>">
					<span class="text-danger"><?php echo form_error('price'); ?></span>
				</div>

			<label for="upload"> Image: </label>

			<div class="input-group">

				<div class="custom-file">
					<div class="custom-file">
						<input type="file" name="image" class="custom-file-input " id="upload" size="20">
						<label class="custom-file-label" for="upload">Choose file</label>
					</div>

				</div>
			</div>
			<span class="text-danger"><?php echo form_error('image'); ?></span>


				<div class="form-group mt-4">
					<button type="submit" class="btn btn-outline-success float-left my-2 align-center" style="width: 100%">Create</button>
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>

