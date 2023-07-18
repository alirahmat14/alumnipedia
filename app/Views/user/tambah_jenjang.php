<?= $this->extend('user/navigation') ?>
<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tracer Study</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('user/jenjang'); ?>">Tracer Study</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php if (session()->getFlashdata('danger')) : ?>
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
              <h5 class="card-title">Tracer Study</h5>

              <!-- General Form Elements -->
              <form action="" method="post">

                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="status" class="col-12 col-sm-12 col-md-4 col-form-label">Jelaskan status Anda saat ini?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <select class="form-select" aria-label="status" id="status" name="status">
                      <option disabled>Pilih</option>
                      <option value="Bekerja">Bekerja (Full Time/Part Time)</option>
                      <option value="Tidak Bekerja">Tidak Bekerja</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option value="Melanjutkan Pendidikan">Melanjutkan Pendidikan</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="mendapat_kerja" class="col-12 col-sm-12 col-md-4 col-form-label">Apakah anda telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus ?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="mendapat_kerja" id="mendapat_kerja1" value="Ya" checked>
                      <label class="form-check-label" for="mendapat_kerja1">
                        Ya
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="mendapat_kerja" id="mendapat_kerja2" value="Tidak">
                      <label class="form-check-label" for="mendapat_kerja2">
                        Tidak
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="berapa_bulan" class="col-12 col-sm-12 col-md-4 col-form-label">Dalam berapa bulan anda mendapatkan pekerjaan ?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="berapa_bulan" name="berapa_bulan">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="pendapatan_kotor" class="col-12 col-sm-12 col-md-4 col-form-label">Berapa rata-rata pendapatan kotor anda per bulan (jumlah keseluruhan pendapatan)?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="pendapatan_kotor" name="pendapatan_kotor">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="lokasi_bekerja" class="col-12 col-sm-12 col-md-4 col-form-label">Dimana lokasi tempat Anda bekerja?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="lokasi_bekerja" name="lokasi_bekerja">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="jenis_institusi" class="col-12 col-sm-12 col-md-4 col-form-label">Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <select class="form-select" aria-label="jenis_institusi" id="jenis_institusi" name="jenis_institusi">
                      <option selected value="">Pilih</option>
                      <option value="Instansi pemerintah">Instansi pemerintah</option>
                      <option value="Organisasi non-profit/Lembaga Swadaya Masyarakat">Organisasi non-profit/Lembaga Swadaya Masyarakat</option>
                      <option value="Perusahaan swasta">Perusahaan swasta</option>
                      <option value="Wiraswasta/perusahaan sendiri">Wiraswasta/perusahaan sendiri</option>
                      <option value="BUMN/BUMD">BUMN/BUMD</option>
                      <option value="Institusi/Organisasi Multilateral">Institusi/Organisasi Multilateral</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="institusi" class="col-12 col-sm-12 col-md-4 col-form-label">Apa nama perusahaan/kantor tempat Anda bekerja?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="institusi" name="institusi">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="nama_atasan" class="col-12 col-sm-12 col-md-4 col-form-label">Siapa nama atasan di tempat Anda bekerja?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="nama_atasan" name="nama_atasan">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="no_hp_atasan" class="col-12 col-sm-12 col-md-4 col-form-label">Nomor HP atasan di tempat Anda bekerja</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="tel" class="form-control" id="no_hp_atasan" name="no_hp_atasan">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="email_atasan" class="col-12 col-sm-12 col-md-4 col-form-label">Alamat email atasan di tempat Anda bekerja</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="email" class="form-control" id="email_atasan" name="email_atasan">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="posisi" class="col-12 col-sm-12 col-md-4 col-form-label">Bila berwiraswasta, apa posisi/jabatan Anda saat ini?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="posisi" name="posisi">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="tingkat" class="col-12 col-sm-12 col-md-4 col-form-label">Apa tingkat tempat kerja Anda?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="tingkat" name="tingkat">
                  </div>
                </div>
                <b class="py-3">Pertanyaan studi lanjut (Apabila menjawab Melanjutkan Pendidikan)</b>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="sumber_biaya" class="col-12 col-sm-12 col-md-4 col-form-label">Sumber Biaya studi lanjut (Apabila menjawab Melanjutkan Pendidikan)</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <!--  -->
                    <select class="form-select" aria-label="sumber_biaya" id="sumber_biaya" name="sumber_biaya">
                      <option selected value="">Pilih</option>
                      <option value="Biaya Sendiri / Keluarga">Biaya Sendiri / Keluarga</option>
                      <option value="Beasiswa ADIK">Beasiswa ADIK</option>
                      <option value="Beasiswa BIDIKMISI">Beasiswa BIDIKMISI</option>
                      <option value="Beasiswa PPA">Beasiswa PPA</option>
                      <option value="Beasiswa AFIRMASI">Beasiswa AFIRMASI</option>
                      <option value="Beasiswa Perusahaan/Swasta">Beasiswa Perusahaan/Swasta</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="perguruan_tinggi" class="col-12 col-sm-12 col-md-4 col-form-label">Perguruan Tinggi :</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="perguruan_tinggi" name="perguruan_tinggi">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="prodi" class="col-12 col-sm-12 col-md-4 col-form-label">Program Studi :</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="prodi" name="prodi">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="sejak" class="col-12 col-sm-12 col-md-4 col-form-label">Tanggal Masuk</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="date" class="form-control" id="sejak" name="sejak">
                  </div>
                </div>      
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="sumber_dana_saat_kuliah" class="col-12 col-sm-12 col-md-4 col-form-label">Sebutkan sumber dana dalam pembiayaan kuliah? (bukan ketika Studi Lanjut)</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="sumber_dana_saat_kuliah" name="sumber_dana_saat_kuliah">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="hubungan_studi" class="col-12 col-sm-12 col-md-4 col-form-label">Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="hubungan_studi" name="hubungan_studi">
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-center">
                  <label for="kesesuaian_pendidikan" class="col-12 col-sm-12 col-md-4 col-form-label">Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="text" class="form-control" id="kesesuaian_pendidikan" name="kesesuaian_pendidikan">
                  </div>
                </div>
                <b class="mt-2">Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai?</b>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="etika_lulus" class="col-12 col-sm-12 col-md-4 col-form-label">Etika</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="etika_lulus" name="etika_lulus">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="etika_lulus" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="etika_lulus" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="etika_lulus" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="etika_lulus" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="etika_lulus" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="keahlian_lulus" class="col-12 col-sm-12 col-md-4 col-form-label">Keahlian berdasarkan bidang ilmu</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="keahlian_lulus" name="keahlian_lulus">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="keahlian_lulus" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="keahlian_lulus" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="keahlian_lulus" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="keahlian_lulus" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="keahlian_lulus" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="inggris_lulus" class="col-12 col-sm-12 col-md-4 col-form-label">Bahasa Inggris</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="inggris_lulus" name="inggris_lulus">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="inggris_lulus" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="inggris_lulus" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="inggris_lulus" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="inggris_lulus" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="inggris_lulus" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="teknologi_lulus" class="col-12 col-sm-12 col-md-4 col-form-label">Penggunaan Teknologi Informasi</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="teknologi_lulus" name="teknologi_lulus">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="teknologi_lulus" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="teknologi_lulus" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="teknologi_lulus" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="teknologi_lulus" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="teknologi_lulus" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="komunikasi_lulus" class="col-12 col-sm-12 col-md-4 col-form-label">Komunikasi</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="komunikasi_lulus" name="komunikasi_lulus">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="komunikasi_lulus" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="komunikasi_lulus" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="komunikasi_lulus" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="komunikasi_lulus" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="komunikasi_lulus" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="kerja_lulus" class="col-12 col-sm-12 col-md-4 col-form-label">Kerja sama tim</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="kerja_lulus" name="kerja_lulus">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="kerja_lulus" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="kerja_lulus" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="kerja_lulus" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="kerja_lulus" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="kerja_lulus" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="pengembangan_lulus" class="col-12 col-sm-12 col-md-4 col-form-label">Pengembangan Diri</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="pengembangan_lulus" name="pengembangan_lulus">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="pengembangan_lulus" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="pengembangan_lulus" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="pengembangan_lulus" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="pengembangan_lulus" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="pengembangan_lulus" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <b class="mt-2">Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan?</b>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="etika_kerja" class="col-12 col-sm-12 col-md-4 col-form-label">Etika</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="etika_kerja" name="etika_kerja">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="etika_kerja" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="etika_kerja" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="etika_kerja" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="etika_kerja" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="etika_kerja" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="keahlian_kerja" class="col-12 col-sm-12 col-md-4 col-form-label">Keahlian berdasarkan bidang ilmu</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="keahlian_kerja" name="keahlian_kerja">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="keahlian_kerja" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="keahlian_kerja" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="keahlian_kerja" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="keahlian_kerja" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="keahlian_kerja" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="inggris_kerja" class="col-12 col-sm-12 col-md-4 col-form-label">Bahasa Inggris</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="inggris_kerja" name="inggris_kerja">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="inggris_kerja" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="inggris_kerja" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="inggris_kerja" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="inggris_kerja" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="inggris_kerja" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="teknologi_kerja" class="col-12 col-sm-12 col-md-4 col-form-label">Penggunaan Teknologi Informasi</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="teknologi_kerja" name="teknologi_kerja">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="teknologi_kerja" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="teknologi_kerja" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="teknologi_kerja" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="teknologi_kerja" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="teknologi_kerja" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="komunikasi_kerja" class="col-12 col-sm-12 col-md-4 col-form-label">Komunikasi</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="komunikasi_kerja" name="komunikasi_kerja">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="komunikasi_kerja" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="komunikasi_kerja" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="komunikasi_kerja" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="komunikasi_kerja" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="komunikasi_kerja" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="kerja_kerja" class="col-12 col-sm-12 col-md-4 col-form-label">Kerja sama tim</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="kerja_kerja" name="kerja_kerja">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="kerja_kerja" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="kerja_kerja" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="kerja_kerja" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="kerja_kerja" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="kerja_kerja" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 justify-content-center align-items-start">
                  <label for="pengembangan_kerja" class="col-12 col-sm-12 col-md-4 col-form-label">Pengembangan Diri</label>
                  <div class="col-12 col-sm-12 col-md-8">
                    <input type="range" class="form-range" min="1" max="5" id="pengembangan_kerja" name="pengembangan_kerja">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-2 col-sm-2 col-md-2">
                            <label for="pengembangan_kerja" class="form-label text-danger"><b>1</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-center">
                            <label for="pengembangan_kerja" class="form-label text-warning"><b>2</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-md-1 text-center">
                            <label for="pengembangan_kerja" class="form-label text-secondary"><b>3</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 offset-1 text-center">
                            <label for="pengembangan_kerja" class="form-label text-primary"><b>4</b></label>                        
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-end">
                            <label for="pengembangan_kerja" class="form-label text-success"><b>5</b></label>                        
                        </div>
                    </div>
                  </div>
                </div>
                
                <div class="row mb-3 justify-content-center align-items-center">
                  <div class="col-12 col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check2-square"></i> Submit</button>
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