<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//define('DOMPDF_ENABLE_AUTOLOAD', false);
class Pdfgenerator {

  public function generate($html, $filename='downloadPDF', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new Dompdf\Dompdf();
    
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
       $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
      $output = $dompdf->output();
      file_put_contents("dok/dataFile/hasilCetak.pdf", $output);
        return ;
    }
    //*/

  }


}