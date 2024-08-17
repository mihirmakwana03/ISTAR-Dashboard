<?php
require "./PHP/connection.php";
require "./PHP/session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Send Email</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<meta content="Author" name="Yogesh Rana" name="Mihir Makwana">

	<!-- Favicons -->
	<link href="assets/img/istar.png" rel="icon">
	<link href="assets/img/istar.png" rel="apple-touch-icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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


	<link href="./CRUD-Bootstrapv5-JavaScript-Local-Storage-main/style.css" rel="stylesheet">

	<script>
		function getInstitutes(orgId) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("institute").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "get_institutes.php?orgId=" + orgId, true);
			xhttp.send();
		}
	</script>

	<script>
		function getemails(insName) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("emails").value = this.responseText;
					document.getElementById("submitBtn").setAttribute("href", "mailto:" + this.responseText);
				}
			};
			xhttp.open("GET", "get_emails.php?insName=" + encodeURIComponent(insName), true);
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
      <i class="bi bi-house-door"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#data-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="data-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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
        <a class="nav-link collapsed" href="new_entry.php">
          <i class="bi bi-plus-square"></i>
          <span>New Entry</span>
        </a>
      </li>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-graph-up"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="PDF.php">
          <i class="bi bi-circle"></i><span>PDF</span>
        </a>
      </li>
      <li>
        <a href="EXCEL.php">
          <i class="bi bi-circle"></i><span>Excel / CSV</span>
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
    <a class="nav-link" class="active" href="email.php">
    <i class="bi bi-envelope-at"></i>
      <span>E-mail</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#profile-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-circle"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="profile-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="admin-register.php">
          <i class="bi bi-circle"></i><span>Admin</span>
        </a>
      </li>
      <li>
        <a href="pages-login.php">
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
      <i class="bi bi-person-plus"></i>
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
    <a class="nav-link collapsed" href="./reset-password.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Change Password</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#">
      <i class="bi bi-lock"></i>
      <span>Lock Screen</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#">
      <i class="bi bi-gear"></i>
      <span>Setting</span>
    </a>
  </li><!-- End Login Page Nav -->

</aside>


	</div>

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>E-mail</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active">E-mail</li>
				</ol>
			</nav>
		</div>

		<section class="section">
			<div class="row">
				<div class="col-lg-12">

					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Fill the Form</h5>

							<!-- Horizontal Form -->
							<form name="new_entry" action="#" method="post">

								<?php

								include "./PHP/connection.php";

								$sql1 = "SELECT * FROM organizations";
								$result = $conn->query($sql1);

								?>
								<!-- <div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
									<div class="col-sm-10">
										<input type="date" class="form-control" id="inputText" name="date">
									</div>
								</div> -->

								<div class="row mb-3">
									<label class="col-sm-2 col-form-label">Managed By</label>
									<div class="col-sm-10">
										<select class="form-select" aria-label="Default select example"
											name="managed_by" onchange="getInstitutes(this.value)">
											<option selected>Select any one</option>
											<?php
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
													echo '<option value="' . $row['name'] . '">' . $row["name"] . '</option>';
												}
											}
											?>
										</select>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-sm-2 col-form-label">Select School/College</label>
									<div class="col-sm-10">
										<select class="form-select" aria-label="Default select example" name="institute"
											id="institute" onchange="getemails(this.value)">
											<option selected>Select any one</option>
										</select>
									</div>
								</div>

								<script>
									document.getElementById('institute').addEventListener('wheel', function (event) {
										event.preventDefault();
										var selectElement = this;
										if (event.deltaY < 0) {
											// Scroll up
											if (selectElement.selectedIndex > 0) {
												selectElement.selectedIndex--;
											}
										} else {
											// Scroll down
											if (selectElement.selectedIndex < selectElement.options.length - 1) {
												selectElement.selectedIndex++;
											}
										}
										selectElement.dispatchEvent(new Event('change'));
									});
								</script>


								<div class="row mb-3">
									<label class="col-sm-2 col-form-label">School/College Email's</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="emails" id="emails"
											maxlength="255">
									</div>
								</div>


								<div class="text-center">
									<a class="btn btn-outline-primary" id="submitBtn" target="_blank">Send E-MAIL</a>
									<button type="reset" class="btn btn-outline-secondary">Reset</button>
									<!-- <a href="#" class="btn btn-outline-danger" role="button">Cancel</a> -->
								</div>
								<!-- <script>
									document.querySelector("#emails").addEventListener("change", function() {
										var dis = document.querySelector("#emails").value;
										if (dis == "No emails found") {
											document.getElementById("submitBtn").disabled = true;
										} else {
											document.getElementById("submitBtn").disabled = false;
										}
									});
								</script> -->
							</form>
							<!-- End Horizontal Form -->

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


		
	</main>

	
	<?php require "./PHP/footer.php" ?>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>

	<script>
		document.getElementById('table-container').addEventListener('wheel', function (event) {
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