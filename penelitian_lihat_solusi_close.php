<?php
require('function.php');

$baseurl       = base_url()."home";
$id_masalah = $_GET["id"];
$masalah = query("SELECT * FROM masalah WHERE id_masalah = $id_masalah")[0];
$bidang =  query("SELECT * FROM bidang WHERE id_bidang != 2");




?>


<form autocomplete="off" action="" method="post">

<div class="col-md-12 col-lg-12 col-xl-12">
  <div class="card card-body pd-40">
    <h5 class="card-title mg-b-20">Solusi</h5>







    <div class="form-group">
      <label class="az-content-label tx-11 tx-medium tx-gray-600" > Pesan dari PIC</label>
      <textarea readonly rows="3" class="form-control" name ="masalah" placeholder="Textarea"><?= $masalah["masalah"] ?></textarea>
    </div><!-- form-group -->

    <div class="form-group">
      <label class="az-content-label tx-11 tx-medium tx-gray-600" > Solusi</label>
      <textarea readonly rows="3" class="form-control" name ="solusi" placeholder=""><?= $masalah["solusi"] ?></textarea>
    </div><!-- form-group -->



  </div><!-- card -->
</div><!-- col -->
</form>
