<?php
if (isset($questions) && !empty($questions)):
	?>
	<div class="container col">
		<ul class="nav nav-tabs" id="next_back_header" role="tablist" style="display: none">
			<?php

			$ps = 0;

			for ($ps = 0; $ps < count($questions); $ps++):
				?>
				<li>
					<a class="<?= !$ps ? 'active' : '' ?>" data-toggle="tab" role="tab"
					   aria-controls="question-<?= $ps ?>" aria-selected="<?= !$ps ? 'true' : 'false' ?>"
					   href="#question-<?= $ps ?>"></a>
				</li>
			<?php
			endfor;

			?>
		</ul>
		<div class="tab-content" style="padding: 0; margin: 0;">
			<?php
			$ps = 0;
			foreach ($questions as $question):
				$options = json_decode($question->options);
				?>
				<div class="tab-pane show <?= !$ps ? 'active' : '' ?> animated fadeInUp" role="tabpanel"
					 id="question-<?= $ps ?>">
					<div class="card ml-2 mr-2 mt-4 mb-4 shadow">
						<div class="container text-white bg-secondary pt-4 pb-4 pl-3">
							<?= 'Pregunta ' . ($ps + 1) . ' de ' . count($questions) ?>
						</div>

						<div class="card-body text-secondary">
							<div class="ml-4">
								<div class="py-3 h5"><b><?= ($ps + 1) . '.  ' . $question->title ?></b></div>
								<div class="ml-5">
									<?php
									$op = 0;
									foreach ($options as $option):
										$op++;
										?>
										<input type="radio" name="radio-<?= $question->id ?>"
											   id="option-<?= $ps . $op ?>" value="<?= $op ?>">
										<label class="radio" for="option-<?= $ps . $op ?>">
											<span class="pl-4"><?= $option ?></span>
										</label>
									<?php
									endforeach;
									?>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="d-flex align-items-center pt-3 ml-4 pb-3">
								<div class="ml-auto mr-sm-5">
									<button class="btn btn-secondary btnNext">Siguiente</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$ps++;
			endforeach;

			?>
		</div>
	</div>

	<script>
		// begin next prev
		$('.btnNext').click(function () {
			$('#next_back_header .active').parent().next('li').find('a').trigger('click');
		});
	</script>
<?php
endif;
?>
