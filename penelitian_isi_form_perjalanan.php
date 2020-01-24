<?php
require('function.php');
$id_pengajuan = $_GET["id"];
$baseurl       = base_url()."home";

if(isset($_POST["submit"])){
  // fungsi, link di if (2), atribut form
  if (buat_form_perjalanan($_POST, $id_pengajuan) > 0){
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
          document.location.href = '$baseurl/penelitian_view_form_perjalanan?id=$id_pengajuan';
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
                <h5 class="card-title mg-b-20">Buat Form Beban Perjalanan</h5>



                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Untuk Bertugas dari/ke</label>
                  <input type="text" class="form-control" name = "dari_ke" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Kendaraan</label>
                  <select class="form-control select2-no-search" name="kendaraan" required>
                    <option label="Pilih Kendaraan"></option>
                    <option value="Kendaraan Umum">Kendaraan Umum</option>
                    <option value="Pesawat">Pesawat</option>
                    <option value="Kereta Api">Kereta Api</option>
                    <option value="Kendaraan Non-Dinas Lainnya">Kendaraan Non-Dinas Lainnya</option>
                    <option value="Kendaraan Dinas">Kendaraan Dinas</option>
                  </select>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Tanggal Berangkat</label>
                  <input type="text" class="form-control" name = "tgl" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Lama Bertugas</label>
                  <input type="text" class="form-control" name = "lama" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Tugas/Tujuan</label>
                  <input type="text" class="form-control" name = "tugas" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Uang yang Diperlukan</label>
                  <input type="number" class="form-control" name = "biaya" required>
                </div>



                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
