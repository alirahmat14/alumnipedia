<?= $this->extend('template/home_layout') ?>

<?= $this->section('content') ?>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/img/logo-pmm.png') ?>">
        <h1>Alumni Pedia</h1>        
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
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
      </nav>
    </div>
  </header>
  <!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Welcome To Pedia Alumni</h2>
          <p data-aos="fade-up" data-aos-delay="100">Sistem Informasi Pendataan Alumni Program Studi Pendidikan Multimedia
            Universitas Pendidikan Indonesia Kampus Daerah Cibiru</p>

          <form action="/search" method="get" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search Alumni">
            <button type="submit" class="btn btn-orange">Search</button>
          </form>
          

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">
            
            <?php foreach($angkatan as $ak): ?>
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="<?= $ak['jumlah']; ?>" data-purecounter-duration="2" class="purecounter"></span>
                <p>Alumni <?= $ak['angkatan']; ?></p>
              </div>
            </div><!-- End Stats Item -->
            <?php endforeach; ?>

          </div>
        </div>
        
       

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

  
    <!-- ======= About Us Section ======= -->
    
    <section id="about" class="about pt-0">
      <div class="container" data-aos="fade-up">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <span>About Us</span>
            <h2>About Us</h2>
  
          </div>
        

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="<?= base_url('assets/img/about.jpg') ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 content order-last order-lg-first">
            <p>Kompetensi Bidang Keahlian Alumni Program Studi Multimedia :</p>

            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-controller"></i>
                <div>
                  <h5>Digital Media & Game</h5>
                  <p>Interactive Media Digital, Game Technology, Virtual & Augmented Reality, Mix Reality, New Media Development</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-file-code"></i>
                <div>
                  <h5>Komputasi</h5>
                  <p>Web Development, UI/UX, Mobile App Development, Internet of Think, Machine Learning, Artificial Intelligent, Cyber Security</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-file-richtext"></i>
                <div>
                  <h5>Desain Komunikasi Visual</h5>
                  <p>Product Design, Illustration, Animation, Visual Branding, Graphic Communication, Commercial Artist, Multimedia Design</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-camera-reels"></i>
                <div>
                  <h5>Broadcasting</h5>
                  <p>Photography, Videography, Audio Visual, Motion Graphic, Broadcast Network, Animation Film, Music & Visual Effect, Digital Radio & Television, Telecommunication</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Testimonial Section ======= -->
    <section id="testimoni" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Testimonial</span>
          <h2>Testimonial</h2>

        </div>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <div class="card-img">
                <img src="<?= base_url('assets/img/storage-service.jpg') ?>" alt="" class="img-fluid">
              </div>
              <h3>Wineu Siti Rachmawati <br> - Pedia 2018</h3>
              <p>Penerima Beasiswa Global Korea Scholarship Jenjang S2 di Hongik University Korea Selatan</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <div class="card-img">
                <img src="<?= base_url('assets/img/warehousing-service.jpg') ?>" alt="" class="img-fluid">
              </div>
              <h3>Annisa Puspita<br> - Pedia 2018</h3>
              <p>PT. Everidea Interaktif - 2D artist</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-img">
                <img src="<?= base_url('assets/img/cargo-service.jpg') ?>" alt="" class="img-fluid">
              </div>
              <h3>Ari Andrean<br> - Pedia 2018</h3>
              <p>PT Go Online Destinations (Pegi Pegi) - Video & Motion Grapher</p>
            </div>
          </div><!-- End Card Item -->         

        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

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