<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="<?= APP_DESC; ?>">
    <meta name="author" content="<?= AUTHOR; ?>">
    <!-- <meta http-equiv="refresh" content="30"> -->
    <meta name="keywords" content="quiz, past questions, past questions quiz, personal quiz, shs, jhs, tvet, primary, private studies, personal studies, online quiz, quiz application">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?= APP_NAME; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.quizapp.com">
    <meta property="og:image" content="<?= ROOT; ?>/assests/user/images/content-image.jpg">
    <meta property="og:description" content="Improve your academic performance with our interactive past question quiz application">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@irbbaDevsQuizApp">
    <meta name="twitter:title" content="<?= APP_NAME; ?>">
    <meta name="twitter:description" content="Improve your performance with our interactive past question quiz application">
    <meta name="twitter:image" content="<?= ROOT; ?>/assests/user/images/content-image.jpg">

    <title><?= APP_NAME; ?></title>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= ROOT; ?>/assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= ROOT; ?>/assets/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ROOT; ?>/assets/favicon/favicon-16x16.png" />
    <link rel="manifest" href="<?= ROOT; ?>/assets/favicon/site.webmanifest" />
    <!-- endfavicon -->

    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/icons/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/fonts/fonts.css" />
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/vendors/mdi/css/materialdesignicons.min.css" />
    <!-- endplugin:css -->

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/client/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/client/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/client/vendor/aos/aos.css">
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/client/vendor/glightbox/css/glightbox.min.css">
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/client/vendor/swiper/swiper-bundle.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/client/css/main.css">

</head>

<body class="">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="<?=ROOT;?>" class="logo d-flex align-items-center me-auto me-xl-0">
                <i class="bi bi-braces"></i>
                <h1 class="sitename"><?=APP_NAME;?></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="<?=ROOT;?>">Home<br></a></li>
                    <li><a href="<?=ROOT;?>/about">About</a></li>
                    <li><a href="<?=ROOT;?>/contact">Contact</a></li>
                    <li><a href="<?=ROOT;?>/login">Login</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </header>

    <main class="main">