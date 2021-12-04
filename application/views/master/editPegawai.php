<?php
 
  $id=$_GET['modal_id'];
  $modal=$this->M_master->getPegawaiId($id);
  if($r=$modal->row_array()){
?>

<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit <?=$judul?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <form action="<?=base_url()?>C_master/pegawaiedit_save" name="modal_popup" enctype="multipart/form-data" method="POST">
          
    <table class="table1" width="100%">
      <tr>
        <td width="30%"><b>NIP :</b></td>
        <td width="70%"><b>Nama Pegawai :</b></td>
      </tr>
      <tr>
        <td width="30%">
          <input type="hidden" name="txtid"  class="form-control" value="<?php echo $id; ?>" />       
          <input type="text" name="txtnip"  class="form-control" value="<?php echo $r['nip']; ?>" />
        </td>
        <td width="70%"><input type="text" name="txtnm"  class="form-control" value="<?php echo $r['nama']; ?>" /></td>
      </tr>
      <tr>
        <td colspan="2"><b>Jabatan :</b></td>
      </tr>
      <tr>
        <td colspan="2">
                        <select name="cbojabatan" id="cbojabatan" class="form-control">
            <option value=0></option>
            <?php
              $sql_row=$this->M_master->getJabatan();
              foreach ($sql_row->result_array() as $sql_res)
              {
                $k_id           = $sql_res['idj'];
                $k_opis         = $sql_res['nmj'];
            ?>
            <option value='<?php echo $k_id; ?>' <?php if ($k_id == $r['idj']){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
            <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2"><b>Pangkat :</b></td>
      </tr>
      <tr>
        <td colspan="2">
          <select name="pangkat" id="pangkat" class="form-control">
            <option value=""></option>
            <?php
            $sql_row=$this->M_master->getPangkat();
            foreach ($sql_row->result_array() as $sql_res)
            {
              $k_id           = $sql_res['id'];
              $k_opis         = $sql_res['nm_pangkat'];
            ?>
            <option value="<?php echo $k_id ?>" <?php if ($k_id == $r['id_pangkat']){ echo 'selected'; } ?> ><?php echo $sql_res["nm_pangkat"]; ?></option>
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