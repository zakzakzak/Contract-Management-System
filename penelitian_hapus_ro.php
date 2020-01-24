<?php
require('function.php');
$baseurl       = base_url()."home";
$id_ro         = $_GET["id"];
$id_kontrak    = $_GET["id_k"];
hapus_ro($id_ro);
echo "
    <script>
      alert('Akun berhasil dihapus');
      document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
    </script>
";

?>
