<?php
require('function.php');
$hasil_kontrak = query("SELECT * FROM kontrak ORDER BY id_kontrak DESC");
$id_pengajuan_umum = $_GET["id"];
$hasil_pengajuan_umum = query("SELECT * FROM pengajuan2 WHERE id_pengajuan = $id_pengajuan_umum")[0];
// var_dump($hasil_pengajuan_umum);

$jumlah_pengajuan_umum = $hasil_pengajuan_umum["jumlah"];



?>


<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">

<h2 class="az-content-title">Jumlah Pengajuan : <?= "Rp.".number_format($jumlah_pengajuan_umum) ?></h2>

<table id="example1" class="table">
  <thead>
    <tr>
      <th>Kontrak</th>
      <th>Kegiatan & Akun onloadeddata=""</th>
      <th>Rencana Operasional</th>
      <th>Jumlah Pengajuan Sebelum</th>
      <th>Jumlah Pengajuan Setelah</th>
      <th></th>
      <!-- <th>A</th> -->
    </tr>
  </thead>
<?php for ($i=0; $i < count($hasil_kontrak); $i++) :?>
  <?php
  $id_kontrak = $hasil_kontrak[$i]["id_kontrak"];
  $hasil_ro = query("SELECT * FROM rencana_operasional WHERE id_kontrak = $id_kontrak");
  ?>
  <?php if (count($hasil_ro) > 0): ?>


  <?php
  // var_dump(count($hasil_ro));
    // code...

  for ($ii=0; $ii < count($hasil_ro); $ii++) :
    // code...
    $id_keg    = $hasil_ro[$ii]["id_kegiatan"];
    $id_ro     = $hasil_ro[$ii]["id_ro"];
    $nama_keg_ = query("SELECT * FROM kegiatan WHERE id_kegiatan = $id_keg")[0]["nama_kegiatan"];
    $akun = $hasil_ro[$ii]["akun"];
    // echo $hasil_ro[$ii]["id_ro"];
    $akun = query("SELECT * FROM akun  WHERE id_akun = $akun")[0]["nama_akun"];
 ?>
 <tr>
   <td><strong><?= $hasil_kontrak[$i]["nama_kontrak"] ?></strong></td>
   <td>&nbsp&nbsp&nbsp<?= $nama_keg_." - ".$akun?></td>
   <td><?="Rp.".number_format($hasil_ro[$ii]["biaya"]) ?></td>
   <?php
   $hasil_pengajuan = query("SELECT * FROM pengajuan WHERE id_ro = $id_ro");
   $jum_pengajuan = 0;
   for ($pengajuan=0; $pengajuan < count($hasil_pengajuan); $pengajuan++) {
     $jum_pengajuan += $hasil_pengajuan[$pengajuan]["jumlah"];
   }
    ?>
   <td><?= "Rp.".number_format($jum_pengajuan) ?></td>

   <?php if ($jum_pengajuan+$jumlah_pengajuan_umum <= $hasil_ro[$ii]["biaya"] ) :?>
     <td class="tx-info"><?= "Rp.".number_format($jum_pengajuan+$jumlah_pengajuan_umum) ?></td>
     <td><a href="<?= base_url()."home/penelitian_ro_terpilih?id_ro=$id_ro&id_pengajuan_umum=$id_pengajuan_umum" ?>" class="btn btn-success btn-with-icon btn-block"><i class="far fa-file-alt"></i> Pilih</a></td>
   <?php else :?>
     <td class="tx-danger"><?= "Rp.".number_format($jum_pengajuan+$jumlah_pengajuan_umum) ?></td>
     <td class="tx-danger">Melebihi RO</td>
   <?php endif ?>


   <!-- <td>000</td> -->
 </tr>

<?php endfor;?>


<?php endif; ?>
<?php endfor; ?>
</table>


</div></div></div>
