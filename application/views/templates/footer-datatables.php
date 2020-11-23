<footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Yayasan Islam Al-Aqsha <?= date('Y');?></span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" jika sudah selesai.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/dist/sweetalert2.all.min.js"></script>

<script src="<?= base_url('assets/'); ?>js/dist/myscript.js"></script>

<script src="<?= base_url('assets/'); ?>js/jquery.mask.min.js"></script>

<script>
  $('.form-check-input-lvl').on('click', function(){
    
    // var a = $('#levelcheck').data('menu');
    // console.log($('#levelcheck').attr('data-menu'))

    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
        url: "<?= base_url('Settings/changeAccess'); ?>",
        type: 'post',
        data: {
          menuId: menuId,
          roleId: roleId
        },
        success: function() {
          document.location.href = "<?= base_url('Settings/accessLevel/'); ?>" + roleId
        }
    });
  });
</script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();

    //1
    // $( '#kelas' ).mask('AAA-A');

    //2
    $( '#takad' ).mask('0000/0000');

    //3
    $( '#predikat' ).mask('A');
    $( '#nil_awal' ).mask('00');
    $( '#nil_akhir' ).mask('00');

    //4
    $( '#kkm' ).mask('00');
    $( '#jp' ).mask('00');
});
</script>

<script type="text/javascript">
  listItem = [];

  $(document).ready(function() {
      $('#mapelTable').DataTable();
      $('#takadTable').DataTable();

      $('.btnSelectMapel').click(function(){
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var idguru = $(this).data('g');
        var namaguru = $(this).data('m');

        $('#guruhid').val(idguru);
        $('#guru').val(namaguru);
        $('#idMapelhid').val(id);
        $('#idMapel').val(nama);
        
        $('#MapelModal').modal('toggle');
      });

      $('.btnSelectTakad').click(function(){
        var id = $(this).data('id');
        var takad = $(this).data('nama');
        var smt = $(this).data('smt');

        $('#semester').val(smt);
        $('#idTakadhid').val(id);
        $('#idTakad').val(takad);
        
        $('#TakadModal').modal('toggle');
      });

      $('#mapelLMTable').DataTable();
      $('#takadLMTable').DataTable();

      $('.btnSelectMapelLM').click(function(){
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var idguru = $(this).data('g');
        var namaguru = $(this).data('m');

        $('#guruhid').val(idguru);
        $('#guru').val(namaguru);
        $('#mapelhid').val(id);
        $('#mapel').val(nama);
        
        $('#MapelLMModal').modal('toggle');
      });

      $('.btnSelectTakadLM').click(function(){
        var id = $(this).data('id');
        var takad = $(this).data('nama');
        var smt = $(this).data('smt');

        $('#semester').val(smt);
        $('#idTakadhid').val(id);
        $('#idTakad').val(takad);
        
        $('#TakadLMModal').modal('toggle');
      });

      $('.btnSelectSiswaLS').click(function(){
        var nisn = $(this).data('nisn');
        var nis = $(this).data('nis');
        var nama_lengkap = $(this).data('nama_lengkap');
        var kelas = $(this).data('kelas');

        $('#siswa').val(nama_lengkap);
        $('#siswaid').val(nisn);
        
        $('#SiswaLSModal').modal('toggle');
      });

      $('.btnSelectTakadLS').click(function(){
        var id = $(this).data('id');
        var takad = $(this).data('nama');
        var smt = $(this).data('smt');

        $('#semester').val(smt);
        $('#idTakadhid').val(id);
        $('#idTakad').val(takad);
        
        $('#TakadLSModal').modal('toggle');
      });

      $('.btnSelectSiswa').click(function(){
        var nisn = $(this).data('nisn');
        var nis = $(this).data('nis');
        var nama = $(this).data('nama');

        var item = [nisn,nis,nama];
        listItem.push(item);
        // console.log(listItem);
        $(this).showItem();
        $('#exampleModal').modal('toggle');
      });

      $.fn.showItem = function(){
        var row  ='';
        var no =1;
          for(i=0; i<listItem.length; i++){

            row +='<tr>';
            row +='<td>'+listItem[i][2]+'</td>';
            
            row +='<td style="max-width: 15px;"><input type="number" class="uh-'+i+'" name="uh[]" value="1" onKeyup="$(this).hitung();"></td>';
            row +='<td style="max-width: 15px;"><input type="number" class="uh-'+i+'" name="uh[]" value="1" onKeyup="$(this).hitung();"></td>';
            row +='<td style="max-width: 15px;"><input type="number" class="uh-'+i+'" name="uh[]" value="1" onKeyup="$(this).hitung();"></td>';
            row +='<td style="max-width: 15px;"><input type="number" class="uh-'+i+'" name="uh[]" value="1" onKeyup="$(this).hitung();"></td>';
            row +='<td style="max-width: 15px;"><input type="number" class="uts-'+i+'" name="uts[]" value="1" onKeyup="$(this).hitung();"></td>';
            row +='<td style="max-width: 15px;"><input type="number" class="uas-'+i+'" name="uas[]" value="1" onKeyup="$(this).hitung();"></td>';
            
            row +='<td><span class="total-'+i+'"> </span></td>';
            row +='<td><span class="rata-'+i+'"> </span></td>';
            row +='</tr>';
            no++;
          }
        $('#itemSiswa').html(row);
      }

      $.fn.hitung=function(){
        var curClass = $(this).attr('class'); 
        var arItem =  curClass.split('-');
        var uh1 = $('.uh1-'+arItem[1]).val();
        var uh2 = $('.uh2-'+arItem[1]).val();
        var uh3 = $('.uh3-'+arItem[1]).val();
        var uh4 = $('.uh4-'+arItem[1]).val();
        var uts = $('.uts-'+arItem[1]).val();
        var uas = $('.uas-'+arItem[1]).val();
        var total = parseInt(qty)*parseInt(satuan);
        $('.total-'+arItem[1]).html(total);
      }

      $('#btnProsesS').click(function(){
        $.ajax({
            url: "<?= base_url('Laporan/getList'); ?>",
            type: 'post',
            data: $('#filter_penilaian').serialize(),
            success: function(res) {
              $('#rowDataSiswa').html(res);
            }
        });
      });
  });
</script>

</body>

</html>
