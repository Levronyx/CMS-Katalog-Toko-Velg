<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel="shortcut icon" type="image/png" href="<?= base_url('Modernize/src') ?>/assets/images/logos/favicon.png" />
	<link rel="stylesheet" href="<?= base_url('Modernize/src') ?>/assets/css/styles.min.css" />
</head>

<body>
	<!--  Body Wrapper -->
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
		data-sidebar-position="fixed" data-header-position="fixed">
		<!-- Sidebar Start -->
		<aside class="left-sidebar">
			<!-- Sidebar scroll-->
			<div>
				<div class="brand-logo d-flex align-items-center justify-content-between">
					<a href="<?= base_url('home'); ?>" class="text-nowrap logo-img">
						<img src="<?= base_url('Modernize/src') ?>/assets/images/logos/dark-logo.svg" width="180" alt="" />
					</a>
					<div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
						<i class="ti ti-x fs-8"></i>
					</div>
				</div>
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
					<ul id="sidebarnav">
						<li class="nav-small-cap ">
							<i class="ti ti-dots nav-small-cap-icon fs-4 "></i>
							<span class="hide-menu ">Home</span>
						</li>
						<li class="sidebar-item <?= ($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
							<a class="sidebar-link <?php base_url('admin/home') ?>" href="<?= base_url('admin/home')?>"
								aria-expanded="false">
								<span>
									<i class="ti ti-layout-dashboard"></i>
								</span>
								<span class="hide-menu ">Dashboard</span>
							</a>
						</li>
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('admin/caraousel')?>" aria-expanded="false">
								<span>
									<i class="ti ti-arrows-left-right"></i>
								</span>
								<span class="hide-menu">Caraousel</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('admin/karaousel')?>" aria-expanded="false">
								<span>
									<i class="ti ti-arrows-left-right"></i>
								</span>
								<span class="hide-menu">Caraousel 2</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('admin/kategori')?>" aria-expanded="false">
								<span>
									<i class="ti ti-category"></i>
								</span>
								<span class="hide-menu">Kategori Konten</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('admin/konten')?>" aria-expanded="false">
								<span>
									<i class="ti ti-cards"></i>
								</span>
								<span class="hide-menu">Konten</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('admin/best')?>" aria-expanded="false">
								<span>
									<i class="ti ti-cards"></i>
								</span>
								<span class="hide-menu">Best Konten</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('admin/konfigurasi')?>" aria-expanded="false">
								<span>
									<i class="ti ti-adjustments-horizontal"></i>
								</span>
								<span class="hide-menu">Konfigurasi</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('admin/galeri')?>" aria-expanded="false">
								<span>
									<i class="ti ti-photo"></i>
								</span>
								<span class="hide-menu">Galeri</span>
							</a>
						</li>
						<?php if($this->session->userdata('level')=="Admin"){?>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('admin/user')?>" aria-expanded="false">
								<span>
									<i class="ti ti-file-description"></i>
								</span>
								<span class="hide-menu">User</span>
							</a>
						</li>
						<?php } ?>
						<li class="sidebar-item">
						</li>
				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>
		<!--  Sidebar End -->
		<!--  Main wrapper -->
		<div class="body-wrapper">
			<!--  Header Start -->
			<header class="app-header">
				<nav class="navbar navbar-expand-lg navbar-light">
					<ul class="navbar-nav">
						<li class="nav-item d-block d-xl-none">
							<a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
								<i class="ti ti-menu-2"></i>
							</a>
						</li>
						<li class="nav-item">
							
						</li>
					</ul>
					<div class="navbar-collapse justify-content-end px-0" id="navbarNav">
						<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
							<li class="item dropdown">
								<div class="nav-link nav-icon-hover"></div>
								<?= $this->session->userdata('nama')?> || <?= $this->session->userdata('level')?>
								<a href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
									<img src="<?= base_url('Modernize/src') ?>/assets/images/profile/user-1.jpg" alt="" width="35"
										height="35" class="rounded-circle">
								</a>
								<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
									<div class="message-body">
										<!-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
											<i class="ti ti-user fs-6"></i>
											<p class="mb-0 fs-3">My Profile</p>
										</a>
										<a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
											<i class="ti ti-mail fs-6"></i>
											<p class="mb-0 fs-3">My Account</p>
										</a>
										<a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
											<i class="ti ti-list-check fs-6"></i>
											<p class="mb-0 fs-3">My Task</p>
										</a> -->
										<a href="<?= base_url('auth/logout') ?>"
											class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<div class="container-fluid">
				<p class="mb-2"><?= $contents ?></p>
			</div>
			<!--  Header End -->
		</div>
	</div>
	</div>

	<script src="<?= base_url('Modernize/src') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url('Modernize/src') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('Modernize/src') ?>/assets/js/sidebarmenu.js"></script>
	<script src="<?= base_url('Modernize/src') ?>/assets/js/app.min.js"></script>
	<script src="<?= base_url('Modernize/src') ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
	<script src="<?= base_url('Modernize/src') ?>/assets/libs/simplebar/dist/simplebar.js"></script>
	<script src="<?= base_url('Modernize/src') ?>/assets/js/dashboard.js"></script>

	<script>
		$('#menghilang').delay('slow').slideDown('slow').delay(400).slideUp(600);

		$(document).ready(function () {
			// When the user clicks the button to view photo, show the modal
			$('.view-photo-button').on('click', function () {
				var targetModal = $(this).data('target');
				$(targetModal).modal('show');
			});

			// When the user clicks the close button, hide the modal
			$('.btn-close, .btn-secondary').on('click', function () {
				var modal = $(this).closest('.modal');
				modal.modal('hide');
			});
		});

	</script>
</body>

</html>
