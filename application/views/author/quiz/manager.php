<?php defined('BASEPATH') or exit('No direct script access allowed');

$this->view('admin/template/header');

?>

<div class="container-fluid page__container">

	<div id="noti-action"></div>
	<?php if ($this->session->flashdata('message')): ?>

		<div class="alert alert-dismissible bg-success text-white border-0 fade show" role="alert">
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
				<h4 style="margin-top: 10px;text-transform: uppercase;" ><?= strtoupper($info['sub_title']) ?></h4>
				<a href="<?= base_url() . 'author/dashboard' ?>"
				   class="btn btn-outline-primary ml-auto"><i class="fas fa-long-arrow-alt-left"></i>
					Regresar</a>
			</div>
		</div>
		<div class="card-body bg-secondary">

			<div class="d-flex">
				<div class="search-form mr-3 search-form--light">
					<input type="text" class="form-control" placeholder="Buscar..." name="search_text"
						   id="search_text" aria-label="Search">
					<button class="btn" type="button" id="searchBtn"><i class="material-icons">search</i></button>
				</div>

				<div class="form-inline ml-auto">
					<div class="form-group mr-3">
						<label for="custom-select" class="form-label mr-1 text-white">Categoría</label>
						<select id="custom-select" class="form-control custom-select" style="width: 200px;">
							<option selected value="0">Todas las categorias</option>
							<?php
							if (isset($categories) && !empty($categories)):
								foreach ($categories as $category):
									?>
									<option value="<?= $category->id ?>"><?= $category->name ?></option>
								<?php
								endforeach;
							endif;
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="actived01" class="form-label mr-1 text-white">Publicado</label>
						<select id="actived01" class="form-control custom-select" style="width: 200px;">
							<option value="0" selected>Todas</option>
							<option value="1">Activos</option>
							<option value="2">Pendientes</option>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="card-body card-body-large tab-content">
			<div class="container-fluid page__container">
				<div class="card-columns">
					<?php
					foreach ($courses as $course):
						?>
						<div class="card">
							<div class="card-body media">
								<div class="media-left">
									<a href="#" class="avatar avatar-lg mr-1">
										<img src="<?= base_url().$course->thumbnail ?>" alt="Card image cap"
											 class="avatar-course-img">
									</a>
								</div>
								<div class="media-body align-self-center">
									<h4 class="card-title mb-0"><a href="#"><?= $course->title ?></a></h4>
									<span class="text-muted">25 Completado</span>
								</div>
							</div>
							<div class="card-footer d-flex bg-light">
								<div>
									<a href="#" class="btn btn-light btn-sm">Pendiente <span
												class="badge badge-soft-secondary ml-1">5</span></a>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-primary btn-sm"><i
												class="material-icons icon-16pt">edit</i> Editar </a>
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

</div>

<?php
$this->view($info['sidebar']);
$this->view('admin/template/footer');
?>
