    <!-- Content Wrapper -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
          
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Login</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_log; ?><small>x </small></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Selamat Datang, <?= $user['name']; ?>!</h6>
            </div>
            <div class="card-body">
              <p>Akademik Al-Aqsha adalah sistem yang dirancang untuk menjalankan segala kegiatan akademik terutama penilaian siswa di sekolah pada Yayasan Islam Al-Aqsha.</p>
              <p class="mb-0">Jadi, gunakan sistem ini sesuai prosedur dan tata cara kerja yang sudah ditentukan.</p>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      