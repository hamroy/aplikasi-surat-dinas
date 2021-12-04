<header class="c-header c-header-light c-header-fixed c-header-with-subheader">

  <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
    <svg class="c-icon c-icon-lg">
      <img src="<?= base_url() ?>img/logo.png" alt="homepage" class="dark-logo" width="40%" />
      <span class="logo-text">
        <?= $_SESSION['instansi'] ?>
      </span>
    </svg>
  </button>


  <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
    <svg class="c-icon c-icon-lg">
      <use xlink:href="<?= base_url() ?>dist/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
    </svg>
  </button>
  <ul class="c-header-nav d-md-down-none">
    <!-- <li class="c-header-nav-item px-3"><a class="c-header-nav-link"  >Dashboard</a></li> -->
    <li class="c-header-nav-item px-3">
      <marquee>
        <a class="nav-link" href="<?= base_url('C_beranda') ?>" role="button">
          Selamat Datang di Sistem Administrasi Tata Usaha Badan Kepegawaiandan Pengembangan Sumber Daya Manusia <?= date("Y") ?>
        </a>
      </marquee>
    </li>
  </ul>
  <ul class="c-header-nav ml-auto mr-4">
    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">
        <?= $_SESSION['nm_user'] ?></a></li>

    <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <div class="c-avatar">
          <img class="c-avatar-img" src="<?= base_url($_SESSION['profil']) ?>" alt="user@email.com">
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-right pt-0">
        <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
        <a class="dropdown-item" href="<?= base_url('C_beranda/profil') ?>">
          <svg class="c-icon mr-2">
            <use xlink:href="<?= base_url() ?>dist/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
          </svg> Profile
        </a>
        <a class="dropdown-item" href="<?= base_url('C_beranda/gantiSandi') ?>">
          <svg class="c-icon mr-2">
            <use xlink:href="<?= base_url() ?>dist/vendors/@coreui/icons/svg/free.svg#cil-shield-alt"></use>
          </svg> Ganti Password
        </a>
        <a class="dropdown-item" onclick="return confirm('Anda yakin')" href="<?= base_url('C_login/logout') ?>">
          <svg class="c-icon mr-2">
            <use xlink:href="<?= base_url() ?>dist/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
          </svg> Logout</a>
      </div>
    </li>
  </ul>
</header>
<!-- </header> -->