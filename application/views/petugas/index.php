<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Management Data Petugas</h4>
			<div class="row">
				<div class="col-lg-12">
					<div class="card shadow">
						<div class="card-body">
							<a href="<?= base_url('master/add_Petugas'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Petugas</a>

							<form action="<?= base_url('master'); ?>" method="get">
								<div class="input-group my-2">
									<input type="text" class="form-control" placeholder="Cari..." name="cari" autofocus autocomplete="off" value="<?= $this->input->get('cari'); ?>">
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</form>

							<table class="table table-striped border table-bordered mb-3">
								<thead class="bg-info text-light">
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									foreach ($petugas as $p) { ?>
										<tr>
											<td><?= ++$start; ?></td>
											<td><?= $p->nama; ?></td>
											<td><?= $p->username; ?></td>
											<?php if($p->aktif == 1): ?>
												<td>Aktif</td>
												<?php else: ?>
													<td>Tidak Aktif</td>
												<?php endif; ?>
												<td>
													<a href="<?= base_url('master/petugas_delete/') . $p->id_admin; ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
													<?php if($p->aktif == 1): ?>
														<a href="<?= base_url('master/petugas_nonaktif/') . $p->id_admin; ?>" class="btn btn-warning"><i class="fa fa-power-off"></i></a>
														<?php else: ?>
															<a href="<?= base_url('master/petugas_aktif/') . $p->id_admin; ?>" class="btn btn-success"><i class="fa fa-power-off"></i></a>
														<?php endif; ?>
														<button type="button" class="btn btn-success edit_level_petugas" data-id="<?= $p->id_admin; ?>" data-toggle="modal" data-target="#modal"><i class="fa fa-edit"></i></button>
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


		<div class="modal fade" id="modal" tabindex="-1" aria-labellebdy="ModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ModalLabel">Edit Level Petugas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="form-group row">
							<label class="col-sm-3">Nama :</label>
							<div class="col-sm-9">
								<p id="nama">Nama</p>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3">Username :</label>
							<div class="col-sm-9">
								<p id="username">Username</p>
							</div>
						</div>
						<form action="<?= base_url('master/edit_level_petugas'); ?>" method="post">
							<input type="hidden" name="id" id="id_petugas">
							<div class="form-group row">
								<label class="col-sm-3">Edit Level</label>
								<div class="col-sm-9">
									<select class="form-control" name="level" id="level">
										<option value=""><-- Silahkan pilih salah satu --></option>
										<option value="1">Admin</option>
										<option value="2">Petugas</option>
									</select>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>