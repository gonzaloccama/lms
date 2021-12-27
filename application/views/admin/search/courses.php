<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="avatar-list">
	<div class="container">
		<div class="row">
			<!--				<div class="card-form__body card-body">-->

			<?php
			foreach ($courses as $course):
				?>

				<div class="col-md-6 mt-4" id="course-<?= $course->id ?>">

					<div class="card shadow">

						<div class="card-body">

							<div class="d-flex flex-column flex-sm-row">
								<a href="#" class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
									<img src="<?= $course->thumbnail
											? base_url() . $course->thumbnail
											: base_url() . $course->thumbnail_old ?>"
										 alt="Card image cap" class="avatar-course-img">
								</a>
								<div class="flex" style="min-width: 80px;">
									<div class="d-flex">
										<div>
											<h4 class="card-title mb-1">
												<a href="#"><?= $course->title ?></a>
											</h4>
											<?php if (isset($admin) && !empty($admin)): ?>

												<div class="d-flex align-items-center py-2">
													<span class="badge badge-soft-secondary mr-2"><?= $course->name ?></span>
													<!--													<span class="badge badge-soft-primary">-->
													<!--														Mecánica-->
													<!--													</span>-->
												</div>

											<?php endif; ?>
											<p class="text-muted block-ellipsis">
												<?= $course->short_description ?>
											</p>
										</div>
										<?php
										$url = base_url() . 'author/courses/edit/' . $course->id;
										if (isset($admin) && !empty($admin))
											$url = base_url() . 'admin/courses/edit/' . $course->id . '/' . $course->user_id;
										?>
										<div class="dropdown ml-auto">
											<a href="#" class="dropdown-toggle text-muted" data-caret="false"
											   data-toggle="dropdown">
												<i class="material-icons">more_vert</i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item"
												   href="<?= $url ?>"><i
															class="fas fa-edit"></i> Editar
													curso</a>
												<a class="dropdown-item" href="#"><i class="fas fa-chart-line"></i>
													Estadísticas</a>

												<?php if (isset($admin) && !empty($admin)):
													if ($course->status):?>
														<a class="dropdown-item active-course" href="#"
														   data-id="<?= $course->id ?>" data-field="course"
														   data-affirm="0">
															<i class="far fa-window-close text-danger"></i>
															Desactivar curso</a>
													<?php else: ?>
														<a class="dropdown-item active-course" href="#"
														   data-id="<?= $course->id ?>" data-field="course"
														   data-affirm="1">
															<i class="far fa-check-square text-success"></i>
															Activar curso</a>
													<?php endif;
												endif; ?>

												<div class="dropdown-divider"></div>
												<a class="dropdown-item text-danger delete-course" href="#"
												   data-id="<?= $course->id ?>" data-field="course"
												   data-toggle="modal" data-target="#myModalDelete">
													<i class="fas fa-archive"></i> Archivar
												</a>
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
												<span class="badge badge-soft-secondary mr-2"><?= $course->lvl ?></span>
												<span class="badge right badge-soft-<?= $course->status ? 'success' : 'danger' ?>">
													<?= $course->status ? 'Activo' : 'Pendiente' ?>
												</span>
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
<div class="card-footer">

	<nav class="container card-group-row">
		<div class="col-md-6" style="margin-top: 12px; font-size: 14px;">
			<?= $total_rows . ($total_rows == 1 ? ' curso encontrado' : ' cursos encontrados') ?>
		</div>
		<div class="pagination justify-content-end col-md-6" style="margin-top: 6px; font-size: 12px;">
			<?= $pagelinks ?>
		</div>
	</nav>

</div>
<script>
	$(document).ready(function () {
		$('.delete-course').click(function () {
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');
			$('#modal-delete-title').html('Archivar curso')
			$('#myModalDelete').attr('data-id', id).attr('data-field', field).modal('show');
		});
	});

	$(document).ready(() => {
		$('.active-course').click(function () {
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');
			var affirm = $(this).attr('data-affirm') / 1;

			if (affirm) {
				$('#modal-affirm-body').html(`¿Realmente quiere activar el curso?`);
			} else {
				$('#modal-affirm-body').html(`¿Ya no estará disponible el curso?`);
			}

			$('#modal-affirm-action').attr('data-id', id).attr('data-field', field).attr('data-affirm', affirm).modal('show');
		});
	});
</script>
