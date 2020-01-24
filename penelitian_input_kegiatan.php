<?php
require('function.php');

$hasil_peralatan = query("SELECT * FROM Peralatan");
$id_kontrak = $_GET["id"];
$jum_termin = query("SELECT * FROM kontrak WHERE id_kontrak = '$id_kontrak'")[0]["termin"];
echo $jum_termin;


// $hasil_kontrak = query("SELECT * FROM kontrak WHERE nama_kontrak = '$nama_kontrak'");




$baseurl       = base_url()."home";
if(isset($_POST["submit"])){
  // var_dump("ok");
  if (tambah_kegiatan($_POST, (int)$_GET["id"]) > 0){
    echo ("
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ");
  }else{
    echo "
        <script>
          alert('data gagal ditambahkan');
        </script>
    ";
    echo mysqli_error($conn);
  }
}

 ?>


<div class="az-content az-content-dashboard-four">
      <div class="media media-dashboard">
        <div class="media-body">
          <!-- az-content-header -->

          <!-- <div class="card card-dashboard-twelve mg-b-20">
            <div class="card-header">
              <h6 class="card-title">Monitoring Pelaksanaan Kontrak Kegiatan <span>(Rekapitulasi)</span></h6>
            </div>
            <div class="card-body">

                <div>
                  <h5>Penyediaan Jasa Konsultasi Penelitian Gasifikasi Bahan Bakar Padat</h5>
                  <div class="progress ht-5 mg-b-5">
                    <div class="progress-bar bg-warning wd-90p" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="tx-12 tx-gray-500">Quick Ratio Goal: 1.0 or higher</span>

                  <p class="mg-t-10 mg-b-0">Measures your Current Assets + Accounts Receivable / Current Liabilities <a href="">Learn more</a></p>
                </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="card-icon"><i class="typcn typcn-chart-area-outline"></i></div>
                </div>
                <div>
                  <h6 class="card-title mg-b-7">Current Ratio</h6>
                  <h5>2.8</h5>
                  <div class="progress ht-5 mg-b-5">
                    <div class="progress-bar bg-success wd-60p" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="tx-12 tx-gray-500">Quick Ratio Goal: 2.0 or higher</span>
                  <p class="mg-t-10 mg-b-0">Measures your Current Assets / Current Liabilities. <a href="">Learn more</a></p>
                </div>
              </div>
          </div> -->
            <form autocomplete="off" action="" method="post">

            <div class="col-md-12 col-lg-12 col-xl-12">
              <div class="card card-body pd-40">
                <h5 class="card-title mg-b-20">Tambah Data Kegiatan</h5>


                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" >Nama Kegiatan</label>
                  <input type="text" class="form-control" name= "nama" required>
                </div><!-- form-group -->





                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Jadwal Kegiatan</label>

                  <input type="text" name="daterange" class="form-control fc-datepicker" value="01/01/2018 - 01/15/2018" />
                  <script>
                  $(function() {
                    $('input[name="daterange"]').daterangepicker({
                      opens: 'right',
                      locale: {
                                format: 'DD/MM/YYYY'
                              }
                    }, function(start, end, label) {
                      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                    });
                  });
                  </script>


                </div><!-- form-group -->

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Peralatan</label>

                  <select class="form-control select2-no-search" name= "id_peralatan">
                    <option label="Choose one"></option>
                    <?php for ($i=0; $i < count($hasil_peralatan); $i++) : ?>
                      <option value="<?= $hasil_peralatan[$i]["id_peralatan"] ?>"><?= $hasil_peralatan[$i]["no_inventaris"] ?></option>
                    <?php endfor; ?>
                    </select>
                </div><!-- form-group -->

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Termin (Angka) <?= " *maksimal termin $jum_termin" ?></label>
                  <input type="number" class="form-control" min ="1" max = "<?= $jum_termin ?>" name = "termin" required>
                </div><!-- form-group -->




                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
