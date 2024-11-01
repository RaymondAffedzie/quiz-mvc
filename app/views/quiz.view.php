<?php //$this->view("header"); ?>

<!-- Quiz Section -->
<!-- <section id="services" class="services section"> -->

	<!-- Section Title -->
	<!-- <div class="container section-title" data-aos="fade-up">
		<h2>
			
		</h2>
		<p></p>
	</div> -->
	<!-- End Section Title -->

	<!-- <div class="container">
		<div class="row gy-4">
			<div class="col-md-6 d-flex flex-sm-column flex-fill question">

			</div>
			<div class="col-md-6 d-flex flex-sm-column flex-fill options">

			</div>
		</div>
	</div>

</section> -->
<!-- /Quiz Section -->

<?php // $this->view("footer"); ?>

<?php $this->view("header"); ?>

<!-- Quiz Section -->
<section id="services" class="services section">

	<!-- Section Title -->
	<div class="container section-title" data-aos="fade-up">
		<h2>Quiz Questions</h2>
		<p>Answer the questions below:</p>
	</div>
	<!-- End Section Title -->

	<div class="container">
		<div class="row gy-4">
			<?php if (!empty($questions)): ?>
				<?php foreach ($questions as $question): ?>
					<div class="col-md-6 d-flex flex-sm-column flex-fill question">
						<!-- Display question text -->
						<p><?php echo htmlspecialchars($question->question); ?></p>
					</div>
					<div class="col-md-6 d-flex flex-sm-column flex-fill options">
						<!-- Display options for each question -->
						<?php if (!empty($question->options)): ?>
							<?php foreach ($question->options as $option): ?>
								<div class="card">
									<div class="card-text">
										<input type="radio" name="question_<?php echo $question->question_id; ?>" value="<?php echo htmlspecialchars($option->question_option); ?>" />
										<label><?php echo htmlspecialchars($option->question_option); ?></label>
									</div>
								</div>
								<?php endforeach; ?>
						<?php else: ?>
							<p>No options available for this question.</p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>No questions available for this quiz.</p>
			<?php endif; ?>
		</div>

		<!-- Pagination links -->
		<?php $pager->display(count($questions)); ?>
	</div>

</section>
<!-- /Quiz Section -->

<?php $this->view("footer"); ?>
