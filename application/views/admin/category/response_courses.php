<div class="card-group-row card-group-row__card text-center card-form__body p-2">
	<?php
	foreach ($parents as $parent):
		if (!$parent->parent):
			?>
			<div class="m-2" id="category-<?= $parent->id ?>">
				<div class="card shadow" style="width: 18rem;">
					<img class="card-img-top"
						 src="<?= $parent->thumbnail != '' ? base_url() . $parent->thumbnail : 'https://placehold.it/80x80' ?>"
						 alt="Card image cap">
					<div class="card-body text-white" style="background-color: <?= $parent->color ?>">
						<h5 class="card-title"><?= $parent->name ?></h5>
					</div>
					<div id="accordion-<?= $parent->id ?>">
						<div class="">
							<div class="card-header">
								<a class="card-link text-group" data-toggle="collapse"
								   href="#collapse-<?= $parent->id ?>">
									<h6>SUB CATEGORIAS

										<?php
										foreach ($cnt as $c):
											if ($parent->id == $c->id):
												?>
												<span class="badge badge-pill badge-primary"
													  id="num-text-<?= $c->id ?>"
													  style="margin-top: -4px"><?= $c->total ?></span>
											<?php
											endif;

										endforeach;
										?>

									</h6>
								</a>
							</div>
							<div id="collapse-<?= $parent->id ?>" class="collapse"
								 data-parent="#accordion-<?= $parent->id ?>">
								<div class="card-body">
									<div data-toggle="lists"
										 data-lists-values='["js-lists-values-category-name"]'
										 class="table-responsive border-bottom">
										<table class="table mb-0 thead-border-top-0 table-striped table-hover border">
											<thead class="bg-light">
											<tr>
												<th>
													<a href="javascript:void(0)" class="sort"
													   data-sort="js-lists-values-category-name">SUB CATEGORIA</a>
												</th>
												<th></th>
											</tr>
											</thead>
											<tbody class="list" style="font-size: 15px;">
											<?php
											foreach ($categories as $category):
												if ($parent->id == $category->parent):
													?>
													<tr id="category-<?= $category->id ?>">
														<td>
															<div class="media align-items-center">
																<div class="media-body">
																	<strong class="js-lists-values-category-name text-muted"><?= $category->name ?></strong>
																</div>
															</div>
														</td>
														<td class="text-right">
															<div class="dropdown ml-auto">
																<a href="#"
																   class="dropdown-toggle text-muted"
																   data-caret="false"
																   data-toggle="dropdown">
																	<i class="material-icons">more_vert</i>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item"
																	   href="<?= base_url() . 'admin/category/edit/' . $category->id ?>">
																		<i class="fas fa-edit"></i>
																		Editar categoria
																	</a>
																	<div class="dropdown-divider"></div>
																	<a class="dropdown-item text-danger delete-sub-category"
																	   href="#"
																	   data-id="<?= $category->id ?>"
																	   data-field="category"
																	   data-toggle="modal"
																	   data-target="#myModalDelete">
																		<i class="fas fa-archive"></i>
																		Eliminar
																	</a>
																</div>
															</div>
														</td>
													</tr>
												<?php
												endif;
											endforeach;
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<a href="<?= base_url() . 'admin/category/edit/' . $parent->id ?>"
								   class="btn btn-outline-primary">Editar</a>
								<a href="#" class="btn btn-outline-danger delete-category"
								   data-id="<?= $parent->id ?>"
								   data-toggle="modal" data-target="#myModalDelete" data-field="category">Eliminar</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		<?php
		endif;
	endforeach;
	?>

</div>
<div class="card-footer">
	<nav class="container card-group-row">
		<div class="col-md-6" style="margin-top: 12px; font-size: 14px;">
			<?= $total_rows . ($total_rows == 1 ? ' categoria encontrado' : ' categorias encontrados') ?>
		</div>
		<div class="pagination justify-content-end col-md-6" style="margin-top: 6px; font-size: 12px;">
			<?= $pagelinks ?>
		</div>
	</nav>
</div>

<script>
	$(document).ready(() => {
		$('.delete-category').click(function () {
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');
			var num_id = $('#num-text-' + id).text();

			if (num_id != '') {
				$('#modal-delete-title').html('Eliminar categoria')
				$('#modal-delete-body').html(`La categoria tiene ${num_id} sub-categoria${num_id > 1 ? 's' : ''}
					<br><b class="text-danger"> No puedes eliminar!</b>`)
				$('#btn-remove').hide();
				$('#myModalDelete').attr('data-id', id).attr('data-field', field).modal('show');
			} else {
				$('#modal-delete-title').html('Eliminar categoria')
				$('#modal-delete-body').html(`¡Su selección se eliminará permanentemente!`)
				$('#btn-remove').show();
				$('#myModalDelete').attr('data-id', id).attr('data-field', field).modal('show');
			}
		});

		$('.delete-sub-category').click(function () {
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');

			$('#modal-delete-title').html('Eliminar sub-categoria')
			$('#modal-delete-body').html(`¡Su selección se eliminará permanentemente!`)
			$('#btn-remove').show();
			$('#myModalDelete').attr('data-id', id).attr('data-field', field).modal('show');
		});
	});
</script>
