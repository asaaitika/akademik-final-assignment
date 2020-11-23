    <!-- Content Wrapper -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
            <?php if ($this->session->flashdata('msg')) : ?>

            <?php endif;?>
            
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
            <div class="card shadow mb-4 justify-content-between">
                <div class="card-body">
                    <div class="col-lg-7" style="padding-left: 32px;">
                        <?= form_open_multipart('Admin/profile'); ?>
                        <form>
                            <!-- Begin Pesan Error -->
                            <?php
                            if(isset($psn)==TRUE)
                            {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                    <i class="fa fa-times-circle"></i>
                                    </button>
                                    <center>
                                    <h5> Peringatan </h5>
                                    <br>
                                    <?php echo $psn; ?>
                                    </center>
                                </div>
                            <?php
                                }
                            ?>
                        <!-- End Of Pesan Error -->
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nama Lengkap<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ;?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="picture" class="col-sm-3 col-form-label">Foto Profil</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/profile/') . $user['image'] ;?>"class="img-thumbnail" style="margin-left: 11px">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file" style="margin-left: 6px !important;">
                                                <input type="file" class="custom-file-input" id="image" name="image" >
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Current Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <span style="color: green"><i>Kosongkan, jika tidak perlu diubah</i></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password1" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password1" name="password1">
                                    <span style="color: green"><i>Kosongkan, jika tidak perlu diubah</i></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password2" class="col-sm-3 col-form-label">Repeat Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password2" name="password2">
                                    <span style="color: green"><i>Kosongkan, jika tidak perlu diubah</i></span>
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                      </form>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <!-- End of Page Content -->
  
        