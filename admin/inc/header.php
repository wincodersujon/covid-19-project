<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: sign-in.php"); // go to login page
}
if (!isset($_SESSION['role'])) {
    header("location: sign-in.php"); // go to login page
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Vaccines - Online Covid Patent Service System</title>

    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->

    <!--BootStrap -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />


    <!-- vaccines CSS -->
    <link id="vaccines-css" rel="stylesheet" href="assets/css/magnific-popup.css" />
    <link id="vaccines-css" rel="stylesheet" href="assets/css/vaccines.css" />
    <link id="vaccines-css" rel="stylesheet" href="assets/css/style.css" />


    <!-- FAVICON -->
    <link href="assets/images/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="index.php">
                        <img src="assets/images/logo-icon.png" alt="">
                        <span class="brand-name"><img src="assets/images/logo-text.png" alt=""></span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">

                        <li class="<?php if ($page == 'index') {
                                        echo 'active';
                                    } ?>">
                            <a class="sidenav-item-link" href="index.php">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span></b>
                            </a>
                        </li>

                        <?php if ($_SESSION['role'] == 0) {  ?>

                            <li class="<?php if ($page == 'vaccine-form') {
                                            echo 'active';
                                        } ?>">
                                <a class="sidenav-item-link" href="vaccine-form.php">
                                    <i class="mdi mdi-walk"></i>
                                    <span class="nav-text">Vaccine Signup</span></b>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="<?php if ($page == 'vaccine-table') {
                                        echo 'active';
                                    } ?>">
                            <a class="sidenav-item-link" href="vaccine-table.php">
                                <i class="mdi mdi-walk"></i>
                                <span class="nav-text">Vaccine Registered</span></b>
                            </a>
                        </li>

                        <?php if ($_SESSION['role'] == 0) {  ?>
                            <li class="<?php if ($page == 'appointment-form') {
                                            echo 'active';
                                        } ?>">
                                <a class="sidenav-item-link" href="appointment-form.php">
                                    <i class="mdi mdi-calendar-plus"></i>
                                    <span class="nav-text">Appointment</span></b>
                                </a>
                            </li>
                        <?php } ?>


                        <li class="<?php if ($page == 'appointment-table') {
                                        echo 'active';
                                    } ?>">
                            <a class="sidenav-item-link" href="appointment-table.php">
                                <i class="mdi mdi-calendar-plus"></i>
                                <span class="nav-text">Appointment List</span></b>
                            </a>
                        </li>


                        <li class="<?php if ($page == 'hospital') {
                                        echo 'active';
                                    } ?>">
                            <a class="sidenav-item-link" href="hospital-table.php">
                                <i class="mdi mdi-hospital-building"></i>
                                <span class="nav-text">Hospital Info</span></b>
                            </a>
                        </li>

                        <?php if ($_SESSION['role'] == 1) {  ?>
                            <li class="<?php if ($page == 'user') {
                                            echo 'active';
                                        } ?>">
                                <a class="sidenav-item-link" href="users.php">
                                    <i class="mdi mdi-account-group-outline"></i>
                                    <span class="nav-text">Users</span></b>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>

                </div>
            </div>
        </aside>


        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <!-- search form -->
                    <div class="search-form d-none d-lg-inline-block">
                        <div class="input-group">
                            <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <input type="text" name="query" id="search-input" class="form-control" placeholder=" " autocomplete="off" />
                        </div>
                        <div id="search-results-container">
                            <ul id="search-results"></ul>
                        </div>
                    </div>

                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                            <!-- User Account -->

                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="assets/images/user/user.png" class="user-image" alt="User Image" />
                                    <span class="d-none d-lg-inline-block"> <?php echo $_SESSION['username'] ?> </span>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="logout.php" class="admin-logout"> <?php echo $_SESSION['username'] ?> ,
                                            logout</a></li>
                                    <li><a href="../admin/profile.php" class="admin-logout">Profile</a></li>
                                </ul>
                            </li>
                            <!-- end: Message -->


                        </ul>
                    </div>
                </nav>
            </header>