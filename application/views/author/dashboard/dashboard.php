<?php
$this->view('admin/template/header');
?>

<div class="container-fluid page__container">
	<div class="card shadow-none border bg-light">
		<div class="card-body">
			<div id="cards-left" class="card-group-row">
				<div class="card col-md-3">
					<div class="card-body media">
						<div class="media-body text-center">
							<span class="text-muted material-icons fa-3x">inventory_2</span>
							<h6 class="pt-3 text-primary" style="font-weight: bold"><?= $num_courses ?></h6>
							<h6 class="text-muted mb-0"><em>NÚMERO DE CURSOS</em></h6>
						</div>
					</div>
				</div>

				<div class="card col-md-3">
					<div class="card-body media">
						<div class="media-body text-center">
							<span class="text-muted material-icons fa-3x">supervised_user_circle</span>
							<h6 class="pt-3 text-primary" style="font-weight: bold">5</h6>
							<h6 class="text-muted mb-0"><em>NÚMERO DE REGISTRADOS</em></h6>
						</div>
					</div>
				</div>

				<div class="card col-md-3">
					<div class="card-body media">
						<div class="media-body text-center">
							<span class="text-muted material-icons fa-3x">widgets</span>
							<h6 class="pt-3 text-primary" style="font-weight: bold"><?= $num_courses - $status ?></h6>
							<h6 class="text-muted mb-0"><em>CURSOS PENDIENTES</em></h6>
						</div>
					</div>
				</div>

				<div class="card col-md-3">
					<div class="card-body media">
						<div class="media-body text-center">
							<span class="text-muted material-icons fa-3x">mark_chat_read</span>
							<h6 class="pt-3 text-primary" style="font-weight: bold"><?= $status ?></h6>
							<h6 class="text-muted mb-0"><em>CURSOS ACTIVOS</em></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row container-fluid page__container">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header card-header-large bg-light d-flex align-items-center">
				<div class="mr-3">
					<i class="material-icons icon-30pt text-muted-light">receipt</i>
				</div>
				<div class="flex">
					<h4 class="card-header__title">Registros</h4>
					<div class="card-subtitle text-muted">Registros recientes</div>
				</div>
				<div class="ml-auto">
					<a href="statement.html" class="btn btn-sm btn-light">Ver todo</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table m-0">
					<thead class="thead-light">
					<tr>
						<th>Curso</th>
						<th class="text-right">Fecha</th>

					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($courses as $course):
						?>
						<tr>
							<td>
								<div class="media align-items-center">
									<a href="#" class="avatar avatar-xs mr-3">
										<img src="<?= base_url() . $course->thumbnail ?>" alt="course"
											 class="avatar-img rounded">
									</a>
									<div class="media-body">
										<a class="text-body js-lists-values-course" href="#">
											<strong><?= $course->title ?></strong>
										</a>
										<br>
										<small class="text-muted mr-1">
											INV
											<a href="invoice.html"><?= $course->id ?></a> -
											S/<span><?= $course->price ?></span>
										</small>
									</div>
								</div>
							</td>
							<td class="text-right">
								<small class="text-muted text-uppercase js-lists-values-date"><?= $course->last_modified ?></small>
							</td>
						</tr>

					<?php
					endforeach;
					?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="card">
			<div class="card-header card-header-large bg-light d-flex align-items-center">
				<div class="mr-3">
					<i class="material-icons icon-30pt text-muted-light">forum</i>
				</div>
				<div class="flex">
					<h4 class="card-header__title">Comentarios</h4>
					<div class="card-subtitle text-muted">Comentarios recientes</div>
				</div>
				<div class="ml-auto">
					<a href="#" class="btn btn-light btn-sm"><i class="material-icons">keyboard_arrow_left</i></a>
					<a href="#" class="btn btn-light btn-sm"><i class="material-icons">keyboard_arrow_right</i></a>
				</div>
			</div>

			<div class="card-body">
				<div class="media">
					<div class="media-left">
						<a href="#" class="avatar avatar-sm mr-3">
							<!--							<img src="assets/images/avatar/demi.png" alt="Guy" class="avatar-img rounded-circle">-->
							<i class="fas fa-user"></i>
						</a>
					</div>
					<div class="media-body d-flex flex-column">
						<div class="d-flex align-items-center">
							<a href="profile.html" class="text-body"><strong>Adrian Demian</strong></a>
							<small class="ml-auto text-muted">27 min ago</small><br>
						</div>
						<p class="text-muted">on <a href="#" class="text-black-50"
													style="text-decoration: underline;"><?= $courses[0]->title ?></a>
						</p>
						<p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipisicing?</p>
					</div>
				</div>
				<div class="media ml-sm-32pt border rounded p-3 bg-light">
					<div class="media-left">
						<a href="#" class="avatar avatar-sm mr-3">
<!--							<img src="assets/images/frontted-logo-blue.svg" alt="Guy" class="avatar-img rounded-circle">-->
							<i class="fas fa-users"></i>
						</a>
					</div>
					<div class="media-body">
						<div class="d-flex align-items-center">
							<a href="profile.html" class="text-body"><strong>CIP</strong></a>
							<small class="ml-auto text-muted">Justo ahora</small>
						</div>
						<p class="mt-1 mb-0 text-black-70">Hi John,<br> Lorem ipsum dolor! <br><br>Lorem ipsum dolor sit
							amet, consectetur adipisicing. <a href="#">here</a> and follow the
							instructions.</p>
					</div>
				</div>
			</div>
			<div class="card-footer bg-light">
				<form action="#" id="message-reply">
					<div class="input-group input-group-merge">
						<input type="text" class="form-control form-control-appended" required=""
							   placeholder="Quick Reply">
						<div class="input-group-append">
							<div class="input-group-text pr-2">
								<button class="btn btn-flush" type="button"><i class="material-icons">tag_faces</i>
								</button>
							</div>
							<div class="input-group-text pl-0">
								<div class="custom-file custom-file-naked d-flex"
									 style="width: 24px; overflow: hidden;">
									<input type="file" class="custom-file-input" id="customFile">
									<label class="custom-file-label" style="color: inherit;" for="customFile">
										<i class="material-icons">attach_file</i>
									</label>
								</div>
							</div>
							<div class="input-group-text pl-0">
								<button class="btn btn-flush" type="button"><i class="material-icons">send</i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php
$this->view('author/template/sidebar');
$this->view('admin/template/footer');
?>
