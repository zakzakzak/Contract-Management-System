<?php
require('function.php');
$id_kontrak = 58;
$akun = query("SELECT * FROM rencana_operasional WHERE id_kontrak = $id_kontrak
               GROUP BY akun");
$hasil_kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];
$tahun_mulai   = explode('/', $hasil_kontrak["tgl_mulai"])[2];
$tahun_akhir   = explode('/', $hasil_kontrak["tgl_akir"] )[2];

echo $tahun_mulai."<br>";
echo $tahun_akhir."<br>";
$a["2"."2019"] = 2;
echo ($a["2".$tahun_mulai]);


// for ($i=$tahun_mulai; $i <= $tahun_akhir; $i++) {
//   echo "<tr>";
//   for ($j=1; $j <= 12; $j++) {
//     echo "<td>$j</td>";
//   }
//   // echo($i);
//   echo "</tr>";
// }

// var_dump($akun);
// for ($i=0; $i < count($akun); $i++) {
//   var_dump($akun[$i]["akun"]);
// }

// for(){
//
// }


?>

<?php
$jum_akun = array();
for ($k=0; $k < count($akun); $k++){
  $jum_akun[$k] = 0;
}

 ?>
<?php for ($i=$tahun_mulai; $i <= $tahun_akhir; $i++): ?>
  <table class="table table-dashboard-two mg-b-0">
    <!-- HEADER KONTRAK -->
    <tr>
      <td></td>
      <th colspan="13" class="text-center"><strong><?= $hasil_kontrak["nama_kontrak"]." TAHUN ".$i ?></strong></th>

    </tr>



    <!-- BULAN -->
    <tr>
      <th class="wd-lg-5p"></th>
      <th class="wd-lg-5p">JAN</th>
      <th class="wd-lg-5p">FEB</th>
      <th class="wd-lg-5p">MAR</th>
      <th class="wd-lg-5p">APR</th>
      <th class="wd-lg-5p">MAY</th>
      <th class="wd-lg-5p">JUN</th>
      <th class="wd-lg-5p">JUL</th>
      <th class="wd-lg-5p">AUG</th>
      <th class="wd-lg-5p">SEP</th>
      <th class="wd-lg-5p">OCT</th>
      <th class="wd-lg-5p">NOV</th>
      <th class="wd-lg-5p">DEC</th>
      <th class="wd-lg-10p">JUMLAH</th>
    </tr>


    <tr>
      <td colspan="14"><strong>PENDAPATAN BLU</strong></td>
    </tr>

    <!-- TERMIN -->
    <?php
    $arr_ = array();
    for ($lp=1; $lp <= 12; $lp++) {
      $arr_[$lp]= 0;
    }
    ?>


    <?php for ($trm=1; $trm <= $hasil_kontrak["termin"]; $trm++) :?>
      <?php $jum_term = 0; ?>
      <tr>
        <td>Termin <?= "-$trm" ?></td>
        <?php for ($bln=1; $bln <= 12 ; $bln++) :?>

          <?php if($bln < 10): ?>
            <?php $tmp_dt_ = "0".$bln.$i; ?>
          <?php else: ?>
            <?php $tmp_dt_ = $bln.$i; ?>
          <?php endif; ?>

          <?php
          $tgl_term1 = query("SELECT * FROM rencana_termin WHERE id_kontrak = $id_kontrak AND termin = $trm")[0];
          $tgl_term = explode("/", $tgl_term1["tanggal"])[1].explode("/", $tgl_term1["tanggal"])[2];
          // var_dump($tgl_term);
          ?>
          <?php if ($tgl_term == $tmp_dt_): ?>
            <?php $jum_term += $tgl_term1["jumlah"];?>
            <?php $arr_[$bln] += $tgl_term1["jumlah"]; ?>
            <td><?=  number_format( $tgl_term1["jumlah"]).",-"?></td>
          <?php else: ?>
            <td>-</td>
            <?php //$arr_[$bln] += 0; ?>
          <?php  endif; ?>




        <?php endfor; ?>
        <td><?= $jum_term ?></td>
      </tr>
    <?php endfor; ?>

    <tr>

      <td><strong>JUMLAH PENDAPATAN</strong></td>
      <?php for ($iii=1; $iii <= 12; $iii++) :?>
        <td><?= $arr_[$iii] ?></td>
      <?php endfor; ?>
    </tr>
    <tr>

    </tr>

    <!-- AKUN -->
    <tr>
      <td colspan="14"><strong>PENGELUARAN (Maksimal 70%)</strong></td>

    </tr>


    <?php
    // PENJUMLAHAN BAWAH
    $arr_jum_bwh = array();
    for ($aa=1; $aa <= 12; $aa++) {
      $arr_jum_bwh[$aa] = 0;
    }
     ?>
    <?php for ($k=0; $k < count($akun); $k++): ?>
            <tr>
                <?php
                $id_akun_  = $akun[$k]["akun"];
                $nama_akun = query("SELECT * FROM akun WHERE id_akun = $id_akun_")[0]["nama_akun"];
                $kode_akun = query("SELECT * FROM akun WHERE id_akun = $id_akun_")[0]["kode"];
                $jum_th    = 0;
                  ?>
                <td><?= $nama_akun." ($kode_akun)" ?></td>
                <!-- Loop bulan -->
                <?php for ($j=1; $j <= 12; $j++): ?>

                      <?php $jum = 0 ?>


                  <!-- <td><?= $j ?></td> -->
                      <?php if($j < 10): ?>
                        <?php $tmp_dt = "0".$j.$i; ?>
                        <!-- <td><?= $tmp_dt ?></td> -->
                      <?php else: ?>
                        <?php $tmp_dt = $j.$i; ?>
                        <!-- <td><?= $tmp_dt ?></td> -->
                      <?php endif; ?>

                      <?php
                      $id_akun = $akun[$k]["akun"];
                      $hasil_akun_ = query("SELECT * FROM rencana_operasional
                                            WHERE akun = $id_akun AND
                                            id_kontrak = $id_kontrak");
                      ?>

                      <?php for ($ii=0; $ii < count($hasil_akun_); $ii++) {
                        $id_kegiatan_ = $hasil_akun_[$ii]["id_kegiatan"];
                        $tgl = query("SELECT * FROM kegiatan WHERE id_kegiatan = $id_kegiatan_")[0]["tgl_mulai"];
                        $tgl = explode("/", $tgl)[1].explode("/", $tgl)[2];
                        // echo $tgl."<br>";
                        if($tmp_dt == $tgl){
                          $jum += $hasil_akun_[$ii]["biaya"];
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
                <?php
                $jum_akun[$k] += $jum_th;
                 ?>
            </tr>

    <?php endfor; ?>

    <tr>
      <td><strong>JUMLAH PENGELUARAN</strong></td>
      <?php $jumm=0; ?>
      <?php for ($ik=1; $ik <= 12; $ik++) : ?>
        <?php if($arr_jum_bwh[$ik] == 0): ?>
          <td>-</td>
        <?php else: ?>
          <td><strong><?= number_format($arr_jum_bwh[$ik]).",-" ?></strong></td>
          <?php $jumm +=  $arr_jum_bwh[$ik]?>
        <?php endif; ?>
      <?php endfor; ?>
      <td><strong><?= number_format($jumm).",-" ?></strong>
      </td>
    </tr>

    <tr>
      <td><strong>MARGIN (minimal 70%)</strong></td>
      <?php for ($ik=1; $ik <= 12; $ik++) : ?>
        <td><strong><?= (($arr_jum_bwh[$ik]/(int)$hasil_kontrak["nilai_kontrak"])*100)." %" ?></strong></td>
      <?php endfor; ?>
    </tr>


</table>
<br><br><br><br><br><br><br><br><br>

<?php endfor; ?>

<table class="table table-dashboard-two mg-b-0">
  <tr>
    <td colspan="2"><strong>TOTAL KESELURUHAN</strong></td>
  </tr>

  <tr>
    <td><strong>PENDAPATAN BLU</strong></td>
    <td><strong>JUMLAH</strong></td>
  </tr>

  <!-- TERMIN -->
  <?php for ($trm=1; $trm <= $hasil_kontrak["termin"]; $trm++) :?>
    <tr>
      <td>Termin <?= "-$trm" ?></td>
      <?php
      $tgl_term1 = query("SELECT * FROM rencana_termin WHERE id_kontrak = $id_kontrak AND termin = $trm")[0];
      ?>
      <td><strong>
        <?= number_format($tgl_term1["jumlah"]).",-" ?></strong></td>


    </tr>
  <?php endfor; ?>


  <!-- AKUN -->
  <tr>
  <td colspan="14"><strong>PENGELUARAN (Maksimal 70%)</strong></td>
  </tr>
  <?php for ($k=0; $k < count($akun); $k++): ?>
    <tr>
      <?php
      $id_akun_  = $akun[$k]["akun"];
      $nama_akun = query("SELECT * FROM akun WHERE id_akun = $id_akun_")[0]["nama_akun"];
      $kode_akun = query("SELECT * FROM akun WHERE id_akun = $id_akun_")[0]["kode"];
      $jum_th    = 0;
        ?>
      <td><?= $nama_akun." ($kode_akun)" ?></td>
      <td><strong>
        <?= number_format($jum_akun[$k]).",-" ?></strong></td>
    </tr>
  <?php endfor; ?>





</table>




<!-- <table>
  <tr>
    <td>2</td>
    <td>3</td>
  </tr>
</table> -->
