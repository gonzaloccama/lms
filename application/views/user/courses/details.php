<?php

setlocale(LC_MONETARY, "en_US");

?>
<section class="inner-banner">
	<div class="container">
		<ul class="list-unstyled thm-breadcrumb">
			<li><a href="<?= base_url() ?>">Inicio</a></li>
			<li class="active"><a href="<?= base_url() ?>courses"><?= $info['title'] ?></a></li>
		</ul>
		<h2 class="inner-banner__title"><?= $info['title'] ?></h2>
	</div>
</section>

<section class="course-details">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="course-details__content">
					<p class="course-details__author">
						<img src="<?= $course->user_image == ""
								? base_url() . 'assets/admin/images/avatar.png' : base_url() . $course->user_image ?>"
							 width="50" height="50" alt="">
						por <a href="#"><?= $course->name ?></a>
					</p>

					<div class="course-details__top">
						<div class="course-details__top-left">
							<h2 class="course-details__title"><?= $course->title ?></h2>

							<div class="course-one__stars">
                                        <span class="course-one__stars-wrap">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
								<span class="course-one__count">4.8</span>
								<span class="course-one__stars-count">250</span>
							</div>
						</div>
						<div class="course-details__top-right">
							<?php
							foreach ($categories as $category):
								if ($course->sub_category_id == $category->id):
									?>
									<a href="#" class="course-one__category"
									   style="background-color:	<?= $category->color ?>">
										<?= $category->name; ?>
									</a>
								<?php
								endif;
							endforeach;
							?>
						</div>
					</div>


					<div class="">
						<div class="course-one__category shadow"
							 style="background-color:rgba(37, 104, 141, 0.9); border-radius: 1.5px; position: relative; width: 90%; margin-left: 5%;">
							<span class="fas fa-table"></span>
							<span>
								<b>Ultima actualización:</b>
								<?= date_format(date_create($course->last_modified), 'd/m/Y') ?>
							</span>
							<br>
							<span class="fas fa-globe"></span>
							<span>
								<b>Idioma:</b>
								<?= $course->language ?>
							</span>
						</div><!-- /.course-one__category -->
						<div class="card-header shadow p-4" style="position: relative; top: -18px">

							<?= $course->short_description ?>
						</div>
					</div>

					<ul class="course-details__tab-navs list-unstyled nav nav-tabs" role="tablist">
						<li>
							<a class="active" role="tab" data-toggle="tab" href="#container">Contenido</a>
						</li>
						<li>
							<a class="" role="tab" data-toggle="tab" href="#description">Descripción</a>
						</li>
						<li>
							<a class="" role="tab" data-toggle="tab" href="#outcomes">Aprenderas</a>
						</li>
						<li>
							<a class="" role="tab" data-toggle="tab" href="#requirements">Requisitos</a>
						</li>
						<li>
							<a class="" role="tab" data-toggle="tab" href="#review">Reviews</a>
						</li>
					</ul>
					<div class="tab-content course-details__tab-content shadow">
						<div class="tab-pane show active  animated fadeInUp p-4" role="tabpanel" id="container">

							<h3 class="course-details__tab-title">Lorem ipsum dolor sit amet.</h3>
							<br>

							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<?php
								$i = 0;
								foreach ($sections as $section):
									?>
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="heading-<?= $section->id ?>">
											<h4 class="panel-title">
												<a class="<?= !$i ? 'collapse' : 'collapsed' ?>" role="button"
												   data-toggle="collapse" data-parent="#accordion"
												   href="#collapse-<?= $section->id ?>" aria-expanded="true"
												   aria-controls="collapse-<?= $section->id ?>">
													<div class="row title_course">
														<div class="col title"><?= $section->title ?></div>
														<div class="col text-right text-muted"><?=
															$section->num_lessons . ' Clases -  ' . $section->duration_section ?></div>
													</div>
												</a>
											</h4>
										</div>
										<div id="collapse-<?= $section->id ?>"
											 class="panel-collapse collapse <?= !$i ? 'show' : '' ?>"
											 role="tabpanel" aria-labelledby="heading-<?= $section->id ?>">
											<div class="panel-body">
												<ul class="course-details__curriculum-list list-unstyled mb-2 mt-2"
													style="overflow-x:auto;">

													<?php
													foreach ($lessons as $lesson):
														$color = "";
														switch ($lesson->lesson_type) {
															case ($lesson->lesson_type == 'YouTube'
																	|| $lesson->lesson_type == 'Vimeo'
																	|| $lesson->lesson_type == 'Video_url'):
																$color = 'video-icon';
																break;
															case 'Documento':
																$color = 'file-icon';
																break;
															case 'Quiz':
																$color = 'quiz-icon';
																break;
															case 'Imagen':
																$color = 'img-icon';
																break;
														}

														if ($lesson->section_id == $section->id):
															?>

															<li class="align-center">
																<div class="course-details__curriculum-list-left pl-2 col-md-9">
																	<div class="course-details__meta-icon <?= $color ?> col-md-1">
																		<i class="material-icons"><?= $lesson->icon_type ?></i>
																		<!-- /.fas fa-play -->
																	</div>
																	<a href="#" class="col-md-11"><?= $lesson->title ?>
																		<span>Preview</span></a>

																</div>
																<div class="course-details__curriculum-list-right">
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
						<div class="tab-pane animated fadeInUp p-4" role="tabpanel" id="description">
							<div class="" style="font-size: 15px;"><?= $course->description ?></div>

						</div>
						<div class="tab-pane  animated fadeInUp p-4" role="tabpanel" id="outcomes">
							<div class="panel-body">
								<div class="list-group" style="font-size: 15px;">

									<?php

									$outcomes = json_decode($course->outcomes);

									foreach ($outcomes as $lesson):
										?>
										<div class="list-group-item list-group-item-action row">
											<span class="fas fa-spell-check text-success col-sm-1 "></span>
											<span class="col-sm-11"><?= $lesson ?></span>
										</div>
									<?php
									endforeach;
									?>

								</div>
							</div>
						</div>
						<div class="tab-pane  animated fadeInUp p-4" role="tabpanel" id="requirements">
							<div class="panel-body">
								<div class="list-group" style="font-size: 15px;">

									<?php

									$requirements = json_decode($course->requirements);

									foreach ($requirements as $requirement):
										?>
										<span class="list-group-item list-group-item-action">
											<span class="fas fa-spell-check text-primary col-sm-1"></span>
											<span class="col-sm-11"><?= $requirement ?></span>
										</span>
									<?php
									endforeach;
									?>

								</div>
							</div>
						</div>
						<div class="tab-pane  animated fadeInUp" role="tabpanel" id="review">
							<?php
							if (0):
								?>
								<div class="row">
									<div class="col-xl-7 d-flex">
										<div class="course-details__progress my-auto">
											<div class="course-details__progress-item">
												<p class="course-details__progress-text">Excellent</p>

												<div class="course-details__progress-bar">
													<span style="width: 95%"></span>
												</div>
												<p class="course-details__progress-count">5</p>

											</div>
											<div class="course-details__progress-item">
												<p class="course-details__progress-text">Very Good</p>

												<div class="course-details__progress-bar">
													<span style="width: 65%"></span>
												</div>
												<p class="course-details__progress-count">2</p>

											</div>
											<div class="course-details__progress-item">
												<p class="course-details__progress-text">Average</p>

												<div class="course-details__progress-bar">
													<span style="width: 33%"></span>
												</div>
												<p class="course-details__progress-count">1</p>

											</div>
											<div class="course-details__progress-item">
												<p class="course-details__progress-text">Poor</p>

												<div class="course-details__progress-bar">
													<span style="width: 0%" class="no-bubble"></span>
												</div>
												<p class="course-details__progress-count">0</p>

											</div>
											<div class="course-details__progress-item">
												<p class="course-details__progress-text">Terrible</p>

												<div class="course-details__progress-bar">
													<span style="width: 0%" class="no-bubble"></span>
												</div>
												<p class="course-details__progress-count">0</p>

											</div>
										</div>
									</div>
									<div class="col-xl-5 justify-content-xl-end justify-content-sm-center d-flex">
										<div class="course-details__review-box">
											<p class="course-details__review-count">4.6</p>

											<div class="course-details__review-stars">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half"></i>
											</div>
											<p class="course-details__review-text">30 reviews</p>

										</div>
									</div>
								</div>
								<div class="course-details__comment">
									<div class="course-details__comment-single">
										<div class="course-details__comment-top">
											<div class="course-details__comment-img">
												<img src="assets/images/team-1-1.jpg" alt="">
											</div>
											<div class="course-details__comment-right">
												<h2 class="course-details__comment-name">Steven Meyer</h2>

												<div class="course-details__comment-meta">
													<p class="course-details__comment-date">26 July, 2019</p>

													<div class="course-details__comment-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star star-disabled"></i>
													</div>
												</div>
											</div>
										</div>
										<p class="course-details__comment-text">Lorem ipsum is simply free text used by
											copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed
											inventore
											veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

									</div>
									<div class="course-details__comment-single">
										<div class="course-details__comment-top">
											<div class="course-details__comment-img">
												<img src="assets/images/team-1-2.jpg" alt="">
											</div>
											<div class="course-details__comment-right">
												<h2 class="course-details__comment-name">Lina Kelley</h2>

												<div class="course-details__comment-meta">
													<p class="course-details__comment-date">26 July, 2019</p>

													<div class="course-details__comment-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star star-disabled"></i>
														<i class="fa fa-star star-disabled"></i>
													</div>
												</div>
											</div>
										</div>
										<p class="course-details__comment-text">Lorem ipsum is simply free text used by
											copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed
											inventore
											veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

									</div>
								</div>
								<form action="#" class="course-details__comment-form">
									<h2 class="course-details__title">Add a review</h2>
									<p class="course-details__comment-form-text">Rate this Course? <a href="#"
																									  class="fas fa-star"></a><a
												href="#" class="fas fa-star"></a><a href="#" class="fas fa-star"></a><a
												href="#" class="fas fa-star"></a><a href="#" class="fas fa-star"></a>
									</p>

									<div class="row">
										<div class="col-lg-6">
											<input type="text" placeholder="Your Name">
											<input type="text" placeholder="Email Address">
										</div>
										<div class="col-lg-12">
											<textarea placeholder="Write Message"></textarea>
											<button type="submit" class="thm-btn course-details__comment-form-btn">Leave
												a
												Review
											</button>
										</div>
									</div>
								</form>
							<?php
							endif;
							?>
						</div>
					</div>


				</div>
			</div>
			<div class="col-lg-4" style="font-size: 14px">
				<a class="video_thumbnail_course"><img class="img-fluid z-depth-1"
													   src="<?= base_url() . $course->thumbnail ?>"
													   alt="video"
													   data-toggle="modal" width="100%" data-target="#modal1"></a>


				<div class="course-details__price shadow">

					<?php
					if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2):
						?>
						<a href="<?= base_url() . 'user/course/index/' . $course->id ?>"
						   class="thm-btn course-details__price-btn">Ir al curso</a>
					<?php
					else:
						?>
						<p class="course-details__price-text">Precio del curso </p>
						<?php if ($course->is_free_course): ?>
						<p class="course-details__price-amount"><?= "GRATIS" ?></p>
					<?php else: ?>
						<p class="course-details__price-amount"><?= "S/ " . number_format(floatval($course->price), 2); ?></p>
					<?php endif; ?>
						<a href="#" class="thm-btn course-details__price-btn">Comprar ahora</a>
					<?php
					endif;
					?>

				</div>

				<div class="course-details__meta shadow">
					<a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-clock"></i>
                                </span>
						Duración: <span>10 horas</span>
					</a>
					<a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-folder-open"></i>
                                </span>
						Lecturas: <span>6</span>
					</a>
					<a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-user-circle"></i>
                                </span>
						Estudiantes: <span>10</span>
					</a>
					<a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="fas fa-play"></i>
                                </span>
						Video: <span>8 horas</span>
					</a>
					<a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-flag"></i>
                                </span>
						Nivel: <span><?= $course->level ?></span>
					</a>
					<a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-bell"></i>
                                </span>
						Idioma: <span><?= $course->language ?></span>
					</a>
				</div>

				<div class="course-details__list shadow">
					<h2 class="course-details__list-title">Nuevos cursos</h2>
					<?php
					foreach ($courses as $cours):
						?>
						<div class="course-details__list-item">
							<div class="course-details__list-img">
								<img src="<?= base_url() . $cours->thumbnail ?>" alt="">
							</div>
							<div class="course-details__list-content">
								<a class="course-details__list-author" href="#">por
									<span><?= $course->name ?></span></a>
								<h3>
									<a href="<?= base_url() . 'courses/' . $cours->id . '/' . $cours->user_id ?>">
										<?= $cours->title ?>
									</a>
								</h3>
								<div class="course-details__list-stars">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<span>4.8</span>
								</div>
							</div>
						</div>

					<?php
					endforeach;
					?>

				</div>
			</div>
		</div>
	</div>
</section>
