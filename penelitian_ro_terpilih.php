<?php
require('function.php');
$id_ro             = $_GET["id_ro"];
$id_pengajuan_umum = $_GET["id_pengajuan_umum"];
$baseurl       = base_url()."home";

$hasil_pengajuan_ummum = query("SELECT * FROM pengajuan2 WHERE id_pengajuan = $id_pengajuan_umum")[0];
$data["keterangan"] = $hasil_pengajuan_ummum["keterangan"];
$data["biaya"] = $hasil_pengajuan_ummum["jumlah"];
$data["tgl_pengajuan"] = $hasil_pengajuan_ummum["tgl_pengajuan"];
$data["id_ro"] = $id_ro;

echo $data["keterangan"];
echo $data["biaya"];
echo $data["id_ro"];

// ganti status menjadi 3 di pengajuan2 (umum)
$conn = mysqli_connect("localhost", "root", "", "tekmira");

$query = "UPDATE pengajuan2
          SET    status_pengajuan = 3
          WHERE  id_pengajuan = $id_pengajuan_umum";

mysqli_query($conn, $query);

if( mysqli_affected_rows($conn) > 0){
  if(tambah_pengajuan($data) > 0 ){
    echo "
        <script>
          alert('BERHASIL');
          document.location.href = '$baseurl/penelitian_pengajuan_tu';
        </script>
    ";
  }
  else{
    echo "
        <script>
          alert('GAGAL');
          document.location.href = '$baseurl/penelitian_pengajuan_tu';
        </script>
    ";
  }
}else {
  echo "
      <script>
        alert('GAGAL');
        document.location.href = '$baseurl/penelitian_pengajuan_tu';
      </script>
  ";
}




 ?>
