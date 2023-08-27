<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">elmer</a>.</strong>todos los derechos.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/adminlti/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/adminlti/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- <script src="<?php echo base_url();?>/miestilos/md/js/mdb.min.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>/adminlti/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/adminlti/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/adminlti/dist/js/demo.js"></script>


<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>/adminlti/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>/adminlti/plugins/toastr/toastr.min.js"></script>




<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



</body>
</html>
