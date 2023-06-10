<?php

namespace App\Controllers;
use App\Models\ProfilModel;
use App\Models\LoginModel;
use App\Models\JenjangModel;
use App\Models\PesanUserModel;
use App\Models\PesanAdminModel;
use App\Models\InfoModel;
use Config\Services;

class Admin extends BaseController
{
    protected $session, $profil, $akun, $jenjang, $validation, $pesan_user, $pesan_admin, $info;
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->profil = new ProfilModel();
        $this->akun = new LoginModel();
        $this->jenjang = new JenjangModel();
        $this->pesan_user = new PesanUserModel();
        $this->pesan_admin= new PesanAdminModel();
        $this->info= new InfoModel();
        $this->jumlah_pesan_belum_baca = $this->pesan_admin->where('status', '0')->countAllResults();
        $this->pesan_belum_baca = $this->pesan_admin->getData(null, true);
    }

    public function index()
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        $data['page'] = 'home';
        $db = db_connect();
        $query_angkatan = $db->query("SELECT tahun_lulus, COUNT(*) AS jumlah FROM profil GROUP BY tahun_lulus;")->getResultArray();
        // dd($a);
        $data['lulusan'] = $query_angkatan;
        $data['lulus_all'] = $this->profil->countAll();
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        return view('admin/index', $data);
    }
    public function profile()
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        if ($this->request->is('post') == true) {
            $rules = [
                "username" => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username tidak boleh kosong!',                        
                    ]
                ],
                "password" => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password tidak boleh kosong!',                        
                    ]
                ]
            ];
            if (!$this->validate($rules)) {           
                session()->setFlashdata('danger', $this->validation->getError());               
                return redirect()->back()->withInput();
            }
            $username = $this->request->getPost('username');
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $update = $this->akun->updateAkun($username, $password, session()->id_user);
            if ($update == true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Username/Password <strong>berhasil</strong> diubah, mohon untuk LOGOUT terlebih dahulu!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Username/Password <strong>gagal</strong> diubah!');
            }
            return redirect()->to('admin/profile');
        } else {
            $data['profile'] = $this->akun->where('id_user', session()->id_user)->first();
            $data['page'] = 'profile';
            $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
            $data['unread_message'] = $this->pesan_belum_baca;
            return view('admin/profile', $data);
        }        
    }
    
    public function alumni()
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }

        $data_akun_mhs = $this->akun->where('level', 2)->join('profil', 'user.id_user = profil.id_user')->findAll();
        // dd($data_akun_mhs);
        $data['page'] = 'alumni';
        $data['alumni'] = $data_akun_mhs;
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        return view('admin/dataAlumni', $data);
    }
    public function tambah_alumni()
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }

        if ($this->request->is('post') == true) {
            $rules = [
                "username" => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => 'Kolom NIM tidak boleh kosong!',
                        'is_unique' => 'NIM sudah ada!'
                    ]
                ]
            ];
            if (!$this->validate($rules)) {           
                session()->setFlashdata('danger', $this->validation->getError());               
                return redirect()->back()->withInput();
            }
            $username = $this->request->getPost('username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = password_hash($this->request->getPost('password', FILTER_SANITIZE_FULL_SPECIAL_CHARS), PASSWORD_DEFAULT);
            $insert_akun = $this->akun->tambahAlumni($username, $password, '2');
            $get_akun = $this->akun->where('username', $username)->first();
            $pecah = str_split($username);
            $angkatan = '20'.$pecah[0].$pecah[1];
            $id_user = $get_akun['id_user'];
            $insert_profil = $this->profil->insertProfil($this->request->getPost(), $id_user, $angkatan);
            if ($insert_akun == true && $insert_profil == true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data <strong>berhasil</strong> ditambahkan!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data <strong>gagal</strong> ditambahkan!');
            }
            return redirect()->to('admin/data-alumni');
        }
        $data_akun_mhs = $this->akun->where('level', 2)->join('profil', 'user.id_user = profil.id_user')->findAll();
        // dd($data_akun_mhs);
        $data['page'] = 'alumni';
        $data['alumni'] = $data_akun_mhs;
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        return view('admin/tambahAlumni', $data);
    }
    
    public function edit_alumni($id_user)
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        $data_akun_mhs = $this->akun->where('user.id_user', $id_user)->join('profil', 'user.id_user = profil.id_user')->first();
        if ($data_akun_mhs == null) {
            return redirect()->back();
        }
        if ($this->request->is('post') == true) {
            echo $nim_baru = $this->request->getPost('username');
            if ($nim_baru != $data_akun_mhs['username']) {
                $this->akun->updateAkun($nim_baru, null, $id_user);
            }
            $pecah = str_split($nim_baru);
            $angkatan = '20'.$pecah[0].$pecah[1];
            $update_profil = $this->profil->updateProfilByAdmin($this->request->getPost(), $id_user, $angkatan);
            if ($update_profil == true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data <strong>berhasil</strong> diubah!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data <strong>gagal</strong> diubah!');
            }
            return redirect()->to('admin/data-alumni');
        } else {
            // dd($data_akun_mhs);
            $data['page'] = 'alumni';
            $data['alumni'] = $data_akun_mhs;     
            $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
            $data['unread_message'] = $this->pesan_belum_baca;       
            return view('admin/editAlumni', $data);
        }        
    }

    public function hapus_alumni($id_user)
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        $data_akun_mhs = $this->akun->where('user.id_user', $id_user)->join('profil', 'user.id_user = profil.id_user')->first();
        if ($data_akun_mhs == null) {
            return redirect()->back();
        }
        $delete_profil = $this->profil->where('id_user', $id_user)->delete();
        $delete_akun = $this->akun->where('id_user', $id_user)->delete();
        if ($delete_profil == true && $delete_akun == true) {
            session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data <strong>berhasil</strong> dihapus!');
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data <strong>gagal</strong> dihapus!');
        }
        return redirect()->to('admin/data-alumni');
    }

    public function reset_pass_alumni($id_user)
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        $data_akun_mhs = $this->akun->where('user.id_user', $id_user)->first();
        if ($data_akun_mhs == null) {
            return redirect()->back();
        }
        $reset = $this->akun->updateAkun(null, password_hash('123456', PASSWORD_DEFAULT), $id_user);
        if ($reset == true) {
            session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Password akun <strong>berhasil</strong> direset ke 123456');
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Password akun <strong>gagal</strong> direset!');
        }
        return redirect()->to('admin/data-alumni');
    }

    public function jenjang()
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        $data['jenjang'] = $this->jenjang->getData();
        $data['page'] = 'jenjang';
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        return view('admin/jenjangAlumni', $data);
    }

    public function pesan()
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        $data['pesan_user'] = $this->pesan_user->getData();
        $data['pesan_admin'] = $this->pesan_admin->getData();
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        $data['page'] = 'pesan';
        return view('admin/pesan', $data);
    }

    public function kirim_pesan()
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        if ($this->request->is('post')) {
            $rules = [
                "isi" => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Isi Pesan tidak boleh kosong!'
                    ]
                ],
                "penerima" => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Penerima tidak boleh kosong!'
                    ]
                ]
            ];
            if (!$this->validate($rules)) {        
                session()->setFlashdata('danger', $this->validation->getErrors());                             
                return redirect()->back()->withInput();
            }
            $kirim = $this->pesan_user->kirimPesan($this->request->getPost(), session()->id_user);
            if ($kirim == true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Pesan <strong>berhasil</strong> dikirim!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Pesan <strong>gagal</strong> dikirim!');
            }
            return redirect()->to('admin/pesan');
        } else {
            $data['daftar_user'] = $this->akun->where('level', 2)->join('profil', 'user.id_user = profil.id_user')->findAll();
            $data['page'] = 'pesan';
            $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
            $data['unread_message'] = $this->pesan_belum_baca;
            return view('admin/kirimPesan', $data);
        }        
    }

    public function hapus_pesan_user($id_pesan_user)
    {
        if (session()->level != 1 || session()->level != '1') {
            return redirect()->back();
        } 
        $delete = $this->pesan_user->where('id_pesan_user', $id_pesan_user)->delete();
        if ($delete == true) {
            session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Pesan <strong>berhasil</strong> dihapus!');
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Pesan <strong>gagal</strong> dihapus!');
        }
        return redirect()->back();
    }

    public function detail_pesan($id_pesan_admin)
    {
        if (session()->level != 1 || session()->level != '1') {
            return redirect('/');
        }
        $cek_pesan = $this->pesan_admin->where('id_pesan_admin', $id_pesan_admin)->join('profil', 'pesan_admin.pengirim = profil.id_user')->first();
        if ($cek_pesan == null) {
            return redirect()->back();
        }     
        $this->pesan_admin->setStatus('1', $id_pesan_admin);
        $data['detail_pesan'] = $cek_pesan;
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        $data['page'] = 'pesan';
        return view('admin/detailPesan', $data);
    }

    public function info()
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        $data['page'] = 'info';
        $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
        $data['unread_message'] = $this->pesan_belum_baca;
        $data['info'] = $this->info->getData();
        return view('admin/info', $data);
    }

    public function tambah_info()
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        // dd($this->request->getFile('image')->getName());
        if ($this->request->is('post')) {
            $folder = './img_info/';
            if ($this->request->getFile('image')->getName() != null) {
                $rules = [
                    "image" => [
                        'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpeg,image/jpg,image/png]',
                        'errors' => [
                            'max_size' => 'Ukuran gambar terlalu besar!',
                            'is_image' => 'Mohon hanya masukkan gambar!',
                            'mime_in' => 'Mohon gunakan format JPEG/PNG!'
                        ]
                    ]
                ];
                if (!$this->validate($rules)) {          
                    // dd($this->validation->getError());
                    session()->setFlashdata('danger', $this->validation->getError());
                    return redirect()->back()->withInput();
                }                
                $image = $this->request->getFile('image');
                $nama = $image->getRandomName();
                $image->move($folder, $nama);
                // if ($this->info['image'] != 'default.jpg') {
                //     unlink($folder.$this->info['image']);
                // }
                // $update = $this->profil->updateFotoUser($nama, session()->id_user);
            } else {
                $nama = 'default.jpg';
            }
            $judul = $this->request->getPost('judul');
            $link = $this->request->getPost('link');
            $insert = $this->info->saveData($judul, $link, $nama);
            if ($insert==true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data Info Loker <strong>berhasil</strong> ditambahkan!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data Info Loker <strong>gagal</strong> ditambahkan!');
            }
            return redirect()->to('admin/info');
        } else {
            $data['page'] = 'info';
            $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
            $data['unread_message'] = $this->pesan_belum_baca;
            return view('admin/tambahInfo', $data);
        }
        
    }

    public function edit_info($id_info)
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        $data_info = $this->info->getData($id_info);
        // dd($data_info);
        if ($this->request->is('post')) {
            $folder = './img_info/';
            if ($this->request->getFile('image')->getName() != null) {
                $rules = [
                    "image" => [
                        'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpeg,image/jpg,image/png]',
                        'errors' => [
                            'max_size' => 'Ukuran gambar terlalu besar!',
                            'is_image' => 'Mohon hanya masukkan gambar!',
                            'mime_in' => 'Mohon gunakan format JPEG/PNG!'
                        ]
                    ]
                ];
                if (!$this->validate($rules)) {          
                    // dd($this->validation->getError());
                    session()->setFlashdata('danger', $this->validation->getError());
                    return redirect()->back()->withInput();
                }                
                $image = $this->request->getFile('image');
                $nama = $image->getRandomName();
                $image->move($folder, $nama);
                if ($data_info['image'] != 'default.jpg') {
                    unlink($folder.$data_info['image']);
                }
            } else {
                $nama = 'default.jpg';
            }
            $judul = $this->request->getPost('judul');
            $link = $this->request->getPost('link');
            $update = $this->info->saveData($judul, $link, $nama, $id_info);
            if ($update==true) {
                session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data Info Loker <strong>berhasil</strong> diubah!');
            } else {
                session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data Info Loker <strong>gagal</strong> diubah!');
            }
            return redirect()->to('admin/info');
        } else {
            $data['page'] = 'info';
            $data['count_unread_message'] = $this->jumlah_pesan_belum_baca;
            $data['unread_message'] = $this->pesan_belum_baca;
            $data['info'] = $data_info;
            return view('admin/editInfo', $data);
        }        
    }

    public function hapus_info($id_info)
    {
        if ($this->session->level != 1 || $this->session->level != '1') {
            return redirect('/');
        }
        $data_info = $this->info->getData($id_info);
        if ($data_info==null) {
            return redirect()->back();
        }
        if ($data_info['image'] != 'default.jpg') {
            $folder = './img_info/';
            unlink($folder.$data_info['image']);
        }
        $delete = $this->info->where('id_info', $id_info)->delete();
        if ($delete == true) {
            session()->setFlashdata('success', '<i class="bi bi-check-circle-fill"></i> Data info loker <strong>berhasil</strong> dihapus!');
        } else {
            session()->setFlashdata('danger', '<i class="bi bi-x-circle-fill"></i> Data info loker <strong>gagal</strong> dihapus!');
        }
        return redirect()->back();
    }
}
