<?php
 
  $id=$_GET['modal_id'];
  $modal=$this->M_master->getUserId($id);
  if($r=$modal->row_array()){
?>

<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit <?=$judul?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <form action="<?=base_url()?>C_master/useredit_save" name="modal_popup" enctype="multipart/form-data" method="POST">
          
    <input type="hidden" name="kode"  class="form-control" value="<?php echo $r['id_user']; ?>"/>
      <table class="table1" width="100%">
      <tr>
        <td>&nbsp;<b>Nama Pegawai :</b></td>
      </tr>x
      <tr>
        <td>
                        <select name="namapeg" id="lvl" class="form-control">
                <option value="">-Pilih Pegawai-</option>
                <?php
                  $sql_row=$this->M_master->getPegawai();
                  foreach ($sql_row->result_array() as $sql_res){
                    $k_id           = $sql_res['id'];
                ?>
                <option value="<?php echo $sql_res["id"]; ?>" <?php if ($k_id == $r['id_peg']){ echo 'selected'; } ?>><?php echo $sql_res["nama"]; ?></option>
                      <?php
                      }
                      ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>&nbsp;<b>Nama User :</b></td>
      </tr>
    
      <tr>
        <td><input type="text" name="nama" id="nama" class="form-control" required value="<?php echo $r['nip']; ?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;<b>Password :</b></td>
      </tr>
      <tr>
        <td><input type="text" name="pwd" class="form-control" value="<?php echo $r['pwd']; ?>"/>
      </tr>
      <tr>
        <td>&nbsp;<b>Level Akses :</b></td>
      </tr>
      <tr>
        <td>
          <select name="lvl" id="lvl" class="form-control">
            <option value="">-Pilih Level Akses-</option>
            <?php
              $sql_row=$this->M_master->getAkses();
              foreach ($sql_row->result_array() as $sql_res){
                $k_id           = $sql_res['id'];
                $k_opis         = $sql_res['nama_level'];
            ?>
            <option value='<?php echo $k_id; ?>' <?php if ($k_id == $r['lvl_akses']){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
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