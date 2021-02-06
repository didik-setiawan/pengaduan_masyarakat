<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Laporan Pengaduan Dalam Proses</h4>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card shadow">
							<div class="card-body">
								<form action="<?= base_url('laporan/dalam_proses'); ?>" method="get">
									<div class="input-group my-2">
										<input type="text" class="form-control" placeholder="Cari berdasarkan isi laporan" name="cari" autofocus autocomplete="off" value="<?= $this->input->get('cari'); ?>">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
								<small>Jumlah semua data : <?= $this->db->get_where('tb_pengaduan',['status' => 0])->num_rows(); ?></small>
								<table class="table table-striped table-bordered mb-2">
									<thead class="bg-secondary">
										<tr>
											<th>Waktu</th>
											<th>Isi</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($pengaduan as $p) { ?>

											<tr>
												<td>
													<?php if($p->status == 0): ?>
														<strong><?= date('d M Y H:i:s', $p->id_pengaduan); ?></strong>
														<?php else: ?>
															<?= date('d M Y H:i:s', $p->id_pengaduan); ?>
														<?php endif; ?>
													</td>
													<td>
														<?php if($p->status == 0): ?>
															<strong><?= $p->isi_pengaduan; ?></strong>
															<?php else: ?>
																<?= $p->isi_pengaduan; ?>
															<?php endif; ?>
														</td>
														<td>
															<?php if($p->status == 0): ?>
																<strong>Proses</strong>
																<?php else: ?>
																	Sudah
																<?php endif; ?>
															</td>
															<td>
																<a href="<?= base_url('laporan/hapus/') . $p->id_pengaduan; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a>
																<a href="<?= base_url('laporan/detail/') . $p->id_pengaduan; ?>" class="btn btn-info btn-sm"><i class="fa fa-arrow-right"></i></a>
															</td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
											<?= $this->pagination->create_links(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</section>
				<!-- /.content -->
			</div>
