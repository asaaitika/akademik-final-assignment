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
                        <?php
                            $q =  $this->db->get('user_level');     
                            $dist =  array();
                            if($q->num_rows()>0){       
                                foreach($q->result() as $row){ 
                                $dist[]= $row;
                                }
                            } 

                            $a=0;
                            foreach ($users as $row) {
                            $a++;
                        ?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" value="<?= $row['email'] ?>" required readonly>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url('Settings/updateUsers/') . $row['id']?>" method="POST">
                            <input type="hidden" class="form-control" name="id" value="<?= $row['id'] ?>" readonly="">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nama Lengkap<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="picture" class="col-sm-3 col-form-label">Foto Profil</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/profile/') . $row['image'] ;?>"class="img-thumbnail" style="margin-left: 11px">
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
                                <label for="level" class="col-sm-3 col-form-label">Level<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="level_id" id="level_id" class="form-control" required>
                                        <option value="">-- Pilih Level --</option>
                                        <?php        
                                        // var_dump($row['menu_id'])  ;
                                        // die;
                                            if(count($dist)){
                                                foreach($dist as $item){
                                        ?>  
                                            <option value="<?php echo $item->id_level; ?>" <?php if($item->id_level == $row['level_id']) echo 'selected';?>> <?php echo $item->level_name; ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="level" class="col-sm-3 col-form-label">Password<span style="color: red">*</span></label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control form-control-user" id="password" name="password" value="<?= $row['password'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-check-label" for="is_active">Active</label>
                                <div class="form-check col-sm-9">
                                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?= $row['is_active']=="1" ? "checked": ""?>>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                      </form>
                      <?php
                            }
                        ?>
                    </div>
                </div>
              </div>
          </div>
          <!-- /.container-fluid -->
  
        </div>
        <!-- End of Main Content -->
  
        