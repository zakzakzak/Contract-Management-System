
<div class="az-footer ht-40">
      <div class="container-fluid pd-t-0-f ht-100p">
        <span>&copy; 2019 Puslitbang Tekmira</span>
        <span>BLU PROMISES</span>
      </div><!-- container -->
    </div><!-- az-footer -->

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
