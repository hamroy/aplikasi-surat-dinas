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
                    <a href="<?=base_url('C_input/formKlasifikasi/'.$ijs)?>" class="btn btn-success">Tambah Data</a>
                    <br><br>
                    <p>Total Surat : <?=$sql->num_rows()?><br>
                    Surat Hari ini : <?=$this->M_input->getsNow('tblperjalanan_dinas')?></p>
                    </div>
                            <div class="card-body">
                              <?php
                              $message = $this->session->flashdata('pesan');
                              echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
                              ?>
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered setkol">
                                    <tr>    
                                            <th colspan="13">
                                                <div class="row">
                                                  <div class="col-md-8">
                                                      <form method="get">
                                                        <div class="input-group">
                                                          <input type="Search" class="form-control" name="strnama" placeholder="Perihal Surat...">
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
                                            <th ><font size="">No</font></th>
                                            <th ><font size="">Indeks Surat</font></th>
                                            <th ><font size="">Tgl</font></th>
                                            <th ><font size="">Tujuan</font></th>
                                            <th ><font size="">Perihal</font></th>
                                            <th ><font size="">Bidang</font></th>
                                            <th ><font size="">Keterangan</font></th>
                                            <th ><font size="">File</font></th>
                                            <th ><font size="">Menu</font></th>  
                                          </tr>

                                          <?php 
                                            foreach ($sql->result_array() as $tampil){
                                              $ttd=$tampil['kd_bidang'];
                                              $file_dok=$tampil['file_dok'];
                                              
                                              $gidpeg=$this->M_master->getKdBidang($ttd);
                                              $tm_cari=$gidpeg->row_array();
                                              $nm_bidang = $tm_cari['nm_bidang'];
                                             ?> 
                                                <tr>
                                                  <td align="center"><font size="2"><?php echo $tampil['no_urut']?></font></td>
                                                  <td><font><?php echo $tampil['indeks_surat_klr']?></font></td>
                                                  <td align="center"><font><?php echo $tampil['tgl1']?></font></td>
                                                  <td align="center"><font><?php echo $tampil['tujuan']?></font></td>
                                                  <td><font><?php echo $tampil['perihal']?></font></td>
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
                                                    <a   class='open_modal' id='<?=$tampil['indeks_surat_klr']; ?>'><i class="fas fa-edit"> Edit</i></a>            
                                                    <?php
                                                    $akses=$this->session->userdata('lvl_akses');
                                                    if ($akses==1) {
                                                    ?>
                                                    <a   class="tom_del"
                                                    onclick="confirm_modal('<?=base_url()?>C_input/sLapPDDel?&modal_id=<?=$tampil['indeks_surat_klr']?>');"><i class="far fa-times-circle"> Hapus</i></a>
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
             url: "<?=base_url()?>C_input/sLapPdEdit",
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