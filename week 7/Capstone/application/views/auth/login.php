<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Organice Shop</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../stylesheets/auth/auth.css">
	</head>
	<body id="auth-container" class="border">
		<form action="/auth/login" method="POST" id="login-form">
			<?= $this->session->flashdata('error'); ?>
			<div class="border p-5 border-top-0 border-start-0 border-end-0">
				<img src="../../assets/images/organic_shop_logo.svg" class="mb-3">
				<div class="d-flex justify-content-between gap-5" class="mb-3">
					<p>Login to order.</p>
					<a href="/auth/render_signup">New Member? Register here.</a>
				</div>
				<div class="form-floating mb-3">
					<input type="text" name="email" id="email-login" class="form-control" placeholder="Email"></textarea>
					<label for="email-login">Email</label>
				</div>
				<div class="form-floating mb-3">
					<input value="123123123" type="password" name="password" id="password-login" class="form-control" placeholder="Password"></textarea>
					<label for="password-login">Password</label>
				</div>
			</div>
			<div class="p-5 mb-3">
				<input type="submit" value="Login" class="btn btn-primary">
			</div>
		</form>
		<img src="../../assets/images/vegetable_bg.png" id="vege-bg">
	</body>
</html>