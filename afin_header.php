<?php
$inbox = $this->db->query("SELECT COUNT(id_kontrak) AS jumlah FROM masalah WHERE STATUS = 0 AND id_bidang = 4")->row();
?>
<!DOCTYPE html>
<html lang="en">
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

    <title>AFIN</title>
    <!-- datepickbaru -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      var jq_1_12_4 = $.noConflict(true);
    </script>

    <!-- vendor css -->
    <link href="<?php echo base_url(); ?>assets/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/fullcalendar/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/pickerjs/picker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/select2/css/select2.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- azia CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/azia.css">
    <style media="screen">

        td {
        word-break: break-all;
        }
    </style>

  </head>
  <body class="az-body">

    <div class="az-header">
      <div class="container">
        <div class="az-header-left">
          <a href="" class="az-logo"><img src="<?php echo base_url();?>assets/Tekmira.PNG" height="60" width="220"></a>
          <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
          <a href=""><i class="typcn "></i>&nbsp | &nbsp  AFIN </a>
        </div><!-- az-header-left -->

        <div class="az-header-menu">
          <div class="az-header-menu-header">
            <a href="index.html" class="az-logo"><span></span> TEKMIRA</a>
            <a href="" class="close">&times;</a>
          </div><!-- az-header-menu-header -->
          <ul class="nav">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>home/afin_index?id=31"><i class="fas fa-home"></i> Kontrak</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>home/afin_inbox"><i class="far fa-envelope"></i> INBOX (<?php echo $inbox->jumlah;?>)</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>home/afin_adendum"><i class="far fa-envelope"></i> Adendum</a>
            </li>
          </ul>

        </div><!-- az-header-menu -->
        <div class="az-header-right">

          <div class="dropdown az-profile-menu">
            <a href="" class="far fa-user"></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <div class="az-header-profile">
                <div class="az-img-user">
                  <img src="https://via.placeholder.com/500" alt="">
                </div>
                <h6>AFIN</h6>
                <!-- <span>Premium Member</span> -->
              </div>
              <a href="<?=base_url()."home/index" ?>" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
            </div>
          </div>
        </div>
      </div>
    </div>
