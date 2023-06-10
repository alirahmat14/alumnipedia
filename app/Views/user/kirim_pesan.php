<?= $this->extend('user/navigation') ?>
<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Kirim Pesan</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('user/pesan'); ?>">Pesan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kirim Pesan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php if (session()->getFlashdata('danger')) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>        
            <?php foreach (session()->getFlashdata('danger') as $danger) {
                echo '<li>'.$danger.'</li>';
            } ?>
        </ul>      
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Kirim Pesan untuk Admin</h5>

              <!-- General Form Elements -->
              <form action="" method="post">
                <div class="row mb-3">
                  <label for="isi" class="col-12 col-sm-2 col-form-label ">Isi Pesan</label>
                  <div class="col-12 col-sm-10">
                    <textarea class="form-control" id="isi" name="isi" rows="3" value="<?= old('isi'); ?>" autofocus></textarea>
                  </div>
                </div>
                 
                <div class="row mb-3">
                  <div class="col-12 col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check2-square"></i> Kirim</button>
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