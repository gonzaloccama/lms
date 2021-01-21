<?php
$this->view('admin/template/header');
?>

<div class="container-fluid page__container">
	<div class="card">
		<div class="card-header card-header-large bg-white">
			<h4 class="card-header__title"><?= $sub_title ?></h4>
		</div>
		<div class="card-body avatar-list">
			<?php
			foreach ($course as $c):
				?>
				<p><?= $c->id ?></p>
				<p><?= $c->title ?></p>
				<p><?= $c->short_description ?></p>
				<p><?= $c->outcomes ?></p>
				<p><?= $c->language ?></p>

			<?php
			endforeach;
			?>
		</div>
	</div>

</div>

<?php
$this->view('author/template/sidebar');
$this->view('admin/template/footer');
?>
