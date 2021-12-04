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

                                                    <label>Cari Klasifikasi Surat :</label>
                                                      <div class="form-group">
                                                        <input id="demo1" autocomplete="on" class="form-control" width="100%" type="search" name="kd_k" placeholder="Klasifikasi">
                                                        
                                                      </div>

                                                      <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Judul Klasifikasi</th>
                                                                <th width="20%">Menu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="tbody">
                                                        </tbody>
                                                        <tfoot class="tfoot">
                                                          <a href=""></a>
                                                        </tfoot>
                                                    </table>
                                      </div>
                                
                                
                            </div>
                        </div>
            </div>
        </div>
<script>
    $(document).ready(function () {
        $('#demo1').keydown(function (query, result) {
          var tbody='';
          var kd_k=$("[name='kd_k']").val();
                $.ajax({
                    type: "GET",
                    url: "<?=base_url('C_input/listKlasifikasi')?>",
                    dataType: 'html',
                    data: {'kd_k':kd_k,'js':<?=$js?>},            
                    success: function (x) {
                        
                        /* $('.tbody').append(tbody); */
                           $('.tbody').html(x);
                           console.log(x);
                    }
    });
    });
    });
</script>