<?php
$this->view('admin/template/header');
?>

<div class="container-fluid page__container">
	<div class="card">
		<div class="card-header  bg-white">

			<div class="d-flex align-items-center">
				<h4 style="margin-top: 10px;" class="card-header__title"><?= strtoupper($sub_title) ?></h4>
				<a href="<?= base_url() . 'author/courses/add' ?>"
				   class="btn btn-outline-primary btn-rounded ml-auto"><i class="material-icons">add</i>
					Nuevo curso</a>
			</div>

		</div>
	</div>


	<div class="card">
		<div class="card-header card-header-large bg-white">
			<h4 class="card-header__title">LISTA DE CURSOS</h4>
		</div>
		<div class="card-body avatar-list">
			<form action="#" class="mb-3 border-bottom pb-3">
				<div class="d-flex">
					<div class="search-form mr-3 search-form--light">
						<input type="text" class="form-control" placeholder="Buscar curso" id="searchSample02">
						<button class="btn" type="button"><i class="material-icons">search</i></button>
					</div>

					<div class="form-inline ml-auto">
						<div class="form-group mr-3">
							<label for="custom-select" class="form-label mr-1">Categoría</label>
							<select id="custom-select" class="form-control custom-select" style="width: 200px;">
								<option selected>Todas las categorias</option>
								<option value="1">Vue.js</option>
								<option value="2">Node.js</option>
								<option value="3">GitHub</option>
							</select>
						</div>
						<div class="form-group">
							<label for="published01" class="form-label mr-1">Publicado</label>
							<select id="published01" class="form-control custom-select" style="width: 200px;">
								<option selected>Publicado</option>
								<option value="1">Espera</option>
								<option value="3">Todas</option>
							</select>
						</div>
					</div>
				</div>
			</form>
			<div class="container">
				<div class="row tab-pane active show fade card-form__body card-body">
					<!--				<div class="card-form__body card-body">-->
					<?php
					foreach ($courses as $course):
						?>

						<div class="col-md-6">

							<div class="card">

								<div class="card-body">


									<div class="d-flex flex-column flex-sm-row">
										<a href="#" class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
											<img src="<?= base_url() . $course->thumbnail ?>"
												 alt="Card image cap" class="avatar-course-img">
										</a>
										<div class="flex" style="min-width: 200px;">
											<div class="d-flex">
												<div>
													<h4 class="card-title mb-1"><a href="#"><?= $course->title ?></a>
													</h4>

													<p class="text-muted block-ellipsis">
														<?= $course->short_description ?>
													</p>
												</div>
												<div class="dropdown ml-auto">
													<a href="#" class="dropdown-toggle text-muted" data-caret="false"
													   data-toggle="dropdown">
														<i class="material-icons">more_vert</i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item"
														   href="<?= base_url() . 'author/courses/curriculum/' . urlencode($course->id) ?>/4">Editar
															curso</a>
														<a class="dropdown-item" href="#">Estadísticas</a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item text-danger" href="#">Archivar</a>
													</div>
												</div>
											</div>
											<div class="d-flex align-items-end">
												<div class="d-flex flex flex-column mr-3">
													<div class="d-flex align-items-center py-2 border-bottom">
														<span class="mr-2"><?= $course->is_free_course ? 'GRATIS' : 'S&sol; ' . $course->price ?></span>
														<small class="text-muted ml-auto">34 SALES</small>
													</div>
													<div class="d-flex align-items-center py-2">
														<span class="badge mr-2"
															  style="color: white; background-color: <?= $course->color ?>"><?= $course->category ?></span>
														<span class="badge badge-soft-secondary"><?= $course->level ?></span>
													</div>
												</div>
											</div>
										</div>
									</div>


								</div>

							</div>

						</div>
					<?php
					endforeach;
					?>
					<!--				</div>-->
				</div>
			</div>
		</div>
	</div>

</div>

<?php
$this->view('author/template/sidebar');
$this->view('admin/template/footer');
?>
