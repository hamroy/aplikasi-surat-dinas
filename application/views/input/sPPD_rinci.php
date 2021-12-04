
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
                            <div class="card-body">
                              <?php
                              $message = $this->session->flashdata('pesan');
                              echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
                              ?>
                              <?php
                              $tm_cari=$sql->row_array();
                              $indeks_surat_spt = $tm_cari['indeks_surat_spt'];
                              $nip = $tm_cari['id_nip'];
                              $tgl1_sppd = $tm_cari['tgl1'];
                              $tgl2_sppd = $tm_cari['tgl2'];
                              $buktikw = $tm_cari['buktikw'];
                              $tglkw = $tm_cari['tgl3'];
                              $by1 = $tm_cari['by1'];
                              $by2 = $tm_cari['by2'];
                              $by3 = $tm_cari['by3'];
                              $by4 = $tm_cari['by4'];
                              $by5 = $tm_cari['by5'];
                              $by6 = $tm_cari['by6'];
                              $brk1 = $tm_cari['brk1'];
                              $brk2 = $tm_cari['brk2'];
                              $brk3 = $tm_cari['brk3'];
                              $brk4 = $tm_cari['brk4'];
                              $brk5 = $tm_cari['brk5'];
                              $tglbrk = $tm_cari['tgl4'];
                              $brk7 = $tm_cari['brk7'];
                              $brk8 = $tm_cari['brk8'];
                              $brk9 = $tm_cari['brk9'];

                              $kbl1 = $tm_cari['kbl1'];
                              $kbl2 = $tm_cari['kbl2'];
                              $kbl3 = $tm_cari['kbl3'];
                              $kbl4 = $tm_cari['kbl4'];
                              $kbl5 = $tm_cari['kbl5'];
                              $tglkbl = $tm_cari['tgl5'];
                              $kbl7 = $tm_cari['kbl7'];
                              $kbl8 = $tm_cari['kbl8'];
                              $kbl9 = $tm_cari['kbl9'];

                              $tampil=$this->M_input->getSPTAId($indeks_surat_spt)->row_array();
                              $no_urut=$tampil['no_urut'];
                              $indeks_surat_spt=$tampil['indeks_surat_spt'];
                              $kd_bidang=$tampil['kd_bidang'];
                              $keterangan=$tampil['keterangan'];
                              $tgl1=$tampil['tgl1'];
                              $tgl2=$tampil['tgl2'];
                              $perihal=$tampil['perihal'];
                              $tujuan=$tampil['tujuan'];
                              $id_kegiatan=$tampil['id_kegiatan'];

                              $tampil=$this->M_master->getPegawaiId($nip)->row_array();
                              $nama = $tampil['nama'];
                              $nip1 = $tampil['nip'];

                              $gidpeg=$this->M_master->getKdBidang($kd_bidang);
                              $tampil=$gidpeg->row_array();
                              $nm_bidang = $tampil['nm_bidang'];

                              $getIdKegiatan=$this->M_master->getIdKegiatan($id_kegiatan);
                              $tampil=$getIdKegiatan->row_array();
                              $nm_kegiatan = $tampil['nm_kegiatan'];

                              ?>

                              <form method="POST" action="<?=base_url('C_input/ubahSPPDEdit_save/')?>" enctype="multipart/form-data">
                                <div class="table-responsive">
                                 <table class="table table-bordered">
    <tr>
                  <td>
                  <h4><a href="<?=base_url('C_input/sPerjalananDinas/')?>"><- Kembali</a></h4>
                </td>
      
    </tr>
    <tr>    
                <td>
        <table class="table1" width="100%">
          <tr>
            <td width="17%"><font size="2"><b>Nomor Registrasi</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td colspan="2"><font size="2"><?php echo $no_sppd;?></font>
                              <input type="hidden" name="txtno"  class="form-control" value="<?php echo $no_sppd; ?>" />
            </td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Nama/NIP</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td colspan="2"><font size="2"><?php echo $nama;?>&nbsp;[<i><?php echo $nip1;?></i>]</font></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Dalam Rangka/Keperluan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td colspan="2"><font size="2"><?php echo $perihal;?></font></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Bidang/Unit</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td colspan="2"><font size="2"><?php echo $nm_bidang?></font></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Tujuan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td colspan="2"><font size="2"><?php echo $tujuan;?></font></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Kegiatan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td colspan="2"><font size="2"><?php echo $nm_kegiatan;?></font></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Tgl Brgkt</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="25%"><font size="2"><?php echo $tgl1_sppd; ?></font></td>
            <td width="55%"></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Tgl Kmbli</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="25%"><font size="2"><?php echo $tgl2_sppd; ?></font></td>
            <td width="55%"></td>
          </tr>
        </table>
      </td>
    </tr>
      <tr>    
      <td bgcolor="gainsboro"><font size="2"><b>Tanda Bukti/Kwitansi</b></font></td>
            </tr>
      <tr>    
      <td>
        <table class="table1 bcForm" width="100%">
          <tr>
            <td width="17%"><font size="2"><b>No. Bukti</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txtbuktikw"  class="form-control" value="<?php echo $buktikw; ?>"  /></td>
            <td width="17%"><font size="2"><b>Tanggal Bukti</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="tanggal2" id="tanggal2"  class="form-control" 
                value="<?php 
                if($tglkw<>'00/00/0000') {
                  echo $tglkw; 
                } 
              ?>" />
            </td>
          </tr>
              </table>
          </td>
            </tr>
      <tr>    
      <td bgcolor="gainsboro"><font size="2"><b>Rincian Biaya</b></font></td>
            </tr>
      <tr>    
      <td>
        <table class="table1 bcForm" width="100%">
          <tr valign="top">
            <td width="17%"><font size="2"><b>Uang Harian</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt1"  class="form-control" value="<?php echo $by1; ?>"  /></td>
            <td width="17%"><font size="2"><b>Biaya Transport/Bantuan Transportasi</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt2"  class="form-control" value="<?php echo $by2; ?>"  /></td>
          </tr>
          <tr valign="top">
            <td width="17%"><font size="2"><b>Biaya Penginapan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt3"  class="form-control" value="<?php echo $by3; ?>"  /></td>
            <td width="17%"><font size="2"><b>Uang Representasi</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt4"  class="form-control" value="<?php echo $by4; ?>"  /></td>
          </tr>
          <tr valign="top">
            <td width="17%"><font size="2"><b>Sewa Kendaraan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt5"  class="form-control" value="<?php echo $by5; ?>"  /></td>
            <td width="17%"><font size="2"><b>Biaya Lain/ Kontribusi</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt6"  class="form-control" value="<?php echo $by6; ?>"  /></td>
          </tr>
              </table>
          </td>
            </tr>
      <tr>    
      <td bgcolor="gainsboro"><font size="2"><b>Data Transportasi/Akomodasi</b></font></td>
            </tr>
      <tr>    
      <td bgcolor="yellow"><font size="2"><b>Berangkat</b></font></td>
            </tr>
      <tr>    
      <td>
        <table class="table1 bcForm" width="100%">
          <tr>
            <td width="17%"><font size="2"><b>Pswt/ KA</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_1a"  class="form-control" value="<?php echo $brk1; ?>"  /></td>
            <td width="17%"><font size="2"><b>Nomor Tiket</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_2a"  class="form-control" value="<?php echo $brk2; ?>"  /></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Nomor Flight</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_3a"  class="form-control" value="<?php echo $brk3; ?>"  /></td>
            <td width="17%"><font size="2"><b>Jam</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_4a"  class="form-control" value="<?php echo $brk4; ?>"  /></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>No. Tmpt Duduk</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_5a"  class="form-control" value="<?php echo $brk5; ?>"  /></td>
            <td width="17%"><font size="2"><b>Tgl Keberangkatan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="tanggal3" id="tanggal3"  class="form-control" 
                value="<?php 
                if($tglbrk<>'00/00/0000') {
                  echo $tglbrk; 
                } 
              ?>" />
            </td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Asal</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_7a"  class="form-control" value="<?php echo $brk7; ?>"  /></td>
            <td width="17%"><font size="2"><b>Tujuan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_8a"  class="form-control" value="<?php echo $brk8; ?>"  /></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Harga</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_9a"  class="form-control" value="<?php echo $brk9; ?>"  /></td>
            <td width="17%"><font size="2"><b></b></font></td>
            <td width="3%" align="center"><font size="2"><b></b></font></td>
            <td width="30%"></td>
          </tr>
              </table>
          </td>
            </tr>
      <tr>    
      <td bgcolor="yellow"><font size="2"><b>Kembali</b></font></td>
            </tr>
      <tr>    
      <td>
        <table class="table1 bcForm" width="100%">
          <tr>
            <td width="17%"><font size="2"><b>Pswt/ KA</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_1b"  class="form-control" value="<?php echo $kbl1; ?>"  /></td>
            <td width="17%"><font size="2"><b>Nomor Tiket</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_2b"  class="form-control" value="<?php echo $kbl2; ?>"  /></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Nomor Flight</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_3b"  class="form-control" value="<?php echo $kbl3; ?>"  /></td>
            <td width="17%"><font size="2"><b>Jam</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_4b"  class="form-control" value="<?php echo $kbl4; ?>"  /></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>No. Tmpt Duduk</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_5b"  class="form-control" value="<?php echo $kbl5; ?>"  /></td>
            <td width="17%"><font size="2"><b>Tgl Kembali</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="tanggal4" id="tanggal4"  class="form-control" 
                value="<?php 
                if($tglkbl<>'00/00/0000') {
                  echo $tglkbl; 
                } 
              ?>" />
            </td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Asal</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_7b"  class="form-control" value="<?php echo $kbl7; ?>"  /></td>
            <td width="17%"><font size="2"><b>Tujuan</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_8b"  class="form-control" value="<?php echo $kbl8; ?>"  /></td>
          </tr>
          <tr>
            <td width="17%"><font size="2"><b>Harga</b></font></td>
            <td width="3%" align="center"><font size="2"><b>:</b></font></td>
            <td width="30%"><input type="text" name="txt_9b"  class="form-control" value="<?php echo $kbl9; ?>"  /></td>
            <td width="17%"><font size="2"><b></b></font></td>
            <td width="3%" align="center"><font size="2"><b></b></font></td>
            <td width="30%"></td>
          </tr>
              </table>
          </td>
            </tr>
      <tr>    
                  <td>
                  <button class="btn btn-success" type="submit">Confirm</button>
            </td>
      </tr>
        </table>     
                                </div>
                              </form>
                            </div>
        </div>