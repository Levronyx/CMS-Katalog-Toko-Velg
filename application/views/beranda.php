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
		.hero .carousel {
			margin: auto;
			max-width: 400px;
			/* Sesuaikan dengan ukuran yang diinginkan */
		}

		#carouselExampleIndicators img {
			max-height: 600px;
			/* Sesuaikan tinggi maksimal */
			object-fit: cover;
			/* Pastikan gambar tidak terdistorsi */
		}

		.post-thumbnail img {
			width: 350px;
			/* Ukuran panjang yang diinginkan */
			height: 250px;
			/* Ukuran lebar yang diinginkan */
			object-fit: cover;
			/* Memastikan gambar tetap proporsional dalam bingkai */
			border-radius: 8px;
			/* Opsional: membuat sudut membulat */
		}

		.browse-products-container {
			text-align: center;
			margin: 70px auto;
			/* Menambahkan jarak dari atas dan bawah */
			margin-bottom: 15px;
			padding: 20px 10px;
			/* Menambahkan padding */
			max-width: 1200px;
			/* Lebar maksimum untuk container */
			width: 90%;
			/* Membuat container fleksibel */
			background-color: #f8f9fa;
			/* Warna background opsional */
			border-radius: 8px;
			/* Membuat sudut membulat */
			box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
			/* Efek bayangan */
		}

		.browse-products-container .browse-text,
		.browse-products-container .scroll-text {
			font-size: 1.5rem;
			/* Memperbesar teks */
			font-weight: bold;
			margin-bottom: 10px;
		}

		.browse-products-container .divider {
			height: 4px;
			/* Ketebalan garis */
			background-color: #333;
			/* Warna garis */
			margin: 10px auto;
			/* Pusatkan garis */
			width: 50%;
			/* Lebar garis */
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
					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url('home')?>">Home</a>
					</li>
					<?php foreach ($kategori as $kate) { ?>
					<li class="nav-item">
						<a href="<?= base_url('home/kategori/'.$kate['id_kategori']) ?>"
							class="nav-item nav-link">
							<?= $kate['nama_kategori'] ?>
						</a>
					</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="#galeri">Galeri</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Header/Navigation -->

	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Lancar Jaya Velg<span class="d-block">Racing</span></h1>
						<p class="mb-4"><?= $konfig->profil_website; ?>
							<span class="d-block">Lokasi :</span>
							<?= $konfig->alamat; ?><span>.</span>
							<span class="d-block">Jam Operasional :</span>
							<span class="d-block">Senin - Sabtu: 08.00 - 18.00
								Minggu: 09.00 - 15.00</span></p>
						<span class="d-block">Hubungi Kami :</span>
					</div>
					<div>
						<p style="display: flex; gap: 20px; align-items: center;">
							<a href="<?= $konfig->no_wa; ?>" class="bi bi-whatsapp text-success"
								style="font-size: 2.5rem;" aria-label="WhatsApp"></a>
							<a href="<?= $konfig->instagram; ?>" class="bi bi-instagram"
								style="color: #C13584; font-size: 2.5rem;" aria-label="Instagram"></a>
							<a href="<?= $konfig->facebook; ?>" class="bi bi-facebook"
								style="font-size: 2.5rem; color: #4267B2;" aria-label="Facebook"></a>
						</p>

					</div>

				</div>
				<div class="col-lg-6 d-flex align-items-center justify-content-center">
					<div id="carouselExampleInterval" class="carousel slide large-carousel"
						data-bs-ride="carousel">
						<div class="carousel-inner">
							<?php $no=1; foreach ($caraousel as $aa) { ?>
							<div class="carousel-item <?php if ($no==1) { echo 'active'; } ?>">
								<img src="<?= base_url('Modernize/caraousel/' . $aa['foto']) ?>"
									class="d-block w-100" alt="Slide Image">
							</div>
							<?php $no++; } ?>
						</div>
						<button class="carousel-control-prev" type="button"
							data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button"
							data-bs-target="#carouselExampleInterval" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->
	<div class="browse-products-container">
		<span class="browse-text">KATEGORI BRAND</span>
		<div class="divider"></div>
		<span class="scroll-text">GESER KANAN / KIRI</span>
	</div>
	<div class="d-flex align-items-center justify-content-center vh-100">
		<div class="col-lg-8 col-md-10 col-sm-12">
			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
						class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
						aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
						aria-label="Slide 3"></button>
				</div>
				<div class="carousel-inner">
					<?php $no=1; foreach ($karaousel as $aa) { ?>
					<div class="carousel-item <?php if ($no==1) { echo 'active'; } ?>">
						<img src="<?= base_url('Modernize/karaousel/' . $aa['foto']) ?>"
							class="d-block w-100" alt="Slide Image">
					</div>
					<?php $no++; } ?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
					data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
					data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>

	<div class="browse-products-container">
		<span class="browse-text">BEST SELLER</span>
		<div class="divider"></div>
		<span class="scroll-text">2024</span>
	</div>
	<!-- Start Product Section -->
	<div class="product-section">
		<div class="container">
			<div class="row">
				<!-- Start Column 1 -->
				<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
					<h2 class="mb-4 section-title">Produk paling laku satu tahun terakhir.</h2>
					<p class="mb-4">"Terbukti! Produk ini menjadi pilihan favorit semua orang."</p>
				</div>
				<!-- End Column 1 -->

				<!-- Start Column 2 -->
				<!-- Start Column 1 -->
				<?php foreach ($best as $uu) { ?>
				<div class="col-12 col-md-4 col-lg-3 mb-5">
					<a class="product-item">
						<img src="<?= base_url('Modernize/best/'.$uu['foto']) ?>"
							class="img-fluid product-thumbnail">
						<h3 class="product-title"><?= $uu['judul'] ?></h3>
						<strong class="product-price">Rp.
							<?= number_format($uu['harga'], 0, ',', '.'); ?></strong>
					</a>
				</div>
				<?php } ?>
				<!-- End Column 1 -->

			</div>
		</div>
	</div>
	<!-- End Product Section -->

	<!-- Start Blog Section (Galeri) -->
	<div class="browse-products-container" id="galeri">
		<span class="browse-text">FOTO VELG TERPASANG</span>
		<div class="divider"></div>
		<span class="scroll-text">2024</span>
	</div>
	<div class="blog-section">
		<div class="container">
			<div class="row">
				<?php foreach ($galeri as $gg) { 
				$modalId = str_replace(' ', '_', $gg['judul']); // Mengubah spasi menjadi underscore untuk ID modal ?>
				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a class="post-thumbnail" data-bs-toggle="modal"
							data-bs-target="#modal<?= $gg['id_galeri']?>">
							<img src="<?= base_url('Modernize/galeri/'.$gg['foto']) ?>" alt="Image"
								class="img-fluid rounded shadow post-thumbnail-img">
						</a>
						<div class="post-content-entry text-center mt-3">
							<h3><a><?= $gg['judul'] ?? 'No Title' ?></a></h3>
							<div class="meta">
								<span>by <a href="#"><?= $gg['username'] ?? 'Unknown' ?></a></span>
								<span>on <a
										href="#"><?= date('d F Y', strtotime($gg['tanggal'])) ?></a></span>
							</div>
						</div>
					</div>

				</div>

				<!-- Modal -->
				<div class="modal fade" id="modal<?= $gg['id_galeri']?>" tabindex="-1"
					aria-labelledby="modalLabel<?= $gg['id_galeri']?>" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalLabel<?= $gg['id_galeri']?>">
									<?= $gg['judul'] ?? 'No Title' ?></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body text-center">
								<img src="<?= base_url('Modernize/galeri/'.$gg['foto']) ?>"
									alt="<?= $gg['judul'] ?? 'Image' ?>"
									class="img-fluid rounded shadow-sm">
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Close</button>
								<a href="<?= base_url('Modernize/galeri/'.$gg['foto']) ?>"
									class="btn btn-primary" download>Download Gambar</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

	</div>

	<!-- End Blog Section -->



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
							<li><a href="<?= base_url('home/kategori/'.$kate['id_kategori'])?>"><?= $kate['nama_kategori']?></a>
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
