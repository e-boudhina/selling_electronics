<?php if($this->session->flashdata('info')){?>
	<div class="alert alert-info text-center"><?php echo $this->session->flashdata('info'); ?></div>
<?php };?>

<?php if($this->session->flashdata('success')){?>
	<div class="alert alert-success text-center"><?php echo $this->session->flashdata('success'); ?></div>
<?php };?>
<div class="container mt-4 mb-4">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

				<div class="card-header">Profile</div>

				<div class="card-body">

					<?php echo form_open_multipart('user/profile/update'); ?>

					<div class="form-group">
						<label for="username" >User Name :</label>
						<input type="text" class="form-control " id="name" name="u_name" placeholder="Name" value="<?php echo isset($user['username']) ? $user['username'] :set_value('username'); ?>">
						<span class="text-danger"><?php echo form_error('u_name'); ?></span>
					</div>

					<div class="form-group">
						<label for="email"> Email: </label>
						<input type="text" class="form-control " id="email" name="u_email" placeholder="Email" value="<?php echo isset($user['email']) ? $user['email'] :set_value('email'); ?>">
						<span class="text-danger"><?php echo form_error('u_email'); ?></span>
					</div>

					<div class="form-group">
						<label for="email"> New Password: </label>
						<input type="password" class="form-control " id="password" name="u_password" placeholder="Password" value="">
						<span class="text-danger"><?php echo form_error('u_password'); ?></span>

					</div>



					<div class="form-group mt-3">
						<button type="submit" class="btn btn-outline-dark float-left my-2 align-center" style="width: 100%">Update</button>
					</div>

					<?php echo form_close(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
