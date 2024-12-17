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
		.munggah {
			margin-bottom: -130px;
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

	<!-- Start Hero Section -->
	<div class="munggah">
		<div class="hero">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-5">
						<!-- Display the category name once -->
						<?php if (!empty($konten)) { ?>
						<div class="intro-excerpt">
							<h1><?= $konten[0]['nama_kategori'] ?><span class="d-block">Etalase</span>
							</h1>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- End Hero Section -->


	<div class="untree_co-section product-section before-footer-section">
		<div class="container">
			<div class="row">

				<!-- Start Column 1 -->
				<?php foreach ($konten as $uu) { ?>
				<div class="col-12 col-md-4 col-lg-3 mb-5">
					<a class="product-item" href="<?= base_url('home/artikel/'. $uu['slug']) ?>">
						<img src="<?= base_url('Modernize/konten/'.$uu['foto']) ?>"
							class="img-fluid product-thumbnail">
						<h3 class="product-title"><?= $uu['judul'] ?></h3>
						<strong class="product-price">Rp.
							<?= number_format($uu['harga'], 0, ',', '.'); ?></strong>

						<span class="icon-cross">
							<div class="bi bi-eye">Detail</div>
						</span>
					</a>
				</div>
				<?php } ?>
				<!-- End Column 1 -->


			</div>
		</div>
	</div>





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
						<!-- <ul class="list-unstyled d-inline-flex ms-auto">
							<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
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
		integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
		integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
	</script>

</body>

</html>
