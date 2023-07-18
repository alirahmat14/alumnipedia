<?php

namespace App\Controllers;
use App\Models\ProfilModel;
use App\Models\LoginModel;
use App\Models\JenjangModel;
use App\Models\PesanUserModel;
use App\Models\PesanAdminModel;
use App\Models\InfoModel;
use Config\Services;

class User extends BaseController
{
    protected $profil, $data_profil, $validation, $akun, $data_akun, $jenjang, $rules_jenjang, $encrypter, $pesan_user, $jumlah_pesan_belum_baca, $pesan_belum_baca;
    function __construct()
    {
        $this->profil = new ProfilModel();
        $this->akun = new LoginModel();
        $this->jenjang = new JenjangModel();
        $this->pesan_user = new PesanUserModel();
        $this->pesan_admin= new PesanAdminModel();
        $this->info= new InfoModel();
        $this->data_profil = $this->profil->where(['id_user' => session()->id_user])->first();
        $this->jumlah_pesan_belum_baca = $this->pesan_user->where('penerima', session()->id_user)->where('status', '0')->countAllResults();
        $this->pesan_belum_baca = $this->pesan_user->getData(session()->id_user, true);
        $this->validation = \Config\Services::validation();
        $this->encrypter = \Config\Services::encrypter();
        $this->rules_jenjang = [
            "institusi" => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama institusi/perguruan tinggi/perusahaan tidak boleh kosong!'
                ]
            ],
            "posisi" => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan/posisi/jabatan tidak boleh kosong!'
                ]
            ],
            "sejak" => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mohon isi tanggal sejak anda diterima!'
                ]
            ]
        ];
    }

    // Bagian Beranda User
    public function index()
    {        
        if (session()->level != 2 || session()->level != '2') {
            return redirect('/');
        }        
        $data['info'] = $this->info->getData();
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        $data['page'] = 'home';
        $data['profil'] = $this->data_profil;
        return view('user/index', $data);
    }

    // Bagian Profile
    public function profile()
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect('/');
        }
        $data = [
            'count_unread_message' => $this->jumlah_pesan_belum_baca,
            'unread_message' => $this->pesan_belum_baca,
            'profil' => $this->data_profil,
            'page' => 'profile',
            'validation' => $this->validation
        ];
        return view('user/profile', $data);
    }
    
    public function update()
    {
        $pecah = str_split(session()->username);
        $angkatan = '20'.$pecah[0].$pecah[1];
        $update = $this->profil->updateProfil($this->request->getPost(), session()->id_user, $angkatan);
        if ($update == true) {
            session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data <strong>berhasil</strong> diubah!');
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data <strong>gagal</strong> diubah!');
        }
        return redirect()->to('user/profile');
    }

    public function updateFoto()
    {
        session();
        $rules = [
            "foto" => [
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpeg,image/jpg,image/png]',
                'errors' => [
                    'uploaded' => 'Mohon pilih gambar!',
                    'max_size' => 'Ukuran gambar terlalu besar!',
                    'is_image' => 'Mohon hanya masukkan gambar!',
                    'mime_in' => 'Mohon gunakan format JPEG/PNG!'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            // dd($validation->hasError('foto'));            
            session()->setFlashdata('danger', $this->validation->getError());
            session()->setFlashdata('foto', $this->validation->getError());
            // return redirect()->to('user/profile')->withInput()->with('validation', $validation);
            return redirect()->back()->withInput();
        }
        $folder = './uploaded_img/';
        $foto_baru = $this->request->getFile('foto');
        $nama_baru = $foto_baru->getRandomName();
        if ($this->data_profil['foto'] != 'default.jpg') {
            unlink($folder.$this->data_profil['foto']);
        }
        $foto_baru->move($folder, $nama_baru);
        $update = $this->profil->updateFotoUser($nama_baru, session()->id_user);
        if ($update == true) {
            session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Foto Profil <strong>berhasil</strong> diubah!');
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Foto Profil <strong>gagal</strong> diubah!');
        }
        return redirect()->to('user/profile');
    }

    public function deleteFoto()
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect('/');
        }
        $folder = './uploaded_img/';
        if ($this->data_profil['foto'] != 'default.jpg') {
            unlink($folder.$this->data_profil['foto']);
            $update = $this->profil->updateFotoUser('default.jpg', session()->id_user);
            if ($update == true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Foto Profil <strong>berhasil</strong> dihapus!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Foto Profil <strong>gagal</strong> dihapus!');
            }
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Foto Profil <strong>tidak ada!</strong>');
        }        
        return redirect()->to('user/profile');
    }

    // Bagian Jenjang Karir
    public function jenjang()
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect('/');
        }
        // dd($this->jenjang->where('id_user', 2)->countAll());
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        $data['jenjang'] = $this->jenjang->getData(session()->id_user);
        $data['profil'] = $this->data_profil;
        $data['page'] = 'jenjang';
        return view('user/jenjang', $data);
    }

    public function tambah_jenjang()
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect('/');
        }
        if ($this->request->is('post') == true) {            
            if (!$this->validate($this->rules_jenjang)) {           
                session()->setFlashdata('danger', $this->validation->getError());
                // session()->setFlashdata('institusi', $this->validation->getError());
                return redirect()->back()->withInput();
            }
            $insert = $this->jenjang->saveData($this->request->getPost(), session()->id_user);
            if ($insert == true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data jenjang karir <strong>berhasil</strong> ditambahkan!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data jenjang karir <strong>gagal</strong> ditambahkan!');
            }
            return redirect()->to('user/jenjang');
        } else {
            $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
            $data['unread_message'] = $this->pesan_belum_baca;
            $data['profil'] = $this->data_profil;
            $data['page'] = 'jenjang';
            return view('user/tambah_jenjang', $data);
        }       
        
    }

    public function edit_jenjang($id_jenjang)
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect()->back();
        }        
        if ($this->request->is('post') == true) {
            if (!$this->validate($this->rules_jenjang)) {           
                session()->setFlashdata('danger', $this->validation->getError());
                // session()->setFlashdata('institusi', $this->validation->getError());
                return redirect()->back()->withInput();
            }
            $update = $this->jenjang->saveData($this->request->getPost(), session()->id_user, $id_jenjang);
            if ($update == true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data jenjang karir <strong>berhasil</strong> diubah!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data jenjang karir <strong>gagal</strong> diubah!');
            }
            return redirect()->to('user/jenjang');
        } else {
            $data_jenjang = $this->jenjang->getdata(session()->id_user, $id_jenjang);
            if ($data_jenjang == null) {
                return redirect()->back();
            }
            $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
            $data['unread_message'] = $this->pesan_belum_baca;
            $data['profil'] = $this->data_profil;
            $data['page'] = 'jenjang';
            $data['jenjang'] = $data_jenjang;
            return view('user/edit_jenjang', $data);
        } 
    }

    public function hapus_jenjang($id_jenjang)
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect()->back();
        }
        $data_jenjang = $this->jenjang->getdata(session()->id_user, $id_jenjang);
        if ($data_jenjang == null) {            
            return redirect()->back();
        }
        $delete = $this->jenjang->where('id_jenjang', $id_jenjang)->delete();
        if ($delete == true) {
            session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data jenjang karir <strong>berhasil</strong> dihapus!');
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data jenjang karir <strong>gagal</strong> dihapus!');
        }
        return redirect()->to('user/jenjang');
    }

    // Bagian Pesan
    public function pesan()
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect('/');
        }
        // dd($this->jenjang->where('id_user', 2)->countAll());
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        $data['pesan_user'] = $this->pesan_user->getData(session()->id_user);
        $data['pesan_admin'] = $this->pesan_admin->getData(session()->id_user);
        $data['profil'] = $this->data_profil;
        $data['page'] = 'pesan';
        return view('user/pesan', $data);
    }

    public function detail_pesan($id_pesan_user)
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect('/');
        }
        $cek_pesan = $this->pesan_user->where('penerima', session()->id_user)->where('id_pesan_user', $id_pesan_user)->first();
        if ($cek_pesan == null) {
            return redirect()->back();
        }     
        $this->pesan_user->setStatus('1', $id_pesan_user);
        $data['detail_pesan'] = $cek_pesan;
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        $data['profil'] = $this->data_profil;
        $data['page'] = 'pesan';
        return view('user/detail_pesan', $data);
    }

    public function kirim_pesan()
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect('/');
        }

        if ($this->request->is('post')) {
            $rules = [
                "isi" => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Isi Pesan tidak boleh kosong!'
                    ]
                ]
            ];
            if (!$this->validate($rules)) {        
                session()->setFlashdata('danger', $this->validation->getErrors());                             
                return redirect()->back()->withInput();
            }
            $kirim = $this->pesan_admin->kirimPesan($this->request->getPost(), session()->id_user);
            if ($kirim == true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Pesan <strong>berhasil</strong> dikirim!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Pesan <strong>gagal</strong> dikirim!');
            }
            return redirect()->to('user/pesan');
        } else {
            $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
            $data['unread_message'] = $this->pesan_belum_baca;
            $data['profil'] = $this->data_profil;
            $data['page'] = 'pesan';
            return view('user/kirim_pesan', $data);
        }        
    }

    public function hapus_pesan_admin($id_pesan_admin)
    {
        if (session()->level != 2 || session()->level != '2') {
            return redirect()->back();
        } 
        $delete = $this->pesan_admin->where('id_pesan_admin', $id_pesan_admin)->where('pengirim', session()->id_user)->delete();
        if ($delete == true) {
            session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Pesan <strong>berhasil</strong> dihapus!');
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Pesan <strong>gagal</strong> dihapus!');
        }
        return redirect()->back();
    }

    // Update Password Akun Pengguna
    public function updatePassword()
    {
        $rules = [
            "password" => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mohon masukkan password baru!'
                ]
            ]
        ];
        if (!$this->validate($rules)) {           
            session()->setFlashdata('danger', $this->validation->getError());
            session()->setFlashdata('password', $this->validation->getError());
            return redirect()->back()->withInput();
        }
        $pass = $this->request->getPost('password');
        $update = $this->akun->updateAkun(null, password_hash($pass, PASSWORD_DEFAULT), session()->id_user);
        if ($update == true) {
            session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Password <strong>berhasil</strong> diubah, mohon untuk LOGOUT terlebih dahulu!');
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Password <strong>gagal</strong> diubah!');
        }
        return redirect()->to('user/profile');
    }
}
