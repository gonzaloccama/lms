<?php
$this->view('admin/template/header');
?>

<div class="container-fluid page__container">
	<?php if ($this->session->flashdata('message')): ?>

		<div class="alert alert-success">

			<button type="button" class="close" data-close="alert"></button>

			<?php echo $this->session->flashdata('message'); ?>

		</div>

	<?php endif; ?>

	<div class="card">
		<div class="card-header card-header-large bg-white">
			<div class="d-flex align-items-center">
				<h4 style="margin-top: 10px;" class="card-header__title"><?= strtoupper($sub_title) ?></h4>
				<a href="<?= base_url() . 'author/courses' ?>" onclick="goBack()"
				   class="btn btn-outline-primary btn-rounded ml-auto"><i class="fas fa-long-arrow-alt-left"></i>
					Lista de cursos</a>
			</div>
		</div>


		<div class="card-body avatar-list">


			<div class="card-header card-header-tabs-basic nav" role="tablist">
				<a href="#activity_básico" class="active" data-toggle="tab" role="tab" aria-controls="activity_all"
				   aria-selected="true"><i class="fas fa-pen-nib"></i> Básico</a>

				<a href="#activity_requerimientos" data-toggle="tab" role="tab" aria-selected="false"><i
							class="fas fa-exclamation-circle"></i> Requerimientos</a>

				<a href="#activity_resultados" data-toggle="tab" role="tab" aria-selected="false"><i
							class="fas fa-clipboard-list"></i> Resultados</a>

				<a href="#activity_precio" data-toggle="tab" role="tab" aria-selected="false"><i
							class="fas fa-money-bill-alt"></i> Precio</a>

				<a href="#activity_media" data-toggle="tab" role="tab" aria-selected="false"><i
							class="fas fa-photo-video"></i> Media</a>

				<a href="#activity_final" data-toggle="tab" role="tab" aria-selected="false"><i
							class="fas fa-check-square"></i> Final</a>
			</div>

			<form method="post" enctype="multipart/form-data" class="card-body tab-content">

				<div class="tab-pane active show fade card-form__body card-body" id="activity_básico">

					<div class="col-lg-12 card-form__body card-body">

						<div class="form-group">
							<label for="title">Título del curso <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="title" name="title" class="form-control form-control-appended"
									   required=""
									   placeholder="Escriba titulo del curso">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-file-signature"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="short_description">Descripción corta </label>
							<div class="input-group input-group-merge">
									<textarea name="short_description" id="short_description"
											  class="form-control form-control-appended"
											  cols="30" rows="2"></textarea>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-newspaper"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="description">Descripción</label>
							<textarea name="description" id="description" cols="30" rows="10"></textarea>

						</div>


						<div class="form-group">
							<label for="sub_category_id">CATEGORIA <span style="color: darkred">*</span></label>
							<select id="sub_category_id" name="sub_category_id" data-toggle="select"
									class="form-control">
								<option value="" selected disabled>Seleccionar categoria</option>
								<?php
								$parent = '';
								if (isset($categories) && !empty($categories)):
									foreach ($categories as $category):
										?>
										<option value="<?= $parent = $category->id ?>" <?= $category->parent ? '' : 'disabled' ?>>
											<?= $category->name ?>
										</option>
									<?php
									endforeach;
								endif;
								?>
							</select>

						</div>

						<?php
						if (isset($categories) && !empty($categories)):
							foreach ($categories as $category):
								if ($category->id == $parent):
									?>
									<input hidden id="category_id" name="category_id" value="<?= $category->parent ?>">
								<?php
								endif;
							endforeach;
						endif;
						?>

						<div class="form-group">
							<label for="level">Nivel</label>
							<select id="level" name="level" data-toggle="select" class="form-control">
								<option value="" selected disabled>Seleccionar nivel</option>
								<?php
								if (isset($levels) && !empty($levels)):
									foreach ($levels as $level):
										?>
										<option value="<?= $level->id_level ?>"><?= $level->level ?></option>
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
										<option value="<?= $language->id_coursel ?>">
											<?= $language->course_language ?>
										</option>
									<?php
									endforeach;
								endif;
								?>
							</select>
						</div>


					</div>
				</div>

				<div class="tab-pane fade" id="activity_requerimientos">
					<div class="col-lg-12 card-form__body card-body">

						<div class="add-requirements">
							<label for="requirements">Requerimientos para el curso</label>

							<div class="form-group input-group">

								<input type="text" id="requirements" name="requirements[]" class="form-control"
									   placeholder="Agrega requicitos">
								<span class="input-group-btn">&ensp;
									<button type="button"
											class="btn btn-outline-primary btn-rounded add_form_requirements"><i
												class="fas fa-plus"></i></button>
              					</span>
							</div>

						</div>


					</div>
				</div>

				<div class="tab-pane fade" id="activity_resultados">
					<div class="col-lg-12 card-form__body card-body">

						<div class="add-outcomes">
							<label for="outcomes">Resultados</label>


							<div class="input-group form-group">

								<input type="text" id="outcomes" name="outcomes[]" class="form-control"
									   placeholder="Agrega resultados">
								<span class="input-group-btn">&ensp;
									<button type="button" class="btn btn-outline-primary btn-rounded add_form_outcomes"><i
												class="fas fa-plus"></i></button>
              					</span>
							</div>


						</div>


					</div>
				</div>

				<div class="tab-pane fade" id="activity_precio">
					<div class="col-lg-12 card-form__body card-body">

						<div class="form-group">
							<label for="is_free_course">Check si el curso de gratuito</label><br>
							<div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
								<input type="checkbox" name="is_free_course" id="is_free_course" value="1"
									   class="custom-control-input"
									   onchange="showContent()">
								<label class="custom-control-label" for="is_free_course"></label>
							</div>
							<!--							<label for="check" style="y: -5px;"></label>-->
						</div>

						<div id="content_free">
							<div class="form-group">

								<label for="price">Precio del curso (S/)<span style="color: darkred">*</span></label>
								<div class="input-group input-group-merge">
									<input name="price" class="form-control form-control-appended" id="price" cols="30"
										   rows="2" placeholder="E.g: 45">
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
										   id="discount_price" cols="30"
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
				</div>

				<div class="tab-pane fade" id="activity_media">
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
									   id="video_url" cols="30"
									   rows="2" placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-video"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">


							<!--							<label for="thumbnail">Example file input</label>-->
							<!--							<input type="file" name="thumbnail" class="form-control-file" id="thumbnail">-->


							<div id="image-form">
								<div>

								</div>
								<label for="thumbnail">Thumbnail del curso</label>
								<div class="input-group my-3">
									<input type="file" name="thumbnail" class="file" accept="image/*" hidden>
									<input type="text" class="form-control" disabled placeholder="Cargar imagen"
										   id="thumbnail">
									<div class="input-group-append">
										<button type="button" class="browse btn btn-primary">Buscar...</button>
									</div>
								</div>
							</div>

							<div class="ml-2 col-sm-6">
								<img src="https://placehold.it/80x80" id="preview" class="img-thumbnail" alt="">
							</div>
						</div>

					</div>
				</div>

				<div class="tab-pane fade" id="activity_final">
					<div class="col-lg-12 card-form__body card-body">
						<div class="form-group">
							<br>
							<center>
								<i class="fas fa-check-double fa-4x" style="color: #51A351;"></i>
								<br>
								<br>
								<h1>¡Bien hecho!</h1>
								<br>
								<h5>Estas apunto de terminar.</h5>
								<br>
								<button type="submit" class="btn btn-outline-primary btn-lg">GUARDAR</button>
							</center>
						</div>
					</div>
				</div>
			</form>


		</div>
	</div>

</div>

<?php
$this->view('author/template/sidebar');
$this->view('admin/template/footer');
?>
