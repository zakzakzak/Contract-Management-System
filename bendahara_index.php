<?php session_start();$baseurl = base_url()."home"; ?>
<?php if ($_SESSION['bidang']  == 6){

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('home/bendahara_header');
$this->load->view($isi);
$this->load->view('home/bendahara_footer');

}else {
  echo "<script>
  alert('Anda Tidak Dapat Memasuki Halaman Ini');
  document.location.href = '$baseurl/';
  </script>";
}
?>
