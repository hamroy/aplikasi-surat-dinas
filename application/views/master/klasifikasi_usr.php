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
                                <table class="table table-striped table-bordered">
                                    <tr>    
                                            <th colspan="3">
                                                <div class="row">
                                                  <div class="col-md-8">
                                                      <form method="get">
                                                        <div class="input-group">
                                                          <input type="Search" class="form-control" name="strnama" placeholder="Nama Klasifikasi...">
                                                          <span class="input-group-btn">
                                                            <button  class="btn btn-primary" type="submit">Cari</button>
                                                          </span>
                                                        </div><!-- /input-group -->
                                                        </form>
                                                  </div>
                                                  <div class="col-md-4 pull-left">
                                                    <a href="<?=base_url('C_cetak')?>" class="btn" target="_blank">Cetak</a>
                                                </div>
                                                </div>
                                        
                                        
                                        </th>
                                          </tr>
                                          <tr>
                                        <th width="10%" style="background-color: gainsboro;"><font size="2">Kode</font></th>
                                        <th width="65%" style="background-color: gainsboro;"><font size="2">Nama Klasifikasi</font></th>
                                        <th width="25%" style="background-color: gainsboro;"><font size="2">Keterangan</font></th>
                                          </tr>

                                          <?php 
                                            foreach ($sql->result_array() as $tampil){
                                             ?> 
                                                <tr>
                                                  <td><font size="2"><?php echo $tampil['kd_klasifikasi']?></font></td>
                                                  <td><font size="2"><?php echo $tampil['nm_klasifikasi']?></font></td>
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
