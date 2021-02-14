<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataImageModel extends Model
{
	protected $table = 'tabel_gambar';
	protected $allowedFields = ['BANGUNAN_ID', 'NAMA_GAMBAR'];
	protected $primaryKey = 'ID_GAMBAR';
	
    public function getData()
    {
        return $this->db->table($this->table)->get()->getResult();
    }

    public function getDataWisata($id_wisata)
    {
        return $this->db->table($this->table)->where('BANGUNAN_ID', $id_wisata)->get()->getResultArray();
    }

    public function getDataImageWisata($id_image_wisata)
    {
        return $this->db->table($this->table)->where('ID_GAMBAR', $id_image_wisata)->get()->getRowArray();
    }

    public function createData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function deleteData($id)
	{
	    return $this->db->table($this->table)->delete(['ID_GAMBAR' => $id]);
	} 
}