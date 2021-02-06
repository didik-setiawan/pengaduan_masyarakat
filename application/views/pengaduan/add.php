
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h4>Tambah Pengaduan Baru</h4>
			<div class="row">
				<div class="col-lg-12">
					<div class="card shadow">
						<div class="card-body">
							<?= form_open_multipart('pengaduan'); ?>
							<div class="row">	
								<div class="col-lg">
									<div class="form-group row">
										<label class="col-lg-2">Isi Pengaduan</label>
										<div class="col-lg-10">
											<textarea class="form-control" name="isi" rows="7"><?= set_value('isi'); ?></textarea>
											<?= form_error('isi','<small class="text-danger">','</small>'); ?>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-lg-2">Tambahkan Foto</label>
										<div class="col-lg-10">
											<input type="file" name="foto" class="form-control" required>
											<small class="text-muted">Max ukuran file foto 500 kb</small>
										</div>
									</div>

								</div>

							</div>	
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
