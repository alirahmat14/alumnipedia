<?= $this->extend('user/navigation') ?>
<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Jenjang Karir</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('user/jenjang'); ?>">Jenjang Karir</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php if (session()->getFlashdata('danger')) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('danger') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jenjang Karir</h5>

              <!-- General Form Elements -->
              <form action="" method="post">
                <div class="row mb-3">
                  <label for="institusi" class="col-12 col-sm-2 col-form-label">Nama Universitas / Industri / Lainnya</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="institusi" name="institusi" value="<?= $jenjang['institusi']; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="posisi" class="col-12 col-sm-2 col-form-label">jurusan / posisi / Lainnya</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="posisi" name="posisi" value="<?= $jenjang['posisi']; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="sejak" class="col-12 col-sm-2 col-form-label">Sejak</label>
                  <div class="col-12 col-sm-10">
                    <input type="date" class="form-control" id="sejak" name="sejak" value="<?= $jenjang['sejak']; ?>" required>
                  </div>
                </div>      
                <div class="row mb-3">
                  <div class="col-12 col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Ubah</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?= $this->endSection() ?>