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
            <br>
                    <div class="well">
                    <a   data-target="#ModalAdd" data-toggle="modal" class="btn btn-success">Tambah Data</a>
                    <br><br>
                    <p>Total Surat : <?=$sql->num_rows()?><br>
                    Surat Hari ini : <?=$this->M_input->getsNow('tbsurat_keputusan')?></p>
                    </div>
                            <div class="card-body">
                              <?php
                              $message = $this->session->flashdata('pesan');
                              echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
                              ?>
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered setkol">
                                    <tr>    
                                            <th colspan="10">
                                                <div class="row">
                                                  <div class="col-md-8">
                                                      <form method="get">
                                                        <div class="input-group">
                                                          <input type="Search" class="form-control" name="strnama" placeholder="Tentang Surat...">
                                                          <span class="input-group-btn">
                                                            <button  class="btn btn-primary" type="submit">Cari</button>
                                                          </span>
                                                        </div><!-- /input-group -->
                                                        </form>
                                                  </div>
                                                  <div class="col-md-4 pull-left">
                                                    
                                                </div>
                                                </div>
                                        
                                        
                                        </th>
                                          </tr>
                                          <tr >
                                            <th ><font size="">Indeks Surat</font></th>
                                            <th ><font size="">Tanggal</font></th>
                                            <th ><font size="">Tentang</font></th>
                                            <th ><font size="">Bidang/Unit</font></th>
                                            <th ><font size="">Keterangan</font></th>
                                            <th ><font size="">File</font></th>
                                            <th ><font size="">Menu</font></th>  
                                          </tr>

                                          <?php 
                                            foreach ($sql->result_array() as $tampil){
                                              $kd_bidang=$tampil['kd_bidang'];
                                              $file_dok=$tampil['file_dok'];
                                              
                                              $gidpeg=$this->M_master->getKdBidang($kd_bidang);
                                              $tm_cari=$gidpeg->row_array();
                                              $nm_bidang = $tm_cari['nm_bidang'];
                                             ?> 
                                                <tr>
                                                  <td><font><?php echo $tampil['indeks_surat_keputusan']?></font></td>
                                                  <td align="center"><font><?php echo $tampil['tgl1']?></font></td>
                                                  <td><font><?php echo $tampil['tentang']?></font></td>
                                                  <td><font><?php echo $nm_bidang?></font></td>
                                                  <td><font><?php echo $tampil['keterangan']?></font></td>

                                                  <td>
                                                    <?php
                                                      if($file_dok<>'') {
                                                    ?>
                                                    <a href="<?php echo base_url($tampil['file_dok'])?>">
                                                      <i class="fas fa-download"></i>
                                                    </a>
                                                    <?php
                                                      } else {
                                                    ?>
                                                    <font size="2"><i><a target="_blank" href="<?php echo $tampil['link']; ?>">Lihat</a></i></font>
                                                    <?php
                                                      }
                                                    ?>
                                                  </td>
                                                  
                                                  <td>
                                                    <a class='open_modal'  id='<?=$tampil['indeks_surat_keputusan']; ?>'><i class="fas fa-edit"> Edit</i></a>            
                                                    <?php
                                                    $akses=$this->session->userdata('lvl_akses');
                                                    if ($akses==1) {
                                                    ?>
                                                    <a class="tom_del" onclick="confirm_modal('<?=base_url()?>C_input/sKeputusanDel?&modal_id=<?=$tampil['indeks_surat_keputusan']?>');"><i class="far fa-times-circle"> Hapus</i></a>
                                                  <?php } ?>
                                                  </td>
                                                </tr>
                                             <?php
                                            }
                                          ?>
                                        </table>
                                      </div>
                            </div>
        </div>
<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Input <?=$judul?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <form action="<?=base_url()?>C_input/suratKeputusan_save" name="modal_popup" enctype="multipart/form-data" method="POST">

    <table class="table1" width="100%">
      <?php
      $akses=$this->session->userdata('lvl_akses');
        if ($akses==1) {
          ?>
            <tr>
              <td width="50%"><b>Index Surat :</b></td>
              <td width="50%"><b>Tanggal Surat :</b></td>
            </tr>
            <tr>
              <td width="50%"><input type="text" name="txtno"  class="form-control" /></td>
              <td width="50%"><input type="text" name="tanggal" id="tanggal" class="form-control" required/></td>
            </tr>    
          <?php
        }else{
          ?>
          
          <tr>
            <td width="50%"><b>Tanggal Surat :</b></td>
          </tr>
          <tr>
            <td width="100%">
              <input type="hidden" name="txtno"  class="form-control" value="" />
              <input type="text" name="tanggal" id="tanggal" class="form-control" required/></td>
          </tr>
          <?php
        }
      ?>
      

      <tr>
        <td colspan="2"><b>Bidang/Unit :</b></td>
      </tr>
      <tr>
        <td colspan="2">
          <select name="cbobidang" id="cbobidang" class="form-control" required>
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
        <td colspan="2"><b>Tentang :</b></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" name="txttentang"  class="form-control" required/></td>
      </tr>     
      <tr>
        <td colspan="2"><b>Keterangan :</b></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" name="txtketerangan"  class="form-control" /></td>
      </tr>
      <tr>
          <td colspan="4"><b>Link Dokumen :</b></td>
        </tr>
        <tr>
          <td colspan="4">
            <input type="url" name="link_file"  class="form-control" />
            <!-- <input name="nama_file" id="nama_file" type="file" /> -->
            <!-- <small class="text-danger">Format file harus .PDF</small> -->
          </td>
        </tr>
</table>

<br>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Hapus <?=$judul?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
      
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      
      
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a   class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>

      </div>
    </div>
  </div>
</div>

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "<?=base_url()?>C_input/sKeputusanEdit",
             type: "GET",
             data : {modal_id: m,},
             success: function (ajaxData){
               $("#ModalEdit").html(ajaxData);
               $("#ModalEdit").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
