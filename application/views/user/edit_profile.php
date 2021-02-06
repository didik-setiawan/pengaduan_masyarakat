
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Edit Profile</h4>

			<div class="row">
				<div class="col-lg-12">
					<div class="card sahdow">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-lg-2">Username</label>
								<div class="col-lg-8">
									<input type="text" name="username" class="form-control" value="<?= $pengguna['username']; ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-2">No Telp</label>
								<div class="col-lg-8">
									<input type="text" name="telp" class="form-control" value="<?= $pengguna['telp']; ?>" readonly>
								</div>
							</div>
							<form action="<?= base_url('user/edit_profile'); ?>" method="post">
							<div class="form-group row">
								<label class="col-lg-2">Nama</label>
								<div class="col-lg-8">
									<input type="text" name="nama" class="form-control" value="<?= $pengguna['nama']; ?>">
									<?= form_error('nama','<small class="text-danger">','</small>'); ?>
								</div>
							</div>

							<a href="<?= base_url('user/edit_password'); ?>" class="btn btn-warning"><i class="fa fa-key"></i> Edit Password</a>
							<button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
