<!DOCTYPE html>
<html lang="en">

<head>
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

    <title>Login-<?= APP_NAME; ?></title>

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
</head>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-sm-10 col-md-8 col-lg-6 col-xl-4 mx-auto">
                        <div class="card-body p-5">

                            <?php if ($action === 'new-password') : ?> <!-- Enter you new password-->

                                <h3 class="card-title text-center mb-5">New password</h3>
                                <form method="post">

                                    <div class="form-group">
                                        <label for="new_password">New password <span class="text-danger">*</span></label>
                                        <input id="new_password" name="new_password" type="password" value="<?= old_value('new_password') ?>" class="form-control p_input text-white" autofocus>
                                    </div>

                                    <?= !empty($forgot->getError('new_password')) ? '<span class="text-danger text-left">' . formatFieldName($forgot->getError('new_password')) . '</span>' : ""; ?>

                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                        <input id="confirm_password" name="confirm_password" type="password" value="<?= old_value('confirm_password') ?>" class="form-control p_input text-white">
                                    </div>

                                    <?= !empty($forgot->getError('confirm_password')) ? '<span class="text-danger text-left">' . formatFieldName($forgot->getError('confirm_password')) . '</span>' : ""; ?>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
                                    </div>

                                    <p class="sign-up">You remembered your password?<a href="<?= ROOT ?>/login" style="text-decoration:none"> Sign In</a></p>
                                </form>

                            <?php elseif ($action === 'verify') : ?> <!-- Enter verification code sent to your email account-->

                                <h3 class="card-title text-center mb-5">Verification code</h3>
                                <form method="post">

                                    <div class="form-group">
                                        <label for="code">Code <span class="text-danger">*</span></label>
                                        <input id="code" name="code" type="text" value="<?= old_value('code') ?>" class="form-control p_input text-white" autofocus>
                                    </div>

                                    <?= !empty($forgot->getError('code')) ? '<span class="text-danger text-left">' . formatFieldName($forgot->getError('code')) . '</span>' : ""; ?>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
                                    </div>

                                    <p class="sign-up">You remembered your password?<a href="<?= ROOT ?>/login" style="text-decoration:none"> Sign In</a></p>
                                </form>

                            <?php else : ?> <!--Enter email address of your account-->

                                <h3 class="card-title text-center mb-5">Forgot Password</h3>
                                <form method="post">

                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input id="email" name="email" type="email" value="<?= old_value('email') ?>" class="form-control p_input text-white" autofocus>
                                    </div>

                                    <?= !empty($forgot->getError('email')) ? '<span class="text-danger text-left">' . formatFieldName($forgot->getError('email')) . '</span>' : ""; ?>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
                                    </div>

                                    <p class="sign-up">You remembered your password?<a href="<?= ROOT ?>/login" style="text-decoration:none"> Sign In</a></p>
                                </form>

                            <?php endif; ?>

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