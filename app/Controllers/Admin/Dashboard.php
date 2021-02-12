<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'dashboard',
			'isi' 	=> 'v_dashboard',
		];
		
		echo view('Admin/layout/v_template',$data);
	}

	//--------------------------------------------------------------------

}
