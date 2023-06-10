<?= $this->extend('admin/navigation') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pesan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('admin/pesan'); ?>">Pesan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Pesan</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  
    <section class="section">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header mb-2">
                        <h5 class="card-title m-0 p-0 mb-2">Pesan dari User</h5>
                        <h6 class="card-subtitle text-body-secondary"><?= $detail_pesan['nama']; ?></h6>
                    </div>
                    <div class="card-body">
                        
                        <p class="card-text"><?= $detail_pesan['isi']; ?></p>
                    </div>
                    <div class="card-footer mt-3">
                        <small class="d-block text-body-secondary"><?= date('H:i, d F Y', strtotime($detail_pesan['dikirim'])); ?></small>
                        <button class="d-block btn btn-sm btn-primary mt-3" onclick="history.back();"><i class="bi bi-arrow-left-circle"></i> Kembali</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

  </main><!-- End #main -->
  <?= $this->endSection() ?>