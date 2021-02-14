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
		$data = $this->login->checkLogin($username, $password);

		if($data){
			$session = session();
			$session->set([
				'ID'		=> $data['NO'],
				'USERNAME'	=> $data['USERNAME'],
			]);
			return redirect()->to('/admin/dashboard');
		}else{
			return redirect()->to('/admin/login');
		}
    }

	public function logout()
    {
        session()->destroy();
        return redirect()->to('/Home');
    }

}
