<table id="produkTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>          
            <th>Mata Pelajaran</th>
            <th>KKM</th>
            <th>Nilai</th>
            <th>Predikat</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
      <?php foreach($penilaian as $value){ ?>
        <tr>
            <th scope="row"><center><?= $i; ?></center></th>
            <td><?php echo $value->mapel; ?></td>
            <td><?php echo $value->kkm; ?></td>
            <td><?php echo $value->nil_rata; ?></td>
            <td><?php echo $value->predikat; ?></td>
        </tr>
        <?php $i++; ?>
        <?php } ?>
    
    </tbody>
  </table>