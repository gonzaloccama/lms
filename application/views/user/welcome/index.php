<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="banner-wrapper">
	<section class="banner-one banner-carousel__one no-dots owl-theme owl-carousel">
		<?php
		foreach ($sliders as $slider):
			?>
			<div class="banner-one__slide">
				<div class="container">
					<div class="banner-one__bubble-1"></div><!-- /.banner-one__bubble- -->
					<div class="banner-one__bubble-2"></div><!-- /.banner-one__bubble- -->
					<div class="banner-one__bubble-3"></div><!-- /.banner-one__bubble- -->
					<img src="<?= $this->config->item('asset_url') ?>user/images/slider-1-scratch.png" alt=""
						 class="banner-one__scratch">
					<img src="<?= base_url() . $slider->slide_img ?>"
						 class="banner-one__person" alt="">
					<div class="row no-gutters">
						<div class="col-xl-12">
							<h3 class="banner-one__title banner-one__light-color"
								style="text-shadow: 1px 1px 1px #1d1d1d;">
								<?= $slider->title ?>
							</h3><!-- /.banner-one__title -->
							<p class="banner-one__tag-line"><?= $slider->phrase ?></p>
							<!-- /.banner-one__tag-line -->
							<a href="#" class="thm-btn banner-one__btn">Ver</a>
						</div><!-- /.col-xl-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		<?php
		endforeach;
		?>
	</section><!-- /.banner-one -->
	<div class="banner-carousel-btn">
		<a href="#" class="banner-carousel-btn__left-btn"><i class="kipso-icon-left-arrow"></i></a>
		<a href="#" class="banner-carousel-btn__right-btn"><i class="kipso-icon-right-arrow"></i></a>
	</div><!-- /.banner-carousel-btn -->

</div><!-- /.banner-wrapper -->


<section class="course-one__top-title home-one">
	<div class="container">
		<div class="block-title mb-0">
			<h2 class="block-title__title">Cursos populares</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
	</div><!-- /.container -->
	<div class="course-one__top-title__curve"></div><!-- /.course-one__top-title__curve -->
</section><!-- /.course-one__top-title -->

<section class="course-one course-one__teacher-details home-one">
	<div class="container">
		<div class="course-one__carousel owl-carousel owl-theme">
			<?php
			foreach ($courses as $course):
				?>
				<div class="item border-light shadow">
					<div class="course-one__single color-1">
						<div class="course-one__image">
							<img src="<?= (isset($course->thumbnail) && !empty($course->thumbnail))
									? base_url() . $course->thumbnail
									: $this->config->item('asset_url') . 'user/images/course-1-1.jpg' ?>"
								 class="img_course" alt="">
							<i class="far fa-heart"></i><!-- /.far fa-heart -->
						</div><!-- /.course-one__image -->
						<div class="course-one__content">
							<?php
							foreach ($categories as $category):
								if ($course->sub_category_id == $category->id):
									?>
									<a href="#" class="course-one__category" style="background-color:
									<?= $category->color ?>">
										<?= $category->name; ?>
									</a><!-- /.course-one__category -->
								<?php
								endif;
							endforeach;
							?>
							<div class="course-one__admin">
								<img src="<?= $course->user_image == ""
										? base_url() . 'assets/admin/images/avatar.png'
										: base_url() . $course->user_image ?>" alt="">
								por <a href="teacher-details.html"><?= $course->name ?></a>
							</div><!-- /.course-one__admin -->
							<h2 class="course-one__title" style="height: 55px">
								<a href="<?= base_url() . 'courses/' . $course->id . '/' . $course->user_id ?>"><?= $course->title ?></a>
							</h2>
							<!-- /.course-one__title -->
							<div class="course-one__stars">
                                    <span class="course-one__stars-wrap">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.course-one__stars-wrap -->
								<span class="course-one__count">4.8</span><!-- /.course-one__count -->
								<span class="course-one__stars-count">250</span><!-- /.course-one__stars-count -->
							</div><!-- /.course-one__stars -->
							<div class="course-one__meta">
								<a href="course-details.html"><i class="far fa-clock"></i> 10 Hours</a>
								<a href="course-details.html"><i class="far fa-folder-open"></i> 6 Lectures</a>
								<a href="course-details.html">
									<?= !$course->is_free_course
											? 'S/ ' . number_format(floatval($course->price), 2)
											: 'GRATIS' ?>
								</a>
							</div><!-- /.course-one__meta -->
							<a href="<?= base_url() . 'courses/' . $course->id . '/' . $course->user_id ?>"
							   class="course-one__link">Vista previa</a>
						</div><!-- /.course-one__content -->
					</div><!-- /.course-one__single -->
				</div><!-- /.item -->
			<?php
			endforeach;
			?>
		</div><!-- /.course-one__carousel -->
	</div><!-- /.container -->
</section><!-- /.course-one course-page -->


<section class="thm-gray-bg course-category-one">
	<div class="container-fluid text-center">
		<div class="block-title text-center">
			<h2 class="block-title__title">Busca cursos por categoria</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="course-category-one__carousel owl-carousel owl-theme">
			<div class="item">
				<div class="course-category-one__single color-1">
					<div class="course-category-one__icon">
						<i class="kipso-icon-desktop"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">IT & Software</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
			<div class="item">
				<div class="course-category-one__single color-2">
					<div class="course-category-one__icon">
						<i class="kipso-icon-web-programming"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">Development</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
			<div class="item">
				<div class="course-category-one__single color-3">
					<div class="course-category-one__icon">
						<i class="kipso-icon-music-player"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">Music</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
			<div class="item">
				<div class="course-category-one__single color-4">
					<div class="course-category-one__icon">
						<i class="kipso-icon-camera"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">Photography</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
			<div class="item">
				<div class="course-category-one__single color-5">
					<div class="course-category-one__icon">
						<i class="kipso-icon-targeting"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">Marketing</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
			<div class="item">
				<div class="course-category-one__single color-6">
					<div class="course-category-one__icon">
						<i class="kipso-icon-health"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">Health & Fitness</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
			<div class="item">
				<div class="course-category-one__single color-1">
					<div class="course-category-one__icon">
						<i class="kipso-icon-desktop"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">IT & Software</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
			<div class="item">
				<div class="course-category-one__single color-2">
					<div class="course-category-one__icon">
						<i class="kipso-icon-web-programming"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">Development</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
			<div class="item">
				<div class="course-category-one__single color-3">
					<div class="course-category-one__icon">
						<i class="kipso-icon-music-player"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">Music</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
			<div class="item">
				<div class="course-category-one__single color-4">
					<div class="course-category-one__icon">
						<i class="kipso-icon-camera"></i><!-- /.kipso-icon-camera -->
					</div><!-- /.course-category-one__icon -->
					<h3 class="course-category-one__title"><a href="#">Photography</a></h3>
					<!-- /.course-category-one__title -->
				</div><!-- /.course-category-one__single -->
			</div><!-- /.item -->
		</div><!-- /.course-category-one__carousel owl-carousel owl-theme -->

		<a href="#" class="thm-btn">Todas las categorias</a><!-- /.thm-btn -->
	</div><!-- /.container-fluid -->
</section><!-- /.thm-gray-bg course-category-one -->

<?php if (0): ?>
	<section class="cta-three">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 clearfix">
					<img src="<?= $this->config->item('asset_url') ?>user/images/cta-1.jpg" class="cta-three__image"
						 alt="">
				</div><!-- /.col-lg-6 -->
				<div class="col-lg-6">
					<div class="cta-three__content">
						<div class="block-title text-left">
							<h2 class="block-title__title">Benefits of learning
								with kipso</h2><!-- /.block-title__title -->
						</div><!-- /.block-title -->
						<p class="cta-three__text">There cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs
							condmentum leo massa mollis estiegittis miristum nulla sed medy fringilla vitae.</p>
						<!-- /.cta-three__text -->
						<div class="cta-three__single-wrap">
							<div class="cta-three__single">
								<i class="kipso-icon-strategy"></i><!-- /.kipso-icon-strategy -->
								<p class="cta-three__single-text">Professional
									Courses</p><!-- /.cta-three__single-text -->
							</div><!-- /.cta-three__single -->
							<div class="cta-three__single">
								<i class="kipso-icon-training"></i><!-- /.kipso-icon-training -->
								<p class="cta-three__single-text">Live
									Learning</p><!-- /.cta-three__single-text -->
							</div><!-- /.cta-three__single -->
							<div class="cta-three__single">
								<i class="kipso-icon-human-resources"></i><!-- /.kipso-icon-human-resources -->
								<p class="cta-three__single-text">Expert
									Teachers</p><!-- /.cta-three__single-text -->
							</div><!-- /.cta-three__single -->
						</div><!-- /.cta-three__single-wrap -->
						<a href="#" class="thm-btn">Learn More</a><!-- /.thm-btn -->
					</div><!-- /.cta-three__content -->
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.cta-three -->
	<section class="brand-two ">
		<div class="container">
			<div class="block-title">
				<h2 class="block-title__title">Nuestra empresa & partners</h2><!-- /.block-title__title -->
			</div><!-- /.block-title -->
			<div class="brand-one__carousel owl-carousel owl-theme">
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
				<div class="item">
					<img src="<?= $this->config->item('asset_url') ?>user/images/brand-1-1.png" alt="">
				</div><!-- /.item -->
			</div><!-- /.brand-one__carousel owl-carousel owl-theme -->
		</div><!-- /.container -->
	</section><!-- /.brand-one -->

	<section class="cta-four">
		<img src="<?= $this->config->item('asset_url') ?>user/images/circle-stripe-1.png" class="cta-four__stripe"
			 alt="">
		<img src="<?= $this->config->item('asset_url') ?>user/images/line-stripe-1.png" class="cta-four__line" alt="">
		<div class="container text-center">
			<div class="block-title">
				<h2 class="block-title__title">We’ve best teachers <br>
					in every subject</h2><!-- /.block-title__title -->
			</div><!-- /.block-title -->
			<p class="cta-four__text">Lorem ipsum gravida nibh vel velit auctor aliquetnean sollicitudin, lorem quis
				bibendum auci elit <br> consequat is simply free text available in the psutis sem nibh id eis sed odio
				sit
				amet.</p><!-- /.cta-four__text -->
		</div><!-- /.container text-center -->
	</section><!-- /.cta-four -->
	<section class="mailchimp-one">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="mailchimp-one__content">
						<div class="mailchimp-one__icon">
							<i class="kipso-icon-email"></i><!-- /.kipso-icon-email -->
						</div><!-- /.mailchimp-one__icon -->
						<h2 class="mailchimp-one__title">Get latest courses <br>
							updates by signing up</h2><!-- /.mailchimp-one__title -->
					</div><!-- /.mailchimp-one__content -->
				</div><!-- /.col-lg-6 -->
				<div class="col-lg-6 d-flex">
					<div class="my-auto">
						<form action="#" class="mailchimp-one__form">
							<input type="text" placeholder="Enter your email ">
							<button type="submit" class="thm-btn">Subscribe</button>
						</form><!-- /.mailchimp-one__form -->
					</div><!-- /.my-auto -->
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.mailchimp-one -->
<?php
endif;
?>
