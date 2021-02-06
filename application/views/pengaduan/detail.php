<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Detail Laporan Pengaduan</h4>
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="card shadow">
							<img src="<?= base_url('asset/img/pengaduan/') . $pengaduan->foto; ?>">
							<div class="card-body">
								<p><?= $pengaduan->isi_pengaduan; ?></p>

								<i class="fa fa-user"> <?= $pengaduan->nama; ?></i>
								<p>NIK : <?= $pengaduan->nik; ?></p>
								<hr>
								<div class="row">
									<small class="text-muted"><?= date('d M Y H:i:s', $pengaduan->id_pengaduan); ?></small>
									<small class="text-muted mx-2">
										<?php if($pengaduan->status == 0): ?>
											Status : Proses
											<?php else: ?>
												Status : Selesai
											<?php endif; ?>
										</small>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card shadow">
								<div class="card-body">
									<h5 class="text-center">Tanggapan</h5>
									<hr>
									<?php if(empty($tanggapan)): ?>
										<div class="alert alert-info">Belum ada tanggapan</div>
										<?php else: ?>
											<?php foreach ($tanggapan as $t) { ?>
												<div class="row">
													<div class="col-lg-12">
														<div class="card">
															<div class="card-body bg-light">
																<i class="fa fa-user"> <?= $t->nama; ?></i>
																<p>
																	<?= $t->isi_tanggapan; ?>
																</p>
																<small class="text-muted"><?= date('d M Y H:i:s', $t->id_tanggapan); ?></small>
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
										<?php endif; ?>
										<hr>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
