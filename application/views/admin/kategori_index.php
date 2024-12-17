<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
<div id="menghilang">
	<?php echo $this->session->flashdata('alert', true); ?>
</div>
<button data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" class="btn btn-primary m-1">Tambah
	Kategori</button>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/kategori/simpan') ?>" method="POST">
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Nama Kategori:</label>
						<input type="text" class="form-control" name="nama_kategori" id="recipient-name"
							required>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Tambah Kategori</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Kategori Konten</div>
			</div>

			<table class="table mt-3">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama Kategori Konten</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($kategori as $aa) { ?>
					<tr>
						<th><?= $no++; ?></th>
						<td><?= $aa['nama_kategori']; ?></td>
						<td>
							<a class="btn btn-sm btn-danger"
								onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
								href="<?= base_url('admin/kategori/hapus/'.$aa['id_kategori']) ?>">
								<i class="ti ti-trash"></i>
							</a>
							<a class="btn btn-sm btn-primary" data-bs-toggle="modal"
								data-bs-target="#exampleModal<?= $aa['id_kategori'] ?>"
								data-bs-whatever="@mdo">
								<i class="ti ti-edit"></i>
							</a>
						</td>
					</tr>
					<!-- Modal Edit Kategori -->
					<div class="modal fade" id="exampleModal<?= $aa['id_kategori'] ?>" tabindex="-1"
						aria-labelledby="exampleModalLabel<?= $aa['id_kategori'] ?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<form action="<?= base_url('admin/kategori/update') ?>" method="POST">
									<input type="hidden" name="id_kategori"
										value="<?= $aa['id_kategori'] ?>">
									<div class="modal-body">
										<div class="mb-3">
											<label for="recipient-name"
												class="col-form-label">Nama Kategori:</label>
											<input type="text" class="form-control"
												value="<?= $aa['nama_kategori'] ?>"
												name="nama_kategori" id="recipient-name"
												required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Tutup</button>
										<button type="submit" class="btn btn-primary">Perbarui
											Kategori</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
