<?php
require('function.php');
$id_pengajuan = $_GET["id"];
$baseurl       = base_url()."home";

if(isset($_POST["submit"])){
  // var_dump("ok");
  if (tambah_pelaksana_perjalanan($_POST, $id_pengajuan) > 0){
    echo ("
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_view_form_perjalanan?id=$id_pengajuan';
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
                <h5 class="card-title mg-b-20">Tambah Data Kontrak</h5>



                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Nama</label>
                  <input type="text" class="form-control" name = "nama" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Golongan</label>
                  <select class="form-control select2-no-search" name="gol" required>
                    <option label="Pilih Kendaraan"></option>
                    <option value="3">III</option>
                    <option value="4">IV</option>
                  </select>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Jabatan</label>
                  <input type="text" class="form-control" name = "jabatan" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
                  <input type="text" class="form-control" name = "ket" required>
                </div>


                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
