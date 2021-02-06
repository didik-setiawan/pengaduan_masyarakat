<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Edit Profile</h4>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card shadow">
							<div class="card-body">
								<form action="<?= base_url('user/edit_password'); ?>" method="post">
								<div class="form-group row">
									<label class="col-lg-2">Password Lama</label>
									<div class="col-lg-8">
										<input type="password" name="pl" class="form-control">
										<?= form_error('pl','<small class="text-danger">','</small>'); ?>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-2">Password Baru</label>
									<div class="col-lg-8">
										<input type="password" name="pb" class="form-control">
										<?= form_error('pb','<small class="text-danger">','</small>'); ?>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-2">Konfirmasi Password Baru</label>
									<div class="col-lg-8">
										<input type="password" name="kpb" class="form-control">
										<?= form_error('kpb','<small class="text-danger">','</small>'); ?>
									</div>
								</div>

								<a href="<?= base_url('user/edit_profile'); ?>" class="btn btn-dark">Kembali</a>
								<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
