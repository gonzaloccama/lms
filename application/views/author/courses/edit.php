<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$this->view('admin/template/header');
$this->view('admin/next_back');
?>


<div class="container-fluid page__container">

	<?php if ($this->session->flashdata('message')): ?>

		<div class="alert alert-dismissible bg-success text-white border-0 fade show" role="alert">
			<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong><i class="fas fa-exclamation-circle"></i> Aviso -
			</strong> <?php echo $this->session->flashdata('message'); ?>
		</div>

	<?php endif; ?>

	<div class="card shadow">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<div class="ml-2">
					<img src="<?php
					if ($course->thumbnail):
						echo base_url() . $course->thumbnail;
					else:
						if ($course->thumbnail_old):
							echo base_url() . $course->thumbnail_old;
						else:
							echo 'https://placehold.it/80x80';
						endif;
					endif;
					?>"

						 class="img-thumbnail" alt="" width="35" height="35">
				</div>&ensp;
				<h4 style="margin-top: 10px;text-transform: uppercase;"><?= strtoupper($info['sub_title']) ?></h4>
				<a href="<?= ($this->uri->segment(1) == 'admin') ? base_url() . 'admin/courses' : base_url() . 'author/courses' ?>"
				   class="btn btn-outline-primary ml-auto">
					<i class="material-icons">chevron_left</i>
					Cursos
				</a>
			</div>
		</div>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark nav">
			<div class="container-fluid">

				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto " id="next_back_header" role="tablist">
						<li class="nav-item">
							<a href="#activity_curricula" class="active nav-link pl-3" data-toggle="tab" role="tab"
							   aria-controls="activity_all" aria-selected="true">
								<i class="fas fa-list-alt"></i> Curricula
							</a>
						</li>
						<li class="nav-item">

							<a href="#activity_básico" class="nav-link" data-toggle="tab" role="tab"
							   aria-selected="false"><i class="fas fa-pen-nib"></i> General</a>

						</li>
						<li class="nav-item">
							<a href="#activity_requerimientos" class="nav-link" data-toggle="tab" role="tab"
							   aria-selected="false"><i
										class="fas fa-exclamation-circle"></i> Requerimientos</a>
						</li>
						<li class="nav-item">
							<a href="#activity_resultados" class="nav-link" data-toggle="tab" role="tab"
							   aria-selected="false"><i
										class="fas fa-clipboard-list"></i> Resultados</a>
						</li>
						<li class="nav-item">
							<a href="#activity_precio" class="nav-link" data-toggle="tab" role="tab"
							   aria-selected="false"><i
										class="fas fa-money-bill-alt"></i> Precio</a>
						</li>
						<li class="nav-item">
							<a href="#activity_media" class="nav-link" data-toggle="tab" role="tab"
							   aria-selected="false"><i
										class="fas fa-photo-video"></i> Media</a>
						</li>
						<li class="nav-item">
							<a href="#activity_final" class="nav-link" data-toggle="tab" role="tab"
							   aria-selected="false"><i
										class="fas fa-check-square"></i> Final</a>
						</li>
					</ul>
				</div>
			</div>

		</nav>


		<div class="card-body avatar-list">

			<form method="post" enctype="multipart/form-data" class="tab-content ">

				<div class="tab-pane active show fade card-form__body card-body" id="activity_curricula">

					<div class="col-lg-12 card-form__body card-body">

						<div id="noti-action"></div>
						<div class="card">
							<div class="card-body">
								<div class="text-center col-md">
									<div class="btn-group mb-2 mt-2">
										<button type="button" class="btn btn-outline-secondary"
												style="width: 90px" id="btn-add-section">
											<span class="material-icons">post_add</span>
											<br>Sección
										</button>
										<button type="button" class="btn btn-outline-secondary" style="width: 90px"
												id="sort-section"><span class="material-icons">post_add</span>
											<br>Sort
										</button>
									</div>

									<div class="btn-group mb-2 mt-2">
										<a href="" type="button" class="btn btn-outline-secondary" style="width: 90px"
										   data-toggle="modal"
										   data-target="#modal-type-lesson">
											<span class="material-icons">post_add</span><br>Lección</a>
										<button type="button" class="btn btn-outline-secondary" style="width: 90px"
												id="add-lesson-quiz" data-name="Quiz">
											<span class="material-icons">post_add</span><br>Quiz
										</button>

									</div>
								</div>
							</div>
						</div>

						<div id="accordion">

						</div>

					</div>

					<div class="col-lg-12 card-form__body card-footer">
						<?php
						next_back('disabled', '');
						?>
					</div>

				</div>

				<div class="tab-pane show fade card-form__body card-body" id="activity_básico">

					<input type="text" name="id" id="id" value="<?= $course->id ?>" hidden autocomplete="off">

					<div class="col-lg-12 card-form__body card-body">
						<div class="pt-4"></div>
						<div class="form-group">
							<label for="title">Título del curso <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="title" name="title" class="form-control form-control-appended"
									   placeholder="Escriba titulo del curso"
									   value="<?= set_value("title", html_entity_decode($course->title)); ?>">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-file-signature"></span>
									</div>
								</div>
							</div>
							<?= form_error("title",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>

						<div class="form-group">
							<label for="short_description">Descripción corta </label>
							<div class="input-group input-group-merge">
									<textarea name="short_description" id="short_description"
											  class="form-control form-control-appended"
											  cols="30"
											  rows="2"><?= set_value("short_description", html_entity_decode($course->short_description)); ?>
									</textarea>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-newspaper"></span>
									</div>
								</div>
							</div>
							<?= form_error("short_description",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>

						<div class="form-group">
							<label for="description">Descripción</label>
							<textarea name="description" id="description" cols="30"
									  rows="10"><?= set_value("description", html_entity_decode($course->description)); ?></textarea>

						</div>

						<div class="form-group">
							<label for="sub_category_id">CATEGORIA <span style="color: darkred">*</span></label>
							<select id="sub_category_id" name="sub_category_id" data-toggle="select"
									class="form-control">
								<option value="" disabled>Seleccionar categoria</option>
								<?php
								if (isset($categories) && !empty($categories)):
									foreach ($categories as $category):
										?>
										<option value="<?= $category->id ?>" <?= $category->parent ? '' : 'disabled' ?>
												<?= $course->sub_category_id == $category->id ? 'selected' : ""; ?>
												<?= set_select('sub_category_id', $category->id); ?>>
											<?= $category->name ?>
										</option>
									<?php
									endforeach;
								endif;
								?>
							</select>
							<?= form_error("sub_category_id",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

						</div>



						<div class="form-group">
							<label for="level">Nivel</label>
							<select id="level" name="level" data-toggle="select" class="form-control">
								<option value="" disabled>Seleccionar nivel</option>
								<?php

								if (isset($levels) && !empty($levels)):
									foreach ($levels as $level):
										?>
										<option value="<?= $level->id_level ?>" <?= $course->level != $level->id_level ? '' : 'selected'; ?>>
											<?= $level->level ?>
										</option>
									<?php
									endforeach;
								endif;
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="language">Idioma</label>
							<select id="language" name="language" data-toggle="select" class="form-control">
								<option value="" disabled>Seleccionar idioma</option>
								<?php
								if (isset($languages) && !empty($languages)):
									foreach ($languages as $language):
										?>
										<option value="<?= $language->id_coursel ?>"
												<?= $course->language == $language->id_coursel ? 'selected' : ""; ?>>
											<?= $language->course_language ?>
										</option>
									<?php
									endforeach;
								endif;
								?>
							</select>
						</div>
					</div>
					<div class="col-lg-12 card-form__body card-footer">
						<?php
						next_back('', '');
						?>
					</div>
				</div>

				<div class="tab-pane show fade card-form__body card-body" id="activity_requerimientos">
					<div class="col-lg-12 card-form__body card-body">
						<div class="pt-4"></div>
						<div class="add-requirements">
							<label for="requirements">Requerimientos para el curso</label>

							<?php
							$requirements = json_decode($course->requirements);
							?>
							<div class="input-group mb-3 form-group">
								<input type="text" class="form-control" id="requirements" name="requirements[]"
									   placeholder="Agrega requicitos" value="<?= $requirements[0] ?>">
								<div class="input-group-append">
									<button class="btn btn-outline-primary add_form_requirements" type="button"><i
												class="fas fa-plus"></i></button>
								</div>
							</div>

							<?php
							for ($i = 1; $i < count($requirements); $i++):
								?>

								<div class="input-group mb-3 form-group">
									<input type="text" class="form-control" id="requirements-<?= $i ?>"
										   name="requirements[]"
										   placeholder="Agrega requerimiento" value="<?= $requirements[$i] ?>">
									<div class="input-group-append">
										<button class="btn btn-outline-danger delete_requirements" type="button"><i
													class="fas fa-minus"></i></button>
									</div>
								</div>

							<?php
							endfor;
							?>

						</div>
					</div>
					<div class="col-lg-12 card-form__body card-footer">
						<?php
						next_back('', '');
						?>
					</div>
				</div>

				<div class="tab-pane show fade card-form__body card-body" id="activity_resultados">
					<div class="col-lg-12 card-form__body card-body">
						<div class="pt-4"></div>
						<div class="add-outcomes">
							<label for="outcomes">Resultados</label>

							<?php
							$outcomes = json_decode($course->outcomes);
							?>
							<div class="input-group mb-3 form-group">
								<input type="text" class="form-control" id="outcomes-0" name="outcomes[]"
									   placeholder="Agrega resultados" value="<?= $outcomes[0] ?>">
								<div class="input-group-append">
									<button class="btn btn-outline-primary add_form_outcomes" type="button"><i
												class="fas fa-plus"></i></button>
								</div>
							</div>

							<?php
							for ($i = 1; $i < count($outcomes); $i++):
								?>
								<div class="input-group mb-3 form-group">
									<input type="text" class="form-control" id="outcomes-<?= $i ?>" name="outcomes[]"
										   placeholder="Agrega resultados" value="<?= $outcomes[$i] ?>">
									<div class="input-group-append">
										<button class="btn btn-outline-danger delete_outcomes" type="button"><i
													class="fas fa-minus"></i></button>
									</div>
								</div>

							<?php
							endfor;
							?>
						</div>
					</div>
					<div class="col-lg-12 card-form__body card-footer">
						<?php
						next_back('', '');
						?>
					</div>
				</div>

				<div class="tab-pane show fade card-form__body card-body" id="activity_precio">
					<div class="col-lg-12 card-form__body card-body">
						<div class="pt-4"></div>
						<div class="form-group">
							<label for="is_free_course">Check si el curso de gratuito</label><br>
							<div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
								<input type="checkbox" name="is_free_course" id="is_free_course" value="1"
									   class="custom-control-input" <?= !$course->is_free_course ? '' : 'checked' ?>>
								<label class="custom-control-label" for="is_free_course"></label>
							</div>
							<!--							<label for="check" style="y: -5px;"></label>-->
						</div>

						<div id="content_free" <?= !$course->is_free_course ? '' : 'style="display:none;"' ?>>
							<div class="form-group">

								<label for="price">Precio del curso (S/)<span style="color: darkred">*</span></label>
								<div class="input-group input-group-merge">
									<input name="price" class="form-control form-control-appended" id="price" cols="30"
										   rows="2" placeholder="E.g: 45" value="<?= $course->price ?>">
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-money-bill-alt"></span>
										</div>
									</div>
								</div>

							</div>

							<div class="form-group">

								<label for="discount_price">Descuento del curso (S/) </label>
								<div class="input-group input-group-merge">
									<input name="discount_price" class="form-control form-control-appended"
										   id="discount_price" cols="30" value="<?= $course->discount_price ?>"
										   rows="2" placeholder="E.g: 10">
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-money-bill-alt"></span>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="col-lg-12 card-form__body card-footer">
						<?php
						next_back('', '');
						?>
					</div>
				</div>

				<div class="tab-pane show fade card-form__body card-body" id="activity_media">
					<div class="col-lg-12 card-form__body card-body">
						<div class="pt-4"></div>
						<div class="form-group">
							<label for="course_overview_provider">Proveedor del video principal del curso</label>
							<select id="course_overview_provider" name="course_overview_provider" data-toggle="select"
									class="form-control">
								<option value="YouTube" <?= $course->course_overview_provider == 'YouTube' ? 'selected' : '' ?>>
									YouTube
								</option>
								<option value="Vimeo" <?= $course->course_overview_provider == 'Vimeo' ? 'selected' : '' ?>>
									Vimeo
								</option>
								<option value="Url" <?= $course->course_overview_provider == 'Url' ? 'selected' : '' ?>>
									Video url
								</option>
							</select>
						</div>

						<div class="form-group">
							<label for="video_url">Enlace del video </label>
							<div class="input-group input-group-merge">
								<input name="video_url" class="form-control form-control-appended"
									   id="video_url" cols="30" value="<?= $course->video_url ?>"
									   rows="2" placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-video"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<?php
							$tmp = explode('/', $course->thumbnail);
							$tmp_img = end($tmp);
							?>

							<div id="image-form">

								<label for="thumbnail">Thumbnail del curso</label>
								<input type="text" name="thumbnail_old" id="thumbnail_old"
									   value="<?= $course->thumbnail != null ? $course->thumbnail : $course->thumbnail_old ?>"
									   hidden>
								<div class="col text-center my-2">
									<div class="ml-2">
										<img src="<?php
										if ($course->thumbnail):
											echo base_url() . $course->thumbnail;
										else:
											if ($course->thumbnail_old):
												echo base_url() . $course->thumbnail_old;
											else:
												echo 'https://placehold.it/80x80';
											endif;
										endif;
										?>"

											 id="preview_thumbnail" class="img-thumbnail" alt="" width="100"
											 height="100">
									</div>
								</div>
								<div class="input-group my-3">
									<input type="file" name="thumbnail" data-default-file="<?= $course->thumbnail ?>"
										   class="file" accept="image/*" hidden>
									<input type="text" class="form-control" disabled placeholder="Cargar imagen"
										   id="thumbnail" value="<?= $tmp_img ?>">
									<div class="input-group-append">
										<button type="button" class="browse btn btn-primary">Buscar...</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 card-form__body card-footer">
						<?php
						next_back('', '');
						?>
					</div>
				</div>

				<div class="tab-pane show fade card-form__body card-body" id="activity_final">
					<div class="col-lg-12 card-form__body card-body">
						<div class="pt-4"></div>
						<div class="form-group">

							<div class="col text-center my-3">
								<i class="fas fa-check-double fa-4x my-4" style="color: #51A351;"></i>

								<h1 class="my-4">¡Bien hecho!</h1>

								<h5 class="my-4">Estas apunto de terminar.</h5>

								<button type="submit" class="btn btn-outline-primary btn-lg my-4">GUARDAR</button>
							</div>
						</div>
					</div>
					<div class="col-lg-12 card-form__body card-footer">
						<?php
						next_back('', 'disabled');
						?>
					</div>
				</div>

			</form>


		</div>
	</div>


</div>

<?php
$this->view($info['sidebar']);
$this->view('admin/template/footer');
?>

