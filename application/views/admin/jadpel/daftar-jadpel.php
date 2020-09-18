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
                        <?php echo form_open('Laporan/getList',array('id'=>'filter_penilaian')); ?>
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
                            <label class="col-sm-2 col-form-label">Hari</label>
                            <div class="col-sm-10">
                              <select name="kelas_id" class="form-control" required>
                                  <option value="">-- Pilih Hari --</option>
                                  <option value="Senin">Senin</option>
                                  <option value="Selasa">Selasa</option>
                                  <option value="Rabu">Rabu</option>
                                  <option value="Kamis">Kamis</option>
                                  <option value="Jumat">Jumat</option>
                                  <option value="Sabtu">Sabtu</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="button" id="btnGenerateData" class="btn btn-info" >Generate Data</button>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newAddJadMapelModal">
                                    <i class="fas fa-plus-circle" style="padding-right: 5px;"></i>Tambah Data Mata Pelajaran
                                </a>
                            </div>
                          </div>
                        <?php echo form_close(); ?>
                            <div class="col-sm-12">
                                <div id="rowDataJadwal"></div>
                            </div>               
                        </div>
                      </div>
                    </div>
                </div>
        </div>

        <div class="modal fade" id="newAddJadMapelModal" tabindex="-1" role="dialog" aria-labelledby="newAddJadMapelModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="newAddJadMapelModalLabel">Add Jadwal Pelajaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <form action="<?= base_url('Admin/jadwalmapel')?>" method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                        <select name="mapel_id" id="mapel_id" class="form-control" required>
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            <?php foreach($guru as $m) :?>
                            <option value="<?= $m['id_mapel'] ;?>"><?= $m['mata_pelajaran'] ;?></option>
                            <?php endforeach ;?>
                        </select>
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
                        <select name="hariri" class="form-control" required>
                          <option value="">-- Pilih Hari --</option>
                          <option value="Senin">Senin</option>
                          <option value="Selasa">Selasa</option>
                          <option value="Rabu">Rabu</option>
                          <option value="Kamis">Kamis</option>
                          <option value="Jumat">Jumat</option>
                          <option value="Sabtu">Sabtu</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <select name="jam" class="form-control" required>
                          <option value="">-- Pilih Jam --</option>
                          <option value="07:00-07:20">07:00-07:20</option>
                          <option value="07:20-08:00">07:20-08:00</option>
                          <option value="08:00-08:40">08:00-08:40</option>
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




      <div class="modal fade" id="newAddJadMapelModal" tabindex="-1" role="dialog" aria-labelledby="newAddJadMapelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="newAddJadMapelModalLabel">Add Jadwal Pelajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="<?= base_url('Admin/jadwalmapel')?>" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                      <select name="mapel_id" id="mapel_id" class="form-control" required>
                          <option value="">-- Pilih Mata Pelajaran --</option>
                          <?php foreach($guru as $m) :?>
                          <option value="<?= $m['id_mapel'] ;?>"><?= $m['mata_pelajaran'] ;?></option>
                          <?php endforeach ;?>
                      </select>
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
                      <select name="hariri" class="form-control" required>
                        <option value="">-- Pilih Hari --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select name="jam" class="form-control" required>
                        <option value="">-- Pilih Jam --</option>
                        <option value="07:00-07:20">07:00-07:20</option>
                        <option value="07:20-08:00">07:20-08:00</option>
                        <option value="08:00-08:40">08:00-08:40</option>
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
  
  
  