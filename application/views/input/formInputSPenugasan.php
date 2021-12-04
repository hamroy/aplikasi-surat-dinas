<style type="text/css">
  .setkol{
    background-color: gainsboro;text-align:center; font-size: 13px;
  }
</style>
<div class="page-wrapper">
        
            <div class="page-breadcrumb">
                <div class="d-flex align-items-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-0"><?=$judul?></h4>
                    <div class="ml-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item text-muted active" aria-current="page">Beranda</li>
                                <li class="breadcrumb-item text-muted" aria-current="page"><?=$judul?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid " >
                    
                        <div class="card bcForm">
                            <div class="card-body">
                              <?php
                              $message = $this->session->flashdata('pesan');
                              echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
                              ?>
                              <div class="table-responsive">
                                    <!-- ISI -->
                                            <table class="table table-bordered">
                                              <tr>    
                                                  <td>
                                                  <table class="table1" width="100%">
                                                    <tr valign="top">
                                                      <td width="90%"><h4>INPUT <?=strtoupper($judul)?></h4></td>
                                                      <td width="10%" align="right">
                                                        <a href="javascript:history.back()"><font size="2"><i>Back&nbsp;</i></font></a>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                  </td>
                                              </tr>
                                            </table>
                                            <form action="<?=base_url('C_input/suratPenugasan_save')?>" name="modal_popup" enctype="multipart/form-data" method="POST">
                                        
            <table class="table table-bordered" width="100%">
              <?php
                $akses=$this->session->userdata('lvl_akses');
                if ($akses==1) {
                ?>
              <tr>
                <td width="25%" colspan="4"><b>Index Surat :</b></td>
              </tr>
              <tr>
                <td width="25%" colspan="4"><input type="text" name="txtno"  class="form-control" /></td>
              </tr>
              <?php }else{
                echo "<input type=\"hidden\" name=\"txtno\"/>";
                } 
              ?>  
              <tr>
                <td colspan="2"><b>Tanggal :</b></td>
                <td width="25%"><b>Mulai Jam :</b></td>
                <td width="25%"><b>Akhir Jam :</b></td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="text" name="tanggal" autocomplete="off" id="tanggal" class="form-control" required/>
                </td>
                <td width="25%"><input type="text" name="jmulai" id="jmulai" class="form-control" value="00:00:00" /></td>
                <td width="25%"><input type="text" name="jakhir" id="jakhir" class="form-control" value="00:00:00" /></td>
              </tr>
              <tr>
                <td colspan="2"><b>Tanggal Penerbitan :</b></td>
                <td colspan="2"><b>Klasifikasi Surat :</b></td>
                <!--<td colspan="2"><b>Jenis Surat :</b></td>-->

              </tr>
              <tr>

                <td colspan="2">
                  <input type="text" autocomplete="off" name="tanggalTerbit" id="tanggal2" class="form-control" required/>
                </td>

                <td colspan="2">
                  <input type="hidden" name="cboklasifikasi"  class="form-control" value="<?php echo $kd_klasifikasi; ?>" />
                  <input type="text" name="cboklasifikasi1"  class="form-control" value="<?php echo $nm_klasifikasi; ?>" disabled />
                  <input type="hidden" name="cbojenis" value="SP">
                </td>
                <td colspan="2">
                </td>
              </tr>     
              <tr>
                
                <td colspan="2"><b>Tempat Tujuan :</b></td>
                <td colspan="2"><b>Bidang :</b></td>
              </tr>
              <tr>
                
                <td colspan="2">
                  <input type="text" name="txttujuan"  class="form-control" required/>
                </td>
                <td colspan="2">
                  <input type="hidden" name="cboinstansi" value="BKPSDM">
                  <select name="cbobidang" id="cbobidang" class="form-control">
                    <option value=""></option>
                    <?php
                    $sql_row=$this->M_master->getBidang();
                    foreach ($sql_row->result_array() as $sql_res){
                    ?>
                    <option value="<?php echo $sql_res["kd_bidang"]; ?>"><?php echo $sql_res["nm_bidang"]; ?></option>
                          <?php
                            }
                          ?>
                  </select>
                </td>
              </tr>
              <tr>
                
                <td colspan="2"><b>Dalam Rangka :</b></td>
                <td colspan="2"><b>Penanda Tangan :</b></td>
              </tr>
              <tr>
    
                <td colspan="2"><input type="text" name="txtperihal"  class="form-control" required/></td>
                <td colspan="2">
                  <select name="cbopegawai1" id="cbopegawai1" class="form-control" required>
                    <option value=""></option>
                    <?php
                      $sql_row=$this->M_master->jabatanPeg();
                      foreach ($sql_row->result_array() as $sql_res){
                    ?>
                    <option value="<?php echo $sql_res["nip"]; ?>"><?php echo $sql_res["nama_jabatan"]; ?></option>
                          <?php
                            }
                          ?>
                  </select>
                </td>
              </tr> 
              <tr>
                <td colspan="4"><b>Keterangan :</b></td>
                <!-- <td colspan="2"><b>Upload Dokumen :</b></td> -->
              </tr>
              <tr>
                <td colspan="4"><input type="text" name="txtketerangan"  class="form-control"/></td>
                <!-- <td colspan="2"><input name="nama_file" id="nama_file" type="file" /></td> -->
              </tr>
              <tr>
                <td colspan="4"><b>Link Dokumen :</b></td>
              </tr>
              <tr>
                <td colspan="4">
                  <input type="text" name="link_file"  class="form-control" />
                  <!-- <input name="nama_file" id="nama_file" type="file" /> -->
                  <!-- <small class="text-danger">Format file harus .PDF</small> -->
                </td>
              </tr>
            </table>
            </td>
      </tr>

      <tr>    
            <td>
                <hr/>
                  <button class="btn btn-success" type="submit">Confirm</button>
            </td>
      </tr>
          </table>
                                      </form>

                                     <!-- BATAS BAWAH TAG  -->
                              </div> 
                        </div>
                  </div>
            </div>
        </div>
