
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Tambah Data Petugas</h4>
			<div class="row">
				<div class="col-lg-12">
					<div class="card shadow">
						<div class="card-body">
							<form action="<?= base_url('master/add_petugas'); ?>" method="post">
								<div class="row justify-content-center">
									<div class="col-lg-5 mx-4">
										<div class="form-group">
											<label>Nama</label>
											<input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
											<?= form_error('nama','<small class="text-danger">','</small>'); ?>

										</div>
									</div>

									<div class="col-lg-5 mx-4">
										<div class="form-group">
											<label>Username</label>
											<input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
											<?= form_error('username','<small class="text-danger">','</small>'); ?>
										</div>
									</div>

									<div class="col-lg-5 mx-4">
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password1" class="form-control" value="<?= set_value('password1'); ?>">
											<?= form_error('password1','<small class="text-danger">','</small>'); ?>
										</div>
									</div>

									<div class="col-lg-5 mx-4">
										<div class="form-group">
											<label>Ulangi Password</label>
											<input type="password" name="password2" class="form-control" value="<?= set_value('password2'); ?>">
											<?= form_error('password2','<small class="text-danger">','</small>'); ?>
										</div>
									</div>

									<div class="col-lg-5 mx-4">
										<div class="form-group">
											<label>No Telp</label>
											<input type="text" name="telp" class="form-control" value="<?= set_value('telp'); ?>">
											<?= form_error('telp','<small class="text-danger">','</small>'); ?>
										</div>
									</div>

									<div class="col-lg-5 mx-4">
										<div class="form-group">
											<label>Level</label>
											<select class="form-control" name="level" value="<?= set_value('level'); ?>">
												<option value=""><-- Silahkan pilih salah satu --></option>
												<option value="1">Admin</option>
												<option value="2">Petugas</option>
											</select>
											<?= form_error('level','<small class="text-danger">','</small>'); ?>
										</div>
									</div>

								</div>

								<a href="<?= base_url('master'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
