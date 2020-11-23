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
                            <a href="<?= base_url('') ;?>Settings/users" class="btn btn-primary">
                                <i class="fas fa-arrow-circle-left" style="padding-right: 5px;"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-7" style="padding-left: 32px;}">
                        <?= form_open_multipart('Settings/addUsers'); ?>
                        <form>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nama Lengkap<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="picture" class="col-sm-3 col-form-label">Foto Profil</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" >
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="level" class="col-sm-3 col-form-label">Level<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="level_id" id="level_id" class="form-control" required>
                                        <option value="">-- Pilih Level --</option>
                                        <?php foreach($level as $l) :?>
                                        <option value="<?= $l['id_level'] ;?>"><?= $l['level_name'] ;?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="level" class="col-sm-3 col-form-label">Password<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                  <input type="password" class="form-control form-control-user" id="password" name="password" pwstrength='' data-indicator="pwindicator" name="password" required>
                                  <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                  <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="level" class="col-sm-3 col-form-label">Confirm Password<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-check-label" for="is_active">Active</label>
                                <div class="form-check col-sm-9">
                                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-2.6">
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
  
        