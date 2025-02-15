<?php

session_start();
require "./PHP/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT password FROM admin WHERE username = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->bind_result($stored_password);
	$stmt->fetch();
	$stmt->close();

	if (password_verify($password, $stored_password)) {
		$_SESSION['username'] = $username;
		header("Location: index.php");
		exit();
	} else {
		$error = "Invalid username or password.";
	}

	$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Admin Login</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<meta content="Author" name="Yogesh Rana" name="Mihir Makwana">

	<!-- Favicons -->
	<link href="assets/img/istar.png" rel="icon">
	<link href="assets/img/istar.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/chart.js/chart.umd.js"></script>
	<script src="assets/vendor/echarts/echarts.min.js"></script>
	<script src="assets/vendor/quill/quill.js"></script>
	<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
	<script src="assets/vendor/tinymce/tinymce.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
</head>

<body>

	<main>
		<div class="container">

			<section
				class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

							<div class="d-flex justify-content-center py-4">
								<a href="index.php" class="logo d-flex align-items-center w-auto">
								<img src="assets/img/istar.png" alt="">
									<span class="d-none d-lg-block">Admin Login</span>
								</a>
							</div><!-- End Logo -->

							<div class="card mb-3">

								<div class="card-body">

									<div class="pt-4 pb-2">
										<h5 class="card-title text-center pb-0 fs-4">Login to Admin Account</h5>
										<p class="text-center small">Enter your username & password to login</p>
									</div>

									<?php if (isset($error)): ?>
										<div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
									<?php endif; ?>

									<form name="login" method="POST" action="admin-login.php" class="row g-3 needs-validation"
										novalidate>

										<div class="col-12">
											<label for="yourUsername" class="form-label">Username</label>
											<div class="input-group has-validation">
												<input type="text" name="username" class="form-control"
													id="yourUsername" required>
												<div class="invalid-feedback">Please enter your username.</div>
											</div>
										</div>

										<div class="col-12">
											<label for="yourPassword" class="form-label">Password</label>
											<input type="password" name="password" class="form-control"
												id="yourPassword" required>
											<div class="invalid-feedback">Please enter your password!</div>
										</div>

										<div class="col-12">
											<button class="btn btn-primary w-100" type="submit">Login</button>
										</div>
										<div class="col-12" align="center">
											<p class="small mb-0">Don't have account? <a href="./admin-register.php">Create an
													account</a></p>
											<p class="small mb-0"><a href="forgot-password.php">Forgot Password?</a></p>
										</div>
									</form>

								</div>
							</div>

							<div class="credits align-items-center justify-content-center" align="center">
								Designed & Developed by <a href="#">Yogesh Rana</a> & <a href="#"> Mihir Makwana </a>
								</h6>
							</div>
						</div>
					</div>

			</section>

		</div>
	</main><!-- End #main -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>

</body>

</html>