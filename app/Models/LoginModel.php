<?php 
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    // ...
    protected $table      = 'user';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['id_user', 'username', 'password', 'level'];

    public function updateAkun($username = null, $password = null, $id)
    {
        if ($username != null && $password == null) {
            $newdata = [            
                'username' => $username
            ];
        } elseif($username == null && $password != null) {
            $newdata = [            
                'password' => $password
            ];
        } else {
            $newdata = [       
                'username' => $username,     
                'password' => $password
            ];
        }  
        return $this->where('id_user', $id)
        ->set($newdata)
        ->update();
    }

    public function tambahAlumni($username, $password, $level)
    {
        $newdata = [
            'username' => $username,
            'password' => $password,
            'level' => $level
        ]; 
        return $this->insert($newdata, false);
    }
}