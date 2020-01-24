

<?php
require("function.php");
$_POST["isii"] = 0;

$id_kontrak = $_GET["id"];
$kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];
$list_kegiatan = query("SELECT * FROM kegiatan WHERE id_kontrak = $id_kontrak ORDER BY termin");

if(isset($_POST["submit"])){
  tamba($_POST["isii"]);
}

 ?>



<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130582519-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-130582519-1');
    </script>

    <!-- Required meta tags -->
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

    <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

    <!-- vendor css -->
    <link href="<?=base_url() ?>assets/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/lib/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/lib/pickerjs/picker.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/azia.css">

  </head>
  <body>


    <?php
  $mulai_waktu = 24*60*60*3;

  $mulai1     = explode("/",$kontrak["tgl_mulai"])[0];
  $mulai2     = explode("/",$kontrak["tgl_mulai"])[1];
  $mulai3     = explode("/",$kontrak["tgl_mulai"])[2];
  $akhir1     = explode("/",$kontrak["tgl_akir"] )[0];
  $akhir2     = explode("/",$kontrak["tgl_akir"] )[1];
  $akhir3     = explode("/",$kontrak["tgl_akir"] )[2];

  // $akhir_kontrak     = strtotime($kontrak["tgl_akir"]);


  $mulai_kontrak     = strtotime($mulai2."/".$mulai1."/".$mulai3);
  $akhir_kontrak     = strtotime($akhir2."/".$akhir1."/".$akhir3);

  // echo $mulai_kontrak;
  // echo $akhir_kontrak;

  $array_kegiatan_mulai    = array();
  $array_kegiatan_akhir    = array();

  for ($i=0; $i < count($list_kegiatan); $i++) {
    $mulai1_     = explode("/",$list_kegiatan[$i]["tgl_mulai"])[0];
    $mulai2_     = explode("/",$list_kegiatan[$i]["tgl_mulai"])[1];
    $mulai3_     = explode("/",$list_kegiatan[$i]["tgl_mulai"])[2];

    $akhir1_     = explode("/",$list_kegiatan[$i]["tgl_akhir"])[0];
    $akhir2_     = explode("/",$list_kegiatan[$i]["tgl_akhir"])[1];
    $akhir3_     = explode("/",$list_kegiatan[$i]["tgl_akhir"])[2];
    array_push($array_kegiatan_mulai, strtotime($mulai2_."/".$mulai1_."/".$mulai3_));
    array_push($array_kegiatan_akhir, strtotime($akhir2_."/".$akhir1_."/".$akhir3_));
  }


  // $mulai_kegiatan1   = strtotime("10/20/2019");
  // $akhir_kegiatan1   = strtotime("11/10/2019");

  // $mulai_kegiatan2   = strtotime("10/30/2019");
  // $akhir_kegiatan2   = strtotime("11/30/2019");


  // cari dulu jumlah minggu keberapa
  $jum_mulai        = floor(($mulai_kontrak-$mulai_waktu)/(24*60*60*7));
  $jum_akhir        = floor(($akhir_kontrak-$mulai_waktu)/(24*60*60*7));



  // var_dump($kontrak["tgl_akir"]);

  $array_jum_mulai   = array();
  $array_jum_akhir    = array();

  for ($i=0; $i < count($list_kegiatan); $i++) {
    array_push($array_jum_mulai, floor(($array_kegiatan_mulai[$i]-$mulai_waktu)/(24*60*60*7)));
    array_push($array_jum_akhir, floor(($array_kegiatan_akhir[$i]-$mulai_waktu)/(24*60*60*7)));
    // echo "<br>"."ok";
    // print_r($array_kegiatan_akhir[$i]);
    // echo "<br>";
  }



  //
  // $jum_mulai_k1     = floor(($mulai_kegiatan1-$mulai_waktu)/(24*60*60*7));
  // $jum_akhir_k1     = floor(($akhir_kegiatan1-$mulai_waktu)/(24*60*60*7));
  //
  // $jum_mulai_k2     = floor(($mulai_kegiatan2-$mulai_waktu)/(24*60*60*7));
  // $jum_akhir_k2     = floor(($akhir_kegiatan2-$mulai_waktu)/(24*60*60*7));

  // kurangin minggu

  $jum_week_kontrak = $jum_akhir - $jum_mulai;

  $array_jum_week = array();

  for ($i=0; $i < count($list_kegiatan); $i++) {
    array_push($array_jum_week, $array_jum_akhir[$i] - $array_jum_mulai[$i]);
  }





  //-------------------------------------------------------
  $arr_prog = array();
  for ($i=0; $i < count($list_kegiatan); $i++) {
    array_push($arr_prog, array());
    $id_kegiatan = $list_kegiatan[$i]["id_kegiatan"];
    // var_dump($list_kegiatan);
    // echo "<br>".$i."<br>";
    $list_prog   = query("SELECT * FROM realisasi_kegiatan WHERE id_kegiatan = $id_kegiatan");
    // echo "<br>".count($list_prog)."<br>";

    $array_prog  = array();
    for ($ii=0; $ii < count($list_prog); $ii++) {
      $tgl1_     = explode("/",$list_prog[$ii]["tanggal"])[0];
      $tgl2_     = explode("/",$list_prog[$ii]["tanggal"])[1];
      $tgl3_     = explode("/",$list_prog[$ii]["tanggal"])[2];
      array_push($array_prog, strtotime($tgl2_."/".$tgl1_."/".$tgl3_));
    }

    $array_jum_prog = array();
    for ($ii=0; $ii < count($list_prog); $ii++) {
      array_push($array_jum_prog, floor(($array_prog[$ii]-$mulai_waktu)/(24*60*60*7)));
    }

    for ($ii=0; $ii < $jum_week_kontrak; $ii++) {
      if(in_array($jum_mulai+$ii , $array_jum_prog)){
        array_push($arr_prog[$i], "1");
      }else{
        array_push($arr_prog[$i], "0");
      }
    }

    // echo "<br>";
    // print_r($arr_prog[$i]);
    // echo "<br>";

    // var_dump($array_jum_prog);
    // echo "<br>".$i."<br>";

  }
  // loop kegiatan
    // code!code!code!
  //-------------------------------------------------------

  $array_tmp = array();

  for ($i=0; $i < count($list_kegiatan); $i++) {
    $array_tmp[$i] = array();
      array_push($array_tmp[$i], str_split(str_repeat('0',$jum_week_kontrak)));

  }



  // $tmp_k1           = str_split(str_repeat('0',$jum_week_kontrak));
  // $tmp_k2           = str_split(str_repeat('0',$jum_week_kontrak));

  for ($j=0; $j < count($list_kegiatan); $j++) {
    // $array_tmp[$j] = array();

    for ($i=$array_jum_mulai[$j]-$jum_mulai; $i <= ($array_jum_mulai[$j]-$jum_mulai)+$array_jum_week[$j]; $i++) {
      $array_tmp[$j][0][$i]= '1';
    }
  }

  $week = $jum_mulai*(24*60*60*7) - $mulai_waktu;

  // echo $jum_week_kontrak;
  //


  ?>
  <style media="screen">
  table{
    border : 30px;
  }
  td.circle:before {
    content: attr(data-char);
    display: block;
    background: white;
    width: 20px;
    height: 20px;
    line-height:40px;
    text-align:center;
    vertical-align: center;
    border-radius: 50%;
    margin:0 auto;
  }
  </style>
  <div class="az-content az-content-mail" style="overflow-x:auto;">

    <table class="table table-striped table-dashboard-two mg-b-0">
      <thead>
        <tr>
          <td>Month</td>
          <td></td>
          <?php for ($i=0; $i < $jum_week_kontrak; $i++) :?>
          <td><?= date("M", $week + (24*60*60*7*($i+1)))  ?></td>
        <?php endfor; ?>
        </tr>

        <tr>
          <td>Week</td>
          <td></td>
          <?php for ($i=0; $i < $jum_week_kontrak; $i++) :?>
          <td><?= "W".($i+1) ?></td>
        <?php endfor; ?>
        </tr>
      </thead>

      <?php
      $term_ = 0;
      for ($i=0; $i < count($list_kegiatan); $i++) : ?>
      <tr>
        <?php if($term_ == $list_kegiatan[$i]["termin"]): ?>
          <td></td>
        <?php else: ?>
          <?php $term_ = $list_kegiatan[$i]["termin"] ?>
          <td><?= $term_ ?></td>

        <?php endif; ?>
        <td><?= $list_kegiatan[$i]["nama_kegiatan"] ?></td>
        <?php for ($j=0; $j < $jum_week_kontrak; $j++) :?>
          <?php if ($array_tmp[$i][0][$j] == "1"     && $arr_prog[$i][$j] == "1") :?>
            <td class = "circle okk cell k1 <?= "t".$j ?>" style ="border:1px ;background:SkyBlue"><?= " " ?></td>
          <?php elseif ($array_tmp[$i][0][$j] == "1" && $arr_prog[$i][$j] == "0") :?>
            <td class = "okk cell k1 <?= "t".$j ?>" style ="border:1px ;background:SkyBlue"><?= " " ?></td>
          <?php elseif ($array_tmp[$i][0][$j] == "0" && $arr_prog[$i][$j] == "1") :?>
            <td class = "circle okk cell k1 <?= "t".$j ?>" style ="border:1px ;background:DodgerBlue"><?= " " ?></td>
          <?php elseif ($array_tmp[$i][0][$j] == "0" && $arr_prog[$i][$j] == "0") :?>
            <td class = "okk cell k1 <?= "t".$j ?>" style ="border:1px ;background:DodgerBlue"><?= " " ?></td>
          <?php endif; ?>

        <?php endfor; ?>
      </tr>

      <?php endfor; ?>

      <!-- <tr>
        <td>Termin</td>
        <td>Kegiatan 1</td>
        <?php for ($i=0; $i < $jum_week_kontrak; $i++) :?>
          <?php if ($tmp_k1[$i] == "1") :?>
        <td class = "okk cell k1 <?= "t".$i ?>" style ="border:1px ;background:SkyBlue"><?= " " ?></td>
      <?php else :?>
        <td class = "okk cell k1 <?= "t".$i ?>" style ="border:1px ;background:DodgerBlue"><?= " " ?></td>
      <?php endif; ?>
      <?php endfor; ?>
      </tr>

      <tr>
        <td></td>
        <td>Kegiatan 2</td>
        <?php for ($i=0; $i < $jum_week_kontrak; $i++) :?>
          <?php if ($tmp_k2[$i] == "1") :?>
        <td class = "okk cell k2 <?= "t".$i ?>" style ="border:1px;background:SkyBlue"><?= " " ?></td>
      <?php else :?>
        <td class = "okk cell k2 <?= "t".$i ?>" style ="border:1px;background:DodgerBlue" ><?= " " ?></td>
      <?php endif; ?>
      <?php endfor; ?>
      </tr> -->
  </table>














<!--
  <table class="table table-striped table-dashboard-two mg-b-0">
    <thead>
      <tr>
        <td>Month</td>
        <td></td>
        <?php for ($i=0; $i < $jum_week_kontrak; $i++) :?>
        <td><?= date("M", $week + (24*60*60*7*($i+1)))  ?></td>
      <?php endfor; ?>
      </tr>

      <tr>
        <td>Week</td>
        <td></td>
        <?php for ($i=0; $i < $jum_week_kontrak; $i++) :?>
        <td><?= "W".($i+1) ?></td>
      <?php endfor; ?>
      </tr>
    </thead>
    <tr>
      <td>Termin</td>
      <td>Kegiatan 1</td>
      <?php for ($i=0; $i < $jum_week_kontrak; $i++) :?>
        <?php if ($tmp_k1[$i] == "1") :?>
      <td class = "okk cell k1 <?= "t".$i ?>" style ="border:1px ;background:SkyBlue"><?= " " ?></td>
    <?php else :?>
      <td class = "okk cell k1 <?= "t".$i ?>" style ="border:1px ;background:DodgerBlue"><?= " " ?></td>
    <?php endif; ?>
    <?php endfor; ?>
    </tr>

    <tr>
      <td></td>
      <td>Kegiatan 2</td>
      <?php for ($i=0; $i < $jum_week_kontrak; $i++) :?>
        <?php if ($tmp_k2[$i] == "1") :?>
      <td class = "okk cell k2 <?= "t".$i ?>" style ="border:1px;background:SkyBlue"><?= " " ?></td>
    <?php else :?>
      <td class = "okk cell k2 <?= "t".$i ?>" style ="border:1px;background:DodgerBlue" ><?= " " ?></td>
    <?php endif; ?>
    <?php endfor; ?>
    </tr>
</table> -->


  </div>


  <script type="text/javascript">
  $(document).ready(function(){



    <?php
    for ($i=0; $i < $jum_week_kontrak; $i++) {
      echo "
      $('.t".$i."').mouseenter(function(){
          $('.t".$i."').css({'border-right':'3px solid yellow'});
          $('.t".$i."').css({'border-left':'3px solid yellow'});
          // $('.t".$i."').text('halo');
      });
      $('.t".$i."').mouseleave(function(){
          $('.t".$i."').css({'border-right':'0px solid yellow'});
          $('.t".$i."').css({'border-left':'0px solid yellow'});
          // $('.t".$i."').text('halo');
      });


      ";


    }
    ?>

    <?php
    for ($i=0; $i < $jum_week_kontrak; $i++) {
      echo "
      $('.t".$i."').click(function(){
          $('.t".$i."').css({'border-right':'3px solid yellow'});
          $('.t".$i."').css({'border-left':'3px solid yellow'});

          // $('.t".$i."').text('halo');

      });


      ";


    }
    ?>

  });
  </script>



  <?php
  // for ($i=0; $i < 3; $i++) {
  //   // code...
  //   tamba();
  // }
  ?>
  <form class="" action="" method="post">

  <button class="btn btn-az-primary btn-block" name ="submit">Simpan</button>

</form>

  </body>
</html>
