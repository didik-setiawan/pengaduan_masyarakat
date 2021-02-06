<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Generate Laporan</h4>
			<div class="row">
				<div class="col-lg-12">
					<div class="card shadow">
						<div class="card-body">
							<table class="table table-hover table-bordered">
								<thead class="bg-info">
									<tr>
										<th>Data Laporan</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Generate Laporan Masyarakat</td>
										<td>
											<a href="<?= base_url('master/topdf_masyarakat'); ?>" class="btn btn-danger" target="_blank"><i class="fa fa-file"></i> Export ke PDF</a>
										</td>
									</tr>
									<tr>
										<td>Generate Laporan Petugas</td>
										<td>
											<a href="<?= base_url('master/topdf_petugas'); ?>" class="btn btn-danger" target="_blank"><i class="fa fa-file"></i> Export ke PDF</a>
										</td>
									</tr>
									<tr>
										<td>Generate Laporan Pengaduan</td>
										<td>
											<a href="<?= base_url('master/topdf_pengaduan_bulan'); ?>" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i> Bulan Ini</a>
											<a href="<?= base_url('master/topdf_pengaduan_hari'); ?>" class="btn btn-info" target="_blank"><i class="fa fa-download"></i> Hari Ini</a>
										</td>
									</tr>
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