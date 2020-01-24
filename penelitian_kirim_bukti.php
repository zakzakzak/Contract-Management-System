kirim bukti
<?php
require('function.php');
$baseurl       = base_url()."home";
$id_kegiatan = $_GET["id"];
$id_kontrak  = $_GET["id_k"];
kirim_kegiatan_selesai($id_kegiatan);
echo "
    <script>
      // alert('Berhasil dikirim');
      document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
    </script>
";
 ?>

 
