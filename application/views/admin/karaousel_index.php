<div id="menghilang">
	<?= $this->session->flashdata('alert'); ?>
</div>
<div class="col-xl-12">
	<div class="card">
		<form action="<?= base_url('admin/karaousel/simpan') ?>" method="POST" enctype='multipart/form-data'>
			<h5 class="card-header">File input</h5>
			<div class="card-body">
				<div class="mb-3">
					<label for="recipient-name" class="col-form-label">Judul</label>
					<input type="text" class="form-control" placeholder="Judul foto" name="judul" id="recipient-name">
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label">Pilih Foto dengan ukuran (1:3)</label>
					<input class="form-control" type="file" name="foto">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php foreach ($karaousel as $aa): ?>
<div class="card">
	<img src="<?= base_url('Modernize/karaousel/' . $aa['foto']) ?>" class="card-img-top">
	<div class="card-body">
		<h5 class="card-title"><?= $aa['judul'] ?></h5>
		<a class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus foto ini??')"
			href="<?= base_url('admin/karaousel/hapus/' . $aa['foto']) ?>">
			<i class="ti ti-trash"></i>
		</a>
	</div>
</div>
<?php endforeach; ?>
