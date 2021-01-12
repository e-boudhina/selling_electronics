<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Shop Homepage - Start Bootstrap Template</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url().'/assets/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">

	<!--	font awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url(); ?>/assets/css/shop-homepage.css" rel="stylesheet">

</head>
<body style="padding-bottom: 200px">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="<?php echo site_url('home');?>">Trusted Components</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo site_url('home');?>">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo site_url('customer/orders');?>" class="btn btn-info btn-sm btn-lg">
						<span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
					</a>
				</li>

				<?php if (!$this->session->userdata('logged_in')) {?>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li>


				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('login');?>">Log In</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('register');?>">Register</a>
				</li><?php }else{?>
					<li class="nav-item">
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $this->session->userdata('u_name')?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<!--							<a class="dropdown-item" href="--><?php //echo site_url('products');?><!--">Profile</a> Not now-->

							<a class="dropdown-item" href="<?php echo site_url('user/dashboard');?>">Dashboard</a>

							<a class="dropdown-item" href="<?php echo site_url('user/profile/'.$this->session->userdata('u_id'));?>">My profile</a>

							<?php if ($this->session->userdata('u_admin')) {?>

								<a class="dropdown-item" href="<?php echo site_url('products');?>">Manage Products</a>

							<?php  }?>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo site_url('logout');?>">Logout</a>
						</div>
					</li>




				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
