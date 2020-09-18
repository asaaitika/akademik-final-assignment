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
                  <?php echo form_open('Laporan/getListMapel',array('id'=>'filter_penilaianmapel')); ?>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-10">
                        <select name="kelas_id" class="form-control" required>
                            <option value="0">-- Pilih Kelas --</option>
                            <?php foreach($kelas as $m) :?>
                              <option value="<?= $m['id_kelas'] ;?>"><?= $m['kelas'] ;?></option>
                            <?php endforeach ;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <input type="hidden" id="mapelhid" name="mapelhid" readonly="" class="form-control">
                          <input type="text" id="mapel" name="mapel" readonly="" class="form-control">
                          <div class="input-group-append">
                            <button class="btn btn-outline-warning" type="button" data-toggle="modal" data-target="#MapelLMModal">Browse</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tahun Akademik</label>
                      <div class="col-sm-10">
                          <div class="input-group">
                            <input type="hidden" id="idTakadhid" name="idTakadhid" readonly="" class="form-control">
                            <input type="text" id="idTakad" name="idTakad" readonly="" class="form-control">
                            <div class="input-group-append">
                              <button class="btn btn-outline-warning" type="button" data-toggle="modal" data-target="#TakadLMModal">Browse</button>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Semester</label>
                      <div class="col-sm-10">
                        <input type="text"  id="semester" name="semester" readonly="" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <button type="button" id="btnProsesM" class="btn btn-info" >Generate Data</button>
                        <button type="submit" class="btn btn-primary" >Print</button>
                      </div>
                    </div>
                    <div class="modal fade" id="MapelLMModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Daftar Data Mata Pelajaran</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <table id="mapelLMTable" class="display" style="width:100%">
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
                                              class="btnSelectMapelLM btn btn-primary btn-sm">Select</button>
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
                    <div class="modal fade" id="TakadLMModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Data Tahun Akademik</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="takadLMTable" class="display" style="width:100%">
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
                                                    class="btnSelectTakadLM btn btn-primary btn-sm">Select</button>
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
                  <?php echo form_close(); ?>
                      <div class="col-sm-12">
                          <div id="rowDataMapel"></div>
                      </div>
                </div>
              </div>  
          </div>
        </div>
      </div>
  
  
  