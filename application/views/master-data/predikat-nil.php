    <!-- Content Wrapper -->
    
        <!-- Begin Main Content -->
        <div class="container-fluid">
            <div class="flash-datapre" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
                <?php if ($this->session->flashdata('msg')) : ?>

                <?php endif;?>
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                <div class="card shadow mb-4 justify-content-between">
                    <div class="card-header py-3 justify-content-between">
                        <div class="justify-content-between">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newAddPreNilModal">
                                <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Predikat Nilai
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th>Predikat </th>
                                <th>Interva Nilai</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($prenil as $r) : ?>
                                    <tr>
                                        <th scope="row"><center><?= $i; ?></center></th>
                                        <td><?= $r['predikat']; ?></td>
                                        <td><?= $r['keterangan']; ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#newEditPreNilModal<?= $r['id_predikat']; ?>" href="<?= base_url() ;?>Master/editPreNil/<?= $r['id_predikat'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('') ;?>Master/deletePreNil/<?= $r['id_predikat'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" >
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
        <div class="modal fade" id="newAddPreNilModal" tabindex="-1" role="dialog" aria-labelledby="newAddPreNilModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddPreNilModalLabel">Add Data Predikat Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Master/predikatnilai')?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="predikat" name="predikat" placeholder="Masukkan inisial predikat.." required>
                        </div>
                        <div class="form-row">
                            <div class="col">
                              <input type="text" class="form-control" name="nil_awal" placeholder="Masukkan awal nilai interva..." required>
                            </div>
                            <p style="padding-top: 7px">≤ X ≤</p>
                            <div class="col">
                              <input type="text" class="form-control" name="nil_akhir" placeholder="Masukkan akhir nilai interva..." required>
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
            foreach ($prenil as $row) {
            $a++;
        ?>
        <div class="modal fade" id="newEditPreNilModal<?= $row['id_predikat']; ?>" tabindex="-1" role="dialog" aria-labelledby="newEditPreNilModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddPreNilModalLabel">Edit Data Predikat Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Master/editPreNil/') . $row['id_predikat']?>" method="POST">
                    <input type="hidden" class="form-control" name="level_id" value="<?= $row['id_predikat'] ?>" readonly="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="predikat" name="predikat" value="<?= $row['predikat'] ?>">
                        </div>
                        <div class="form-row">
                            <div class="col">
                              <input type="text" class="form-control" name="nil_awal" value="<?= $row['nil_awal'] ?>">
                            </div>
                            <p style="padding-top: 7px">≤ X ≤</p>
                            <div class="col">
                              <input type="text" class="form-control" name="nil_akhir" value="<?= $row['nil_akhir'] ?>">
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
  
        