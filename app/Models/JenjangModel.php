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
    protected $allowedFields = ['status','mendapat_kerja','berapa_bulan','pendapatan_kotor','lokasi_bekerja','jenis_institusi','institusi', 'nama_atasan','no_hp_atasan','email_atasan','posisi','tingkat','sumber_biaya','perguruan_tinggi', 'sejak','prodi','sumber_dana_saat_kuliah', 'hubungan_studi','kesesuaian_pendidikan','etika_lulus','keahlian_lulus','inggris_lulus','teknologi_lulus','komunikasi_lulus','kerja_lulus','pengembangan_lulus','etika_kerja','keahlian_kerja','inggris_kerja','teknologi_kerja','komunikasi_kerja','kerja_kerja','pengembangan_kerja','id_user'];

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
                'status' => $data['status'],            
                'mendapat_kerja' => $data['mendapat_kerja'],            
                'berapa_bulan' => $data['berapa_bulan'],            
                'pendapatan_kotor' => $data['pendapatan_kotor'],            
                'lokasi_bekerja' => $data['lokasi_bekerja'],            
                'jenis_institusi' => $data['jenis_institusi'],            
                'institusi' => $data['institusi'],
                'nama_atasan' => $data['nama_atasan'],
                'no_hp_atasan' => $data['no_hp_atasan'],
                'email_atasan' => $data['email_atasan'],
                'posisi' => $data['posisi'],
                'tingkat' => $data['tingkat'],
                'sumber_biaya' => $data['sumber_biaya'],
                'perguruan_tinggi' => $data['perguruan_tinggi'],
                'prodi' => $data['prodi'],
                'sejak' => $data['sejak'],
                'sumber_dana_saat_kuliah' => $data['sumber_dana_saat_kuliah'],
                'hubungan_studi' => $data['hubungan_studi'],
                'kesesuaian_pendidikan' => $data['kesesuaian_pendidikan'],
                'etika_lulus' => $data['etika_lulus'],
                'keahlian_lulus' => $data['keahlian_lulus'],
                'inggris_lulus' => $data['inggris_lulus'],
                'teknologi_lulus' => $data['teknologi_lulus'],
                'komunikasi_lulus' => $data['komunikasi_lulus'],
                'kerja_lulus' => $data['kerja_lulus'],
                'pengembangan_lulus' => $data['pengembangan_lulus'],
                'etika_kerja' => $data['etika_kerja'],
                'keahlian_kerja' => $data['keahlian_kerja'],
                'inggris_kerja' => $data['inggris_kerja'],
                'teknologi_kerja' => $data['teknologi_kerja'],
                'komunikasi_kerja' => $data['komunikasi_kerja'],
                'kerja_kerja' => $data['kerja_kerja'],
                'pengembangan_kerja' => $data['pengembangan_kerja'],
                'id_user' => $id_user
            ]; 
        } else {
            $newdata = [
                'id_jenjang' => $id_jenjang,
                'status' => $data['status'],            
                'mendapat_kerja' => $data['mendapat_kerja'],            
                'berapa_bulan' => $data['berapa_bulan'],            
                'pendapatan_kotor' => $data['pendapatan_kotor'],            
                'lokasi_bekerja' => $data['lokasi_bekerja'],            
                'jenis_institusi' => $data['jenis_institusi'],            
                'institusi' => $data['institusi'],
                'nama_atasan' => $data['nama_atasan'],
                'no_hp_atasan' => $data['no_hp_atasan'],
                'email_atasan' => $data['email_atasan'],
                'posisi' => $data['posisi'],
                'tingkat' => $data['tingkat'],
                'sumber_biaya' => $data['sumber_biaya'],
                'perguruan_tinggi' => $data['perguruan_tinggi'],
                'prodi' => $data['prodi'],
                'sejak' => $data['sejak'],
                'sumber_dana_saat_kuliah' => $data['sumber_dana_saat_kuliah'],
                'hubungan_studi' => $data['hubungan_studi'],
                'kesesuaian_pendidikan' => $data['kesesuaian_pendidikan'],
                'etika_lulus' => $data['etika_lulus'],
                'keahlian_lulus' => $data['keahlian_lulus'],
                'inggris_lulus' => $data['inggris_lulus'],
                'teknologi_lulus' => $data['teknologi_lulus'],
                'komunikasi_lulus' => $data['komunikasi_lulus'],
                'kerja_lulus' => $data['kerja_lulus'],
                'pengembangan_lulus' => $data['pengembangan_lulus'],
                'etika_kerja' => $data['etika_kerja'],
                'keahlian_kerja' => $data['keahlian_kerja'],
                'inggris_kerja' => $data['inggris_kerja'],
                'teknologi_kerja' => $data['teknologi_kerja'],
                'komunikasi_kerja' => $data['komunikasi_kerja'],
                'kerja_kerja' => $data['kerja_kerja'],
                'pengembangan_kerja' => $data['pengembangan_kerja'],
                'id_user' => $id_user
            ]; 
        }
               
        return $this->save($newdata);        
    }

    public function insertTracerStudy($data, $id_user)
    {
        $newdata = [         
            'status' => $data['status'],            
            'mendapat_kerja' => $data['mendapat_kerja'],            
            'berapa_bulan' => $data['berapa_bulan'],            
            'pendapatan_kotor' => $data['pendapatan_kotor'],            
            'lokasi_bekerja' => $data['lokasi_bekerja'],            
            'jenis_institusi' => $data['jenis_institusi'],            
            'institusi' => $data['institusi'],
            'nama_atasan' => $data['nama_atasan'],
            'no_hp_atasan' => $data['no_hp_atasan'],
            'email_atasan' => $data['email_atasan'],
            'posisi' => $data['posisi'],
            'tingkat' => $data['tingkat'],
            'sumber_biaya' => $data['sumber_biaya'],
            'perguruan_tinggi' => $data['perguruan_tinggi'],
            'prodi' => $data['prodi'],
            'sejak' => $data['sejak'],
            'sumber_dana_saat_kuliah' => $data['sumber_dana_saat_kuliah'],
            'hubungan_studi' => $data['hubungan_studi'],
            'kesesuaian_pendidikan' => $data['kesesuaian_pendidikan'],
            'etika_lulus' => $data['etika_lulus'],
            'keahlian_lulus' => $data['keahlian_lulus'],
            'inggris_lulus' => $data['inggris_lulus'],
            'teknologi_lulus' => $data['teknologi_lulus'],
            'komunikasi_lulus' => $data['komunikasi_lulus'],
            'kerja_lulus' => $data['kerja_lulus'],
            'pengembangan_lulus' => $data['pengembangan_lulus'],
            'etika_kerja' => $data['etika_kerja'],
            'keahlian_kerja' => $data['keahlian_kerja'],
            'inggris_kerja' => $data['inggris_kerja'],
            'teknologi_kerja' => $data['teknologi_kerja'],
            'komunikasi_kerja' => $data['komunikasi_kerja'],
            'kerja_kerja' => $data['kerja_kerja'],
            'pengembangan_kerja' => $data['pengembangan_kerja'],
            'id_user' => $id_user,
        ];
        return $this->allowEmptyInserts()->insert($newdata, false);
    }
}