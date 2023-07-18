<?= $this->extend('user/navigation') ?>
<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Jenjang Karir</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Jenjang Karir</li>
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
        <div class="col-12 col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jenjang Karir</h5>
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
                          <th scope="col">Nama Universitas/Industri</th>
                          <th scope="col">Jurusan/Posisi</th>
                          <th scope="col">Sejak</th>
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($jenjang as $jj) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $jj['institusi']; ?></td>
                          <td><?= $jj['posisi']; ?></td>
                          <td><?= date('d F Y', strtotime($jj['sejak'])); ?></td>
                          <td>
                            <div class="d-grid gap-2 d-flex">
                              <a class="btn btn-warning btn-sm" href="/user/jenjang/edit/<?= $jj['id_jenjang']; ?>"><i class="bi bi-pencil-square"></i> Edit</a>
                              <a class="btn btn-danger btn-sm" href="/user/jenjang/hapus/<?= $jj['id_jenjang']; ?>" onclick="return confirm('Yakin, Hapus Data?')"><i class="bi bi-trash3-fill"></i> Hapus</a>
                            </div>
                          </td>
                        </tr>
                        <?php $no++; endforeach; ?>                     
                      </tbody>
                    </table>
                  <?php endif ?>
                </div>
              </div>              

              <div class="row my-5">
                <div class="col-12 d-flex justify-content-center">
                  <a href="<?= base_url('user/jenjang/tambah'); ?>" class='btn btn-primary'><i class="bi bi-plus-circle-fill"></i> Tambah Data</a>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?= $this->endSection() ?>