<table class="table table-striped table-bordered setkol">
<thead>
  <tr >
    <th width="5%" style="background-color: gainsboro;text-align:center;"><font size="1">No</font></th>
    <th width="9%" style="background-color: gainsboro;"><font size="1">Indeks Surat</font></th>
    <th width="9%" style="background-color: gainsboro;"><font size="1">Nama Pegawai</font></th>
    <th width="8%" style="background-color: gainsboro;"><font size="1">NIP</font></th>
    <th width="9%" style="background-color: gainsboro;"><font size="1">Jabatan</font></th>
    <th width="8%" style="background-color: gainsboro;text-align:center;"><font size="1">Tgl Mulai</font></th>
    <th width="8%" style="background-color: gainsboro;text-align:center;"><font size="1">Tgl Akhir</font></th>
    <th width="9%" style="background-color: gainsboro;"><font size="1">Tujuan</font></th>
    <th width="9%" style="background-color: gainsboro;"><font size="1">Perihal</font></th>
    <th width="9%" style="background-color: gainsboro;"><font size="1">Bidang</font></th>
    <?php
    if (empty($keg)) {
      echo '<th width="10%" style="background-color: gainsboro;"><font size="1">Kegiatan</font></th>';
    }?>
    
    <th width="7%" style="background-color: gainsboro;"><font size="1">Keterangan</font></th>
    
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

  $tm_cari=$this->M_master->getPegawaiId($tampil['id_nip'])->row_array();
  $nama_jabatan = $tm_cari['nama_jabatan'];

  $nip=$tampil['id_nip'];
  $tm_cari=$this->M_master->getPegawaiId($nip)->row_array();
  $nama = $tm_cari['nama'];
  $nip1 = $tm_cari['nip'];
 ?> 
    <tr>
      <td align="center"><font size="1"><?php echo $tampil['no_urut']?></font></td>
      <td><font size="1"><?php echo $tampil['indeks_surat_spt']?></font></td>
      <td><font size="1"><?php echo $nama?></font></td>
      <td><font size="1"><?php echo $nip1?></font></td>
      <td><font size="1"><?php echo $nama_jabatan?></font></td>
      <td align="center"><font size="1"><?php echo $tampil['tgl1']?></font></td>
      <td align="center"><font size="1"><?php echo $tampil['tgl2']?></font></td>
      <td><font size="1"><?php echo $tampil['tujuan']?></font></td>
      <td><font size="1"><?php echo $tampil['perihal']?></font></td>
      <td><font size="1"><?php echo $nm_bidang?></font></td>
      <?php
      if (empty($keg)) {
        echo "<td><font size=\"1\"><?php echo $nm_kegiatan?></font></td>";
      }?>
      
      <td><font size="1"><?php echo $tampil['keterangan']?></font></td>
    </tr>
 <?php
}
?>
</tbody>

</table>                               