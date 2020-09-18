<table id="produkTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>          
            <th>Mata Pelajaran</th>
            <th>Guru Pengampu</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($jadpel as $u) : ?>
            <tr>
                <th scope="row"><center><?= $i; ?></center></th>
                <td><?= $u['mata_pelajaran']; ?></td>
                <td><?= $u['guru']; ?></td>
                <td><?= $u['hari']; ?></td>
                <td><?= $u['jam']; ?></td>
                <td>
                    <a data-toggle="modal" data-target="#newEditKelasModal<?= $r['id_jadmapel']; ?>" href="<?= base_url() ;?>Master/editKelas/<?= $r['id_jadmapel'] ;?>" class="btn btn-warning btn-circle btn-sm">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="<?= base_url('') ;?>Master/deleteKelas/<?= $r['id_jadmapel'] ;?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" >
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach ; ?>    
    
    </tbody>
  </table>