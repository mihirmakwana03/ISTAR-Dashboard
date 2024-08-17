<?php
require "./PHP/connection.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	session_start();
	$_SESSION['id'] = $id;

	$sql = "SELECT * FROM data WHERE id = $id";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	} else {
		echo "No record found";
		exit();
	}
} else {
	echo "No ID provided";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Update record</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<meta content="Author" name="Yogesh Rana" name="Mihir Makwana">

	<!-- Favicons -->
	<link href="assets/img/istar.png" rel="icon">
	<link href="assets/img/istar.png" rel="apple-touch-icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<style>
		div.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

		}
	</style>

	<style>
		.table-responsive {
			overflow-x: auto;
		}

		th,
		td {
			white-space: nowrap;
			font-size: 15px;
			padding: 5px;
		}
	</style>

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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


	<link href="./CRUD-Bootstrapv5-JavaScript-Local-Storage-main/style.css" rel="stylesheet">

	<script>
		function getInstitutes(orgId) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("institute").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "get_institutes.php?orgId=" + orgId, true);
			xhttp.send();
		}
	</script>

	<!-- <link href="assets/css/bg.css" rel="stylesheet"> -->
	<!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">

		<div class="d-flex align-items-center justify-content-between">
			<a href="index.php" class="logo d-flex align-items-center">
				<img src="assets/img/istar.png" alt="">
				<span class="d-none d-lg-block">ISTAR Dashboard</span>
			</a>
			<i class="bi bi-list toggle-sidebar-btn"></i>
		</div><!-- End Logo -->



		<div class="search-bar">
			<form class="search-form d-flex align-items-center" method="POST" action="#">
				<input type="text" name="query" placeholder="Search" title="Enter search keyword">
				<button type="submit" title="Search"><i class="bi bi-search"></i></button>
			</form>
		</div>
		<!--End Search Bar -->

		<nav class="header-nav ms-auto">
			<ul class="d-flex align-items-center">

				<li class="nav-item d-block d-sm-none">
					<a class="nav-link nav-icon search-bar-toggle " href="#">
						<i class="bi bi-search"></i>
					</a>
				</li>
				<!-- End Search Icon -->

				<!-- CVMU logo
		 <div class="d-flex align-items-center px-5">
		  <img src="assets/img/istar.png" style="height: 7%;width:7%;" alt="">
		  <img src="assets/img/istar_2.png" style="height: 50%;width:50%;" alt="">
		  <img src="assets/img/cvm_logo.png" style="height: 7%;width:7%;" alt="">
		</div> -->


				<li class="nav-item dropdown">

					<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
						<i class="bi bi-bell"></i>
						<span class="badge bg-primary badge-number">4</span>
					</a><!-- End Notification Icon -->

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
						<li class="dropdown-header">
							You have 4 new notifications
							<a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li class="notification-item">
							<i class="bi bi-exclamation-circle text-warning"></i>
							<div>
								<h4>Lorem Ipsum</h4>
								<p>Quae dolorem earum veritatis oditseno</p>
								<p>30 min. ago</p>
							</div>
						</li>

						<li>
							<hr class="dropdown-divider">
						</li>

						<li class="notification-item">
							<i class="bi bi-x-circle text-danger"></i>
							<div>
								<h4>Atque rerum nesciunt</h4>
								<p>Quae dolorem earum veritatis oditseno</p>
								<p>1 hr. ago</p>
							</div>
						</li>

						<li>
							<hr class="dropdown-divider">
						</li>

						<li class="notification-item">
							<i class="bi bi-check-circle text-success"></i>
							<div>
								<h4>Sit rerum fuga</h4>
								<p>Quae dolorem earum veritatis oditseno</p>
								<p>2 hrs. ago</p>
							</div>
						</li>

						<li>
							<hr class="dropdown-divider">
						</li>

						<li class="notification-item">
							<i class="bi bi-info-circle text-primary"></i>
							<div>
								<h4>Dicta reprehenderit</h4>
								<p>Quae dolorem earum veritatis oditseno</p>
								<p>4 hrs. ago</p>
							</div>
						</li>

						<li>
							<hr class="dropdown-divider">
						</li>
						<li class="dropdown-footer">
							<a href="#">Show all notifications</a>
						</li>

					</ul><!-- End Notification Dropdown Items -->

				</li><!-- End Notification Nav -->

				<li class="nav-item dropdown">

					<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
						<i class="bi bi-chat-left-text"></i>
						<span class="badge bg-success badge-number">3</span>
					</a><!-- End Messages Icon -->

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
						<li class="dropdown-header">
							You have 3 new messages
							<a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li class="message-item">
							<a href="#">
								<img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
								<div>
									<h4>Maria Hudson</h4>
									<p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
									<p>4 hrs. ago</p>
								</div>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li class="message-item">
							<a href="#">
								<img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
								<div>
									<h4>Anna Nelson</h4>
									<p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
									<p>6 hrs. ago</p>
								</div>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li class="message-item">
							<a href="#">
								<img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
								<div>
									<h4>David Muldon</h4>
									<p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
									<p>8 hrs. ago</p>
								</div>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li class="dropdown-footer">
							<a href="#">Show all messages</a>
						</li>

					</ul><!-- End Messages Dropdown Items -->

				</li><!-- End Messages Nav -->

				<li class="nav-item dropdown pe-3">

					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<img src="assets/img/User.png" alt="Profile" class="rounded-circle">
						<span class="d-none d-md-block dropdown-toggle ps-2"><?php echo isset($username) ? $username : 'User'; ?></span>
					</a><!-- End Profile Iamge Icon -->

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<li class="dropdown-header">
							<h6><?php echo isset($username) ? $username : 'User'; ?></h6>
							<!-- <span>Full Stack Developer</span> -->
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="users-profile.php">
								<i class="bi bi-person"></i>
								<span>My Profile</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="reset-password.php">
								<i class="bi bi-key"></i>
								<span>Change Password</span>
							</a>
						</li>
						<!-- <li>
			  <hr class="dropdown-divider">
			</li>

			<li>
			  <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
				<i class="bi bi-question-circle"></i>
				<span>Need Help?</span>
			  </a>
			</li> -->
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="pages-login.php">
								<i class="bi bi-box-arrow-right"></i>
								<span>Sign Out</span>
							</a>
						</li>

					</ul><!-- End Profile Dropdown Items -->
				</li><!-- End Profile Nav -->

			</ul>
		</nav><!-- End Icons Navigation -->

	</header><!-- End Header -->

	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">

		<ul class="sidebar-nav" id="sidebar-nav">


			<li class="nav-item">
				<a class="nav-link collapsed" href="index.php">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li><!-- End Dashboard Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-menu-button-wide"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">


					<li>
						<a href="./cvm.php">
							<i class="bi bi-circle"></i><span>CVM</span>
						</a>
					</li>
					<li>
						<a href="./cvmu.php">
							<i class="bi bi-circle"></i><span>CVM University</span>
						</a>
					</li>
					<li>
						<a href="./agency.php">
							<i class="bi bi-circle"></i><span>Agency's</span>
						</a>
					</li>
				</ul>
			<li class="nav-item">
				<a class="nav-link " href="new_entry.php" class="active">
					<i class="bi bi-grid"></i>
					<span>New Entry</span>
				</a>
			</li>


			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-journal-text"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="./PHP/PDF.php">
							<i class="bi bi-circle"></i><span>PDF</span>
						</a>
					</li>
					<li>
						<a href="EXCEL.php">
							<i class="bi bi-circle"></i><span>Excel / CSV</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="bi bi-circle"></i><span>Image ( JPG / PNG / SVG )</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#files-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-journal-text"></i><span>File</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="files-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="#">
							<i class="bi bi-circle"></i><span>Import</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="bi bi-circle"></i><span>Export</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" href="email.php">
					<i class="bi bi-grid"></i>
					<span>E-mail</span>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#profile-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-journal-text"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="profile-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="#">
							<i class="bi bi-circle"></i><span>Admin</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="bi bi-circle"></i><span>User</span>
						</a>
					</li>
				</ul>
			</li>


			<li class="nav-item">
				<a class="nav-link collapsed" href="pages-contact.php">
					<i class="bi bi-envelope"></i>
					<span>Contact</span>
				</a>
			</li><!-- End Contact Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="pages-register.php">
					<i class="bi bi-card-list"></i>
					<span>Register</span>
				</a>
			</li><!-- End Register Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="pages-login.php">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>Login</span>
				</a>
			</li><!-- End Login Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>Change Password</span>
				</a>
			</li><!-- End Login Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>Lock Screen</span>
				</a>
			</li><!-- End Login Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>Setting</span>
				</a>
			</li><!-- End Login Page Nav -->

	</aside>


	</div>

	<?php

	require "./PHP/connection.php";
	// echo "<script>alert('$id');</script>";

	$sql = "SELECT * FROM data where id = $id";
	$result = $conn->query($sql);
	// $records = $result->num_rows;
	// echo $records;

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$date = $row["date"];
			$managed_by = $row["managed_by"];
			$institute_name = $row["institute_name"];
			$clg_out_no = $row["clg_out_no"];
			$clg_in_no = $row["clg_in_no"];
			$product_info = $row["product_info"];
			$description = $row["description"];
			$appr_by = $row["appr_by"];
			$appr_date = $row["appr_date"];
			$appr_amt = $row["appr_amt"];
			$agency = $row["agency"];
			$work_status = $row["work_status"];
			$bill_appr_date = $row["bill_appr_date"];
			$bill_amt = $row["bill_amt"];
		}
	} else {
		echo "<script>alert('No data available');</script>";
	}

	?>

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>Update Record</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active">Update Record</li>
				</ol>
			</nav>
		</div>

		<section class="section">
			<div class="row">
				<div class="col-lg-12">

					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Update the Form</h5>

							<!-- Horizontal Form -->
							<form name="update_entry" action="update_process.php" method="post">

								<?php

								include "./PHP/connection.php";

								$sql1 = "SELECT * FROM organizations";
								$result = $conn->query($sql1);

								?>
								<div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
									<div class="col-sm-10">
										<input type="date" class="form-control" id="inputText" name="date" value="<?php echo $date; ?>">
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-sm-2 col-form-label">Managed By</label>
									<div class="col-sm-10">
										<select class="form-select" aria-label="Default select example" name="managed_by" onchange="getInstitutes(this.value)">
											<option selected>Select any one</option>
											<?php
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
													echo '<option value="' . $row['name'] . '">' . $row["name"] . '</option>';
												}

												// if ($row['name'] == 1) {
												//     $managed_by = "CVM";
												// } else if ($row['name'] == 2) {
												//     $managed_by = "CVMU";
												// } else {
												//     $managed_by = "Invalid Organization";
												// }
											}
											?>
										</select>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-sm-2 col-form-label">Select School/College</label>
									<div class="col-sm-10">
										<select class="form-select" aria-label="Default select example" name="institute_name" id="institute">
											<option selected>Select any one</option>
										</select>
									</div>
								</div>

								<!-- <script>
									function getInstitutes(orgId) {
										fetch("get_institutes.php?orgId=" + orgId)
											.then(response => response.text())
											.then(data => {
												document.getElementById("institute").innerHTML = data;
											})
											.catch(error => {
												console.error('Error:', error);
											});
									}
								</script> -->



								<div class="row mb-3">
									<label for="inputText" class="col-sm-2 col-form-label">College Outward No</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="clg_out_no" value="<?php echo $clg_out_no; ?>">
									</div>
								</div>

								<div class="row mb-3">
									<label for="inputText" class="col-sm-2 col-form-label">College Inward No</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="clg_in_no" value="<?php echo $clg_in_no; ?>">
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-sm-2 col-form-label">Product Info</label>
									<div class="col-sm-10">
										<select class="form-select" aria-label="Default select example" name="product_info">
											<option <?php if ($product_info == "New Purchase") echo "selected"; ?> value="New Purchase">New Purchase</option>
											<option <?php if ($product_info == "Maintenance") echo "selected"; ?> value="Maintenance">Maintenance</option>
										</select>
									</div>
								</div>

								<div class="row mb-3">
									<label for="inputtextarea" class="col-sm-2 col-form-label">Description/Details</label>
									<div class="col-sm-10">
										<textarea class="form-control" style="height: 100px" name="description"><?php echo $description; ?></textarea>
									</div>
								</div>

								<!-- <?php
										$sql2 = "SELECT * FROM approved_by";
										$result = $conn->query($sql2);
										?> -->

								<div class="row mb-3">
									<label class="col-sm-2 col-form-label">Approved By</label>
									<div class="col-sm-10">
										<select class="form-select" aria-label="Default select example" name="appr_by">
											<!-- <option selected><?php echo $appr_by; ?></option> -->
											<option value="President" <?php echo ($appr_by == 'President') ? 'selected' : ''; ?>>President</option>
											<option value="Provost" <?php echo ($appr_by == 'Provost') ? 'selected' : ''; ?>>Provost</option>
											<option value="Registrar" <?php echo ($appr_by == 'Registrar') ? 'selected' : ''; ?>>Registrar</option>
											<option value="Deputy Registrar" <?php echo ($appr_by == 'Deputy Registrar') ? 'selected' : ''; ?>>Deputy Registrar</option>
											<option value="Registrar I/C" <?php echo ($appr_by == 'Registrar I/C') ? 'selected' : ''; ?>>Registrar I/C</option>
											<?php
											// if ($result->num_rows > 0) {
											// 	while ($row = $result->fetch_assoc()) {
											// 		echo '<option value="' . $row['App_name'] . '">' . $row["App_name"] . '</option>';
											// 	}
											// }
											?>
										</select>
									</div>
								</div>

								<div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Approval Date</label>
									<div class="col-sm-10">
										<input type="date" class="form-control" id="inputText" name="appr_date" value="<?php echo $appr_date; ?>">
									</div>
								</div>

								<div class="row mb-3">
									<label for="inputText" class="col-sm-2 col-form-label">Approval Amount</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="appr_amt" value="<?php echo $appr_amt; ?>">
									</div>
								</div>

								<?php
								$sql3 = "SELECT * FROM agencies";
								$result = $conn->query($sql3);
								?>

								<div class="row mb-3">
									<label class="col-sm-2 col-form-label">Select Agency</label>
									<div class="col-sm-10">
										<select class="form-select" aria-label="Default select example" name="agency">
											<option selected><?php echo $agency; ?></option>
											<?php
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
													echo '<option value="' . $row['agency_name'] . '">' . $row["agency_name"] . '</option>';
												}
											}
											?>
										</select>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-sm-2 col-form-label">Work Status</label>
									<div class="col-sm-10">
										<select class="form-select" aria-label="Default select example" name="work_status">
											<option <?php echo ($work_status == 'Done') ? 'selected' : ''; ?>>Done</option>
											<option <?php echo ($work_status == 'Pending') ? 'selected' : ''; ?>>Pending</option>

										</select>
									</div>
								</div>

								<div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Bill Approval Date</label>
									<div class="col-sm-10">
										<input type="date" class="form-control" id="inputText" name="bill_appr_date" value="<?php echo $bill_appr_date; ?>">
									</div>
								</div>

								<div class="row mb-3">
									<label for="inputText" class="col-sm-2 col-form-label">Bill Amount</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="bill_amt" value="<?php echo $bill_amt; ?>">
									</div>
								</div>


								<div class="text-center">
									<button type="submit" class="btn btn-outline-primary">Update</button>
									<button type="reset" class="btn btn-outline-secondary">Reset</button>
									<a href="new_entry.php" class="btn btn-outline-danger" role="button">Cancel</a>
								</div>
							</form><!-- End Horizontal Form -->

						</div>

					</div>

				</div>
			</div>
		</section>

		<style>
			#datatbl table tr td {
				vertical-align: middle;
			}

			td button {
				margin: 5px;
			}

			td button i {
				font-size: 20px;
			}

			td a {
				margin: 5px;
			}
		</style>
		<!-- <section>

			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive" id="table-container">

							Total Records:
							<table class="table table-hover mt-3 text-center table-bordered" id="datatbl"
								valign="center">
								<thead>
									<tr>
										<th>Date</th>
										<th>Managed By</th>
										<th>School/College</th>
										<th>College Outward No</th>
										<th>College Inward No</th>
										<th>Product Info</th>
										<th>Description/Details</th>
										<th>Approved By</th>
										<th>Approval Date</th>
										<th>Approval Amount</th>
										<th>Agency</th>
										<th>Work Status</th>
										<th>Bill Approval Date</th>
										<th>Bill Amount</th>
										<th>Document Type</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="data">
									<?php
									// Fetch data from the database and display it in the table
									// Replace the sample data with your actual database query
									require("./PHP/connection.php");

									$sql = "SELECT * FROM data";
									$result = $conn->query($sql);
									$records = $result->num_rows;
									echo $records;

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
											echo "<tr>";
											echo "<td>" . $row["date"] . "</td>";
											echo "<td>" . $row["managed_by"] . "</td>";
											echo "<td>" . $row["institute_name"] . "</td>";
											echo "<td>" . $row["clg_out_no"] . "</td>";
											echo "<td>" . $row["clg_in_no"] . "</td>";
											echo "<td>" . $row["product_info"] . "</td>";
											echo "<td>" . $row["description"] . "</td>";
											echo "<td>" . $row["appr_by"] . "</td>";
											echo "<td>" . $row["appr_date"] . "</td>";
											echo "<td>" . $row["appr_amt"] . "</td>";
											echo "<td>" . $row["agency"] . "</td>";
											echo "<td>" . $row["work_status"] . "</td>";
											echo "<td>" . $row["bill_appr_date"] . "</td>";
											echo "<td>" . $row["bill_amt"] . "</td>";
											echo "<td>";
											// echo "<a href='#' class='btn btn-outline-danger' role='button' style='height: 30px;font-size: 10px;'>PDF</a>";
											$pdfLink = "generate_pdf.php?id=" . $row["id"];
											echo "<a href='$pdfLink' class='btn btn-outline-danger' role='button' style='height: 30px;font-size: 10px;'>PDF</a>";
											// echo "<a href='#' class='btn btn-outline-success' role='button' style='height: 30px;font-size: 10px;'>EXCEL/CSV</a>";
											$excel = "export.php?id=" . $row["id"];
											echo "<a href='$excel' class='btn btn-outline-success' role='button' style='height: 30px;font-size: 10px;'>EXCEL/CSV</a>";
											echo "<a href='#' class='btn btn-outline-info' role='button' style='height: 30px;font-size: 10px;'>IMAGES</a>";
											echo "</td>";
											echo "<td>";
											echo "<button class='btn btn-success'><i class='bi bi-eye'></i></button>";
											$update = "update_record.php?id=" . $row["id"];
											echo "<a href='$update' class='btn btn-info'><i class='bi bi-pencil-square'></i></a>";
											$delete = "delete_record.php?id=" . $row["id"];
											echo "<a href='$delete' class='btn btn-danger'><i class='bi bi-trash'></i></a>";
											echo "</td>";
											echo "</tr>";
										}
									} else {
										echo "<tr><td colspan='16'>No data available</td></tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</section> -->

		<!-- <div class="card info-card sales-card">
			<div class="container mt-1 pt-1">
				<marquee direction="left">

					<i class="bi bi-emoji-frown-fill text-danger me-1"></i>

					<span class="text-danger large pt-1 fw-bold">The Data is too large, so Fixed the Table & its
						Information for better viewing !......</span>
				</marquee>
			</div>
		</div> -->
		<style>
                            #filter {
                                
                                /*border-width: 2px;*/
                                border-style: groove;
                                border-color: #4154f1;
                                border-radius: 10px;
                                
                            }

                           
                        </style>
		<div class="row mt-3">
			<div class="col-lg-12">
				<div class="card" id="filter">
					<div class="card-body mt-3">
						<div class="text-center">
							<h4>Click here for filter the page by Work Status </h4>
							<div class="col-sm-4-center">
								<a href="filters.php" target="_blank" class="btn btn-primary" role="button">Go To Filters Page</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<?php
	$sql7 = "";

	if (isset($_POST['submit']) || $_SERVER["REQUEST_METHOD"] == "POST") {

		$date = isset($_POST['date']) ? $_POST['date'] : '';
		$managedBy = isset($_POST['managed_by']) ? $_POST['managed_by'] : '';
		$institute = isset($_POST['institute']) ? $_POST['institute'] : '';
		$clgOutNo = isset($_POST['clg_out_no']) ? $_POST['clg_out_no'] : '';
		$clgInNo = isset($_POST['clg_in_no']) ? $_POST['clg_in_no'] : '';
		$productInfo = isset($_POST['product_info']) ? $_POST['product_info'] : '';
		$description = isset($_POST['description']) ? $_POST['description'] : '';
		$approvedBy = isset($_POST['appr_by']) ? $_POST['appr_by'] : '';
		$apprDate = isset($_POST['appr_date']) ? $_POST['appr_date'] : '';
		$apprAmount = isset($_POST['appr_amt']) ? $_POST['appr_amt'] : '';
		$agency = isset($_POST['agency']) ? $_POST['agency'] : '';
		$workStatus = isset($_POST['work_status']) ? $_POST['work_status'] : '';
		$billApprDate = isset($_POST['bill_appr_date']) ? $_POST['bill_appr_date'] : '';
		$billAmount = isset($_POST['bill_amt']) ? $_POST['bill_amt'] : '';


		$sql7 = "INSERT INTO data (date, managed_by, institute_name, clg_out_no, clg_in_no, product_info, description, appr_by, appr_date, appr_amt, agency, work_status, bill_appr_date, bill_amt) 
                                                            VALUES ('$date', '$managedBy', '$institute' ,'$clgOutNo', '$clgInNo', '$productInfo', '$description', '$approvedBy', '$apprDate', '$apprAmount', '$agency', '$workStatus', '$billApprDate', '$billAmount')";


		if ($conn->query($sql7) === TRUE) {
			echo '<script>alert("New record inserted successfully");</script>';
		} else {
			echo "Error: " . $sql7 . "<br>" . $conn->error;
		}
	}


	$conn->close();
	?>


	<!-- ======= Footer ======= -->
	<footer id="footer" class="footer">
		<div class="copyright">
			&copy; Copyright <strong><span>ISTAR - 2024</span></strong>. All Rights Reserved
		</div>
		<div class="credits">
			<!-- All the links in the footer should remain intact. -->
			<!-- You can delete the links only if you purchased the pro version. -->
			<!-- Licensing information: https://bootstrapmade.com/license/ -->
			<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
			<h6>Designed & Developed by <a href="#">Yogesh Rana</a> & <a href="#"> Mihir Makwana </a></h6>

		</div>
		<div class="copyright">
			<strong><span>Version - 0.1 (Beta) </span></strong>
		</div>

	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<script>
		document.getElementById('table-container').addEventListener('wheel', function(event) {
			if (event.deltaY !== 0) {
				event.preventDefault();
				this.scrollLeft += event.deltaY;
			}
		});
	</script>

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
	<script src="assets/js/app.js"></script>
</body>

</html>