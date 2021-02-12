<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\WisataImageModel;

class WisataImage extends BaseController
{
	public function __construct()
	{
		$this->wisataImage = new WisataImageModel();
	}

	public function image($wisata_id)
	{
		$data= [
			'title' 	=> 'wisata',
			'isi' 		=> 'v_wisataimage',
			'wisata_id'	=> $wisata_id,
			'wisata'	=> $this->wisataImage->getDataWisata($wisata_id),
		];
		
		echo view('Admin/layout/v_template',$data);
	}

	public function create($wisata_id)
	{
		$data= [
			'title' => 'gambar wisata',
			'isi' 	=> 'v_wisataimage_add',
			'wisata_id'	=> $wisata_id,
		];
 
        $validated = $this->validate([
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
        ]);
  
        if ($validated == FALSE) {
           	session()->setFlashdata('error', $this->validator->listErrors());
            echo view('Admin/layout/v_template',$data);
 
        } else {
 
            $imagewisata = $this->request->getFile('file_upload');
            $imagewisata->move(ROOTPATH . 'public/uploads/wisata');
 
            $data = [
            	'BANGUNAN_ID' => $wisata_id,
                'NAMA_GAMBAR' => $imagewisata->getName(),
            ];
     
            $this->wisataImage->createData($data);
            return redirect()->to(base_url('image/' . $wisata_id))->with('success', 'Upload Berhasil'); 
        }
 

		// $input = $this->validate([
  //           'BANGUNAN_NAMA' => 'required',
  //           'BANGUNAN_LATITUDE' => 'required|numeric',
  //           'BANGUNAN_LONGTITUDE' => 'required|numeric',
  //           'BANGUNAN_DESKRIPSI' => 'required',
  //       ]);

		// if (!$input) {
		// 	session()->setFlashdata('error', $this->validator->listErrors());
		// 	echo view('Admin/layout/v_template', $data);
		// }else{
		// 	$this->wisata->save([
  //               'BANGUNAN_NAMA' => $this->request->getVar('BANGUNAN_NAMA'),
	 //            'BANGUNAN_LAT' => $this->request->getVar('BANGUNAN_LATITUDE'),
	 //            'BANGUNAN_LONG' => $this->request->getVar('BANGUNAN_LONGTITUDE'),
	 //            'BANGUNAN_DESKRIPSI' => $this->request->getVar('BANGUNAN_DESKRIPSI'),
  //           ]);
			
		// 	return redirect()->to('/admin/wisata');
		// }

	}

	// public function update($wisata_id)
	// {
	// 	$data= [
	// 		'title' 	=> 'wisata',
	// 		'isi' 		=> 'v_wisataimage_edit',
	// 		'wisata'	=> $this->wisata->find($wisata_id),
	// 	];

	// 	$input = $this->validate([
 //            'BANGUNAN_NAMA' => 'required',
 //            'BANGUNAN_LATITUDE' => 'required|numeric',
 //            'BANGUNAN_LONGTITUDE' => 'required|numeric',
 //            'BANGUNAN_DESKRIPSI' => 'required',
 //        ]);

	// 	if (!$input) {
	// 		session()->setFlashdata('error', $this->validator->listErrors());
	// 		echo view('Admin/layout/v_template', $data);
	// 	}else{
	// 		$wisata = [
 //                'BANGUNAN_NAMA' => $this->request->getVar('BANGUNAN_NAMA'),
	//             'BANGUNAN_LAT' => $this->request->getVar('BANGUNAN_LATITUDE'),
	//             'BANGUNAN_LONG' => $this->request->getVar('BANGUNAN_LONGTITUDE'),
	//             'BANGUNAN_DESKRIPSI' => $this->request->getVar('BANGUNAN_DESKRIPSI'),
 //            ];

	// 		$this->wisata->updateData($wisata_id, $wisata);
			
	// 		return redirect()->to('/admin/wisata');
	// 	}
	// }

	// public function delete($wisata_id)
	// {
	//     $hapus = $this->wisata->deleteData($wisata_id);

	//     if($hapus){
	//         session()->setFlashdata('warning', 'Hapus Data Berhasil');
	//         return redirect()->to('/admin/wisata');
	//     }
	// }

}
