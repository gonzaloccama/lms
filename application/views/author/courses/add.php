<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
$this->view('admin/template/header');
$this->view('admin/next_back');
?>

<div class="container-fluid page__container">
	<?php if ($this->session->flashdata('message')): ?>

		<div class="alert alert-dismissible bg-primary text-white border-0 fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong><i class="fas fa-exclamation-circle"></i> Aviso -
			</strong> <?php echo $this->session->flashdata('message'); ?>
		</div>

	<?php endif; ?>

	<div class="card shadow">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h4 style="margin-top: 10px;text-transform: uppercase;"><?= strtoupper($info['sub_title']) ?></h4>
				<a href="<?= ($this->uri->segment(1) == 'admin') ? base_url() . 'admin/courses' : base_url() . 'author/courses' ?>"
				   class="btn btn-outline-primary ml-auto"><i class="material-icons">chevron_left</i>
					Cursos</a>
			</div>
		</div>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark nav">
			<div class="container-fluid">

				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto " id="next_back_header" role="tablist">
						<li class="nav-item">
							<a href="#activity_básico" class="active nav-link pl-3" data-toggle="tab" role="tab"
							   aria-controls="activity_all" aria-selected="true">
								<i class="fas fa-list-alt"></i> General
							</a>
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
			<form method="post" enctype="multipart/form-data" class="tab-content">

				<div class="tab-pane active show fade card-form__body card-body" id="activity_básico">

					<div class="col-lg-12 card-form__body card-body">

						<div class="form-group">
							<label for="title">Título del curso <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="title" name="title" class="form-control form-control-appended"
									   value="<?= set_value("title"); ?>"
									   placeholder="Escriba titulo del curso">
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
							<label for="short_description">Descripción corta <span
										style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
									<textarea name="short_description" id="short_description"
											  class="form-control form-control-appended"
											  cols="30" rows="2"><?= set_value("short_description"); ?></textarea>
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
							<textarea name="description" id="description" cols="30" rows="10">
								<?= set_value("description"); ?>
							</textarea>

						</div>


						<div class="form-group">
							<label for="sub_category_id">CATEGORIA <span style="color: darkred">*</span></label>
							<select id="sub_category_id" name="sub_category_id" data-toggle="select"
									class="form-control">
								<option value="" selected disabled>Seleccionar categoria</option>
								<?php

								if (isset($categories) && !empty($categories)):
									foreach ($categories as $category):
										if ($category->parent):
											?>
											<option value="<?= $category->id ?>"
													<?= set_select('sub_category_id', $category->id); ?>>
												<?= $category->name ?>
											</option>

										<?php
										endif;
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
								<option value="" selected disabled>Seleccionar nivel</option>
								<?php
								if (isset($levels) && !empty($levels)):
									foreach ($levels as $level):
										?>
										<option value="<?= $level->id_level ?>"
												<?= set_select('level', "$level->id_level"); ?>>
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
								<option value="" selected disabled>Seleccionar idioma</option>
								<?php
								if (isset($languages) && !empty($languages)):
									foreach ($languages as $language):
										?>
										<option value="<?= $language->id_coursel ?>"
												<?= set_select('language', "$language->id_coursel"); ?>>
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
						next_back('disabled', '');
						?>
					</div>

				</div>

				<div class="tab-pane show fade card-form__body card-body" id="activity_requerimientos">
					<div class="col-lg-12 card-form__body card-body">

						<div class="add-requirements">
							<label for="requirements">Requerimientos para el curso</label>

							<?php
							$requi = set_value("requirements")
							?>
							<div class="input-group mb-3 form-group">
								<input type="text" class="form-control" id="requirements" name="requirements[]"
									   placeholder="Agrega requicitos" value="<?=
								isset($requi[0]) && !empty($requi[0])
										? $requi[0] : '';
								?>">
								<div class="input-group-append">
									<button class="btn btn-outline-primary add_form_requirements" type="button"><i
												class="fas fa-plus"></i></button>
								</div>
							</div>

							<?php
							if (isset($requi) && !empty($requi)):
								for ($i = 1; $i < count($requi); $i++):
									?>

									<div class="input-group mb-3 form-group">
										<input type="text" class="form-control" id="requirements-<?= $i ?>"
											   name="requirements[]"
											   placeholder="Agrega requerimiento" value="<?= $requi[$i] ?>">
										<div class="input-group-append">
											<button class="btn btn-outline-danger delete_requirements" type="button"><i
														class="fas fa-minus"></i></button>
										</div>
									</div>

								<?php
								endfor;
							endif;
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

						<div class="add-outcomes">
							<label for="outcomes">Resultados</label>

							<?php
							$outc = set_value("outcomes");

							?>
							<div class="input-group mb-3 form-group">
								<input type="text" class="form-control" id="outcomes-0" name="outcomes[]"
									   placeholder="Agrega resultados" value="<?=
								isset($outc[0]) && !empty($outc[0])
										? $outc[0] : '';
								?>">
								<div class="input-group-append">
									<button class="btn btn-outline-primary add_form_outcomes" type="button"><i
												class="fas fa-plus"></i></button>
								</div>
							</div>

							<?php
							if (isset($outc) && !empty($outc)):
								for ($i = 1; $i < count($outc); $i++):
									?>
									<div class="input-group mb-3 form-group">
										<input type="text" class="form-control" id="outcomes-<?= $i ?>"
											   name="outcomes[]"
											   placeholder="Agrega resultados" value="<?= $outc[$i] ?>">
										<div class="input-group-append">
											<button class="btn btn-outline-danger delete_outcomes" type="button"><i
														class="fas fa-minus"></i></button>
										</div>
									</div>

								<?php
								endfor;
							endif;
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

						<div class="form-group">
							<label for="is_free_course">Check si el curso de gratuito</label><br>
							<div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
								<input type="checkbox" name="is_free_course" id="is_free_course" value="1"
									   class="custom-control-input"
								>
								<label class="custom-control-label" for="is_free_course"></label>
							</div>
							<!--							<label for="check" style="y: -5px;"></label>-->
						</div>

						<div id="content_free">
							<div class="form-group">

								<label for="price">Precio del curso (S/)<span style="color: darkred">*</span></label>
								<div class="input-group input-group-merge">
									<input type="text" name="price" class="form-control form-control-appended"
										   id="price" cols="30" rows="2" placeholder="E.g: 45.90"
										   value="<?= set_value("price") ?>">
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-money-bill-alt"></span>
										</div>
									</div>
								</div>

								<?= form_error("price",
										"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
										"</p>") ?>
							</div>

							<div class="form-group">

								<label for="discount_price">Descuento del curso (S/) </label>
								<div class="input-group input-group-merge">
									<input name="discount_price" class="form-control form-control-appended"
										   id="discount_price" cols="30" rows="2" placeholder="E.g: 9.90"
										   value="<?= set_value("discount_price") ?>">
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-money-bill-alt"></span>
										</div>
									</div>
								</div>
								<?= form_error("discount_price",
										"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
										"</p>") ?>
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
						<div class="form-group">
							<label for="course_overview_provider">Proveedor del video principal del curso</label>
							<select id="course_overview_provider" name="course_overview_provider" data-toggle="select"
									class="form-control">
								<option selected="" value="YouTube">YouTube</option>
								<option value="Vimeo">Vimeo</option>
								<option value="Google Drive">Google Drive</option>
							</select>
						</div>

						<div class="form-group">
							<label for="video_url">Enlace del video </label>
							<div class="input-group input-group-merge">
								<input name="video_url" class="form-control form-control-appended"
									   id="video_url" cols="30" rows="2"
									   placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w"
									   value="<?= set_value("video_url") ?>">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-video"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">

							<div id="image-form">
								<div>

								</div>
								<label for="thumbnail">Thumbnail del curso</label>
								<div class="col text-center my-2">
									<div class="ml-2">
										<img src="https://placehold.it/80x80" id="preview_thumbnail"
											 class="img-thumbnail" alt=""
											 width="100" height="100">
									</div>
								</div>
								<div class="input-group my-3">
									<input type="file" name="thumbnail" class="file" accept="image/*" hidden>
									<input type="text" class="form-control" disabled placeholder="Cargar imagen"
										   id="thumbnail">
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
