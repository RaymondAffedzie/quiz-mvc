<?php $this->view("header"); ?>

<!-- Page Title -->
<div class="page-title" data-aos="fade">
	<div class="heading">
		<div class="container">
			<div class="row d-flex justify-content-center text-center">
				<div class="col-lg-8">
					<h1>About</h1>
					<p class="mb-0">
						Irbba Devs Quiz System is dedicated to transforming exam
						preparation for Ghanaian students. Our platform provides an
						interactive and user-friendly experience, offering personalized
						learning to help students excel academically. With features
						such as customizable quizzes, progress tracking, and real exam
						question practice, we aim to make studying engaging and effective
						for each student's unique needs.<br>
						Our platform covers all major examination levels including
						BECE, WASSCE, TVET, and NOVDEC, ensuring that students at
						every stage have access to resources that will enhance their
						knowledge and exam readiness. At Irbba Devs Quiz System, we
						are committed to giving students the confidence and tools they
						need to achieve academic success. Join us today and be part
						of the future of exam preparation designed for your success!
					</p>
					<!-- <a href="" class="cta-btn">Read more<br></a> -->
				</div>
			</div>
		</div>
	</div>
	<nav class="breadcrumbs">
		<div class="container">
			<ol>
				<li><a href="<?= ROOT; ?>">Home</a></li>
				<li class="current">About</li>
			</ol>
		</div>
	</nav>
</div>
<!-- End Page Title -->

<!-- About Section -->
<section id="about" class="about section">

	<div class="container" data-aos="fade-up" data-aos-delay="100">

		<div class="row d-flex align-items-center gy-4 justify-content-center">
			<div class="col-lg-4 flex-shrink-0">
				<img src="<?= ROOT; ?>/assets/client/img/about-us.jpg" class="img-fluid" alt="">
			</div>
			<div class="col-lg-5 content flex-grow-1 ms-3">
				<h2>Mission</h2>
				<p class="fst-italic py-3">
					Our goal is to offer students accessible, high-quality quizzes that promote
					academic excellence. We strive to support students in their learning journey
					by providing a versatile platform where they can test their knowledge,
					practice regularly, and identify areas for improvement. Ultimately, our aim
					is to enhance their performance in national exams.
				</p>
				<!-- <div class="row">
					<div class="col-lg-6">
						<ul>
							<li>
								<i class="bi bi-chevron-right"></i>
								<strong>Birthday:</strong>
								<span>1 May 1995</span>
							</li>
							<li>
								<i class="bi bi-chevron-right"></i>
								<strong>Website:</strong>
								<span>www.example.com</span>
							</li>
							<li>
								<i class="bi bi-chevron-right"></i>
								<strong>Phone:</strong>
								<span>+123 456 7890</span>
							</li>
							<li>
								<i class="bi bi-chevron-right"></i>
								<strong>City:</strong>
								<span>New York, USA</span>
							</li>
						</ul>
					</div>
					<div class="col-lg-6">
						<ul>
							<li>
								<i class="bi bi-chevron-right"></i>
								<strong>Age:</strong>
								<span>30</span>
							</li>
							<li>
								<i class="bi bi-chevron-right"></i>
								<strong>Degree:</strong>
								<span>Master</span>
							</li>
							<li>
								<i class="bi bi-chevron-right"></i>
								<strong>Email:</strong>
								<span>email@example.com</span>
							</li>
							<li>
								<i class="bi bi-chevron-right"></i>
								<strong>Freelance:</strong>
								<span>Available</span>
							</li>
						</ul>
					</div>
				</div> -->
				<h2>Vision</h2>
				<p class="py-3">
					Our vision is to become Ghana’s leading digital platform for exam preparation,
					empowering students with the tools they need to succeed in their academic
					pursuits. We envision a future where every Ghanaian student can access personalized
					and comprehensive quiz content that promotes mastery and lifelong learning.
				</p>
				<h2>Goal</h2>
				<p class="m-0">
					Our aim is to develop an inclusive and flexible quiz system that meets the
					diverse educational needs of students in Ghana. We seek to enhance exam
					success rates and overall academic achievement through innovative technology
					and engaging content.
				</p>
			</div>
		</div>

	</div>

</section>
<!-- End About Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">

	<!-- Section Title -->
	<div class="container section-title" data-aos="fade-up">
		<h2>Testimonials</h2>
		<p>What they are saying</p>
	</div>
	<!-- End Section Title -->

	<div class="container" data-aos="fade-up" data-aos-delay="100">

		<div class="swiper init-swiper">
			<script type="application/json" class="swiper-config">
				{
					"loop": true,
					"speed": 600,
					"autoplay": {
						"delay": 5000
					},
					"slidesPerView": "auto",
					"pagination": {
						"el": ".swiper-pagination",
						"type": "bullets",
						"clickable": true
					},
					"breakpoints": {
						"320": {
							"slidesPerView": 1,
							"spaceBetween": 40
						},
						"1200": {
							"slidesPerView": 3,
							"spaceBetween": 1
						}
					}
				}
			</script>

			<div class="swiper-wrapper">

				<div class="swiper-slide">
					<div class="testimonial-item">
						<div class="stars">
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
						</div>
						<p>
							I’ve tried many study apps, but Irbba Devs Quiz System stands out! The platform is
							easy to use, and the real exam questions make me feel like I’m practicing for the
							actual test. I’ve seen a huge improvement in my performance since using it.
						</p>
						<div class="profile mt-auto">
							<img src="<?= ROOT; ?>/assets/client/img/testimonials/testimonials-1.jpg" class="testimonial-img"
								alt="">
							<p>Johnny Simpson</p>
							<p>WASSCE Candidate</p>
						</div>
					</div>
				</div>
				<!-- End testimonial item -->

				<div class="swiper-slide">
					<div class="testimonial-item">
						<div class="stars">
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
						</div>
						<p>
							Irbba Devs Quiz System has completely transformed the way I study for my exams.
							The customizable quizzes and past questions have helped me focus on my weak areas,
							and the feedback I get after each quiz is amazing. I feel so much more confident
							going into my BECE exams!
						</p>
						<div class="profile mt-auto">
							<img src="<?= ROOT; ?>/assets/client/img/testimonials/testimonials-2.jpg" class="testimonial-img"
								alt="">
							<p>Mariam Ama Wilson</p>
							<p>BECE Candidate</p>
						</div>
					</div>
				</div>
				<!-- End testimonial item -->

				<div class="swiper-slide">
					<div class="testimonial-item">
						<div class="stars">
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
						</div>
						<p>
							This quiz system has been a game-changer for me. I love how it tracks my progress
							and shows me where I need to improve. Irbba Devs Quiz System has made preparing
							for my TVET exams so much easier and less stressful
						</p>
						<div class="profile mt-auto">
							<img src="<?= ROOT; ?>/assets/client/img/testimonials/testimonials-3.jpg" class="testimonial-img"
								alt="">
							<p>Belinda Appiah</p>
							<p>TVET Student</p>
						</div>
					</div>
				</div><!-- End testimonial item -->

				<div class="swiper-slide">
					<div class="testimonial-item">
						<div class="stars">
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
						</div>
						<p>
							The ability to create my own practice quizzes has made studying more engaging.
							Irbba Devs Quiz System keeps me motivated with personalized recommendations and
							detailed feedback. I’m confident I’ll pass my NOVDEC exams with flying colors!
						</p>
						<div class="profile mt-auto">
							<img src="<?= ROOT; ?>/assets/client/img/testimonials/testimonials-4.jpg" class="testimonial-img"
								alt="">
							<p>James Amoah</p>
							<p>NOVDEC Candidate</p>
						</div>
					</div>
				</div><!-- End testimonial item -->

				<div class="swiper-slide">
					<div class="testimonial-item">
						<div class="stars">
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
							<i class="bi bi-star-fill"></i>
						</div>
						<p>
							As a teacher, I always recommend Irbba Devs Quiz System to my students. It’s an
							incredible tool for exam prep, and the variety of quizzes across different levels
							makes it suitable for everyone. My students are more prepared and confident thanks
							to this platform!
						</p>
						<div class="profile mt-auto">
							<img src="<?= ROOT; ?>/assets/client/img/testimonials/testimonials-5.jpg" class="testimonial-img"
								alt="">
							<p>John Fish</p>
							<p>TVET Teacher</p>
						</div>
					</div>
				</div>
				<!-- End testimonial item -->

			</div>
			<div class="swiper-pagination"></div>
		</div>

	</div>

</section>
<!-- End Testimonials Section -->


<?php $this->view("footer"); ?>