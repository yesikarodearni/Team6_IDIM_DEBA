<?php
session_start();
if (isset($_SESSION['id'])) {
	header('location:dashboard.php');
}
?>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="center">
		<div class="login_left">
			<img src="img/logo.png">
		</div>
		<div class="login_right">
			<form action="login_process.php" name="login" method="post">
				<h2 class="title">Welcome</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Id Pengguna</h5>
						<input type="text" name="idpengguna" class="input">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" name="password" class="input">
					</div>
				</div>
				<input type="submit" class="btn" value="Login">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/login.js"></script>
</body>

</html>