<?php
?>
<link href="<?php echo base_url().'/assets/css/custom/login.css'; ?>" rel="stylesheet">


<div class="container">
	<div class="wrapper fadeInDown">
		<span id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first">
				<img src="<?php echo base_url().'/assets/images/users/default_user.png' ?>" id="icon" alt="User Icon" style="width: 50px;height: 50px" />
			</div>
<!--			--><?php //echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

			<!-- Login Form -->
			<?php echo form_open('authenticate/register_Process'); ?>
				<input type="text" id="username" class="fadeIn first" name="u_name" placeholder="Username" value="<?php echo set_value('u_name') ?>">
			<span class="text-danger"><?php echo form_error('u_name'); ?></span>

			<input type="email" id="email" class="fadeIn second" name="u_email" placeholder="Email" value="<?php echo set_value('u_email') ?>">
						<span class="text-danger"><?php echo form_error('u_email'); ?></span>

				<input type="password" id="password" class="fadeIn third" name="u_password" placeholder="Password" >
						<span class="text-danger"><?php echo form_error('u_password'); ?></span>

				<input type="submit"  name="u_register" class="fadeIn fourth" value="Register">
			<?php echo form_close(); ?>

			<!-- Remind Password -->
			<div id="formFooter">
				<a class="underlineHover" href="#">Forgot Password?</a>
			</div>

		</div>
	</div>

</div>
