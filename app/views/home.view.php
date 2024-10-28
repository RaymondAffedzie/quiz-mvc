<?php $this->view("header"); ?>

<!-- JHS Section -->
<section id="services" class="services section">

	<!-- Section Title -->
	<div class="container section-title" data-aos="fade-up">
		<h2>
			<?php
			// Check if there are any JHS records and get the level name
			$level_name = "JHS Past Questions"; // Default if no JHS found
			if (isset($rows) && is_array($rows)) {
				foreach ($rows as $row) {
					if ($row->level_abbreviation === 'JHS') {
						$level_name = $row->level_abbreviation . " Past Questions";
						break; // Exit loop after finding the first JHS entry
					}
				}
			}
			echo htmlspecialchars($level_name);
			?>
		</h2>
		<p><?= htmlspecialchars($row->level_certificate); ?></p>
	</div>
	<!-- End Section Title -->

	<div class="container">
		<div class="row gy-4 mx-auto">
			<?php if (isset($rows) && is_array($rows)): ?>
				<?php foreach ($rows as $row): ?>
					<?php if ($row->level_abbreviation === 'JHS'): ?>
						<div class="col-xl-3 col-lg-6 d-flex flex-sm-column flex-fill" data-aos="fade-up" data-aos-delay="100">
							<div class="service-item position-relative">
								<h4>
									<a href="" class="stretched-link"><?= htmlspecialchars($row->level_certificate); ?></a>
								</h4>
								<p><?= htmlspecialchars($row->year_or_form) . " " .  htmlspecialchars($row->level_abbreviation) . "  " . htmlspecialchars($row->category_name); ?></p>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-xl-3 col-lg-6 flex-sm-column d-flex" data-aos="fade-up" data-aos-delay="100">
					<div class="service-item position-relative">
						<p>No JHS past questions available at the moment.</p>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

</section>
<!-- /JHS Section -->

<!-- SHS Section -->
<section id="services" class="services section">

	<!-- Section Title -->
	<div class="container section-title" data-aos="fade-up">
		<h2>
			<?php
			// Check if there are any SHS records and get the level name
			$level_name = "SHS Past Questions"; // Default if no SHS found
			if (isset($rows) && is_array($rows)) {
				foreach ($rows as $row) {
					if ($row->level_abbreviation === 'SHS') {
						$level_name = $row->level_abbreviation . " Past Questions";
						break; // Exit loop after finding the first SHS entry
					}
				}
			}
			echo htmlspecialchars($level_name);
			?>
		</h2>
		<p><?= htmlspecialchars($row->level_certificate); ?></p>
	</div>
	<!-- End Section Title -->

	<div class="container">
		<div class="row gy-4 mx-auto">
			<?php if (isset($rows) && is_array($rows)): ?>
				<?php foreach ($rows as $row): ?>
					<?php if ($row->level_abbreviation === 'SHS'): ?>
						<div class="col-xl-3 col-lg-6 d-flex flex-sm-column flex-fill" data-aos="fade-up" data-aos-delay="100">
							<div class="service-item position-relative">
								<h4>
									<a href="" class="stretched-link"><?= htmlspecialchars($row->level_certificate); ?></a>
								</h4>
								<p><?= htmlspecialchars($row->year_or_form) . " " . htmlspecialchars($row->category_name); ?></p>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-xl-3 col-lg-6 d-flex flex-sm-column flex-fill" data-aos="fade-up" data-aos-delay="100">
					<div class="service-item position-relative">
						<p>No SHS past questions available at the moment.</p>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

</section>
<!-- /SHS Section -->

<!-- TVET Section -->
<section id="services" class="services section">

	<!-- Section Title -->
	<div class="container section-title" data-aos="fade-up">
		<h2>
			<?php
			// Check if there are any TVET records and get the level name
			$level_name = "TVET Past Questions"; // Default if no TVET found
			if (isset($rows) && is_array($rows)) {
				foreach ($rows as $row) {
					if ($row->level_abbreviation === 'TVET') {
						$level_name = $row->level_abbreviation . " Past Questions";
						break; // Exit loop after finding the first TVET entry
					}
				}
			}
			echo htmlspecialchars($level_name);
			?>
		</h2>
		<p><?= htmlspecialchars($row->level_certificate); ?></p>
	</div>
	<!-- End Section Title -->

	<div class="container">
		<div class="row gy-4 mx-auto">
			<?php if (isset($rows) && is_array($rows)): ?>
				<?php foreach ($rows as $row): ?>
					<?php if ($row->level_abbreviation === 'TVET'): ?>
						<div class="col-xl-3 col-lg-6 d-flex flex-sm-column flex-fill" data-aos="fade-up" data-aos-delay="100">
							<div class="service-item position-relative">
								<h4>
									<a href="" class="stretched-link"><?= htmlspecialchars($row->level_certificate); ?></a>
								</h4>
								<p><?= htmlspecialchars($row->year_or_form) . " " .  htmlspecialchars($row->level_abbreviation) . "  " . htmlspecialchars($row->category_name); ?></p>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-xl-3 col-lg-6 d-flex flex-sm-column flex-fill" data-aos="fade-up" data-aos-delay="100">
					<div class="service-item position-relative">
						<p>No JHS past questions available at the moment.</p>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

</section>
<!-- /TVET Section -->

<?php $this->view("footer"); ?>