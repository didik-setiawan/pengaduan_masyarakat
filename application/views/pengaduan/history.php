
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<?php date_default_timezone_set('Asia/Jakarta'); ?>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Histori Pengaduan</h4>
			<div class="row">	
				<?php if(empty($pengaduan)): ?>
					<div class="alert alert-info">Tidak ada histori pengaduan</div>
					<?php else: ?>
				<?php foreach ($pengaduan as $p) { ?>
					<div class="col-lg-3">
						<div class="card shadow">
							<img src="<?= base_url('asset/img/pengaduan/') . $p->foto; ?>">
							<div class="card-body">
								<p><?= $p->isi_pengaduan; ?></p>
								<small class="text-muted"><?= date('d M Y H:i:s', $p->id_pengaduan); ?></small>
								<div class="row justify-content-end mt-2">
									<a href="<?= base_url('pengaduan/pengaduan_delete/') . $p->id_pengaduan; ?>" class="btn btn-danger btn-sm mx-1 tombol-hapus"><i class="fa fa-trash"></i></a>
									<a href="<?= base_url('pengaduan/pengaduan_edit/') . $p->id_pengaduan; ?>" class="btn btn-success btn-sm mx-1"><i class="fa fa-edit"></i></a>
									<a href="<?= base_url('pengaduan/detail/') . $p->id_pengaduan; ?>" class="btn btn-info btn-sm mx-1"><i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
