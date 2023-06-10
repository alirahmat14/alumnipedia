<?= $this->extend('admin/navigation') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Info Loker</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Info Loker</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

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
              <h5 class="card-title">Data Info Loker</h5>
              <div class="row">
                <div class="overflow-x-auto overflow-auto">
                  <?php if (empty($info)): ?>
                    <div class="alert alert-warning" role="alert">
                        <i class="bi bi-exclamation-triangle-fill"></i> Data Info Loker Belum Ada!
                    </div>
                  <?php else : ?>
                    <table class="table table-responsive" id="tabel-info">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Judul</th>
                          <th scope="col">link</th>
                          <th scope="col">Gambar</th>
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($info as $in) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $in['judul']; ?></td>
                          <td><?= $in['link']; ?></td>
                          <td><img src="/img_info/<?= $in['image']; ?>" alt="<?= $in['image']; ?>" width="80px"></td>
                          <td>
                            <div class="d-grid gap-2 d-flex">
                              <a class="btn btn-warning btn-sm" href="/admin/info/edit/<?= $in['id_info']; ?>"><i class="bi bi-pencil-square"></i> Edit</a>
                              <a class="btn btn-danger btn-sm" href="/admin/info/hapus/<?= $in['id_info']; ?>" onclick="return confirm('Yakin, Hapus Data ?')"><i class="bi bi-trash3-fill"></i> Hapus</a>
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
                  <a href="<?= base_url('admin/info/tambah'); ?>" class='btn btn-primary'><i class="bi bi-plus-circle"></i> Tambah Data</a>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?= $this->endSection() ?>