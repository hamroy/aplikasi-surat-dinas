<style type="text/css">
  .setkol{
    background-color: gainsboro;
    color: #181919;
  }
</style>
<div class="page-wrapper">
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                    
                        <div class="card setkol" >
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
                          
                                
                                <form class="form-horizontal" role="form" method="POST" action="<?=base_url('C_sett/aksesUSer')?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-4">
                                          <?php
                                          $st=$sql->row()->status;
                                          ?>
                                          <label>APLIKASI USER</label>
                                          <select name="status" class="form-control">
                                          <option value="1" <?=$st==1?'selected':''?>>BUKA</option>
                                          <option value="0" <?=$st==0?'selected':''?>>TUTUP</option>
                                        </select>
                                          

                                        </div>
                                      </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Proses</button>
                                  
                                </form>
                                
                            </div>
                        </div>
            </div>
        </div>