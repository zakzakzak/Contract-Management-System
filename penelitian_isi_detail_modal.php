<?php
require('function.php');
$id_pengajuan = $_GET["id"];
$baseurl       = base_url()."home";

if(isset($_POST["submit"])){
  // var_dump("ok");
  if (tambah_modal($_POST, $id_pengajuan) > 0){
    echo ("
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_view_form_modal?id=$id_pengajuan';
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



<div class="az-content az-content-dashboard-four">
      <div class="media media-dashboard">
        <div class="media-body">
            <form autocomplete="off" action="" method="post">

            <div class="col-md-12 col-lg-12 col-xl-12">
              <div class="card card-body pd-40">
                <h5 class="card-title mg-b-20">Tambah Barang</h5>



                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Jenis</label>
                  <input type="text" class="form-control" name = "jenis" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Spesifikasi Barang</label>
                  <!-- <input type="text" class="form-control" name = "spes" required> -->
                  <textarea name="spes" rows="8" cols="80"></textarea>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Volume</label>
                  <input type="number" class="form-control" name = "vol" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Satuan</label>
                  <select class="form-control select2-no-search" name="satuan" required>
                    <option label="Pilih Kendaraan"></option>
                    <option value="Kendaraan Umum">Unit</option>
                  </select>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Harga Satuan (RP.)</label>
                  <input type="number" class="form-control" name = "harga_satuan" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Pajak (%) *jika tidak ada, isi 0</label>
                  <input type="number" class="form-control" name = "ppn" required>
                </div>



                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
