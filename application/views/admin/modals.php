<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
if ($this->uri->segment(3) == 'edit' || $this->uri->segment(1) == 'author' && $this->uri->segment(3) == ''
		|| ($this->uri->segment(2) == 'category' && $this->uri->segment(3) == ''
		|| ($this->uri->segment(1) == 'admin' && $this->uri->segment(3) == ''))):
	if ($this->uri->segment(3) == 'edit'):
		?>
		<!--	modals-->
		<!--  add-section Up Modal -->
		<div id="modal-add-section" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-dark text-white ">
						<h6 class="modal-title ml-4" id="modal-center-title">Agregar nueva sección</h6>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> <!-- // END .modal-header -->
					<form action="" method="post" id="form-section">
						<div class="modal-body">
							<div class="px-3" id="content-add-section">

								<div class="form-group">
									<input hidden type="text" id="id_section">
									<label for="title_section">Titulo:</label>
									<input class="form-control" type="text" name="title_section" id="title_section"
										   placeholder="E.g. Introducción" required>

								</div>

							</div>
						</div> <!-- // END .modal-body -->
						<div class="modal-footer">

							<button class="btn btn-outline-primary mx-1" type="submit" id="add-section">Guardar
							</button>
							<button class="btn btn-outline-danger mx-1" data-dismiss="modal">Cancelar</button>

						</div>
					</form>
				</div> <!-- // END .modal-content -->
			</div> <!-- // END .modal-dialog -->
		</div> <!-- // END .modal -->

		<!--end add-section-->


		<!-- begin  select type lesson Up Modal -->
		<div id="modal-type-lesson" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-dark text-white ">
						<h6 class="modal-title ml-4" id="modal-center-title">Seleccionar lección</h6>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> <!-- // END .modal-header -->
					<div class="modal-body">
						<div class="px-3">
							<form action="#">
								<div class="form-group">

									<label for="type-lesson">
										<b>Selecciona tipo de lección</b>
									</label><br>

									<select name="type-lesson" id="type-lesson" class="form-control"
											data-toggle="select">
										<option value="YouTube">YouTube</option>
										<option value="Vimeo">Vimeo</option>
										<option value="Video-url">Video url</option>
										<option value="Documento">Documento</option>
										<option value="Imagen">Imagen</option>
										<option value="Iframe-embed">Iframe embed</option>
									</select>

								</div>

							</form>
						</div>
					</div> <!-- // END .modal-body -->
					<div class="modal-footer">

						<button class="btn btn-outline-primary mx-1" id="select-type-lesson">Siguiente</button>
						<button class="btn btn-outline-danger mx-1" data-dismiss="modal">Cancelar</button>

					</div>
				</div> <!-- // END .modal-content -->
			</div> <!-- // END .modal-dialog -->
		</div> <!-- // END .modal -->

		<!--end select type lesson-->

		<!-- begin  add lesson Up Modal -->
		<div class="modal fade" id="modal-add-lesson" tabindex="-1" role="dialog" aria-labelledby="modal-center-title"
			 aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<form method="post" class="modal-content" id="form-add-lesson" enctype="multipart/form-data">
					<div class="modal-header bg-dark text-white ">
						<h6 class="modal-title ml-4" id="modal-title-lesson">Agregar nueva lección</h6>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> <!-- // END .modal-header -->
					<div class="modal-body">
						<div id="inner-container">

						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-outline-danger mx-1" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-outline-primary mx-1" type="submit" id="add-type-lesson">Guardar</button>
					</div>
				</form>
			</div>
		</div>
		<!-- end  add lesson Up Modal -->

		<!-- begin  sort element Up Modal -->
		<div id="modal-sort-section" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-sort-title"
			 aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<form method="post" id="frm-sort-up" class="modal-content">
					<div class="modal-header bg-dark text-white ">
						<h6 class="modal-title ml-4" id="modal-sort-title">Ordenar sección</h6>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> <!-- // END .modal-header -->
					<div class="modal-body">
						<div class="ml-3 m-2 mr-3" id="sort-view">

						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-outline-primary mx-1" type="submit" id="update-sort-section">Guardar
						</button>
						<button class="btn btn-outline-danger mx-1" data-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
		<!-- end  sort element Up Modal -->

		<!-- begin  manager quiz Up Modal -->
		<div class="modal fade" id="modal-manager-quiz" tabindex="-1" role="dialog" aria-labelledby="modal-center-title"
			 aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-dark text-white ">
						<h6 class="modal-title ml-4" id="manager-title-quiz">Administrar evaluaciones</h6>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> <!-- // END .modal-header -->
					<div class="modal-body">
						<div class="container pb-3 pt-3" style="background-color: #f3f3f3">
							<div class="d-flex align-items-center">
								<b style="margin-top: 5px;font-size: 14px; font-family: Sans-Serif;"
								   id="title-mngr-question"></b>
								<div class="btn-group mb-2 mt-2 ml-auto">
									<button type="button" class="btn btn-outline-secondary add-question"
											style="width: 90px" id="btn-add-questions">Nuevo
									</button>
									<button type="button" class="btn btn-outline-secondary" style="width: 90px"
											id="btn-sort-questions">Sort
									</button>
								</div>
							</div>
							<hr>
							<div id="inner-manager-quiz">
								hol
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<!--						<button class="btn btn-outline-danger mx-1" data-dismiss="modal">Cancelar</button>-->
						<!--						<button class="btn btn-outline-primary mx-1" type="submit" id="add-manager-quiz">Guardar</button>-->
					</div>
				</div>
			</div>
		</div>
		<!-- end  manager quiz Up Modal -->

		<!-- begin  add question Up Modal -->
		<div id="modal-add-question" class="modal fade" tabindex="-1" role="dialog"
			 aria-labelledby="modal-question-title"
			 aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<form method="post" id="frm-add-question" class="modal-content">
					<div class="modal-header bg-dark text-white ">
						<h6 class="modal-title ml-4" id="modal-question-title">Agregar preguntas</h6>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> <!-- // END .modal-header -->
					<div class="modal-body">
						<div class="pb-2 pt-2" style="background-color: #D0E1F4">
							<a class="btn btn-link text-primary" id="close-add-question">
								<i class="fas fa-arrow-alt-circle-left"></i>
								&ensp; Gestionar evaluación
							</a>
						</div>
						<hr>
						<div class="ml-3 m-2 mr-3">
							<div class="form-group">
								<label for="title-question">Título <span style="color: darkred">*</span></label>
								<div class="input-group input-group-merge">
									<input type="text" id="title-question" name="title-question"
										   class="form-control form-control-appended" placeholder="¿?"
										   value="">
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-file-signature"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="number_of_options">Número de opciones <span style="color: darkred">*</span></label>
								<div class="input-group mb-3">
									<input type="text" id="number_of_options" class="form-control"
										   name="number_of_options" value="" placeholder="3">
									<div class="input-group-append">
										<button class="btn btn-primary add-option-question" type="button">OK</button>
									</div>
								</div>
							</div>
							<div id="add-question-view">

							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-outline-primary mx-1" type="submit" id="update-question">Guardar
						</button>
						<button class="btn btn-outline-danger mx-1" data-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
		<!-- end  add question Up Modal -->

	<?php
	endif;
	?>

	<!-- Modal Delete field -->
	<div id="myModalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-center-title"
		 aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-dark text-white ">
					<h6 class="modal-title ml-4" id="modal-delete-title">Eliminar sección</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div> <!-- // END .modal-header -->
				<div class="modal-body">
					<div class="text-center">
						<i class="fas fa-exclamation-triangle fa-5x p-2 text-danger"></i>
						<h6 class="p-2" style="font-weight: normal;" id="modal-delete-body">¡Su elección se eliminará permanentemente!</h6>
					</div>
				</div> <!-- // END .modal-body -->
				<div class="modal-footer">
					<button type="button" id="btn-remove" class="btn btn-outline-primary">Eliminar</button>
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
				</div> <!-- // END .modal-footer -->
			</div> <!-- // END .modal-content -->
		</div> <!-- // END .modal-dialog -->
	</div> <!-- // END .modal -->

<!--Modal Affirm-->
	<div id="modal-affirm-action" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-affirm-title" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-dark text-white">
					<h5 class="modal-title" id="modal-affirm-title">Cambiar estado</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div> <!-- // END .modal-header -->
				<div class="modal-body text-center" id="modal-affirm-body" style="font-size: 18px; font-weight: bold;">

				</div> <!-- // END .modal-body -->
				<div class="modal-footer">
					<button type="button" id="btn-affirm" class="btn btn-outline-primary">Aceptar</button>
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
				</div> <!-- // END .modal-footer -->
			</div> <!-- // END .modal-content -->
		</div> <!-- // END .modal-dialog -->
	</div> <!-- // END .modal -->

<?php
endif;
?>
