<div class="card-group-row card-group-row__card text-center card-form__body p-2">
	<div class="col-lg-12 card-form__body" style="overflow-x:auto;">
		<table class="table table-striped table-hover">
			<thead>
			<tr>

				<th style="min-width: 250px;">Nombres</th>
				<th style="width: 50px;">Estado</th>
				<th style="width: 100px;">Activos</th>
				<th style="width: 250px;">E-mail</th>
				<th style="width: 100px;"></th>
			</tr>
			</thead>
			<tbody class="list" id="staff02">
			<?php
			foreach ($users as $user):
				?>
				<tr id="users-<?= $user->id ?>">
					<td>
						<div class="media align-items-center">
							<div class="avatar avatar-xs mr-2">
								<img src="<?= isset($user->user_image) && !empty($user->user_image)
										? base_url() . $user->user_image
										: base_url() . 'assets/admin/images/avatar.png' ?>"
									 alt="Avatar" class="avatar-img rounded-circle">
							</div>

							<div class="media-body">
								<span class=""><?= $user->name . ' ' . $user->first_parent . ' ' . $user->last_parent ?></span>
							</div>
						</div>

					</td>

					<td>
						<span class="badge badge-<?= $user->status ? 'success' : 'danger' ?>">
							<?= $user->status ? 'ACTIVO' : 'PENDIENTE' ?>
						</span>
					</td>
					<td><small class="text-muted"><?= $this->encryption->decrypt($user->password) ?></small></td>
					<td><?= $user->email ?></td>

					<td>
						<div class="btn-group btn-group-sm btn-edit-group">
							<?php if ($user->status): ?>
								<a href="#" type="button" class="btn btn-danger active-users"
								   data-toggle="tooltip" data-placement="top" title="Activar usuario"
								   data-id="<?= $user->id ?>" data-field="users" data-affirm="0">
									<i class="fas fa-times-circle"></i>
								</a>
							<?php else: ?>
								<a href="#" type="button" class="btn btn-primary active-users"
								   data-toggle="tooltip" data-placement="top" title="Activar usuario"
								   data-id="<?= $user->id ?>" data-field="users" data-affirm="1">
									<i class="fas fa-check-double"></i>
								</a>
							<?php endif; ?>
							<a href="#" type="button" class="btn btn-primary"
							   data-toggle="tooltip" data-placement="top" title="Ver">
								<i class="fas fa-eye"></i>
							</a>
							<a href="<?= $admin
									? base_url() . 'admin/instructor/edit/' . $user->id
									: base_url() . 'admin/student/edit/' . $user->id ?>" type="button"
							   class="btn btn-primary"
							   data-toggle="tooltip" data-placement="top" title="Editar">
								<i class="fas fa-edit"></i>
							</a>
							<a href="#" type="button" class="btn btn-primary delete-users"
							   data-toggle="tooltip" data-placement="top" title="Eliminar"
							   data-id="<?= $user->id ?>" data-field="users">
								<i class="fas fa-trash"></i>
							</a>
						</div>
					</td>
				</tr>
			<?php
			endforeach;
			?>
			</tbody>
		</table>
	</div>
</div>
<div class="card-footer">
	<nav class="container card-group-row">
		<div class="col-md-6" style="margin-top: 5px; font-size: 14px; color: grey;">
			<?= $total_rows . ($total_rows == 1 ? ' usuario encontrado' : ' usuarios encontrados') ?>
		</div>
		<div class="pagination justify-content-end col-md-6" style="margin-top: 6px; font-size: 12px;">
			<?= $pagelinks ?>
		</div>
	</nav>
</div>
<script>
	$(document).ready(() => {
		$('[data-toggle="tooltip"]').tooltip()
	});

	$(document).ready(() => {
		$('.active-users').click(function (event) {
			event.preventDefault();
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');
			var affirm = $(this).attr('data-affirm') / 1;

			if (affirm) {
				$('#modal-affirm-body').html(`¿Realmente quiere activar al usuario?`);
			} else {
				$('#modal-affirm-body').html(`¿Se desabilitará sus credenciales de acceso?`);
			}

			$('#modal-affirm-action').attr('data-id', id).attr('data-field', field).attr('data-affirm', affirm).modal('show');
		});
	});

	$(document).ready(function () {
		$('.delete-users').click(function () {
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');
			$('#modal-delete-title').html('Eliminar usuario')
			$('#myModalDelete').attr('data-id', id).attr('data-field', field).modal('show');
		});
	});
</script>
