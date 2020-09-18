    <!-- Content Wrapper -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="flash-dataw" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
                <?php if ($this->session->flashdata('msg')) : ?>

                <?php endif;?>
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                <div class="card shadow mb-4 justify-content-between">
                    <div class="card-header py-3 justify-content-between">
                        <div class="justify-content-between">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newSubAddModal">
                                <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Sub Menu
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
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
                                        <th scope="row"><center><?= $i; ?></center></th>
                                        <td><?= $s['title']; ?></td>
                                        <td><?= $s['menu']; ?></td>
                                        <td><?= $s['url']; ?></td>
                                        <td><?= $s['icon']; ?></td>
                                        <td><?= $s['is_active']=="1" ? "Active": "Not Active"; ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#newSubEditModal<?=  $s['id_sub_menu']; ?>" href="<?= base_url() ;?>Settings/editSubMenu/<?= $s['id_sub_menu'] ;?>" class="btn btn-warning btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('') ;?>Settings/deleteSubMenu/<?= $s['id_sub_menu'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus">
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
        <div class="modal fade" id="newSubAddModal" tabindex="-1" role="dialog" aria-labelledby="newSubAddModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newSubAddModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Settings/submenu')?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul sub menu...">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">-- Pilih Menu --</option>
                                <?php foreach($menu as $m) :?>
                                <option value="<?= $m['id_menu'] ;?>"><?= $m['menu'] ;?></option>
                                <?php endforeach ;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Masukkan URL...">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon1" value="fas fa-fw fa-tachometer-alt">
                                <label class="form-check-label" for="icon1"><i class="fas fa-fw fa-tachometer-alt"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon_" value="fas fa-chalkboard-teacher">
                                <label class="form-check-label" for="icon_"><i class="fas fa-chalkboard-teacher"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon0" value="fas fa-fw fa-id-card">
                                <label class="form-check-label" for="icon0"><i class="fas fa-fw fa-id-card"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon2" value="fas fa-fw fa-user">
                                <label class="form-check-label" for="icon2"><i class="fas fa-fw fa-user"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon3" value="fas fa-fw fa-clipboard-list">
                                <label class="form-check-label" for="icon3"><i class="fas fa-fw fa-clipboard-list"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon4" value="fas fa-fw fa-folder">
                                <label class="form-check-label" for="icon4"><i class="fas fa-fw fa-folder"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon5" value="fas fa-fw fa-folder-open">
                                <label class="form-check-label" for="icon5"><i class="fas fa-fw fa-folder-open"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon6" value="fas fa-fw fa-list">
                                <label class="form-check-label" for="icon6"><i class="fas fa-fw fa-list"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon7" value="fas fa-fw fa-list-alt">
                                <label class="form-check-label" for="icon7"><i class="fas fa-fw fa-list-alt"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon8" value="fas fa-fw fa-calendar">
                                <label class="form-check-label" for="icon8"><i class="fas fa-fw fa-calendar"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon9" value="fas fa-fw fa-level-up-alt">
                                <label class="form-check-label" for="icon9"><i class="fas fa-fw fa-level-up-alt"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon10" value="fas fa-fw fa-users">
                                <label class="form-check-label" for="icon10"><i class="fas fa-fw fa-users"></i></label>
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
        <!-- End of Modal Add -->

        <!-- Begin Modal Edit -->
        <?php 
            $q = $this->db->get('user_menu');     
            $dist =  array();
            if($q->num_rows()>0){       
                foreach($q->result() as $row){ 
                $dist[]= $row;
                }
            } 
            
            $a=0;
            foreach ($submenu as $row) {
            $a++;
        ?>
        <div class="modal fade" id="newSubEditModal<?=  $row['id_sub_menu']; ?>" tabindex="-1" role="dialog" aria-labelledby="newSubEditModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newSubAddModalLabel">Edit Data Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('Settings/editSubMenu/') . $row['id_sub_menu']?>" method="POST">
                    <input type="hidden" class="form-control" name="submenu_id" value="<?= $row['id_sub_menu'] ?>" readonly="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" value="<?= $row['title'] ?>">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <?php        
                                    // var_dump($row['menu_id'])  ;
                                    // die;
                                    if(count($dist)){
                                        foreach($dist as $item){
                                ?>  
                                    <option value="<?php echo $item->id_menu; ?>" <?php if($item->id_menu == $row['menu_id']) echo 'selected';?>> <?php echo $item->menu; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" value="<?= $row['url'] ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon1" value="fas fa-fw fa-tachometer-alt" <?= $row['icon']=="fas fa-fw fa-tachometer-alt" ? "checked": ""?>>
                                <label class="form-check-label" for="icon1"><i class="fas fa-fw fa-tachometer-alt"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon_" value="fas fa-chalkboard-teacher" <?= $row['icon']=="fas fa-chalkboard-teacher" ? "checked": ""?>>
                                <label class="form-check-label" for="icon_"><i class="fas fa-chalkboard-teacher"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon0" value="fas fa-fw fa-id-card" <?= $row['icon']=="fas fa-fw fa-id-card" ? "checked": ""?>>
                                <label class="form-check-label" for="icon0"><i class="fas fa-fw fa-id-card"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon2" value="fas fa-fw fa-user" <?= $row['icon']=="fas fa-fw fa-user" ? "checked": ""?>>
                                <label class="form-check-label" for="icon2"><i class="fas fa-fw fa-user"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon3" value="fas fa-fw fa-clipboard-list" <?= $row['icon']=="fas fa-fw fa-clipboard-list" ? "checked": ""?>>
                                <label class="form-check-label" for="icon3"><i class="fas fa-fw fa-clipboard-list"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon4" value="fas fa-fw fa-folder" <?= $row['icon']=="fas fa-fw fa-folder" ? "checked": ""?>>
                                <label class="form-check-label" for="icon4"><i class="fas fa-fw fa-folder"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon5" value="fas fa-fw fa-folder-open" <?= $row['icon']=="fas fa-fw fa-folder-open" ? "checked": ""?>>
                                <label class="form-check-label" for="icon5"><i class="fas fa-fw fa-folder-open"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon6" value="fas fa-fw fa-list" <?= $row['icon']=="fas fa-fw fa-list" ? "checked": ""?>>
                                <label class="form-check-label" for="icon6"><i class="fas fa-fw fa-list"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon7" value="fas fa-fw fa-list-alt" <?= $row['icon']=="fas fa-fw fa-list-alt" ? "checked": ""?>>
                                <label class="form-check-label" for="icon7"><i class="fas fa-fw fa-list-alt"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon8" value="fas fa-fw fa-calendar" <?= $row['icon']=="fas fa-fw fa-calendar" ? "checked": ""?>>
                                <label class="form-check-label" for="icon8"><i class="fas fa-fw fa-calendar"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon9" value="fas fa-fw fa-level-up-alt" <?= $row['icon']=="fas fa-fw fa-level-up-alt" ? "checked": ""?>>
                                <label class="form-check-label" for="icon9"><i class="fas fa-fw fa-level-up-alt"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="simbol[]" id="icon10" value="fas fa-fw fa-users" <?= $row['icon']=="fas fa-fw fa-users" ? "checked": ""?>>
                                <label class="form-check-label" for="icon10"><i class="fas fa-fw fa-users"></i></label>
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
        <!-- End of Modal Edit -->
  
        