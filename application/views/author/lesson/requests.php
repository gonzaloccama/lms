<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
$lesson_type = null;
if (isset($type) && !empty($type))
	$lesson_type = $type;

if (isset($lesson[0]->lesson_type) && !empty($lesson[0]->lesson_type))
	$lesson_type = $lesson[0]->lesson_type;

if ($lesson_type != 'Quiz'):
	?>
	<div class="pb-2 pt-2" style="background-color: #D0E1F4">
		<a class="btn btn-link text-primary" id="close-add"
		   data-target="#modal-type-lesson"><i class="fas fa-arrow-alt-circle-left"></i>
			&ensp; Volver a tipo de lección
		</a>
	</div>
<?php
endif;
?>
<div class="ml-3 m-2 mr-3">
	<hr>
	<b><?= $lesson_type ?></b>
	<hr>

	<div class="form-group">
		<input hidden type="text" name="type_lesson" id="type_lesson" value="<?= $lesson_type ?>">
		<label for="title_lesson">Nombre de la lección <span style="color: darkred">*</span></label>
		<div class="input-group input-group-merge">
			<input hidden type="text" name="id_lesson" id="id_lesson"
				   value="<?= isset($lesson[0]->id) ? $lesson[0]->id : '' ?>">
			<input type="text" id="title_lesson" name="title_lesson" class="form-control form-control-appended"
				   placeholder="Lección"
				   value="<?= isset($lesson[0]->id) ? $lesson[0]->title : '' ?>">
			<div class="input-group-append">
				<div class="input-group-text">
					<span class="fas fa-file-signature"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="section_id_lesson">Sección <span style="color: darkred">*</span></label>
		<select id="section_id_lesson" name="section_id_lesson" class="form-control custom-select" data-toggle="select">
			<?php
			foreach ($sections as $section):
				?>
				<option value="<?= $section->id ?>"<?php
				if (isset($lesson[0]->section_id)):
					if ($section->id == $lesson[0]->section_id):
						echo 'selected';
					else:
						echo '';
					endif;
				endif;
				?>><?= $section->title ?></option>
			<?php
			endforeach;
			?>
		</select>
	</div>

	<?php
	if ($lesson_type == 'YouTube' || $lesson_type == 'Vimeo' || $lesson_type == 'Video-url'):
		?>

		<div class="form-group">
			<label for="video_url_lesson">Video url <span style="color: darkred">*</span></label>
			<div class="input-group input-group-merge">
				<input type="text" id="video_url_lesson" name="video_url_lesson"
					   class="form-control form-control-appended" placeholder="https://www..."
					   value="<?= isset($lesson[0]->id) ? $lesson[0]->video_url : '' ?>">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-file-signature"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="duration_lesson">Duración <span style="color: darkred">*</span></label>
			<div class="input-group">
				<input type="time" id="duration_lesson" name="duration_lesson" class="form-control"
					   step="2" value="<?= isset($lesson[0]->id) ? $lesson[0]->duration : '00:05:30' ?>">
			</div>
		</div>

	<?php
	elseif ($lesson_type == 'Documento' || $lesson_type == 'Imagen'):
	$nm = null;
	if (isset($lesson[0]->id) && !empty($lesson[0]->id)):
		$nma = explode('/', $lesson[0]->attachment);
		$nm = $nma[7];
	endif;
	?>
		<div id="image-form">
			<label for="attachment">Cargar <?= $lesson_type ?></label><span style="color: darkred">*</span></label>
			<div class="input-group my-3">
				<input type="file" name="attachment" id="attachment"
					   class="file-attach"
					   accept="<?= $lesson_type == 'Documento' ? 'application/pdf' : 'image/jpeg, image/png' ?>"
					   hidden>
				<input type="text" class="form-control" disabled placeholder="Cargar imagen"
					   id="attachment-img" value="<?= $nm ?>">
				<div class="input-group-append">
					<button type="button" class="browse-attach btn btn-primary">Buscar...</button>
				</div>
			</div>
		</div>

	<?php
	elseif ($lesson_type == 'Iframe-embed'):
	?>
		<div class="form-group">
			<label for="summary_full">Contenido<span style="color: darkred">*</span></label>
			<textarea name="summary_full" id="summary_full" cols="30"
					  rows="10"><?= isset($lesson[0]->id) ? $lesson[0]->container_embed : '' ?></textarea>
		</div>
		<script>
			CKEDITOR.replace('summary_full');
		</script>
	<?php
	endif;
	?>

	<div class="form-group">
		<label for="summary_lesson">Resumen</label><span style="color: darkred">*</span></label>
		<textarea name="summary_lesson" class="col-sm-12 form-control" id="summary_lesson" cols="30"
				  rows="2"><?= isset($lesson[0]->id) ? $lesson[0]->summary : '' ?></textarea>
	</div>


</div>

<script>
	$(document).on("click", ".browse-attach", function () {
		var attachment = $(this).parents().find(".file-attach");
		//console.log(thumbnail);
		attachment.trigger("click");
	});
	$('input[type="file"][name="attachment"]').change(function (e) {
		var fileName = e.target.files[0].name;
		$("#attachment-img").val(fileName);
	});

	$('#close-add').click(function () {
		// alert("hola");
		$('#modal-add-lesson').modal('hide');
		$('#modal-type-lesson').modal('show');
		$('#modal-title-lesson').html('Agregar nueva lección');
	});

</script>
