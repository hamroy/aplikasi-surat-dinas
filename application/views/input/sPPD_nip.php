<style type="text/css">
  .setkol {
    background-color: gainsboro;
    text-align: center;
    font-size: 13px;
  }
</style>
<div class="page-wrapper">

  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="card-body">
    <?php
    $message = $this->session->flashdata('pesan');
    echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
    ?>
    <?php
    $tm_cari = $sql->row_array();

    $no_urut = $tm_cari['no_urut'];
    $indeks_surat_spt = $tm_cari['indeks_surat_spt'];
    $kd_bidang = $tm_cari['kd_bidang'];
    $jnsTugas = $kd_jenis = $tm_cari['kd_jenis'];
    $keterangan = $tm_cari['keterangan'];
    $tgl1 = $tm_cari['tgl1'];
    $tgl2 = $tm_cari['tgl2'];
    $tgl_mulai = $tm_cari['tgl_mulai'];
    $tgl_selesai = $tm_cari['tgl_selesai'];
    $perihal = $tm_cari['perihal'];
    $tujuan = $tm_cari['tujuan'];
    $id_kegiatan = $tm_cari['id_kegiatan'];

    $gidpeg = $this->M_master->getKdBidang($kd_bidang);
    $nm_bidang = '';
    if ($gidpeg->num_rows() > 0) {
      $tampil = $gidpeg->row_array();
      $nm_bidang = $tampil['nm_bidang'];
    }
    $getIdKegiatan = $this->M_master->getIdKegiatan($id_kegiatan);
    $nm_kegiatan = '';
    if ($getIdKegiatan->num_rows() > 0) {
      $tampil = $getIdKegiatan->row_array();
      $nm_kegiatan = $tampil['nm_kegiatan'];
    }



    $getPeg = $this->M_input->getsPPD_ispt($indeks_surat_spt);
    $getPegInput = $this->M_master->getpegawaiInput();

    ?>

    <div class="table-responsive">
      <form action="" method="post">
        <table class="" width="100%">
          <tr align="center">
            <?php
            if ($jnsTugas == "SPT") {
            ?>
              <td colspan="8" align="center">
                <h4>
                  <center>AGENDA SURAT PERINTAH TUGAS NON ANGGARAN</center>
                </h4>
              </td>
            <?php
            } else {
            ?>
              <td colspan="8">
                <h4>
                  <center>AGENDA SURAT PERINTAH TUGAS</center>
                </h4>
              </td>
            <?php
            }

            ?>
          </tr>
          <tr>
            <td>

              <table class="table1" width="100%">
                <tr>
                  <td width="12%">
                    <font size="2"><b>No Urut</b></font>
                  </td>
                  <td width="3%" align="center">
                    <font size="2"><b>:</b></font>
                  </td>
                  <td width="85%">
                    <font size="2"><?php echo $no_urut; ?></font>
                  </td>
                </tr>
                <tr>
                  <td width="12%">
                    <font size="2"><b>No Indeks Surat</b></font>
                  </td>
                  <td width="3%" align="center">
                    <font size="2"><b>:</b></font>
                  </td>
                  <td width="85%">
                    <font size="2"><?php echo $indeks_surat_spt; ?></font>
                  </td>
                </tr>
                <tr>
                  <td width="12%">
                    <font size="2"><b>Tanggal Mulai</b></font>
                  </td>
                  <td width="3%" align="center">
                    <font size="2"><b>:</b></font>
                  </td>
                  <td width="85%">
                    <font size="2"><?php echo $tgl1; ?></font>
                  </td>
                </tr>
                <tr>
                  <td width="12%">
                    <font size="2"><b>Tanggal Akhir</b></font>
                  </td>
                  <td width="3%" align="center">
                    <font size="2"><b>:</b></font>
                  </td>
                  <td width="85%">
                    <font size="2"><?php echo $tgl2; ?></font>
                  </td>
                </tr>
                <tr>
                  <td width="12%">
                    <font size="2"><b>Tujuan</b></font>
                  </td>
                  <td width="3%" align="center">
                    <font size="2"><b>:</b></font>
                  </td>
                  <td width="85%">
                    <font size="2"><?php echo $tujuan; ?></font>
                  </td>
                </tr>
                <tr>
                  <td width="12%">
                    <font size="2"><b>Perihal</b></font>
                  </td>
                  <td width="3%" align="center">
                    <font size="2"><b>:</b></font>
                  </td>
                  <td width="85%">
                    <font size="2"><?php echo $perihal; ?></font>
                  </td>
                </tr>
                <tr>
                  <td width="12%">
                    <font size="2"><b>Bidang</b></font>
                  </td>
                  <td width="3%" align="center">
                    <font size="2"><b>:</b></font>
                  </td>
                  <td width="85%">
                    <font size="2"><?php echo $nm_bidang ?></font>
                  </td>
                </tr>
                <tr>
                  <td width="12%">
                    <font size="2"><b>Kegiatan</b></font>
                  </td>
                  <td width="3%" align="center">
                    <font size="2"><b>:</b></font>
                  </td>
                  <td width="85%">
                    <font size="2"><?php echo $nm_kegiatan ?></font>
                  </td>
                </tr>
                <tr>
                  <td width="12%">
                    <font size="2"><b>Keterangan</b></font>
                  </td>
                  <td width="3%" align="center">
                    <font size="2"><b>:</b></font>
                  </td>
                  <td width="85%">
                    <font size="2"><?php echo $keterangan ?></font>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

        </table>
        <table class="table1" width="100%">
          <td width="70%">
            <a href="javascript:history.back()" class="btn">
              <font size="2">Back</font>
            </a>
          </td>
          <td align="right" width="30%">
            <a data-target="#ModalCetak" data-toggle="modal" class="btn btn-warning">
              <font size="2">Cetak</font>
            </a>
            <a data-target="#ModalAdd" data-toggle="modal" class="btn btn-primary text-white">
              <font size="2">Tambah Data</font>
            </a>
          </td>
        </table>
        <table class="table table-bordered">
          <tr>
            <th width="20%" style="background-color: gainsboro;">
              <font size="2">Nomor Registrasi</font>
            </th>
            <th width="15%" style="background-color: gainsboro;">
              <font size="2">Nama Pegawai</font>
            </th>
            <th width="10%" style="background-color: gainsboro;">
              <font size="2">NIP</font>
            </th>
            <th width="25%" style="background-color: gainsboro;">
              <font size="2">Jabatan</font>
            </th>
            <th width="10%" style="background-color: gainsboro;text-align:center;">
              <font size="2">Tgl Mulai SPPD</font>
            </th>
            <th width="10%" style="background-color: gainsboro;text-align:center;">
              <font size="2">Tgl Akhir SPPD</font>
            </th>
            <th width="5%" style="background-color: gainsboro;text-align:center;">
              <font size="2">Menu</font>
            </th>
          </tr>

          <?php
          foreach ($getPeg->result_array() as $tampil) {

            $nip = $tampil['id_nip'];
            $tm_cari = $this->M_master->getPegawaiId($nip)->row_array();
            $nama = $tm_cari['nama'];
            $nama_jabatan = $tm_cari['nama_jabatan'];
            $nip1 = $tm_cari['nip'];
          ?>
            <tr>
              <td>
                <font size="2"><?php
                                if ($jnsTugas == "SPT") {
                                  echo $indeks_surat_spt;
                                } else {
                                  echo $tampil['no_sppd'];
                                }

                                ?></font>
              </td>
              <td>
                <font size="2"><?php echo $nama ?></font>
              </td>
              <td>
                <font size="2"><?php echo $nip1 ?></font>
              </td>
              <td>
                <font size="2"><?php echo $nama_jabatan ?></font>
              </td>
              <td align="center">
                <font size="2"><?php echo $tampil['tgl1'] ?></font>
              </td>
              <td align="center">
                <font size="2"><?php echo $tampil['tgl2'] ?></font>
              </td>

              <td align="center">
                <!--Rev 202001 by:ilham-->
                <a class='open_modal' id='<?php echo  $tampil['no_sppd']; ?>'><i class="fa fa-edit"> Edit</i></a>
                <?php
                $akses = $this->session->userdata('lvl_akses');
                if ($tampil['no_sppd'] and $akses == 1) {
                ?>
                  <a class="tom_del" onclick="confirm_modal('<?= base_url() ?>C_input/sPPDNipDel?&modal_id=<?= $tampil['no_sppd'] ?>')"><i class="fa fa-times-circle"> Hapus</i></a>
                <?php
                }
                ?>

              </td>
            </tr>
          <?php
          }
          ?>
        </table>
      </form>
    </div>

    <!-- Modal Popup untuk Add-->
    <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Input <?= $judul ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>

          <div class="modal-body">
            <form action="<?= base_url() ?>C_input/SPPDNipSave" name="modal_popup" enctype="multipart/form-data" method="POST">

              <input type="hidden" name="txtindeks" class="form-control" value="<?php echo $indeks_surat_spt; ?>" />
              <table class="table1" width="100%" border="0">
                <tr>
                  <td colspan="2"><b>Nama Pegawai :</b></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <input type="hidden" name="kd_jenis" value="<?= $kd_jenis ?>">
                    <select name="cbopegawai" id="cbopegawai" class="form-control" required>
                      <option value=""></option>
                      <?php
                      foreach ($getPegInput->result_array() as $sql_res) {

                        if ($sql_res["tgl_selesai_sppd"] != null and $sql_res["tgl_selesai_sppd"] > $tgl_mulai) {
                          continue;
                        }

                        if ($sql_res["tgl_selesai_sppd"] == $tgl_selesai) {
                          continue;
                        }

                      ?>
                        <option value="<?php echo $sql_res["id"]; ?>"><?php echo $sql_res["nama"]; ?>

                        </option>
                      <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
              </table>
              <br>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Confirm
                </button>

                <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                  Cancel
                </button>
              </div>

            </form>



          </div>


        </div>
      </div>
    </div>

    <!-- Modal Popup untuk Cetak-->
    <div id="ModalCetak" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Cetak <?= $judul ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>

          <div class="modal-body">
            <form action="<?= base_url('C_cetak/sppd_SPT/pdf') ?>" name="modal_popup" enctype="multipart/form-data" method="POST">
              <?php
              $jnsTugas;
              if ($jnsTugas == 'SPT') {
                $jnsTugas = 8;
              } else {
                $jnsTugas = 6;
              }
              ?>
              <input type="hidden" name="txtindeks" class="form-control" value="<?php echo $indeks_surat_spt; ?>" />
              <input type="hidden" name="jenisSurat" class="form-control" value="<?php echo $jnsTugas; ?>" />

              <div class="form-group">
                <label for="exampleInputEmail1">Dasar (Inputan)</label>
                <?php
                $sql_row = $this->M_input->inpuDasar($jnsTugas, 1, $indeks_surat_spt);

                $sql_num = $sql_row->num_rows();
                if ($sql_num > 0) {
                  foreach ($sql_row->result_array() as $sql_res) {
                ?>
                    <input type="text" name="input[]" class="form-control" value="<?= $sql_res["val"] ?>"><br>
                  <?php
                  }
                  $nipTtd = $this->M_input->inpuDasar($jnsTugas, 0, $indeks_surat_spt)->row_array();
                } else {
                  for ($i = 1; $i < 7; $i++) {
                  ?>
                    <input type="text" name="input[]" class="form-control" value=""><br>
                <?php
                  }
                  $nipTtd['ttd'] = '';
                }

                ?>

              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Penandatangan <?= $nipTtd['ttd'] ?>
                </label>
                <select name="cbopegawai1" id="cbopegawai1" class="form-control" required>
                  <option value=""></option>
                  <?php
                  $sql_row = $this->M_master->jabatanPeg();

                  foreach ($sql_row->result_array() as $sql_res) {
                  ?>
                    <option value="<?php echo $sql_res["nip"]; ?>" <?= ($nipTtd['ttd'] == $sql_res["nip"]) ? "selected" : "" ?>><?php echo $sql_res["nama_jabatan"]; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Confirm
                </button>

                <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                  Cancel
                </button>
              </div>

            </form>



          </div>


        </div>
      </div>
    </div>

    <!-- Modal Popup untuk Edit-->
    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>

    <!-- Modal Popup untuk delete-->
    <div class="modal fade" id="modal_delete">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>

          <div class="modal-body">

            <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>



            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
              <a class="btn btn-danger" id="delete_link">Delete</a>
              <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            </div>

          </div>
        </div>
      </div>
    </div>


    <!-- Javascript untuk popup modal Delete-->
    <script type="text/javascript">
      function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
          backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
      }
    </script>

    <!-- Javascript untuk popup modal Edit-->
    <script type="text/javascript">
      $(document).ready(function() {
        $(".open_modal").click(function(e) {
          var m = $(this).attr("id");
          $.ajax({
            url: "<?= base_url('C_input/SPPDNipEdit') ?>",
            type: "GET",
            data: {
              modal_id: m,
            },
            success: function(ajaxData) {
              $("#ModalEdit").html(ajaxData);
              $("#ModalEdit").modal('show', {
                backdrop: 'true'
              });
            }
          });
        });
      });
    </script>