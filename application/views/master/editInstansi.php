<?php
 
  $id=$_GET['modal_id'];
  $modal=$this->M_master->getInstansiId($id);
  if($r=$modal->row_array()){
?>

<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Instansi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <form action="<?=base_url()?>C_master/instansiedit_save" name="modal_popup" enctype="multipart/form-data" method="POST">
          
    <table class="table1" width="100%">
      <tr>
        <td width="50%"><b>Kode :</b></td>
        <td width="50%"></td>
      </tr>
      <tr>
        <td width="50%">
         <input type="hidden" name="txtkd"  class="form-control" value="<?php echo $r['kd_instansi']; ?>" />
          <input type="text" name="txtkd1"  class="form-control" value="<?php echo $r['kd_instansi']; ?>" disabled />
        </td>
        <td width="50%"></td>
      </tr>
      <tr>
        <td colspan="2"><b>Nama Instansi :</b></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" name="txtnm"  class="form-control" value="<?php echo $r['nm_instansi']; ?>" /></td>
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