<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 8rem !important;">  
        <div class="card-body p-0" style="max-height: 555px !important">

          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6" style="max-height: 445px !important">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                </div>
                <form class="user validate-form" action="<?= base_url('auth/index'); ?>" method="POST">

                  
                  <!-- Begin Pesan Error -->
                  <?php
                    if(isset($msg)==TRUE)
                    {
                  ?>
                  <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                      <i class="fa fa-times-circle"></i>
                    </button>
                    <center>
                      <h5> Peringatan </h5>
                      <br>
                      <?php echo $msg; ?>
                    </center>
                  </div>
                  <?php
                    }
                  ?>
                  <!-- End Of Pesan Error -->

                  <div class="form-group wrap-input100" data-validate="Masukkan Alamat Email">
                    <input type="text" class="form-control form-control-user" id="email" placeholder="Email" name="email" autofocus value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="form-group wrap-input100" data-validate="Masukkan Password">
                    <span class="btn-show-pass">
                      <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <!-- <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Lupa Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/register'); ?>">Belum punya Akun? Register di sini!</a>
                </div>
              -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

