<?php 
namespace App\Models;

use CodeIgniter\Model;

class JenjangModel extends Model
{
    // ...
    protected $table      = 'jenjang';
    protected $primaryKey = 'id_jenjang';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['institusi', 'posisi', 'sejak', 'id_user'];

    public function getData($id_user = null, $id_jenjang = null)
    {
        if ($id_user == null) {
            return $this->join('profil', 'jenjang.id_user = profil.id_user')->join('user', 'jenjang.id_user = user.id_user')->findAll();
        } elseif ($id_user != null && $id_jenjang == null){
            return $this->where('id_user', $id_user)->findAll();
        } elseif ($id_user != null && $id_jenjang != null){
            return $this->where('id_user', $id_user)->where('id_jenjang', $id_jenjang)->first();
        }
    }

    public function saveData($data, $id_user, $id_jenjang = null)
    {
        if ($id_jenjang == null) {
            $newdata = [
                'institusi' => $data['institusi'],
                'posisi' => $data['posisi'],
                'sejak' => $data['sejak'],
                'id_user' => $id_user
            ]; 
        } else {
            $newdata = [
                'id_jenjang' => $id_jenjang,
                'institusi' => $data['institusi'],
                'posisi' => $data['posisi'],
                'sejak' => $data['sejak'],
                'id_user' => $id_user
            ]; 
        }
               
        return $this->save($newdata);        
    }
}