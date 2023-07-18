<?= $this->extend('user/navigation') ?>
<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tracer Study</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tracer Study</li>
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
              <h5 class="card-title">Tracer Study</h5>
              <div class="row">
                <div class="overflow-x-auto overflow-auto">
                  <?php if (empty($jenjang)): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-x-circle-fill"></i> Data Tracer Study Belum Ada!
                    </div>
                  <?php else : ?>
                    <table class="table table-responsive" id="tabel-jenjang-user">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Status</th>
                          <th scope="col">Mendapatkan Pekerjaan</th>
                          <th scope="col">Berapa Bulan</th>
                          <th scope="col">Pendapatan Kotor</th>
                          <th scope="col">Lokasi Bekerja</th>
                          <th scope="col">Jenis Institusi</th>
                          <th scope="col">Institusi</th>
                          <th scope="col">Nama Atasan</th>
                          <th scope="col">No Hp Atasan</th>
                          <th scope="col">Email Atasan</th>
                          <th scope="col">Posisi/jabatan berwiraswasta</th>
                          <th scope="col">Tingkat tempat kerja</th>
                          <th scope="col">Sumber Biaya</th>
                          <th scope="col">Perguruan Tinggi</th>
                          <th scope="col">Program Studi</th>
                          <th scope="col">Sumber Dana saat Kuliah</th>
                          <th scope="col">Tanggal Masuk</th>
                          <th scope="col">Keeratan Hubungan Studi dan Pekerjaan</th>
                          <th scope="col">Kesesuaian tingkat pendidikan</th>
                          <th scope="col">Kompetensi etika saat lulus</th>
                          <th scope="col">Kompetensi keahlian saat lulus</th>
                          <th scope="col">Kompetensi inggris saat lulus</th>
                          <th scope="col">Kompetensi teknologi saat lulus</th>
                          <th scope="col">Kompetensi komunikasi saat lulus</th>
                          <th scope="col">Kompetensi kerja saat lulus</th>
                          <th scope="col">Kompetensi pengembangan saat lulus</th>
                          <th scope="col">Kebutuhan Kompetensi etika saat bekerja</th>
                          <th scope="col">Kebutuhan Kompetensi keahlian saat bekerja</th>
                          <th scope="col">Kebutuhan Kompetensi inggris saat bekerja</th>
                          <th scope="col">Kebutuhan Kompetensi teknologi saat bekerja</th>
                          <th scope="col">Kebutuhan Kompetensi komunikasi saat bekerja</th>
                          <th scope="col">Kebutuhan Kompetensi kerja saat bekerja</th>
                          <th scope="col">Kebutuhan Kompetensi pengembangan saat bekerja</th>                          
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($jenjang as $jj) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $jj['status']; ?></td>
                          <td><?= $jj['mendapat_kerja']; ?></td>
                          <td><?= $jj['berapa_bulan']; ?></td>
                          <td><?= $jj['pendapatan_kotor'] != null ? "Rp " . number_format($jj['pendapatan_kotor'],2,',','.') : "-"; ?></td>
                          <td><?= $jj['lokasi_bekerja']; ?></td>
                          <td><?= $jj['jenis_institusi']; ?></td>
                          <td><?= $jj['institusi']; ?></td>
                          <td><?= $jj['nama_atasan']; ?></td>
                          <td><?= $jj['no_hp_atasan']; ?></td>
                          <td><?= $jj['email_atasan']; ?></td>
                          <td><?= $jj['posisi']; ?></td>
                          <td><?= $jj['tingkat']; ?></td>
                          <td><?= $jj['sumber_biaya']; ?></td>
                          <td><?= $jj['perguruan_tinggi']; ?></td>
                          <td><?= $jj['prodi']; ?></td>
                          <td><?= $jj['sumber_dana_saat_kuliah']; ?></td>
                          <td><?= ($jj['sejak'] != '0000-00-00' ? date('d F Y', strtotime($jj['sejak'])) : ' - '); ?></td>
                          <td><?= $jj['hubungan_studi']; ?></td>
                          <td><?= $jj['kesesuaian_pendidikan']; ?></td>
                          <td><?= $jj['etika_lulus']; ?></td>
                          <td><?= $jj['keahlian_lulus']; ?></td>
                          <td><?= $jj['inggris_lulus']; ?></td>
                          <td><?= $jj['teknologi_lulus']; ?></td>
                          <td><?= $jj['komunikasi_lulus']; ?></td>
                          <td><?= $jj['kerja_lulus']; ?></td>
                          <td><?= $jj['pengembangan_lulus']; ?></td>
                          <td><?= $jj['etika_kerja']; ?></td>
                          <td><?= $jj['keahlian_kerja']; ?></td>
                          <td><?= $jj['inggris_kerja']; ?></td>
                          <td><?= $jj['teknologi_kerja']; ?></td>
                          <td><?= $jj['komunikasi_kerja']; ?></td>
                          <td><?= $jj['kerja_kerja']; ?></td>
                          <td><?= $jj['pengembangan_kerja']; ?></td>
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