<?php
require "./PHP/connection.php";
require "./PHP/session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>New Entry CVM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta content="Author" name="Yogesh Rana" name="Mihir Makwana">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Favicons -->
  <link href="assets/img/istar.png" rel="icon">
  <link href="assets/img/istar.png" rel="apple-touch-icon">

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

  <!-- <link href="assets/css/bg.css" rel="stylesheet"> -->
  <!-- =======================================================
  * Template Name: ISTAR Admin
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: Yogesh Rana & Mihir Makwana
  ======================================================== -->
</head>

<body>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
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
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php echo isset($username) ? $username : 'User'; ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
                <?php echo isset($username) ? $username : 'User'; ?></h6>
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
              <a class="dropdown-item d-flex align-items-center" href="./pages-login.php">
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
                <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="./cvm.php" class="active">
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
        <a class="nav-link collapsed" href="email.php">
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
            <h1>CVM (School/College/Institute's) </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Data</li>
                    <li class="breadcrumb-item"><a href="cvm.php" class="active">CVM</a></li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <?php

            require("./PHP/connection.php");

            $sql = "SELECT * FROM institutes where organization_id=1";
            $result = $conn->query($sql);
            $records = $result->num_rows;

            ?>

            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->

                        <style>
                            #date {
                                background-color: #a7f0ff;
                                /*border-width: 2px;*/
                                border-style: groove;
                                border-color: #4154f1;
                                border-radius: 10px;
                                
                            }

                           
                        </style>
                        <div class="col-xxl-3 col-md-6">
                            <div id="date" class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Institute's Under CVM</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-weight:bolder">
                                            <?php echo $records; ?>
                                        </div>
                                        <div class="ps-3">
                                            <h6 id="cntmonthDisplay"></h6>

                                            <span class="text-success small pt-1 fw-bold" style="font-size: 120%;">Total Institute's</span>
                                            <span id="dateDisplay" class="text-success small pt-2 ps-1 fw-bold" style="font-size: 90%;"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->
        </section>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New School/College/Institute</h5>

                            <!-- Horizontal Form -->
                            <form action="cvm.php" method="post"  validate>
                                <div class="row mb-3">
                                    <label for="inputtext" class="col-sm-2 col-form-label">Enter the Name </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" required id="inputText" name="name" required>
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-primary">Add</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    <a href="index.php" class="btn btn-outline-danger" role="button">Cancel</a>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>

                    </div>

                </div>
            </div>
        </section>

        <?php

        include "./PHP/connection.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            

            $sql = "INSERT INTO institutes (name, organization_id, organization_name) VALUES ('$name', 1, 'CVM')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New record created successfully');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        ?>

        <style>
            #datatbl table tr td {
                vertical-align: middle;
            }

            td button {
                margin: 5px;
                height: 35px
            }

            td button i {
                font-size: 15px;

            }

            td a {
                margin: 5px;
            }
        </style>
        <section>



            <div class="row">
                <div class="col-sm-12">

                    <table class="table  table-hover mt-3 text-center table-bordered" id="datatbl" style="font-size: 15px;">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                                <th>Download</th>
                            </tr>
                        </thead>

                        <tbody id="data">
                            <?php

                            include "./PHP/connection.php";

                            $sql = "SELECT * FROM institutes where organization_id=1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $delete = "delete_cvm.php?id=" . $row["id"];
                                    echo "<tr>
                                        <td width='2%'>" . $row["id"] . "</td>
                                        <td width='20%'>" . $row["name"] . "</td>
                                        <td width='2%'>" . $row["created_at"] . "</td>
                                        <td width='2%'>
                                            
                                            
                                            <a href='$delete' class='btn btn-danger'><i class='bi bi-trash'></i></a>
                                        </td>
                                        <td width='5%'>
                                            <a href='#' class='btn btn-outline-danger' role='button' style='height: 30px;font-size: 12px;'>PDF</a>
                                            <a href='#' class='btn btn-outline-success' role='button' style='height: 30px;font-size: 12px;'>EXCEL</a>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "No data found.";
                            }


                          

                            // function deleteRow($id)
                            // {
                            //     include "./PHP/connection.php";

                                
                            //     $sql = "DELETE FROM institutes WHERE id = $row[id]";

                            //     if ($conn->query($sql) === TRUE) {
                            //         echo "<script>alert('Record deleted successfully');</script>";
                            //     } else {
                            //         echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
                            //     }

                            //     $conn->close();
                            // }

                            // if (isset($_GET['function']) && $_GET['function'] == 'deleteData' && isset($_GET['id'])) {
                            //     $id = $_GET['id'];
                            //     deleteRow($id);
                            // }


                            ?>

                           
                            <script>
                            //     editRow = (id) => {
                            //         alert(id);
                            //     }

                            //     function deleteRow(id) {
                            //         fetch(`cvm.php?function=deleteData&id=${id}`)
                            //             .then(response => response.text())
                            //             .catch(error => console.error('Error:', error));
                            //     }
                            // </script>
                    </table>
                </div>
            </div>


        </section>


    </main>

   <?php require "./PHP/footer.php" ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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