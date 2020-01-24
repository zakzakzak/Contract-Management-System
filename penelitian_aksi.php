<?php
require('function.php');

$baseurl       = base_url()."home";
$id_masalah = $_GET["id"];
$masalah = query("SELECT * FROM masalah WHERE id_masalah = $id_masalah")[0];

if(isset($_POST["submit"])){
  // var_dump("ok");
  if (update_masalah2($_POST, $id_masalah) > 0){
    echo ("
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_index';
        </script>
    ");
  }else{
    echo "
        <script>
          alert('data gagal ditambahkan');
        </script>
    ";

  }
}



?>


<form autocomplete="off" action="" method="post">

<div class="col-md-12 col-lg-12 col-xl-12">
  <div class="card card-body pd-40">
    <h5 class="card-title mg-b-20">Tambah Data Kegiatan</h5>







    <div class="form-group">
      <label class="az-content-label tx-11 tx-medium tx-gray-600" > Pesan dari PIC</label>
      <textarea readonly rows="3" class="form-control" name ="masalah" placeholder="Textarea"><?= $masalah["masalah"] ?></textarea>
    </div><!-- form-group -->

    <div class="form-group">
      <label class="az-content-label tx-11 tx-medium tx-gray-600" > Solusi</label>
      <textarea  rows="3" class="form-control" name ="solusi" placeholder="Tuliskan solusi"></textarea>
    </div><!-- form-group -->


    <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>
  </div><!-- card -->
</div><!-- col -->
</form>
