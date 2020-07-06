
   
    <!-- Content Wrapper -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

            
  
            <div class="card shadow mb-4 justify-content-between">
              <div class="card-header py-3 justify-content-between">
                <div class="justify-content-between" >
                    <div class="col-lg-6">
                        <?php if(validation_errors()) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                                <?=  validation_errors() ;?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <?= $this->session->flashdata('message') ;?>
                    </div>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newSubAddModal">
                        <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Add New Submenu
                    </a>
                </div>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Menu</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($submenu as $s) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $s['title']; ?></td>
                                <td><?= $s['menu']; ?></td>
                                <td><?= $s['url']; ?></td>
                                <td><?= $s['icon']; ?></td>
                                <td><?= $s['is_active']; ?></td>
                                <td>
                                    <a href="<?= base_url() ;?>menu/editSubMenu/<?= $s['id_sub_menu'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('') ;?>menu/deleteSubMenu/<?= $s['id_sub_menu'] ;?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('yakin?');">
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
        <div class="modal fade" id="newSubAddModal" tabindex="-1" role="dialog" aria-labelledby="newSubAddModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newSubAddModalLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('menu/submenu')?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">-- Select Menu --</option>
                                <?php foreach($menu as $m) :?>
                                <option value="<?= $m['id_menu'] ;?>"><?= $m['menu'] ;?></option>
                                <?php endforeach ;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="URL">
                        </div>
                        <div class="form-group">
                            <select name="icon" id="icon" class="form-control">
                                <option value="">-- Select Icon --</option>
                                <option value="fas fa-fw fa-tachometer-alt">far fa-trash-alt</option>
                                <option value="fas fa-fw fa-user">fas fa-fw fa-user</option>
                                <option value="fas fa-fw fa-user-edit">fas fa-fw fa-user-edit</option>
                                <option value="fas fa-fw fa-folder">fas fa-fw fa-folder</option>
                                <option value="fas fa-fw fa-folder-open">fas fa-fw fa-folder-open</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                                <label class="form-check-label" for="is_active">Active?</label>
                            </div>
                            
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
  
        