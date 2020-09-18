    <!-- Content Wrapper -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="flash-datam" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
            <?php if ($this->session->flashdata('msg')) : ?>

            <?php endif;?>
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
            <div class="card shadow mb-4 justify-content-between">
               <div class="card-header py-3 justify-content-between">
                   <div class="justify-content-between" >
                        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-bottom: 0em !important"> 
                            <a href="<?= base_url('') ;?>Admin/guru" class="btn btn-primary">
                                <i class="fas fa-arrow-circle-left" style="padding-right: 5px;"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="col-lg-6" style="padding-left: 32px;}">
                            <?= form_open_multipart('Admin/addGuru'); ?>
                            <form>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Nama Lengkap<span style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">NISN<span style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nisn" name="nisn" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">NIS<span style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nis" name="nis" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="email" class="col-form-label">Tempat, Tanggal Lahir<span style="color: red">*</span></label>
                                    <div class="col">
                                      <input type="text" class="form-control" name="tempatlahir" required>
                                    </div>
                                    <p style="padding-top: 7px">,</p>
                                    <div class="col">
                                      <input type="date" class="form-control" name="tanggallahir" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="level" class="col-sm-3 col-form-label">Jenis Kelamin<span style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="jeniskelamin" id="jeniskelamin" class="form-control" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="level" class="col-sm-3 col-form-label">Agama<span style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="agama" id="agama" class="form-control" required>
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Hindu">Hindu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat<span style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="textarea" class="form-control" id="alamat" name="alamat" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nohp" class="col-sm-3 col-form-label">No Hp<span style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nohp" name="nohp" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelas" class="col-sm-3 col-form-label">Kelas<span style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="kelas" id="kelas" class="form-control" required>
                                            <option value="">-- Pilih Kelas --</option>
                                            <?php foreach($kelas as $m) :?>
                                            <option value="<?= $m['id_kelas'] ;?>"><?= $m['kelas'] ;?></option>
                                            <?php endforeach ;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                        
                            </form>
                            </div>   
                </div>
              </div>
          </div>
          <!-- /.container-fluid -->
  
        </div>
        <!-- End of Main Content -->
  
        