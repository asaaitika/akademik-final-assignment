
   
    <!-- Content Wrapper -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

            
  
            <div class="card shadow mb-4 justify-content-between">
              <div class="card-header py-3 justify-content-between">
                <div class="justify-content-between" >
                    <div class="col-lg-6">
                        <?= form_error('levelname', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>', '</div>'); ?>

                        <?= $this->session->flashdata('message') ;?>
                    </div>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newAddRoleModal">
                        <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Add New Level
                    </a>
                </div>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($role as $r) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $r['level_name']; ?></td>
                                <td>
                                    <a href="<?= base_url() ;?>admin/accessLevel/<?= $r['id_level'] ;?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-lock-open"></i>
                                    </a>
                                    <a href="<?= base_url() ;?>admin/editLevel/<?= $r['id_level'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('') ;?>admin/deleteLevel/<?= $r['id_level'] ;?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('yakin?');">
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
          <!-- /.container-fluid -->
  
        </div>
        <!-- End of Main Content -->
        
        <!-- Modal -->
        <div class="modal fade" id="newAddRoleModal" tabindex="-1" role="dialog" aria-labelledby="newAddRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddRoleModalLabel">Add New Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('admin/level')?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="levelname" name="levelname" placeholder="Masukkan nama level..">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
  
        