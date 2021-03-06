<!DOCTYPE HTML>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('public/css/admin-style-login.css'); ?>">
		<title>Login to Admin Eventfinder</title>
		<script src="<?php echo base_url('public/js/azcomponent/webcomponentsjs/webcomponents.js'); ?>"></script>
		<link rel="import" href="<?php echo base_url('public/js/azcomponent/az-ui.html'); ?>">
		<link rel="import" href="<?php echo base_url('public/js/azcomponent/az-ajax.html'); ?>">
	</head>

	<body>
		<header class="page-header">
			<a href="#">
				<az-button class="button left-arrow-icon image-left" name="return" width="145px" height="38px" color="#3f4551"> Return to website </az-button>
			</a>
		</header>

		<section class="main">
			<div class="page-title">
				<div class="login-icon image-left title">
					<div class="middle">
						<h3> LOGIN TO ADMIN </h3>
						<h6> Enter you credentials below </h6>
					</div>
				</div>
			</div>

			<div class="main content">

				<div class="box-form center fit-content">
					<form is='az-form'
						method="post"
						action="<?php echo site_url('/admin/login/doLogin'); ?>"
						success="<?php echo site_url('/admin'); ?>"
						callback-type="modal-box"
						name="coba"
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

				<div class="box-message" id="box-message">
					Just click on the "LOGIN" button to continue, no login information required.
				</div>

			</div>
		</section>

		<footer>
			<p>© Copyright 2015 design by <a href="#">Eventfinder</a>. All rights reserved.</p>
		</footer>

	</body>
</html>
