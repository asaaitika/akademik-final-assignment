    <!-- Content Wrapper -->
    
        <!-- Begin Main Content -->
        <div class="container-fluid">
            <div class="flash-datae" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
                <?php if ($this->session->flashdata('msg')) : ?>

                <?php endif;?>
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                <div class="card shadow mb-4 justify-content-between">
                    <div class="card-header py-3 justify-content-between">
                        <div class="justify-content-between">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newAddRoleModal">
                                <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Level
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><center><?= $i; ?></center></th>
                                        <td><?= $r['level_name']; ?></td>
                                        <td>
                                            <a href="<?= base_url() ;?>Settings/accessLevel/<?= $r['id_level'] ;?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-lock-open"></i>
                                            </a>
                                            <a data-toggle="modal" data-target="#newEditRoleModal<?= $r['id_level']; ?>" href="<?= base_url() ;?>Settings/editLevel/<?= $r['id_level'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('') ;?>Settings/deleteLevel/<?= $r['id_level'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" >
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ; ?>    
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->
        
        <!-- Begin Modal Add-->
        <div class="modal fade" id="newAddRoleModal" tabindex="-1" role="dialog" aria-labelledby="newAddRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddRoleModalLabel">Add Data Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Settings/level')?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="levelname" name="levelname" placeholder="Masukkan nama level.." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <!-- End of Modal Add-->

        <!-- Begin Modal Edit-->
        <?php
            $a=0;
            foreach ($role as $row) {
            $a++;
        ?>
        <div class="modal fade" id="newEditRoleModal<?= $row['id_level']; ?>" tabindex="-1" role="dialog" aria-labelledby="newEditRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddRoleModalLabel">Edit Data Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Settings/editLevel/') . $row['id_level']?>" method="POST">
                    <input type="hidden" class="form-control" name="level_id" value="<?= $row['id_level'] ?>" readonly="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="levelname" name="levelname" value="<?= $row['level_name'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary tbl-ubah">Update</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <?php
          }
        ?>
        <!-- End of Modal Edit-->
  
        