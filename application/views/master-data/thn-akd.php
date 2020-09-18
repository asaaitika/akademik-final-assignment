    <!-- Content Wrapper -->
    
        <!-- Begin Main Content -->
        <div class="container-fluid">
            <div class="flash-datatak" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
                <?php if ($this->session->flashdata('msg')) : ?>

                <?php endif;?>
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                <div class="card shadow mb-4 justify-content-between">
                    <div class="card-header py-3 justify-content-between">
                        <div class="justify-content-between">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newAddTakadModal">
                                <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Tahun Akademik
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th>Tahun Akademik</th>
                                <th>Semester</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($takad as $r) : ?>
                                    <tr>
                                        <th scope="row"><center><?= $i; ?></center></th>
                                        <td><?= $r['tahun_akademik']; ?></td>
                                        <td><?= $r['semester']; ?></td>
                                        <td><?= $r['is_active']=="1" ? "Active": "Not Active"; ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#newEditTakadModal<?= $r['id_takad']; ?>" href="<?= base_url() ;?>Master/editTakad/<?= $r['id_takad'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('') ;?>Master/deleteTakad/<?= $r['id_takad'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" >
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
        <div class="modal fade" id="newAddTakadModal" tabindex="-1" role="dialog" aria-labelledby="newAddTakadModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddTakadModalLabel">Add Data Tahun Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Master/tahunakademik')?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="takad" name="takad" placeholder="Tahun Akademik..." required>
                        </div>
                        <div class="form-group">
                            <select name="semester" id="semester" class="form-control" required>
                                <option value="">-- Pilih Semester --</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col">
                              <input type="date" class="form-control" name="mulai_takad"required>
                            </div>
                            <p style="padding-top: 7px">s/d</p>
                            <div class="col">
                              <input type="date" class="form-control" name="akhir_takad" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                                <label class="form-check-label" for="is_active">Active?</label>
                            </div>
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
            foreach ($takad as $row) {
            $a++;
        ?>
        <div class="modal fade" id="newEditTakadModal<?= $row['id_takad']; ?>" tabindex="-1" role="dialog" aria-labelledby="newEditTakadModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddTakadModalLabel">Edit Data Tahun Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Master/editTakad/') . $row['id_takad']?>" method="POST">
                    <input type="hidden" class="form-control" name="level_id" value="<?= $row['id_takad'] ?>" readonly="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="takad" name="takad" value="<?= $row['tahun_akademik'] ?>">
                        </div>
                        <div class="form-group">
                            <select name="semester" id="semester" class="form-control" >
                                <option value="">-- Pilih Semester --</option>
                                <option value="Ganjil" <?php if($row['semester']=="Ganjil"){echo "selected";} ?>>Ganjil</option>
                                <option value="Genap" <?php if($row['semester']=="Genap"){echo "selected";} ?>>Genap</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col">
                              <input type="date" class="form-control" name="mulai_takad" value="<?= $row['mulai_takad'] ?>">
                            </div>
                            <p style="padding-top: 7px">s/d</p>
                            <div class="col">
                              <input type="date" class="form-control" name="akhir_takad"  value="<?= $row['akhir_takad'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?= $row['is_active']=="1" ? "checked": ""?>>
                                <label class="form-check-label" for="is_active">Active?</label>
                            </div>
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
  
        