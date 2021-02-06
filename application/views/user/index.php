
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	
<?php date_default_timezone_set('Asia/Jakarta'); ?>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Dashboard User</h4>
			<div class="row">
				<div class="col-lg-12">
					<div class="card shadow">
						<div class="row">
							<div class="col-lg-4">
								<div class="card-body bg-dark">
									<center>
										<img src="<?= base_url('asset/img/admin/user.png'); ?>">
									</center>
								</div>
							</div>

							<div class="col-lg-8">
								<div class="card-body">
									<h4 class="text-center">Profile User</h4>

									<div class="row">
										<label class="col-sm-2">NIK</label>
										<div class="col-sm-6">
											: <?= $pengguna['nik']; ?>
										</div>
									</div>

									<div class="row">
										<label class="col-sm-2">Nama</label>
										<div class="col-sm-7">
											: <?= $pengguna['nama']; ?>
										</div>
									</div>

									<div class="row">
										<label class="col-sm-2">Username</label>
										<div class="col-sm-7">
											: <?= $pengguna['username']; ?>
										</div>
									</div>

									<div class="row">
										<label class="col-sm-2">No Telp</label>
										<div class="col-sm-7">
											: <?= $pengguna['telp']; ?>
										</div>
									</div>

									<small class="text-muted">Bergabung pada <?= date('d M Y H:i:s', $pengguna['tgl_bergabung']); ?></small>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>
	<!-- /.content -->
</div>
