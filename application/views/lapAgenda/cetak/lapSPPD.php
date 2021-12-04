<table class="table table-striped table-bordered setkol">
<thead>
  <tr >
    <th width="10%" style="background-color: gainsboro;text-align:center;"><font size="1">Nomor Registrasi</font></th>
    <th width="15%" style="background-color: gainsboro;"><font size="1">Nama</font></th>
    <th width="10%" style="background-color: gainsboro;"><font size="1">NIP</font></th>
    <th width="15%" style="background-color: gainsboro;"><font size="1">Dalam Rangka/Keperluan</font></th>
    <th width="10%" style="background-color: gainsboro;"><font size="1">Bidang/Unit</font></th>
    <th width="14%" style="background-color: gainsboro;"><font size="1">Kegiatan</font></th>
    <th width="8%" style="background-color: gainsboro;text-align:center;"><font size="1">Tgl Brgkt</font></th>
    <th width="8%" style="background-color: gainsboro;text-align:center;"><font size="1">Tgl Kmbli</font></th>
    
  </tr>
</thead>
<tbody>

<?php 
foreach ($sql->result_array() as $tampil){
  $kd_bidang=$tampil['kd_bidang'];
  $gidpeg=$this->M_master->getKdBidang($kd_bidang);
  $tm_cari=$gidpeg->row_array();
  $nm_bidang = $tm_cari['nm_bidang'];

  $getIdKegiatan=$this->M_master->getIdKegiatan($tampil['id_kegiatan']);
  $tm_cari=$getIdKegiatan->row_array();
  $nm_kegiatan = $tm_cari['nm_kegiatan'];

  $nip=$tampil['id_nip'];
  $tm_cari=$this->M_master->getPegawaiId($nip)->row_array();
  $nama = $tm_cari['nama'];
  $nip1 = $tm_cari['nip'];
 ?> 
    <tr>
      <td align="center"><font size="1"><?php echo $tampil['no_sppd']?></font></td>
      <td><font size="1"><?php echo $nama?></font></td>
      <td><font size="1"><?php echo $nip1?></font></td>
      <td><font size="1"><?php echo $tampil['perihal']?></font></td>
      <td><font size="1"><?php echo $nm_bidang?></font></td>
      <td><font size="1"><?php echo $nm_kegiatan?></font></td>
      <td align="center"><font size="1"><?php echo $tampil['tgl1']?></font></td>
      <td align="center"><font size="1"><?php echo $tampil['tgl2']?></font></td>
    </tr>
 <?php
}
?>
</tbody>

</table>                               