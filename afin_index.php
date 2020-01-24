<?php session_start();$baseurl = base_url()."home";

if ($_SESSION['bidang']  == 0){
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  $this->load->view('home/afin_header');
  $this->load->view($isi);
  $this->load->view('home/afin_footer');

}else {
  echo "<script>
  alert('Anda Tidak Dapat Memasuki Halaman Ini');
  document.location.href = '$baseurl/';
  </script>";
}
?>
