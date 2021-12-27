<?php
$this->view('admin/template/header');
$this->view('admin/next_back');
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
				<?php if ($this->uri->segment(2) == 'instructor'): ?>
					<a href="<?= base_url() . 'admin/instructor' ?>"
					   class="btn btn-outline-primary ml-auto"><i class="material-icons">chevron_left</i>
						Intructor</a>
				<?php elseif ($this->uri->segment(2) == 'student'): ?>
					<a href="<?= base_url() . 'admin/student' ?>"
					   class="btn btn-outline-primary ml-auto"><i class="material-icons">chevron_left</i>
						Estudiante</a>
				<?php endif; ?>
			</div>
		</div>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark nav">
			<div class="container-fluid">

				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto " id="next_back_header" role="tablist">
						<li class="nav-item">
							<a href="#activity_básico" class="active nav-link pl-3" data-toggle="tab" role="tab"
							   aria-controls="activity_all" aria-selected="true">
								<i class="fas fa-list-alt"></i> Información básica
							</a>
						</li>

						<li class="nav-item">
							<a href="#activity_credenciales" class="nav-link" data-toggle="tab" role="tab"
							   aria-selected="false"><i
										class="fas fa-exclamation-circle"></i> Credenciales login</a>
						</li>
						<li class="nav-item">
							<a href="#activity_social" class="nav-link" data-toggle="tab" role="tab"
							   aria-selected="false"><i
										class="fas fa-clipboard-list"></i> Social Información</a>
						</li>
						<li class="nav-item">
							<a href="#activity_final" class="nav-link" data-toggle="tab" role="tab"
							   aria-selected="false"><i
										class="fas fa-money-bill-alt"></i> Finalizar</a>
						</li>

					</ul>
				</div>
			</div>

		</nav>

		<div class="card-body">

			<form method="post" enctype="multipart/form-data" class="tab-content">

				<div class="tab-pane active show fade card-form__body card-body" id="activity_básico">
					<div class="progress">
						<div class="progress-bar" style="width:25%"></div>
					</div>
					<input hidden type="text" name="id" value="<?= $user->id ?>" autocomplete="off">
					<div class="col-lg-12 card-form__body card-body">
						<div class="form-group">
							<label for="dni">DNI (CUI)<span style="color: darkred">*</span></label>
							<div class="input-group mb-3 form-group">
								<input type="text" class="form-control" id="dni" name="dni"
									   placeholder="DNI" value="<?= set_value("dni", $user->dni); ?>"
									   aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-outline-primary search-dni" type="button"><i
												class="fas fa-search"></i>&ensp;Buscar...
									</button>
								</div>
							</div>
							<?= form_error("dni",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>


						<div class="form-group">

							<label for="name">Nombres y Apellidos<span style="color: darkred">*</span></label>

							<div class="row">
								<div class="col-md-4">
									<input type="text" class="form-control" id="name" placeholder="Nombres"
										   name="name" value="<?= set_value("name", $user->name); ?>">
								</div>
								<div class="col-md-4">
									<input type="text" class="form-control" id="first_parent"
										   placeholder="Apellido Paterno"
										   name="first_parent"
										   value="<?= set_value("first_parent", $user->first_parent); ?>">
								</div>
								<div class="col-md-4">
									<input type="text" class="form-control" id="last_parent"
										   placeholder="Apellido Materno"
										   name="last_parent"
										   value="<?= set_value("last_parent", $user->last_parent); ?>">
								</div>
							</div>
							<?= form_error("name",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
							<?= form_error("first_parent",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>


						<div class="form-group">
							<label for="biography">Biografía</label>
							<textarea name="biography" id="biography" cols="30" rows="10">
								<?= set_value("biography", html_entity_decode($user->biography)); ?>
							</textarea>

						</div>

						<?php
						$tmp = explode('/', $user->user_image);
						?>

						<div id="image-form">

							<label for="user_image">Imagen de usuario</label>
							<div class="col text-center my-2">
								<div class="ml-2">
									<img src="<?= isset($user->user_image) && !empty($user->user_image)
											? base_url() . $user->user_image
											: base_url() . 'assets/admin/images/avatar.png' ?>"
										 id="preview_thumbnail" class="avatar-img avatar-xxl rounded-circle"
										 alt="avatar" width="100" height="100">
								</div>
							</div>
							<div class="input-group my-3">
								<input type="file" name="user_image" class="file" accept="image/png, image/jpeg" hidden
									   value="<?= set_value("user_image"); ?>">
								<input type="text" class="form-control" disabled placeholder="Cargar imagen"
									   id="user_image" value="<?= end($tmp) ?>">
								<div class="input-group-append">
									<button type="button" class="browse btn btn-outline-primary"><i
												class="fas fa-upload"></i> Buscar...
									</button>
								</div>
							</div>
							<?= form_error("user_image",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>

					</div>
					<div class="col-lg-12 card-form__body card-footer">
						<?php
						next_back('disabled', '');
						?>
					</div>

				</div>

				<div class="tab-pane show fade card-form__body card-body" id="activity_credenciales">
					<div class="progress">
						<div class="progress-bar" style="width:50%"></div>
					</div>
					<div class="col-lg-12 card-form__body card-body">

						<div class="form-group">
							<label for="email">Correo electrónico <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="email" id="email" name="email" class="form-control form-control-appended"
									   value="<?= set_value("email", $user->email); ?>"
									   placeholder="E-mail">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-at"></span>
									</div>
								</div>
							</div>
							<?= form_error("email",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

						</div>

						<div class="form-group">
							<label for="password">Password <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="password" id="password" name="password"
									   class="form-control form-control-appended"
									   value="<?= set_value("password", $this->encryption->decrypt($user->password)); ?>"
									   placeholder="Contraseña">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-key"></span>
									</div>
								</div>
							</div>
							<?= form_error("password",
									"<p class='text-danger m-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

						</div>

					</div>

					<div class="col-lg-12 card-form__body card-footer">
						<?php
						next_back('', '');
						?>
					</div>

				</div>
				<?php
				$social_link = json_decode($user->social_link);
				?>

				<div class="tab-pane show fade card-form__body card-body" id="activity_social">
					<div class="progress">
						<div class="progress-bar" style="width:75%"></div>
					</div>
					<div class="col-lg-12 card-form__body card-body">

						<div class="form-group">
							<label for="social_link">Facebook <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="social_link" name="social_link[facebook]"
									   class="form-control form-control-appended"
									   value="<?= set_value("social_link[]", $social_link->facebook); ?>"
									   placeholder="Facebook">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-facebook-square"></span>
									</div>
								</div>
							</div>

						</div>

						<div class="form-group">
							<label for="social_link">Twitter <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="social_link" name="social_link[twitter]"
									   class="form-control form-control-appended"
									   value="<?= set_value("social_link[]", $social_link->twitter); ?>"
									   placeholder="Twitter">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-twitter-square"></span>
									</div>
								</div>
							</div>

						</div>

						<div class="form-group">
							<label for="social_link">Linkedin <span style="color: darkred">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" id="social_link" name="social_link[linkedin]"
									   class="form-control form-control-appended"
									   value="<?= set_value("social_link[]", $social_link->linkedin); ?>"
									   placeholder="Linkedin">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-linkedin"></span>
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
					<div class="progress">
						<div class="progress-bar" style="width:100%"></div>
					</div>

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
