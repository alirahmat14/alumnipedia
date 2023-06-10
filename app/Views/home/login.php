<?= $this->extend('template/home_layout') ?>

<?= $this->section('content') ?>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                <img src="<?= base_url('assets/img/logo-pmm.png') ?>">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Pedia Alumni </h5>
                    <p class="text-center small">Masukan NIM dan Password</p>
                  </div>

                  <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-danger" role="alert">
                      <?= session()->getFlashdata('message') ?>
                    </div>
                  <?php endif ?>

                  <form action="<?= base_url('auth') ?>" method="POST" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="username" class="form-label">NIM</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan NIM" required>
                        <!-- <div class="invalid-feedback">Masukan NIM</div> -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password" required>
                      <!-- <div class="invalid-feedback">Masukan password!</div> -->
                    </div>                    

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <?= $this->endSection() ?>