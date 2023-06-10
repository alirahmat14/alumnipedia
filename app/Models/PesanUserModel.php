<?php 
namespace App\Models;

use CodeIgniter\Model;

class PesanUserModel extends Model
{
    // ...
    protected $table      = 'pesan_user';
    protected $primaryKey = 'id_pesan_user';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'dikirim';
    protected $updatedField  = 'dibaca';
    protected $deletedField  = 'dihapus';
    protected $allowedFields = ['isi', 'pengirim', 'penerima', 'status'];

    public function getData($penerima = null, $status=false)
    {
        if ($penerima == null && $status == false) {
            return $this->join('user', 'pesan_user.penerima = user.id_user')->join('profil', 'pesan_user.penerima = profil.id_user')->findAll();
            // return $this->findAll();
        } elseif ($penerima != null && $status==false){
            return $this->where('penerima', $penerima)->findAll();
        } elseif ($penerima != null && $status==true) {
            return $this->where('penerima', $penerima)->where('status', '0')->findAll();
        }
    }

    public function kirimPesan($data, $pengirim)
    {
        $newdata = [      
            'isi' => $data['isi'],      
            'pengirim' => $pengirim,            
            'penerima' => $data['penerima'],
            'status' => '0',
        ];
        return $this->insert($newdata, false);
    }

    public function setStatus($status, $id_pesan_user)
    {
        $newdata = [
            'status' => $status
        ];
        return $this->where('id_pesan_user', $id_pesan_user)
        ->set($newdata)
        ->update();
    }
}