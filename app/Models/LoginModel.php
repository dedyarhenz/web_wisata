<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
	protected $table = 'admin';
	
    public function checkLogin($username, $password)
    {
        return $this->db->table('tabel_admin')->where('USERNAME', $username)->where('PASSWORD', $password)->get()->getRow();
    }
}