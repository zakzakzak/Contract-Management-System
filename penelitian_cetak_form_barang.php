<?php
require('function.php');
$id_pengajuan = $_GET["id"];
$baseurl      = base_url()."home";

$hasil_form   = query("SELECT * FROM form_perjalanan   WHERE id_pengajuan = $id_pengajuan")[0];
$hasil_detail = query("SELECT * FROM detail_perjalanan WHERE id_pengajuan = $id_pengajuan");

 ?>

  <br><br>
 <table>
   <tr>
     <th colspan="4" class="text-center"><strong>PROGRAM PENELITIAN DAN PENGEMBANGAN KEMENTRIAN ESDM</strong></th>
   </tr>
   <tr>
     <th></th>
   </tr>
   <tr>
     <th colspan="4" class="text-center"><strong>KEGIATAN PENELITIAN DAN PENGEMBANGAN TEKNOLOGI MINERAL & BATUBARA</strong></th>
   </tr>
   <tr>
     <th colspan="4" class="text-center"><strong>____________________________________________________________________________________________________________</strong></th>
   </tr>
   <tr>
     <th colspan="4" class="text-center"><strong>SURAT USULAN PERJALANAN DINAS</strong></th>
   </tr>
   <tr>
     <th colspan="4" class="text-center"><strong>BADAN LAYANAN UMUM</strong></th>
   </tr>
   <tr>
     <th colspan="4" class="text-center"><strong>No. SPPD:......................................</strong></th>
   </tr>

   <tr>
     <td>output</td>
     <td>:</td>
     <td colspan="2">Penerimaan Negara Bukan Pajak (PNBP) dan Laboratorium Pengujian</td>
   </tr>
   <tr>
     <td>Komponen</td>
     <td>:</td>
     <td colspan="2">Pelayanan Jasa Teknologi dan Laboratorium Pengujian tekMIRA</td>
   </tr>
   <tr>
     <td>Sub Komponen</td>
     <td>:</td>
     <td colspan="2">Pelayanan Jasa Laboratorium Oengujian dan Pengelolaan Sistem</td>
   </tr>
   <tr>
     <td>Kode Akun</td>
     <td>:</td>
     <td colspan="2">Beban Pekerjaan</td>
   </tr>
   <tr>
     <td>Ditugaskan Kepada</td>
     <td>:</td>
     <td colspan="2"></td>
   </tr>
 </table>

 <table border="1">
   <tr>
     <th>No.</th>
     <th>Nama</th>
     <th>Golongan</th>
     <th>Jabatan</th>
     <th>Keterangan</th>
   </tr>
   <?php for ($i=0; $i < count($hasil_detail); $i++) :?>
     <tr>

       <td><?=$i+1 ?></td>
       <td><?=$hasil_detail[$i]["nama"] ?></td>
       <td><?=$hasil_detail[$i]["golongan"] ?></td>
       <td><?=$hasil_detail[$i]["jabatan"] ?></td>
       <td><?=$hasil_detail[$i]["keterangan"] ?></td>
     </tr>
   <?php endfor; ?>
 </table>

 <table>
   <tr>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
   </tr>
   <tr>
     <td>Untuk bertugas dari/ke</td>
     <td>:</td>
     <td><?= $hasil_form["bertugas_dari_ke"] ?></td>
   </tr>

   <tr>
     <td>Kendaraan</td>
     <td>:</td>
     <td><?= $hasil_form["kendaraan"] ?></td>
   </tr>

   <tr>
     <td>Tanggal Berangkat</td>
     <td>:</td>
     <td><?= $hasil_form["tanggal_berangkat"] ?></td>
   </tr>

   <tr>
     <td>Lama Bertugas</td>
     <td>:</td>
     <td><?= $hasil_form["lama_bertugas"] ?></td>
   </tr>

   <tr>
     <td>Tugas/Tujuan</td>
     <td>:</td>
     <td><?= $hasil_form["tugas_tujuan"] ?></td>
   </tr>










   <tr>
     <td>Uang yang Diperlukan</td>
     <td>:</td>
     <td>Rp.<?= $hasil_form["biaya"] ?></td>
   </tr>

 </table>
