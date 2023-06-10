<?= $this->extend('user/navigation') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pesan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
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

                    <h5 class="card-title">Pesan dari Admin</h5>
                    <div class="row">
                        <div class="overflow-x-auto overflow-auto">
                        <?php if (empty($pesan_user)): ?>
                            <div class="alert alert-warning" role="alert">
                                <i class="bi bi-exclamation-triangle-fill"></i> Belum ada pesan untuk anda!
                            </div>
                        <?php else : ?>
                            <table class="table table-responsive" id="tabel-pesan-user">
                            <thead>
                                <tr>
                                <th scope="col">No</th>                                
                                <th scope="col">Isi Pesan</th>
                                <th scope="col">Dikirim</th>
                                <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($pesan_user as $pu) : ?>
                                <tr>
                                <th scope="row"><?= $no; ?></th>                                
                                <td><?= (str_word_count($pu['isi']) > 30 ? substr($pu['isi'],0,30)."..." : $pu['isi']); ?></td>                          
                                <td><?= ($pu['dikirim'] == '0000-00-00 00:00:00') ? 'Tidak tersedia' : date('H:i, d F Y', strtotime($pu['dikirim'])); ?></td>
                                <td>
                                    <div class="d-grid gap-2 d-flex">
                                    <a class="btn <?= ($pu['status']=='0'?'btn-primary':'btn-secondary'); ?> btn-sm" href="/user/pesan/detail/<?= $pu['id_pesan_user']; ?>"><i class="bi bi-arrow-right-circle-fill"></i> Lihat</a>
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
                        <?php if (empty($pesan_admin)): ?>
                            <div class="alert alert-warning" role="alert">
                               <i class="bi bi-exclamation-triangle-fill"></i> Belum ada pesan yang anda kirim!
                            </div>
                        <?php else : ?>
                            <table class="table table-responsive" id="tabel-pesan-admin">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Isi Pesan</th>
                                <th scope="col">Waktu Terkirim</th>
                                <th scope="col">Dibaca</th>
                                <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($pesan_admin as $pa) : ?>
                                <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $pa['isi']; ?></td>                          
                                <td><?= ($pa['dikirim'] == '0000-00-00 00:00:00') ? 'Tidak tersedia' : date('H:i, d F Y', strtotime($pa['dikirim'])); ?></td>
                                <td><?= ($pa['status'] == '0') ? 'Belum Dibaca' : 'Dibaca pada '.date('H:i, d F Y', strtotime($pa['dibaca'])); ?></td>
                                <td>
                                    <div class="d-grid gap-2 d-flex">
                                        <a class="btn btn-danger btn-sm" href="/user/pesan/hapus/<?= $pa['id_pesan_admin']; ?>" onclick="return confirm('Yakin, Hapus Pesan ?')"><i class="bi bi-trash3-fill"></i> Hapus</a>
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
                        <a href="<?= base_url('user/pesan/kirim'); ?>" class='btn btn-success'><i class="bi bi-pencil-square"></i> Kirim Pesan</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?= $this->endSection() ?>