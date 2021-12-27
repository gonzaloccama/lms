<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<?php
function next_back($stts_left = '', $stts_right = '')
{
	?>
	<div class="col text-center my-2">
		<div class="btn-group mb-2 ">
			<a id="" class="btn btn-dark btn-md btnPrevious <?= $stts_left ?>" data-toggle="pill"
			   href="#">
				<i class="fas fa-arrow-alt-circle-left"></i> Anterior
			</a>
			<a id="" class="btn btn-dark btn-md btnNext <?= $stts_right ?>" data-toggle="pill"
			   href="#">
				Siguiente <i class="fas fa-arrow-alt-circle-right"></i>
			</a>
		</div>
	</div>
	<?php
}

?>
