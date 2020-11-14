<?php
?>
<link href="<?php echo base_url().'/assets/css/custom/login.css'; ?>" rel="stylesheet">

<?php //if(isset($_SESSION['success']) || !empty($_SESSION['success'])) {?>
<!-- alternative for the above line-->
<?php if($this->session->flashdata('success')){?>
<div class="alert alert-success text-center"><?php echo $this->session->flashdata('success'); ?></div>
<?php };?>
<?php if($this->session->flashdata('error')){?>
	<div class="alert alert-danger text-center"><?php echo $this->session->flashdata('error'); ?></div>
<?php };?>
<div class="container">

	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first">
				<img src="<?php echo base_url().'/assets/images/users/default_user.png' ?>" id="icon" alt="User Icon" style="width: 50px;height: 50px" />
			</div>

			<!-- Login Form -->
			<?php echo form_open('authenticate/login_Process'); ?>
				<input type="text" id="login" class="fadeIn second" name="u_email" placeholder="User email" required autofocus>
				<input type="password" id="password" class="fadeIn third" name="u_password" placeholder="Password" required>
				<input type="submit"  name="u_login" class="fadeIn fourth" value="Log In">
			<?php echo form_close(); ?>

			<!-- Remind Passowrd -->
			<div id="formFooter">
				<a class="underlineHover" href="#">Forgot Password?</a>
			</div>

		</div>
	</div>

</div>
