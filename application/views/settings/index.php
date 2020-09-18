    <!-- Content Wrapper -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="flash-dataq" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
            <?php if ($this->session->flashdata('msg')) : ?>

            <?php endif;?>
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
            <div class="card shadow mb-4 justify-content-between">
              <div class="card-header py-3 justify-content-between">
                <div class="justify-content-between">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newAddModal">
                        <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Menu
                    </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><center>No</center></th>
                        <th>Menu</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><center><?= $i; ?></center></th>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#newEditModal<?= $m['id_menu']; ?>" href="<?= base_url('') ;?>Settings/editMenu/<?= $m['id_menu'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('') ;?>Settings/deleteMenu/<?= $m['id_menu'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus">
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
        <!-- End of Page Content -->
        
        <!-- Begin Modal Add-->
        <div class="modal fade" id="newAddModal" tabindex="-1" role="dialog" aria-labelledby="newAddModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Settings')?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="namemenu" name="namemenu" placeholder="Masukkan nama menu.." required="">
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
            foreach ($menu as $row) {
            $a++;
        ?>
        <div class="modal fade" id="newEditModal<?= $row['id_menu'] ;?>" tabindex="-1" role="dialog" aria-labelledby="newEditModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="newAddModalLabel">Edit Data Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <form action="<?= base_url('Settings/editMenu/') . $row['id_menu']?>" method="POST">
                  <input type="hidden" class="form-control" name="menu_id" value="<?= $row['id_menu'] ?>" readonly="">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="namemenu" name="namemenu" value="<?= $row['menu'] ?>">
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
  
        