<div id="menghilang">
	<?= $this->session->flashdata('alert'); ?>
</div>

<button data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" class="btn btn-primary m-1">
	Tambah Foto
</button>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Galeri Foto</div>
			</div>

			<table class="table mt-3">
				<thead>
					<tr>
						<th scope="col">Nomer</th>
						<th scope="col">Judul</th>
						<th scope="col">Foto</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Username</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($galeri as $item) { ?>
					<tr>
						<th scope="row"><?= $no; ?></th>
						<td><?= $item['judul']; ?></td>
						<td>
							<button type="button" class="btn btn-sm view-photo-button" data-toggle="modal"
								data-target="#viewPhotoModal<?= $item['id_galeri'] ?>">
								<img src="<?= base_url('Modernize/galeri/' . $item['foto']) ?>"
									alt="Foto" class="img-thumbnail" width="100">
							</button>
						</td>
						<td><?= $item['tanggal']; ?></td>
						<td><?= $item['username']; ?></td>
						<td>
							<a class="btn btn-sm btn-danger"
								onClick="return confirm('Apakah anda yakin ingin menghapus foto ini?')"
								href="<?= base_url('admin/galeri/hapus/' . $item['id_galeri']) ?>">
								<i class="ti ti-trash"></i>
							</a>
							<a class="btn btn-sm btn-primary" data-bs-toggle="modal"
								data-bs-target="#exampleModalEdit<?= $item['id_galeri'] ?>"
								data-bs-whatever="@mdo">
								<i class="ti ti-edit"></i>
							</a>
						</td>
					</tr>

					<!-- Modal View Photo -->
					<div class="modal fade" id="viewPhotoModal<?= $item['id_galeri'] ?>" tabindex="-1"
						role="dialog" aria-labelledby="viewPhotoModalLabel<?= $item['id_galeri'] ?>"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"
										id="viewPhotoModalLabel<?= $item['id_galeri'] ?>">Lihat Foto
									</h5>
									<button type="button" class="btn-close" data-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<img src="<?= base_url('Modernize/galeri/' . $item['foto']) ?>"
										class="img-fluid" alt="Foto">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Tambah Foto -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/galeri/simpan') ?>" method="POST"
					enctype='multipart/form-data'>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Judul</label>
						<input type="text" class="form-control" name="judul" id="recipient-name" required>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Foto</label>
						<input type="file" name="foto" class="form-control" accept="image/png, image/jpeg"
							required>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							data-bs-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<?php foreach ($galeri as $item) { ?>
<div class="modal fade" id="exampleModalEdit<?= $item['id_galeri'] ?>" tabindex="-1"
    aria-labelledby="exampleModalEditLabel<?= $item['id_galeri'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalEditLabel<?= $item['id_galeri'] ?>">Edit Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/galeri/update') ?>" method="POST" enctype="multipart/form-data">
                    <!-- Input Judul -->
                    <div class="mb-3">
                        <label for="judul<?= $item['id_galeri'] ?>" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul<?= $item['id_galeri'] ?>" 
                            value="<?= $item['judul'] ?>" required>
                    </div>
                    <!-- Input ID Galeri -->
                    <input type="hidden" name="id_galeri" value="<?= $item['id_galeri'] ?>">
                    <!-- Input Foto -->
                    <div class="mb-3">
                        <label for="foto<?= $item['id_galeri'] ?>" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto<?= $item['id_galeri'] ?>"
                            accept="image/png, image/jpeg">
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>




