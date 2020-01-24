<?php
// require('function.php');
// $baseurl       = base_url()."home";
// $pengajuan     = $_GET["id"];
//
// update_pengajuan($pengajuan);
// echo "
//     <script>
//       alert('Pengajuan diterima');
//       document.location.href = '$baseurl/tata_usaha_keuangan_kontrak';
//     </script>
// ";
?>


<?php
require('function.php');

$hasil_akun     = query("SELECT * FROM akun");
$pengajuan     = $_GET["id"];
$hasil_pengajuan = query("SELECT * FROM pengajuan WHERE id_pengajuan = $pengajuan")[0];

// $hasil_kontrak = query("SELECT * FROM kontrak WHERE nama_kontrak = '$nama_kontrak'");




$baseurl       = base_url()."home";
if(isset($_POST["submit"])){
  // var_dump("ok");
  if (realisasi_pengajuan3($_POST) > 0){

    echo ("
        <script>
          alert('Pengajuan BERHASIL direalisasikan!');
          document.location.href = '$baseurl/bendahara_index';
        </script>
    ");
  }else{
    echo "
        <script>
          alert('Pengajuan GAGAL direalisasikan!');
          document.location.href = '$baseurl/bendahara_index';
        </script>
    ";

  }
}

 ?>




<div class="az-content az-content-dashboard-four">
      <div class="media media-dashboard">
        <div class="media-body">
            <form autocomplete="off" action="" method="post">

            <div class="col-md-12 col-lg-12 col-xl-12">
              <div class="card card-body pd-40">
                <h5 class="card-title mg-b-20">Realisasi </h5>

                <table class="table mg-b-0">
                  <tr>
                    <td><strong>Kontrak</strong></td>
                    <?php
                    $id_ro = $hasil_pengajuan["id_ro"];
                    $ro    = query("SELECT * FROM rencana_operasional WHERE id_ro = $id_ro")[0];
                    $id_kegiatan = $ro["id_kegiatan"];
                    $id_kontrak =  $ro["id_kontrak"];
                    $kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];
                    $kegiatan = query("SELECT * FROM kegiatan WHERE id_kegiatan = $id_kegiatan")[0]["nama_kegiatan"];

                     ?>
                    <td><strong>:</strong></td>
                    <td><?=$kontrak["nama_kontrak"] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Kegiatan</strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$kegiatan ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td ><strong>Jumlah Pengajuan</strong></td>
                    <td><strong>:</strong></td>
                    <td class="tx-info"><strong><?="Rp.".number_format($hasil_pengajuan["jumlah"]).",-"  ?></strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Keterangan</strong></td>
                    <td><strong>:</strong></td>
                    <td><?= $hasil_pengajuan["keterangan"] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>

                <br>
                <input type="hidden" name="id_pengajuan" value="<?=$pengajuan ?>">



                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" > Realisasi *tidak bisa melebihi pengajuan</label>
                  <input type="number" class="form-control" name= "biaya" required min="1" max="<?=$hasil_pengajuan["jumlah"] ?>">
                </div><!-- form-group -->

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Tanggal</label>
                  <input readonly required type="text" class ="form-control" id="datepicker" name = "tgl">

                  <script>
                  // $( function() {
                  jq_1_12_4( "#datepicker" ).datepicker({
                    setDate : "<?= $kontrak["tgl_mulai"] ?>",
                    minDate : "<?= $kontrak["tgl_mulai"] ?>",
                    dateFormat : "dd/mm/yy"
                  });
                  // } );
                  </script>
                </div><!-- form-group -->







                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
