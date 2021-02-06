<!DOCTYPE html>
<html><head>
	<title>
		<?php if($type == 'bulan'): ?>
		Laporan Pengaduan Bulan Ini
		<?php elseif($type == 'hari'): ?>
		Laporan Pengaduan Hari Ini
		<?php endif; ?>
	</title>
	<link rel="stylesheet" type="text/css" href="<?= $_SERVER['DOCUMENT_ROOT']; ?>/pengaduan/asset/bootstrap/css/bootstrap.min.css">
</head><body>
	<h3 style="text-align: center;">Sistem Pengaduan Masyarakat</h3>
	<hr>

	<h5 style="text-align: center;">	
		<?php if($type == 'bulan'): ?>
		Laporan Pengaduan Bulan Ini
		<?php elseif($type == 'hari'): ?>
		Laporan Pengaduan Hari Ini
		<?php endif; ?>
	</h5>

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
				<th>#</th>
				<th>Tanggal</th>
				<th>Isi Pengaduan</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($pengaduan as $m) { ?>
			<tr>
				<td><?= $i++; ?></td>
				<?php if($type == 'bulan'): ?>
				<td><?= date('d M Y', $m->id_pengaduan); ?></td>
				<?php elseif($type == 'hari'): ?>
				<td><?= date('d M Y H:i:s', $m->id_pengaduan); ?></td>
				<?php endif; ?>
				<td><?= $m->isi_pengaduan; ?></td>
				<td>
					<?php if($m->status == 1): ?>
					Selesai
					<?php else: ?>
					Proses
					<?php endif; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body></html>