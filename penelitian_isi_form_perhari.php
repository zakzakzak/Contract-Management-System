<?php
require('function.php');
$id_pengajuan = $_GET["id"];
$baseurl       = base_url()."home";

if(isset($_POST["submit"])){
  // var_dump("ok");
  if (buat_form_jasa_perhari($_POST, $id_pengajuan) > 0){
    echo ("
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_view_form_perhari?id=$id_pengajuan';
        </script>
    ");
    var_dump($_POST);
  }else{
    echo "
        <script>
          alert('data gagal ditambahkan');
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
                <h5 class="card-title mg-b-20">Buat Form Jasa Perhari</h5>



                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Pekerjaan</label>
                  <input type="text" class="form-control" name = "kerja" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Periode/Bulan</label>
                  <input type="text" class="form-control" name = "bulan" required>
                </div>



                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
