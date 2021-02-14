<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController
{
    public function __construct()
	{
		$this->login = new LoginModel();
	}

	public function index()
	{
		$data= [
			'title' => 'Login',
			'isi' => 'login',
		];
		
		echo view('Admin/v_login.php',$data);
	}

    public function check()
    {
		$username = $this->request->getVar('username');
		$password = md5($this->request->getVar('password'));

		if($this->login->checkLogin($username, $password)){
			return redirect()->to('/admin/dashboard');
		}else{
			return redirect()->to('/admin/login');
		}
    }

	//--------------------------------------------------------------------

}
