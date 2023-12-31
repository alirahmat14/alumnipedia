<?= $this->extend('template/admin_layout') ?>
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
          <img src="/uploaded_img/default.jpg" alt="Profile" class="rounded-circle border border-2">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?= session()->username; ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>Admin Pedia Alumni</h6>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="/admin/profile">
              <i class="bi bi-gear"></i>
              <span>Account Settings</span>
            </a>
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
      <a class="nav-link <?= $page=='home'?'':'collapsed' ?>" href="<?= base_url('admin'); ?>">
        <i class="bi bi-grid"></i>
        <span>Beranda</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link <?= $page=='alumni'?'':'collapsed' ?>" href="<?= base_url('admin/data-alumni'); ?>">
        <i class="bi bi-person"></i>
        <span>Data Alumni</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link <?= $page=='jenjang'?'':'collapsed' ?>" href="<?= base_url('admin/jenjang-alumni'); ?>">
        <i class="bi bi-mortarboard"></i>
        <span>Tracer Study Alumni</span>
      </a>
    </li><!-- End jenjang karir alumni Page Nav -->

    <li class="nav-item">
      <a class="nav-link <?= $page=='infoz'?'':'collapsed' ?>" href="<?= base_url('admin/info'); ?>">
        <i class="bi bi-megaphone"></i>
        <span>Info Loker</span>
      </a>
    </li><!-- End info loker Page Nav -->
  </ul>
</aside><!-- End Sidebar-->
<?= $this->renderSection('content') ?>
<?= $this->endSection() ?>