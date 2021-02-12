<?php 
namespace App\Controllers;
use App\Models\WisataModel;

class Wisata extends BaseController
{
	public function __construct()
	{
		$this->wisata = new WisataModel();
	}

	public function index()
	{
		$data= [
			'title' 	=> 'wisata',
            'isi' 		=> 'v_wisata',
            'wisata'	=> $this->wisata->findAll(),
		];

       	echo view('layout/v_template',$data);
	}

	public function show($wisata_id)
	{
		$data= [
			'title' 	=> 'wisata',
            'isi' 		=> 'v_wisata',
            'wisata'	=> $this->wisata->findAll(),
		];

		$wisata = $this->wisata->find($wisata_id);

		if ($wisata) {
			$data['wisata_only'] = $wisata;
			echo view('layout/v_template',$data);
		}
	}
}