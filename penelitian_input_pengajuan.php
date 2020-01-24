<?php
require('function.php');

$id_kontrak = $_GET["id"];
$hasil_akun = query("SELECT * FROM rencana_operasional WHERE id_kontrak = $id_kontrak");

// $hasil_kontrak = query("SELECT * FROM kontrak WHERE nama_kontrak = '$nama_kontrak'");




$baseurl       = base_url()."home";
if(isset($_POST["submit"])){
  // var_dump("ok");
  if (tambah_pengajuan($_POST) > 0){
    echo ("
        <script>
          alert('Pengajuan berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ");
  }else{
    echo "
        <script>
          alert('Pengajuan melebihi pagu');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
    // echo mysqli_error($conn);
  }
}

 ?>




<div class="az-content az-content-dashboard-four">
      <div class="media media-dashboard">
        <div class="media-body">
            <form autocomplete="off" action="" method="post">

            <div class="col-md-12 col-lg-12 col-xl-12">
              <div class="card card-body pd-40">
                <h5 class="card-title mg-b-20">Tambah Pengajuan</h5>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Akun</label>

                  <select class="form-control select2-no-search" name= "id_ro" required>
                    <option label="Choose one"></option>

                    <?php for ($i=0; $i < count($hasil_akun); $i++) : ?>
                      <?php
                      $id_keg    = $hasil_akun[$i]["id_kegiatan"];
                      $nama_keg_ = query("SELECT * FROM kegiatan WHERE id_kegiatan = $id_keg")[0]["nama_kegiatan"];


                      ?>

                      <option value="<?php $akun = $hasil_akun[$i]["akun"];echo $hasil_akun[$i]["id_ro"]; $akun = query("SELECT * FROM akun  WHERE id_akun = $akun")[0]["nama_akun"] ?>"><?= $nama_keg_." - ".$akun ?></option>
                    <?php endfor; ?>

                  </select>
                </div><!-- form-group -->

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" >Biaya</label>
                  <input type="number" class="form-control" name= "biaya" required>
                </div><!-- form-group -->

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" >Keterangan</label>
                  <textarea rows="5" class="form-control" placeholder="Keterangan" name="keterangan"></textarea>
                </div>








                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->


  </body>
</html>
