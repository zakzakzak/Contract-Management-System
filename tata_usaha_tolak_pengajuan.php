<?php


$conn = mysqli_connect("localhost", "root", "", "tekmira");
$baseurl       = base_url()."home";

$id_pengajuan     = $_GET["id"];

echo $tgl;

$query = "UPDATE pengajuan2
          SET    status_pengajuan = 2
          WHERE  id_pengajuan = $id_pengajuan";

mysqli_query($conn, $query);

$status = mysqli_affected_rows($conn);

if ($status > 0){

  echo ("
      <script>
        alert('Pengajuan DiTOLAK!');
        document.location.href = '$baseurl/tata_usaha_pengajuan';
      </script>
  ");
}else{
  echo "
      <script>
        alert('Pengajuan GAGAL direalisasikan!');
        document.location.href = '$baseurl/tata_usaha_pengajuan';
      </script>
  ";

}


 ?>
