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
				<div class="row mb-4 px-3">
					<h6 class="mb-0 mr-4 mt-1 contact-info-one__text">Inicia sesión con</h6>
					<div class="facebook text-center mr-3">
						<div class="fab fa-facebook-f"></div>
					</div>
					<div class="twitter text-center mr-3">
						<div class="fab fa-twitter"></div>
					</div>
					<div class="linkedin text-center mr-3">
						<div class="fab fa-linkedin"></div>
					</div>
				</div>
				<hr>
				<form action="<?= base_url() ?>auth/login/validate" novalidate method="post"
					  enctype="multipart/form-data"
					  id="form_login" class="contact-one__form needs-validation">
					<div class="form-group" id="email">
						<label for="email_c" class="mb-1">
							<h6 class="contact-info-one__text">Correo electronico</h6>
						</label>
						<input type="email" class="form-control" name="email" id="email_c"
							   placeholder="Introduzca su dirección de correo electrónico"
							   value="<?php echo set_value("email"); ?>">
						<div class="invalid-feedback container"></div>
					</div>
					<div class="form-group" id="password">
						<label for="password_c" class="mb-1">
							<h6 class="contact-info-one__text">Contraseña</h6>
						</label>
						<input type="password" class="form-control" name="password" id="password_c"
							   placeholder="Introduce la contraseña"
							   value="<?php echo set_value("password"); ?>">
						<div class="invalid-feedback container"></div>
					</div>
					<div class="row px-3 mb-4 mt-5">
						<div class="custom-control custom-checkbox custom-control-inline">
							<input id="chk1" type="checkbox" name="chk" class="form-control custom-control-input pt-5">
							<label for="chk1" class="custom-control-label contact-info-one__text">Recuérdame</label>
						</div>
						<a href="#" class="ml-auto mb-0 contact-info-one__text">¿Has olvidado tu contraseña?</a>
					</div>

					<div class="text-center">
						<button type="submit" class="thm-btn btn-loader" role="button" aria-disabled="true">Iniciar sesión</button>
					</div><!-- /.text-center -->
				</form>
				<hr>
				<div class="row mt-4 px-3">
					<small class="contact-info-one__text">¿No tienes una cuenta?
						<a href="<?= base_url() ?>auth/register" class="text-danger contact-info-one__text">Registrarse</a>
					</small>
				</div>
				<div class="session-invalid pt-3"></div>
			</div>
		</div>

	</div><!-- /.container -->
</section><!-- /.contact-info-one -->



