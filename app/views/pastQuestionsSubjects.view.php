<?php $this->view("header"); ?>

<!-- JHS Section -->
<section id="services" class="services section">

	<!-- Section Title -->
	<div class="container section-title" data-aos="fade-up">
		<h2>
			<?php
			// Check if there are any subject records and get the quizzes
			$level_name = "Past Questions"; // Default if no level found
			if (isset($rows) && is_array($rows)) {
				foreach ($rows as $row) {
					
						$level_name = $row->level_abbreviation . " Past Questions";
						$year = $row->year_or_form;
						break; // Exit loop after finding the first level entry
				
				}
			}
			echo htmlspecialchars($year . " " . $level_name);
			?>
		</h2>
		<p><?= htmlspecialchars($row->level_certificate); ?></p>
	</div>
	<!-- End Section Title -->

	<div class="container">
		<div class="row gy-4 mx-auto">
			<?php if (isset($rows) && is_array($rows)): ?>
				<?php foreach ($rows as $row): ?>
					<div class="col-xl-3 col-lg-6 d-flex flex-sm-column flex-fill" data-aos="fade-up" data-aos-delay="100">
						<div class="service-item position-relative">
							<h4>
								<a href="<?= ROOT . '/' . 'quiz/'. htmlspecialchars($row->quiz_id); ?>">
									<?= htmlspecialchars($row->subject_title); ?>
								</a>
							</h4>
							<p><?= htmlspecialchars($row->year_or_form) . " " .  htmlspecialchars($row->level_abbreviation) . "  " . htmlspecialchars($row->category_name); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-xl-3 col-lg-6 flex-sm-column d-flex" data-aos="fade-up" data-aos-delay="100">
					<div class="service-item position-relative">
						<p>No subject past questions available at the moment.</p>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

</section>
<!-- /JHS Section -->

<?php $this->view("footer"); ?>