<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan Masyarakat | Sign In</title>
    <link rel="icon" type="icon" href="<?= base_url('asset/img/admin/icon.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/bootstrap/css/bootstrap.min.css'); ?>">
    <body style="background: linear-gradient(to left, #3931af, #00c6ff);">

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3 mt-5"><center>
                    <img src="<?= base_url('asset/img/admin/icon.png'); ?>" height="120px" width="100px">
                    <h3 class="text-light"><b>Sistem Pengaduan Masyarakat</b></h3>
                </center>
                <p class="text-light mt-5">Aplikasi ini diciptakan dalam rangka persiapan menyambut UKK tahun 2021. Jika ada kritik dan saran bisa hubungi email berikut <span class="text-danger">Didiksetyaone0@gmail.com</span></p>
            </div>

            <div class="col-lg-9 my-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h3><b>Register</b></h3>
                        <hr>
                        <form action="<?= base_url('auth/register'); ?>" method="post">
                            <?php if($this->session->flashdata('false')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?= $this->session->flashdata('false'); ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="row my-4">
                                <div class="col-lg-6 my-2">
                                    <?= form_error('nik','<small class="text-danger">','</small>'); ?>
                                    <input type="text" name="nik" class="form-control" placeholder="NIK" autocomplete="off" autofocus value="<?= set_value('nik'); ?>">
                                </div>

                                <div class="col-lg-6 my-2">
                                    <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" autocomplete="off" value="<?= set_value('nama'); ?>">
                                </div>

                                <div class="col-lg-6 my-2">
                                    <?= form_error('username','<small class="text-danger">','</small>'); ?>
                                    <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" value="<?= set_value('username'); ?>">
                                </div>

                                <div class="col-lg-6 my-2">
                                    <?= form_error('telp','<small class="text-danger">','</small>'); ?>
                                    <input type="text" name="telp" class="form-control" placeholder="No Telp" autocomplete="off" value="<?= set_value('telp'); ?>">
                                </div>

                                <div class="col-lg-6 my-2">
                                    <?= form_error('password1','<small class="text-danger">','</small>'); ?>
                                    <input type="password" name="password1" class="form-control" placeholder="Password" value="<?= set_value('password1'); ?>">
                                </div>

                                <div class="col-lg-6 my-2">
                                    <?= form_error('password2','<small class="text-danger">','</small>'); ?>
                                    <input type="password" name="password2" class="form-control" placeholder="Ulangi Password" value="<?= set_value('password2'); ?>">
                                </div>

                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success mb-2">Register</button>
                        </form>
                        <p>Sudah punya akun, log in di <a href="<?= base_url('auth'); ?>">sini</a></p>
                    </div>
                </div>
            </div>

        </div>

        

    </div>
    <script src="<?= base_url('asset/bootstrap/js/jquery-3.4.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('asset/bootstrap/js/popper.min.js'); ?>"></script>
</body>
</html>