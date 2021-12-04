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
            <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                              <?php
                              $message = $this->session->flashdata('pesan');
                              echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
                              ?>
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered setkol">
                                    <tr>    
                                            <th colspan="12">
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
                                            <th width="5%" style="background-color: gainsboro;text-align:center;"><font size="2">No</font></th>
                                            <th width="10%" style="background-color: gainsboro;"><font size="2">Indeks Surat</font></th>
                                            <th width="10%" style="background-color: gainsboro;"><font size="2">Nama Pegawai</font></th>
                                            <th width="10%" style="background-color: gainsboro;"><font size="2">Tempat Tujuan</font></th>
                                            <th width="8%" style="background-color: gainsboro;text-align:center;""><font size="2" >Tanggal</font></th>
                                            <th width="8%" style="background-color: gainsboro;text-align:center;""><font size="2">Mulai Jam</font></th>
                                            <th width="8%" style="background-color: gainsboro;text-align:center;""><font size="2">Mulai Akhir Jam</font></th>
                                            <th width="16%" style="background-color: gainsboro;"><font size="2">Dalam Rangka</font></th>
                                            <th width="15%" style="background-color: gainsboro;"><font size="2">Penanda Tangan</font></th>
                                            <th width="10%" style="background-color: gainsboro;"><font size="2">Keterangan</font></th>
                                          </tr>

                                          <?php 
                                            foreach ($sql->result_array() as $tampil){

                                              $tm_cari=$this->M_master->getNipPeg($tampil['ttd'])->row_array();
                                              $nama_jabatan = $tm_cari['nama_jabatan'];
                                              
                                              $nip=$tampil['id_nip'];
                                              $tm_cari=$this->M_master->getPegawaiId($nip)->row_array();
                                              $nama = $tm_cari['nama'];

                                              
                                             ?> 
                                                <tr>
                                                  <td align="center"><font size="2"><?=$tampil['no_urut']?></font></td>
                                                  <td><font size="2"><?=$tampil['indeks_surat_penugasan']?></font></td>

                                                  <td><font size="2"><?php echo $nama?></font></td>
                                                  <td><font size="2"><?php echo $tampil['tujuan']?></font></td>
                                                  <td align="center"><font size="2"><?=$tampil['tgl1']?></font></td>
                                                  <td align="center"><font size="2"><?=$tampil['j_mulai']?></font></td>
                                                  <td align="center"><font size="2"><?=$tampil['j_selesai']?></font></td>
                                                  <td><font size="2"><?php echo $tampil['perihal']?></font></td>
                                                  <td><font size="2"><?php echo $nama_jabatan?></font></td>
                                                  <td><font size="2"><?php echo $tampil['keterangan']?></font></td>
                                                </tr>
                                             <?php
                                            }
                                          ?>
                                        </table>
                                      </div>
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
             url: "<?=base_url()?>C_input/sPTAEdit",
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