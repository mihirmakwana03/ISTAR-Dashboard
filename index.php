<?php
require "./PHP/connection.php";
require "./PHP/session.php";
?>

<?php
// Check if modal has been shown
$showModal = false;
if (!isset($_SESSION['modal_shown']) || $_SESSION['modal_shown'] === false) {
    $_SESSION['modal_shown'] = true; // Mark modal as shown
    $showModal = true; // Set flag to show modal
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ISTAR DASHBOARD</title>
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

<style>
        .modal-content {
            background-color: #fff8e1;
            border-radius: 30px;
            border: none;
            
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2), 0 0 10px rgba(65, 84, 241, 1);
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-body {
            text-align: center;
            font-size: 1.1em;
        }
        .close {
            color: #6c757d;
        }
        .modal-title {
            font-weight: bold;
            color: #4154f1;
        }
    </style>
 <!-- Bootstrap Modal -->
 <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcomeModalLabel">Welcome  <?php echo isset($username) ? $username : 'User'; ?>!</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                        <span aria-hidden="true">&times;</span> 
                    </button> -->
                </div>
                <div class="modal-body">
                    <p>Thank you for visiting our Dashboard. Enjoy your stay!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom Script to Auto-Close Modal -->
    <script>
    $(document).ready(function() {
        // Show the modal only if the flag is set
        <?php if ($showModal): ?>
            var myModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
            myModal.show();

            // Automatically close the modal after 3 seconds
            setTimeout(function() {
                myModal.hide();
            }, 3000);
        <?php endif; ?>
    });
</script>
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
        <a class="nav-link" href="index.php">
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

   
    <section>
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-12 col-md-6">
              <div id="marquee-container" class="card info-card sales-card">
                <div class="container mt-1 pt-1 ">
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                    <i class="bi bi-emoji-smile text-primary me-1"></i>

                    <span class="text-primary large pt-2 fw-bold">Hey ! Welcome to My Dashboard Get Connected & Stay
                      Updated !......</span>
                  </marquee>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->

            <style>
              #date {
                background-color: #a7f0ff;
                height: 86%;
              }
            </style>
            <div class="col-xxl-3 col-md-6">
              <div id="date" class="card info-card sales-card">

                <!-- <div  class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Date & Day <span>| India</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="cntmonthDisplay"></h6>

                      <span class="text-success small pt-1 fw-bold" style="font-size: 90%;">Today is</span>
                      <span id="dateDisplay" class="text-success small pt-2 ps-1 fw-bold" style="font-size: 90%;"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <script>
              function displayDate() {
                // Array of days
                const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

                // Getting current date
                const currentDate = new Date();

                // Getting day of the week
                const dayOfWeek = days[currentDate.getDay()];

                // Getting date
                const date = currentDate.getDate();

                // Getting month
                const month = currentDate.getMonth() + 1; // Months are zero-indexed

                // Getting year
                const year = currentDate.getFullYear();

                // Displaying in the div
                document.getElementById("dateDisplay").innerHTML = dayOfWeek;
                document.getElementById("cntmonthDisplay").innerHTML = date + "/" + month + "/" + year;
              }

              // Call the function to display the date when the page loads
              displayDate();
            </script>


            <!-- Revenue Card -->
            <style>
              #animation {
                width: 100%;
                height: 100%;
                transition: all 0.5s ease;
                /* Apply transition to all properties */
                transform: scale(1.025);
                /* Initial size */
              }

              #animation:hover {

                transform: scale(1.05);
                /* Scale up on hover */
              }

              #animation {
                background: linear-gradient(-45deg, #ff906e, #ff6ea6, #74d9fee0, #23d5ab);
                background-size: 100% 100%;
                animation: gradient 8s ease infinite;
              }

              @keyframes gradient {
                0% {
                  background-position: 0% 50%;
                }

                50% {
                  background-position: 100% 50%;
                }

                100% {
                  background-position: 0% 50%;
                }
              }

              #animation {
                width: 100%;
                height: 85%;
              }

              #animation {
                background: linear-gradient(-45deg, #f6baa8, #e9a0bc, #95e0fb, #97f8e2, #f4f66b, #33f9aa);
                background-size: 400% 400%;
                animation: gradient 8s ease infinite;
              }

              @keyframes gradient {
                0% {
                  background-position: 0% 50%;
                }

                50% {
                  background-position: 100% 50%;
                }

                100% {
                  background-position: 0% 50%;
                }
              }
            </style>
            <div class="col-xxl-6 col-md-6">
              <div id="animation" class="card info-card revenue-card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Hello ! Welcome to Our Dashboard</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bell"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Get in Touch</h6>
                      <span class="text-success small pt-1 fw-bold">Stay Updated !</span> <span class="text-muted small pt-2 ps-1">Get Information in single click</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <style>
              #time {
                background-color: #a7f0ff;
                height: 85%;
              }
            </style>
            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">

              <div id="time" class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Current Time <span>| India</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-time-line"></i>
                    </div>
                    <div class="ps-3">
                      <span class="text-danger small pt-1 fw-bold">Time is</span> <span class="text-muted small pt-2 ps-1">(IST)</span>
                      <p id="currentTime" class="text-success fw-bold" style="font-size: 130%;"></p>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          </div>

          <script>
            function displayCurrentTime() {
              // Get current date and time
              var now = new Date();

              // Format the time
              var hours = now.getHours();
              var minutes = now.getMinutes();
              var seconds = now.getSeconds();
              var meridian = hours >= 12 ? 'PM' : 'AM';
              hours = hours % 12;
              hours = hours ? hours : 12; // Convert 0 to 12
              minutes = minutes < 10 ? '0' + minutes : minutes;
              seconds = seconds < 10 ? '0' + seconds : seconds;

              // Construct the time string
              var currentTimeString = hours + ':' + minutes + ':' + seconds + ' ' + meridian;

              // Print the time in a div
              document.getElementById('currentTime').textContent = currentTimeString;

              // Update time every second
              setTimeout(displayCurrentTime, 1000);
            }

            // Call the function when the page loads
            window.onload = displayCurrentTime;
          </script>

          <!-- Second section-->
          <section class="section dashboard">
            <div class="row">

              <!-- Left side columns -->
              <div class="col-lg-12">
                <div class="row">

                  <div class="col-xxl-8 col-md-8">
                    <div class="card info-card sales-card">


                      <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- Slides with captions -->
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                          <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          </div>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="assets/img/1.png" class="d-block w-100" alt="...">
                              <!-- <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">CVM University</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                              </div> -->
                            </div>
                            <div class="carousel-item">
                              <img src="assets/img/2.png" class="d-block w-100" alt="...">
                              <!-- <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">ISTAR Dashboard</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                              </div> -->
                            </div>
                            <div class="carousel-item">
                              <img src="assets/img/3.png" class="d-block w-100" alt="...">
                              <!-- <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Agency Management system</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                              </div> -->
                            </div>
                          </div>

                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>

                        </div><!-- End Slides with captions -->
                      </div>
                    </div>
                  </div>


                  <!-- End Sales Card -->
                  <style>
                    div.card {
                      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                      
                    }
                  </style>
                  <!-- Updates Sections-->
                  <div class="col-xxl-4 col-md-4">


                    <!-- Recent Activity -->
                    <div class="card">
                      <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                          <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                          </li>

                          <li><a class="dropdown-item" href="#">Today</a></li>
                          <li><a class="dropdown-item" href="#">This Month</a></li>
                          <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                      </div>

                      <div class="card-body">
                        <h5 class="card-title">Latest Update's <span>| Today</span></h5>

                        <div class="activity">

                          <div class="activity-item d-flex">
                            <div class="activite-label">32 min</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                              Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                            </div>
                          </div><!-- End activity item-->

                          <div class="activity-item d-flex">
                            <div class="activite-label">56 min</div>
                            <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                            <div class="activity-content">
                              Voluptatem blanditiis blanditiis eveniet
                            </div>
                          </div><!-- End activity item-->

                          <div class="activity-item d-flex">
                            <div class="activite-label">2 hrs</div>
                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                            <div class="activity-content">
                              Voluptates corrupti molestias voluptatem
                            </div>
                          </div><!-- End activity item-->

                          <div class="activity-item d-flex">
                            <div class="activite-label">1 day</div>
                            <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                            <div class="activity-content">
                              Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                            </div>
                          </div><!-- End activity item-->

                          <div class="activity-item d-flex">
                            <div class="activite-label">2 days</div>
                            <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                            <div class="activity-content">
                              Est sit eum reiciendis exercitationem
                            </div>
                          </div><!-- End activity item-->

                          <div class="activity-item d-flex">
                            <div class="activite-label">4 weeks</div>
                            <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                            <div class="activity-content">
                              Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                            </div>
                          </div><!-- End activity item-->


                          <div class="container" style="color: red;">
                            <marquee direction="left">This Information will be Updated soon....</marquee>
                          </div>

                        </div>

                      </div>
                    </div><!-- End Recent Activity -->

                  </div>
                </div>

              </div>
            </div>

        </div><!-- End Customers Card -->
      </div>
      </div>
      
        <!-- Third section-->
        <section class="section dashboard">
          <div class="row">


            <div class="col-xxl-8 col-md-8">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Key Information About Dashboard</h5>

                  <!-- Default Tabs -->
                  <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                      <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                      <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                      <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                      <button class="nav-link w-100" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting-justified" type="button" role="tab" aria-controls="Setting" aria-selected="false">Setting</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                      <button class="nav-link w-100" id="reports-tab" data-bs-toggle="tab" data-bs-target="#reports-justified" type="button" role="tab" aria-controls="reports" aria-selected="false">Reports</button>
                    </li>
                  </ul>
                  <div class="tab-content pt-2" id="myTabjustifiedContent">
                    <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                      Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est
                      unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga
                      sequi sed ea saepe at unde.
                    </div>
                    <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                      Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium
                      distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique.
                      Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                    </div>
                    <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
                      Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium
                      quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam.
                      Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                    </div>
                    <div class="tab-pane fade" id="setting-justified" role="tabpanel" aria-labelledby="setting-tab">
                      Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium
                      quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam.
                      Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                    </div>
                    <div class="tab-pane fade" id="reports-justified" role="tabpanel" aria-labelledby="reports-tab">
                      Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium
                      quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam.
                      Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                    </div>

                  </div>
                  <!-- End Default Tabs -->

                </div>

              </div>
            </div>

            <style>
              #
            </style>

            <div class="col-xxl-4 col-xl-4">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <div class="card-title text-primary">
                  <h5 class="card-title">Latest Feature's</h5>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bx bxs-bell-ring"></i>
                    </div>
                    <div class="ps-3">
                      New Updated Dashboard<br>
                      <span class="text-danger small fw-bold">1.</span> <span class="text-muted small pt-2 ps-1">Add New Elements</span><br>
                      <span class="text-danger small fw-bold">2.</span> <span class="text-muted small pt-2 ps-1">Get Realtime Notification's</span><br>
                      <span class="text-danger small fw-bold">3.</span> <span class="text-muted small pt-2 ps-1">Generating Reports</span><br>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          </div>


  </main>
  </section>

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
      <strong><span>Version - 1.0.1 </span></strong>
    </div>

  </footer><!-- End Footer -->

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

</body>

</html>

<?php
  // session_unset();