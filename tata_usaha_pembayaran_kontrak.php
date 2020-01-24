

<?php
require('function.php');


$id_kontrak = $_GET["id_k"];
$termin     = $_GET["trm"];
$kontrak    = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];



$baseurl       = base_url()."home";
if(isset($_POST["submit"])){

  if (input_pembayaran($id_kontrak, $termin, $_POST) > 0){

    echo ("
        <script>
          alert('Termin Sudah Dibayar');
          document.location.href = '$baseurl/tata_usaha_termin?id=$id_kontrak';
        </script>
    ");
  }else{
    echo "
        <script>
          // alert('Pembayaran BATAL');
          // document.location.href = '$baseurl/tata_usaha_termin?id=$id_kontrak';
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
                <h5 class="card-title mg-b-20">PEMBAYARAN KONTRAK </h5>

                <table class="table mg-b-0">
                  <tr>
                    <td><strong>Kontrak</strong></td>
                    <?php

                    // $id_kegiatan = $ro["id_kegiatan"];
                    $kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];
                    // $kegiatan = query("SELECT * FROM kegiatan WHERE id_kegiatan = $id_kegiatan")[0]["nama_kegiatan"];

                     ?>
                    <td><strong>:</strong></td>
                    <td><?=$kontrak["nama_kontrak"] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td><strong>Tremin</strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$termin ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>

                  <?php
                  $kegiatan = query("SELECT * FROM kegiatan WHERE id_kontrak = $id_kontrak AND termin = $termin");
                  $hist_pembayaran = query("SELECT * FROM hist_pembayaran WHERE id_kontrak = $id_kontrak AND termin = $termin");

                  if (count($hist_pembayaran) == 0) {
                    $jum = 0;
                  }else{
                    $jum = 0;
                    for ($i=0; $i < count($hist_pembayaran); $i++) {
                      $jum += $hist_pembayaran[$i]["jumlah"];
                    }

                  }

                  $nilai_termin = query("SELECT * FROM rencana_termin WHERE id_kontrak = $id_kontrak AND termin = $termin")[0]["jumlah"];

                  // nilai termin - jum akan menjadi max inputan
                  $sisa = $nilai_termin - $jum;

                  echo ($sisa);
                   ?>

                  <tr>
                    <td><strong>Kegiatan</strong></td>
                    <td><strong>:</strong></td>
                    <td><?= "1. ".$kegiatan[0]["nama_kegiatan"] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>

                  <?php for ($i=1; $i < count($kegiatan); $i++): ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <?php $ii = $i +1; ?>
                      <td><?="$ii. ".$kegiatan[$i]["nama_kegiatan"] ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  <?php endfor; ?>

                  <tr>
                    <td><strong>Nilai Termin</strong></td>
                    <td><strong>:</strong></td>
                    <td class="tx-info"><strong><?= "Rp.".number_format($nilai_termin).",-" ?></strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td><strong>Sisa</strong></td>
                    <td><strong>:</strong></td>
                    <td class="tx-danger"><strong><?= "Rp.".number_format($sisa).",-" ?></strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>



                </table>

                <br>
                <!-- <input type="hidden" name="id_pengajuan" value=""> -->



                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" > Jumlah yang dibayarkan</label>
                  <input type="number" class="form-control" name= "biaya" required min="1" max="<?= $sisa ?>">
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
