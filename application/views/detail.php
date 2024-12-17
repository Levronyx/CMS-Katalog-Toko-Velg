<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<link href="path/to/bootstrap-icons.css" rel="stylesheet">


	<!-- Bootstrap CSS -->
	<link href="<?= base_url('front/') ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('front/') ?>https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
		rel="stylesheet">
	<link href="<?= base_url('front/') ?>css/tiny-slider.css" rel="stylesheet">
	<link href="<?= base_url('front/') ?>css/style.css" rel="stylesheet">
	<style>
		.hero {
			margin-bottom: -100px;
			/* Mengurangi jarak hero section dengan konten */
		}

		.mt-150 {
			margin-top: 50px !important;
			/* Mengurangi margin atas pada konten */
		}

		.hero .intro-excerpt {
			position: relative;
			top: -70px;
			/* Naikkan elemen sebesar 50px */
		}

		.hero .carousel {
			margin: auto;
			max-width: 400px;
			/* Sesuaikan dengan ukuran yang diinginkan */
		}

		.hero .container {
			position: relative;
			top: -50px;
			/* Naikkan container sebesar 50px */
		}

		.hero .intro-excerpt {
			position: relative;
			top: -20px;
			/* Naikkan teks di dalamnya untuk penyesuaian */
		}

		.sidebar-section p {
			font-size: 16px;
			line-height: 1.8;
			margin-top: 10px;
			color: #555;
		}

		.sidebar-section h2 {
			font-size: 24px;
			margin-bottom: 10px;
			color: #333;
		}

		.sidebar-section h4 {
			font-size: 20px;
			font-weight: bold;
			margin-bottom: 15px;
			color: #f56b2a;
		}

		.sidebar-section .row {
			display: flex;
			flex-wrap: wrap;
			/* Allow wrapping of items on smaller screens */
			justify-content: space-between;
			/* Ensure equal spacing between items */
			/* General adjustments for the "Produk Serupa" section */
		}

		/* Adjusting the space between products */
		.sidebar-section .row {
			display: flex;
			flex-wrap: wrap;
			gap: 10px;
			/* Reduce the gap to make the products closer */
		}

		/* Adjust the width to 33.33% for three products in a row */
		.sidebar-section .col-6 {
			flex: 0 0 32%;
			max-width: 32%;
			/* Ensure the width does not exceed 33% */
			padding: 0px;
			/* Adjust padding to space products */
		}

		/* Optional: For smaller screens, show products in full width (1 per row) */
		@media (max-width: 767px) {
			.sidebar-section .col-6 {
				flex: 0 0 100%;
				/* Each product takes full width on small screens */
				max-width: 100%;
			}
		}

		/* Styling for the card */
		.card {
			border: 0;
			border-radius: 8px;
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
			overflow: hidden;
		}

		.card-img-top {
			height: 180px;
			/* Set a fixed height for the image */
			object-fit: cover;
			border-bottom: 2px solid #ddd;
		}

		.card-body {
			padding: 8px;
		}

		.card-title {
			font-size: 14px;
			font-weight: bold;
			color: #333;
			text-overflow: ellipsis;
			white-space: nowrap;
			overflow: hidden;
		}

		.card-text {
			font-size: 12px;
			color: #f56b2a;
			font-weight: bold;
		}

		/* Hover effect for cards */
		.card:hover {
			transform: translateY(-5px);
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		}

	</style>

	<title>Lancar Jaya Velg</title>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="index.html"><?= $konfig->judul_website; ?><span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0 d-flex align-items-center">
					<li
						class="nav-item <?= ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
						<a class="nav-link" href="<?= base_url('home') ?>">Home</a>
					</li>
					<?php foreach ($kategori as $kate) { 
        $active = ($this->uri->segment(2) == 'kategori' && $this->uri->segment(3) == $kate['id_kategori']) ? 'active' : '';
    ?>
					<li class="nav-item <?= $active ?>">
						<a href="<?= base_url('home/kategori/'.$kate['id_kategori']) ?>" class="nav-link">
							<?= $kate['nama_kategori'] ?>
						</a>
					</li>
					<?php } ?>
				</ul>

			</div>
		</div>
	</nav>
	<!-- End Header/Navigation -->

	<body>
		<!-- Start Hero Section -->
		<div class="hero">
			<div class="container">
				<div class="col-lg-4 text-center">
					<div class="intro-excerpt">
						<h1>Detail Velg</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- End Hero Section -->
		<!-- breadcrumb-section -->
		<!-- end breadcrumb section -->

		<!-- single article section -->
		<div class="mt-150 mb-150">
			<div class="container">
				<div class="row">
					<!-- Deskripsi Produk -->
					<div class="col-lg-6">
						<div class="single-article-section">
							<div class="single-article-text">
								<div>
									<img src="<?= base_url('Modernize/konten/' . $konten->foto) ?>"
										alt="Foto Konten" class="img-fluid rounded">
									<p>Deskripsi :</p>
									<p><?= nl2br(htmlspecialchars($konten->keterangan)); ?></p>
								</div>
							</div>
						</div>
					</div>

					<!-- Informasi Konten & Produk Serupa -->
					<div class="col-lg-6">
						<!-- Informasi Konten -->
						<div class="sidebar-section">
							<p class="blog-meta" style="margin-top: 20px;">
								<span class="author"><i class="bi bi-person"></i>
									<?= $konten->nama; ?></span>
								<span class="date"><i class="bi bi-bookmark"></i>
									<?= $konten->nama_kategori; ?></span>
							</p>
							<h2><?= $konten->judul; ?></h2>
							<h4>Rp. <?= number_format($konten->harga, 0, ',', '.'); ?></h4>
						</div>
						<hr>
						<div class="sidebar-section mt-4">
							<div class="sidebar-section mt-4">
								<h5 class="mb-4">Produk Lain Dari Toko</h5>
								<div class="row">
									<?php if (!empty($rekomendasi)): ?>
									<?php $counter = 0; ?>
									<?php foreach ($rekomendasi as $item): ?>
									<?php if ($counter < 3): ?>
									<!-- Limit to only 2 products -->
									<div class="col-6 col-md-6 mb-4">
										<!-- 50% width per item for 2 items -->
										<a href="<?= base_url('home/artikel/' . $item['slug']) ?>"
											class="text-decoration-none">
											<div class="card border-0 shadow-sm">
												<img src="<?= base_url('Modernize/konten/' . $item['foto']) ?>"
													alt="<?= htmlspecialchars($item['judul']) ?>"
													class="card-img-top img-fluid">
												<div class="card-body">
													<h6 class="card-title text-truncate">
														<?= htmlspecialchars($item['judul']) ?>
													</h6>
													<p class="card-text text-danger fw-bold">
														Rp.
														<?= number_format($item['harga'], 0, ',', '.') ?>
													</p>
												</div>
											</div>
										</a>
									</div>
									<?php $counter++; ?>
									<?php else: ?>
									<?php break; ?>
									<!-- Stop the loop after 2 items -->
									<?php endif; ?>
									<?php endforeach; ?>
									<?php else: ?>
									<p class="text-muted">Tidak ada produk serupa tersedia.</p>
									<?php endif; ?>
								</div>
							</div>



						</div>
					</div>
				</div>
			</div>


		</div>
		</div>
		</div>

		</div>
		</div>
		</div>
		<!-- end single article section -->
		<div>
		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">
				<div class="border-top copyright">
				</div>
			</div>
		</footer>
		<!-- End Footer Section -->

		<!-- Start Footer Section -->
		<footer class="footer-section" style="background-color: #fff; color: #000; padding: 40px 0;">
			<div class="container">
				<div class="row">


					<!-- Follow Us -->
					<div class="col-lg-3 col-md-6 mb-4">
						<h5 style="font-weight: bold;">FOLLOW US</h5>
						<div>
							<p style="display: flex; gap: 20px; align-items: center;">
								<a href="<?= $konfig->no_wa; ?>" class="bi bi-whatsapp text-success"
									style="font-size: 2.5rem;" aria-label="WhatsApp"></a>
								<a href="<?= $konfig->instagram; ?>" class="bi bi-instagram"
									style="color: #C13584; font-size: 2.5rem;"
									aria-label="Instagram"></a>
								<a href="<?= $konfig->facebook; ?>" class="bi bi-facebook"
									style="font-size: 2.5rem; color: #4267B2;"
									aria-label="Facebook"></a>
							</p>

						</div>
					</div>

					<!-- Quick Links -->
					<div class="col-lg-3 col-md-6 mb-4">
						<h5 style="font-weight: bold;">QUICK LINKS</h5>
						<ul>
							<?php foreach ($kategori as $kate) { ?>
							<li><a
									href="<?= base_url('home/kategori/'.$kate['id_kategori'])?>"><?= $kate['nama_kategori']?></a>
							</li>
							<?php } ?>
						</ul>
					</div>

					<!-- Locate Us -->
					<div class="col-lg-3 col-md-6 mb-4">
						<h5 style="font-weight: bold;">LOCATE US</h5>
						<?= $konfig->alamat; ?>
					</div>

					<!-- Policy & Terms -->
					<div class="col-lg-3 col-md-6 mb-4">
						<h5 style="font-weight: bold;">POLICY & TERMS</h5>
						<ul class="list-unstyled d-inline-flex ms-auto">
							<!-- <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul> -->
					</div>
				</div>

				<!-- Footer Bottom -->
				<div class="row mt-4">
					<div class="col-md-6 text-center text-md-start">
						<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
								document.write(new Date().getFullYear());

							</script>. All Rights Reserved. &mdash; Designed with love by <a
								href="https://www.instagram.com/fabiankrisnaa?igsh=b2d4emhxY20yZWRh">Levronyx</a>
						</p>
					</div>

				</div>
			</div>
		</footer>
	</div>


		<script src="<?= base_url('front/') ?>/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url('front/') ?>/js/tiny-slider.js"></script>
		<script src="<?= base_url('front/') ?>/js/custom.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
			integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
			crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
			integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
			crossorigin="anonymous">
		</script>

	</body>

</html>
