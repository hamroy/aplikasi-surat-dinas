<table class="table table-striped table-bordered setkol">
<thead>
  <tr >
    <th width="5%" style="background-color: gainsboro;text-align:center;"><font size="1">No</font></th>
    <th width="10%" style="background-color: gainsboro;"><font size="1">Indeks Surat</font></th>
    <th width="10%" style="background-color: gainsboro;"><font size="1">Nama Pegawai</font></th>
    <th width="10%" style="background-color: gainsboro;"><font size="1">Tempat Tujuan</font></th>
    <th width="8%" style="background-color: gainsboro;text-align:center;""><font size="1">Tanggal</font></th>
    <th width="8%" style="background-color: gainsboro;text-align:center;""><font size="1">Mulai Jam - Akhir Jam</font></th>
    <th width="16%" style="background-color: gainsboro;"><font size="1">Dalam Rangka</font></th>
    <th width="15%" style="background-color: gainsboro;"><font size="1">Penanda Tangan</font></th>
    <th width="10%" style="background-color: gainsboro;"><font size="1">Keterangan</font></th>
    
  </tr>
</thead>
<tbody>

<?php 
foreach ($sql->result_array() as $tampil){
  $ttd=$tampil['ttd'];
  $nip=$tampil['id_nip'];

  $gidpeg=$this->M_master->getNipPeg($ttd);
  $tm_cari=$gidpeg->row_array();
  $nama_jabatan = $tm_cari['nama_jabatan'];

  $gidpeg=$this->M_master->getPegawaiId($nip);
  $tm_cari=$gidpeg->row_array();
  $nama = $tm_cari['nama'];
 ?> 
    <tr>
      <td align="center"><font size="1"><?php echo $tampil['no_urut']?></font></td>
      <td><font size="1"><?php echo $tampil['indeks_surat_penugasan']?></font></td>
      <td><font size="1"><?php echo $nama?></font></td>
      <td><font size="1"><?php echo $tampil['tujuan']?></font></td>
      <td align="center"><font size="1"><?php echo $tampil['tgl1']?></font></td>
      <td align="center"><font size="1"><?php echo $tampil['j_mulai']?> - <?php echo $tampil['j_selesai']?></font></td>
      <td><font size="1"><?php echo $tampil['perihal']?></font></td>
      <td><font size="1"><?php echo $nama_jabatan?></font></td>
      <td><font size="1"><?php echo $tampil['keterangan']?></font></td>
    </tr>
 <?php
}
?>
</tbody>

</table>                               