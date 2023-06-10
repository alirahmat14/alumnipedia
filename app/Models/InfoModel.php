<?php 
namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model
{
    protected $table      = 'info';
    protected $primaryKey = 'id_info';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'link', 'image'];

    public function getData($id_info=null)
    {        
        if ($id_info!=null) {
            return $this->where('id_info', $id_info)->first();
        }
        return $this->findAll();
    }

    public function saveData($judul, $link, $image, $id_info=null)
    {
        $newdata = [      
            'judul' => $judul,      
            'link' => $link,            
            'image' => $image,
        ];
        if ($id_info!=null) {
            $newdata = [  
                'id_info' => $id_info,    
                'judul' => $judul,      
                'link' => $link,            
                'image' => $image,
            ];
        }
        return $this->save($newdata);
    }
}