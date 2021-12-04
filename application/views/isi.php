<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="d-flex align-items-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-0">BERANDA</h4>
            <div class="ml-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item text-muted active" aria-current="page">Beranda</li>
                        <!-- <li class="breadcrumb-item text-muted" aria-current="page">Introduction</li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <hr>
                <p>Aplikasi<span class="text-danger"> Sistem Informasi pengelolaan surat-menyurat </span></p>


            </div>
        </div>
        <div class="row mt-4" align="center" style="font-size: 50px; font-family: number;">

            <?php
            $sql = $this->M_semple->getLjenisSurat();
            $aTbl = [
                '1' => "tbsurat_klr",
                '2' => "tbsurat_msk",
                '3' => "tbsurat_keputusan",
                '7' => "tbsurat_penugasan",
                '9' => "tblperjalanan_dinas",
                '10' => "tbsurat_dinas",
            ];
            foreach ($sql->result_array() as $tampil) {
                $id = $tampil['id'];
                if ($id == 5) {
                    // continue;
                }
                $kd = $tampil['kd_jenis'];
                $nm = $tampil['nm_jenis'];
                if ($id == 6 or $id == 8) {
                    $num = $this->M_semple->getNumSuratT($kd);
                } elseif ($id == 5) {
                    $num = $this->M_semple->getNumSuratPPD();
                } else {
                    $num = $this->M_semple->getNumSurat($aTbl[$id]);
                }

            ?>
                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-header bg-success">
                            <h4 class="mb-0 text-white"><?= $nm ?></h4>
                        </div>
                        <div class="card-body">

                            <p class="card-text"><?= $num ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>


        </div>
    </div>