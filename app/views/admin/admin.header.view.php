<?php
$ses = new \Core\Session;

$section = URL(1) ?? 'Dashboard';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="<?= APP_DESC; ?>">
    <meta name="author" content="<?= AUTHOR; ?>">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta name="keywords" content="quiz, past questions, past questions quiz, personal quiz, shs, jhs, tvet, primary, private studies, personal studies, online quiz, quiz application">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?= APP_NAME; ?>">
    <meta property="og:type" content="website">
    <!-- <meta property="og:url" content="http://www.quizapp.com"> -->
    <meta property="og:image" content="<?= ROOT; ?>/assests/user/images/content-image.jpg">
    <meta property="og:description" content="Improve your performance with our interactive past question quiz application">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@irbbaDevsQuizApp">
    <meta name="twitter:title" content="<?= APP_NAME; ?>">
    <meta name="twitter:description" content="Improve your performance with our interactive past question quiz application">
    <meta name="twitter:image" content="<?= ROOT; ?>/assests/user/images/content-image.jpg">

    <title>Admin | <?= APP_NAME; ?></title>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= ROOT; ?>/assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= ROOT; ?>/assets/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ROOT; ?>/assets/favicon/favicon-16x16.png" />
    <link rel="manifest" href="<?= ROOT; ?>/assets/favicon/site.webmanifest" />
    <!-- endfavicon -->

    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/fonts/fonts.css" />
    <!-- endplugin:css -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/css/style.css" />
    <!-- End layout styles -->
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="<?= ROOT; ?>" style="text-decoration: none; color:#009da6; font-family: Sacramento;">
                    <?= ucwords(APP_NAME); ?>
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle" src="<?= ROOT; ?>/assets/admin/images/faces/face15.jpg" alt="" />
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">
                                    <?= ucfirst($ses->user('role')); ?>
                                </h5>
                            </div>
                        </div>

                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?= ROOT; ?>/admin/dashboard">
                        <span class="menu-icon">
                            <i class="mdi mdi-view-dashboard"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?= ROOT; ?>/admin/users">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-outline"></i>
                        </span>
                        <span class="menu-title">Users</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?= ROOT; ?>/admin/categories">
                        <span class="menu-icon">
                            <i class="mdi mdi-table-large"></i>
                        </span>
                        <span class="menu-title">Categories</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?= ROOT; ?>/admin/levels">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-bar"></i>
                        </span>
                        <span class="menu-title">Levels</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?= ROOT; ?>/admin/subjects">
                        <span class="menu-icon">
                            <i class=" mdi mdi-book-open-page-variant"></i>
                        </span>
                        <span class="menu-title">Subjects</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#questions" aria-expanded="false" aria-controls="questions">
                        <span class="menu-icon">
                            <i class="mdi mdi-format-text"></i>
                        </span>
                        <span class="menu-title">Questions</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="questions">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT; ?>/admin/questions"><span class="menu-icon"><i class="mdi mdi-new-box"></i></span> Manage Questions</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#quiz" aria-expanded="false" aria-controls="quiz">
                        <span class="menu-icon">
                            <i class=" mdi mdi-repeat"></i>
                        </span>
                        <span class="menu-title">Quiz</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="quiz">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT; ?>/admin/quizzes"><span class="menu-icon"><i class="mdi mdi-new-box"></i></span> Manage Quizzes</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="sidebar-brand brand-logo-mini" href="<?= ROOT; ?>/admin" style="text-decoration: none; text-transform:lowercase; color:#009da6; font-family: Sacramento;">
                        <?= ucwords(APP_NAME); ?>
                    </a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Search products" />
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                + Create New Project
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                                <h6 class="p-3 mb-0">Projects</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-file-outline text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">
                                            Software Development
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-web text-info"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">
                                            UI Development
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-layers text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">
                                            Software Testing
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">
                                    See all projects
                                </p>
                            </div>
                        </li>
                        <li class="nav-item nav-settings d-none d-lg-block">
                            <a class="nav-link" href="#">
                                <i class="mdi mdi-view-grid"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-email"></i>
                                <span class="count bg-success"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0">Messages</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="<?= ROOT; ?>/assets/admin/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic" />
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">
                                            Mark send you a message
                                        </p>
                                        <p class="text-muted mb-0">
                                            1 Minutes ago
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="<?= ROOT; ?>/assets/admin/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic" />
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">
                                            Cregh send you a message
                                        </p>
                                        <p class="text-muted mb-0">
                                            15 Minutes ago
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="<?= ROOT; ?>/assets/admin/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic" />
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">
                                            Profile picture updated
                                        </p>
                                        <p class="text-muted mb-0">
                                            18 Minutes ago
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">
                                    4 new messages
                                </p>
                            </div>
                        </li>
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <span class="count bg-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">
                                            Event today
                                        </p>
                                        <p class="text-muted ellipsis mb-0">
                                            Just a reminder that you have an
                                            event today
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">
                                            Settings
                                        </p>
                                        <p class="text-muted ellipsis mb-0">
                                            Update dashboard
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-link-variant text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">
                                            Launch Admin
                                        </p>
                                        <p class="text-muted ellipsis mb-0">
                                            New admin wow!
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">
                                    See all notifications
                                </p>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="<?= ROOT; ?>/assets/admin/images/faces/face15.jpg" alt="" />
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                        <?= $ses->user('first_name') . ' ' . $ses->user('last_name'); ?>
                                    </p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="<?= ROOT; ?>/admin/profile">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-onepassword text-info"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">
                                            Profile
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="<?= ROOT; ?>/admin/password">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar-today text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">
                                            To-do list
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="<?= ROOT; ?>/logout">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">
                                            Logout
                                        </p>
                                    </div>
                                </a>

                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">
                                    Advanced settings
                                </p>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card corona-gradient-card">
                                <div class="card-body py-1 px-0 px-sm-3">
                                    <div class="row align-items-center">
                                        <div class="col-3 col-sm-4 col-xl-4 p-1">
                                            <h4 class="mb-1 mb-sm-0"><i class="mdi mdi-speedometer"></i> <?= ucfirst($section); ?></h4>
                                        </div>
                                        <div class="col-7 col-sm-6 col-xl-6 p-0">
                                            <h5 class="mb-1 mb-sm-0">
                                                <?php if (!empty(message())) : ?>
                                                    <i class="mdi mdi-bell-ring-outline"></i> <?= message('', true) ?>
                                                <?php endif; ?>
                                            </h5>
                                        </div>
                                        <div class="col-2 col-sm-2 col-xl-2 ps-0 text-center">
                                            <span>
                                                <a href="<?= ROOT; ?>" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn"><i class="mdi mdi-home"></i>Home page</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>