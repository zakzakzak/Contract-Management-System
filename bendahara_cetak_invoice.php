<br>
<br>

<?php

require('function.php');
$id_po = $_GET["id"];
$baseurl       = base_url()."home";
$hasil = query("SELECT * FROM po WHERE id_po = $id_po")[0];

if(isset($_POST["button"]))
{
    if (printed_invoice_po($id_po) > 0){
      echo ("
          <script>
            print();
            // alert('coba');
          </script>
      ");
    }else{
      echo "
          <script>
            alert('Belum dianggap print');
          </script>
      ";
    }
}





if(isset($_POST["button2"])){
  echo ("
        <script>
          document.location.href = '$baseurl/bendahara_list_po';
        </script>
    ");
}



 ?>
<?php  ?>
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

    <title>BLU TEKMIRA</title>

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


    <!-- azia CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/azia.css">

  </head>
  <body class="az-body">

  <div class="card card-invoice">
    <div class="card-body">
      <div class="invoice-header">
        <h1 class="invoice-title">Invoice</h1>
        <!-- <div class="billed-from">
          <h6>ThemePixels, Inc.</h6>
          <p>201 Something St., Something Town, YT 242, Country 6546<br>
          Tel No: 324 445-4544<br>
          Email: youremail@companyname.com</p>
        </div> -->
      </div><!-- invoice-header -->

      <div class="row mg-t-20">
        <div class="col-md">
          <label class="tx-gray-600">Billed To</label>
          <div class="billed-to">
            <h6><?php echo $hasil ["judul"]; ?>
          </div>
        </div><!-- col -->
        <div class="col-md">
          <label class="tx-gray-600">Invoice Information</label>
          <p class="invoice-info-row">
            <span>Invoice No</span>
            <span><?=  $termin["id_termin"]."/".$termin["kode"]."/".$termin["kode_layanan"]."/".$termin["status"]."/".$termin["tahun"] ?></span>
          </p>

          <p class="invoice-info-row">
            <span>Layanan</span>
            <?php
            // $kontrak = query("SELECT * FROM termin WHERE id_termin = $id_termin")[0]["id"];
            // $rl = query("SELECT kontrak.id, rumah_layanan.nama FROM kontrak INNER JOIN rumah_layanan ON kontrak.id_jasa = rumah_layanan.id_rumah_layanan WHERE kontrak.id = $id");
            // // $id_layanan = $kontrak["rumah_layanan"];
            // // $layanan = query("SELECT * FROM ");
            // var_dump($rl);


             ?>
            <span></span>
          </p>

          <p class="invoice-info-row">
            <span>Issue Date:</span>
            <span>November 21, 2017</span>
          </p>

          <p class="invoice-info-row">
            <span>Due Date:</span>
            <span>November 30, 2017</span>
          </p>


        </div><!-- col -->
      </div><!-- row -->

      <div class="table-responsive mg-t-40">
        <table class="table table-invoice">
          <thead>
            <tr>
              <th class="wd-20p">Termin</th>
              <th class="">Kegiatan</th>
              <th class="">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Termin <?= $termin_ ?></td>
              <?php
              $hasil_kegiatan = query("SELECT * FROM kegiatan WHERE id = $id AND termin = $termin_");
               ?>
              <td><?= $hasil_kegiatan[0]["nama_kegiatan"] ?></td>


              <?php
              $biaya_ = query("SELECT * FROM rencana_termin WHERE id = $id AND termin = $termin_");
              // var_dump($biaya_);?>
              <?php if ($biaya_ == NULL): ?>
                <td>(Belum diisi)</td>
              <?php else: ?>
                <td class=""><strong><?= "Rp.".number_format($biaya_[0]["jumlah"]).",-" ?></strong></td>
              <?php endif; ?>

            </tr>

              <?php

              for ($i=1; $i < count($hasil_kegiatan); $i++) {
               ?>
               <tr>
                 <td></td>
                 <td ><?= $hasil_kegiatan[$i]["nama_kegiatan"] ?></td>
                 <td></td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div><!-- table-responsive -->

      <hr class="mg-b-40">
      <form class="" action="" method="post">
        <button type="submit" class="btn btn-info" name="button"><center>Cetak invoice</center></button>
        <button type="submit" class="btn btn-info" name="button2"><center>kembali</center></button>
      </form>


    </div><!-- card-body -->
  </div><!-- card -->


<script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/ionicons/ionicons.js"></script>
<script src="<?php echo base_url();?>assets/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/jquery.maskedinput/jquery.maskedinput.js"></script>
<script src="<?php echo base_url();?>assets/lib/spectrum-colorpicker/spectrum.js"></script>
<script src="<?php echo base_url();?>assets/lib/select2/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
<script src="<?php echo base_url();?>assets/lib/pickerjs/picker.min.js"></script>

<script src="<?php echo base_url();?>assets/js/azia.js"></script>
<script src="<?php echo base_url();?>assets/js/app-calendar-events.js"></script>
<script src="<?php echo base_url();?>assets/js/app-calendar.js"></script>

<script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets./lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/select2/js/select2.min.js"></script>

<script>
  $(function(){
    'use strict'

    $('#example1').DataTable({
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      }
    });

    $('#example2').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      }
    });

    // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

  });
</script>

<script>
  // Additional code for adding placeholder in search box of select2
  (function($) {
    var Defaults = $.fn.select2.amd.require('select2/defaults');

    $.extend(Defaults.defaults, {
      searchInputPlaceholder: ''
    });

    var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');

    var _renderSearchDropdown = SearchDropdown.prototype.render;

    SearchDropdown.prototype.render = function(decorated) {

      // invoke parent method
      var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));

      this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));

      return $rendered;
    };

  })(window.jQuery);
</script>

<script>
  $(function(){
    'use strict'

    new PerfectScrollbar('#azInvoiceList', {
      suppressScrollX: true
    });

    new PerfectScrollbar('.az-content-body-invoice', {
      suppressScrollX: true
    });

    $('#azInvoiceList .media').on('click', function(e){
      $(this).addClass('selected');
      $(this).siblings().removeClass('selected');

      $('body').addClass('az-content-body-show');
    });

    $('.select2-modal').select2({
      minimumResultsForSearch: Infinity,
      dropdownCssClass: 'az-select2-dropdown-modal',
    });

    $('#dateToday').text(moment().format('ddd, MMMM DD YYYY'));


    $('#checkAll').on('click', function(){
      if($(this).is(':checked')) {
        $('.az-mail-list .ckbox input').each(function(){
          $(this).closest('.az-mail-item').addClass('selected');
          $(this).attr('checked', true);
        });

        $('.az-mail-options .btn:not(:first-child)').removeClass('disabled');
      } else {
        $('.az-mail-list .ckbox input').each(function(){
          $(this).closest('.az-mail-item').removeClass('selected');
          $(this).attr('checked', false);
        });

        $('.az-mail-options .btn:not(:first-child)').addClass('disabled');
      }
    });

    $('.az-mail-item .az-mail-checkbox input').on('click', function(){
      if($(this).is(':checked')) {
        $(this).attr('checked', false);
        $(this).closest('.az-mail-item').addClass('selected');

        $('.az-mail-options .btn:not(:first-child)').removeClass('disabled');

      } else {
        $(this).attr('checked', true);
        $(this).closest('.az-mail-item').removeClass('selected');

        if(!$('.az-mail-list .selected').length) {
          $('.az-mail-options .btn:not(:first-child)').addClass('disabled');
        }
      }
    });

    $('.az-mail-star').on('click', function(e){
      $(this).toggleClass('active');
    });

    $('#btnCompose').on('click', function(e){
      e.preventDefault();
      $('.az-mail-compose').show();
    });

    $('.az-mail-compose-header a:first-child').on('click', function(e){
      e.preventDefault();
      $('.az-mail-compose').toggleClass('az-mail-compose-minimize');
    })

    $('.az-mail-compose-header a:nth-child(2)').on('click', function(e){
      e.preventDefault();
      $(this).find('.fas').toggleClass('fa-compress');
      $(this).find('.fas').toggleClass('fa-expand');
      $('.az-mail-compose').toggleClass('az-mail-compose-compress');
      $('.az-mail-compose').removeClass('az-mail-compose-minimize');
    });

    $('.az-mail-compose-header a:last-child').on('click', function(e){
      e.preventDefault();
      $('.az-mail-compose').hide(100);
      $('.az-mail-compose').removeClass('az-mail-compose-minimize');
    });

    // Toggle Switches
    $('.az-toggle').on('click', function(){
      $(this).toggleClass('on');
    })

    // Input Masks
    $('#dateMask').mask('99/99/9999');
    $('#phoneMask').mask('(999) 999-9999');
    $('#phoneExtMask').mask('(999) 999-9999? ext 99999');
    $('#ssnMask').mask('999-99-9999');

    // Color picker
    $('#colorpicker').spectrum({
      color: '#17A2B8'
    });

    $('#showAlpha').spectrum({
      color: 'rgba(23,162,184,0.5)',
      showAlpha: true
    });

    $('#showPaletteOnly').spectrum({
        showPaletteOnly: true,
        showPalette:true,
        color: '#DC3545',
        palette: [
            ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
            ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
        ]
    });

    // Datepicker



    $(document).ready(function(){
      $('.select2').select2({
        placeholder: 'Choose one',
        searchInputPlaceholder: 'Search'
      });

      $('.select2-no-search').select2({
        minimumResultsForSearch: Infinity,
        placeholder: 'Choose one'
      });
    });

    $('.rangeslider1').ionRangeSlider();

    $('.rangeslider2').ionRangeSlider({
        min: 100,
        max: 1000,
        from: 550
    });

    $('.rangeslider3').ionRangeSlider({
        type: 'double',
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: '$'
    });

    $('.rangeslider4').ionRangeSlider({
        type: 'double',
        grid: true,
        min: -1000,
        max: 1000,
        from: -500,
        to: 500,
        step: 250
    });

  });
</script>

</body>
</html>
