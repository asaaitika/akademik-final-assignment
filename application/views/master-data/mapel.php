    <!-- Content Wrapper -->
    
        <!-- Begin Main Content -->
        <div class="container-fluid">
            <div class="flash-datamas" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
                <?php if ($this->session->flashdata('msg')) : ?>

                <?php endif;?>
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                <div class="card shadow mb-4 justify-content-between">
                    <div class="card-header py-3 justify-content-between">
                        <div class="justify-content-between">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newAddMapelModal">
                                <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Mata Pelajaran
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th>Mata Pelajaran</th>
                                <th>Pengajar</th>
                                <th>KKM</th>
                                <th>Jam Pelajaran</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($mapel as $m) : ?>
                                    <tr>
                                        <th scope="row"><center><?= $i; ?></center></th>
                                        <td><?= $m['mata_pelajaran']; ?></td>
                                        <td><?= $m['nama_lengkap']; ?></td>
                                        <td><?= $m['kkm']; ?></td>
                                        <td><?= $m['jam_pelajaran']; ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#newEditMapelModal<?=  $m['id_mapel']; ?>" href="<?= base_url() ;?>Master/editMapel/<?= $m['id_mapel'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('') ;?>Master/deleteMapel/<?= $m['id_mapel'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus">
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
        <div class="modal fade" id="newAddMapelModal" tabindex="-1" role="dialog" aria-labelledby="newAddMapelModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddMapelModalLabel">Add Data Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Master/mapel')?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Masukkan judul mata pelajaran.." required>
                        </div>
                        <div class="form-group">
                            <select name="guru_id" id="guru_id" class="form-control" required>
                                <option value="">-- Pilih Pengajar --</option>
                                <?php foreach($guru as $m) :?>
                                <option value="<?= $m['id_guru'] ;?>"><?= $m['nama_lengkap'] ;?></option>
                                <?php endforeach ;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="kkm" name="kkm" placeholder="Masukkan nilai KKM.." required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jp" name="jp" placeholder="Masukkan jam pelajaran.." required>
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
            $q = $this->db->get('guru');     
            $dist =  array();
            if($q->num_rows()>0){       
                foreach($q->result() as $row){ 
                $dist[]= $row;
                }
            } 

            $a=0;
            foreach ($mapel as $row) {
            $a++;
        ?>
        <div class="modal fade" id="newEditMapelModal<?= $row['id_mapel']; ?>" tabindex="-1" role="dialog" aria-labelledby="newEditMapelModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newAddMapelModalLabel">Edit Data Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Master/editMapel/') . $row['id_mapel']?>" method="POST">
                    <input type="hidden" class="form-control" name="level_id" value="<?= $row['id_mapel'] ?>" readonly="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="mapel" name="mapel" value="<?= $row['mata_pelajaran'] ?>" placeholder="Masukkan judul mata pelajaran.." required>
                        </div>
                        <div class="form-group">
                            <select name="guru_id" id="guru_id" class="form-control" required>
                                <option value="">-- Pilih Pengajar --</option>
                                <?php        
                                    // var_dump($row['guru_id'])  ;
                                    // die;
                                    if(count($dist)){
                                        foreach($dist as $item){
                                ?>  
                                    <option value="<?php echo $item->id_guru; ?>" <?php if($item->id_guru == $row['guru_id']) echo 'selected';?>> <?php echo $item->nama_lengkap; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="kkm" name="kkm" value="<?= $row['kkm'] ?>" placeholder="Masukkan nilai KKM.." required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jp" name="jp" value="<?= $row['jam_pelajaran'] ?>" placeholder="Masukkan jam pelajaran.." required>
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
  
        