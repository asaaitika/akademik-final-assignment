<table id="produkTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>          
            <th>Nama Siswa</th>
            <th>KD 1</th>
            <th>KD 2</th>
            <th>KD 3</th>
            <th>KD 4</th>
            <th>UTS</th>
            <th>UAS</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
      <?php foreach($penilaianmapel as $value){ ?>
        <tr>
            <th scope="row"><center><?= $i; ?></center></th>
            <td><?php echo $value->nama_lengkap; ?></td>
            <td><?php echo $value->kkm; ?></td>
            <td><?php echo $value->nil_rata; ?></td>
            <td><?php echo $value->predikat; ?></td>
        </tr>
        <?php $i++; ?>
        <?php } ?>
    
    </tbody>
  </table>