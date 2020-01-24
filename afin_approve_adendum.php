<?php
require('function.php');


$id_kontrak = $_GET["id"];
$kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];


$data_adendum = query("SELECT * FROM adendum WHERE id_kontrak = $id_kontrak AND status = 0")[0];
$isi_adendum = explode('///', $data_adendum["keterangan"]);



$baseurl       = base_url()."home";
if(isset($_POST["submit1"])){

  if (tambah_approve_adendum($_POST, $data_adendum["id_adendum"]) > 0){
  // if (3 > 0){

    echo ("
        <script>
          alert('Pengajuan Adendum DITERIMA');
          // document.location.href = '$baseurl/afin_adendum';
        </script>
    ");
  }else{
    echo "
        <script>
          alert('Terjadi Kesalahan, Adendum BELUM DITERIMA');
          // document.location.href = '$baseurl/afin_adendum';
        </script>
    ";
  }
}



if(isset($_POST["submit2"])){

  if (tambah_tolak_adendum($data_adendum["id_adendum"]) > 0){

    echo ("
        <script>
          alert('Pengajuan Adendum DITOLAK');
          // document.location.href = '$baseurl/tata_usaha_termin?id=$id_kontrak';
        </script>
    ");
  }else{
    echo "
        <script>
          alert('Terjadi Kesalahan, Adendum BELUM DITOLAK');
          // document.location.href = '$baseurl/tata_usaha_termin?id=$id_kontrak';
        </script>
    ";

  }
}

 ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>


<div class="az-content az-content-dashboard-four">
      <div class="media media-dashboard">
        <div class="media-body">
            <form autocomplete="off" action="" method="post">

            <div class="col-md-12 col-lg-12 col-xl-12">
              <div class="card card-body pd-40">
                <h5 class="card-title mg-b-20">PENGAJUAN ADENDUM </h5>


                <style media="screen">
                  .contdata{
                    display:grid;
                    grid-template-columns: 10% 2% 25% 63%;
                    grid-column-gap: 1em;
                  }
                </style>

                <div class="contdata">
                  <div><strong>Kontrak</strong></div>
                  <div><strong>:</strong></div>
                  <div><strong><?= $kontrak["nama_kontrak"] ?></strong></div>
                  <div ></div>
                </div>
                <div class="contdata">
                  <div><strong>No. Kontrak</strong></div>
                  <div><strong>:</strong></div>
                  <div><strong><?= $kontrak["no_kontrak"] ?></strong></div>
                  <div ></div>
                </div>


                <br><br>

                <table class="table mg-b-0">


                  <tr>
                    <th></th>
                    <th>Sebelum</th>
                    <th>Pengajuan</th>
                    <th>Realisasi</th>
                  </tr>

                  <tr>
                    <td><strong>Tanggal Mulai</strong></td>
                    <td><strong><?= $kontrak["tgl_mulai"] ?></strong></td>
                    <td><strong><?= $isi_adendum[0] ?></strong></td>
                    <td><div class="form-group">
                      <input readonly type="text" class ="form-control" id="datepicker1" name = "tgl_mulai" value="<?= $kontrak['tgl_mulai'] ?>" require>

                      <script>
                      // $( function() {
                        jq_1_12_4( "#datepicker1" ).datepicker({
                          minDate : "01/01/2019",
                          maxDate : "01/12/2019",
                          dateFormat : "dd/mm/yy"
                        });
                      // } );

                      </script>
                    </div><!-- form-group --></td>
                  </tr>



                  <tr>
                    <td><strong>Tanggal Akhir</strong></td>
                    <td><strong><?= $kontrak["tgl_akir"] ?></strong></td>
                    <td><strong><?= $isi_adendum[1] ?></strong></td>
                    <td><div class="form-group">
                      <input readonly type="text" class ="form-control" id="datepicker2" name = "tgl_akhir" value="<?= $kontrak['tgl_akir'] ?>" require>

                      <script>
                        jq_1_12_4( "#datepicker2" ).datepicker({
                          minDate : "01/01/2019",
                          maxDate : "01/12/2019",
                          dateFormat : "dd/mm/yy"
                        });

                      </script>
                    </div><!-- form-group --></td>
                  </tr>

                  <tr>
                    <td><strong>Nilai Kontrak</strong></td>
                    <td><strong><?= number_format($kontrak["nilai_kontrak"]) ?></strong></td>
                    <td><strong><?= $isi_adendum[2] ?></strong></td>
                    <td><div class="form-group">
                      <input class="money form-control" type="text" value ="<?= $kontrak['nilai_kontrak'] ?>" name = "nilai_kontrak"/>

                      <script type="text/javascript">
                        $('.money').mask("#.##0", {reverse: true});
                      </script>
                    </div><!-- form-group --></td>
                  </tr>

                  <tr>
                    <td><strong>Ruang Lingkup</strong></td>
                    <?php // SEPARATE     for ($i=0; $i < count(); $i++) : ?>
                      <?php //$exploded = multiexplode(array(",",".","|",":"),$text); ?>
                      <?php
                          //                       function multiexplode ($delimiters,$string) {
                          //
                          //     $ready = str_replace($delimiters, $delimiters[0], $string);
                          //     $launch = explode($delimiters[0], $ready);
                          //     return  $launch;
                      // }

                       ?>

                    <td><strong><?= $kontrak["keterangan"] ?></strong></td>
                    <td><strong><?= $isi_adendum[3] ?></strong></td>
                    <td><div class="form-group">
                      <textarea  rows="5" class="rl form-control" name="ruang_lingkup"><?= $kontrak['keterangan'] ?></textarea>
                    </div><!-- form-group --></td>
                  </tr>




                </table>

                <br>

                <style media="screen">
                  .cont{
                    display:grid;
                    grid-template-columns: 25% 25% 25% 25%;
                    grid-column-gap: 1em;
                  }
                </style>

                <div class="cont">
                  <div ></div>

                  <div><button class="btn btn-info btn-block" name ="submit1">Terima</button></div>

                  <div><button class="btn btn-danger btn-block" name ="submit2">Tolak</button></div>
                  <div></div>
                </div>


              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
