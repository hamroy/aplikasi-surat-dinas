<?php
$tm_cari=$sql->row_array();

  $tgl_mulai=$this->M_set->tglIndo($tm_cari['tgl_mulai']);
  $tgl_selesai=$this->M_set->tglIndo($tm_cari['tgl_selesai']);
  $tgl_terbit=$this->M_set->tglIndo($tm_cari['tgl_terbit']);
  $perihal=$tm_cari['perihal'];
  $tujuan=$tm_cari['tujuan'];

  $getPeg=$this->M_input->getsPPD_ispt($nosurat);
  $getPeg_num=$getPeg->num_rows();
  $hnugas=10;
  $i=1;
  while ($i <= $getPeg_num) {
    # code...
    $hnugas+=88;
    $i++;
  }

$dasar = $post['input'];
$gttd1=$this->M_master->getNipPeg($post['cbopegawai1'])->row_array();
  
?>
<h5 align="center"><u>SURAT PERINTAH TUGAS</u>
<br/><small> Nomor : <?=$nosurat?></small>
</h5>


<div style="width: 100%;">
<p id="bagkiri" >Dasar  <span style="float: right; margin-right: 15px">:</span></p>
<div id="bagkanan" style="width: 100%;">
  <?php
  $no=1;
    foreach ($dasar as $key => $value) {
      if ($value=='') {
        continue;
      }
    ?>
      <p><span style="margin-right: 1px; margin-left: -15px"><?=$no++?>.</span> <?php echo $value ?> </p>
    <?php
    }
   ?>
  
</div>
</div>


<h5 align="center">MENUGASKAN :</h5>
<div class="row" style="height: <?=$hnugas?>px">
<p id="bagkiri">Kepada  <span style="float: right; margin-right: 15px">:</span></p>
<div id="bagkanan">
  <?php
  $no=1;
  foreach ($getPeg->result_array() as $tampil){
            $nip=$tampil['id_nip'];
            $tm_cari=$this->M_master->getPegawaiId($nip)->row_array();
            $tm_cariP=$this->M_master->getPangkatId($tm_cari['id_pangkat'])->row_array();
            $nama = $tm_cari['nama'];
            $nama_jabatan = $tm_cari['nama_jabatan'];
            $pangkat = $tm_cariP['nm_pangkat'];
            $nip1 = $tm_cari['nip'];
  ?>
    <p><span style="margin-right: 1px; margin-left: -15px"><?=$no++?>.</span> Nama <span style="margin-left: 40px; margin-right: 20px">: </span> <?=$nama?><br/>
      Nip <span style="margin-left: 55px; margin-right: 20px">: </span> <?=$nip1?> <br/>
      Pangkat/Gol <span style="margin-left: 3px; margin-right: 20px">: </span> <?=$pangkat?><br/>
      Jabatan <span style="margin-left: 28px; margin-right: 20px">: </span>  <?=$nama_jabatan?> <br/>
    </p>
  <?php
  }
  ?>
</div>
</div>


<div class="row" style="padding-top: -20px">
<p id="bagkiri">Untuk  <span style="float: right; margin-right: 15px">:</span></p>
<div id="bagkanan">
<p><?=$perihal?></p>

<p>Tujuan <span style="margin-left: 80px ;margin-right: 15px">:</span> <?=$tujuan?></p>
<p>Tanggal Berangkat <span style="margin-left: 10px ; margin-right: 15px">:</span> <?=$tgl_mulai?></p>
<p>Tanggal Kembali <span style="margin-left: 22px ; margin-right: 15px">:</span> <?=$tgl_selesai?></p>

</div>
</div>

<div style="width: 100%; padding-top: -70px">
<p>Demikian Surat Tugas ini diberikan untuk dilaksanakan dengan penuh tanggungjawab dan melaporkan hasil pelaksanaannya. </p>
</div>
<div style="width: 100%">
  
<div style="width: 50%; float: right; padding-top: 0px">
<p id="" style="" >
  Ditetapkan di Ranai<br/>
  pada tangggal : <?=$tgl_terbit?> <br>
</p>
<?php
if ($gttd1['idj']==1) {
  $ttd="<b>$gttd1[nama_jabatan],</b>";
}else{
  $ttd="<b><span style=\"margin-left: -20px\">a.n</span> Kepala Badan Kepegawaian dan Pengembangan
  Sumber Daya Manusia, 
  <br>$gttd1[nama_jabatan],</b>";
}
?>
<p id="" >
  <?=$ttd?>
</p>
<br>
<p id="" ><b><u><?=$gttd1['nama']?> </u></b><br/>
NIP. <?=$post['cbopegawai1']?>
</p>
</div>
</div>