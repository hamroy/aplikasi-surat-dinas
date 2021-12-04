<?php
 
  $id=$_GET['modal_id'];
  $modal=$this->M_input->getSPTAId($id);
  if($tm_cari=$modal->row_array()){
    $no_urut=$tm_cari['no_urut'];
    $indeks_surat_spt=$tm_cari['indeks_surat_spt'];
    $kd_bidang=$tm_cari['kd_bidang'];
    $keterangan=$tm_cari['keterangan'];
    $file_dok=$tm_cari['file_dok'];
    $tgl1=$tm_cari['tgl1'];
    $tgl2=$tm_cari['tgl2'];
    $tgl3=$tm_cari['tgl3'];
    $perihal=$tm_cari['perihal'];
    $tujuan=$tm_cari['tujuan'];
    $id_kegiatan=$tm_cari['id_kegiatan'];
?>

<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit <?=$judul?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <form action="<?=base_url()?>C_input/sPTAEdit_save" name="modal_popup" enctype="multipart/form-data" method="POST">
          
    <table class="table1">
              <tr>
                <td ><b>Index Surat :</b></td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="hidden" name="txtno"  class="form-control" value="<?php echo $indeks_surat_spt; ?>" />
                  <input type="text" name="txtno1" class="form-control" value="<?php echo $indeks_surat_spt; ?>" disabled />
                </td>
              </tr>
              <tr>
                <td><b>Bidang :</b></td>
              </tr>
              <tr>
               
                <td colspan="2">
                  <select name="cbobidang" id="cbobidang" class="form-control">
                  <option value=0></option>
                  <?php
                      $sql_row=$this->M_master->getBidang();
                      foreach ($sql_row->result_array() as $sql_res){
                      $k_id           = $sql_res['kd_bidang'];
                      $k_opis         = $sql_res['nm_bidang'];
                  ?>
                      <option value='<?php echo $k_id; ?>' <?php if ($k_id == $kd_bidang){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
                  <?php
                    }
                  ?>
                  </select>
                </td>
              </tr>

              <tr>
                <td ><b>Tanggal Mulai :</b></td>
                <td ><b>Tanggal Akhir :</b></td>
              </tr>

              <tr>
                <td ><input type="text" name="tanggal" id="tanggal" class="form-control" value="<?php echo $tgl1; ?>" /></td>
                <td ><input type="text" name="tanggal1" id="tanggal1" class="form-control" value="<?php echo $tgl2; ?>" /></td>
              </tr>

              <tr>
                <td ><b>Tujuan :</b></td>
              </tr>
              
              <tr>
                <td colspan="2"><input type="text" name="txttujuan"  class="form-control" value="<?php echo $tujuan; ?>" /></td>
              </tr>

              <tr>
                <td ><b>Perihal :</b></td>
              </tr>
              <tr>
                <td colspan="2"><input type="text" name="txtperihal"  class="form-control" value="<?php echo $perihal; ?>" />
                </td>
              </tr>
              <tr>
                <td><b>Kegiatan :</b></td>
              </tr>
              <tr>
                
                <td colspan="2">
                 <select name="cbokegiatan" id="cbokegiatan" class="form-control">
                  <option value=""></option>
                  <?php
                    $sql_row=$this->M_master->getKegiatan();
                      foreach ($sql_row->result_array() as $sql_res){
                      $k_id           = $sql_res['id'];
                      $k_opis         = $sql_res['nm_kegiatan'];
                  ?>
                      <option value='<?php echo $k_id; ?>' <?php if ($k_id == $id_kegiatan){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
                  <?php
                    }
                  ?>
                  </select>
                </td>
              </tr>

              <tr>
                <td ><b>Tanggal Penerbitan :</b></td>
                <td ><b>Keterangan :</b></td>
              </tr>
              <tr>
                <td >
                <input type="text" name="tanggalTerbit" class="form-control" readonly value="<?php echo $tgl3; ?>" />
                </td>
                <td ><input type="text" name="txtketerangan"  class="form-control" value="<?php echo $keterangan; ?>" /></td>
                <td ></td>
              </tr>
              <!-- <tr>
                <td ><b>Dokumen Saat Ini :</b></td>
                <td ><b>Upload Dokumen :</b></td>
              </tr>
              <tr>
                <td >
                  <input type="text" name="txtdok"  class="form-control" value="<?php echo $file_dok; ?>" readonly />
                </td>
                <td ><input name="nama_file" id="nama_file" type="file" /></td>
              </tr> -->
              <tr>
              <td><b>Link Dokumen :</b></td>
              <td width="40%"><b>Dokumen Saat Ini :</b></td>
              </tr>
              <tr>
                <td>
                  <input type="url" name="link_file"  class="form-control" value="<?php echo $tm_cari['link']; ?>"  />
                  <!-- <input name="nama_file" id="nama_file" type="file" /> -->
                  <!-- <small class="text-danger">Format file harus .PDF</small> -->
                  <input type="hidden" name="txtdok"  class="form-control" value="<?php echo $file_dok; ?>"/>
                </td>
                <td>
                  <a target="_blank" href="<?php echo $tm_cari['link']; ?>">Lihat Dokumen</a>
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