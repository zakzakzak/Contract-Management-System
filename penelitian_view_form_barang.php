<?php
require('function.php');
$id_pengajuan = $_GET["id_p"];
$id_kontrak = $_GET["id_k"];
$hasil_form = query("SELECT * FROM form_barang WHERE id_pengajuan = $id_pengajuan");

$cek = count($hasil_form);
// var_dump($hasil_form[0]["bertugas_dari_ke"])
 ?>





 <div class="az-content az-content-mail">
 <div class="container">
 <div class="az-content-body az-content-body-mail">

 <div class="card card-dashboard-five">
 <div class="card card-dashboard-five">
<h3>Data Form</h3>

 <?php if ($cek == 0) :?>



 <table id="example1" class="table">
   <tr>
     <td>Data Belum diisi</td>
   </tr>
 </table>

 <a href="<?= base_url()."home/penelitian_isi_form_barang?id_p=$id_pengajuan&id_k=$id_kontrak" ;?>" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Isi Form</a>
 </div>


<?php else: ?>

  <table id="example1" class="table">
    <tr>
      <td><strong>Pekerjaan</strong></td>
      <td><strong>:</strong></td>
      <td><?= $hasil_form[0]["pekerjaan"]?></td>
    </tr>

  </table>
  <a href="#" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Edit Form</a>
  </div>


  <?php
  $hasil_detail = query("SELECT * FROM detail_barang WHERE id_pengajuan = $id_pengajuan");
  // var_dump($hasil_detail);
   ?>









   <!-- DETIL -->
   <br>
   <div class="card card-dashboard-five">
   <h3>Detil Form</h3>

   <?php if (count($hasil_detail) == 0) :?>
     <table id="example1" class="table">
       <tr>
         <td>Data Belum diisi</td>
       </tr>
       <tr>
         <td>&nspb</td>
       <td><a href="<?= base_url()."home/penelitian_isi_detail_barang?id_p=".$id_pengajuan."&id_k=$id_kontrak" ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Pelaksana</a></td>
     </tr>
     </table>
   <?php else: ?>
     <table id="example1" class="table">
       <thead>
       <tr>

         <th>Peristiwa</th>
         <th>Barang</th>
         <th>Volume</th>
         <th>Satuan</th>
         <th>Harga Satuan</th>
         <th>Jumlah</th>
         <th></th>
       </tr>
     </thead>
       <?php for ($i=0; $i < count($hasil_detail); $i++):?>
       <tr>
         <td bgcolor="#E0FFFF"><strong><?= $hasil_detail[$i]["peristiwa"]; ?></strong></td>
         <?php
         $id_peristiwa = $hasil_detail[$i]["id_peristiwa"];
         $hasil_barang = query("SELECT * FROM detail_barang_nama WHERE id_peristiwa = $id_peristiwa");

          ?>
         <td bgcolor="#E0FFFF"><?= count($hasil_barang) ?></td>
         <td bgcolor="#E0FFFF"></td>
         <td bgcolor="#E0FFFF"></td>
         <td bgcolor="#E0FFFF"></td>
         <td bgcolor="#E0FFFF"></td>
         <td bgcolor="#E0FFFF"><a href="<?= base_url()."home/penelitian_isi_detail_barang_nama?id=".$id_peristiwa."&id_p=$id_pengajuan&id_k=$id_kontrak" ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Barang</a></td>
       </tr>
       <?php for ($ii=0; $ii < count($hasil_barang); $ii++):?>
         <tr>
           <td><?= ($ii+1)."." ?></td>
           <td><?= $hasil_barang[$ii]["nama_barang"] ?></td>
           <td><?= $hasil_barang[$ii]["volume"] ?></td>
           <td><?= $hasil_barang[$ii]["satuan"] ?></td>
           <td><?= number_format($hasil_barang[$ii]["harga_satuan"]) ?></td>
           <td><?= $hasil_barang[$ii]["jumlah"] ?></td>
           <td></td>
         </tr>
       <?php endfor; ?>
     <?php endfor; ?>

     </table>
     <a href="<?= base_url()."home/penelitian_isi_detail_barang?id_p=".$id_pengajuan."&id_k=$id_kontrak" ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Waktu</a>

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
















     <div class="card card-dashboard-five">

     <h3>Cetak Form</h3>

     <a href="<?= base_url()."home/penelitian_cetak_form_barang?id_p=".$id_pengajuan."&id_k=$id_kontrak" ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Cetak Form</a>

     </div>



   <?php endif; ?>







<?php endif; ?>
<a href="<?= base_url()."home/penelitian_detail_kontrak?id=".$id_kontrak;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Kembali ke Detail Kontrak</a>
</div></div></div></div>
