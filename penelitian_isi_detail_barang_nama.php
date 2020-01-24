<?php
require('function.php');
$id_peristiwa = $_GET["id"];
$id_pengajuan = $_GET["id_p"];
$id_kontrak = $_GET["id_k"];
$baseurl       = base_url()."home";

if(isset($_POST["submit"])){
  // var_dump("ok");
  if (tambah_barang($_POST, $id_peristiwa) > 0){
    echo ("
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_view_form_barang?id_p=$id_pengajuan&id_k=$id_kontrak';
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
                <h5 class="card-title mg-b-20">Tambah Data Lengkap Barang</h5>



                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Nama Barang</label>
                  <input type="text" class="form-control" name = "nama" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Volume</label>
                  <input type="number" class="form-control" name = "vol" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Satuan</label>
                  <select class="form-control select2-no-search" name="satuan" required>
                    <option label="Pilih Satuan"></option>
                    <option value="Pcs">Pcs</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Harga Satuan</label>
                  <input type="number" class="form-control" name = "harga_satuan" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Jumlah</label>
                  <input type="number" class="form-control" name = "jum" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Pajak (%)</label>
                  <input type="number" class="form-control" name = "ppn" value = "10" required>
                </div>


                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
