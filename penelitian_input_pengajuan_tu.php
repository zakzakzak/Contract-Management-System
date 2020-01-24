<?php
require('function.php');



$baseurl       = base_url()."home";
if(isset($_POST["submit"])) {
  // var_dump("ok");
  if (tambah_pengajuan_tu($_POST) > 0){
    echo ("
        <script>
          alert('Pengajuan berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_pengajuan_tu';
        </script>
    ");
  }else{
    echo "
        <script>
          alert('Pengajuan GAGAL');
          document.location.href = '$baseurl/penelitian_pengajuan_tu';
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
