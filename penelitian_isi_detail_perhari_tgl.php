<?php
require('function.php');
$id_nama = $_GET["id"];
$id_pengajuan =  $_GET["id_p"];
$baseurl       = base_url()."home";

if(isset($_POST["submit"])){
  // var_dump("ok");
  if (tambah_tanggal_pekerja($_POST, $id_nama) > 0){
    echo ("
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_view_form_perhari?id=$id_pengajuan';
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
                 <h5 class="card-title mg-b-20">Tambah Data Tanggal Pekerja</h5>



                 <div class="form-group">
                   <label class="az-content-label tx-11 tx-medium tx-gray-600">Tanggal *format : dd/mm/yyyy </label>
                   <input type="text" class="form-control" name = "tgl" required>
                 </div>


                 <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
               </div><!-- card -->
             </div><!-- col -->
           </form>

         </div><!-- media-body -->


       </div><!-- media -->

     </div><!-- az-content -->
