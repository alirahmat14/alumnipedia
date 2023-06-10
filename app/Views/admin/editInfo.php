<?= $this->extend('admin/navigation') ?>
<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Info Loker</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('admin/info'); ?>">Data Info Loker</a></li>
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
              <h5 class="card-title">Edit Info Loker</h5>

              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="judul" class="col-12 col-sm-2 col-form-label ">Judul</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul') ? old('judul') : $info['judul']; ?>" autofocus required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="link" class="col-12 col-sm-2 col-form-label">Link </label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="link" name="link" value="<?= old('link') ? old('link') :  $info['link']; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="image" class="col-12 col-sm-2 col-form-label">Upload gambar *</label>
                  <div class="col-12 col-sm-10">
                    <input class="form-control form-control-sm" id="image" name="image" type="file">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="image" class="col-12 col-sm-12 text-danger text-sm">* Tidak Wajib, Format JPEG/PNG, Maks. 1 MB</label>                  
                </div> 
                <div class="row mb-3">
                  <div class="col-12 col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning"><i class="bi bi-check2-square"></i> Edit</button>
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