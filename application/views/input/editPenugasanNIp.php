<?php
 
  $id=$_GET['modal_id'];
  $modal=$this->M_input->getSPenugasanNIpId($id);
  if($r=$modal->row_array()){
    $indeks_surat_penugasan=$r['indeks_surat_penugasan'];
?>

<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit <?=$judul?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <form action="<?=base_url()?>C_input/sPenugasanNipEdit_save" name="modal_popup" enctype="multipart/form-data" method="POST">
          
    <input type="hidden" name="txtid"  class="form-control" value="<?php echo $id; ?>" />
        <input type="hidden" name="txtidpenugasan"  class="form-control" value="<?php echo $r['indeks_surat_penugasan']; ?>" />
        <table class="table1" width="100%">
          <tr>
            <td width="100%"><b>Index Surat :</b></td>
          </tr>
          <tr>
            <td width="50%">
              <input type="text" name="txtidpenugasan1"  class="form-control" 
              value="<?php echo $r['indeks_surat_penugasan']; ?>" disabled />
            </td>
          </tr>
          <tr>
            <td colspan="2"><b>Nama Pegawai :</b></td>
          </tr>
          <tr>
            <td colspan="2">
                            <select name="cbopegawai" id="cbopegawai" class="form-control">
              <option value=0></option>
              <?php
                $getPegInput=$this->M_master->getpegawaiInputPenugasan();
                foreach ($getPegInput->result_array() as $row1){
                  $k_id           = $row1['id'];
                  $k_opis         = $row1['nama'];
              ?>
                  <option value='<?php echo $k_id; ?>' <?php if ($k_id == $r['id_nip']){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
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

             <?php } ?>

            </div>

           
        </div>
    </div>

    <style>
    .datepicker{z-index:1151;}
      </style>
      <script>
    $(function(){
        $("#tanggal1, #tanggal2").datepicker({
      format:'dd/mm/yyyy'
        });
                });
      </script>