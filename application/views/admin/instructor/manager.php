<?php
$this->view('admin/template/header');
$this->view('admin/modals');
?>


<div class="container-fluid page__container">

	<div id="noti-action"></div>
	<?php if ($this->session->flashdata('message')): ?>

		<div class="alert alert-dismissible bg-success text-white border-0 fade show" role="alert">
			<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong><i class="fas fa-exclamation-circle"></i> Aviso -
			</strong> <?php echo $this->session->flashdata('message'); ?>
		</div>

	<?php endif; ?>

	<div class="card shadow">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h4 style="margin-top: 10px;text-transform: uppercase"><?= strtoupper($info['sub_title']) ?></h4>
				<?php if ($this->uri->segment(2) == 'instructor'): ?>
					<a href="<?= base_url() . 'admin/instructor/add' ?>"
					   class="btn btn-outline-primary ml-auto"><i class="material-icons">add_to_photos</i>
						Intructor</a>
				<?php elseif ($this->uri->segment(2) == 'student'): ?>
					<a href="<?= base_url() . 'admin/student/add' ?>"
					   class="btn btn-outline-primary ml-auto"><i class="material-icons">add_to_photos</i>
						Estudiante</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="card-body bg-secondary">
			<div class="d-flex">
				<div class="form-inline search-form--light ">
					<div class="form-group">
						<label for="entries" class="form-label mr-1 text-white">Mostrar</label>
						<select id="entries" class="form-control custom-select" style="width: 80px;">
							<option value="1">1</option>
							<option selected value="2">2</option>
							<option value="3">3</option>
							<option value="0">Todo</option>
						</select>
						<label for="entries" class="form-label ml-1 text-white">Entradas</label>
					</div>
				</div>

				<div class="search-form mr-3 ml-auto">
					<input type="text" class="form-control" placeholder="Buscar..." name="search_text"
						   id="search_text" aria-label="Search">
					<button class="btn" type="button" id="searchBtn"><i class="material-icons">search</i></button>
				</div>

			</div>
		</div>
		<div class="card-body" id="content-all-instructor">


		</div>

	</div>
</div>


<?php
$this->view($info['sidebar']);
$this->view('admin/template/footer');
?>
