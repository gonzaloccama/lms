<?php
if ($this->uri->segment(1) == 'courses' && $this->uri->segment(2) != ''):
	?>
	<div class="row">

		<!-- Grid column -->
		<div class="col-lg-4 col-md-12">

			<!--Modal: Name-->
			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				 aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">

					<!--Content-->
					<div class="modal-content">

						<!--Body-->
						<div class="modal-body mb-0 p-0">

							<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
								<iframe class="embed-responsive-item" src="<?= $course->video_url ?>"
										allowfullscreen></iframe>
							</div>

						</div>

						<!--Footer-->
						<div class="modal-footer justify-content-center">
							<?= $course->video_url ?>
							<!--						<span class="mr-4">Spread the word!</span>-->
							<!--						<a type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a>-->
							<!--						-->
							<!--						<a type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a>-->
							<!--						-->
							<!--						<a type="button" class="btn-floating btn-sm btn-gplus"><i class="fab fa-google-plus-g"></i></a>-->
							<!--						-->
							<!--						<a type="button" class="btn-floating btn-sm btn-ins"><i class="fab fa-linkedin-in"></i></a>-->
							<!---->
							<!--						<button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>-->

						</div>

					</div>
					<!--/.Content-->

				</div>
			</div>
			<!--Modal: Name-->


		</div>
		<!-- Grid column -->

	</div>
	<!-- Grid row -->
<?php
endif;
?>
