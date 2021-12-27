<section class="inner-banner">
	<div class="container">
		<ul class="list-unstyled thm-breadcrumb">
			<li><a href="<?= base_url() ?>">Inicio</a></li>
			<li class="active"><a href="<?= base_url() ?>courses"><?= $info['title'] ?></a></li>
		</ul><!-- /.list-unstyled -->
		<h2 class="inner-banner__title"><?= $info['title'] ?></h2><!-- /.inner-banner__title -->
	</div><!-- /.container -->
</section><!-- /.inner-banner -->

<section class="course-one course-page">
	<div class="container">
		<div class="row">
			<?php
			foreach ($courses as $course):
				?>
				<div class="col-lg-4">
					<div class="course-one__single shadow">
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
								?>
								<a href="#" class="course-one__category" style="background-color:
									<?= $category->color ?>">
									<?php if ($course->sub_category_id == $category->id):
										echo $category->name;
									endif; ?>
								</a><!-- /.course-one__category -->
							<?php
							endforeach;
							?>
							<div class="course-one__admin">
								<img src="<?= $course->user_image == ""
										? base_url() . 'assets/admin/images/avatar.png'
										: base_url() . $course->user_image ?>" alt="">
								por <a href="teacher-details.html"><?= $course->name ?></a>
							</div><!-- /.course-one__admin -->
							<h2 class="course-one__title" style="height: 55px"><a
										href="<?= base_url() . 'courses/' . $course->id . '/' . $course->user_id ?>"><?= $course->title ?></a>
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
							   class="course-one__link">Vista previa</a><!-- /.course-one__link -->
						</div><!-- /.course-one__content -->
					</div><!-- /.course-one__single -->
				</div><!-- /.col-lg-4 -->
			<?php
			endforeach;
			?>

		</div><!-- /.row -->
		<div class="post-pagination">
			<a href="#"><i class="fa fa-angle-double-left"></i><!-- /.fa fa-angle-double-left --></a>
			<a class="active" href="#">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#"><i class="fa fa-angle-double-right"></i><!-- /.fa fa-angle-double-left --></a>
		</div><!-- /.post-pagination -->

	</div><!-- /.container -->
</section><!-- /.course-one course-page -->
