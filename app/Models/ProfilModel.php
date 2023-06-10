<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    // ...
    protected $table      = 'profil';
    protected $primaryKey = 'id_profil';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'nama', 'angkatan', 'tahun_lulus', 'prodi','email', 'telepon', 'alamat', 'tanggal_lahir', 'tempat_lahir', 'foto'];

    public function updateProfil($data, $id_user, $angkatan)
    {
        $newdata = [            
            'angkatan' => $angkatan,            
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'alamat' => $data['alamat'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],
        ];
        return $this->where('id_user', $id_user)
        ->set($newdata)
        ->update();
    }

    public function updateFotoUser($foto, $id)
    {
        $newdata = [            
            'foto' => $foto
        ];
        return $this->where('id_user', $id)
        ->set($newdata)
        ->update();
    }

    public function insertProfil($data, $id_user, $angkatan)
    {
        $newdata = [      
            'nama' => $data['nama'],      
            'angkatan' => $angkatan,            
            'tahun_lulus' => $data['tahun_lulus'],
            'prodi' => $data['prodi'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'alamat' => $data['alamat'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],
            'foto' => 'default.jpg',
            'id_user' => $id_user,
        ];
        return $this->allowEmptyInserts()->insert($newdata, false);
    }

    public function updateProfilByAdmin($data, $id_user, $angkatan)
    {
        $newdata = [      
            'nama' => $data['nama'],      
            'angkatan' => $angkatan,            
            'tahun_lulus' => $data['tahun_lulus'],
            'prodi' => $data['prodi'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'alamat' => $data['alamat'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],            
        ];
        return $this->where('id_user', $id_user)
        ->set($newdata)
        ->update();
    }
}