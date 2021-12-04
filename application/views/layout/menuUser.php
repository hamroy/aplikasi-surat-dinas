<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <svg class="c-sidebar-brand-minimized" width="118" height="46" alt="CoreUI Logo">
      <img src="<?= base_url() ?>icon/logo.png" alt="homepage" class="dark-logo" width="40%" />
      <span class="logo-text">
        <?= $_SESSION['instansi'] ?>
      </span>
    </svg>

  </div>
  <ul class="c-sidebar-nav">

    <li class="c-sidebar-nav-title">MENU</li>

    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?= base_url('C_beranda') ?>">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="<?= base_url() ?>dist/vendors/@coreui/icons/svg/free.svg#cil-home"></use>
        </svg> BERANDA</a>
    </li>

    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="<?= base_url() ?>dist/vendors/@coreui/icons/svg/free.svg#cil-storage"></use>
        </svg> MASTER DATA</a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_master') ?>"><span class="c-sidebar-nav-icon"></span> Klasifikasi</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_master/jabatan') ?>"><span class="c-sidebar-nav-icon"></span> Jabatan</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_master/pegawai') ?>"><span class="c-sidebar-nav-icon"></span> Pegawai</a>
        </li>

      </ul>
    </li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="<?= base_url() ?>dist/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
        </svg> INPUT</a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_input') ?>">
            <span class="c-sidebar-nav-icon"></span> Agenda Surat Keluar</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_input/sMasuk') ?>">
            <span class="c-sidebar-nav-icon"></span> Agenda Surat Masuk</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_input/sKeputusan') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Keputusan</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_input/sPTA') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Perintah Tugas Anggaran</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_input/sPTNA') ?>">
            <span class="c-sidebar-nav-icon"></span> SP Tugas Non Anggaran</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_input/sPerjalananDinas') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Perjalanan Dinas</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_input/lapPerjalananDinas') ?>">
            <span class="c-sidebar-nav-icon"></span> Laporan Perjalanan Dinas</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_input/sPenugasan') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Penugasan</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_input/notaDinas') ?>">
            <span class="c-sidebar-nav-icon"></span> Nota Dinas</a>
        </li>


      </ul>
    </li>
    <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="<?= base_url() ?>dist/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
        </svg> DAFTAR AGENDA</a>
      <ul class="c-sidebar-nav-dropdown-items">

        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_agenda/sPenugasan') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Penugasan</a>
        </li>

        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_agenda/sKeluar') ?>">
            <span class="c-sidebar-nav-icon"></span> Agenda Surat Keluar</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_agenda/sMasuk') ?>">
            <span class="c-sidebar-nav-icon"></span> Agenda Surat Masuk</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_agenda/sKeputusan') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Keputusan</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_agenda') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Perintah Tugas Anggaran</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_agenda/sPTNA') ?>">
            <span class="c-sidebar-nav-icon"></span> SP Tugas Non Anggaran</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_agenda/sPerjalananDinas') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Perjalanan Dinas</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_agenda/lapPerjalananDinas') ?>">
            <span class="c-sidebar-nav-icon"></span> Laporan Perjalanan Dinas</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_agenda/notaDinas') ?>">
            <span class="c-sidebar-nav-icon"></span> Nota Dinas</a>
        </li>

      </ul>
    </li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="<?= base_url() ?>dist/vendors/@coreui/icons/svg/free.svg#cil-book"></use>
        </svg> LAPORAN AGENDA</a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_listAgenda') ?>">
            <span class="c-sidebar-nav-icon"></span> Agenda Surat Keluar</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_listAgenda/listMasuk') ?>">
            <span class="c-sidebar-nav-icon"></span> Agenda Surat Masuk</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_listAgenda/listKeputusan') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Keputusan</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_listAgenda/listPTA') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Perintah Tugas Anggaran</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_listAgenda/listPTNA') ?>">
            <span class="c-sidebar-nav-icon"></span> SP Tugas Non Anggaran</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_listAgenda/listSPPD') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Perjalanan Dinas</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_listAgenda/listLapSPPD') ?>">
            <span class="c-sidebar-nav-icon"></span> Laporan Perjalanan Dinas</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_listAgenda/listPenugasan') ?>">
            <span class="c-sidebar-nav-icon"></span> Surat Penugasan</a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="<?= base_url('C_listAgenda/listNotaDinas') ?>">
            <span class="c-sidebar-nav-icon"></span> Nota Dinas</a>
        </li>
      </ul>
    </li>

  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>