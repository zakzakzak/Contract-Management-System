<?php
require('function.php');
$baseurl       = base_url()."home";

$id_kontrak = $_GET["id"];
$hasil_kontrak = query("SELECT * FROM kontrak where id_kontrak = $id_kontrak");
$kontrak = $hasil_kontrak[0];

$id_jasa = $kontrak["id_jasa"];
$hasil_jasa = query("SELECT * FROM jasa where id_jasa = $id_jasa");
$jasa = $hasil_jasa[0]["nama_jasa"];

// $id_pic = $kontrak["pic"];
// $hasil_pic = query("SELECT * FROM pegawai2 where id_pegawai = $id_pic");
// $pic = $hasil_pic[0]["nama"];

$hasil_kegiatan = query("SELECT * FROM kegiatan WHERE id_kontrak = $id_kontrak ORDER BY termin");

$hasil_ro = query("SELECT * FROM rencana_operasional WHERE id_kontrak = $id_kontrak");

$hasil_team = query("SELECT * FROM team WHERE id_kontrak = $id_kontrak");

$hasil_pegawai = query("SELECT * FROM pegawai2");

$hasil_pengajuan = query("SELECT id_pengajuan,pengajuan.id_ro,jumlah,status_pengajuan,status_realisasi,tgl_pengajuan,pengajuan.keterangan,akun,pengajuan.jum_real FROM pengajuan INNER JOIN rencana_operasional ON pengajuan.id_ro = rencana_operasional.id_ro WHERE id_kontrak = $id_kontrak");

// $hasil_pengajuan2 = query("SELECT * FROM pengajuan2 WHERE id_kontrak = $id_kontrak");
// var_dump($hasil_pengajuan);


// var_dump(count($hasil_kegiatan));
if(isset($_POST["submit"])){
  if (tambah_masalah($_POST, $id_kontrak) > 0){
    echo "
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }else{
    echo "
        <script>
          alert('data gagal ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }
}


if(isset($_POST["submit11"])){
  if (tambah_progress($_POST, $id_kontrak) > 0){

    echo "
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }else{
    // echo "ok";
    echo "
        <script>
          alert('data gagal ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }
}

if(isset($_POST["submit2"])){
  if (tambah_team($_POST, $id_kontrak) > 0){
    echo "
        <script>
          // alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }else {
    echo "
        <script>
          alert('pegawai sudah ada');
        </script>
    ";
  }
}



if(isset($_POST["submit_prog"])){
  if (tambah_progress($_POST) > 0){
    echo "
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }else{
    // echo "ok";
    echo "
        <script>
          alert('data gagal ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }
}


if(isset($_POST["submit_mslh"])){
  if (tambah_masalah($_POST, $id_kontrak) > 0){
    echo "
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }else{
    // echo "ok";
    echo "
        <script>
          alert('data gagal ditambahkan');
          document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }
}

// if(isset($_POST["doku"])){
//   if (2 > 0){
//     echo "
//         <script>
//           alert('data berhasil ditambahkan');
//           // document.location.href = '$baseurl/penelitian_detail_kontrak?id=$id_kontrak';
//         </script>
//     ";
//   }else {
//     echo "
//         <script>
//           alert('pegawai sudah ada');
//         </script>
//     ";
//   }
// }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Twitter -->
      <meta name="twitter:site" content="@themepixels">
      <meta name="twitter:creator" content="@themepixels">
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Azia">
      <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
      <meta name="twitter:image" content="http://themepixels.me/azia/img/azia-social.png">

      <!-- Facebook -->
      <meta property="og:url" content="http://themepixels.me/azia">
      <meta property="og:title" content="Azia">
      <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

      <meta property="og:image" content="http://themepixels.me/azia/img/azia-social.png">
      <meta property="og:image:secure_url" content="http://themepixels.me/azia/img/azia-social.png">
      <meta property="og:image:type" content="image/png">
      <meta property="og:image:width" content="1200">
      <meta property="og:image:height" content="600">

      <!-- Meta -->
      <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
      <meta name="author" content="ThemePixels">

      <title>Detail Kontrak</title>

      <!-- vendor css -->
      <link href="<?php echo base_url();?>assets/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/typicons.font/typicons.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/select2/css/select2.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/pickerjs/picker.min.css" rel="stylesheet">


      <!-- azia CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/azia.css">
      <style media="screen">
      h6 {
        display: inline;
      }
      </style>


  </head>
  <body>

    <br>

      <div class="container mn-ht-100p">

          <div class="az-profile-overview">
            <table>
              <tr>
                <td rowspan="2"><div class="az-img-user">
                  <img src="https://via.placeholder.com/500" alt="">
                </div></td>
                <td></td>
                <td></td>
                <td>
                <h5 class="az-profile-name"><?= $kontrak["nama_kontrak"] ?></h5>
                <p class="az-profile-name-text">
                 <?php
                 $jasa2 = $kontrak['id_jasa'];
                 $jasa  = query("SELECT * FROM rumah_layanan WHERE id_rumah_layanan =$jasa2")[0];
                 echo $jasa["nama"];
                 ?>
               </p>
               <span>Nilai Kontrak</span>
               <div><strong><h4><?= "Rp. ".number_format($kontrak["nilai_kontrak"]).",-" ?></h4></strong></div>

               </td>
              </tr>
            </table>


             <div class="az-profile-bio">
               <?= $kontrak["keterangan"] ?>
             </div><!-- az-profile-bio -->


             <!-- -+-+______________________________________________________________________________________ -->
             <table class="table mg-b-0">
               <tr>
                 <td><strong>Judul Kontrak</strong></td>
                 <td><strong>:</strong></td>
                 <td><?=$kontrak["nama_kontrak"] ?></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>


               <tr>
                 <td><strong>Jenis Layanan</strong></td>
                 <td><strong>:</strong></td>
                 <td><?php
                $jasa2 = $kontrak['id_jasa'];
                $jasa  = query("SELECT * FROM rumah_layanan WHERE id_rumah_layanan =$jasa2")[0];
                echo $jasa["nama"];
                ?></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>
               <tr>
                 <td><strong>Pejabat Teknis</strong></td>
                 <td><strong>:</strong></td>
                 <td>Slamet</td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>
               <tr>
                 <td><strong>PIC</strong></td>
                 <td><strong>:</strong></td>
                 <td><?php
                  $pic2 = $kontrak['pic'];
                  $pic  = query("SELECT * FROM pegawai2 WHERE id =$pic2")[0];
                  echo $pic["nama"];
                  ?></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>


               <tr>
                 <td><strong>Tanggal Mulai</strong></td>
                 <td><strong>:</strong></td>
                 <td><?= $kontrak["tgl_mulai"]?></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>


               <tr>
                 <td><strong>Tanggal Berakhir</strong></td>
                 <td><strong>:</strong></td>
                 <td><?= $kontrak["tgl_akir"]?></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>



             </table>
             <!-- -+-+______________________________________________________________________________________ -->











             <div class="az-content-body az-content-body-profile">

          <div class="az-profile-body">
            <div class="row">
              <div class="col-md-12 col-xl-12">
                <div class="az-content-label tx-13 mg-b-25">Detail Kegiatan</div>
                <div class="table-responsive">




                  <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">

                    <div class="card">
                      <div class="card-header" role="tab" id="headingFive">
                        <a class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Nilai Termin
                          <!-- <h6 class="tx-white">Rencana Operasional</h6> -->
                        </a>
                      </div>
                      <div id="collapseFive" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingThree">
                        <div class="table-responsive">
                          <table class="table table-striped table-dashboard-two mg-b-0">
                            <thead>
                              <tr>
                                <th class="wd-lg-25p">Termin</th>
                                <th class="wd-lg-25p">Tanggal</th>
                                <th class="wd-lg-25p">Jumlah</th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php if (count(query("SELECT * FROM rencana_termin WHERE id_kontrak = $id_kontrak")) > 0) :?>

                              <?php for ($i=0; $i < $kontrak["termin"]; $i++):?>
                                <tr>
                                  <?php
                                  $trm = $i+1;
                                  $term = query("SELECT * FROM rencana_termin WHERE termin = $trm AND id_kontrak = $id_kontrak")[0];
                                  ?>

                                      <td><?= $trm ?></td>
                                      <td><?= $term["tanggal"]?></td>
                                      <td><?= "Rp.".number_format($term["jumlah"]).",-"?></td>
                                </tr>
                                <?php endfor; ?>
                              <?php else:?>
                                <td colspan ="3">Nilai termin belum di input</td>

                              <?php endif; ?>

                      </tbody>
                    </table>
                    <?php if(count(query("SELECT * FROM rencana_termin WHERE id_kontrak = $id_kontrak"))==0): ?>

                  <?php endif; ?>



                  </div><!-- table-responsive -->

                </div>
              </div><!-- collapse -->
                    <!-- TEAM -->
                    <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                              <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Daftar Anggota
                              </a>
                            </div><!-- card-header -->

                            <div id="collapseOne" data-parent="#accordion" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                              <table class="table table-striped table-dashboard-one mg-b-0">
                                <thead>

                                <tr>
                                  <td>NIP</td>
                                  <td>Nama Pegawai</td>
                                </tr>
                              </thead>
                              <tbody>
                                <?php for ($i=0; $i < count($hasil_team); $i++):?>
                                <tr>
                                  <td><?php
                                  $id_peg = $hasil_team[$i]["id_pegawai"];
                                  $nip = query("SELECT * FROM pegawai2 WHERE id = $id_peg");
                                  echo $nip[0]["nip"];
                                   ?></td>
                                  <td><?= $nip[0]["nama"]; ?></td>
                                </tr>
                              <?php endfor; ?>

                              </tbody>
                              </table>

                              <td colspan="2"><a href="" data-toggle="modal" data-target="#modaldemo2" class="btn btn-danger btn-with-icon btn-block"><i class="typcn typcn-document-add"></i> List Anggota</a></td>
                            </div>
                    </div>


                    <!-- Timeline -->
                    <div class="card">
                      <div class="card-header" role="tab" id="headingTwo">
                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Timeline
                        </a>
                      </div>
                      <div id="collapseTwo" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingTwo">
                        <table class="table table-striped table-dashboard-two mg-b-0">
                          <thead>
                            <tr>
                              <th class="wd-lg-25p">Nama Kegiatan</th>
                              <th class="wd-lg-25p">Termin</th>
                              <th class="wd-lg-25p">Status</th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php if(count($hasil_kegiatan) == 0): ?>
                              <tr>
                                <td colspan="5">Belum ada kegiatan</td>
                              </tr>
                            <?php else : ?>

                              <?php for ($i=0; $i < count($hasil_kegiatan); $i++) :?>
                                <tr>


                                  <td>
                                    <strong><?= $hasil_kegiatan[$i]["nama_kegiatan"] ?></strong>
                                    <br/><?= $hasil_kegiatan[$i]["tgl_mulai"]." s/d ".$hasil_kegiatan[$i]["tgl_akhir"] ?>
                                  </td>
                                  <td>
                                    <?= $hasil_kegiatan[$i]["termin"] ?>
                                  </td>

                                  <?php if($hasil_kegiatan[$i]["bukti"] == 0): ?>
                                    <td class="tx-medium tx-success">On Progress</td>
                                    <td><center><a href="<?php
                                    $id_keg = $hasil_kegiatan[$i]["id_kegiatan"];
                                    echo base_url().'home/penelitian_kirim_bukti?id='.$id_keg.'&id_k='.$id_kontrak;?>" class="btn btn-info btn-with-icon btn-block rounded-5 btn-secondary" data-toggle="tooltip-primary" data-placement="top" title="Upload Dokumen"><i class="fas fa-exclamation-triangle"></i></a></td>
                                  <?php elseif($hasil_kegiatan[$i]["bukti"] == 1):?>
                                    <td class="tx-medium tx-warning">Menunggu konfirmasi Bagian Program</td>
                                    <td></td>
                                  <?php elseif($hasil_kegiatan[$i]["bukti"] == 3):?>
                                    <td class="tx-medium tx-danger">Bukti ditolak</td>
                                    <td><center><a href="<?php
                                    $id_keg = $hasil_kegiatan[$i]["id_kegiatan"];
                                    echo base_url().'home/penelitian_kirim_bukti?id='.$id_keg.'&id_k='.$id_kontrak;?>" class="btn btn-info btn-with-icon btn-block rounded-5 btn-secondary" data-toggle="tooltip-primary" data-placement="top" title="Kirim Bukti Baru"><i class="fas fa-exclamation-triangle"></i></a></td>
                                  <?php else:?>
                                    <td class="tx-medium tx-info">Done</td>
                                    <td></td>
                                  <?php endif; ?>

                                  <!-- <td><center><a href<?php
                                  //$id_keg = $hasil_kegiatan[$i]["id_kegiatan"];
                                  //echo base_url().'home/penelitian_kirim_bukti?id='.$id_keg.'&id_k='.$id_kontrak;?>" class="btn btn-success btn-with-icon btn-block">Input Dokumen</a></center></td> -->

                                  <?php
                                  $id_keg = $hasil_kegiatan[$i]["id_kegiatan"];?>

                                  <!-- PROGRESS -->
                                  <!-- <td ><a href="" data-toggle="modal" data-target="#modaldemoo<?=$i?>" class="btn btn-danger btn-with-icon btn-block"> Input progress</a></td> -->

                                  <td ><a href="<?= base_url()."home/penelitian_input_progress?id=$id_keg&id_k=$id_kontrak" ;?>" class="btn btn-success btn-with-icon btn-block rounded-5 btn-secondary" data-toggle="tooltip-primary" data-placement="top" title="Input Progress"><i class="fas fa-cog"></i></a></td>
                                  <td ><a href="" data-toggle="modal" data-target="#modaldemooo<?=$i?>" class="btn btn-danger btn-with-icon btn-block rounded-5 btn-secondary" data-toggle="tooltip-primary" data-placement="top" title="Input Kendala"><i class="fas fa-exclamation-triangle"></i></a></td>




                                </tr>
                              <?php endfor; ?>
                            <?php endif; ?>
                            <tr>
                              <!-- <td colspan="2"><a href="<?= base_url()."home/penelitian_input_kegiatan?id=".$id_kontrak ;?>" class="btn btn-success btn-with-icon btn-block"><i class="far fa-file-alt"></i> Tambah kegiatan</a></td> -->
                              <!-- <td colspan="3"><a href="" data-toggle="modal" data-target="#modaldemo1" class="btn btn-danger btn-with-icon btn-block"><i class="typcn typcn-document-add"></i> Input Kendala</a></td>
                              <td colspan="4"><a href="" data-toggle="modal" data-target="#modaldemo11" class="btn btn-success btn-with-icon btn-block"><i class="typcn typcn-document-add"></i> Input Progress</a></td> -->

                            </tr>
                            <tr>
                              <td colspan="8"><a href="<?= base_url()."home/penelitian_gantt?id=".$id_kontrak ;?>" class="btn btn-success btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> View Gantt Chart</a></td>
                            </tr>

                          </tbody>
                        </table>
                        <!-- <a href="" data-toggle="modal" data-target="#modaldemo2" class="btn btn-info btn-with-icon btn-block"><i class="typcn typcn-document-add"></i> Tambah kegiatan</a> -->
                      </div>







                <!-- RO -->
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree">
                                                                  <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    Rencana Operasional
                                                                    <!-- <h6 class="tx-white">Rencana Operasional</h6> -->
                                                                  </a>
                                                                </div>
                                                                <div id="collapseThree" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="table-responsive">
                                                                    <table class="table table-striped table-dashboard-two mg-b-0">
                                                                      <thead>
                                                                        <tr>
                                                                          <th class="wd-lg-25p">Kode Akun</th>
                                                                          <th class="wd-lg-25p">Pagu</th>
                                                                          <th class="wd-lg-25p">Pengajuan</th>
                                                                          <th class="wd-lg-25p">Realisasi</th>
                                                                          <th class="wd-lg-25p">Saldo</th>
                                                                        </tr>
                                                                      </thead>

                                                                      <tbody>
                                                                        <?php $total = 0; $total_r = 0; ?>
                                                                        <?php if (count($hasil_ro) == 0) :?>
                                                                          <tr>
                                                                            <td colspan="5">Belum ada Rencana Operasional</td>
                                                                          </tr>
                                                                        <?php else: ?>
                                                                          <?php $total = 0; $total_r = 0; $total_p = 0; $total_s = 0 ?>
                                                                          <?php for ($i=0; $i < count($hasil_ro); $i++) :?>
                                                                            <tr>
                                                                                <td>
                                                                                  <strong><?php
                                                                                  $hasil_ro2 = $hasil_ro[$i]["akun"];
                                                                                  $hasil_ro3 = query("SELECT * FROM akun WHERE id_akun = $hasil_ro2")[0];
                                                                                  $id_keg_   = $hasil_ro[$i]["id_kegiatan"] ;
                                                                                  $nama_keg_ = query("SELECT * FROM kegiatan WHERE id_kegiatan = $id_keg_")[0]["nama_kegiatan"];
                                                                                  // var_dump($hasil_ro3);
                                                                                  echo "$nama_keg_ - " ;
                                                                                  ?></strong><?=$hasil_ro3["nama_akun"] ; ?>
                                                                                </td>
                                                                                <!--  -->
                                                                                <?php $total += $hasil_ro[$i]["biaya"]?>
                                                                                <td class="tx-medium"><?= "Rp. ".number_format($hasil_ro[$i]["biaya"]).",-" ?></td>

                                                                                <!--  -->
                                                                                <?php
                                                                                $id_ro_ = $hasil_ro[$i]["id_ro"];
                                                                                $jum_peng = query("SELECT sum(jumlah) FROM pengajuan WHERE id_ro = $id_ro_ ")[0]["sum(jumlah)"];
                                                                                if($jum_peng == null){
                                                                                  $jum_peng = 0;
                                                                                }
                                                                                ?>
                                                                                <?php $total_p+= $jum_peng?>
                                                                                <td class="tx-medium tx-danger"><?= "Rp. ".number_format($jum_peng).",-" ?></td>

                                                                                <!--  -->
                                                                                <?php
                                                                                $id_ro_ = $hasil_ro[$i]["id_ro"];
                                                                                $jum_real = query("SELECT sum(jum_real) FROM pengajuan WHERE id_ro = $id_ro_ AND status_realisasi=1")[0]["sum(jum_real)"];
                                                                                if($jum_real == null){
                                                                                  $jum_real = 0;
                                                                                }
                                                                                ?>
                                                                                <?php $total_r+= $jum_real?>
                                                                                 <td class="tx-medium tx-success"><?= "Rp. ".number_format($jum_real).",-" ?></td>

                                                                                 <!--  -->
                                                                                <?php
                                                                                $saldo = $hasil_ro[$i]["biaya"] - $jum_real;
                                                                                $total_s+= $saldo;
                                                                                 ?>
                                                                                <td class="tx-medium tx-success"><?= "Rp. ".number_format($saldo).",-" ?></td>

                                                                              </tr>
                                                                            <?php endfor; ?>
                                                                            <tr>
                                                                              <td>
                                                                                <strong>TOTAL</strong>
                                                                              </td>
                                                                              <td class="tx-medium"><strong><?= 'Rp. '.number_format($total).',-' ?></strong></td>
                                                                              <td class="tx-medium tx-danger"><strong><?= 'Rp. '.number_format($total_p).',-' ?></strong></td>
                                                                              <td class="tx-medium tx-success"><strong><?= 'Rp. '.number_format($total_r).',-' ?></strong></td>
                                                                              <td class="tx-medium tx-warning"><strong><?= 'Rp. '.number_format($total_s).',-' ?></strong></td>

                                                                            </tr>
                                                                          <?php endif; ?>

                                                                          <!-- <tr>
                                                                          <td>
                                                                          <strong>525121 Belanja Barang untuk Persediaan Barang Konsumsi</strong>
                                                                        </td>
                                                                        <td class="tx-medium">Rp. 4.500.000,-</td>
                                                                        <td class="tx-medium tx-danger">Rp. 600.000,-</td>
                                                                      </tr>

                                                                      <tr>
                                                                      <td>
                                                                      <strong>525115 Belanja Perjalanan Biasa</strong>
                                                                    </td>
                                                                    <td class="tx-medium">Rp. 54.500.000,-</td>
                                                                    <td class="tx-medium tx-success">Rp. 11.500.000,-</td>
                                                                  </tr> -->



                                                                </tbody>
                                                              </table>
                                                              <!-- <a href="<?= base_url()."home/penelitian_input_ro?id=".$id_kontrak ;?>" class="btn btn-success btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Rencana Operasional</a> -->
                                                              <br>
                                                                <?php
                                                                $nilai = $kontrak["nilai_kontrak"];
                                                                $persen = ($total/$nilai)*100;
                                                                $persen2 = (int)($persen - ($persen % 5));
                                                                $persen = number_format($persen, 2, '.', '');
                                                                if ($total > 0) {
                                                                  // code...
                                                                }
                                                                // echo '<h6>Biaya yang sudah digunakan sebesar : </h6><strong><h6 class="tx-info">'.$persen."</h6></strong>% dari nilai kontrak" ;

                                                                 ?>

                                                                 <?php
                                                                 $sisa2 = 70 - $persen;
                                                                 $sisa3 = 70 - (($total/$nilai)*100);
                                                                 $sisa  = "Rp.".number_format($nilai*($sisa3/100)).",-";
                                                                 ?>

                                                                 <?= "Margin : Rp.".number_format($kontrak["nilai_kontrak"] - $total) ?>
                                                                 <?php if ($persen > 60) : ?>
                                                                   <?= '<br><br>*Pagu Operasional sebesar : <strong><h6 class="tx-danger">'.$persen."%</h6></strong> </h6>dari nilai kontrak</h6>" ?>
                                                                   <?= "<br>Pagu - pengajuan : Rp.".number_format($total - $total_p) ?>
                                                                   <?= "<br>Pagu - realisasi : Rp.".number_format($total - $total_r) ?>
                                                                   <?= "<br>Pengajuan - realisasi : Rp.".number_format($total_p - $total_r) ?>
                                                                   <?= "<br>Sisa Yang dapat digunakan : <strong><h6 class='tx-danger'>$sisa2 %</h6></strong> % ( <strong>$sisa</strong> )" ?>
                                                                     <div class="progress">
                                                                      <div class="progress-bar progress-bar-lg bg-danger wd-<?=$persen2?>p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                  <?php elseif ($persen > 40) :?>
                                                                    <?= '*Pagu Operasional sebesar : <strong><h6 class="tx-warning">'.$persen."%</h6></strong> </h6>dari nilai kontrak</h6>" ?>
                                                                    <?= "<br>Pagu - pengajuan : Rp.".number_format($total - $total_p) ?>
                                                                    <?= "<br>Pagu - realisasi : Rp.".number_format($total - $total_r) ?>
                                                                    <?= "<br>Pengajuan - realisasi : Rp.".number_format($total_p - $total_r) ?>
                                                                    <?= "<br>Sisa Yang dapat digunakan : <strong><h6 class='tx-warning'>$sisa2 %</h6></strong> % ( <strong>$sisa</strong> )" ?>
                                                                    <div class="progress">
                                                                     <div class="progress-bar progress-bar-lg bg-warning wd-<?=$persen2?>p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                   </div>
                                                                 <?php else : ?>
                                                                   <?= '*Pagu Operasional sebesar : <strong><h6 class="tx-info">'.$persen."%</h6></strong> </h6>dari nilai kontrak</h6>" ?>
                                                                   <?= "<br>Pagu - pengajuan : Rp.".number_format($total - $total_p) ?>
                                                                   <?= "<br>Pagu - realisasi : Rp.".number_format($total - $total_r) ?>
                                                                   <?= "<br>Pengajuan - realisasi : Rp.".number_format($total_p - $total_r) ?>
                                                                   <?= "<br>Sisa Yang dapat digunakan : <strong><h6 class='tx-info'>$sisa2 %</h6></strong> % ( <strong>$sisa</strong> )" ?>
                                                                   <div class="progress">
                                                                    <div class="progress-bar progress-bar-lg bg-info wd-<?=$persen2?>p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                  </div>
                                                                <?php endif; ?>


                                                            </div><!-- table-responsive -->
                                                          </div>


                </div><!-- collapse -->
                <!-- PENGAJUAN -->
                <div class="card">
                          <div class="card-header" role="tab" id="headingFour">
                            <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                              Pengajuan biaya
                            </a>
                          </div>
                          <div id="collapseFour" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingThree">
                            <div class="table-responsive">
                              <table class="table table-striped table-dashboard-two mg-b-0">
                                <thead>
                                  <tr>
                                    <th class="wd-lg-25p">Akun</th>
                                    <th class="wd-lg-25p">Keterangan</th>
                                    <th class="wd-lg-25p">Jumlah</th>
                                    <th class="wd-lg-25p">Tanggal</th>
                                    <th class="wd-lg-25p">Status realisasi</th>
                                    <th class="wd-lg-25p">Aksi</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php for ($i=0; $i < count($hasil_pengajuan); $i++) :?>
                                  <tr>
                                    <td><?php $akun_ = $hasil_pengajuan[$i]["akun"]; $akun_ = query("SELECT * FROM akun WHERE id_akun = $akun_")[0]["nama_akun"]; echo $akun_;?></td>
                                    <?php
                                    $kode = $hasil_pengajuan[$i]["akun"];  $kode = query("SELECT * FROM akun WHERE id_akun = $kode")[0]["kode"];
                                    $kode2 = $hasil_pengajuan[$i]["akun"];  $kode2 = query("SELECT * FROM akun WHERE id_akun = $kode2")[0]["id_akun"];
                                     ?>
                                    <td><?= $hasil_pengajuan[$i]["keterangan"] ?></td>
                                    <td><?= "Rp.".number_format($hasil_pengajuan[$i]["jumlah"]).",-" ?></td>
                                    <td><?= explode(" ",$hasil_pengajuan[$i]["tgl_pengajuan"])[0]  ?></td>

                                    <td><?php
                                     $stat = $hasil_pengajuan[$i]["status_realisasi"];
                                     if ($stat == 1) {
                                       echo '<h6 class="tx-warning">Menunggu persetujuan PPK<h6><td></td>';
                                       ?>

                                       <?php
                                     }elseif ($stat == 0) {
                                       echo '<h6 class="tx-warning">Menunggu persetujuan PPK<h6><td></td>';
                                       // jika fungsi selsai jadi, line bawah aktifkan atas komen
                                       // echo '<h6 class="tx-info"> Data Belum Selesai Diinput';
                                       echo '<h6><td></td>';
                                       // echo "<td></td>";

                                     }elseif ($stat == 4) {
                                       echo '<h6 class="tx-danger">Ditolak<h6>';
                                       ?>
                                       <td></td>


                                       <?php
                                     }elseif ($stat == 3) {
                                       $real = $hasil_pengajuan[$i]["jum_real"];
                                       echo '<h6 class="tx-success">Sudah direalisasi sebesar ';
                                       echo "Rp.".number_format($real).",-";
                                       echo '<h6>';

                                       ?>
                                       <td></td>
                                       <?php
                                     }elseif ($stat == 2) {
                                       echo '<h6 class="tx-info"> Sudah disetujui PPK, menunggu realisasi Bendahara';
                                       // echo "Rp.".number_format($real).",-";
                                       echo '<h6><td></td>';
                                     }?>
                                   </td>

                                    <!-- FORM -->
                                    <?php $id_pengajuan = $hasil_pengajuan[$i]["id_pengajuan"] ?>
                                    <td><?=$kode ?></td>

                                    <!-- JASA PERJAM -->
                                    <?php if ($kode2 == 8) : ?>
                                      <td><a href="<?= base_url()."home/penelitian_view_form_perjam?id_p=".$id_pengajuan."&id_k=".$id_kontrak ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"> Lihat Form</a></td>

                                    <!-- JASA PERHARI -->
                                    <?php elseif ($kode2 == 7) : ?>
                                      <td><a href="<?= base_url()."home/penelitian_view_form_perhari?id_p=".$id_pengajuan."&id_k=".$id_kontrak ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"> Lihat Form</a></td>

                                    <!-- Beban PERJALANAN -->
                                    <?php elseif ($kode == 525115) : ?>
                                      <td><a href="<?= base_url()."home/penelitian_view_form_perjalanan?id_p=".$id_pengajuan."&id_k=".$id_kontrak ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"> Lihat Form</a></td>

                                    <!-- Belanja Modal PERALATAN-->
                                    <?php elseif ($kode == 537112) : ?>
                                      <td><a href="<?= base_url()."home/penelitian_view_form_modal?id_p=".$id_pengajuan."&id_k=".$id_kontrak ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"> Lihat Form</a></td>

                                    <!-- Beban BARANG -->
                                    <?php elseif ($kode == 525112) : ?>
                                      <td><a href="<?= base_url()."home/penelitian_view_form_barang?id_p=".$id_pengajuan."&id_k=".$id_kontrak ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"> Lihat Form</a></td>


                                    <!-- Belanja BARANG KONSUMSI -->
                                    <?php elseif ($kode == 525121) : ?>
                                      <td><a href="<?= base_url()."home/penelitian_view_form_konsumsi?id_p=".$id_pengajuan."&id_k=".$id_kontrak ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"> Lihat Form</a></td>

                                    <?php else: ?>
                                      <td></td>

                                    <?php endif; ?>

                                    <!-- KONFIrMASI SELESAI/ *bersama EDIT -->
                                    <?php if ($stat == 0) : ?>

                                      <?php if ($kode = 525115 || $kode = 537112 ||$kode = 525112 ||$kode = 525121 ) :?>
                                        <!-- <td><a href="<?= base_url()."home/penelitian_cek_selesai_form?kode=$kode" ?>" class="btn btn-info btn-with-icon btn-block rounded-5"> Selesai</a></td> -->
                                      <?php elseif ($kode2 = 7 || $kode2 = 8): ?>
                                        <!-- <td><a href="<?= base_url()."home/penelitian_cek_selesai_form?kode=$kode2" ?>" class="btn btn-info btn-with-icon btn-block rounded-5"> Selesai</a></td> -->
                                      <?php endif; ?>

                                      <td></td>
                                      <!-- sebelum di ganti status, lihat form dulu -->
                                      <td><a href="#" class="btn btn-info btn-with-icon btn-block rounded-5"> Edit</a></td>
                                      <td><a href="#" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i>  Hapus</a></td>
                                    <?php elseif ($stat == 1) :?>
                                      <td></td>
                                      <td></td>
                                      <td><a href="#" class="btn btn-danger btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Hapus</a></td>
                                    <?php else: ?>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    <?php endif; ?>







                                  </tr>
                                <?php endfor; ?>

                          </tbody>
                        </table>
                        <a href="<?= base_url()."home/penelitian_input_pengajuan?id=".$id_kontrak ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Tambah Pengajuan Biaya ke PPK</a>





                      </div><!-- table-responsive -->

                    </div>
                </div><!-- collapse -->
              </div><!-- card -->
            </div><!-- accordion -->
          </div><!-- table-responsive -->
        </div><!-- col -->
      </div><!-- row -->
      <div class="mg-b-20"></div>

    </div><!-- az-profile-body -->
  </div><!-- az-content-body -->
</div><!-- container -->

<div id="modaldemo3" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Upload Dokumen Pendukung</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="" method="post">

      <div class="modal-body">
        <div class="form-group">
          <div class="row row-sm">
            <div class="col-sm-12">
              <label class="az-content-label tx-11 tx-medium tx-gray-600">Status</label>
              <div class="row row-sm">
                <div class="col-sm-12">
                  <input type="file">
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- form-group -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-indigo" name="doku">Simpan</button>
        <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
      </div>
    </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="modaldemo1"  class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <form class="" action="" method="post">

    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Masalah Kegiatan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <label class="az-content-label tx-11 tx-medium tx-gray-600">Kegiatan</label>
        <select class="form-control" width = "400" name= "id_kegiatan">
          <?php for ($i=0; $i < count($hasil_kegiatan); $i++) : ?>
            <option value="<?= $hasil_kegiatan[$i]["id_kegiatan"] ?>"><?= $hasil_kegiatan[$i]["nama_kegiatan"] ?></option>
          <?php endfor; ?>
        </select>




        <div class="form-group">
          <div class="row row-sm">
            <div class="col-sm-12">
              <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
              <div class="row row-sm">
                <div class="col-sm-12">
                  <textarea rows="5" class="form-control" placeholder="Tuliskan Masalah" name="masalah"></textarea>
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- form-group -->

      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" name = "submit">Simpan</button>
        <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
      </div>
    </div>
  </form>
  </div><!-- modal-dialog -->
</div><!-- modal -->
<div id="modaldemo11" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <form class="" action="" method="post">

    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Masalah Kegiatan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="az-content-label tx-11 tx-medium tx-gray-600">Kegiatan</label>
        <select class="form-control" width = "400" name= "id_kegiatan">
          <?php for ($i=0; $i < count($hasil_kegiatan); $i++) : ?>
            <option value="<?= $hasil_kegiatan[$i]["id_kegiatan"] ?>"><?= $hasil_kegiatan[$i]["nama_kegiatan"] ?></option>
          <?php endfor; ?>
        </select>


        <div class="form-group">
          <div class="row row-sm">
            <div class="col-sm-12">
              <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
              <div class="row row-sm">
                <div class="col-sm-12">
                  <textarea rows="5" class="form-control" placeholder="Tuliskan Masalah" name="keterangan"></textarea>
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- form-group -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" name = "submit11">Simpan</button>
        <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
      </div>
    </div>
  </form>
  </div><!-- modal-dialog -->
</div><!-- modal -->
<div id="modaldemo2"  class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <form class="" action="" method="post">

    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Tambah Anggota</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="az-content-label tx-11 tx-medium tx-gray-600">Pilih Anggota</label>
        <select class="form-control" multiple="multiple" name = "id_pegawai">
          <?php for ($i=0; $i < count($hasil_pegawai); $i++) : ?>
            <option value="<?= $hasil_pegawai[$i]["id"] ?>"><?= $hasil_pegawai[$i]["nama"] ?></option>
          <?php endfor; ?>
        </select>


      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" name = "submit2">Simpan</button>
        <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
      </div>
    </div>
  </form>
  </div><!-- modal-dialog -->
</div><!-- modal -->







<?php for ($ii=0; $ii < count($hasil_kegiatan); $ii++) :?>
  <div id="modaldemoo<?=$ii?>"  class="modal">
    <div class="modal-dialog modal-lg" role="document">
      <form class="" action="" method="post">

        <div class="modal-content modal-content-demo">

          <div class="modal-header">
            <h6 class="modal-title">Input Progress</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <div class="modal-body">
            <label class="az-content-label tx-11 tx-medium tx-gray-600">Kegiatan</label>
            <?php
            $id_kegiatan = $hasil_kegiatan[$ii]["id_kegiatan"];
            $nama_kegiatan = query("SELECT * FROM Kegiatan WHERE id_kegiatan = $id_kegiatan")[0]["nama_kegiatan"];
             ?>
            <input type="text" class="form-control" name="kegiatan_prog" value="" placeholder="<?= $nama_kegiatan ?>" readonly>



            <div class="form-group">
              <div class="row row-sm">
                <div class="col-sm-12">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
                  <div class="row row-sm">
                    <div class="col-sm-12">
                      <textarea rows="5" class="form-control" placeholder="Masukkan Progress Hari ini" name="keterangan_prog"></textarea>
                    </div><!-- col -->
                  </div><!-- row -->
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- form-group -->
          </div><!-- modal-body -->

          <div class="modal-footer">
            <button type="submit" class="btn btn-info" name = "submit_prog">Simpan</button>
            <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
          </div>

        </div>

      </form>
    </div><!-- modal-dialog -->
  </div><!-- modal -->

<?php endfor; ?>



<?php for ($ia=0; $ia < count($hasil_kegiatan); $ia++) :?>
  <div id="modaldemooo<?=$ia?>"  class="modal">
    <div class="modal-dialog modal-lg" role="document">
      <form class="" action="" method="post">

        <div class="modal-content modal-content-demo">

          <div class="modal-header">
            <h6 class="modal-title">Input Kendala</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <label class="az-content-label tx-11 tx-medium tx-gray-600">Kegiatan</label>
            <?php
            $id_kegiatan = $hasil_kegiatan[$ia]["id_kegiatan"];
            $nama_kegiatan = query("SELECT * FROM Kegiatan WHERE id_kegiatan = $id_kegiatan")[0]["nama_kegiatan"];
             ?>
            <input type="text" class="form-control" name="kegiatan_mslh" value="" placeholder="<?= $nama_kegiatan ?>" readonly>

            <input type="hidden" name="id_kegiatan" value="<?=$id_kegiatan?>">

            <div class="form-group">
              <div class="row row-sm">
                <div class="col-sm-12">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
                  <div class="row row-sm">
                    <div class="col-sm-12">
                      <textarea rows="5" class="form-control" placeholder="Tuliskan Masalah" name="keterangan_mslh"></textarea>
                    </div><!-- col -->
                  </div><!-- row -->
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- form-group -->
          </div><!-- modal-body -->

          <div class="modal-footer">
            <button type="submit" class="btn btn-info" name = "submit_mslh">Kirim</button>
            <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
          </div>

        </div>

      </form>
    </div><!-- modal-dialog -->
  </div><!-- modal -->

<?php endfor; ?>



  </body>
</html>
