<div id=menghilang>
	<?= $this->session->flashdata('alert'); ?>
</div>
<form action="<?= base_url('admin/konfigurasi/update')?>" method="POST">
	<div class="modal-header">
		<h5>Konfigurasi</h5>
	</div>
	<div class="modal-body">
		<div class="mb-3">
			<label for="recipient-name" class="col-form-label">Judul Website</label>
			<input type="text" class="form-control" name="judul_website" value="<?= $konfig->judul_website; ?>"
				id="recipient-name">
		</div>
		<div class="mb-3">
			<label for="recipient-name" class="col-form-label">Profile</label>
			<textarea type="text" class="form-control" name="profil_website"
				id="recipient-name"><?= $konfig->profil_website; ?></textarea>
		</div>
		<div class="mb-3">
			<label for="recipient-name" class="col-form-label">Instagram</label>
			<input type="text" name="instagram" class="form-control" value="<?= $konfig->instagram; ?>">
		</div>
		<div class="mb-3">
			<label for="recipient-name" class="col-form-label">Facebook</label>
			<input type="text" name="facebook" class="form-control" value="<?= $konfig->facebook; ?>">
		</div>
		<div class="mb-3">
			<label for="recipient-name" class="col-form-label">Email</label>
			<input type="email" name="email" class="form-control" value="<?= $konfig->email; ?>">
		</div>
		<div class="mb-3">
			<label for="recipient-name" class="col-form-label">Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?= $konfig->alamat; ?>">
		</div>
		<div class="mb-3">
			<label for="recipient-name" class="col-form-label">Whatsapp</label>
			<input type="text" name="no_wa" class="form-control" value="<?= $konfig->no_wa; ?>">
		</div>

	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
</form>
