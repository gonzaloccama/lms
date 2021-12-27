<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<script>
	$(document).ready(function () {
		//remove fields
		$('#btn-remove').on('click', function () {
			var id = $('#myModalDelete').attr('data-id');
			var field = $('#myModalDelete').attr('data-field');

			var url = "<?= base_url() ?>author/requests/delete_" + field + "/" + id;
			remove_rows(url, id, '¡Se elimino exitosamente la ' + field + '!', '#' + field + '-');

			if (field == 'course') {
				var data = {
					'user_id': <?= $this->session->userdata('id') ?>,
				};

				var base_url = "<?= base_url() ?>author/requests/search";
				get_contents('#content-all-courses', base_url, data);
			}

		});
	});

</script>

<?php
if ($this->uri->segment(3) == 'edit' || $this->uri->segment(3) == 'add'):
	?>

	<!-- ckeditor -->

	<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

	<script>

		CKEDITOR.replace('description');

		// begin next prev
		$('.btnNext').click(function () {
			$('#next_back_header .active').parent().next('li').find('a').trigger('click');
		});

		$('.btnPrevious').click(function () {
			$('#next_back_header .active').parent().prev('li').find('a').trigger('click');
		});
		// end next prev


	</script>

	<script>
		$(document).on("click", ".browse", function () {
			var thumbnail = $(this).parents().find(".file");
			//console.log(thumbnail);
			thumbnail.trigger("click");
		});
		$('input[type="file"][name="thumbnail"]').change(function (e) {
			var fileName = e.target.files[0].name;
			$("#thumbnail").val(fileName);

			var reader = new FileReader();
			reader.onload = function (e) {
				// get loaded data and render thumbnail.
				document.getElementById("preview_thumbnail").src = e.target.result;
			};
			// read the image file as a data URL.
			reader.readAsDataURL(this.files[0]);
		});


	</script>
	<script>


		//begin on hidden price course

		$('#is_free_course').change(function () {
			var check = document.getElementById("is_free_course");
			if (check.checked) {
				$('#content_free').hide();
			} else {
				$('#content_free').show();
			}
		});

		//end on hidden price course

		//outcomes
		$(document).ready(() => {
			var outcomes = 5;
			var outcomes_x = 1;
			$('.add_form_outcomes').on('click', function (e) {
				e.preventDefault();
				if (outcomes_x < outcomes) {
					outcomes_x++;
					form_button('.add-outcomes', 'outcomes', outcomes_x, 'Agrega resultados');
				} else {
					alert('!!')
				}
			});

			$('.add-outcomes').on("click", ".delete_outcomes", function (e) {
				e.preventDefault();
				$(this).parent('div').parent('div').remove();
				outcomes_x--;
			})
		});

		//requirements
		$(document).ready(function () {
			var requirements = 5;

			var requirements_x = 1;
			$('.add_form_requirements').click(function (e) {
				e.preventDefault();
				if (requirements_x < requirements) {
					requirements_x++;
					form_button('.add-requirements', 'requirements', requirements_x, 'Agrega requerimientos');
				} else {
					alert('!!')
				}
			});

			$('.add-requirements').on("click", ".delete_requirements", function (e) {
				e.preventDefault();
				$(this).parent('div').parent('div').remove();
				requirements_x--;
			})
		});

	</script>

	<!--/////////////////////////////////-->

	<?php
	if ($this->uri->segment(3) == 'edit'):
		?>

		<script>
			//quiz
			$(document).ready(function () {
				$('#add-lesson-quiz').click(function () {
					var lesson_type = $(this).attr('data-name');

					$('#modal-title-lesson').html('Crear evaluación');
					type_lesson(lesson_type);
				});
			});

			//lesson
			$(document).ready(function () {
				$('#select-type-lesson').click(function () {
					var id = $('#type-lesson').val();//$(this).attr('name');
					type_lesson(id);
					$('#modal-type-lesson').modal('hide');
				});

				// Add lesson
				$('#form-add-lesson').submit(function (e) {
					e.preventDefault();
					course_id = <?= $this->uri->segment(4) ?>;
					id_lesson = $('#id_lesson').val();

					if ($('#summary_full').val() != null) {
						var summary_full = CKEDITOR.instances.summary_full.updateElement();
						var summary = 'summary_full=' + summary_full;
					} else {
						summary = '';
					}

					var url = "<?= base_url() ?>author/requests/add_lesson/" + course_id;

					if (id_lesson.length != 0) {
						url = "<?= base_url() ?>author/requests/edit/" + id_lesson + '/lesson';
					}

					$.ajax({
						url: url,
						type: 'post',
						data: summary,
						data: new FormData(this),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
						// dataType: 'json',
						success: function (res) {
							ajax_section();
							$('#form-add-lesson')[0].reset();
							$('#modal-add-lesson').modal('hide');

							if (res != 0 && id_lesson.length == 0) {
								// not_action('¡Se agregó exitosamente una nueva lección!', 'success');
								notification_toast('¡Se agregó exitosamente una nueva lección!', 'success');
							} else {
								// not_action('¡Se actualizó exitosamente la lección!', 'success');
								notification_toast('¡Se actualizó exitosamente la lección!', 'success');
							}

							// console.log(res);
						},
						error: function () {
							//alert(res);
							alert('error');
						}
					});
				});
			});

			function type_lesson(type) {
				var data = {
					'course_id': <?= $this->uri->segment(4) ?>,
				};
				$.ajax({
					url: "<?= base_url() ?>author/requests/add_lesson/" + data['course_id'] + '/' + type,
					data: data,
					type: 'post',
					async: false,
					// dataType: 'json',
					success: function (lesson) {
						$('#modal-add-lesson').attr('lesson-type', type).modal('show');

						$('#inner-container').html(lesson);
					},
					error: function () {
						alert('errorcito');
					}
				});

			}

		</script>

		<script>


			//function add section
			function ajax_section() {

				var user_id = <?= $this->session->userdata('id') ?>;

				if ("<?= $this->uri->segment(1) ?>" == "admin")
					user_id = "<?= $this->uri->segment(5) ?>";

				var data = {
					'title': $("#title_section").val(),
					'id': $("#id_section").val(),
					'user_id': user_id,
					'course_id': <?= $this->uri->segment(4) ?>
				};

				url = '<?= base_url() ?>author/requests/add/' + data['course_id'];

				if (data['id'].length != 0) {
					url = '<?= base_url() ?>author/requests/edit/' + data['course_id'];
				}

				$.ajax({
					url: url,
					data: data,
					type: 'post',
					async: false,
					//dataType: 'json',
					success: function (res) {

						if (data['title'] != '' && data['id'].length == 0) {
							// not_action('¡Se agregó exitosamente una section!', 'success');
							notification_toast('¡Se agregó exitosamente una section!', 'success');
						} else if (data['id'].length != 0) {
							// not_action('¡Se actualizó exitosamente la section!', 'success');
							notification_toast('¡Se actualizó exitosamente la section!', 'success');
						}

						$('#form-section')[0].reset();

						$('#accordion').html(res);
						$('#modal-add-section').modal('hide');

					},
					error: function () {
						alert('error');
					}
				});
			}

			//add section -> 3
			$(document).ready(function () {

				ajax_section();

				$('#form-section').submit(function (e) {
					e.preventDefault();
					ajax_section();
				});

				$('#btn-add-section').click(function () {
					$('#form-section')[0].reset();
					$('#modal-center-title').html('Agregar nueva sección')
					$('#modal-add-section').modal('show');
				});

			});


		</script>


		<script>

			$(document).ready(function () {

				//update section sort
				$('#frm-sort-up').submit(function (e) {
					e.preventDefault();

					var field = $('#sort-view').attr('data-field');
					var course_id = <?= $this->uri->segment(4) ?>;
					var url = '<?= base_url() ?>author/requests/sort/' + course_id + '/1';
					var data = {
						'section[]': $('input[name="section[]"]').map(function () {
							return this.value;
						}).get(),

						'sectionId[]': $('input[name="sectionId[]"]').map(function () {
							return this.value;
						}).get(),
					}

					if (field == 'lesson') {
						var id = $('#sort-view').attr('data-section-id');
						var url = '<?= base_url() ?>author/requests/sort_lesson/' + id + '/1';
						var data = {
							'lesson[]': $('input[name="lesson[]"]').map(function () {
								return this.value;
							}).get(),

							'lessonId[]': $('input[name="lessonId[]"]').map(function () {
								return this.value;
							}).get(),
						}
					}

					$.ajax({
						url: url,
						data: data,
						type: 'post',
						async: false,
						//dataType: 'json',
						success: function (res) {
							// not_action('¡Se ordenó coretamente la ' + field + '!', 'success');
							notification_toast('¡Se ordenó coretamente la ' + field + '!', 'success');
							ajax_section();
							$('#frm-sort-up')[0].reset();
							$('#modal-sort-section').modal('hide');
						},
						error: function () {
							alert('errorcito');
						}
					});

				});

				//select sort modal
				$('#sort-section').on('click', function () {

					var user_id = <?= $this->session->userdata('id') ?>;

					if ("<?= $this->uri->segment(1) ?>" == "admin")
						user_id = "<?= $this->uri->segment(5) ?>";


					var data = {
						'user_id': user_id,
						'course_id': <?= $this->uri->segment(4) ?>
					};
					$.ajax({
						url: "<?= base_url() ?>author/requests/sort/" + data['course_id'],
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
									<label for="sort_${key}"
										   class="col-sm-9 col-form-label"><b>${(1 * key + 1)} :</b>  ${data[key].title}</label>
									<div class="col-sm-3">
										<input hidden type="text" name="sectionId[]" value="${data[key].id}">
										<input type="text" name="section[]" class="form-control" id="sort_${key}"
											   value="${data[key].order}">
									</div>
								</div>
							`;
								}
							}
							$('#sort-view').attr('data-field', 'section').html(html_);
							$('#modal-sort-title').html('Ordenar sección');
							$('#modal-sort-section').modal('show');
						},
						error: function () {
							alert('error')
						}
					});

				});

			});

		</script>
		<script>
			//view questions
			function get_questions(quiz_id) {
				$.ajax({
					url: '<?= base_url() ?>author/requests/get_question/' + quiz_id,
					type: "POST",
					data: quiz_id,
					// dataType: 'json',
					//async: false,
					success: function (res) {
						//alert('hola');
						$('#inner-manager-quiz').html(res);
					},
					error: () => {

					},
				});
			}

			$(document).ready(() => {

				$('#frm-add-question').submit((e) => {
					e.preventDefault();
					var id = $('#modal-add-question').attr('data-id');
					var url = '<?= base_url() ?>author/requests/add_question/' + id;

					var data = $('#frm-add-question').closest('form').serialize();

					$.ajax({
						url: url,
						type: "POST",
						data: data,
						dataType: 'json',
						//async: false,
						success: function (data) {
							//alert(data);
							// not_action('¡Se agregó correctamente una pregunta!', 'success');
							notification_toast('¡Se agregó correctamente una pregunta!', 'success');
							$('#frm-add-question')[0].reset();
							$('#modal-add-question').modal('hide');
							$('#modal-manager-quiz').modal('show');
							get_questions(id);
						},
						error: function () {
							alert('error')
						},
					});
				});

				//hidden add questions and on manger questions
				$('#close-add-question').click(() => {
					$('#modal-add-question').modal('hide');
					var id = $('#modal-add-question').attr('data-id');
					get_questions(id);
					$('#modal-manager-quiz').modal('show');
				});

				//add options in questions
				$('.add-option-question').click(() => {
					var num = $('#number_of_options').val();
					// alert(num);

					html = '';

					for (let i = 0; i < num; i++) {
						html += `
						<div class="form-group">
							<label for="options-${i + 1}">Opción ${i + 1}</label>
							<div class="input-group">
								<input type="text" id="options-${i + 1}" class="form-control"
									   name="options[]" value="">
								<div class="input-group-append">
									<div class="input-group-text">
										<input type="checkbox" id="correct_answers" name="correct_answers[]"
											   value="${i + 1}">
									</div>
								</div>
							</div>
						</div>
						`;
					}
					$('#add-question-view').html(html);
				});

				$('.add-question').click(() => {
					var id = $('#inner-manager-quiz').attr('data-id');
					var title = $('#inner-manager-quiz').attr('data-title');

					$('#modal-add-question').attr('data-id', id).modal('show');
					$('#modal-manager-quiz').modal('hide');
					// alert(id + ' : ' + title);
				});
			});
		</script>

	<?php
	endif;
endif;
?>
<!--////////////////////////////-->
<?php
if ($this->uri->segment(1) == 'author' && $this->uri->segment(3) == ''):
	?>

	<script>
		//alert('hola');
		$(document).ready(() => {

			var base_url = "<?= base_url() ?>author/requests/search";

			get_contents('#content-all-courses', base_url, get_data());

			$(document).on('keyup', '#search_text', function () {
				get_contents('#content-all-courses', base_url, get_data(), page_url = false);
			});

			$(document).on('click', "#searchBtn", function (event) {
				get_contents('#content-all-courses', base_url, get_data(), page_url = false);
				event.preventDefault();
			});

			$(document).on('click', ".pagination li a", function (event) {
				var page_url = $(this).attr('href');
				get_contents('#content-all-courses', base_url, get_data(), page_url);
				event.preventDefault();
			});

			function get_data() {
				return {
					'category': $('#custom-select').val(),
					'status': $('#actived01').val(),
					'search_text': $("#search_text").val(),
					'user_id': <?= $this->session->userdata('id') ?>,
				};
			}
		});

		// search courses function

		$(document).ready(() => {
			$('#custom-select').change('select', () => {
				var base_url = "<?= base_url() ?>author/requests/search";
				var data = {
					'user_id': <?= $this->session->userdata('id') ?>,
					'category': $("#custom-select").val(),
				};
				get_contents('#content-all-courses', base_url, data, page_url = false);
			});

			$('#actived01').change('select', () => {
				var base_url = "<?= base_url() ?>author/requests/search";
				var data = {
					'user_id': <?= $this->session->userdata('id') ?>,
					'status': $('#actived01').val(),
				};
				get_contents('#content-all-courses', base_url, data, page_url = false);
			});
		});
	</script>

<?php
endif;
?>

