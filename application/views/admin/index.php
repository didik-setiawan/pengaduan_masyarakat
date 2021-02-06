
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?php date_default_timezone_set('Asia/Jakarta'); ?>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Dashboard Admin</h4>
			<div class="row my-4">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total Pengaduan</span>
							<span class="info-box-number"><?= $this->db->get('tb_pengaduan')->num_rows(); ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Jumlah Masyarakat</span>
							<span class="info-box-number"><?= $this->db->get('tb_masyarakat')->num_rows(); ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>


				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Jumlah Petugas</span>
							<span class="info-box-number"><?= $this->db->get_where('tb_admin',['level' => 2])->num_rows(); ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<?php if($this->session->userdata('level_admin') == 1): ?>
					<div class="col-12 col-sm-6 col-md-3">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Jumlah Admin</span>
								<span class="info-box-number"><?= $this->db->get_where('tb_admin',['level' => 1])->num_rows(); ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<?php elseif($this->session->userdata('level_admin') == 2): ?>
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-calendar"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Hari Ini</span>
									<span class="info-box-number"><?php
									echo date('d M Y');
									?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
					<?php endif; ?>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="card shadow">
							<div class="card-body">
								<h5><strong>Pengaduan Terakhir</strong></h5>
								<table class="table table-striped table-bordered">
									<thead class="thead-dark">
										<tr>
											<th>Waktu</th>
											<th>Isi Pengaduan</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$this->db->limit(6);
										$this->db->order_by('id_pengaduan','DESC');
										$pengaduan = $this->db->get('tb_pengaduan')->result();
										foreach ($pengaduan as $p) { ?>
										<tr>
											<td><?= date('d M Y H:i:s', $p->id_pengaduan); ?></td>
											<td><?= $p->isi_pengaduan; ?></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- /.content -->
	</div>
