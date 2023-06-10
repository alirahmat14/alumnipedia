<?= $this->extend('admin/navigation') ?>
<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Jenjang Karir</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Jenjang Karir</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-12 col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Jenjang Karir</h5>
              <div class="row">
                <div class="overflow-x-auto overflow-auto">
                  <?php if (empty($jenjang)): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-x-circle-fill"></i> Data Jenjang Karir Belum Ada!
                    </div>
                  <?php else : ?>
                    <table class="table table-responsive" id="tabel-jenjang-user">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">NIM Alumni</th>
                          <th scope="col">Nama Alumni</th>
                          <th scope="col">Nama Universitas/Industri</th>
                          <th scope="col">Jurusan/Posisi</th>
                          <th scope="col">Sejak</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($jenjang as $jj) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $jj['username']; ?></td>
                          <td><?= $jj['nama']; ?></td>
                          <td><?= $jj['institusi']; ?></td>
                          <td><?= $jj['posisi']; ?></td>
                          <td><?= date('d F Y', strtotime($jj['sejak'])); ?></td>
                        </tr>
                        <?php $no++; endforeach; ?>                     
                      </tbody>
                    </table>
                  <?php endif ?>
                </div>
              </div>              

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?= $this->endSection() ?>