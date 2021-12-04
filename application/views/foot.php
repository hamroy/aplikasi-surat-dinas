    <footer class="footer text-center" style="margin-top: 0px ; background-color: #ffffff">
                <?=namaAPP?> 2019 - <?=date('Y')?>
    </footer>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
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
    <!-- End Page -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <script src="<?=base_url()?>src/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>src/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?=base_url()?>src/dist/js/app-style-switcher.js"></script>
    <script src="<?=base_url()?>src/dist/js/feather.min.js"></script>
    <script src="<?=base_url()?>src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?=base_url()?>src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>src/dist/js/custom.min.js"></script>
    <script src="<?=base_url()?>highlights/highlight.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-datepicker.js"></script>

    <script>
        hljs.initHighlightingOnLoad();
    </script>

    
    