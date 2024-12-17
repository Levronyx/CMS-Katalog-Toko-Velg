<div id=menghilang>
	<?= $this->session->flashdata('alert'); ?>
</div>
<button data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" class="btn btn-primary m-1">Tambah
	Konten</button>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Kategori Konten</div>
			</div>

			<table class="table mt-3">
				<thead>
					<table class="table mt-3">
						<thead>
							<tr>
								<th scope="col">Nomer</th>
								<th scope="col">Judul</th>
								<th scope="col">Kategori Konten</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Kreator</th>
								<th scope="col">Harga</th> <!-- Add Harga column -->
								<th scope="col">Foto</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($konten as $aa) { ?>
							<tr>
								<th scope="row"><?= $no; ?></th>
								<td><?= $aa['judul'];?></td>
								<td><?= $aa['nama_kategori'];?></td>
								<td><?= $aa['tanggal'];?></td>
								<td><?= $aa['nama'];?></td>
								<td>Rp. <?= number_format($aa['harga'], 0, ',', '.'); ?>
									<!-- Display Harga (Price) here -->
								</td>
								<td>
							<button type="button" class="btn btn-sm view-photo-button" data-toggle="modal"
								data-target="#viewPhotoModal<?= $aa['id_konten'] ?>">
								<img src="<?= base_url('Modernize/konten/' . $aa['foto']) ?>"
									alt="Foto" class="img-thumbnail" width="100">
							</button>
						</td>
								<td>
									<a class="btn btn-sm btn-danger"
										onClick="return confirm('Apakah anda yakin ingin menghapus konten ini??')"
										href="<?= base_url('admin/konten/hapus/'.$aa['foto']) ?>">
										<i class="ti ti-trash"></i>
									</a>
									<!-- Button to trigger modal edit with unique ID -->
									<a class="btn btn-sm btn-primary" data-bs-toggle="modal"
										data-bs-target="#exampleModalEdit<?=$aa['id_konten']?>" data-bs-whatever="@mdo">
										<i class="ti ti-edit"></i>
									</a>
								</td>
							</tr>
							<div class="modal fade" id="viewPhotoModal<?= $aa['id_konten'] ?>" tabindex="-1"
						role="dialog" aria-labelledby="viewPhotoModalLabel<?= $aa['id_konten'] ?>"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"
										id="viewPhotoModalLabel<?= $aa['id_konten'] ?>">Lihat Foto
									</h5>
									<button type="button" class="btn-close" data-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<img src="<?= base_url('Modernize/konten/' . $aa['foto']) ?>"
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

	<!-- Modal Edit (perbarui ID pada setiap modal) -->
	<?php foreach($konten as $aa) { ?>
	<div class="modal fade" id="exampleModalEdit<?=$aa['id_konten']?>" tabindex="-1"
		aria-labelledby="exampleModalLabel<?=$aa['id_konten']?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel<?=$aa['id_konten']?>">Update Konten</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/konten/update')?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="nama_foto" value="<?=$aa['foto']?>">
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Judul:</label>
							<input type="text" class="form-control" value="<?=$aa['judul']?>" name="judul"
								id="recipient-name">
						</div>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Kategori:</label>
							<select name="id_kategori" class="form-control">
								<?php foreach($kategori as $uu) { ?>
								<option <?php if($uu['id_kategori']==$aa['id_kategori']){ echo"selected"; } ?>
									value="<?= $uu['id_kategori']?>"><?= $uu['nama_kategori']?></option>
								<?php } ?>
							</select>
						</div>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Keterangan</label>
							<textarea type="text" class="form-control" name="keterangan"
								id="recipient-name"><?=$aa['keterangan']?></textarea>
						</div>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Harga</label>
							<input type="number" class="form-control" name="harga" value="<?=$aa['harga']?>">
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
	<?php } ?>


	<!-- Modal Tambah -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Konten</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/konten/simpan')?>" method="POST" enctype='multipart/form-data'>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Judul</label>
							<input type="text" class="form-control" name="judul" id="recipient-name">
						</div>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Kategori</label>
							<select name="id_kategori" class="form-control">
								<?php foreach($kategori as $aa) { ?>
								<option value="<?= $aa['id_kategori']?>"><?= $aa['nama_kategori']?></option>
								<?php } ?>
							</select>
						</div>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Keterangan</label>
							<textarea type="text" class="form-control" name="keterangan" id="recipient-name"></textarea>
						</div>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Harga</label>
							<input type="number" class="form-control" name="harga" id="recipient-name">
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
