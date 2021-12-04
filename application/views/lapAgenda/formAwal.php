<style type="text/css">
  .setkol{
    background-color: gainsboro;text-align:center; font-size: 13px;
  }
</style>
<div class="page-wrapper">
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                    
                        <div class="card bcForm" >
                            <div class="card-body">
                              <?php
                              $message = $this->session->flashdata('pesan');
                              echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
                              ?>
                                <table class="table table-bordered" width="100%">
                                  <tr valign="top">
                                    <td width="90%" align="center"><h4><?=strtoupper($judul)?></h4></td>
                                    <td width="10%" align="right">
                                      <a href="javascript:history.back()"><font size="2"><i>Back&nbsp;</i></font></a>
                                    </td>
                                  </tr>
                                </table>
                          
                                
                                <form class="form-horizontal" role="form" method="GET">
                                  
                                   
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-4">
                                          <label>Tanggal Awal :</label>
                                          <input id="_tgl1" name="_tgl1" autocomplete="off" class="form-control" width="100%" type="text">
                                        </div>
                                        <div class="col-md-4">
                                           <label>Tanggal Akhir :</label>
                                          <input name="_tgl2" id="_tgl2" autocomplete="off" class="form-control" width="100%" type="text">
                                        </div>
                                      </div>
                                    </div>

                                    <?php if ($js==6){ ?>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-8">
                                          <label>Kegiatan :</label>
                                          <select name="cbokegiatan" id="cbokegiatan" class="form-control">
                                            <option value=""></option>
                                            <?php
                                              $sql_row=$this->M_master->getKegiatan();
                                              foreach ($sql_row->result_array() as $sql_res){
                                            ?>
                                            <option value="<?php echo $sql_res["id"]; ?>"><?php echo $sql_res["nm_kegiatan"]; ?></option>
                                                  <?php
                                                    }
                                                  ?>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>


                                      <button type="submit" class="btn btn-primary">Proses</button>
                                      
                                    
                                    
                                    
                                  
                                </form>
                                
                            </div>
                        </div>
            </div>
        </div>