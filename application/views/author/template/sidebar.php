</div>


</div>
<!-- // END header-layout__content -->

</div>
<!-- // END header-layout -->

</div>
<!-- // END drawer-layout__content -->


<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
	<div class="mdk-drawer__content">
		<div class="sidebar sidebar-dark sidebar-left bg-dark-gray" data-perfect-scrollbar>

			<div class="d-flex align-items-center sidebar-p-a sidebar-account flex-shrink-0">
				<a href="<?= base_url() ?>" class="flex d-flex align-items-center text-underline-0">
                            <span class="mr-3">
                                <!-- LOGO -->
                                <img src="<?= $this->config->item('asset_url') ?>admin/images/logo.png" width="42" alt="">
                            </span>
					<span class="flex d-flex flex-column">
                                <span class="sidebar-brand">CIP - PUNO</span>
                                <small>MOOC</small>
                            </span>
				</a>
			</div>


			<ul class="sidebar-menu">
				<li class="sidebar-menu-item">
					<a class="sidebar-menu-button" href="">

						<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">photo_filter</i>
						<span class="sidebar-menu-text">Vista general</span>
					</a>
				</li>
			</ul>


			<div class="sidebar-heading">Instructor</div>
			<div class="sidebar-block p-0">
				<ul class="sidebar-menu mt-0">
					<li class="sidebar-menu-item <?= $info['active'] == 1 ? 'active' : '' ?>">
						<a class="sidebar-menu-button" href="<?= base_url() ?>author/dashboard">
							<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
							<span class="sidebar-menu-text">Dashboard</span>
							<span class="badge badge-warning rounded-circle badge-notifications ml-auto">8</span>
						</a>
					</li>
					<li class="sidebar-menu-item <?= $info['active'] == 2 ? 'active' : '' ?>">
						<a class="sidebar-menu-button" href="<?= base_url() ?>author/courses">
							<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">snippet_folder</i>
							<span class="sidebar-menu-text">Cursos</span>
						</a>
					</li>
					<li class="sidebar-menu-item <?= $info['active'] == 3 ? 'active' : '' ?>">
						<a class="sidebar-menu-button" href="<?= base_url() ?>author/quiz">
							<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">assignment</i>
							<span class="sidebar-menu-text">Evaluación</span>
						</a>
					</li>
					<li class="sidebar-menu-item">
						<a class="sidebar-menu-button" href="<?= base_url() ?>author/courses">
							<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">star</i>
							<span class="sidebar-menu-text">Favoritos</span>
						</a>
					</li>
					<li class="sidebar-menu-item">
						<a class="sidebar-menu-button" href="author-earnings.html">
							<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">local_atm</i>
							<span class="sidebar-menu-text">Earnings</span>
						</a>
					</li>
					<li class="sidebar-menu-item">
						<a class="sidebar-menu-button" href="author-reports.html">
							<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">pie_chart</i>
							<span class="sidebar-menu-text">Reportes</span>
						</a>
					</li>
					<li class="sidebar-menu-item">
						<a class="sidebar-menu-button" href="author-payout.html">
							<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">credit_card</i>
							<span class="sidebar-menu-text">Payout</span>
						</a>
					</li>
					<li class="sidebar-menu-item">
						<a class="sidebar-menu-button" href="<?= base_url() . 'auth/login/logout' ?>">
							<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">exit_to_app</i>
							<span class="sidebar-menu-text">Cerrar sesión</span>
						</a>
					</li>
				</ul>
			</div>


		</div>
	</div>
</div>
</div>
<!-- // END drawer-layout -->

<div class="mdk-drawer js-mdk-drawer" id="events-drawer" data-align="end">
	<div class="mdk-drawer__content">
		<div class="sidebar sidebar-light sidebar-left" data-perfect-scrollbar>


			<small class="text-dark-gray px-3 py-1">
				<strong>Thursday, 28 Feb</strong>
			</small>

			<div class="list-group list-group-flush">

				<div class="list-group-item bg-light">
					<div class="row">
						<div class="col-auto d-flex flex-column">
							<small>12:30 PM</small>
							<small class="text-dark-gray">2 hrs</small>
						</div>
						<div class="col">
							<div class="d-flex flex-column flex">
								<a href="#" class="text-body"><strong class="text-15pt">Marketing Team Meeting</strong></a>

								<small class="text-muted d-flex align-items-center"><i
											class="material-icons icon-16pt mr-1">location_on</i> 16845 Hicks
									Road</small>


							</div>
							<div class="avatar-group mt-2">

								<div class="avatar avatar-xs">
									<img src="" alt="Avatar"
										 class="avatar-img rounded-circle">
								</div>

								<div class="avatar avatar-xs">
									<img src="" alt="Avatar"
										 class="avatar-img rounded-circle">
								</div>

								<div class="avatar avatar-xs">
									<img src="" alt="Avatar"
										 class="avatar-img rounded-circle">
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>

			<small class="text-dark-gray px-3 py-1">
				<strong>Wednesday, 27 Feb</strong>
			</small>

			<div class="list-group list-group-flush">

				<div class="list-group-item bg-light">
					<div class="row">
						<div class="col-auto d-flex flex-column">
							<small>07:48 PM</small>
							<small class="text-dark-gray">30 min</small>
						</div>
						<div class="col">
							<div class="d-flex flex-column flex">
								<a href="#" class="text-body"><strong class="text-15pt">Call Alex</strong></a>


								<small class="text-muted d-flex align-items-center"><i
											class="material-icons icon-16pt mr-1">phone</i> 202-555-0131</small>

							</div>


						</div>
					</div>
				</div>

			</div>

			<small class="text-dark-gray px-3 py-1">
				<strong>Tuesday, 26 Feb</strong>
			</small>

			<div class="list-group list-group-flush">

				<div class="list-group-item bg-light">
					<div class="row">
						<div class="col-auto d-flex flex-column">
							<small>03:13 PM</small>
							<small class="text-dark-gray">2 hrs</small>
						</div>
						<div class="col">
							<div class="d-flex flex-column flex">
								<a href="#" class="text-body"><strong class="text-15pt">Design Team Meeting</strong></a>

								<small class="text-muted d-flex align-items-center"><i
											class="material-icons icon-16pt mr-1">location_on</i> 16845 Hicks
									Road</small>


							</div>
							<div class="avatar-group mt-2">

								<div class="avatar avatar-xs">
									<img src="" alt="Avatar"
										 class="avatar-img rounded-circle">
								</div>

								<div class="avatar avatar-xs">
									<img src="" alt="Avatar"
										 class="avatar-img rounded-circle">
								</div>

								<div class="avatar avatar-xs">
									<img src="" alt="Avatar"
										 class="avatar-img rounded-circle">
								</div>

								<div class="avatar avatar-xs">
									<img src=""
										 alt="Avatar" class="avatar-img rounded-circle">
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>

			<small class="text-dark-gray px-3 py-1">
				<strong>Monday, 25 Feb</strong>
			</small>

			<div class="list-group list-group-flush">

				<div class="list-group-item bg-light">
					<div class="row">
						<div class="col-auto d-flex flex-column">
							<small>12:30 PM</small>
							<small class="text-dark-gray">2 hrs</small>
						</div>
						<div class="col d-flex">
							<div class="d-flex flex-column flex">
								<a href="#" class="text-body"><strong class="text-15pt">Call Wendy</strong></a>


								<small class="text-muted d-flex align-items-center"><i
											class="material-icons icon-16pt mr-1">phone</i> 202-555-0131</small>

							</div>


							<div class="avatar avatar-xs">
								<img src="" alt="Avatar"
									 class="avatar-img rounded-circle">
							</div>


						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>
F
