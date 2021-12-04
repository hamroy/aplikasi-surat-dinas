  
<style type="text/css">
  .setkol{
    background-color: gainsboro;text-align:center; font-size: 13px;
  }
</style>
<div class="page-wrapper">
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                            <div class="card-body">
                              <?php
                              $message = $this->session->flashdata('pesan');
                              echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
                              ?>
                              <?php
                              $tm_cari=$sql->row_array();
                              $indeks_surat_spt = $id;
                              $no_urut=$tm_cari['no_urut'];
                              $tgl1=$tm_cari['tgl1'];
                              $keterangan=$tm_cari['keterangan'];
                              $j_mulai=$tm_cari['j_mulai'];
                              $j_selesai=$tm_cari['j_selesai'];
                              $tujuan=$tm_cari['tujuan'];
                              $perihal=$tm_cari['perihal'];
                              $ttd=$tm_cari['ttd'];

                             
                              $getIdKegiatan=$this->M_master->getNipPeg($ttd);
                              $tampil=$getIdKegiatan->row_array();
                              $nama_jabatan = $tampil['nama_jabatan'];

                              $getPeg=$this->M_input->getsPenugasanNip($indeks_surat_spt);
                              

                              ?>

                              <div class="table-responsive">
                                <form action="" method="post">
  <table class="" border="0" width="100%">
    <tr align="center">    
    <td colspan="8" align="center"><h4><center>AGENDA SURAT PENUGASAN</center></h4></td>
    </tr>
    <tr>    
    <td>

        <table class="table1" width="100%">
          <tr>
            <td width="12%"><font size="2"><b>No Urut</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="85%"><font size="2"><?php echo $no_urut?></font></td>
          </tr>
          <tr>
            <td width="12%"><font size="2"><b>No Indeks Surat</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="85%"><font size="2"><?php echo $indeks_surat_spt?></font></td>
          </tr>
          <tr>
            <td width="12%"><font size="2"><b>Tanggal</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="85%"><font size="2"><?php echo $tgl1?></font></td>
          </tr>
          <tr>
            <td width="12%"><font size="2"><b>Mulai Jam</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="85%"><font size="2"><?php echo $j_mulai?></font></td>
          </tr>
          <tr>
            <td width="12%"><font size="2"><b>Mulai Akhir Jam</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="85%"><font size="2"><?php echo $j_selesai?></font></td>
          </tr>
          <tr>
            <td width="12%"><font size="2"><b>Tempat Tujuan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="85%"><font size="2"><?php echo $tujuan?></font></td>
          </tr>
          <tr>
            <td width="12%"><font size="2"><b>Dalam Rangka</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="85%"><font size="2"><?php echo $perihal?></font></td>
          </tr>
          <tr>
            <td width="12%"><font size="2"><b>Penanda Tangan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="85%"><font size="2"><?php echo $nama_jabatan?></font></td>
          </tr>
          <tr>
            <td width="12%"><font size="2"><b>Keterangan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="85%"><font size="2"><?php echo $keterangan?></font></td>
          </tr>
        </table>
      </td>
    </tr>
  
</table>
    <table class="table1" width="100%">
        <td width="65%">
          <a href="javascript:history.back()" class="btn"><font size="2">Back</font></a>
        </td>
        <td align="right" width="35%">
          <a   data-target="#ModalCetak" data-toggle="modal" class="btn btn-warning"><font size="2">Cetak</font></a>
          <a data-target="#ModalAdd" data-toggle="modal" class="btn btn-primary text-white"><font size="2">Tambah Data</font></a>
        </td>
      </table>
    <table class="table table-bordered">
          <tr>
          <th width="5%" style="background-color: gainsboro;text-align:center;""><font size="2">No</font></th>
          <th width="90%" style="background-color: gainsboro;"><font size="2">Nama Pegawai</font></th>
          <th width="5%" style="background-color: gainsboro;text-align:center;"><font size="2">Edit</font></th>    
          </tr>

          <?php 
            foreach ($getPeg->result_array() as $tampil){

            $nip=$tampil['id_nip'];
            $tm_cari=$this->M_master->getPegawaiId($nip)->row_array();
            $nama = $tm_cari['nama'];
            $nama_jabatan = $tm_cari['nama_jabatan'];
            $nip1 = $tm_cari['nip'];
             ?> 
                <tr>
                  <td align="center"><?php echo $indeks_surat_spt ?></td>
                  <td><font size="2"><?php echo $nama?></font></td>
                  
                  <td align="center">
                    <a   class='open_modal' id='<?php echo  $tampil['id']; ?>'><i class="far fa-edit"> Edit</i></a>  
                  </td>
                </tr>
             <?php
            }
          ?>
        </table>
  </form>
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
          <form action="<?=base_url()?>C_input/SPenugasanNipSave" name="modal_popup" enctype="multipart/form-data" method="POST">

        <input type="hidden" name="txtindeks" class="form-control" value="<?php echo $indeks_surat_spt; ?>" />
        <table class="table1" width="100%" border="0">
          <tr>
            <td colspan="2"><b>Nama Pegawai :</b></td>
          </tr>
          <tr>
            <td colspan="2">
              <select name="cbopegawai" id="cbopegawai" class="form-control" required>
                <option value=""></option>
                <?php
                $getPegInput=$this->M_master->getpegawaiInputPenugasan();
                foreach ($getPegInput->result_array() as $sql_res){
                ?>
                <option value="<?php echo $sql_res["id"]; ?>"><?php echo $sql_res["nama"]; ?> 
                
                </option>
                      <?php
                        }
                      ?>
              </select>
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
            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
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

<!-- Modal Popup untuk Cetak--> 
<div id="ModalCetak" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Cetak <?=$judul?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <form action="<?=base_url('C_cetak/sppd_SP/pdf')?>" name="modal_popup" enctype="multipart/form-data" method="POST">

          <input type="hidden" name="txtindeks" class="form-control" value="<?php echo $indeks_surat_spt; ?>" />
          <input type="hidden" name="cbopegawai1" class="form-control" value="" />

          <div class="form-group">
            <label for="exampleInputEmail1">Dasar (Inputan)</label>
            <?php
              $sql_row=$this->M_input->inpuDasar(7,1,$indeks_surat_spt);

              $sql_num=$sql_row->num_rows();
              if ($sql_num > 0) {
                foreach ($sql_row->result_array() as $sql_res){
                ?>
                  <input type="text" name="input[]" class="form-control" value="<?=$sql_res["val"]?>"><br>
                <?php
                  }
              }else{
                for ($i=1; $i < 7 ; $i++) { 
                 ?>
                  <input type="text" name="input[]" class="form-control" value=""><br>
                 <?php
                }
              }
              
            ?>
          </div> 
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


<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "<?=base_url('C_input/PenugasanNipEdit')?>",
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