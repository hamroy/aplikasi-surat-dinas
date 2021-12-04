                               <table class="table table-striped table-bordered">
                                <thead>
                                          <tr>
                                        <th width="10%" style="background-color: gainsboro;"><font size="2">Kode</font></th>
                                        <th width="65%" style="background-color: gainsboro;"><font size="2">Nama Klasifikasi</font></th>
                                        <th width="25%" style="background-color: gainsboro;"><font size="2">Keterangan</font></th>
                                          </tr>
                                </thead>
                                <tbody>
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
                                </tbody>
                               </table>
                                
 