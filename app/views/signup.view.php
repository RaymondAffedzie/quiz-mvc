<!-- @format -->

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8" />
	<meta nid="" ame="description" content="<?= APP_DESC; ?>" />
	<meta nid="" ame="author" content="<?= AUTHOR; ?>" />
	<meta nid="" ame="keywords" content="quiz, past questions, past questions quiz, personal quiz, shs, jhs, tvet, primary, private studies, personal studies, online quiz, quiz application" />
	<meta nid="" ame="robots" content="index, follow" />
	<meta property="og:title" content="<?= APP_NAME; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.quizapp.com" />
	<meta property="og:image" content="<?= ROOT; ?>/assests/user/images/content-image.jpg" />
	<meta property="og:description" content="Improve your performance with our interactive past question quiz application" />
	<meta nid="" ame="twitter:card" content="summary_large_image" />
	<meta nid="" ame="twitter:site" content="@irbbaDevsQuizApp" />
	<meta nid="" ame="twitter:title" content="<?= APP_NAME; ?>" />
	<meta nid="" ame="twitter:description" content="Improve your performance with our interactive past question quiz application" />
	<meta nid="" ame="twitter:image" content="<?= ROOT; ?>/assests/user/images/content-image.jpg" />

	<title>SignUp | <?= APP_NAME; ?></title>
	
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/vendors/mdi/css/materialdesignicons.min.css" />
	<link rel="stylesheet" href="<?= ROOT; ?>/assets/admin/vendors/css/vendor.bundle.base.css" />
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
					<div class="card col-lg-6 mx-auto">
						<div class="card-body px-5 py-5">
							<h3 class="card-title text-left mb-3">
								Sign Up
							</h3>
							<form method="post">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="first_name">First name</label>
											<input id="first_name" value="<?= old_value('first_name'); ?>" name="first_name" type="text" class="form-control p_input text-white" autofocus />
											<?= !empty($user->getError('first_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('first_name')) . '</span>' : ""; ?>
										</div>
										<div class="form-group">
											<label for="last_name">Last name</label>
											<input id="last_name" value="<?= old_value('last_name'); ?>" name="last_name" type="text" class="form-control p_input text-white" />
											<?= !empty($user->getError('last_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('last_name')) . '</span>' : ""; ?>
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input id="email" value="<?= old_value('email'); ?>" name="email" type="email" class="form-control p_input text-white" />
											<?= !empty($user->getError('email')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('email')) . '</span>' : ""; ?>
										</div>
										<div class="form-group">
											<label for="contact">Contact</label>
											<input id="contact" value="<?= old_value('contact'); ?>" name="contact" type="tel" class="form-control p_input text-white" />
											<?= !empty($user->getError('contact')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('contact')) . '</span>' : ""; ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="level">Level of education</label>
											<select class="form-control text-white" id="level" name="level_id">
												<?php if (!empty($data['levels'])) : ?>
													<option value="">Select education level</option>
													<?php foreach ($data['levels'] as $level) : ?>
														<option value="<?= $level->level_id; ?>" <?= old_select('level_id', $level->level_id ?? ''); ?>> <?= $level->level_name; ?> </option>
													<?php endforeach; ?>
												<?php endif; ?>
											</select>
											<?= !empty($user->getError('')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('')) . '</span>' : ""; ?>
										</div>
										<div class="form-group">
											<label for="school_name">School name</label>
											<input id="school_name" value="<?= old_value('school_name'); ?>" name="school_name" type="text" class="form-control p_input text-white" />
											<?= !empty($user->getError('school_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('school_name')) . '</span>' : ""; ?>
										</div>
										<div class="form-group">
											<label for="new_password">New Password</label>
											<input id="new_password" value="<?= old_value('new_password'); ?>" name="new_password" type="password" class="form-control p_input text-white" />
											<?= !empty($user->getError('new_password')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('new_password')) . '</span>' : ""; ?>
										</div>
										<div class="form-group">
											<label for="confirm_password">Confirm Password</label>
											<input id="confirm_password" value="<?= old_value('confirm_password'); ?>" name="confirm_password" type="password" class="form-control p_input text-white" />
											<?= !empty($user->getError('confirm_password')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('confirm_password')) . '</span>' : ""; ?>
										</div>
									</div>
								</div>

								<div class="form-check form-check-flat form-check-primary text-center">
									<label class="form-check-label">
										<input type="checkbox" name="terms" value="accepted" class="form-check-input" <?= old_checked('terms', 'accepted'); ?>>
										By creating an account you are accepting our
									</label>
									<a href="#" style="text-decoration:none">Terms & Conditions</a>
									<?= !empty($user->getError('terms')) ? '<span class="text-danger text-left">' . $user->getError('terms') . '</span>' : ""; ?>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary btn-block enter-btn">
										Sign Up
									</button>
								</div>
								<p class="sign-up text-center">
									Already have an Account?
									<a href="<?= ROOT; ?>/login" style="text-decoration:none">Login</a>
								</p>
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