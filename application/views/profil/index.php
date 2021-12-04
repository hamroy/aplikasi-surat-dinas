<style type="text/css">
  .setkol{
    background-color: gainsboro;
    color: #181919;
  }
</style>
<?php
  $id=$_SESSION['id_user'];
  $modal=$this->M_master->getProfilUser($id);
  if(!$r=$modal->row_array()){
    die('ERROR');
  }
?>
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
                          
                                
                                <form class="form-horizontal" role="form" method="POST" action="<?=base_url('C_beranda/prosesGantiProfil')?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-4">
                                          <label>Ganti Profil :</label>
                                          <input type="file" name="poto" />
                                          <small class="text-info">max : 10 MB</small><br/>
                                          <small class="text-info">type gambar : jpeg|jpg|png</small>
                                        </div>

                                        <div class="col-md-4 text-right">
                                          <img width="200px" src="<?=base_url($_SESSION['profil'])?>">
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-4">
                                          <label>Nama :</label>
                                          <input type="text" value="<?=$_SESSION['nm_user']?>"  class="form-control" readonly/>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-4">
                                          <label>Username :</label>
                                          <input type="text" value="<?=$r['username']?>" class="form-control" readonly/>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-4">
                                          <label>NIP :</label>
                                          <input type="text" value="<?=$r['nip']?>" class="form-control" readonly/>
                                        </div>
                                      </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Proses</button>
                                  
                                </form>
                                
                            </div>
                        </div>
            </div>
        </div>