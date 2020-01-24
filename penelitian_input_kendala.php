<?php
require('function.php');

$id_kontrak  = $_GET["id_k"];
$id_kegiatan = $_GET["id"];
$baseurl     = base_url()."home";


if(isset($_POST["submit"])){
  if (tambah_progress($_POST, $id_kegiatan, $id_kontrak) > 0){
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
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
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
                <h5 class="card-title mg-b-20">Tambah Progress</h5>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Kegiatan</label>
                  <?php
                  $nama_kegiatan = query("SELECT * FROM Kegiatan WHERE id_kegiatan = $id_kegiatan")[0]["nama_kegiatan"];
                   ?>
                  <input type="text" class="form-control" name="kegiatan_prog" value="" placeholder="<?= $nama_kegiatan ?>" readonly>
                </div>


                <div class="form-group">
                    <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
                    <textarea rows="5" class="form-control" placeholder="Masukan Progress" name="keterangan_prog"></textarea>
                </div><!-- col -->


                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600" >Tanggal</label>
                  <input type="text" class="form-control fc-datepicker" name = "tanggal" placeholder="01/01/2019">

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
