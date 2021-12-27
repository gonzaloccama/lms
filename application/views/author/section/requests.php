<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
if (isset($sections) && !empty($sections)):
	$i = 0;
	foreach ($sections as $section):
		$i++;
		?>
		<div class="card border-0 wow fadeInUp" id="section-<?= $section->id ?>"
			 style="visibility: visible; animation-name: fadeInUp;">
			<div class="card-header p-0 border-0" id="heading-<?= $section->id ?>">
				<a href="" class="btn btn-link accordion-title border-0 collapsed" data-toggle="collapse"
				   data-target="#collapse-<?= $section->id ?>" aria-expanded="false"
				   aria-controls="#collapse-<?= $section->id ?>" style="font-weight: normal;">
					<i class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>
					<?= ($i < 10) ? 'Unidad 0' . $i . ': ' . $section->title : 'Unidad ' . $i . ': ' . $section->title; ?>
				</a>
			</div>
			<div id="collapse-<?= $section->id ?>" class="collapse" aria-labelledby="heading-<?= $section->id ?>"
				 data-parent="#accordion">
				<div class="card-body">

					<div class="text-right col-md">
						<div class="btn-group mb-2">
							<div class="dropdown">
								<a href="#" class="dropdown-toggle btn btn-outline-primary btn-sm"
								   data-toggle="dropdown">
									<span class="material-icons">drive_file_rename_outline</span>
								</a>
								<div class="dropdown-menu">
									<a href="#" data-id="<?= $section->id ?>"
									   data-title="<?= $section->title ?>"
									   class="dropdown-item edit-section"><i class="fas fa-edit"></i> Editar sección</a>
									<a href="#" class="dropdown-item sort-lesson-section"
									   data-id="<?= $section->id ?>" data-title="<?= $section->title ?>">
										<i class="fas fa-chart-bar"></i> Sort</a>
									<div class="dropdown-divider"></div>
									<a href="#" data-id="<?= $section->id ?>" data-field="section"
									   class="dropdown-item text-danger delete-section"
									   data-toggle="modal" data-target="#myModalDelete">
										<i class="fas fa-trash"></i> Eliminar sección</a>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th width="1"></th>
							<th scope="col">Lección</th>
							<th scope="col">Acción</th>

						</tr>
						</thead>
						<tbody>
						<?php
						if (isset($lessons) && !empty($lessons)):
							$j = 0;
							foreach ($lessons as $lesson):
								$lesson->lesson_type == 'Quiz' ?: $j++;
								if ($lesson->section_id == $section->id):
									?>
									<tr id="lesson-<?= $lesson->id ?>">
										<td>
											<span class="material-icons text-secondary"><?= $lesson->icon_type ?></span>
										</td>
										<td>&ensp;
											<span style="font-size: 14px; font-family: Sans-Serif">
												<b class="text-secondary">
													<?= $lesson->lesson_type != 'Quiz' ? 'Lección ' . $j . ' : ' : '' ?>
												</b>
												<?= $lesson->title ?>
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
															<a href="#" class="dropdown-item edit-lesson"
															   data-id="<?= $lesson->id ?>"
															   data-title="<?= $lesson->title ?>">
																<i class="fas fa-edit"></i> Editar lección</a>
															<?php
															if ($lesson->lesson_type == 'Quiz'):
																?>
																<a href="#" class="dropdown-item manager-question"
																   data-id="<?= $lesson->id ?>"
																   data-title="<?= $lesson->title ?>">
																	<i class="fas fa-align-left"></i> Manager
																	Question</a>
															<?php
															endif;
															?>

															<div class="dropdown-divider"></div>

															<a href="#" data-id="<?= $lesson->id ?>"
															   data-field="lesson"
															   class="dropdown-item text-danger delete-lesson"
															   data-toggle="modal" data-target="#myModalDelete">
																<i class="fas fa-trash"></i> Eliminar lección</a>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
								<?php
								endif;
							endforeach;
						endif;
						?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php
	endforeach;
endif;
?>
<script>
	$(document).ready(function () {
		$('.delete-section').click(function () {
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');
			$('#modal-delete-title').html('Eliminar sección')
			$('#myModalDelete').attr('data-id', id).attr('data-field', field).modal('show');
		});
		$('.delete-lesson').click(function () {
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');
			$('#modal-delete-title').html('Eliminar lección')
			$('#myModalDelete').attr('data-id', id).attr('data-field', field).modal('show');
		});

	});

	//edit section
	$(document).ready(function () {
		$('.edit-section').on('click', function () {
			var id = $(this).attr('data-id');
			var title = $(this).attr('data-title');

			$('#modal-add-section').modal('show');
			$('#title_section').val(title);
			$('#id_section').val(id);
			$('#modal-center-title').html('Editar sección: <b>' + title + '</b>')
		});
		//alert("id");
	});

	//edit lesson get-id edit-lesson
	$(document).ready(function () {
		$('.edit-lesson').on('click', function () {
			var id = $(this).attr('data-id');
			var title = $(this).attr('data-title');
			var course_id = '<?= $this->uri->segment(4) ?>';

			//alert(course_id);

			$.ajax({
				url: '<?= base_url() ?>author/requests/get_lesson/' + id + '/' + course_id,
				type: 'post',
				async: false,
				// dataType: 'json',
				success: function (res) {
					$('#modal-title-lesson').html('Editar lección: <b>' + title + '</b>');
					$('#modal-add-lesson').attr('lesson-type', 'type').modal('show');
					$('#inner-container').html(res);
				},
				error: function () {

				},
			});
		});
	});

	// sort lesson in section
	$(document).ready(function () {
		$('.sort-lesson-section').click(function () {
			var id = $(this).attr('data-id');
			var title = $(this).attr('data-title');
			var data = {
				'course_id': <?= $this->uri->segment(4) ?>,
			};
			$.ajax({
				url: "<?= base_url() ?>author/requests/sort_lesson/" + id,
				type: "POST",
				data: data,
				dataType: 'json',
				success: function (data) {

					let html_ = '';

					for (var key in data) {
						if (data.hasOwnProperty(key)) {
							//console.log(key + " -> " + data[key].title);
							html_ += `
								<div class="form-group row m-1">
									<label for="sort-lesson-${data[key].id}"
										   class="col-sm-9 col-form-label"><b>${(1 * key + 1)} :</b>  ${data[key].title}</label>
									<div class="col-sm-3">
										<input hidden type="text" name="lessonId[]" value="${data[key].id}">
										<input type="text" name="lesson[]" class="form-control" id="sort-lesson-${data[key].id}"
											   value="${data[key].order}">
									</div>
								</div>
							`;
						}
					}
					$('#sort-view').attr('data-field', 'lesson').attr('data-section-id', id).html(html_);
					$('#modal-sort-title').html('Ordenar lecciones: <b>' + title + '</b>');
					$('#modal-sort-section').modal('show');
				},
				error: function () {
					alert('error')
				}
			});
		});
	});

	//manager questions
	$(document).ready(function () {
		$('.manager-question').click(function () {
			var id = $(this).attr('data-id');
			var title = $(this).attr('data-title');

			$('#inner-manager-quiz').attr('data-id', id).attr('data-title', title);
			$('#title-mngr-question').html(title);

			get_questions(id);

			$('#modal-manager-quiz').modal('show');
			// alert(id + ' : ' + title);
		});
	});


</script>
