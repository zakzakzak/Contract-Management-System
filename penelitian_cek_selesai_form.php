<?php
$id_pengajuan = $_GET["id_p"];
$akun = $_GET["kode"];

// PERHARI
if ($akun == 7) {
  $hasil = query("SELECT * FROM detail_perhari WHERE id_pengajuan = $id_pengajuan");
  $jum = 0;
  for ($i=0; $i < count($hasil); $i++) {
    $id_nama = $hasil[$i]["id_nama"];
    $hasil_tanggal = query("SELECT * FROM detail_perhari_tgl WHERE id_nama = $id_nama");
    $jum += count($hasil_tanggal);
  }
}

// PERJAM
if ($akun == 8) {

}

// PERJALANAN
if ($akun == 525115) {

}

// Modal PERALATAN
if ($akun == 537112) {

}

// BARANG
if ($akun == 525112) {

}

// BARANG KONSUMSI
if ($akun == 525121) {

}
 ?>
