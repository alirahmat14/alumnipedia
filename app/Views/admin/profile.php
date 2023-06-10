<?= $this->extend('admin/navigation') ?>
<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil Admin</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profil Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php elseif (session()->getFlashdata('danger')) : ?>
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
              <h5 class="card-title">Profil Admin</h5>

              <!-- General Form Elements -->
              <form action="" method="post">
                <div class="row mb-3">
                  <label for="username" class="col-12 col-sm-2 col-form-label">Username</label>
                  <div class="col-12 col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= (old('username')) ? old('username') : $profile['username']; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-12 col-sm-2 col-form-label">Password</label>
                  <div class="col-12 col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" value="<?= old('password'); ?>" required>
                    <input class="form-check-input" type="checkbox" id="lihat_pass" onclick="lihatPassword()">
                    <label class="form-check-label text-sm" for="lihat_pass">
                        Tampilkan Password
                    </label>
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

    <script>
        function lihatPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
  <?= $this->endSection() ?>