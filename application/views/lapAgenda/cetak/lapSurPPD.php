<table class="table table-striped table-bordered setkol" width="100%">
<thead>
  <tr >
    <th ><font size="">No</font></th>
    <th ><font size="">Indeks Surat</font></th>
    <th ><font size="">Tgl</font></th>
    <th ><font size="">Tujuan</font></th>
    <th ><font size="">Perihal</font></th>
    <th ><font size="">Bidang</font></th>
    <th ><font size="">Keterangan</font></th>
    
  </tr>
</thead>
<tbody>

<?php 
  foreach ($sql->result_array() as $tampil){
    $ttd=$tampil['kd_bidang'];
    $gidpeg=$this->M_master->getKdBidang($ttd);
    $tm_cari=$gidpeg->row_array();
    $nm_bidang = $tm_cari['nm_bidang'];
   ?> 
      <tr>
        <td align="center"><font size="2"><?php echo $tampil['no_urut']?></font></td>
        <td><font><?php echo $tampil['indeks_surat_klr']?></font></td>
        <td align="center"><font><?php echo $tampil['tgl']?></font></td>
        <td align="center"><font><?php echo $tampil['tujuan']?></font></td>
        <td><font><?php echo $tampil['perihal']?></font></td>
        <td><font><?php echo $nm_bidang?></font></td>
        <td><font><?php echo $tampil['keterangan']?></font></td>

      </tr>
   <?php
  }
?>
</tbody>

</table>                               