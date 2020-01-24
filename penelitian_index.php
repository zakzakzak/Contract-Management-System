<?php session_start();$baseurl = base_url()."home";

if ($_SESSION['bidang']  == 2){
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  $this->load->view('home/penelitian_header');
  $this->load->view($isi);
  $this->load->view('home/penelitian_footer');
}else {
  echo "<script>
  alert('Anda Tidak Dapat Memasuki Halaman Ini');
  document.location.href = '$baseurl/';
  </script>";
}
?>
