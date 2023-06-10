<?= $this->extend('admin/navigation') ?>
<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Alumni</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('admin/data-alumni'); ?>">Data Alumni</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
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
              <h5 class="card-title">Tambah Data Alumni</h5>

              <!-- General Form Elements -->
              <form action="" method="post">
                <div class="row mb-3">
                  <label for="username" class="col-12 col-sm-2 col-form-label ">NIM *</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>" autofocus required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-12 col-sm-2 col-form-label">Password Default *</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="password" name="password" value="<?= (old('password')) ? old('password') : '123456'; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="nama" class="col-12 col-sm-2 col-form-label">Nama Lengkap *</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tahun_lulus" class="col-12 col-sm-2 col-form-label">Tahun Lulus *</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" value="<?= old('tahun_lulus'); ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="prodi" class="col-12 col-sm-2 col-form-label">Program Studi *</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?= (old('prodi')) ? old('prodi') : 'Pendidikan Multimedia'; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-12 col-sm-2 col-form-label">Email</label>
                  <div class="col-12 col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email'); ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="telepon" class="col-12 col-sm-2 col-form-label">Nomor Telepon</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= old('telepon'); ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="alamat" class="col-12 col-sm-2 col-form-label">Alamat</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tempat_lahir" class="col-12 col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tanggal_lahir" class="col-12 col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-12 col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>">
                  </div>
                </div>      
                <div class="row mb-3">
                  <label for="tanggal_lahir" class="col-12 col-sm-12 text-danger text-sm">* Wajib</label>                  
                </div>      
                <div class="row mb-3">
                  <div class="col-12 col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</button>
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