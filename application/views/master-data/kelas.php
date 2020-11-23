    <!-- Content Wrapper -->
    
        <!-- Begin Main Content -->
        <div class="container-fluid">
            <div class="flash-datakel" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
                <?php if ($this->session->flashdata('msg')) : ?>

                <?php endif;?>
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                <div class="card shadow mb-4 justify-content-between">
                    <div class="card-header py-3 justify-content-between">
                        <div class="justify-content-between">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newAddKelasModal">
                                <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Kelas
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th>Kelas</th>
                                <th>Tingkat</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kelas as $r) : ?>
                                    <tr>
                                        <th scope="row"><center><?= $i; ?></center></th>
                                        <td><?= $r['kelas']; ?></td>
                                        <td><?= $r['tingkat']; ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#newEditKelasModal<?= $r['id_kelas']; ?>" href="<?= base_url() ;?>Master/editKelas/<?= $r['id_kelas'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('') ;?>Master/deleteKelas/<?= $r['id_kelas'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" >
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
        <div class="modal fade" id="newAddKelasModal" tabindex="-1" role="dialog" aria-labelledby="newAddKelasModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddKelasModalLabel">Add Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Master/kelas')?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas..." required>
                        </div>
                        <div class="form-group">
                            <select name="tingkat" id="tingkat" class="form-control" required>
                                <option value="">-- Pilih Tingkat --</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
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
            foreach ($kelas as $row) {
            $a++;
        ?>
        <div class="modal fade" id="newEditKelasModal<?= $row['id_kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="newEditKelasModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddKelasModalLabel">Edit Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Master/editKelas/') . $row['id_kelas']?>" method="POST">
                    <input type="hidden" class="form-control" name="level_id" value="<?= $row['id_kelas'] ?>" readonly="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $row['kelas'] ?>"  placeholder="Masukkan kelas..." required>
                        </div>
                        <div class="form-group">
                            <select name="tingkat" id="tingkat" class="form-control" required>
                                <option value="">-- Pilih Tingkat --</option>
                                <option value="7" <?php if($row['tingkat']=="7"){echo "selected";} ?>>7</option>
                                <option value="8" <?php if($row['tingkat']=="8"){echo "selected";} ?>>8</option>
                                <option value="9" <?php if($row['tingkat']=="9"){echo "selected";} ?>>9</option>
                            </select>
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
  
        