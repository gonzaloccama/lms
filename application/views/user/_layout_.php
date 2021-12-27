<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CIP-PUNO | <?= $info['page_title'] ?></title>

	<link rel="icon" type="image/png" sizes="32x32"
		  href="<?= $this->config->item('asset_url') ?>admin/images/logo.png">

	<!-- plugin scripts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,500i,600,700,800%7CSatisfy&display=swap"
		  rel="stylesheet">
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/css/animate.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/css/owl.theme.default.min.css">
	<link rel="stylesheet"
		  href="<?= $this->config->item('asset_url') ?>user/plugins/fontawesome-free-5.11.2-web/css/all.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/plugins/kipso-icons/style.css">
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/css/magnific-popup.css">
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/css/vegas.min.css">

	<!-- template styles -->
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/css/style.css">
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/css/responsive.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>user/plugins/toasty/toasty.css">

	<style>
		.banner-one__person {
			width: 500px;
			height: 550px;
		}

		.img_course {
			height: 243px;
			width: 370px;
		}

	</style>

	<style>
		.facebook {
			background-color: #3b5998;
			color: #fff;
			font-size: 18px;
			padding-top: 2px;
			padding-right: 2px;
			border-radius: 50%;
			width: 35px;
			height: 35px;
			cursor: pointer
		}

		.twitter {
			background-color: #1DA1F2;
			color: #fff;
			font-size: 18px;
			padding-top: 2px;
			padding-right: 2px;
			border-radius: 50%;
			width: 35px;
			height: 35px;
			cursor: pointer
		}

		.linkedin {
			background-color: #2867B2;
			color: #fff;
			font-size: 18px;
			padding-top: 2px;
			padding-right: 2px;
			border-radius: 50%;
			width: 35px;
			height: 35px;
			cursor: pointer
		}

		::placeholder {
			color: #BDBDBD;
			opacity: 1;
			font-weight: 300
		}


		input,
		textarea {
			padding: 10px 12px 10px 12px;
			border: 1px solid lightgrey;
			border-radius: 2px;
			margin-bottom: 5px;
			margin-top: 2px;
			width: 100%;
			box-sizing: border-box;
			color: #2C3E50;
			font-size: 14px;
			letter-spacing: 1px
		}

		input:focus,
		textarea:focus {
			-moz-box-shadow: none !important;
			-webkit-box-shadow: none !important;
			box-shadow: none !important;
			border: 2px solid #022C46;
			outline-width: 0
		}

		button:focus {
			-moz-box-shadow: none !important;
			-webkit-box-shadow: none !important;
			box-shadow: none !important;
			outline-width: 0
		}

		a {
			color: inherit;
			cursor: pointer
		}

		.btn-input-added:hover {
			background-color: #1B5E20;
			color: white;
		}

		.btn-input-added {
			background-color: #022C46;
			border-radius: 0px;
			border: none;
			height: 50px;
			top: 2px;
			color: white;
			-webkit-box-shadow: 0px 0px 16px -4px #000000;
			box-shadow: 0px 0px 16px -4px #000000;
		}

		.text-btn-all {
			position: relative;
			top: 8px;
		}

		.img_thumbnail_course {
			width: 770px;
			height: 447px;
		}

		/*	modal preview course  */
		.modal-dialog {
			max-width: 800px;
			margin: 30px auto;
		}

		.modal-body {
			position: relative;
			padding: 0px;
		}

		.close {
			position: absolute;
			right: -30px;
			top: 0;
			z-index: 999;
			font-size: 2rem;
			font-weight: normal;
			color: #fff;
			opacity: 1;
		}
	</style>
	<style>


		#accordion .panel {
			border: none;
			border-radius: 0;
			box-shadow: none;
			margin-bottom: 15px;
			position: relative;
		}

		#accordion .panel:before {
			content: "";
			display: block;
			width: 1px;
			height: 100%;
			border: 1px dashed #022C46;
			position: absolute;
			top: 25px;
			left: 18px;
		}

		#accordion .panel:last-child:before {
			display: none;
		}

		#accordion .panel-heading {
			padding: 0;
			border: none;
			border-radius: 0;
			position: relative;
		}

		#accordion .panel-title a {
			display: block;
			padding: 10px 30px 10px 60px;
			margin: 0;
			font-size: 16px;
			font-weight: normal;
			letter-spacing: 1px;
			color: #022C46;
			border-radius: 0;
			position: relative;

		}

		#accordion .panel-title a:before,
		#accordion .panel-title a.collapsed:before {
			content: "\f107";
			font-family: "Font Awesome 5 Free";
			font-weight: 900;
			width: 40px;
			height: 100%;
			line-height: 40px;
			background: #022C46;
			border: 1px solid #022C46;
			border-radius: 3px;
			font-size: 17px;
			color: #fff;
			text-align: center;
			position: absolute;
			top: 0;
			left: 0;
			transition: all 0.3s ease 0s;
			vertical-align: middle;
		}

		#accordion .panel-title a.collapsed:before {
			content: "\f105";
			background: #fff;
			border: 1px solid #022C46;
			color: #000;
			vertical-align: middle;
		}

		#accordion .panel-body {
			padding: 10px 30px 10px 5px;
			margin-left: 30px;
			background: #fff;
			border-top: none;
			font-size: 15px;
			color: #6f6f6f;
			line-height: 28px;
			letter-spacing: 1px;
		}

		#accordion .panel-title .row .text-muted {
			font-size: 12px;
		}

		#accordion .panel-title .row .title {
			text-transform: uppercase;
			font-weight: 600;
		}

		#accordion .material-icons {
			font-size: 22px;
		}

		.icon_lesson {
			position: relative;
			top: 5px;
		}
	</style>

	<style>
		.course-details__curriculum-list-left :hover,
		.course-details__curriculum-list-left :focus {
			color: #166016;
		}

		.card {
			border-radius: 0px
		}

		.view-cicle {
			position: absolute;
			width: 34px;
			height: 34px;
			margin-left: 7.5px;
			border-radius: 50%;
			border: solid green 1px;
		}


		.icon_lesson_view a{
			color: green;
			box-shadow: grey;
		}

		.btn{
			border-radius: 0;
		}

	</style>

	<style>

		input[type="radio"] {
			display: none;
		}

		input[type="radio"]+label:before {
			position: absolute;
			content: "";
			display: inline-block;
			width: 20px;
			height: 20px;
			padding: 4px;
			margin-right: 3px;
			background-clip: content-box;
			border: 1px solid #a0a0a0;
			background-color: #e7e6e7;

		}

		input[type="radio"]:checked+label:before {
			background-color: #0D6EFD;
			box-shadow: 0px 0px 2px 0px #0D6EFD;
			border: 1px solid #0D6EFD;
		}

		label {
			display: flex;
			align-items: center;
		}

	</style>

</head>

<?php
$this->load->view('user/modal');
?>

<body>
<div class="preloader"><span></span></div><!-- /.preloader -->
<div class="page-wrapper">
	<div class="topbar-one">
		<div class="container">
			<div class="topbar-one__left">
				<a href="mailto:support@cip.com.pe">support@cip.com.pe</a>
				<a href="tel:+51 987368159">+51 987 368 159</a>
			</div><!-- /.topbar-one__left -->
			<div class="topbar-one__right">
				<?php
				if (!$this->session->userdata('is_logged')):
					?>
					<a href="<?= base_url() . 'auth/login' ?>">Login</a>
					<a href="<?= base_url() . 'auth/register' ?>">Register</a>
				<?php
				elseif ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2):
					?>
					<a href="<?= base_url() . 'admin/courses' ?>">Admin</a>
					<a href="<?= base_url() . 'auth/login/logout' ?>">Logout</a>
				<?php
				elseif ($this->session->userdata('role_id') == 3):
					?>
					<a href="<?= base_url() . 'author/courses' ?>">Instrucrtor</a>
					<a href="<?= base_url() . 'auth/login/logout' ?>">Logout</a>
				<?php
				elseif ($this->session->userdata('role_id') == 4):
					?>
					<a href="<?= base_url() . '' ?>">Estudiante</a>
					<a href="<?= base_url() . 'auth/login/logout' ?>">Logout</a>
				<?php
				endif;
				?>
			</div><!-- /.topbar-one__right -->
		</div><!-- /.container -->
	</div><!-- /.topbar-one -->
	<header class="site-header site-header__header-one ">
		<nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
			<div class="container clearfix">
				<!-- Brand and toggle get grouped for better mobile display  -->
				<div class="logo-box clearfix">
					<a class="navbar-brand" href="<?= base_url() ?>">
						<img src="<?= $this->config->item('asset_url') ?>admin/images/logo.png" class="main-logo"
							 width="60" alt="Awesome Image"/>
					</a>
					<div class="header__social">
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-facebook-square"></i></a>
						<a href="#"><i class="fab fa-whatsapp"></i></a>
						<a href="#"><i class="fab fa-linkedin"></i></a>
					</div><!-- /.header__social -->
					<button class="menu-toggler" data-target=".main-navigation">
						<span class="kipso-icon-menu"></span>
					</button>
				</div><!-- /.logo-box -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="main-navigation">
					<ul class=" navigation-box">
						<li class="<?= $this->uri->segment(1) == '' ? 'current' : '' ?>">
							<a href="<?= base_url() ?>">Inicio</a>
							<!--							<ul class="sub-menu">-->
							<!--								<li><a href="index.html">Home 01</a></li>-->

							<!--							</ul>--><!-- /.sub-menu -->
						</li>

						<!--						<li>-->
						<!--							<a href="#">Pages</a>-->
						<!--							<ul class="sub-menu">-->
						<!--								<li><a href="about.html">About Page</a></li>-->
						<!--								<li><a href="gallery.html">Gallery</a></li>-->
						<!--								<li><a href="pricing.html">Pricing Plans</a></li>-->
						<!--								<li><a href="faq.html">FAQ'S</a></li>-->
						<!--							</ul>--><!-- /.sub-menu -->
						<!--						</li>-->

						<li class="<?= $this->uri->segment(1) == 'courses' ? 'current' : '' ?>">
							<a href="<?= base_url() ?>courses">Cursos</a>
							<ul class="sub-menu">
								<!--								<li><a href="courses.html">Courses</a></li>-->
								<!--								<li><a href="course-details.html">Course Details</a></li>-->
							</ul><!-- /.sub-menu -->
						</li>

						<!--						<li>-->
						<!--							<a href="teachers.html">Teachers</a>-->
						<!--							<ul class="sub-menu">-->
						<!--								<li><a href="teachers.html">Teachers</a></li>-->
						<!--								<li><a href="team-details.html">Teachers Details</a></li>-->
						<!--								<li><a href="become-teacher.html">Become Teacher</a></li>-->
						<!--							</ul>--><!-- /.sub-menu -->
						<!--						</li>-->
						<li>
							<a href="news.html">Publicaciones</a>
							<ul class="sub-menu">
								<li><a href="news.html">News Page</a></li>
								<li><a href="news-details.html">News Details</a></li>
							</ul><!-- /.sub-menu -->
						</li>
						<!--						<li>-->
						<!--							<a href="contact.html">Contact</a>-->
						<!--						</li>-->
					</ul>
				</div><!-- /.navbar-collapse -->
				<div class="right-side-box">
					<a class="header__search-btn search-popup__toggler" href="#"><i
								class="kipso-icon-magnifying-glass"></i>
						<!-- /.kipso-icon-magnifying-glass --></a>
				</div><!-- /.right-side-box -->
			</div>
			<!-- /.container -->
		</nav>

		<div class="site-header__decor">
			<div class="site-header__decor-row">
				<div class="site-header__decor-single">
					<div class="site-header__decor-inner-1"></div><!-- /.site-header__decor-inner -->
				</div><!-- /.site-header__decor-single -->
				<div class="site-header__decor-single">
					<div class="site-header__decor-inner-2"></div><!-- /.site-header__decor-inner -->
				</div><!-- /.site-header__decor-single -->
				<div class="site-header__decor-single">
					<div class="site-header__decor-inner-3"></div><!-- /.site-header__decor-inner -->
				</div><!-- /.site-header__decor-single -->
			</div><!-- /.site-header__decor-row -->
		</div><!-- /.site-header__decor -->
	</header><!-- /.site-header -->


	<?php $this->load->view($info['_section_']) ?>

	<footer class="site-footer">
		<div class="site-footer__upper">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-sm-12">
						<?php
						if (0):
							?>
							<div class="footer-widget footer-widget__contact">
								<h2 class="footer-widget__title">Courses</h2><!-- /.footer-widget__title -->
								<ul class="list-unstyled footer-widget__course-list">
									<li>
										<h2><a href="course-details.html">Introduction Web Design</a></h2>
										<p>Mike Hardson</p>
									</li>
									<li>
										<h2><a href="course-details.html"> Learning MBA Management </a></h2>
										<p>Jessica Brown</p>
									</li>
								</ul><!-- /.footer-widget__course-list -->
							</div><!-- /.footer-widget -->
						<?php
						endif;
						?>
					</div><!-- /.col-lg-3 -->
					<div class="col-xl-3 col-lg-6 col-sm-12">
						<?php
						if (0):
							?>
							<div class="footer-widget footer-widget__link">
								<h2 class="footer-widget__title">Explore</h2><!-- /.footer-widget__title -->
								<div class="footer-widget__link-wrap">
									<ul class="list-unstyled footer-widget__link-list">
										<li><a href="#">About</a></li>
										<li><a href="#">Overview</a></li>
										<li><a href="#">Teachers</a></li>
										<li><a href="#">Join Us</a></li>
										<li><a href="#">Our News</a></li>
									</ul><!-- /.footer-widget__link-list -->
									<ul class="list-unstyled footer-widget__link-list">
										<li><a href="#">Help </a></li>
										<li><a href="#">Contact</a></li>
										<li><a href="#">Register Now</a></li>
									</ul><!-- /.footer-widget__link-list -->
								</div><!-- /.footer-widget__link-wrap -->
							</div><!-- /.footer-widget -->
						<?php
						endif;
						?>
					</div><!-- /.col-lg-3 -->
					<div class="col-xl-3 col-lg-6 col-sm-12">
						<?php
						if (0):
							?>
							<div class="footer-widget footer-widget__gallery">
								<h2 class="footer-widget__title">Gallery</h2><!-- /.footer-widget__title -->
								<ul class="list-unstyled footer-widget__gallery-list">
									<li><a href="#"><img
													src="<?= $this->config->item('asset_url') ?>user/images/footer-1-1.png"
													alt=""></a></li>
									<li><a href="#"><img
													src="<?= $this->config->item('asset_url') ?>user/images/footer-1-2.png"
													alt=""></a></li>
									<li><a href="#"><img
													src="<?= $this->config->item('asset_url') ?>user/images/footer-1-3.png"
													alt=""></a></li>
									<li><a href="#"><img
													src="<?= $this->config->item('asset_url') ?>user/images/footer-1-4.png"
													alt=""></a></li>
									<li><a href="#"><img
													src="<?= $this->config->item('asset_url') ?>user/images/footer-1-5.png"
													alt=""></a></li>
									<li><a href="#"><img
													src="<?= $this->config->item('asset_url') ?>user/images/footer-1-6.png"
													alt=""></a></li>
								</ul><!-- /.footer-widget__gallery -->
							</div><!-- /.footer-widget -->
						<?php
						endif;
						?>
					</div><!-- /.col-lg-3 -->
					<div class="col-xl-3 col-lg-6 col-sm-12">

						<div class="footer-widget footer-widget__about">
							<h2 class="footer-widget__title">Acerca de nosotros</h2><!-- /.footer-widget__title -->
							<p class="footer-widget__text">Lorem ipsum dolor sit ametcon, sectetur adipiscing elit.
								Phasellus vehic sagittis euismod.</p><!-- /.footer-widget__text -->
							<div class="footer-widget__btn-block">
								<a href="#" class="thm-btn">Contactanos</a><!-- /.thm-btn -->
								<!--								<a href="#" class="thm-btn">Purchase</a>-->
								<!-- /.thm-btn -->
							</div><!-- /.footer-widget__btn-block -->
						</div><!-- /.footer-widget -->

					</div><!-- /.col-lg-3 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.site-footer__upper -->
		<div class="site-footer__bottom">
			<div class="container">
				<p class="site-footer__copy">&copy; Copyright 2021 by <a href="#">cippuno.org.pe</a></p>
				<div class="site-footer__social">
					<a href="#" data-target="html" class="scroll-to-target site-footer__scroll-top"><i
								class="kipso-icon-top-arrow"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-facebook-square"></i></a>
					<a href="#"><i class="fab fa-whatsapp"></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
				</div><!-- /.site-footer__social -->
				<!-- /.site-footer__copy -->
			</div><!-- /.container -->
		</div><!-- /.site-footer__bottom -->
	</footer><!-- /.site-footer -->

</div><!-- /.page-wrapper -->

<div class="search-popup">
	<div class="search-popup__overlay custom-cursor__overlay">
		<div class="cursor"></div>
		<div class="cursor-follower"></div>
	</div><!-- /.search-popup__overlay -->
	<div class="search-popup__inner">
		<form action="#" class="search-popup__form">
			<input type="text" name="search" placeholder="Escriba para buscar....">
			<button type="submit"><i class="kipso-icon-magnifying-glass"></i></button>
		</form>
	</div><!-- /.search-popup__inner -->
</div><!-- /.search-popup -->

<script src="<?= $this->config->item('asset_url') ?>user/js/jquery.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/bootstrap.bundle.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/owl.carousel.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/waypoints.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/jquery.counterup.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/TweenMax.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/wow.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/jquery.magnific-popup.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/countdown.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/vegas.min.js"></script>

<!-- template scripts -->
<script src="<?= $this->config->item('asset_url') ?>user/js/theme.js"></script>


<script src="<?= $this->config->item('asset_url') ?>user/plugins/toasty/toasty.js"></script>
<script src="<?= $this->config->item('asset_url') ?>user/js/customers.js"></script>

<?php $this->load->view($info['_script_']) ?>

<?php if ($this->session->flashdata('message')): ?>

	<script>
		var text = <?=$this->session->flashdata('message'); ?>;

		notification_toast(text.mssg, text.class);
	</script>

<?php endif; ?>

</body>

</html>
