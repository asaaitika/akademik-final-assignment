

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
              </div>
              <form class="user" action="<?= base_url('auth/register'); ?>" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="fullname" placeholder="Masukkan Nama Lengkap" name="fullname" autofocus value="<?= set_value('fullname'); ?>">
                  <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Masukkan Alamat Email" name="email"value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                  <div class="invalid-feedback">

                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6" style="padding-left: 15px;">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" pwstrength" data-indicator="pwindicator" name="password">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>

                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/'); ?>">Punya Akun? Login di sini!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>