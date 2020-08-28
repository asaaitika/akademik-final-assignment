<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Js Login --->
<script src="<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/login/vendor/animsition/js/animsition.min.js')?>"></script>
<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js')?>"></script>
<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/login/vendor/select2/select2.min.js')?>"></script>
<script src="<?php echo base_url('assets/login/vendor/daterangepicker/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.js')?>"></script>
<script src="<?php echo base_url('assets/login/vendor/countdowntime/countdowntime.js')?>"></script>
<script src="<?php echo base_url('assets/login/js/main.js')?>"></script>
<script src="<?php echo base_url('assets/login/js/toastr.min.js')?>"></script>

</body>

</html>

<script type="text/javascript">
    //popup
      // const flashData = $('.flash-datau').data('flashdata');
      // if (flashData)
      // {
      //     Swal.fire({
      //         title : 'Terima Kasih',
      //         text : 'Register ' + flashData,
      //         icon : 'success'
      //     });
      // }

      <?php if ($this->session->flashdata('msg')) { ?>
        toastr.error("<?php echo $this->session->flashdata('msg');?>");
    <?php } ?>
  </script>