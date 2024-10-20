<?php

/**
 * Page not found or error 404 page
 */

$ses = new \Core\Session;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="<?= APP_DESC; ?>">
    <meta name="author" content="<?= AUTHOR; ?>">
    <meta http-equiv="refresh" content="30">
    <meta name="keywords" content="quiz, past questions, past questions quiz, personal quiz, shs, jhs, tvet, primary, private studies, personal studies, online quiz, quiz application">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?= APP_NAME; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.quizapp.com">
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
    <!-- endplugin:css -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= ROOT; ?>/assets/admin/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
                <div class="row flex-grow">
                    <div class="col-lg-7 mx-auto text-white">
                        <div class="row align-items-center d-flex flex-row">
                            <div class="col-lg-6 text-lg-right pr-lg-4">
                                <h1 class="display-1 mb-0">404</h1>
                            </div>
                            <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                                <h2>SORRY!</h2>
                                <h3 class="font-weight-light">The page you’re looking for was not found.</h3>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-center mt-xl-2">
                                <?php
                                if ($ses->user('role') === 'admin') {
                                ?>
                                    <i class=" mdi mdi-home" style="font-size: 1.6rem"></i> <a class="text-white font-weight-medium"  style="text-decoration:none; font-size: 1.6rem" href="<?= ROOT; ?>/admin/dashboard">Back to home</a>
                                <?php
                                } else {
                                ?>
                                    <i class=" mdi mdi-home" style="font-size: 1.6rem"></i> <a class="text-white font-weight-medium"  style="text-decoration:none; font-size: 1.6rem" href="<?= ROOT; ?>/home">Back to home</a>
                                <?php
                                } ?>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 mt-xl-2">
                                <p class="text-white font-weight-medium text-center">
                                    Copyright &copy; <a href="<?= ROOT; ?>" style="text-decoration:none color: #ffffff"><?= APP_NAME; ?></a> <?= date('Y') ?> All right reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= ROOT; ?>/assets/admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= ROOT; ?>/assets/admin/js/off-canvas.js"></script>
    <script src="<?= ROOT; ?>/assets/admin/js/hoverable-collapse.js"></script>
    <script src="<?= ROOT; ?>/assets/admin/js/misc.js"></script>
    <script src="<?= ROOT; ?>/assets/admin/js/settings.js"></script>
    <script src="<?= ROOT; ?>/assets/admin/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>