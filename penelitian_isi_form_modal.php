<?php
require('function.php');
$id_pengajuan = $_GET["id"];
$baseurl       = base_url()."home";

if(isset($_POST["submit"])){
  // var_dump("ok");
  if (buat_form_modal($_POST, $id_pengajuan) > 0){
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
    // var_dump( $_POST);
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
                <h5 class="card-title mg-b-20">Buat Form Belanja Modal</h5>



                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Pekerjaan</label>
                  <input type="text" class="form-control" name = "kerja" required>
                </div>

                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Kegiatan BLU</label>
                  <input type="text" class="form-control" name = "kegiatan" required>
                </div>


                <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
              </div><!-- card -->
            </div><!-- col -->
          </form>

        </div><!-- media-body -->


      </div><!-- media -->

    </div><!-- az-content -->
