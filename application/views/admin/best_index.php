<div id="menghilang">
	<?= $this->session->flashdata('alert'); ?>
</div>

<!-- Button to trigger 'Add Best' modal -->
<button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary m-1">Tambah Best</button>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Kategori Best</div>
			</div>

			<table class="table mt-3">
				<thead>
					<tr>
						<th scope="col">No.</th>
						<th scope="col">Judul</th>
						<th scope="col">Kategori Best</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Kreator</th>
						<th scope="col">Harga</th> <!-- Add Harga column -->
						<th scope="col">Foto</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($best as $aa) { ?>
					<tr>
						<th scope="row"><?= $no; ?></th>
						<td><?= $aa['judul']; ?></td>
						<td><?= $aa['nama_kategori']; ?></td>
						<td><?= $aa['tanggal']; ?></td>
						<td><?= $aa['nama']; ?></td>
						<td>Rp. <?= number_format($aa['harga'], 0, ',', '.'); ?></td> <!-- Display Harga -->
						<td>
							<button type="button" class="btn btn-sm view-photo-button" data-toggle="modal"
								data-target="#viewPhotoModal<?= $aa['id_best'] ?>">
								<img src="<?= base_url('Modernize/best/' . $aa['foto']) ?>"
									alt="Foto" class="img-thumbnail" width="100">
							</button>
						</td>
						<td>
							<a class="btn btn-sm btn-danger"
								onClick="return confirm('Apakah anda yakin ingin menghapus best ini?')"
								href="<?= base_url('admin/best/hapus/'.$aa['foto']) ?>">
								<i class="ti ti-trash"></i>
							</a>
							<!-- Button to trigger Edit modal -->
							<a class="btn btn-sm btn-primary" data-bs-toggle="modal"
								data-bs-target="#exampleModalEdit<?= $aa['id_best'] ?>" data-bs-whatever="@mdo">
								<i class="ti ti-edit"></i>
							</a>
						</td>
					</tr>
					<div class="modal fade" id="viewPhotoModal<?= $aa['id_best'] ?>" tabindex="-1"
						role="dialog" aria-labelledby="viewPhotoModalLabel<?= $aa['id_best'] ?>"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"
										id="viewPhotoModalLabel<?= $aa['id_best'] ?>">Lihat Foto
									</h5>
									<button type="button" class="btn-close" data-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<img src="<?= base_url('Modernize/best/' . $aa['foto']) ?>"
										class="img-fluid" alt="Foto">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="exampleModalEdit<?= $aa['id_best'] ?>" tabindex="-1"
	aria-labelledby="exampleModalLabel<?= $aa['id_best'] ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel<?= $aa['id_best'] ?>">Update Best </h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/best/update') ?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="nama_foto" value="<?= $aa['foto'] ?>"> <!-- Menyertakan foto lama -->
					<input type="hidden" name="old_foto" value="<?= $aa['foto'] ?>"> <!-- Menyertakan foto lama untuk penghapusan -->
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Judul:</label>
						<input type="text" class="form-control" value="<?= $aa['judul'] ?>" name="judul"
							id="recipient-name">
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Kategori:</label>
						<select name="id_kategori" class="form-control">
							<?php foreach ($kategori as $uu) { ?>
							<option <?= $uu['id_kategori'] == $aa['id_kategori'] ? "selected" : "" ?>
								value="<?= $uu['id_kategori'] ?>"><?= $uu['nama_kategori'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Keterangan</label>
						<textarea class="form-control" name="keterangan"
							id="recipient-name"><?= $aa['keterangan'] ?></textarea>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Harga</label>
						<input type="number" class="form-control" name="harga" value="<?= $aa['harga'] ?>">
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Foto</label>
						<input type="file" name="foto" class="form-control" accept="image/png, image/jpeg">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>
					<?php $no++; } ?>
				</tbody>
			</table>

		</div>
	</div>
</div>

<!-- Modal for editing the 'Best' entry -->
<?php foreach($best as $aa) { ?>

<?php } ?>


<!-- Modal for adding a new 'Best' entry -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Best</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/best/simpan') ?>" method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Judul:</label>
						<input type="text" class="form-control" name="judul" id="recipient-name">
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Kategori:</label>
						<select name="id_kategori" class="form-control">
							<?php foreach ($kategori as $aa) { ?>
							<option value="<?= $aa['id_kategori'] ?>"><?= $aa['nama_kategori'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Keterangan:</label>
						<textarea class="form-control" name="keterangan" id="recipient-name"></textarea>
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Harga:</label>
						<input type="number" class="form-control" name="harga" id="recipient-name">
					</div>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Foto:</label>
						<input type="file" name="foto" class="form-control" accept="image/png, image/jpeg">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>
