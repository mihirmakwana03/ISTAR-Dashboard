<?php
session_start();
require "./PHP/connection.php";

if (!isset($_SESSION['username'])) {
	header("Location: pages-login.php");
	exit();
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
	$user = $result->fetch_assoc();
} else {
	echo "User not found";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>ISTAR User Profile</title>
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

	<!-- =======================================================
	* Template Name: NiceAdmin
	* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
	* Updated: Apr 20 2024 with Bootstrap v5.3.3
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
</head>

<body>

	<main>
		<div class="container">

			<section
				class="section profile min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 d-flex flex-column align-items-center justify-content-center">

							<div class="d-flex justify-content-center py-4">
								<a href="index.php" class="logo d-flex align-items-center w-auto">
									<img src="assets/img/istar.png" alt="">
									<span class="d-none d-lg-block">ISTAR DASHBOARD</span>
								</a>
							</div><!-- End Logo -->

							<div class="card mb-3">

								<div class="card-body">

									<div class="pt-4 pb-2">
										<h5 class="card-title text-center pb-0 fs-4">User Profile</h5>
										<p class="text-center small">View your account details</p>
									</div>

									<form class="row g-3 needs-validation" novalidate>
										<div class="col-12">
											<label for="profileUsername" class="form-label">Username</label>
											<input type="text" name="username" class="form-control" id="profileUsername"
												value="<?php echo $user['username']; ?>" readonly>
										</div>

										<div class="col-12">
											<label for="profileEmail" class="form-label">Email</label>
											<input type="email" name="email" class="form-control" id="profileEmail"
												value="<?php echo $user['email']; ?>" readonly>
										</div>

										<div class="col-12">
											<label for="profileFullName" class="form-label">Full Name</label>
											<input type="text" name="fullName" class="form-control" id="profileFullName"
												value="<?php echo $user['name']; ?>" readonly>
										</div>
									</form>

								</div>
							</div>

							<div class="text-center mt-4">
								<a href="reset-password.php" class="btn btn-primary">Change Password</a>
								<a href="index.php" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
				</div>

			</section>

		</div>
	</main><!-- End #main -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
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

</body>

</html>