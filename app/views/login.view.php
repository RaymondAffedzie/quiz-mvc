<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="<?= APP_DESC; ?>">
    <meta name="author" content="<?= AUTHOR; ?>">
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

    <title>Login | <?= APP_NAME; ?></title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/fonts/fonts.css" />
    <!-- endplugin:css -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/css/style.css" />
    <!-- End layout styles -->

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= ROOT; ?>/assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= ROOT; ?>/assets/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ROOT; ?>/assets/favicon/favicon-16x16.png" />
    <link rel="manifest" href="<?= ROOT; ?>/assets/favicon/site.webmanifest" />
    <!-- endfavicon -->

</head>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-sm-10 col-md-8 col-lg-6 col-xl-4 mx-auto">
                        <div class="card-body px-5 py-3">
                            <div class="row">
                                <a class="brand-logo text-center h2" href="<?= ROOT; ?>" style="text-decoration: none; color:#009da6; font-family: Sacramento;">
                                    <?= ucwords(APP_NAME); ?>
                                </a>
                            </div>
                            <h3 class="card-title text-center mb-3">Login</h3>
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input id="email" name="email" style="color:#ffffff;" type="email" value="<?= old_value('email') ?>" class="form-control p_input" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input id="password" name="password" style="color:#ffffff;" type="password" value="<?= old_value('password') ?>" class="form-control p_input">
                                </div>
                                <?= !empty($user->getError('email')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('email')) . '</span>' : ""; ?>
                                <?= !empty($user->getError('password')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('password')) . '</span>' : ""; ?>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Remember me </label>
                                    </div>
                                    <a href="<?= ROOT ?>/forgot" class="forgot-pass" style="text-decoration:none">Forgot password</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                </div>

                                <p class="sign-up">Don't have an Account?<a href="<?= ROOT ?>/signup" style="text-decoration:none"> Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
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