<?php 
namespace App\Models;

use CodeIgniter\Model;

class PesanAdminModel extends Model
{
    // ...
    protected $table      = 'pesan_admin';
    protected $primaryKey = 'id_pesan_admin';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'dikirim';
    protected $updatedField  = 'dibaca';
    protected $deletedField  = 'dihapus';
    protected $allowedFields = ['isi', 'pengirim', 'status'];

    public function getData($pengirim = null, $status=false)
    {
        if ($pengirim == null && $status == false) {
            return $this->join('user', 'pesan_admin.pengirim = user.id_user')->join('profil', 'pesan_admin.pengirim = profil.id_user')->findAll();
            // return $this->findAll();
        } elseif ($pengirim != null && $status==false){
            return $this->where('pengirim', $pengirim)->findAll();
        } elseif ($pengirim != null && $status==true) {
            return $this->where('pengirim', $pengirim)->where('status', '0')->findAll();
        } elseif ($pengirim == null && $status==true) {
            return $this->join('user', 'pesan_admin.pengirim = user.id_user')->join('profil', 'pesan_admin.pengirim = profil.id_user')->where('status', '0')->findAll();
        }
    }

    public function kirimPesan($data, $pengirim)
    {
        $newdata = [      
            'isi' => $data['isi'],      
            'pengirim' => $pengirim,            
            'status' => '0',
        ];
        return $this->insert($newdata, false);
    }

    public function setStatus($status, $id_pesan_admin)
    {
        $newdata = [
            'status' => $status
        ];
        return $this->where('id_pesan_admin', $id_pesan_admin)
        ->set($newdata)
        ->update();
    }
}