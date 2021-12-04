<?php
function minify($buffer){
     $search = array(
         '/\>[^\S ]+/s',
         '/[^\S ]+\</s',
         '/(\s)+/s'
     );
     $replace = array(
         '>',
         '<',
         '\\1'
     );
 
     if (preg_match("/\<html/i",$buffer) == 1 && preg_match("/\<\/html\>/i",$buffer) == 1) {
     $buffer = preg_replace($search, $replace, $buffer);
     }
   return $buffer;
}
?>
<?php ob_start("minify") ?>
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
  <?php 
  require 'layout/head.php'; 
  ?>

  <body class="c-app">

    <?php 
    require 'layout/sidebar.php'; 
    ?>

    <div class="c-wrapper c-fixed-components">
      <?php 
      require 'layout/header.php'; 
      ?>      
      

      <div class="c-body">
        <main class="c-main">
          <div class="container-fluid">
            <div class="fade-in">
              
              <?php 
              // KONTEN
              if (empty($isi)) {
              require 'isi.php';
              }else{
              $this->load->view($isi);
              }
              ?>
              
            </div>
          </div>
        </main>
        <footer class="c-footer">
          <div><?=namaAPP?> © 2019 - <?=date('Y')?></div>
        </footer>
      </div>
    </div>
    <?php
      require 'layout/js.php';
    ?>
  </body>
</html>