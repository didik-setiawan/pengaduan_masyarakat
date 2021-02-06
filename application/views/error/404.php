<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Error 404 | Page not Found</title>
	<link rel="icon" type="icon" href="<?= base_url('asset/img/admin/icon.png'); ?>">
	<link rel="stylesheet" href="<?= base_url('asset/bootstrap/css/bootstrap.min.css'); ?>">
	<body style="background : #000000">

		<div class="container mt-5">
			<div class="row">
				<div class="col-lg-12 text-center text-white mt-5">
					<img src="<?= base_url('asset/img/admin/404.jpg'); ?>">
					<h2><strong>Page Not Found</strong></h2>
					<p>Halaman yang anda cari mungkin sudah di hapus / di ubah</p>
					<?php if($this->uri->segment(1) == 'laporan'): ?>
						<a href="<?= base_url('admin'); ?>">Kembali ke dashboard</a>
						<?php else: ?>
							<a href="<?= base_url('user'); ?>">Kembali ke dashboard</a>
						<?php endif; ?>
					</div>
				</div>
			</div>


			<script src="<?= base_url('asset/bootstrap/js/jquery-3.4.1.slim.min.js'); ?>"></script>
			<script src="<?= base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>
			<script src="<?= base_url('asset/bootstrap/js/popper.min.js'); ?>"></script>
		</body>
		</html>