<?= $this->extend('admin/navigation') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pesan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pesan</li>
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

                    <h5 class="card-title">Pesan dari User</h5>
                    <div class="row">
                        <div class="overflow-x-auto overflow-auto">
                        <?php if (empty($pesan_admin)): ?>
                            <div class="alert alert-warning" role="alert">
                                <i class="bi bi-exclamation-triangle-fill"></i> Belum ada pesan untuk anda!
                            </div>
                        <?php else : ?>
                            <table class="table table-responsive" id="tabel-pesan-admin">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Isi Pesan</th>
                                <th scope="col">Dikirim</th>
                                <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($pesan_admin as $pa) : ?>
                                <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $pa['username']; ?></td>
                                <td><?= $pa['nama']; ?></td>
                                <td><?= (str_word_count($pa['isi']) > 20 ? substr($pa['isi'],0,20)."..." : $pa['isi']); ?></td>                          
                                <td><?= ($pa['dikirim'] == '0000-00-00 00:00:00') ? 'Tidak tersedia' : date('d F Y H:i:s', strtotime($pa['dikirim'])); ?></td>
                                <td>
                                    <div class="d-grid gap-2 d-flex">
                                    <a class="btn <?= ($pa['status']=='0'?'btn-primary':'btn-secondary'); ?> btn-sm" href="/admin/pesan-admin/detail/<?= $pa['id_pesan_admin']; ?>"><i class="bi bi-arrow-right-circle-fill"></i> Lihat</a>
                                    </div>
                                </td>
                                </tr>
                                <?php $no++; endforeach; ?>                     
                            </tbody>
                            </table>
                        <?php endif ?>
                        </div>
                    </div>              


                    <h5 class="card-title mt-5">Pesan Terkirim</h5>
                    <div class="row">
                        <div class="overflow-x-auto overflow-auto">
                        <?php if (empty($pesan_user)): ?>
                            <div class="alert alert-warning" role="alert">
                               <i class="bi bi-exclamation-triangle-fill"></i> Belum ada pesan yang anda kirim!
                            </div>
                        <?php else : ?>
                            <table class="table table-responsive" id="tabel-pesan-user">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Isi Pesan</th>
                                <th scope="col">Waktu Terkirim</th>
                                <th scope="col">Dibaca</th>
                                <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($pesan_user as $pu) : ?>
                                <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $pu['username']; ?></td>
                                <td><?= $pu['nama']; ?></td>
                                <td><?= $pu['isi']; ?></td>                          
                                <td><?= ($pu['dikirim'] == '0000-00-00 00:00:00') ? 'Tidak tersedia' : date('d F Y H:i:s', strtotime($pu['dikirim'])); ?></td>
                                <td><?= ($pu['status'] == '0') ? 'Belum Dibaca' : 'Dibaca pada '.date('d F Y H:i:s', strtotime($pu['dibaca'])); ?></td>
                                <td>
                                    <div class="d-grid gap-2 d-flex">
                                        <a class="btn btn-danger btn-sm" href="/admin/pesan-user/hapus/<?= $pu['id_pesan_user']; ?>" onclick="return confirm('Yakin, Hapus Pesan ?')"><i class="bi bi-trash3-fill"></i> Hapus</a>
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
                        <a href="<?= base_url('admin/pesan-user/kirim'); ?>" class='btn btn-success'><i class="bi bi-pencil-square"></i> Kirim Pesan</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?= $this->endSection() ?>