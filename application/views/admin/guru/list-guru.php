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
                            <a href="<?= base_url('Admin/addGuru'); ?>" class="btn btn-primary">
                                <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Guru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th>NIP</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($guru as $r) : ?>
                                    <tr>
                                        <th scope="row"><center><?= $i; ?></center></th>
                                        <td><?= $r['nip']; ?></td>
                                        <td><?= $r['nama_lengkap']; ?></td>
                                        <td><?= $r['alamat']; ?></td>
                                        <td>
                                            <a href="<?= base_url() ;?>Admin/editGuru/<?= $r['id_guru'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('') ;?>Admin/deleteGuru/<?= $r['id_guru'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" >
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
  
        