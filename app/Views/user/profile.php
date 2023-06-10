<?= $this->extend('user/navigation') ?>
<?= $this->section('content') ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Beranda</a></li>
          <li class="breadcrumb-item active">Profile</li>
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

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/uploaded_img/<?= $profil['foto']; ?>" alt="Profile" class="img-fluid rounded-5">
              <h2><?= $profil['nama']; ?></h2>
              <h3>Pedia 20<?= str_split(session()->username)[0].str_split(session()->username)[1]; ?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">NIM</div>
                    <div class="col-lg-9 col-md-8"><?= session()->username; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama</div>
                    <div class="col-lg-9 col-md-8"><?= $profil['nama']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tahun Lulusan</div>
                    <div class="col-lg-9 col-md-8"><?= $profil['tahun_lulus']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Program Studi</div>
                    <div class="col-lg-9 col-md-8"><?= $profil['prodi']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $profil['email']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?= $profil['telepon']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8"><?= $profil['alamat']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tempat Lahir</div>
                    <div class="col-lg-9 col-md-8"><?= $profil['tempat_lahir']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                    <div class="col-lg-9 col-md-8"><?= ($profil['tanggal_lahir'] == '0000-00-00' || $profil['tanggal_lahir'] == null) ? 'Belum Ada' : date('d F Y', strtotime($profil['tanggal_lahir'])); ?></div>
                  </div>


                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="/update-foto-profil" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="/uploaded_img/<?= $profil['foto']; ?>" class="rounded-5 border border-2" alt="Profile" style="max-width: 80px">
                        <div class="mt-1">       
                          <label for="foto" class="form-label text-sm">Maksimal 1 MB berformat JPG/PNG</label>                   
                          <input class="custom-file-input form-control form-control-sm <?= (session()->getFlashdata('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" type="file" accept="image/jpeg, image/png" required>
                          <div class="invalid-feedback text-sm"><?= session()->getFlashdata('foto'); ?></div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i> Upload</button>
                          <?php if($profil['foto'] != 'default.jpg'): ?>
                            <a href="/user/hapus-foto-profil" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                          <?php endif ?>
                        </div>
                      </div>
                    </div>
                  </form>

                  <form method="POST" action="<?= base_url('update-profil') ?>">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">NIM</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" value="<?= session()->username; ?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="nama" value="<?= $profil['nama']; ?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tahun_lulus" class="col-md-4 col-lg-3 col-form-label">Tahun Lulusan</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tahun_lulus" type="text" class="form-control" id="tahun_lulus" value="<?= $profil['tahun_lulus']; ?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="prodi" class="col-md-4 col-lg-3 col-form-label">Program Studi</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="prodi" type="text" class="form-control" id="prodi" value="<?= $profil['prodi']; ?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="<?= $profil['email']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="telepon" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="telepon" type="text" class="form-control" id="telepon" value="<?= $profil['telepon']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="alamat" type="text" class="form-control" id="alamat" value="<?= $profil['alamat']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" value="<?= $profil['tempat_lahir']; ?>">
                      </div>
                    </div>
                    
                  <div class="row mb-3">
                    <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-5">
                      <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $profil['tanggal_lahir']; ?>">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>

                  </form><!-- End Profile Edit Form -->

                  <form action="/user/ubah-password" method="post">
                    <div class="row mt-5 mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Ubah Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control form-control-sm <?= (session()->getFlashdata('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Masukkan Password Baru" required>
                        <div class="invalid-feedback text-sm"><?= session()->getFlashdata('password'); ?></div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="lihat_pass" onclick="lihatPassword()">
                          <label class="form-check-label text-sm" for="lihat_pass">
                            Tampilkan Password
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Ubah Password</button>
                    </div>
                  </form>

                </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script>
      function lihatPassword() {
          var x = document.getElementById("password");
          if (x.type === "password") {
              x.type = "text";
          } else {
              x.type = "password";
          }
      }
  </script>

  <?= $this->endSection() ?>