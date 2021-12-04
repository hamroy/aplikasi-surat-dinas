<!-- CoreUI and necessary plugins-->
    <script>
    console.log('ilham');
        var a_modal = document.getElementsByClassName('open_modal');
        var tom_del = document.getElementsByClassName('tom_del');
        for (i = 0;  i <= a_modal.length; i++) {
          a_modal[i].href = 'javascript:void(0)';
          tom_del[i].href = `javascript:void(0)`;
        }
    </script>
    <script src="<?=base_url()?>dist/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <!--[if IE]><!-->
    <script src="<?=base_url()?>dist/vendors/@coreui/icons/js/svgxuse.min.js"></script>
    <!--<![endif]-->
    <!-- Plugins and scripts required by this view-->
    <!-- <script src="<?=base_url()?>dist/js/main.js"></script> -->


    <!-- <script src="<?=base_url()?>src/dist/js/custom.min.js"></script> -->
    <!-- <script src="<?=base_url()?>highlights/highlight.min.js"></script> -->
    <script src="<?=base_url()?>js/bootstrap-datepicker.js"></script>

    <script>
        $(function(){
            $("#tanggal,#tanggal1, #tanggal2 ,#tanggal3,#tanggal4").datepicker({
            format:'dd/mm/yyyy'
            });

            $("#_tgl1,#_tgl2").datepicker({
            format:'yyyy/mm/dd'
            });
        });

             

    </script>