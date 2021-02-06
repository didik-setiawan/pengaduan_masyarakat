
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Edit Pengaduan</h4>

			<div class="row">
				<div class="col-lg-12">
					<div class="card shadow">
						<div class="card-body">
							<?= form_open_multipart('pengaduan/pengaduan_edit/' . $pengaduan->id_pengaduan); ?>
							<div class="form-group row">
								<label class="col-lg-2">Isi Pengaduan</label>
								<div class="col-lg-10">
									<textarea class="form-control" name="isi" rows="7"><?= $pengaduan->isi_pengaduan; ?></textarea>
									<?= form_error('isi','<small class="text-danger">','</small>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-2">Tambahkan Foto</label>
								<div class="col-lg-2">
									<img src="<?= base_url('asset/img/pengaduan/') . $pengaduan->foto; ?>" class="img-thumbnail">
								</div>
								<div class="col-lg-8">
									<input type="file" name="foto" class="form-control">
									<small class="text-muted">Max ukuran file foto 500 kb</small>
								</div>
							</div>
							<a href="<?= base_url('pengaduan/history'); ?>" class="btn btn-dark">Kembali</a>
							<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
