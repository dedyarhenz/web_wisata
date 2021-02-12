<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{
	protected $table = 'tabel_bangunan';
	protected $allowedFields = ['BANGUNAN_NAMA', 'BANGUNAN_LAT', 'BANGUNAN_LONG', 'BANGUNAN_DESKRIPSI'];
	protected $primaryKey = 'BANGUNAN_ID';
	
    public function getData()
    {
        return $this->db->table($this->table)->get()->getResult();
    }

    public function updateData($id, $data){
        $this->db->table($this->table)->update($data, ['BANGUNAN_ID' => $id]);
    }

    public function deleteData($id)
	{
	    return $this->db->table($this->table)->delete(['BANGUNAN_ID' => $id]);
	} 
}