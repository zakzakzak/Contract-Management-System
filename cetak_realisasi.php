<?php
require('function.php');
$id_kontrak = 78;

$realisasi = query("SELECT pengajuan.id_ro as id_ro, pengajuan.jumlah as jum_pengajuan, pengajuan.jum_real as jum_realisasi, pengajuan.tgl_pengajuan as tgl_pengajuan, pengajuan.tgl_real as tgl_realisasi, rencana_operasional.akun, pengajuan.keterangan as keterangan, rencana_operasional.id_kegiatan   from pengajuan inner join rencana_operasional on pengajuan.id_ro =rencana_operasional.id_ro where status_realisasi = 1 and rencana_operasional.id_kontrak = $id_kontrak");
$pemabayaran_termin_kontrak = query("SELECT * FROM hist_pembayaran WHERE id_kontrak = $id_kontrak");

$akun = query("SELECT *  from pengajuan inner join rencana_operasional on pengajuan.id_ro =rencana_operasional.id_ro where status_realisasi = 1 and rencana_operasional.id_kontrak = $id_kontrak GROUP BY akun ORDER BY akun ");


$tgl3 = explode('/',$realisasi[0]["tgl_realisasi"])[2] ;
$max_y = $tgl3;
foreach ($realisasi as $key => $value) {
  // var_dump($value["tgl_realisasi"]);
  // echo "<br>";
  $tgl_ = explode('/',$value["tgl_realisasi"])[2] ;
  if($max_y < $tgl_){
    $max_y = $tgl_;
  }
}


$tgl3 = explode('/',$pemabayaran_termin_kontrak[0]["tanggal"])[2] ;
$max_yy = $tgl3;
foreach ($pemabayaran_termin_kontrak as $key => $value) {
  // var_dump($value["tgl_realisasi"]);
  // echo "<br>";
  $tgl_ = explode('/',$value["tanggal"])[2] ;
  if($max_yy < $tgl_){
    $max_yy = $tgl_;
  }
}

// echo max($max_y,$max_yy);

// foreach ($akun as $key => $value) {
//   var_dump($value["akun"]);
//   echo "<br>";
// }

$hasil_kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];
$tahun_mulai   = explode('/', $hasil_kontrak["tgl_mulai"])[2];
$tahun_akhir   = max($max_y,$max_yy);

$id_jasa_kontrak = $hasil_kontrak["id_jasa"];
$kp3_kontrak = query("SELECT * FROM rumah_layanan WHERE id_rumah_layanan = $id_jasa_kontrak")[0]["nama"];

$id_rl_kontrak = $hasil_kontrak["id_rumah_layanan"];
$jenis_layanan_kontrak = query("SELECT * FROM detail_layanan WHERE id_detail = $id_rl_kontrak")[0]["nama_layanan"];
// echo $tahun_mulai." - ".$tahun_akhir;



// SELECT *  from pengajuan inner join rencana_operasional on pengajuan.id_ro =rencana_operasional.id_ro where status_realisasi = 1

// SELECT pengajuan.id_ro as id_ro, pengajuan.jumlah as jum_pengajuan, pengajuan.jum_real as jum_realisasi, pengajuan.tgl_pengajuan as tgl_pengajuan, pengajuan.tgl_real as tgl_realisasi, rencana_operasional.akun, pengajuan.keterangan as keterangan, rencana_operasional.id_kegiatan   from pengajuan inner join rencana_operasional on pengajuan.id_ro =rencana_operasional.id_ro where status_realisasi = 1
?>


<br>
<br>

<table>
  <tr>
    <td align="center"><strong>REALISASI KEGIATAN BADAN LAYANAN UMUM</strong></td>
  </tr>
  <tr>
    <td align="center"><strong>PUSLITBANNG TEKNOLOGI MINERAL DAN BATUBARA</strong>
  </tr>
  <tr>
    <!-- HARUSNYA TAHUN MULAI KONTRAK / MUlAI REALISASI KONTRAK -->
    <td align="center"><strong>TAHUN ANGGARAN 2019</strong>
  </tr>
</table>

<br>
<br>
<br>

<table>
  <tr>
    <td class="wd-lg-5p"></td>
    <td class="wd-lg-5p"></td>
    <td class="wd-lg-45p"></td>
  </tr>

  <tr>
    <td >KP3/BIDANG/BAGIAN</td>
    <td ><strong>:</strong></td>
    <td ><?= $kp3_kontrak ?></td>
  </tr>

  <tr>
    <td >JENIS LAYANAN *)</td>
    <td ><strong>:</strong></td>
    <td ><?= $jenis_layanan_kontrak ?></td>
  </tr>

  <tr>
    <td >JUDUL KEGIATAN</td>
    <td ><strong>:</strong></td>
    <td ><strong><?= $hasil_kontrak["nama_kontrak"] ?></strong></td>
  </tr>

  <tr>
    <td >NOMOR KONTRAK</td>
    <td ><strong>:</strong></td>
    <td class="tx-danger"><?= $hasil_kontrak["no_kontrak"] ?></td>
  </tr>

  <tr>
    <td>NILAI KONTRAK</td>
    <td ><strong>:</strong></td>
    <td><strong><?= "Rp.".number_format($hasil_kontrak["nilai_kontrak"]).",-" ?></strong></td>
  </tr>

  <tr>
    <td>WAKTU PELAKSANAAN</td>
    <td ><strong>:</strong></td>
    <td>MULAI <strong><?= $hasil_kontrak["tgl_mulai"]."</strong> SELESAI <strong>".$hasil_kontrak["tgl_akir"] ?></strong> </td>
  </tr>
</table>

<br>
<br>




<?php for ($i=$tahun_mulai; $i <= $tahun_akhir; $i++): ?>
  <table class="table table-dashboard-two mg-b-0">
    <!-- HEADER KONTRAK -->
    <tr>
      <td></td>
      <th colspan="13" class="text-center"><strong><?= $hasil_kontrak["nama_kontrak"]." TAHUN ".$i ?></strong></th>

    </tr>



    <!-- BULAN -->
    <tr>
      <th class="wd-lg-5p"><strong>URAIAN</strong></th>
      <th class="wd-lg-5p"><strong>JAN</strong></th>
      <th class="wd-lg-5p"><strong>FEB</strong></th>
      <th class="wd-lg-5p"><strong>MAR</strong></th>
      <th class="wd-lg-5p"><strong>APR</strong></th>
      <th class="wd-lg-5p"><strong>MAY</strong></th>
      <th class="wd-lg-5p"><strong>JUN</strong></th>
      <th class="wd-lg-5p"><strong>JUL</strong></th>
      <th class="wd-lg-5p"><strong>AUG</strong></th>
      <th class="wd-lg-5p"><strong>SEP</strong></th>
      <th class="wd-lg-5p"><strong>OCT</strong></th>
      <th class="wd-lg-5p"><strong>NOV</strong></th>
      <th class="wd-lg-5p"><strong>DEC</strong></th>
      <th class="wd-lg-10p">JUMLAH</th>
    </tr>


    <tr>
      <td colspan="14"><strong>PENERIMAAN</strong></td>
    </tr>


    <?php
    // untuk penjumlahan per bulan
    $arr_jum_bwh_termin = array();
    for ($aa=1; $aa <= 12; $aa++) {
      $arr_jum_bwh_termin[$aa] = 0;
    }
     ?>



    <?php for ($trm=1; $trm <= $hasil_kontrak["termin"]; $trm++) :?>

      <tr>
        <td><?= "termin $trm" ?></td>
        <?php
        $pemabayaran_termin = query("SELECT *
                                    FROM hist_pembayaran
                                    WHERE id_kontrak = $id_kontrak AND termin = $trm");
        $jum_th_pembayaran = 0;
         ?>
        <?php for ($bln=1; $bln <= 12 ; $bln++) :?>

            <?php if($bln < 10): ?>
              <?php $tmp_dt = "0".$bln.$i; ?>
            <?php else: ?>
              <?php $tmp_dt = $bln.$i; ?>
            <?php endif; ?>


            <?php $jum = 0 ?>

            <?php for ($ii=0; $ii < count($pemabayaran_termin); $ii++) {
              $tgl = $pemabayaran_termin[$ii]["tanggal"];
              // cek kode bulan.tahun  mis : 102019
              $tgl = explode("/", $tgl)[1].explode("/", $tgl)[2];
              if($tmp_dt == $tgl){
                $jum += $pemabayaran_termin[$ii]["jumlah"];
                // var_dump("ada kok");
              }

            } ?>

            <?php if ($jum > 0) : ?>
              <td><?= "Rp.".number_format($jum).",-" ?></td>
            <?php else : ?>
              <td><?= "-" ?></td>
            <?php endif; ?>

            <?php
            $jum_th_pembayaran += $jum;
            $arr_jum_bwh_termin[$bln] += $jum;

            ?>




        <?php endfor; ?>
        <td><strong><?= "Rp.".number_format($jum_th_pembayaran).",-" ?></strong></td>
      </tr>
    <?php endfor; ?>

    <tr>

      <td><strong>JUMLAH PENDAPATAN</strong></td>
      <?php $jum_bwh_th = 0 ?>
      <?php for ($iii=1; $iii <= 12; $iii++) :?>
        <?php if ($arr_jum_bwh_termin[$iii] > 0): ?>
          <td><strong><?= "Rp.".number_format($arr_jum_bwh_termin[$iii]).",-" ?></strong></td>
        <?php else: ?>
          <td>-</td>
        <?php endif; ?>
        <?php
        $jum_bwh_th += $arr_jum_bwh_termin[$iii];
         ?>
      <?php endfor; ?>
      <td class="tx-info"><strong><?= "Rp.".number_format($jum_bwh_th).",-" ?></strong></td>
    </tr>
    <tr>

    </tr>

    <!-- AKUN -->
    <tr>
      <td colspan="14"><strong>PENGELUARAN</strong></td>
    </tr>

    <?php
    // untuk penjumlahan per bulan
    $arr_jum_bwh = array();
    for ($aa=1; $aa <= 12; $aa++) {
      $arr_jum_bwh[$aa] = 0;
    }
     ?>



    <?php for ($k=0; $k < count($akun); $k++): ?>
            <tr>
              <?php
              $id_akun = $akun[$k]["akun"];
              $akun_ = query("SELECT * FROM akun WHERE id_akun = $id_akun")[0];
              $nama_akun = $akun_["nama_akun"];
              $kode_akun = $akun_["kode"];
              $jum_th = 0;


              $hasil_akun_ = query("SELECT pengajuan.id_ro AS id_ro, pengajuan.jumlah AS jum_pengajuan,
                pengajuan.jum_real AS jum_realisasi, pengajuan.tgl_pengajuan AS tgl_pengajuan,
                pengajuan.tgl_real AS tgl_realisasi, pengajuan.keterangan AS keterangan,
                rencana_operasional.id_kegiatan AS id_kegiatan
                FROM pengajuan INNER JOIN rencana_operasional ON pengajuan.id_ro =rencana_operasional.id_ro
                WHERE status_realisasi = 1 AND akun = $id_akun AND rencana_operasional.id_kontrak = $id_kontrak");
               ?>
              <td><?= $nama_akun." (<strong>".$kode_akun."</strong>)" ?></td>



              <?php for ($j=1; $j <= 12; $j++): ?>

                    <?php if($j < 10): ?>
                      <?php // buat kode bulan.tahun ?>
                      <?php $tmp_dt = "0".$j.$i; ?>
                    <?php else: ?>
                      <?php $tmp_dt = $j.$i; ?>
                    <?php endif; ?>


                    <?php
                    $jum = 0;
                    // var_dump($hasil_akun_);
                    // echo "<br><br><br><br>";
                    ?>


                    <?php for ($ii=0; $ii < count($hasil_akun_); $ii++) {
                      $tgl = $hasil_akun_[$ii]["tgl_realisasi"];
                      // cek kode bulan.tahun  mis : 102019
                      $tgl = explode("/", $tgl)[1].explode("/", $tgl)[2];
                      if($tmp_dt == $tgl){
                        $jum += $hasil_akun_[$ii]["jum_realisasi"];
                        // var_dump("ada kok");

                      }
                    } ?>
                    <?php
                    $jum_th += $jum;
                    ?>

                    <?php if ($jum > 0) :?>
                      <td><?= number_format($jum).",-" ?></td>
                    <?php else: ?>
                      <td><?= "  -  " ?></td>
                    <?php endif; ?>


                    <?php
                    $arr_jum_bwh[$j] += $jum;

                    ?>


              <?php endfor; ?>



              <td><strong><?= number_format($jum_th).",-" ?></strong></td>
            </tr>

    <?php endfor; ?>

    <tr>
      <td><strong>JUMLAH PENGELUARAN</strong></td>
      <?php $jumm=0; ?>
      <?php for ($ik=1; $ik <= 12; $ik++) : ?>
        <?php if($arr_jum_bwh[$ik] == 0): ?>
          <td><?= "  -  " ?></td>
        <?php else: ?>
          <td><strong><?= number_format($arr_jum_bwh[$ik]).",-" ?></strong></td>
          <?php $jumm +=  $arr_jum_bwh[$ik]?>
        <?php endif; ?>
      <?php endfor; ?>
      <td  class="tx-info"><strong><?= "Rp.".number_format($jumm).",-" ?></strong>
      </td>
    </tr>

    <tr>
      <td colspan="14"><strong>TOTAL</strong>
      </td>
    </tr>

    <tr>
      <td colspan="13"><strong>SALDO</strong></td>


      <td class="tx-info"><strong><?= "Rp.".number_format($jum_bwh_th - $jumm).",-" ?></strong></td>
    </tr>

</table>
<br><br><br><br><br><br><br><br><br>

<?php endfor; ?>










<table class="table table-dashboard-two mg-b-0">
  <tr>
    <td class="wd-lg-5p"><strong>TOTAL KESELURUHAN</strong></td>
    <td class="wd-lg-45p"><strong>JUMLAH</strong></td>
  </tr>

  <tr>
    <td></td>
    <td></td>
  </tr>

  <!-- TERMIN -->
  <?php $total_termin_semua = 0; ?>
  <?php for ($trm=1; $trm <= $hasil_kontrak["termin"]; $trm++) :?>
    <tr>
      <td><?= "termin $trm" ?></td>
      <?php
      $pemabayaran_termin = query("SELECT *
                                  FROM hist_pembayaran
                                  WHERE id_kontrak = $id_kontrak AND termin = $trm");
      $jum_total_termin = 0;
      for ($i_term=0; $i_term < count($pemabayaran_termin); $i_term++) {
        $jum_total_termin += $pemabayaran_termin[$i_term]["jumlah"];
      }
       ?>
      <td><?= "Rp.".number_format($jum_total_termin).",-" ?></td>
      <?php $total_termin_semua += $jum_total_termin?>
    </tr>
  <?php endfor; ?>

  <tr>
    <td><strong>TOTAL PENERIMAAN</strong></td>

    <td ><strong><?= "Rp.".number_format($total_termin_semua).",-" ?></strong>
    </td>
  </tr>


  <!-- AKUN -->
  <tr>
  <td colspan="14"><strong>PENGELUARAN (Maksimal 70%)</strong></td>
  </tr>

  <?php $total_akun_semua = 0; ?>
  <?php for ($k=0; $k < count($akun); $k++): ?>
    <?php
    $id_akun = $akun[$k]["akun"];
    $akun_ = query("SELECT * FROM akun WHERE id_akun = $id_akun")[0];
    $nama_akun = $akun_["nama_akun"];
    $kode_akun = $akun_["kode"];
    // $jum_th = 0;


    $hasil_akun_ = query("SELECT pengajuan.jum_real AS jum_realisasi
      FROM pengajuan INNER JOIN rencana_operasional ON pengajuan.id_ro =rencana_operasional.id_ro
      WHERE status_realisasi = 1 AND akun = $id_akun AND rencana_operasional.id_kontrak = $id_kontrak");

     ?>

    <tr>

      <td><?= $nama_akun." (<strong>".$kode_akun."</strong>)" ?></td>
      <?php

      $jum_total_akun = 0;
      for ($i_akun=0; $i_akun < count($hasil_akun_); $i_akun++) {
        $jum_total_akun += $hasil_akun_[$i_akun]["jum_realisasi"];

      }
       ?>
       <?php $total_akun_semua += $jum_total_akun?>
      <td><?= "Rp.".number_format($jum_total_akun).",-" ?></td>
    </tr>
  <?php endfor; ?>

  <tr>
    <td><strong>TOTAL PENGELUARAN</strong></td>
    <td><strong><?= "Rp.".number_format($total_akun_semua).",-" ?><strong></td>
  </tr>

  <tr>
    <td><strong>SALDO</strong></td>
    <td class = "tx-info"><strong><?= "Rp.".number_format($total_termin_semua - $total_akun_semua).",-" ?></strong></td>
  </tr>





</table>

<br>
<br>

<table>
  <tr>
    <td class="wd-lg-5p"></td>
    <td><strong>JENIS LAYANAN *)</strong>
    </td>
  </tr>

  <tr>
    <td></td>
    <td>1. Pengujian Laboratorium</td>
    <td>3. Pekerjaan Desk Work/Kajian</td>
    <td>5. Perbantuan Tenaga Ahli</td>
  </tr>

  <tr>
    <td></td>
    <td>2. Pekerjaan Fisik</td>
    <td>4. Uji Proses</td>
    <td>6. Alih Teknologi (lisensi, capacity building, dana riset)</td>
  </tr>

</table>

<br>
<br>


<table>
  <tr>
    <td align="center">PEMIMPIN BLU,</td>
    <td align="center">PEJABAT KEUANGAN,</td>
  </tr>
  <tr>
    <td style="height: 10px !important; "></td>
    <td ></td>
  </tr>
  <tr>
    <td style="height: 10px !important; "></td>
    <td ></td>
  </tr><tr>
    <td style="height: 10px !important; "></td>
    <td ></td>
  </tr><tr>
    <td style="height: 10px !important; "></td>
    <td ></td>
  </tr><tr>
    <td style="height: 10px !important; "></td>
    <td ></td>
  </tr><tr>
    <td style="height: 10px !important; "></td>
    <td ></td>
  </tr><tr>
    <td style="height: 10px !important; "></td>
    <td ></td>
  </tr>

  <tr>
    <td align="center">HERMANSYAH</td>
    <td align="center">NANDANG JUMARUDIN</td>
  </tr>


  <tr>
    <td align="center">NIP 19631112 199003 1 001</td>
    <td align="center">NIP 19611204 198103 1 001</td>
  </tr>
</table>

<br>
<br>
