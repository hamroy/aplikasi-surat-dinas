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
<html dir="ltr" lang="en">
<?php
require 'head.php';
?>


<body style="font-size: 14px">
        <!-- ============================================================== -->
        <?php
        require 'header.php';
        require 'menu.php';
        
        if (empty($isi)) {
        require 'isi.php';
        }else{
        $this->load->view($isi);
        }
        require 'foot.php';
    ?>

</body>

</html>