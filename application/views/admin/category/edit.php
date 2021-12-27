<?php
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
				<h4 style="margin-top: 10px;text-transform: uppercase;"><?= strtoupper($info['sub_title']).' '.strtoupper($result->name) ?></h4>
				<a href="<?= base_url() . 'admin/category' ?>"
				   class="btn btn-outline-primary ml-auto"><i class="material-icons">arrow_back_ios</i>
					Categorias</a>
			</div>
		</div>
		<div class="card-body card-body-large">

			<div class="card-group-row card-group-row__card card-form__body pt-2 pl-2 pr-2">

				<div class="col-lg-12 card-form__body card-body">

					<form method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="name">Nombre de la categoria <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="name" name="name" class="form-control"
									   value="<?= set_value("name", $result->name); ?>"
									   placeholder="Escriba titulo del curso">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-file-signature"></span>
									</div>
								</div>
							</div>
							<?= form_error("name",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>

						<div class="form-group">
							<label for="parent">Categoria padre <span style="color: darkred">*</span></label>
							<select id="parent" name="parent" data-toggle="select"
									class="form-control">
								<option value="">Ninguno</option>
								<?php
								if (isset($categories) && !empty($categories)):
									foreach ($categories as $category):
										if (!$category->parent):
											?>
											<option value="<?= $category->id ?>"
													<?= $result->parent == $category->id ? 'selected' : '' ?>>
												<?= $category->name ?>
											</option>
										<?php
										endif;
									endforeach;
								endif;
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="color">Color <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="color" id="color" name="color" class="form-control"
									   value="<?= set_value("color", "$result->color"); ?>">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="material-icons">colorize</span>
									</div>
								</div>
							</div>
							<?= form_error("color",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>

						<div class="form-group" id="category-imagen" <?= $result->parent == 0 ? '' : 'style="display:none;"' ?>>

							<div id="image-form">
								<?php
								//echo $result->thumbnail;
								$tmp = explode('/', $result->thumbnail);
								$img = end($tmp);
								?>
								<label for="thumbnail">Thumbnail categoria</label>
								<div class="col text-center my-2">
									<div class="ml-2">
										<img src="<?= $result->thumbnail != '' ? base_url() . $result->thumbnail : 'https://placehold.it/80x80' ?>"
											 id="preview_thumbnail" class="img-thumbnail" alt="" width="100"
											 height="100">
									</div>
								</div>
								<div class="input-group my-3">
									<input type="file" name="thumbnail" class="file" accept="image/png, image/jpeg"
										   hidden>
									<input type="text" class="form-control" disabled placeholder="Cargar imagen"
										   id="thumbnail" value="<?= $result->id ? $img : '' ?>">
									<div class="input-group-append">
										<button type="button" class="browse btn btn-primary">Buscar...</button>
									</div>
								</div>
							</div>

						</div>

						<div class="form-group">
							<div class="col text-center">
								<input type="submit" class="btn btn-outline-success btn-lg my-4" value="Actualizar">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>


<?php
$this->view($info['sidebar']);
$this->view('admin/template/footer');
?>
