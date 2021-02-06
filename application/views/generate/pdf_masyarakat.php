<!DOCTYPE html>
<html><head>
	<title>Laporan Masyarakat</title>
	<link rel="stylesheet" type="text/css" href="<?= $_SERVER['DOCUMENT_ROOT']; ?>/pengaduan/asset/bootstrap/css/bootstrap.min.css">
</head><body>
	<h3 style="text-align: center;">Sistem Pengaduan Masyarakat</h3>
	<hr>
	<h5 style="text-align: center;">Laporan Masyarakat</h5>
	<?php date_default_timezone_set('Asia/Jakarta'); ?>

	<style type="text/css">
		table {
			justify-content: center;
		}
	</style>
	<small>Tanggal cetak : <?= date('d M Y H:i:s'); ?></small>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>No Telp</th>
				<th>Status</th>
				<th>Tgl Daftar</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($masyarakat as $m) { ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $m->nama; ?></td>
					<td><?= $m->telp; ?></td>
					<td>
						<?php if($m->aktif == 0): ?>
							Nonaktif
							<?php else: ?>
								Aktif
							<?php endif; ?>
						</td>
						<td><?= date('d M Y', $m->tgl_bergabung); ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</body></html>