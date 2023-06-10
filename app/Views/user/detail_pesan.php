<?= $this->extend('user/navigation') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pesan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('user/pesan'); ?>">Pesan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Pesan</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  
    <section class="section">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pesan dari Admin</h5>
                        <p class="card-text"><?= $detail_pesan['isi']; ?></p>
                    </div>
                    <div class="card-footer mt-5">
                        <small class="d-block text-body-secondary"><?= date('H:i, d F Y', strtotime($detail_pesan['dikirim'])); ?></small>
                        <button class="d-block btn btn-sm btn-primary mt-3" onclick="history.back();"><i class="bi bi-arrow-left-circle"></i> Kembali</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

  </main><!-- End #main -->
  <?= $this->endSection() ?>