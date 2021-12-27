<section class="inner-banner">
	<div class="container">
		<ul class="list-unstyled thm-breadcrumb" id="play">
			<li><a href="<?= base_url() ?>">Inicio</a></li>
			<li class="active"><a
						href="<?= base_url() . 'user/course/index/' . $course[0]->id ?>"><?= $info['title'] ?></a></li>
		</ul>
		<h2 class="inner-banner__title"><?= $info['title'] ?></h2>
	</div>
</section>
<section class="">

	<div class="row no-gutters">
		<div class="col-lg-4 pt-3 pb-3" style="background-color: #012237;">
			<h4 class="text-center text-muted pt-2 pb-3">Contenido del curso</h4>
			<div class="toma"></div>
			<div class="container" style="height: 900px; overflow-y:auto;">

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<?php
					$i = 0;
					foreach ($sections as $section):
						?>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading-<?= $section->id ?>">
								<h4 class="panel-title ">
									<a class="<?= !$i ? 'collapse' : 'collapsed' ?>" role="button"
									   data-toggle="collapse" data-parent="#accordion"
									   href="#collapse-<?= $section->id ?>" aria-expanded="true"
									   aria-controls="collapse-<?= $section->id ?>">
										<div class="row title_course">
											<div class="col-md title text-secondary"><?= $section->title ?></div>
											<div class="col-md text-right text-muted"><?=
												$section->num_lessons . ' Clases -  ' . $section->duration_section ?></div>
										</div>
									</a>
								</h4>
							</div>
							<div id="collapse-<?= $section->id ?>"
								 class="panel-collapse collapse <?= !$i ? 'show' : '' ?>"
								 role="tabpanel" aria-labelledby="heading-<?= $section->id ?>">
								<div class="panel-body" style="overflow-x:auto; border-radius: 5px">
									<ul class="course-details__curriculum-list list-unstyled mb-2 mt-2">

										<?php
										foreach ($lessons as $lesson):


											if ($lesson->section_id == $section->id):
												?>

												<li class="align-center">
													<div class="course-details__curriculum-list-left  col-md-9">
														<a href="#" class="col-md-1 icon_lesson ">
															<i class="material-icons"><?= $lesson->icon_type ?></i>
															<!-- /.fas fa-play -->
														</a>
<!--														<div class="view-cicle"></div>-->
														<a href="#play" data-id="<?= $lesson->id ?>"
														   class="col-md-11 lesson-display"><?= $lesson->title ?>
														</a>

													</div>
													<div class="course-details__curriculum-list-right col-md-3">
														<?= $lesson->duration ?>
													</div>

												</li>

											<?php
											endif;
										endforeach;
										?>

									</ul>
								</div>
							</div>
						</div>
						<?php
						$i++;
					endforeach;
					?>

				</div>


			</div>
		</div>

		<div class="col-lg-8" id="container-lesson">

		</div>

	</div>

</section>
