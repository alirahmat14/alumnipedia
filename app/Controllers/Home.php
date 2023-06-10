<?php
namespace App\Controllers;
$request = \Config\Services::request();
use App\Models\LoginModel;
use App\Models\ProfilModel;

class Home extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();       
    }

    public function index()
    {
        $db = db_connect();
        $query_angkatan = $db->query("SELECT angkatan, COUNT(*) AS jumlah FROM profil WHERE deleted_at IS NULL GROUP BY angkatan;")->getResultArray();
        $data['angkatan'] = $query_angkatan;
        return view('home/index', $data);
    }
    public function login()
    {
        if ($this->session->level == 1 || $this->session->level == '1') {
            return redirect('admin');
        } elseif ($this->session->level == 2 || $this->session->level == '2') {
            return redirect('user');
        }
        helper('form');
        $data['page'] = 'login';
        return view('home/login', $data);
        // echo $this->session->has('level');
        // echo password_hash('123456', PASSWORD_DEFAULT);
    }
    public function auth()
    {
        $auth = new LoginModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $query = $auth->where(['username' => $username])->first();
        // print_r($query);
        // die;
        if ($query != null) {
            if (password_verify($password, $query['password'])) {
                $newdata = [
                    'id_user' => $query['id_user'], 
                    'username' => $query['username'],
                    'level' => $query['level'],
                ];
                $this->session->set($newdata);                
                if ($query['level'] == 1 || $query['level'] == '1') {
                    return redirect('admin');
                } else {
                    return redirect('user');
                }
                
            } else {
                $this->session->setFlashdata('message', 'Password Salah!');
                return redirect('login');
            }            
        } else {
            $this->session->setFlashdata('message', 'NIM tidak ditemukan!');
            return redirect('login');
        }
        
        // print_r($auth->findAll());
    }

    public function logout()
    {
        session_destroy();
        return redirect('/');
    }

    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        $akun = new LoginModel();
        $data['keyword'] = $keyword;
        $data['hasil'] = $akun->like('user.username', $keyword)->orLike('profil.nama', $keyword)->orLike('profil.angkatan', $keyword)->orLike('profil.tahun_lulus', $keyword)->join('profil', 'user.id_user = profil.id_user')->where('level', '2')->findAll();
        // dd($data);
        return view('home/search', $data);
    }
}
