<section class="inner-banner">
	<div class="container">
		<ul class="list-unstyled thm-breadcrumb">
			<li><a href="<?= base_url() ?>">Inicio</a></li>
			<li class="active"><a href="<?= base_url() . 'auth/login' ?>"><?= $info['title'] ?></a></li>
		</ul><!-- /.list-unstyled -->
		<h2 class="inner-banner__title"><?= $info['title'] ?></h2><!-- /.inner-banner__title -->
	</div><!-- /.container -->
</section><!-- /.inner-banner -->

<section class="contact-one m-auto">
	<div class="container">
		<div class="card card-body shadow">
			<div class="border-0 px-4 py-5">

				<form action="" novalidate method="post"
					  enctype="multipart/form-data"
					  id="form_register" class="contact-one__form needs-validation">

					<div class="form-group" id="dni">
						<label for="dni_c" class="mb-1">
							<h6 class="contact-info-one__text">DNI <span class="text-danger">*</span></h6>
						</label>
						<div class="input-group mb-3"">
							<input type="text" class="form-control" name="dni" id="dni_c"
								   placeholder="Escriba su DNI"
								   value="<?php echo set_value("dni"); ?>">
							<div class="input-group-append">
								<a href="" class="btn btn-input-added"><i class="text-btn-all">Buscar...</i></a>
							</div>
						<br>
						<div class="invalid-feedback container"></div>
						</div>

					</div>

					<div class="form-group" id="name">
						<label for="name_c" class="mb-1">
							<h6 class="contact-info-one__text">NOMBRES <span class="text-danger">*</span></h6>
						</label>
						<input type="text" class="form-control" name="name" id="name_c"
							   placeholder="Escriba su nommbre"
							   value="<?php echo set_value("name"); ?>">
						<div class="invalid-feedback container pl-2"></div>
					</div>

					<div class="form-group" id="first_parent">
						<label for="first_parent_c" class="mb-1">
							<h6 class="contact-info-one__text">APELLIDO PATERNO <span class="text-danger">*</span></h6>
						</label>
						<input type="text" class="form-control" name="first_parent" id="first_parent_c"
							   placeholder="Escriba su apellido paterno"
							   value="<?php echo set_value("first_parent"); ?>">
						<div class="invalid-feedback container"></div>
					</div>

					<div class="form-group" id="last_parent">
						<label for="last_parent_c" class="mb-1">
							<h6 class="contact-info-one__text">APELLIDO MATERNO</h6>
						</label>
						<input type="text" class="form-control" name="last_parent" id="last_parent_c"
							   placeholder="Escriba su apellido materno"
							   value="<?php echo set_value("last_parent"); ?>">
						<div class="invalid-feedback container"></div>
					</div>

					<div class="form-group" id="email">
						<label for="email_c" class="mb-1">
							<h6 class="contact-info-one__text">CORREO ELECTRONICO <span class="text-danger">*</span>
							</h6>
						</label>
						<input type="email" class="form-control" name="email" id="email_c"
							   placeholder="Escriba su email"
							   value="<?php echo set_value("email"); ?>">
						<div class="invalid-feedback container"></div>
					</div>

					<div class="form-group" id="password">
						<label for="password_c" class="mb-1">
							<h6 class="contact-info-one__text">CONTRASEÑA <span class="text-danger">*</span></h6>
						</label>
						<input type="password" class="form-control" name="password" id="password_c"
							   placeholder="Escriba su contraseña"
							   value="<?php echo set_value("password"); ?>">
						<div class="invalid-feedback container"></div>
					</div>

					<div class="form-group" id="password_val">
						<label for="password_v" class="mb-1">
							<h6 class="contact-info-one__text">VALIDAR LA CONTRASEÑA <span class="text-danger">*</span>
							</h6>
						</label>
						<input type="password" class="form-control" name="password_v" id="password_v"
							   placeholder="Vuelve a escribir su contraseña"
							   value="<?php echo set_value("password_v"); ?>">
						<div class="invalid-feedback container"></div>
					</div>


					<div class="text-center">
						<button type="submit" class="thm-btn btn-loader">Registrar</button>
					</div><!-- /.text-center -->
				</form>
				<hr>
				<div class="row mt-4 px-3">
					<small class="contact-info-one__text">¿Tienes una cuenta?
						<a href="<?= base_url() ?>auth/login"
						   class="text-danger contact-info-one__text">Iniciar sesión</a>
					</small>
				</div>
				<div class="session-invalid pt-3"></div>
			</div>
		</div>

	</div><!-- /.container -->
</section><!-- /.contact-info-one -->
