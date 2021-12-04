<table class="table table-striped table-bordered setkol">
<thead>
  <tr >
    <th width="5%" style="background-color: gainsboro;text-align:center;"><font size="2">No</font></th>
    <th width="15%" style="background-color: gainsboro;"><font size="2">Indeks Surat</font></th>
    <th width="10%" style="background-color: gainsboro;text-align:center;""><font size="2">Tanggal</font></th>
    <th width="25%" style="background-color: gainsboro;"><font size="2">Tentang</font></th>
    <th width="20%" style="background-color: gainsboro;"><font size="2">Bidang/Unit</font></th>
    <th width="25%" style="background-color: gainsboro;"><font size="2">Keterangan</font></th>
  </tr>
</thead>
<tbody>

<?php 
foreach ($sql->result_array() as $tampil){
  $kd_bidang=$tampil['kd_bidang'];
  $gidpeg=$this->M_master->getKdBidang($kd_bidang);
  $tm_cari=$gidpeg->row_array();
  $nm_bidang = $tm_cari['nm_bidang'];
 ?> 
    <tr>
      <td align="center"><font size="2"><?php echo $tampil['no_urut']?></font></td>
      <td><font size="2"><?php echo $tampil['indeks_surat_keputusan']?></font></td>
      <td align="center"><font size="2"><?php echo $tampil['tgl1']?></font></td>
      <td><font size="2"><?php echo $tampil['tentang']?></font></td>
      <td><font size="2"><?php echo $nm_bidang?></font></td>
      <td><font size="2"><?php echo $tampil['keterangan']?></font></td>
    </tr>
 <?php
}
?>
</tbody>

</table>                               