<?= $this->extend('template/home_layout') ?>

<?= $this->section('content') ?>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img src="<?= base_url('assets/img/logo-pmm.png') ?>">
        <h1>Alumni  Pedia</h1>
        
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#testimoni">Testimonial</a></li>
          <?php if(session()->has('username') != 1): ?>
            <li><a class="get-a-quote" href="login">LOGIN</a></li>
          <?php else: ?>
            <li>
            <a class="nav-link scrollto text-danger fw-bold" href="<?= base_url('logout'); ?>">              
              <span><i class="bi bi-box-arrow-right"></i> Sign Out</span>
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

    <section style="background-color: #0e1d34">
        <div class="container">
            <div class="row my-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hasil Pencarian Data Alumni</h5>
                            <h6 class="card-subtitle">Kata kunci : <?= $keyword; ?></h6>
                            <div class="row my-4">
                                <div class="overflow-x-auto overflow-auto">
                                <?php if (empty($hasil)): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <i class="bi bi-exclamation-triangle-fill"></i> Data Alumni Tidak Ditemukan!
                                    </div>
                                <?php else : ?>
                                    <table class="table table-responsive" id="tabel-search">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Angkatan</th>
                                            <th scope="col">Tahun Lulus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($hasil as $h) : ?>
                                        <tr>
                                            <th scope="row"><?= $no; ?></th>
                                            <td><?= $h['username']; ?></td>
                                            <td><?= $h['nama']; ?></td>
                                            <td><?= $h['angkatan']; ?></td>
                                            <td><?= $h['tahun_lulus']; ?></td>
                                        </tr>
                                        <?php $no++; endforeach; ?>                     
                                    </tbody>
                                    </table>
                                <?php endif ?>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
    </div>
    <div class="container mt-4">
      <div class="copyright">
         <h4>Contact Us</h4>
          <p>
            Jl. Pendidikan No. 15, Cibiru Wetan, Kec. Cileunyi, Kabupaten Bandung, Jawa Barat 40625 <br>
            <strong>Phone :</strong> (022) 7801840 - (022) 2013163<br>
          </p>
      </div>
    </div>
    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Alumni Pedia</span></strong>. 2023
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?= $this->endSection() ?>