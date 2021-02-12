<?php
namespace App\Controllers;
use App\Models\WisataModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->wisata = new WisataModel();
	}

	public function index()
	{
		$data= [
			'title' 	=> 'home',
			'isi' 		=> 'v_home',
			'wisata'	=> $this->wisata->findAll(),
		];
		
		echo view('layout/v_template',$data);
	}

	//--------------------------------------------------------------------

}
