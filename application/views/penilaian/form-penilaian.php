 <!-- Content Wrapper -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="flash-dataw" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
                <?php if ($this->session->flashdata('msg')) : ?>
  
                <?php endif;?>
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                <div class="card shadow mb-10 justify-content-between">
                    <div class="card-body">
                      <div class="col-lg-12" style="padding-left: 32px;}">    
                        <form id="form_penilaian">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <select name="kelas_is" id="kelas_is" class="form-control" required>
                                            <option value="">-- Pilih Kelas --</option>
                                            <?php foreach($kelas as $m) :?>
                                            <option value="<?= $m['id_kelas'] ;?>"><?= $m['kelas'] ;?></option>
                                            <?php endforeach ;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" id="idMapel" name="idMapel" readonly="" class="form-control">

                                        <div class="input-group-append">
                                            <button class="btn btn-outline-warning" type="button" data-toggle="modal" data-target="#MapelModal">Browse</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Guru Pengampu</label>
                                <div class="col-sm-10">
                                    <input type="hidden"  name="guruhid" id="guruhid" readonly="" class="form-control">
                                    <input type="text"  name="guru" id="guru" readonly="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tahun Akademik</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                    <input type="hidden"  name="idTakadhid" id="idTakadhid" readonly="" class="form-control">
                                    <input type="text" id="idTakad" name="idTakad" readonly="" class="form-control">
                        
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-warning" type="button" data-toggle="modal" data-target="#TakadModal">Browse</button>
                                        </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10">
                                    <input type="text" name="semester" id="semester" readonly="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">&nbsp;</label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Generate Data</button>
                                    <button type="button" id="btnProses" class="btn btn-primary">Proccess</button>
                                    <span id="loading"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Siswa</label>
                                <div class="col-sm-10">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>Nama Lengkap</th>
                                        <th>UH 1</th>
                                        <th>UH 2</th>
                                        <th>UH 3</th>
                                        <th>UH 4</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                        <th>Jumlah</th>
                                        <th>Rata2</th>
                                      </tr>
                                    </thead>
                                    <tbody id="itemSiswa"></tbody>
                                  </table>
                          
                                </div>
                              </div>
                        </form>
                            <div class="modal fade" id="MapelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Daftar Data Mata Pelajaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="mapelTable" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ID Mata Pelajaran</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>KKM</th>
                                                    <th>Guru</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($mapel as $r) : ?>
                                                <tr>
                                                    <td>
                                                    <button type="button" 
                                                        data-id="<?= $r['id_mapel']; ?>"
                                                        data-nama="<?= $r['mata_pelajaran']; ?>"
                                                        data-g="<?= $r['guru_id']; ?>" 
                                                        data-m="<?= $r['nama_lengkap']; ?>" 
                                                        class="btnSelectMapel btn btn-primary btn-sm">Select</button>
                                                    </td>
                                                    <td><?= $r['id_mapel']; ?></td>
                                                    <td><?= $r['mata_pelajaran']; ?></td>
                                                    <td><?= $r['kkm']; ?></td>
                                                    <td><?= $r['nama_lengkap']; ?></td>
                                                </tr>
                                                <?php endforeach ; ?>    
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="TakadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Daftar Data Tahun Akademik</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table id="takadTable" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ID Tahun Akademik</th>
                                                        <th>Tahun Akademik</th>
                                                        <th>Semester</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($takad as $r) : ?>
                                                    <tr>
                                                        <td>
                                                            <button type="button" 
                                                            data-id="<?= $r['id_takad']; ?>"
                                                            data-nama="<?= $r['tahun_akademik']; ?>"
                                                            data-smt="<?= $r['semester']; ?>" 
                                                            class="btnSelectTakad btn btn-primary btn-sm">Select</button>
                                                        </td>
                                                        <td><?= $r['id_takad']; ?></td>
                                                        <td><?= $r['tahun_akademik']; ?></td>
                                                        <td><?= $r['semester']; ?></td>
                                                    </tr>
                                                    <?php endforeach ; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Daftar Siswa</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <table id="produkTable" class="display" style="width:100%">
                                      <thead>
                                          <tr>
                                              <th>#</th>          
                                              <th>NISN</th>
                                              <th>NIS</th>
                                              <th>Nama Siswa</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($siswa as $r) : ?>
                                        <tr>
                                            <td>
                                                <button type="button" 
                                                data-nisn="<?= $r['nisn']; ?>"
                                                data-nis="<?= $r['nis']; ?>"
                                                data-nama="<?= $r['nama_lengkap']; ?>" 
                                                class="btnSelectSiswa btn btn-primary btn-sm">Select</button>
                                            </td>
                                            <td><?= $r['nisn']; ?></td>
                                            <td><?= $r['nis']; ?></td>
                                            <td><?= $r['nama_lengkap']; ?></td>
                                        </tr>
                                        <?php endforeach ; ?>
                                      </tbody>
                                    </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
