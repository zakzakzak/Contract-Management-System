<?php
// require('function.php');
// $baseurl       = base_url()."home";
// $pengajuan     = $_GET["id"];
//
// update_pengajuan($pengajuan);
// echo "
//     <script>
//       alert('Pengajuan diterima');
//       document.location.href = '$baseurl/tata_usaha_keuangan_kontrak';
//     </script>
// ";
?>


<?php
require('function.php');

$hasil_akun     = query("SELECT * FROM akun");
$pengajuan     = $_GET["id"];
$hasil_pengajuan = query("SELECT * FROM pengajuan WHERE id_pengajuan = $pengajuan")[0];

// $hasil_kontrak = query("SELECT * FROM kontrak WHERE nama_kontrak = '$nama_kontrak'");




$baseurl       = base_url()."home";

if (ppk_approve_pengajuan($pengajuan) > 0){

  echo ("
      <script>
        alert('Pengajuan DITERIMA!');
        document.location.href = '$baseurl/ppk_index';
      </script>
  ");
}else{
  echo "
      <script>
        alert('Pengajuan BATAL DITERIMA!');
        document.location.href = '$baseurl/ppk_index';
      </script>
  ";

}

 ?>
