<?php
session_start();

// jika sudah login
if (isset($_SESSION['id_user'])) {
	echo "<script>
	alert('anda sudah login')
	window.location.href='../index.php'
	</scrip>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

	<title> R30 Store</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="../assets/css/style.css">




</head>

<!-- [ in ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<h1 style="font-family: fantasy; color:darkgoldenrod">R30 Store</h1>
		<!-- <img src="../assets/images/logo.png" alt="" class="img-fluid mb-4"> -->
		<div class="card borderless">
			<form action="proseslogin.php" method="post">
				<div class="row align-items-center ">
					<div class="col-md-12">
						<div class="card-body">
							<h4 class="mb-3 f-w-400">Signin</h4>
							<hr>
							<div class="form-group mb-3">
								<input type="text" class="form-control" id="Email" name="username" placeholder="id">
							</div>
							<div class="form-group mb-4">
								<input type="password" class="form-control" name="password" id="Password" placeholder="Password">
							</div>
							<div class="custom-control custom-checkbox text-left mb-4 mt-2">
								<input type="checkbox" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1">Save credentials.</label>
							</div>
							<button class="btn btn-block btn-primary mb-4" type="submit">Signin</button>
							<hr>
							<p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
							<p class="mb-0 text-muted">Don’t have an account? <a href="../signup/index.php" class="f-w-400">Signup</a></p>
							<p class="mb-0 text-muted">Menu Utama <a href="../../user/index.php" class="f-w-400">Lihat</a></p>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- [ in ] end -->

<!-- Required Js -->
<script src="../assets/js/vendor-all.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>

<script src="../assets/js/pcoded.min.js"></script>



</body>

</html>