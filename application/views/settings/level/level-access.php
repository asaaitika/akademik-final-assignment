
   
    <!-- Content Wrapper -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="flash-datap" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
            <?php if ($this->session->flashdata('msg')) : ?>

            <?php endif;?>

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
  
            <div class="card shadow mb-4 justify-content-between">
              <div class="card-header py-3 justify-content-between">
                <div class="justify-content-between" >
                    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-bottom: 0em !important"> 
                      <a href="<?= base_url('') ;?>Settings/level" class="btn btn-primary">
                          <i class="fas fa-arrow-circle-left" style="padding-right: 5px;"></i>Back
                      </a>
                      <h4>Level : <?= $role['level_name'] ;?></h4>
                    </div>
                </div>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><center>No</center></th>
                        <th>Menu</th>
                        <th>Access</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                              <th scope="row"><center><?= $i; ?></center></th>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" id="levelcheck" class="form-check-input"
                                          <?= check_access($role['id_level'], $m['id_menu']) ;?> data-role ="<?= $role['id_level']; ?>" data-menu ="<?= $m['id_menu']; ?>"
                                        >
                                    </div>
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