<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
<div id="menghilang">
	<?php echo $this->session->flashdata('alert', true); ?>
</div>
<button data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" class="btn btn-primary m-1">Tambah
	User</button>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Data User</div>
			</div>

			<table class="table mt-3">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama</th>
						<th scope="col">Username</th>
						<th scope="col">Level</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($user as $aa) { ?>
					<tr>
						<th scope="row"><?= $no; ?></th>
						<td><?= $aa['nama']; ?></td>
						<td><?= $aa['username']; ?></td>
						<td><?= $aa['level']; ?></td>
						<td>
							<a class="btn btn-sm btn-danger"
								onclick="return confirm('Apakah anda yakin ingin mengahpus data ini?')"
								href="<?= base_url('admin/user/hapus/'.$aa['id_user']) ?>">
								<i class="ti ti-trash"></i>
							</a>
							<a class="btn btn-sm btn-primary" data-bs-toggle="modal"
								data-bs-target="#exampleModal<?=$aa['id_user']?>"
								data-bs-whatever="@mdo">
								<i class="ti ti-edit"></i>
							</a>

						</td>
					</tr>


					<div class="modal fade" id="exampleModal<?=$aa['id_user']?>" tabindex="-1"
						aria-labelledby="exampleModalLabel<?=$aa['id_user']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<form action="<?= base_url('admin/user/update')?>" method="POST">
									<input type="hidden" name="id_user" value="<?=$aa['id_user']?>">
									<div class="modal-body">
										<div class="mb-3">
											<label for="recipient-name"
												class="col-form-label">Nama:</label>
											<input type="text" class="form-control"
												value="<?=$aa['nama']?>" name="nama"
												id="recipient-name">
										</div>
										<div class="mb-3">
											<label for="recipient-name"
												class="col-form-label">Username:</label>
											<input type="text" class="form-control"
												value="<?=$aa['username']?>" name="username"
												id="recipient-name">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Send
											message</button>
									</div>
							</div>
							</form>
						</div>
					</div>
					<?php $no++; } ?>

				</tbody>
			</table>
		</div>
	</div>

	</tbody>
	</table>


	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/user/simpan')?>" method="POST">
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Username:</label>
							<input type="text" class="form-control" name="username" id="recipient-name">
						</div>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Nama:</label>
							<input type="text" class="form-control" name="nama" id="recipient-name">
						</div>
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Password:</label>
							<input type="password" class="form-control" name="password"
								id="recipient-name">
						</div>
						<div class="mb-3">
							<label for="disabledSelect" class="form-label">Level</label>
							<select name="level" id="disabledSelect" class="form-select">
								<option>Pemilik</option>
								<option>Karyawan</option>
							</select>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
				</form>
			</div>
		</div>
	</div>
