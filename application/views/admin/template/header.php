<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="es" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>CIP | <?= $info['page_title'] ?></title>

	<!-- Prevent the demo from appearing in search engines -->
	<meta name="robots" content="noindex">

	<!-- Perfect Scrollbar -->
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/vendor/perfect-scrollbar.css"
		  rel="stylesheet">

	<!-- App CSS -->
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/css/app.css" rel="stylesheet">
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/css/app.rtl.css" rel="stylesheet">

	<!-- Material Design Icons -->

	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/css/vendor-material-icons.css"
		  rel="stylesheet">
	<!--	<link type="text/css" href="admin/css/vendor-material-icons.rtl.css"-->
	<!--		  rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Font Awesome FREE Icons -->
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/css/vendor-fontawesome-free.css"
		  rel="stylesheet">
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/css/vendor-fontawesome-free.rtl.css"
		  rel="stylesheet">

	<!-- ion Range Slider -->
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/css/vendor-ion-rangeslider.css"
		  rel="stylesheet">
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/css/vendor-ion-rangeslider.rtl.css"
		  rel="stylesheet">



	<!-- Select2 -->
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/css/vendor-select2.css" rel="stylesheet">
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/css/vendor-select2.rtl.css"
		  rel="stylesheet">
	<link type="text/css" href="<?= $this->config->item('asset_url') ?>admin/vendor/select2/select2.min.css"
		  rel="stylesheet">

	<link type="text/css" href="<?= $this->config->item('asset_url') ?>user/plugins/toasty/toasty.css"
		  rel="stylesheet">

	<style>
		.block-ellipsis {
			font-size: 15px;
			font-family: Sans-Serif;

			display: block;
			display: -webkit-box;
			max-width: 100%;
			height: 60px;
			margin: 0 auto;

			text-align: justify;

			line-height: 15pt;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		[data-toggle=collapse] i:before {
			content: "";
		}

		[data-toggle=collapse].collapsed i:before {
			content: "";
		}

		#accordion .card-header {
			margin-bottom: 8px;
		}

		#accordion .accordion-title {
			position: relative;
			display: block;
			padding: 8px 0 8px 50px;
			background: #5A697B;
			border-radius: 8px;
			overflow: hidden;
			text-decoration: none;
			color: #fff;
			font-size: 16px;
			font-weight: 700;
			width: 100%;
			text-align: left;
			transition: all 0.4s ease-in-out;
		}

		#accordion .accordion-title i {
			position: absolute;
			width: 40px;
			height: 100%;
			left: 0;
			top: 0;
			color: #fff;
			background: radial-gradient(rgb(89, 101, 122), #5A697B);
			text-align: center;
			border-right: 1px solid transparent;
		}

		#accordion .accordion-title:hover {
			padding-left: 60px;
			background: #213744;
			color: #fff;
		}

		#accordion .accordion-title:hover i {
			border-right: 1px solid #fff;
			background: #213744;
		}

		#accordion .accordion-title:focus {
			padding-left: 60px;
			background: #213744;
			color: #fff;
		}

		#accordion .accordion-title:focus i {
			border-right: 1px solid #fff;
			background: #213744;
		}

		#accordion .accordion-body {
			padding: 40px 55px;
		}

		#accordion .accordion-body ul {
			list-style: none;
			margin-left: 0;
			padding-left: 0;
		}

		#accordion .accordion-body li {
			padding-left: 1.2rem;
			text-indent: -1.2rem;
		}

		#accordion .accordion-body li:before {
			content: "";
			padding-right: 5px;
			font-family: "Flaticon";
			font-size: 16px;
			font-style: normal;
			color: #213744;
		}


		/* Nav links */
		.nav-link {
			position: relative;
			padding: 1rem;
			font-weight: 500;
			color: #cdddeb;
		}

		.nav-link:hover {
			color: #fff;
			background-color: rgba(15, 17, 26, 0.5);;
		}

		.nav-link:focus {
			color: #fff;
			background-color: transparent;
		}

		/* Active state gets a caret at the bottom */
		.nav-link.active {
			color: #fff;
		}

		.nav-link.active:after {
			position: absolute;
			bottom: 0;
			left: 50%;
			width: 0;
			height: 0;
			margin-left: -.3rem;
			vertical-align: middle;
			content: "";
			border-right: .3rem solid transparent;
			border-bottom: .3rem solid;
			border-left: .3rem solid transparent;
		}

	</style>

</head>

<body class="layout-default">

<?php
$this->load->view('admin/modals');
?>

<div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
	<div class="mdk-drawer-layout__content">

		<!-- Header Layout -->
		<div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

			<!-- Header -->

			<div id="header" class="mdk-header js-mdk-header m-0" data-fixed data-effects="waterfall"
				 data-retarget-mouse-scroll="false">
				<div class="mdk-header__content">

					<div class="navbar navbar-expand-sm navbar-main navbar-dark bg-primary pl-md-0 pr-0" id="navbar"
						 data-primary>
						<div class="container-fluid page__container pr-0">

							<!-- Navbar toggler -->
							<button class="navbar-toggler navbar-toggler-custom  d-lg-none d-flex mr-navbar"
									type="button" data-toggle="sidebar">
								<span class="material-icons icon-14pt">menu</span>
							</button>

							<!--
														<div class="navbar-collapse collapse" id="navbarsExample03">
															<ul class="nav navbar-nav">

																<li class="nav-item dropdown">
																	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layouts</a>
																	<div class="dropdown-menu">
																		<a class="dropdown-item active" href="admin-dashboard.html">Default</a>

																		<a class="dropdown-item" href="fixed-admin-dashboard.html">Fixed Navs</a>
																		<a class="dropdown-item" href="mini-admin-dashboard.html">Mini Sidebar +
																			Navs</a>
																	</div>
																</li>
																<li>

															</ul>
														</div>

							-->
							<!--														<form class="ml-auto search-form search-form--light d-none d-sm-flex flex"-->
							<!--															  action="index.html">-->
							<!--															<input type="text" class="form-control" placeholder="Search">-->
							<!--															<button class="btn" type="submit"><i class="material-icons">search</i></button>-->
							<!--														</form>-->


							<ul class="ml-auto nav navbar-nav d-none d-md-flex">
								<li class="nav-item dropdown">
									<a href="#notifications_menu" class="nav-link dropdown-toggle"
									   data-toggle="dropdown" data-caret="false">
										<i class="material-icons nav-icon navbar-notifications-indicator pl-2">notifications</i>
									</a>
									<div id="notifications_menu"
										 class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
										<div class="dropdown-item d-flex align-items-center py-2">
											<span class="flex navbar-notifications-menu__title m-0">Notifications</span>
											<a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
										</div>
										<div class="navbar-notifications-menu__content" data-perfect-scrollbar>
											<div class="py-2">

												<div class="dropdown-item d-flex">
													<div class="mr-3">
														<div class="avatar avatar-xs">
															<img src=""
																 alt="Avatar" class="avatar-img rounded-circle">
														</div>
													</div>
													<div class="flex">
														<a href="">A.Demian</a> left a comment on <a
																href="">Stack</a><br>
														<small class="text-muted">1 minute ago</small>
													</div>
												</div>
												<div class="dropdown-item d-flex">
													<div class="mr-3">
														<a href="#">
															<div class="avatar avatar-xs">
																<span class="avatar-title bg-primary rounded-circle"><i
																			class="material-icons icon-16pt">person_add</i></span>
															</div>
														</a>
													</div>
													<div class="flex">
														New user <a href="#">Peter Parker</a> signed up.<br>
														<small class="text-muted">1 hour ago</small>
													</div>
												</div>
												<div class="dropdown-item d-flex">
													<div class="mr-3">
														<a href="#">
															<div class="avatar avatar-xs">
																<span class="avatar-title rounded-circle">JD</span>
															</div>
														</a>
													</div>
													<div class="flex">
														<a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
														<div>Hey, how are you? What about our next meeting</div>
														<small class="text-muted">2 minutes ago</small>
													</div>
												</div>

												<div class="dropdown-item d-flex">
													<div class="mr-3">
														<div class="avatar avatar-xs">
															<img src=""
																 alt="Avatar" class="avatar-img rounded-circle">
														</div>
													</div>
													<div class="flex">
														<a href="">A.Demian</a> left a comment on <a
																href="">Stack</a><br>
														<small class="text-muted">1 minute ago</small>
													</div>
												</div>
												<div class="dropdown-item d-flex">
													<div class="mr-3">
														<a href="#">
															<div class="avatar avatar-xs">
																<span class="avatar-title bg-primary rounded-circle"><i
																			class="material-icons icon-16pt">person_add</i></span>
															</div>
														</a>
													</div>
													<div class="flex">
														New user <a href="#">Peter Parker</a> signed up.<br>
														<small class="text-muted">1 hour ago</small>
													</div>
												</div>
												<div class="dropdown-item d-flex">
													<div class="mr-3">
														<a href="#">
															<div class="avatar avatar-xs">
																<span class="avatar-title rounded-circle">JD</span>
															</div>
														</a>
													</div>
													<div class="flex">
														<a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
														<div>Hey, how are you? What about our next meeting</div>
														<small class="text-muted">2 minutes ago</small>
													</div>
												</div>

												<div class="dropdown-item d-flex">
													<div class="mr-3">
														<div class="avatar avatar-xs">
															<img src=""
																 alt="Avatar" class="avatar-img rounded-circle">
														</div>
													</div>
													<div class="flex">
														<a href="">A.Demian</a> left a comment on <a
																href="">Stack</a><br>
														<small class="text-muted">1 minute ago</small>
													</div>
												</div>
												<div class="dropdown-item d-flex">
													<div class="mr-3">
														<a href="#">
															<div class="avatar avatar-xs">
																<span class="avatar-title bg-primary rounded-circle"><i
																			class="material-icons icon-16pt">person_add</i></span>
															</div>
														</a>
													</div>
													<div class="flex">
														New user <a href="#">Peter Parker</a> signed up.<br>
														<small class="text-muted">1 hour ago</small>
													</div>
												</div>
												<div class="dropdown-item d-flex">
													<div class="mr-3">
														<a href="#">
															<div class="avatar avatar-xs">
																<span class="avatar-title rounded-circle">JD</span>
															</div>
														</a>
													</div>
													<div class="flex">
														<a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
														<div>Hey, how are you? What about our next meeting</div>
														<small class="text-muted">2 minutes ago</small>
													</div>
												</div>

											</div>
										</div>
										<a href="javascript:void(0);"
										   class="dropdown-item text-center navbar-notifications-menu__footer">View
											All</a>
									</div>
								</li>
								<li class="nav-item">
									<a href="#events-drawer" data-toggle="sidebar"
									   class="nav-link d-flex align-items-center">
										<i class="material-icons nav-icon">event_note</i>
									</a>
								</li>

							</ul>

							<div class="dropdown">
								<a href="#" data-toggle="dropdown" data-caret="false"
								   class="dropdown-toggle navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar">
									<span class="material-icons">account_circle</span><?php
									if ($this->session->userdata('role_id') == 1):
										echo 'ADMIN';
									elseif ($this->session->userdata('role_id') == 2):
										echo 'ADMIN';
									elseif ($this->session->userdata('role_id') == 3):
										echo 'INSTRUCTOR';
									elseif ($this->session->userdata('role_id') == 4):
										echo 'ESTUDIANTE';
									endif;
									?>
								</a>
								<div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu shadow" style="width: auto">
									<div class="dropdown-item d-flex align-items-center py-2 navbar-company-info py-3">

										<span class="mr-3">
											<img src="<?= $this->session->userdata('user_image') != ''
													? base_url() . $this->session->userdata('user_image')
													: base_url() . 'assets/admin/images/avatar.png' ?>" width="43"
												 height="43"
												 alt="avatar">
										</span>
										<span class="flex d-flex flex-column">
											<strong class="h6 m-0"><?= $this->session->userdata('name') ?></strong>
											<small class="text-muted text-uppercase">
												<?php
												if ($this->session->userdata('role_id') == 1):
													echo 'ADMIN';
												elseif ($this->session->userdata('role_id') == 2):
													echo 'ADMIN';
												elseif ($this->session->userdata('role_id') == 3):
													echo 'INSTRUCTOR';
												elseif ($this->session->userdata('role_id') == 4):
													echo 'ESTUDIANTE';
												endif;
												?>
											</small>
										</span>

									</div>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item d-flex align-items-center py-2" href="edit-account.html">
										<span class="material-icons mr-2">account_circle</span> Editar cuenta
									</a>
									<a class="dropdown-item d-flex align-items-center py-2" href="#">
										<span class="material-icons mr-2">settings</span> Ajustes
									</a>
									<a class="dropdown-item d-flex align-items-center py-2"
									   href="<?= base_url() . 'auth/login/logout' ?>">
										<span class="material-icons mr-2">exit_to_app</span> Cerrar sesión
									</a>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<!-- // END Header -->


			<!-- Header Layout Content -->
			<div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page"
				 style="padding-top: 60px;">


				<div class="page__heading border-bottom">
					<div class="container-fluid page__container d-flex align-items-center">
						<h1 class="mb-0 text-muted"><?= $info['title'] ?></h1>
					</div>
				</div>

				<div class="container-fluid page__container">

