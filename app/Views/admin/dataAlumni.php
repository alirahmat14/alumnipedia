<?= $this->extend('admin/navigation') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Alumni</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Alumni</li>
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
              <h5 class="card-title">Data Alumni</h5>
              <div class="row">
                <div class="overflow-x-auto overflow-auto">
                  <?php if (empty($alumni)): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-x-circle-fill"></i> Data Alumni Belum Ada!
                    </div>
                  <?php else : ?>
                    <table class="table table-responsive" id="tabel-data-alumni-admin">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">NIM</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Tahun Lulusan</th>
                          <th scope="col">Program Studi</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Tempat Lahir</th>
                          <th scope="col">Tanggal Lahir</th>
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($alumni as $da) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $da['username']; ?></td>
                          <td><?= $da['nama']; ?></td>
                          <td><?= $da['tahun_lulus']; ?></td>
                          <td><?= $da['prodi']; ?></td>
                          <td><?= $da['email']; ?></td>
                          <td><?= $da['telepon']; ?></td>
                          <td><?= $da['alamat']; ?></td>
                          <td><?= $da['tempat_lahir']; ?></td>
                          <td><?= ($da['tanggal_lahir'] == '0000-00-00') ? 'Belum Ada' : date('d F Y', strtotime($da['tanggal_lahir'])); ?></td>
                          <td>
                            <div class="d-grid gap-2 d-flex">
                              <a class="btn btn-warning btn-sm" href="/admin/alumni/edit/<?= $da['id_user']; ?>"><i class="bi bi-pencil-square"></i> Edit</a>
                              <a class="btn btn-warning btn-sm" href="/admin/alumni/reset-password/<?= $da['id_user']; ?>" onclick="return confirm('Yakin, Reset Password '+<?= $da['username']; ?>+' ?')"><i class="bi bi-arrow-counterclockwise"></i> Reset Password</a>
                              <a class="btn btn-danger btn-sm" href="/admin/alumni/hapus/<?= $da['id_user']; ?>" onclick="return confirm('Yakin, Hapus Data '+<?= $da['username']; ?>+' ?')"><i class="bi bi-trash3-fill"></i> Hapus</a>
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
                  <a href="<?= base_url('admin/alumni/tambah'); ?>" class='btn btn-primary'><i class="bi bi-plus-circle"></i> Tambah Data</a>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?= $this->endSection() ?>