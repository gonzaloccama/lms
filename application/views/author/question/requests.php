<table class="table table-striped table-hover">
	<thead>
	<tr>
		<th width="1"></th>
		<th scope="col">Pregunta</th>
		<th scope="col">Acción</th>

	</tr>
	</thead>
	<tbody>
	<?php
	if (isset($questions) && !empty($questions)):
		$j = 0;
		foreach ($questions as $question):
			$j++;
			?>
			<tr id="question-<?= $question->id ?>">
				<td><b class="text-secondary" style="font-size: 14px; font-family: Sans-Serif"><?= $j ?></b></td>
				<td>&ensp;
					<span style="font-size: 14px; font-family: Sans-Serif">
						<b class="text-secondary"><?= $question->title ?></b>
					</span>
				</td>
				<td>
					<div class="text-right col-md">
						<div class="btn-group mb-2">
							<div class="dropdown">
								<a href="#"
								   class="dropdown-toggle btn btn-outline-danger btn-sm"
								   data-toggle="dropdown"><i class="fas fa-edit"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item edit-question"
									   data-id="<?= $question->id ?>"
									   data-title="<?= $question->title ?>">
										<i class="fas fa-edit"></i> Editar question</a>

									<div class="dropdown-divider"></div>

									<a href="#" data-id="<?= $question->id ?>"
									   data-field="question"
									   class="dropdown-item text-danger delete-question"
									   data-toggle="modal" data-target="#myModalDelete">
										<i class="fas fa-trash"></i> Eliminar</a>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
		<?php
		endforeach;
	endif;
	?>

	</tbody>
</table>

<script>
	$(document).ready(function () {
		$('.delete-question').click(function () {
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');
			$('#modal-delete-title').html('Eliminar pregunta')
			$('#myModalDelete').attr('data-id', id).attr('data-field', field).modal('show');
		});
	});
</script>
