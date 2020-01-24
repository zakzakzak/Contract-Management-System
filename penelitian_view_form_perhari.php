<?php
require('function.php');
$id_pengajuan = $_GET["id"];
$hasil_form = query("SELECT * FROM form_jasa_perhari WHERE id_pengajuan = $id_pengajuan");

$cek = count($hasil_form);
// var_dump($hasil_form[0]["bertugas_dari_ke"])
 ?>

 <?php if ($cek == 0) :?>
   <div class="az-content az-content-mail">
         <div class="container">
           <div class="az-content-body az-content-body-mail">
 <table id="example1" class="table">
   <tr>
     <td>Data Belum diisi</td>
   </tr>
 </table>

 <a href="<?= base_url()."home/penelitian_isi_form_perhari?id=".$id_pengajuan ;?>" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Isi Form</a>

 </div></div></div>


<?php else: ?>
  <div class="az-content az-content-mail">
        <div class="container">
          <div class="az-content-body az-content-body-mail">

  <table id="example1" class="table">
    <tr>
      <td><strong>Pekerjaan</strong></td>
      <td><strong>:</strong></td>
      <td><?= $hasil_form[0]["kerja"]?></td>
    </tr>
    <tr>
      <td><strong>Periode/Bulan</strong></td>
      <td><strong>:</strong></td>
      <td><?= $hasil_form[0]["periode"] ?></td>
    </tr>

  </table>
  <a href="#" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Edit Form</a>

  <?php
  $hasil_detail = query("SELECT * FROM detail_perhari WHERE id_pengajuan = $id_pengajuan");
  // var_dump($hasil_detail);
   ?>

   <?php if (count($hasil_detail) == 0) :?>
     <table id="example1" class="table">
       <tr>
         <td>Data Belum diisi</td>
       </tr>

     </table>
     <td><a href="<?= base_url()."home/penelitian_isi_detail_perhari?id=".$id_pengajuan ;?>" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Pelaksana</a></td>
   <?php else: ?>
     <table id="example1" class="table">
       <tr>
         <th>Nama</th>
         <th>Jumlah Hari</th>
         <th></th>
       </tr>
       <?php for ($i=0; $i < count($hasil_detail); $i++):?>
       <tr>
         <td><?= $hasil_detail[$i]["nama"] ?></td>
         <?php
         $id_nama = $hasil_detail[$i]["id_nama"];
         $hasil_nama = query("SELECT * FROM detail_perhari_tgl WHERE id_nama = $id_nama");

          ?>
         <td><?= count($hasil_nama) ?></td>
         <td><a href="<?= base_url()."home/penelitian_isi_detail_perhari_tgl?id=".$id_nama."&id_p=$id_pengajuan" ;?>" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Tanggal</a></td>
       </tr>
     <?php endfor; ?>
     </table>
     <td><a href="<?= base_url()."home/penelitian_isi_detail_perhari?id=".$id_pengajuan ;?>" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Pelaksana</a></td>
     <td><a href="<?= base_url()."home/penelitian_cetak_form_perhari?id=".$id_pengajuan ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Cetak Form</a></td>

   <?php endif; ?>



   </div></div></div>
<?php endif; ?>
