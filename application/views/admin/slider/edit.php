<?php
$this->view('admin/template/header');
?>

<div class="container-fluid page__container">

	<div id="noti-action"></div>
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
				<h4 style="margin-top: 10px;text-transform: uppercase;"><?= strtoupper($info['sub_title']) ?></h4>
				<a href="<?= base_url() . 'admin/slider' ?>"
				   class="btn btn-outline-primary ml-auto"><i class="material-icons">chevron_left</i>
					Sliders</a>
			</div>
		</div>
		<div class="card-body card-body-large">

			<div class="card-group-row card-group-row__card card-form__body pt-2 pl-2 pr-2">

				<div class="col-lg-12 card-form__body card-body">

					<form method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="name">Titulo <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="title" name="title" class="form-control"
									   value="<?= set_value("title", $result->title); ?>"
									   placeholder="Escriba titulo del slide">
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
							<label for="phrase">Descripción <span style="color: darkred">(15 palabras) *</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="phrase" name="phrase" class="form-control"
									   value="<?= set_value("phrase", $result->phrase); ?>"
									   placeholder="Escriba descripción corta">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-file-signature"></span>
									</div>
								</div>
							</div>
							<?= form_error("phrase",
								"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</p>") ?>
						</div>

						<div class="form-group" id="slider-imagen">

							<div id="image-form">
								<div>

								</div>
								<label for="slide_img">Imagen del slider <span style="color: darkred">(imagen 440x742 pixeles)</span></label>
								<div class="col text-center my-2">
									<div class="ml-2">
										<img
											src="<?= $result->slide_img != '' ? base_url() . $result->slide_img : 'https://placehold.it/80x80' ?>"
											id="preview_thumbnail" class="img-thumbnail" alt=""
											width="100" height="100">
									</div>
								</div>
								<div class="input-group my-3">
									<input type="file" name="slide_img" class="file" accept="image/png, image/jpeg"
										   hidden>
									<input type="text" class="form-control" disabled placeholder="Cargar imagen"
										   id="slide_img">
									<div class="input-group-append">
										<button type="button" class="browse btn btn-primary">Buscar...</button>
									</div>
								</div>
							</div>

						</div>

						<div class="form-group">
							<label for="link_read_more">Leer mas <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="link_read_more" name="link_read_more" class="form-control"
									   value="<?= set_value("link_read_more", $result->link_read_more); ?>"
									   placeholder="Link:http://">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-link"></span>
									</div>
								</div>
							</div>
							<?= form_error("link_read_more",
								"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</p>") ?>
						</div>

						<div class="form-group">
							<div class="col text-center">
								<input type="submit" class="btn btn-outline-success btn-lg my-4" value="Guardar">
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
