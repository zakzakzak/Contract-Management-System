<?php
require('function.php');


$hasil_kontrak = query("SELECT * FROM Perusahaan ORDER BY nama_perusahaan");
// var_dump($hasil_kontrak);
// $hasil_jasa    = query("SELECT * FROM jasa");
$hasil_rba     = query("SELECT * FROM rba");
$hasil_pegawai = query("SELECT * FROM pegawai2 ORDER BY nama");
$hasil_rumah_layanan = query("SELECT * FROM rumah_layanan");
$hasil_detail_layanan = query("SELECT * FROM detail_layanan");
$baseurl       = base_url()."home";
// echo "string";
// echo $baseurl;
if(isset($_POST["submit"])){
  // var_dump("ok");
  if (tambah_po($_POST, $_SESSION['id_user']) > 0){
    echo ("
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/bendahara_list_po';
        </script>
    ");
  }else{
    echo "
        <script>
          alert('data gagal ditambahkan');
        </script>
    ";
    var_dump( $_POST);
    // echo mysqli_error($conn);
  }
}

 ?>

 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>


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
                <h5 class="card-title mg-b-20">Tambah Data PO</h5>

                <div class="form-group">
                  <div class="row row-sm">
                    <div class="col-sm-12">

                      <div class="row row-sm">
                        <div class="col-sm-6">
                          <label class="az-content-label tx-11 tx-medium tx-gray-600">Nomor PO</label>
                          <input type="text" class="form-control" value="NOMOR OTOMATIS" disabled>
                        </div><!-- col -->
                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                          <label class="az-content-label tx-11 tx-medium tx-gray-600">Tanggal</label>
                            <!-- <input id="dateMask" type="text" name = "tgl_ttd" class="form-control" placeholder="MM/DD/YYYY"> -->


                            <input type="text" class ="form-control" id="datepicker1" name = "tanggal" required>

                            <script>
                            // $( function() {
                              jq_1_12_4( "#datepicker1" ).datepicker({
                                dateFormat : "dd/mm/yy"
                              });
                            // } );

                            </script>

                        </div><!-- col -->
                      </div><!-- row -->
                    </div><!-- col -->
                  </div><!-- row -->
                </div><!-- form-group -->

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Layanan</label>

                  <select class="form-control select2-no-search" name= "rumah_layanan">
                    <option label="Choose one"></option>
                    <?php for ($i=0; $i < count($hasil_rumah_layanan); $i++) : ?>

                    <option value="<?= $hasil_rumah_layanan[$i]["id_rumah_layanan"] ?>"><?= $hasil_rumah_layanan[$i]["kode"]." - ".$hasil_rumah_layanan[$i]["nama"] ?></option>
                  <?php endfor; ?>
                  </select>

                </div><!-- form-group -->

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" >Jenis Layanan</label>
                    <select class="form-control select2-no-search" name= "jasa">
                      <option label="Choose one"></option>
                      <?php for ($i=0; $i < count($hasil_detail_layanan); $i++) : ?>

                      <option value="<?= $hasil_detail_layanan[$i]["id_detail"] ?>"><?= $hasil_detail_layanan[$i]["kode_layanan"]." - ".$hasil_detail_layanan[$i]["nama_layanan"] ?></option>
                    <?php endfor; ?>
                    </select>
                </div><!-- form-group -->

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" >NAMA</label>
                  <input type="text" class="form-control" name= "nama_po" required>
                </div><!-- form-group -->
                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" >NO AGENDA</label>
                  <input type="text" class="form-control" name= "no_agenda" required>
                </div><!-- form-group -->
                <div class="form-group">
                  <div class="row row-sm">
                    <div class="col-sm-12">
                      <div class="row row-sm">
                        <div class="col-sm-4">
                            <label class="az-content-label tx-11 tx-medium tx-gray-600" >Jumlah</label>
                            <input class="money form-control" type="text" name = "nilai_po"/>
                                        <script type="text/javascript">
                                          $('.money').mask("#.##0", {reverse: true});
                                          // $('.money').mask("#.#.##0", {reverse: true});
                                        </script>
                        </div><!-- col -->
                        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                          <label class="az-content-label tx-11 tx-medium tx-gray-600" >No Lab</label>
                          <input type="text" class="form-control" name= "no_lab" required>
                        </div><!-- col -->
                        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                          <label class="az-content-label tx-11 tx-medium tx-gray-600" >Jumlah Sample</label>
                          <input type="number" class="form-control" name= "jumlah_sample" required>
                        </div><!-- col -->
                      </div><!-- row -->
                    </div><!-- col -->
                  </div><!-- row -->
                </div><!-- form-group -->


                <!-- <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" >Nomor Kontrak</label>
                  <input type="text" class="form-control" name= "no_kontrak" required>
                </div> -->
                <!-- form-group -->





                  <div class="form-group">
                    <label class="az-content-label tx-11 tx-medium tx-gray-600">KETERANGAN</label>
                    <textarea  rows="5" class="form-control" placeholder="Tuliskan KETERANGAN" name="keterangan"></textarea>

                  </div>


                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
