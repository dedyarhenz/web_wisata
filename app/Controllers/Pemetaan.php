<?php 
namespace App\Controllers;
use App\Models\WisataModel;

class Pemetaan extends BaseController
{
	public function __construct()
	{
		$this->wisata = new WisataModel();
	}

	public function index()
	{
		$data= [
			'title' 	=> 'home',
			'isi' 		=> 'v_pemetaan',
			'wisata'	=> $this->wisata->findAll(),
		];
		
		echo view('layout/v_template',$data);
	}

	//--------------------------------------------------------------------

}
