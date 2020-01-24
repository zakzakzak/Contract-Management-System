<?php


$conn = mysqli_connect("localhost", "root", "", "tekmira");
$baseurl       = base_url()."home";

$id_pengajuan     = $_GET["id"];

echo $tgl;

$query = "UPDATE pengajuan
          SET    status_realisasi = 4
          WHERE  id_pengajuan = $id_pengajuan";

mysqli_query($conn, $query);

$status = mysqli_affected_rows($conn);

if ($status > 0){

  echo ("
      <script>
        alert('Pengajuan DiTOLAK!');
        document.location.href = '$baseurl/ppk_index';
      </script>
  ");
}else{
  echo "
      <script>
        alert('Pengajuan GAGAL DITOLAK!');
        document.location.href = '$baseurl/ppk_index';
      </script>
  ";

}


 ?>
