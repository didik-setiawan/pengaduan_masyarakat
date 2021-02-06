
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url('asset/img/admin/icon.png'); ?>" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
    <span class="brand-text font-light">Sistem Pengaduan</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('asset/img/admin/user.png'); ?>" class="img-circle elevation-2" alt="User Image">
        <!-- <i class="fa fa-user"></i> -->
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $pengguna['nama']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-header">DASHBOARD</li>
           <li class="nav-item">
            <?php if($this->session->userdata('nik')): ?>
              <?php if($title == 'Sistem Pengaduan Masyarakat | Home User'): ?>
                <a href="<?= base_url('user'); ?>" class="nav-link active">
                  <?php else: ?>
                    <a href="<?= base_url('user'); ?>" class="nav-link">
                    <?php endif; ?>
                    <?php else: ?>
                      <?php if($title == 'Sistem Pengaduan Masyarakat | Home'): ?>
                        <a href="<?= base_url('admin'); ?>" class="nav-link active">
                          <?php else: ?>
                            <a href="<?= base_url('admin'); ?>" class="nav-link">
                            <?php endif; ?>
                          <?php endif; ?>
                          <i class="nav-icon fa fa-home"></i>
                          <p>
                            Home
                          </p>
                        </a>
                      </li>

                      <li class="nav-header">

                        <?php if($this->session->userdata('level_admin') == 1): ?>
                          ADMIN
                          <?php elseif ($this->session->userdata('level_admin') == 2): ?>
                            PETUGAS
                            <?php else: ?>
                              MASYARAKAT
                            <?php endif; ?>
                          </li>

                          <?php if($this->session->userdata('level_admin')) : ?>

                            <?php if($this->session->userdata('level_admin') == 1): ?>
                              <?php if($title == 'Management Data Petugas' || $title == 'Tambah Data Petugas' || $title == 'Management Data Masyarakat'): ?>
                              <li class="nav-item has-treeview menu-open">
                                <?php else: ?>
                              <li class="nav-item">
                                <?php endif; ?>
                                <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-chart-pie"></i>
                                  <p>
                                    Management
                                    <i class="right fas fa-angle-left"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <?php if($title == 'Management Data Petugas'): ?>
                                    <a href="<?= base_url('master'); ?>" class="nav-link active">
                                      <?php else: ?>
                                    <a href="<?= base_url('master'); ?>" class="nav-link">
                                      <?php endif; ?>
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Petugas</p>
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <?php if($title == 'Management Data Masyarakat'): ?>
                                    <a href="<?= base_url('master/masyarakat'); ?>" class="nav-link active">
                                      <?php else: ?>
                                    <a href="<?= base_url('master/masyarakat'); ?>" class="nav-link">
                                      <?php endif; ?>
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Masyarakat</p>
                                    </a>
                                  </li>
                                </ul>
                              </li>

                              <li class="nav-item">
                                <?php if($title == 'Generate Laporan'): ?>
                                <a href="<?= base_url('master/generate_laporan'); ?>" class="nav-link active">
                                  <?php else: ?>
                                <a href="<?= base_url('master/generate_laporan'); ?>" class="nav-link">
                                  <?php endif; ?>
                                  <i class="nav-icon fa fa-file"></i>
                                  <p>
                                    Generate Laporan
                                  </p>
                                </a>
                              </li>
                            <?php endif; ?>
                            <?php if($title == 'Laporan Pengaduan Semua' || $title == 'Detail Laporan Pengaduan' || $title == 'Laporan Pengaduan Selesai' || $title == 'Laporan Pengaduan Dalam Proses'): ?>
                            <li class="nav-item has-treeview menu-open">
                              <?php else: ?>
                            <li class="nav-item">
                              <?php endif; ?>
                              <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  Laporan Pengaduan
                                  <i class="right fas fa-angle-left"></i>
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <?php if($title == 'Laporan Pengaduan Semua'): ?>
                                  <a href="<?= base_url('laporan'); ?>" class="nav-link active">
                                    <?php else: ?>
                                  <a href="<?= base_url('laporan'); ?>" class="nav-link">
                                    <?php endif; ?>
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Semua Laporan</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <?php if($title == 'Laporan Pengaduan Selesai'): ?>
                                  <a href="<?= base_url('laporan/status_selesai'); ?>" class="nav-link active">
                                    <?php else: ?>
                                  <a href="<?= base_url('laporan/status_selesai'); ?>" class="nav-link">
                                    <?php endif; ?>
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sudah Selesai</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <?php if( $title == 'Laporan Pengaduan Dalam Proses'): ?>
                                  <a href="<?= base_url('laporan/dalam_proses'); ?>" class="nav-link active">
                                  <?php else: ?>
                                  <a href="<?= base_url('laporan/dalam_proses'); ?>" class="nav-link">
                                  <?php endif; ?>
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dalam Proses</p>
                                  </a>
                                </li>
                              </ul>
                            </li>


                            <?php elseif ($this->session->userdata('nik')) :?>

                              <?php if($title == 'Tambah Pengaduan' || $title == 'Histori Pengaduan' || $title == 'Edit Pengaduan' || $title == 'Detail Pengaduan'): ?>
                                <li class="nav-item has-treeview menu-open">
                                  <?php else: ?>
                                <li class="nav-item has-treeview">
                                  <?php endif; ?>
                                  <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-file"></i>
                                    <p>
                                      Pengaduan
                                      <i class="right fa fa-angle-left"></i>
                                    </p>
                                  </a>
                                  <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                      <?php if($title == 'Tambah Pengaduan'): ?>
                                        <a href="<?= base_url('pengaduan'); ?>" class="nav-link active">
                                          <?php else: ?>
                                            <a href="<?= base_url('pengaduan'); ?>" class="nav-link">
                                            <?php endif; ?>
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Pengaduan Baru</p>
                                          </a>
                                        </li>
                                        <li class="nav-item">
                                          <?php if($title == 'Histori Pengaduan'): ?>
                                          <a href="<?= base_url('pengaduan/history'); ?>" class="nav-link active">
                                            <?php else: ?>
                                          <a href="<?= base_url('pengaduan/history'); ?>" class="nav-link">
                                            <?php endif; ?>
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lihat Histori Pengaduan</p>
                                          </a>
                                        </li>
                                      </ul>
                                    </li>
                                  <?php endif; ?>

                                  <li class="nav-item">
                                    <?php if($this->session->userdata('nik')): ?>
                                      <?php if($title == 'Edit Profile Masyarakat'): ?>
                                        <a href="<?= base_url('user/edit_profile'); ?>" class="nav-link active">
                                          <?php else: ?>
                                            <a href="<?= base_url('user/edit_profile'); ?>" class="nav-link">
                                            <?php endif; ?>
                                            <?php else: ?>
                                              <?php if($title == 'Edit Profile'): ?>
                                              <a href="<?= base_url('admin/edit_profile'); ?>" class="nav-link active">
                                                <?php else: ?>
                                              <a href="<?= base_url('admin/edit_profile'); ?>" class="nav-link">
                                                <?php endif; ?>
                                              <?php endif; ?>
                                              <i class="nav-icon fa fa-user-cog"></i>
                                              <p>
                                                Edit Profile
                                              </p>
                                            </a>
                                          </li>

                                          <li class="nav-item">
                                            <a href="<?= base_url('auth/logout'); ?>" class="nav-link logout">
                                              <i class="nav-icon fas fa-sign-out-alt"></i>
                                              <p>
                                                Logout
                                              </p>
                                            </a>
                                          </li>

                                        </ul>
                                      </nav>
                                      <!-- /.sidebar-menu -->
                                    </div>
                                    <!-- /.sidebar -->
                                  </aside>
