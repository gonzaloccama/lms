<div style="max-height: 600px; overflow-y:auto;margin: auto;">
	<?php
	if ($lesson[0]->lesson_type == 'YouTube'
			|| $lesson[0]->lesson_type == 'Vimeo'
			|| $lesson[0]->lesson_type == 'Video-url'):

		$this->load->view('user/lesson/lesson_type/video');

	elseif ($lesson[0]->lesson_type == 'Documento'):

		$this->load->view('user/lesson/lesson_type/document');

	elseif ($lesson[0]->lesson_type == 'Imagen'):

		$this->load->view('user/lesson/lesson_type/imagen');

	elseif ($lesson[0]->lesson_type == 'Iframe-embed'):

		$this->load->view('user/lesson/lesson_type/embed');

	else:
		$this->load->view('user/lesson/lesson_quiz/quiz');
	endif;
	?>
</div>
<div class="mt-0">
	<ul class="course-details__tab-navs list-unstyled nav nav-tabs" role="tablist">
		<li>
			<a class="active" role="tab" data-toggle="tab" href="#description">Descripción</a>
		</li>
		<li>
			<a class="" role="tab" data-toggle="tab" href="#questions_and_answers">Preguntas y respuestas</a>
		</li>

	</ul>
	<div class="tab-content course-details__tab-content">
		<div class="tab-pane show active  animated fadeInUp p-4" role="tabpanel" id="description">

			<h3 class="course-details__tab-title"><?= $lesson[0]->title ?></h3>
			<br>

			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="" style="font-size: 15px;">
					<?= $lesson[0]->summary ?>
				</div>

			</div>


		</div>
		<div class="tab-pane animated fadeInUp p-4" role="tabpanel" id="questions_and_answers">

			<h3 class="course-details__tab-title">Lorem ipsum dolor sit amet.</h3>
			<br>

			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="" style="font-size: 15px;">Lorem ipsum dolor sit amet, consectetur adipisicing
					elit.
					Ad
					adipisci aspernatur at atque dolore dolorem ducimus eaque eligendi et expedita facere
					facilis
					fuga, libero magni minima minus molestiae molestias nam neque odit officia optio
					pariatur
					perferendis perspiciatis possimus quam quasi qui quidem rem, repellat similique tenetur
					voluptas
					voluptatum! Eveniet modi molestiae perferendis qui quod temporibus, veritatis. Adipisci
					dolorum
					ipsa, ipsum praesentium quos rem! Blanditiis culpa deleniti fugiat impedit, incidunt
					labore
					nemo, obcaecati reprehenderit rerum sapiente, tempora vero? Asperiores corporis
					cupiditate
					dignissimos dolorem eius ex facere fugiat id illo in incidunt iste maiores natus, nulla
					perferendis quaerat sed sequi totam veniam!
				</div>

			</div>


		</div>
	</div>

</div>
