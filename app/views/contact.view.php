<?php $this->view("header"); ?>

<!-- Page Title -->
<div class="page-title" data-aos="fade">
	<div class="heading">
		<div class="container">
			<div class="row d-flex justify-content-center text-center">
				<div class="col-lg-8">
					<h1>Contact</h1>
					<p class="mb-0">
						At Irbba Devs Quiz System, we're here to help and value your feedback. Whether
						you're a student, educator, or just curious about our platform, feel free to
						reach out. Our team is dedicated to ensuring your experience is seamless and
						rewarding. Get in touch - we'd love to hear from you!
					</p>
				</div>
			</div>
		</div>
	</div>
	<nav class="breadcrumbs">
		<div class="container">
			<ol>
				<li><a href="<?= ROOT; ?>">Home</a></li>
				<li class="current">Contact</li>
			</ol>
		</div>
	</nav>
</div>
<!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section">

	<div class="container" data-aos="fade-up" data-aos-delay="100">

		<div class="info-wrap" data-aos="fade-up" data-aos-delay="200">
			<div class="row gy-5">

				<div class="col-lg-4">
					<div class="info-item d-flex align-items-center">
						<i class="bi bi-geo-alt flex-shrink-0"></i>
						<div>
							<h3>Location</h3>
							<p>Takoradi Technical Institute</p>
						</div>
					</div>
				</div>
				<!-- End Info Item -->

				<div class="col-lg-4">
					<div class="info-item d-flex align-items-center">
						<i class="bi bi-telephone flex-shrink-0"></i>
						<div>
							<h3>Call</h3>
							<p>+233 24 769 2388</p>
						</div>
					</div>
				</div>
				<!-- End Info Item -->

				<div class="col-lg-4">
					<div class="info-item d-flex align-items-center">
						<i class="bi bi-envelope flex-shrink-0"></i>
						<div>
							<h3>Email</h3>
							<p>irbbawebsdev@gmail.com</p>
						</div>
					</div>
				</div>
				<!-- End Info Item -->

			</div>
		</div>

		<form method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="300">
			<div class="row gy-4">

				<div class="col-md-6">
					<input type="text" name="firstname" class="form-control" placeholder="Your First Name" required>
				</div>

				<div class="col-md-6">
					<input type="text" name="lastname" class="form-control" placeholder="Your Last Name" required>
				</div>

				<div class="col-md-6 ">
					<input type="email" class="form-control" name="email" placeholder="Your Email" required>
				</div>

				<div class="col-md-6">
					<input type="text" class="form-control" name="subject" placeholder="Subject" required>
				</div>

				<div class="col-md-12">
					<textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
				</div>

				<div class="col-md-12 text-center">
					<div class="loading">Loading</div>

					<button type="submit">Send Message</button>
				</div>

			</div>
		</form>
		<!-- End Contact Form -->

	</div>

</section>
<!-- /Contact Section -->

<?php $this->view("footer"); ?>