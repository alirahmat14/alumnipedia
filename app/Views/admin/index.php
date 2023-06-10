<?= $this->extend('admin/navigation') ?>
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
            <div class="col-xxl-4 col-xl-12 col-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Jumlah Alumni </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $lulus_all; ?></h6>
                    </div>
                  </div>

                </div>
              </div>

           </div><!-- End Customers Card -->

           <!-- lulusan pertahun -->
           <?php foreach($lulusan as $ll): ?>
           <div class="col-xxl-4 col-md-6 col-12">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Lulusan Tahun <?= $ll['tahun_lulus']; ?></h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6><?= $ll['jumlah']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <!-- lulusan pertahun -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
  <?= $this->endSection() ?>