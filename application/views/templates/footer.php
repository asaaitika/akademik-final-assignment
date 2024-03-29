<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Yayasan Islam Al-Aqsha <?= date('Y');?></span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Pilih "Logout" jika sudah selesai.</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn btn-primary" href="<?= base_url('Auth/logout');?>">Logout</a>
    </div>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/dist/myscript.js"></script>

<script src="<?= base_url('assets/'); ?>login/js/toastr.min.js"></script>

<script src="<?= base_url('assets/'); ?>js/jquery.mask.min.js"></script>

</body>

</html>

<script>  
  $(document).ready(function(){
      $( '#nisn' ).mask('000000000000');
      $( '#nis' ).mask('000000');
      $( '#nohp' ).mask('0000-0000-0000');
  });
</script>

<script>
  $('.custom-file-input').on('change', function(){
    let fileName = $(this).val().split('\\').pop();
    // alert(fileName);
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

  <?php if ($this->session->flashdata('psn')) { ?>
      toastr.error("<?php echo $this->session->flashdata('psn');?>");
  <?php } ?>
</script>

