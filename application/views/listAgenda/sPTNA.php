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
                  
                    
                            <div class="card-body">
                              
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
                                            <th ><font size="">Tgl Penetapan</font></th>
                                            <th ><font size="">Tgl Mulai</font></th>
                                            <th ><font size="">Tgl Akhir</font></th>
                                            <th ><font size="">Tujuan</font></th>
                                            <th ><font size="">Perihal</font></th>
                                            <th ><font size="">Bidang</font></th>
                                            <th ><font size="">Kegiatan</font></th>
                                            <th ><font size="">Keterangan</font></th>
                                            <th ><font size="">File</font></th>
                                            <th ><font size="">Jumlah Personil</font></th>
                                          </tr>

                                          <?php 
                                            foreach ($sql->result_array() as $tampil){
                                              $kd_bidang=$tampil['kd_bidang'];
                                              $file_dok=$tampil['file_dok'];
                                              
                                              $gidpeg=$this->M_master->getKdBidang($kd_bidang);
                                              $tm_cari=$gidpeg->row_array();
                                              $nm_bidang = $tm_cari['nm_bidang'];
                                              $getIdKegiatan=$this->M_master->getIdKegiatan($tampil['id_kegiatan']);
                                              $tm_cari=$getIdKegiatan->row_array();
                                              $nm_kegiatan = $tm_cari['nm_kegiatan'];
                                              $tm_cari=$this->M_master->jumPersonil($tampil['indeks_surat_spt'])
                                              ->row_array();
                                              $jml = $tm_cari['jml'];
                                             ?> 
                                                <tr>
                                                  <td align="center"><font size="2"><?php echo $tampil['no_urut']?></font></td>
                                                  <td><font><?php echo $tampil['indeks_surat_spt']?></font></td>
                                                  <td align="center"><font><?php echo $tampil['tgl3']?></font></td>
                                                  <td align="center"><font><?php echo $tampil['tgl1']?></font></td>
                                                  <td align="center"><font><?php echo $tampil['tgl2']?></font></td>
                                                  <td><font><?php echo $tampil['tujuan']?></font></td>
                                                  <td><font><?php echo $tampil['perihal']?></font></td>
                                                  <td><font><?php echo $nm_bidang?></font></td>
                                                  <td><font><?php echo $nm_kegiatan?></font></td>
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
                                                    <font size="2"><i>No Files</i></font>
                                                    <?php
                                                      }
                                                    ?>
                                                  </td>

                                                  <td>
                                                    <font size="2"><?=$jml;?></font>
                                                    
                                                  </td>
                                                  
                                                 
                                                </tr>
                                             <?php
                                            }
                                          ?>
                                        </table>
                                      </div>
                            </div>
        </div>
