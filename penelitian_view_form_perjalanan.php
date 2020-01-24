<?php
require('function.php');
$id_pengajuan = $_GET["id_p"];
$id_kontrak = $_GET["id_k"];
// query
$hasil_form = query("SELECT * FROM form_perjalanan WHERE id_pengajuan = $id_pengajuan");
$cek = count($hasil_form);

 ?>

 <?php if ($cek == 0) :?>
   <div class="az-content az-content-mail">
   <div class="container">
   <div class="az-content-body az-content-body-mail">

   <div class="card card-dashboard-five">

   <div class="card card-dashboard-five">
   <h3>Data Form</h3>

   <table id="example1" class="table">
     <tr>
       <td>Data Belum diisi</td>
     </tr>
   </table>
  <!-- link -->
   <a href="<?= base_url()."home/penelitian_isi_form_perjalanan?id=".$id_pengajuan ;?>" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Isi Form</a>
   </div></div></div></div></div>


  <?php else: ?>
    <div class="az-content az-content-mail">
    <div class="container">
    <div class="az-content-body az-content-body-mail">

    <div class="card card-dashboard-five">
    <div class="card card-dashboard-five">
    <h3>Data Form</h3>
    <!-- isi data -->
    <table id="example1" class="table">
    <tr>
      <td><strong>Untuk Bertugas dari/ke</strong></td>
      <td><strong>:</strong></td>
      <td><?= $hasil_form[0]["bertugas_dari_ke"] ?></td>
    </tr>
    <tr>
      <td><strong>Kendaraan</strong></td>
      <td><strong>:</strong></td>
      <td><?= $hasil_form[0]["kendaraan"] ?></td>
    </tr>
    <tr>
      <td><strong>Tanggal Berangkat</strong></td>
      <td><strong>:</strong></td>
      <td><?= $hasil_form[0]["tanggal_berangkat"] ?></td>
    </tr>
    <tr>
      <td><strong>Lama Bertugas</strong></td>
      <td><strong>:</strong></td>
      <td><?= $hasil_form[0]["lama_bertugas"] ?></td>
    </tr>
    <tr>
      <td><strong>Tugas/Tujuan</strong></td>
      <td><strong>:</strong></td>
      <td><?= $hasil_form[0]["tugas_tujuan"] ?></td>
    </tr>

    <tr>
      <td><strong>Uang yang Diperlukan</strong></td>
      <td><strong>:</strong></td>
      <td><?= $hasil_form[0]["biaya"] ?></td>
    </tr>
    </table>
    <a href="#" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Edit Form</a>
    </div>








  <?php //DETIL;
  $hasil_detail = query("SELECT * FROM detail_perjalanan WHERE id_pengajuan = $id_pengajuan");
   ?>
   <br>
   <div class="card card-dashboard-five">
   <h3>Data Pegawai</h3>
   <?php if (count($hasil_detail) == 0) :?>
     <table id="example1" class="table">
     <tr>
       <td>Data Belum diisi</td>
     </tr>
     </table>
     <td><a href="<?= base_url()."home/penelitian_isi_detail_perjalanan?id=".$id_pengajuan ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Pelaksana</a></td>


   <?php else: ?>
     <table id="example1" class="table">
     <tr>
       <th>Nama</th>
       <th>Golongan</th>
       <th>Jabatan</th>
       <th>Keterangan</th>
     </tr>
     <?php for ($i=0; $i < count($hasil_detail); $i++):?>
     <tr>
       <td><?= $hasil_detail[$i]["nama"] ?></td>
       <td><?= $hasil_detail[$i]["golongan"] ?></td>
       <td><?= $hasil_detail[$i]["jabatan"] ?></td>
       <td><?= $hasil_detail[$i]["keterangan"] ?></td>
     </tr>
     <?php endfor; ?>
     </table> <!--link -->
     <td><a href="<?= base_url()."home/penelitian_isi_detail_perjalanan?id=".$id_pengajuan ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Pelaksana</a></td>
   <?php endif; ?>
   </div>













   <br>
   <div class="card card-dashboard-five">


   <h3>Data Tanda Tangan</h3>


   <!-- TANDA TANGAN -->

    <?php
    $hasil_detail = query("SELECT * FROM tanda_tangan WHERE id_pengajuan = $id_pengajuan");
    ?>

    <?php if (count($hasil_detail)  == 0) :?>
      <table id="example1" class="table">
        <tr>
          <td>Data Tanda Tangan Belum diisi</td>
        </tr>

      </table>
    <?php else: ?>
      <table id="example1" class="table">
        <thead>
        <tr>

          <th colspan="2">Nama</th>
          <th colspan="2">Sebagai</th>
          <th></th>
          <th></th>
        </tr>
        </thead>
        <?php for ($i=0; $i < count($hasil_detail); $i++):?>
        <tr>
          <?php if ($hasil_detail[$i]["keterangan"] == 1): ?>
            <?php
            $id_pegawai = $hasil_detail[$i]["nama"];
            $hasil_pegawai_id = query("SELECT * FROM pegawai2 WHERE id = $id_pegawai")[0]["nama"];
             ?>
          <td colspan="2"><?= $hasil_pegawai_id ?></td>
          <?php else: ?>
          <td colspan="2"><?= $hasil_detail[$i]["nama"] ?></td>
          <?php endif; ?>
          <td colspan="2"><?= $hasil_detail[$i]["sebagai"] ?></td>
          <td>&nbsp</td>
          <td>&nbsp</td>
          <td>&nbsp</td>
          <td>&nbsp</td>
          <td><td><a href="#" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Hapus</a></td></td>
        </tr>
      <?php endfor; ?>
      </table>

    <?php endif; ?>
    <table id="example1" class="table">
      <tr>

        <td><a href="<?= base_url()."home/penelitian_tambah_ttd?tipe=1&id_k=$id_kontrak&id_p=$id_pengajuan";?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Tanda Tangan (pegawai)</a></td>
        <td><a href="<?= base_url()."home/penelitian_tambah_ttd?tipe=2&id_k=$id_kontrak&id_p=$id_pengajuan";?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Tanda Tangan (non-pegawai)</a></td>
      </tr>

    </table>
    </div>






   <br>
   <td><a href="<?= base_url()."home/penelitian_cetak_form_perjalanan?id=".$id_pengajuan ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Cetak Form</a></td>


  <a href="<?= base_url()."home/penelitian_detail_kontrak?id=".$id_kontrak;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Kembali ke Detail Kontrak</a>
 </div></div></div></div>
<?php endif; ?>
