<style type="text/css">
  .setkol{
    background-color: gainsboro;text-align:center; font-size: 13px;
  }
</style>
<div class="page-wrapper">
        
            <div class="page-breadcrumb" align="center">
                <div class="center" >
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-0"><?=$judul?></h4>
                    Periode : <?php echo $periode?><br/>
                    <?=empty($keg)?'':$keg?>
                    
                </div>
            </div>
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                    
                        <div class="card">
                            <div class="card-body">
                              <?php
                              $message = $this->session->flashdata('pesan');
                              echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
                              ?>
                              <div class="dropdown text-right">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Cetak
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="btn btn-warning btn-block" 
                                    onclick="buka('<?=base_url('C_cetak/'.$fCetak.'/html/'.$urlCetak)?>')">PRINT</a></li>
                                  <li><a class="btn btn-success btn-block"  
                                    onclick="buka('<?=base_url('C_cetak/'.$fCetak.'/xls/'.$urlCetak)?>')">XLS</a></li>
                                  <li><a class="btn btn-danger btn-block" 
                                     onclick="buka('<?=base_url('C_cetak/'.$fCetak.'/pdf/'.$urlCetak)?>')">PDF</a></li>
                                </ul>
                                <a class="btn btn-light" href="javascript:history.back()"><font size="2"><i>Back&nbsp;</i></font></a>
                              </div>
                              <br/>

                              <div class="table-responsive">
                                <?php @require $isiTable; ?>
                              </div>
                            </div>
                        </div>
            </div>
        </div>
<script type="text/javascript">
  function buka(file) {
    window.open(file);
  }
</script>