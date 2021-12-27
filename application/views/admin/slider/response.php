<div class="card-group-row card-group-row__card text-center card-form__body p-2">
	<div class="col-lg-12 card-form__body" style="overflow-x:auto;">
		<table class="table table-striped table-hover">
			<thead>
			<tr>

				<th style="min-width: 250px;">Titulo</th>
				<th style="width: 50px;">Descripcion</th>
				<th style="width: 80px;">Link</th>
				<th style="width: 100px;"></th>
			</tr>
			</thead>
			<tbody class="list" id="staff02">
			<?php
			foreach ($sliders as $slider):
				?>
				<tr id="users-<?= $slider->id ?>">
					<td>
						<div class="media align-items-center">
							<div class="mr-2">
								<img src="<?= isset($slider->slide_img) && !empty($slider->slide_img) ? base_url() . $slider->slide_img : base_url() . 'assets/admin/images/avatar.png' ?>"
									 alt="Avatar"
									 class="img-thumbnail" width="80">
							</div>

							<div class="media-body">
								<span class=""><?= $slider->title ?></span>
							</div>
						</div>

					</td>

					<td>
						<?= $slider->phrase ?>
					</td>
					<td><small class="text-muted"><?= $slider->link_read_more ?></small></td>

					<td>
						<div class="btn-group btn-group-sm btn-edit-group">
							<a href="<?= base_url() . 'admin/slider/edit/' . $slider->id ?>" type="button"
							   class="btn btn-primary"
							   data-toggle="tooltip" data-placement="top" title="Editar">
								<i class="fas fa-edit"></i>
							</a>
							<a href="#" type="button" class="btn btn-primary"
							   data-toggle="tooltip" data-placement="top" title="Ver">
								<i class="fas fa-eye"></i>
							</a>
							<a href="#" type="button" class="btn btn-primary delete-users"
							   data-toggle="tooltip" data-placement="top" title="Eliminar"
							   data-id="<?= $slider->id ?>" data-field="users">
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
