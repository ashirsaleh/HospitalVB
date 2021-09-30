<?php 
session_start();
require 'includes/db.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
if (!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
    exit();
    
}
?>
<!-- <!DOCTYPE html> -->
<!-- <html dir="ltr" lang="en"> -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Visitors Book</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/libs/flot/css/float-chart.css">
    <link rel="stylesheet" href="assets/dist/css/icons/font-awesome/css/fontawesome.css">
    <link rel="stylesheet" href="assets/dist/css/icons/font-awesome/css/fa-brands.min.css">
    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.css">
    <link href="assets/dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Main wrapper  -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- Topbar header  -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon ps-2">
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                        </span>
                    </a>
                    <!-- End Logo -->

                    <!-- Toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                        <!-- create new -->
                        <?php if($_SESSION['user']['role'] == 'Admin' || $_SESSION['user']['role'] == 'Nurse'){ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                                <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if($_SESSION['user']['role'] != 'Nurse'){ ?>
                                <li><a class="dropdown-item" href="addPatient.php">Patient</a></li>
                                <?php } ?>
                                <?php if($_SESSION['user']['role'] == 'Admin'){  ?>
                                <li><a class="dropdown-item" href="addUser.php">User</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>

                    <!-- Right side toggle and nav items -->
                    <ul class="navbar-nav float-end">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-bell font-24"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">First Notification</a></li>
                                <li><a class="dropdown-item" href="#">Another Notification</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php"><i class="ti-user me-1 ms-1"></i>
                                    My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php"><i class="fa fa-power-off me-1 ms-1"></i>
                                    Logout</a>
                            </ul>
                        </li>
                        <!-- User profile and search -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Topbar header -->

        <!-- Left Sidebar -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <?php if($_SESSION['user']['role'] == 'Admin'){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="patients.php" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span
                                    class="hide-menu">Patients</span></a></li>
                        <?php } ?>
                        <?php if($_SESSION['user']['role'] == 'Admin'){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="users.php" aria-expanded="false"><i class="mdi mdi-pencil"></i><span
                                    class="hide-menu">Users</span></a></li>
                        <?php } ?>
                        <?php if($_SESSION['user']['role'] == 'Admin'){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="visitations.php" aria-expanded="false"><i class="mdi mdi-calendar-text"></i><span
                                    class="hide-menu">Visitations</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="visitors.php" aria-expanded="false"><i
                                    class="me-2 mdi mdi-human-male-female"></i><span
                                    class="hide-menu">Visitors</span></a></li>
                        <?php } ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-settings"></i><span
                                    class="hide-menu">Settings </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i
                                            class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard-2
                                        </span></a></li>
                                <li class="sidebar-item"><a href="pages-gallery.html" class="sidebar-link"><i
                                            class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Gallery
                                        </span></a></li>
                                <li class="sidebar-item"><a href="pages-calendar.html" class="sidebar-link"><i
                                            class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar
                                        </span></a></li>
                                <li class="sidebar-item"><a href="pages-invoice.html" class="sidebar-link"><i
                                            class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice
                                        </span></a></li>
                                <li class="sidebar-item"><a href="pages-chat.html" class="sidebar-link"><i
                                            class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat Option
                                        </span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">