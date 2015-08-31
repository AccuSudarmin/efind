<!DOCTYPE HTML>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('public/css/admin-style.css'); ?>">
		<title>Login to Admin Eventfinder</title>
		<link rel="stylesheet" href="<?php echo base_url('public/css/hiccup.css'); ?>">
		<script src="http://localhost/webcomponent/lib/azcomponent/webcomponentsjs/webcomponents.js"></script>
      <link rel="import" href="http://localhost/webcomponent/lib/azcomponent/az-ui.html">
	</head>

	<body>
		<header class="page-header">
			<nav class="navbar">
				<ul>
					<li>
						<a href="#" class="button left-arrow-icon image-left">Return to website</a>
					</li>
				</ul>
			</nav>
		</header>

		<section class="page-title">
			<div class="login-icon image-left title">
				<div class="middle">
					<h3> LOGIN TO ADMIN </h3>
					<h6> Enter you credentials below </h6>
				</div>
			</div>
		</section>

		<section class="content">

			<div class="box-form center fit-content">
				<form
					method="post"
					fm-controller="login"
					fm-target="<?php echo site_url('/admin/login/doLogin'); ?>"
					fm-success="<?php echo site_url('/admin'); ?>"
					>
					<p>
						<az-input type="text" placeholder="Username" name="name" width= "250px" color="#2069b4"></az-input>
					</p>
					<p>
						<az-input type="password" placeholder="Password" name="pass" width= "250px" color="#2069b4"></az-input>
					</p>
					<p>
						<az-button name="login" width="250px" color="#2069b4"> LOGIN </az-button>
					</p>
				</form>
			</div>

			<div class="box-message">
				Just click on the "LOGIN" button to continue, no login information required.
			</div>

		</section>

		<footer>
			<p>© Copyright 2015 design by <a href="#">Eventfinder</a>. All rights reserved.</p>
		</footer>

	</body>
	<script src="<?php echo base_url('public/js/hiccup.js'); ?>" charset="utf-8"></script>
</html>
