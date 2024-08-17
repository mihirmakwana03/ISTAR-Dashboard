<?php

require "./PHP/connection.php";
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: pages-login.php");
	exit();
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['old_password']) && isset($_POST['new_password'])) {
		$oldPassword = $_POST['old_password'];
		$newPassword = $_POST['new_password'];

		$sql = "SELECT password FROM users WHERE username = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$hashedPassword = $row['password'];

			$db_pwd = password_verify($oldPassword, $hashedPassword);

			if ($db_pwd == $oldPassword) {
				
				$sql = "UPDATE users SET password = ? WHERE username = ?";
				$stmt = $conn->prepare($sql);
				$newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
				$stmt->bind_param("ss", $newHashedPassword, $username);
				$stmt->execute();
				$stmt->close();

				// Redirect to a success page
				echo "<script>alert('Password changed successfully!');</script>";
				header("Location: index.php");
				exit();
			}
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Reset Password</title>
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
</head>

<body>
	<main>
		<div class="container">
			<section
				class="section reset-password min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
							<div class="d-flex justify-content-center py-4">
								<a href="index.php" class="logo d-flex align-items-center w-auto">
								<img src="assets/img/istar.png" alt="">
								<span class="d-none d-lg-block">ISTAR USER</span>
								</a>
							</div><!-- End Logo -->
							<div class="card mb-3">
								<div class="card-body">
									<div class="pt-4 pb-2">
										<h5 class="card-title text-center pb-0 fs-4">Change Password</h5>
										<p class="text-center small">Enter your username and new password</p>
									</div>
									<form method="POST" action="" class="row g-3 needs-validation" validate>
										<div class="col-12">
											<label for="username">Username:</label>
											<input type="text" name="username" class="form-control" id="username"
												required value="<?php echo $username; ?>" readonly>
											<div class="invalid-feedback">Please enter your username.</div>
										</div>
										<div class="col-12">
											<label for="old_password">Old Password:</label>
											<input type="password" name="old_password" id="old_password"
												class="form-control" required>
											<div class="invalid-feedback">Please enter your old password.</div>
										</div>
										<div class="col-12">
											<label for="new_password">New Password:</label>
											<input type="password" name="new_password" id="new_password"
												class="form-control" required>
											<div class="invalid-feedback">Please enter your new password.</div>
										</div>
										<div class="col-12">
											<input type="submit" value="Change Password" class="btn btn-primary w-100">
											<a href="./pages-login.php"><input type="button" value="Back" class="btn btn-primary w-100 mt-3"></a>
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