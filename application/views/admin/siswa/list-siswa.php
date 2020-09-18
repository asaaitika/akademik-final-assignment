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
                            <a href="<?= base_url('Admin/addSiswa'); ?>" class="btn btn-primary">
                                <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Siswa
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th>NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Kelas</th>
                                <th>Asal Sekolah</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $r) : ?>
                                    <tr>
                                        <th scope="row"><center><?= $i; ?></center></th>
                                        <td><?= $r['nisn']; ?></td>
                                        <td><?= $r['nama_lengkap']; ?></td>
                                        <td><?= $r['kelas']; ?></td>
                                        <td><?= $r['asal_sekolah']; ?></td>
                                        <td>
                                            <a href="<?= base_url() ;?>Admin/editSiswa/<?= $r['nisn'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('') ;?>Admin/deleteSiswa/<?= $r['nisn'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" >
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
  
        