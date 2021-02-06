<!-- ambil flashdata -->
<div class="trueflash" data-trueflash="<?= $this->session->flashdata('true'); ?>"></div>
<div class="falseflash" data-falseflash="<?= $this->session->flashdata('false'); ?>"></div>

<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 Didik Setiawan</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      Powered by Codeigniter 3 & Bootstrap 4
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('asset/js/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="<?= base_url('asset/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('asset/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/'); ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/'); ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('asset/'); ?>dist/js/pages/dashboard.js"></script>
<script src="<?= base_url('asset/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('asset/js/myscript.js'); ?>"></script>
</body>
</html>
