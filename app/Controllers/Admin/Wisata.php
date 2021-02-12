<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\IncomingRequest;
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
		
		echo view('Admin/layout/v_template',$data);
	}

	public function create()
	{
		$data= [
			'title' => 'wisata',
			'isi' 	=> 'v_wisata_add',
		];

		$input = $this->validate([
            'BANGUNAN_NAMA' => 'required',
            'BANGUNAN_LATITUDE' => 'required|numeric',
            'BANGUNAN_LONGTITUDE' => 'required|numeric',
            'BANGUNAN_DESKRIPSI' => 'required',
        ]);

		if (!$input) {
			session()->setFlashdata('error', $this->validator->listErrors());
			echo view('Admin/layout/v_template', $data);
		}else{
			$this->wisata->save([
                'BANGUNAN_NAMA' => $this->request->getVar('BANGUNAN_NAMA'),
	            'BANGUNAN_LAT' => $this->request->getVar('BANGUNAN_LATITUDE'),
	            'BANGUNAN_LONG' => $this->request->getVar('BANGUNAN_LONGTITUDE'),
	            'BANGUNAN_DESKRIPSI' => $this->request->getVar('BANGUNAN_DESKRIPSI'),
            ]);
			
			return redirect()->to('/admin/wisata');
		}

	}

	public function update($wisata_id)
	{
		$data= [
			'title' 	=> 'wisata',
			'isi' 		=> 'v_wisata_edit',
			'wisata'	=> $this->wisata->find($wisata_id),
		];

		$input = $this->validate([
            'BANGUNAN_NAMA' => 'required',
            'BANGUNAN_LATITUDE' => 'required|numeric',
            'BANGUNAN_LONGTITUDE' => 'required|numeric',
            'BANGUNAN_DESKRIPSI' => 'required',
        ]);

		if (!$input) {
			session()->setFlashdata('error', $this->validator->listErrors());
			echo view('Admin/layout/v_template', $data);
		}else{
			$wisata = [
                'BANGUNAN_NAMA' => $this->request->getVar('BANGUNAN_NAMA'),
	            'BANGUNAN_LAT' => $this->request->getVar('BANGUNAN_LATITUDE'),
	            'BANGUNAN_LONG' => $this->request->getVar('BANGUNAN_LONGTITUDE'),
	            'BANGUNAN_DESKRIPSI' => $this->request->getVar('BANGUNAN_DESKRIPSI'),
            ];

			$this->wisata->updateData($wisata_id, $wisata);
			
			return redirect()->to('/admin/wisata');
		}
	}

	public function delete($wisata_id)
	{
	    $hapus = $this->wisata->deleteData($wisata_id);

	    if($hapus){
	        session()->setFlashdata('warning', 'Hapus Data Berhasil');
	        return redirect()->to('/admin/wisata');
	    }
	}

}
