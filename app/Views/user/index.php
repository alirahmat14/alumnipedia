<?= $this->extend('user/navigation') ?>
<?= $this->section('content') ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Beranda</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Beranda</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Customers Card -->
            <div class="col-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">SELAMAT DATANG <?= strtoupper($profil['nama']); ?></h5>
                  <P>Sistem ini merupakan sistem informasi layanan akademik Alumni Prodi Pendidikan Multimedia UPI Kampus di Cibiru</P>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

          <!-- News -->

            <div class="card-body pb-0">
              <h5 class="card-title">Info Loker</h5>
              <?php if (empty($info)): ?>
                <div class="alert alert-warning" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> Info Lowongan Kerja Belum Ada!
                </div>
              <?php else : ?>
              <div class="news">
                <?php foreach($info as $in): ?>
                <div class="post-item clearfix">
                  <img src="/img_info/<?= $in['image']; ?>" alt="">
                  <h4><a href="<?= $in['link']; ?>" target="_blank"><?= $in['judul']; ?></a></h4>
                  <p><?= $in['link']; ?></p>
                </div>
                <?php endforeach; ?>
              </div><!-- End sidebar recent posts-->
              <?php endif ?>
            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
  <?= $this->endSection() ?>