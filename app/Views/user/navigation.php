<?= $this->extend('template/user_layout') ?>
<?= $this->section('navigation') ?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="<?= base_url(); ?>" class="logo d-flex align-items-center">
    <img src="<?= base_url('assets/img/logo-pmm.png'); ?>" alt="">
    <span class="d-none d-lg-block">Alumni Pedia</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="/uploaded_img/<?= $profil['foto']; ?>" alt="Profile" class="rounded border border-2">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?= $profil['nama']; ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= $profil['nama']; ?></h6>
            <span>Pedia 20<?= str_split(session()->username)[0].str_split(session()->username)[1]; ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('user/profile'); ?>">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout'); ?>">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?= $page=='home'?'':'collapsed' ?>" href="<?= base_url('user'); ?>">
        <i class="bi bi-grid"></i>
        <span>Beranda</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link <?= $page=='profile'?'':'collapsed' ?>" href="<?= base_url('user/profile'); ?>">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link <?= $page=='jenjang'?'':'collapsed' ?>" href="<?= base_url('user/jenjang'); ?>">
        <i class="bi bi-mortarboard"></i>
        <span>Tracer Study</span>
      </a>
    </li>

  </ul>
</aside><!-- End Sidebar-->
<?= $this->renderSection('content') ?>
<?= $this->endSection() ?>