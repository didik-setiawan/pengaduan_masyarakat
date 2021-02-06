<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Management Data Masyarakat</h4>
			<div class="row">
				<div class="col-lg-12">
					<div class="card shadow">
						<div class="card-body">
							<form action="<?= base_url('master/masyarakat'); ?>" method="get">
								<div class="input-group my-2">
									<input type="text" class="form-control" placeholder="Cari berdasarkan nama atau username" name="cari" autofocus autocomplete="off" value="<?= $this->input->get('cari'); ?>">
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</form>
							<table class="table table-striped table-bordered mb-3">
								<thead class="thead-dark">
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Tgl Bergabung</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($masyarakat as $m) {?>
										<tr>
											<td><?= ++$start; ?></td>
											<td><?= $m->nama; ?></td>
											<td><?= date('d M Y H:i:s', $m->tgl_bergabung); ?></td>
											<?php if($m->aktif == 1): ?>
												<td>Aktif</td>
												<?php else: ?>
													<td>Nonaktif</td>
												<?php endif; ?>
												
												<td>
													<a href="<?= base_url('master/masyarakat_delete/') . $m->id_masyarakat; ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
													<?php if($m->aktif == 1): ?>
														<a href="<?= base_url('master/masyarakat_nonaktif/') . $m->id_masyarakat; ?>" class="btn btn-warning"><i class="fa fa-power-off"></i></a>
														<?php else: ?>
															<a href="<?= base_url('master/masyarakat_aktif/') . $m->id_masyarakat; ?>" class="btn btn-success"><i class="fa fa-power-off"></i></a>
														<?php endif; ?>
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
			</section>
			<!-- /.content -->
		</div>
